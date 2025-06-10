<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit();
}

require 'db.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: subcategory.php');
    exit();
}

$id = (int)$_GET['id'];

// Fetch categories for dropdown
$categories = $pdo->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);

// Fetch subcategory data
$stmt = $pdo->prepare("SELECT * FROM subcategories WHERE id = ?");
$stmt->execute([$id]);
$subcategory = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$subcategory) {
    // Subcategory not found
    header('Location: subcategory.php');
    exit();
}

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $category_id      = $_POST['category_id'] ?? '';
        $subcategory_name = trim($_POST['subcategory_name'] ?? '');
        $meta_title       = trim($_POST['meta_title'] ?? '');
        $meta_description = trim($_POST['meta_description'] ?? '');
        $meta_keywords    = trim($_POST['meta_keywords'] ?? '');
        $slug             = trim($_POST['slug'] ?? '');

        if (empty($category_id) || empty($subcategory_name)) {
            throw new Exception("Category and Subcategory Name are required.");
        }

        // Check duplicate name except this ID
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM subcategories WHERE subcategory_name = ? AND category_id = ? AND id != ?");
        $stmt->execute([$subcategory_name, $category_id, $id]);
        if ($stmt->fetchColumn() > 0) {
            throw new Exception("Another subcategory with this name already exists under the selected category.");
        }

        $update_image = false;
        $new_image_path = $subcategory['subcategory_image'];

        if (isset($_FILES['subcategory_image']) && $_FILES['subcategory_image']['error'] === 0) {
            $image = $_FILES['subcategory_image'];

            $allowed_types = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            $file_ext = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

            if (!in_array($file_ext, $allowed_types)) {
                throw new Exception("Invalid image format.");
            }

            $check = getimagesize($image['tmp_name']);
            if ($check === false) {
                throw new Exception("Uploaded file is not a valid image.");
            }

            $upload_dir = "../uploads/subcategory/";
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            $unique_name = uniqid('subcat_', true) . "." . $file_ext;
            $target_file = $upload_dir . $unique_name;
            $db_file     = "uploads/subcategory/" . $unique_name;

            if (!move_uploaded_file($image["tmp_name"], $target_file)) {
                throw new Exception("Image upload failed.");
            }

            // Delete old image file
            if (!empty($subcategory['subcategory_image']) && file_exists("../" . $subcategory['subcategory_image'])) {
                unlink("../" . $subcategory['subcategory_image']);
            }

            $update_image = true;
            $new_image_path = $db_file;
        }

        // Update database record
        $sql = "UPDATE subcategories SET category_id = ?, subcategory_name = ?, meta_title = ?, meta_description = ?, meta_keywords = ?, slug = ?";
        $params = [$category_id, $subcategory_name, $meta_title, $meta_description, $meta_keywords, $slug];

        if ($update_image) {
            $sql .= ", subcategory_image = ?";
            $params[] = $new_image_path;
        }

        $sql .= " WHERE id = ?";
        $params[] = $id;

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);

        $success = "✅ Subcategory updated successfully!";
        // Refresh $subcategory data with updated values
        $stmt = $pdo->prepare("SELECT * FROM subcategories WHERE id = ?");
        $stmt->execute([$id]);
        $subcategory = $stmt->fetch(PDO::FETCH_ASSOC);

    } catch (Exception $e) {
        $error = "❌ Error: " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Edit SubCategory</title>
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
  <link href="../assets/css/style.css" rel="stylesheet" />
</head>
<body>

<?php include('header.php'); ?>

<main id="main" class="main page-wrapper">
  <div class="pagetitle">
    <h1>Edit SubCategory</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li><a href="subcategory.php">/SubCategory Management</a></li>
       
      </ol>
    </nav>
  </div>

  <?php if ($success): ?>
    <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
  <?php elseif ($error): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <section class="section">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Edit SubCategory</h5>
        <form method="POST" enctype="multipart/form-data">
          <div class="row">

            <div class="col-lg-6">
              <div class="mb-3 row">
                <label class="col-sm-4 col-form-label">Parent Category</label>
                <div class="col-sm-8">
                  <select name="category_id" class="form-control" required>
                    <option value="">-- Select Category --</option>
                    <?php foreach ($categories as $cat): ?>
                      <option value="<?= $cat['id'] ?>" <?= $cat['id'] == $subcategory['category_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($cat['category_name']) ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="mb-3 row">
                <label class="col-sm-4 col-form-label">SubCategory Name</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="subcategory_name" id="subcategory_name" value="<?= htmlspecialchars($subcategory['subcategory_name']) ?>" required>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="mb-3 row">
                <label class="col-sm-4 col-form-label">Current Image</label>
                <div class="col-sm-8">
                  <?php if (!empty($subcategory['subcategory_image'])): ?>
                    <img src="<?= htmlspecialchars($subcategory['subcategory_image']) ?>" alt="Subcategory Image" style="width:50px; border-radius: 50%;">
                  <?php else: ?>
                    No image uploaded.
                  <?php endif; ?>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="mb-3 row">
                <label class="col-sm-4 col-form-label">Upload New Image</label>
                <div class="col-sm-8">
                  <input type="file" class="form-control" name="subcategory_image" accept="image/*">
                  <small class="form-text text-muted">Leave empty if you don't want to change the image.</small>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="mb-3 row">
                <label class="col-sm-4 col-form-label">Meta Title</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="meta_title" value="<?= htmlspecialchars($subcategory['meta_title']) ?>" required>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="mb-3 row">
                <label class="col-sm-4 col-form-label">Meta Description</label>
                <div class="col-sm-8">
                  <textarea class="form-control" name="meta_description" rows="2" required><?= htmlspecialchars($subcategory['meta_description']) ?></textarea>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="mb-3 row">
                <label class="col-sm-4 col-form-label">Slug</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="slug" id="slug" value="<?= htmlspecialchars($subcategory['slug']) ?>" readonly required>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="mb-3 row">
                <label class="col-sm-4 col-form-label">Meta Keywords</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="meta_keywords" value="<?= htmlspecialchars($subcategory['meta_keywords']) ?>" required>
                </div>
              </div>
            </div>

          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Update SubCategory</button>
            <a href="../subcategory_management.php" class="btn btn-secondary">Cancel</a>
          </div>
        </form>
      </div>
    </div>
  </section>
</main>

<script>
document.getElementById('subcategory_name').addEventListener('input', function () {
  const slug = this.value.toLowerCase()
      .trim()
      .replace(/[^a-z0-9\s-]/g, '')
      .replace(/\s+/g, '-')
      .replace(/-+/g, '-');
  document.getElementById('slug').value = slug;
});
</script>

<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/boxicons/js/boxicons.min.js"></script>
<script src="../assets/js/main.js"></script>

</body>
</html>
