<?php 
//Session Details
session_start();
$fbid = $_SESSION['fbid'];
$fbfname = $_SESSION['fbfname'];
$fblname = $_SESSION['fblname'];

//Connect to database
$link = mysqli_connect("127.0.0.1", "root", "password", "capool");

// Check connection
if ($link->connect_error) {
    die("CaPool table not found: " . $link->connect_error);
} 

    //User Doesn't Exist (Proceed)
    // Query
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


$link->close();

?>