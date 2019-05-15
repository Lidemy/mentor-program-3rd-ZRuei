const isPrime = require('./hw3');

describe('hw3', () => {
  test('it should return correct answer when n = 1', () => {
    expect(isPrime(1)).toBe(false);
  });
  test('it should return correct answer when n = 99289', () => {
    expect(isPrime(99289)).toBe(true);
  });
});
