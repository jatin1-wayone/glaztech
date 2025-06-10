<?php
require_once 'db.php'; // make sure $pdo is defined

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $page_name = trim($_POST['page_name']);
    $meta_title = trim($_POST['meta_title']);
    $meta_description = trim($_POST['meta_description']);
    $meta_keywords = trim($_POST['meta_keywords']);

    // Check if record exists
    $stmt = $pdo->prepare("SELECT * FROM seo_setting WHERE page_name = ?");
    $stmt->execute([$page_name]);
    $existing = $stmt->fetch();

    if ($existing) {
        // Update
        $stmt = $pdo->prepare("UPDATE seo_setting SET meta_title = ?, meta_description = ?, meta_keywords = ? WHERE page_name = ?");
        $stmt->execute([$meta_title, $meta_description, $meta_keywords, $page_name]);
    } else {
        // Insert
        $stmt = $pdo->prepare("INSERT INTO seo_setting (page_name, meta_title, meta_description, meta_keywords) VALUES (?, ?, ?, ?)");
        $stmt->execute([$page_name, $meta_title, $meta_description, $meta_keywords]);
    }

    $success = "SEO settings saved!";
}

$page_name = $_GET['page'] ?? 'home';
$stmt = $pdo->prepare("SELECT * FROM seo_setting WHERE page_name = ?");
$stmt->execute([$page_name]);
$seo = $stmt->fetch(PDO::FETCH_ASSOC);
?>
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
                <h5>SEO Management </h5>
                <a href="manage-seo-add.php" class="btn bg-primary-subtle">Add manage-seo</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>Sr.N</th>
                                <th>Page Name</th>
                                <th>Meeta Title</th>
                                <th>Meeta Description</th>
                                <th>meeta keywords</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once 'db.php'; // Ensure your db connection via PDO

                            try {
                                $serialNo = 1;
                                $stmt = $pdo->query("SELECT * FROM seo_setting ORDER BY id ASC");
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<tr>";
                                    echo "<td>" . $serialNo++ . "</td>";
                                    echo "<td>" . htmlspecialchars($row['page_name']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['meta_title']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['meta_description']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['meta_keywords']) . "</td>";
                                    echo "<td>
                                            <a href='manage-seo-edit.php?id=" . $row['id'] . "' class='btn btn-sm btn-warning'> <i class='fas fa-edit'></i></a>
                                            <a href='manage-seo-delete.php?id=" . $row['id'] . "'' class='btn btn-sm btn-danger' ><i class='fas fa-trash-alt'></i></a>
                                          </td>";
                                    echo "</tr>";
                                }
                            } catch (PDOException $e) {
                                echo "<tr><td colspan='6'>Error: " . $e->getMessage() . "</td></tr>";
                            }
                            ?>
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