<?php
// Database connection details
$host = 'localhost'; // Change if your database is hosted elsewhere
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password
$database = 'catalogo'; // Your database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";
?>