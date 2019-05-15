const add = require('./hw5');

describe('hw5', () => {
  test('it should return correct answer when a=111111111111111111111111111111111111 and b=111111111111111111111111111111111111', () => {
    expect(add('111111111111111111111111111111111111', '111111111111111111111111111111111111')).toBe('222222222222222222222222222222222222');
  });
  test('it should return correct answer when a=999 and b=999', () => {
    expect(add('999', '999')).toBe('1998');
  });
});
