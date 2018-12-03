/**
 * Get quiz entries for ID.
 *
 * @param {String} id
 * @param {Number} limit
 * @param {Number} offset
 */
export function getQuizEntries(id, limit = 1, offset = 0) {
  return fetch(`/quiz/${id}?limit=${limit}&offset=${offset}`)
    .then(res => res.json())
    .catch(err => {
      console.error(err);
      return [];
    });
}
/**
 * Get quiz entries co
 *
 * @param {String} id
 * @param {Number} limit
 * @param {Number} offset
 */
export function count(id) {
  return fetch(`/quiz/${id}?count=true`)
    .then(res => res.json())
    .catch(err => {
      console.error(err);
      return [];
    });
}
