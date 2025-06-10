<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php"); // Redirect to login
    exit();
}
require_once('db.php');

// Fetch ID
$id = $_GET['id'] ?? $_POST['id'] ?? null;
if (!$id || !is_numeric($id)) {
    $_SESSION['error_message'] = "Invalid product ID.";
    header("Location: headerproduct.php");
    exit;
}

// Fetch product
try {
    $stmt = $pdo->prepare("SELECT * FROM headerproducts WHERE id = ?");
    $stmt->execute([$id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        $_SESSION['error_message'] = "Product not found.";
        header("Location: headerproduct.php");
        exit;
    }
} catch (PDOException $e) {
    die("DB Error: " . $e->getMessage());
}

// Fetch categories
try {
    $catStmt = $pdo->query("SELECT id, category_name FROM categories ORDER BY category_name ASC");
    $categories = $catStmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Category DB Error: " . $e->getMessage());
}

// Handle POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['product_name'] ?? '');
    $slug = trim($_POST['product_slug'] ?? '');
    $description = $_POST['product_description'] ?? '';
    $short_description = $_POST['short_description'] ?? '';
    $category_id = $_POST['category_id'] ?? null;
    $image = $_FILES['product_image'] ?? null;
    $images2 = $_FILES['product_images'] ?? null;

    if ($name === '' || $slug === '' || !$category_id) {
        $_SESSION['error_message'] = "Product name, slug, and category are required.";
        header("Location: editheaderproduct.php?id=$id");
        exit;
    }

    $uploadDir = "uploads/headerproducts/";
    $imageName = $product['product_image']; // default

    // Upload thumbnail
    if ($image && $image['error'] === UPLOAD_ERR_OK) {
        $ext = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if (!in_array($ext, $allowed)) {
            $_SESSION['error_message'] = "Invalid image format for thumbnail.";
            header("Location: editheaderproduct.php?id=$id");
            exit;
        }

        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

        $newImageName = time() . "_" . basename($image['name']);
        $newImagePath = $uploadDir . $newImageName;

        if (move_uploaded_file($image['tmp_name'], $newImagePath)) {
            if (!empty($product['product_image']) && file_exists($uploadDir . $product['product_image'])) {
                unlink($uploadDir . $product['product_image']);
            }
            $imageName = $newImageName;
        } else {
            $_SESSION['error_message'] = "Failed to upload thumbnail image.";
            header("Location: editheaderproduct.php?id=$id");
            exit;
        }
    }

    // Upload multiple product images
    if ($images2 && isset($images2['name']) && is_array($images2['name'])) {
        foreach ($images2['name'] as $key => $imgName) {
            if ($images2['error'][$key] === UPLOAD_ERR_OK) {
                $ext = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
                $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

                if (!in_array($ext, $allowed)) continue;

                $uniqueName = time() . "_" . basename($imgName);
                $targetPath = $uploadDir . $uniqueName;

                if (move_uploaded_file($images2['tmp_name'][$key], $targetPath)) {
                    $imgStmt = $pdo->prepare("INSERT INTO product_images (product_id, image_path) VALUES (:product_id, :image_path)");
                    $imgStmt->execute([
                        ':product_id' => $id,
                        ':image_path' => $uniqueName
                    ]);
                }
            }
        }
    }

    // Update the product
    try {
        $stmt = $pdo->prepare("UPDATE headerproducts SET
            product_name = :name,
            product_slug = :slug,
            product_description = :description,
             short_description = :short_description,
            product_image = :image,
            category_id = :category_id
            WHERE id = :id
        ");
        $stmt->execute([
            ':name' => $name,
            ':slug' => $slug,
            ':description' => $description,
            ':short_description' => $short_description,

            ':image' => $imageName,
            ':category_id' => $category_id,
            ':id' => $id
        ]);

        $_SESSION['success_message'] = "Product updated successfully.";
        header("Location: headerproduct.php");
        exit;

    } catch (PDOException $e) {
        $_SESSION['error_message'] = "Update failed: " . $e->getMessage();
        header("Location: editheaderproduct.php?id=$id");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Edit Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen" />
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
</head>
<body>

<?php require_once 'header.php'; ?>

<main class="page-wrapper compact-wrapper" id="pageWrapper">
    <div class="container mt-4">
        <div class="card">
            <div class="card-header"><h5>Edit Product</h5></div>
            <div class="card-body">

                <?php if (!empty($_SESSION['error_message'])): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($_SESSION['error_message']) ?></div>
                    <?php unset($_SESSION['error_message']); ?>
                <?php endif; ?>

                <?php if (!empty($_SESSION['success_message'])): ?>
                    <div class="alert alert-success"><?= htmlspecialchars($_SESSION['success_message']) ?></div>
                    <?php unset($_SESSION['success_message']); ?>
                <?php endif; ?>

                <form action="editheaderproduct.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($product['id']) ?>" />

                    <div class="form-group mb-3">
                        <label for="product_name">Product Name <span class="text-danger">*</span></label>
                        <input type="text" id="product_name" name="product_name" class="form-control" required value="<?= htmlspecialchars($product['product_name']) ?>" />
                    </div>

                    <div class="form-group mb-3">
                        <label for="product_slug">Product Slug <span class="text-danger">*</span></label>
                        <input type="text" id="product_slug" name="product_slug" class="form-control" required value="<?= htmlspecialchars($product['product_slug']) ?>" />
                    </div>

                    <div class="form-group mb-3">
                        <label for="product_description">Product Description</label>
                        <textarea id="product_description" name="product_description" class="form-control" rows="6"><?= htmlspecialchars($product['product_description']) ?></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="short_description">short_Description</label>
                        <textarea id="short_description" name="short_description" class="form-control" rows="6"><?= htmlspecialchars($product['short_description']) ?></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="category_id">Category <span class="text-danger">*</span></label>
                        <select name="category_id" id="category_id" class="form-control" required>
                            <option value="">-- Select Category --</option>
                            <?php foreach ($categories as $cat): ?>
                                <option value="<?= $cat['id'] ?>" <?= $product['category_id'] == $cat['id'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($cat['category_name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <?php if (!empty($product['product_image']) && file_exists("uploads/headerproducts/" . $product['product_image'])): ?>
                        <div class="form-group mb-3">
                            <label>Current Thumbnail:</label><br />
                            <img src="uploads/headerproducts/<?= htmlspecialchars($product['product_image']) ?>" alt="Product Image" style="max-width: 200px;" />
                        </div>
                    <?php endif; ?>

                    <div class="form-group mb-3">
                        <label for="product_image">Thumbnail Image</label>
                        <input type="file" id="product_image" name="product_image" accept="image/*" class="form-control" />
                    </div>

                    <div class="form-group mb-3">
                        <label for="product_images">Additional Product Images</label>
                        <input type="file" id="product_images" name="product_images[]" accept="image/*" multiple class="form-control" />
                    </div>

                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Update Product</button>
                        <a href="headerproduct.php" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <?php require_once 'footer.php'; ?>
</main>

<script src="../assets/js/vendors/jquery/dist/jquery.min.js"></script>
<script src="../assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
    CKEDITOR.replace('product_description');

    document.getElementById('product_name').addEventListener('keyup', function () {
        let slug = this.value.toLowerCase().trim()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');
        document.getElementById('product_slug').value = slug;
    });
</script>
</body>
</html>
