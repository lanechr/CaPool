<?php 
//Session Details
session_start();

$_SESSION['auth'] = 1;
header('location:index.php');

?>