const request = require('request');

request('https://lidemy-book-store.herokuapp.com/books?_limit=10', (error, response, body) => {
  const booklist = JSON.parse(body);
  for (let i = 0; i < booklist.length; i += 1) {
    console.log(`${booklist[i].id} ${booklist[i].name}`);
  }
});
