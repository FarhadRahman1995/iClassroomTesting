-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2019 at 03:42 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ewuhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `class_rooms`
--

CREATE TABLE `class_rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_rooms`
--

INSERT INTO `class_rooms` (`id`, `name`, `section`, `subject`, `room`, `slug`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'scac', 'scac', 'scasc', 'cdsc', 'OXEEfuqvXvZs5DP', 1, '2019-03-31 09:28:04', '2019-03-31 09:28:04'),
(2, 'CSE411', '1', 'Database', '121', '24zQWeSFwV0V89W', 1, '2019-03-31 09:29:52', '2019-03-31 09:29:52'),
(3, 'user 1 made a grop', '1', '1', '1', 'B93LAfL8MlT5cVF', 2, '2019-04-01 09:38:02', '2019-04-01 09:38:02'),
(4, '405 cse', '1', 'cse', '1', 'ga42kl1PyWJpVrJ', 2, '2019-04-01 21:24:38', '2019-04-01 21:24:38'),
(5, 'cse400', '1', 'CSE', '1', 'OWRakGfRQ3g4wjk', 4, '2019-04-01 21:35:34', '2019-04-01 21:35:34'),
(6, 'CSE345', '2', 'Digital Logic Design', '631', '6jBvhHJGuG3E93G', 6, '2019-04-08 18:08:50', '2019-04-08 18:08:50');

-- --------------------------------------------------------

--
-- Table structure for table `class_room_user`
--

CREATE TABLE `class_room_user` (
  `pivoit_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `class_room_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_room_user`
--

INSERT INTO `class_room_user` (`pivoit_id`, `user_id`, `class_room_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 'no', NULL, NULL),
(2, 3, 3, 'yes', NULL, NULL),
(3, 3, 4, 'yes', NULL, NULL),
(4, 5, 5, 'yes', NULL, NULL),
(5, 7, 6, 'yes', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` int(10) UNSIGNED NOT NULL,
  `commentable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `parent_id`, `body`, `commentable_id`, `commentable_type`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'kljklj', 4, 'App\\Post', '2019-04-01 08:46:54', '2019-04-01 08:46:54'),
