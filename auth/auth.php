<?php
require_once '../config/session_config.php';
require_once '../config/database.php';
require_once '../base_url.php'; // ✅ Include base URL

// ✅ Limit login attempts (10 tries, 10 minutes lock)
$lock_duration = 10 * 60; // 10 minutes in seconds
$max_attempts = 10; // ✅ changed from 5 to 10

if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
    $_SESSION['last_attempt_time'] = 0;
}

// Check if user is currently locked out
if ($_SESSION['login_attempts'] >= $max_attempts) {
    $time_since_last_attempt = time() - $_SESSION['last_attempt_time'];

    if ($time_since_last_attempt < $lock_duration) {
        $remaining = ceil(($lock_duration - $time_since_last_attempt) / 60);
        $_SESSION['error'] = "Too many failed attempts. Try again after $remaining minute(s).";
        header("Location: " . $base_url . "index.php");
        exit;
    } else {
        // Reset attempts after cooldown
        $_SESSION['login_attempts'] = 0;
        $_SESSION['last_attempt_time'] = 0;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {

            // ✅ Successful login resets attempts
            $_SESSION['login_attempts'] = 0;
            $_SESSION['last_attempt_time'] = 0;

            // Set session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            session_regenerate_id(true);

            // ✅ Update user status to online and log time
            $update = $conn->prepare("UPDATE users SET is_online = 1, last_login = NOW() WHERE id = ?");
            $update->bind_param("i", $user['id']);
            $update->execute();

            // ✅ Redirect based on role
            switch ($user['role']) {
                case 'admin':
                    header("Location: " . $base_url . "portal/admin_portal.php");
                    exit;
                case 'student':
                    header("Location: " . $base_url . "portal/student_portal.php");
                    exit;
                case 'teacher':
                    header("Location: " . $base_url . "portal/teacher_portal.php");
                    exit;
                default:
                    $_SESSION['error'] = "Role not recognized.";
                    header("Location: " . $base_url . "index.php");
                    exit;
            }
        } else {
            // ❌ Wrong password
            $_SESSION['login_attempts']++;
            $_SESSION['last_attempt_time'] = time();
            $_SESSION['error'] = "Incorrect username or password.";
            header("Location: " . $base_url . "index.php");
            exit;
        }

    } else {
        // ❌ Username not found
        $_SESSION['login_attempts']++;
        $_SESSION['last_attempt_time'] = time();
        $_SESSION['error'] = "Incorrect username or password.";
        header("Location: " . $base_url . "index.php");
        exit;
    }

} else {
    // If someone accesses auth.php directly, redirect to login
    header("Location: " . $base_url . "index.php");
    exit;
}
?>
