<?php
$host = "localhost";
$username = "u490430121_shellautomotiv";    
$password = "Asdf@#%54321";         
$dbname = "u490430121_shellautomotiv";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Dynamically set base URL
$base_url = "admin-panel/";
?>
