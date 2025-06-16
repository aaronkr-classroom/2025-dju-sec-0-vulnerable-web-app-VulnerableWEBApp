<?php
include("config.php");
session_start();

header("X-Frame-Options: DENY"); // Clickjacking 방지
//get parameter

$url = mysqli_real_escape_string($db, $_POST['url']);
$csrf = mysqli_real_escape_string($db, $_POST['csrf_token']); //CSRF 방지


//check session else redirect to login page

$check = $_SESSION['login_user'];
if($check==NULL )
{
	header("Location: /index.php");
}


//check values else redirect to settings page
if($check!=NULL && $url==NULL  )
{
header("Location: /settings.php");	
}

// CSRF 확인
if($_SESSION['csrf'] == $scrf) {

  echo "<h1>Result from Secure server</h1>";

  // echo system("ping $url"); // 명령어 해크 할 수 있다
  echo system(escapeshellcmd("ping $url"));

} else {
  echo "<h2> CSRF detected... Get out here!</h2>";
}

?>
