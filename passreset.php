<?php
include ("config.php");

$token = mysqli_real_escape_string($db, $_GET['token']);
$user = mysqli_real_escape_string($db, $_GET['user']);
$pass = mt_rand();

$count = 0; // 데이터베이스 결과 행 개수

$sql = "SELECT email FROM reset WHERE token='$token'"; // 이메일 확인
$result = mysqli_query($db, $sql) or die ("Error querying database");

// Fetch values from database
if ($row = mysqli_fetch_array($result)) {
    $checkemail = $row['email'];
    $count = 1;
}

$sql = "SELECT username FROM register WHERE email='$checkemail'"; // 사용자 이름 확인
$result = mysqli_query($db, $sql) or die("Error querying database");

// Fetch values from database
if ($row = mysqli_fetch_array($result)) {
    $checkuser = $row['username'];
}

// 이메일과 사용자 이름 확인
if ($count == 1 && $checkuser == $user) {

    $query = "Update register set password='$pass' where username='$user' AND email='$checkemail'";
    if (mysqli_query($db, $query) == 1)
    {

        echo '<h2>Your new new password is   ' . $pass . '.</h2>';
        
        $sql1 = "DELETE FROM reset WHERE token='$token'";
        mysqli_query($db, $sql) or die("Error querying DB.");
    }
    else{
        echo "<h2>Error changing password or invaild reset link.</h2>";
    }
} else {
    echo "<h2>Invaild reset link.</h2>";
}

?>