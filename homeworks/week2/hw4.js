function printFactor(n) {
  if (n <= 0) {
    console.log('請輸入大於0的數字');
  }
  for (let i = n; i >= 1; i -= 1) {
    if (n % i === 0 && n > 0) {
      console.log(i);
    }
  }
}

printFactor(10);
