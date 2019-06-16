const display = document.querySelector('.display');

let displayValue = '0';
let firstNum = null;
let isSecondNum = false;
let operator = null;

// 歸零
function initCalculate() {
  displayValue = '0';
  firstNum = null;
  isSecondNum = false;
  operator = null;
}
initCalculate();

function updateDisplay() {
  display.innerText = displayValue;
}
updateDisplay();

function inputNum(num) {
  if (isSecondNum === true) {
    displayValue = num;
    isSecondNum = false;
  } else if (displayValue === '0') {
    displayValue = num;
  } else {
    displayValue += num;
  }
}

function inputPoint(dot) {
  if (!displayValue.includes(dot)) {
    displayValue += dot;
  }
}

function calculate(savedNum, secondNum, op) {
  // console.log(firstNum);
  // console.log(secondNum);
  // console.log(operator);
  switch (op) {
    case '+':
      return savedNum + secondNum;
    case '-':
      return savedNum - secondNum;
    case '*':
      return savedNum * secondNum;
    case '/':
      return savedNum / secondNum;
    case '=':
      return secondNum;
    default:
      return false;
  }
}

function handleOperator(secondOperator) {
  const inputValue = parseFloat(displayValue);

  if (firstNum === null) {
    firstNum = inputValue;
  } else if (operator) {
    const result = calculate(firstNum, inputValue, operator);
    displayValue = result;
    firstNum = result;
  }
  // 這邊有點問題，按兩次運算符會出錯
  isSecondNum = true;
  operator = secondOperator;
}

// 監聽所有事件
document.querySelector('.container').addEventListener('click', (e) => {
  if (!e.target.classList.contains('btn')) return;

  if (e.target.classList.contains('all-clear')) {
    initCalculate();
    updateDisplay();
    return;
  }

  if (e.target.classList.contains('btn-op')) {
    handleOperator(e.target.attributes[1].value);
    updateDisplay();
    return;
  }

  if (e.target.classList.contains('point')) {
    inputPoint(e.target.attributes[1].value);
    updateDisplay();
    return;
  }

  inputNum(e.target.attributes[1].value);
  updateDisplay();
});
