/**
 * Initializer of quiz admin.
 * 
 * This function is called by the quiz admin widget on load.
 */
function initOpenPlatformQuiz() {
  const admin = new openPlatformQuiz.Admin({
    elemId: 'quiz-admin',
    openPlatformToken: drupalSettings.openPlatformToken,
  });
}