<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from admin.pixelstrap.net/edmin/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 May 2025 06:14:44 GMT -->
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
    <link rel="icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">




    <link rel="shortcut icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
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
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/swiper/swiper-bundle.min.css">
    <!-- App css-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
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
    <?php include ('header.php');?>

    <main class="page-wrapper compact-wrapper" id="pageWrapper">
        </div>
        <?php include 'footer.php';?>
        <!-- <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 footer-copyright">
                        <p class="mb-0">Copyright 2024 © way one.</p>
                    </div>
                    <div class="col-md-6">
                        <p class="float-end mb-0">Hand crafted &amp; made with
                            <svg class="svg-color footer-icon">
                                <use
                                    href="https://admin.pixelstrap.net/edmin/assets/svg/iconly-sprite.svg#footer-heart">
                                </use>
                            </svg>
                        </p>
                    </div>
                </div>
            </div>
            </footer> -->
        </div>
    </main>
    <!-- jquery-->
    <script src="../assets/js/vendors/jquery/dist/jquery.min.js"></script>
    <!-- bootstrap js-->
    <script src="../assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/config.js"></script>
    <!-- Sidebar js-->
    <script src="../assets/js/sidebar.js"></script>
    <!-- scrollbar js-->
    <script src="../assets/js/scrollbar/simplebar.js"></script>
    <script src="../assets/js/scrollbar/custom.js"></script>
    <!-- scrollable-->
    <script src="../assets/js/vendors/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/js/swiper/swiper-custom.js"> </script>
    <!-- customizer-->
    <script src="../assets/js/theme-customizer/customizer.js"></script>
    <!-- custom script -->
    <script src="../assets/js/script.js"></script>
</body>

<!-- Mirrored from admin.pixelstrap.net/edmin/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 May 2025 06:15:47 GMT -->

</html>