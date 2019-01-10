 <?php

$servername = "192.241.244.177";
$username = "root";
$password = "tecnics";


$connection = new mysqli($servername, $username, $password, "db_BP_Dmart", 3306);

// Check connection
if ($connection->connect_error) 
{
    die("Connection failed: " . $connection->connect_error);
}

$user = $_GET["username"];

$sqlQuery = "select UserName from Users where UserName = '".$user."'";

$result = $connection->query($sqlQuery);

if ($result->num_rows > 0) {
	echo("\nWelcome ".$user."!\n");

	$msgQuery = "select Message, Sender from Messages where Receiver = '".$user."' and Flag = 1";
    $result = $connection->query($msgQuery);
    while($row = $result->fetch_assoc()) {

        echo "Message: " . $row["Message"]."\n";
        echo "From: ".$row["Sender"]."\n";
    }
    $msgUpdateQuery = "update Messages set Flag = 0 where Receiver = '".$user."'";
    $result =  $connection->query($msgUpdateQuery);
} 
else 
{
    echo "Please create an Account to chat!";
}
$connection->close();
?> 
