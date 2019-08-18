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
  include_once('./toolbox/tools.php');
  
  ?>
  <div class="container">
    <h2>編輯留言板</h2>
    <p>本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼</p>

    <form class="message__form" action="./handle_edit_comment.php" method="POST">
      <div class="message__content">
        <textarea name="content" type="text" rows="6" placeholder="編輯留言"><?php
        // FIXME 可以改 value 變更非本人留言 
        $id = $_GET['id'];
        $sql = "SELECT content FROM ZRuei_comments WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        echo $row['content'];
        ?></textarea>
        <!-- FIXME 帶入留言後會出現奇怪的空格
        解法：把 php 標籤緊黏 textarea -->
        <input type="hidden" name="id" value="<?php echo $id ?>">
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

</body>

</html>