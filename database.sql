-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 18, 2024 at 01:26 PM
-- Server version: 8.0.36
-- PHP Version: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emocoegypt_laravel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int DEFAULT '0',
  `photo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shop_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `city` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Cairo',
  `access_cities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `role_id`, `photo`, `password`, `status`, `remember_token`, `created_at`, `updated_at`, `shop_name`, `city`, `access_cities`) VALUES
(1, 'admin', 'admin@demo.com', '01004282491', 0, '1698361242about.jpg', '$2y$10$Vk2VYyIrgclkeQd3Sb.96.RN6/PYJiEGcnaRP3fPiwHVLKs29.udS', 1, 'zFMRp56WqQ1NeB74AH4qcmZYdHSb30VjtkiMZGezTCp15faocrlK5BYcApeK', '2018-02-28 23:27:08', '2023-10-26 21:00:42', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `phone` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `subject` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `phone`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'qwwq', '3232', 'sdad', 'eeee', 'ewq', '2024-08-10 15:00:37', '2024-08-10 15:00:37'),
(2, NULL, NULL, NULL, NULL, NULL, '2024-08-11 15:43:27', '2024-08-11 15:43:27'),
(3, NULL, NULL, NULL, NULL, NULL, '2024-08-11 15:43:39', '2024-08-11 15:43:39'),
(4, NULL, NULL, NULL, NULL, NULL, '2024-08-11 15:47:24', '2024-08-11 15:47:24'),
(5, NULL, NULL, NULL, NULL, NULL, '2024-08-11 15:48:07', '2024-08-11 15:48:07'),
(6, NULL, NULL, NULL, NULL, NULL, '2024-08-11 15:48:15', '2024-08-11 15:48:15'),
(7, NULL, NULL, NULL, NULL, NULL, '2024-08-11 15:51:05', '2024-08-11 15:51:05'),
(8, NULL, NULL, NULL, NULL, NULL, '2024-08-11 15:51:39', '2024-08-11 15:51:39'),
(9, NULL, NULL, NULL, NULL, NULL, '2024-08-11 16:16:30', '2024-08-11 16:16:30'),
(10, NULL, NULL, NULL, NULL, NULL, '2024-08-11 16:16:54', '2024-08-11 16:16:54'),
(11, NULL, NULL, NULL, NULL, NULL, '2024-08-11 16:16:59', '2024-08-11 16:16:59'),
(12, NULL, NULL, NULL, NULL, NULL, '2024-08-11 16:17:35', '2024-08-11 16:17:35'),
(13, NULL, NULL, NULL, NULL, NULL, '2024-08-11 16:22:42', '2024-08-11 16:22:42'),
(14, NULL, NULL, NULL, NULL, NULL, '2024-08-11 16:43:15', '2024-08-11 16:43:15'),
(15, 'qqq', 'adsa', 'aaa@ss', NULL, NULL, '2024-08-11 16:56:25', '2024-08-11 16:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `id` int NOT NULL,
  `type` enum('referral','browser') NOT NULL DEFAULT 'referral',
  `referral` varchar(255) DEFAULT NULL,
  `total_count` int NOT NULL DEFAULT '0',
  `todays_count` int NOT NULL DEFAULT '0',
  `today` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `type`, `referral`, `total_count`, `todays_count`, `today`) VALUES
