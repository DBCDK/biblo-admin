<?php

namespace Drupal\dbcdk_community_moderation\Plugin\Block;

use DBCDK\CommunityServices\ApiException;
use DBCDK\CommunityServices\Model\AdminMessage;
use Drupal\Component\Utility\Xss;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Datetime\DateFormatter;
use Drupal\Core\Link;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Url;
use Drupal\dbcdk_community_moderation\Profile\ProfileRepository;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a 'ProfileAdminMessagesBlock' block.
 *
 * This block provides an overview of a Community Profile's Messages.
 *
 * @Block(
 *   id = "dbcdk_community_community_profile_admin_messages_block",
 *   admin_label = @Translation("DBCDK Messages"),
 *   context = {
 *     "username" = @ContextDefinition("string")
 *   }
 * )
 */
class ProfileAdminMessagesBlock extends BlockBase implements ContainerFactoryPluginInterface
{
    use LoggerAwareTrait;

    /**
     * The profile repository to use.
     *
     * @var ProfileRepository $profileRepository
     */
    protected $profileRepository;

    /**
     * Drupal's date formatter to format dates to Drupal Date Formats.
     *
     * @var \Drupal\Core\Datetime\DateFormatter $dateFormatter
     */
    protected $dateFormatter;

    /**
     * Creates a Profiles Block instance.
     *
     * @param array $configuration
     *   A configuration array containing information about the plugin instance.
     * @param string $plugin_id
     *   The plugin_id for the plugin instance.
     * @param mixed $plugin_definition
     *   The plugin implementation definition.
     * @param \Psr\Log\LoggerInterface $logger
     *   The logger to use.
     * @param \Drupal\dbcdk_community_moderation\Profile\ProfileRepository $profile_repository
     *   The profile repository to use.
     * @param \Drupal\Core\Datetime\DateFormatter $date_formatter
     *   Drupal's date formatter to format dates to Drupal Date Formats.
     */
    public function __construct(array $configuration, $plugin_id, $plugin_definition, LoggerInterface $logger, ProfileRepository $profile_repository, DateFormatter $date_formatter)
    {
        parent::__construct($configuration, $plugin_id, $plugin_definition);
        $this->logger = $logger;
        $this->profileRepository = $profile_repository;
        $this->dateFormatter = $date_formatter;
    }

    /**
     * {@inheritdoc}
     */
    public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition)
    {
        return new static(
            $configuration,
            $plugin_id,
            $plugin_definition,
            $container->get('dbcdk_community.logger'),
            $container->get('dbcdk_community_moderation.profile.profile_repository'),
            $container->get('date.formatter')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function build()
    {
        // Tries to fetch messages from the Community Service or catches any
        // exceptions and log them so the site can continue running and display an
        // empty table instead of a fatal error.
        $profile = null;
        try {
            $profile = $this->profileRepository->getProfileByUsername($this->getContextValue('username'));
        } catch (ApiException $e) {
            $this->logger->error($e);
        } catch (\InvalidArgumentException $e) {
            $this->logger->notice($e);
        }

        // Create an array of the fields we wish to display as columns in our table.
        // The order the fields appear in the array is also the order they will
        // be displayed.
        $rows = [];
        $fields = [
            'message' => $this->t('Message'),
            'timeCreated' => $this->t('Send time'),
            'edit_link' => $this->t('Edit'),
        ];
        if (!empty($profile)) {
            foreach ($profile->getMessages() as $message) {
                $rows[] = $this->parseMessage($message, $fields, $profile->getUsername());
            }
        }

        // Build table of messages.
        $build = [];
        $build['table'] = [
            '#theme' => 'table',
            '#header' => $fields,
            '#rows' => $rows,
            '#empty' => $this->t('There are no messages attached to this profile.'),
            '#cache' => [
                'max-age' => 0,
            ],
        ];

        // Create message link.
        if (!empty($profile)) {
            $build['add_message'] = [
                '#type' => 'link',
                '#title' => $this->t('Create message'),
                '#url' => new Url('dbcdk_community_moderation.profile.message.add', [
                    'username' => $profile->getUsername(),
                ]),
                '#attributes' => [
                    'class' => [
                        'button',
                        'button--danger',
                    ],
                ],
            ];
        }

        return $build;
    }

    /**
     * Parse a Community Service Message.
     *
     * Takes a Community Service Message and an array of fields to determine
     * what values that should be display in the table of messages.
     * We also require a username so we can fill out the route arguments for the
     * edit link.
     *
     * @param \DBCDK\CommunityServices\Model\AdminMessage $message
     *   A Community Service Message.
     * @param array $fields
     *   An array of fields in the following format: field_name => title.
     * @param string $username
     *   The username of the Community Profile.
     *
     * @return array $rows
     *   An array of rows containing subjects and information.
     */
    protected function parseMessage(AdminMessage $message, array $fields, $username)
    {
        $row = [];
        foreach ($fields as $field => $title) {
            switch ($field) {
                // Format DateTime objects to a string.
                case 'timeCreated':
                    $method = 'get' . ucfirst($field);
                    if (method_exists($message, $method)) {
                        $row[$field] = $this->dateFormatter->format($message->{$method}()->getTimestamp(), 'dbcdk_community_service_date');
                    }
                    break;

                // We have to allow HTML in the output of the description field since
                // Twig automatically escapes string variables because markup is meant
                // to be handled in templates.
                case 'message':
                    $row[$field] = [
                        'data' => [
                            '#markup' => $message->getMessage(),
                            '#allowed_tags' => Xss::getAdminTagList(),
                        ],
                    ];
                    break;

                // The edit_link field is not a field provided by the Community Service
                // but a column we wish to display with a link to edit a message.
                case 'edit_link':
                    $row[$field] = Link::createFromRoute($title, 'dbcdk_community_moderation.profile.message.edit', [
                        'username' => $username,
                        'message_id' => $message->getId(),
                    ]);
                    break;
            }
        }

        return $row;
    }

}
