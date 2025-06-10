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
    <meta charset="UTF-8">
    <title>Glaztech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
                <h5>Project Management</h5>
                <a href="pindex.php" class="btn bg-primary-subtle">Add Project</a>
            </div>
            <div class="card-body">

                <!-- Search Form -->
                <form method="get" class="mb-3">
                    <div class="row g-2">
                        <div class="col-md-2">
                            <input type="text" name="search" class="form-control" placeholder="Search by Project Name" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn bg-primary-subtle">Search</button>
                        </div>
                    </div>
                </form>

                <!-- Message Feedback -->
                <?php if (isset($_GET['msg'])): ?>
                    <div class="alert alert-<?= $_GET['msg'] === 'deleted' ? 'success' : 'danger' ?> alert-dismissible fade show" role="alert">
                        <?php
                        switch ($_GET['msg']) {
                            case 'deleted':
                                echo "Project deleted successfully.";
                                break;
                            case 'error':
                                echo "Failed to delete the project.";
                                break;
                            case 'notfound':
                                echo "Project not found.";
                                break;
                            case 'invalid':
                                echo "Invalid request.";
                                break;
                        }
                        ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>Sr.N</th>
                                <th>Project Name</th>
                                <th>Project Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once 'db.php';

                            $limit = 10;
                            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                            $offset = ($page - 1) * $limit;
                            $search = isset($_GET['search']) ? trim($_GET['search']) : '';
                            $searchParam = "%$search%";

                            try {
                                $countQuery = $pdo->prepare("SELECT COUNT(*) FROM product WHERE project_name LIKE :search");
                                $countQuery->bindParam(':search', $searchParam, PDO::PARAM_STR);
                                $countQuery->execute();
                                $totalRows = $countQuery->fetchColumn();
                                $totalPages = ceil($totalRows / $limit);

                                $stmt = $pdo->prepare("SELECT * FROM product WHERE project_name LIKE :search ORDER BY id ASC LIMIT :offset, :limit");
                                $stmt->bindParam(':search', $searchParam, PDO::PARAM_STR);
                                $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
                                $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                                $stmt->execute();

                                $serialNo = $offset + 1;

                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<tr>";
                                    echo "<td>" . $serialNo++ . "</td>";
                                    echo "<td>" . htmlspecialchars($row['project_name']) . "</td>";
                                    echo "<td><img src='" . htmlspecialchars($row['image']) . "' width='80' height='50' alt='Project Image'></td>";
                                    echo "<td>
                                            <a href='project-edit.php?id=" . $row['id'] . "' class='btn btn-sm btn-warning'> <i class='fas fa-edit'></i></a>
                                            <a href='javascript:void(0)' class='btn btn-sm btn-danger' onclick='confirmDelete(" . $row['id'] . ")'><i class='fas fa-trash-alt'></i></a>
                                          </td>";
                                    echo "</tr>";
                                }

                                if ($totalRows == 0) {
                                    echo "<tr><td colspan='4' class='text-center'>No projects found.</td></tr>";
                                }
                            } catch (PDOException $e) {
                                echo "<tr><td colspan='4'>Error: " . $e->getMessage() . "</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <?php if ($totalPages > 1): ?>
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-end mt-4">
                        <?php if ($page > 1): ?>
                            <li class="page-item">
                                <a class="page-link text-primary" href="?page=<?= $page - 1 ?>&search=<?= urlencode($search) ?>">« Prev</a>
                            </li>
                        <?php else: ?>
                            <li class="page-item disabled"><span class="page-link">« Prev</span></li>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <li class="page-item <?= ($i === $page) ? 'active' : '' ?>">
                                <?php if ($i === $page): ?>
                                    <span class="page-link bg-primary text-white"><?= $i ?></span>
                                <?php else: ?>
                                    <a class="page-link text-primary" href="?page=<?= $i ?>&search=<?= urlencode($search) ?>"><?= $i ?></a>
                                <?php endif; ?>
                            </li>
                        <?php endfor; ?>

                        <?php if ($page < $totalPages): ?>
                            <li class="page-item">
                                <a class="page-link text-primary" href="?page=<?= $page + 1 ?>&search=<?= urlencode($search) ?>">Next »</a>
                            </li>
                        <?php else: ?>
                            <li class="page-item disabled"><span class="page-link">Next »</span></li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <?php endif; ?>

            </div>
        </div>
    </section>
</main>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this project?
            </div>
            <div class="modal-footer">
                <a href="#" id="deleteLink" class="btn btn-danger">Delete</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- JS -->
<script src="../assets/js/vendors/jquery/dist/jquery.min.js"></script>
<script src="../assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function confirmDelete(projectId) {
        document.getElementById("deleteLink").href = "project-delete.php?id=" + projectId;
        var myModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        myModal.show();
    }
</script>

</body>
</html>
