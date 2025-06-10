<?php
require_once 'db.php'; // Ensure $pdo is defined

$id = $_GET['id'] ?? null;

if (!$id || !is_numeric($id)) {
    echo "<script>alert('Invalid ID.'); window.location.href='faq-list.php';</script>";
    exit;
}

// Fetch existing FAQ
$stmt = $pdo->prepare("SELECT * FROM faqs WHERE id = ?");
$stmt->execute([$id]);
$faq = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$faq) {
    echo "<script>alert('FAQ not found.'); window.location.href='manage-fqs.php';</script>";
    exit;
}

$error = ""; // Initialize error

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $question = trim($_POST['question']);
    $answer = trim($_POST['answer']);

    if (!empty($question) && !empty($answer)) {
        $update = $pdo->prepare("UPDATE faqs SET question = ?, answer = ? WHERE id = ?");
        $update->execute([$question, $answer, $id]);

        echo "<script>alert('FAQ updated successfully.'); window.location.href='manage-fqs.php';</script>";
        exit;
    } else {
        $error = "Both question and answer are required.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit FAQ</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php require_once 'header.php'; ?>

<main class="page-wrapper compact-wrapper" id="pageWrapper">
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h5>Edit FAQ</h5>
            </div>
            <div class="card-body">
                <form action="manage-fqs-edit.php?id=<?= $faq['id'] ?>"<?php echo $id; ?>" method="POST">
                    <!-- Question -->
                    <div class="form-group">
                        <label for="question">Question</label>
                        <input class="form-control" type="text" id="question" name="question" required
                               value="<?php echo htmlspecialchars($faq['question']); ?>">
                    </div>

                    <!-- Answer -->
                    <div class="form-group">
                        <label for="answer">Answer</label>
                        <textarea class="form-control" id="answer" name="answer" rows="4" required><?php echo htmlspecialchars($faq['answer']); ?></textarea>
                    </div>

                    <!-- Submit -->
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Update FAQ</button>
                    </div>
                </form>

                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger mt-2"><?php echo $error; ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php require_once 'footer.php'; ?>
</main>
</body>
</html>


