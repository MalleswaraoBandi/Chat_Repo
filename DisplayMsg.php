 <?php
// echo "Hello";
$servername = "192.241.244.177";
$username = "root";
$password = "tecnics";

// Create connection
$conn = new mysqli($servername, $username, $password, "db_BP_Dmart", 3306);

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
$userName = $_GET["userName"];
// print("userName received is".$userName);	
$sqlQuery = "select UserName from Users where UserName = '".$userName."'";
// print($sqlQuery);
$result = $conn->query($sqlQuery);
// $receiver = $_REQUEST["receiver"];
if ($result->num_rows > 0) {

	$msgQuery = "select Message, Sender from Messages where Receiver = '".$userName."' and Flag = 1";
    $result = $conn->query($msgQuery);
    while($row = $result->fetch_assoc()) {

        echo "Message: " . $row["Message"]."<br><br>";
        echo "From: ".$row["Sender"]."<br><br>";
    }
    $msgQuery = "update Messages set Flag = 0 where Receiver = '".$userName."'";
    $result =  $conn->query($msgQuery);

} 
else 
{
    echo "Please create an Account to chat!";
}
$conn->close();
?> 
