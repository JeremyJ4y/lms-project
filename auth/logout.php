<?php
require_once '../config/session_config.php';
require_once '../config/database.php';
require_once '../base_url.php';

if (isset($_SESSION['user_id'])) {
    // 🔻 Set user as offline when logging out
    $update = $conn->prepare("UPDATE users SET is_online = 0 WHERE id = ?");
    $update->bind_param("i", $_SESSION['user_id']);
    $update->execute();
}

// 🔻 Clear all session data
session_unset();
session_destroy();

// 🔻 Disable caching to prevent “Back” button access
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");

// 🔻 Redirect to login page
header("Location: " . $base_url . "index.php");
exit;
?>
