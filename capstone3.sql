-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2017 at 07:42 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(35, 9, 11, NULL, NULL);

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
  `post` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post`, `picture`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'hi', '', 11, '2017-07-25 17:49:58', '2017-07-25 17:49:58'),
(9, 'aodusfhboashfklsa', '', 10, '2017-07-31 00:26:34', '2017-07-31 00:26:34'),
(10, 'salkdhklashfklsaj', '', 10, '2017-07-31 00:26:36', '2017-07-31 00:26:36'),
(11, 'pdasjflkasjflkjas', '', 12, '2017-07-31 00:27:42', '2017-07-31 00:27:42'),
(14, 'sdlkfjklsdf', '', 9, '2017-07-31 17:21:43', '2017-07-31 17:21:43'),
(15, 'sdlfkghljgkjsdf', '', 9, '2017-07-31 17:27:17', '2017-07-31 17:27:17'),
(16, 'laksfjlkdsnaf', '', 10, '2017-07-31 17:29:27', '2017-07-31 17:29:27'),
(17, 'dflkgndjgkldfg', 'uploads/11/C:\\xampp\\tmp\\phpCC25.tmp1501566795.jpg', 11, '2017-07-31 21:53:15', '2017-07-31 21:53:15'),
(18, 'ksodfjposdjpfo', 'uploads/11/1501566909.jpg', 11, '2017-07-31 21:55:09', '2017-07-31 21:55:09'),
(19, 'sdiufhoisdhf', 'uploads/9/1501566946.jpg', 9, '2017-07-31 21:55:46', '2017-07-31 21:55:46'),
(20, 'oskhnfoisdjif', 'uploads/10/1501569216.jpg', 10, '2017-07-31 22:33:36', '2017-07-31 22:33:36'),
(21, 'klasnfklsndfkln', NULL, 9, '2017-08-02 16:01:14', '2017-08-02 16:01:14'),
(22, 'kjdfkljskldfjdsdsfsdf', NULL, 9, '2017-08-03 00:34:04', '2017-08-03 18:26:02'),
(24, 'sdfsdfdsf', NULL, 9, '2017-08-03 18:28:33', '2017-08-03 18:28:33');

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
(2, 'hi', 3, 9, '2017-07-25 22:46:34', '2017-07-25 22:46:34'),
(3, 'hiiii', 2, 9, '2017-07-25 23:54:09', '2017-07-25 23:54:09'),
(4, 'hiiiii', 2, 9, '2017-07-25 23:54:40', '2017-07-25 23:54:40'),
(7, 'sadadf', 1, 10, '2017-07-26 21:57:36', '2017-07-26 21:57:36'),
(10, 'askpjdlkasjd;as', 9, 11, '2017-07-31 00:27:08', '2017-07-31 00:27:08'),
(12, 'dksfjklpsdjfl;', 20, 10, '2017-07-31 22:33:51', '2017-07-31 22:33:51'),
(13, 'jtgjht', 20, 10, '2017-07-31 22:47:22', '2017-07-31 22:47:22'),
(41, 'fdgdfgdfgdsfsdf', 15, 9, '2017-08-02 17:44:23', '2017-08-03 18:42:32'),
(45, 'dfsdf', 14, 9, '2017-08-02 17:46:11', '2017-08-02 17:46:11'),
(46, 'sdgsdg', 14, 9, '2017-08-02 18:42:30', '2017-08-02 18:42:30'),
(47, 'jkdhfkjdshf', 20, 9, '2017-08-02 22:14:46', '2017-08-02 22:14:46'),
(48, 'dsfsdfdsf', 15, 9, '2017-08-02 22:44:16', '2017-08-02 22:44:16'),
(49, 'dasdasd', 15, 9, '2017-08-02 22:44:34', '2017-08-02 22:44:34'),
(50, 'asdasdasd', 15, 9, '2017-08-02 22:45:18', '2017-08-02 22:45:18'),
(51, 'sadasdasd', 14, 9, '2017-08-02 22:45:32', '2017-08-02 22:45:32'),
(52, 'dsfsdfsdf', 15, 9, '2017-08-02 22:46:23', '2017-08-02 22:46:23'),
(53, 'dfsdfsdf', 20, 9, '2017-08-02 23:11:20', '2017-08-02 23:11:20'),
(54, 'sdfsdfsdfasdasd', 20, 9, '2017-08-02 23:12:27', '2017-08-03 18:52:11'),
(55, 'dsfsdfsdf', 20, 9, '2017-08-02 23:13:31', '2017-08-02 23:13:31'),
(56, 'dsfsdfsdfcfdf', 20, 9, '2017-08-02 23:15:58', '2017-08-03 18:07:35'),
(57, 'sdfsdf', 20, 9, '2017-08-02 23:16:00', '2017-08-02 23:16:00'),
(58, 'dsfsdfsd', 15, 9, '2017-08-02 23:31:23', '2017-08-02 23:31:23'),
(59, 'fsdfsdfsdf', 18, 9, '2017-08-02 23:31:34', '2017-08-02 23:31:34'),
(60, 'sdgdsgdsg', 20, 9, '2017-08-03 16:08:11', '2017-08-03 16:08:11'),
(61, 'dfsdfsdfsdf', 20, 9, '2017-08-03 16:47:14', '2017-08-03 16:47:14'),
(63, 'fsdfsdfsdf', 1, 9, '2017-08-03 18:27:20', '2017-08-03 18:27:20'),
(67, 'fdsfsdf', 20, 9, '2017-08-03 18:44:42', '2017-08-03 18:44:42'),
(68, 'sadasdsad', 17, 9, '2017-08-03 18:54:54', '2017-08-03 18:54:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT ' ',
  `interest` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `avatar`, `bio`, `interest`, `role`) VALUES
(9, 'Charlotte Flair', 'charlotte@example.com', '$2y$10$3W1FV9B8f5dTGViPJWXfMOMXCjbQj1n72m/kLqFH1.07XbRdzo9Ly', 'Hb16PmnRVpfgmb1f0hNkczNxABEuxwiGajR5vxy0mBo5B0ejB1SK2k4fi64f', '2017-07-23 17:54:32', '2017-08-01 18:03:15', 'uploads/9/1501637026.png', '4 time Women\'s Champion', 'Being a champion', 'regular'),
(10, 'Becky Lynch', 'becky@example.com', '$2y$10$ewKactJECPlKoYGxoCxX.uhQbjLGSzN4W1ekv4Bsd7iz01e6hrl4e', 'yRYxtg2jtUH8YxUuTvXPmnmkojUsXeLfauDAbXqQKZXujSvhLZKIZ2uM4UoN', '2017-07-23 17:54:47', '2017-08-01 20:17:45', 'uploads/10/1501637358.jpg', 'straight fire lass kicker', 'old fashion lass kicking', 'regular'),
(11, 'Bayley Bayley', 'bayley@example.com', '$2y$10$TZufOrMJDpbx9jhnknfirOEAbsmbZaox3cpA/yY.z/alL/giJSj2m', 'ULYsplW7YbKGOsFw9e0u4vCwePDmpTHO1SwOx7glQQnfZ12WPdXl84cB8cHh', '2017-07-23 17:56:02', '2017-08-01 17:29:43', 'uploads/11/1501637383.png', ' ', '', 'regular'),
(12, 'Sasha Banks', 'sasha@example.com', '$2y$10$5I6IFeaMRWiBSifxjCK8TOPZulXHmUzajei8KS1nm8KH6QWIsGQBu', 'vazovTfKz4Bldixi7Klk7bsT2e1lRbjZdFAf2mHZFRhhTJZ0ibTYimKSzCau', '2017-07-23 17:56:18', '2017-08-01 23:12:14', 'uploads/12/1501637401.png', 'boss', 'champ', 'regular'),
(13, 'Tyrion Lannister', 'tyrion@example.com', '$2y$10$1JKZzesuLV5xH7Wm6wzft.EQw/I7jV0M8u0Zl6Tp0zeAjeVF872C6', 'JazPffIA86SVOYxGl2ayGoi9eDGhWhaiPtu4RPfq3vznOEipS3QDaH4v2Ygg', '2017-08-02 00:34:07', '2017-08-02 00:35:48', 'uploads/13/1501662905.jpg', 'fuck Cersei', 'women', 'regular');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users_interests`
--
ALTER TABLE `users_interests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
