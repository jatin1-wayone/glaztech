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

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid ID");
}
$id = (int)$_GET['id'];

// Fetch existing project
$stmt = $pdo->prepare("SELECT * FROM gallery_blog WHERE id = ?");
$stmt->execute([$id]);
$project = $stmt->fetch();

if (!$project) {
    die("Project not found.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $current_project_name = trim($_POST['current_project_name']);

        $new_current_project_image = uploadFile('current_project_image', 'uploads/current/');
        $new_image = uploadFile('image', 'uploads/images/');

        $updateFields = "current_project_name = ?";
        $params = [$current_project_name];

        if ($new_current_project_image) {
            $updateFields .= ", current_project_image = ?";
            $params[] = $new_current_project_image;

            // Optional: delete old file
            if ($project['current_project_image'] && file_exists($project['current_project_image'])) {
                unlink($project['current_project_image']);
            }
        }

        if ($new_image) {
            $updateFields .= ", image = ?";
            $params[] = $new_image;

            if ($project['image'] && file_exists($project['image'])) {
                unlink($project['image']);
            }
        }

        $params[] = $id;
        $stmt = $pdo->prepare("UPDATE gallery_blog SET $updateFields WHERE id = ?");
        $stmt->execute($params);

        $success = "Project updated successfully.";

        // Refresh the project data
        $stmt = $pdo->prepare("SELECT * FROM gallery_blog WHERE id = ?");
        $stmt->execute([$id]);
        $project = $stmt->fetch();

    } catch (PDOException $e) {
        $error = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Project - Glaztech</title>
    <link rel="stylesheet" href="assets/css/vendors/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
<?php require_once 'header.php'; ?>

<main class="page-wrapper compact-wrapper" id="pageWrapper">
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h5>Edit Project</h5>
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
                        <?php if (!empty($project['image'])): ?>
                            <img src="<?= htmlspecialchars($project['image']) ?>" style="max-width: 150px;"><br>
                        <?php endif; ?>
                        <input type="file" class="form-control" name="image" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label for="current_project_image" class="form-label">Current Project Image (optional)</label><br>
                        <?php if (!empty($project['current_project_image'])): ?>
                            <img src="<?= htmlspecialchars($project['current_project_image']) ?>" style="max-width: 150px;"><br>
                        <?php endif; ?>
                        <input type="file" class="form-control" name="current_project_image" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label for="current_project_name" class="form-label">Current Project Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="current_project_name"
                               value="<?= htmlspecialchars($project['current_project_name']) ?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Project</button>
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
