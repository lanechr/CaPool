<?php

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


// sql to create table
$sql = "CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
email VARCHAR(30) NOT NULL UNIQUE,
password VARCHAR(30),
facebookid VARCHAR(30),
fname VARCHAR(30) NOT NULL,
lname VARCHAR(30) NOT NULL,
rating INT(1),
responses INT(6)
)";

if (!($stmt = $link->query($sql))) {
    echo "Query failed: (" . $link->errno . ") " . $link->error;
}

// sql to testing user entry
$sql = "INSERT INTO users (email, password, fname, lname, rating, responses)
VALUES ('user@email.com', 'password', 'User', 'Name', 5, 100)";

if (!($stmt = $link->query($sql))) {
    echo "Query failed: (" . $link->errno . ") " . $link->error;
}

$sql = "CREATE TABLE userlocation (
id INT(6) UNSIGNED PRIMARY KEY, 
latitude VARCHAR(30),
longitude VARCHAR(30)
)";

if (!($stmt = $link->query($sql))) {
    echo "Query failed: (" . $link->errno . ") " . $link->error;
}

$link->close();
?> 