<?php
session_start();
require_once 'db.php'; // Make sure $pdo is defined
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php"); // Redirect to login
    exit();
}
$success = '';
$error = '';
$seo = [
    'image' => '',
    'current_project_image' => '',
    'current_project_name' => '',
];

$id = $_GET['id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $current_project_name = trim($_POST['current_project_name'] ?? '');
        $created_at = date('Y-m-d H:i:s');

        $current_project_image = '';
        if (!empty($_FILES['current_project_image']['name'])) {
            $currentDir = 'uploads/current/';
            if (!is_dir($currentDir)) {
                mkdir($currentDir, 0777, true);
            }
            $current_project_image = $currentDir . time() . '_' . basename($_FILES['current_project_image']['name']);
            move_uploaded_file($_FILES['current_project_image']['tmp_name'], $current_project_image);
        }

        $image = '';
        if (!empty($_FILES['image']['name'])) {
            $image = 'uploads/' . time() . '_' . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], $image);
        }

        if ($id) {
            $stmt = $pdo->prepare("
                UPDATE gallery_blog SET 
                    image = COALESCE(NULLIF(:image, ''), image),
                    current_project_image = COALESCE(NULLIF(:current_project_image, ''), current_project_image),
                    current_project_name = :current_project_name
                WHERE id = :id
            ");
            $stmt->execute([
                ':image' => $image,
                ':current_project_image' => $current_project_image,
                ':current_project_name' => $current_project_name,
                ':id' => $id
            ]);
            $success = "Project updated successfully.";
        } else {
            $stmt = $pdo->prepare("
                INSERT INTO gallery_blog (image, current_project_image, current_project_name, created_at) 
                VALUES (:image, :current_project_image, :current_project_name, :created_at)
            ");
            $stmt->execute([
                ':image' => $image,
                ':current_project_image' => $current_project_image,
                ':current_project_name' => $current_project_name,
                ':created_at' => $created_at
            ]);
            $success = "Project created successfully.";
        }
    } catch (PDOException $e) {
        $error = "Database error: " . $e->getMessage();
    }
}

if ($id) {
    $stmt = $pdo->prepare("SELECT * FROM gallery_blog WHERE id = ?");
    $stmt->execute([$id]);
    $seo = $stmt->fetch(PDO::FETCH_ASSOC) ?: $seo;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage SEO - Glaztech</title>
    <link rel="stylesheet" href="assets/css/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
<?php include 'header.php'; ?>

<main class="page-wrapper compact-wrapper" id="pageWrapper">
    <section class="container-fluid mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Gallery Blog Management</h5>
                <a href="gallery-add.php" class="btn bg-primary-subtle">Add Blog</a>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>Sr.No</th>
                                <th>Image</th>
                                <th>Current Project Image</th>
                                <th>Current Project Name</th>
                                <th>description</th>
                                <th>Short Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            try {
                                $serialNo = 1;
                                $stmt = $pdo->query("SELECT * FROM gallery_blog ORDER BY id ASC");
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<tr>";
                                    echo "<td>" . $serialNo++ . "</td>";

                                    // Display image
                                    echo "<td><img src='" . htmlspecialchars($row['image']) . "' width='60'></td>";

                                    // Display current project image and name
                                    echo "<td><img src='" . htmlspecialchars($row['current_project_image']) . "' width='60'></td>";
                                    echo "<td>" . htmlspecialchars($row['current_project_name']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['short_description']) . "</td>";

                                    // Action buttons
                                    echo "<td>
                                            <a href='gallery-edit.php?id=" . $row['id'] . "' class='btn btn-sm btn-warning'><i class='fas fa-edit'></i></a>
                                            <a href='javascript:void(0)' class='btn btn-sm btn-danger' onclick='confirmDelete(" . $row['id'] . ")'><i class='fas fa-trash-alt'></i></a>
                                          </td>";
                                    echo "</tr>";
                                }
                            } catch (PDOException $e) {
                                echo "<tr><td colspan='5'>Error: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script>
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this project?")) {
                window.location.href = 'gallery-delete.php?id=' + id;
            }
        }
    </script>
</main>

<style>
.page-wrapper {
    position: relative;
    width: 81%;
    margin-left: auto;
}
</style>

<script src="assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<?php include 'footer.php'; ?>
</body>
</html>
