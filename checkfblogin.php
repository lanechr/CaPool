<?php 
session_start();

if (isset($_SESSION(FBID))){
    echo "true";
} else{
    echo "false";
}
?>