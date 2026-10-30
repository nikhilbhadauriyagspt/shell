<?php
$host = "localhost";
$username = "root";    
$password = "";         
$dbname = "shell";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Dynamically set base URL
$base_url = "admin-panel/";
?>
