<?php
session_start();
require 'db.php'; // Adjust if your db.php is located elsewhere

// Ensure the admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit();
}

// Validate and sanitize the ID
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    try {
        // Step 1: Get the image path
        $stmt = $pdo->prepare("SELECT category_image FROM categories WHERE id = ?");
        $stmt->execute([$id]);
        $category = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($category) {
            // Step 2: Delete the image from the server
            $image_path = "" . $category['category_image'];
            if (file_exists($image_path)) {
                unlink($image_path);
            }

            // Step 3: Delete the category from the database
            $deleteStmt = $pdo->prepare("DELETE FROM categories WHERE id = ?");
            $deleteStmt->execute([$id]);

            // Redirect back to category page with success flag
            header('Location: category.php?deleted=1');
            exit();
        } else {
            echo "<p style='color:red;'>Category not found.</p>";
        }
    } catch (PDOException $e) {
        echo "<p style='color:red;'>Error deleting category: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
} else {
    echo "<p style='color:red;'>Invalid category ID.</p>";
}
?>
