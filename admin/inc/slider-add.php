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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['title'] ?? '');
    $page_url = trim($_POST['page_url'] ?? '');
    $subtitle = trim($_POST['subtitle'] ?? '');
    $description = trim($_POST['description'] ?? '');

    // Handle image upload
    $imagePath = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/slider/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $imageName = basename($_FILES['image']['name']);
        $targetFile = $uploadDir . time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $imageName);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $imagePath = $targetFile;
        } else {
            echo "<script>alert('Failed to upload image.');</script>";
        }
    }

    if ($title && $page_url && $subtitle && $description && $imagePath) {
        try {
            $stmt = $pdo->prepare("INSERT INTO slider (title, page_url, subtitle, description, image) VALUES (:title, :page_url, :subtitle, :description, :image)");
            $stmt->execute([
                ':title' => $title,
                ':page_url' => $page_url,
                ':subtitle' => $subtitle,
                ':description' => $description,
                ':image' => $imagePath
            ]);
            $_SESSION['success_message'] = "Banner added successfully.";
            header("Location: slider.php");
            exit;
        } catch (PDOException $e) {
            echo "<script>alert('Failed to add banner. Please try again later.');</script>";
        }
    } else {
        echo "<script>alert('Please fill in all fields and upload an image.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Add Banner</title>
    <link rel="stylesheet" href="../assets/css/vendors/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
</head>
<body>

<?php require_once 'header.php'; ?>

<main class="container mt-4" style="max-width: 700px;">
    <h3>Add Banner</h3>
    <form action="slider-add.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Title *</label>
            <input type="text" id="title" name="title"  class="form-control" />
        </div>
        <div class="mb-3">
            <label for="page_url" class="form-label">Page URL *</label>
            <input type="text" id="page_url" name="page_url" required class="form-control" />
        </div>
        <div class="mb-3">
            <label for="subtitle" class="form-label">Subtitle *</label>
            <input type="text" id="subtitle" name="subtitle"  class="form-control" />
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description *</label>
            <textarea id="description" name="description" rows="4" required class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image *</label>
            <input type="file" id="image" name="image" accept="image/*" required class="form-control" />
        </div>
        <button type="submit" class="btn btn-primary">Add Banner</button>
        <a href="slider- .php" class="btn btn-secondary">Cancel</a>
    </form>
</main>

<script src="../assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
