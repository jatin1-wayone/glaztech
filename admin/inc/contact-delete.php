<?php
session_start();
require_once 'db.php'; // Assumes $pdo is defined here

// Get ID and validate
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    $_SESSION['error_message'] = "Invalid ID.";
    header("Location: contact-us.php"); // Replace with your listing page
    exit;
}

try {
    // Check if the record exists
    $stmt = $pdo->prepare("SELECT * FROM contact_queries WHERE id = ?");
    $stmt->execute([$id]);
    $query = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$query) {
        $_SESSION['error_message'] = "Contact query not found.";
        header("Location: contact-us.php");
        exit;
    }

    // Perform deletion
    $stmt = $pdo->prepare("DELETE FROM contact_queries WHERE id = ?");
    $stmt->execute([$id]);

    $_SESSION['success_message'] = "Contact query deleted successfully.";
    header("Location: contact-us.php");
    exit;
} catch (PDOException $e) {
    $_SESSION['error_message'] = "Failed to delete. Try again.";
    header("Location: contact-us.php");
    exit;
}
?>