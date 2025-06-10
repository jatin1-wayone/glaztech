<?php
require_once('admin/inc/db.php'); // Ensure this sets up a $pdo (PDO connection)

class Product {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Fetch category details by category slug
    public function getCategoryBySlug($category_slug) {
        $stmt = $this->pdo->prepare("
            SELECT *
            FROM categories 
            WHERE slug = :category_slug
        ");
        $stmt->execute(['category_slug' => $category_slug]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Fetch all products in the category
    public function getProductsByCategory($category_id) {
        $stmt = $this->pdo->prepare("
            SELECT product_name, product_slug, product_description, product_image 
            FROM headerproducts 
            WHERE category_id = :category_id
        ");
        $stmt->execute(['category_id' => $category_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

// Get category slug from URL and sanitize it
$category_slug = filter_input(INPUT_GET, 'category', FILTER_SANITIZE_STRING);

if (!$category_slug) {
    echo "No category slug provided.";
    exit;
}

// Create product object and fetch category details
$productObj = new Product($pdo);
$category_data = $productObj->getCategoryBySlug($category_slug);

if (!$category_data) {
    echo "Category not found.";
    exit;
}
// Fetch all products in the category
$productsssss = $productObj->getProductsByCategory($category_data['id']);



?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="<?=$category_data['meta_description']?>" />
  <meta name="keywords" content="<?=$category_data['meta_keywords']?>" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="assets/images/logo/01.png" />
  <!-- Title -->
  <title><?= htmlspecialchars($category_data['category_name'] ?? 'Category') ?></title>
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&family=Heebo:wght@400;500;600;700&display=swap" />
  <!-- Fontawesome -->
  <link rel="stylesheet" href="assets/fonts/fontawesome/css/all.min.css" />
  <!-- Flaticon -->
  <link rel="stylesheet" href="assets/fonts/flaticon/style.css" />
  <!-- Animate -->
  <link rel="stylesheet" href="assets/css/animate.css" />
  <!-- Owl Carousel -->
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
  <link rel="stylesheet" href="assets/css/owl.theme.default.min.css" />
  <!-- Lity -->
  <link rel="stylesheet" href="assets/css/lity.min.css" />
  <!-- Nice Select CSS -->
  <link rel="stylesheet" href="assets/css/nice-select.css" />
  <!-- Magnific Popup CSS -->
  <link rel="stylesheet" href="assets/css/magnific-popup.css" />
  <!-- Style CSS -->
  <link rel="stylesheet" href="assets/css/style.css" />
  <!-- Responsive CSS -->
  <link rel="stylesheet" href="assets/css/responsive.css" />

  <!-- Custom CSS for Cards -->
  <style>
    .product-card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      border: none;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      background: #fff;
    }
    .product-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    }
    .product-card img {
      height: 200px;
      object-fit: cover;
      border-bottom: 1px solid #eee;
      transition: transform 0.3s ease;
    }
    .product-card:hover img {
      transform: scale(1.05);
    }
    .product-card .card-body {
      padding: 20px;
    }
    .product-card .card-title {
      font-size: 1.25rem;
      font-weight: 600;
      color: #222;
      margin-bottom: 10px;
    }
    .product-card .card-text {
      font-size: 0.9rem;
      color: #666;
      margin-bottom: 15px;
      line-height: 1.5;
    }
    .product-card .btn-primary {
      background-color: #007bff;
      border: none;
      border-radius: 25px;
      padding: 8px 20px;
      font-size: 0.9rem;
      transition: background-color 0.3s ease;
    }
    .product-card .btn-primary:hover {
      background-color: #0056b3;
    }
    .category-section {
      margin-bottom: 40px;
      text-align: center;
    }
    .category-section h2 {
      font-size: 2.5rem;
      font-weight: 700;
      color: #222;
    }
    .category-section p {
      font-size: 1.1rem;
      color: #555;
      max-width: 800px;
      margin: 0 auto;
    }
   
  </style>
</head>
<body>
  <!-- Header -->
  <header class="all-navbar fixed-top">
    <?php include 'navbar.php'; ?>
  </header>

  <!-- Hero Section -->

  <section
      class="breadcrumb-header"
      id="page"
      style="
        background-image: url(assets/images/header/02_header.jpg);
      "
    >
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="banner">
              <h1><?= htmlspecialchars($category_data['category_name'] ?? 'Category') ?> </h1>
              <ul>
                <li><a href="index.php">Home</a></li>
                <li><i class="fas fa-angle-right"></i></li>
                <li><?= htmlspecialchars($category_data['category_name'] ?? 'Category') ?> </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>



  <!-- Category and Products Section -->
  <div class="container justify-content-center align-items-center mt-5">
    <!-- Category Information -->
    <div class="row category-section">
      <div class="col-lg-12">
        <h2><?= htmlspecialchars($category_data['category_name'] ?? 'Category') ?></h2>
      </div>
    </div>

    <!-- Products Grid -->
     
    <?php if (count($productsssss) > 0): ?>
      <div class="row">
        <?php foreach ($productsssss as $product): ?>
          <div class="col-lg-3 col-md-6 mb-4">
            <a href="products.php?slug=<?= urlencode($product['product_slug']) ?>">
            <div class="card product-card h-100">
              <img src="./admin/inc/uploads/headerproducts/<?= htmlspecialchars($product['product_image'] ?? 'assets/images/placeholder.jpg') ?>" class="card-img-top" alt="<?= htmlspecialchars($product['product_name']) ?>">
              <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($product['product_name']) ?></h5>
                <h5 class="card-text">
    <?= htmlspecialchars(strip_tags(html_entity_decode(substr($product['product_description'], 0, 100)))) . '...' ?>
        </h5>

                <a href="products.php?slug=<?= urlencode($product['product_slug']) ?>" class="text-dark" >View Details</a>
              </div>
            </div>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <div class="row">
        <div class="col-lg-12">
          <p>No products found in this category.</p>
        </div>
      </div>
    <?php endif; ?>
  </div>

  <!-- WhatsApp Floating Button -->
  <a href="https://wa.me/1234567890" target="_blank" class="whatsapp-float">
    <img src="https://img.icons8.com/color/48/000000/whatsapp--v1.png" alt="WhatsApp" />
  </a>

  <!-- Scroll Up -->
  <div class="scroll-up">
    <a class="move-section" href="#page">
      <i class="fas fa-long-arrow-alt-up"></i>
    </a>
  </div>

  <!-- Footer -->
  <?php include 'footer.php'; ?>

  <!-- JavaScript Files -->
  <script src="assets/js/jquery-3.6.0.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/lity.min.js"></script>
  <script src="assets/js/jquery.nice-select.min.js"></script>
  <script src="assets/js/jquery.waypoints.min.js"></script>
  <script src="assets/js/jquery.counterup.min.js"></script>
  <script src="assets/js/jquery.magnific-popup.min.js"></script>
  <script src="assets/js/mixitup.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/ajax-script.js"></script>
</body>
</html>