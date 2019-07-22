<?php
require_once('./conn.php');
include_once('./toolbox/show_msg.php');

if (
  isset($_POST['nickname']) &&
  isset($_POST['username']) &&
  isset($_POST['password'])
) {
  if (
    !empty($_POST['nickname']) &&
    !empty($_POST['username']) &&
    !empty($_POST['password'])
  ) {
    $nickname = $_POST['nickname'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO ZRuei_users(nickname, username, password) VALUES ('$nickname', '$username', '$password') ";
    if ($conn->query($sql)) {
      $last_id = $conn->insert_id;
      setcookie('user_id', $last_id, time() + 3600 * 24);
      showMsg('註冊成功！', './index.php');
    } else {
      showMsg('這帳號有人在用喔！', './register.php');
    }
  } else {
    showMsg('請輸入完整資訊!', './register.php');
  }
}
