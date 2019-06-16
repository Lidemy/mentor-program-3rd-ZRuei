const gameZone = document.querySelector('body');
const retryButton = document.querySelector('.btn');

let startTime = null;
let clickTime = 0;
let timeOut = null;
let gameOver = false;

function startGame() {
  gameOver = false;
  startTime = null;
  clickTime = 0;
  gameZone.querySelector('.wrapper').style.background = 'rgb(229, 248, 173)';
  timeOut = setTimeout(() => {
    gameZone.querySelector('.wrapper').style.background = 'rgb(89, 126, 92)';
    startTime = new Date();
  }, Math.random() * 3000);
}

startGame();


gameZone.addEventListener('click', () => {
  if (gameOver) return;
  clickTime = new Date();
  if (startTime === null) {
    clearTimeout(timeOut);
    // eslint-disable-next-line no-alert
    alert('太心急囉～再試試看吧！');
  } else {
    // eslint-disable-next-line no-alert
    alert(`你的反應時間： ${(clickTime - startTime) / 1000} 秒`);
  }
  document.querySelector('.btn').classList.remove('hidden');
  gameOver = true;
});

retryButton.addEventListener('click', (e) => {
  e.stopPropagation();
  document.querySelector('.btn').classList.add('hidden');
  startGame();
});
