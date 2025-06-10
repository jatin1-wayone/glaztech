-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2025 at 06:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `glaztech`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `slug`, `category_image`, `created_at`, `meta_title`, `meta_description`, `meta_keywords`) VALUES
(20, 'Bi-Folding', 'bi-folding', 'uploads/category/1748081943_1 Airclos Folding Door (Restaurant Abu Dhabi).JPG', '2025-05-23 16:23:17', 'meeta Bi-Folding', 'Bi-Folding Meta Description', 'Bi-Folding  Meta Description'),
(21, 'Retractable Roof', 'retractable-roof', '', '2025-05-23 16:24:36', 'Retractable Roof Meta Title', 'Retractable Roof Meta Description', 'Retractable Roof Meta Keywords'),
(22, 'Automatic Entrance Systems', 'automatic-entrance-systems', '', '2025-05-23 16:29:54', 'Automatic Entrance Systems  Meta Title', 'Automatic Entrance Systems Meta Description', 'Automatic Entrance Systems Meta Keywords'),
(23, 'Vertical Sliding / Folding System', 'vertical-sliding-folding-system', '', '2025-05-23 16:31:19', 'Vertical Sliding / Folding System Meta Title', 'Vertical Sliding / Folding System Meta Description', 'Vertical Sliding / Folding System meeta keywrds'),
(24, 'Frameless  Bi-folding & Sliding Systems', 'frameless-bi-folding-sliding-systems', '', '2025-05-23 16:32:06', 'Frameless  Bi-folding & Sliding Systems Meta Title', 'Frameless  Bi-folding & Sliding Systems Meta Description', 'Frameless  Bi-folding & Sliding Systems Meta Keywords'),
(25, 'Demountable Glass Partitioins', 'demountable-glass-partitioins', '', '2025-05-23 16:32:54', 'Demountable Glass Partitioins Meta Title', 'Demountable Glass Partitioins Meta Description', 'Demountable Glass Partitioins Meta Keywords'),
(26, 'Shower Enclosures', 'shower-enclosures', '', '2025-05-23 16:33:29', 'Shower Enclosures Meta Title', 'Shower Enclosures Meta Description', 'Shower Enclosures Meta Keywords'),
(29, 'Minimalist Window Solutions', 'minimalist-window-solutions', '', '2025-05-23 16:56:59', 'Minimalist Window Solutions  Meta Title', 'Minimalist Window Solutions Meta Description', 'Minimalist Window Solutions Meta Keywords'),
(30, 'Smoke extraction systems', 'smoke-extraction-systems', '', '2025-05-23 17:00:52', 'Smoke extraction systems Meta Description', 'Smoke extraction systems Meta Description', 'Smoke extraction systems Meta Keywords'),
(31, 'Movable Walls & Partitions', 'movable-walls-partitions', '', '2025-05-23 17:02:36', 'Movable Walls & Partitions Meta Title', 'Movable Walls & Partitions Meta Description', 'Movable Walls & Partitions Meta Keywords');

-- --------------------------------------------------------

--
-- Table structure for table `contact_queries`
--

CREATE TABLE `contact_queries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(150) DEFAULT NULL,
  `sms` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(8, 'How can I request a quote for a project?', 'To request a quote, simply visit our Contact Us page, fill out the form with your project details, and our team will get back to you with a personalized estimate.', '2025-05-21 18:33:37', '2025-05-21 18:33:37'),
(9, 'What industries do you serve?', 'We cater to a variety of industries, including manufacturing, engineering, construction, automotive, and energy. Our solutions are tailored to meet the specific needs of each sector.', '2025-05-21 18:33:53', '2025-05-21 18:33:53'),
(10, 'What makes Glaztech different from other service providers?', 'Glaztech stands out for its 45 years of experience, expert team, and use of unique technology to deliver high-quality, sustainable, and innovative solutions that drive industry progress.', '2025-05-21 18:34:12', '2025-05-21 18:34:12'),
(11, 'Why Glaztech?', 'Because  We turn tour vision into reality with expertise ,precision,and purpose.What  truly sets us apart is our collaborative model.', '2025-05-21 18:34:28', '2025-06-09 18:03:36');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_blog`
--