(1, 'referral', 'www.facebook.com', 6, 0, NULL),
(2, 'referral', 'geniusocean.com', 2, 0, NULL),
(3, 'browser', 'Windows 10', 30472, 0, NULL),
(4, 'browser', 'Linux', 727, 0, NULL),
(5, 'browser', 'Unknown OS Platform', 15522, 0, NULL),
(6, 'browser', 'Windows 7', 1817, 0, NULL),
(7, 'referral', 'yandex.ru', 17, 0, NULL),
(8, 'browser', 'Windows 8.1', 2297, 0, NULL),
(9, 'referral', 'www.google.com', 1667, 0, NULL),
(10, 'browser', 'Android', 8413, 0, NULL),
(11, 'browser', 'Mac OS X', 1390, 0, NULL),
(12, 'referral', 'l.facebook.com', 54, 0, NULL),
(13, 'referral', 'codecanyon.net', 6, 0, NULL),
(14, 'browser', 'Windows XP', 46, 0, NULL),
(15, 'browser', 'Windows 8', 13, 0, NULL),
(16, 'browser', 'iPad', 24, 0, NULL),
(17, 'browser', 'Ubuntu', 178, 0, NULL),
(18, 'browser', 'iPhone', 383, 0, NULL),
(19, 'referral', 'com.google.android.googlequicksearchbox', 15, 0, NULL),
(20, 'referral', 'm.facebook.com', 19, 0, NULL),
(21, 'referral', 'www.mm4web.net', 1, 0, NULL),
(22, 'referral', 'com.google.android.gm', 4, 0, NULL),
(23, 'referral', 'ALAAELDDIN.COM', 2, 0, NULL),
(24, 'referral', 'www.bing.com', 7, 0, NULL),
(25, 'browser', 'Windows 2000', 3, 0, NULL),
(26, 'referral', 'builtwith.com', 2, 0, NULL),
(27, 'referral', 'sys.busineks.com', 2, 0, NULL),
(28, 'referral', 'baidu.com', 34, 0, NULL),
(29, 'referral', '51.89.203.191', 7, 0, NULL),
(30, 'referral', NULL, 228, 0, NULL),
(31, 'browser', 'Windows Vista', 7, 0, NULL),
(32, 'browser', 'iPod', 1, 0, NULL),
(33, 'referral', 'multimega-eg.com', 14, 0, NULL),
(34, 'referral', 'babyisland.vooecommerce.com', 2, 0, NULL),
(35, 'referral', 'rushstoreeg.com', 2, 0, NULL),
(36, 'referral', 'zapolaa.com', 1, 0, NULL),
(37, 'referral', 'www.zapolaa.com', 3, 0, NULL),
(38, 'referral', 'clfurniture.shop', 3, 0, NULL),
(39, 'referral', 'vooecommerce.com', 2, 0, NULL),
(40, 'referral', 'business.facebook.com', 5, 0, NULL),
(41, 'referral', 'banquemisr.gateway.mastercard.com', 2, 0, NULL),
(42, 'referral', 'test-nbe.gateway.mastercard.com', 5, 0, NULL),
(43, 'referral', 'www.google.com.eg', 37, 0, NULL),
(44, 'referral', 'osmangroup.co', 1, 0, NULL),
(45, 'referral', 'martaba.net', 1, 0, NULL),
(46, 'referral', 'www.organo-market.com', 1, 0, NULL),
(47, 'referral', 'uatcheckout.thawani.om', 1, 0, NULL),
(48, 'referral', 'l.instagram.com', 20, 0, NULL),
(49, 'referral', 'lm.facebook.com', 3, 0, NULL),
(50, 'referral', 't.co', 1, 0, NULL),
(51, 'referral', 'vmi642664.contaboserver.net', 2, 0, NULL),
(52, 'referral', 'fbkwriter.com', 1, 0, NULL),
(53, 'referral', 'gxjs.qxnr.net', 2, 0, NULL),
(54, 'referral', 'nhedws.qxnr.net', 2, 0, NULL),
(55, 'referral', 'magmuhendislik.com', 2, 0, NULL),
(56, 'referral', 'www.5rkj.com', 2, 0, NULL),
(57, 'referral', '194.163.159.150', 8, 0, NULL),
(58, 'referral', 'com.linkedin.android', 5, 0, NULL),
(59, 'referral', 'bit.ly', 36, 0, NULL),
(60, 'referral', 'www.talentwm.com', 2, 0, NULL),
(61, 'referral', 'webtechsurvey.com', 3, 0, NULL),
(62, 'referral', 'greenpharmacy.me', 11, 0, NULL),
(63, 'referral', 'watertank-eg.com', 4, 0, NULL),
(64, 'referral', 'beautiful.cangrow.online', 1, 0, NULL),
(65, 'referral', 'www.google.com.hk', 2, 0, NULL),
(66, 'browser', 'BlackBerry', 1, 0, NULL),
(67, 'referral', 'talentwm.com', 1, 0, NULL),
(68, 'referral', 'www.imdbpress.top', 1, 0, NULL),
(69, 'referral', 'mawasem-eg.com', 2, 0, NULL),
(70, 'referral', 'tagassistant.google.com', 5, 0, NULL),
(71, 'referral', 'www.google.co.in', 1, 0, NULL),
(72, 'referral', 'www.google.fr', 1, 0, NULL),
(73, 'referral', 'www.google.jo', 3, 0, NULL),
(74, 'referral', 'www.youtube.com', 2, 0, NULL),
(75, 'referral', 'youtube.com', 2, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` int NOT NULL,
  `email_type` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email_subject` mediumtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `email_body` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `email_type`, `email_subject`, `email_body`, `status`) VALUES
