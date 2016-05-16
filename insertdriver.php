<?php 
//Session Details
session_start();
$currlatitude = $_REQUEST['currlat'];
$currlongitude = $_REQUEST['currlong'];
$destlatitude = $_REQUEST['destlat'];
$destlongitude = $_REQUEST['destlong'];
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

    
$sql="SELECT id FROM drivers WHERE id='$userid'";

    $result=mysqli_query($link, $sql);

    if (mysqli_num_rows($result) == 1) {
        $sql = "UPDATE drivers SET currentlat='$currlatitude', currentlong='$currlongitude', destlat='$destlatitude', destlong='$destlongitude' WHERE id='$userid'";

        mysqli_query($link, $sql);
        
    } else {
        $sql = "INSERT INTO drivers (id, currentlat, currentlong, destlat, destlong)
            VALUES ($userid, '$currlatitude', '$currlongitude', '$destlatitude', '$destlongitude')";

        if (!($stmt = $link->query($sql))) {
            echo "Query failed: (" . $link->errno . ") " . $link->error;
        }
    }

   

$link->close();

?>