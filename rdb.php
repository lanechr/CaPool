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
    $droptable = "DROP DATABASE capool";
    if ($link->query($droptable) === TRUE) {
        echo "Database Deleted successfully <br>";
    } else {
        echo "Error Deleting Database<br>" . $conn->error;
    }
}

$link->close();

// Create database
$sql = "CREATE DATABASE capool";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully <br>";
} else {
    echo "Error creating database: " . $conn->error;
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

if ($link->query($sql) === TRUE) {
    echo "User table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


$link->close();
$conn->close();
?> 