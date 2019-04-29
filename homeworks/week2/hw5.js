function strJoin(str, concatStr) {
  let newStr = str[0];
  for (let i = 1; i < str.length; i += 1) {
    newStr += concatStr + str[i];
  }
  return newStr;
}

function strRepeat(str, times) {
  let result = '';
  for (let i = 1; i <= times; i += 1) {
    result += str;
  }
  return result;
}

console.log(strJoin(['a', 1, 'b', 2, 'c', 3], ''));
console.log(strRepeat('a', 5));
