<!DOCTYPE html>
<html lang="zh-Han-TW">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./css/board_style.css">
  <title>初號機－登入或註冊</title>
</head>

<body>
  <?php
  include_once('./layout/nav.php');
  ?>

  <div class="container">

    <div class="title">
      <h2>聽說我是留言板</h2>
      <p>會員註冊</p>
      <p>本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼</p>
    </div>

    <form class="form" action="./handle_register.php" method="POST">
      <div class="form__wrapper">
        <div class="form__input">暱稱<input name="nickname" type="text" placeholder="請輸入暱稱"></div>
        <div class="form__input">帳號<input name="username" type="text" placeholder="請輸入帳號"></div>
        <div class="form__input">密碼<input name="password" type="password" placeholder="請輸入密碼"></div>
        <div class="form__submit"><input type="submit" value="註冊"></div>
      </div>
    </form>

  </div>
</body>

</html>