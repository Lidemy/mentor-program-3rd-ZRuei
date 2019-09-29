<?php

// setcookie('token', '', time() + 3600 * 24);
session_start();
session_unset();
session_destroy();

header('Location: ./index.php');
