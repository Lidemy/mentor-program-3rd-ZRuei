<?php
require_once('./conn.php');
include_once('./toolbox/tools.php');

if (
  isset($_POST['content']) &&
  !empty($_POST['content'])
) {
  $content = $_POST['content'];
  $id = $_POST['id'];
  $sql = "UPDATE ZRuei_comments SET content='$content' WHERE id=$id";
  if ($conn->query($sql)) {
    header('Location: ./index.php');
  } else {
    showMsg($conn->error, './index.php');
  } 
} else {
  header('Location: ./index.php');
}

$conn->close();
header('Location: ./index.php');
