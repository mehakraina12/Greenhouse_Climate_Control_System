<?php
// Assuming you have already established a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "temperature";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the time from the database
$sql = "SELECT date_time FROM device_1 ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $time = $row['date_time'];
    echo $time;
} else {
    echo "No time found";
}

$conn->close();
?>
