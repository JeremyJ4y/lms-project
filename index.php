<?php
require_once 'config/session_config.php';

// If user is already logged in, redirect to their respective portal
if (isset($_SESSION['user_id']) && isset($_SESSION['role'])) {
    switch ($_SESSION['role']) {
        case 'admin':
            header("Location: portal/admin_portal.php");
            exit;
        case 'student':
            header("Location: portal/student_portal.php");
            exit;
        case 'teacher':
            header("Location: portal/teacher_portal.php");
            exit;
    }
}

// Include base URL configuration
include 'base_url.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login | EduSync</title>

<!-- ✅ CSS and JS paths now use $base_url -->
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/style.css">
<script src="<?php echo $base_url; ?>assets/js/tailwind.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/feather.min.js"></script>

</head>
<body class="min-h-screen flex items-center justify-center bg-gray-50">

<main class="container mx-auto px-4 py-12 flex items-center justify-center min-h-[calc(100vh-200px)]">
    <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8 fade-in">
        <div class="text-center mb-8">
            <div class="w-24 h-24 mx-auto mb-4">
                <!-- ✅ Image uses base_url -->
                <img src="<?php echo $base_url; ?>images/your-logo-here.png" alt="School Logo" class="w-full h-full object-contain">
            </div>
            <h1 class="text-2xl font-bold text-gray-800">SCHOOL NAME</h1>
        </div>
        
        <!-- ✅ Form still works normally -->
        <form class="space-y-6" method="POST" action="<?php echo $base_url; ?>auth/auth.php">
            <?php if (isset($_SESSION['error'])): ?>
                <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                    <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>

            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i data-feather="user" class="text-gray-400"></i>
                </div>
                <input type="text" id="username" name="username" required
                       class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                       placeholder="Username">
            </div>

            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i data-feather="key" class="text-gray-400"></i>
                </div>
                <input type="password" id="password" name="password" required
                       class="pl-10 pr-10 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                       placeholder="••••••••">

                <!-- Show/Hide Icon -->
                <button type="button" id="togglePassword"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none">
                    <i data-feather="eye"></i>
                </button>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember-me" name="remember-me" type="checkbox"
                           class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="remember-me" class="ml-2 block text-sm text-gray-700">Remember me</label>
                </div>
                <div class="text-sm">
                    <a href="<?php echo $base_url; ?>forgot-password.html" class="font-medium text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                </div>
            </div>

            <div class="space-y-4">
                <button type="submit"
                        class="w-full bg-gradient-to-r from-pink-500 via-yellow-400 to-blue-500 hover:from-pink-600 hover:via-yellow-500 hover:to-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300">
                    Log In
                </button>
            </div>
        </form>
    </div>
</main>

<!-- ✅ Feather icons script -->
<script>
feather.replace();

const togglePassword = document.getElementById('togglePassword');
const password = document.getElementById('password');
let isVisible = false;

togglePassword.addEventListener('click', function () {
    isVisible = !isVisible;
    password.type = isVisible ? 'text' : 'password';
    togglePassword.innerHTML = isVisible ? feather.icons['eye-off'].toSvg() : feather.icons['eye'].toSvg();
});

// ✅ Detect if page was loaded from cache (Back button)
window.addEventListener("pageshow", function(event) {
    if (event.persisted) {
        window.location.reload();
    }
});
</script>

</body>
</html>
