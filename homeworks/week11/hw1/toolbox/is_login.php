<nav>
  <div class="navbar">
    <div class="navbar-l">
      <a class="navbar__item" href="./index.php">首頁</a>
    </div>
    <?php
    $is_login = false;
    require_once('./conn.php');
    if (isset($_COOKIE['token']) && !empty($_COOKIE['token'])) {
      $is_login = true;
      $token = $_COOKIE['token'];
      if ($is_login) {
        $sql_login = "SELECT * FROM ZRuei_certificates
        LEFT JOIN ZRuei_users
        ON ZRuei_certificates.username = ZRuei_users.username
        WHERE token = '$token'";
        $result = $conn->query($sql_login);
        if ($result->num_rows > 0) {
          $name = $result->fetch_assoc();

          ?>

          <div class="navbar-r">
            <h4>歡迎回來～ <?php echo $name['nickname'] ?></h4>
            <a class="navbar__item" href="./logout.php">登出</a>
          </div>

        <?php
        } else {
          echo "系統錯誤";
        }
      }
    } else {
      ?>
      <div class="navbar-r">
        <h4 class='alert'>請先登入或註冊</h4>
        <a class='navbar__item' href='./register.php'>註冊</a>
        <a class='navbar__item' href='./login.php'>登入</a>
      </div>
    <?php
    }
    ?>

  </div>
</nav>