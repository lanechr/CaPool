<?php
$servername = "127.0.0.1";
$username = "root";
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$link = mysqli_connect("127.0.0.1", "root", "password", "capool");

// Check connection
if ($link->connect_error) {
    die("CaPool table not found: " . $link->connect_error);
} 

if ($link) {
    $sql = "DROP DATABASE capool";
    if (mysqli_query($link, $sql)) {
        echo "Database Deleted successfully <br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }
}

$link->close();

// Create database
$sql = "CREATE DATABASE capool";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully <br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


$link = mysqli_connect("127.0.0.1", "root", "password", "capool");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

// sql to create table
$sql = "CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
email VARCHAR(30) NOT NULL UNIQUE,
password VARCHAR(30) NOT NULL,
facebookid VARCHAR(30) NOT NULL,
fname VARCHAR(30) NOT NULL,
lname VARCHAR(30) NOT NULL,
rating INT(1)
)";

if (mysqli_query($link, $sql)) {
    echo "User table created successfully<br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

// sql to testing user entry
$sql = "INSERT INTO users (email, password, fname, lname, rating)
VALUES ('user@email.com', 'password', 'User', 'Name', 5)";


if (mysqli_query($link, $sql)) {
    echo "User entry created successfully<br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

$sql = "CREATE TABLE userlocation (
id INT(6) UNSIGNED PRIMARY KEY, 
latitude VARCHAR(30),
longitude VARCHAR(30),
FOREIGN KEY (id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE
)";

if (mysqli_query($link, $sql)) {
    echo "Location table created successfully<br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

//$sql = "ALTER TABLE userlocation DROP FOREIGN KEY userlocation_ibfk_1;ALTER TABLE `userlocation` ADD CONSTRAINT `userlocation_ibfk_1` FOREIGN KEY (`id`) REFERENCES `capool`.`users`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;";
//
//if (mysqli_query($link, $sql)) {
//    echo "Table link created successfully<br>";
//} else {
//    echo "Error: " . $sql . "<br>" . mysqli_error($link);
//}

$link->close();
$conn->close();
?> 