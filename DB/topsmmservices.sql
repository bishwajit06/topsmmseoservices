-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2020 at 01:26 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.4.11

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
(1, 'default-menu', '2020-06-30 01:24:09', '2020-06-30 01:24:09'),
(2, 'topMenu', '2020-09-19 05:43:07', '2020-10-11 03:44:38');

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
(1, 'About Us', '/page/about-us', 0, 6, NULL, 1, 0, '2020-06-30 01:24:42', '2020-10-05 23:39:14', 0),
(3, 'Services', '#', 0, 0, NULL, 1, 0, '2020-06-30 01:25:05', '2020-06-30 02:36:56', 0),
(7, 'Facebook promotion', '/category/facebook', 3, 1, NULL, 1, 1, '2020-06-30 02:39:49', '2020-06-30 02:49:41', 0),
(8, 'Twitter Promotion', '/category/twitter', 3, 2, NULL, 1, 1, '2020-06-30 02:40:38', '2020-10-08 13:08:08', 0),
(9, 'Instagram Promotion', '/category/instagram', 3, 3, NULL, 1, 1, '2020-06-30 02:40:54', '2020-06-30 02:49:54', 0),
(10, 'Contact', '/page/contact', 0, 7, NULL, 1, 0, '2020-06-30 02:41:08', '2020-10-10 07:12:41', 0),
(11, 'Facebook', '/category/facebook', 0, 4, NULL, 1, 0, '2020-06-30 02:45:54', '2020-06-30 02:47:53', 0),
(12, 'Twitter', '/category/twitter', 0, 5, NULL, 1, 0, '2020-06-30 02:46:15', '2020-10-08 13:07:01', 0),
(13, 'Terms & Condition', '/page/terms-condition', 0, 0, NULL, 2, 0, '2020-09-19 05:43:55', '2020-10-09 02:16:12', 0),
(14, 'FAQ', '/page/faq', 0, 1, NULL, 2, 0, '2020-09-19 05:44:12', '2020-10-09 02:15:36', 0),
(15, 'Blog', 'page/blog', 0, 2, NULL, 2, 0, '2020-09-19 05:44:34', '2020-10-11 03:44:49', 0),
(18, 'Blog', '/page/blog', 0, 8, NULL, 1, 0, '2020-09-20 00:30:03', '2020-10-10 07:15:54', 0),
(19, 'FAQ', 'http://127.0.0.1:8000/page/faq', 0, 9, NULL, 1, 0, '2020-10-05 23:33:44', '2020-10-05 23:33:44', 0);

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
(3, 'Facebook', 'facebook', 'facebook-2020-10-09-5f7ffbac864c2.jpg', 'facebook-2020-06-16-5ee8eda4c41c8.jpg', 'facebook-2020-06-16-5ee8eda4d1b79.jpg', 'Laravel 7 provides several different approaches to validate your application\'s incoming data. By default, Laravel\'s base controller class uses a ValidatesRequests trait which provides a conveni', NULL, '2020-06-16 10:04:52', '2020-10-08 23:57:01'),
(6, 'Twitter', 'twitter', 'twiietr-2020-06-16-5ee8fd9e0822c.jpg', 'twiietr-2020-06-16-5ee8fd9f73b20.jpg', 'twiietr-2020-06-16-5ee8fd9f88730.jpg', 'Laravel provides several different approaches to validate your application\'s incoming data. By default, Laravel\'s base controller class uses a ValidatesRequests trait which provides a conveni', NULL, '2020-06-16 11:13:03', '2020-10-08 13:05:44'),
(7, 'Instagram', 'instagram', 'instagram-2020-06-24-5ef3372762dc3.jpg', 'instagram-2020-06-16-5ee8fdbea2c21.jpg', 'instagram-2020-06-16-5ee8fdbeacdb3.jpg', 'Laravel provides several different approaches to validate your application\'s incoming data. By default, Laravel\'s base controller class uses a ValidatesRequests trait which provides a conveni', NULL, '2020-06-16 11:13:34', '2020-06-24 05:21:12'),
(8, 'Pinterest', 'pinterest', 'pinterest-2020-06-16-5ee8fe09ce93d.jpg', 'pinterest-2020-06-16-5ee8fe09e0fb9.jpg', 'pinterest-2020-06-16-5ee8fe09ea2a1.jpg', 'Laravel provides several different approaches to validate your application\'s incoming data. By default, Laravel\'s base controller class uses a ValidatesRequests trait which provides a conveni', NULL, '2020-06-16 11:14:49', '2020-06-16 11:14:49');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approve` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `name`, `email`, `image`, `comment`, `approve`, `created_at`, `updated_at`) VALUES
(2, 5, 'Salma Akhtar', 'salma06@gmail.com', NULL, 'Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam', 1, '2020-09-19 23:01:41', '2020-09-20 03:19:33'),
(3, 5, 'Sammim Seikh', 'sammim@gmail.com', 'sammim-seikh-2020-09-20-5f66e4071ad45.jpg', 'Dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim venia', 0, '2020-09-19 23:09:27', '2020-09-20 03:09:53'),
(4, 6, 'Tanusri Roy', 'roytanushri13@gmail.com', 'tanusri-roy-2020-09-20-5f66ea2e05140.jpg', 'Pellentesque lobortis sem a quam faucibus, id tristique quam ultricies. Donec eget tincidunt augue, et scelerisque odio. Nunc pretium ligula in molestie congue.', 0, '2020-09-19 23:35:42', '2020-09-20 03:30:59'),
(5, 5, 'Sajib Roy', 'sajib@gmail.com', 'sajib-roy-2020-09-20-5f6720ab7d8ae.jpg', 'consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniaconsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim venia', 0, '2020-09-20 03:28:12', '2020-09-20 04:28:05'),
(6, 5, 'Bellal Hossen', 'bellal@gmail.com', 'bellal-hossen-2020-09-20-5f67212f8cae2.jpg', 'Eipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minimadipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim', 0, '2020-09-20 03:30:23', '2020-09-20 10:44:49'),
(7, 4, 'Bishwajit Roy', 'roybishwajit06@gmail.com', 'bishwajit-roy-2020-09-25-5f6e3b88742ef.png', 'Pellentesque lobortis sem a quam faucibus, id tristique quam ultricies. Donec eget tincidunt augue, et scelerisque odio. Nunc pretium ligula in molestie congue. Sed tristique vulputate felis eu tristique. Etiam quis lorem mollis, sagittis diam ut, facilisis magna. In tellus sapien, suscipit vitae varius non', 1, '2020-09-25 12:48:42', '2020-09-25 12:48:42'),
(8, 6, 'Pellentesque', 'Pellentesque@gmail.com', 'pellentesque-2020-10-11-5f828c3477033.png', 'Ssque lobortis sem a quam faucibus, id tristique quam ultricies. Donec eget tincidunt augue, et scelerisque odio. Nunc pretium ligula in molestie congue.', 1, '2020-10-10 22:38:13', '2020-10-10 22:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `read` int(11) NOT NULL DEFAULT '1',
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `subject`, `read`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Bishwajit Roy', 'roybishwajit06@gmail.com', '01911087057', NULL, 0, 'Mauris volutpat, sem eu maximus pellentesque, mauris risus tempus magna, non rutrum augue felis quis dui. Nulla facilisi. Nulla facilisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur interdum convallis metus ac lobortis. Maecenas in urna eget urna porttitor bibendum. Sed urna enim, placerat vel risus ut, placerat dignissim diam. Praesent sit amet augue enim. Nam accumsan libero quis elit mattis efficitur. Morbi id tempor diam. Donec sed est lacus.\r\n\r\nNulla dictum laoreet sem ut mattis. Donec quis sollicitudin quam. Nam quis odio in nulla molestie mattis. Praesent varius in nunc nec imperdiet. Vivamus posuere vulputate suscipit. Vivamus ullamcorper ipsum ut luctus ornare. Aenean dignissim ex enim, eu fringilla nunc porta non. Nullam lobortis sagittis accumsan. Sed porta venenatis orci, sed interdum purus aliquet quis. Aliquam vel neque molestie, euismod neque rutrum, suscipit urna. Pellentesque et volutpat eros,', '2020-10-08 01:04:58', '2020-10-08 02:30:49'),
(2, 'Rojina Akhtar', 'rojinaakter80@gmail.com', '01915761001', NULL, 0, 'orper felis, et commodo sem pulvinar vel. Maecenas ut velit quis velit egestas elementum tincidunt sit amet odio. Duis odio augue, tempus a nunc non, accumsan varius mauris. Nam quis dolor nec nibh luctus malesuada. Donec luctus facilisis fringilla. In at varius nisl, sed pretium nunc. Phasellus tincidunt justo dui, sed placerat sapien porttitor eget. Morbi finibus suscipit quam, quis finibus erat mattis sit amet. Morbi ipsum ex, vehicula vel malesuada sit amet,', '2020-10-08 01:17:28', '2020-10-08 02:27:34'),
(3, 'Sajib Roy', 'sajib@gmail.com', '12354477858411', NULL, 0, 'Mauris volutpat, sem eu maximus pellentesque, mauris risus tempus magna, non rutrum augue felis quis dui. Nulla facilisi. Nulla facilisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur interdum convallis metus ac lobortis. Maecenas in urna eget urna porttitor bibendum. Sed urna enim, placerat vel risus ut, placerat dignissim diam. Praesent sit amet augue enim. Nam accumsan libero quis elit mattis efficitur. Morbi id tempor diam. Donec sed est lacus.\r\n\r\nNulla dictum laoreet sem ut mattis. Donec quis sollicitudin quam. Nam quis odio in nulla molestie mattis. Praesent varius in nunc nec imperdiet. Vivamus posuere vulputate suscipit. Vivamus ullamcorper ipsum ut luctus ornare. Aenean dignissim ex enim, eu fringilla nunc porta non. Nulla', '2020-10-08 02:28:05', '2020-10-08 02:29:22');

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
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `image`, `created_at`, `updated_at`) VALUES
(2, 'cqxLX071XP-2020-10-05-5f7b5db7c4ac2.jpg', '2020-10-05 11:43:18', '2020-10-05 11:54:00'),
(3, 'QBlIpFkFpM-2020-10-05-5f7b5d3112e6b.jpg', '2020-10-05 11:46:51', '2020-10-05 11:51:45'),
(4, 'aEnehYtCy4-2020-10-05-5f7b5de6e1c3f.jpg', '2020-10-05 11:54:47', '2020-10-05 11:54:47'),
(5, 'L2i5p3wLYx-2020-10-06-5f7beafe21822.jpg', '2020-10-05 11:55:09', '2020-10-05 21:56:47');

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
(23, '2019_01_05_293551_add-role-id-to-menu-items-table', 12),
(25, '2020_09_17_052308_create_posts_table', 13),
(26, '2020_09_17_070139_create_post_tag_table', 14),
(27, '2020_09_20_040225_create_comments_table', 15),
(28, '2020_09_20_165243_create_settings_table', 16),
(29, '2020_09_21_100042_create_socials_table', 17),
(30, '2020_10_05_060637_create_pages_table', 18),
(31, '2020_10_05_092140_create_galleries_table', 19),
(33, '2020_10_06_092819_create_contacts_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `image`, `body`, `created_at`, `updated_at`) VALUES
(2, 'About us', 'about-us', 'test2-2020-10-05-5f7acac245fd0.jpg', '<h1 style=\"text-align: center;\"><strong>DdLorem ipsum dolor sit, amet consectetur</strong></h1>\r\n<p>adipisicing elit. Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil expedita deserunt? Necessitatibus!</p>\r\n<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil expedita deserunt?</p>\r\n<p>&nbsp;</p>\r\n<h2 style=\"text-align: center;\">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</h2>\r\n<p>Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil expedita deserunt? Necessitatibus!</p>\r\n<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil expedita deserunt? Necessitatibus!</p>\r\n<p><strong>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil expedita deserunt? <a href=\"https://trijoyayush.com/\" target=\"_blank\">Necessitatibus!</a></strong></p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\"><strong><img src=\"../../../storage/gallery/aEnehYtCy4-2020-10-05-5f7b5de6e1c3f.jpg\" width=\"800\" height=\"450\" /></strong></p>\r\n<p>&nbsp;</p>\r\n<p>Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil expedita deserunt? Necessitatibus! ur adipisicing elit. Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil expedita deserunt? Necessitatibus!&nbsp;Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil expedita deserunt? Necessitatibus!&nbsp;ur adipisicing elit. Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil expedita deserunt? Necessitatibus!</p>\r\n<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil expedita deserunt? Necessitatibus!</p>\r\n<p>&nbsp;</p>\r\n<h3 style=\"text-align: center;\">Reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione</h3>\r\n<p style=\"text-align: left;\">Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil expedita deserunt? Necessitatibus!&nbsp;ur adipisicing elit. Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil expedita deserunt? Necessitatibus!&nbsp;Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati inventore quia,</p>\r\n<p style=\"text-align: left;\">&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil expedita deserunt? Necessitatibus!&nbsp;ur adipisicing elit. Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil expedita deserunt? Necessitatibus!</p>\r\n<p style=\"text-align: left;\"><em>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil expedita deserunt? Necessitatibus!</em></p>\r\n<p style=\"text-align: left;\">&nbsp;</p>\r\n<p>&nbsp;</p>', '2020-10-05 00:45:59', '2020-10-05 22:47:01'),
(3, 'FAQ', 'faq', 'faq-2020-10-09-5f801cd7b4586.jpg', '<h1 style=\"text-align: center;\"><strong>FAQ</strong></h1>\r\n<p>Adipisicing elit. Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil expedita deserunt? &lt;strong&gt;Necessitatibus!&lt;/strong&gt;</p>\r\n<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil expedita deserunt?</p>\r\n<p>&nbsp;</p>\r\n<h2>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</h2>\r\n<p>Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil expedita deserunt? Necessitatibus!</p>\r\n<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil expedita deserunt? Necessitatibus!</p>\r\n<p><strong>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil expedita deserunt?&nbsp;<a href=\"https://trijoyayush.com/\" target=\"_blank\">Necessitatibus!</a></strong></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil expedita deserunt? Necessitatibus! ur adipisicing elit. Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil expedita deserunt? Necessitatibus!&nbsp;Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil expedita deserunt? Necessitatibus!&nbsp;ur adipisicing elit. Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil expedita deserunt? Necessitatibus!</p>\r\n<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil expedita deserunt? Necessitatibus!</p>\r\n<p>&nbsp;</p>\r\n<h3>Reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione</h3>\r\n<p>Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil expedita deserunt? Necessitatibus!&nbsp;ur adipisicing elit. Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil expedita deserunt? Necessitatibus!&nbsp;Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati inventore quia,</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil expedita deserunt? Necessitatibus!&nbsp;ur adipisicing elit. Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil expedita deserunt? Necessitatibus!</p>\r\n<p><em>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati inventore quia, distinctio neque cum fuga reiciendis dolorem aut nesciunt ex facere adipisci dolore ratione, nobis officia nihil expedita deserunt? Necessitatibus!</em></p>', '2020-10-05 22:48:39', '2020-10-09 02:18:53'),
(5, 'Terms & Condition', 'terms-condition', 'terms-condition-2020-10-09-5f801bd277853.jpg', '<h3 style=\"text-align: center;\">Terms &amp; Condition</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque tempor risus ut sagittis volutpat. Donec efficitur ante lectus, eu consequat nulla dictum non. Aenean maximus nisl vel ligula hendrerit, vel bibendum orci placerat. In magna odio, dictum vitae efficitur eu, fringilla ut quam. Donec vehicula pellentesque tristique. Integer sit amet leo a lectus ultrices pellentesque. Pellentesque ac luctus neque, quis cursus risus. Vivamus a orci non erat commodo mattis at vel purus. Mauris in porta quam, in cursus metus. Nulla vel mauris in felis aliquet rutrum. Donec non dapibus ipsum. Sed mi arcu, placerat non vestibulum ac, accumsan eu eros. Morbi pharetra, ex sit amet eleifend tincidunt, mi est feugiat arcu, sit amet viverra risus magna sed ex. Maecenas in faucibus nisl.</p>\r\n<p>&nbsp;</p>\r\n<p style=\"text-align: center;\"><img src=\"../../../storage/gallery/aEnehYtCy4-2020-10-05-5f7b5de6e1c3f.jpg\" alt=\"\" width=\"800\" height=\"450\" /></p>\r\n<p>Vivamus eu eros iaculis ipsum varius varius eu et lectus. Vestibulum quam mi, aliquet nec interdum a, auctor ac risus. Nulla et posuere dolor, eget malesuada metus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur gravida dui quis justo interdum, eu sollicitudin sapien dapibus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum volutpat augue eget justo faucibus tristique. Donec vel malesuada nisl.</p>\r\n<p>Pellentesque fermentum urna a augue bibendum pulvinar. Sed non elit urna. Integer eget libero eu lectus interdum dapibus non quis lorem. Cras pharetra ultricies purus, non tincidunt eros fermentum id. Aenean nibh neque, varius a tristique non, faucibus eget eros. Duis id imperdiet nulla. Ut neque mi, varius mattis ornare a, feugiat sit amet e</p>', '2020-10-08 03:43:38', '2020-10-09 02:14:48');

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `title`, `slug`, `image`, `body`, `view_count`, `status`, `is_approved`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur', 'nemo-enim-ipsam-voluptatem-quia-voluptas-sit-aspernatur', '-2020-09-17-5f631996ca1ac.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vehicula consectetur lacus ut luctus. Etiam vehicula sodales justo, ut congue massa ullamcorper sed. Morbi sodales risus sed hendrerit maximus. Aliquam euismod, urna ut pretium maximus, ligula nisi lacinia lorem, in venenatis ex quam vel lectus. Maecenas pellentesque volutpat mauris eu vulputate. Morbi interdum hendrerit blandit. Vivamus vestibulum scelerisque arcu ut vulputate. Suspendisse eget dui at libero iaculis ultrices nec sed risus. Sed fermentum, ligula non vestibulum pretium, massa felis elementum odio, at hendrerit nibh nunc quis quam. Nam consectetur eros sit amet tellus mattis dignissim. Nunc laoreet dui a pulvinar cursus. Nullam cursus ligula sit amet sem bibendum, a vestibulum lorem aliquet. Suspendisse id ipsum a ipsum sollicitudin interdum.</p>\r\n<p>Curabitur sem risus, rutrum vel dolor quis, consequat bibendum libero. Phasellus sollicitudin lectus sit amet diam interdum porttitor. Ut condimentum commodo neque, id venenatis erat lobortis sed. Donec quis cursus tellus, id vehicula arcu. Aenean dictum velit at dolor euismod, id iaculis justo varius. Aliquam vehicula rhoncus massa eu lobortis. Duis hendrerit tristique nunc, a auctor elit dapibus ut. Aliquam posuere mollis iaculis. Nam ut mi sit amet nibh consectetur blandit. Pellentesque rutrum arcu sed dapibus malesuada. Nulla sed ligula tortor. Vestibulum iaculis sapien nec urna consequat facilisis.</p>\r\n<p>In volutpat lectus vitae tellus ullamcorper, a dictum eros egestas. Proin eget tortor sit amet enim tempor pretium. Sed sed vulputate libero, ut consectetur orci. Praesent mollis augue vel tortor sodales viverra. Suspendisse potenti. Phasellus posuere, turpis venenatis finibus scelerisque, lorem nibh auctor tortor, vitae rutrum dui tortor consectetur eros. Duis vitae enim quis risus pulvinar auctor ac et elit. Mauris ultricies libero id pellentesque mollis. Suspendisse egestas enim nunc, non ullamcorper leo rhoncus ac. Vestibulum iaculis pretium felis id finibus. Nullam justo eros, gravida sed odio id, accumsan porta erat. Phasellus dignissim pulvinar quam posuere convallis. Vestibulum ultricies sed risus quis suscipit.</p>', 0, 0, 0, '2020-09-17 02:08:55', '2020-09-19 04:51:34'),
(2, 1, 8, 'Nemo enim ipsam voluptatem', 'nemo-enim-ipsam-voluptatem', '-2020-09-17-5f631ba3b4bae.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vel tempus nunc, at vestibulum orci. Suspendisse magna est, feugiat non nibh interdum, fermentum auctor lacus. Sed mattis volutpat lorem ut auctor. Praesent bibendum id ante sit amet hendrerit. Suspendisse molestie lectus non placerat sollicitudin. Aliquam vitae tempor dui. Cras efficitur volutpat aliquam. Ut lobortis convallis euismod. Ut id magna nulla. Suspendisse ultricies leo elit, sit amet vehicula tellus posuere eu. Aliquam in finibus ante.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aen</p>\r\n<p>ean vel tempus nunc, at vestibulum orci. Suspendisse magna est, feugiat non nibh interdum, fermentum auctor lacus. Sed mattis volutpat lorem ut auctor. Praesent bibendum id ante sit amet hendrerit. Suspendisse molestie lectus non placerat sollicitudin. Aliquam vitae tempor dui. Cras efficitur volutpat aliquam. Ut lobortis convallis euismod. Ut id magna nulla. Suspendisse ultricies leo elit, sit amet vehicula tellus posuere eu. Aliquam in finibus ante.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vel tempus nunc, at vestibulum orci. Suspendisse magna est, feugiat non nibh interdum, fermentum auctor lacus. Sed mattis volutpat lorem ut auctor. Praesent bibendum id ante sit amet hendrerit. Suspendisse molestie lectus non placerat sollicitudin. Aliquam vitae tempor dui. Cras efficitur volutpat aliquam. Ut lobortis convallis euismod. Ut id magna nulla. Suspendisse ultricies leo elit, sit amet vehicula tellus posuere eu. Aliquam in finibus ante.</p>', 0, 0, 0, '2020-09-17 02:17:40', '2020-09-17 02:17:40'),
(4, 1, 6, 'tempus neque, tincidunt ultrices lorem. Nulla facilisi.', 'tempus-neque-tincidunt-ultrices-lorem-nulla-facilisi', 'tempus-neque-tincidunt-ultrices-lorem-nulla-facilisi-2020-09-20-5f67b2717fe4a.png', '<p>Turpis ac nisi porttitor ultrices. Vivamus laoreet velit arcu, in sodales metus gravida nec. Donec ac risus urna. Donec pretium euismod ante, ut scelerisque massa luctus sed. Ut varius orci nisi, in tincidunt erat luctus at. Curabitur lobortis dui eget erat finibus tempus. Suspendisse orci tellus, pretium a enim in, dignissim hendrerit erat. Aliquam aliquam lacus vitae euismod semper. Vestibulum luctus neque sit amet facilisis porttitor.</p>\r\n<p>Nam a ligula non nisi condimentum euismod a vel lectus. Nunc venenatis sagittis congue. Nunc a iaculis odio. Maecenas nec tempor lorem. Curabitur fringilla ipsum turpis, ac pulvinar purus blandit ut. In ut tellus interdum, eleifend dui eget, consequat turpis. Integer eu odio blandit, placerat risus at, volutpat ligula.</p>\r\n<p>Nullam sit amet convallis dolor. Aenean ac sapien non libero pharetra tempus sit amet id lacus. Nulla cursus justo vel justo malesuada gravida. Sed vitae enim odio. Maecenas sollicitudin dui nec feugiat blandit. Integer ullamcorper pellentesque imperdiet. Curabitur faucibus vehicula metus nec euismod. Nullam at porttitor eros. Suspendisse id nulla pellentesque, tincidunt velit nec, malesuada orci. Nunc vel nunc a purus dignissim gravida. Sed posuere nisl sit amet diam pulvinar auctor. Cras luctus, arcu sed gravida interdum, nulla tortor convallis nisl, a luctus lacus sapien nec augue. Morbi quis ornare nulla.</p>\r\n<p>Pellentesque lobortis sem a quam faucibus, id tristique quam ultricies. Donec eget tincidunt augue, et scelerisque odio. Nunc pretium ligula in molestie congue. Sed tristique vulputate felis eu tristique. Etiam quis lorem mollis, sagittis diam ut, facilisis magna. In tellus sapien, suscipit vitae varius non, lacinia id massa. Sed ultricies aliquam massa, sagittis pulvinar ante mattis non. Nunc varius ex a posuere blandit. Nam vel gravida massa, non tempus erat.</p>', 0, 0, 0, '2020-09-17 03:11:55', '2020-09-20 13:50:09'),
(5, 1, 6, 'fringilla mauris. Aliquam sit amet sodales justo', 'fringilla-mauris-aliquam-sit-amet-sodales-justo', 'fringilla-mauris-aliquam-sit-amet-sodales-justo-2020-09-20-5f67b2a3b713d.jpg', '<p><strong>Lorem ipsum dolor sit amet, consectetur adipiscing </strong></p>\r\n<p>elit. Sed sit amet arcu ultrices, finibus tellus et, fringilla mauris. Aliquam sit amet sodales justo, non fermentum elit. Praesent ut ullamcorper metus. Sed facilisis, mauris at viverra aliquet, ante lacus maximus nulla, a molestie metus ligula at libero. Nam viverra aliquet neque, suscipit suscipit turpis pellentesque sit amet. Quisque porttitor tincidunt molestie. Vivamus interdum in tellus vitae sagittis. Quisque eu efficitur ipsum. Cras at molestie tellus, eu sagittis magna. Phasellus a libero ac massa vehicula faucibus quis ac risus. Ut at sem auctor tortor varius laoreet. Sed vel arcu nec metus rhoncus porta.</p>\r\n<h3>Proin sed viverra ipsum, ac dictum quam</h3>\r\n<p>Ut dictum eget ex sit amet finibus. Sed luctus dolor quis augue imperdiet, vel eleifend quam luctus. Cras dictum in urna eu ultricies. Morbi neque massa, eleifend eu ligula quis, porta mattis dui. Praesent in ante purus. Maecenas dictum cursus ultrices. Fusce pellentesque eu dui malesuada aliquet. Curabitur vitae metus sed odio varius pretium a a eros. Integer vel est imperdiet, congue urna nec, hendrerit enim. Suspendisse id est commodo, convallis mauris quis, facilisis diam.</p>\r\n<p>Phasellus scelerisque odio ac metus ullamcorper, eleifend ultricies odio lobortis. Phasellus vitae erat neque. Integer bibendum ipsum ac enim venenatis tristique ac ac purus. Mauris sit amet aliquam lacus. Donec euismod sagittis tincidunt. Duis volutpat condimentum commodo. Nunc nec accumsan lorem. Morbi at magna arcu. Mauris porttitor dui quis elit dignissim dictum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse porta dictum dui, sit amet ultricies ex auctor vel. Nulla ac diam at tellus aliquet pulvinar id quis elit.</p>', 0, 0, 0, '2020-09-17 22:44:56', '2020-09-20 13:51:00'),
(6, 1, 6, 'Lorem ipsum dolor sit amet, consectetu', 'lorem-ipsum-dolor-sit-amet-consectetu', '-2020-09-18-5f64af446362c.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vestibulum nibh eu rhoncus volutpat. Suspendisse quis mollis nisi, vitae ornare lectus. Fusce nec tempus neque, tincidunt ultrices lorem. Nulla facilisi. Pellentesque mollis leo in justo imperdiet ornare. Morbi ac turpis ac nisi porttitor ultrices. Vivamus laoreet velit arcu, in sodales metus gravida nec. Donec ac risus urna. Donec pretium euismod ante, ut scelerisque massa luctus sed. Ut varius orci nisi, in tincidunt erat luctus at. Curabitur lobortis dui eget erat finibus tempus. Suspendisse orci tellus, pretium a enim in, dignissim hendrerit erat. Aliquam aliquam lacus vitae euismod semper. Vestibulum luctus neque sit amet facilisis porttitor. <a title=\"Freelancer Profile\" href=\"https://www.freelancer.com/u/roytanushri13\" target=\"_blank\">click here</a></p>\r\n<p>Nam a ligula non nisi condimentum euismod a vel lectus. Nunc venenatis sagittis congue. Nunc a iaculis odio. Maecenas nec tempor lorem. Curabitur fringilla ipsum turpis, ac pulvinar purus blandit ut. In ut tellus interdum, eleifend dui eget, consequat turpis. Integer eu odio blandit, placerat risus at, volutpat ligula.</p>\r\n<p>Nullam sit amet convallis dolor. Aenean ac sapien non libero pharetra tempus sit amet id lacus. Nulla cursus justo vel justo malesuada gravida. Sed vitae enim odio. Maecenas sollicitudin dui nec feugiat blandit. Integer ullamcorper pellentesque imperdiet. Curabitur faucibus vehicula metus nec euismod. Nullam at porttitor eros. Suspendisse id nulla pellentesque, tincidunt velit nec, malesuada orci. Nunc vel nunc a purus dignissim gravida. Sed posuere nisl sit amet diam pulvinar auctor. Cras luctus, arcu sed gravida interdum, nulla tortor convallis nisl, a luctus lacus sapien nec augue. Morbi quis ornare nulla.</p>\r\n<p>&nbsp;</p>\r\n<p>Pellentesque lobortis sem a quam faucibus, id tristique quam ultricies. Donec eget tincidunt augue, et scelerisque odio. Nunc pretium ligula in molestie congue. Sed tristique vulputate felis eu tristique. Etiam quis lorem mollis, sagittis diam ut, facilisis magna. In tellus sapien, suscipit vitae varius non, lacinia id massa. Sed ultricies aliquam massa, sagittis pulvinar ante mattis non. Nunc varius ex a posuere blandit. Nam vel gravida massa, non tempus erat.</p>', 0, 0, 0, '2020-09-18 06:59:49', '2020-10-08 03:37:16'),
(7, 4, 6, 'ultricies molestie augue venenatis id33', 'ultricies-molestie-augue-venenatis-id33', 'ultricies-molestie-augue-venenatis-id33-2020-10-19-5f8ddde5c53ac.jpg', '<p>Donec maximus egestas tortor, ultricies molestie augue venenatis id. Nullam feugiat sit amet ex non rhoncus. Aliquam dui elit, tincidunt sit amet lacus vel, tincidunt laoreet arcu. Nunc a est vestibulum diam vestibulum imperdiet. Fusce lobortis eu tortor sed rutrum. Aenean ut ipsum egestas, facilisis magna non, aliquam odio. Curabitur eu semper risus. Quisque quis sapien pretium, sollicitudin mi ut, dapibus lorem. Vivamus sollicitudin tempus pretium. Quisque ut elit eu nibh sagittis luctus sit amet ac arcu. Donec finibus massa sit amet velit pretium feugiat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque eu tempor ipsum. In ac ipsum tempor, rhoncus sem sit amet, lobortis odio.</p>\r\n<p>Nunc vitae vulputate metus, ut dictum dui. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed non odio ex. Phasellus justo libero, sollicitudin et turpis sed, pulvinar imperdiet lectus. Ut eget commodo orci, in mattis erat. Phasellus feugiat rhoncus nisl. Aliquam egestas ornare mi, in semper mi laoreet ac. Phasellus nec tincidunt eros. Praesent laoreet metus velit, nec porta nisi vulputate vel. Ut eget viverra dolor. In ut nulla vulputate leo viverra egestas. Morbi blandit neque vel tellus tempus lobortis. Vivamus metus nibh, bibendum et ultrices ut, semper eu diam. Proin ultrices et nisl ut venenatis. Cras in nulla id nisi vehicula laoreet. Curabitur tempus fringilla tempus.</p>\r\n<p>Integer ut dapibus mauris. Curabitur lobortis finibus mollis. Vestibulum ultrices non nisi in scelerisque. Fusce id dui vitae sapien sodales ullamcorper et sit amet mauris. Donec tincidunt dui vitae risus gravida, non congue purus pellentesque. Donec et rutrum nisl, vel sollicitudin elit. Vestibulum odio odio, feugiat sit amet vestibulum vel, maximus eu dolor.</p>', 0, 0, 0, '2020-10-19 12:18:18', '2020-10-19 12:41:43'),
(9, 4, 6, 'ictum dui. Interdum et malesuada fames ac ante ipsum', 'ictum-dui-interdum-et-malesuada-fames-ac-ante-ipsum', '-2020-10-19-5f8de003c7c79.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a hendrerit risus. Integer ex sapien, auctor sit amet aliquam eu, varius a magna. In hac habitasse platea dictumst. Nam ultricies dapibus arcu, sed cursus ex consectetur eget. Nam purus metus, pellentesque id mattis vel, blandit ac augue. Duis vehicula tellus sit amet turpis dictum porttitor vulputate ut tellus. Donec laoreet lacinia convallis. Vestibulum ut sagittis massa. Etiam ornare sapien velit, non tristique magna tempus at. Sed quis risus turpis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ac nisi at lacus consequat interdum nec ac ex. Vivamus cursus lacus in lacinia mollis. Nunc mollis interdum maximus. Nulla bibendum sem quis lectus aliquet, quis efficitur ligula finibus.</p>\r\n<p>Donec maximus egestas tortor, ultricies molestie augue venenatis id. Nullam feugiat sit amet ex non rhoncus. Aliquam dui elit, tincidunt sit amet lacus vel, tincidunt laoreet arcu. Nunc a est vestibulum diam vestibulum imperdiet. Fusce lobortis eu tortor sed rutrum. Aenean ut ipsum egestas, facilisis magna non, aliquam odio. Curabitur eu semper risus. Quisque quis sapien pretium, sollicitudin mi ut, dapibus lorem. Vivamus sollicitudin tempus pretium. Quisque ut elit eu nibh sagittis luctus sit amet ac arcu. Donec finibus massa sit amet velit pretium feugiat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque eu tempor ipsum. In ac ipsum tempor, rhoncus sem sit amet, lobortis odio.</p>\r\n<p>Nunc vitae vulputate metus, ut dictum dui. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed non odio ex. Phasellus justo libero, sollicitudin et turpis sed, pulvinar imperdiet lectus. Ut eget commodo orci, in mattis erat. Phasellus feugiat rhoncus nisl. Aliquam egestas ornare mi, in semper mi laoreet ac. Phasellus nec tincidunt eros. Praesent laoreet metus velit, nec porta nisi vulputate vel. Ut eget viverra dolor. In ut nulla vulputate leo viverra egestas. Morbi blandit neque vel tellus tempus lobortis. Vivamus metus nibh, bibendum et ultrices ut, semper eu diam. Proin ultrices et nisl ut venenatis. Cras in nulla id nisi vehicula laoreet. Curabitur tempus fringilla tempus.</p>\r\n<p>Integer ut dapibus mauris. Curabitur lobortis finibus mollis. Vestibulum ultrices non nisi in scelerisque. Fusce id dui vitae sapien sodales ullamcorper et sit amet mauris. Donec tincidunt dui vitae risus gravida, non congue purus pellentesque. Donec et rutrum nisl, vel sollicitudin elit. Vestibulum odio odio, feugiat sit amet vestibulum vel, maximus eu dolor.</p>\r\n<p>Quisque vestibulum rutrum posuere. Mauris dictum eros non augue euismod volutpat. Nulla laoreet arcu sed mauris gravida dapibus. In sit amet nibh id quam accumsan hendrerit. Vivamus eget ex tempus, semper urna a, volutpat libero. Nulla egestas eu eros quis lacinia. Ut suscipit ipsum et eros pulvinar, at euismod justo porta. Vestibulum blandit pulvinar erat et accumsan. Donec sed condimentum metus, vitae tempor ante. Mauris rhoncus sem ut turpis consectetur mattis. Praesent eget urna neque. Mauris fermentum massa vel ipsum commodo pulvinar. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent at auctor orci, porttitor pharetra turpis. Fusce tempor purus ac suscipit fermentum. Nullam so</p>', 0, 0, 0, '2020-10-19 12:50:44', '2020-10-19 12:50:44'),
(10, 5, 8, 'Vestibulum porttitor neque at lobortis', 'vestibulum-porttitor-neque-at-lobortis', '-2020-10-20-5f8e741f96471.jpg', '<p>Morbi vulputate lectus sit amet rhoncus tincidunt. Nunc a turpis eget sapien elementum rutrum vitae ut leo. Donec fringilla egestas justo vitae ullamcorper. Donec lacinia lectus vitae suscipit varius. In accumsan nunc eu nisi posuere mollis. Nam eget purus a tortor tempus feugiat vitae quis libero. Nulla at sem sapien. Maecenas accumsan malesuada tempus. Nullam vitae erat in massa commodo maximus. Etiam ut purus at risus porta porta sit amet vel lacus. Ut eu tristique lectus, non mattis lacus. Vestibulum vitae ante ligula. Donec ultricies pretium nisi, eu viverra elit eleifend id. Proin id justo tristique, aliquam lectus sed, maximus ante. Curabitur sollicitudin tellus ut consequat dapibus.</p>\r\n<p>Sed tempus diam ut nisi consequat ultrices. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed a ante dignissim, luctus felis nec, tristique nisl. Quisque pretium quam eu ipsum efficitur congue. Suspendisse accumsan enim sed mi rhoncus efficitur. Praesent nec consequat turpis. Morbi pretium nisi lacus, ut dapibus odio efficitur ut. Nullam in congue nunc. Nunc fermentum nibh tincidunt felis tincidunt, a lobortis dui auctor. Etiam aliquam, nunc a bibendum vestibulum, mi nibh tincidunt nisl, eget luctus eros ante ac tortor. Praesent imperdiet, leo condimentum elementum aliquam, sem orci volutpat arcu, vel tempor libero enim et libero. Mauris eget dictum mauris. Aliquam dignissim facilisis massa in vulputate.</p>\r\n<p>Fusce eget fermentum diam. Quisque quam nibh, posuere eget erat id, congue consectetur lectus. Vestibulum dolor nisi, efficitur a finibus quis, tincidunt id leo. Vestibulum porttitor, neque at lobortis condimentum, arcu tortor euismod turpis, eu accumsan elit purus at ex. Curabitur sed tincidunt massa. Nunc rhoncus lacus at ornare blandit. Suspendisse eu sagittis odio. Morbi tristique, risus posuere vehicula fringilla, mauris neque lacinia arcu, in ornare lectus orci vel nisl. Fusce dictum tempus lectus vitae hendrerit. Aenean euismod porttitor ex, non dapibus elit placerat vitae. Morbi dapibus nisi vestibulum, maximus augue ut, faucibus nisi.&nbsp;</p>', 0, 0, 0, '2020-10-19 23:22:40', '2020-10-19 23:22:40');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2020-09-17 02:08:56', '2020-09-17 02:08:56'),
(2, 2, 4, '2020-09-17 02:17:40', '2020-09-17 02:17:40'),
(3, 2, 6, '2020-09-17 02:17:40', '2020-09-17 02:17:40'),
(4, 2, 7, '2020-09-17 02:17:40', '2020-09-17 02:17:40'),
(15, 4, 7, '2020-09-17 03:32:33', '2020-09-17 03:32:33'),
(16, 4, 8, '2020-09-17 03:32:34', '2020-09-17 03:32:34'),
(17, 5, 6, '2020-09-17 22:44:56', '2020-09-17 22:44:56'),
(18, 5, 7, '2020-09-17 22:44:56', '2020-09-17 22:44:56'),
(19, 5, 8, '2020-09-17 22:44:56', '2020-09-17 22:44:56'),
(20, 6, 2, '2020-09-18 06:59:49', '2020-09-18 06:59:49'),
(21, 6, 6, '2020-09-18 06:59:49', '2020-09-18 06:59:49'),
(22, 6, 7, '2020-09-18 06:59:49', '2020-09-18 06:59:49'),
(23, 7, 1, '2020-10-19 12:18:18', '2020-10-19 12:18:18'),
(24, 7, 5, '2020-10-19 12:18:18', '2020-10-19 12:18:18'),
(25, 7, 6, '2020-10-19 12:18:18', '2020-10-19 12:18:18'),
(26, 7, 7, '2020-10-19 12:18:18', '2020-10-19 12:18:18'),
(27, 7, 8, '2020-10-19 12:18:18', '2020-10-19 12:18:18'),
(28, 7, 9, '2020-10-19 12:41:43', '2020-10-19 12:41:43'),
(33, 9, 2, '2020-10-19 12:50:44', '2020-10-19 12:50:44'),
(34, 9, 6, '2020-10-19 12:50:44', '2020-10-19 12:50:44'),
(35, 9, 7, '2020-10-19 12:50:44', '2020-10-19 12:50:44'),
(36, 9, 8, '2020-10-19 12:50:44', '2020-10-19 12:50:44'),
(37, 10, 4, '2020-10-19 23:22:40', '2020-10-19 23:22:40'),
(38, 10, 6, '2020-10-19 23:22:40', '2020-10-19 23:22:40'),
(39, 10, 7, '2020-10-19 23:22:40', '2020-10-19 23:22:40'),
(40, 10, 8, '2020-10-19 23:22:40', '2020-10-19 23:22:40'),
(41, 11, 2, '2020-10-20 01:06:27', '2020-10-20 01:06:27'),
(42, 11, 3, '2020-10-20 01:06:27', '2020-10-20 01:06:27'),
(43, 11, 4, '2020-10-20 01:06:27', '2020-10-20 01:06:27'),
(44, 12, 3, '2020-10-20 01:07:19', '2020-10-20 01:07:19'),
(45, 12, 7, '2020-10-20 01:07:19', '2020-10-20 01:07:19'),
(46, 12, 9, '2020-10-20 01:07:19', '2020-10-20 01:07:19');

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
(10, 'Madam Korri', 'mosadek-hossan-2020-06-28-5ef8cf7dd37f9.png', 2, 'We use relevant social media marketing services such as Twitter, Facebook, Google Plus', NULL, 5, '2020-06-28 09:21:51', '2020-06-28 11:15:24'),
(11, 'Bishwajit Roy', 'bishwajit-roy-2020-09-16-5f61b976ba1a9.jpg', 4, 'nice post', NULL, 5, '2020-09-16 01:06:31', '2020-09-16 01:06:31'),
(12, 'dsfsdf', 'dsfsdf-2020-10-08-5f7edc1535823.jpg', 10, 'sdfsfsf', NULL, 5, '2020-10-08 03:29:57', '2020-10-08 03:29:57'),
(13, 'Sajib Roy', 'sajib-roy-2020-10-09-5f80008ede3cb.jpg', 1, 'Good job', NULL, 5, '2020-10-09 00:17:50', '2020-10-09 00:17:50'),
(14, 'Sammim Seikh', 'sammim-seikh-2020-10-09-5f8000e62125b.jpg', 1, 'Average service', NULL, 3, '2020-10-09 00:19:18', '2020-10-09 00:19:18');

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
(1, 3, 'Facebook Likes', '<h3><strong>1000 Facebook Likes</strong></h3>', '<p>Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing s</p>\r\n<p>ocial media campaigns for businesses.Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing social media campaigns for businesses.</p>\r\n<p>Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing s</p>\r\n<p>ocial media campaigns for businesses.Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing social media campaigns for businesses.</p>\r\n<p>Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing s</p>\r\n<p>ocial media campaigns for businesses.Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing social media campaigns for businesses.</p>', 'facebook-likes', 1000, '50.00', 0, NULL, 1, '2020-06-25 14:41:12', '2020-10-09 00:16:26'),
(2, 3, 'Facebook Post Likes', '<p><strong>Top social media marketing services</strong></p>\r\n<p>for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing s</p>', '<p>Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing s</p>\r\n<p>ocial media campaigns for businesses.Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing social media campaigns for businesses.</p>\r\n<p>Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing s</p>\r\n<p>ocial media campaigns for businesses.Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing social media campaigns for businesses.</p>', 'facebook-post-likes', 1000, '50.00', 0, NULL, 1, '2020-06-25 14:41:48', '2020-06-25 14:41:48'),
(3, 7, 'Instagram Followers', '<p>Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing s</p>\r\n<p>ocial media campaigns for businesses.Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing social media campaigns for businesses</p>', '<p>Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing s</p>\r\n<p>ocial media campaigns for businesses.Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing social media campaigns for businesses.</p>\r\n<p>Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing s</p>\r\n<p>ocial media campaigns for businesses.Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing social media campaigns for businesses.</p>', 'instagram-followers', 1000, '50.00', 0, NULL, 1, '2020-06-25 14:42:22', '2020-06-25 14:42:22'),
(4, 6, 'Twiiter followers', '<h3>Top social media marketing</h3>\r\n<p>services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing s</p>', '<h3>Top social media marketing services</h3>\r\n<p>Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing s</p>\r\n<p>ocial media campaigns for businesses.Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing social media campaigns for businesses.</p>\r\n<p>Top social media marketing services for all businesses. We use relevant social media marketing services such as Twitter, Facebook, Google Plus, and Instagram, Youtube to help businesses grow and meet their goals.We create and manage top-performing s</p>', 'twiiter-followers', 5000, '100.00', 0, NULL, 1, '2020-06-25 14:43:50', '2020-06-28 08:25:39'),
(6, 6, 'Twitter Likes', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellus</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellusLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellusLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellus</p>', 'twitter-likes', 1000, '50.00', 0, NULL, 1, '2020-06-29 07:19:17', '2020-06-29 07:19:17'),
(7, 3, 'Facebook Comment', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellusLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellusLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellus</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellusLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellusLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellusLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque ele</p>\r\n<p>mentum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellusLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellus</p>', 'facebook-comment', 1000, '50.00', 0, NULL, 1, '2020-06-29 07:21:50', '2020-06-29 07:21:50'),
(8, 7, 'Instagram Comments', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellusLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellus</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellusLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellusLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellusLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dol</p>\r\n<p>or id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellusLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellusLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellusLorem ipsum dolor sit amet, conse</p>\r\n<p>ctetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellusLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris libero. Quisque elementum dolor id est congue feugiat nec in ipsum. Mauris in blandit erat. Proin tellus</p>', 'instagram-comments', 1000, '50.00', 0, NULL, 1, '2020-06-29 07:25:22', '2020-06-29 07:33:36'),
(9, 3, 'We get off on designing awesome websites', '<div class=\"kc-elm kc-css-87823 kc_text_block\">\r\n<p>WE LOVE DESIGNING, CREATING, AND MARKETING ONLINE</p>\r\n</div>\r\n<div class=\"kc-elm kc-css-111842 kc_text_block\">\r\n<p>We create amazing results for our (growing) list of pioneering clients. We&rsquo;re not just an agency, we&rsquo;re a trusted partner.&nbsp;We work hard, we care about our clients, and we&rsquo;re upfront with them.&nbsp;Our team is committed to finding the most innovative and authentic ways to help every partner exceed the goals unique to them.</p>\r\n<p>We get off on designing awesome websites, are social media amplification experts, love making logos and illustrations, launch top-quality targeted content marketing campaigns, and more&hellip;&nbsp; Whether its a fully responsive website, creative marketing campaign, e-commerce platform or technical web services, we strive to empower and enlighten.</p>\r\n</div>', '<div class=\"kc-elm kc-css-87823 kc_text_block\">\r\n<p>WE LOVE DESIGNING, CREATING, AND MARKETING ONLINE</p>\r\n</div>\r\n<div class=\"kc-elm kc-css-111842 kc_text_block\">\r\n<p>We create amazing results for our (growing) list of pioneering clients. We&rsquo;re not just an agency, we&rsquo;re a trusted partner.&nbsp;We work hard, we care about our clients, and we&rsquo;re upfront with them.&nbsp;Our team is committed to finding the most innovative and authentic ways to help every partner exceed the goals unique to them.</p>\r\n<p>We get off on designing awesome websites, are social media amplification experts, love making logos and illustrations, launch top-quality targeted content marketing campaigns, and more&hellip;&nbsp; Whether its a fully responsive website, creative marketing campaign, e-commerce platform or technical web services, we strive to empower and enlighten.</p>\r\n<div class=\"kc-elm kc-css-87823 kc_text_block\">\r\n<p>WE LOVE DESIGNING, CREATING, AND MARKETING ONLINE</p>\r\n</div>\r\n<div class=\"kc-elm kc-css-111842 kc_text_block\">\r\n<p>We create amazing results for our (growing) list of pioneering clients. We&rsquo;re not just an agency, we&rsquo;re a trusted partner.&nbsp;We work hard, we care about our clients, and we&rsquo;re upfront with them.&nbsp;Our team is committed to finding the most innovative and authentic ways to help every partner exceed the goals unique to them.</p>\r\n<p>We get off on designing awesome websites, are social media amplification experts, love making logos and illustrations, launch top-quality targeted content marketing campaigns, and more&hellip;&nbsp; Whether its a fully responsive website, creative marketing campaign, e-commerce platform or technical web services, we strive to empower and enlighten.</p>\r\n<div class=\"kc-elm kc-css-87823 kc_text_block\">\r\n<p>WE LOVE DESIGNING, CREATING, AND MARKETING ONLINE</p>\r\n</div>\r\n<div class=\"kc-elm kc-css-111842 kc_text_block\">\r\n<p>We create amazing results for our (growing) list of pioneering clients. We&rsquo;re not just an agency, we&rsquo;re a trusted partner.&nbsp;We work hard, we care about our clients, and we&rsquo;re upfront with them.&nbsp;Our team is committed to finding the most innovative and authentic ways to help every partner exceed the goals unique to them.</p>\r\n<p>We get off on designing awesome websites, are social media amplification experts, love making logos and illustrations, launch top-quality targeted content marketing campaigns, and more&hellip;&nbsp; Whether its a fully responsive website, creative marketing campaign, e-commerce platform or technical web services, we strive to empower and enlighten.</p>\r\n</div>\r\n</div>\r\n</div>', 'we-get-off-on-designing-awesome-websites', 1000, '25.00', 0, NULL, 1, '2020-09-25 13:35:35', '2020-09-25 13:35:35'),
(10, 3, 'pioneering clients Face', '<div class=\"kc-elm kc-css-87823 kc_text_block\">\r\n<p>WE LOVE DESIGNING, CREATING, AND MARKETING ONLINE</p>\r\n</div>\r\n<div class=\"kc-elm kc-css-111842 kc_text_block\">\r\n<p>We create amazing results for our (growing) list of pioneering clients. We&rsquo;re not just an agency, we&rsquo;re a trusted partner.&nbsp;We work hard, we care about our clients, and we&rsquo;re upfront with them.&nbsp;Our team is committed to finding the most innovative and authentic ways to help every partner exceed the goals unique to them.</p>\r\n<p>We get off on designing awesome websites, are social media amplification experts, love making logos and illustrations, launch top-quality targeted content marketing campaigns, and more&hellip;&nbsp; Whether its a fully responsive website, creative marketing campaign, e-commerce platform or technical web services, we strive to empower and enlighten.</p>\r\n<div class=\"kc-elm kc-css-87823 kc_text_block\">\r\n<p>.</p>\r\n</div>\r\n<div class=\"kc-elm kc-css-111842 kc_text_block\">&nbsp;</div>\r\n</div>', '<div class=\"kc-elm kc-css-87823 kc_text_block\">\r\n<p>Our team is committed to finding the most innovative and authentic ways to help every partner exceed the goals unique to them.</p>\r\n</div>\r\n<div class=\"kc-elm kc-css-111842 kc_text_block\">\r\n<p>We get off on designing awesome websites, are social media amplification experts, love making logos and illustrations, launch top-quality targeted content marketing campaigns, and more&hellip;&nbsp; Whether its a fully responsive website, creative marketing campaign, e-commerce platform or technical web services, we strive to empower and enlighten</p>\r\n<div class=\"kc-elm kc-css-87823 kc_text_block\">\r\n<p>WE LOVE DESIGNING, CREATING, AND MARKETING ONLINE</p>\r\n</div>\r\n<div class=\"kc-elm kc-css-111842 kc_text_block\">\r\n<p>We create amazing results for our (growing) list of pioneering clients. We&rsquo;re not just an agency, we&rsquo;re a trusted partner.&nbsp;We work hard, we care about our clients, and we&rsquo;re upfront with them.&nbsp;Our team is committed to finding the most innovative and authentic ways to help every partner exceed the goals unique to them.</p>\r\n<p>We get off on designing awesome websites, are social media amplification experts, love making logos and illustrations, launch top-quality targeted content marketing campaigns, and more&hellip;&nbsp; Whether its a fully responsive website, creative marketing campaign, e-commerce platform or technical web services, we strive to empower and enlighten</p>\r\n</div>\r\n</div>', 'pioneering-clients-face', 1000, '25.00', 0, NULL, 1, '2020-09-25 13:45:33', '2020-10-08 11:23:03'),
(11, 6, 'Twiiter committed to findinee', '<div class=\"kc-elm kc-css-87823 kc_text_block\">\r\n<p>We create amazing results for our (growing) list of pioneering clients. We&rsquo;re not just an agency, we&rsquo;re a trusted partner.&nbsp;We work hard, we care about our clients, and we&rsquo;re upfront with them.&nbsp;Our team is committed to finding the most innovative and authentic ways to help every partner exceed the goals unique to them.</p>\r\n</div>\r\n<div class=\"kc-elm kc-css-111842 kc_text_block\">\r\n<p>We get off on designing awesome websites, are social media amplification experts, love making logos and illustrations, launch top-quality targeted content marketing campaigns, and more&hellip;&nbsp; Whether its a fully responsive website, creative marketing campaign, e-commerce platform or technical web services, we strive to empower and enlighten.</p>\r\n</div>', '<div class=\"kc-elm kc-css-87823 kc_text_block\">\r\n<p>We create amazing results for our (growing) list of pioneering clients. We&rsquo;re not just an agency, we&rsquo;re a trusted partner.&nbsp;We work hard, we care about our clients, and we&rsquo;re upfront with them.&nbsp;Our team is committed to finding the most innovative and authentic ways to help every partner exceed the goals unique to them.</p>\r\n</div>\r\n<div class=\"kc-elm kc-css-111842 kc_text_block\">\r\n<p>We get off on designing awesome websites, are social media amplification experts, love making logos and illustrations, launch top-quality targeted content marketing campaigns, and more&hellip;&nbsp; Whether its a fully responsive website, creative marketing campaign, e-commerce platform or technical web services, we strive to empower and enlighten.</p>\r\n<div class=\"kc-elm kc-css-87823 kc_text_block\">\r\n<p>WE LOVE DESIGNING, CREATING, AND MARKETING ONLINE</p>\r\n</div>\r\n<div class=\"kc-elm kc-css-111842 kc_text_block\">\r\n<p>We create amazing results for our (growing) list of pioneering clients. We&rsquo;re not just an agency, we&rsquo;re a trusted partner.&nbsp;We work hard, we care about our clients, and we&rsquo;re upfront with them.&nbsp;Our team is committed to finding the most innovative and authentic ways to help every partner exceed the goals unique to them.</p>\r\n<p>We get off on designing awesome websites, are social media amplification experts, love making logos and illustrations, launch top-quality targeted content marketing campaigns, and more&hellip;&nbsp; Whether its a fully responsive website, creative marketing campaign, e-commerce platform or technical web services, we strive to empower and enlighten.</p>\r\n<div class=\"kc-elm kc-css-87823 kc_text_block\">\r\n<p>WE LOVE DESIGNING, CREATING, AND MARKETING ONLINE</p>\r\n</div>\r\n<div class=\"kc-elm kc-css-111842 kc_text_block\">\r\n<p>We create amazing results for our (growing) list of pioneering clients. We&rsquo;re not just an agency, we&rsquo;re a trusted partner.&nbsp;We work hard, we care about our clients, and we&rsquo;re upfront with them.&nbsp;Our team is committed to finding the most innovative and authentic ways to help every partner exceed the goals unique to them.</p>\r\n<p>We get off on designing awesome websites, are social media amplification experts, love making logos and illustrations, launch top-quality targeted content marketing campaigns, and more&hellip;&nbsp; Whether its a fully responsive website, creative marketing campaign, e-commerce platform or technical web services, we strive to empower and enlighten.</p>\r\n</div>\r\n</div>\r\n</div>', 'twiiter-committed-to-findinee', 1000, '25.00', 0, NULL, 1, '2020-09-25 13:55:15', '2020-10-08 11:22:35');

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
(10, 10, 'our-growing-list-of-pioneering-clients-wer-2020-09-25-5f6e48ddf2475.jpg', '2020-09-25 13:45:34', '2020-09-25 13:45:34'),
(18, 9, 'we-get-off-on-designing-awesome-websites-2020-09-25-5f6e60c5af7fa.jpg', '2020-09-25 15:27:34', '2020-09-25 15:27:34'),
(27, 11, 'ur-team-is-committed-to-findin-2020-09-26-5f6f5650639aa.jpg', '2020-09-26 08:55:14', '2020-09-26 08:55:14'),
(28, 11, 'ur-team-is-committed-to-findin-2020-09-26-5f6f56529e9e9.png', '2020-09-26 08:55:14', '2020-09-26 08:55:14'),
(29, 11, 'ur-team-is-committed-to-findin-2020-09-26-5f6f5652cf7db.png', '2020-09-26 08:55:15', '2020-09-26 08:55:15');

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
(42, 4, 7, '2020-06-29 14:04:19', '2020-06-29 14:04:19'),
(43, 9, 1, '2020-09-25 13:35:36', '2020-09-25 13:35:36'),
(44, 9, 3, '2020-09-25 13:35:36', '2020-09-25 13:35:36'),
(45, 9, 4, '2020-09-25 13:35:36', '2020-09-25 13:35:36'),
(46, 10, 1, '2020-09-25 13:45:34', '2020-09-25 13:45:34'),
(47, 10, 2, '2020-09-25 13:45:34', '2020-09-25 13:45:34'),
(48, 10, 4, '2020-09-25 13:45:34', '2020-09-25 13:45:34'),
(49, 11, 1, '2020-09-25 13:55:16', '2020-09-25 13:55:16'),
(50, 11, 2, '2020-09-25 13:55:16', '2020-09-25 13:55:16'),
(51, 11, 3, '2020-09-25 13:55:16', '2020-09-25 13:55:16'),
(52, 12, 1, '2020-10-08 03:30:43', '2020-10-08 03:30:43'),
(53, 12, 2, '2020-10-08 03:30:43', '2020-10-08 03:30:43'),
(54, 12, 3, '2020-10-08 03:30:43', '2020-10-08 03:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_banner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_contact` text COLLATE utf8mb4_unicode_ci,
  `header_title` text COLLATE utf8mb4_unicode_ci,
  `footer_copyright` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `favicon`, `home_banner`, `top_contact`, `header_title`, `footer_copyright`, `created_at`, `updated_at`) VALUES
