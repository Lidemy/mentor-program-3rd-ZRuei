<?php
require_once('./conn.php');
include_once('./toolbox/tools.php');

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
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO ZRuei_users(nickname, username, password) VALUES ('$nickname', '$username', '$password') ";
    if ($conn->query($sql)) {
      // $last_id = $conn->insert_id;
      setToken($conn, $username);
      showMsg('註冊成功！', './index.php');
    } else {
      showMsg('這帳號有人在用喔！', './register.php');
    }
  } else {
    showMsg('請輸入完整資訊!', './register.php');
  }
}
