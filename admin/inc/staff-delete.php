<?php
session_start();
require_once('db.php'); // Ensure $pdo is your PDO connection

// Get the staff id from the GET parameter
$id = $_GET['id'] ?? null;

if (!$id || !is_numeric($id)) {
    $_SESSION['error_message'] = "Invalid staff ID.";
    header("Location: staff.php");
    exit;
}

try {
    // Fetch the staff record to delete (to get image name)
    $stmt = $pdo->prepare("SELECT image FROM staff WHERE id = ?");
    $stmt->execute([$id]);
    $staff = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$staff) {
        $_SESSION['error_message'] = "Staff not found.";
        header("Location: staff.php");
        exit;
    }

    // Delete the staff record
    $stmt = $pdo->prepare("DELETE FROM staff WHERE id = ?");
    $stmt->execute([$id]);

    // Delete the image file if it exists
    $uploadDir = "admin/inc/uploads/staff/";
    $imagePath = $uploadDir . $staff['image'];
    if (!empty($staff['image']) && file_exists($imagePath)) {
        unlink($imagePath);
    }

    $_SESSION['success_message'] = "Staff deleted successfully.";
    header("Location: staff.php");
    exit;
} catch (PDOException $e) {
    $_SESSION['error_message'] = "Error deleting staff. Please try again.";
    header("Location: staff.php");
    exit;
}
?>