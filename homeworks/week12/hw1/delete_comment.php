<?php

require_once('./conn.php');
include_once('./toolbox/tools.php');

// FIXME 可以改 value 刪除非本人留言 
if (isset($_POST['id']) && !empty($_POST['id'])) {

  $id = $_POST['id'];
  $sql = "DELETE FROM ZRuei_comments WHERE id = ? OR parent_id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ii", $id, $id);
  $stmt->execute();
  if ($stmt) {
    header('Location: ./index.php');
  } else {
    showMsg($stmt->errno, './index.php');
  }
} else {
  showMsg('操作錯誤！請再試一次', './index.php');
}

$stmt->close();
header('Location: ./index.php');
