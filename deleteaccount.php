<?php

include("config.php");
session_start();

header("X-Frame-Options: DENY"); // Clickjacking 방지

//get post parameters

$user = mysqli_real_escape_string($db, $_POST['username']);
$old = mysqli_real_escape_string($db, $_POST['oldpasswd']);
$csrf = mysqli_real_escape_string($db, $_POST['csrf_token']); //CSRF 방지


//check session else redirect to login 

$check = mysqli_real_escape_string($db,$_SESSION['login_user']);
if($check==NULL)
{
	header("Location: /index.php");
}

//check values else redirect to settings page
if($check!=NULL && ($user==NULL || $old==NULL) )
{
header("Location: /settings.php");	
}

// CSRF 감지
if($_SESSION['csrf'] == $csrf) {

	// 진짜 사용자 확인
	if($check == $user) {

		$sql="DELETE from register where username='$user' AND password='$old'";

		echo htmlentities($sql);
		echo "</br>";

		$result=mysqli_query($db, $sql) or die('Error querying database.');

		if( mysqli_affected_rows($db) > 0)
		{
		echo "<h2>Account Deleted successfully</h2>";
		session_destroy();
		}
		else {
			echo "<h2>Incorrect Password</h2>";
		}
	} else {
		echo "<h2> You are not authorized!</h2>";
	}
} else {
	echo "<h2> CSRF detected... Get out here!</h2>";
}

mysqli_close($db);

?>

<html>
<body>
</br>

<a href="/settings.php" > <h3> Go back </h3> </a>
</br>
<a href="/index.php" > <h3>Login page </h3> </a>
</body>
</html>
