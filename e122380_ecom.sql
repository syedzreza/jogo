-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 30, 2022 at 10:18 PM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.3.33-1+ubuntu20.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e122380_ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int UNSIGNED NOT NULL,
  `cookie_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `quantity` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `cookie_id`, `product_id`, `user_id`, `quantity`, `created_at`, `updated_at`) VALUES
(18, NULL, 1, 1, '2', '2022-03-24 10:41:16', '2022-03-24 10:41:22'),
(19, '6d3fa33339281f2babdcbc1e3583ad3f9ce75c0c', 4, NULL, '1', '2022-03-25 03:12:05', '2022-03-25 03:12:05');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int UNSIGNED NOT NULL,
  `category_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `image`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sashes', '1647258132.png', 'sashes', 'Active', '2022-03-09 01:19:23', '2022-03-14 06:12:12'),
(2, 'Uniforms', '1647258184.png', 'uniforms', 'Active', '2022-03-09 01:20:03', '2022-03-14 06:13:04'),
(3, 'Ties', '1647258352.png', 'ties', 'Active', '2022-03-09 01:20:18', '2022-03-14 06:15:52'),
(4, 'Sashe', '1647258378.png', 'sashe', 'Active', '2022-03-09 01:21:14', '2022-03-14 06:16:18');

-- --------------------------------------------------------

--
-- Table structure for table `home_pages`
--

CREATE TABLE `home_pages` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_pages`
--

INSERT INTO `home_pages` (`id`, `title`, `description`, `button_name`, `link`, `delivery`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Shop for School Items', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed</p>', 'SHOP NOW', 'https://laravel.gowebbidemo.com/122380_ecom/public/product-list', 'Free Shipping order over 20', 'Active', NULL, '2022-03-15 23:18:04');

-- --------------------------------------------------------

--
-- Table structure for table `home_page_images`
--

CREATE TABLE `home_page_images` (
  `id` int UNSIGNED NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_page_images`
--

INSERT INTO `home_page_images` (`id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '1646886655.png', 'Active', '2022-03-09 23:00:55', '2022-03-14 04:27:06'),
(2, '1646886660.png', 'Active', '2022-03-09 23:01:00', '2022-03-11 01:12:50'),
(3, '1646886664.png', 'Active', '2022-03-09 23:01:04', '2022-03-11 01:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2022_02_10_075438_create_categories_table', 1),
(4, '2022_02_11_061957_create_products_table', 1),
(5, '2022_02_12_071023_create_product_images_table', 1),
(6, '2022_02_12_105055_create_carts_table', 1),
(7, '2022_02_15_085014_create_user_addresses_table', 1),
(8, '2022_02_15_102433_create_home_pages_table', 1),
(9, '2022_02_15_114337_add_paid_to_home_pages_table', 1),
(10, '2022_02_16_115034_create_home_page_images_table', 1),
(11, '2022_02_21_041345_add_image_to_user_addresses_table', 1),
(12, '2022_03_02_044456_create_new_users_table', 1),
(13, '2022_03_09_034809_create_orders_table', 1),
(14, '2022_03_12_065702_create_order_details_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `new_users`
--

CREATE TABLE `new_users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `shipping_id` int UNSIGNED DEFAULT NULL,
  `order_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_total` decimal(20,2) DEFAULT NULL,
  `pay_trans_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` enum('pending','completed') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_method` enum('cod','online') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cod',
  `payment_status` enum('pending','processing','completed') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `shipping_id`, `order_no`, `order_total`, `pay_trans_no`, `order_status`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(4, 1, 4, '#ecom8771', '712.00', NULL, 'completed', 'cod', 'completed', '2022-03-12 04:47:33', '2022-03-12 04:47:33'),
(5, 1, 4, '#ecom1935', '712.00', NULL, 'completed', 'cod', 'completed', '2022-03-12 04:49:08', '2022-03-12 04:49:08'),
(6, 1, 4, '#ecom5114', '1711.00', NULL, 'completed', 'cod', 'completed', '2022-03-12 04:56:53', '2022-03-12 04:56:53'),
(9, 1, 6, '#ecom4049', '1711.00', NULL, 'pending', 'online', 'pending', '2022-03-13 23:06:50', '2022-03-13 23:06:50'),
(11, 1, 6, '#ecom2315', '1711.00', NULL, 'pending', 'online', 'pending', '2022-03-13 23:26:35', '2022-03-13 23:26:35'),
(12, 1, 6, '#ecom4371', '1711.00', NULL, 'pending', 'online', 'pending', '2022-03-13 23:31:27', '2022-03-13 23:31:27'),
(17, 1, 4, '#ecom8958', '1711.00', NULL, 'pending', 'online', 'pending', '2022-03-13 23:36:21', '2022-03-13 23:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int UNSIGNED NOT NULL,
  `order_id` int UNSIGNED DEFAULT NULL,
  `product_id` int UNSIGNED DEFAULT NULL,
  `product_quantity` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_quantity`, `product_price`, `created_at`, `updated_at`) VALUES
