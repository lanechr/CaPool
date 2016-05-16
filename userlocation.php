<?php 
//Session Details
session_start();
$latitude = $_REQUEST['lat'];
$longitude = $_REQUEST['long'];
$userid = $_SESSION['userID'];

//Connect to database
$db="capool";
$host="au-cdbr-azure-east-a.cloudapp.net";
$dbuser="b549e4b6d7c04e";
$pw="2db4dbdd";

//Connect to database
$link = new mysqli($host, $dbuser, $pw, $db);
if ($link->connect_errno) {
    echo "Failed to connect to MySQL: (" . $link->connect_errno . ") " . $link->connect_error;
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

        if (!($stmt = $link->query($sql))) {
    echo "Query failed: (" . $link->errno . ") " . $link->error;
}
    }

//Update passenger location if trip in progress

$sql="SELECT id FROM passengers WHERE id='$userid'";

    $result=mysqli_query($link, $sql);

    if (mysqli_num_rows($result) == 1) {
        $sql = "UPDATE passengers SET currentlat='$latitude', currentlong='$longitude' WHERE id='$userid'";

        mysqli_query($link, $sql);
        
    }

$sql="SELECT id FROM drivers WHERE id='$userid'";

    $result=mysqli_query($link, $sql);

    if (mysqli_num_rows($result) == 1) {
        $sql = "UPDATE drivers SET currentlat='$latitude', currentlong='$longitude' WHERE id='$userid'";

        mysqli_query($link, $sql);
        
    }
   

$link->close();

?>