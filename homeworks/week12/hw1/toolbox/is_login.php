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
        WHERE token = ?";
        $stmt = $conn->prepare($sql_login);
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
          $name = $result->fetch_assoc();

          ?>

          <div class="navbar-r">
            <h4>歡迎回來～ <?php echo htmlspecialchars($name['nickname'], ENT_QUOTES, 'UTF-8') ?></h4>
            <a class="navbar__item" href="./logout.php">登出</a>
          </div>

        <?php
        } else {
          $name = null;
          $is_login = false;
          include_once('./layout/alert.php');
        }
      }
    } else {
      $name = null;
      $is_login = false;
      include_once('./layout/alert.php');
    }
    ?>

  </div>
</nav>