(1, 4, 8, '4', '289.00', '2022-03-12 04:47:33', '2022-03-12 04:47:33'),
(2, 5, 8, '4', '289.00', '2022-03-12 04:49:08', '2022-03-12 04:49:08'),
(3, 6, 8, '4', '289.00', '2022-03-12 04:56:53', '2022-03-12 04:56:53'),
(4, 6, 6, '1', '1299.00', '2022-03-12 04:56:53', '2022-03-12 04:56:53'),
(9, 9, 8, '4', '289.00', '2022-03-13 23:06:50', '2022-03-13 23:06:50'),
(10, 9, 6, '1', '1299.00', '2022-03-13 23:06:50', '2022-03-13 23:06:50'),
(13, 11, 8, '4', '289.00', '2022-03-13 23:26:35', '2022-03-13 23:26:35'),
(14, 11, 6, '1', '1299.00', '2022-03-13 23:26:35', '2022-03-13 23:26:35');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int UNSIGNED NOT NULL,
  `cat_id` int UNSIGNED NOT NULL,
  `product_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_price` decimal(8,2) NOT NULL,
  `regular_price` decimal(8,2) NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `in_stock` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `product_name`, `product_image`, `product_title`, `product_description`, `sale_price`, `regular_price`, `slug`, `in_stock`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sashes', '1647316123.png', 'kliulfyi', 'fhhtyujhyt', '10.00', '100.00', 'sashes', '2', 'Active', '2022-03-09 01:27:14', '2022-03-14 22:19:25'),
