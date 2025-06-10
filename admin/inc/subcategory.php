<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit();
}

require 'db.php';

$success = '';
$error = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    try {
        $category_id       = $_POST['category_id'] ?? '';
        $subcategory_name  = trim($_POST['subcategory_name'] ?? '');
        $meta_title        = trim($_POST['meta_title'] ?? '');
        $meta_description  = trim($_POST['meta_description'] ?? '');
        $meta_keywords     = trim($_POST['meta_keywords'] ?? '');
        $slug              = trim($_POST['slug'] ?? '');
        $image             = $_FILES['subcategory_image'] ?? null;

        if (empty($category_id) || empty($subcategory_name) || !$image || $image['error'] !== 0) {
            throw new Exception("All fields including image are required.");
        }

        $dupStmt = $pdo->prepare("SELECT COUNT(*) FROM subcategories WHERE category_id = :cat_id AND subcategory_name = :name");
        $dupStmt->execute([':cat_id' => $category_id, ':name' => $subcategory_name]);
        if ($dupStmt->fetchColumn() > 0) {
            throw new Exception("This subcategory already exists under the selected category.");
        }

        $allowed_types = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $file_ext = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
        if (!in_array($file_ext, $allowed_types) || !getimagesize($image['tmp_name'])) {
            throw new Exception("Invalid or corrupted image file.");
        }

        $upload_dir = "uploads/subcategory/";
        if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);

        $unique_name = uniqid('subcat_', true) . "." . $file_ext;
        $target_file = $upload_dir . $unique_name;
        if (!move_uploaded_file($image["tmp_name"], $target_file)) {
            throw new Exception("Image upload failed.");
        }

        $stmt = $pdo->prepare("INSERT INTO subcategories 
            (category_id, subcategory_name, subcategory_image, meta_title, meta_description, meta_keywords, slug)
            VALUES (:cat_id, :name, :image, :meta_title, :meta_description, :meta_keywords, :slug)");
        $stmt->execute([
            ':cat_id'           => $category_id,
            ':name'             => $subcategory_name,
            ':image'            => $target_file,
            ':meta_title'       => $meta_title,
            ':meta_description' => $meta_description,
            ':meta_keywords'    => $meta_keywords,
            ':slug'             => $slug,
        ]);

        $success = "Subcategory added successfully!";
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}

$categories = $pdo->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);
$subcategories = $pdo->query("
    SELECT subcategories.*, categories.category_name 
    FROM subcategories 
    JOIN categories ON subcategories.category_id = categories.id
")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>SubCategory Management</title>
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
</head>
<body>

<?php include('header.php'); ?>







<main id="main" class="main page-wrapper">

  <div class="container py-4">

    <!-- Page Title -->
    <div class="pagetitle mb-4 border-bottom pb-2">
      <!-- <h1 class="fw-bold text-primary">Products Management</h1> -->
      <!-- <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Products</li>
        </ol>
      </nav> -->
    </div>

    <!-- Flash Messages -->
    <?php if ($success): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= htmlspecialchars($success) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>

    <?php if ($error): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= htmlspecialchars($error) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>

    <!-- Product Form -->
    <div class="card shadow-sm mb-5">
      <div class="card-header bg-white text-white">
        <h5 class="mb-0">Add New Product</h5>
      </div>
      <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
          <div class="row g-4">
            <div class="col-md-6">
              <label class="form-label">Parent Category</label>
              <select name="category_id" class="form-select" required>
                <option value="">-- Select Category --</option>
                <?php foreach ($categories as $cat): ?>
                  <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['category_name']) ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label">Product Name</label>
              <input type="text" class="form-control" name="subcategory_name" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Image</label>
              <input type="file" class="form-control" name="subcategory_image" accept="image/*" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Slug</label>
              <input type="text" class="form-control" name="slug" readonly required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Meta Title</label>
              <input type="text" class="form-control" name="meta_title" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Meta Keywords</label>
              <input type="text" class="form-control" name="meta_keywords" required>
            </div>
            <div class="col-12">
              <label class="form-label">Meta Description</label>
              <textarea class="form-control" name="meta_description" rows="3" required></textarea>
            </div>
            <div class="col-12 text-end">
              <button type="submit" name="submit" class="btn btn-success px-4">Add Product</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Product Table -->
    <div class="card shadow-sm">
      <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0" style="color: white;">Product List</h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
              <tr>
                <th scope="col">#ID</th>
                <th scope="col">Product</th>
                <th scope="col">Category</th>
                <th scope="col">Image</th>
                <th scope="col">Slug</th>
                <th scope="col" class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($subcategories as $sub): ?>
                <tr>
                  <td><?= $sub['id'] ?></td>
                  <td><?= htmlspecialchars($sub['subcategory_name']) ?></td>
                  <td><?= htmlspecialchars($sub['category_name']) ?></td>
                  <td>
                    <img src="<?= htmlspecialchars($sub['subcategory_image']) ?>" class="rounded shadow-sm" width="50" height="50" alt="Product">
                  </td>
                  <td><?= htmlspecialchars($sub['slug']) ?></td>
                  <td class="text-center">
                    <a href="subcategory-edit.php?id=<?= $sub['id'] ?>" class="btn btn-sm btn-outline-primary me-1" title="Edit">
                      <i class="bx bx-edit"></i>
                    </a>
                    <button class="btn btn-sm btn-outline-danger" onclick="deleteSubCategory(<?= $sub['id'] ?>)" title="Delete">
                      <i class="bx bx-trash"></i>
                    </button>
                  </td>
                </tr>
              <?php endforeach; ?>
              <?php if (empty($subcategories)): ?>
                <tr>
                  <td colspan="6" class="text-center text-muted">No products found.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</main>







<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

<script>
  document.getElementById('subcategory_name').addEventListener('input', function () {
    const slug = this.value.toLowerCase().replace(/[^\w ]+/g, '').replace(/ +/g, '-');
    document.getElementById('slug').value = slug;
  });

  function deleteSubCategory(id) {
    if (confirm("Are you sure you want to delete this subcategory?")) {
      window.location.href = 'subcategory-delete.php?id=' + id;
    }
  }

  CKEDITOR.replace('meta_description');
  CKEDITOR.disableAutoInline = true;
CKEDITOR.config.versionCheck = false;
</script>

<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
