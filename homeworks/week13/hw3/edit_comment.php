<!DOCTYPE html>
<html lang="zh-Han-TW">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./css/board_style.css">
  <title>聽說我是留言板</title>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="./js/board.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/board_style.css">
</head>

<body>
  <?php
  require_once('./conn.php');
  include_once('./toolbox/check_login.php');
  include_once('./toolbox/tools.php');
  require_once('layout/nav.php');
  ?>

  <div class="container">

    <h1 class="text-center display-4 title">編輯留言板</h1>
    <form class="mx-auto" action="handle_edit_comment.php" method="POST">
      <div class="form-group row">
        <div class="col-10 mx-auto">
          <textarea class="col-12" name="content" type="text" rows="6" placeholder="編輯留言"><?php

          $id = $_GET['id'];

          $sql = "SELECT ZRuei_comments.content FROM ZRuei_comments
          JOIN ZRuei_users on ZRuei_comments.nickname = ZRuei_users.nickname 
          WHERE ZRuei_comments.id = ? AND username = ?";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("is", $id, $username);
          $stmt->execute();
          $result = $stmt->get_result();
          $row = $result->fetch_assoc();
          echo $row['content'];
          ?></textarea>

          <input type="hidden" name="id" value="<?php echo $id ?>">

          <?php
          if ($is_login) {
            ?>
            <input class="btn btn-dark" type="submit" value="發佈">
          <?php
          } else {
            ?>
            <input class="btn btn-dark" type="submit" value="要登入才可以留言嘿" disabled="disabled">
          <?php
          }
          ?>
        </div>
      </div>
    </form>

</body>

</html>