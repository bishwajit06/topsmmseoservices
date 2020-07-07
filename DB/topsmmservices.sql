-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2020 at 04:28 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `topsmmservices`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_menus`
--

CREATE TABLE `admin_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_menus`
--

INSERT INTO `admin_menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'default-menu', '2020-06-30 01:24:09', '2020-06-30 01:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu_items`
--

CREATE TABLE `admin_menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu` bigint(20) UNSIGNED NOT NULL,
  `depth` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_menu_items`
--

INSERT INTO `admin_menu_items` (`id`, `label`, `link`, `parent`, `sort`, `class`, `menu`, `depth`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 'About Us', '/about', 0, 6, NULL, 1, 0, '2020-06-30 01:24:42', '2020-06-30 02:46:34', 0),
(3, 'Services', '#', 0, 0, NULL, 1, 0, '2020-06-30 01:25:05', '2020-06-30 02:36:56', 0),
(7, 'Facebook promotion', '/category/facebook', 3, 1, NULL, 1, 1, '2020-06-30 02:39:49', '2020-06-30 02:49:41', 0),
(8, 'Twitter Promotion', '/category/twiietr', 3, 2, NULL, 1, 1, '2020-06-30 02:40:38', '2020-06-30 02:49:47', 0),
(9, 'Instagram Promotion', '/category/instagram', 3, 3, NULL, 1, 1, '2020-06-30 02:40:54', '2020-06-30 02:49:54', 0),
(10, 'Contact Us', 'contact', 0, 7, NULL, 1, 0, '2020-06-30 02:41:08', '2020-06-30 02:46:34', 0),
(11, 'Facebook', '/category/facebook', 0, 4, NULL, 1, 0, '2020-06-30 02:45:54', '2020-06-30 02:47:53', 0),
(12, 'Twiiter', '/category/twiietr', 0, 5, NULL, 1, 0, '2020-06-30 02:46:15', '2020-06-30 02:46:41', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `banner_image`, `thumbnail_image`, `icon_image`, `description`, `parent_id`, `created_at`, `updated_at`) VALUES
(3, 'Facebook', 'facebook', 'facebookk-2020-06-16-5ee8f1a9ab7a2.jpg', 'facebook-2020-06-16-5ee8eda4c41c8.jpg', 'facebook-2020-06-16-5ee8eda4d1b79.jpg', 'Laravel 7 provides several different approaches to validate your application\'s incoming data. By default, Laravel\'s base controller class uses a ValidatesRequests trait which provides a conveni', NULL, '2020-06-16 10:04:52', '2020-06-24 12:56:12'),
(6, 'Twiietr', 'twiietr', 'twiietr-2020-06-16-5ee8fd9e0822c.jpg', 'twiietr-2020-06-16-5ee8fd9f73b20.jpg', 'twiietr-2020-06-16-5ee8fd9f88730.jpg', 'Laravel provides several different approaches to validate your application\'s incoming data. By default, Laravel\'s base controller class uses a ValidatesRequests trait which provides a conveni', NULL, '2020-06-16 11:13:03', '2020-06-16 11:13:03'),
(7, 'Instagram', 'instagram', 'instagram-2020-06-24-5ef3372762dc3.jpg', 'instagram-2020-06-16-5ee8fdbea2c21.jpg', 'instagram-2020-06-16-5ee8fdbeacdb3.jpg', 'Laravel provides several different approaches to validate your application\'s incoming data. By default, Laravel\'s base controller class uses a ValidatesRequests trait which provides a conveni', NULL, '2020-06-16 11:13:34', '2020-06-24 05:21:12'),
(8, 'Pinterest', 'pinterest', 'pinterest-2020-06-16-5ee8fe09ce93d.jpg', 'pinterest-2020-06-16-5ee8fe09e0fb9.jpg', 'pinterest-2020-06-16-5ee8fe09ea2a1.jpg', 'Laravel provides several different approaches to validate your application\'s incoming data. By default, Laravel\'s base controller class uses a ValidatesRequests trait which provides a conveni', NULL, '2020-06-16 11:14:49', '2020-06-16 11:14:49');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `slug`, `division_id`, `created_at`, `updated_at`) VALUES
(1, 'Narayongonj', 'narayongonj', '1', '2020-06-16 08:06:24', '2020-06-16 08:06:24'),
(3, 'Dhaka Sador', 'dhaka-sador', '1', '2020-06-16 08:07:24', '2020-06-16 08:07:24'),
(4, 'Khulna Shador', 'khulna-shador', '3', '2020-06-16 08:11:54', '2020-06-16 08:11:54'),
(5, 'Jessor', 'jessor', '3', '2020-06-16 08:13:13', '2020-06-16 08:13:13');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `slug`, `priority`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 'dhaka', '1', '2020-06-16 07:58:49', '2020-06-16 08:02:07'),
(3, 'Khulna', 'khulna', '3', '2020-06-16 08:11:35', '2020-06-16 08:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_06_15_164855_create_categories_table', 1),
(5, '2020_06_16_073143_create_roles_table', 1),
(6, '2020_06_16_131123_create_divisions_table', 2),
(7, '2020_06_16_131259_create_districts_table', 2),
(9, '2020_06_16_174026_create_service_images_table', 3),
(10, '2020_06_24_113309_create_sliders_table', 4),
(15, '2020_06_24_125559_create_menus_table', 5),
(16, '2020_06_16_173827_create_services_table', 6),
(18, '2020_06_27_192036_create_reviews_table', 7),
(19, '2020_06_28_190850_create_tags_table', 8),
(20, '2020_06_28_195926_create_service_tag_table', 9),
(21, '2017_08_11_073824_create_menus_wp_table', 10),
(22, '2017_08_11_074006_create_menu_items_wp_table', 11),
(23, '2019_01_05_293551_add-role-id-to-menu-items-table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `review` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` int(11) DEFAULT NULL,
  `star` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `image`, `service_id`, `review`, `summary`, `star`, `created_at`, `updated_at`) VALUES
