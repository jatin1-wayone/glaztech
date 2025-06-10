<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit();
}

require 'db.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];

    try {
        // Fetch image path
        $stmt = $pdo->prepare("SELECT subcategory_image FROM subcategories WHERE id = ?");
        $stmt->execute([$id]);
        $subcategory = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($subcategory) {
            // Delete image file if exists
            if (!empty($subcategory['subcategory_image']) && file_exists('' . $subcategory['subcategory_image'])) {
                unlink('' . $subcategory['subcategory_image']);
            }

            // Delete the subcategory
            $stmt = $pdo->prepare("DELETE FROM subcategories WHERE id = ?");
            $stmt->execute([$id]);
        }

        header('Location: subcategory.php?msg=deleted');
        exit();

    } catch (PDOException $e) {
        echo "Error deleting subcategory: " . htmlspecialchars($e->getMessage());
    }
} else {
    header('Location:subcategory.php');
    exit();
}
