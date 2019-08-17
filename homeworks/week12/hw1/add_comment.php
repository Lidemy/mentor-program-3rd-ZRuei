<?php
require_once('./conn.php');
include_once('./toolbox/tools.php');

if (isset($_POST['content']) && !empty($_POST['content'])) {
  $content = $_POST['content'];
  $nickname = $_POST['nickname'];
  $parent_id = $_POST['parent_id'];
  $sql = "INSERT INTO ZRuei_comments (nickname, content, parent_id) VALUES (?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssi", $nickname, $content, $parent_id);
  $stmt->execute();
  if ($stmt) {
    header('Location: ./index.php');
  } else {
    showMsg($stmt->errno, './index.php');
  }
} else {
  showMsg('請輸入內容', './index.php');
}

$stmt->close();
header('Location: ./index.php');

