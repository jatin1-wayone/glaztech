<?php
require_once 'db.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];

    // Fetch slider to get image path
    $stmt = $pdo->prepare("SELECT image FROM slider WHERE id = ?");
    $stmt->execute([$id]);
    $slider = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($slider) {
        // Delete image file if it exists
        if (!empty($slider['image']) && file_exists($slider['image'])) {
            unlink($slider['image']);
        }

        // Delete slider record
        $delStmt = $pdo->prepare("DELETE FROM slider WHERE id = ?");
        if ($delStmt->execute([$id])) {
            header("Location: slider.php?msg=deleted");
            exit;
        } else {
            echo "Failed to delete the slider.";
        }
    } else {
        echo "Slider not found.";
    }
} else {
    echo "Invalid request.";
}
?>
