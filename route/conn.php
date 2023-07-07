<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "library";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set the character set (optional)
$conn->set_charset("utf8");

// Close the connection (when you're done with the database)
// $conn->close();
?>