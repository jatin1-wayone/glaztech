<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php"); // Redirect to login
    exit();
}
require_once('db.php'); // Ensure $pdo is defined

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name'] ?? '');
    $post_name = trim($_POST['post_name'] ?? '');
    $short_description = trim($_POST['short_description'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $image = $_FILES['image'] ?? null;

    if (!empty($name) && !empty($post_name) && $image && $image['error'] === 0) {
        $uploadDir = "admin/inc/uploads/staff/";
        
        // Create directory if it doesn't exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true); // 0755 is safe for directories
        }
    
        $imageName = time() . "_" . basename($image['name']);
        $imagePath = $uploadDir . $imageName;
    
        if (move_uploaded_file($image['tmp_name'], $imagePath)) {
            try {
                $stmt = $pdo->prepare("
                    INSERT INTO staff (name, post_name, short_description, description, image)
                    VALUES (:name, :post_name, :short_description, :description, :image)
                ");
                $stmt->execute([
                    ':name' => $name,
                    ':post_name' => $post_name,
                    ':short_description' => $short_description,
                    ':description' => $description,
                    ':image' => $imageName
                ]);

                $_SESSION['success_message'] = "Staff added successfully.";
                header("Location: staff.php");
                exit;
            } catch (PDOException $e) {
                $_SESSION['error_message'] = "Failed to add staff. Please try again.";
            }
        } else {
            $_SESSION['error_message'] = "Failed to upload image.";
        }
    } else {
        $_SESSION['error_message'] = "Please fill in all required fields and upload a valid image.";
    }
}
?>

<style>
.page-wrapper {
    position: relative;
    width: 81%;
    margin-left: auto;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Staff</title>
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
                <h5>Add Staff</h5>
            </div>
            <div class="card-body">
                <?php
                if (!empty($_SESSION['error_message'])) {
                    echo '<div class="alert alert-danger">' . $_SESSION['error_message'] . '</div>';
                    unset($_SESSION['error_message']);
                }
                ?>
                <form action="staff-add.php" method="POST" enctype="multipart/form-data">
                    <!-- Name -->
                    <div class="form-group mb-3">
                        <label for="name">Name<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="name" name="name" required placeholder="Enter name">
                    </div>

                    <!-- Post Name -->
                    <div class="form-group mb-3">
                        <label for="post_name">Post Name<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="post_name" name="post_name" required placeholder="Enter post title">
                    </div>

                    <!-- Short Description -->
                    <div class="form-group mb-3">
                        <label for="short_description">Short Description</label>
                        <input class="form-control" type="text" id="short_description" name="short_description" placeholder="Enter short description">
                    </div>

                    <!-- Description -->
                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter full description"></textarea>
                    </div>

                    <!-- Image Upload -->
                    <div class="form-group mb-3">
                        <label for="image">Upload Image<span class="text-danger">*</span></label>
                        <input class="form-control" type="file" id="image" name="image" accept="image/*" required>
                    </div>

                    <!-- Submit -->
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Add Staff</button>
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
