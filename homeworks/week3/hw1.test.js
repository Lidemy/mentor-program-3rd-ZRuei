const stars = require('./hw1');

describe('hw1', () => {
  test('it should return correct answer when n = 1', () => {
    expect(stars(1)).toEqual(['*']);
  });
  test('it should return correct answer when n = 3', () => {
    expect(stars(3)).toEqual(['*', '**', '***']);
  });
  test('it should return correct answer when n = 7', () => {
    expect(stars(7)).toEqual(['*', '**', '***', '****', '*****', '******', '*******']);
  });
});
