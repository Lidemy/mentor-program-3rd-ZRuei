<?php
require_once('./conn.php');
include_once('./toolbox/tools.php');

if (
  isset($_POST['content']) &&
  !empty($_POST['content'])
) {
  $content = $_POST['content'];
  $id = $_POST['id'];
  $sql = "UPDATE ZRuei_comments SET content = ? WHERE id=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("si", $content, $id);
  $stmt->execute();

  if ($stmt) {
    header('Location: ./index.php');
  } else {
    showMsg($stmt->errno, './index.php');
  } 
} else {
  header('Location: ./index.php');
}

$stmt->close();
header('Location: ./index.php');
