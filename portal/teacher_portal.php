<?php

require_once '../config/session_config.php';
require_once 'auth_check.php';
// Restrict to Teacher only
if ($_SESSION['role'] !== 'teacher') {
    header("Location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="../auth/logout.php" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
        Logout
    </a>
<h1>TEACHERS</h1>
<script>
    // Detect if page is loaded from browser's cache (Back button)
    window.addEventListener("pageshow", function(event) {
        if (event.persisted) {
            // Force refresh to re-check session
            window.location.reload();
        }
    });
</script>

</body>
</html>


