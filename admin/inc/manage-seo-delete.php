<?php
require_once 'db.php'; // Make sure $pdo is your PDO connection

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];

    try {
        // Prepare delete statement
        $stmt = $pdo->prepare("DELETE FROM seo_setting WHERE id = ?");
        $stmt->execute([$id]);

        // Redirect back to the listing page with success message
        header("Location: manage-seo.php?msg=deleted");  // <-- Change here
        exit;
    } catch (PDOException $e) {
        die("Error deleting record: " . $e->getMessage());
    }
} else {
    // Invalid or missing ID, redirect back to listing page
    header("Location: manage-seo.php");  // <-- Change here
    exit;
}
?>
