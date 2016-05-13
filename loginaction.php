<?php 
//Session Details
session_start();
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$_SESSION['email'] = $email;

if (isset($_SESSION['fbloginfailed'])) {
		unset($_SESSION['fbloginfailed']);
	}

if (isset($_SESSION['signupfaileduserexists'])) {
		unset($_SESSION['signupfaileduserexists']);
	}

//Connect to database
$db="capool";
$host="au-cdbr-azure-east-a.cloudapp.net";
$dbuser="b549e4b6d7c04e";
$pw="2db4dbdd";

$link = new mysqli($host, $dbuser, $pw, $db);
if ($link->connect_errno) {
    echo "Failed to connect to MySQL: (" . $link->connect_errno . ") " . $link->connect_error;
}

echo "here";

// SQL Injection Protection
$email = stripslashes($email);
$password = stripslashes($password);
$email = mysqli_real_escape_string($link, $email);
$password = mysqli_real_escape_string($link, $password);

$sql="SELECT id FROM users WHERE email='$email' AND password='$password'";

$result=mysqli_query($link, $sql);

if (mysqli_num_rows($result) == 1) {
    if (isset($_SESSION['failed'])) {
		unset($_SESSION['failed']);
	}
	$_SESSION['auth'] = 1;
    $id=array();
    while ($row = mysqli_fetch_row($result)) $id[]=$row[0];
    mysqli_free_result($result);
    $_SESSION['userID'] = $id[0];
	header('location:index.php');
		echo "Correct!";
} else {
    $_SESSION['failed'] = 1;
	header('location:index.php');
	echo "Wrong!";
}

$link->close();

?>