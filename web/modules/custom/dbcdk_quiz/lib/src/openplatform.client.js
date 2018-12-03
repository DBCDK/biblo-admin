function loadScript(url) {
  return new Promise((resolve, reject) => {
    const elem = document.createElement("script");
    elem.src = url;
    elem.onload = resolve;
    elem.onerror = reject;
    document.head.appendChild(elem);
  });
}
async function ensureDbcOpenPlatform() {
  if (typeof window.dbcOpenPlatform === "undefined") {
    await loadScript("https://openplatform.dbc.dk/v3/dbc_openplatform.min.js");
  }
}
/**
 *
 *
 * @export
 * @param {*} token
 * @returns
 */
export async function connect(token) {
  await ensureDbcOpenPlatform();
  return await window.dbcOpenPlatform.connect(token);
}

export async function getAllQuizzes() {
  await connect("c543dec18c532bca1d7b3831d5e7852174ce5d6b");
  const {
    storage: {user}
  } = await window.dbcOpenPlatform.status({
    fields: ["storage"]
  });

  const quizzes = await window.dbcOpenPlatform.storage({
    scan: {
      reverse: true,
      _type: "openplatform.quiz",
      index: ["_owner", "_version"],
      startsWith: ["774000-quiz"]
    }
  });

  // Load all quizzes
  return await Promise.all(
    quizzes.map(
      async quiz =>
        await window.dbcOpenPlatform.storage({
          get: {_id: quiz.val}
        })
    )
  );
}
