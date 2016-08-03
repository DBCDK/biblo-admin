# biblo.dk Administration

This is the administration interface for biblo.dk based on Drupal 8.

The project structure is based on [`drupal-composer/drupal-project`](https://github.com/drupal-composer/drupal-project).

## Development dependencies

* Docker and Docker Compose
* [Composer](https://getcomposer.org/)

## Installation instructions

1. Clone this repository
2. From the root of the cloned repository:
  1. Run `composer install`
  2. Run `docker-compose build`
  3. Run `docker-compose up`
  4. Run `docker-compose run web drush cim -y`
3. Profit!

### Optional installation instructions

* If you wish to provide "real data" instead of using "dummy fallbacks", then copy `example.docker-compose.override.yml` to `docker-compose.override.yml` and fill out the required enviroment variables.

## Maintenance

### Maintaining third party code
 
Third party dependencies are maintained using Composer and declared in [`composer.json`](composer.json). This includes Drupal Core, modules and themes from [drupal.org](https://www.drupal.org/download) as well as third party libraries.

#### Updating dependencies

To update dependencies do the following;

1. Run `composer update`. This will check for updates to *all* direct and indirect dependencies within the boundaries defined in `composer.json` and apply them to the local project.
2. Commit and push the resulting changes to the `composer.lock` file. This will ensure that the updated versions are used on external environments when running `composer.install`.
3. Deploy the changes.

To only update a specific dependency then go through steps 1-3 but run `composer update [dependency]`. Example: To update Drupal Core run `composer update drupal/core`.

#### Applying a patch

To apply a patch to a dependency do the following:

1. Add the patch to `composer.json` under `extra.patches.[dependency-name]`
2. Run `composer update --lock`
3. Commit and push the changes to `composer.json` and `composer.lock` files
4. Deploy the changes

### Webservice client generation

This project includes a PHP webservice client for accessing [the community service](https://github.com/DBCDK/dbc-community-service).

To update this client do the following:

1. Update your Docker image for the community service `docker-compose build --no-cache service`
2. Update the client code using [`swagger-codegen`](https://github.com/swagger-api/swagger-codegen) `composer docker-swagger-generate`
3. Change file permissions in `lib/client` to ensure that new files are owned by the current user.

If you do not want to run the community client locally using Docker and you have access to a running version of the community service then you can replace steps 1 and 2 with the following command:

`docker-compose run swagger generate -i http://[community-service-host:port]/explorer/swagger.json -l php -o /var/usr/client -c /var/usr/swagger/config.json`

## Continuous Integration

* We use [Scrutinizer](https://scrutinizer-ci.com/g/DBCDK/biblo-admin/) to run tests and analyze the code for code standards, debugging code and general mistakes.
  * Codesniffer runs with Drupal standards.
  * The [`.eslintrc`](.eslintrc) in the root of the project is a duplicate of [Drupal 8's `.eslintrc` file](http://cgit.drupalcode.org/drupal/tree/core/.eslintrc). This is needed because Scrutinizer assumes that the ESLint config file is placed in the root.
