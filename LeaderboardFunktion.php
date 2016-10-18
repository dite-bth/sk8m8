<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "dbsk8m8";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT username, airtime FROM dbsk8m8table ORDER BY airtime DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Username</th><th>Airtime</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><th>".$row["username"]."</th> <th>".$row["airtime"]."</th></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>