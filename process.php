<?php
// process_registration.php

include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['email']);
    $password = trim($_POST['password']);

    try {
        // Check if the username already exists
        $stmt = $conn->prepare("SELECT email FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            die("email already exists. Please choose another.");
        }

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user into database
        $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
        $stmt->bindParam(':email', $username);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->execute();

        // Redirect after successful registration
        header('Location: front.html');
        exit();
    } catch (PDOException $e) {
        die("Error saving user details: " . $e->getMessage());
    }
}
