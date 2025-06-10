<?php
require_once('admin/inc/db.php');

class Product {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getDescriptionBySlug($slug) {
        $stmt = $this->pdo->prepare("SELECT id, product_description,short_description, product_name , product_image FROM headerproducts WHERE product_slug = :slug");
        $stmt->execute(['slug' => $slug]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getGalleryImagesBySlug($slug) {
        $stmt = $this->pdo->prepare("
            SELECT pi.image_path 
            FROM product_images pi 
            INNER JOIN headerproducts hp ON pi.product_id = hp.id 
            WHERE hp.product_slug = :slug
        ");
        $stmt->execute(['slug' => $slug]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

$slug = $_GET['slug'] ?? null;

if (!$slug) {
    echo "No slug provided.";
    exit;
}

$productObj = new Product($pdo);
$data = $productObj->getDescriptionBySlug($slug);
$galleryImages = $productObj->getGalleryImagesBySlug($slug);

if (!$data) {
    echo "Product not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title><?= htmlspecialchars($data['product_name']) ?></title>

  <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&family=Heebo:wght@400;500;600;700&display=swap"
    />

    <!-- :: Fontawesome -->
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/all.min.css" />

    <!-- :: Flaticon -->
    <link rel="stylesheet" href="assets/fonts/flaticon/style.css" />

    <!-- :: Animate -->
    <link rel="stylesheet" href="assets/css/animate.css" />

    <!-- :: Owl Carousel -->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css" />

    <!-- :: Lity -->
    <link rel="stylesheet" href="assets/css/lity.min.css" />

    <!-- :: Nice Select CSS -->
    <link rel="stylesheet" href="assets/css/nice-select.css" />

    <!-- :: Magnific Popup CSS -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css" />

    <!-- :: Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css" />

    <!-- :: Style Responsive CSS -->
    <link rel="stylesheet" href="assets/css/responsive.css" />
      <link rel="canonical" href="https://www.glaz-tech.com/aluminium-glass-installation-in-dubai" />
    
    <!-- FAVICONS ICON -->
    
    
    <!-- PAGE TITLE HERE -->
    
     <!-- BOOTSTRAP STYLE SHEET -->
     <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

     
 
     <!-- BOOTSTRAP SLECT BOX STYLE SHEET  -->
     <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-select.min.css">        
     <!-- FONTAWESOME STYLE SHEET -->
     <link rel="stylesheet" type="text/css" href="assets/fontawesome/css/font-awesome.min.css" />
     <!-- OWL CAROUSEL STYLE SHEET -->
     <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
     <!-- MAGNIFIC POPUP STYLE SHEET -->
     <link rel="stylesheet" type="text/css" href="assets/css/magnific-popup.min.css">   
     <!-- LOADER STYLE SHEET -->
     <link rel="stylesheet" type="text/css" href="assets/css/loader.min.css">
     <!-- FLATICON STYLE SHEET -->
     <link rel="stylesheet" type="text/css" href="assets/css/flaticon.min.css">    
     <!-- MAIN STYLE SHEET -->
     <link rel="stylesheet" type="text/css" href="assets/css/style1.css">
     <!-- Price Range Slider -->
     <link rel="stylesheet" href="assets/css/bootstrap-slider.min.css" />    
     <!-- Color Theme Change Css -->
     <link rel="stylesheet" class="skin" type="text/css" href="assets/css/skin-1.css">  
     <!-- Side Switcher Css-->
     <link rel="stylesheet" type="text/css" href="assets/css/switcher.css">  
     
    
    <!-- REVOLUTION SLIDER CSS -->
    <link rel="stylesheet" type="text/css" href="assets/plugins/css/settings.css">	
    <!-- REVOLUTION NAVIGATION STYLE -->
    <link rel="stylesheet" type="text/css" href="assets/plugins/css/navigation.css">
    
    <!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- :: Loading -->
    <div class="loading">
      <div class="loading-box">
        <div class="lds-roller">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
      </div>
    </div>
    <header class="all-navbar fixed-top">
   <?php     include 'navbar.php';
?>
   </header>

  <style>
    .category-section h2 {
      font-size: 2.2rem;
      font-weight: 700;
      color: #222;
      margin-bottom: 20px;
    }

   

    .product-gallery img {
      width: 100%;
      height: auto;
      border-radius: 8px;
      transition: transform 0.3s ease;
    }

    .product-gallery img:hover {
      transform: scale(1.05);
    }
  </style>
</head>

<body>
  <header class="all-navbar fixed-top">
    <?php include 'navbar.php'; ?>
  </header>

  <section class="breadcrumb-header" id="page"
    style="background-image: url(./admin/inc/uploads/headerproducts/<?= $data['product_image'] ?>);">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="banner">
            <h1><?= htmlspecialchars($data['product_name']) ?></h1>
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><i class="fas fa-angle-right"></i></li>
              <li><?= htmlspecialchars($data['product_name']) ?></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Product Detail Section -->
  <div class="container mt-5">
    <div class="row category-section text-center">
      
    </div>

    <div class="row mt-5 align-items-start">
  <!-- Image Column -->
  <div class="col-md-6 mb-4 mb-md-0">
    <img src="./admin/inc/uploads/headerproducts/<?= $data['product_image'] ?>" 
         class="img-fluid rounded shadow-sm w-100"
         alt="<?= htmlspecialchars($data['product_name']) ?>"
         style="max-height: 400px; object-fit: cover;">
  </div>

  <!-- Text Column -->
  <div class="col-md-6">
    <div class="p-3">
    <div class="col-12">
        <h3><?= htmlspecialchars($data['product_name']) ?></h3>
      </div>
      <div class="row">
                <div class="col-sm-">
                  <!-- <p class="providing">
                    Providing innovative glass door Solution For Future
                  </p> -->
                  

                  <?php
// TEMP: Set test data if short_description not set
if (!isset($data['short_description'])) {
    $data['short_description'] = "Default Point One\nDefault Point Two";
}

$short_description = $data['short_description'] ?? '';
$points = explode("\n", trim($short_description));
?>

<ul class="about-us-core-list">
  <?php foreach ($points as $point): ?>
    <?php if (!empty(trim($point))): ?>
      <li class="item">
        <i class="fas fa-check"></i>
        <h4><?= htmlspecialchars(trim($point)) ?></h4>
      </li>
    <?php endif; ?>
  <?php endforeach; ?>
</ul>

                  <!-- <div class="img-person">
                    <img
                      class="img-fluid about-us-person"
                      src="assets/images/about-us/01_about-us-person.jpg"
                      alt="About US Person"
                    />
                    <img
                      class="img-fluid signature"
                      src="assets/images/01_signature.png"
                      alt="About US Signature"
                    />
                  </div>
                </div> -->
               
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container my-4">
  <h4 class="text-white text-center py-2 px-2 rounded shadow-sm" style="background-color: #008aa1;">
    Description
  </h4>
  <div class="px-3 px-md-4">
    <p class="fs-6">
      <?= nl2br($data['product_description'] ?? 'No description available') ?>
    </p>
  </div>
</div>





    <!-- Gallery Section -->
    <?php if (!empty($galleryImages)): ?>
      <div class="row mt-5">
      <div class="row category-section text-center">
      <div class="col-12">
        <h2>Product Gallery</h2>
      </div>
    </div>
        <?php foreach ($galleryImages as $image): ?>
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4 product-gallery">
            <img src="./admin/inc/uploads/headerproducts/<?= htmlspecialchars($image['image_path']) ?>" alt="Product Image">
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>


  <?php include 'footer.php' ?>

  <!-- Scroll Up -->
  <div class="scroll-up">
    <a class="move-section" href="#page">
      <i class="fas fa-long-arrow-alt-up"></i>
    </a>
  </div>

  <!-- Scripts -->
  <script src="assets/js/jquery-3.6.0.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>
