 <?php
$servername = "192.241.244.177";
$username = "root";
$password = "tecnics";
$connection = new mysqli($servername, $username, $password, "db_BP_Dmart", 3306);
if ($conn->connect_error) 
{
    die("Connection failed: " . $connection->connect_error);
}
$sender = $_GET["sender"];
$receiver = $_GET["receiver"];
$message = $_GET["message"];

$sqlQuery = "insert into Messages values ('".$sender."','".$receiver."','".$message."', 1)";

$result = $connection->query($sqlQuery);
echo "Message sent to ".$receiver; 
$connection->close();
?> 
