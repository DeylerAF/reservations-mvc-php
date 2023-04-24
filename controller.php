<?php
require_once 'model.php';

// Handle user input and call appropriate model functions
if (isset($_POST['add_user'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    insertUser($name, $email, $password);
} elseif (isset($_POST['update_user'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    updateUser($id, $name, $email, $password);
} elseif (isset($_POST['delete_user'])) {
    $id = $_POST['id'];
    deleteUser($id);
}

// Retrieve data from the model and pass it to the view
$users = getUsers();
