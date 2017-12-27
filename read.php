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
$sql= "SELECT * FROM chat ORDER BY id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc())
    {
    	$username=$row["username"];
        $text=$row["text"];
        $time=date('G:i', strtotime($row["time"]));
        
        echo "<p>$time | $username: $text</p>\n";
    }
 }
 else 
 {
    echo "0 results";
 }
 $conn->close();
?>