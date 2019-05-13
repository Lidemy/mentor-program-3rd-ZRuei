function add(a, b) {
  const aReverse = a.split('').reverse();
  const bReverse = b.split('').reverse();
  const addZero = Math.abs(aReverse.length - bReverse.length);
  const result = [];
  if (aReverse.length >= bReverse.length) {
    for (let i = 1; i <= addZero; i += 1) {
      bReverse.push('0');
    }
  } else {
    for (let i = 1; i <= addZero; i += 1) {
      aReverse.push('0');
    }
  }
  for (let j = 0; j < aReverse.length; j += 1) {
    result.push(Number(aReverse[j]) + Number(bReverse[j]));
  }
  for (let k = 0; k < result.length - 1; k += 1) {
    if (result[k] >= 10) {
      result[k] -= 10;
      result[k + 1] += 1;
    }
  }
  return result.reverse().join('');
}

console.log(add('160', '995647569365296926'));
module.exports = add;
