<!DOCTYPE html>
<html lang="en">
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

  <head>
    <!-- :: Required Meta Tags -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta
      name="description"
      content="Glaztech is a Industry & Manufacturing HTML Template. Designed with great attention to details, flexibility and performance. It is ultra professional, smooth and sleek, with a clean modern layout. Glaztech specially designed for Automotive, Construction, Factories, Industrial, Industrial Business, Industrial Chemicals, Industrial Corporate, Industrial Engineering, Industrial Factory, Industrial HTML5, Industry, Machinery, Manufacturing, Mechanical Engineering, Power Energy, Services Company and other Industry & Manufacturing related services. Glaztech comes with most advanced and latest web technologies, enjoyable UX and the most beautiful design trends. Our template provides a platform to simply edit elements, choose styles and play around with the look and feel of your site. Build beautiful, intelligent websites with over 03+ Homepage Concepts ready to go or combine, build a layout has never been easier. There is a huge range of +34 styled pages waiting for your customization, anything you can think of can be built with our template. If you are searching for innovative, modern and clean HTML5 template, you must choose Glaztech. Glaztech comes with necessary features and pages. Glaztech comes with necessary features for Industrial websites such as about pages, Testimonials, Clients, questions & answers, work, services, team & single team profiles, awesome blog pages and more. This HTML template can easily satisfy all of your needs."
    />
    <meta
      name="keywords"
      content="Automotive, Construction, Factories, Industrial, Industrial Business, Industrial Chemicals, Industrial Corporate, Industrial Engineering, Industrial Factory, Industrial HTML5, Industry, Machinery, Manufacturing, Mechanical Engineering, Power Energy"
    />

    <!-- :: Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

    <!-- :: Favicon -->
    <link rel="icon" type="image/png" href="assets/images/logo/01.png" />

    <!-- :: Title -->
    <title>
      Aluminium & Glass System Manufacturers and Suppliers in Dubai - GlazTech
    </title>

    <!-- :: Google Fonts -->
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
    <header class="all-navbar fixed-top">
   <?php     include 'navbar.php';
?>
   </header>

    <!-- :: Search Box -->
    <?php
         include 'admin/inc/db.php';
$stmt = $pdo->prepare("SELECT * FROM slider");
$stmt->execute();
$sliders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<style>
  @media (max-width: 768px) {
  .sec-hero {
    height: 80vh;
  }
}
</style>
<section class="header" id="page">
    <div class="header-carousel owl-carousel owl-theme">
        <?php foreach ($sliders as $slider): ?>
        <div class="sec-hero display-table" style="background-image: url(<?php echo "./admin/inc/" . $slider['image']; ?>)">
            <div class="table-cell">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="banner">
                              <hr>
                              <h5 style="color: white;"><?php echo htmlspecialchars($slider['short_desc']); ?></h5>
                                <div class="top-handline"></div>
                                <h5 class="handline" style="font-size: 35px; "><?php echo htmlspecialchars($slider['title']); ?></h5>


                                <p class="about-website" ><?php echo htmlspecialchars($slider['description']); ?></p>
                                <div class="text-white fs-5">
                                  <i class="fas fa-check me-2" ></i> 100% Satisfaction Guarantee<br>
                                  <i class="fas fa-check me-2"  ></i> Quality Control Systeme
                              </div>


                                <div class="btn-box">
                                    <a class="btn-1 " href="contact-us.php"><span>Let's Start</span></a>
                                    <a class="btn-1 btn-2 ml-30" href="project.php"><span>Our Services</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
<!-- this is some project image  -->
<style>
  .btn-custom {
    background-color: #00a8c0;
    color: #fff;
    border: none;
  }
  .btn-custom:hover {
    background-color: #008aa1;
    color: #fff;
  }
</style>
<div class="container my-2">
  <h4 class="text-white text-center py-3 px-2 rounded shadow-sm" style="background-color: #008aa1;">
  TOP PRODUCTS
  </h4>
  
</div>

<!-- <h1 style="color: #fff; background-color: #008aa1; text-align: center; margin: 10px 0; padding: 15px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
    TOP PRODUCTS
</h1> -->

