const ClientID = 'm96pajsf2cycypo7s8xs620d0r69v2';
const url = 'https://api.twitch.tv/kraken/streams/?game=League%20of%20Legends&limit=20';

const request = new XMLHttpRequest();

request.open('GET', url);
request.setRequestHeader('Client-ID', ClientID);
request.onload = () => {
  if (request.status >= 200 && request.status < 400) {
    const streamList = JSON.parse(request.responseText);
    for (let i = 0; i < streamList.streams.length; i += 1) {
      document.querySelector('.container').innerHTML += `
    <div class="stream"><a href="https://www.twitch.tv/${streamList.streams[i].channel.name}" target="_blank">
      <div class="stream__live">
        <img src="${streamList.streams[i].preview.large}">
      </div>
      <div class="stream__id">
        <div class="id__avatar"><img src="${streamList.streams[i].channel.logo}"></div>
        <div class="id_title">
          <div class="id__status">${streamList.streams[i].channel.status}</div>
          <div class="id__name">${streamList.streams[i].channel.name}</div>
        </div>
      </div></a>
    </div>`;
    }
  }
};
request.send();
