<?php
// Start session
session_start();

// Include database configuration file
require_once 'db_config.php';

// Include model file
require_once 'model.php';

// Include controller file
require_once 'controller.php';

// Call controller function based on request
if (isset($_POST['add_user'])) {
    add_user();
} elseif (isset($_POST['update_user'])) {
    update_user();
} elseif (isset($_POST['delete_user'])) {
    delete_user();
}

// Get all users
$users = get_all_users();

// Include view file
require_once 'view.php';
