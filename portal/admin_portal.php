<?php
require_once '../config/session_config.php';
require_once '../base_url.php';
require_once 'auth_check.php';

// Restrict to Admin
if ($_SESSION['role'] !== 'admin') {
    header("Location: " . $base_url . "index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal</title>
  
</head>
<body>

    <?php include '../includes/portal_sidebar.php'; ?>
    <div class="wrapper d-flex flex-column min-vh-100">

    <?php include '../includes/portal_navbar.php'; ?>
    <h1>Dashboard</h1>
    </div>



</body>
</html>
