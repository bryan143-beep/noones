<?php
// db_connection.php

$host = 'localhost'; // Database host
$dbname = 'payment_system'; // Database name
$username = 'root'; // Database username (default for XAMPP/WAMP is 'root')
$password = '119950Br'; // Database password (default for XAMPP/WAMP is empty)

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
