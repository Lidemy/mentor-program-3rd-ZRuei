const isPalindromes = require('./hw4');

describe('hw4', () => {
  test('should return correct answer when str = abcdcba', () => {
    expect(isPalindromes('abcdcba')).toBe(true);
  });
  test('should return correct answer when str = AbcdcBa', () => {
    expect(isPalindromes('AbcdcBa')).toBe(true);
  });
});
