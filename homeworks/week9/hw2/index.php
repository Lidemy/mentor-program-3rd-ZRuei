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
  require_once('./conn.php');
  include_once('./toolbox/is_login.php');
  ?>
  <div class="container">
    <h2>聽說我是留言板</h2>

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

    <div class="comment">

      <?php
      $sql = "SELECT * FROM ZRuei_comments ORDER BY created_at DESC";
      $result = $conn->query($sql);

      if ($result) {
        while ($row = $result->fetch_assoc()) {
          ?>
          <div class="comment__wrapper">
            <div class="comment__info">
              <div class="comment__info-author"><?php echo '發言者：' . $row['nickname']; ?></div>
              <div class="comment__info-timestamp"><?php echo $row['created_at']; ?></div>
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