-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 02, 2019 at 08:33 PM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Sofra`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, '2018-12-25 12:28:19', '2018-12-25 12:28:19', 'Candy'),
(2, '2018-12-25 12:29:02', '2018-12-25 12:29:02', 'Barbecue');

-- --------------------------------------------------------

--
-- Table structure for table `category_restaurant`
--

CREATE TABLE `category_restaurant` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `restaurant_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, '2018-12-24 22:00:00', '2018-12-24 22:00:00', 'Quesna'),
(2, '2018-12-24 22:00:00', '2018-12-24 22:00:00', 'Banha');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quarter` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `api_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `created_at`, `updated_at`, `name`, `email`, `phone`, `home_description`, `password`, `quarter`, `city_id`, `api_token`, `pin_code`) VALUES
(2, '2018-12-25 12:21:34', '2019-01-02 09:48:14', 'mohamed', 'mo@yahoo.com', '01068676355', 'beside', '$2y$10$Ba2SzLJfSRw6iqzGxR6PPOP/UGj9kKnG.ifMezeM0HwF/Im8.STTe', 'zafraan', 1, 'bcsGchVYdsxcyWJVHEOsy8dlfu4oahOSHs0zyDPe2eNwkuYzDBkgV3lEpwOc', '9864'),
(3, '2018-12-25 12:21:54', '2019-01-02 09:47:06', 'midoo', 'mo1@yahoo.com', '01235647894', 'kafrrrrr', '123456', 'zafraan', 1, 'SoPPvuRVa2iMEKcNN78RLmpCuPWQGSAprzfQZHeCFO1ssc6vhHKvmVCbl2yn', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `restaurant_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('enquiry','suggestion','complaint') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `created_at`, `updated_at`, `name`, `phone`, `email`, `message`, `type`) VALUES
(1, '2018-12-25 12:25:55', '2018-12-25 12:25:55', 'momo', '01068676361', 'mo1@yahoo.com', 'cncncdn', 'suggestion');

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
(3, '2018_11_13_120856_create_restaurants_table', 1),
(4, '2018_11_14_120856_create_categories_table', 1),
(5, '2018_11_14_120856_create_category_restaurant_table', 1),
(6, '2018_11_14_120856_create_cities_table', 1),
(7, '2018_11_14_120856_create_clients_table', 1),
(8, '2018_11_14_120856_create_contacts_table', 1),
(9, '2018_11_14_120856_create_notifications_table', 1),
(10, '2018_11_14_120856_create_offers_table', 1),
(11, '2018_11_14_120856_create_order_product_table', 1),
(12, '2018_11_14_120856_create_orders_table', 1),
(13, '2018_11_14_120856_create_products_table', 1),
(14, '2018_11_27_175334_create_settings_table', 1),
(15, '2018_11_28_091532_create_payment_methods_table', 1),
(16, '2018_11_28_124234_create_tokens_table', 1),
(17, '2018_12_14_120856_create_comments_table', 1),
(18, '2018_12_23_102101_create_payments_table', 1),
(19, '2020_11_14_120906_create_foreign_keys', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` enum('new-order','order-rejected','order-prepared','order-delivered','order-new-offer') COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `notificationable_id` int(11) NOT NULL,
  `notificationable_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `created_at`, `updated_at`, `title`, `body`, `action`, `order_id`, `notificationable_id`, `notificationable_type`) VALUES
(1, '2018-12-25 13:05:10', '2018-12-25 13:05:10', 'لديك طلب جديد', 'لديك طلب جديد من العميل midoos', 'new-order', 1, 1, 'App\\Restaurant'),
(2, '2018-12-25 13:06:00', '2018-12-25 13:06:00', 'لديك طلب جديد', 'لديك طلب جديد من العميل midoos', 'new-order', 2, 1, 'App\\Restaurant'),
(3, '2018-12-26 07:42:19', '2018-12-26 07:42:19', 'لديك طلب جديد', 'لديك طلب جديد من العميل midoos', 'new-order', 3, 1, 'App\\Restaurant'),
(4, '2018-12-26 09:28:21', '2018-12-26 09:28:21', 'تم الموافيه علي الطلب', 'تمت الموافقة علي الطبب من المطعيم gad', 'new-order', 3, 3, 'App\\Client'),
(5, '2018-12-26 09:29:34', '2018-12-26 09:29:34', 'تم الموافيه علي الطلب', 'تمت الموافقة علي الطبب من المطعيم gad', 'new-order', 3, 3, 'App\\Client'),
(6, '2018-12-26 09:33:12', '2018-12-26 09:33:12', 'تم رفض علي الطلب', 'تم رفض علي الطبب من المطعيم gad', 'new-order', 3, 3, 'App\\Client'),
(7, '2018-12-26 09:37:04', '2018-12-26 09:37:04', 'لديك طلب جديد', 'لديك طلب جديد من العميل midoos', 'new-order', 4, 1, 'App\\Restaurant'),
(8, '2018-12-26 09:37:26', '2018-12-26 09:37:26', 'تم رفض علي الطلب', 'تم رفض علي الطبب من المطعيم gad', 'new-order', 3, 3, 'App\\Client'),
(9, '2018-12-26 09:37:59', '2018-12-26 09:37:59', 'تم رفض علي الطلب', 'تم رفض علي الطبب من المطعيم gad', 'new-order', 3, 3, 'App\\Client'),
(10, '2018-12-26 09:38:22', '2018-12-26 09:38:22', 'تم رفض علي الطلب', 'تم رفض علي الطبب من المطعيم gad', 'new-order', 3, 3, 'App\\Client'),
(11, '2018-12-26 09:39:52', '2018-12-26 09:39:52', 'لديك طلب جديد', 'لديك طلب جديد من العميل midoos', 'new-order', 5, 1, 'App\\Restaurant'),
(12, '2018-12-26 09:40:25', '2018-12-26 09:40:25', 'لديك طلب جديد', 'لديك طلب جديد من العميل midoos', 'new-order', 6, 1, 'App\\Restaurant'),
(13, '2018-12-26 09:56:41', '2018-12-26 09:56:41', 'تم رفض علي الطلب', 'تم رفض علي الطبب من المطعيم gad', 'new-order', 3, 3, 'App\\Client'),
(14, '2018-12-26 09:58:31', '2018-12-26 09:58:31', 'تم رفض علي الطلب', 'تم رفض علي الطبب من المطعيم gad', 'new-order', 2, 2, 'App\\Client'),
(15, '2018-12-26 10:00:40', '2018-12-26 10:00:40', 'تم رفض علي الطلب', 'تم رفض علي الطبب من المطعيم gad', 'new-order', 2, 2, 'App\\Client'),
(16, '2018-12-26 10:09:00', '2018-12-26 10:09:00', 'تم رفض علي الطلب', 'تم رفض علي الطبب من المطعيم gad', 'new-order', 2, 2, 'App\\Client'),
(17, '2018-12-26 10:09:08', '2018-12-26 10:09:08', 'تم رفض علي الطلب', 'تم رفض علي الطبب من المطعيم gad', 'new-order', 2, 2, 'App\\Client'),
(18, '2018-12-26 10:10:56', '2018-12-26 10:10:56', 'تم رفض علي الطلب', 'تم رفض علي الطبب من المطعيم gad', 'new-order', 2, 2, 'App\\Client'),
(19, '2018-12-26 10:12:01', '2018-12-26 10:12:01', 'تم رفض علي الطلب', 'تم رفض علي الطبب من المطعيم gad', 'new-order', 2, 2, 'App\\Client'),
(20, '2018-12-26 10:13:29', '2018-12-26 10:13:29', 'تم رفض علي الطلب', 'تم رفض علي الطبب من المطعيم gad', 'new-order', 2, 2, 'App\\Client'),
(21, '2018-12-26 10:14:44', '2018-12-26 10:14:44', 'تم رفض علي الطلب', 'تم رفض علي الطبب من المطعيم gad', 'new-order', 2, 2, 'App\\Client'),
(22, '2018-12-26 10:15:41', '2018-12-26 10:15:41', 'تم رفض علي الطلب', 'تم رفض علي الطبب من المطعيم gad', 'new-order', 2, 2, 'App\\Client'),
(23, '2018-12-26 10:18:13', '2018-12-26 10:18:13', 'تم رفض علي الطلب', 'تم رفض علي الطبب من المطعيم gad', 'new-order', 2, 2, 'App\\Client'),
(24, '2018-12-26 10:18:13', '2018-12-26 10:18:13', 'تم رفض علي الطلب', 'تم رفض علي الطبب من المطعيم gad', 'new-order', 2, 2, 'App\\Client'),
(25, '2018-12-26 10:18:50', '2018-12-26 10:18:50', 'تم رفض علي الطلب', 'تم رفض علي الطبب من المطعيم gad', 'new-order', 2, 2, 'App\\Client'),
(26, '2018-12-26 10:21:02', '2018-12-26 10:21:02', 'تم رفض علي الطلب', 'تم رفض علي الطبب من المطعيم gad', 'new-order', 2, 2, 'App\\Client'),
(27, '2018-12-26 10:24:57', '2018-12-26 10:24:57', 'تم رفض علي الطلب', 'تم رفض علي الطبب من المطعيم gad', 'new-order', 2, 3, 'App\\Client'),
(28, '2018-12-26 10:25:28', '2018-12-26 10:25:28', 'تم رفض علي الطلب', 'تم رفض علي الطبب من المطعيم gad', 'new-order', 2, 3, 'App\\Client'),
(29, '2018-12-26 10:26:17', '2018-12-26 10:26:17', 'تم رفض علي الطلب', 'تم رفض علي الطبب من المطعيم gad', 'new-order', 2, 3, 'App\\Client'),
(30, '2018-12-26 10:28:25', '2018-12-26 10:28:25', 'تم رفض علي الطلب', 'تم رفض علي الطبب من المطعيم gad', 'new-order', 2, 3, 'App\\Client'),
(31, '2018-12-26 10:30:52', '2018-12-26 10:30:52', 'تم رفض علي الطلب', 'تم رفض علي الطبب من المطعيم gad', 'new-order', 2, 3, 'App\\Client'),
(32, '2018-12-26 10:36:42', '2018-12-26 10:36:42', 'تم رفض علي الطلب', 'تم رفض علي الطبب من المطعيم gad', 'new-order', 2, 3, 'App\\Client'),
(33, '2018-12-26 10:38:00', '2018-12-26 10:38:00', 'تم الموافيه علي الطلب', 'تمت الموافقة علي الطبب من المطعيم gad', 'new-order', 2, 3, 'App\\Client'),
(34, '2018-12-26 10:38:33', '2018-12-26 10:38:33', 'تم الموافيه علي الطلب', 'تمت الموافقة علي الطبب من المطعيم gad', 'new-order', 2, 3, 'App\\Client'),
(35, '2018-12-26 10:46:09', '2018-12-26 10:46:09', 'تم تسليم الطلب', 'تم تسليم الطبب من المطعيم gad', 'new-order', 3, 3, 'App\\Client'),
(36, '2018-12-26 10:47:38', '2018-12-26 10:47:38', 'تم تسليم الطلب', 'تم تسليم الطبب من المطعيم midoos', 'new-order', 3, 1, 'App\\Restaurant'),
(37, '2018-12-26 10:51:07', '2018-12-26 10:51:07', 'تم الغاء الطلب', 'تم الغاء الطبب من العميل midoos', 'new-order', 3, 1, 'App\\Restaurant'),
(38, '2018-12-30 10:29:10', '2018-12-30 10:29:10', 'لديك طلب جديد', 'لديك طلب جديد من العميل midoos', 'new-order', 7, 1, 'App\\Restaurant'),
(39, '2018-12-30 13:27:55', '2018-12-30 13:27:55', 'تم تسليم الطلب', 'تم تسليم الطبب من العميل midoos', 'new-order', 3, 1, 'App\\Restaurant'),
(40, '2019-01-01 08:44:15', '2019-01-01 08:44:15', 'لديك طلب جديد', 'لديك طلب جديد من العميل midoos', 'new-order', 9, 1, 'App\\Restaurant'),
(41, '2019-01-01 09:14:44', '2019-01-01 09:14:44', 'تم تسليم الطلب', 'تم تسليم الطبب من العميل midoos', 'new-order', 3, 1, 'App\\Restaurant'),
(42, '2019-01-01 09:16:53', '2019-01-01 09:16:53', 'تم تسليم الطلب', 'تم تسليم الطبب من العميل midoos', 'new-order', 3, 1, 'App\\Restaurant'),
(43, '2019-01-01 09:46:04', '2019-01-01 09:46:04', 'تم تسليم الطلب', 'تم تسليم الطبب من العميل midoos', 'new-order', 3, 1, 'App\\Restaurant'),
(44, '2019-01-01 09:48:17', '2019-01-01 09:48:17', 'تم تسليم الطلب', 'تم تسليم الطبب من العميل midoos', 'new-order', 3, 1, 'App\\Restaurant'),
(45, '2019-01-01 09:49:05', '2019-01-01 09:49:05', 'تم تسليم الطلب', 'تم تسليم الطبب من العميل midoos', 'new-order', 3, 1, 'App\\Restaurant'),
(46, '2019-01-01 09:50:15', '2019-01-01 09:50:15', 'تم تسليم الطلب', 'تم تسليم الطبب من العميل midoos', 'new-order', 3, 1, 'App\\Restaurant'),
(47, '2019-01-01 09:53:49', '2019-01-01 09:53:49', 'تم تسليم الطلب', 'تم تسليم الطبب من العميل midoos', 'new-order', 3, 1, 'App\\Restaurant'),
(48, '2019-01-01 10:11:05', '2019-01-01 10:11:05', 'تم تسليم الطلب', 'تم تسليم الطبب من العميل midoos', 'new-order', 3, 1, 'App\\Restaurant'),
(49, '2019-01-02 09:54:36', '2019-01-02 09:54:36', 'تم تسليم الطلب', 'تم تسليم الطبب من العميل midoo', 'new-order', 1, 1, 'App\\Restaurant'),
(50, '2019-01-02 09:55:31', '2019-01-02 09:55:31', 'تم الغاء الطلب', 'تم الغاء الطبب من العميل midoo', 'new-order', 3, 1, 'App\\Restaurant'),
(51, '2019-01-02 09:58:56', '2019-01-02 09:58:56', 'تم تسليم الطلب', 'تم تسليم الطبب من العميل midoo', 'new-order', 3, 1, 'App\\Restaurant'),
(52, '2019-01-02 09:59:37', '2019-01-02 09:59:37', 'تم الغاء الطلب', 'تم الغاء الطبب من العميل midoo', 'new-order', 3, 1, 'App\\Restaurant'),
(53, '2019-01-02 10:00:00', '2019-01-02 10:00:00', 'لديك طلب جديد', 'لديك طلب جديد من العميل midoo', 'new-order', 10, 1, 'App\\Restaurant'),
(54, '2019-01-02 10:00:44', '2019-01-02 10:00:44', 'لديك طلب جديد', 'لديك طلب جديد من العميل midoo', 'new-order', 11, 1, 'App\\Restaurant'),
(55, '2019-01-02 10:02:19', '2019-01-02 10:02:19', 'تم تسليم الطلب', 'تم تسليم الطبب من العميل midoo', 'new-order', 3, 1, 'App\\Restaurant'),
(56, '2019-01-02 10:02:46', '2019-01-02 10:02:46', 'تم تسليم الطلب', 'تم تسليم الطبب من المطعيم ddd', 'new-order', 3, 3, 'App\\Client'),
(57, '2019-01-02 10:02:59', '2019-01-02 10:02:59', 'لديك طلب جديد', 'لديك طلب جديد من العميل midoo', 'new-order', 12, 1, 'App\\Restaurant'),
(58, '2019-01-02 10:05:20', '2019-01-02 10:05:20', 'لديك طلب جديد', 'لديك طلب جديد من العميل midoo', 'new-order', 13, 1, 'App\\Restaurant'),
(59, '2019-01-02 10:05:30', '2019-01-02 10:05:30', 'لديك طلب جديد', 'لديك طلب جديد من العميل midoo', 'new-order', 14, 1, 'App\\Restaurant'),
(60, '2019-01-02 10:06:32', '2019-01-02 10:06:32', 'لديك طلب جديد', 'لديك طلب جديد من العميل midoo', 'new-order', 15, 1, 'App\\Restaurant');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `created_at`, `updated_at`, `price`, `duration`, `name`, `description`, `image`, `restaurant_id`) VALUES
(1, '2018-12-25 12:55:37', '2018-12-25 12:55:37', '55', '5', 'Drinks', 'Discount  50%', 'ja7NNAWBT7y9oFBr1BacGqkpiJxYwWQpUqxDy7Cw.jpeg', 2),
(2, '2018-12-25 13:13:35', '2018-12-25 13:13:35', '55', '5', 'Drinks', 'Discount  50%', 'fC457vhMbjXNYWJbZxCaYO0XIBH8NmmpimRhDts5.jpeg', 2),
(3, '2018-12-25 13:14:19', '2018-12-25 13:14:19', '55', '5', 'Drinks', 'Discount  50%', 'Yb77VWkjC3dhOYhmEWhrejSQE5yL7pyRowzoWiUu.jpeg', 2),
(4, '2018-12-25 13:18:11', '2018-12-25 13:18:11', '55', '5', 'Meat', 'Discount  50%', 'EU0jRiEIDgNejQdcZrwccNvt3ebTsR7LLkM9ZcQJ.jpeg', 1),
(5, '2018-12-30 13:29:04', '2018-12-30 13:29:04', '55', '5', 'Drinks', 'Discount  50%', 'MtiXWTNGIaK1DuuWVouM2xPs6QWNtuf5cA6FBuR8.jpeg', 1),
(6, '2018-12-30 13:39:44', '2018-12-30 13:39:44', '55', '5', 'Drinks', 'Discount  50%', 'oiCeBU1fFuu3RGztzBJUlSfQxxEoME9CzqTwDOvL.jpeg', 1),
(7, '2018-12-30 13:40:52', '2018-12-30 13:40:52', '55', '5', 'Drinks', 'Discount  50%', 'hHQIdF0KZUCgNjFlM0C4L480Su97Lh4yw9Ijum1G.jpeg', 1),
(8, '2019-01-02 08:15:59', '2019-01-02 08:15:59', '55', '5', 'Drinks', 'Discount  50%', '1iFqMuqZbLfDgf32E4Ud22cZL5cjh4lJLVyD8uEG.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivery` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '10',
  `total` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `commission` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '10',
  `net` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `notes` text COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','accepted','rejected','prepared','delivered','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) DEFAULT NULL,
  `cost` int(11) NOT NULL DEFAULT '0',
  `client_id` int(10) UNSIGNED NOT NULL,
  `restaurant_id` int(10) UNSIGNED NOT NULL,
  `payment_method_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `created_at`, `updated_at`, `delivery`, `total`, `commission`, `net`, `notes`, `status`, `number`, `cost`, `client_id`, `restaurant_id`, `payment_method_id`) VALUES
(1, '2018-12-25 13:05:09', '2018-12-26 07:24:04', '10', '5000', '500', '100', NULL, 'delivered', NULL, 100, 3, 1, 1),
(2, '2018-12-25 13:05:59', '2018-12-25 13:06:00', '10', '8000', '800', '235', NULL, 'pending', NULL, 250, 3, 1, 2),
(3, '2018-12-26 07:42:19', '2019-01-02 10:02:19', '10', '110', '10', '100', NULL, 'delivered', NULL, 100, 3, 1, 1),
(4, '2018-12-26 09:37:03', '2018-12-26 09:37:03', '10', '110', '10', '100', NULL, 'pending', NULL, 100, 3, 1, 1),
(5, '2018-12-26 09:39:52', '2018-12-26 09:39:52', '10', '110', '10', '100', NULL, 'pending', NULL, 100, 3, 1, 1),
(6, '2018-12-26 09:40:25', '2018-12-26 09:40:25', '10', '110', '10', '100', NULL, 'pending', NULL, 100, 3, 1, 1),
(7, '2018-12-30 10:29:10', '2018-12-30 10:29:10', '10', '110', '10', '100', NULL, 'pending', NULL, 100, 3, 1, 1),
(8, NULL, NULL, '10', '4010', '400', '3600', 'dwdwd', 'delivered', 452, 4000, 3, 2, 2),
(9, '2019-01-01 08:44:14', '2019-01-01 08:44:14', '10', '110', '10', '100', NULL, 'pending', NULL, 100, 3, 1, 1),
(10, '2019-01-02 10:00:00', '2019-01-02 10:00:00', '10', '150', '14', '136', NULL, 'pending', NULL, 140, 3, 1, 1),
(11, '2019-01-02 10:00:44', '2019-01-02 10:00:44', '10', '150', '14', '136', NULL, 'pending', NULL, 140, 3, 1, 1),
(12, '2019-01-02 10:02:59', '2019-01-02 10:02:59', '10', '150', '14', '136', NULL, 'pending', NULL, 140, 3, 1, 1),
(13, '2019-01-02 10:05:19', '2019-01-02 10:05:20', '10', '150', '14', '136', NULL, 'pending', NULL, 140, 3, 1, 1),
(14, '2019-01-02 10:05:29', '2019-01-02 10:05:30', '10', '150', '14', '136', NULL, 'pending', NULL, 140, 3, 1, 1),
(15, '2019-01-02 10:06:32', '2019-01-02 10:06:32', '10', '150', '14', '136', NULL, 'pending', NULL, 140, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `price` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `special_order` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`created_at`, `updated_at`, `order_id`, `product_id`, `price`, `quantity`, `special_order`) VALUES
(NULL, NULL, 1, 1, '50', '2', ''),
(NULL, NULL, 2, 1, '50', '5', ''),
(NULL, NULL, 3, 1, '50', '2', ''),
(NULL, NULL, 4, 1, '50', '2', ''),
(NULL, NULL, 5, 1, '50', '2', ''),
(NULL, NULL, 6, 1, '50', '2', ''),
(NULL, NULL, 7, 1, '50', '2', ''),
(NULL, NULL, 9, 1, '50', '2', ''),
(NULL, NULL, 10, 1, '70', '2', ''),
(NULL, NULL, 11, 1, '70', '2', ''),
(NULL, NULL, 12, 1, '70', '2', ''),
(NULL, NULL, 13, 1, '70', '2', ''),
(NULL, NULL, 14, 1, '70', '2', ''),
(NULL, NULL, 15, 1, '70', '2', '');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `done` int(11) NOT NULL,
  `restaurant_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `done`, `restaurant_id`, `created_at`, `updated_at`) VALUES
