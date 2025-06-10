<?php
session_start();

// Block access if not logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php"); // Redirect to login
    exit();
}
?>
<?php

require_once('db.php');

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "<script>alert('No project ID specified.'); window.location.href='project.php';</script>";
    exit;
}

// Fetch existing data
$stmt = $pdo->prepare("SELECT * FROM product WHERE id = :id");
$stmt->execute([':id' => $id]);
$project = $stmt->fetch();

if (!$project) {
    echo "<script>alert('Project not found.'); window.location.href='project.php';</script>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_name = $_POST['project_name'] ?? '';
    $newImagePath = $project['image'];

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $targetDir = "projects/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        $originalName = basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
        $allowedTypes = ["jpg", "jpeg", "png", "gif", "webp"];

        if (in_array($extension, $allowedTypes)) {
            $uniqueName = time() . "_" . $originalName;
            $targetFile = $targetDir . $uniqueName;

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                // Optionally delete old image
                if (file_exists($project['image'])) {
                    unlink($project['image']);
                }
                $newImagePath = $targetFile;
            } else {
                echo "<script>alert('Failed to upload image.');</script>";
            }
        } else {
            echo "<script>alert('Invalid file type.');</script>";
        }
    }

    // Update query
    try {
        $stmt = $pdo->prepare("UPDATE product SET project_name = :project_name, image = :image WHERE id = :id");
        $stmt->execute([
            ':project_name' => $project_name,
            ':image' => $newImagePath,
            ':id' => $id
        ]);
        echo "<script>alert('Project updated successfully.'); window.location.href='project.php';</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Database error: " . $e->getMessage() . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Project - Glaztech</title>
    <link rel="stylesheet" href="../assets/css/style.css">
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
                    <form action="project-edit.php?id=<?= $project['id'] ?>"<?= htmlspecialchars($id) ?>" method="POST" enctype="multipart/form-data">
                        <!-- Project Name -->
                        <div class="form-group">
                            <label for="project_name">Project Name</label>
                            <input class="form-control" type="text" id="project_name" name="project_name"
                                   value="<?= htmlspecialchars($project['project_name']) ?>" required>
                        </div>

                        <!-- Current Image -->
                        <div class="form-group mt-3">
                            <label>Current Image:</label><br>
                            <img src="<?= htmlspecialchars($project['image']) ?>" alt="Project Image" style="max-width:200px;">
                        </div>

                        <!-- New Image Upload -->
                        <div class="form-group mt-3">
                            <label for="image">Replace Image (optional):</label>
                            <input class="form-control" type="file" id="image" name="image" accept="image/*">
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">Update Project</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php require_once 'footer.php'; ?>
    </main>
</body>
</html>
