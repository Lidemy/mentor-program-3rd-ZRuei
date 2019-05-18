const request = require('request');
const process = require('process');

if (process.argv[2] === 'list') {
  request('https://lidemy-book-store.herokuapp.com/books?_limit=20',
    (error, response, body) => {
      const booklist = JSON.parse(body);
      for (let i = 0; i < booklist.length; i += 1) {
        console.log(`${booklist[i].id} ${booklist[i].name}`);
      }
    });
}


if (process.argv[2] === 'read') {
  request(`https://lidemy-book-store.herokuapp.com/books/${process.argv[3]}`,
    (error, response, body) => {
      const booklist = JSON.parse(body);
      console.log(`${booklist.id} ${booklist.name}`);
    });
}
