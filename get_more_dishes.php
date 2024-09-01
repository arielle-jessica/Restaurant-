<?php
include 'db_connect.php';

// Set header to JSON
header('Content-Type: application/json');

// Query to select all dishes
$sql = "SELECT name, description, price, category, image_url FROM dishes";
$result = $conn->query($sql);

if ($result === false) {
    echo json_encode(["error" => "Failed to retrieve data"]);
    exit;
}

$dishes = [];

while ($row = $result->fetch_assoc()) {
    $dishes[] = $row;
}

echo json_encode($dishes);

$conn->close();
?>
