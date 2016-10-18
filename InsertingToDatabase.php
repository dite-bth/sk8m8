<?php

if ($_POST) {

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "dbsk8m8";
$seconds = $_POST['txt_time'];
$name = $_POST['txt_fname'];
//$type = mysql_real_escape_string($type);



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO dbsk8m8table(username, airtime)
 VALUES ('$name', '$seconds')"; // airtime är sec som man är uppe i luften.

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;

}

$conn->close();

}

?> 
