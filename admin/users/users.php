<?php
require_once '../../config/session_config.php';
require_once '../../base_url.php';
require_once '../../portal/auth_check.php';
require_once '../../config/database.php';

// Restrict to Admin
if ($_SESSION['role'] !== 'admin') {
    header("Location: " . $base_url . "index.php");
    exit;
}
$page_title = "Users";

// Fetch users from database
$sql = "SELECT id, username, role, is_online, last_login FROM users ORDER BY id ASC";

$result = $conn->query($sql);
?>

<body>

    <?php include '../../includes/portal_sidebar.php'; ?>
    
    <div class="wrapper d-flex flex-column min-vh-100">

        <?php include '../../includes/portal_navbar.php'; ?>

            <div class="body flex-grow-1">
                <div class="container-lg px-4"><div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">Users</h5>
                    <button type="button" 
                            class="btn text-white" 
                            style="background-color: #0C2B4E; border: none;" 
                            data-coreui-toggle="modal" 
                            data-coreui-target="#createUserModal">
                    <i class="cil-user-follow me-2"></i> Create User
                    </button>


                </div>
                     <!-- Users Table -->
                <table class="table table-hover">
                    <thead class="table-primary" style="background-color: #0C2B4E; color: white;">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Role</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <th scope="row"><?= htmlspecialchars($row['id']); ?></th>
                                    <td><?= htmlspecialchars($row['username']); ?></td>
                                    <td><?= ucfirst($row['role']); ?></td>
                                   <td>
                                      <?php if (!empty($row['is_online']) && $row['is_online'] == 1): ?>
                                          <span class="badge bg-success">🟢 Online</span>
                                      <?php else: ?>
                                          <?php if (!empty($row['last_login'])): ?>
                                              <?php
                                                  $last_seen = strtotime($row['last_login']);
                                                  $days_ago = floor((time() - $last_seen) / (60 * 60 * 24));

                                                  if ($days_ago < 1) {
                                                      echo '<span class="badge bg-secondary">🔘 Offline (Today)</span>';
                                                  } elseif ($days_ago === 1) {
                                                      echo '<span class="badge bg-secondary">🔘 Offline (1 day ago)</span>';
                                                  } else {
                                                      echo '<span class="badge bg-secondary">🔘 Offline (' . $days_ago . ' days ago)</span>';
                                                  }
                                              ?>
                                          <?php else: ?>
                                              <span class="badge bg-warning text-dark">🕓 Never logged in</span>
                                          <?php endif; ?>
                                      <?php endif; ?>
                                  </td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted">No users found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>


                </div>
            </div>

    </div>

<!-- Create User Modal -->
<div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header" style="background-color: #0C2B4E;">
        <h5 class="modal-title text-white" id="createUserModalLabel">Create User</h5>
        <button type="button" class="btn-close btn-close-white" data-coreui-dismiss="modal" aria-label="Close"></button>
      </div>

      <form method="POST" action="create_user.php">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Role</label>
            <select name="role" class="form-select" required>
              <option value="">Select Role</option>
              <option value="admin">Admin</option>
              <option value="teacher">Teacher</option>
              <option value="student">Student</option>
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Cancel</button>
          <button type="submit" class="btn text-white" style="background-color: #0C2B4E;">Create</button>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- Success Toast -->
<div class="toast-container position-fixed top-0 end-0 p-3">
  <div id="successToast" class="toast align-items-center text-white border-0" role="alert" aria-live="assertive" aria-atomic="true"
       style="background-color: #0C2B4E;">
    <div class="d-flex">
      <div class="toast-body">
        ✅ User created successfully!
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-coreui-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
  const urlParams = new URLSearchParams(window.location.search);
  if (urlParams.has('success')) {
    const toastEl = document.getElementById('successToast');
    const toast = new coreui.Toast(toastEl, { delay: 3000 }); // 3s auto hide
    toast.show();

    // remove ?success=1 from URL after showing toast
    setTimeout(() => {
      const newUrl = window.location.href.split('?')[0];
      window.history.replaceState(null, '', newUrl);
    }, 3500);
  }
});
</script>

</body>