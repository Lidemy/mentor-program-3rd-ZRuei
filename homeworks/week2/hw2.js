function capitalize(str) {
  const strArr = str.split('');
  strArr[0] = strArr[0].toUpperCase();
  const capStr = strArr.join('');
  return capStr;
}

console.log(capitalize('hello'));
