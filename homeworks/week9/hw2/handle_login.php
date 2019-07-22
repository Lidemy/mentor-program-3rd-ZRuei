<?php
require_once('./conn.php');
include_once('./toolbox/show_msg.php');

if (
  isset($_POST['username']) &&
  isset($_POST['password'])
) {
  if (
    !empty($_POST['username']) &&
    !empty($_POST['password'])
  ) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM ZRuei_users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if (!$result) {
      showMsg($conn->error, './login.php');
      exit();
    }
    if ($result->num_rows > 0) {
      setcookie('user_id', $row['id'], time() + 3600 * 24); //FIXME 跳轉時出現錯誤訊息，可能是rowid 
      showMsg('登入成功！', './index.php');
    } else {
      showMsg('帳號或密碼錯誤', './login.php');
    }
  } else {
    showMsg('請輸入帳號或是密碼!', './login.php');
  }
}
