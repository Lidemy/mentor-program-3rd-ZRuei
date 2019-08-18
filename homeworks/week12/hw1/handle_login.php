<?php
require_once('./conn.php');
include_once('./toolbox/tools.php');

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

    $stmt = $conn->prepare("SELECT * FROM ZRuei_users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
  
    $result = $stmt->get_result();

    if (!$result) {
      showMsg($stmt->errno, './login.php');
      exit();
    }

    // 帳號跟密碼都錯誤，資料庫找不到資料時
    if ($result->num_rows <= 0) {
      showMsg('帳號或密碼錯誤', './login.php');
      exit();
    }

    $row = $result->fetch_assoc();
    $hash_password = $row['password'];

    if (password_verify($password, $hash_password) ){
      //實作上產生 session id 會比較複雜 
      setToken($conn, $username);
      showMsg('登入成功！', './index.php');
    } else {
      showMsg('帳號或密碼錯誤', './login.php');
      exit();
    }
  } else {
    showMsg('請輸入帳號或是密碼!', './login.php');
    exit();
  }
}
