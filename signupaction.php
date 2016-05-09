<?php 
//Session Details
session_start();
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

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

if ($email == "" || $password == ""){
    $_SESSION['signupfailednoinput'] = 1;
    $_SESSION['signupfailed'] = 1;
    header('location:index.php');
}else{

    //Connect to database
    $link = mysqli_connect("127.0.0.1", "root", "password", "capool");

    // Check connection
    if ($link->connect_error) {
        die("CaPool table not found: " . $link->connect_error);
    } 

    // SQL Injection Protection
    $email = stripslashes($email);
    $password = stripslashes($password);
    $email = mysqli_real_escape_string($link, $email);
    $password = mysqli_real_escape_string($link, $password);

    $sql="SELECT * FROM users WHERE email='$email'";

    $result=mysqli_query($link, $sql);

    if (mysqli_num_rows($result) == 1) {
        //User Exists
        $_SESSION['signupfaileduserexists'] = 1;
        header('location:index.php');
        echo "User Already Exists!";
    } else {

        //User Doesn't Exist (Proceed)
        // Query
        $sql = "INSERT INTO users (email, password)
        VALUES ('$email', '$password')";


        if (mysqli_query($link, $sql)) {
            echo "User entry created successfully<br>";
            $_SESSION['auth'] = 1;
            
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