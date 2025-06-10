<?php
require_once 'db.php';
session_start();

// Validate and get the ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['error'] = "Invalid project ID.";
    header("Location: gallery-blog.php");
    exit;
}

$id = (int) $_GET['id'];

// Fetch the project to delete associated files
$stmt = $pdo->prepare("SELECT * FROM gallery_blog WHERE id = ?");
$stmt->execute([$id]);
$project = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$project) {
    $_SESSION['error'] = "Project not found.";
    header("Location: gallery-blog.php");
    exit;
}

// Delete image files if they exist
function deleteFile($filepath) {
    if ($filepath && file_exists($filepath)) {
        unlink($filepath);
    }
}

deleteFile($project['image']);
deleteFile($project['video']);
deleteFile($project['current_project_image']);

// Delete the project record
$stmt = $pdo->prepare("DELETE FROM gallery_blog WHERE id = ?");
$stmt->execute([$id]);

$_SESSION['success'] = "Project deleted successfully!";
header("Location: gallery-blog.php");
exit;
