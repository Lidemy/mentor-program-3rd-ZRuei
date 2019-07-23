<?php
function showMsg($msg, $redirect)
{
  echo "<script>";
  echo   "alert('$msg');";
  echo   "window.location = '$redirect'";
  echo "</script>";
} 
