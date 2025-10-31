<?php
// ✅ Secure session configuration
if ($_SERVER['HTTP_HOST'] !== 'localhost') {
    // Force HTTPS in production
    if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
        $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header('Location: ' . $redirect);
        exit;
    }
}

// 🔐 Session security settings
ini_set('session.cookie_httponly', 1); // JavaScript cannot access the session cookie
ini_set('session.cookie_secure', isset($_SERVER['HTTPS'])); // Send only via HTTPS
ini_set('session.use_strict_mode', 1); // Prevent session ID reuse

session_start();

// Optional: prevent caching of sensitive pages
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");
?>
