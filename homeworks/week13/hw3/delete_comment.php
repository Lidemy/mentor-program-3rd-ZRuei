<?php
require_once('./conn.php');
require_once('./toolbox/check_login.php');
include_once('./toolbox/tools.php');




if (!isset($_POST['id']) && empty($_POST['id'])) {

  echo json_encode(array(
    'result' => 'fail',
    'message' => '刪除失敗'
  ));
  exit();
}

$id = $_POST['id'];

if (!$username) {
  echo json_encode(array(
    'result' => 'fail',
    'message' => '刪除失敗，非帳戶使用者'
  ));
}

$sql = "DELETE ZRuei_comments.*
  FROM ZRuei_comments
  JOIN ZRuei_users on ZRuei_comments.nickname = ZRuei_users.nickname
  WHERE ZRuei_comments.id = ? or ZRuei_comments.parent_id= ? AND username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iis", $id, $id, $username);
if ($stmt->execute()) {
  echo json_encode(array(
    'result' => 'success',
    'message' => '刪除成功'
  ));
} else {
  echo json_encode(array(
    'result' => 'fail',
    'message' => '刪除失敗'
  ));
}


$stmt->close();