(2, 1, 'Sashes1', '1647318823.png', 'dfdbdf', 'fdhhstyuh', '10.00', '12.00', 'sashes1', '3', 'Active', '2022-03-09 01:28:03', '2022-03-15 01:28:32'),
(3, 1, 'Sashes2', '1647318857.png', 'fgjfjtf', 'tuyetrh', '10.00', '12.00', 'sashes2', '3', 'Active', '2022-03-09 01:28:53', '2022-03-15 03:59:36'),
(4, 2, 'Sashes', '1647320254.png', 'it is Sashes', 'fdghdfh', '10.00', '13.00', 'sashes', '5', 'Active', '2022-03-09 01:29:35', '2022-03-14 23:27:34'),
(5, 1, 'Sashes3', '1647320288.png', 'it is Sashes', 'ytercvbdc', '10.00', '13.00', 'sashes3', '1', 'Active', '2022-03-09 01:30:24', '2022-03-15 03:59:46'),
(6, 2, 'Sashes', '1647320351.png', 'kliulfyi', 'dfhtrahd', '10.00', '13.00', 'sashes', '3', 'Active', '2022-03-09 01:31:03', '2022-03-14 23:29:11'),
(7, 3, 'Sashes', '1647321616.png', 'fgg', 'rdfgdfgad', '10.00', '15.00', 'sashes', '4', 'Active', '2022-03-09 01:33:48', '2022-03-15 00:04:21'),
(8, 1, 'Sashes', '1647321694.png', 'dfdbdf', 'frefaerfer', '10.00', '15.00', 'sashes', '4', 'Active', '2022-03-09 01:34:57', '2022-03-14 23:51:34'),
(9, 1, 'Sashes', '1647321755.png', 'It is Mixer', 'rgdfgfdg', '530.00', '700.00', 'sashes', '5', 'Active', '2022-03-09 01:35:48', '2022-03-14 23:52:35'),
(10, 4, 'Sashes', '1647324611.png', 'It is Woolen Clothes', 'dfergarfhgd', '10.00', '12.00', 'sashes', '3', 'Active', '2022-03-09 01:36:37', '2022-03-15 00:40:11'),
(11, 4, 'Sashes', '1647324835.png', 'It is jeans Shirt', 'sdgergdf', '10.00', '12.00', 'sashes', '4', 'Active', '2022-03-09 01:37:15', '2022-03-15 00:43:55'),
(12, 4, 'Sashes', '1647324862.png', 'It is Formal Shirt', 'ghgfdjgf', '10.00', '13.00', 'sashes', '4', 'Active', '2022-03-09 01:37:59', '2022-03-15 00:44:22'),
(13, 1, 'Sashes', '1647318890.png', 'jytjty', 'dgfdgar', '10.00', '13.00', 'sashes', '2', 'Inactive', '2022-03-14 23:04:50', '2022-03-24 00:47:01'),
(14, 3, 'Sashes', '1647319665.png', 'kliulfyi', 'fhsthfh', '10.00', '13.00', 'sashes', '2', 'Active', '2022-03-14 23:17:45', '2022-03-15 00:03:32'),
(15, 3, 'Sashes', '1647319699.png', 'dsafsd', 'trshth', '10.00', '15.00', 'sashes', '2', 'Active', '2022-03-14 23:18:19', '2022-03-15 00:03:55'),
(16, 1, 'Sashes', '1647319721.png', 'fgg', 'hthtrh', '10.00', '15.00', 'sashes', '3', 'Active', '2022-03-14 23:18:41', '2022-03-14 23:26:51'),
(18, 2, 'Sashes', '1647320468.png', 'kliulfyi', 'dfgrfergr', '10.00', '14.00', 'sashes', '3', 'Active', '2022-03-14 23:31:08', '2022-03-14 23:35:06'),
(19, 2, 'Sashes', '1647320490.png', 'kliulfyi', 'egreger', '10.00', '15.00', 'sashes', '3', 'Active', '2022-03-14 23:31:30', '2022-03-14 23:35:07'),
(20, 2, 'Sashes', '1647320523.png', 'dsafsd', 'thtrhrt', '10.00', '15.00', 'sashes', '3', 'Active', '2022-03-14 23:32:03', '2022-03-14 23:35:08'),
(21, 2, 'Sashes', '1647320602.png', 'dsafsd', 'hgfhfgh', '10.00', '15.00', 'sashes', '2', 'Active', '2022-03-14 23:33:22', '2022-03-14 23:35:09'),
(22, 2, 'Sashes', '1647320625.png', 'dsafsd', 'hdfhfdg', '10.00', '15.00', 'sashes', '2', 'Active', '2022-03-14 23:33:45', '2022-03-14 23:35:10'),
(23, 2, 'Sashes', '1647320806.png', 'dsafsd', 'ghfghfg', '10.00', '15.00', 'sashes', '2', 'Active', '2022-03-14 23:36:46', '2022-03-14 23:49:47'),
(24, 3, 'Sashes', '1647321971.png', 'kliulfyi', 'fgtgtg', '10.00', '15.00', 'sashes', '2', 'Active', '2022-03-14 23:56:11', '2022-03-14 23:56:23'),
(25, 3, 'Sashes', '1647322123.png', 'dsafsd', 'fgtfhf', '10.00', '12.00', 'sashes', '2', 'Active', '2022-03-14 23:58:43', '2022-03-15 00:00:06'),
(26, 3, 'Sashes', '1647322145.png', 'jytjty', 'rgregr', '10.00', '12.00', 'sashes', '3', 'Active', '2022-03-14 23:59:05', '2022-03-15 00:00:05'),
(27, 3, 'Sashes', '1647322164.png', 'kliulfyi', 'rgreg', '10.00', '13.00', 'sashes', '3', 'Active', '2022-03-14 23:59:24', '2022-03-15 00:00:05'),
(28, 3, 'Sashes', '1647322260.png', 'kliulfyi', 'rgr', '10.00', '13.00', 'sashes', '2', 'Active', '2022-03-14 23:59:50', '2022-03-15 00:04:46'),
(29, 4, 'Sashes', '1647324879.png', 'kliulfyi', 'yjdgh', '10.00', '13.00', 'sashes', '2', 'InActive', '2022-03-15 00:44:39', '2022-03-15 00:44:39');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `images` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `images`, `created_at`, `updated_at`) VALUES
(43, 1, '99271647335635.jpg', '2022-03-15 03:43:55', '2022-03-15 03:43:55'),
(44, 1, '21781647335635.jpg', '2022-03-15 03:43:55', '2022-03-15 03:43:55'),
(45, 1, '40041647335635.jpg', '2022-03-15 03:43:55', '2022-03-15 03:43:55'),
(46, 1, '90841647335635.jpg', '2022-03-15 03:43:55', '2022-03-15 03:43:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `f_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` enum('Admin','User') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'User',
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Inactive',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `phone`, `profile_image`, `email`, `password`, `user_type`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'John', 'Doe', '8554147696', NULL, 'admin@gmail.com', '$2y$10$Yg7JaiFDosNrai36qChHg.WKZksVbnGUQlcEIEM8tLe80clyylCzG', 'Admin', 'Active', 'XV0LF1TJRvOAJBHsMfF5Md4UIlV34ngOZlSeDW1dObOl90uuauy5WpB22OHu', NULL, '2022-03-12 05:26:26'),
(2, 'user', 'dipanshu', '8554147696', '0d947e515acc962a540fb4449d221cb1cbc62e85.jpg', 'user@gmail.com', '$2y$10$cCZO/DRWj9LBhmdxolTdyOkJALrUjUDfQoBuN6zy3pwbOTzeOLJju', 'User', 'Active', 'HVkONSQouzeZbokQ6ioFUuHfUHnStJgXkH0gjib0BhgHc7A6CRq5kQMft36g', '2022-03-10 04:18:24', '2022-03-14 04:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `user_id`, `name`, `phone`, `state`, `city`, `pincode`, `address`, `status`, `created_at`, `updated_at`) VALUES
(4, 1, 'John Doe', '9424500024', 'West Bengal', 'Durgapur', '713216', 'City Centre, Ambedkar Sarani', 'Inactive', '2022-03-11 23:19:24', '2022-03-11 23:19:24'),
(6, 1, 'test', '9547835416', 'Bihar', 'Sasaram', '821122', 'Bus stand, Rouja Park', 'Inactive', '2022-03-12 05:20:44', '2022-03-12 05:20:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_pages`
--
ALTER TABLE `home_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_page_images`
--
ALTER TABLE `home_page_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_users`
--
ALTER TABLE `new_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_shipping_id_foreign` (`shipping_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_cat_id_foreign` (`cat_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_user_type_index` (`user_type`),
  ADD KEY `users_status_index` (`status`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_addresses_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `home_pages`
--
ALTER TABLE `home_pages`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `home_page_images`
--
ALTER TABLE `home_page_images`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `new_users`
--
ALTER TABLE `new_users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_shipping_id_foreign` FOREIGN KEY (`shipping_id`) REFERENCES `user_addresses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD CONSTRAINT `user_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
