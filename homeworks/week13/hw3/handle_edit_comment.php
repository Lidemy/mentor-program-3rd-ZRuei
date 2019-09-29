<?php
require_once('./conn.php');
require_once('./toolbox/check_login.php');
include_once('./toolbox/tools.php');

if (
  isset($_POST['content']) &&
  !empty($_POST['content'])
) {
  $content = $_POST['content'];
  $id = $_POST['id'];
  $sql = "UPDATE ZRuei_comments JOIN ZRuei_users on ZRuei_comments.nickname = ZRuei_users.nickname
  SET content = ? 
  WHERE ZRuei_comments.id = ? AND username = ?";

  echo $sql;
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sis", $content, $id, $username);


  if ($stmt->execute()) {
    header('Location: ./index.php');
  } else {
    showMsg($stmt->error, './index.php');
  }
} else {
  header('Location: ./index.php');
}

$stmt->close();
header('Location: ./index.php');
