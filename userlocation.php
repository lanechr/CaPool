<?php 
//Session Details
session_start();
$latitude = $_REQUEST['lat'];
$longitude = $_REQUEST['long'];
$userid = $_SESSION['userID'];

//Connect to database
$link = mysqli_connect("127.0.0.1", "root", "password", "capool");

// Check connection
if ($link->connect_error) {
    die("CaPool table not found: " . $link->connect_error);
} 

// SQL Injection Protection
$latitude = stripslashes($latitude);
$longitude = stripslashes($longitude);
$latitude = mysqli_real_escape_string($link, $latitude);
$longitude = mysqli_real_escape_string($link, $longitude);

    
$sql="SELECT id FROM userlocation WHERE id='$userid'";

    $result=mysqli_query($link, $sql);

    if (mysqli_num_rows($result) == 1) {
        $sql = "UPDATE userlocation SET latitude='$latitude', longitude='$longitude' WHERE id='$userid'";

        mysqli_query($link, $sql);
        
    } else {
        $sql = "INSERT INTO userlocation (id, latitude, longitude)
            VALUES ($userid, '$latitude', '$longitude')";

        mysqli_query($link, $sql);
    }

   

$link->close();

?>