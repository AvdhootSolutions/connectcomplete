-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2021 at 02:10 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `connectdemo`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(10, '2021_01_28_121444_create_categories_table', 1),
(31, '2014_10_12_000000_create_users_table', 2),
(32, '2014_10_12_100000_create_password_resets_table', 2),
(33, '2019_08_19_000000_create_failed_jobs_table', 2),
(34, '2021_01_28_071315_create_permission_tables', 2),
(35, '2021_01_28_121444_create_tbl_categories_table', 2),
(36, '2021_01_28_122424_create_tbl_subcategories_table', 2),
(37, '2021_01_29_051349_create_tbl_child_category_table', 2),
(38, '2021_01_29_053125_add_remarks_to_tbl_categories', 3),
(39, '2021_01_29_053251_add_remarks_to_tbl_subcategories', 4),
(41, '2021_01_29_064110_add_category_id_to_tbl_child_category_table', 5),
(42, '2021_02_01_040951_add_price_to_tbl_child_category', 6),
(43, '2021_02_01_063914_create_tbl_states_table', 7),
(44, '2021_02_01_064032_create_tbl_cities_table', 8),
(45, '2021_02_01_071238_add_city_image_to_tbl_cities_table', 9),
(46, '2021_02_01_072442_create_tbl_areas_table', 10),
(47, '2021_02_01_113252_add_state_id_users', 11),
(48, '2021_02_04_123700_add_govement_proff_to_users_table', 12),
(50, '2021_02_05_045656_create_user_areas_table', 13),
(54, '2021_02_05_103821_create_tbl_corporate_categories', 14),
(55, '2021_02_05_103945_create_tbl_corporate_sub_categories', 15),
(56, '2021_02_05_110925_create_tbl_corporate_child_category', 16),
(57, '2021_02_05_111426_add_working_stage_to_tbl_child_category', 17),
(58, '2021_02_06_041459_add_user_type_to_users_table', 18),
(59, '2021_02_06_092528_create_tbl_executive_table', 19),
(60, '2021_02_06_093744_create_tbl_executive_areas_table', 20),
(61, '2021_02_06_094350_create_tbl_executive_categories_table', 21),
(62, '2021_02_07_213411_create_tbl_employee_table', 22),
(63, '2021_02_07_213654_create_tbl_employee_areas_table', 23),
(64, '2021_02_07_213844_create_tbl_employee_categories_table', 24),
(65, '2021_02_09_042204_create_tbl_individual_users_table', 25),
(66, '2021_02_09_045137_create_tbl_individual_area_table', 26),
(67, '2021_02_09_051214_create_tbl_corporate_users_table', 27),
(68, '2021_02_09_052516_create_tbl_corporate_areas_table', 28),
(69, '2021_02_09_105609_create_tbl_inquiries_table', 29),
(70, '2021_02_10_063854_create_tbl_inquiry_details_table', 30),
(71, '2021_02_10_065228_add_inquiry_status_to_tbl_inquiries__table', 31),
(72, '2021_02_10_122651_create_tbl_assigned_executive_inquiry_table', 32),
(73, '2021_02_11_051841_create_tbl_corporate_inquiries_table', 33),
(75, '2021_02_11_052126_create_tbl_corporate_inquiries_details_table', 34),
(76, '2021_02_11_061515_add_inquiry_status_to_tbl_corporate_inquiries__table', 35),
(77, '2021_02_11_062525_create_tbl_assign_crew_inquiries_table', 36),
(79, '2021_02_11_093325_create_tbl_assigned_corporate_executive_inquiry_table', 37);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 9),
(2, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 11),
(2, 'App\\Models\\User', 12);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `inquiry_id` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `subcat_id` int(11) DEFAULT NULL,
  `childcat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', NULL, NULL),
(2, 'cityadmin', 'web', NULL, NULL),
(3, 'employee', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_areas`
--

CREATE TABLE `tbl_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_areas`
--

