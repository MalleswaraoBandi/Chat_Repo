 <?php
$servername = "192.241.244.177";
$username = "root";
$password = "tecnics";

$connection = new mysqli($servername, $username, $password, "db_BP_Dmart", 3306);
if ($connection->connect_error) 
{
    die("Connection failed: " . $connection->connect_error);
}
$user = $_GET["username"];
$sqlQuery = "select UserName from Users where UserName = '".$user."'";
$result = $connection->query($sqlQuery);
if ($result->num_rows > 0) 
{
	echo "Welcome: ".$user;
}
else 
{
    echo "Please create an Account to chat!";
}
$connection->close();
?> 