(1, 200, 1, '2018-12-25 13:16:04', '2018-12-30 14:27:01'),
(2, 150, 2, '2018-12-25 13:16:11', '2018-12-25 13:16:11');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Cash', '2018-12-25 12:29:32', '2018-12-25 12:29:32'),
(2, 'Visa', '2018-12-25 12:29:38', '2018-12-25 12:29:38');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `created_at`, `updated_at`, `name`, `price`, `description`, `image`, `duration`, `restaurant_id`) VALUES
(1, '2018-12-25 12:51:11', '2019-01-02 08:15:33', 'Chicken', 70, 'Good', 'z1nLdPtnae5i2MA0MmChswZlW8PYTGjgnQ1XyPpy.jpeg', '20', 2),
(2, '2018-12-25 13:17:43', '2018-12-25 13:17:43', 'Meat', 55, 'Delicious', 'YOSLyJ7MPg59KgjhYpaZxEeEIhvX6IAtiDliD90G.jpeg', '5', 2);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quarter` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiving_time` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_time` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_fee` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minimum` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` int(11) NOT NULL,
  `api_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `pin_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('open','close') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `created_at`, `updated_at`, `name`, `quarter`, `email`, `password`, `receiving_time`, `delivery_time`, `delivery_fee`, `phone`, `whatsapp`, `minimum`, `rate`, `api_token`, `city_id`, `pin_code`, `status`) VALUES
