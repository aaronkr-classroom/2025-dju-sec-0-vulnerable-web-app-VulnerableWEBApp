<?php

include("config.php");
session_start();

header("X-Frame-Options: DENY"); // Clickjacking 방지

//destroy created session and redirect to login page

$_SESSION['login_user'] = NULL;
$_SESSION['csrf'] = NULL;
session_destroy();

header("Location: /index.php");

?>