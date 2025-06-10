<?php
session_start();

// Block access if not logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php"); // Redirect to login
    exit();
}
?>
<?php

require_once('db.php'); // Ensure $pdo is defined

// Fetch categories from the database
try {
    $stmt = $pdo->query("SELECT id, category_name FROM categories ORDER BY category_name ASC");
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching categories: " . $e->getMessage());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['product_name'] ?? '');
    $slug = trim($_POST['product_slug'] ?? '');
    $description = trim($_POST['product_description'] ?? '');
    $short_description = trim($_POST['short_description'] ?? '');
    $category_id = $_POST['category_id'] ?? null;
    $thumbnail = $_FILES['product_image'] ?? null;
    $images = $_FILES['product_images'] ?? null;

    if (!empty($name) && !empty($slug) && $thumbnail && $thumbnail['error'] === 0 && $category_id) {
        $uploadDir = "uploads/headerproducts/";
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

        $thumbnailName = time() . "_" . basename($thumbnail['name']);
        $thumbnailPath = $uploadDir . $thumbnailName;

        if (move_uploaded_file($thumbnail['tmp_name'], $thumbnailPath)) {
            try {
                // Insert main product
                $stmt = $pdo->prepare("
                    INSERT INTO headerproducts (product_name, product_slug, product_description, short_description,product_image, category_id)
                    VALUES (:name, :slug, :description,:short_description, :image, :category_id)
                ");
                $stmt->execute([
                    ':name' => $name,
                    ':slug' => $slug,
                    ':description' => $description,
                    ':short_description' => $short_description,
                    ':image' => $thumbnailName,
                    ':category_id' => $category_id
                ]);

                $product_id = $pdo->lastInsertId();

                // Handle multiple images
                if ($images && isset($images['name']) && is_array($images['name'])) {
                    foreach ($images['name'] as $key => $imgName) {
                        if ($images['error'][$key] === 0) {
                            $uniqueName = time() . "_" . basename($images['name'][$key]);
                            $targetPath = $uploadDir . $uniqueName;
                            if (move_uploaded_file($images['tmp_name'][$key], $targetPath)) {
                                $imgStmt = $pdo->prepare("
                                    INSERT INTO product_images (product_id, image_path) VALUES (:product_id, :image_path)
                                ");
                                $imgStmt->execute([
                                    ':product_id' => $product_id,
                                    ':image_path' => $uniqueName
                                ]);
                            }
                        }
                    }
                }

                $_SESSION['success_message'] = "Product and images added successfully.";
                header("Location: headerproduct.php");
                exit;

            } catch (PDOException $e) {
                $_SESSION['error_message'] = "Database error: " . $e->getMessage();
            }
        } else {
            $_SESSION['error_message'] = "Failed to upload thumbnail image.";
        }
    } else {
        $_SESSION['error_message'] = "Please fill in all required fields and upload a valid image.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/color-1.css" media="screen">
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
</head>
<body>

<?php require_once 'header.php'; ?>

<main class="page-wrapper compact-wrapper" id="pageWrapper">
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h5>Add Product</h5>
            </div>
            <div class="card-body">
                <?php if (!empty($_SESSION['error_message'])): ?>
                    <div class="alert alert-danger"><?= $_SESSION['error_message']; unset($_SESSION['error_message']); ?></div>
                <?php endif; ?>

                <form action="addheaderproduct.php" method="POST" enctype="multipart/form-data">
                    <!-- Product Name -->
                    <div class="form-group mb-3">
                        <label for="name">Product Name <span class="text-danger">*</span></label>
                        <input class="form-control" onkeyup="generateSlug(this.value)" type="text" id="name" name="product_name" required>
                    </div>

                    <!-- Slug -->
                    <div class="form-group mb-3">
                        <label for="slug">Product Slug <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="slug" name="product_slug" required>
                    </div>

                    <script>
                        function generateSlug(value) {
                            let slug = value.toLowerCase().trim().replace(/[^a-z0-9\s-]/g, '').replace(/\s+/g, '-').replace(/-+/g, '-');
                            document.getElementById('slug').value = slug;
                        }
                    </script>

                    <!-- Description -->
                    <div class="form-group mb-3">
                        <label for="description">Product Description</label>
                        <textarea class="form-control" id="description" name="product_description" rows="4"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="short_description">Short Description</label>
                        <textarea class="form-control" id="short_description" name="short_description" rows="4"></textarea>
                    </div>

                    <!-- Category Dropdown -->
                    <div class="form-group mb-3">
                        <label for="category">Category <span class="text-danger">*</span></label>
                        <select class="form-control" name="category_id" id="category" required>
                            <option value="">-- Select Category --</option>
                            <?php foreach ($categories as $cat): ?>
                                <option value="<?= htmlspecialchars($cat['id']) ?>"><?= htmlspecialchars($cat['category_name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Image -->
                    <div class="form-group mb-3">
                        <label for="image">Product Thumbnail Image <span class="text-danger">*</span></label>
                        <input class="form-control" type="file" id="image" name="product_image" accept="image/*" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="image">Product Images <span class="text-danger">*</span></label>
                        <input class="form-control" type="file" id="images" name="product_images[]" accept="image/*" multiple required>
                        </div>

                    <!-- Submit -->
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <?php require_once 'footer.php'; ?>
</main>

<!-- Scripts -->
<script>
    CKEDITOR.replace('description');

</script>
<script src="../assets/js/vendors/jquery/dist/jquery.min.js"></script>
<script src="../assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/script.js"></script>
</body>
</html>
