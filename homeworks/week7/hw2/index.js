/* eslint-disable no-alert */
/* eslint-disable no-loop-func */

const inputList = document.querySelectorAll('input');
let isChecked = false;
let isRadioChecked = false;


for (let i = 0; i < inputList.length - 1; i += 1) {
  inputList[i].addEventListener('blur', (e) => {
    if (inputList[i].value === '') {
      e.target.parentNode.classList.add('js-form');
      e.target.style.borderBottom = '1px solid #d93025';
    } else {
      e.target.parentNode.classList.remove('js-form');
      e.target.style.borderBottom = '1px solid rgba(0, 0, 0, 0.12)';
    }
    if (inputList[2].checked === true || inputList[3].checked === true) {
      inputList[2].parentElement.parentElement.classList.remove('js-form');
      isRadioChecked = true;
    }
  });
}

document.querySelector('button').addEventListener('click', (e) => {
  if (isChecked === true && isRadioChecked === true) {
    alert('表單已成功送出');
    window.location.reload();
  } else if (isChecked === false || isRadioChecked === false) {
    e.preventDefault();
    alert('尚有未填寫項目');
    for (let i = 0; i < inputList.length - 1; i += 1) {
      if (inputList[i].value === '') {
        inputList[i].parentNode.classList.add('js-form');
        isChecked = false;
      } else if (inputList[2].checked === false && inputList[3].checked === false) {
        inputList[2].parentElement.parentElement.classList.add('js-form');
        isRadioChecked = false;
      } else {
        isChecked = true;
      }
    }
  }
});

/*
[todo]
1. email 驗證
2. 如游標沒有移開則無法判定是否有填寫，提交會出現問題
3. radio 還需要優化，目前用很陽春的方法綁在一起， 造成點按圓圈時卡頓
4. loop 內有 function 問題先忽略
*/