<div class="contact-us py-100">
  <div class="container">
    <div class="row g-4 text-center">

      <!-- Project 1 -->
      <div class="col-md-4">
        <div class="project-box position-relative overflow-hidden rounded shadow-sm mb-3">
          <img src=".\assets\images\product2\01.jpg.jpeg" alt="" class="img-fluid w-100 project-img rounded-top">
        </div>
        <div class="product-description p-3 shadow-sm bg-white rounded-bottom text-start">
          <h5 class="fw-bold mb-3 text-center">Bi-folding-Doors</h5>
          

          <!-- <div class="text-center btn-box">
            <a href="https://demo.wayone.co.in/glaz/category.php?category=outdoor-swing" class=" btn-1 "><span>View More</span></a>
          </div> -->
        </div>
      </div>

      <!-- Project 2 -->
      <div class="col-md-4">
        <div class="project-box position-relative overflow-hidden rounded shadow-sm mb-3">
          <img src="./assets/images/product2/02.jpg" alt="Bi-Folding" class="img-fluid w-100 project-img rounded-top" 
>
        </div>
        <div class="product-description p-3 shadow-sm bg-white rounded-bottom text-start">
          <h5 class="fw-bold mb-3 text-center">Retractable Roofs</h5>
         
          <!-- <div class="text-center btn-box">
            <a href="https://demo.wayone.co.in/glaz/category.php?category=bi-folding" class=" btn-1 "><span>View-More</span></a>
          </div> -->
        </div>
      </div>

      <!-- Project 3 -->
      <div class="col-md-4">
        <div class="project-box position-relative overflow-hidden rounded shadow-sm mb-3">
          <img src="./assets/images/product2/03.jpg" alt="Demountable Glass Partitions" class="img-fluid w-100 project-img rounded-top">
        </div>
        <div class="product-description p-3 shadow-sm bg-white rounded-bottom text-start">
          <h5 class="fw-bold mb-3 text-center">Sliding stystem</h5>
          
          <!-- <div class="text-center btn-box">
            <a href="https://demo.wayone.co.in/glaz/category.php?category=demountable-glass-partitioins" class=" btn-1 "><span>View More</span></a>
          </div> -->
        </div>
      </div>

    </div>
  </div>
</div>

<style>
  .project-img {
    height: 300px;
  transition: transform 0.4s ease;
}
.project-imge {
    height: 250px;
  transition: transform 0.4s ease;
}
.project-box:hover .project-img {
  transform: scale(1.05);
}
.product-description {
  border: 1px solid #eee;
  border-top: none;
}

</style>
<style>
.project-img {
  height: 300px;
  transition: transform 0.4s ease;
}
.project-box:hover .project-img {
  height: 300px;
  transform: scale(1.05);
}
.project-box {
  border-radius: 12px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}
</style>



<?php
        
$stmt = $pdo->prepare("SELECT * FROM gallery_blog limit 1");
$stmt->execute();
$Abouts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
    <!-- :: About US -->
    <section class="about-us py-100" id="start">
      <div class="container">
      
        <div class="row">
          <div class="col-lg-5">

          <?php foreach ($Abouts as $about): ?>
            <div class="about-us-img-box">
              <div class="img-box"
                style="background-image: url(<?php echo "./admin/inc/" . $about['image']; ?>)"></div>
            </div>
           

            <?php endforeach; ?>

          </div>
          
          <div class="col-lg-7">
            <div class="about-us-text-box">
              <div class="sec-title">
           
                
                <h3>
                <?php echo htmlspecialchars($about['short_description']); ?>
                </h3>
                <p class="sec-explain">
                <?php echo htmlspecialchars($about['description']); ?>
                </p>
              </div>



              
              <div class="row">
                <div class="col-sm-39">
                  <p class="providing">
Engineered for Excellence. Designed for You.
                  </p>
                  <ul class="about-us-core-list">
                    <li class="item">
                      <i class="fas fa-check"></i>
                      <h4>Over 20 years of industry experience</h4>
                    </li>
                    
                    <li class="item">
                      <i class="fas fa-check"></i>
                      <h4>Projects across UAE, GCC, and Africa Collaboration  with  Europe’s best:
                      </h4>
                    </li>
                   
                    <li class="item">
                      <i class="fas fa-check"></i>
                       <h4>Airclos(Spain),GU(Germany),Amuller(Germany),20Milimetros (Portugal) </h4>
                    </li>
                    <li class="item">
                      <i class="fas fa-check"></i>
                      <h4> From consultation to after-sales service, we deliver seamless experiences

                      </h4>
                    </li>
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
    </section>

    <!-- :: Services -->
    

