 <?php
$servername = "192.241.244.177";
$username = "root";
$password = "tecnics";

// Create connection
$connection = new mysqli($servername, $username, $password, "db_BP_Dmart", 3306);

// Check connection
if ($connection->connect_error) 
{
    die("Connection failed: " . $connection->connect_error);
}
$user = $_GET["username"];

$msgQuery = "select Message, Sender from Messages where Receiver = '".$user."' and Flag = 1";
$result = $connection->query($msgQuery);

while($row = $result->fetch_assoc()) 
{
    echo "Message: " . $row["Message"];
    echo "From: ".$row["Sender"];
}
$msgQuery = "update Messages set Flag = 0 where Receiver = '".$user."'";
$result =  $connection->query($msgQuery);

$connection->close();
?> 