CREATE TABLE `gallery_blog` (
  `id` int(11) NOT NULL,
  `current_project_image` varchar(255) NOT NULL,
  `current_project_name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `short_description` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery_blog`
--

INSERT INTO `gallery_blog` (`id`, `current_project_image`, `current_project_name`, `image`, `created_at`, `short_description`, `description`) VALUES
(18, 'uploads/current/1747831951_automatic-entrance-doors-in-dubai-2.jpg', 'home', 'uploads/images/1747831951_automatic-entrance-doors-in-dubai-2.jpg', '2025-05-21 12:52:31', 'Redefining Excellence in Aluminium & Glass Systems', 'Welcome to Glaztech — the Middle East’s trusted name in premium fabrication solutions. From advanced door technologies to cutting-edge security and automatic entrance systems, we deliver innovation, durability, and world-class craftsmanship, all under one roof.');

-- --------------------------------------------------------

--
-- Table structure for table `headerproducts`
--

CREATE TABLE `headerproducts` (
  `id` int(11) NOT NULL,
  `category_id` int(211) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_slug` varchar(255) NOT NULL,
  `product_description` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `headerproducts`
--

INSERT INTO `headerproducts` (`id`, `category_id`, `product_name`, `product_slug`, `product_description`, `short_description`, `product_image`) VALUES
(12, 29, '54 HR Sliding System (with Hidden Sill)', '54-hr-sliding-system-with-hidden-sill', '<p>54 HR Sliding System with Hidden Sill is the perfect window and door solution for contemporary spaces demanding sleek, flush-floor designs without compromising on performance. The standout feature of this system is its concealed bottom sill, which creates a seamless transition between indoor and outdoor flooring, ideal for barrier-free living and accessible design.This system incorporates advanced thermal break technology, significantly reducing heat transfer through the aluminum frame. As a result, it provides excellent thermal insulation, helping maintain comfortable interior temperatures year-round while optimizing energy efficiency.The 54 HR system accommodates large glass panels, maximizing natural light and visibility while maintaining structural strength and durability. High-quality sealing ensures superior air and water tightness, protecting interiors from drafts and moisture even in adverse weather conditions.With smooth-glide hardware, this system offers effortless operation. It supports double and triple glazing, providing enhanced acoustic and thermal insulation. The slimline profiles maintain a minimalist aesthetic, perfect for modern homes, offices, and commercial spaces looking for a clean, uninterrupted visual flow.Customization options include a variety of finishes, colors, and glass types, allowing architects and homeowners to tailor the system to their unique style and functional needs.In summary, the 54 HR Sliding System with Hidden Sill blends innovative design, energy efficiency, and usability, making it an excellent choice for those seeking premium minimalist sliding solutions.</p>\r\n', 'Concealed bottom sill for smooth, uninterrupted floor transition\r\nThermal break technology for superior insulation\r\nSupports large glass panels with slim profiles\r\nEnhanced weather resistance with advanced sealing\r\nElegant design for modern architecture\r\n', '1747976724_automatic-entrance-doors-in-dubai-1.jpg'),
(14, 29, '54 C Sliding System', '54-c-sliding-system', '<p>The 54 C Sliding System is a robust and elegant solution for modern architectural needs, offering a blend of minimal aesthetics and high functionality. With its refined frame and slim central mullion, it maximizes glass surface area, delivering an open, light-filled environment.This system is designed for large-format glazing while maintaining excellent thermal and acoustic insulation. The high-quality sliding mechanism ensures smooth movement, even with heavy or oversized glass panels. Whether you&#39;re building a luxury home or designing a modern commercial space, this system provides both form and function.The 54 C supports both double and triple glazed units, ensuring the flexibility to meet energy efficiency goals. Its performance in harsh weather conditions is solid, with strong air and water sealing features. These qualities make it suitable for both interior and exterior installations, especially in high-end residential and hospitality projects.A range of custom finishes is available, allowing architects and designers to match the frames smoothly with any project&rsquo;s aesthetic. Whether you want something neutral, bold, or natural-looking, this system has options for every style.Overall, the 54 C Sliding System offers a reliable and sophisticated solution for those looking to maximize views, control climate, and maintain a minimalistic design language.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Slim central mullion for wider visibility\r\nHigh-performance sliding technology\r\nDouble and triple glazing compatibility\r\nThermal and acoustic insulation properties\r\nClean, minimal design for modern spaces\r\n', '1747977125_bi-folding-automatic-doors-in-dubai-2.jpg'),
(17, 22, '36 C Minimal Sliding System', '36-c-minimal-sliding-system', '<p>36 C Minimal Sliding System is designed for spaces that demand sleek aesthetics and high-performance window functionality. With ultra-slim frames, this system enhances visibility and allows maximum natural light to flow indoors while maintaining excellent energy efficiency.This sliding system supports large glass panels with minimal aluminum framing, creating a nearly invisible barrier between interior and exterior spaces. It provides architects and homeowners a clean, modern look without compromising thermal or acoustic insulation.Engineered with high-grade materials, the 36 C system ensures smooth sliding even for heavier panels. Its rollers and rail system reduce friction, enabling effortless operation and long-lasting reliability. Available with both double and triple glazing, it performs well in all weather conditions.Perfect for minimalist architecture, modern villas, and luxury apartments, the 36 C Minimal Sliding System is where design meets advanced functionality.</p>\r\n', 'Slim sightlines for unobstructed views\r\nHigh thermal and acoustic insulation\r\nTop-notch sliding performance with smooth glide\r\nCustomizable panel sizes and frame finishes\r\nCompatible with double or triple glazing\r\n', '1747993648_automatic-entrance-doors-in-dubai-2.jpg'),
(18, 20, 'Bi-fold doors with thermal break', 'bi-fold-doors-with-thermal-break', '<p>Bi-Fold Doors with Thermal Break are specifically engineered to deliver top-tier thermal insulation without compromising on modern aesthetics. The integrated thermal break system acts as a powerful barrier against external temperature fluctuations, ensuring comfortable indoor environments throughout the year.Designed using premium-grade aluminum with internal thermal barriers, these doors are ideal for regions with extreme weather conditions. The triple-seal system around each panel enhances protection against wind, rain, and air leakage, making them a smart solution for both residential and commercial applications focused on energy savings.One of the key strengths of this product is its structural adaptability. Each door panel can go up to 3 meters high and 1 meter wide, with reinforcement options for larger spans. Whether you&rsquo;re working with wide patios, full-glass walls, or commercial storefronts, these doors offer excellent performance and a minimal design profile.Glazing flexibility further enhances insulation &mdash; with support for both double and triple glazing options depending on the thermal requirements. Despite the performance features, the door maintains a clean, sleek look that fits modern and minimalist building styles.Custom finishes, smooth-glide hardware, and reliable multi-point locking systems add to both the usability and the security of the system. Whether opening inward or outward, the folding panels stack neatly to save space and offer seamless transitions.In short, Bi-Fold Doors with Thermal Break provide a high-performance, energy-efficient solution for anyone wanting long-lasting durability and premium insulation wrapped in a contemporary design.</p>\r\n', 'Integrated thermal break technology\r\nTriple-seal weather protection\r\nHigh energy efficiency performance\r\nSturdy and reinforced aluminum frames\r\nFlexible panel size and configuration options\r\n', '1748077541_automatic-entrance-doors-in-dubai-2.jpg'),
(19, 29, 'Minimalist bifold doors', 'minimalist-bifold-doors', '<p>Minimalist Bifold Doors are the perfect blend of design and function. With ultra slim vertical profiles, these doors allow for large glass panels that maximise visibility and natural light. Their sleek design creates an unobstructed view, perfect for spaces were openness and aesthetics matter most.Built with high grade aluminum, these doors are lightweight and strong, with excellent corrosion and weather resistance. Whether you&rsquo;re designing a luxury home, modern office or commercial facade, this system adapts seamlessly.The system allows for various opening configurations, stacking options and double and triple glazing to improve insulation. It&rsquo;s thermal and acoustic performance ensures energy efficiency and comfort all year round. You get a sleek look without compromising on function.Customisation is another plus. From colour options and anodised finishes to wood look aesthetics, Minimalist Bifold Doors can be tailored to your architectural design. Threshold types, panel widths and integrated mid rails further enhance design flexibility.These doors are perfect for locations where indoor outdoor flow is key &ndash; patios, balconies, conference rooms and showrooms. The folding mechanism allows for space saving operation, the slimline look adds a luxurious touch to any building.In summary, Minimalist Bifold Doors is a modern architectural solution that prioritises clean lines, energy efficiency and structural integrity. For those who want high performance doors with a minimalist look.</p>\r\n', 'Ultra-slim vertical profiles\r\nSmooth indoor-outdoor integration\r\nHigh thermal and acoustic insulation\r\nPremium aluminum build quality\r\nMultiple customization options\r\n', '1748085173_2 Airclos Folding Door (Villa - UAE).JPG'),
(20, 20, 'Pivot Doors', 'pivot-doors', '<p>Pivot Doors offer a striking alternative to traditional hinged doors, combining style, functionality, and modern engineering. Unlike conventional doors that swing on side hinges, pivot doors rotate on a central or offset pivot mechanism, allowing for larger, heavier panels and a distinctive opening experience.These doors are designed to enhance both residential and commercial spaces with their clean lines and impressive presence. Their minimalist frame profiles maximize glass visibility, creating an elegant blend of transparency and architectural form.Thermal and acoustic insulation are key features of these doors. Engineered with quality materials and optional thermal breaks, pivot doors maintain energy efficiency while providing excellent soundproofing. This makes them suitable for exterior applications where both comfort and aesthetics are priorities.The pivot mechanism enables smooth, effortless operation even with oversized panels, making these doors ideal for grand entrances, showrooms, galleries, or modern homes seeking a contemporary edge. Customizable finishes and hardware options allow you to tailor the doors to match any design style or functional requirement.Overall, Pivot Doors combine innovative design, robust construction, and elegant aesthetics to deliver a premium entrance solution that stands out in any architectural project.</p>\r\n', 'Unique pivot hinge mechanism for smooth rotation\r\nLarge-format glass and panel options\r\nSlim frame design with minimalist aesthetics\r\nHigh thermal and acoustic insulation\r\nCustomizable finishes and hardware\r\n', '1748608232_20-milimetros-pivotante.jpg'),
(21, 21, 'Retractable & Fixed Roof system', 'retractable-fixed-roof-system', '<p>The motorized operation system provides effortless control at the push of a button or via remote control, enabling smooth and silent movement of the roof panels. This feature is ideal for residential patios, restaurants, pool areas, or any space where adjustable coverage is desired.In addition to functional flexibility, retractable roofs are designed to deliver excellent thermal insulation and UV protection, helping to maintain energy efficiency while protecting furnishings and occupants from harsh sunlight.Available in various sizes and configurations, these roofs can be customized to seamlessly integrate with any building design, elevating the architectural appeal while maximizing functionality.</p>\r\n', 'Fully retractable roof panels for flexible open-air experience\r\nWeather-resistant and durable aluminum frame\r\nSmooth motorized operation with remote control\r\nHigh-performance glazing options for insulation and UV protection\r\nCustomizable sizes to fit any architectural design\r\n', '1748609640_Airclos-restractable-roofs-Home-6-1280x647.jpg.webp'),
(22, 21, 'Fixed Glass Roof', 'fixed-glass-roof', '<p>Fixed Glass Roofs provide an elegant solution for flooding interiors with natural light while offering protection from the elements. These roofs are perfect for atriums, conservatories, or any space that benefits from enhanced daylighting.Engineered using premium glass panels supported by discreet framing systems, fixed glass roofs maximize transparency and create an open, airy atmosphere. The use of double or triple glazing ensures superior thermal insulation, reducing heat loss in colder climates and minimizing heat gain in warmer areas.These systems are designed for durability and weather resistance, ensuring long-term performance with minimal maintenance. They can be customized in various shapes, sizes, and finishes to perfectly match the architectural style and functional requirements of any building.By bringing in abundant natural light, fixed glass roofs reduce reliance on artificial lighting, contributing to energy savings and creating healthier, more inviting interior environments.In summary, Fixed Glass Roofs are a smart, stylish, and sustainable choice for architects and homeowners looking to enhance space, light, and comfort without compromising on design.</p>\r\n', 'Sleek, frameless glass design for maximum natural light\r\nDurable, weatherproof materials for long-lasting performance\r\nHigh thermal insulation with double or triple glazing\r\nCustom shapes and sizes to fit diverse architectural needs\r\nLow maintenance and easy cleaning\r\n', '1748609955_20-milimetros-pivotante.jpg'),
(24, 30, 'Chain Drive', 'chain-drive', '<p>Chain Drive systems are essential components in smoke extraction setups, offering reliable and powerful operation for opening large vents during emergencies. Designed to handle heavy panels, the chain drive mechanism ensures smooth and consistent movement even under demanding conditions.Constructed with corrosion-resistant materials, these systems provide long-lasting durability in various environmental conditions. Their robust build makes them ideal for commercial and industrial applications where reliable smoke extraction is critical.Integration with modern building automation systems allows seamless activation triggered by fire alarms or manual control, enhancing safety and compliance. The low maintenance design further supports operational efficiency, ensuring that Chain Drive systems remain functional and dependable when needed the most.</p>\r\n', 'Strong and reliable chain mechanism\r\nSuitable for heavy-duty smoke extraction vents\r\nCorrosion-resistant materials for durability\r\nSmooth, consistent operation\r\nEasy integration with building automation\r\n', '1748665256_aluminium-and-glass-system-manufacturers-and-suppliers-in-dubai-2.webp'),
(25, 30, 'Spindle Drive', 'spindle-drive', '<p>Spindle Drive systems offer a compact and effective solution for smoke extraction in buildings with smaller or medium-sized vents. The spindle mechanism provides smooth and quiet operation, reducing noise disruption during activation.These drives are easy to install and maintain, making them practical for various architectural designs. Their compatibility with different window and vent types adds versatility to their application.Energy efficiency and reliable performance make Spindle Drive systems suitable for commercial, residential, and public buildings where safety and functionality are priorities.</p>\r\n', 'Compact and efficient spindle mechanism\r\nIdeal for smaller or medium-sized smoke vents\r\nQuiet and smooth operation\r\nEasy installation and maintenance\r\nCompatible with multiple vent types\r\n', '1748665357_15_projects.jpg'),
(26, 30, 'RWA Control Panel Systems', 'rwa-control-panel-systems', '<p>RWA Control Panel Systems are the central units that manage smoke extraction operations across multiple devices within a building. Featuring an intuitive interface, these panels allow users to switch between manual and automatic control modes easily.</p>\r\n\r\n<p>They integrate seamlessly with fire alarm systems and building management, ensuring prompt activation during emergencies. Reliable power backup systems ensure continued operation even during power outages.</p>\r\n\r\n<p>Customizable programming options allow buildings to implement tailored safety protocols, ensuring compliance with regulations and enhancing occupant safety. These control panels are critical for maintaining effective smoke extraction and overall fire safety.</p>\r\n', 'Centralized control of smoke extraction devices\r\nUser-friendly interface with automatic and manual modes\r\nIntegration with fire alarm and building management systems\r\nReliable emergency power backup\r\nCustomizable safety settings\r\n', '1748665404_P20220087 House PG _ RCN Minimalist Windows (46).jpg'),
(27, 22, 'Automatic Sliding Doors', 'automatic-sliding-doors', '<p>Automatic Sliding Doors are a modern solution for high-traffic environments where speed, hygiene, and accessibility are crucial. Operated through motion or presence sensors, these doors provide smooth, touchless entry&mdash;making them an ideal fit for hospitals, commercial buildings, airports, and hotels.Engineered with precision, these doors feature a powerful yet quiet motor system that enables quick and efficient opening and closing. This reduces energy loss while enhancing traffic flow and comfort. Thanks to their linear motion and slim profile, automatic sliding doors require minimal space&mdash;making them an excellent choice for areas where conventional doors are impractical.The doors are compatible with single or double panel setups and offer customization in frame colors, glass type, and finishes to align with any architectural design. Advanced obstacle detection ensures user safety, automatically reversing motion if movement is detected in the doorway. Battery backup and manual override systems offer reliable functionality even during power failures.Built to comply with global safety and accessibility standards, these doors reduce touchpoints, lower contamination risks, and provide seamless transitions between zones. Whether it&rsquo;s a cleanroom environment, a luxury commercial lobby, or a transit terminal, Automatic Sliding Doors ensure durability, performance, and sleek aesthetics.</p>\r\n', 'Touchless access with sensor-based operation\r\nSpace-efficient design perfect for narrow entrances\r\nHigh-speed, low-noise motor system\r\nAdvanced safety with obstacle detection\r\nCustom finishes for glass or framed configurations\r\n', '1748665500_automatic-entrance-doors-in-dubai-1.jpg'),
(28, 22, 'Automatic Revolving Doors', 'automatic-revolving-doors', '<p>Automatic Revolving Doors are the epitome of elegance and efficiency, designed to serve as both a functional and architectural focal point in commercial spaces. These doors provide uninterrupted pedestrian flow while reducing air exchange between indoor and outdoor environments&mdash;resulting in improved energy savings and climate control.</p>\r\n\r\n<p>Unlike standard sliding or swing doors, revolving doors operate continuously, allowing multiple users to enter or exit simultaneously without disruption. This makes them especially useful in places like hotels, airports, shopping centers, and corporate headquarters where first impressions and operational efficiency matter.</p>\r\n\r\n<p>Built with advanced motion sensors and safety bumpers, these systems ensure user safety by adjusting rotation speed and stopping immediately in case of obstructions. Emergency breakaway options allow the doors to open flat, providing full clearance during fire alarms or evacuations.</p>\r\n\r\n<p>Customization is a key feature&mdash;revolving doors come in various diameters, finishes, and glazing options. Whether your design language is futuristic or classic, these doors can be tailored to match the architecture while meeting high standards of thermal insulation and durability.</p>\r\n\r\n<p>With their prestigious look and performance-focused engineering, Automatic Revolving Doors enhance entrances both functionally and aesthetically, offering a welcoming yet secure entry point.</p>', NULL, '1748665568_Teleskopschiebetür-econoMaster-EMT-und-EMT-F.jpg'),
(29, 23, 'Vertical Sliding/ Folding System', 'vertical-sliding-folding-system', '<p>Vertical Sliding Windows are a sophisticated and space-saving solution for modern architectural needs. These windows operate by moving the glass panels vertically&mdash;offering a smart alternative to traditional sliding or casement windows, especially in areas where horizontal movement is limited.Designed with high-quality aluminum profiles and customizable glass options, these windows are ideal for use in residential balconies, commercial counters, caf&eacute; pass-throughs, and fa&ccedil;ade integrations. Whether operated manually or through an integrated motorized system, the vertical sliding motion is smooth, silent, and safe, thanks to precision engineering and safety features.Their compact design allows for full window openings without occupying internal or external floor space, which is especially useful in tight layouts or multifunctional environments. The system supports double glazing to ensure strong thermal insulation and excellent soundproofing, contributing to energy efficiency and interior comfort.Frameless or slim-framed designs maintain a clean, modern look that enhances any space&rsquo;s aesthetics. Safety systems like anti-pinch sensors, locking positions, and overload protection further add to the system&rsquo;s usability and security.From hospitality to high-end homes, Vertical Sliding Windows offer a dynamic combination of space-efficiency, visibility, and smart design. They are a great choice for designers and architects looking to create open and connected environments without sacrificing insulation or performance.</p>\r\n', '', '1748665627_CM.png'),
(30, 23, 'Vertical Bi-Folding System', 'vertical-bi-folding-system', '<p>The Vertical Bi-Folding System is an innovative solution that redefines flexibility in architectural design. Unlike traditional horizontal folding doors, this system stacks glass panels vertically&mdash;either at the top or bottom&mdash;allowing for a complete opening without horizontal tracks or swinging space.Operated via a fully automated mechanism, this system is ideal for locations such as restaurants, caf&eacute;s, terraces, showrooms, or luxury residential spaces where uninterrupted openness and clear views are essential. The motorized folding action is seamless and safe, supported by robust engineering and certified safety features.Its slim, aluminum frame and large-format glass panels allow maximum daylight to enter, creating bright and open interiors. Available in single-panel or multi-panel configurations, the system can be adapted to fit both small counter openings and full-height glass fa&ccedil;ades. Custom finishes, tinting, and coating options make it easy to align the system with the overall architectural theme.The glass panels fold neatly into a stacked vertical position, freeing up space and maintaining unobstructed sightlines. The system also ensures high thermal insulation and acoustic control, making it both beautiful and functional.The Vertical Bi-Folding System is the perfect balance between elegance and innovation&mdash;delivering aesthetic appeal, operational ease, and architectural freedom in one dynamic product.</p>\r\n', '', '1748665678_mobile-acoustic-walls-partition-automatic-in-dubai-2.jpg'),
(31, 24, 'Frameless Bi-Folding Doors & Sliding Systems', 'frameless-bi-folding-doors-sliding-systems', '<p>The Frameless Bi-Folding System offers a perfect blend of transparency and flexibility. With no visible aluminum frames around the glass panels, this system delivers a clean, uninterrupted view&mdash;perfect for modern spaces where openness and aesthetics go hand in hand.Unlike traditional framed doors, this system uses toughened glass panels that fold neatly to the side, creating a wide, barrier-free opening. It&rsquo;s ideal for both commercial and residential applications&mdash;such as patios, balconies, restaurants, showrooms, and office partitions&mdash;where maximum visibility and space flexibility are required.Engineered for ease of use, the folding mechanism is smooth and silent. Depending on site needs, the system can be configured with top-hung or bottom-rolling tracks&mdash;or even fully trackless for interior partitions. The panels glide and fold effortlessly, stacking compactly on one or both sides, offering total spatial flexibility.Safety features like locking mechanisms, guide pins, and optional laminated glass ensure secure operation even in high-traffic areas. Frameless Bi-Folding Systems are available in a variety of glass types, tints, and edge finishes, and can be tailored to match any interior or exterior theme.Whether for luxury villas or premium hospitality venues, this system is a sophisticated, space-optimizing solution that enhances visual openness while maintaining structural performance.</p>\r\n', 'Frameless glass panels for uninterrupted views\r\nSmooth folding mechanism with compact stacking\r\nIdeal for indoor and outdoor transitions\r\nFloor track or trackless options available\r\nCustomizable panel count and opening direction\r\n', '1748665830_image-002 (1).jpg'),
(32, 31, 'Movable Walls & Partitions', 'movable-walls-partitions', '<p>Movable Wall Systems provide a flexible and functional solution for dividing large interior spaces without permanent construction. Designed for versatility, these systems consist of individual floor-to-ceiling panels that can be moved and locked into place to create temporary rooms, meeting areas, or privacy zones.</p>\r\n\r\n<p>Ideal for conference halls, offices, hotels, schools, and multipurpose venues, movable walls allow spaces to adapt quickly to changing needs. Whether it&#39;s converting a large hall into smaller seminar rooms or opening up space for a large gathering, this system gives you architectural control without permanent changes.</p>\r\n\r\n<p>The panels are available in a wide range of finishes&mdash;from fabric, veneer, and laminate to writable surfaces&mdash;offering both functional and aesthetic value. Internal sound insulation enhances acoustic privacy, making these systems perfect for professional and educational environments.</p>\r\n\r\n<p>With optional semi-automatic systems, panel alignment and sealing are done effortlessly with the push of a button. Even in manual models, the suspension system ensures smooth, quiet, and user-friendly movement. Tracks can be ceiling-mounted and concealed to maintain visual consistency across the room.</p>\r\n\r\n<p>Movable Wall Systems combine engineering precision with architectural flexibility, offering a smart and stylish solution for dynamic interior layouts.</p>', NULL, '1748665883_bi-folding-doors-in-dubai-4.webp'),
(33, 31, 'Foldable Wall Systems', 'foldable-wall-systems', '<p>Foldable Wall Systems are a practical and space-saving solution for dynamically changing environments. Built with a series of hinged panels that fold along a single line, these systems are ideal for locations where space flexibility is frequently needed but full automation is unnecessary.</p>\r\n\r\n<p>These walls are manually operable and fold to one or both sides when not in use. When extended, they create an effective visual and acoustic barrier, allowing the same space to serve multiple functions throughout the day. Perfect for schools, training centers, religious institutions, and hospitality spaces, these systems allow for fast room conversions.</p>\r\n\r\n<p>The core structure is made of lightweight yet durable materials, supported by aluminum or steel frames for rigidity. Integrated seals and sound-insulating cores reduce noise transmission, ensuring privacy even in active environments.</p>\r\n\r\n<p>Foldable Wall Systems are available in various finishes, including whiteboard surfaces, fabric, wood laminate, and custom colors, making them both functional and decorative. The folding mechanism is engineered for easy handling and long-term performance, even with daily use.</p>\r\n\r\n<p>By enabling efficient space division without compromising on usability or design, Foldable Wall Systems are a reliable and cost-effective solution for multi-use interiors.</p>\r\n', 'Hinged panel design for quick setup and retraction\r\nCompact stacking saves space when open\r\nAcoustic insulation between panels\r\nLightweight structure with strong aluminum frame\r\nIdeal for classrooms, conference areas, and studios\r\n', '1748665935_P20232024 CR House _ Finish _Windows-094.jpg'),
(35, 25, 'Office Glass Partitions', 'office-glass-partitions', '<p>Office Glass Partitions is a kind of modern workspace solution designed to optimize your layout, light, and productivity. These partitions offer you the perfect balance between openness and privacy, allowing organizations to divide spaces without compromising on visual connection or interior light flow.Made with high-quality toughened or laminated glass, these partitions come across &nbsp;to you in a variety of styles including frameless, semi-framed, and fully framed configurations. Whether you&#39;re designing executive cabins, conference rooms, collaborative zones, or breakout spaces, their glass partitions adds a special clean, contemporary feel in your &nbsp;workspace.One of their key advantages is flexibility. These systems are demountable, meaning they can be installed, reconfigured, or relocated with minimal disruption&mdash;ideal for dynamic office environments or growing teams. The modular design allows easy integration of sliding doors, swing doors, and even automatic access systems depending on your layout needs.To meet acoustic requirements, these partitions can include double-glazing or sound-rated glass options to reduce noise transmission between rooms, ensuring privacy during meetings or focused work. For visual privacy, options like integrated blinds, acid-etched frosting, gradient films, or even smart switchable glass allow users to customize visibility on demand.Glass partitions are also compatible with MEP (mechanical, electrical, plumbing) installations and can feature cable management systems, integrated blinds, or branding elements through glass decals or digital printing.Their timeless design, minimal maintenance, and ability to foster a collaborative atmosphere make Office Glass Partitions a top choice for architects and business owners seeking agility, transparency, and elegance in modern office interiors.</p>\r\n', 'Frameless and framed options for modern aesthetics\r\nQuick installation and easy relocation\r\nEnhances transparency while maintaining privacy\r\nSupports acoustic insulation for noise control\r\nCustomizable with blinds, frosting, or switchable glass\r\n', '1748666023_image-000 (1).jpg'),
(36, 25, 'Shower Enclosures', 'shower-enclosures', '<p>Shower Enclosures are the common element in any modern bathroom that emphasizing with practicality, comfortability and aesthetically. The shower enclosures are designed that have to contained water within a confined area, encouraging hygiene while transforming your bathroom into a luxurious, spa-like environment.Shower enclosures are available in frameless, semi-frameless, and fully framed options, featuring high-quality tempered safety glass that delivers a sleek minimalist look while ensuring durability. Their sleek appearance makes them ideal for all styles of bathroom decor&mdash;spanning from compact urban apartments to expansive master baths in villas or resorts.<br />\r\nOne of the main key benefits of shower enclosures is their effectiveness that is holding water. Quality seals and precise fittings guarantee that water remains contained within the enclosure, you have to keep your bathroom floor dry and safe. Optional features are like magnetic door strips, bottom seals, and threshold bars further improve water-tight performance.<br />\r\nThese systems offer you an extensive customization, featuring choices in door types (sliding, pivot, hinged), glass finishes (clear, frosted, tinted), and hardware colors (chrome, matte black, brushed gold, and more). To ensures low upkeep, many glass choices feature an anti-limescale or nano-coating that drives away water and stops soap scum accumulation&mdash;maintaining a spotless shower with minimal effort.<br />\r\nShower enclosures boost bathroom cleanliness and elevate your property&#39;s value by adding to its contemporary charm. Their comfortable design, user-friendliness, and elegant finish render them a preferred option for homeowners, architects, and interior designers as well.<br />\r\nWhether you&rsquo;re planning to remodelling or creating a bathroom anew, Shower Enclosures provide an ideal combination of aesthetics and utility&mdash;delivering seclusion, elegance, and enduring durability.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Frameless and semi-frameless options for a premium look\r\nToughened safety glass ensures durability and protection\r\nWater-tight sealing to prevent leakage\r\nCustomizable sizes, finishes, and hardware\r\nEasy-to-clean surfaces with anti-limescale coating\r\n', '1748666077_bi-folding-doors-in-dubai-6.webp'),
(39, 31, 'Movable Glass Walls', 'movable-glass-walls', '<p>Movable Glass Walls are an architectural solution that brings openness, flexibility, and style to any interior space. These systems use individual glass panels that slide, fold, or stack to create dynamic layouts while maintaining visual transparency and natural light flow.Ideal for offices, showrooms, retail environments, and hospitality settings. movable glass walls help create multifunctional spaces that feel open yet segmented. Frameless or ultra-slim profiles keep the focus on the design of the space itself while allowing for seamless integration into modern interiors.These systems can be configured to slide in tracks, fold accordion-style, or stack completely out of the way depending on the application. Options for soft-closing hardware and auto-locking features ensure safe and smooth operation.Glass types range from clear, low-iron panels to frosted, tinted, and digitally printed designs. For privacy, smart glass technology can also be integrated to switch between transparent and opaque at the touch of a button.used for meeting rooms, indoor-outdoor transitions, or as stylish partitions, Movable Glass Walls add a premium look while enhancing the usability of the environment. They&rsquo;re a perfect fusion of aesthetics and practicality for spaces that need to remain adaptable without losing their elegance.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Full-height glass panels for open, modern interiors\r\nFrameless or slim-frame designs\r\nSliding, stacking, or pivoting configurations\r\nCustomizable with frosted, tinted, or printed glass\r\nEnhances natural light while offering flexibility\r\n', '1748842537_automatic-entrance-doors-in-dubai-4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `project_name`, `image`, `created_at`, `updated_at`) VALUES
(26, '01', 'projects/1747830894_01.jpeg', '2025-05-21 12:34:54', '2025-06-03 08:00:56'),
(27, '02', 'projects/1747830904_02.webp', '2025-05-21 12:35:04', '2025-05-21 12:35:04'),
(28, '03', 'projects/1747830913_03.jpeg', '2025-05-21 12:35:13', '2025-05-21 12:35:13'),
(29, '04', 'projects/1747830923_04.jpg', '2025-05-21 12:35:23', '2025-05-21 12:35:23'),
(30, '05', 'projects/1747830934_06.jpeg', '2025-05-21 12:35:34', '2025-05-21 12:35:34'),
(31, '07', 'projects/1747830946_07.jpg', '2025-05-21 12:35:46', '2025-05-21 12:35:46'),
(32, '08', 'projects/1747830958_09.jpeg', '2025-05-21 12:35:58', '2025-05-21 12:35:58'),
(33, '09', 'projects/1747830970_09.jpeg', '2025-05-21 12:36:10', '2025-05-21 12:36:10'),
(34, '10', 'projects/1747830987_10.jpg', '2025-05-21 12:36:27', '2025-05-21 12:36:27'),
(35, '11', 'projects/1747830998_11.jpg', '2025-05-21 12:36:38', '2025-05-21 12:36:38'),
(36, '12', 'projects/1747831007_12.jpeg', '2025-05-21 12:36:47', '2025-05-21 12:36:47'),
(37, '13', 'projects/1747831016_14.jpg', '2025-05-21 12:36:56', '2025-05-21 12:36:56'),
(38, '15', 'projects/1747831025_15.jpeg', '2025-05-21 12:37:05', '2025-05-21 12:37:05'),
(39, '16', 'projects/1747831038_16.jpg', '2025-05-21 12:37:18', '2025-05-21 12:37:18'),
(40, '17', 'projects/1747831047_17.jpg', '2025-05-21 12:37:27', '2025-05-21 12:37:27'),
(41, '18', 'projects/1747831060_18.jpeg', '2025-05-21 12:37:40', '2025-05-21 12:37:40'),
(42, '19', 'projects/1747831069_19.jpeg', '2025-05-21 12:37:49', '2025-05-21 12:37:49'),
(43, '20', 'projects/1747831078_20.jpg', '2025-05-21 12:37:58', '2025-05-21 12:37:58'),
(44, '21', 'projects/1747831088_21.jpeg', '2025-05-21 12:38:08', '2025-05-21 12:38:08'),
(45, '22', 'projects/1747831097_22.jpg', '2025-05-21 12:38:17', '2025-05-21 12:38:17'),
(46, '23', 'projects/1747831107_23.jpg', '2025-05-21 12:38:27', '2025-05-21 12:38:27'),
(47, '24', 'projects/1747831115_24.jpg', '2025-05-21 12:38:35', '2025-05-21 12:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_path`, `created_at`) VALUES
(1, 17, '1748076703_automatic-entrance-doors-in-dubai-1.jpg', '2025-05-24 08:51:43'),
(2, 17, '1748076703_automatic-entrance-doors-in-dubai-2.jpg', '2025-05-24 08:51:43'),
(3, 17, '1748076703_automatic-entrance-doors-in-dubai-3.jpg', '2025-05-24 08:51:43'),
(4, 18, '1748077541_automatic-entrance-doors-in-dubai-6.jpg', '2025-05-24 09:05:41'),
(5, 19, '1748085173_2 Airclos Folding Door (Villa - UAE).JPG', '2025-05-24 11:12:53'),
(6, 19, '1748085173_1 Airclos Folding Door (Villa - UAE).JPG', '2025-05-24 11:12:53'),
(7, 20, '1748608232_IMG-20180112-WA0008-002.jpg', '2025-05-30 12:30:32'),
(8, 21, '1748609640_AIRCLOS-T6000-Retractable-roof-E20-Sliding-glass-wall-The-Lazy-Pig-Hotel-14.jpg.webp', '2025-05-30 12:54:00'),
(9, 22, '1748609955_1 Airclos Folding Door (Villa - UAE).JPG', '2025-05-30 12:59:15'),
(11, 24, '1748665256_image-001.jpg', '2025-05-31 04:20:56'),
(12, 25, '1748665357_mm.jpg', '2025-05-31 04:22:37'),
(13, 26, '1748665404_P20220087 House PG _ RCN Minimalist Windows (47).jpg', '2025-05-31 04:23:24'),
(14, 27, '1748665500_automatic-entrance-doors-in-dubai-4.jpg', '2025-05-31 04:25:00'),
(15, 28, '1748665568_demountable-glass-wall-partition-automatic-in-dubai-12.jpg', '2025-05-31 04:26:08'),
(16, 29, '1748665627_automatic-entrance-doors-in-dubai-4.jpg', '2025-05-31 04:27:07'),
(17, 30, '1748665678_image-003.jpg', '2025-05-31 04:27:58'),
(18, 31, '1748665830_mobile-acoustic-walls-partition-automatic-in-dubai-6.jpg', '2025-05-31 04:30:30'),
(19, 32, '1748665883_shower-enclosures -bmp-1.bmp', '2025-05-31 04:31:23'),
(20, 33, '1748665935_shower-enclosures -bmp-3.bmp', '2025-05-31 04:32:15'),
(22, 35, '1748666023_GGR-GU-Automatic.jpg', '2025-05-31 04:33:43'),
(23, 36, '1748666077_bi-folding-doors-in-dubai-8.webp', '2025-05-31 04:34:37'),
(27, 39, '1748842537_automatic-entrance-doors-in-dubai-3.jpg', '2025-06-02 05:35:37'),
(28, 39, '1748842537_automatic-entrance-doors-in-dubai-4.jpg', '2025-06-02 05:35:37'),
(29, 39, '1748842537_bi-folding-automatic-doors-in-dubai-2.jpg', '2025-06-02 05:35:37');

-- --------------------------------------------------------

--
-- Table structure for table `seo_setting`
--

CREATE TABLE `seo_setting` (
  `id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_keywords` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seo_setting`
--

INSERT INTO `seo_setting` (`id`, `page_name`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`) VALUES
(5, 'Meeta Title', 'Meeta Descriptionnnn', 'Meeta Body', 'Meeta keywords', '2025-05-22 05:36:17');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `short_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `post` text DEFAULT NULL,
  `post_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `short_description`, `description`, `post`, `post_description`) VALUES
