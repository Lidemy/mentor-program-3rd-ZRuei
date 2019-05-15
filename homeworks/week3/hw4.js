function isPalindromes(str) {
  let toLower = '';
  for (let i = 0; i <= str.length - 1; i += 1) {
    toLower = str.toLowerCase();
  }
  for (let i = 0; i <= (toLower.length - 1) / 2; i += 1) {
    if (toLower[i] !== toLower[toLower.length - 1 - i]) {
      return false;
    }
  }
  return true;
}

module.exports = isPalindromes;
