// http://www.inmotionhosting.com/support/edu/website-design/using-// php-and-mysql/grab-all-comments-from-database

<?

$con = mysql_connect("au-cdbr-azure-east-a.cloudapp.net","b549e4b6d7c04e","2db4dbdd");
 
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}
 
mysql_select_db("inmoti6_mysite", $con);

$article_id = $_GET['id'];

if( ! is_numeric($article_id) )
  die('invalid article id');

$query = "SELECT * FROM `comments` WHERE `articleid` =$article_id LIMIT 0 , 30";

$comments = mysql_query($query);

while($row = mysql_fetch_array($comments, MYSQL_ASSOC))
{
	$name = $row['name'];
	$rating = $row['rating'];
	$seats = $row['seats'];
	$payment = $row['payment'];
	$startLat = $row['startLat'];
	$endLat = $row['endLat'];
	
  
  	$name = htmlspecialchars($row['name'],ENT_QUOTES);
  	$rating = htmlspecialchars($row['rating'],ENT_QUOTES);
  	$seats = htmlspecialchars($row['seats'],ENT_QUOTES);
  	$payment = htmlspecialchars($row['payment'],ENT_QUOTES);
	$startLat = htmlspecialchars($row['startLat'],ENT_QUOTES);
	$endLat = htmlspecialchars($row['endLat'],ENT_QUOTES);
  
  echo "  <div style='margin:30px 0px;'>
      Name: $name<br />
      Email: $email<br />
      Website: $website<br />
      Comment: $comment<br />
      Timestamp: $timestamp
    </div>
  ";
}

mysql_close($con);

?>