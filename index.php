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
                              <h5 style="color: white;">“Where engineering meets elegance — tailored for luxury living.”</h5>
                                <div class="top-handline"></div>
                                <h5 class="handline" style="font-size: 35px;"><?php echo htmlspecialchars($slider['title']); ?></h5>


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
                <div class="col-sm-7">
                  <p class="providing">
                    Providing innovative glass door Solution For Future
                  </p>
                  <ul class="about-us-core-list">
                    <li class="item">
                      <i class="fas fa-check"></i>
                      <h4>We Use Qulity Manufacturing Materials</h4>
                    </li>
                    
                    <li class="item">
                      <i class="fas fa-check"></i>
                      <h4>Group Of Certified & Experienced Team</h4>
                    </li>
                    <li class="item">
                      <i class="fas fa-check"></i>
                      <h4>The Best services of Multiple Industries</h4>
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
    


<!-- :: Vision, Mission, Value Section -->
<section class="vision-mission-value  mt-5" >
  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-4 col-md-6 mb-4" >
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body text-center">
            <i class="fas fa-eye fa-2x mb-3 text-primary"></i>
            <h3 class="card-title" >VISION</h3>
            <p class="card-text" style="text-align: left; line-height: -1;">
            To be the leading name in architectural
glass and aluminum systems, setting
new benchmarks in design,
performance, and sustainability. At
Glaztech, our vision is to connect people
with the outdoors through smartly
engineered, elegant, and eco-conscious
solutions that inspire luxury and
enhance lifestyle.
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body text-center">
            <i class="fas fa-bullseye fa-2x mb-3 text-primary"></i>
            <h3 class="card-title">MISSION</h3>
            <p class="card-text" style="text-align: left; line-height: -1;">
            To deliver premium, tailor-made
glass and aluminum systems that
fuse engineering precision, aesthetic
elegance, and advanced European
technology including cutting-edge
motorization, automation, and
intelligent controls.
We specialize in transforming
complex architectural ideas into
practical, high-performance
solutions empowering architects,
developers, and homeowners to
redefine modern living. Every
Glaztech system is crafted with
European engineering expertise,
ensuring lasting durability, seamless
functionality, and refined design.            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body text-center">
            <i class="fas fa-gem fa-2x mb-3 text-primary"></i>
            <h3 class="card-title">VALUE</h3>
            <div class="card-text" style="text-align: left; line-height: -1;">
  <h6>Client-Centric Innovation</h6>
  <p>
    Every project starts with a vision we listen, 
    innovate, and deliver beyond expectations.
  </p>
  <h6>Transparency & Trust 
  </h6>
  <p>Clear communication, honest timelines, and 
service with integrity are at the heart of our 
operations. </p>
<h6>Craftsmanship Meets Customization 
</h6>
<p>We believe in solutions and quality. Every 
system is thoughtfully designed and tailored 
to your unique space.</p>
<h6>Team Synergy 
</h6>
<p>We work as one  from our engineering team 
to our international partners  your success is 
our shared mission. 
Reliable After-Sales Support 
Our commitment doesn’t end at installation. 
We offer trusted warranty coverage and 
responsive after-sales service for your peace 
of mind.</p>
</div>


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

<!-- Lity CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.min.css" rel="stylesheet" />

