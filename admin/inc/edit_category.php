<?php
session_start();

// Block access if not logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php"); // Redirect to login
    exit();
}
?>
<?php
require_once(__DIR__ . '/db.php');

// Validate ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid request!");
}

$id = (int) $_GET['id'];

// Fetch the category
$stmt = $pdo->prepare("SELECT * FROM categories WHERE id = ?");
$stmt->execute([$id]);
$category = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$category) {
    die("Category not found!");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $category_name = trim($_POST['category_name']);
    $meta_title = trim($_POST['meta_title']);
    $meta_description = trim($_POST['meta_description']);
    $meta_keywords = trim($_POST['meta_keywords']);
    $slug = trim($_POST['slug']);
    $image = $_FILES['category_image'];

    if (!empty($category_name)) {
        $imagePath = $category['category_image'];

        if (!empty($image['name'])) {
            $uploadDir = "../../uploads/category/";
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $imageName = time() . '_' . basename($image["name"]);
            $targetFile = $uploadDir . $imageName;
            $dbImagePath = "uploads/category/" . $imageName;

            if (move_uploaded_file($image["tmp_name"], $targetFile)) {
                // Delete old image
                if (!empty($category['category_image']) && file_exists("../../" . $category['category_image'])) {
                    unlink("../../" . $category['category_image']);
                }
                $imagePath = $dbImagePath;
            } else {
                die("Failed to upload image.");
            }
        }

        // Update category
        $stmt = $pdo->prepare("UPDATE categories SET 
            category_name = :category_name,
            category_image = :image,
            meta_title = :meta_title,
            meta_description = :meta_description,
            meta_keywords = :meta_keywords,
            slug = :slug
            WHERE id = :id
        ");
        $stmt->execute([
            ':category_name' => $category_name,
            ':image' => $imagePath,
            ':meta_title' => $meta_title,
            ':meta_description' => $meta_description,
            ':meta_keywords' => $meta_keywords,
            ':slug' => $slug,
            ':id' => $id
        ]);

        header("Location: category.php?message=Category updated successfully!");
        exit();
    } else {
        $error = "Category name cannot be empty!";
    }
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description"
    content="Edmin admin is super flexible, powerful, clean &amp; modern responsive bootstrap admin template with unlimited possibilities.">
  <meta name="keywords"
    content="admin template, Edmin admin template, best javascript admin, dashboard template, bootstrap admin template, responsive admin template, web app">
  <meta name="author" content="pixelstrap">
  <title>Edit Category | Glaztech</title>
  <!-- Favicon icon-->
  <link rel="icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
  <link rel="shortcut icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
  <!-- Google font-->
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
    rel="stylesheet">
  <!-- Font awesome icon css -->
  <link rel="stylesheet" href="../assets/css/vendors/%40fortawesome/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../assets/css/vendors/%40fortawesome/fontawesome-free/css/fontawesome.css">
  <link rel="stylesheet" href="../assets/css/vendors/%40fortawesome/fontawesome-free/css/brands.css">
  <link rel="stylesheet" href="../assets/css/vendors/%40fortawesome/fontawesome-free/css/solid.css">
  <link rel="stylesheet" href="../assets/css/vendors/%40fortawesome/fontawesome-free/css/regular.css">
  <!-- Ico Icon css -->
  <link rel="stylesheet" type="text/css" href="../assets/css/vendors/%40icon/icofont/icofont.css">
  <!-- Flag Icon css -->
  <link rel="stylesheet" type="text/css" href="../assets/css/vendors/flag-icon.css">
  <!-- Themify Icon css -->
  <link rel="stylesheet" type="text/css" href="../assets/css/vendors/themify-icons/themify-icons/css/themify.css">
  <!-- Animation css -->
  <link rel="stylesheet" type="text/css" href="../assets/css/vendors/animate.css/animate.css">
  <!-- Whether Icon css-->
  <link rel="stylesheet" type="text/css" href="../assets/css/vendors/weather-icons/css/weather-icons.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/vendors/scrollbar.css">
  <!-- Wow css-->
  <link rel="stylesheet" type="text/css" href="../assets/css/vendors/wowjs/css/site.css">
  <!-- Animate css-->
  <link rel="stylesheet" type="text/css" href="../assets/css/vendors/wowjs/css/libs/animate.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/vendors/photoswipe/dist/photoswipe.css">
  <!-- App css-->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
</head>

<body>
<style>
    .page-wrapper {
        position: relative;
        width: 80%;
        margin-left: auto;
    }
    </style>
 


  <?php include 'header.php'?>

<main id="main" class="main page-wrapper">
  <div class="pagetitle">
    <!-- <h1>Edit SubCategory</h1> -->
    <nav>
      <ol class="breadcrumb">
        <!-- <li class="breadcrumb-item"><a href="index.php">Home</a></li> -->
        <!-- <li><a href="subcategory.php">/SubCategory Management</a></li> -->
       
      </ol>
    </nav>
  </div>

  
  <section class="section">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Edit Category</h5>


        <form action="edit_category.php?id=<?php echo $category['id']; ?>" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $category['id']; ?>">

          <div class="row">

            <!-- Category Name -->
            <div class="col-lg-6 mb-3">
              <label>Category Name</label>
              <input type="text" name="category_name" id="category_name" class="form-control" value="<?php echo htmlspecialchars($category['category_name']); ?>" required>
            </div>

            <!-- Current Image -->
            <?php if (!empty($category['category_image'])): ?>
              <div class="col-lg-6 mb-3">
                <label>Current Image</label><br>
                <img src="../../<?php echo $category['category_image']; ?>" alt="Category Image" style="width:50px; border-radius:50%;">
              </div>
            <?php endif; ?>

            <!-- Upload New Image -->
            <div class="col-lg-6 mb-3">
              <label>Upload New Image</label>
              <input type="file" name="category_image" class="form-control" accept="image/*">
              <small class="text-muted">Leave empty to keep the current image.</small>
            </div>

            <!-- Meta Title -->
            <div class="col-lg-6 mb-3">
              <label>Meta Title</label>
              <input type="text" name="meta_title" class="form-control" value="<?php echo htmlspecialchars($category['meta_title']); ?>" required>
            </div>

            <!-- Meta Description -->
            <div class="col-lg-6 mb-3">
              <label>Meta Description</label>
              <textarea name="meta_description" class="form-control" rows="2" required><?php echo htmlspecialchars($category['meta_description']); ?></textarea>
            </div>

            <!-- Slug -->
            <div class="col-lg-6 mb-3">
              <label>Slug</label>
              <input type="text" name="slug" id="slug" class="form-control" value="<?php echo htmlspecialchars($category['slug']); ?>" readonly required>
            </div>

            <!-- Meta Keywords -->
            <div class="col-lg-6 mb-3">
              <label>Meta Keywords</label>
              <input type="text" name="meta_keywords" class="form-control" value="<?php echo htmlspecialchars($category['meta_keywords']); ?>" required>
            </div>
          </div>

          <div class="text-center">
            <button type="submit" name="update" class="btn btn-primary">Update Category</button>
            <a href="../category.php" class="btn btn-secondary">Cancel</a>
          </div>
        </form>



      </div>
    </div>
  </section>
</main>


<!-- Auto-slug script -->
<script>
document.getElementById('category_name').addEventListener('input', function() {
    let name = this.value;
    let slug = name.toLowerCase()
                  .trim()
                  .replace(/[^a-z0-9\s-]/g, '')    // Remove special chars
                  .replace(/\s+/g, '-')             // Replace spaces with -
                  .replace(/-+/g, '-');              // Collapse multiple -
    document.getElementById('slug').value = slug;
});
</script>

<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/boxicons/js/boxicons.min.js"></script>
<script src="../assets/js/main.js"></script>

</body>
</html>