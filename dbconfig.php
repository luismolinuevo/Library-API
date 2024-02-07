<?php

// Database configuration
//could also use mysql sli or other methods
$dbHost = '127.0.0.1';
$dbName = 'LIBRARY';
$dbUsername = 'root';
$dbPassword = 'password';

try {
    // Create a new PDO instance
    $dsn = "mysql:host=$dbHost;dbname=$dbName";
    $conn = new PDO($dsn, $dbUsername, $dbPassword);

    // Set PDO to throw exceptions on error
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected successfully<br>";
} catch (PDOException $e) {
    // Handle connection errors
    die("Connection failed: " . $e->getMessage());
}
