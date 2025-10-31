<?php
require_once '../config/session_config.php';
require_once '../config/database.php';
require_once '../base_url.php'; // ✅ Include base URL
session_unset();
session_destroy();

require_once '../base_url.php';

// Optional: disable caching for this page too
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");

header("Location: " . $base_url . "index.php");
exit;
?>
