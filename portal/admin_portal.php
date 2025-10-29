<?php
session_start();

// Only allow logged-in users
if (!isset($_SESSION['role'])) {
    header("Location: ../index.php");
    exit;
}

// Optional: restrict based on role
if ($_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}
?>


<a href="../logout.php" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
    Logout
</a>
<h1>ADMIN</h1?