<style>
  @media (max-width: 576px) {
  .about-us-core-list .item h4 {
    font-size: 1rem;
  }
}

</style>
<!-- :: Vision, Mission, Value Section -->
<section class="vision-mission-value  mt-5" >
  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-4 col-md-6 mb-4" >
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body text-center">
            <i class="fas fa-eye fa-2x mb-3 text-primary"></i>
            <h2 class="card-title" >Our Vision </h2>
            <p class="card-text" style="text-align: left; line-height: -1;">
            To be the UAE’s most trusted provider of custom aluminum and glass systems, shaping tomorrow’s architecture with sustainable, stylish, and intelligent designs.
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body text-center">
            <i class="fas fa-bullseye fa-2x mb-3 text-primary"></i>
            <h2 class="card-title">Our Mission </h2>
            <p class="card-text" style="text-align: left; line-height: -1;">
            To deliver high-end, tailor-made systems that blend architectural beauty with smart engineering — empowering homeowners, architects, and developers to realize bold designs with confidence.        </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body text-center">
            <i class="fas fa-gem fa-2x mb-3 text-primary"></i>
            <h2 class="card-title">Our Values </h2>
            <div class="card-text" style="text-align: left; line-height: -1;">
                  <h6> Client-Centric Innovation </h6>
                  <p>
                  We design with your ideas in mind.
                  </p>
                  <h6>  Engineered Excellence  
                  </h6>
                  <p>COnly premium materials and suppliers. </p>
                <h6>Transparency & Trust
                </h6>
                <p>No surprises, only results.</p>
                <h6>Craftsmanship Meets Customization
                </h6>
                <p>Each project is unique.</p>
                <h6>After-Sales Commitment </h6>
                <p>Warranty and service you can rely on
                </p>
                </div>
<style>
  ul {
  margin: 0;
}

li {
  margin-bottom: 0.1rem; /* Optional spacing between items */
}

</style>

        </div>
      </div>
    </div>
  </div>
</section>


<!-- video persentation -->
<div class="video-presentation">
          <div class="overlay"></div>
          <div class="presentation-box">
            <a href="https://www.youtube.com/watch?v=PrNsf_xHfEU&t=1s" class="pulse" data-lity="">
              <i class="ar-icons-play-button"></i>
            </a>
          </div>
        </div>
        <section class="py-5 bg-light" id="offerings">
  <div class="container">
    <div class="row align-items-center flex-column-reverse flex-md-row">
      
      <!-- Left: Text Content -->
      <div class="col-md-7">
        <h2 class="fw-bold text-dark mb-2">What We Offer</h2>
        <h5 class="text-muted mb-3">Smart Solutions for Modern Spaces</h5>
        <p class="text-dark">
          Explore our range of cutting-edge products engineered for elegance, durability, and thermal performance:
        </p>
        <ul class="list-unstyled  ps-0 text-secondary  " style="font-size: 18px; color:#0dcaf0;">
          <li class="mb-2">
            <i class="fas fa-check text-primary me-2"></i> Frameless Sliding Systems – Maximize light and views
          </li>
          <li class="mb-2 item ">
            <i class="fas fa-check text-primary me-2"></i> Thermal Bifold Doors – Minimal profile, superior insulation
          </li>
          <li class="mb-2">
            <i class="fas fa-check text-primary me-2"></i> Retractable Roofs – All-weather usability with European tech
          </li>
          <li class="mb-2">
            <i class="fas fa-check text-primary me-2"></i> Smoke & Natural Ventilation Systems – German precision for safety and comfort
          </li>
          <li class="mb-2">
            <i class="fas fa-check text-primary me-2"></i> Movable Walls – Flexible space separation with acoustic control
          </li>
          <li class="mb-2">
            <i class="fas fa-check text-primary me-2"></i> Office Glass Partitions – Sleek, quiet, and fully customizable
          </li>
          <li class="mb-2">
            <i class="fas fa-check text-primary me-2"></i> Automatic Doors & Staircase Glazing – Smart access with aesthetic appeal
          </li>
          <li class="mb-2">
            <i class="fas fa-check text-primary me-2"></i> Handrails & Shower Cubicles – Engineered to enhance modern living
          </li>
        </ul>
      </div>

      <!-- Right: Image (shown after on mobile, but visually on right on desktop) -->
      <div class="col-md-5 mb-4 mb-md-0">
        <div class="rounded shadow-sm overflow-hidden" style="height: 100%; max-height: 550px;">
          <img src="./assets/images/product2/jatin.jpeg" alt="Smart Solutions" class="img-fluid w-100 h-100 object-fit-cover">
        </div>
      </div>

    </div>
  </div>
