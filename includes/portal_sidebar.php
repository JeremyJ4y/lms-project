<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal</title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $base_url; ?>coreui/assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $base_url; ?>coreui/assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $base_url; ?>coreui/assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $base_url; ?>coreui/assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $base_url; ?>coreui/assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $base_url; ?>coreui/assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $base_url; ?>coreui/assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $base_url; ?>coreui/assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $base_url; ?>coreui/assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo $base_url; ?>coreui/assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $base_url; ?>coreui/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $base_url; ?>coreui/assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $base_url; ?>coreui/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo $base_url; ?>coreui/assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo $base_url; ?>coreui/assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Vendors styles -->
    <link rel="stylesheet" href="<?php echo $base_url; ?>coreui/vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>coreui/css/vendors/simplebar.css">

    <!-- Main styles for this application -->
    <link href="<?php echo $base_url; ?>coreui/css/style.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>coreui/css/style1.css" rel="stylesheet">
    
    <!-- Example styles -->
    <link href="<?php echo $base_url; ?>coreui/css/examples.css" rel="stylesheet">

    <!-- CoreUI Scripts -->
    <script src="<?php echo $base_url; ?>coreui/js/config.js"></script>
    <script src="<?php echo $base_url; ?>coreui/js/color-modes.js"></script>

    <!-- Charts -->
    <link href="<?php echo $base_url; ?>coreui/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
</head>

<div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar" style="background-color: #0C2B4E">
  <div class="sidebar-header border-bottom">
    <div class="sidebar-brand">
      School Name
    </div>
    <button class="btn-close d-lg-none" type="button" data-coreui-theme="dark" aria-label="Close" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()"></button>
  </div>
  <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
    
    <li class="nav-item">
      <a class="nav-link" href="<?php echo $base_url; ?>portal/admin_portal.php">Dashboard</a>
    </li>

    <li class="nav-title">User Management</li>
    <li class="nav-group">
      <a class="nav-link nav-group-toggle" href="#">Users</a>
      <ul class="nav-group-items compact">
        <li class="nav-item"><a class="nav-link" href="<?php echo $base_url; ?>admin/users/users.php">Users</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo $base_url; ?>admin/students/manage_students.php">Students</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo $base_url; ?>admin/teachers/manage_teachers.php">Teachers</a></li>
      </ul>
    </li>

    <li class="nav-title">Courses</li>
    <li class="nav-group">
      <a class="nav-link nav-group-toggle" href="#">Courses / Modules</a>
      <ul class="nav-group-items compact">
        <li class="nav-item"><a class="nav-link" href="<?php echo $base_url; ?>admin/courses/manage_courses.php">Manage Courses</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo $base_url; ?>admin/courses/manage_modules.php">Manage Modules</a></li>
      </ul>
    </li>

    <li class="nav-title">Assignments</li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo $base_url; ?>admin/assign_teacher/manage_assignments.php">Assign Teachers</a>
    </li>

    <li class="nav-title">Assessments & Progress</li>
    <li class="nav-group">
      <a class="nav-link nav-group-toggle" href="#">Assessment / Progress</a>
      <ul class="nav-group-items compact">
        <li class="nav-item"><a class="nav-link" href="<?php echo $base_url; ?>admin/assessment_progress/manage_assessments.php">Assessments</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo $base_url; ?>admin/assessment_progress/manage_progress.php">Trainee Progress</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo $base_url; ?>admin/assessment_progress/manage_certificates.php">Certificates</a></li>
      </ul>
    </li>

  </ul>
</div>

<script src="<?php echo $base_url; ?>coreui/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
<script src="<?php echo $base_url; ?>coreui/vendors/simplebar/js/simplebar.min.js"></script>
<script>
  const header = document.querySelector('header.header');
  document.addEventListener('scroll', () => {
    if (header) header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
  });
</script>

<!-- Plugins and scripts required by this view -->
<script src="<?php echo $base_url; ?>coreui/vendors/chart.js/js/chart.umd.js"></script>
<script src="<?php echo $base_url; ?>coreui/vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
<script src="<?php echo $base_url; ?>coreui/vendors/@coreui/utils/js/index.js"></script>
<script src="<?php echo $base_url; ?>coreui/js/main.js"></script>