(1, 'new_order', 'Your Order Placed Successfully', '<p>Hello {customer_name},<br>Your Order Number is {order_number}<br>Your order has been placed successfully</p>', 1),
(2, 'new_registration', 'Welcome To Vowalaa E-Commerce', '<p>Hello {customer_name},<br>You have successfully registered to {website_title}, We wish you will have a wonderful experience using our service.</p><p>Thank You<br></p>', 1),
(3, 'vendor_accept', 'Your Vendor Account Activated', '<p>Hello {customer_name},<br>Your Vendor Account Activated Successfully. Please Login to your account and build your own shop.</p><p>Thank You<br></p>', 1),
(4, 'subscription_warning', 'Your subscrption plan will end after five days', '<p>Hello {customer_name},<br>Your subscription plan duration will end after five days. Please renew your plan otherwise all of your products will be deactivated.</p><p>Thank You<br></p>', 1),
(5, 'vendor_verification', 'Request for verification.', '<p>Hello {customer_name},<br>You are requested verify your account. Please send us photo of your passport.</p><p>Thank You<br></p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `generalsettings`
--

CREATE TABLE `generalsettings` (
  `id` int UNSIGNED NOT NULL,
  `favicon` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_ar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_en` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_fr` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_fr` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `footer_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `footer_fr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `phones` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `emails` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `addresses_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `addresses_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `addresses_fr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `map` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `contact_emails` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `admin_loader` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `talkto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `drift` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `smtp_host` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_port` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_user` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_pass` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verification_email` int DEFAULT '1',
  `is_smtp` int DEFAULT '1',
  `is_capcha` int DEFAULT '1',
  `home_video` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generalsettings`
--

INSERT INTO `generalsettings` (`id`, `favicon`, `logo_ar`, `logo_en`, `logo_fr`, `title_ar`, `title_en`, `title_fr`, `footer_ar`, `footer_en`, `footer_fr`, `phones`, `emails`, `addresses_ar`, `addresses_en`, `addresses_fr`, `map`, `contact_emails`, `admin_loader`, `talkto`, `drift`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_pass`, `from_email`, `from_name`, `is_verification_email`, `is_smtp`, `is_capcha`, `home_video`) VALUES
(1, '1723472704logo.png', '1723455693logo.png', '1723455682logo.png', '1723455706logo.png', 'ايموكو مصر', 'Emoco Egypt', 'Emoco Egypt', NULL, 'designed @2024 EMOCO by Cangrow Online', NULL, '+20 122 26986897,+202 22612118,+202 24012322', NULL, '[\"\\u0634 \\u0627\\u0644\\u0639\\u0628\\u0648\\u0631\\u060c \\u0637\\u0631\\u064a\\u0642 \\u0635\\u0644\\u0627\\u062d \\u0633\\u0627\\u0644\\u0645\\u060c \\u0645\\u062f\\u064a\\u0646\\u0629 \\u0646\\u0635\\u0631\\u060c \\u0627\\u0644\\u0642\\u0627\\u0647\\u0631\\u0629.\"]', '[\"2 El-Obour St., Salah Salem Road, Nasr City, Cairo.\"]', '[\"2 rue El-Obour, route Salah Salem, Nasr City, Le Caire.\"]', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13810.712988582005!2d31.302247000000005!3d30.074756!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583e36b3284b53%3A0x3a77ce70c4afa735!2zRW1vY28g2LTYsdmD2Kkg2KfZhNij2LnZhdin2YQg2KfZhNmH2YbYr9iz2YrYqSDYp9mE2YXYqtmC2K_ZhdipIC0g2KfZhdmI2YPZiA!5e0!3m2!1sen!2sus!4v1723465227325!5m2!1sen!2sus', 'emoco@emocoegypt.com', NULL, NULL, NULL, 'in-v3.mailjet.com', '587', '0e05029e2dc70da691aa2223aa53c5be', '5df1b6242e86bce602c3fd9adc178460', 'official@cangrowonline.com', 'CangrowOnline', 1, 1, 0, '1723453927زايد .mp4');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_07_20_000000_create_visitors_table', 2),
(14, '2024_08_06_000000_create_services_table', 3),
(13, '2024_08_06_000000_create_partners_table', 3),
(12, '2024_08_06_000000_create_models_table', 3),
(11, '2024_08_03_000000_create_generalsettings_table', 3),
(15, '2024_08_06_000000_create_sliders_table', 3),
(16, '2024_08_07_000000_create_pagesettings_table', 4),
(17, '2024_08_10_202447_add_portfolio_column_to_pagesettings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` int UNSIGNED NOT NULL,
  `title_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title_fr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `details_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `details_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `details_fr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `model_category_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `title_ar`, `title_en`, `title_fr`, `details_ar`, `details_en`, `details_fr`, `photo`, `created_at`, `updated_at`, `model_category_id`) VALUES
(4, 'حمامات السباحة الأولمبية', 'Olympic Pools', 'Piscines olympiques', 'تعد المسابقات الرياضية الأولمبية والسباحة من الرياضات الأولمبية الأكثر متابعة على نطاق واسع في العالم، كما أنها تضم ​​أكبر عدد من الأحداث والمشاركين من مختلف البلدان. ليس من المستغرب أن ينشغل الرياضيون الأولمبيون الطموحون وعشاق السباحة بالحدث الكبير، ويريدون حوض سباحة بالحجم الأولمبي خاص بهم.', 'Olympic athletic competitions and swimming are the most widely followed Olympic sports in the world and also have the largest number of events and participants from different countries. It\'s no surprise that aspiring Olympians and swimming fans get caught up in the big event, and want an Olympic-sized swimming pool of their own.', 'Les compétitions olympiques d\'athlétisme et de natation sont les sports olympiques les plus suivis au monde et comptent également le plus grand nombre d\'événements et de participants de différents pays. Il n\'est pas surprenant que les aspirants olympiens et les amateurs de natation soient pris au piège du grand événement et souhaitent avoir leur propre piscine de taille olympique.', '1723455005IMG_5241.JPG', '2024-08-12 14:30:05', '2024-08-12 15:52:34', 2),
(5, 'حمامات العلاج المائي', 'Hydro -therapy pools', 'Piscines d\'hydrothérapie', NULL, NULL, NULL, '1723459512Acrylic-SPA-Hydrotherapy-Water-Jet-Massage-Bed.webp', '2024-08-12 15:31:06', '2024-08-12 15:52:46', 3),
(6, 'بحيرة صناعية', 'Artificial Lake', 'Lac artificiel', NULL, NULL, NULL, '1723458681IMG-20180514-WA0008.jpg', '2024-08-12 15:31:21', '2024-08-12 15:52:56', 4),
(7, 'بركة إنفينيتي', 'Infinity Pool', 'Piscine à débordement', 'Infinity pools are also known as infinity edge pools, vanishing edge pools, negative edge, zero edge, or disappearing edge. Infinity pools are always custom-built and should be designed to highlight a view. Done right, an infinity pool gives one an illusion of a sheet of water dropping off over the edge of the property, like a waterfall, although you can\'t see or hear falling water.', 'Infinity pools are also known as infinity edge pools, vanishing edge pools, negative edge, zero edge, or disappearing edge. Infinity pools are always custom-built and should be designed to highlight a view. Done right, an infinity pool gives one an illusion of a sheet of water dropping off over the edge of the property, like a waterfall, although you can\'t see or hear falling water.', 'Les piscines à débordement sont également connues sous le nom de piscines à bord infini, piscines à bord disparaissant, bord négatif, bord zéro ou bord disparaissant. Les piscines à débordement sont toujours construites sur mesure et doivent être conçues pour mettre en valeur une vue. Bien réalisée, une piscine à débordement donne l\'illusion d\'une nappe d\'eau tombant au-dessus du bord de la propriété, comme une cascade, même si vous ne pouvez ni voir ni entendre l\'eau tomber.', '17234589911-760x479.jpg', '2024-08-12 15:36:31', '2024-08-12 15:36:31', NULL),
(8, 'مسبح مع جاكوزي', 'Pool with Jacuzi', 'Piscine avec jacuzzi', NULL, NULL, NULL, '1723459216IMG_3267.JPG', '2024-08-12 15:40:16', '2024-08-12 15:53:23', 6),
(9, 'حمام سباحه عائلي', 'Family pool', 'Piscine familiale', 'قد لا تكون لديك الميزانية أو المساحة التي اضطرت سيلين ديون إلى العمل بها من أجل حمام السباحة الخاص بها في فلوريدا، ولكن نظرة سريعة على المجمع السكني الخاص بها تعطيك فكرة عن ماهية حمامات السباحة العائلية: المتعة. مثل موضوع الحديقة المائية، فقط على نطاق أصغر، مع عدد أقل من الأشخاص. إن الميزات المائية المذهلة والشرائح المتقنة والكهوف والأنفاق والصخور والجاذبية العامة لجميع الأعمار هي ما تدور حوله المسابح الترفيهية. على الرغم من أنها غالبًا ما تكون كبيرة بما يكفي، فلا تتوقع العمل في بعض الدورات، على الأقل أثناء لعب الأطفال في إحدى هذه الحدائق المائية الصغيرة. إذا كنت تحب الترفيه، مثل الضوضاء والنشاط والإثارة، فقد يكون هذا هو حوض أحلامك - أو على الأقل أحلام أطفالك.', 'You may not have the budget or space that Celine Dion had to work with for her Florida swimming pool, but a glance at her compound gives you an idea of what family pools are all about: fun. Like a water park theme, only on a smaller scale, with fewer people. Awe-inspiring water features, elaborate slides, caves, tunnels, boulders and a general for-all-ages appeal is what recreational pools are all about. While they are often big enough, don\'t expect to work in some laps, at least while children are playing and splashing in one of these mini water parks. If you like to entertain, like noise, activity, and excitement, this may be the pool of your dreams—or at least your kids\' dreams.', 'Vous n\'avez peut-être pas le budget ou l\'espace avec lequel Céline Dion a dû travailler pour sa piscine en Floride, mais un coup d\'œil à son complexe vous donne une idée de ce que sont les piscines familiales : du plaisir. Comme un parc aquatique à thème, mais à plus petite échelle, avec moins de monde. Des jeux d\'eau impressionnants, des toboggans élaborés, des grottes, des tunnels, des rochers et un attrait général pour tous les âges, voilà ce que sont les piscines récréatives. Bien qu\'ils soient souvent assez grands, ne vous attendez pas à travailler sur quelques tours, du moins pendant que les enfants jouent et barbotent dans l\'un de ces mini-parcs aquatiques. Si vous aimez vous divertir, comme le bruit, l\'activité et l\'excitation, c\'est peut-être la piscine de vos rêves, ou du moins celle de vos enfants.', '1723460306Concord 2.jpg', '2024-08-12 15:58:26', '2024-08-12 15:58:26', 7),
(10, 'حمام سباحة داخلي', 'Indoor Pool', 'Piscine intérieure', 'يعد حمام السباحة الداخلي أمرًا بسيطًا للغاية، فهو موجود بالداخل وتحت سقف ومعزول بثلاثة جدران على الأقل. عادة ما تكون المسابح الداخلية ذات أشكال هندسية بسيطة، وهي مصممة للسباحة أو التدريب طوال العام، خاصة في الأجواء الباردة. تكلفة حمامات السباحة الداخلية أقل من حمامات السباحة الخارجية لأن غرفة حمام السباحة معزولة ومن غير المرجح أن تتسرب الحرارة كما هو الحال في الخارج.', 'An indoor swimming pool is pretty straightforward—it\'s inside, under a roof and insulated by at least three walls. Indoor pools are usually simple, geometric shapes and are built for swimming or training throughout the year, especially in cold climates. The cost for indoor heating pools is lower than outdoor pools because the pool room is insulated and it\'s less likely that heat will escape, as it does outside.', 'Une piscine intérieure est assez simple : elle est à l\'intérieur, sous un toit et isolée par au moins trois murs. Les piscines intérieures ont généralement des formes simples et géométriques et sont construites pour nager ou s\'entraîner tout au long de l\'année, en particulier dans les climats froids. Le coût du chauffage des piscines intérieures est inférieur à celui des piscines extérieures, car la salle de billard est isolée et il est moins probable que la chaleur s\'échappe, comme c\'est le cas à l\'extérieur.', '1723461094467851-M44r4-1579543015-5e25e9e76e173.jpg', '2024-08-12 16:11:34', '2024-08-12 16:11:34', 8);

-- --------------------------------------------------------

--
-- Table structure for table `model_categories`
--

CREATE TABLE `model_categories` (
  `id` int UNSIGNED NOT NULL,
  `title_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title_fr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `details_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `details_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `details_fr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_categories`
--

INSERT INTO `model_categories` (`id`, `title_ar`, `title_en`, `title_fr`, `details_ar`, `details_en`, `details_fr`, `photo`, `created_at`, `updated_at`) VALUES
(2, 'حمامات السباحة الأولمبية', 'Olympic Pools', 'Piscines olympiques', NULL, NULL, NULL, NULL, '2024-08-12 14:52:19', '2024-08-12 14:52:19'),
(3, 'حمامات العلاج المائي', 'Hydro -therapy pools', 'Piscines d\'hydrothérapie', NULL, NULL, NULL, NULL, '2024-08-12 14:53:44', '2024-08-12 14:53:44'),
(4, 'بحيرة صناعية', 'Artificial Lake', 'Lac artificiel', NULL, NULL, NULL, NULL, '2024-08-12 14:54:41', '2024-08-12 14:54:41'),
(5, 'بركة إنفينيتي', 'Infinity Pool', 'Piscine à débordement', NULL, NULL, NULL, NULL, '2024-08-12 14:55:36', '2024-08-12 14:55:36'),
(6, 'مسبح مع جاكوزي', 'Pool with Jacuzi', 'Piscine avec jacuzzi', NULL, NULL, NULL, NULL, '2024-08-12 14:56:44', '2024-08-12 14:56:44'),
(7, 'حمام سباحه عائلي', 'Family pool', 'Piscine familiale', NULL, NULL, NULL, NULL, '2024-08-12 15:02:55', '2024-08-12 15:02:55'),
(8, 'حمام سباحة داخلي', 'Indoor Pool', 'Piscine intérieure', NULL, NULL, NULL, NULL, '2024-08-12 15:04:03', '2024-08-12 15:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `pagesettings`
--

CREATE TABLE `pagesettings` (
  `id` int UNSIGNED NOT NULL,
  `about_title_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `about_title_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `about_title_fr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `about_details_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `about_details_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `about_details_fr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `about_photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `portfolio_title_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `portfolio_title_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `portfolio_title_fr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `portfolio_details_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `portfolio_details_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `portfolio_details_fr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `portfolio_photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pagesettings`
--

INSERT INTO `pagesettings` (`id`, `about_title_ar`, `about_title_en`, `about_title_fr`, `about_details_ar`, `about_details_en`, `about_details_fr`, `about_photo`, `portfolio_title_ar`, `portfolio_title_en`, `portfolio_title_fr`, `portfolio_details_ar`, `portfolio_details_en`, `portfolio_details_fr`, `portfolio_photo`) VALUES
(1, 'نبذة عن شركة إيموكو مصر', 'About Emoco Egypt', 'À propos d\'Emoco Egypte', 'تاريخ\r\n\"إيموكو\" كما هو معروف حالياً تأسس عام 2000، إلا أنه يعتبر جيلاً أكثر تطوراً من السابق\r\nمؤسسة فردية \"المكتب الكهروميكانيكي للأعمال الهندسية - إيمو\" والتي أسسها وأدارها المهندس.\r\nممدوح الصادق في عام 1995 ولكن تم إنهاؤه في وقت لاحق بحلول نهاية عام 2000 عندما ظهرت شركة إيموكو.\r\nمنذ تأسيسها، قامت شركة إيموكو بتلبية الاحتياجات المتزايدة للسوق المصري وأصبحت الرائدة في مجالها. لقد\r\nاكتسبت بنجاح احترام وثقة عملائها، والمعروفة بمستوى عالٍ من القدرة التقنية والاحترافية والتسعير المرن\r\nسياسة.', 'History\r\n\"EMOCO\" as its presently known was established in 2000, however it\'s considered a more developed generation of the former\r\nindividual enterprise \"The Electromechanical Office for Engineering Works -EMO\" which was founded and managed by Eng.\r\nMamdouh El-Saled in 1995 but was later terminated by the end of year 2000 when EMOCO emerged.\r\nSince its foundation, EMOCO has met the growing needs of the Egyptian market and has become the leader in its field. It has\r\nsuccessfully gained its customer respect and trust, known for its high level of technical capability, professionalism & flexible pricing\r\npolicy.', 'Histoire\r\n\"EMOCO\", comme on l\'appelle actuellement, a été créé en 2000, mais il est considéré comme une génération plus développée de l\'ancienne\r\nentreprise individuelle \"Le Bureau Électromécanique des Travaux d\'Ingénierie -EMO\" qui a été fondée et dirigée par l\'Ing.\r\nMamdouh El-Saled en 1995, mais a ensuite été dissous à la fin de l\'année 2000 avec l\'émergence de l\'EMOCO.\r\nDepuis sa création, EMOCO a répondu aux besoins croissants du marché égyptien et est devenue leader dans son domaine. Il a\r\na réussi à gagner le respect et la confiance de ses clients, connu pour son haut niveau de capacité technique, son professionnalisme et ses prix flexibles\r\npolitique.', '1723119888about.jpg', 'نحن صانعو حمامات السباحة وخبراء في خدمة حمامات السباحة', 'We Are Swimming Pool Builders and Swimming Pool Service Experts', 'À propos d\'Emoco Egypte', 'تأسست \"إيموكو\" كما اسمها الحالي في عام 2000، إلا أنها تعتبر جيلاً أكثر تطوراً من المؤسسة الفردية السابقة \"المكتب الكهروميكانيكي للأعمال الهندسية – إيمو\" التي أسسها وأدارها المهندس. ممدوح السعيد في عام 1995 ولكن تم إنهاؤه في وقت لاحق بحلول نهاية عام 2000 عندما ظهرت شركة إيموكو.\r\n\r\nمنذ تأسيسها، قامت شركة إيموكو بتلبية الاحتياجات المتزايدة للسوق المصري وأصبحت الرائدة في مجالها. لقد نجحت في اكتساب احترام وثقة عملائها، والمعروفة بمستوى عالٍ من القدرة التقنية والكفاءة المهنية وسياسة التسعير المرنة.', '“EMOCO” as its presently known was established in 2000, however it’s considered a more developed generation of the former individual enterprise “The Electromechanical Office for Engineering Works – EMO”which was founded and managed by Eng. Mamdouh El-Saied in1995 but was later terminated by the end of year 2000 when EMOCO emerged. Since its foundation. EMOCO has met the growing needs of the Egyptian market and has become the leader in its field. It has successfully gained its customer respect and trust, known for its high level of technical capability, professionalism & flexible pricing policy.\r\nEMOCO has get use of the long accumulated and extensive experiences and know how gained from over 25 years of extensive working experiences in the market. We do believe that the well planned and good engineered projects -if supervised with experienced and professional project management- should meet the best execution performance, the optimum cost effectiveness and accordingly customer satisfaction and success on the long term. Based on this concept, EMOCO has invested both financial and human resources to build a back-bone of technical know-how and supporting engineering facilities to fulfill this part of our commitments towards our customers.', 'En tête du courant\r\nÀ propos d\'Emoco Egypte\r\n« EMOCO », comme on l\'appelle actuellement, a été créée en 2000, mais elle est considérée comme une génération plus développée de l\'ancienne entreprise individuelle « Bureau électromécanique pour les travaux d\'ingénierie – EMO », fondée et dirigée par l\'ingénieur. Mamdouh El-Saied en 1995, mais a ensuite été dissous à la fin de l\'année 2000 avec la naissance de l\'EMOCO. Depuis sa fondation.\r\nEMOCO a répondu aux besoins croissants du marché égyptien et est devenu leader dans son domaine. Elle a réussi à gagner le respect et la confiance de ses clients, connus pour son haut niveau de capacité technique, son professionnalisme et sa politique de prix flexible.', '1723376324WhatsApp Image 2024-08-11 at 14.38.33_7ff8c899.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int UNSIGNED NOT NULL,
  `photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `photo`, `created_at`, `updated_at`) VALUES
(15, '1723553610Screenshot 2024-08-13 154520.png', '2024-08-13 17:53:30', '2024-08-13 17:53:30'),
(16, '1723553625Screenshot 2024-08-13 154730.png', '2024-08-13 17:53:45', '2024-08-13 17:53:45'),
(17, '1723553642Screenshot 2024-08-13 154751.png', '2024-08-13 17:54:02', '2024-08-13 17:54:02'),
(18, '1723553652Screenshot 2024-08-13 154822.png', '2024-08-13 17:54:12', '2024-08-13 17:54:12'),
(19, '1723553663Screenshot 2024-08-13 154846.png', '2024-08-13 17:54:23', '2024-08-13 17:54:23'),
(20, '1723553682Screenshot 2024-08-13 154908.png', '2024-08-13 17:54:42', '2024-08-13 17:54:42'),
(21, '1723553700Screenshot 2024-08-13 154922.png', '2024-08-13 17:55:00', '2024-08-13 17:55:00'),
(22, '1723553712Screenshot 2024-08-13 154955.png', '2024-08-13 17:55:12', '2024-08-13 17:55:12'),
(23, '1723553727Screenshot 2024-08-13 155018.png', '2024-08-13 17:55:27', '2024-08-13 17:55:27'),
(24, '1723553737Screenshot 2024-08-13 155032.png', '2024-08-13 17:55:37', '2024-08-13 17:55:37'),
(25, '1723553747Screenshot 2024-08-13 155111.png', '2024-08-13 17:55:47', '2024-08-13 17:55:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `section`) VALUES
(5, 'manager', 'general_settings , manage_staffs'),
(7, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int UNSIGNED NOT NULL,
  `title_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title_fr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `details_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `details_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `details_fr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_title_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_title_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_title_fr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_details_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_details_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_details_fr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `tags` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `slug_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `slug_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `slug_fr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title_ar`, `title_en`, `title_fr`, `details_ar`, `details_en`, `details_fr`, `meta_title_ar`, `meta_title_en`, `meta_title_fr`, `meta_details_ar`, `meta_details_en`, `meta_details_fr`, `tags`, `photo`, `created_at`, `updated_at`, `slug_ar`, `slug_en`, `slug_fr`) VALUES
(5, 'حمامات سباحة', 'Swimming pools', 'Piscines', 'نقوم بأنواع مختلفة من الهندسة تهدف إلى تغطية الأنشطة المتعلقة بالجدوى والأساسية والتفصيلية.\r\n\r\nنقوم بالدمج بكفاءة بين التخصصات الهندسية المختلفة داخل الشركة لننتهي بوثائق موثوقة للخدمة التالية.', 'We do different types of engineering aiming at covering feasibility, basic, and detailed activities.\r\n\r\nWe integrate efficiently between different engineering disciplines inside the company to end up with reliable documents for next service.', 'Nous réalisons différents types d’ingénierie visant à couvrir les activités de faisabilité, de base et détaillées.\r\n\r\nNous intégrons efficacement les différentes disciplines d\'ingénierie au sein de l\'entreprise pour obtenir des documents fiables pour le prochain service.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1723378362Our values.jpg', '2024-08-11 17:00:53', '2024-08-12 15:41:18', 'Swimming-pools', 'Swimming-pools', 'Swimming-pools'),
(6, 'المشتريات والتوريدات', 'Procurement & Supply', 'Approvisionnement et approvisionnement', 'نقوم بالمشتريات المحلية والأجنبية اعتمادًا على قاعدة بيانات قوية جدًا للبائعين مبنية على خبرتنا.', 'We do both local and foreign procurement depending on a very strong vendor’s database built from our experience.', 'Nous effectuons des achats locaux et étrangers en nous basant sur une base de données de fournisseurs très solide, construite à partir de notre expérience.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1723378015scope of work.jpg', '2024-08-11 17:05:11', '2024-08-12 15:39:50', 'Procurement-&-Supply', 'Procurement-&-Supply', 'Procurement-&-Supply'),
(7, 'معدات النوادي الصحية (كبائن الساونا، حمامات السبا )', 'Health Clubs Equipment (Sauna Cabins, Spa $Stream Bathes)', 'Équipement de clubs de santé (cabines de sauna, bains à remous au spa)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1723461396527780621-Dusit-Thani-Lake-View-Pool-1.jpg', '2024-08-11 17:16:08', '2024-08-12 16:34:17', 'Health-Clubs-Equipment', 'Health-Clubs-Equipment', 'Health-Clubs-Equipment'),
(8, 'تركيب غرفة المضخة', 'Pump room installation', 'Installation de la salle des pompes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1723464363WhatsApp Image 2024-08-12 at 2.34.04 PM (1).jpeg', '2024-08-11 17:24:58', '2024-08-13 16:55:01', 'Plumbing-Stations', 'Pump-room-insulation', 'Plumbing-Stations'),
(9, 'أنظمة مكافحة الحرائق', 'Fire Fighting Systems', 'Systèmes de lutte contre l\'incendie', NULL, 'We have good experience to accomplish this task efficiently gained from several projects along the years.', 'Nous avons une bonne expérience pour accomplir cette tâche efficacement, acquise grâce à plusieurs projets au fil des années.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1723379335DSC03763-1170x653.jpg', '2024-08-11 17:28:55', '2024-08-12 16:32:56', 'Fire-Fighting-Systems', 'Fire-Fighting-Systems', 'Fire-Fighting-Systems'),
(10, 'الصيانة والتشغيل', 'Maintenance & Operation', 'Entretien et fonctionnement', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1723379578unnamed-1.jpg', '2024-08-11 17:32:58', '2024-08-12 16:32:22', 'Maintenance-&-Operation', 'Maintenance-&-Operation', 'Maintenance-&-Operation'),
(11, 'انشاء حمام سباحه', 'WATER FEATURE INSTRUCTIONS', 'INSTRUCTIONS POUR LES CARACTÉRISTIQUES D\'EAU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1723491908tl.webp', '2024-08-12 17:08:02', '2024-08-13 00:45:08', 'WATER-FEATURE-INSTRUCTIONS', 'WATER-FEATURE-INSTRUCTIONS', 'WATER-FEATURE-INSTRUCTIONS');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int UNSIGNED NOT NULL,
  `title_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title_fr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `details_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `details_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `details_fr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title_ar`, `title_en`, `title_fr`, `details_ar`, `details_en`, `details_fr`, `photo`, `created_at`, `updated_at`) VALUES
(2, 'title arr', 'title en', 'title fr', 'details', 'dsadsa', 'aaaaa', '1722977001Untitled111.jpg', '2024-08-06 17:43:21', '2024-08-06 18:47:59');

-- --------------------------------------------------------

--
-- Table structure for table `socialsettings`
--

CREATE TABLE `socialsettings` (
  `id` int UNSIGNED NOT NULL,
  `facebook` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gplus` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dribble` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ystatus` tinyint NOT NULL DEFAULT '0',
  `i_status` int DEFAULT NULL,
  `instagram` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_status` tinyint NOT NULL DEFAULT '1',
  `g_status` tinyint NOT NULL DEFAULT '1',
  `t_status` tinyint NOT NULL DEFAULT '1',
  `l_status` tinyint NOT NULL DEFAULT '1',
  `d_status` tinyint NOT NULL DEFAULT '1',
  `f_check` tinyint DEFAULT NULL,
  `g_check` tinyint DEFAULT NULL,
  `fclient_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `fclient_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `fredirect` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `gclient_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `gclient_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `gredirect` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socialsettings`
--

INSERT INTO `socialsettings` (`id`, `facebook`, `gplus`, `twitter`, `linkedin`, `dribble`, `youtube`, `ystatus`, `i_status`, `instagram`, `f_status`, `g_status`, `t_status`, `l_status`, `d_status`, `f_check`, `g_check`, `fclient_id`, `fclient_secret`, `fredirect`, `gclient_id`, `gclient_secret`, `gredirect`) VALUES
(1, 'https://www.facebook.com/', 'https://plus.google.com/', 'https://www.Twitter.com/', 'https://Linkedin.com/', 'https://www.behance.com/', 'https://youtube.com/channel', 0, 1, 'https://instagram.com/', 1, 0, 0, 1, 0, 1, 1, '503140663460329', 'f66cd670ec43d14209a2728af26dcc43', 'https://vowalaa.com/demo-saas/auth/facebook/callback', '904681031719-sh1aolu42k7l93ik0bkiddcboghbpcfi.apps.googleusercontent.com', 'yGBWmUpPtn5yWhDAsXnswEX3', 'http://localhost/marketplace/auth/google/callback');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@themesbrand.com', NULL, '$2y$10$bt8ZcxjmnHRdsRIFTAWoIOW0CTlHSecnnoB0Xtw..TuijXBN50wKK', 'avatar-1.jpg', NULL, '2024-06-28 05:21:26', '2024-06-28 05:21:26');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip_address`, `country`, `city`, `country_code`, `created_at`, `updated_at`) VALUES
(1, '156.204.74.109', 'Egypt', 'Cairo', 'EG', '2024-08-08 15:04:37', '2024-08-08 15:04:37'),
(2, '197.46.69.253', 'Egypt', 'Cairo', 'EG', '2024-08-08 15:25:16', '2024-08-08 15:25:16'),
(3, '34.235.48.77', 'United States', 'Ashburn', 'US', '2024-08-12 06:29:44', '2024-08-12 06:29:44'),
(4, '156.204.5.91', 'Egypt', 'Cairo', 'EG', '2024-08-15 12:09:01', '2024-08-15 12:09:01'),
(5, '154.28.229.205', 'United States', 'Ashburn', 'US', '2024-08-15 12:19:10', '2024-08-15 12:19:10'),
(6, '154.28.229.223', 'United States', 'Ashburn', 'US', '2024-08-15 12:19:10', '2024-08-15 12:19:10'),
(7, '95.217.18.177', 'Finland', 'Helsinki', 'FI', '2024-08-15 12:20:11', '2024-08-15 12:20:11'),
(8, '206.189.155.141', 'Singapore', 'Singapore', 'SG', '2024-08-15 12:21:21', '2024-08-15 12:21:21'),
(9, '88.99.26.177', 'Germany', 'Falkenstein', 'DE', '2024-08-15 12:21:52', '2024-08-15 12:21:52'),
(10, '104.166.80.128', 'United States', 'Los Angeles', 'US', '2024-08-15 13:34:23', '2024-08-15 13:34:23'),
(11, '109.202.99.46', 'The Netherlands', '', 'NL', '2024-08-15 14:49:06', '2024-08-15 14:49:06'),
(12, '156.195.134.222', 'Egypt', 'Cairo', 'EG', '2024-08-15 15:56:41', '2024-08-15 15:56:41'),
(13, '41.40.52.11', 'Egypt', 'Giza', 'EG', '2024-08-15 16:38:45', '2024-08-15 16:38:45'),
(14, '66.249.66.79', 'United States', '', 'US', '2024-08-15 19:47:18', '2024-08-15 19:47:18'),
(15, '154.28.229.4', 'United States', 'Ashburn', 'US', '2024-08-15 21:47:21', '2024-08-15 21:47:21'),
(16, '35.95.145.182', 'United States', 'Boardman', 'US', '2024-08-15 23:12:26', '2024-08-15 23:12:26'),
(17, '159.203.59.250', 'Canada', 'Toronto', 'CA', '2024-08-15 23:51:35', '2024-08-15 23:51:35'),
(18, '54.212.228.48', 'United States', 'Boardman', 'US', '2024-08-16 00:10:05', '2024-08-16 00:10:05'),
(19, '47.88.94.28', 'United States', '', 'US', '2024-08-16 00:29:07', '2024-08-16 00:29:07'),
(20, '104.166.80.147', 'United States', 'Los Angeles', 'US', '2024-08-16 00:55:44', '2024-08-16 00:55:44'),
(21, '66.249.64.174', 'United States', '', 'US', '2024-08-16 01:14:24', '2024-08-16 01:14:24'),
(22, '87.236.176.168', 'United Kingdom', '', 'GB', '2024-08-16 07:40:41', '2024-08-16 07:40:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `generalsettings`
--
ALTER TABLE `generalsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_categories`
--
ALTER TABLE `model_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagesettings`
--
ALTER TABLE `pagesettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socialsettings`
--
ALTER TABLE `socialsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `visitors_ip_address_unique` (`ip_address`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `counters`
--
ALTER TABLE `counters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `generalsettings`
--
ALTER TABLE `generalsettings`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `model_categories`
--
ALTER TABLE `model_categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pagesettings`
--
ALTER TABLE `pagesettings`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
