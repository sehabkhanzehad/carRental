-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 29, 2024 at 12:35 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int NOT NULL,
  `car_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `daily_rent_price` decimal(8,2) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT '1',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `brand`, `model`, `year`, `car_type`, `daily_rent_price`, `availability`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Toyota Camry', 'Toyota', 'Camry', 2023, 'Sedan', '3000.00', 1, '/uploads/cars/66f672bb72bec_car.jpg', '2024-09-24 04:28:15', '2024-09-27 02:54:19'),
(2, 'Honda Accord', 'Honda', 'Accord', 2023, 'Sedan', '3000.00', 1, '/uploads/cars/66f67313ced58_car.jpg', '2024-09-24 09:25:32', '2024-09-27 02:55:47'),
(6, 'Ford F-150', 'Ford', 'F-150', 2023, 'Pickup Truck', '2000.00', 1, '/uploads/cars/66f67491cdca7_car.jpg', '2024-09-27 03:02:10', '2024-09-27 03:02:10'),
(7, 'Chevrolet Tahoe', 'Chevrolet', 'Tahoe', 2023, 'SUV', '2500.00', 1, '/uploads/cars/66f675cf0b602_car.jpg', '2024-09-27 03:07:27', '2024-09-27 03:07:27'),
(8, 'BMW X5', 'BMW', 'X5', 2021, 'Coupe', '3000.00', 1, '/uploads/cars/66f6760037cb4_car.jpg', '2024-09-27 03:08:16', '2024-09-27 03:08:16'),
(10, 'Toyota RAV4', 'Toyota', 'RAV4', 2022, 'Toyota', '4500.00', 1, '/uploads/cars/66f805876f1fc_car.jpg', '2024-09-28 07:32:55', '2024-09-28 07:32:55'),
(11, 'Audi A5', 'Audi', 'A5', 2024, 'Coupe', '2600.00', 1, '/uploads/cars/66f805bfe1ed0_car.jpg', '2024-09-28 07:33:51', '2024-09-28 07:33:51'),
(12, 'Volkswagen Passat', 'Volkswagen', 'Passat', 2021, 'Sedan', '3200.00', 1, '/uploads/cars/66f8061445b62_car.jpg', '2024-09-28 07:35:16', '2024-09-28 07:35:16');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2024_09_23_181942_create_cars_table', 2),
(11, '2024_09_23_184522_create_rentals_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `car_id` bigint UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_cost` decimal(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `otp`, `role`, `created_at`, `updated_at`) VALUES
(2, 'Sk Zehad', 'sehabkhanzehad@gmail.com', '$2y$10$Fhbw96DTORlYDGCCtEnZB.X1nkZnAPpSko6eJedkaN3Z0gT.w/ASi', NULL, 'customer', '2024-09-21 09:24:29', '2024-09-21 09:24:29'),
(5, 'Bell Dale', 'febosilav@mailinator.com', '$2y$10$abAoHpvhWm1VY2XzRuy4WuAm.h5.SrQSffTy623/0bl7L1oxlLvre', NULL, 'customer', '2024-09-22 09:30:38', '2024-09-22 09:30:38'),
(6, 'Priscilla Christian', 'wasuperody@mailinator.com', '$2y$10$bKx8OkYHZ7iF/db9Vh//L.XyTtbWUtIiuD7sQ2BiZGcI8saXzV6fu', NULL, 'customer', '2024-09-22 09:30:56', '2024-09-22 09:30:56'),
(7, 'Sk Zehad', 'sehabkhanzehad@yahoo.com', '$2y$10$Fhbw96DTORlYDGCCtEnZB.X1nkZnAPpSko6eJedkaN3Z0gT.w/ASi', NULL, 'admin', '2024-09-22 10:58:08', '2024-09-22 17:23:08'),
(8, 'Alvis', 'alviszn3@gmail.com', '$2y$10$r4zdfWvl9j2eLjW5NUUShOQPamVIGUcJnZ8NWQQflZz2/vc5cNbBG', NULL, 'customer', '2024-09-28 05:16:04', '2024-09-28 05:16:04');

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `rentals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
