-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2018 at 07:45 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone3`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_1` int(11) NOT NULL,
  `user_2` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user_1`, `user_2`, `created_at`, `updated_at`) VALUES
(28, 9, 10, NULL, NULL),
(32, 12, 11, NULL, NULL),
(33, 12, 10, NULL, NULL),
(35, 9, 11, NULL, NULL),
(38, 14, 11, NULL, NULL),
(47, 14, 10, NULL, NULL),
(53, 14, 13, NULL, NULL),
(54, 13, 9, NULL, NULL),
(55, 13, 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
  `id` int(10) UNSIGNED NOT NULL,
  `interest` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`id`, `interest`, `created_at`, `updated_at`) VALUES
(1, 'Adventure', NULL, NULL),
(2, 'Art', NULL, NULL),
(3, 'Books', NULL, NULL),
(4, 'Cooking', NULL, NULL),
(5, 'Exercise', NULL, NULL),
(6, 'Fashion', NULL, NULL),
(7, 'Fitness', NULL, NULL),
(8, 'Love', NULL, NULL),
(9, 'Movies', NULL, NULL),
(10, 'Music', NULL, NULL),
(11, 'Photography', NULL, NULL),
(12, 'Politics', NULL, NULL),
(13, 'Science', NULL, NULL),
(14, 'Sports', NULL, NULL),
(15, 'TV Shows', NULL, NULL),
(16, 'Tech', NULL, NULL),
(17, 'Travel', NULL, NULL);

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
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2017_07_21_053906_createInterestsTable', 1),
(11, '2017_07_21_054007_createUserInterestsTable', 1),
(12, '2017_07_21_054209_add_avatar_to_users_table', 1),
(13, '2017_07_21_054326_createFriendsTable', 1),
(14, '2017_07_21_054351_createPostsTable', 1),
(15, '2017_07_24_014710_add_role_to_users', 2),
(16, '2017_07_26_044822_createRepliesTable', 3);

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
  `post` text COLLATE utf8mb4_unicode_ci,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post`, `picture`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'hi', NULL, 11, '2017-07-25 17:49:58', '2017-07-25 17:49:58'),
