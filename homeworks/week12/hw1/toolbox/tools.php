<?php
function showMsg($msg, $redirect)
{
  echo "<script>";
  echo   "alert('$msg');";
  echo   "window.location = '$redirect'";
  echo "</script>";
}

function setToken($conn, $username)
{
  $token = uniqid();
  $sql = "DELETE FROM ZRuei_certificates WHERE username=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $username);
  $stmt->execute();
  
  $sql_insert = "INSERT INTO ZRuei_certificates(username, token) VALUES (?, ?)";
  $stmt_insert = $conn->prepare($sql_insert);
  $stmt_insert->bind_param("ss", $username, $token);
  $stmt_insert->execute();
  setcookie('token', $token, time() + 3600 * 24);
}

function renderDelBtn($id)
{
  
  return "
    <div class='del-comment'>
      <form action='./delete_comment.php' method='POST'>
        <input type='hidden' name='id' value='$id'>
        <input type='submit' value='刪除留言'>
      </form>
    </div>
  ";
}

function renderEditBtn($id)
{
  return "
    <div class='edit-comment'>
      <form action='./edit_comment.php' method='GET'>
        <input type='hidden' name='id' value='$id'>
        <input type='submit' value='編輯留言'>
      </form>
    </div>
  ";
}
