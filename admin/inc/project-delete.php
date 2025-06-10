<?php
require_once 'db.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];

    // Fetch the project to get image path
    $stmt = $pdo->prepare("SELECT image FROM product WHERE id = ?");
    $stmt->execute([$id]);
    $project = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($project) {
        // Delete the image file if it exists
        if (!empty($project['image']) && file_exists($project['image'])) {
            unlink($project['image']);
        }

        // Delete the project record
        $delStmt = $pdo->prepare("DELETE FROM product WHERE id = ?");
        if ($delStmt->execute([$id])) {
            // Redirect back with success message
            header("Location: project.php?msg=deleted");
            exit;
        } else {
            echo "Failed to delete the project from the database.";
        }
    } else {
        echo "Project not found.";
    }
} else {
    echo "Invalid project ID.";
}
?>
