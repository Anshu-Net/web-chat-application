<?php
$servername = "localhost";
$username = "root";
$password = "";
$db ="chatapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$username=substr($_GET["username"], 0, 32);
$text=substr($_GET["text"], 0, 360);
$nameescaped = htmlentities(mysqli_real_escape_string($conn,$username));
$textescaped = htmlentities(mysqli_real_escape_string($conn,$text));
$sql="INSERT INTO chat (username,text) VALUES ('$nameescaped','$textescaped')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
