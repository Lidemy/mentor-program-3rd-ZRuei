<?php
function showMsg($msg, $redirect)
{
  echo "<script>";
  echo   "alert('$msg');";
  echo   "window.location = '$redirect'";
  echo "</script>";
}
// 改為 PHP SESSION
// function setToken($conn, $username)
// {
//   $token = uniqid();
//   $sql = "DELETE FROM ZRuei_certificates WHERE username=?";
//   $stmt = $conn->prepare($sql);
//   $stmt->bind_param("s", $username);
//   $stmt->execute();
  
//   $sql_insert = "INSERT INTO ZRuei_certificates(username, token) VALUES (?, ?)";
//   $stmt_insert = $conn->prepare($sql_insert);
//   $stmt_insert->bind_param("ss", $username, $token);
//   $stmt_insert->execute();
//   setcookie('token', $token, time() + 3600 * 24);
// }


function escapeChars($str){
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function renderDelBtn($id)
{
  
  return "
  <span>
      <form class='del-post'>
        <input id='del-btn' class='btn btn-outline-dark btn-sm' type='submit' data-id='$id' value='刪除留言'>
      </form>
    </span>
  ";
}

function renderEditBtn($id)
{
  return "
  <span class='mr-2'>
    <form action='./edit_comment.php' method='GET'>
      <input type='hidden' name='id' value='$id'>
      <input class='btn btn-outline-dark btn-sm' type='submit' value='編輯留言'>
    </form>
  </span>
  ";
}
