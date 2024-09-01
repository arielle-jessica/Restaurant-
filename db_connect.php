<?php
$servername = "localhost";
$username = "rxxxx"; 
$password = "xxxxxxx";
$dbname = "sxxxxx";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
