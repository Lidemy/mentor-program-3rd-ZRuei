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
  ?>

  <div class="container">
    <h2>聽說我是留言板</h2>
    <p>本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼</p>

    <form class="message__form" action="./add_comment.php" method="POST">
      <input type="hidden" value="0" name="parent_id">
      <div class="message__form-input">
        <textarea name="content" type="text" rows="6" placeholder="來留個言吧⋯⋯"></textarea>
        <input type="hidden" name="nickname" value="<?php echo $name['nickname'] ?>">
      </div>
      <?php
      include('./layout/submit_btn.php');
      ?>
    </form>
    <?php
    include('./layout/count_page.php');
    ?>

    <div class="comment">

      <?php
      if ($stmt) {
        while ($row = $result->fetch_assoc()) {
        ?>
      <div class="comment__wrapper">
        <div class="comment__info">
          <div class="comment__info-author"><?php echo '作者：' . htmlspecialchars($row['nickname'], ENT_QUOTES, 'UTF-8') ?>
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
        <div class="comment__content">
          <?php echo htmlspecialchars($row['content'], ENT_QUOTES, 'UTF-8') ?>
        </div>

        <?php
        include('./layout/sub_comment.php');
        ?>

        <form class="comment__form" action="./add_comment.php" method="POST">
          <input type="hidden" name="parent_id" value="<?php echo $row['id'] ?>">
          <div class="comment__form-input">
            <h3>回覆留言</h3>
            <textarea name="content" type="text" rows="6" placeholder="來留個言吧⋯⋯"></textarea>
            <input type="hidden" name="nickname" value="<?php echo $name['nickname'] ?>"> 
          </div>
          <?php
          include('./layout/submit_btn.php');
          ?>
        </form>
      </div>
      <?php
        }
      }
      ?>

    </div>

</body>

</html>