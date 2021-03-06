<?php 
//Session Details
session_start();
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$fname = $_REQUEST['fname'];
$lname = $_REQUEST['lname'];

$_SESSION['email'] = $email;

if (isset($_SESSION['signupfailed'])) {
    unset($_SESSION['signupfailed']);
}

if (isset($_SESSION['signupfailednoinput'])) {
    unset($_SESSION['signupfailednoinput']);
}

if (isset($_SESSION['signupfailedsqlerror'])) {
    unset($_SESSION['signupfailedsqlerror']);
}

if (isset($_SESSION['signupfaileduserexists'])) {
    unset($_SESSION['signupfaileduserexists']);
}

if ($email == "" || $password == "" || $fname == "" || $lname == ""){
    $_SESSION['signupfailednoinput'] = 1;
    $_SESSION['signupfailed'] = 1;
    header('location:index.php');
}else{

    //Connect to database
    $db="capool";
    $host="au-cdbr-azure-east-a.cloudapp.net";
    $dbuser="b549e4b6d7c04e";
    $pw="2db4dbdd";

$link = new mysqli($host, $dbuser, $pw, $db);
if ($link->connect_errno) {
    echo "Failed to connect to MySQL: (" . $link->connect_errno . ") " . $link->connect_error;
}

    // SQL Injection Protection
    $email = stripslashes($email);
    $password = stripslashes($password);
    $fname = stripslashes($fname);
    $lname = stripslashes($lname);
    $email = mysqli_real_escape_string($link, $email);
    $password = mysqli_real_escape_string($link, $password);
    $fname = mysqli_real_escape_string($link, $fname);
    $lname = mysqli_real_escape_string($link, $lname);

    $sql="SELECT id FROM users WHERE email='$email'";

    $result=mysqli_query($link, $sql);

    if (mysqli_num_rows($result) == 1) {
        //User Exists
        $_SESSION['signupfaileduserexists'] = 1;
        header('location:index.php');
        echo "User Already Exists!";
    } else {
        
        //User Doesn't Exist (Proceed)
        // Query
        $sql = "INSERT INTO users (email, password, fname, lname)
        VALUES ('$email', '$password', '$fname', '$lname')";


        if (mysqli_query($link, $sql)) {
            echo "User entry created successfully<br>";
            $_SESSION['auth'] = 1;
            
            $sql="SELECT id FROM users WHERE email='$email'";
            $result=mysqli_query($link, $sql);
            $id=array();
            while ($row = mysqli_fetch_row($result)) $id[]=$row[0];
            mysqli_free_result($result);
            $_SESSION['userID'] = $id[0];
            
	       header('location:index.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
            $_SESSION['signupfailedsqlerror'] = 1;
            header('location:index.php');
        }
    }

    $link->close();
}
?>