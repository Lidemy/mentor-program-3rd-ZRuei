function stars(n) {
  const result = [];
  let countStar = '';
  for (let i = 1; i <= n; i += 1) {
    countStar += '*';
    result.push(countStar);
  }
  return result;
}

module.exports = stars;
