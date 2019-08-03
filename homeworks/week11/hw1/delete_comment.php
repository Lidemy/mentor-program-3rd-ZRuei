<?php

require_once('./conn.php');
include_once('./toolbox/tools.php');

if (isset($_POST['id']) && !empty($_POST['id'])) {
  $id = $_POST['id'];
  $sql = "DELETE FROM ZRuei_comments WHERE id=$id";
  if ($conn->query($sql)) {
    header('Location: ./index.php');
  } else {
    showMsg($conn->error, './index.php');
  }
} else {
  showMsg('操作錯誤！請再試一次', './index.php');
}

$conn->close();
header('Location: ./index.php');
