<?php
// database.php

$host     = "localhost";     // Database server
$username = "root";          // Database username
$password = "";              // Database password
$dbname   = "database"; // Database name

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("MySQL Connection failed: " . $conn->connect_error);
}
?>