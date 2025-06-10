<!DOCTYPE html>
<html lang="en">
  <!-- Mirrored from gazolin.netlify.app/gazolin/01_about-us by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 May 2025 06:32:37 GMT -->
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
    <link rel="icon" type="image/png" href=".\assets\images\logo\01.png" />

    <!-- :: Title -->
    <title>
      Aluminium & Glass System Manufacturers and Suppliers in Dubai - GlazTech
    </title>

    <!-- :: Google Fonts -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&amp;family=Heebo:wght@400;500;600;700&amp;display=swap"
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
        
      <?php include 'navbar.php'; ?>
        
        <!-- :: Search Box -->
        <div class="search-box">
            <form>
                <input type="search" placeholder="Search Here....." required>
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
            <span class="search-box-icon exit"><i class="fas fa-times"></i></span>
        </div>
        
        <!-- :: Menu Box -->
        <div class="menu-box">
            <div class="inner-menu">
                <div class="website-info">
                    <a class='logo' href='index.html'><img class="img-fluid" src="assets/images/logo/02_logo.png" alt="02 Logo"></a>
                    <p>Gazolin Are A Industry &amp; Manufacturing Services Provider Institutions. Suitable For Factory, Manufacturing, Industry, Engineering, Construction And Any Related Industry Care Field.</p>
                </div>
                <div class="contact-info">
                    <h4>Contact Info</h4>
                    <div class="contact-box">
                        <i class="ar-icons-call"></i>
                        <div class="box">
                            <a class="phone" href="tel:01212843661">0121284 3661</a>
                            <a class="phone" href="tel:01029134630">0102913 4630</a>
                        </div>
                    </div>
                    <div class="contact-box">
                        <i class="ar-icons-email"></i>
                        <div class="box">
                            <a class="mail" href="mailto:support@Gazolin.com">Support@Gazolin.com</a>
                            <a class="mail" href="mailto:mailbox@ar-coder.com">MailBox@AR-Coder.com</a>
                        </div>
                    </div>
                    <div class="contact-box">
                        <i class="ar-icons-location"></i>
                        <div class="box">
                            <p>14D Street Brooklyn,</p>
                            <p>New York.</p>
                        </div>
                    </div>
                </div>
                <div class="follow-us">
                    <h4>Follow Us</h4>
                    <ul class="icon-follow">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
                <span class="menu-box-icon exit"><i class="fas fa-times"></i></span>
            </div>
        </div>
        
		<!-- :: Breadcrumb Header -->
        <section class="breadcrumb-header style-2" id="page" style="background-image: url(assets/images/header/01_header.jpg)">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="banner">
                            <h1>FAQs</h1>
                            <ul>
                                <li><a href='index.php'>Home</a></li>
                                <li><i class="fas fa-angle-right"></i></li>
                                <li>FAQs</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php
 include 'admin/inc/db.php';

// Fetch all FAQs from the database
$stmt = $pdo->query("SELECT * FROM faqs ORDER BY id ASC");
$faqs = $stmt->fetchAll();
?>

<div class="faqs-page py-100-70">
    <div class="container">
        <div class="row">
            <?php
            $columns = array_chunk($faqs, ceil(count($faqs) / 2)); // Split into 2 columns
            foreach ($columns as $colIndex => $column) {
                echo '<div class="col-lg-6"><div class="faq style-2">';
                foreach ($column as $index => $faq) {
                    $faqId = 'faq-' . ($colIndex * ceil(count($faqs) / 2) + $index + 1);
                    $isFirst = ($index === 0) ? 'show' : ''; // Show first in each column
                    ?>
                    <div class="faq-box">
                        <button class="btn btn-primary click" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $faqId; ?>" aria-expanded="<?php echo $isFirst ? 'true' : 'false'; ?>" aria-controls="<?php echo $faqId; ?>">
                            <?php echo htmlspecialchars($faq['question']); ?>
                            <i class="fas fa-angle-right"></i>
                        </button>
                        <div class="collapse <?php echo $isFirst; ?>" id="<?php echo $faqId; ?>">
                            <div class="card card-body about-text">
                                <?php echo nl2br(htmlspecialchars($faq['answer'])); ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                echo '</div></div>';
            }
            ?>
        </div>
    </div>
</div>

		<!-- :: FAQs -->
		<!-- <div class="faqs-page py-100-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="faq style-2">
							<div class="faq-box">
								<button class="btn btn-primary click" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-1" aria-expanded="false" aria-controls="faqs-1">How can i find a job ?<i class="fas fa-angle-right"></i>
								</button>
								<div class="collapse show" id="faqs-1">
									<div class="card card-body about-text">
										<b>Gazolin Are A Industry &amp; Manufacturing Services Provider Institutions. Suitable For Factory, Manufacturing, Industry, Engineering, Construction And Any Related Industry Care Field.</b>
									</div>
								</div>
							</div>
							<div class="faq-box">
								<button class="btn btn-primary click" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-2" aria-expanded="false" aria-controls="faqs-2">Where can i find out about problem ?<i class="fas fa-angle-right"></i>
								</button>
								<div class="collapse" id="faqs-2">
									<div class="card card-body about-text">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusm tmpor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat adipisicing elit, sed do eiusm tempor incididunt ut labore.
									</div>
								</div>
							</div>
							<div class="faq-box">
								<button class="btn btn-primary click" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-3" aria-expanded="false" aria-controls="faqs-3">How can use the product ?<i class="fas fa-angle-right"></i>
								</button>
								<div class="collapse" id="faqs-3">
									<div class="card card-body about-text">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusm tmpor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat adipisicing elit, sed do eiusm tempor incididunt ut labore.
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="faq style-2">
							<div class="faq-box">
								<button class="btn btn-primary click" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-4" aria-expanded="false" aria-controls="faqs-4">Where can i find out about problem ?<i class="fas fa-angle-right"></i>
								</button>
								<div class="collapse" id="faqs-4">
									<div class="card card-body about-text">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusm tmpor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat adipisicing elit, sed do eiusm tempor incididunt ut labore.
									</div>
								</div>
							</div>
							<div class="faq-box">
								<button class="btn btn-primary click" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-5" aria-expanded="false" aria-controls="faqs-5">How can i find a job ?<i class="fas fa-angle-right"></i>
								</button>
								<div class="collapse show" id="faqs-5">
									<div class="card card-body about-text">
										<b>Gazolin Are A Industry &amp; Manufacturing Services Provider Institutions. Suitable For Factory, Manufacturing, Industry, Engineering, Construction And Any Related Industry Care Field.</b>
									</div>
								</div>
							</div>
							<div class="faq-box">
								<button class="btn btn-primary click" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-6" aria-expanded="false" aria-controls="faqs-6">How can use the product ?<i class="fas fa-angle-right"></i>
								</button>
								<div class="collapse" id="faqs-6">
									<div class="card card-body about-text">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusm tmpor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat adipisicing elit, sed do eiusm tempor incididunt ut labore.
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->
		
        <!-- :: Footer -->
        
        <!-- :: Scroll UP -->
         <?php include 'footer.php'; ?>
        <div class="scroll-up">
            <a class="move-section" href="#page">
                <i class="fas fa-long-arrow-alt-up"></i>
            </a>
        </div>
        
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
        <script src="assets/js/main.js"></script><script src="assets/js/ajax-script.js"></script>
    </body>

<!-- Mirrored from gazolin.netlify.app/gazolin/01_faqs by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 May 2025 06:32:44 GMT -->
</html>