(2, 1, 1, 'cvxcvxcv', 4, 'App\\Post', '2019-04-01 08:47:07', '2019-04-01 08:47:07'),
(3, 3, NULL, 'dsfdfsf', 5, 'App\\Post', '2019-04-01 10:13:03', '2019-04-01 10:13:03'),
(4, 2, NULL, 'sdsdasdas', 7, 'App\\Post', '2019-04-01 21:26:18', '2019-04-01 21:26:18'),
(5, 3, 4, 'sdsdas', 7, 'App\\Post', '2019-04-01 21:26:34', '2019-04-01 21:26:34'),
(6, 4, NULL, 'sdsds', 8, 'App\\Post', '2019-04-01 21:36:41', '2019-04-01 21:36:41'),
(7, 5, 6, 'n   nbhb', 8, 'App\\Post', '2019-04-01 21:36:53', '2019-04-01 21:36:53'),
(8, 7, NULL, 'This is a comment', 9, 'App\\Post', '2019-04-08 19:25:15', '2019-04-08 19:25:15'),
(9, 7, 8, 'This is a reply to the comment.', 9, 'App\\Post', '2019-04-08 19:25:33', '2019-04-08 19:25:33');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(3, '2019_02_22_173930_create_class_rooms_table', 1),
(6, '2019_04_01_130256_create_comments_table', 2),
(9, '2019_02_22_194014_create_posts_table', 3),
(11, '2019_02_22_185226_create_classroom_user_table', 4),
(12, '2019_04_08_121609_create_files_table', 5);

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
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `class_room_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `user_id`, `class_room_id`, `created_at`, `updated_at`) VALUES
(1, 'hi', 'sasdasdasd', 1, 2, '2019-04-01 07:58:48', '2019-04-01 07:58:48'),
(2, 'hi', 'sasdasdasd', 1, 2, '2019-04-01 07:58:54', '2019-04-01 07:58:54'),
(3, 'hi', 'sasdasdsadasasd', 1, 2, '2019-04-01 07:59:37', '2019-04-01 07:59:37'),
(4, 'hi', 'efsfdsdfsfsdfsdfsdfs', 1, 2, '2019-04-01 08:16:59', '2019-04-01 08:16:59'),
(5, 'hi', 'hi there', 1, 2, '2019-04-01 08:17:06', '2019-04-01 08:17:06'),
(6, 'hi', 'sddsfsdf', 3, 3, '2019-04-01 10:12:02', '2019-04-01 10:12:02'),
(7, 'hi', 'sdfdsfsdf', 3, 4, '2019-04-01 21:25:57', '2019-04-01 21:25:57'),
(8, 'hi', 'sdsdsd', 5, 5, '2019-04-01 21:36:30', '2019-04-01 21:36:30'),
(9, 'hi', 'Hello', 7, 6, '2019-04-08 19:22:38', '2019-04-08 19:22:38');

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
(1, 'Admin admin', 'admin@admin.com', NULL, '$2y$10$mNQ43Kq1KBx.FSX5UogMtOL.C16lOI.yYkazBPYkkudWeis4DAcMO', 'dv5IB1DzS9N6UfSHjRNxkx4qdnjnrrFqUUddHMjeuFzkUDhklyKDKfcZnqQh', '2019-03-31 09:26:21', '2019-03-31 09:26:21'),
(2, 'user1', 'user1@user.com', NULL, '$2y$10$How7nQYSSg4ejIJFk7FrKuj1Loyttk0SSDx0WLFw0v2Tkbs4h0SUW', 'XMNd0zwO9JLkYuQaLpOs2umUOWCNJyWOJIV4g7ClnOjE060fFg1bto4VOfW5', '2019-04-01 09:37:03', '2019-04-01 09:37:03'),
(3, 'user2', 'user2@user.com', NULL, '$2y$10$aNRCqRzDwCvjoyxfrR.3turgvDh/JRsC.DmUXE4qod1OJUDrHx92i', 'WNuj1knEB7baK0s65Ofng0ZaMuJVTW4AQUZuhWgzdf2jbwgCJDuNh7AaxTMi', '2019-04-01 09:37:29', '2019-04-01 09:37:29'),
(4, 'Saif', 'saif@admin.com', NULL, '$2y$10$HIydyLXgFPZKXTtvPqcb3.qAc.QVMuYNVgw206v/bBEWbRMAZQUpO', '6hrDUCGzWlXkqhllBGBTMdCBHTMblSx8katDMIYH8eCmCBxMYZzrDJ8Q1E3E', '2019-04-01 21:34:30', '2019-04-01 21:34:30'),
(5, 'Tushar', 'tushar@admin.com', NULL, '$2y$10$dvRw/yN4YzRR8beYuoXgXOceAuwJUyMEejPxQ3oESptzBHfqjZHsG', 'mgujVCBAYo1PxKBtTxPlWytJMQumEaCJq1zlFDSDV7cAKb6afbd8SylEWyh5', '2019-04-01 21:35:03', '2019-04-01 21:35:03'),
(6, 'Alif Arifin', 'arifintripto@gmail.com', NULL, '$2y$10$LngmbKRhI1hnWYlKYSw91O4MiWHS5gVKkU9YQ6N2NvRBSwkg1H7NW', 'ixOy7KxYbbShEZZaAJ0orQBDRj0r7n3KoupXKYlLp18p6ICGbX1tIWx1BpBU', '2019-04-08 18:06:43', '2019-04-08 18:06:43'),
(7, 'Arifin Tripto', 'arifintriptoo@gmail.com', NULL, '$2y$10$x48H4QMA2HBnXYmTDQMNVeEzTXuz0EnrwSVI2piUOwz9gc3C2HI16', 'PLQUqa6K1rNVAdpe5w9iTAqpiFvkVu9zsYcyc1bUQrmaUECLmAOqASY4WdB2', '2019-04-08 18:13:10', '2019-04-08 18:13:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class_rooms`
--
ALTER TABLE `class_rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `class_rooms_slug_unique` (`slug`);

--
-- Indexes for table `class_room_user`
--
ALTER TABLE `class_room_user`
  ADD PRIMARY KEY (`pivoit_id`),
  ADD KEY `class_room_user_user_id_foreign` (`user_id`),
  ADD KEY `class_room_user_class_room_id_foreign` (`class_room_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `class_rooms`
--
ALTER TABLE `class_rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `class_room_user`
--
ALTER TABLE `class_room_user`
  MODIFY `pivoit_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class_room_user`
--
ALTER TABLE `class_room_user`
  ADD CONSTRAINT `class_room_user_class_room_id_foreign` FOREIGN KEY (`class_room_id`) REFERENCES `class_rooms` (`id`),
  ADD CONSTRAINT `class_room_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
