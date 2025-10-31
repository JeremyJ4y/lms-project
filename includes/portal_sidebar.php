<body>
<div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar">
  <div class="sidebar-header border-bottom">
    <div class="sidebar-brand">
      <svg class="sidebar-brand-full" width="88" height="32" alt="CoreUI Logo">
        <use xlink:href="<?php echo $base_url; ?>coreui/assets/brand/coreui.svg#full"></use>
      </svg>
      <svg class="sidebar-brand-narrow" width="32" height="32" alt="CoreUI Logo">
        <use xlink:href="<?php echo $base_url; ?>coreui/assets/brand/coreui.svg#signet"></use>
      </svg>
    </div>
    <button class="btn-close d-lg-none" type="button" data-coreui-theme="dark" aria-label="Close" onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#sidebar&quot;)).toggle()"></button>
  </div>
  <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
    
    <li class="nav-item"><a class="nav-link" href="<?php echo $base_url; ?>portal/admin_portal.php">
        <svg class="nav-icon">
          <use xlink:href="<?php echo $base_url; ?>coreui/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
        </svg> Dashboard</a></li>
<li class="nav-title">User Management</li>
<li class="nav-group">
    <a class="nav-link nav-group-toggle" href="#">
        <svg class="nav-icon">
            <use xlink:href="<?php echo $base_url; ?>coreui/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
        </svg> Users
    </a>
    <ul class="nav-group-items compact">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $base_url; ?>admin/students/manage_students.php">
                <span class="nav-icon"><span class="nav-icon-bullet"></span></span> Students
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $base_url; ?>admin/teachers/manage_teachers.php">
                <span class="nav-icon"><span class="nav-icon-bullet"></span></span> Teachers
            </a>
        </li>
    </ul>
</li>

<li class="nav-title">Courses</li>
<li class="nav-group">
    <a class="nav-link nav-group-toggle" href="#">
        <svg class="nav-icon">
            <use xlink:href="<?php echo $base_url; ?>coreui/vendors/@coreui/icons/svg/free.svg#cil-library"></use>
        </svg> Courses / Modules
    </a>
    <ul class="nav-group-items compact">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $base_url; ?>admin/courses/manage_courses.php">
                <span class="nav-icon"><span class="nav-icon-bullet"></span></span> Manage Courses
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $base_url; ?>admin/courses/manage_modules.php">
                <span class="nav-icon"><span class="nav-icon-bullet"></span></span> Manage Modules
            </a>
        </li>
    </ul>
</li>

<li class="nav-title">Assignments</li>

<li class="nav-item">
    <a class="nav-link" href="<?php echo $base_url; ?>admin/assign_teacher/manage_assignments.php">
        <svg class="nav-icon">
            <use xlink:href="<?php echo $base_url; ?>coreui/vendors/@coreui/icons/svg/free.svg#cil-user-follow"></use>
        </svg> Assign Teachers
    </a>
</li>

<li class="nav-title">Assessments & Progress</li>
<li class="nav-group">
    <a class="nav-link nav-group-toggle" href="#">
        <svg class="nav-icon">
            <use xlink:href="<?php echo $base_url; ?>coreui/vendors/@coreui/icons/svg/free.svg#cil-check"></use>
        </svg> Assessment / Progress
    </a>
    <ul class="nav-group-items compact">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $base_url; ?>admin/assessment_progress/manage_assessments.php">
                <span class="nav-icon"><span class="nav-icon-bullet"></span></span> Assessments
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $base_url; ?>admin/assessment_progress/manage_progress.php">
                <span class="nav-icon"><span class="nav-icon-bullet"></span></span> Trainee Progress
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $base_url; ?>admin/assessment_progress/manage_certificates.php">
                <span class="nav-icon"><span class="nav-icon-bullet"></span></span> Certificates
            </a>
        </li>
    </ul>
</li>


    <!-- Sidebar footer -->
    
</div>

</body>