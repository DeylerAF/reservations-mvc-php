<?php
// Database configuration
$host = "localhost";
$username = "your_username";
$password = "your_password";
$database = "your_database";

// Connect to the database
function connect() {
    global $host, $username, $password, $database;
    $conn = mysqli_connect($host, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

// Close the database connection
function close($conn) {
    mysqli_close($conn);
}

// Execute a query on the database
function query($conn, $sql) {
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
    return $result;
}
