<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php'); // Redirect to login if not logged in
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
  <title>Glaztech - Product Management</title>
  <link rel="icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
  <link rel="shortcut icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="../assets/css/vendors/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<?php require_once 'header.php'; ?>

<main class="page-wrapper compact-wrapper" id="pageWrapper">
<?php require_once 'db.php'; ?>

<?php
try {
    // Run the query using PDO
    $stmt = $pdo->query("SELECT * FROM headerproducts ORDER BY id DESC");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}
?>

<section class="container-fluid mt-4">
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
    <h5 class="mb-0">Product Management</h5>

    <div class="d-flex align-items-center gap-2 ms-auto">
      <input type="text" id="searchInput"  class="form-control form-control-sm" placeholder="Search Product..." style="width: 200px;">
      <a href="addheaderproduct.php" class="btn btn-primary btn-sm">Add New Product</a>
    </div>
  </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover" id="productTable" >
          <thead class="table-primary">
            <tr>
              <th>Sr. No</th>
              <th>Product Name</th>  
              <th>Image</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($products)): ?>
              <?php $serial = 1; ?>
              <?php foreach ($products as $row): ?>
                <tr>
                  <td><?= $serial++ ?></td>
                  <td class="product_name"><?= htmlspecialchars($row['product_name']) ?></td>

                  <!-- <td><?= htmlspecialchars(strip_tags($row['product_description'])) ?></td> -->
                  <td>

                  
                    <img src="../inc/uploads/headerproducts/<?= htmlspecialchars($row['product_image']) ?>" alt="Product Image" width="100">
                  </td>
                  <td>
                    <a href="editheaderproduct.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>

                    <a href="deleteheader.php?id=<?= $row['id'] ?>" 
   class="btn btn-sm btn-danger" 
   onclick="return confirm('Are you sure you want to delete this product?')">
   Delete
</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="5" class="text-center">No products found.</td>
              </tr>
            <?php endif; ?>
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
    document.getElementById("deleteLink").href = "deleteheaderproduct.php?id=" + staffId;
    var myModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    myModal.show();
  }
</script>


<style>
  .page-wrapper {
    position: relative;
    width: 81%;
    margin-left: auto;
  }
</style>
<script>
document.getElementById('searchInput').addEventListener('input', function () {
  const filter = this.value.toLowerCase();
  const rows = document.querySelectorAll('#productTable tbody tr');

  rows.forEach(row => {
    const productNameCell = row.querySelector('.product_name');
    const productName = productNameCell ? productNameCell.textContent.toLowerCase() : '';
    row.style.display = productName.includes(filter) ? '' : 'none';
  });
});
</script>


</body>
</html>
