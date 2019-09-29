<!DOCTYPE html>
<html lang="zh-Han-TW">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>MAO－登入或註冊</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/board_style.css">
</head>

<body>

<?php
  include_once './layout/nav.php';
  ?>

  <div class="container">
    <div class="row">
      <div class="col-10 mx-auto">
        <h1 class="text-center display-4 title">MaoMao Chat Room</h2>
          <p class="text-center lead title">會員登入</p>

          <form class="col-10 mx-auto" action="./handle_login.php" method="POST">
            <div class="form-group row">
              <label for="username" class="col-2 col-form-label label-modify">帳號</label>
              <div class="col-10">
                <input class="form-control" id="username" name="username" type="text" placeholder="請輸入帳號">
              </div>
              <label for="password" class="col-2 col-form-label label-modify">密碼</label>
              <div class="col-10">
                <input class="form-control" id="password" name="password" type="password" placeholder="請輸入密碼">
              </div>
              <button class="btn btn-dark btn-md btn-modify" type="submit">登入</button>
            </div>
          </form>

      </div>
    </div>
  </div>
</body>

</html>