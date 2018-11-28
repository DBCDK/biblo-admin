export function getQuizEntries(id, limit = 1, offset = 0) {
  return fetch(`/quiz/${id}?limit=${limit}&offset=${offset}`)
    .then(res => res.json())
    .catch(err => {
      console.error(err);
      return [];
    });
}
