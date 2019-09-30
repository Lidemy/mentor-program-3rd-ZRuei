<?php
require_once ('conn.php');
require_once ('toolbox/check_login.php');
?>
<nav class="navbar navbar-light bg-light">

  <div class="container">
    <div class="row col-10 mx-auto justify-content-between">
      <a class="navbar-brand" href="./index.php">MAO</a>
      <ul class="nav">

        <?php
        if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
          $is_login = true;
          // $token = $_COOKIE['token'];
          $username = $_SESSION['username'];
          $nickname = $_SESSION['nickname'];
          if ($is_login) {
            echo "<li class='nav-item'> ";
            echo   "<a class='nav-link text-dark'>歡迎回來  ";
            echo    escapeChars($nickname);
            echo    "</a>";
            echo "</li>";
            echo "<li class='nav-item'><a class='nav-link text-dark' href='logout.php'> 登出";
            echo "</a></li>";
          } else {
            $is_login = false;
            include_once('./layout/alert.php');
          }
        } else {
          $is_login = false;
          include_once('./layout/alert.php');
        }
        ?>
        
      </ul>
    </div>
  </div>

</nav>