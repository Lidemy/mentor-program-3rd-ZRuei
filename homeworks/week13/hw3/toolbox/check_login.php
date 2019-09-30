<?php

require_once 'conn.php';
session_start();
$username = null;
$nickname = null;

if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
  $username = $_SESSION['username'];
  $nickname = $_SESSION['nickname'];
} else {
  $username = null;
  $nickname = null;
}
