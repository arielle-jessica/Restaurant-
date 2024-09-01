<?php

include 'db_connect.php';


$customer_name = $_POST['customer_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$feedback_text = $_POST['feedback_text'];
$rating = $_POST['rating'];


$sql = "INSERT INTO feedback (customer_name, email, phone, feedback_text, rating) 
        VALUES (?, ?, ?, ?, ?)";


$stmt = $conn->prepare($sql);
if ($stmt === false) {
    echo "Error: " . $conn->error;
    exit();
}


$stmt->bind_param('ssssi', $customer_name, $email, $phone, $feedback_text, $rating);


if ($stmt->execute()) {
    echo "Feedback submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}


$stmt->close();
$conn->close();
?>
