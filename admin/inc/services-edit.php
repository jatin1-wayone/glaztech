<?php
session_start();

// Block access if not logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php"); // Redirect to login
    exit();
}
?>
<?php

require_once('db.php'); // Assumes $pdo is defined here

// Get service ID from query param and validate it
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    echo "<script>alert('Invalid service ID.'); window.location.href='services.php';</script>";
    exit;
}

// Initialize variables for form fields
$post = $post_description = $short_description = $description = '';

// Handle POST (update)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post = trim($_POST['post'] ?? '');
    $post_description = trim($_POST['post_description'] ?? '');
    $short_description = trim($_POST['short_description'] ?? '');
    $description = trim($_POST['description'] ?? '');

    if (!empty($post) && !empty($post_description)) {
        try {
            $stmt = $pdo->prepare("
                UPDATE services 
                SET post = :post, post_description = :post_description, short_description = :short_description, description = :description
                WHERE id = :id
            ");
            $stmt->execute([
                ':post' => $post,
                ':post_description' => $post_description,
                ':short_description' => $short_description,
                ':description' => $description,
                ':id' => $id
            ]);
            $_SESSION['success_message'] = "Service updated successfully.";
            header("Location: services.php");
            exit;
        } catch (PDOException $e) {
            echo "<script>alert('Failed to update service. Please try again later.');</script>";
        }
    } else {
        echo "<script>alert('Please fill in all required fields.');</script>";
    }
} else {
    // On GET, load current data
    $stmt = $pdo->prepare("SELECT * FROM services WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $service = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$service) {
        echo "<script>alert('Service not found.'); window.location.href='services.php';</script>";
        exit;
    }

    // Pre-fill variables
    $post = $service['post'];
    $post_description = $service['post_description'];
    $short_description = $service['short_description'];
    $description = $service['description'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Service</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
</head>
<body>

<div class="tap-top">
    <svg class="feather"><use href="#arrow-up"></use></svg>
</div>

<style>
.page-wrapper {
    position: relative;
    width: 81%;
    margin-left: auto;
}
</style>

<div class="loader-wrapper">
    <div class="loader"></div>
</div>

<?php require_once 'header.php'; ?>

<main class="page-wrapper compact-wrapper" id="pageWrapper">
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h5>Edit Service</h5>
            </div>
            <div class="card-body">
                <form action="services-edit.php?id=<?= $service['id'] ?>"<?php echo htmlspecialchars($id); ?>" method="POST">
                    <!-- post -->
                    <div class="form-group">
                        <label for="post">Post</label>
                        <input class="form-control" type="text" id="post" name="post" required placeholder="Enter post" value="<?php echo htmlspecialchars($post); ?>">
                    </div>
                    <!-- post description -->
                    <div class="form-group">
                        <label for="post_description">Post Description</label>
                        <input class="form-control" type="text" id="post_description" name="post_description" required placeholder="Enter short description" value="<?php echo htmlspecialchars($post_description); ?>">
                    </div>
                    <!-- Short Description -->
                    <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <input class="form-control" type="text" id="short_description" name="short_description" placeholder="Enter short description" value="<?php echo htmlspecialchars($short_description); ?>">
                    </div>

                    <!-- Description -->
                    <div class="form-group mt-3">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter full description"><?php echo htmlspecialchars($description); ?></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">Update Service</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php require_once 'footer.php'; ?>
</main>

<!-- Scripts -->
<script src="../assets/js/vendors/jquery/dist/jquery.min.js"></script>
<script src="../assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/config.js"></script>
<script src="../assets/js/sidebar.js"></script>
<script src="../assets/js/scrollbar/simplebar.js"></script>
<script src="../assets/js/scrollbar/custom.js"></script>
<script src="../assets/js/vendors/swiper/swiper-bundle.min.js"></script>
<script src="../assets/js/swiper/swiper-custom.js"></script>
<script src="../assets/js/theme-customizer/customizer.js"></script>
<script src="../assets/js/script.js"></script>

</body>
</html>