INSERT INTO `tbl_areas` (`id`, `name`, `state_id`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 'Vastrapur', 1, 1, '2021-02-01 02:15:24', '2021-02-01 02:22:41'),
(2, 'Sarkhej', 1, 1, '2021-02-04 23:14:24', '2021-02-04 23:14:24'),
(3, 'Thaltej', 1, 1, '2021-02-04 23:14:36', '2021-02-04 23:14:36'),
(4, 'Memnagar', 1, 1, '2021-02-04 23:15:03', '2021-02-04 23:15:03'),
(5, 'Ashram Road', 1, 1, '2021-02-04 23:15:23', '2021-02-04 23:15:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assigned_corporate_crew_inquiry_table`
--

CREATE TABLE `tbl_assigned_corporate_crew_inquiry_table` (
  `id` int(11) NOT NULL,
  `corporate_inquiry_id` bigint(20) UNSIGNED DEFAULT NULL,
  `crew_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_assigned_corporate_crew_inquiry_table`
--

INSERT INTO `tbl_assigned_corporate_crew_inquiry_table` (`id`, `corporate_inquiry_id`, `crew_id`, `created_at`, `updated_at`) VALUES
(3, 1, 1, '2021-02-11 13:48:42', '2021-02-11 13:48:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assigned_corporate_executive_inquiry`
--

CREATE TABLE `tbl_assigned_corporate_executive_inquiry` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inquiry_id` bigint(20) UNSIGNED DEFAULT NULL,
  `executive_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_assigned_corporate_executive_inquiry`
--

INSERT INTO `tbl_assigned_corporate_executive_inquiry` (`id`, `inquiry_id`, `executive_id`, `created_at`, `updated_at`) VALUES
(2, 1, 3, '2021-02-12 03:11:28', '2021-02-12 03:11:28'),
(3, 1, 4, '2021-02-12 03:11:28', '2021-02-12 03:11:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assigned_executive_inquiry`
--

CREATE TABLE `tbl_assigned_executive_inquiry` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inquiry_id` bigint(20) UNSIGNED DEFAULT NULL,
  `executive_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_assigned_executive_inquiry`
--

INSERT INTO `tbl_assigned_executive_inquiry` (`id`, `inquiry_id`, `executive_id`, `created_at`, `updated_at`) VALUES
(22, 1, 3, '2021-02-12 01:41:55', '2021-02-12 01:41:55'),
(23, 1, 4, '2021-02-12 01:41:55', '2021-02-12 01:41:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assign_crew_inquiries`
--

CREATE TABLE `tbl_assign_crew_inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inquiry_id` bigint(20) UNSIGNED DEFAULT NULL,
  `crew_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_assign_crew_inquiries`
--

INSERT INTO `tbl_assign_crew_inquiries` (`id`, `inquiry_id`, `crew_id`, `created_at`, `updated_at`) VALUES
(7, 1, 1, '2021-02-11 13:33:34', '2021-02-11 13:33:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blogs`
--

CREATE TABLE `tbl_blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `author` varchar(100) NOT NULL,
  `media_type` int(10) NOT NULL,
  `blog_image` varchar(100) DEFAULT NULL,
  `video_url` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_blogs`
--

INSERT INTO `tbl_blogs` (`id`, `title`, `description`, `author`, `media_type`, `blog_image`, `video_url`, `created_at`, `updated_at`) VALUES
(1, 'test', 'teasc asdasdas dasd ada ad asd', 'test', 1, '1613134130.jpg', '', '2021-02-12 07:18:50', '2021-02-12 07:18:50'),
(2, 'asdasdasd', 'asdasdasdas', 'asdasdasd', 2, '', 'https://www.youtube.com/watch?v=QoLUB0QkUaE', '2021-02-12 07:28:13', '2021-02-12 07:44:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sorting_number` int(11) NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `category_name`, `category_image`, `sorting_number`, `remarks`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'AC Services', '1611898420.jpg', 1, 'rest', '2021-01-29 00:03:40', '2021-01-29 00:03:40', NULL),
(2, 'Carpenter', '1611898420.jpg', 1, 'rest', '2021-01-29 00:03:40', '2021-01-29 02:09:36', NULL),
(3, 'Electrician', '', 3, '', NULL, NULL, NULL),
(4, 'Plumber', '', 4, '', NULL, NULL, NULL),
(5, 'water tank cleaning', '', 5, '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_child_category`
--

CREATE TABLE `tbl_child_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `child_category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `child_category_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sorting_number` int(11) NOT NULL,
  `remarks` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `working_stage` int(11) DEFAULT NULL,
  `service_cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minimum_cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` int(3) DEFAULT '0',
  `is_trending` int(3) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_child_category`
--

INSERT INTO `tbl_child_category` (`id`, `child_category_name`, `child_category_image`, `category_id`, `subcategory_id`, `price`, `sorting_number`, `remarks`, `created_at`, `updated_at`, `deleted_at`, `working_stage`, `service_cost`, `minimum_cost`, `is_featured`, `is_trending`) VALUES
(1, 'Installation', '1611903439.jpg', 1, 1, '12400', 1, 'test', '2021-01-29 01:27:19', '2021-02-05 06:20:06', NULL, 1, '0', '12000', 1, 0),
(2, 'Removing', '1611903439.jpg', 1, 1, '12400', 1, 'test', '2021-01-29 01:27:19', '2021-02-13 05:33:33', NULL, 0, '0', '0', 1, 1),
(3, 'Mini services', '1611903439.jpg', 1, 2, '12400', 1, 'test', '2021-01-29 01:27:19', '2021-02-05 06:20:06', NULL, 1, '0', '12000', 0, 0),
(4, 'Bed & chair ', '', 2, 3, '1400', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(5, 'Cupboard & Drawer', '', 2, 3, '1600', 0, NULL, NULL, '2021-02-13 05:32:44', NULL, NULL, NULL, '0', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cities`
--

CREATE TABLE `tbl_cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `city_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_cities`
--

INSERT INTO `tbl_cities` (`id`, `name`, `state_id`, `created_at`, `updated_at`, `city_image`) VALUES
(1, 'Ahmedabad', 1, '2021-02-01 01:44:25', '2021-02-01 01:50:15', '1612163665.jpg'),
(2, 'Vadodara', 1, NULL, '2021-02-08 23:03:41', '1612845221.jpg'),
(3, 'Surat', 1, NULL, NULL, NULL),
(4, 'Rajkot', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cities_category`
--

CREATE TABLE `tbl_cities_category` (
  `id` int(20) NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cities_category`
--

INSERT INTO `tbl_cities_category` (`id`, `city_id`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '2021-02-13 12:31:40', NULL),
(3, 2, 1, '2021-02-12 06:14:48', '2021-02-12 06:14:48'),
(4, 2, 2, '2021-02-12 06:14:52', '2021-02-12 06:14:52'),
(5, 1, 2, '2021-02-13 00:38:59', '2021-02-13 00:38:59'),
(6, 1, 3, '2021-02-13 00:49:42', '2021-02-13 00:49:42'),
(7, 1, 4, '2021-02-13 00:49:47', '2021-02-13 00:49:47'),
(8, 2, 4, '2021-02-13 00:50:07', '2021-02-13 00:50:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_corporate_areas`
--

CREATE TABLE `tbl_corporate_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `corporate_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `area_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_corporate_areas`
--

INSERT INTO `tbl_corporate_areas` (`id`, `corporate_id`, `city_id`, `area_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, NULL, NULL),
(2, 1, 1, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_corporate_categories`
--

CREATE TABLE `tbl_corporate_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sorting_number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_corporate_categories`
--

INSERT INTO `tbl_corporate_categories` (`id`, `category_name`, `category_image`, `sorting_number`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Electronics', 'test', 1, NULL, NULL, NULL),
(2, 'Furniture', 'test', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_corporate_child_category`
--

CREATE TABLE `tbl_corporate_child_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `child_category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `child_category_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sorting_number` int(11) NOT NULL,
  `remarks` int(11) NOT NULL,
  `working_stage` int(11) DEFAULT NULL,
  `service_cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minimum_cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_corporate_child_category`
--

INSERT INTO `tbl_corporate_child_category` (`id`, `child_category_name`, `child_category_image`, `subcategory_id`, `sorting_number`, `remarks`, `working_stage`, `service_cost`, `minimum_cost`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Compressor', 'test', 1, 1, 22, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Cooling Fan', 'test', 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'screen', 'asd', 2, 1, 1, 1, NULL, NULL, NULL, NULL, NULL),
(4, 'wooden touch', 'test', 3, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'drawer', 'asd', 4, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_corporate_inquiries`
--

CREATE TABLE `tbl_corporate_inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `area_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inquiry_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `inquiry_status` enum('0','1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 =Open 1=Close (by CLient /  by Admin) 2 = Succesfully Completed 3=ASSIGN TO EXECUTIVE 4 = ASSIGN TO CREW ',
  `inquiry_stage` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 =Pending 1=Completed  2 = Executive 3=Crew ',
  `inquiry_sub_stage` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_corporate_inquiries`
--

INSERT INTO `tbl_corporate_inquiries` (`id`, `code`, `user_id`, `city_id`, `area_id`, `full_address`, `remarks`, `inquiry_date`, `created_at`, `updated_at`, `inquiry_status`, `inquiry_stage`, `inquiry_sub_stage`) VALUES
(1, 'cod1001', 1, 1, '1', 'test', 'asd', '2021-02-12', NULL, NULL, '0', '0', 0),
(2, 'cod1002', 2, 1, '1', 'asdsad', 'asdasd', '2021-02-12', NULL, NULL, '0', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_corporate_inquiries_details`
--

CREATE TABLE `tbl_corporate_inquiries_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `corporate_inquiry_id` bigint(20) UNSIGNED DEFAULT NULL,
  `corporate_cat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `corporate_subcat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `corporate_childcat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `prefer_time` time NOT NULL,
  `prefer_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_corporate_inquiries_details`
--

INSERT INTO `tbl_corporate_inquiries_details` (`id`, `corporate_inquiry_id`, `corporate_cat_id`, `corporate_subcat_id`, `corporate_childcat_id`, `prefer_time`, `prefer_date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, '16:03:00', '2021-02-18', NULL, NULL),
(2, 1, 1, 1, 2, '24:10:00', '2021-02-12', NULL, NULL),
(3, 2, 2, 3, 4, '22:15:00', '2021-02-15', NULL, NULL),
(4, 2, 2, 4, 5, '12:11:00', '2021-02-16', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_corporate_sub_categories`
--

CREATE TABLE `tbl_corporate_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subcategory_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sorting_number` int(11) NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_corporate_sub_categories`
--

INSERT INTO `tbl_corporate_sub_categories` (`id`, `subcategory_name`, `category_id`, `subcategory_image`, `sorting_number`, `remarks`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Refrigerator', 1, 'test', 1, '', NULL, NULL, NULL),
(2, 'Television', 1, 'test', 1, '', NULL, NULL, NULL),
(3, 'Cupboard', 2, 'test', 1, 'teast', NULL, NULL, NULL),
(4, 'Wardrobe', 2, 'test', 1, '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_corporate_users`
--

CREATE TABLE `tbl_corporate_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `registered_office_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_same_billing_address` int(11) DEFAULT NULL,
  `contact_person_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organisation_billing_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 =Inactive 1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_corporate_users`
--

INSERT INTO `tbl_corporate_users` (`id`, `company_name`, `email`, `password`, `mobile_number`, `city_id`, `area_id`, `registered_office_address`, `billing_address`, `is_same_billing_address`, `contact_person_name`, `organisation_billing_name`, `gst_number`, `pan_number`, `company_logo`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test', 'test@123.com', 'trest', '1234567899', 1, 1, 'test', 'test', 1, 'testaasd', 'ttsssdddada', 'gst number', 'pan number', 'test.jpg', '1', NULL, '2021-02-09 03:35:33', NULL),
(2, 'Kristan', 'Kristan@123.com', 'Kristan', '1234567899', 1, 1, 'Kristan', 'Kristan', 1, 'Kristan', 'Kristan', 'Kristan15151151', 'pan number', 'test.jpg', '1', NULL, '2021-02-09 03:35:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `goverment_proff` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `police_verification` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `city_admin_id`, `city_id`, `name`, `email`, `password`, `designation`, `mobile_number`, `profile_pic`, `goverment_proff`, `police_verification`, `experience`, `remarks`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 1, 'emp', 'emp@gmail.com', '$2y$10$6fyP8clpb3zMUKapFI0Fme18Z8NAc/Tvbx4iNMRRBLBK980WGugeG', 'test', '1234567890', '1612734713.jpg', '1612734713.jpg', '1612734713.jpg', '2', 'test', '2021-02-07 16:21:53', '2021-02-07 16:39:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_areas`
--

CREATE TABLE `tbl_employee_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `area_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_employee_areas`
--

INSERT INTO `tbl_employee_areas` (`id`, `employee_id`, `city_id`, `area_id`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 1, '2021-02-07 16:39:21', '2021-02-07 16:39:21'),
(4, 1, 1, 5, '2021-02-07 16:39:21', '2021-02-07 16:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_categories`
--

CREATE TABLE `tbl_employee_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_employee_categories`
--

INSERT INTO `tbl_employee_categories` (`id`, `employee_id`, `category_id`, `subcategory_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2021-02-08 05:50:33', '2021-02-08 05:50:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_executive`
--

CREATE TABLE `tbl_executive` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `goverment_proff` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `police_verification` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_executive`
--

INSERT INTO `tbl_executive` (`id`, `city_admin_id`, `city_id`, `name`, `email`, `password`, `designation`, `mobile_number`, `profile_pic`, `goverment_proff`, `police_verification`, `experience`, `remarks`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 3, 1, 'Test', 'test@gmail.com', '$2y$10$eClqMGrbhQ7N16A56mbd3.lGJoWv98ml.Tl8qSENGmFSDN6p/072a', 'test', '1234567890', '1612610024.jpg', '1612610024.jpg', '1612610024.jpg', 'test', 'test', '2021-02-06 05:43:44', '2021-02-06 06:20:00', NULL),
(3, 3, 1, 'Alex', 'alex@gmail.com', '$2y$10$eClqMGrbhQ7N16A56mbd3.lGJoWv98ml.Tl8qSENGmFSDN6p/072a', 'test', '9999999999', '1612610024.jpg', '1612610024.jpg', '1612610024.jpg', 'test', 'test', '2021-02-06 05:43:44', '2021-02-06 06:20:00', NULL),
(4, 3, 1, 'John Doe', 'john@gmail.com', '$2y$10$hOdeiXl3RuIc2uVy9vA6wegA2copUI7jSgch5FMKEpRU9bUoPX7Ra', 'test', '1234567892', '1612954007.jpg', '1612954007.jpg', '1612954007.jpg', '3', 'test', '2021-02-10 05:16:47', '2021-02-10 05:16:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_executive_areas`
--

CREATE TABLE `tbl_executive_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `executive_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `area_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_executive_areas`
--

INSERT INTO `tbl_executive_areas` (`id`, `executive_id`, `city_id`, `area_id`, `created_at`, `updated_at`) VALUES
(23, 2, 1, 1, '2021-02-06 06:20:00', '2021-02-06 06:20:00'),
(24, 2, 1, 2, '2021-02-06 06:20:00', '2021-02-06 06:20:00'),
(25, 2, 1, 3, '2021-02-06 06:20:00', '2021-02-06 06:20:00'),
(26, 2, 1, 4, '2021-02-06 06:20:00', '2021-02-06 06:20:00'),
(27, 3, 1, 1, '2021-02-06 06:20:00', '2021-02-06 06:20:00'),
(28, 3, 1, 2, '2021-02-06 06:20:00', '2021-02-06 06:20:00'),
(29, 4, 1, 1, '2021-02-10 05:16:47', '2021-02-10 05:16:47'),
(30, 4, 1, 2, '2021-02-10 05:16:47', '2021-02-10 05:16:47'),
(31, 4, 1, 5, '2021-02-10 05:16:47', '2021-02-10 05:16:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_executive_categories`
--

CREATE TABLE `tbl_executive_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `executive_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_executive_categories`
--

INSERT INTO `tbl_executive_categories` (`id`, `executive_id`, `category_id`, `subcategory_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 2, '2021-02-08 02:50:43', '2021-02-08 02:50:43'),
(3, 4, 1, 1, '2021-02-10 05:43:54', '2021-02-10 05:43:54'),
(4, 3, 1, 2, '2021-02-10 05:49:45', '2021-02-10 05:49:45'),
(5, 3, 1, 1, '2021-02-10 05:49:54', '2021-02-10 05:49:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_individual_area`
--

CREATE TABLE `tbl_individual_area` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `individual_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `area_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_individual_area`
--

INSERT INTO `tbl_individual_area` (`id`, `individual_id`, `city_id`, `area_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, NULL, NULL),
(2, 1, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_individual_users`
--

CREATE TABLE `tbl_individual_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 =Inactive 1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_individual_users`
--

INSERT INTO `tbl_individual_users` (`id`, `name`, `email`, `password`, `mobile_number`, `city_id`, `address`, `profile_photo`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'qq', 'qq@gmail.com', 'testasd', '131321545', 1, 'teast', 'test', '1', NULL, '2021-02-09 03:29:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inquiries`
--

CREATE TABLE `tbl_inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `area_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefer_time` time NOT NULL,
  `prefer_date` date NOT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inquiry_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `inquiry_status` enum('0','1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 =Open 1=Close (by CLient /  by Admin) 2 = Succesfully Completed 3=ASSIGN TO EXECUTIVE 4 = ASSIGN TO CREW ',
  `inquiry_stage` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 =Pending 1=Completed  2 = Executive 3=Crew ',
  `inquiry_sub_stage` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_inquiries`
--

INSERT INTO `tbl_inquiries` (`id`, `code`, `user_id`, `city_id`, `area_id`, `full_address`, `prefer_time`, `prefer_date`, `remarks`, `inquiry_date`, `created_at`, `updated_at`, `inquiry_status`, `inquiry_stage`, `inquiry_sub_stage`) VALUES
(1, 'code111', 1, 1, '1', 'address asd', '09:05:00', '2021-02-11', 'test', '2021-02-12', NULL, NULL, '0', '0', 0),
(2, 'code222', 1, 1, '1', 'address asd', '09:05:00', '2021-02-11', 'test', '2021-02-12', NULL, NULL, '0', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inquiry_details`
--

CREATE TABLE `tbl_inquiry_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inquiry_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subcat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `childcat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_inquiry_details`
--

INSERT INTO `tbl_inquiry_details` (`id`, `inquiry_id`, `cat_id`, `subcat_id`, `childcat_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, NULL, NULL),
(2, 1, 1, 1, 2, NULL, NULL),
(3, 1, 1, 2, 3, NULL, NULL),
(4, 2, 2, 3, 4, NULL, NULL),
(5, 2, 2, 3, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_states`
--

CREATE TABLE `tbl_states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_states`
--

INSERT INTO `tbl_states` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Gujarat', '2021-02-01 01:24:28', '2021-02-01 01:25:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategories`
--

CREATE TABLE `tbl_subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subcategory_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sorting_number` int(11) NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_subcategories`
--

INSERT INTO `tbl_subcategories` (`id`, `subcategory_name`, `category_id`, `subcategory_image`, `sorting_number`, `remarks`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Installation', 1, '1611898443.jpg', 1, 'tesdt', '2021-01-29 00:04:03', '2021-01-29 02:03:15', NULL),
(2, 'Services', 1, '1611898443.jpg', 1, 'tesdt', '2021-01-29 00:04:03', '2021-01-29 02:03:15', NULL),
(3, 'Repairing', 2, '', 2, 'asdasd', NULL, NULL, NULL),
(4, 'Estimate', 1, '', 3, '', NULL, NULL, NULL),
(5, 'Repair', 1, '', 4, '', NULL, NULL, NULL),
(6, 'Estimate', 2, '', 5, '', NULL, NULL, NULL),
(7, 'Accessories installation on wall', 2, '', 7, '', NULL, NULL, NULL),
(8, 'Accessories installation on roof (ceilling)', 2, '', 8, '', NULL, NULL, NULL),
(9, 'Repairing', 2, '', 9, '', NULL, NULL, NULL),
(10, 'Estimate', 3, '', 0, '', NULL, NULL, NULL),
(11, 'Switch, Sockets & Others', 3, '', 0, '', NULL, NULL, NULL),
(12, 'Estimate', 4, '', 0, '', NULL, NULL, NULL),
(13, 'Installation', 4, '', 0, '', NULL, NULL, NULL),
(14, 'Estimate', 5, '', 0, '', NULL, NULL, NULL),
(15, 'Terrace Tank', 5, '', 0, '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `govement_proff` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_type`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `designation`, `mobile_number`, `remarks`, `profile_image`, `state_id`, `city_id`, `govement_proff`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$zqsDSP1o56RTE4TZCTeMNeugV7UpDGqlyllUam1O8U477owUbeKDi', '2', NULL, '2021-01-28 23:57:36', '2021-01-28 23:57:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'test', 'test@123.com', NULL, '$2y$10$zqsDSP1o56RTE4TZCTeMNeugV7UpDGqlyllUam1O8U477owUbeKDi', '0', NULL, '2021-02-01 05:52:21', '2021-02-05 23:44:16', NULL, NULL, NULL, 'test', NULL, 1, 1, NULL),
(3, 'City Admin', 'cityadmin@gmail.com', NULL, '$2y$10$zqsDSP1o56RTE4TZCTeMNeugV7UpDGqlyllUam1O8U477owUbeKDi', '0', NULL, '2021-02-01 06:00:17', '2021-02-01 06:00:17', NULL, 'test', '1236546465', NULL, NULL, 1, 1, NULL),
(4, 'emp', 'emp@gmail.com', NULL, '$2y$10$zqsDSP1o56RTE4TZCTeMNeugV7UpDGqlyllUam1O8U477owUbeKDi', '0', NULL, '2021-02-01 06:00:17', '2021-02-01 06:00:17', NULL, NULL, NULL, NULL, NULL, 1, 2, NULL),
(7, 'testtt', 'ctadmin@gmail.com', NULL, 'test@123', '0', NULL, '2021-02-04 23:50:23', '2021-02-05 23:42:58', '2021-02-05 23:42:58', NULL, NULL, 'test', NULL, 1, 1, NULL),
(9, 'akash', 'akash@gmail.com', NULL, 'test@123', '0', NULL, '2021-02-05 01:28:04', '2021-02-05 23:43:18', '2021-02-05 23:43:18', NULL, NULL, NULL, NULL, 1, 1, NULL),
(12, 'Individual Admin', 'individual@gmail.com', NULL, '$2y$10$LD4DMn/sj/ucQpLw.Wwdiu1PmTDrbui1o0rFjhHE793D.6VhkEh2K', '1', NULL, '2021-02-06 01:08:37', '2021-02-06 06:26:57', NULL, 'test', '1223344567', 'testas', '1612594301.jpg', 1, 1, '1612612616.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_areas`
--

CREATE TABLE `user_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `area_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_areas`
--

INSERT INTO `user_areas` (`id`, `user_id`, `city_id`, `area_id`, `created_at`, `updated_at`) VALUES
(14, 2, 1, 2, '2021-02-05 23:44:16', '2021-02-05 23:44:16'),
(15, 2, 1, 3, '2021-02-05 23:44:16', '2021-02-05 23:44:16'),
(31, 12, 1, 1, '2021-02-06 06:26:56', '2021-02-06 06:26:56'),
(32, 12, 1, 4, '2021-02-06 06:26:57', '2021-02-06 06:26:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `tbl_areas`
--
ALTER TABLE `tbl_areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_areas_state_id_foreign` (`state_id`),
  ADD KEY `tbl_areas_city_id_foreign` (`city_id`);

--
-- Indexes for table `tbl_assigned_corporate_crew_inquiry_table`
--
ALTER TABLE `tbl_assigned_corporate_crew_inquiry_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_assigned_corporate_executive_inquiry`
--
ALTER TABLE `tbl_assigned_corporate_executive_inquiry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_assigned_corporate_executive_inquiry_inquiry_id_foreign` (`inquiry_id`),
  ADD KEY `executive_id` (`executive_id`);

--
-- Indexes for table `tbl_assigned_executive_inquiry`
--
ALTER TABLE `tbl_assigned_executive_inquiry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_assigned_executive_inquiry_inquiry_id_foreign` (`inquiry_id`),
  ADD KEY `tbl_assigned_executive_inquiry_executive_id_foreign` (`executive_id`);

--
-- Indexes for table `tbl_assign_crew_inquiries`
--
ALTER TABLE `tbl_assign_crew_inquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_assign_crew_inquiries_corporate_id_foreign` (`crew_id`),
  ADD KEY `tbl_assign_crew_inquiries_corporate_inquiry_id_foreign` (`inquiry_id`);

--
-- Indexes for table `tbl_blogs`
--
ALTER TABLE `tbl_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `tbl_child_category`
--
ALTER TABLE `tbl_child_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_child_category_subcategory_id_foreign` (`subcategory_id`),
  ADD KEY `tbl_child_category_category_id_foreign` (`category_id`);

--
-- Indexes for table `tbl_cities`
--
ALTER TABLE `tbl_cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_cities_state_id_foreign` (`state_id`);

--
-- Indexes for table `tbl_cities_category`
--
ALTER TABLE `tbl_cities_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_corporate_areas`
--
ALTER TABLE `tbl_corporate_areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_corporate_areas_corporate_id_foreign` (`corporate_id`),
  ADD KEY `tbl_corporate_areas_city_id_foreign` (`city_id`),
  ADD KEY `tbl_corporate_areas_area_id_foreign` (`area_id`);

--
-- Indexes for table `tbl_corporate_categories`
--
ALTER TABLE `tbl_corporate_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_corporate_child_category`
--
ALTER TABLE `tbl_corporate_child_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_corporate_child_category_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `tbl_corporate_inquiries`
--
ALTER TABLE `tbl_corporate_inquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_corporate_inquiries_user_id_foreign` (`user_id`),
  ADD KEY `tbl_corporate_inquiries_city_id_foreign` (`city_id`);

--
-- Indexes for table `tbl_corporate_inquiries_details`
--
ALTER TABLE `tbl_corporate_inquiries_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_corporate_inquiries_details_corporate_inquiry_id_foreign` (`corporate_inquiry_id`),
  ADD KEY `tbl_corporate_inquiries_details_corporate_cat_id_foreign` (`corporate_cat_id`),
  ADD KEY `tbl_corporate_inquiries_details_corporate_subcat_id_foreign` (`corporate_subcat_id`),
  ADD KEY `tbl_corporate_inquiries_details_corporate_childcat_id_foreign` (`corporate_childcat_id`);

--
-- Indexes for table `tbl_corporate_sub_categories`
--
ALTER TABLE `tbl_corporate_sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tbl_corporate_users`
--
ALTER TABLE `tbl_corporate_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_corporate_users_email_unique` (`email`),
  ADD KEY `tbl_corporate_users_city_id_foreign` (`city_id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_employee_email_unique` (`email`),
  ADD KEY `tbl_employee_city_admin_id_foreign` (`city_admin_id`),
  ADD KEY `tbl_employee_city_id_foreign` (`city_id`);

--
-- Indexes for table `tbl_employee_areas`
--
ALTER TABLE `tbl_employee_areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_employee_areas_employee_id_foreign` (`employee_id`),
  ADD KEY `tbl_employee_areas_city_id_foreign` (`city_id`),
  ADD KEY `tbl_employee_areas_area_id_foreign` (`area_id`);

--
-- Indexes for table `tbl_employee_categories`
--
ALTER TABLE `tbl_employee_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_employee_categories_employee_id_foreign` (`employee_id`),
  ADD KEY `tbl_employee_categories_category_id_foreign` (`category_id`),
  ADD KEY `tbl_employee_categories_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `tbl_executive`
--
ALTER TABLE `tbl_executive`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_executive_email_unique` (`email`),
  ADD KEY `tbl_executive_city_admin_id_foreign` (`city_admin_id`),
  ADD KEY `tbl_executive_city_id_foreign` (`city_id`);

--
-- Indexes for table `tbl_executive_areas`
--
ALTER TABLE `tbl_executive_areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_executive_areas_executive_id_foreign` (`executive_id`),
  ADD KEY `tbl_executive_areas_city_id_foreign` (`city_id`),
  ADD KEY `tbl_executive_areas_area_id_foreign` (`area_id`);

--
-- Indexes for table `tbl_executive_categories`
--
ALTER TABLE `tbl_executive_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_executive_categories_executive_id_foreign` (`executive_id`),
  ADD KEY `tbl_executive_categories_category_id_foreign` (`category_id`),
  ADD KEY `tbl_executive_categories_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `tbl_individual_area`
--
ALTER TABLE `tbl_individual_area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_individual_area_individual_id_foreign` (`individual_id`),
  ADD KEY `tbl_individual_area_city_id_foreign` (`city_id`),
  ADD KEY `tbl_individual_area_area_id_foreign` (`area_id`);

--
-- Indexes for table `tbl_individual_users`
--
ALTER TABLE `tbl_individual_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_individual_users_email_unique` (`email`),
  ADD KEY `tbl_individual_users_city_id_foreign` (`city_id`);

--
-- Indexes for table `tbl_inquiries`
--
ALTER TABLE `tbl_inquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_inquiries_user_id_foreign` (`user_id`),
  ADD KEY `tbl_inquiries_city_id_foreign` (`city_id`);

--
-- Indexes for table `tbl_inquiry_details`
--
ALTER TABLE `tbl_inquiry_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_inquiry_details_inquiry_id_foreign` (`inquiry_id`),
  ADD KEY `tbl_inquiry_details_cat_id_foreign` (`cat_id`),
  ADD KEY `tbl_inquiry_details_subcat_id_foreign` (`subcat_id`),
  ADD KEY `tbl_inquiry_details_childcat_id_foreign` (`childcat_id`);

--
-- Indexes for table `tbl_states`
--
ALTER TABLE `tbl_states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subcategories`
--
ALTER TABLE `tbl_subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_subcategories_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_state_id_foreign` (`state_id`),
  ADD KEY `users_city_id_foreign` (`city_id`);

--
-- Indexes for table `user_areas`
--
ALTER TABLE `user_areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_areas_user_id_foreign` (`user_id`),
  ADD KEY `user_areas_city_id_foreign` (`city_id`),
  ADD KEY `user_areas_area_id_foreign` (`area_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_areas`
--
ALTER TABLE `tbl_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_assigned_corporate_crew_inquiry_table`
--
ALTER TABLE `tbl_assigned_corporate_crew_inquiry_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_assigned_corporate_executive_inquiry`
--
ALTER TABLE `tbl_assigned_corporate_executive_inquiry`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_assigned_executive_inquiry`
--
ALTER TABLE `tbl_assigned_executive_inquiry`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_assign_crew_inquiries`
--
ALTER TABLE `tbl_assign_crew_inquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_blogs`
--
ALTER TABLE `tbl_blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_child_category`
--
ALTER TABLE `tbl_child_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_cities`
--
ALTER TABLE `tbl_cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_cities_category`
--
ALTER TABLE `tbl_cities_category`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_corporate_areas`
--
ALTER TABLE `tbl_corporate_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_corporate_categories`
--
ALTER TABLE `tbl_corporate_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_corporate_child_category`
--
ALTER TABLE `tbl_corporate_child_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_corporate_inquiries`
--
ALTER TABLE `tbl_corporate_inquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_corporate_inquiries_details`
--
ALTER TABLE `tbl_corporate_inquiries_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_corporate_sub_categories`
--
ALTER TABLE `tbl_corporate_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_corporate_users`
--
ALTER TABLE `tbl_corporate_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_employee_areas`
--
ALTER TABLE `tbl_employee_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_employee_categories`
--
ALTER TABLE `tbl_employee_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_executive`
--
ALTER TABLE `tbl_executive`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_executive_areas`
--
ALTER TABLE `tbl_executive_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_executive_categories`
--
ALTER TABLE `tbl_executive_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_individual_area`
--
ALTER TABLE `tbl_individual_area`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_individual_users`
--
ALTER TABLE `tbl_individual_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_inquiries`
--
ALTER TABLE `tbl_inquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_inquiry_details`
--
ALTER TABLE `tbl_inquiry_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_states`
--
ALTER TABLE `tbl_states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_subcategories`
--
ALTER TABLE `tbl_subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_areas`
--
ALTER TABLE `user_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_areas`
--
ALTER TABLE `tbl_areas`
  ADD CONSTRAINT `tbl_areas_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `tbl_cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_areas_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `tbl_states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_assigned_corporate_executive_inquiry`
--
ALTER TABLE `tbl_assigned_corporate_executive_inquiry`
  ADD CONSTRAINT `executive_id` FOREIGN KEY (`executive_id`) REFERENCES `tbl_executive` (`id`),
  ADD CONSTRAINT `tbl_assigned_corporate_executive_inquiry_inquiry_id_foreign` FOREIGN KEY (`inquiry_id`) REFERENCES `tbl_inquiries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_assigned_executive_inquiry`
--
ALTER TABLE `tbl_assigned_executive_inquiry`
  ADD CONSTRAINT `tbl_assigned_executive_inquiry_executive_id_foreign` FOREIGN KEY (`executive_id`) REFERENCES `tbl_executive` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_assigned_executive_inquiry_inquiry_id_foreign` FOREIGN KEY (`inquiry_id`) REFERENCES `tbl_inquiries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_assign_crew_inquiries`
--
ALTER TABLE `tbl_assign_crew_inquiries`
  ADD CONSTRAINT `tbl_assign_crew_inquiries_corporate_id_foreign` FOREIGN KEY (`crew_id`) REFERENCES `tbl_employee` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_assign_crew_inquiries_corporate_inquiry_id_foreign` FOREIGN KEY (`inquiry_id`) REFERENCES `tbl_inquiries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_child_category`
--
ALTER TABLE `tbl_child_category`
  ADD CONSTRAINT `tbl_child_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `tbl_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_cities`
--
ALTER TABLE `tbl_cities`
  ADD CONSTRAINT `tbl_cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `tbl_states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_corporate_areas`
--
ALTER TABLE `tbl_corporate_areas`
  ADD CONSTRAINT `tbl_corporate_areas_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `tbl_areas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_corporate_areas_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `tbl_cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_corporate_areas_corporate_id_foreign` FOREIGN KEY (`corporate_id`) REFERENCES `tbl_corporate_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_corporate_child_category`
--
ALTER TABLE `tbl_corporate_child_category`
  ADD CONSTRAINT `tbl_corporate_child_category_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `tbl_corporate_sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_corporate_inquiries`
--
ALTER TABLE `tbl_corporate_inquiries`
  ADD CONSTRAINT `tbl_corporate_inquiries_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `tbl_cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_corporate_inquiries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `tbl_corporate_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_corporate_inquiries_details`
--
ALTER TABLE `tbl_corporate_inquiries_details`
  ADD CONSTRAINT `tbl_corporate_inquiries_details_corporate_cat_id_foreign` FOREIGN KEY (`corporate_cat_id`) REFERENCES `tbl_corporate_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_corporate_inquiries_details_corporate_childcat_id_foreign` FOREIGN KEY (`corporate_childcat_id`) REFERENCES `tbl_corporate_child_category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_corporate_inquiries_details_corporate_inquiry_id_foreign` FOREIGN KEY (`corporate_inquiry_id`) REFERENCES `tbl_corporate_inquiries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_corporate_inquiries_details_corporate_subcat_id_foreign` FOREIGN KEY (`corporate_subcat_id`) REFERENCES `tbl_corporate_sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_corporate_sub_categories`
--
ALTER TABLE `tbl_corporate_sub_categories`
  ADD CONSTRAINT `UNSIGNED` FOREIGN KEY (`category_id`) REFERENCES `tbl_corporate_categories` (`id`);

--
-- Constraints for table `tbl_corporate_users`
--
ALTER TABLE `tbl_corporate_users`
  ADD CONSTRAINT `tbl_corporate_users_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `tbl_cities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD CONSTRAINT `tbl_employee_city_admin_id_foreign` FOREIGN KEY (`city_admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_employee_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `tbl_cities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_employee_areas`
--
ALTER TABLE `tbl_employee_areas`
  ADD CONSTRAINT `tbl_employee_areas_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `tbl_areas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_employee_areas_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `tbl_cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_employee_areas_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `tbl_employee` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_employee_categories`
--
ALTER TABLE `tbl_employee_categories`
  ADD CONSTRAINT `tbl_employee_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `tbl_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_employee_categories_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `tbl_employee` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_employee_categories_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `tbl_subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_executive`
--
ALTER TABLE `tbl_executive`
  ADD CONSTRAINT `tbl_executive_city_admin_id_foreign` FOREIGN KEY (`city_admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_executive_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `tbl_cities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_executive_areas`
--
ALTER TABLE `tbl_executive_areas`
  ADD CONSTRAINT `tbl_executive_areas_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `tbl_areas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_executive_areas_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `tbl_cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_executive_areas_executive_id_foreign` FOREIGN KEY (`executive_id`) REFERENCES `tbl_executive` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_executive_categories`
--
ALTER TABLE `tbl_executive_categories`
  ADD CONSTRAINT `tbl_executive_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `tbl_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_executive_categories_executive_id_foreign` FOREIGN KEY (`executive_id`) REFERENCES `tbl_executive` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_executive_categories_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `tbl_subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_individual_area`
--
ALTER TABLE `tbl_individual_area`
  ADD CONSTRAINT `tbl_individual_area_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `tbl_areas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_individual_area_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `tbl_cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_individual_area_individual_id_foreign` FOREIGN KEY (`individual_id`) REFERENCES `tbl_individual_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_individual_users`
--
ALTER TABLE `tbl_individual_users`
  ADD CONSTRAINT `tbl_individual_users_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `tbl_cities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_inquiries`
--
ALTER TABLE `tbl_inquiries`
  ADD CONSTRAINT `tbl_inquiries_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `tbl_cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_inquiries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `tbl_individual_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_inquiry_details`
--
ALTER TABLE `tbl_inquiry_details`
  ADD CONSTRAINT `tbl_inquiry_details_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `tbl_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_inquiry_details_childcat_id_foreign` FOREIGN KEY (`childcat_id`) REFERENCES `tbl_child_category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_inquiry_details_inquiry_id_foreign` FOREIGN KEY (`inquiry_id`) REFERENCES `tbl_inquiries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_inquiry_details_subcat_id_foreign` FOREIGN KEY (`subcat_id`) REFERENCES `tbl_subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_subcategories`
--
ALTER TABLE `tbl_subcategories`
  ADD CONSTRAINT `tbl_subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `tbl_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `tbl_cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `tbl_states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_areas`
--
ALTER TABLE `user_areas`
  ADD CONSTRAINT `user_areas_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `tbl_areas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_areas_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `tbl_cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_areas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
