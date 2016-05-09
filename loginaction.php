<?php 
//Session Details
session_start();
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];


//Connect to database
$link = mysqli_connect("127.0.0.1", "root", "password", "capool");

// Check connection
if ($link->connect_error) {
    die("CaPool table not found: " . $link->connect_error);
} 

// SQL Injection Protection
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($link, $username);
$password = mysqli_real_escape_string($link, $password);

$sql="SELECT * FROM users WHERE username='$username' AND password='$password'";

$result=mysqli_query($link, $sql);

if (mysqli_num_rows($result) == 1) {
    if (isset($_SESSION['failed'])) {
		unset($_SESSION['failed']);
	}
	$_SESSION['username'] = $username;
	$_SESSION['auth'] = 1;
	header('location:index.php');
		echo "Correct!";
} else {
    $_SESSION['failed'] = 1;
	header('location:index.php');
	echo "Wrong!";
}

$link->close();

?>