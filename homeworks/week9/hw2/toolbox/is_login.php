<nav>
  <div class="navbar">
    <div class="navbar-l">
      <a class="navbar__item" href="./index.php">首頁</a>
    </div>
    <?php
    $is_login = false;
    require_once('./conn.php');
    if (isset($_COOKIE['user_id']) && !empty($_COOKIE['user_id'])) {
      $is_login = true;
      $user_id = $_COOKIE['user_id'];
      if ($is_login) {
        $sql_login = "SELECT * FROM ZRuei_users WHERE id='$user_id'";
        $result = $conn->query($sql_login);
        if ($result->num_rows > 0) {
          $name = $result->fetch_assoc();
          ?>

          <div class="navbar-r">
            <h4>歡迎回來～ <?php echo $name['nickname']; ?></h4>
            <a class="navbar__item" href="./logout.php">登出</a>
          </div>

        <?php
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