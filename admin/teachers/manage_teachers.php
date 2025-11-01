<?php
require_once '../../config/session_config.php';
require_once '../../base_url.php';
require_once '../../portal/auth_check.php';

// Restrict to Admin
if ($_SESSION['role'] !== 'admin') {
    header("Location: " . $base_url . "index.php");
    exit;
}
$page_title = "Teachers";
?>

<body>

    <?php include '../../includes/portal_sidebar.php'; ?>
    
    <div class="wrapper d-flex flex-column min-vh-100">

        <?php include '../../includes/portal_navbar.php'; ?>

            <div class="body flex-grow-1">
                <div class="container-lg px-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">Teacher List</h5>
                        <button type="button" class="btn btn-primary">
                            <i class="cil-user-follow me-2"></i> Add Teachers
                        </button>
                    </div>
                    <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                            <td>Maria Santos</td>
                            <td>maria.santos@example.com</td>
                            <td>Admin</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                            <td>Juan Dela Cruz</td>
                            <td>juan.delacruz@example.com</td>
                            <td>Teacher</td>
                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                            <td>Ana Reyes</td>
                            <td>ana.reyes@example.com</td>
                            <td>Student</td>
                            <td><span class="badge bg-secondary">Inactive</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>

    </div>



</body>