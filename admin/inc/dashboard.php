<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit();
}
?>


<?php
require_once 'db.php';

// Dashboard Stats
$totalProjects = $pdo->query("SELECT COUNT(*) FROM product")->fetchColumn();
$totalImages = $pdo->query("SELECT COUNT(*) FROM services WHERE id != ''")->fetchColumn();
$totalslider = $pdo->query("SELECT COUNT(*) FROM slider WHERE id != ''")->fetchColumn();
$totalstaff = $pdo->query("SELECT COUNT(*) FROM staff WHERE id != ''")->fetchColumn();
$totalproduct = $pdo->query("SELECT COUNT(*) FROM staff WHERE id != ''")->fetchColumn();
$totalcategory = $pdo->query("SELECT COUNT(*) FROM categories WHERE id != ''")->fetchColumn();



// Recent Projects
$stmt = $pdo->query("SELECT * FROM gallery_blog ORDER BY created_at DESC LIMIT 5");
$recentProjects = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Contact Queries
$contactQueries = $pdo->query("SELECT * FROM contact_queries ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Glaztech</title>
    <link rel="stylesheet" href="assets/css/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .page-wrapper { width: 81%; margin-left: auto; }
        .card-icon {
            font-size: 2rem;
            color: #007bff;
        }
        .dashboard-table img, .dashboard-table video {
            max-height: 70px;
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>

<main class="page-wrapper" id="pageWrapper">
    <div class="container mt-4">
        <h3 class="mb-4">Dashboard</h3>

        <!-- Stat Cards -->
        <div class="row mb-4 ">
            <div class="col-md-4">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-folder card-icon"></i>
                        <h5 class="card-title mt-2">Total Projects</h5>
                        <h3><?= $totalProjects ?></h3>
                    </div>
                </div>
            </div>
            <!-- products -->
             
            <div class="col-md-4">
    <div class="card text-center shadow-sm">
        <div class="card-body">
            <i class="fas fa-box card-icon"></i> <!-- updated icon -->
            <h5 class="card-title mt-2">Total Products</h5>
            <h3><?= $totalproduct ?></h3>
        </div>
    </div>
</div>

            <div class="col-md-4">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-image card-icon"></i>
                        <h5 class="card-title mt-2">Total Services</h5>
                        <h3><?= $totalImages ?></h3>
                    </div>
                </div>
            </div>
            <!-- slider -->
            <div class="col-md-4">
    <div class="card text-center shadow-sm">
        <div class="card-body">
            <i class="fas fa-images card-icon"></i> <!-- updated icon -->
            <h5 class="card-title mt-2">Total Slider</h5>
            <h3><?= $totalslider ?></h3>
        </div>
    </div>
</div>
<!-- staff -->
<div class="col-md-4">
    <div class="card text-center shadow-sm">
        <div class="card-body">
            <i class="fas fa-users card-icon"></i> <!-- updated staff icon -->
            <h5 class="card-title mt-2">Total Staff</h5>
            <h3><?= $totalstaff ?></h3> <!-- consider renaming variable to $totalStaff -->
        </div>
    </div>
</div>


<div class="col-md-4">
    <div class="card text-center shadow-sm">
        <div class="card-body">
            <i class="fas fa-box card-icon"></i> <!-- updated icon -->
            <h5 class="card-title mt-2">Total Categories</h5>
            <h3><?= $totalcategory ?></h3>
        </div>
    </div>
</div>


        <!-- Contact Queries Table -->
        <div class="card shadow-sm rounded-3">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Contact Queries</h5>
            </div>
            <div class="card-body p-3">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover align-middle">
                        <thead class="table-primary text-center">
                            <tr>
                                <th>Sr.N</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($contactQueries)): ?>
                                <?php foreach ($contactQueries as $index => $row): ?>
                                    <tr>
                                        <td class="text-center"><?= $index + 1 ?></td>
                                        <td><?= htmlspecialchars($row['name']) ?></td>
                                        <td><?= htmlspecialchars($row['email']) ?></td>
                                        <td><?= htmlspecialchars($row['subject']) ?></td>
                                        <td><?= nl2br(htmlspecialchars($row['sms'])) ?></td>
                                        <td class="text-center">
                                          
                                        
                                            <a href="javascript:void(0)" onclick="confirmDelete(<?= $row['id'] ?>)" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="6" class="text-center text-muted">No contact queries found.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</main>
<style>
    body {
    background-color: #f4f6f9; /* light gray background */
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.page-wrapper {
    width: 81%;
    margin-left: auto;
    background-color: #f4f6f9; /* match body background */
    padding-bottom: 40px;
}

h3.mb-4 {
    color: #333;
}

.card {
    background-color: #ffffff;
    border: none;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
}

.card-header {
    border-radius: 10px 10px 0 0;
}

.card-body {
    background-color: #ffffff;
}

.table thead {
    background-color: #007bff;
    color: #fff;
}

.table-striped > tbody > tr:nth-of-type(odd) {
    background-color: #f9f9f9;
}

.btn-warning {
    background-color: #ffc107;
    border: none;
}

.btn-danger {
    background-color: #dc3545;
    border: none;
}

.btn-warning:hover, .btn-danger:hover {
    opacity: 0.9;
}

</style>

<script src="assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
function confirmDelete(id) {
    if (confirm("Are you sure you want to delete this contact query?")) {
        window.location.href = 'contact-delete.php?id=' + id;
    }
}
</script>
<?php include 'footer.php'; ?>
</body>
</html>
