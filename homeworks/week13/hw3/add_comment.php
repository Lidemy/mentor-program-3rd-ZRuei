<?php

require_once('./conn.php');
require_once('./toolbox/tools.php');
require_once 'toolbox/check_login.php';


if (!isset($_POST['content']) && empty($_POST['content'])) {
  echo json_encode(array(
    'result' => 'failed',
    'message' => '請輸入內容'
  ));
  exit();
}

$content = $_POST['content'];
$parent_id = $_POST['parent_id'];

$sql = "INSERT INTO ZRuei_comments (nickname, content, parent_id) 
VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $nickname, $content, $parent_id);





if ($stmt->execute()) {
  $last_id = $stmt->insert_id;
  $sql = "SELECT * FROM ZRuei_comments WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $last_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();

  echo json_encode(array(
    'result' => 'success',
    'message' => '新增成功',
    'id' => $last_id,
    'nickname' => $row['nickname'],
    'createdAt' => $row['created_at'],
    'contents' => $row['content']
  ));
} else {
  echo json_encode(array(
    'result' => 'failed',
    'message' => '新增失敗'
  ));
}

$stmt->close();


// header('Location: ./index.php');
