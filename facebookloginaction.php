<?php 
//Session Details
session_start();
$fbid = $_REQUEST['fbid'];
$fbfname = $_REQUEST['fbfname'];
$fblname = $_REQUEST['fblname'];

if (isset($_SESSION['fbloginfailed'])) {
		unset($_SESSION['fbloginfailed']);
	}

if ($fbid == ""){
    //Facebook signin failed
    $_SESSION['fbloginfailed'] = 1;
    header('location:index.php');
}

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
    //User not in database, create entry
    $sql = "INSERT INTO users (facebookid, fname, lname)
    VALUES ('$fbid', '$fbfname', '$fblname')";


    if (mysqli_query($link, $sql)) {
        echo "User entry created successfully<br>";
        $_SESSION['auth'] = 1;

       header('location:index.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
        $_SESSION['signupfailedsqlerror'] = 1;
        header('location:index.php');
    }
}

$link->close();

?>