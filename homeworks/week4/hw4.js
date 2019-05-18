const request = require('request');

request({
  url: 'https://api.twitch.tv/helix/games/top',
  headers: {
    'Client-ID': 'm96pajsf2cycypo7s8xs620d0r69v2',
  },
},
(error, response, body) => {
  console.log(response.statusCode);
  const topGame = JSON.parse(body).data;
  for (let i = 0; i < topGame.length; i += 1) {
    if (!error && response.statusCode === 200) {
      console.log(`${topGame[i].id} ${topGame[i].name}`);
    }
  }
});
