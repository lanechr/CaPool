<?php 
//Session Details
session_start();
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

if (isset($_SESSION['fbloginfailed'])) {
		unset($_SESSION['fbloginfailed']);
	}

//Connect to database
$link = mysqli_connect("127.0.0.1", "root", "password", "capool");

// Check connection
if ($link->connect_error) {
    die("CaPool table not found: " . $link->connect_error);
} 

// SQL Injection Protection
$email = stripslashes($email);
$password = stripslashes($password);
$email = mysqli_real_escape_string($link, $email);
$password = mysqli_real_escape_string($link, $password);

$sql="SELECT * FROM users WHERE email='$email' AND password='$password'";

$result=mysqli_query($link, $sql);

if (mysqli_num_rows($result) == 1) {
    if (isset($_SESSION['failed'])) {
		unset($_SESSION['failed']);
	}
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