(9, 'Comprehensive Industrial & Manufacturing Solutions', 'From engineering and construction to factory support, Glaztech delivers high-quality, reliable services tailored for diverse industries. We power progress with precision, expertise, and innovation across every phase of your industrial operations.', 'Mechanical Engineering', 'We provide precision-driven mechanical engineering solutions that enhance efficiency, safety, and performance across industrial and manufacturing environments.'),
(10, '', '', 'Automotive Manufacturing', 'Our advanced automotive manufacturing services deliver high-performance parts and systems with unmatched quality, reliability, and engineering excellence.'),
(11, '', '', 'Bridge Construction', 'From design to execution, we deliver durable and innovative bridge construction solutions for long-lasting infrastructure and public safety.'),
(12, '', '', 'Construction of Engineering', 'Glaztech delivers robust engineering construction services built on accuracy, structural integrity, and innovative methods for industrial-scale projects.');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `page_url` text NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `page_url`, `subtitle`, `description`, `image`, `created_at`) VALUES
(28, 'Market Leader Since 2009', 'home\\', 'Market Leader Since 2009', 'GlazTech Aluminium and Glass\r\nLLC specializes in crafting high-end\r\ncustom solutions for modern villas,\r\nboutique hotels, and luxury spaces.\r\n. Our innovative systems are designed\r\nto invite the beauty ofthe outdoors while providing exceptional comfort and security', 'uploads/slider/1749468659_03_header.jpg', '2025-05-21 12:32:42');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `post_name` varchar(100) NOT NULL,
  `short_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `post_name`, `short_description`, `description`, `image`, `created_at`) VALUES
(4, 'Name', 'Post Name*', 'Short Description', 'Description..', '1747893079_tt.jpg', '2025-05-22 05:51:19');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) NOT NULL,
  `subcategory_image` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory_name`, `subcategory_image`, `meta_title`, `meta_description`, `meta_keywords`, `slug`, `created_at`) VALUES
