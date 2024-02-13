<?php

$hostname = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "temperature"; 

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) { 
	die("Connection failed: " . mysqli_connect_error()); 
} 

echo "Database connection is OK<br>"; 

if (isset($_GET["temp"])) {
    $t = $_GET["temp"];

    $sql = "INSERT INTO device_1 (temp) VALUES (" . $t . ")";

    if (mysqli_query($conn, $sql)) {
        echo "\nNew record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>