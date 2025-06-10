<?php
// db.php should create $pdo as PDO connection
require_once 'db.php';

$id = 1; // Replace with dynamic user ID e.g. from session
$stmt = $pdo->prepare("SELECT name, role FROM users WHERE id = :id");
$stmt->execute(['id' => $id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
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
  <title>Edmin - Premium Admin Template</title>
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
  <!-- Page header start -->
  <header class="page-header row ">
    <div class="logo-wrapper d-flex align-items-center col-auto"><a href="dashboard.php">
      <img class="for-light"
          src="../assets/images/login/02.jpg" alt="logo" style=" height:55px;">
          <img class="for-dark" src="../assets/images/login/02.jpg" alt="logo">
        </a>
        <a class="close-btn"  href="javascript:void(0)">
        <div class="toggle-sidebar">
          <div class="line"></div>
          <div class="line"></div>
          <div class="line"></div>
        </div>
      </a></div>
      <script>
  document.addEventListener('DOMContentLoaded', function () {
    const toggleBtn = document.getElementById('toggleSidebarBtn');
    toggleBtn.addEventListener('click', function () {
      document.body.classList.toggle('sidebar-collapsed');
    });
  });
</script>


    <div class="page-main-header col">
      <div class="header-left d-lg-block d-none">
        <!-- Search form placeholder -->
      </div>
      <div class="nav-right">
        <ul class="header-right">
          <li class="serchinput d-lg-none d-flex"><a class="search-mode">
              <svg class="svg-color">
                <use href="https://admin.pixelstrap.net/edmin/assets/svg/iconly-sprite.svg#Search">
                </use>
              </svg></a>
          </li>

          <li class="profile-dropdown custom-dropdown">
            <div class="d-flex align-items-center">
              <img src="../assets/images/profile.png" alt="Profile Image" style="width:40px; height:40px; border-radius:50%;">
              <div class="flex-grow-1 ms-2">
                <h5><?= htmlspecialchars($user['name'] ?? 'Guest'); ?></h5>
                <span><?= htmlspecialchars($user['role'] ?? 'No Role'); ?></span>
              </div>
            </div>

            <div class="custom-menu overflow-hidden">
              <ul>
                <li class="d-flex align-items-center">
                  <svg class="svg-color">
                    <use href="https://admin.pixelstrap.net/edmin/assets/svg/iconly-sprite.svg#Profile"></use>
                  </svg>
                  <a class="ms-2" href="user-profile.html">Account</a>
                </li>

                <li class="d-flex align-items-center">
                  <svg class="svg-color">
                    <use href="https://admin.pixelstrap.net/edmin/assets/svg/iconly-sprite.svg#Login"></use>
                  </svg>
                  <a class="ms-2" href="login.html">Log Out</a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </header>
  <!-- Page header end-->

  <div class="page-body-wrapper">
    <!-- Page sidebar start -->
    <div class="overlay"></div>
    <aside class="page-sidebar" data-sidebar-layout="stroke-svg">
      <div class="left-arrow page-wrapper" id="left-arrow">
        <svg class="feather">
          <use
            href="https://admin.pixelstrap.net/edmin/assets/svg/feather-icons/dist/feather-sprite.svg#arrow-left"></use>
        </svg>
      </div>


      <div id="sidebar-menu">
        <ul class="sidebar-menu" id="simple-bar">
          <li class="pin-title sidebar-list p-0">
            <h5 class="sidebar-main-title">Pinned</h5>
          </li>



          <!-- Dashboard -->
          <li class="sidebar-list">
            <a class="sidebar-link" href="dashboard.php">
              <i class="fas fa-tachometer-alt"></i> <!-- Dashboard icon -->
              <span>Dashboard</span>
            </a>
          </li>

          <!-- Slider -->
          <li class="sidebar-list">
            <a class="sidebar-link" href="slider.php">
              <i class="fas fa-images me-2"></i>
              <span>Slider</span>
            </a>
          </li>

          <!-- Project -->
          <li class="sidebar-list">
            <a class="sidebar-link" href="project.php">
              <i class="fas fa-folder-open me-2"></i>
              <span>Project</span>
            </a>
          </li>
<!-- categories -->
          <li class="sidebar-list">
            <a class="sidebar-link" href="category.php">
              <i class="fas fa-folder-open me-2"></i>
              <span> Categories </span>
            </a>
          </li>
  <!-- Project -->
      <li class="sidebar-list">
            <a class="sidebar-link" href="headerproduct.php">
              <i class="fas fa-folder-open me-2"></i>
              <span> Products</span>
            </a>
          </li> 
          <!-- Services -->
          <li class="sidebar-list">
            <a class="sidebar-link" href="services.php">
              <i class="fas fa-concierge-bell me-2"></i>
              <span>Services</span>
            </a>
          </li>

          <!-- Staff -->
          <!-- <li class="sidebar-list">
            <a class="sidebar-link" href="staff.php">
              <i class="fas fa-user-tie me-2"></i>
              <span>Staff</span>
            </a>
          </li> -->

          <!-- Gallery Blog -->
          <li class="sidebar-list">
            <a class="sidebar-link" href="gallery-blog.php">
              <i class="fas fa-photo-video me-2"></i>
              <span>About Us </span>
            </a>
          </li>

          <!-- Contact Queries -->
          <li class="sidebar-list">
            <a class="sidebar-link" href="contact-us.php">
              <i class="fas fa-envelope-open-text me-2"></i>
              <span>Contact Queries</span>
            </a>
          </li>
          

          <!-- Manage SEO -->
          <li class="sidebar-list">
            <a class="sidebar-link" href="manage-seo.php"><i class="fas fa-chart-line me-2"></i>Manage SEO</a>
          </li>
<!-- manage fQs -->
<li class="sidebar-list">
  <a class="sidebar-link" href="manage-fqs.php">
    <i class="fas fa-question-circle me-2"></i>
    <span>Manage Faqs</span>
  </a>
</li>

          <!-- Logout -->
          <li class="sidebar-list">
            <a class="sidebar-link" href="logout.php">
              <i class="fas fa-sign-out-alt me-2"></i>
              <span>Logout</span>
            </a>
          </li>

          <li class="line"></li>
        </ul>
      </div>
      <div class="right-arrow" id="right-arrow">
        <svg class="feather">
          <use
            href="https://admin.pixelstrap.net/edmin/assets/svg/feather-icons/dist/feather-sprite.svg#arrow-right"></use>
        </svg>
      </div>
    </aside>
    
    <!-- Page sidebar end -->
  </div>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <!-- JS scripts -->
  <script src="../assets/js/vendors/jquery/dist/jquery.min.js"></script>
  <script src="../assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/config.js"></script>
  <script src="../assets/js/sidebar.js"></script>
  <script src="../assets/js/vendors/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../assets/js/vendors/chart.js/dist/chart.umd.js"></script>
  <script src="../assets/js/vendors/simple-datatables/dist/umd/simple-datatables.js"></script>
  <script src="../assets/js/dashboard/default.js"></script>
  <script src="../assets/js/scrollbar/simplebar.js"></script>
  <script src="../assets/js/scrollbar/custom.js"></script>
  <script src="../assets/js/theme-customizer/customizer.js"></script>
  <script src="../assets/js/script.js"></script>
</body>

</html>
