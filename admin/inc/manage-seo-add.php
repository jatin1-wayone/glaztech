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


    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Edmin admin is super flexible, powerful, clean &amp; modern responsive bootstrap admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Edmin admin template, best javascript admin, dashboard template, bootstrap admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <title>Glaztech</title>
    <!-- Favicon icon-->
    <link rel="icon" href="assets/images/favicon/favicon.png" type="image/x-icon">




    <link rel="shortcut icon" href="assets/images/favicon/favicon.png" type="image/x-icon">
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <!-- Font awesome icon css -->
    <link rel="stylesheet" href="assets/css/vendors/%40fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="assets/css/vendors/%40fortawesome/fontawesome-free/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/vendors/%40fortawesome/fontawesome-free/css/brands.css">
    <link rel="stylesheet" href="assets/css/vendors/%40fortawesome/fontawesome-free/css/solid.css">
    <link rel="stylesheet" href="assets/css/vendors/%40fortawesome/fontawesome-free/css/regular.css">
    <!-- Ico Icon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/%40icon/icofont/icofont.css">
    <!-- Flag Icon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/flag-icon.css">
    <!-- Themify Icon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/themify-icons/themify-icons/css/themify.css">
    <!-- Animation css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/animate.css/animate.css">
    <!-- Whether Icon css-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/weather-icons/css/weather-icons.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/swiper/swiper-bundle.min.css">
    <!-- App css-->
    <link rel="stylesheet" href="assets/css/style.css">
    <link id="color" rel="stylesheet" href="assets/css/color-1.css" media="screen">
</head>

<body>
    <!-- tap to top-->
    <div class="tap-top">
        <svg class="feather">
            <use href="https://admin.pixelstrap.net/edmin/assets/svg/feather-icons/dist/feather-sprite.svg#arrow-up">
            </use>
        </svg>

    </div>
    
    <!-- loader-->
    <div class="loader-wrapper">
        <div class="loader"></div>
    </div>
    <?php require_once 'header.php'; ?>
    <main class="page-wrapper compact-wrapper" id="pageWrapper">
        <div class="container mt-4">
            <div class="card">
                <div class="card-header">
                    <h5>Add Content</h5>
                </div>
                <div class="card-body">
                
                    <form action="" method="POST" enctype="multipart/form-data">
                        <!-- Title -->
                        <div class="form-group">
                            <label for="title">Meeta Title</label>
                            <input class="form-control" type="text" id="title" name="page_name" required
                                placeholder="Enter title">
                        </div>
                        <!-- page_url -->
                        <div class="form-group">
                            <label for="title">Meeta Description</label>
                            <input class="form-control" type="text" id="page_url" name="meta_title" required
                                placeholder="Enter for used page_url">
                        </div>

                        <!-- Subtitle -->
                        <div class="form-group">
                            <label for="subtitle">Meeta Body</label>
                            <input class="form-control" type="text" id="subtitle" name="meta_description" required
                                placeholder="Enter subtitle">
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label for="description">Meeta keywords</label>
                            <textarea class="form-control" id="description" name="meta_keywords" rows="4" required
                                placeholder="Enter description"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <?php require_once 'footer.php'; ?>
    </main>

    <!-- jquery-->
    <script src="assets/js/vendors/jquery/dist/jquery.min.js"></script>
    <!-- bootstrap js-->
    <script src="assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/config.js"></script>
    <!-- Sidebar js-->
    <script src="assets/js/sidebar.js"></script>
    <!-- scrollbar js-->
    <script src="assets/js/scrollbar/simplebar.js"></script>
    <script src="assets/js/scrollbar/custom.js"></script>
    <!-- scrollable-->
    <script src="assets/js/vendors/swiper/swiper-bundle.min.js"></script>
    <script src="assets/js/swiper/swiper-custom.js"> </script>
    <!-- customizer-->
    <script src="assets/js/theme-customizer/customizer.js"></script>
    <!-- custom script -->
    <script src="assets/js/script.js"></script>
</body>

<!-- Mirrored from admin.pixelstrap.net/edmin/template/slider.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 May 2025 06:17:29 GMT -->

</html>