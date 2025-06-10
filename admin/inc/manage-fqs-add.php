<?php
require_once 'db.php'; // $pdo connection

$success = $error = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $question = trim($_POST['question']);
    $answer = trim($_POST['answer']);

    if (!empty($question) && !empty($answer)) {
        // Check if the question already exists
        $stmt = $pdo->prepare("SELECT * FROM faqs WHERE question = ?");
        $stmt->execute([$question]);
        $existing = $stmt->fetch();

        if ($existing) {
            // Update answer if question already exists
            $stmt = $pdo->prepare("UPDATE faqs SET answer = ? WHERE question = ?");
            $stmt->execute([$answer, $question]);
            $success = "FAQ updated successfully!";
        } else {
            // Insert new FAQ
            $stmt = $pdo->prepare("INSERT INTO faqs (question, answer) VALUES (?, ?)");
            $stmt->execute([$question, $answer]);
            $success = "FAQ added successfully!";
        }
    } else {
        $error = "Both question and answer are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glaztech - Add FAQ</title>
    <link rel="icon" href="assets/images/favicon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/vendors/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link id="color" rel="stylesheet" href="assets/css/color-1.css" media="screen">
</head>
<body>

<!-- Loader -->
<div class="loader-wrapper">
    <div class="loader"></div>
</div>

<?php require_once 'header.php'; ?>

<main class="page-wrapper compact-wrapper" id="pageWrapper">
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h5>Add FAQ</h5>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <!-- Question -->
                    <div class="form-group">
                        <label for="question">Question</label>
                        <input class="form-control" type="text" id="question" name="question" required placeholder="Enter question">
                    </div>

                    <!-- Answer -->
                    <div class="form-group mt-3">
                        <label for="answer">Answer</label>
                        <textarea class="form-control" id="answer" name="answer" rows="4" required placeholder="Enter answer"></textarea>
                    </div>

                    <!-- Submit -->
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

                <?php if (!empty($success)): ?>
                    <div class="alert alert-success mt-3"><?= htmlspecialchars($success) ?></div>
                <?php elseif (!empty($error)): ?>
                    <div class="alert alert-danger mt-3"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php require_once 'footer.php'; ?>
</main>

<!-- JS Dependencies -->
<script src="assets/js/vendors/jquery/dist/jquery.min.js"></script>
<script src="assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>
