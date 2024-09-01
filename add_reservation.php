<?php
include 'db_connect.php';

$customer_name = $_POST['name'] ?? '';
$customer_email = $_POST['email'] ?? '';
$customer_phone_number = $_POST['phone'] ?? '';
$date = $_POST['date'] ?? '';
$time = $_POST['time'] ?? '';
$number_of_people = $_POST['number_of_people'] ?? 0;


if (empty($customer_name) || empty($customer_email) || empty($customer_phone_number) || empty($date) || empty($time) || $number_of_people <= 0) {
    die("Please fill in all fields correctly.");
}


$sql = "INSERT INTO reservations (customer_name, customer_email, customer_phone_number, date, time, number_of_people) 
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}


$stmt->bind_param('sssssi', $customer_name, $customer_email, $customer_phone_number, $date, $time, $number_of_people);


if ($stmt->execute()) {
    echo "New reservation created successfully";
} else {
    echo "Error: " . $stmt->error;
}


$stmt->close();
$conn->close();
?>
