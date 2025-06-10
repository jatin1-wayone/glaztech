<?php
session_start();

// Block access if not logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php"); // Redirect to login
    exit();
}
?>
<?php

require_once 'db.php';

// Validate ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid ID.");
}

$id = (int)$_GET['id'];

// Fetch existing banner
$stmt = $pdo->prepare("SELECT * FROM slider WHERE id = ?");
$stmt->execute([$id]);
$banner = $stmt->fetch();

if (!$banner) {
    die("Banner not found.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['title'] ?? '');
    $page_url = trim($_POST['page_url'] ?? '');
    $subtitle = trim($_POST['subtitle'] ?? '');
    $description = trim($_POST['description'] ?? '');

    $imagePath = $banner['image']; // Keep existing image

    // Handle image upload if a new one is provided
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/slider/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $imageName = basename($_FILES['image']['name']);
        $safeName = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $imageName);
        $targetFile = $uploadDir . $safeName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            // Delete old image if exists
            if (!empty($banner['image']) && file_exists($banner['image'])) {
                unlink($banner['image']);
            }
            $imagePath = $targetFile;
        } else {
            echo "<script>alert('Failed to upload new image. Keeping old image.');</script>";
        }
    }

    // Update DB
    if ($title && $page_url && $subtitle && $description) {
        try {
            $stmt = $pdo->prepare("UPDATE slider SET title = :title, page_url = :page_url, subtitle = :subtitle, description = :description, image = :image WHERE id = :id");
            $stmt->execute([
                ':title' => $title,
                ':page_url' => $page_url,
                ':subtitle' => $subtitle,
                ':description' => $description,
                ':image' => $imagePath,
                ':id' => $id
            ]);
            $_SESSION['success_message'] = "Banner updated successfully.";
            header("Location: slider.php");
            exit;
        } catch (PDOException $e) {
            echo "<script>alert('Failed to update banner.');</script>";
        }
    } else {
        echo "<script>alert('Please fill in all fields.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Edit Banner</title>
    <link rel="stylesheet" href="../assets/css/vendors/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
</head>
<body>

<?php require_once 'header.php'; ?>

<main class="container mt-4" style="max-width: 700px;">
    <h3>Edit Banner</h3>
    <form action="slider-edit.php?id=<?= $banner['id'] ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Title *</label>
            <input type="text" id="title" name="title" class="form-control" value="<?= htmlspecialchars($banner['title']) ?>" required />
        </div>

        <div class="mb-3">
            <label for="page_url" class="form-label">Page URL *</label>
            <input type="text" id="page_url" name="page_url" class="form-control" value="<?= htmlspecialchars($banner['page_url']) ?>" required />
        </div>

        <div class="mb-3">
            <label for="subtitle" class="form-label">Subtitle *</label>
            <input type="text" id="subtitle" name="subtitle" class="form-control" value="<?= htmlspecialchars($banner['subtitle']) ?>" required />
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description *</label>
            <textarea id="description" name="description" rows="4" class="form-control" required><?= htmlspecialchars($banner['description']) ?></textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image (optional - upload to replace)</label><br>
            <?php if (!empty($banner['image'])): ?>
                <img src="<?= htmlspecialchars($banner['image']) ?>" style="max-width: 200px;" class="mb-2"><br>
            <?php endif; ?>
            <input type="file" id="image" name="image" accept="image/*" class="form-control" />
        </div>

        <button type="submit" class="btn btn-primary">Update Banner</button>
        <a href="slider.php" class="btn btn-secondary">Cancel</a>
    </form>
</main>

<script src="../assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
