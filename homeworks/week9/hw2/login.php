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

  <nav>
    <div class="navbar">
      <div class="navbar-l">
        <a class="navbar__item" href="./index.php">首頁</a>
      </div>
      <div class="navbar-r">
        <a class="navbar__item" href="./login.php">登入</a>
        <a class="navbar__item" href="./register.php">註冊</a>
      </div>
    </div>
  </nav>

  <div class="container">

    <div class="title">
      <h2>聽說我是留言板</h2>
      <p>會員登入</p>
    </div>

    <form class="form" action="./handle_login.php" method="POST">
      <div class="form__wrapper">
        <div class="form__input">帳號<input name="username" type="text" placeholder="請輸入帳號"></div>
        <div class="form__input">密碼<input name="password" type="password" placeholder="請輸入密碼"></div>
        <div class="form__submit"><input type="submit" value="登入"></div>
      </div>
    </form>

  </div>
</body>

</html>