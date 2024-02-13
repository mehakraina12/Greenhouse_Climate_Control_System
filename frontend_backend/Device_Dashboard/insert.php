<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "temperature";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$value = $_GET['input_value'];

// Sanitize and validate user input
$value = mysqli_real_escape_string($conn, $value);
$value = htmlspecialchars($value);

$sql = "INSERT INTO device_1 (temp) VALUES ('$value')";
if ($conn->query($sql) === TRUE) {
    echo "Value inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