(1, '2018-12-25 12:42:48', '2019-01-02 08:17:01', 'ddd', 'dsdsdaaaa', 'gad@yahoo.com', '123456', '10', '50', '10', '01068676367', '01068676362', '10', 4, 'xl7w6Omo4oOvCDG0GSPiZ5G1SiLDLlKhLbt5Cz9e6qQQWBGeTn7tiAvozFBN', 1, '4796', 'open'),
(2, '2018-12-25 12:43:01', '2018-12-25 12:49:02', 'Flafl', 'dsdsdaaaa', 'gad@yahoo.com', '123456', '10', '50', '10', '01068676367', '01068676362', '10', 4, 'pXBYA7zxB1puxHR7S5H4OIyA6m4Arhz81oH639IBC15N0ut5pMTNaqGlvExM', 1, NULL, 'open');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_app` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` int(11) NOT NULL,
  `instgram` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `commission` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `created_at`, `updated_at`, `phone`, `email`, `about_app`, `facebook_url`, `twitter_url`, `whatsapp`, `instgram`, `google_url`, `commission`) VALUES
(1, NULL, '2018-12-30 14:22:14', '01068676362', 'hoa@email.com', 'it\'s about deliver food to you from many restaurants', 'https://www.facebook.com/', 'https://www.facebook.com/', 1054785453, 'https://www.facebook.com/', 'https://www.facebook.com/', '10');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `platform` enum('android','ios') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` int(11) NOT NULL,
  `tokenable_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `platform`, `tokenable_id`, `tokenable_type`, `created_at`, `updated_at`) VALUES
