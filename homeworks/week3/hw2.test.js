const alphaSwap = require('./hw2');

describe('hw2', () => {
  test('it should return correct answer when str = nick', () => {
    expect(alphaSwap('nick')).toBe('NICK');
  });
  test('it should return correct answer when str = ,HeLLo123', () => {
    expect(alphaSwap(',HeLLo123')).toBe(',hEllO123');
  });
});
