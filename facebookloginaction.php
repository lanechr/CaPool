<?php 
//Session Details
session_start();
$fbid = $_REQUEST['fbid'];
$fbfname = $_REQUEST['fbfname'];
$fblname = $_REQUEST['fblname'];
$fbemail = $_REQUEST['fbemail'];

if (isset($_SESSION['fbloginfailed'])) {
		unset($_SESSION['fbloginfailed']);
	}

if ($fbid == ""){
    //Facebook signin failed
    $_SESSION['fbloginfailed'] = 1;
    header('location:index.php');
    exit;
}

$db="capool";
$host="au-cdbr-azure-east-a.cloudapp.net";
$dbuser="b549e4b6d7c04e";
$pw="2db4dbdd";

$link = new mysqli($host, $dbuser, $pw, $db);
if ($link->connect_errno) {
    echo "Failed to connect to MySQL: (" . $link->connect_errno . ") " . $link->connect_error;
}

// SQL Injection Protection
$fbid = stripslashes($fbid);
$fbid = mysqli_real_escape_string($link, $fbid);
$fbfname = stripslashes($fbfname);
$fbfname = mysqli_real_escape_string($link, $fbfname);
$fblname = stripslashes($fblname);
$fblname = mysqli_real_escape_string($link, $fblname);
$fbemail = stripslashes($fbemail);
$fbemail = mysqli_real_escape_string($link, $fbemail);

$sql="SELECT id FROM users WHERE facebookid='$fbid'";

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
    $_SESSION['FBID'] = $fbid;
	header('location:index.php');
		echo "Correct!";
} else {
    //User not in database, create entry
    $sql = "INSERT INTO users (email, facebookid, fname, lname)
    VALUES ('$fbemail', '$fbid', '$fbfname', '$fblname')";

    if (!($stmt = $link->query($sql))) {
        $sql="SELECT id FROM users WHERE email='$fbemail'";
        $result=mysqli_query($link, $sql);
        if (mysqli_num_rows($result) == 1) {
        $sql="UPDATE users SET facebookid='$fbid', fname='$fbfname', lname='$fblname' WHERE email='$fbemail'";
        if (!($stmt = $link->query($sql))) {
           echo "Query failed: (" . $link->errno . ") " . $link->error;
             echo "Error: " . $sql . "<br>" . mysqli_error($link);
            $_SESSION['signupfailedsqlerror'] = 1;
            header('location:index.php'); 
        } else {
            echo "User entry updated successfully<br>";
            $_SESSION['auth'] = 1;
            $sql="SELECT id FROM users WHERE facebookid='$fbid'";
            $result=mysqli_query($link, $sql);
            $id=array();
            while ($row = mysqli_fetch_row($result)) $id[]=$row[0];
            mysqli_free_result($result);
            $_SESSION['userID'] = $id[0];
            $_SESSION['FBID'] = $fbid;
           header('location:index.php');
        }
        
    }else{
        echo "User entry created successfully<br>";
        $_SESSION['auth'] = 1;
        $sql="SELECT id FROM users WHERE facebookid='$fbid'";
        $result=mysqli_query($link, $sql);
        $id=array();
        while ($row = mysqli_fetch_row($result)) $id[]=$row[0];
        mysqli_free_result($result);
        $_SESSION['userID'] = $id[0];
        $_SESSION['FBID'] = $fbid;
       header('location:index.php');
    }
}

$link->close();

?>