</section>


<!-- Lity CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.min.css" rel="stylesheet" />

<!-- Lity JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.min.js"></script>




  
    </section>

   
    <div class="container">
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">

      <!-- Slide 1 -->
      <div class="swiper-slide">
        <div class="project-box position-relative overflow-hidden rounded shadow-sm">
          <img src=".\assets\images\brands\smoke01.jpeg" class="img-fluid w-100 project-imge rounded-top" alt="Bi-Folding Doors">
          <div class="product-description p-3 shadow-sm bg-white rounded-bottom text-center">
            <h5 class="fw-bold mb-0">Smoke Ventilation</h5>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="project-box position-relative overflow-hidden rounded shadow-sm">
          <img src=".\assets\images\product2\Accousticmovie.jpeg" class="img-fluid w-100 project-imge rounded-top" alt="Bi-Folding Doors">
          <div class="product-description p-3 shadow-sm bg-white rounded-bottom text-center">
            <h5 class="fw-bold mb-0">Accoustic movie</h5>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="project-box position-relative overflow-hidden rounded shadow-sm">
          <img src=".\assets\images\projects\dubai02.jpeg" class="img-fluid w-100 project-imge rounded-top" alt="Bi-Folding Doors">
          <div class="product-description p-3 shadow-sm bg-white rounded-bottom text-center">
            <h5 class="fw-bold mb-0">Smoke Ventilation 

            </h5>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="project-box position-relative overflow-hidden rounded shadow-sm">
          <img src=".\assets\images\product2\NPj_7KTgAluminium @ Glass Works.jpeg" class="img-fluid w-100 project-imge rounded-top" alt="Bi-Folding Doors">
          <div class="product-description p-3 shadow-sm bg-white rounded-bottom text-center">
            <h5 class="fw-bold mb-0">Smoke extraction systems</h5>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="project-box position-relative overflow-hidden rounded shadow-sm">
          <img src=".\assets\images\projects\dubai.jpeg" class="img-fluid w-100 project-imge rounded-top" alt="Bi-Folding Doors">
          <div class="product-description p-3 shadow-sm bg-white rounded-bottom text-center">
            <h5 class="fw-bold mb-0">Smoke Ventilation Dubai Airport
            </h5>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="project-box position-relative overflow-hidden rounded shadow-sm">
          <img src=".\assets\images\projects\dubai01.jpeg" class="img-fluid w-100 project-imge rounded-top" alt="Bi-Folding Doors">
          <div class="product-description p-3 shadow-sm bg-white rounded-bottom text-center">
            <h5 class="fw-bold mb-0">rectractable roof
            </h5>
          </div>
        </div>
      </div>
    </div>
    <!-- Pagination and navigation -->
    <!-- <div class="swiper-pagination"></div> -->
    <!--<div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div> -->
  </div>
</div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <div class="container my-4">
    <div class="text-center py-5">
    <h4 class="mb-3" style="font-size: 1.5rem; color:#00a8c0; ">
      Engineered for Excellence. Designed for You.
    </h4>
    <p class="mb-0 w-1/2" style="font-size: 1.1rem;line-height: 1.5rem;width: 66%;margin: auto;">
      We specialize in custom-made, high-performance glass and aluminum systems—crafted to suit the harsh Middle East climate and the evolving needs of modern villas and commercial buildings.
    </p>
  </div>
</div>


