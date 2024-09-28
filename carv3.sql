-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2024 at 05:43 PM
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
-- Database: `carv3`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `car_type` varchar(255) NOT NULL,
  `daily_rent_price` decimal(8,2) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `number_of_seats` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `brand`, `model`, `year`, `car_type`, `daily_rent_price`, `availability`, `image`, `description`, `number_of_seats`, `created_at`, `updated_at`) VALUES
(12, 'Audi r8', 'audi', 'r8', 1999, 'coupe', 1200.00, 0, 'car_images/epMTYbhh1lnYU2Wf5zGpP23JY7mUEI2WM2AB8NQY.jpg', NULL, 2, '2024-09-27 05:43:14', '2024-09-28 09:12:41'),
(13, 'urus', 'Lamborghini', 'urus', 2018, 'sedan', 1500.00, 1, 'car_images/epMTYbhh1lnYU2Wf5zGpP23JY7mUEI2WM2AB8NQY.jpg', NULL, NULL, '2024-09-27 05:43:52', '2024-09-28 09:13:58'),
(15, 'Car Model 1', 'Brand A', 'Model X1', 2020, 'SUV', 50.00, 1, 'car_images/epMTYbhh1lnYU2Wf5zGpP23JY7mUEI2WM2AB8NQY.jpg', 'Description for Car Model 1', 5, '2024-09-28 08:47:14', '2024-09-28 04:52:53'),
(16, 'Car Model 2', 'Brand B', 'Model X2', 2021, 'Sedan', 40.00, 1, 'car_images/epMTYbhh1lnYU2Wf5zGpP23JY7mUEI2WM2AB8NQY.jpg', 'Description for Car Model 2', 4, '2024-09-28 08:47:14', '2024-09-28 09:15:07'),
(17, 'Car Model 3', 'Brand B', 'Model Y1', 2019, 'Hatchback', 35.00, 1, 'car_images/epMTYbhh1lnYU2Wf5zGpP23JY7mUEI2WM2AB8NQY.jpg', 'Description for Car Model 3', 5, '2024-09-28 08:47:14', '2024-09-28 04:59:15'),
(18, 'Car Model 4', 'Brand C', 'Model Z1', 2022, 'SUV', 60.00, 1, 'car_images/epMTYbhh1lnYU2Wf5zGpP23JY7mUEI2WM2AB8NQY.jpg', 'Description for Car Model 4', 7, '2024-09-28 08:47:14', '2024-09-28 08:47:14'),
(19, 'Car Model 5', 'Brand D', 'Model A1', 2018, 'Convertible', 70.00, 1, 'car_images/epMTYbhh1lnYU2Wf5zGpP23JY7mUEI2WM2AB8NQY.jpg', 'Description for Car Model 5', 2, '2024-09-28 08:47:14', '2024-09-28 08:47:14'),
(20, 'Car Model 6', 'Brand E', 'Model B1', 2021, 'Sedan', 55.00, 1, 'car_images/epMTYbhh1lnYU2Wf5zGpP23JY7mUEI2WM2AB8NQY.jpg', 'Description for Car Model 6', 5, '2024-09-28 08:47:14', '2024-09-28 08:47:14'),
(21, 'Car Model 7', 'Brand F', 'Model C1', 2020, 'SUV', 65.00, 1, 'car_images/epMTYbhh1lnYU2Wf5zGpP23JY7mUEI2WM2AB8NQY.jpg', 'Description for Car Model 7', 7, '2024-09-28 08:47:14', '2024-09-28 08:47:14'),
(22, 'Car Model 8', 'Brand G', 'Model D1', 2019, 'Hatchback', 45.00, 1, 'car_images/epMTYbhh1lnYU2Wf5zGpP23JY7mUEI2WM2AB8NQY.jpg', 'Description for Car Model 8', 5, '2024-09-28 08:47:14', '2024-09-28 08:47:14'),
(23, 'Car Model 9', 'Brand H', 'Model E1', 2022, 'Sedan', 50.00, 1, 'car_images/epMTYbhh1lnYU2Wf5zGpP23JY7mUEI2WM2AB8NQY.jpg', 'Description for Car Model 9', 4, '2024-09-28 08:47:14', '2024-09-28 08:47:14'),
(24, 'Car Model 10', 'Brand I', 'Model F1', 2023, 'SUV', 80.00, 1, 'car_images/epMTYbhh1lnYU2Wf5zGpP23JY7mUEI2WM2AB8NQY.jpg', 'Description for Car Model 10', 6, '2024-09-28 08:47:14', '2024-09-28 08:47:14'),
(25, 'Car Model 11', 'Brand J', 'Model G1', 2021, 'Convertible', 90.00, 1, 'car_images/epMTYbhh1lnYU2Wf5zGpP23JY7mUEI2WM2AB8NQY.jpg', 'Description for Car Model 11', 2, '2024-09-28 08:47:14', '2024-09-28 08:47:14'),
(26, 'Car Model 12', 'Brand K', 'Model H1', 2022, 'Hatchback', 40.00, 1, 'car_images/epMTYbhh1lnYU2Wf5zGpP23JY7mUEI2WM2AB8NQY.jpg', 'Description for Car Model 12', 5, '2024-09-28 08:47:14', '2024-09-28 08:47:14'),
(27, 'Car Model 13', 'Brand L', 'Model I1', 2019, 'SUV', 70.00, 1, 'car_images/epMTYbhh1lnYU2Wf5zGpP23JY7mUEI2WM2AB8NQY.jpg', 'Description for Car Model 13', 7, '2024-09-28 08:47:14', '2024-09-28 08:47:14'),
(28, 'Car Model 14', 'Brand M', 'Model J1', 2020, 'Sedan', 45.00, 1, 'car_images/epMTYbhh1lnYU2Wf5zGpP23JY7mUEI2WM2AB8NQY.jpg', 'Description for Car Model 14', 4, '2024-09-28 08:47:14', '2024-09-28 08:47:14'),
(29, 'Car Model 15', 'Brand N', 'Model K1', 2021, 'Convertible', 80.00, 1, 'car_images/epMTYbhh1lnYU2Wf5zGpP23JY7mUEI2WM2AB8NQY.jpg', 'Description for Car Model 15', 2, '2024-09-28 08:47:14', '2024-09-28 08:47:14'),
(30, 'Car Model 16', 'Brand O', 'Model L1', 2018, 'Hatchback', 30.00, 1, 'car_images/epMTYbhh1lnYU2Wf5zGpP23JY7mUEI2WM2AB8NQY.jpg', 'Description for Car Model 16', 5, '2024-09-28 08:47:14', '2024-09-28 08:47:14'),
(31, 'Car Model 17', 'Brand P', 'Model M1', 2023, 'SUV', 100.00, 1, 'car_images/epMTYbhh1lnYU2Wf5zGpP23JY7mUEI2WM2AB8NQY.jpg', 'Description for Car Model 17', 6, '2024-09-28 08:47:14', '2024-09-28 08:47:14'),
(32, 'Car Model 18', 'Brand Q', 'Model N1', 2022, 'Sedan', 55.00, 1, 'car_images/epMTYbhh1lnYU2Wf5zGpP23JY7mUEI2WM2AB8NQY.jpg', 'Description for Car Model 18', 4, '2024-09-28 08:47:14', '2024-09-28 08:47:14'),
(33, 'Car Model 19', 'Brand R', 'Model O1', 2019, 'Convertible', 75.00, 1, 'car_images/epMTYbhh1lnYU2Wf5zGpP23JY7mUEI2WM2AB8NQY.jpg', 'Description for Car Model 19', 2, '2024-09-28 08:47:14', '2024-09-28 08:47:14'),
(34, 'Car Model 20', 'Brand S', 'Model P1', 2021, 'Hatchback', 50.00, 1, 'car_images/epMTYbhh1lnYU2Wf5zGpP23JY7mUEI2WM2AB8NQY.jpg', 'Description for Car Model 20', 5, '2024-09-28 08:47:14', '2024-09-28 08:47:14'),
(35, 'Car Model 21', 'Brand T', 'Model Q1', 2023, 'SUV', 110.00, 1, 'car_images/epMTYbhh1lnYU2Wf5zGpP23JY7mUEI2WM2AB8NQY.jpg', 'Description for Car Model 21', 6, '2024-09-28 08:47:14', '2024-09-28 08:47:14'),
(36, 'Car Model 22', 'Brand U', 'Model R1', 2022, 'Sedan', 65.00, 1, 'car_images/epMTYbhh1lnYU2Wf5zGpP23JY7mUEI2WM2AB8NQY.jpg', 'Description for Car Model 22', 55, '2024-09-28 08:47:14', '2024-09-28 08:47:14'),
(37, 'Car Model 23', 'Brand V', 'Model S1', 2020, 'Convertible', 95.00, 1, 'car_images/epMTYbhh1lnYU2Wf5zGpP23JY7mUEI2WM2AB8NQY.jpg', 'Description for Car Model 23', 2, '2024-09-28 08:47:14', '2024-09-28 08:47:14'),
(38, 'Car Model 24', 'Brand W', 'Model T1', 2019, 'Hatchback', 35.00, 1, 'car_images/epMTYbhh1lnYU2Wf5zGpP23JY7mUEI2WM2AB8NQY.jpg', 'Description for Car Model 24', 5, '2024-09-28 08:47:14', '2024-09-28 08:47:14'),
(39, 'Car Model 25', 'Brand X', 'Model U1', 2023, 'SUV', 120.00, 1, 'car_images/epMTYbhh1lnYU2Wf5zGpP23JY7mUEI2WM2AB8NQY.jpg', 'Description for Car Model 25', 7, '2024-09-28 08:47:14', '2024-09-28 08:47:14'),
(40, 'Car Model 26', 'Brand Y', 'Model V1', 2021, 'Sedan', 45.00, 1, 'car_images/epMTYbhh1lnYU2Wf5zGpP23JY7mUEI2WM2AB8NQY.jpg', 'Description for Car Model 26', 4, '2024-09-28 08:47:14', '2024-09-28 08:47:14'),
(41, 'Car Model 27', 'Brand Z', 'Model W1', 2022, 'Convertible', 85.00, 1, 'car_images/epMTYbhh1lnYU2Wf5zGpP23JY7mUEI2WM2AB8NQY.jpg', 'Description for Car Model 27', 2, '2024-09-28 08:47:14', '2024-09-28 08:47:14'),
(42, 'Car Model 28', 'Brand AA', 'Model X1', 2023, 'Hatchback', 40.00, 1, 'car_images/epMTYbhh1lnYU2Wf5zGpP23JY7mUEI2WM2AB8NQY.jpg', 'Description for Car Model 28', 5, '2024-09-28 08:47:14', '2024-09-28 08:05:44'),
(43, 'Car Model 29', 'Brand BB', 'Model Y1', 2020, 'SUV', 70.00, 1, 'car_images/epMTYbhh1lnYU2Wf5zGpP23JY7mUEI2WM2AB8NQY.jpg', 'Description for Car Model 29', 6, '2024-09-28 08:47:14', '2024-09-28 08:47:14'),
(44, 'Car Model 30', 'Brand CC', 'Model Z1', 2021, 'Sedan', 50.00, 1, 'car_images/epMTYbhh1lnYU2Wf5zGpP23JY7mUEI2WM2AB8NQY.jpg', 'Description for Car Model 30', 4, '2024-09-28 08:47:14', '2024-09-28 08:47:14');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_09_17_153203_create_cars_table', 1),
(6, '2024_09_17_153209_create_rentals_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_cost` decimal(8,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'ongoing',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`id`, `user_id`, `car_id`, `start_date`, `end_date`, `total_cost`, `status`, `created_at`, `updated_at`) VALUES
(63, 20, 12, '2024-09-28', '2024-09-30', 2400.00, 'ongoing', '2024-09-28 09:12:41', '2024-09-28 09:13:41'),
(64, 20, 13, '2024-09-29', '2024-09-30', 3000.00, 'canceled', '2024-09-28 09:13:20', '2024-09-28 09:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'customer',
  `phone_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@example.com', '$2y$12$FIDJBAe4p61CFCUqrQS/0OdUN8xT8LGCfAqGf/6UEw/AuaRnNSZry', 'admin', NULL, NULL, '2024-09-25 00:51:48', '2024-09-25 00:51:48'),
(7, 'sohan', 's@gmail.com', '$2y$12$GvxXxu0vGD0nKLXeHV74beqOqQJywa0hXcgcCLIEQCQq9zjl4S2mS', 'customer', '01905618132', 'Bahadurpur', '2024-09-27 05:34:12', '2024-09-27 06:32:06'),
(8, 'sohan', 'sohanur1804@gmail.com', '$2y$12$bh14STd0no5EvpaRiYgCX..3SgRou7IOLIMgmXpYBPE4IbB7EMJfu', 'customer', NULL, NULL, '2024-09-28 03:41:42', '2024-09-28 03:41:42'),
(20, 'Sabbir ahmed', 'ahmedsabbirsm77@gmail.com', '$2y$12$yqLNivKMbFQXzsE2BtbAmuI25X848ecjb5FJ2gKonH2BSymC6sMb2', 'customer', NULL, NULL, '2024-09-28 09:12:19', '2024-09-28 09:12:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rentals_user_id_foreign` (`user_id`),
  ADD KEY `rentals_car_id_foreign` (`car_id`);

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
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rentals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
