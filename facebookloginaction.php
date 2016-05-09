<?php 
//Session Details
session_start();
$fbid = $_REQUEST['fbid'];
echo $fbid;
$fbfname = $_REQUEST['fbfname'];
$fblname = $_REQUEST['fblname'];

//Connect to database
$link = mysqli_connect("127.0.0.1", "root", "password", "capool");

// Check connection
if ($link->connect_error) {
    die("CaPool table not found: " . $link->connect_error);
} 

// SQL Injection Protection
$fbid = stripslashes($fbid);
$fbid = mysqli_real_escape_string($link, $fbid);
$fbfname = stripslashes($fbfname);
$fbfname = mysqli_real_escape_string($link, $fbfname);
$fblname = stripslashes($fblname);
$fblname = mysqli_real_escape_string($link, $fblname);

$sql="SELECT * FROM users WHERE facebookid='$fbid'";

$result=mysqli_query($link, $sql);

if (mysqli_num_rows($result) == 1) {
    if (isset($_SESSION['failed'])) {
		unset($_SESSION['failed']);
	}
	$_SESSION['auth'] = 1;
	header('location:index.php');
		echo "Correct!";
} else {
    $_SESSION['fbid'] = $fbid;
    $_SESSION['fbfname'] = $fbfname;
    $_SESSION['fblname'] = $fblname;
	header('location:facebooksignupaction.php');
}

$link->close();

?>