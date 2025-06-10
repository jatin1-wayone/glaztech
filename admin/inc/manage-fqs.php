
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage SEO - Glaztech</title>
    <link rel="stylesheet" href="assets/css/vendors/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
    <?php include 'header.php'; ?>


<main class="page-wrapper compact-wrapper" id="pageWrapper">
    <section class="container-fluid mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>FAQS Management </h5>
                <a href="manage-fqs-add.php" class="btn bg-primary-subtle">Add manage-faqs</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <?php require_once 'db.php'; ?>

<?php if (!empty($_GET['msg'])): ?>
    <div class="alert alert-success"><?= htmlspecialchars($_GET['msg']) ?></div>
<?php endif; ?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Sr.N</th>
            <th>Question</th>
            <th>Answer</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $stmt = $pdo->query("SELECT * FROM faqs ORDER BY id DESC");
    $i = 1;
    while ($row = $stmt->fetch()):
    ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= htmlspecialchars($row['question']) ?></td>
            <td><?= htmlspecialchars($row['answer']) ?></td>
            <td>
                <a href="manage-fqs-edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                <a href="manage-fqs-delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this FAQ?');"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>

                </div>
            </div>
        </div>
    </section>
</main>



</div>
<style>
    .page-wrapper { 
        position: relative;
        width: 81%;
        margin-left: auto;
    }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<script src="assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<?php include 'footer.php' ?>
</body>
</html>