(1, 'Donaldd', 'donaldd-2020-06-28-5ef859bbe465c.png', 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam suscipit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam suscipit.', NULL, 4, '2020-06-27 15:00:03', '2020-06-28 02:50:03'),
(3, 'MD Kaif', 'md-kaif-2020-06-28-5ef85bef4b2cf.png', 3, 'grow and meet their goals.We create and manage top-performing social media campaigns for businesses.', NULL, 5, '2020-06-28 02:59:27', '2020-06-28 02:59:27'),
(4, 'Hassan Mahamud', 'hassan-mahamud-2020-06-28-5ef85ddfdc04f.png', 4, 'ocial media campaigns for businesses.Top social media marketing services for all businesses. We use relevant social media marketing servi', NULL, 5, '2020-06-28 03:07:43', '2020-06-28 03:07:43'),
(5, 'Soymmo Sarker', 'soymmo-sarker-2020-06-28-5ef864038edf7.png', 4, 'lor sit amet, consectetur adipiscing elit.Aliquam suscipit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam susci', NULL, 4, '2020-06-28 03:33:55', '2020-06-28 03:33:55'),
(6, 'Abdur Rahim', 'abdur-rahim-2020-06-28-5ef8a4147698c.png', 3, 'meet their goals.We create and manage top-performing social media campaigns for bu', NULL, 5, '2020-06-28 08:07:17', '2020-06-28 08:07:17'),
(7, 'Musfiqir Rahim', 'musfiqir-rahim-2020-06-28-5ef8ada7ea908.png', 2, 'We use relevant social media marketing services such as Twitter, Facebook, Google Plus', NULL, 5, '2020-06-28 08:48:08', '2020-06-28 08:48:08'),
(8, 'MD Kayes', 'md-kayes-2020-06-28-5ef8b4f905d2a.png', 4, 'ipsum dolor sit amet, consectetur adipiscing elit.Aliquam', NULL, 3, '2020-06-28 09:19:23', '2020-06-28 09:19:23'),
(9, 'Mominu Haque', 'mominu-haque-2020-06-28-5ef8cf8c65810.png', 4, 'consectetur adipiscing elit.Aliquam suscipit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliqua', NULL, 2, '2020-06-28 09:20:22', '2020-06-28 11:12:44'),
(10, 'Madam Korri', 'mosadek-hossan-2020-06-28-5ef8cf7dd37f9.png', 2, 'We use relevant social media marketing services such as Twitter, Facebook, Google Plus', NULL, 5, '2020-06-28 09:21:51', '2020-06-28 11:15:24');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, NULL),
(2, 'Customer', 'customer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '100',
  `price` decimal(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `offer_price` int(11) DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `category_id`, `name`, `short_description`, `description`, `slug`, `quantity`, `price`, `status`, `offer_price`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 3, 'Facebook Likes', '<p>Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing s</p>\r\n<p>ocial media campaigns for businesses.Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing social media campaigns for businesses.</p>', '<p>Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing s</p>\r\n<p>ocial media campaigns for businesses.Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing social media campaigns for businesses.</p>\r\n<p>Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing s</p>\r\n<p>ocial media campaigns for businesses.Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing social media campaigns for businesses.</p>\r\n<p>Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing s</p>\r\n<p>ocial media campaigns for businesses.Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing social media campaigns for businesses.</p>', 'facebook-likes', 1000, '50.00', 0, NULL, 1, '2020-06-25 14:41:12', '2020-06-25 14:41:12'),
(2, 3, 'Facebook Post Likes', '<p><strong>Top social media marketing services</strong></p>\r\n<p>for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing s</p>', '<p>Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing s</p>\r\n<p>ocial media campaigns for businesses.Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing social media campaigns for businesses.</p>\r\n<p>Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing s</p>\r\n<p>ocial media campaigns for businesses.Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing social media campaigns for businesses.</p>', 'facebook-post-likes', 1000, '50.00', 0, NULL, 1, '2020-06-25 14:41:48', '2020-06-25 14:41:48'),
(3, 7, 'Instagram Followers', '<p>Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing s</p>\r\n<p>ocial media campaigns for businesses.Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing social media campaigns for businesses</p>', '<p>Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing s</p>\r\n<p>ocial media campaigns for businesses.Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing social media campaigns for businesses.</p>\r\n<p>Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing s</p>\r\n<p>ocial media campaigns for businesses.Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing social media campaigns for businesses.</p>', 'instagram-followers', 1000, '50.00', 0, NULL, 1, '2020-06-25 14:42:22', '2020-06-25 14:42:22'),
(4, 6, 'Twiiter followers', '<h3>Top social media marketing</h3>\r\n<p>services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing s</p>', '<h3>Top social media marketing services</h3>\r\n<p>Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing s</p>\r\n<p>ocial media campaigns for businesses.Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing social media campaigns for businesses.</p>\r\n<p>Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing s</p>', 'twiiter-followers', 5000, '100.00', 0, NULL, 1, '2020-06-25 14:43:50', '2020-06-28 08:25:39'),
(6, 6, 'Twitter Likes', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellus</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellusLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellusLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellus</p>', 'twitter-likes', 1000, '50.00', 0, NULL, 1, '2020-06-29 07:19:17', '2020-06-29 07:19:17'),
(7, 3, 'Facebook Comment', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellusLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellusLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellus</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellusLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellusLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellusLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque ele</p>\r\n<p>mentum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellusLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellus</p>', 'facebook-comment', 1000, '50.00', 0, NULL, 1, '2020-06-29 07:21:50', '2020-06-29 07:21:50'),
(8, 7, 'Instagram Comments', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellusLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellus</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellusLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellusLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellusLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dol</p>\r\n<p>or id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellusLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellusLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellusLorem ipsum dolor sit amet, conse</p>\r\n<p>ctetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellusLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellus</p>', 'instagram-comments', 1000, '50.00', 0, NULL, 1, '2020-06-29 07:25:22', '2020-06-29 07:33:36');

-- --------------------------------------------------------

--
-- Table structure for table `service_images`
--

CREATE TABLE `service_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_images`
--

INSERT INTO `service_images` (`id`, `service_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'facebook-likes-2020-06-25-5ef50be90d7c7.jpg', '2020-06-25 14:41:13', '2020-06-25 14:41:13'),
(2, 2, 'facebook-post-likes-2020-06-25-5ef50c0c964b0.jpg', '2020-06-25 14:41:48', '2020-06-25 14:41:48'),
(3, 3, 'instagram-followers-2020-06-25-5ef50c3806a58.jpg', '2020-06-25 14:42:22', '2020-06-25 14:42:32'),
(4, 4, 'twiiter-followers-2020-06-25-5ef50c8686705.jpg', '2020-06-25 14:43:50', '2020-06-25 14:43:50'),
(5, 6, 'twitter-likes-2020-06-29-5ef9ea560fd1b.jpg', '2020-06-29 07:19:19', '2020-06-29 07:19:19'),
(6, 7, 'facebook-comment-2020-06-29-5ef9eaeec8175.jpg', '2020-06-29 07:21:50', '2020-06-29 07:21:50'),
(7, 8, 'instagram-comment-2020-06-29-5ef9ebc267e7a.jpg', '2020-06-29 07:25:22', '2020-06-29 07:25:22'),
(8, 9, 'youtube-2020-06-29-5efa3a48256b7.jpg', '2020-06-29 13:00:25', '2020-06-29 13:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `service_tag`
--

CREATE TABLE `service_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_tag`
--

INSERT INTO `service_tag` (`id`, `service_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 6, 2, '2020-06-29 07:19:19', '2020-06-29 07:19:19'),
(2, 7, 1, '2020-06-29 07:21:50', '2020-06-29 07:21:50'),
(6, 8, 3, '2020-06-29 07:25:22', '2020-06-29 07:25:22'),
(10, 9, 3, '2020-06-29 13:00:25', '2020-06-29 13:00:25'),
(11, 9, 4, '2020-06-29 13:00:25', '2020-06-29 13:00:25'),
(13, 4, 2, '2020-06-29 13:58:25', '2020-06-29 13:58:25'),
(17, 8, 6, '2020-06-29 14:01:09', '2020-06-29 14:01:09'),
(18, 8, 7, '2020-06-29 14:01:09', '2020-06-29 14:01:09'),
(19, 8, 8, '2020-06-29 14:01:09', '2020-06-29 14:01:09'),
(20, 7, 5, '2020-06-29 14:01:28', '2020-06-29 14:01:28'),
(21, 7, 6, '2020-06-29 14:01:28', '2020-06-29 14:01:28'),
(22, 7, 7, '2020-06-29 14:01:28', '2020-06-29 14:01:28'),
(23, 7, 8, '2020-06-29 14:01:28', '2020-06-29 14:01:28'),
(24, 6, 6, '2020-06-29 14:01:55', '2020-06-29 14:01:55'),
(25, 6, 7, '2020-06-29 14:01:55', '2020-06-29 14:01:55'),
(26, 6, 8, '2020-06-29 14:01:55', '2020-06-29 14:01:55'),
(27, 3, 3, '2020-06-29 14:02:13', '2020-06-29 14:02:13'),
(28, 3, 6, '2020-06-29 14:02:13', '2020-06-29 14:02:13'),
(29, 3, 7, '2020-06-29 14:02:13', '2020-06-29 14:02:13'),
(30, 3, 8, '2020-06-29 14:02:13', '2020-06-29 14:02:13'),
(31, 3, 9, '2020-06-29 14:02:13', '2020-06-29 14:02:13'),
(32, 2, 1, '2020-06-29 14:02:34', '2020-06-29 14:02:34'),
(33, 2, 5, '2020-06-29 14:02:34', '2020-06-29 14:02:34'),
(34, 2, 6, '2020-06-29 14:02:34', '2020-06-29 14:02:34'),
(35, 2, 7, '2020-06-29 14:02:34', '2020-06-29 14:02:34'),
(36, 2, 8, '2020-06-29 14:02:34', '2020-06-29 14:02:34'),
(37, 1, 1, '2020-06-29 14:02:57', '2020-06-29 14:02:57'),
(38, 1, 5, '2020-06-29 14:02:57', '2020-06-29 14:02:57'),
(39, 1, 6, '2020-06-29 14:02:57', '2020-06-29 14:02:57'),
(40, 1, 7, '2020-06-29 14:02:57', '2020-06-29 14:02:57'),
(41, 4, 6, '2020-06-29 14:04:19', '2020-06-29 14:04:19'),
(42, 4, 7, '2020-06-29 14:04:19', '2020-06-29 14:04:19');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` tinyint(3) UNSIGNED NOT NULL DEFAULT '10',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `sub_title`, `description`, `button_text`, `button_link`, `priority`, `created_at`, `updated_at`) VALUES
(1, 'Marketplace', 'marketplace-2020-06-24-5ef33d6296d28.jpg', 'For marketers', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor', 'Order Me', 'https://www.freelancer.com/u/roytanushri13', 1, '2020-06-24 05:47:47', '2020-06-24 05:47:47'),
(2, 'More Followers', 'more-followers-2020-06-24-5ef34a94c7754.jpg', 'Grow Business', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor', 'Order Me', 'https://www.fiverr.com/tanushriroy19', 2, '2020-06-24 05:50:46', '2020-06-24 06:47:59');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'facebook', '2020-06-28 13:39:01', '2020-06-28 13:39:01'),
(2, 'Twitter', 'twitter', '2020-06-28 13:47:26', '2020-06-28 13:47:26'),
(3, 'Instagram', 'instagram', '2020-06-28 14:08:46', '2020-06-28 14:08:46'),
(4, 'Pinterest', 'pinterest', '2020-06-28 14:08:59', '2020-06-28 14:08:59'),
(5, 'Facebook Likes', 'facebook-likes', '2020-06-28 14:17:23', '2020-06-28 14:17:23'),
(6, 'Social Media', 'social-media', '2020-06-29 13:59:51', '2020-06-29 13:59:51'),
(7, 'Marketing', 'marketing', '2020-06-29 14:00:04', '2020-06-29 14:00:04'),
(8, 'Seo', 'seo', '2020-06-29 14:00:11', '2020-06-29 14:00:11'),
(9, 'Instagram likes', 'instagram-likes', '2020-06-29 14:00:29', '2020-06-29 14:00:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '2' COMMENT '0=Inactive | 1=Admin | 2=Customer',
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` int(10) UNSIGNED NOT NULL COMMENT 'Division Table ID',
  `district` int(10) UNSIGNED NOT NULL COMMENT 'District Table ID',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0=Inactive | 1=Active | 2=Ban',
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `first_name`, `last_name`, `username`, `email`, `phone`, `image`, `email_verified_at`, `password`, `street_address`, `division`, `district`, `status`, `ip_address`, `about`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'TANUSHRI', 'ROY', 'admin', 'roybishwajit06@gmail.com', '01911087057', '-2020-07-06-5f037a5875560.jpg', NULL, '$2y$10$tToKEnfT59VfJXhyLnK0d.AX4fvzmDoKJuiI.UyXQtO6Hp28iMx.C', '140/10 Nirala R/A', 3, 5, 1, '127.0.0.1', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from', 'HenCPCtOtUuQAF0VCmqo6lRgu3onvW7jq1P7rfOQRAJfrfiFLaZ48F9KYyDG', NULL, '2020-07-06 13:24:09'),
(2, 2, 'Mr', 'Customer', 'customer', 'customer@fixdesignbd.com', '01912761001', NULL, NULL, '$2y$10$2JiwU8hmRytdrAN2kkT.O.TqXB8if0OyMjoAZ2mbn/YLNkbcveUZW', '140/10 Pabla R/A', 2, 3, 1, NULL, NULL, 'ikLlUCi8TjoRuM0dGoJ2QLAlaR0HQxcA2yQ17tZOi3IFpyZAj7jcinAK8zBz', NULL, NULL),
(4, 2, 'Nasrin', 'Siddika', 'nasrinw', 'nasrinsiddika518@gmail.com', '01770195700', NULL, NULL, '$2y$10$JZZEJjW09aUROfHpULyALOCkwXrPJ1Vxa0OpS3dJ20GZJTkYbJ0oa', 'sdfsfs', 1, 3, 0, '127.0.0.1', 'sdfsdfdsf dfgdg', 'GYoI99jZyLJ6VywbD9KBnJLIzJCIzX8kzLq9y9FhowEa3Oil3P', '2020-06-16 08:27:58', '2020-06-16 08:27:58'),
(6, 2, 'Rozina', 'Akter', 'rojinaakter80', 'rojinaakter80@gmail.com', '01912761002', NULL, NULL, '$2y$10$F1ahMoX2r2KyDiSg8X7pre.b2bp5vIJM9mf45PZVm3whXyCoyEHtS', 'Pabla', 3, 5, 1, '127.0.0.1', 'About something', NULL, '2020-06-16 08:37:12', '2020-06-16 08:39:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_menus`
--
ALTER TABLE `admin_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_menu_items`
--
ALTER TABLE `admin_menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_menu_items_menu_foreign` (`menu`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_service_id_foreign` (`service_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_category_id_foreign` (`category_id`);

--
-- Indexes for table `service_images`
--
ALTER TABLE `service_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_tag`
--
ALTER TABLE `service_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_menus`
--
ALTER TABLE `admin_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_menu_items`
--
ALTER TABLE `admin_menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `service_images`
--
ALTER TABLE `service_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `service_tag`
--
ALTER TABLE `service_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_menu_items`
--
ALTER TABLE `admin_menu_items`
  ADD CONSTRAINT `admin_menu_items_menu_foreign` FOREIGN KEY (`menu`) REFERENCES `admin_menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `service_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
