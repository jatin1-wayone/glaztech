<?php
session_start();

// Block access if not logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php"); // Redirect to login
    exit();
}
?>


<?php

require_once('db.php'); // This uses $pdo for database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_name = $_POST['project_name'] ?? '';
   

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $targetDir = "projects/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        $originalName = basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
        $allowedTypes = ["jpg", "jpeg", "png", "gif", "webp"];

        if (in_array($extension, $allowedTypes)) {
            $uniqueName = time() . "_" . $originalName;
            $targetFile = $targetDir . $uniqueName;

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                try {
                    $stmt = $pdo->prepare("INSERT INTO product (project_name,  image) VALUES (:project_name,  :image)");
                    $stmt->execute([
                        ':project_name' => $project_name,
                        
                        ':image' => $targetFile
                    ]);

                    echo "<script>alert('project content added successfully.'); window.location.href='project.php';</script>";
                } catch (PDOException $e) {
                    echo "<script>alert('Database error: " . $e->getMessage() . "');</script>";
                }
            } else {
                echo "<script>alert('Failed to upload image.');</script>";
            }
        } else {
            echo "<script>alert('Invalid file type. Allowed: jpg, jpeg, png, gif, webp.');</script>";
        }
    } else {
        echo "<script>alert('Please upload an image.');</script>";
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from admin.pixelstrap.net/edmin/template/project.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 May 2025 06:17:25 GMT -->

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
    <style>
    .page-wrapper {
        position: relative;
        width: 81%;
        margin-left: auto;
    }
    </style>
    <!-- loader-->
    <div class="loader-wrapper">
        <div class="loader"></div>
    </div>
    <?php require_once 'header.php'; ?>
    <main class="page-wrapper compact-wrapper" id="pageWrapper">
        <div class="container mt-4">
            <div class="card">
                <div class="card-header">
                    <h5>Add Project</h5>
                </div>
                <div class="card-body">
                    <form action="pindex.php" method="POST" enctype="multipart/form-data">
                        <!--project  -->
                        <div class="form-group">
                            <label for="title">project Name</label>
                            <input class="form-control" type="text" id="project_name" name="project_name" required
                                placeholder="Enter project Name">
                        </div>
                     
                        <!-- Image Upload -->
                        <div class="form-group">
                            <label for="image">Upload Image</label>
                            <input class="form-control" type="file" id="image" name="image" accept="image/*" required>
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

<!-- Mirrored from admin.pixelstrap.net/edmin/template/project.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 May 2025 06:17:29 GMT -->

</html>