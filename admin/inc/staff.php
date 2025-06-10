<?php 
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
  header("Location: login"); // Redirect to login
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Glaztech Admin Panel">
  <title>Glaztech - Staff Management</title>
  <link rel="icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
  <link rel="shortcut icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="../assets/css/vendors/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<?php require_once 'header.php'; ?>

<style>
  .page-wrapper {
    position: relative;
    width: 81%;
    margin-left: auto;
  }
</style>

<main class="page-wrapper compact-wrapper" id="pageWrapper">
  <section class="container-fluid mt-4">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Staff Management</h5>
        <a href="staff-add.php" class="btn btn-primary">Add Staff</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover">
            <thead class="table-primary">
              <tr>
                <th>Sr. No</th>
                <th>Name</th>
                <th>Post Name</th>
                <th>Short Description</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              require_once 'db.php';
              try {
                  $serialNo = 1;
                  $stmt = $pdo->query("SELECT * FROM staff ORDER BY id ASC");
                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      echo "<tr>";
                      echo "<td>" . $serialNo++ . "</td>";
                      echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                      echo "<td>" . htmlspecialchars($row['post_name']) . "</td>";
                      echo "<td>" . htmlspecialchars($row['short_description']) . "</td>";
                      echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                      echo "<td><img src='admin/inc/uploads/staff/" . htmlspecialchars($row['image']) . "' alt='Staff Image' style='width: 80px; height: auto;'></td>";
                      echo "<td>
                              <a href='staff-edit.php?id=" . $row['id'] . "' class='btn btn-sm btn-warning'><i class='fas fa-edit'></i></a>
                              <a href='javascript:void(0)' class='btn btn-sm btn-danger' onclick='confirmDelete(" . $row['id'] . ")'><i class='fas fa-trash-alt'></i></a>
                            </td>";
                      echo "</tr>";
                  }
              } catch (PDOException $e) {
                  echo "<tr><td colspan='7'>Error: " . $e->getMessage() . "</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</main>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this staff member?
      </div>
      <div class="modal-footer">
        <a href="javascript:void(0)" id="deleteLink" class="btn btn-danger">Delete</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<!-- JS Scripts -->
<script src="../assets/js/vendors/jquery/dist/jquery.min.js"></script>
<script src="../assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
  function confirmDelete(staffId) {
    document.getElementById("deleteLink").href = "staff-delete.php?id=" + staffId;
    var myModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    myModal.show();
  }
</script>

</body>
</html>
