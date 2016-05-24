// http://www.inmotionhosting.com/support/edu/website-design/using-// php-and-mysql/grab-all-comments-from-database

<?

$con = mysql_connect("au-cdbr-azure-east-a.cloudapp.net","b549e4b6d7c04e","2db4dbdd");
 
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}
 
mysql_select_db("dbuser", $con);


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