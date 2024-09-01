<?php

include 'db_connect.php';


$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];


$sql = "INSERT INTO contact_form (name, email, subject, message) 
        VALUES (?, ?, ?, ?)";


$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}


$stmt->bind_param('ssss', $name, $email, $subject, $message);


if ($stmt->execute()) {
    echo "Message sent successfully";
} else {
    echo "Error: " . $stmt->error;
}


$stmt->close();
$conn->close();
?>
