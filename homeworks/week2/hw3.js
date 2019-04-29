function strReverse(str) {
  let strRev = '';
  for (let i = str.length - 1; i >= 0; i -= 1) {
    strRev += str[i];
  }
  return strRev;
}

console.log(strReverse('hello'));
