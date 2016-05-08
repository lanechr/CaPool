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
    die("CaPool table not found: " . $conn->connect_error);
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
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
rating INT(1)
)";

if (mysqli_query($link, $sql)) {
    echo "User table created successfully<br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

// sql to testing user entry
$sql = "INSERT INTO users (username, password, rating)
VALUES ('user', 'password', 3)";


if (mysqli_query($link, $sql)) {
    echo "User entry created successfully<br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

$link->close();
$conn->close();
?> 