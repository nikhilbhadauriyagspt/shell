<?php
include 'config.php';  // Database connection include karein

// Naya user add karein
$username = "admin";
$password = password_hash("admin123", PASSWORD_BCRYPT);  // Password hashing

// User insert query
$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);

if ($stmt->execute()) {
    echo "User created successfully! 🎉";
} else {
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
