/* eslint-disable no-alert */
// 飛機 https://image.flaticon.com/icons/svg/1801/1801110.svg
// 電視 https://www.flaticon.com/free-icon/tv_1170586#term=TV&page=1&position=31
// YouTube https://www.flaticon.com/free-icon/youtube_1409936#term=youtube&page=1&position=67

const container = document.querySelector('.container');
const prizeBox = document.querySelector('.content__prize');

function getFirstPrize() {
  prizeBox.classList.add('hide');
  container.innerHTML = `
  <h1> 撒花！恭喜你中頭獎了！ </h1>
  <h2> 日本東京來回雙人遊！ </h2>
  <img src="./flight.png">`;
  container.classList.add('container__bg-get-first-prize');
}
function getSecondPrize() {
  prizeBox.classList.add('hide');
  container.classList.add('container__bg-get-second-prize');
  container.innerHTML = `
  <h1> 恭喜你抽中二獎！ </h1>
  <p> 90 吋電視一台！ </p>
  <img src="./tv.png">`;
}
function getThirdPrize() {
  prizeBox.classList.add('hide');
  container.classList.add('container__bg-get-third-prize');
  container.innerHTML = `
  <h1> 恭喜你抽中三獎！ </h1>
  <p> 知名 YouTuber 簽名握手會入場券一張，Bang！</p>
  <img src="./youtube.png">`;
}
function getNone() {
  prizeBox.classList.add('hide');
  container.classList.add('container__get-none');
  container.innerHTML = `
  <h1> 銘謝惠顧 </h1>
  <p> 多吃幾盤肉，下次一定會中獎 </p>`;
}

function getPrize(p) {
  switch (p) {
    case 'FIRST': getFirstPrize();
      break;

    case 'SECOND': getSecondPrize();
      break;

    case 'THIRD': getThirdPrize();
      break;

    case 'NONE': getNone();
      break;

    default:
      alert('王媽媽在忙啦，請再試一次！');
      break;
  }
}


document.querySelector('.click-btn').addEventListener('click', () => {
  const request = new XMLHttpRequest();
  const lotteryURL = 'https://dvwhnbka7d.execute-api.us-east-1.amazonaws.com/default/lottery';
  request.open('GET', lotteryURL);
  request.onload = () => {
    if (request.status >= 200 && request.status < 400) {
      const { prize } = JSON.parse(request.responseText);
      getPrize(prize);
    } else {
      alert('王媽媽在忙啦，請再試一次！');
    }
  };
  request.send();
});
