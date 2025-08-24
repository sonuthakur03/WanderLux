<?php
// database connection
$conn = new mysqli("localhost", "root", "");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS travel_db";

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error creating database";
}

mysqli_select_db($conn, "travel_db");
