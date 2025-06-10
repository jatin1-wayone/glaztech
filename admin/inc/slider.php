<?php
session_start();

// Block access if not logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php"); // Redirect to login
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Edmin admin is super flexible, powerful, clean &amp; modern responsive bootstrap admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Edmin admin template, best javascript admin, dashboard template, bootstrap admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <title>Glaztech</title>
    <!-- Favicon icon-->
    <link rel="icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
    <!-- Bootstrap CSS and other dependencies-->
    <link rel="stylesheet" href="../assets/css/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<?php require_once 'header.php'; ?>
<style>
    .page-wrapper {
        position: relative;
        width: 81%;
        margin-left: auto;
    }
</style>
<main class="page-wrapper compact-wrapper" id="pageWrapper">
    <section class="container-fluid mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Banner Management </h5>
                <a href="slider-add.php" class="btn bg-primary-subtle">Add Banner</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>Sr.N</th>
                                <th>Title</th>
                                <th>Page_Url</th>
                                <th>Subtitle</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once 'db.php';

                            try {
                                $serialNo = 1;
                                $stmt = $pdo->query("SELECT * FROM slider ORDER BY id ASC");
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<tr>";
                                    echo "<td>" . $serialNo++ . "</td>";
                                    echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['page_url']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['subtitle']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                                    echo "<td><img src='" . htmlspecialchars($row['image']) . "' width='80' height='50'></td>";
                                    echo "<td>
                                    <a href='slider-edit.php?id=" . $row['id'] . "' class='btn btn-sm btn-warning'>
                                        <i class='fas fa-edit'></i>
                                    </a>
                                    <a href='javascript:void(0);' class='btn btn-sm btn-danger' onclick='confirmDelete(" . $row['id'] . ")'>
                                        <i class='fas fa-trash-alt'></i>
                                    </a>
                                  </td>";
                                    echo "</tr>";
                                }
                            } catch (PDOException $e) {
                                echo "<tr><td colspan='7'>Error: " . $e->getMessage() . "</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this slider?
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0)" id="deleteLink" class="btn btn-danger">Delete</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- JS and Bootstrap JS-->
<script src="../assets/js/vendors/jquery/dist/jquery.min.js"></script>
<script src="../assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
    function confirmDelete(sliderId) {
        // **Fix here: point to slider-delete.php**
        document.getElementById("deleteLink").href = "slider-delete.php?id=" + sliderId;

        // Show the modal
        var myModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        myModal.show();
    }
</script>

</body>
</html>
