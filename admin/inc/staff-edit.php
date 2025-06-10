<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php"); // Redirect to login
    exit();
}
require_once('db.php'); // Ensure $pdo is your PDO connection

// Get the staff id from GET parameter
$id = $_GET['id'] ?? null;
if (!$id || !is_numeric($id)) {
    header("Location: staff.php");
    exit;
}

try {
    // Fetch existing staff data
    $stmt = $pdo->prepare("SELECT * FROM staff WHERE id = ?");
    $stmt->execute([$id]);
    $staff = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$staff) {
        $_SESSION['error_message'] = "Staff not found.";
        header("Location: staff.php");
        exit;
    }
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name'] ?? '');
    $post_name = trim($_POST['post_name'] ?? '');
    $short_description = trim($_POST['short_description'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $image = $_FILES['image'] ?? null;

    if (!empty($name) && !empty($post_name)) {
        $uploadDir = "admin/inc/uploads/staff/";
        $imageName = $staff['image']; // default to old image

        // Check if a new image is uploaded
        if ($image && $image['error'] === 0) {
            // Create directory if not exists
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            // Generate new image name
            $imageName = time() . "_" . basename($image['name']);
            $imagePath = $uploadDir . $imageName;

            if (move_uploaded_file($image['tmp_name'], $imagePath)) {
                // Optionally delete old image file
                if ($staff['image'] && file_exists($uploadDir . $staff['image'])) {
                    unlink($uploadDir . $staff['image']);
                }
            } else {
                $_SESSION['error_message'] = "Failed to upload new image.";
                header("Location: staff-edit.php?id=$id");
                exit;
            }
        }

        try {
            // Update staff record
            $stmt = $pdo->prepare("
                UPDATE staff SET
                    name = :name,
                    post_name = :post_name,
                    short_description = :short_description,
                    description = :description,
                    image = :image
                WHERE id = :id
            ");
            $stmt->execute([
                ':name' => $name,
                ':post_name' => $post_name,
                ':short_description' => $short_description,
                ':description' => $description,
                ':image' => $imageName,
                ':id' => $id,
            ]);

            $_SESSION['success_message'] = "Staff updated successfully.";
            header("Location: staff.php");
            exit;
        } catch (PDOException $e) {
            $_SESSION['error_message'] = "Failed to update staff. Please try again.";
        }
    } else {
        $_SESSION['error_message'] = "Please fill in all required fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Staff</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assets/css/style.css">
    <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
</head>
<body>

<?php require_once 'header.php'; ?>

<main class="page-wrapper compact-wrapper" id="pageWrapper">
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h5>Edit Staff</h5>
            </div>
            <div class="card-body">
                <?php
                if (!empty($_SESSION['error_message'])) {
                    echo '<div class="alert alert-danger">' . $_SESSION['error_message'] . '</div>';
                    unset($_SESSION['error_message']);
                }
                if (!empty($_SESSION['success_message'])) {
                    echo '<div class="alert alert-success">' . $_SESSION['success_message'] . '</div>';
                    unset($_SESSION['success_message']);
                }
                ?>
                <form action="staff-edit.php?id=<?= $staff['id'] ?>"<?php echo htmlspecialchars($id); ?>" method="POST" enctype="multipart/form-data">
                    <!-- Name -->
                    <div class="form-group mb-3">
                        <label for="name">Name<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="name" name="name" required value="<?php echo htmlspecialchars($staff['name']); ?>">
                    </div>

                    <!-- Post Name -->
                    <div class="form-group mb-3">
                        <label for="post_name">Post Name<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="post_name" name="post_name" required value="<?php echo htmlspecialchars($staff['post_name']); ?>">
                    </div>

                    <!-- Short Description -->
                    <div class="form-group mb-3">
                        <label for="short_description">Short Description</label>
                        <input class="form-control" type="text" id="short_description" name="short_description" value="<?php echo htmlspecialchars($staff['short_description']); ?>">
                    </div>

                    <!-- Description -->
                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4"><?php echo htmlspecialchars($staff['description']); ?></textarea>
                    </div>

                    <!-- Existing Image -->
                    <?php if ($staff['image'] && file_exists("admin/inc/uploads/staff/" . $staff['image'])): ?>
                        <div class="form-group mb-3">
                            <label>Current Image:</label><br>
                            <img src="<?php echo 'admin/inc/uploads/staff/' . htmlspecialchars($staff['image']); ?>" alt="Current Image" style="max-width: 200px; height: auto;">
                        </div>
                    <?php endif; ?>

                    <!-- Image Upload -->
                    <div class="form-group mb-3">
                        <label for="image">Upload New Image (optional)</label>
                        <input class="form-control" type="file" id="image" name="image" accept="image/*">
                    </div>

                    <!-- Submit -->
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Update Staff</button>
                        <a href="staff.php" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php require_once 'footer.php'; ?>
</main>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<script src="../assets/js/vendors/jquery/dist/jquery.min.js"></script>
<script src="../assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/script.js"></script>
</body>
</html>