(4, 'This vacation is gonna be good!', NULL, 14, '2018-04-02 22:42:46', '2018-04-02 22:42:46'),
(5, 'Exhausted', NULL, 9, '2018-04-02 23:05:45', '2018-04-02 23:05:45'),
(6, 'Pumped', NULL, 10, '2018-04-02 23:06:26', '2018-04-02 23:06:26'),
(7, NULL, 'uploads/14/1522746217.jpg', 14, '2018-04-03 01:03:37', '2018-04-03 01:03:37'),
(8, NULL, 'uploads/14/1525927160.jpg', 14, '2018-05-09 20:39:20', '2018-05-09 20:39:20'),
(9, NULL, 'uploads/14/1525927812.jpg', 14, '2018-05-09 20:50:12', '2018-05-09 20:50:12'),
(10, 'yo', NULL, 13, '2018-05-25 01:40:51', '2018-05-25 01:40:51');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `reply` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `reply`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'hi!', 1, 9, '2017-07-25 22:46:18', '2017-07-30 22:38:38'),
(3, 'hiiii', 2, 9, '2017-07-25 23:54:09', '2017-07-25 23:54:09'),
(4, 'take a rest!', 5, 14, '2018-05-07 01:04:48', '2018-05-07 01:04:48'),
(6, 'heyy', 10, 14, '2018-05-28 23:32:52', '2018-05-30 05:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'uploads/default/avatar-default.jpg',
  `cover_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '  ',
  `interest` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '  ',
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'regular'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `birthday`, `password`, `remember_token`, `created_at`, `updated_at`, `avatar`, `cover_photo`, `bio`, `interest`, `location`, `role`) VALUES
(9, 'Charlotte Flair', 'charlotte@example.com', '1986-04-05', '$2y$10$3W1FV9B8f5dTGViPJWXfMOMXCjbQj1n72m/kLqFH1.07XbRdzo9Ly', 'DIZRPe9lplJbaZXosJhhMOMRErSCcRNxmqvH8sTrnBndyGQEyiCxT3bq55H8', '2017-07-23 17:54:32', '2017-08-01 18:03:15', 'uploads/9/1501637026.png', NULL, '4 time Women\'s Champion', 'Being a champion', '', 'regular'),
(10, 'Becky Lynch', 'becky@example.com', '1987-01-30', '$2y$10$ewKactJECPlKoYGxoCxX.uhQbjLGSzN4W1ekv4Bsd7iz01e6hrl4e', 'MQIzW1eGPppWwLSup04DFatpHdwg9I1L20kbPS64qcdFcSpc6gqF4Zdjbxch', '2017-07-23 17:54:47', '2017-08-01 20:17:45', 'uploads/10/1501637358.jpg', NULL, 'straight fire lass kicker', 'old fashion lass kicking', '', 'regular'),
(11, 'Bayley Bayley', 'bayley@example.com', '1989-06-15', '$2y$10$TZufOrMJDpbx9jhnknfirOEAbsmbZaox3cpA/yY.z/alL/giJSj2m', 'ULYsplW7YbKGOsFw9e0u4vCwePDmpTHO1SwOx7glQQnfZ12WPdXl84cB8cHh', '2017-07-23 17:56:02', '2017-08-01 17:29:43', 'uploads/11/1501637383.png', NULL, ' ', '', '', 'regular'),
(12, 'Sasha Banks', 'sasha@example.com', '1992-01-26', '$2y$10$5I6IFeaMRWiBSifxjCK8TOPZulXHmUzajei8KS1nm8KH6QWIsGQBu', 'vazovTfKz4Bldixi7Klk7bsT2e1lRbjZdFAf2mHZFRhhTJZ0ibTYimKSzCau', '2017-07-23 17:56:18', '2017-08-01 23:12:14', 'uploads/12/1501637401.png', NULL, 'boss', 'champ', '', 'regular'),
(13, 'Tyrion Lannister', 'tyrion@example.com', '1998-05-30', '$2y$10$1JKZzesuLV5xH7Wm6wzft.EQw/I7jV0M8u0Zl6Tp0zeAjeVF872C6', 'VDzoTSHQGu7Hxc25Rwh2d62e3Auvz6sftz5vZddJBTx2S7MxtN000CBJZqqz', '2017-08-02 00:34:07', '2017-08-02 00:35:48', 'uploads/13/1501662905.jpg', NULL, 'fuck Cersei', 'women', '', 'regular'),
(14, 'John Doe', 'johndoe@example.com', '1990-01-08', '$2y$10$CiJCNzADx5Qeqdbc9kaKE..smOTrn0XJhmNX8922HpUfhv3qPUG6G', 'K3il7Q1rz37jN1KO34sB46CEyQy9jGJzcQ1pgbUV8Ybp8ffmcP9HaMOTzGca', '2018-03-19 05:18:34', '2018-05-30 03:21:43', 'uploads/14/1527580972.jpg', 'uploads/14/1527581674.jpg', 'white dude, designer', 'champ', 'CA', 'regular'),
(15, 'Johnny Doo', 'johnny@email.com', '0000-00-00', '$2y$10$wm5I.y/tCewUR.uM4uLsNe4Q444/kz2GTAxEZqWVj2mFfWxZJb05C', 'UKXMtyBNfEjN7ttEu3XMQPwaRYJVwWg00FUh5c6hEGUyniTpYXVPAKMNoZ0j', '2018-03-27 01:19:08', '2018-03-27 01:19:08', 'uploads/default/avatar-default.jpg', NULL, '  ', ' ', '', 'regular');

-- --------------------------------------------------------

--
-- Table structure for table `users_interests`
--

CREATE TABLE `users_interests` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `interest_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
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
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_interests`
--
ALTER TABLE `users_interests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users_interests`
--
ALTER TABLE `users_interests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
