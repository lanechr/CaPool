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


mysql_select_db("$dbuser", $con);

$article_id = $_GET['id'];

$query = "SELECT * FROM users";


while($row = mysql_fetch_array(MYSQL_ASSOC))
{
  $id = $row['id'];
  $email = $row['email'];
  $password = $row['password'];
  $facebookid = $row['facebookid'];
  $fname = $row['fname'];
  $lname = $row['lname'];
  $rating = $row['rating'];
  $responses = $row['responses'];
  
  $name = htmlspecialchars($row['name'],ENT_QUOTES);
  $email = htmlspecialchars($row['email'],ENT_QUOTES);
  $password = htmlspecialchars($row['password'],ENT_QUOTES);
  $facebookid = htmlspecialchars($row['facebookid'],ENT_QUOTES);
  $fname = htmlspecialchars($row['fname'],ENT_QUOTES);
  $lname = htmlspecialchars($row['lname'],ENT_QUOTES);
  $rating = htmlspecialchars($row['rating'],ENT_QUOTES);
  $responses = htmlspecialchars($row['responses'],ENT_QUOTES);



$link->close();
?> 