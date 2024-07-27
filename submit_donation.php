<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "donors";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['donorName'];
$email = $_POST['donorEmail'];
$phone = $_POST['donorPhone'];
$amount = $_POST['Amount'];
$sector = $_POST['Sector'];
$reason = $_POST['Reason'];

// Insert data into database
$sql = "INSERT INTO details (name, email, phone, amount, sector, reason) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $name, $email, $phone, $amount, $sector, $reason);

if ($stmt->execute()) {
    // Redirect to Stripe checkout
    header("Location: https://donate.stripe.com/test_bIY7u1g3WbNz7Ty8wx");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
