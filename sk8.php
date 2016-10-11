<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "sk8m8";
$type = 1234; // <-- namn
//$type = mysql_real_escape_string($type);



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO skate(username, airtime)
 VALUES ('$type', '4')"; // airtime är sec som man är uppe i luften.

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;

}

$conn->close();
?> 
