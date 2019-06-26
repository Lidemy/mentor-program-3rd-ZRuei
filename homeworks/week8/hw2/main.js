/* eslint-disable no-alert */

const url = 'https://lidemy-book-store.herokuapp.com/posts?_order=desc&_limit=20&_sort=id';
const urlPost = 'https://lidemy-book-store.herokuapp.com/posts';
const msgWrap = document.querySelector('.wrapper__message');

const message = {
  content: '',
};


function renderHtml(data) {
  for (let i = 0; i < data.length; i += 1) {
    msgWrap.innerHTML
    += `
    <div class="message">
      <div class="messagebox">
        <div class="messagebox-id">訪客 ${data[i].id}</div>
        <div class="messagebox-content"> ${data[i].content ? data[i].content : '這人不知道在打什麼王媽看不懂'} </div>
      </div>
    </div>`;
  }
}

function getMessages() {
  const request = new XMLHttpRequest();
  request.open('GET', url);
  request.send();
  request.onload = () => {
    if (request.status >= 200 && request.status < 400) {
      const messageContent = JSON.parse(request.responseText);
      msgWrap.innerHTML = '';
      renderHtml(messageContent);
    } else {
      alert('留言板爆炸了');
    }
  };
}


function checkInput(str, event) {
  if (event.target.parentElement.firstElementChild.value !== '') {
    return JSON.stringify(str);
  }
  alert('你還沒有輸入內容誒');
  return false;
}

document.querySelector('textarea').addEventListener('input', (e) => {
  message.content = e.target.value;
});

getMessages();

document.querySelector('button').addEventListener('click', (e) => {
  const postMessage = new XMLHttpRequest();

  postMessage.open('post', urlPost);
  postMessage.setRequestHeader('content-type', 'application/json');
  postMessage.onload = () => {
    if (postMessage.status >= 200 && postMessage.status < 400) {
      getMessages();
    }
  };
  postMessage.send(checkInput(message, e));


  e.target.parentElement.firstElementChild.value = '';
});