(2, 'sdaads', 'ios', 1, 'App\\Restaurant', '2018-12-26 09:59:49', '2018-12-26 09:59:49'),
(3, 'sdsdsdddsdsd', 'ios', 1, 'App\\Restaurant', '2018-12-26 10:00:28', '2018-12-26 10:00:28'),
(5, 'drCVOKqvp9o:APA91bHCBJV-u1MbwK3dXY5o29O0zKSBPOG1XabMhJMjnKdWFYOhtx2aujp1izIbEkJ1hGjeuhbu362dONmfDX40VSQkb1MDYEvcj8o9yPpSzjLzYqmXt2I8ydlPuLYv6emUU0N_UNR4', 'android', 3, 'App\\Client', '2018-12-26 10:29:35', '2018-12-26 10:29:35'),
(6, 'fbnnLEY9kNs:APA91bEqd2ULhmKfjPdRGseJnGexQunN3yFhXPIHaNRDgxLRF7U35ubehWMqK_shJ2Jy06MZNV5FMEz2XtR2qWfxzNz-CH3XL2kZTD_YWjitH_eQn_-lDVyE5gh0qqyUbPEvOoF__G-1', 'ios', 1, 'App\\Restaurant', '2018-12-26 10:38:18', '2018-12-26 10:38:18'),
(7, 'adsdddada', 'ios', 3, 'App\\Client', '2019-01-02 07:09:36', '2019-01-02 07:09:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mohamed', 'mohamed.slah6660@gmail.com', NULL, 'vlBUAUU4LkfWk', 'Jr7ffU67Je3upkm74wJO7if8cQMcAscgn5OXkCROSfbYoQdG7tWqwUZ4Pj7P', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_restaurant`
--
ALTER TABLE `category_restaurant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_restaurant_category_id_foreign` (`category_id`),
  ADD KEY `category_restaurant_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_city_id_foreign` (`city_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_restaurant_id_foreign` (`restaurant_id`),
  ADD KEY `comments_client_id_foreign` (`client_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_order_id_foreign` (`order_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offers_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_client_id_foreign` (`client_id`),
  ADD KEY `orders_restaurant_id_foreign` (`restaurant_id`),
  ADD KEY `orders_payment_method_id_foreign` (`payment_method_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD KEY `order_product_order_id_foreign` (`order_id`),
  ADD KEY `order_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurants_city_id_foreign` (`city_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `category_restaurant`
--
ALTER TABLE `category_restaurant`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_restaurant`
--
ALTER TABLE `category_restaurant`
  ADD CONSTRAINT `category_restaurant_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_restaurant_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `restaurants_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
