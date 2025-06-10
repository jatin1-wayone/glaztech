<?php
require_once 'db.php';

$id = $_GET['id'] ?? null;
if (!$id || !is_numeric($id)) {
    header("Location: manage-seo-list.php");
    exit;
}

$errors = [];
$success = '';

// Fetch current data
$stmt = $pdo->prepare("SELECT * FROM seo_setting WHERE id = ?");
$stmt->execute([$id]);
$seo = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$seo) {
    // No record found, redirect back
    header("Location: manage-seo-list.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $page_name = trim($_POST['page_name']);
    $meta_title = trim($_POST['meta_title']);
    $meta_description = trim($_POST['meta_description']);
    $meta_keywords = trim($_POST['meta_keywords']);

    // Validate inputs
    if (!$page_name) $errors[] = "Page name is required.";
    if (!$meta_title) $errors[] = "Meta title is required.";

    if (empty($errors)) {
        // Check if new page_name conflicts with other records
        $stmt = $pdo->prepare("SELECT id FROM seo_setting WHERE page_name = ? AND id != ?");
        $stmt->execute([$page_name, $id]);
        if ($stmt->fetch()) {
            $errors[] = "Page name already exists for another record.";
        } else {
            // Update record
            $stmt = $pdo->prepare("UPDATE seo_setting SET page_name = ?, meta_title = ?, meta_description = ?, meta_keywords = ? WHERE id = ?");
            $stmt->execute([$page_name, $meta_title, $meta_description, $meta_keywords, $id]);
            $success = "SEO setting updated successfully.";

            // Refresh data from DB
            $stmt = $pdo->prepare("SELECT * FROM seo_setting WHERE id = ?");
            $stmt->execute([$id]);
            $seo = $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
} else {
    // Set form values from existing DB data on first load
    $page_name = $seo['page_name'];
    $meta_title = $seo['meta_title'];
    $meta_description = $seo['meta_description'];
    $meta_keywords = $seo['meta_keywords'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Edit SEO Setting - Glaztech</title>
    <link rel="stylesheet" href="assets/css/vendors/bootstrap/dist/css/bootstrap.min.css" />
</head>
<body>
<?php include 'header.php'; ?>

<main class="page-wrapper compact-wrapper" id="pageWrapper">
    <section class="container mt-4">
        <h3>Edit SEO Setting</h3>

        <?php if ($errors): ?>
            <div class="alert alert-danger">
                <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?=htmlspecialchars($error)?></li>
                <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="alert alert-success"><?=htmlspecialchars($success)?></div>
        <?php endif; ?>

        <form method="post" action="">
            <div class="mb-3">
                <label for="page_name" class="form-label">Page Name</label>
                <input type="text" name="page_name" id="page_name" class="form-control" required
                       value="<?=htmlspecialchars($page_name ?? '')?>" />
            </div>
            <div class="mb-3">
                <label for="meta_title" class="form-label">Meta Title</label>
                <input type="text" name="meta_title" id="meta_title" class="form-control" required
                       value="<?=htmlspecialchars($meta_title ?? '')?>" />
            </div>
            <div class="mb-3">
                <label for="meta_description" class="form-label">Meta Description</label>
                <textarea name="meta_description" id="meta_description" class="form-control" rows="3"><?=htmlspecialchars($meta_description ?? '')?></textarea>
            </div>
            <div class="mb-3">
                <label for="meta_keywords" class="form-label">Meta Keywords</label>
                <textarea name="meta_keywords" id="meta_keywords" class="form-control" rows="2"><?=htmlspecialchars($meta_keywords ?? '')?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update </button>
            <a href="manage-seo.php" class="btn btn-secondary">Back</a>
        </form>
    </section>
</main>

<script src="assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<?php include 'footer.php'; ?>
</body>
</html>
