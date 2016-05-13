<?php

echo "passed";

$db="capool";
$host="au-cdbr-azure-east-a.cloudapp.net";
$dbuser="b549e4b6d7c04e";
$pw="2db4dbdd";

$link = new mysqli($host, $dbuser, $pw, $db);
if ($link->connect_errno) {
    echo "Failed to connect to MySQL: (" . $link->connect_errno . ") " . $link->connect_error;
}

$sql = "INSERT INTO users (email, password, fname, lname, rating, responses)
VALUES ('user@email.com', 'password', 'User', 'Name', 5, 100)";

/* Prepared statement, stage 1: prepare */
if (!($stmt = $link->query($sql))) {
    echo "Query failed: (" . $link->errno . ") " . $link->error;
}

$sql="SELECT id FROM users WHERE email='user@email.com'";

    $result=mysqli_query($link, $sql);

    echo mysqli_num_rows($result);

echo "passed";
?>