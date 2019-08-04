<?php
require_once('./conn.php');
include_once('./toolbox/tools.php');
?>
<!DOCTYPE html>
<html lang="zh-Han-TW">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./css/board_style.css">
  <title>聽說我是留言板</title>
</head>

<body>
  <?php
  require_once('./toolbox/is_login.php');
  $page = 1;

  if (isset($_GET['page']) && !empty($_GET['page'])){
    $page = (int)$_GET['page'];
  }
  $in_one_page = 10;
  $start = $in_one_page * ($page - 1);
  $sql = "SELECT * FROM ZRuei_comments ORDER BY created_at DESC LIMIT $start, $in_one_page";
  $result = $conn->query($sql);

  ?>
  
  <div class="container">
    <h2>聽說我是留言板</h2>
    <p>本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼</p>

    <form class="message__form" action="./add_comment.php" method="POST">
      <div class="message__content">
        <textarea name="content" type="text" rows="6" placeholder="來留個言吧⋯⋯"></textarea>
        <input type="hidden" name="nickname" value="<?php echo $name['nickname'] ?>">
      </div>
      <?php
      if ($is_login) {
        ?>
        <input type="submit" value="發佈">
      <?php
      } else {
        ?>
        <input type="submit" value="要登入才可以留言嘿" disabled="disabled">
      <?php
      }
      ?>
    </form>

    <?php
    $count_page_sql = "SELECT count(*) FROM ZRuei_comments";
    $count_page_result = $conn->query($count_page_sql);
    if (
      $count_page_result &&
      $count_page_result->num_rows > 0
    ) {
      $count = $count_page_result->fetch_assoc()['count(*)'];
      $in_one_page = 10;
      $total_page = ceil($count / $in_one_page);
      echo "<div class='pages'>";
      for ($i = 1; $i <= $total_page; $i++) {
        echo "<a href='./index.php?page=$i'>$i</a>";
      }
      echo "</div>";
    }
    ?>

    <div class="comment">

      <?php
      if ($result) {
        while ($row = $result->fetch_assoc()) {
          ?>
          <div class="comment__wrapper">
            <div class="comment__info">
              <div class="comment__info-author"><?php echo '作者：' . $row['nickname']; ?>
              </div>
              <div class="comment__info-timestamp"><?php echo $row['created_at']; ?>
              </div>
              <?php
              if (
                $is_login &&
                $name['nickname'] === $row['nickname']
              ) {
                echo renderEditBtn($row['id']);
                echo renderDelBtn($row['id']);
              }
              ?>
            </div>
            <div class="comment_content">
              <?php echo $row['content']; ?>
            </div>
          </div>

        <?php
        }
      }
      ?>

    </div>

</body>

</html>