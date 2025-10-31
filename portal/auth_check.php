<?php

// If not logged in
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
    header("Location: ../index.php");
    exit;
}

// Optional: to add role-based restrictions later
?>
