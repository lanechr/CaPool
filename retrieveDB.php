// http://www.inmotionhosting.com/support/edu/website-design/using-// php-and-mysql/grab-all-comments-from-database
// http://www.uandblog.com/How-to-login-or-signup-with-facebook-API-using-PHP

<?php 
//Session Details
session_start();



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

$query="SELECT * FROM users'";

$comments = mysqli_query($link, $query);


while($row = mysql_fetch_array($comments, MYSQL_ASSOC))
	while($row = mysqli_fetch_array($comments, MYSQL_ASSOC))
  (
    $id = $row['id'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $facebookid = $row['facebookid'];
    $rating = $row['rating'];

    $id = htmlspecialchars($row['id'],ENT_QUOTES);
    $fname = htmlspecialchars($row['fname'],ENT_QUOTES);
    $lname = htmlspecialchars($row['lname'],ENT_QUOTES);
    $facebookid = htmlspecialchars($row['facebookid'],ENT_QUOTES);
    $rating= htmlspecialchars($row['rating'],ENT_QUOTES);
	
?>

<?php
	echo
	"<h1 class="marginPix">[$fname]</h1>" 

$link->close();
?>


























<?

$con = mysql_connect("au-cdbr-azure-east-a.cloudapp.net","b549e4b6d7c04e","2db4dbdd");
 
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}
 
mysql_select_db("capool", $con);


$article_id = $_GET['id'];

if( ! is_numeric($article_id) )
  die('invalid article id');

$query = "SELECT * FROM users";

$comments = mysql_query($query);

while($row = mysql_fetch_array($comments, MYSQL_ASSOC))
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
  
}



mysql_close($con);

?>