(1, 'RNWPGDrjnF-2020-09-20-5f67b18246235.png', 'Xtmd539AdY-2020-10-08-5f7ed83c8e1c6.png', '1ilGhj6hCg-2020-09-20-5f67b18249cf8.jpg', '<p>Email: support@topsmmseoservices | Contact: +8801916003132</p>', '<p>SOCIAL MEDIA MARKETING AND SEO SERVICES</p>', '<p>| Copyright &copy; 2018-2020 TopSMMServices<br />| All Rights Reserved. Develop by&nbsp;<a href=\"https://fixdesignbd.com/\" target=\"_blank\">Fix Design BD</a></p>', '2020-09-20 12:45:21', '2020-10-08 03:13:33');

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
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rss` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `facebook`, `twitter`, `instagram`, `pinterest`, `youtube`, `linkedin`, `rss`, `created_at`, `updated_at`) VALUES
(1, 'https://www.facebook.com/topsmmseoservices', 'https://www.twitter.com/topsmmseoservices', 'https://www.instagram.com/topsmmseoservices', 'https://www.pinterest.com/topsmmseoservices', 'https://www.youtube.com/topsmmseoservices', 'https://www.linkedin.com/topsmmseoservices', 'https://www.rss.com/topsmmseoservices', '2020-09-21 04:57:17', '2020-09-21 05:14:31');

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
(9, 'Instagram likes', 'instagram-likes', '2020-06-29 14:00:29', '2020-06-29 14:00:29'),
(10, 'Linkedin', 'linkedin', '2020-09-23 07:59:48', '2020-09-23 07:59:48');

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
(1, 1, 'Tanushri', 'Roy', 'admin', 'roybishwajit06@gmail.com', '01911087057', '-2020-07-06-5f037a5875560.jpg', NULL, '$2y$10$tToKEnfT59VfJXhyLnK0d.AX4fvzmDoKJuiI.UyXQtO6Hp28iMx.C', '140/10 Nirala R/A', 3, 5, 1, '127.0.0.1', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from', '3yTL80jqAPgVChBbu3QkxLHo2jjz1DPwTSmFQx4Fw2LN7dHVn7YCfGO4F6YI', NULL, '2020-10-08 23:55:24'),
(2, 2, 'Mr', 'Customer', 'customer', 'customer@fixdesignbd.com', '01912761001', NULL, NULL, '$2y$10$2JiwU8hmRytdrAN2kkT.O.TqXB8if0OyMjoAZ2mbn/YLNkbcveUZW', '140/10 Pabla R/A', 2, 3, 1, NULL, NULL, 'ikLlUCi8TjoRuM0dGoJ2QLAlaR0HQxcA2yQ17tZOi3IFpyZAj7jcinAK8zBz', NULL, NULL),
(4, 2, 'Sajib', 'Roy', 'sajib_roy', 'raybishwa06@gmail.com', '546464654445', '-2020-10-20-5f8e882a22fa8.jpg', NULL, '$2y$10$Enu0gGr9bZU5IN178xYil.SXYcn1He6oaFedvkXWcKTJys5rJfJFG', 'Nitrala R/A', 1, 3, 1, '127.0.0.1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a hendrerit risus. Integer ex sapien, auctor sit amet aliquam eu, varius a magna. In hac habitasse platea dictumst. Nam ultricies dapibus arcu, sed cursus ex consectetur eget. Nam purus metus, pellentesque id matti', NULL, '2020-10-19 10:50:16', '2020-10-20 00:48:10'),
(5, 2, 'Richard', 'Proulx', 'kesewa6108', 'kesewa6108@glenwoodave.com', '313131313111', '-2020-10-20-5f8e88444fde6.jpg', NULL, '$2y$10$y09pqp0HRi4lexVwQQuJR.04TG7CL3/hwe/.MYhgOWegNJWdDRZXC', 'Nirala R/A', 3, 5, 1, '127.0.0.1', NULL, NULL, '2020-10-19 23:18:53', '2020-10-20 00:48:36'),
(7, 2, 'Sdimo', 'Vlimo', 'lilimol304', 'lilimol304@nic58.com', '4353465436436', NULL, NULL, '$2y$10$4bT/8ZQ9scCvxe.5x.t3veJgX5S3KfWBTkaNLGDXJD4RJDkj5p6Uq', 'sdgfdgdg', 1, 1, 1, '127.0.0.1', 'gdfgfdgdf fghdf hdfhdf hdf fd fd dfdf dfhdfdfhdf', 'NVofyR1yopwpifGKn0vRzGPuWEYiYVc706Pg1obherFZu5ttS8mB2vtgn68g', '2020-10-20 01:52:38', '2020-10-20 03:10:13');

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
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
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
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_menu_items`
--
ALTER TABLE `admin_menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `service_images`
--
ALTER TABLE `service_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `service_tag`
--
ALTER TABLE `service_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_menu_items`
--
ALTER TABLE `admin_menu_items`
  ADD CONSTRAINT `admin_menu_items_menu_foreign` FOREIGN KEY (`menu`) REFERENCES `admin_menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
