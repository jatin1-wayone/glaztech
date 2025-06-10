<?php
session_start();
require_once('db.php'); // Assumes $pdo is your PDO connection

// Get the service ID from the URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Validate ID
if ($id <= 0) {
    $_SESSION['error_message'] = "Invalid service ID.";
    header("Location: services.php");
    exit;
}

try {
    // Check if the service exists
    $stmt = $pdo->prepare("SELECT * FROM services WHERE id = ?");
    $stmt->execute([$id]);
    $service = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$service) {
        $_SESSION['error_message'] = "Service not found.";
        header("Location: services.php");
        exit;
    }

    // Delete the service
    $stmt = $pdo->prepare("DELETE FROM services WHERE id = ?");
    $stmt->execute([$id]);

    $_SESSION['success_message'] = "Service deleted successfully.";
    header("Location: services.php");
    exit;
} catch (PDOException $e) {
    $_SESSION['error_message'] = "Failed to delete service. Please try again.";
    header("Location: services.php");
    exit;
}
?>