<!-- Lity JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.min.js"></script>




  
    </section>

   
    <!-- :: Team -->
   
     <!-- :: Statistic -->
     <div class="statistic">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-lg-3">
            <div class="statistic-item">
              <i class="ar-icons-checklist"></i>
              <div class="content">
                <div class="counter statistic-counter">7.165</div>
                <div class="counter-name">
                  Projects And Residentials Completed in 2020
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="statistic-item">
              <i class="ar-icons-conveyor-2"></i>
              <div class="content">
                <div class="counter statistic-counter">3.422</div>
                <div class="counter-name">
                  Satisfied Clients We Have Served Globally
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="statistic-item">
              <i class="ar-icons-conveyor-3"></i>
              <div class="content">
                <div class="counter statistic-counter">1.888</div>
                <div class="counter-name">
                  Qualified Employees And Workers With Us
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="statistic-item">
              <i class="ar-icons-idea"></i>
              <div class="content">
                <div class="counter statistic-counter">45</div>
                <div class="counter-name">
                  Years Of Experience In The Factory and Manufacturing
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    

    <!-- :: Provide -->
    <section class="provide">
      <div class="bg-section">
        <div class="overlay overlay-3"></div>
      </div>
      <div class="container">
        <div class="sec-title">
          <div class="row">
            <div class="col-lg-5">
              <h3>Glaztech Provide The Best Service For Sustainable Progress</h3>
            </div>
            <div class="col-lg-5 d-flex align-items-center">
              <p class="sec-explain">
                Glaztech Are A Industry & Manufacturing Services Provider
                Institutions. Suitable For Factory, Manufacturing, Industry,
                Engineering, Construction And Any Related Industry Care Field.
              </p>
            </div>
          </div>
        </div>
        <div class="provide-core-list">
          <div class="row">
            <div class="col-md-6 col-lg-3">
              <div class="provide-core-list-item">
                <i class="ar-icons-idea"></i>
                <h4>45 Years Experience</h4>
                <p>
                  Lorem Ipsum is simply text of the printing and typesetting
                  industry.
                </p>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="provide-core-list-item">
                <i class="ar-icons-foreman"></i>
                <h4>Best Team Member</h4>
                <p>
                  Lorem Ipsum is simply text of the printing and typesetting
                  industry.
                </p>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="provide-core-list-item">
                <i class="ar-icons-electricity"></i>
                <h4>The Best Services</h4>
                <p>
                  Lorem Ipsum is simply text of the printing and typesetting
                  industry.
                </p>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="provide-core-list-item">
                <i class="ar-icons-forklift"></i>
                <h4>Unique Technology</h4>
                <p>
                  Lorem Ipsum is simply text of the printing and typesetting
                  industry.
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- :: Qoute Box -->
        <!-- <div class="quote-box">
          <div class="row">
            <div class="col-md-6">
              <div class="sec-title">
                <h3>Get Every Updates!</h3>
                <p class="sec-explain">
                  Glaztech Are A Industry & Manufacturing Services Provider
                  Institutions. Suitable For Factory, Manufacturing, Industry,
                  Engineering, Construction And Any Related Industry Care Field.
                </p>
              </div>
              <div class="contact-info">
                <h4>Do You Have Any Questions!</h4>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="contact-box">
                      <i class="ar-icons-call"></i>
                      <div class="box">
                        <a class="phone" href="tel:0201212843661"
                          >0121284 3661</a
                        >
                        <a class="phone" href="tel:0201029134630"
                          >0102913 4630</a
                        >
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="contact-box">
                      <i class="ar-icons-email"></i>
                      <div class="box">
                        <a class="mail" href="mailto:mailbox@ar-coder.com"
                          >MailBox@AR-Coder.com</a
                        >
                        <a class="mail" href="mailto:support@Glaztech.com"
                          >Support@Glaztech.com</a
                        >
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="contact-box last">
                      <i class="ar-icons-location"></i>
                      <div class="box">
                        <p>14D Street Brooklyn,</p>
                        <p>New York.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <form class="row form-contact">
                <div class="col-lg-6">
                  <div class="quote-item">
                    <input
                      type="text"
                      name="name"
                      placeholder="Name"
                      required
                    />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="quote-item">
                    <input
                      type="email"
                      name="email"
                      placeholder="Email"
                      required
                    />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="quote-item">
                    <select name="industry">
                      <option value="Select your industry">
                        Select your industry
                      </option>
                      <option value="Constraction Of Engineering">
                        Constraction Of Engineering
                      </option>
                      <option value="Petroleum Gas Energy">
                        Petroleum & Gas Energy
                      </option>
                      <option value="Basic Industrial Chemicals">
                        Basic & Industrial Chemicals
                      </option>
                      <option value="Mechanical Engineering">
                        Mechanical Engineering
                      </option>
                      <option value="Bridge Constraction">
                        Bridge Constraction
                      </option>
                      <option value="Automotive Manufacturing">
                        Automotive Manufacturing
                      </option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="quote-item">
                    <input
                      type="tel"
                      name="phone"
                      placeholder="Phone"
                      required
                    />
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="quote-item">
                    <div class="quote-item">
                      <textarea
                        name="message"
                        placeholder="Message Details!"
                        required
                      ></textarea>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="quote-item">
                    <button class="btn-1 btn-3 submit" type="submit">
                      <span>Submit Request</span>
                    </button>
                    <span class="out-message"></span>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div> -->
      </div>
    </section>

    <?php
require_once('./admin/inc/db.php'); 
try {
    $stmt = $pdo->prepare("SELECT * FROM faqs  ORDER BY id DESC");
    $stmt->execute();
    $faqs = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching FAQs: " . $e->getMessage());
}
?>

