<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bee";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, curdate, curtime, status   FROM room1";
$result = $conn->query($sql);

if ($result->num_rows > 4) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["curdate"]. "-w: " . $row["curtime"]. "-L:" . $row["status"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
