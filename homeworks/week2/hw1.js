function printStars(n) {
  if (n % 1 === 0 && typeof (n) === 'number' && n >= 1 && n <= 30) {
    for (let i = 1; i <= n; i += 1) {
      console.log('*');
    }
  } else {
    console.log('請輸入介於1到30的正整數');
  }
}

printStars(5);
