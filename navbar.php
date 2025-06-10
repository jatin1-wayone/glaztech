<?php
  
require_once('admin/inc/db.php'); // Adjusted path

// Step 1: Get slug from URL (if any)
$slug = $_GET['product_slug'] ?? '';

// Step 2: Optional - validate slug for safety
$slug = htmlspecialchars($slug);

// Step 3: Get all products for dropdown
try {
    $stmt = $pdo->query("SELECT category_name, slug FROM categories");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching products: " . $e->getMessage());
}

// Step 4: If slug provided, fetch that product (optional detail logic)
if (!empty($slug)) {
    $stmt = $pdo->prepare("SELECT * FROM headerproducts WHERE product_slug = :slug");
    $stmt->execute([':slug' => $slug]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        $_SESSION['error_message'] = "Product not found.";
        header("Location: headerproduct.php");
        exit;
    }
}
?>

<link rel="stylesheet" href="assets/css/responsive.css" />


<style>
  .level-2 {
    max-height: 350px;
    max-width: 100px;
    overflow-y: auto;
    display: block;
    padding-left: 15px;
    border: 1px solid #ddd;
    background: #fff;
  }

  /* Scrollbar Styling */
  .level-2::-webkit-scrollbar {
    width: 6px;
  }

  .level-2::-webkit-scrollbar-track {
    background: #f1f1f1;
  }

  .level-2::-webkit-scrollbar-thumb {
    background-color: #007bff;
    border-radius: 3px;
    border: 1px solid #007bff;
  }

  .level-2 {
    scrollbar-width: thin;
    scrollbar-color: #007bff #f1f1f1;
  }
</style>
    <!-- :: All Navbar -->
     <header class="all-navbar fixed-top">
   <!-- :: Navbar -->
 <!-- Include Bootstrap CSS in your <head> -->


 
<nav class="nav-bar">
  <div class="container">
    <div class="content-box d-flex align-items-center justify-content-between">
      <div class="logo">
        <a class="logo-nav" href="index.php">
          <img class="img-fluid one" src="./assets/images/logo/01.png" alt="01 Logo" />
          <img class="img-fluid two" src="assets/images/logo/01.png" alt="02 Logo" />
        </a>
        <a href="#open-nav-bar-menu" class="open-nav-bar">
          <span></span>
          <span></span>
          <span></span>
        </a>
      </div>

      <div class="nav-bar-links" id="open-nav-bar-menu">
        <ul class="level-1 list-unstyled d-flex mb-0">
          <li class="item-level-1 px-2">
            <a href="index.php" class="link-level-1">Home</a>
          </li>
          <li class="item-level-1 px-2">
            <a href="about-us.php" class="link-level-1">About Us</a>
          </li>

          <li class="item-level-1 has-menu px-2">
            <a href="#" class="link-level-1">Product</a>
            <!-- Grid Dropdown Menu -->

            <ul class="dropdown-menu shadow bg-white  p-4" style="top: 100%; left: 0; z-index: 1000; min-width: 250px; max-width: 90vw;">
  <div class="row">
    <?php foreach ($products as $product): ?>
      <div class="col-md-3 col-sm-6 mb-2">
        <a class="dropdown-item text-dark fw-semibold px-2 py-2  rounded hover-shadow" href="category.php?category=<?= urlencode($product['slug']) ?>" style="display: block; ">
          <?= htmlspecialchars($product['category_name']) ?>
        </a>
      </div>
    <?php endforeach; ?>
  </div>
</ul>

          </li>

          <li class="item-level-1 px-2">
            <a href="project.php" class="link-level-1">Project</a>
          </li>
          <li class="item-level-1 px-2">
            <a href="contact-us.php" class="link-level-1">Contact Us</a>
          </li>
        </ul>
      </div>

      <ul class="nav-bar-tools d-flex align-items-center justify-content-between list-unstyled mb-0">
        <li class="item phone px-2">
          <div class="nav-bar-contact d-flex align-items-center">
            <i class="ar-icons-phone mr-2"></i>
            <div class="content-box">
              <span>Phone Number</span><br />
              <a href="tel:01212843661">+971562345099</a>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>








<!-- Hover CSS to show dropdown -->
<style>
  .has-menu:hover .dropdown-menu {
    display: block !important;
  }

  .dropdown-menu a {
    white-space: normal;
  }
</style>


 </header>
