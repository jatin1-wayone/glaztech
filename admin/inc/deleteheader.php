<?php
session_start();
require_once('db.php'); // $pdo connection

// Get the product id from GET parameter
$id = $_GET['id'] ?? null;

if (!$id || !is_numeric($id)) {
    $_SESSION['error_message'] = "Invalid product ID.";
    header("Location: headerproduct.php");
    exit;
}

try {
    // Fetch the product image filename to delete the file
    $stmt = $pdo->prepare("SELECT product_image FROM headerproducts WHERE id = ?");
    $stmt->execute([$id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        $_SESSION['error_message'] = "Product not found.";
        header("Location: headerproduct.php");
        exit;
    }

    // Delete the product record from database
    $stmt = $pdo->prepare("DELETE FROM headerproducts WHERE id = ?");
    $stmt->execute([$id]);

    // Delete the image file from server if it exists
    $uploadDir = "uploads/";
    $imagePath = $uploadDir . $product['product_image'];
    if (!empty($product['product_image']) && file_exists($imagePath)) {
        unlink($imagePath);
    }

    $_SESSION['success_message'] = "Product deleted successfully.";
    header("Location: headerproduct.php");
    exit;
} catch (PDOException $e) {
    $_SESSION['error_message'] = "Error deleting product: " . $e->getMessage();
    header("Location: headerproduct.php");
    exit;
}
?>
