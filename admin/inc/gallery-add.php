<?php
require_once 'db.php';
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php"); // Redirect to login
    exit();
}
session_start();

function uploadFile($inputName, $targetDir) {
    if (!empty($_FILES[$inputName]['name'])) {
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $filename = time() . '_' . basename($_FILES[$inputName]['name']);
        $filepath = $targetDir . $filename;
        move_uploaded_file($_FILES[$inputName]['tmp_name'], $filepath);
        return $filepath;
    }
    return null;
}

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $current_project_name = trim($_POST['current_project_name']);
        $short_description = trim($_POST['short_description'] ?? '');
        $description = trim($_POST['description'] ?? '');

        if (empty($current_project_name)) {
            throw new Exception("Project name is required.");
        }

        $current_project_image = uploadFile('current_project_image', 'uploads/current/');
        $image = uploadFile('image', 'uploads/images/');

        $stmt = $pdo->prepare("
            INSERT INTO gallery_blog (
                current_project_name,
                current_project_image,
                image,
                short_description,
                description
            ) VALUES (?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $current_project_name,
            $current_project_image,
            $image,
            $short_description,
            $description
        ]);

        $success = "Project added successfully.";
    } catch (Exception $e) {
        $error = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Project - Glaztech</title>
    <link rel="stylesheet" href="assets/css/vendors/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
<?php require_once 'header.php'; ?>

<main class="page-wrapper compact-wrapper" id="pageWrapper">
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h5>Add New Project</h5>
            </div>
            <div class="card-body">
                <?php if (!empty($success)): ?>
                    <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
                <?php elseif (!empty($error)): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>

                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="image" class="form-label">Image (optional)</label><br>
                        <input type="file" class="form-control" name="image" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label for="current_project_image" class="form-label">Current Project Image (optional)</label><br>
                        <input type="file" class="form-control" name="current_project_image" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label for="short_description" class="form-label">Short Description</label>
                        <input type="text" class="form-control" name="short_description" id="short_description">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Full Description</label>
                        <textarea class="form-control" name="description" id="description" rows="4"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="current_project_name" class="form-label">Current Project Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="current_project_name" required>
                    </div>

                    <button type="submit" class="btn btn-success">Add Project</button>
                    <a href="gallery-blog.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</main>

<style>
.page-wrapper {
    position: relative;
    width: 81%;
    margin-left: auto;
}
</style>

<script src="assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<?php require_once 'footer.php'; ?>
</body>
</html>
