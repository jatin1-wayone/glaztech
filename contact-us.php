<?php
session_start();
require_once 'admin/inc/db.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        // Trim and sanitize
        $name    = trim($_POST['name'] ?? '');
        $email   = trim($_POST['email'] ?? '');
        $subject = trim($_POST['subject'] ?? '');
        $sms     = trim($_POST['sms'] ?? '');

        // Basic validation
        if (empty($name) || empty($email) || empty($sms)) {
            throw new Exception("Please fill in all required fields.");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Please enter a valid email address.");
        }

        // Check allowed domains
        $allowedDomains = ['gmail.com', 'yahoo.com', 'outlook.com'];
        $emailDomain = substr(strrchr($email, "@"), 1);

        if (!in_array($emailDomain, $allowedDomains)) {
            throw new Exception("Only Gmail, Yahoo, or Outlook emails are allowed.");
        }

        // Insert into DB
        $sql = "INSERT INTO contact_queries (name, email, subject, sms) 
                VALUES (:name, :email, :subject, :sms)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name'    => htmlspecialchars($name),
            ':email'   => htmlspecialchars($email),
            ':subject' => htmlspecialchars($subject),
            ':sms'     => htmlspecialchars($sms)
        ]);

        $message = "Your message has been sent successfully!";
    } catch (Exception $e) {
        $message = "Error: " . $e->getMessage();
    }
}
?>






<!DOCTYPE html>
<html lang="en">
  <!-- Mirrored from gazolin.netlify.app/gazolin/01_contact by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 May 2025 06:32:44 GMT -->
  <!-- Added by HTTrack --><meta
    http-equiv="content-type"
    content="text/html;charset=UTF-8"
  /><!-- /Added by HTTrack -->
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
      content="Gazolin is a Industry & Manufacturing HTML Template. Designed with great attention to details, flexibility and performance. It is ultra professional, smooth and sleek, with a clean modern layout. Gazolin specially designed for Automotive, Construction, Factories, Industrial, Industrial Business, Industrial Chemicals, Industrial Corporate, Industrial Engineering, Industrial Factory, Industrial HTML5, Industry, Machinery, Manufacturing, Mechanical Engineering, Power Energy, Services Company and other Industry & Manufacturing related services. Gazolin comes with most advanced and latest web technologies, enjoyable UX and the most beautiful design trends. Our template provides a platform to simply edit elements, choose styles and play around with the look and feel of your site. Build beautiful, intelligent websites with over 03+ Homepage Concepts ready to go or combine, build a layout has never been easier. There is a huge range of +34 styled pages waiting for your customization, anything you can think of can be built with our template. If you are searching for innovative, modern and clean HTML5 template, you must choose Gazolin. Gazolin comes with necessary features and pages. Gazolin comes with necessary features for Industrial websites such as about pages, Testimonials, Clients, questions & answers, work, services, team & single team profiles, awesome blog pages and more. This HTML template can easily satisfy all of your needs."
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

  

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- :: Loading -->
    <!-- <div class="loading">
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
    </div> -->
    <header class="all-navbar fixed-top">
   <?php     include 'navbar.php';
