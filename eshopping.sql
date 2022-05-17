-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2022 at 06:30 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_qty` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `prod_id`, `prod_qty`, `created_at`, `updated_at`) VALUES
(4, '2', '3', 10, '2022-04-26 20:05:44', '2022-04-26 20:05:44');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(2, 'Electronics', 'electronics', 'All kind of Electronics item', 0, 1, '1650429774.jpg', 'electronics', 'good electronics, electronics', 'good electronics, electronics, good electronics, electronics', '2022-04-19 21:42:54', '2022-04-19 21:42:54'),
(3, 'Pakaian', 'Pakaian', 'Pakaian', 0, 1, '1650449013.png', 'Pakaian', 'Pakaian', 'Pakaian', '2022-04-20 00:39:45', '2022-04-20 03:03:33'),
(6, 'Perlengkapan', 'Perlengkapan', 'Perlengkapan', 0, 1, '1650510130.png', 'Perlengkapan', 'Perlengkapan', 'Perlengkapan', '2022-04-20 20:02:10', '2022-04-20 20:02:10'),
(7, 'Handphone', 'Handphone', 'Handphone', 0, 1, '1650510153.png', 'Handphone', 'Handphone', 'Handphone', '2022-04-20 20:02:33', '2022-04-20 20:02:33');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_20_020813_create_categories_table', 2),
(6, '2022_04_20_085724_create_product_table', 3),
(7, '2022_04_22_093041_create_cart_table', 4),
(8, '2022_04_29_041412_create_orders_table', 5),
(9, '2022_04_29_042145_create_orders_items_table', 5),
(10, '2022_05_07_140905_create_wishlists_table', 6),
(11, '2022_05_17_145615_create__rating_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_mode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tracking_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fname`, `lname`, `email`, `phone`, `address1`, `address2`, `city`, `state`, `country`, `pincode`, `total_price`, `payment_mode`, `payment_id`, `status`, `message`, `tracking_no`, `created_at`, `updated_at`) VALUES
(1, '1', 'user', '1', 'user1@gmail.com', '1234567890', 'Address 1', 'Address 2', 'City 1', 'State 1', 'Country 1', '12345', '', '', NULL, 1, NULL, 'track6591', '2022-04-30 23:58:29', '2022-05-06 08:43:19'),
(2, '1', 'user', '1', 'user1@gmail.com', '1234567890', 'Address 1', 'Address 2', 'City 1', 'State 1', 'Country 1', '12345', '', '', NULL, 0, NULL, 'track5785', '2022-05-01 00:14:43', '2022-05-01 00:14:43'),
(3, '1', 'user', '1', 'user1@gmail.com', '1234567890', 'Address 1.1', 'Address 2.1', 'City 1', 'State 1', 'Country 1', '12345', '', '', NULL, 0, NULL, 'track3402', '2022-05-01 00:16:09', '2022-05-01 00:16:09'),
(4, '1', 'user', '1', 'user1@gmail.com', '1234567890', 'Address 1', 'Address 2', 'City 1', 'State 1', 'Country 1', '12345', '', '', NULL, 0, NULL, 'track1763', '2022-05-01 00:25:45', '2022-05-01 00:25:45'),
(5, '1', 'user', '1', 'user1@gmail.com', '1234567890', 'Address 1', 'Address 2', 'City 1', 'State 1', 'Country 1', '12345', '1200000', '', NULL, 0, NULL, 'track6664', '2022-05-01 00:46:52', '2022-05-01 00:46:52'),
(6, '1', 'user', '1', 'user1@gmail.com', '1234567890', 'Address 1', 'Address 2', 'City 1', 'State 1', 'Country 1', '12345', '1200000', '', NULL, 0, NULL, 'track9973', '2022-05-01 00:50:50', '2022-05-01 00:50:50'),
(7, '1', 'user', '1', 'user1@gmail.com', '1234567890', 'Address 1', 'Address 2', 'City 1', 'State 1', 'Country 1', '12345', '120000', 'Paid by Razorpay', 'pay_JUFk1X6fGH84rM', 0, NULL, 'track3829', '2022-05-12 01:38:18', '2022-05-12 01:38:18'),
(8, '1', 'user', '1', 'user1@gmail.com', '1234567890', 'Address 1', 'Address 2', 'City 1', 'State 1', 'Country 1', '12345', '100000', 'COD', NULL, 0, NULL, 'track6083', '2022-05-12 01:41:20', '2022-05-12 01:41:20'),
(9, '1', 'user', '1', 'user1@gmail.com', '1234567890', 'Address 1', 'Address 2', 'City 1', 'State 1', 'Country 1', '12345', '10', 'Paid by Paypal', '4ND69701FG242205J', 0, NULL, 'track2231', '2022-05-12 09:37:43', '2022-05-12 09:37:43'),
(10, '1', 'user', '1', 'user1@gmail.com', '1234567890', 'Address 1', 'Address 2', 'City 1', 'State 1', 'Country 1', '12345', '1800000', 'COD', NULL, 0, NULL, 'track3632', '2022-05-17 09:13:56', '2022-05-17 09:13:56');

-- --------------------------------------------------------

--
-- Table structure for table `orders_items`
--

CREATE TABLE `orders_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_qty` float NOT NULL,
  `prod_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_items`
--

