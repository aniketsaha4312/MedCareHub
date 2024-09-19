<?php
// register.php

// Include database connection configuration
include_once('db_config.php');

// Retrieve form data using POST method
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

// Perform basic validation (you can add more validation as needed)
if (empty($username) || empty($password) || empty($email)) {
    echo "All fields are required!";
    exit();
}

// Hash the password for security
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare and execute SQL query to insert user data into the database
$stmt = $pdo->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
$stmt->execute([$username, $hashed_password, $email]);

// Check if insertion was successful
if ($stmt) {
    echo "Registration successful!";
    // Redirect to login page or any other page after successful registration
    // header("Location: login.php");
} else {
    echo "Registration failed. Please try again!";
}
?>
