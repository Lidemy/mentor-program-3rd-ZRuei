const request = require('request');
const process = require('process');

switch (process.argv[2]) {
  case 'list':
    request('https://lidemy-book-store.herokuapp.com/books?_limit=20',
      (error, response, body) => {
        const booklist = JSON.parse(body);
        // 不建議寫死 response.statusCode === 200，萬一哪天 statusCode 變成 204 所以一般都是寫 >= 200 & < 300
        if (error) {
          console.log('抓取失敗', error);
          return;
        }
        for (let i = 0; i < booklist.length; i += 1) {
          console.log(`${booklist[i].id} ${booklist[i].name}`);
        }
      });
    break;

  case 'read':
    request(`https://lidemy-book-store.herokuapp.com/books/${process.argv[3]}`,
      (error, body) => {
        const booklist = JSON.parse(body);
        if (error) {
          console.log('抓取失敗', error);
          return;
        }
        console.log(`${booklist.id} ${booklist.name}`);
      });
    break;

  case 'delete':
    request.delete(`https://lidemy-book-store.herokuapp.com/books/${process.argv[3]}`,
      (error) => {
        // const booklist = JSON.parse(body);
        if (error) {
          console.log(error, '刪除失敗');
          return;
        }
        console.log(`${process.argv[3]} 刪除成功`);
      });
    break;

  case 'create':
    request.post({
      url: 'https://lidemy-book-store.herokuapp.com/books/',
      form: { name: process.argv[3] },
    },
    (error, response, body) => {
      const booklist = JSON.parse(body);
      if (error) {
        console.log(error, '新增失敗');
        return;
      }
      console.log(`${booklist.id} ${booklist.name} 已新增成功`);
    });
    break;

  case 'update':
    request.patch({
      url: `https://lidemy-book-store.herokuapp.com/books/${process.argv[3]}`,
      form: {
        name: process.argv[4],
      },
    },
    (error) => {
      if (error) {
        console.log(error, '新增失敗');
        return;
      }
      console.log(`${process.argv[3]} ${process.argv[4]} 已修改成功`);
    });
    break;

  default:
    console.log('參數有誤，請重新輸入');
}