INSERT INTO `orders_items` (`id`, `order_id`, `prod_id`, `prod_qty`, `prod_price`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 1, '1700000', '2022-04-30 23:58:29', '2022-04-30 23:58:29'),
(2, '1', '3', 1, '120000', '2022-04-30 23:58:29', '2022-04-30 23:58:29'),
(3, '1', '4', 2, '100000', '2022-04-30 23:58:29', '2022-04-30 23:58:29'),
(4, '1', '6', 1, '210000', '2022-04-30 23:58:29', '2022-04-30 23:58:29'),
(5, '2', '1', 1, '1700000', '2022-05-01 00:14:44', '2022-05-01 00:14:44'),
(6, '2', '3', 1, '120000', '2022-05-01 00:14:44', '2022-05-01 00:14:44'),
(7, '2', '4', 2, '100000', '2022-05-01 00:14:44', '2022-05-01 00:14:44'),
(8, '2', '6', 1, '210000', '2022-05-01 00:14:44', '2022-05-01 00:14:44'),
(9, '3', '1', 1, '1700000', '2022-05-01 00:16:09', '2022-05-01 00:16:09'),
(10, '3', '3', 1, '120000', '2022-05-01 00:16:09', '2022-05-01 00:16:09'),
(11, '3', '4', 2, '100000', '2022-05-01 00:16:09', '2022-05-01 00:16:09'),
(12, '3', '6', 1, '210000', '2022-05-01 00:16:09', '2022-05-01 00:16:09'),
(13, '4', '1', 1, '1700000', '2022-05-01 00:25:45', '2022-05-01 00:25:45'),
(14, '5', '3', 10, '120000', '2022-05-01 00:46:52', '2022-05-01 00:46:52'),
(15, '6', '3', 10, '120000', '2022-05-01 00:50:50', '2022-05-01 00:50:50'),
(16, '7', '3', 1, '120000', '2022-05-12 01:38:19', '2022-05-12 01:38:19'),
(17, '8', '4', 1, '100000', '2022-05-12 01:41:20', '2022-05-12 01:41:20'),
(18, '9', '3', 1, '10', '2022-05-12 09:37:43', '2022-05-12 09:37:43'),
(19, '10', '2', 1, '1800000', '2022-05-17 09:13:56', '2022-05-17 09:13:56');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cate_id` bigint(20) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` float NOT NULL,
  `tax` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `trending` tinyint(4) NOT NULL DEFAULT 0,
  `meta_title` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `cate_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `tax`, `status`, `trending`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 7, 'Xiaomi', 'xiaomi', 'Xiaomi', 'Xiaomi', '1500000', '1700000', '1650512917.jpg', 10, '170000', 0, 1, 'xiaomi', 'xiaomi', 'xiaomi', '2022-04-20 20:48:37', '2022-05-01 00:25:45'),
(2, 7, 'Vivo', 'vivo', 'vivo', 'vivo', '1600000', '1800000', '1650512971.jpeg', 14, '180000', 0, 1, 'vivo', 'vivo', 'vivo', '2022-04-20 20:49:31', '2022-05-17 09:13:56'),
(3, 2, 'Lampu', 'lampu', 'lampu', 'lampu', '100000', '10', '1650513024.jpg', 28, '12000', 0, 1, 'lampu', 'lampu', 'lampu', '2022-04-20 20:50:24', '2022-05-12 09:37:43'),
(4, 3, 'Topi', 'topi', 'topi luar', 'topi', '90000', '11', '1650517625.jpg', 49, '1000', 0, 1, 'topi', 'topi', 'topi', '2022-04-20 20:51:12', '2022-05-12 01:41:20'),
(6, 3, 'Jaket', 'jaket', 'jaket', 'jaket', '200000', '210000', '1650529890.jpg', 50, '20000', 0, 1, 'jaket', 'jaket', 'jaket', '2022-04-21 01:31:30', '2022-04-21 20:39:00'),
(7, 7, 'Headphone', 'headphone', 'headphone', 'headphone', '110000', '90000', '1651203124.png', 0, '9000', 0, 1, 'headphone', 'headphone', 'headphone', '2022-04-28 20:32:04', '2022-04-28 20:32:04'),
(8, 6, 'Bor', 'bor', 'bor', 'bor', '200000', '190000', '1651203628.jpg', 0, '10000', 0, 1, 'bor', 'bor', 'bor', '2022-04-28 20:40:28', '2022-04-28 20:42:09');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stars_rated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `user_id`, `prod_id`, `stars_rated`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '5', '2022-05-17 08:45:52', '2022-05-17 08:45:52'),
(2, '2', '1', '4', '2022-05-17 16:05:20', '2022-05-17 16:05:20'),
(3, '1', '6', '3', '2022-05-17 09:12:44', '2022-05-17 09:12:44'),
(4, '1', '2', '5', '2022-05-17 09:14:04', '2022-05-17 09:28:59');

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
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `lname`, `phone`, `address1`, `address2`, `city`, `state`, `country`, `pincode`, `role_as`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user1@gmail.com', NULL, '$2y$10$Ns2M.YmTS0kOHwPk9LMjG.6PQz6tFcKcMRhDQg7gEaIPwuybyh582', '1', '1234567890', 'Address 1', 'Address 2', 'City 1', 'State 1', 'Country 1', '12345', 1, NULL, '2022-04-18 22:05:51', '2022-04-30 23:58:30'),
(2, 'user2', 'user2@gmail.com', NULL, '$2y$10$YBqI1SCnVy3DJpuB.H92ougD8UYiS0A/rfNFcsrVd/MPtzo.hPZqu', '', '', '', '', '', '', '', '', 0, NULL, '2022-04-18 23:20:22', '2022-04-18 23:20:22');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `prod_id`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '2022-05-07 08:12:04', '2022-05-07 08:12:04'),
(4, '1', '2', '2022-05-07 08:45:35', '2022-05-07 08:45:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_items`
--
ALTER TABLE `orders_items`
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
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders_items`
--
ALTER TABLE `orders_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
