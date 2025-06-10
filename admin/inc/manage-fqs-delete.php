<?php
require_once 'db.php'; // Ensure $pdo is defined

$id = $_GET['id'] ?? null;

if (!$id || !is_numeric($id)) {
    echo "<script>alert('Invalid or missing ID.'); window.location.href='manage-fqs.php';</script>";
    exit;
}

// Check if the FAQ exists
$stmt = $pdo->prepare("SELECT * FROM faqs WHERE id = ?");
$stmt->execute([$id]);
$faq = $stmt->fetch();

if (!$faq) {
    echo "<script>alert('FAQ not found.'); window.location.href='manage-fqs.php';</script>";
    exit;
}

// Delete the FAQ
$delete = $pdo->prepare("DELETE FROM faqs WHERE id = ?");
$delete->execute([$id]);

echo "<script>alert('FAQ deleted successfully.'); window.location.href='manage-fqs.php';</script>";
exit;
