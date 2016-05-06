<?php 
session_start();
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
if ($username == "user" && $password == "password"){
    
	if (isset($_SESSION['failed'])) {
		unset($_SESSION['failed']);
	}
	$_SESSION['username'] = $username;
	$_SESSION['auth'] = 1;
	header('location:index.php');
		echo "Correct!";
}
else{
	$_SESSION['failed'] = 1;
	header('location:index.php');
	echo "Wrong!";
	
}
?>