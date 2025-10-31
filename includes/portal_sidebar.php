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

   
<li class="nav-group">
    <a class="nav-link nav-group-toggle" href="#">
        <svg class="nav-icon">
            <use xlink:href="<?php echo $base_url; ?>coreui/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
        </svg> Users
    </a>
    <ul class="nav-group-items compact">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $base_url; ?>admin/users/add.php">
                <span class="nav-icon"><span class="nav-icon-bullet"></span></span> Add User
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $base_url; ?>admin/users/manage.php">
                <span class="nav-icon"><span class="nav-icon-bullet"></span></span> Manage Users
            </a>
        </li>
    </ul>
</li>


<li class="nav-group">
    <a class="nav-link nav-group-toggle" href="#">
        <svg class="nav-icon">
            <use xlink:href="<?php echo $base_url; ?>coreui/vendors/@coreui/icons/svg/free.svg#cil-people"></use>
        </svg> Students
    </a>
    <ul class="nav-group-items compact">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $base_url; ?>admin/students/add_student.php">
                <span class="nav-icon"><span class="nav-icon-bullet"></span></span> Add Student
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $base_url; ?>admin/students/manage_students.php">
                <span class="nav-icon"><span class="nav-icon-bullet"></span></span> Manage Students
            </a>
        </li>
    </ul>
</li>
<li class="nav-group">
    <a class="nav-link nav-group-toggle" href="#">
        <svg class="nav-icon">
            <use xlink:href="<?php echo $base_url; ?>coreui/vendors/@coreui/icons/svg/free.svg#cil-people"></use>
        </svg> Teachers
    </a>
    <ul class="nav-group-items compact">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $base_url; ?>admin/teachers/add_teacher.php">
                <span class="nav-icon"><span class="nav-icon-bullet"></span></span> Add Teacher
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $base_url; ?>admin/teachers/manage_teachers.php">
                <span class="nav-icon"><span class="nav-icon-bullet"></span></span> Manage Teachers
            </a>
        </li>
    </ul>
</li>


    <!-- Sidebar footer -->
    
</div>

</body>