<div class="container">
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">

      <!-- Slide 1 -->
      <div class="swiper-slide">
        <div class="project-box position-relative overflow-hidden rounded shadow-sm">
          <img src="./assets/images/product2/bifolding01.jpeg" class="img-fluid w-100 project-imge rounded-top" alt="Bi-Folding Doors">
          <div class="product-description p-3 shadow-sm bg-white rounded-bottom text-center">
            <h5 class="fw-bold mb-0">Bi-Folding Doors</h5>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="project-box position-relative overflow-hidden rounded shadow-sm">
          <img src=".\assets\images\product2\Accousticmovie.jpeg" class="img-fluid w-100 project-imge rounded-top" alt="Bi-Folding Doors">
          <div class="product-description p-3 shadow-sm bg-white rounded-bottom text-center">
            <h5 class="fw-bold mb-0">Accoustic movie</h5>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="project-box position-relative overflow-hidden rounded shadow-sm">
          <img src=".\assets\images\product2\NPj_7KTgAluminium @ Glass Works.jpeg" class="img-fluid w-100 project-imge rounded-top" alt="Bi-Folding Doors">
          <div class="product-description p-3 shadow-sm bg-white rounded-bottom text-center">
            <h5 class="fw-bold mb-0">Aluminium @ Glass Works
            </h5>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="project-box position-relative overflow-hidden rounded shadow-sm">
          <img src=".\assets\images\product2\ooo.png" class="img-fluid w-100 project-imge rounded-top" alt="Bi-Folding Doors">
          <div class="product-description p-3 shadow-sm bg-white rounded-bottom text-center">
            <h5 class="fw-bold mb-0">Vertical sliding</h5>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="project-box position-relative overflow-hidden rounded shadow-sm">
          <img src=".\assets\images\product2\111.png" class="img-fluid w-100 project-imge rounded-top" alt="Bi-Folding Doors">
          <div class="product-description p-3 shadow-sm bg-white rounded-bottom text-center">
            <h5 class="fw-bold mb-0">Handrails</h5>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="project-box position-relative overflow-hidden rounded shadow-sm">
          <img src=".\assets\images\product1\demountable-glass-wall-partition-automatic-in-dubai-14.jpg" class="img-fluid w-100 project-imge rounded-top" alt="Bi-Folding Doors">
          <div class="product-description p-3 shadow-sm bg-white rounded-bottom text-center">
            <h5 class="fw-bold mb-0">Shower Encloser</h5>
          </div>
        </div>
      </div>
    </div>
    <!-- Pagination and navigation -->
    <!-- <div class="swiper-pagination"></div> -->
    <!--<div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div> -->
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
  const swiper = new Swiper('.swiper', {
  slidesPerView: 1,
  spaceBetween: 20,
  loop: true,
  autoplay: {
    delay: 1000, // 3 seconds delay between slides
    disableOnInteraction: false, // keeps autoplay running after user interaction
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  breakpoints: {
    576: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    992: {
      slidesPerView: 3,
    },
  }
});

</script>
<!-- Add this in your <head> if not already present -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Responsive Section -->
<div class="container my-4">
  <div class="text-center">
  <div class="container my-2">
  <h4 class="text-white text-center py-3 px-2 rounded shadow-sm" style="background-color: #008aa1;">
  Your Vision Our Intelligence
  </h4>
</div>
    
    <img 
      src="./assets/images/product2/Airclos S200 Bifold doors (17).jpg" 
      alt="Vision Image" 
      class="img-fluid rounded shadow-sm" 
      style="max-height: 400px; object-fit: cover; width: 100%;"
    >
  </div>
</div>


    <!-- :: Projects -->
    <section class="projects py-100">
      <div class="container">
        <div class="sec-title">
          <div class="row">
            <div class="col-lg-5">
              <h2>We work with global Industries!</h2>
              <h3>Glaztech Completed  Project</h3>
              <h6>
              Every project is ajourney— shaped byimagination, engineered by expertise.”
              </h6>
            </div>
            <div class="col-lg-5 d-flex align-items-center">
              <p class="sec-explain">
                glaztech Are A Industry & Manufacturing Services Provider
                Institutions. Suitable For Factory, Manufacturing, Industry,
                Engineering, Construction And Any Related Industry Care Field.
              </p>
            </div>
          </div>
        </div>
       
        <div class="projects-carousel owl-carousel owl-theme">

        <?php 

include './admin/inc/db.php';
try {
$stmt = $pdo->query("SELECT image, project_name FROM product");
$images = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($images as $row) {
$imgPath = "./admin/inc/" . $row['image'];
$projectName = htmlspecialchars($row['project_name']); // Prevent XSS

?>


          <div class="projects-item">
            <div class="img-box">
              <img
                class="img-fluid projects-item-img"
                src="<?=htmlspecialchars($imgPath) ?>"
                alt="<?= $projectName ?>"
              />
            </div>
            <div class="hover-box">
              <div class="text-box">
                
                <h4><a href="01_#"><?= $projectName ?></a></h4>
              </div>
              <!-- <ul class="projects-icon">
                <li>
                  <a href="01_#"><i class="fas fa-link"></i></a>
                </li>
                <li>
                  <a class="popup" href="assets/images/projects/07_projects.jpg"
                    ><i class="far fa-eye"></i
                  ></a>
                </li>
              </ul> -->
            </div>
            <h4
              class="text-center"
              style="font-weight: bold; padding-top: 15px"
            >
            <?= $projectName ?>
            </h4>
          </div>

          <?php 


}
} catch (PDOException $e) {
  echo "<p style='color:red;'>Error loading images: " . $e->getMessage() . "</p>";
}

?>
          

          
        </div>
      </div>
    </section>





    <section class="projects py-100">
      <div class="container">
        <div class="sec-title">
          <div class="row">
            <div class="col-lg-5">
              <h2>We work with global Industries!</h2>
              <h3>Glaztech Products </h3>
            </div>
            <div class="col-lg-5 d-flex align-items-center">
              <p class="sec-explain">
                glaztech Are A Industry & Manufacturing Services Provider
                Institutions. Suitable For Factory, Manufacturing, Industry,
                Engineering, Construction And Any Related Industry Care Field.
              </p>
            </div>
          </div>
        </div>
       
        <div class="projects-carousel owl-carousel owl-theme">

        <?php 

include './admin/inc/db.php';
try {
$stmt = $pdo->query("SELECT  product_image as image, product_name as project_name , product_slug FROM  headerproducts order by id desc");
$images = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($images as $row) {
$imgPath = "./admin/inc/uploads/headerproducts/" . $row['image'];
$projectName = htmlspecialchars($row['project_name']); // Prevent XSS

?>


          <div class="projects-item">
            <div class="img-box">
              <img
                class="img-fluid projects-item-img"
                src="<?=htmlspecialchars($imgPath) ?>"
                alt="<?= $projectName ?>"
              />
            </div>
            <div class="hover-box">
              <div class="text-box">
                
                <h4><a href="products.php?slug=<?= urlencode($row['product_slug']) ?>"><?= $projectName ?></a></h4>
              </div>
              <!-- <ul class="projects-icon">
                <li>
                  <a href="01_#"><i class="fas fa-link"></i></a>
                </li>
                <li>
                  <a class="popup" href="assets/images/projects/07_projects.jpg"
                    ><i class="far fa-eye"></i
                  ></a>
                </li>
              </ul> -->
            </div>
            <h4
              class="text-center"
              style="font-weight: bold; padding-top: 15px"
            >
            <?= $projectName ?>
            </h4>
          </div>

          <?php 


}
} catch (PDOException $e) {
  echo "<p style='color:red;'>Error loading images: " . $e->getMessage() . "</p>";
}

?>
          

          
        </div>
      </div>
    </section>

    <!-- :: Provide 2 -->
    



   <!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<div class="section-full mobile-page-padding bg-gray pt-5 pb-2 bg-repeat" style="background-image:url('images/background/bg-12.jpg');">
  <div class="container" style="margin-bottom: 30px;">
    <!-- Title -->
    <div class="section-head text-center mb-3">
      <div class="sx-separator-outer separator-center">
        <div class="sx-separator bg-white bg-moving bg-repeat-x" style="background-image:url('images/background/cross-line2.png')">
          <h3 class="sep-line-one">Our Brands</h3>
        </div>
      </div>
    </div>

    <!-- Brands Swiper -->
    <div class="swiper myBrandSwiper">
      <div class="swiper-wrapper">
        <!-- Each brand wrapped in swiper-slide -->
        <div class="swiper-slide">
          <div class="brand-card">
            <img src="./assets/images/brands/aluminium-and-glass-system-manufacturers-and-suppliers-in-dubai-28.png" alt="Brand 1">
          </div>
        </div>
        <div class="swiper-slide">
          <div class="brand-card">
            <img src="./assets/images/brands/airclos.png" alt="Brand 2">
          </div>
        </div>
        <div class="swiper-slide">
          <div class="brand-card">
            <img src="./assets/images/brands/aluminium-and-glass-system-manufacturers-and-suppliers-in-dubai-30.png" alt="Brand 3">
          </div>
        </div>
        <div class="swiper-slide">
          <div class="brand-card">
            <img src="./assets/images/brands/aluminium-and-glass-system-manufacturers-and-suppliers-in-dubai-31.png" alt="Brand 4">
          </div>
        </div>
        <div class="swiper-slide">
          <div class="brand-card">
            <img src="./assets/images/brands/aluminium-and-glass-system-manufacturers-and-suppliers-in-dubai-32.png" alt="Brand 5">
          </div>
        </div>
        <div class="swiper-slide">
          <div class="brand-card">
            <img src="./assets/images/brands/aluminium-and-glass-system-manufacturers-and-suppliers-in-dubai-33.png" alt="Brand 6">
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Keep your styling -->
  <style>
    .brand-card {
      padding: 10px;
      border: 1px solid #eee;
      border-radius: 8px;
      background-color: #fff;
      box-shadow: 0 0 10px #00000011;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 150px;
    }

    .brand-card img {
      max-height: 120px;
      object-fit: contain;
      width: auto;
      margin: auto;
    }

    @media (max-width: 556px) {
      .brand-card img {
        max-height: 90px;
      }
    }
  </style>
</div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Swiper Initialization -->
<script>
  new Swiper(".myBrandSwiper", {
    loop: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    speed: 800,
    slidesPerView: 3,
    spaceBetween: 30,
    breakpoints: {
      0: { slidesPerView: 1 },
      576: { slidesPerView: 2 },
      992: { slidesPerView: 3 }
    }
  });
</script>






    <?php include 'footer.php'; ?>




    <!-- :: Scroll UP -->
    <div class="scroll-up">
      <a class="move-section" href="#page">
        <i class="fas fa-long-arrow-alt-up"></i>
      </a>
    </div>

<script  src="assets/js/popper.min.js"></script><!-- POPPER.MIN JS -->
<script  src="assets/js/bootstrap.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<script  src="assets/js/bootstrap-select.min.js"></script><!-- Form js -->
<script  src="assets/js/magnific-popup.min.js"></script><!-- MAGNIFIC-POPUP JS -->
<script  src="assets/js/waypoints.min.js"></script><!-- WAYPOINTS JS -->
<script  src="assets/js/counterup.min.js"></script><!-- COUNTERUP JS -->
<script  src="assets/js/waypoints-sticky.min.js"></script><!-- sticky header JS -->
<script  src="assets/js/isotope.pkgd.min.js"></script><!-- MASONRY  -->
<script  src="assets/js/owl.carousel.min.js"></script><!-- OWL  SLIDER  -->
<script  src="assets/js/jquery.owl-filter.js"></script>
<script  src="assets/js/stellar.min.js"></script><!-- PARALLAX BG IMAGE   -->
<script  src="assets/js/jquery.bootstrap-touchspin.js"></script><!-- FORM JS -->  
<script  src="assets/js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
<script  src="assets/js/jquery.bgscroll.js"></script><!-- BACKGROUND SCROLL -->
<script  src="assets/js/theia-sticky-sidebar.js"></script><!--sticky content-->
<script  src="assets/js/switcher.js"></script><!-- SWITCHER FUCTIONS  -->
<script  src="assets/js/bootstrap-slider.min.js"></script><!-- Price range slider -->
    <!-- :: JavaScript Files -->
    <!-- :: jQuery JS -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <!-- :: Bootstrap JS Bundle With Popper JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- :: Owl Carousel JS -->
    <script src="assets/js/owl.carousel.min.js"></script>

    <!-- :: Lity -->
    <script src="assets/js/lity.min.js"></script>

    <!-- :: Nice Select -->
    <script src="assets/js/jquery.nice-select.min.js"></script>

    <!-- :: Waypoints -->
    <script src="assets/js/jquery.waypoints.min.js"></script>

    <!-- :: CounterUp -->
    <script src="assets/js/jquery.counterup.min.js"></script>

    <!-- :: Magnific Popup -->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>

    <!-- :: MixitUp -->
    <script src="assets/js/mixitup.min.js"></script>

    <!-- :: Main JS -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/ajax-script.js"></script>

  </body>

</html>