?>
   </header>    <!-- :: Search Box -->
    <div class="search-box">
      <form>
        <input type="search" placeholder="Search Here....." required />
        <button type="submit"><i class="fas fa-search"></i></button>
      </form>
      <span class="search-box-icon exit"><i class="fas fa-times"></i></span>
    </div>

    <!-- :: Menu Box -->
    <div class="menu-box">
      <div class="inner-menu">
        <div class="website-info">
          <a class="logo" href="#"
            ><img
              class="img-fluid"
              src="assets/images/logo/02_logo.png"
              alt="02 Logo"
          /></a>
          <p>
            Gazolin Are A Industry &amp; Manufacturing Services Provider
            Institutions. Suitable For Factory, Manufacturing, Industry,
            Engineering, Construction And Any Related Industry Care Field.
          </p>
        </div>
        <div class="contact-info">
          <h4>Contact Info</h4>
          <div class="contact-box">
            <i class="ar-icons-call"></i>
            <div class="box">
              <a class="phone" href="tel:01212843661">+971562345099 </a>
              <a class="phone" href="tel:01029134630">+971562345099 </a>
            </div>
          </div>
          <div class="contact-box">
            <i class="ar-icons-email"></i>
            <div class="box">
              <a class="mail" href="mailto:support@Gazolin.com"
                >Support@Glaztech.com</a
              >
              <a class="mail" href="mailto:mailbox@ar-coder.com"
                >Glaztech@.com</a
              >
            </div>
          </div>
          <div class="contact-box">
            <i class="ar-icons-location"></i>
            <div class="box">
              <p>GLAZTECH ALUMINIUM AND GLASS L.L.C P.O. BOX:84677 AI QUASIS IndustriAL Area 1, </p>
              <p>DUBAI,UNITED ARAB AMRAT.</p>
            </div>
          </div>
        </div>
        <div class="follow-us">
          <h4>Follow Us</h4>
          <ul class="icon-follow">
            <li>
              <a href="#"><i class="fab fa-facebook-f"></i></a>
            </li>
            <li>
              <a href="#"><i class="fab fa-twitter"></i></a>
            </li>
            <li>
              <a href="#"><i class="fab fa-instagram"></i></a>
            </li>
            <li>
              <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </li>
          </ul>
        </div>
        <span class="menu-box-icon exit"><i class="fas fa-times"></i></span>
      </div>
    </div>

    <!-- :: Breadcrumb Header -->
    <section
      class="breadcrumb-header style-2"
      id="page"
      style="background-image: url(assets/images/header/01_header.jpg)"
    >
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="banner">
              <h1>contact US</h1>
              <ul>
                <li><a href="index.php">Home</a></li>
                <li><i class="fas fa-angle-right"></i></li>
                <li>contact US</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
   
   
    <!-- :: contact us -->
    <div class="contact-us py-100">
      <div class="container">
        <div class="contact-info-content">
          <div class="row">
            <div class="col-md-6 col-lg-4">
              <div class="contact-box">
                <i class="ar-icons-call"></i>
                <div class="box">
                  <a class="phone" href="tel:01212843661">+971562345099</a>
                  <!-- <a class="phone" href="tel:01029134630">+971562345099 </a> -->
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="contact-box">
                <i class="ar-icons-email"></i>
                <div class="box">
                  
                  <a class="mail" href="mailto:mailbox@ar-coder.com"
                    >info@glaz-tech.com</a
                  >
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="contact-box">
                <i class="ar-icons-location"></i>
                <div class="box">
                  <p>GLAZTECH ALUMINIUM AND GLASS L.L.C P.O. BOX:84677 AI QUASIS IndustriAL Area 1, </p>
                  <p>DUBAI,UNITED ARAB  EMIRATE.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <!-- :: Map -->
            <div class="map-box">
              <iframe
                src="https://maps.google.com/maps?q=manhatan&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
              ></iframe>
            </div>
          </div>
          

          <div class="col-lg-6">
            <div class="add-comments">
            <?php if (!empty($message)): ?>
    <div class="alert alert-info"><?= htmlspecialchars($message) ?></div>
<?php endif; ?>

<form class="inner-add-comments form-contact-2" method="POST" action="contact-us.php">
    <div class="row">
        <div class="col-md-6 inner-add-comments-box">
            <input type="text" name="name" id="name" placeholder="Name" required />
        </div>
        <div class="col-md-6 inner-add-comments-box">
    <input type="email" name="email" id="email" placeholder="Email" required
           pattern="[a-zA-Z0-9._%+-]+@(gmail|yahoo|outlook)\.com" title="Only Gmail, Yahoo or Outlook (.com) emails allowed" />
</div>
<div class="col-md-12 inner-add-comments-box">
            <input type="text" name="subject" id="subject" placeholder="Subject" />
        </div>
        <div class="col-md-12 inner-add-comments-box">
            <textarea name="sms" id="sms" placeholder="Your Message Here" required></textarea>
        </div>
        <div class="col-md-12 inner-add-comments-box last">
            <button class="btn-1 btn-3 submit" type="submit">
                <span>Submit</span>
            </button>
        </div>
    </div>
</form>


<!-- Add jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


                    <span class="out-message"></span>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
   

    <!-- :: Footer -->
     <!-- :: Footer -->
     <?php include 'footer.php';?>


    <!-- :: Scroll UP -->
    <div class="scroll-up">
      <a class="move-section" href="#page">
        <i class="fas fa-long-arrow-alt-up"></i>
      </a>
    </div>
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

    <!-- :: Main JS -->
  </body>

  <!-- Mirrored from gazolin.netlify.app/gazolin/01_contact by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 May 2025 06:32:45 GMT -->
</html>
