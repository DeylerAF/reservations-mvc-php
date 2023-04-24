<?php
require_once 'db_config.php';

// Insert a new user
function insertUser($name, $email, $password) {
    $conn = connect();
    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $password);
    mysqli_stmt_execute($stmt);
    $id = mysqli_stmt_insert_id($stmt);
    mysqli_stmt_close($stmt);
    close($conn);
    return $id;
}

// Update an existing user
function updateUser($id, $name, $email, $password) {
    $conn = connect();
    $sql = "UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssi", $name, $email, $password, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    close($conn);
}

// Delete an existing user
function deleteUser($id) {
    $conn = connect();
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    close($conn);
}

// Retrieve all users
function getUsers() {
    $conn = connect();
    $sql = "SELECT * FROM users";
    $result = query($conn, $sql);
    $users = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
    mysqli_free_result($result);
    close($conn);
    return $users;
}

// Retrieve a single user by ID
function getUserById($id) {
    $conn = connect();
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_stmt_close($stmt);
    close($conn);
    return $user;
}
