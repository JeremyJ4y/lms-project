<?php
require_once '../../config/session_config.php';
require_once '../../base_url.php';
require_once '../../portal/auth_check.php';

// Restrict to Admin
if ($_SESSION['role'] !== 'admin') {
    header("Location: " . $base_url . "index.php");
    exit;
}
?>

<body>

    <?php include '../../includes/portal_sidebar.php'; ?>
    <div class="wrapper d-flex flex-column min-vh-100">

    <?php include '../../includes/portal_navbar.php'; ?>
    <h1>manage certificates</h1>
    </div>



</body>