(7, 20, 'Minimalist bifold doors', 'uploads/subcategory/subcat_6830592bacf305.79136543.jpg', 'Minimalist bifold doors Meta Title', 'Minimalist bifold doors Meta Description', 'Minimalist bifold doors Meta Keywords', '', '2025-05-23 11:16:59'),
(8, 20, 'Bi-fold doors with thermal break Product Name', 'uploads/subcategory/subcat_683059f2cf7da4.97481438.jpg', 'Bi-fold doors with thermal break Meta Title', 'Bi-fold doors with thermal break Meta Description', 'Bi-fold doors with thermal break Meta Keywords', '', '2025-05-23 11:20:18'),
(9, 29, '36 C Minimal Sliding System Product Name', 'uploads/subcategory/subcat_68305da35880b6.24882541.jpg', '36 C Minimal Sliding System Meta Title', '36 C Minimal Sliding System Meta Description', '36 C Minimal Sliding System Meta Keywords', '', '2025-05-23 11:36:03'),
(10, 29, '36 HR Minimal Sliding System', 'uploads/subcategory/subcat_68305e2bdda073.99926147.jpg', '36 HR Minimal Sliding System Meta Title', '36 HR Minimal Sliding System Meta Description', '36 HR Minimal Sliding System Meta Keywords', '', '2025-05-23 11:38:19'),
(11, 29, '54C Product Name', 'uploads/subcategory/subcat_68305ea2daf353.46557590.jpg', '54C Meta Title', '54C Meta Description', '54C Meta Keywords', '', '2025-05-23 11:40:18'),
(12, 29, 'Pivot Doors Product Name', 'uploads/subcategory/subcat_68305fa7407a89.61621857.jpg', 'Pivot Doors Meta Title', 'Pivot Doors Meta Description', 'Pivot Doors Meta Keywords', '', '2025-05-23 11:44:39'),
(13, 21, 'Retractable  roofs Product Name', 'uploads/subcategory/subcat_6830601f0cc984.15186759.jpg', 'Retractable  roofs Meta Title', 'Retractable  roofs Meta Description', 'Retractable  roofs Meta Keywords', '', '2025-05-23 11:46:39'),
(14, 21, 'Fixed Glass Roof', 'uploads/subcategory/subcat_68306093d1c145.79601903.jpg', 'Fixed Glass Roof Meta Title', 'Fixed Glass Roof Meta Description', 'Fixed Glass Roof Meta Keywords', '', '2025-05-23 11:48:35'),
(15, 30, 'Chain Drive', 'uploads/subcategory/subcat_6830610e0c7898.07705277.jpg', 'Chain Drive Meta Title', 'Chain Drive Meta Description', 'Chain Drive Meta Keywords', '', '2025-05-23 11:50:38'),
(16, 30, 'Spindle Drive Product Name', 'uploads/subcategory/subcat_6830630231ea59.75704603.jpg', 'Spindle Drive Meta Title', 'Spindle Drive Meta Description Meta Description', 'Spindle Drive Meta Keywords', '', '2025-05-23 11:58:58'),
(17, 30, 'RWA Control panel Systems Product Name', 'uploads/subcategory/subcat_68306368200a67.38009036.jpg', 'RWA Control panel Systems Meta Title', 'RWA Control panel Systems Meta Description', 'RWA Control panel Systems Meta Keywords', '', '2025-05-23 12:00:40'),
(18, 22, 'Automatic Sliding Doors', 'uploads/subcategory/subcat_6830639c20a430.39299359.jpg', 'Automatic Sliding Doors', 'Automatic Sliding Doors', 'Automatic Sliding Doors', '', '2025-05-23 12:01:32'),
(19, 22, 'Automatic Swing Doors', 'uploads/subcategory/subcat_683063ce6eb096.17500229.jpg', 'Automatic Swing Doors', 'Automatic Swing Doors', 'Automatic Swing Doors', '', '2025-05-23 12:02:22'),
(20, 22, 'Automatic Revolving  Doors Product Name', 'uploads/subcategory/subcat_683064183f6643.45290983.jpg', 'Automatic Revolving  Doors Meta Title', 'Automatic Revolving  Doors Meta Description', 'Automatic Revolving  Doors Meta Keywords', '', '2025-05-23 12:03:36'),
(21, 23, 'Vertical Sliding windows', 'uploads/subcategory/subcat_6830651f24c4b3.86945393.jpg', 'Vertical Sliding windows Meta Title', 'Vertical Sliding windows Meta Description', 'Vertical Sliding windows Meta Keywords', '', '2025-05-23 12:07:59'),
(22, 23, 'Vertical Bi-Folding system Product Name', 'uploads/subcategory/subcat_6830657e7aca35.72624111.jpg', 'Vertical Bi-Folding system Meta Title', 'Vertical Bi-Folding system Meta Description', 'Vertical Bi-Folding system Meta Keywords', '', '2025-05-23 12:09:34'),
(23, 24, 'Frameless Bi-folding System', 'uploads/subcategory/subcat_683065e8975245.04542790.jpg', 'Frameless Bi-folding System Meta Title', 'Frameless Bi-folding System Meta Description', 'Frameless Bi-folding System Meta Keywords', '', '2025-05-23 12:11:20'),
(24, 24, 'Frameless Staking System Product Name', 'uploads/subcategory/subcat_6830662d348b81.47053980.jpg', 'Frameless Staking System  Meta Title', 'Frameless Staking System Meta Description', 'Frameless Staking System Meta Keywords', '', '2025-05-23 12:12:29'),
(25, 31, 'Movable wall System Product Name', 'uploads/subcategory/subcat_6830668a4fa866.04237756.jpg', 'Movable wall System Meta Title', 'Movable wall System Meta Description', 'Movable wall System Meta Keywords', '', '2025-05-23 12:14:02'),
(26, 31, 'Foldable wall systems  Product Name', 'uploads/subcategory/subcat_683066cd469453.11646976.jpg', 'Foldable wall systems Meta Title', 'Foldable wall systems Meta Description', 'Foldable wall systems Meta Keywords', '', '2025-05-23 12:15:09'),
(27, 31, 'Movable Glass walls Product Name', 'uploads/subcategory/subcat_68306724e0f363.68187855.jpg', 'Movable Glass walls Meta Title', 'Movable Glass walls Meta Description', 'Movable Glass walls Meta Keywords', '', '2025-05-23 12:16:36'),
(28, 25, 'office partitions Product Name', 'uploads/subcategory/subcat_683067a5652e42.63723064.jpg', 'office partitions Meta Title', 'office partitions Meta Description', 'office partitions Meta Keywords', '', '2025-05-23 12:18:45'),
(29, 26, 'Shower Enclosures  Product Name', 'uploads/subcategory/subcat_683067f535f0f0.03005866.jpg', 'Shower Enclosures Meta Title', 'Shower Enclosures Meta Description', 'Shower Enclosures Meta Keywords', '', '2025-05-23 12:20:05');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `author_role` varchar(255) DEFAULT NULL,
  `author_image` varchar(255) DEFAULT NULL,
  `testimonial_text` text NOT NULL,
  `rating` tinyint(3) UNSIGNED DEFAULT NULL CHECK (`rating` between 1 and 5),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `author_name`, `author_role`, `author_image`, `testimonial_text`, `rating`, `created_at`) VALUES
(1, 'jatin mishra', 'admin', 'uploads/testimonials/1747737913_07_projects.jpg', 'okdsfegr', 3, '2025-05-20 10:45:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `created_at`, `updated_at`, `password`) VALUES
(1, 'glaztech', 'admin', 'admin@gmail.com', '2025-05-14 05:04:59', '2025-05-17 05:13:45', '$2y$10$NjL1SHVf9mSZMAkOfYlTreMZwkvKPbn20PyXL9cna9XldkPmDth6W'),
(2, 'glaztech', 'admin', 'admin1@gmail.com', '2025-05-14 05:28:51', '2025-05-14 12:48:11', '$2y$10$r7zb/B5rNtC2WJ7X94uwsObNdSJjJsJ2.bhN.CptJsyFrSulv2gbW\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_queries`
--
ALTER TABLE `contact_queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_blog`
--
ALTER TABLE `gallery_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `headerproducts`
--
ALTER TABLE `headerproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `seo_setting`
--
ALTER TABLE `seo_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `contact_queries`
--
ALTER TABLE `contact_queries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `gallery_blog`
--
ALTER TABLE `gallery_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `headerproducts`
--
ALTER TABLE `headerproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `seo_setting`
--
ALTER TABLE `seo_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `headerproducts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
