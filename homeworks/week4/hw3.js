const request = require('request');
const process = require('process');

switch (process.argv[2]) {
  case 'list':
    request('https://lidemy-book-store.herokuapp.com/books?_limit=20',
      (error, response, body) => {
        const booklist = JSON.parse(body);
        if (!error && response.statusCode === 200) {
          for (let i = 0; i < booklist.length; i += 1) {
            console.log(`${booklist[i].id} ${booklist[i].name}`);
          }
        }
      });
    break;

  case 'read':
    request(`https://lidemy-book-store.herokuapp.com/books/${process.argv[3]}`,
      (error, response, body) => {
        const booklist = JSON.parse(body);
        if (!error && response.statusCode === 200) {
          console.log(`${booklist.id} ${booklist.name}`);
        }
      });
    break;

  case 'delete':
    request.delete(`https://lidemy-book-store.herokuapp.com/books/${process.argv[3]}`,
      // eslint-disable-next-line no-unused-vars
      (error, response, _body) => {
        // const booklist = JSON.parse(body);
        if (!error && response.statusCode === 200) {
          console.log(`${process.argv[3]} 刪除成功`);
        }
      });
    break;

  case 'create':
    request.post({
      url: 'https://lidemy-book-store.herokuapp.com/books/',
      form: { name: process.argv[3] },
    },
    (error, response, body) => {
      const booklist = JSON.parse(body);
      if (!error && response.statusCode === 201) {
        console.log(`${booklist.id} ${booklist.name} 已新增成功`);
      }
    });
    break;

  case 'update':
    request.patch({
      url: `https://lidemy-book-store.herokuapp.com/books/${process.argv[3]}`,
      form: {
        name: process.argv[4],
      },
    },
    // eslint-disable-next-line no-unused-vars
    (error, response, _body) => {
      if (!error && response.statusCode === 200) {
      // const booklist = JSON.parse(body);
        console.log(`${process.argv[3]} ${process.argv[4]} 已修改成功`);
      }
    });
    break;

  default:
    console.log('參數有誤，請重新輸入');
}