<section class="provide-2 py-100">
  <div class="bg-section">
    <div class="overlay overlay-2"></div>
  </div>
  <div class="container">
    <div class="sec-title text-center mb-5">
      <h1 class="text-white">Frequently Asked Questions</h1>
      <p class="sec-explain">
        Find answers to common questions about our services, products, and opportunities at Glaztech.
      </p>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <!-- :: FAQs -->
        <div class="faq">
          <?php $i = 1; foreach ($faqs as $faq): ?>
          <div class="faq-box">
            <button
              class="btn btn-primary click"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#faqs-<?= $i ?>"
              aria-expanded="<?= $i === 1 ? 'true' : 'false' ?>"
              aria-controls="faqs-<?= $i ?>"
            >
              <?= htmlspecialchars($faq['question']) ?>
              <i class="fas fa-angle-right"></i>
            </button>
            <div class="collapse <?= $i === 1 ? 'show' : '' ?>" id="faqs-<?= $i ?>">
              <div class="card card-body about-text">
                <?= nl2br(htmlspecialchars($faq['answer'])) ?>
              </div>
            </div>
          </div>
          <?php $i++; endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

   

    <!-- :: Projects -->
    <section class="projects py-100">
      <div class="container">
        <div class="sec-title">
          <div class="row">
            <div class="col-lg-5">
              <h2>We work with global Industries!</h2>
              <h3>Glaztech Completed  Project</h3>
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
    

  

    
    <div class="section-full  mobile-page-padding bg-gray  p-t80 p-b10 bg-repeat" style="background-image:url(images/background/bg-12.jpg);">
        
        <div class="container">
        
            <!-- TITLE START -->
            <div class="section-head">
                <div class="sx-separator-outer separator-center">
                    <div class="sx-separator bg-white bg-moving bg-repeat-x" style="background-image:url(images/background/cross-line2.png)">
                        <h3 class="sep-line-one">Our Brands</h3>
                    </div>
                </div>
            </div>                   
            <!-- TITLE END -->                 
            <div class="section-content">
                <div class="client-grid m-b40">
                
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-6 m-b30">
                            <div class="card">
                           <center> <img src="./assets/images/brands/aluminium-and-glass-system-manufacturers-and-suppliers-in-dubai-28.png" alt="Aluminium & Glass System Manufacturers and Suppliers in Dubai - GlazTech" title="Aluminium & Glass System Manufacturers and Suppliers in Dubai - GlazTech" ></center>
                            
                        </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-6 m-b30">
                            <div class="card">
                          <center>  <img src="./assets/images/brands/airclos.png" alt="Aluminium & Glass System Manufacturers and Suppliers in Dubai - GlazTech" title="Aluminium & Glass System Manufacturers and Suppliers in Dubai - GlazTech" > </center>
                            
                        </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-6  m-b30">
                           <div class="card">
                            <center> <img src="./assets/images/brands/aluminium-and-glass-system-manufacturers-and-suppliers-in-dubai-30.png" alt="Aluminium & Glass System Manufacturers and Suppliers in Dubai - GlazTech" title="Aluminium & Glass System Manufacturers and Suppliers in Dubai - GlazTech" ></center>
                            
                        </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-6  m-b30">
                           <div class="card"> 
                            <center> <img src="./assets/images/brands/aluminium-and-glass-system-manufacturers-and-suppliers-in-dubai-31.png" alt="Aluminium & Glass System Manufacturers and Suppliers in Dubai - GlazTech" title="Aluminium & Glass System Manufacturers and Suppliers in Dubai - GlazTech" > </center>
                            
                        </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-6  m-b30">
                            <div class="card">
                           <center> <img src="./assets/images/brands/aluminium-and-glass-system-manufacturers-and-suppliers-in-dubai-32.png" alt="Aluminium & Glass System Manufacturers and Suppliers in Dubai - GlazTech" title="Aluminium & Glass System Manufacturers and Suppliers in Dubai - GlazTech"></center>
                           
                           

                        </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-6  m-b30">
                          <div class="card">
                            <center>  <img src="./assets/images/brands/aluminium-and-glass-system-manufacturers-and-suppliers-in-dubai-33.png" alt="Aluminium & Glass System Manufacturers and Suppliers in Dubai - GlazTech" title="Aluminium & Glass System Manufacturers and Suppliers in Dubai - GlazTech"></center>
                           
                            

                        </div>
                        </div>
                    </div>

                                                                           
                </div>
            </div>
        </div>
        
        <div class="hilite-title text-left p-l00 text-uppercase">
            <strong>Brands</strong>
        </div>                     
     </div>  


<!-- Style -->



    <!-- :: Footer -->
    <?php include 'footer.php';?>

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