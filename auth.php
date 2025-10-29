<?php
session_start();
require_once 'config/database.php';

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

            // Set session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Redirect based on role
            switch ($user['role']) {
                case 'admin':
                    header("Location: portal/admin_portal.php");
                    exit;
                case 'student':
                    header("Location: portal/student_portal.php");
                    exit;
                case 'teacher':
                    header("Location: portal/teacher_portal.php");
                    exit;
                default:
                    $_SESSION['error'] = "Role not recognized.";
                    header("Location: index.php");
                    exit;
            }

        } else {
            $_SESSION['error'] = "Incorrect username or password.";
            header("Location: index.php");
            exit;
        }

    } else {
        $_SESSION['error'] = "Incorrect username or password.";
        header("Location: index.php");
        exit;
    }

} else {
    // If someone accesses auth.php directly, redirect to login
    header("Location: index.php");
    exit;
}
?>
