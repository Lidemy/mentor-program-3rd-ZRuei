<?php
require_once('./conn.php');
include_once('./toolbox/show_msg.php');

if (isset($_POST['content']) && !empty($_POST['content'])) {
  $content = $_POST['content'];
  $nickname = $_POST['nickname'];
  $sql = "INSERT INTO ZRuei_comments (nickname, content) VALUES ( '$nickname', '$content') ";
  if ($conn->query($sql)) {
    showMsg('新增成功！', './index.php');
  } else {
    showMsg($conn->error, './index.php');
  }
} else {
  showMsg('請輸入內容', './index.php');
}

$conn->close();
header('Location: index.php');
