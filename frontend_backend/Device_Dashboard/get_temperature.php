<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "temperature";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT temp FROM device_1 ORDER BY id DESC LIMIT 15";
$result = $conn->query($sql);

$temperatureData = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $temperatureData[] = $row['temp'];
    }
}

$response = array('temperature' => $temperatureData);
echo json_encode($response);

$conn->close();
?>
