-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-06-06 10:26:37
-- 伺服器版本： 10.4.27-MariaDB
-- PHP 版本： 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `vote`
--

-- --------------------------------------------------------

--
-- 資料表結構 `logs`
--

CREATE TABLE `logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `mem_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `vote_time` datetime NOT NULL,
  `records` text NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `logs`
--

INSERT INTO `logs` (`id`, `mem_id`, `topic_id`, `vote_time`, `records`, `created_time`) VALUES
(1, 4, 12, '2023-05-29 09:44:09', 'a:1:{i:12;s:2:\"49\";}', '2023-05-29 01:44:09'),
(2, 4, 12, '2023-05-29 09:45:14', 'a:1:{i:12;s:2:\"49\";}', '2023-05-29 01:45:14'),
(3, 0, 12, '2023-06-06 08:11:07', 'a:1:{i:12;N;}', '2023-06-06 00:11:07'),
(4, 0, 12, '2023-06-06 08:21:01', 'a:1:{i:12;N;}', '2023-06-06 00:21:01'),
(7, 5, 18, '2023-06-06 12:07:14', 'a:1:{i:18;N;}', '2023-06-06 04:07:14'),
(9, 5, 19, '2023-06-06 13:05:14', 'a:1:{i:19;s:3:\"129\";}', '2023-06-06 05:05:14');

-- --------------------------------------------------------

--
-- 資料表結構 `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc` varchar(32) NOT NULL,
  `pw` varchar(16) NOT NULL,
  `name` varchar(16) NOT NULL,
  `addr` varchar(128) NOT NULL,
  `email` varchar(64) NOT NULL,
  `pr` varchar(16) NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `members`
--

INSERT INTO `members` (`id`, `acc`, `pw`, `name`, `addr`, `email`, `pr`) VALUES
(1, 'mack', '1234', ' 劉', '泰山', 'macklun@ms7.hinet.net', 'super'),
(4, 'tin', '1234', 'tin', 'tin', 'tin', 'member'),
(5, 'admin', '1234', 'admin', '1234', '1234', 'admin');

-- --------------------------------------------------------

--
-- 資料表結構 `options`
--

CREATE TABLE `options` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `total` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `options`
--

INSERT INTO `options` (`id`, `description`, `subject_id`, `total`, `created_time`, `updated_time`) VALUES
(33, '6', 7, 0, '2023-05-25 06:56:10', '2023-05-25 06:56:10'),
(34, '66', 7, 0, '2023-05-25 06:56:10', '2023-05-25 06:56:10'),
(35, '666', 7, 0, '2023-05-25 06:56:10', '2023-05-25 06:56:10'),
(36, '6666', 7, 0, '2023-05-25 06:56:10', '2023-05-25 06:56:10'),
(53, '50萬', 0, 200, '2023-05-29 08:16:26', '2023-05-29 08:16:26'),
(54, '50萬', 0, 200, '2023-05-29 08:16:26', '2023-05-29 08:16:26'),
(55, '50萬', 0, 200, '2023-05-29 08:16:27', '2023-05-29 08:16:27'),
(56, '50萬', 0, 200, '2023-05-29 08:27:35', '2023-05-29 08:27:35'),
(57, '50萬', 0, 200, '2023-05-29 08:28:03', '2023-05-29 08:28:03'),
(58, '200萬', 0, 200, '2023-05-29 08:28:04', '2023-05-30 07:48:57'),
(59, '300萬', 0, 300, '2023-05-29 08:28:21', '2023-05-30 06:44:15'),
(60, '1500萬', 0, 150, '2023-05-29 08:34:39', '2023-05-30 06:42:36'),
(82, '500', 13, 500, '2023-05-30 07:45:55', '2023-05-30 07:45:55'),
(83, '500', 13, 500, '2023-05-30 07:46:20', '2023-05-30 07:46:20'),
(84, '500', 13, 500, '2023-05-30 07:46:20', '2023-05-30 07:46:20'),
(85, '500', 13, 500, '2023-05-30 07:46:34', '2023-05-30 07:46:34'),
(86, '500', 13, 500, '2023-05-30 07:46:51', '2023-05-30 07:46:51'),
(87, '500', 13, 500, '2023-05-30 07:46:52', '2023-05-30 07:46:52'),
(123, '800', 12, 800, '2023-05-30 08:08:15', '2023-05-30 08:08:15'),
(124, '800', 12, 800, '2023-05-30 08:11:43', '2023-05-30 08:11:43'),
(125, '3', 18, 1, '2023-06-06 04:02:20', '2023-06-06 05:03:58'),
(126, '33', 18, 0, '2023-06-06 04:02:20', '2023-06-06 04:02:20'),
(127, '333', 18, 0, '2023-06-06 04:02:20', '2023-06-06 04:02:20'),
(128, '3333', 18, 0, '2023-06-06 04:02:20', '2023-06-06 04:02:20'),
(129, '66', 19, 1, '2023-06-06 05:04:58', '2023-06-06 05:05:14'),
(130, '7', 20, 0, '2023-06-06 05:22:28', '2023-06-06 05:22:28'),
(131, '77', 20, 0, '2023-06-06 05:22:28', '2023-06-06 05:22:28'),
(132, '777', 20, 0, '2023-06-06 05:22:28', '2023-06-06 05:22:28'),
(133, '7777', 20, 0, '2023-06-06 05:22:28', '2023-06-06 05:22:28');

-- --------------------------------------------------------

--
-- 資料表結構 `topics`
--

CREATE TABLE `topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` text NOT NULL,
  `open_time` datetime NOT NULL,
  `close_time` datetime NOT NULL,
  `type` int(1) UNSIGNED NOT NULL,
  `image` text DEFAULT NULL,
  `login` tinyint(1) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `topics`
--

INSERT INTO `topics` (`id`, `subject`, `open_time`, `close_time`, `type`, `image`, `login`, `created_time`, `updated_time`) VALUES
(2, '每天要花在通勤時間多久?', '2023-06-01 13:03:29', '2023-05-31 13:03:29', 2, NULL, 1, '2023-05-15 08:19:27', '2023-06-05 03:24:54'),
(5, '期望薪水多少?', '2023-06-02 11:25:01', '2023-05-29 13:05:29', 1, NULL, 0, '2023-05-19 06:23:38', '2023-06-05 03:25:08'),
(12, '粽子一顆多少錢可接受', '2023-06-06 12:02:01', '2023-06-07 12:02:01', 0, 'food.jpg', 0, '2023-05-29 01:39:40', '2023-06-06 04:02:01'),
(14, 'Homework要設定什麼主題', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, 1, '2023-06-05 02:26:35', '2023-06-05 02:26:35'),
(18, '3333', '2023-06-06 12:02:00', '2023-06-08 12:02:00', 2, '', 0, '2023-06-06 04:02:20', '2023-06-06 04:02:20'),
(19, '666', '2023-06-08 13:04:00', '2023-06-09 13:04:00', 1, 'pin.jpg', 1, '2023-06-06 05:04:58', '2023-06-06 05:04:58'),
(20, '777', '2023-06-12 13:22:00', '2023-06-15 13:22:00', 2, 'image-09.jpg', 0, '2023-06-06 05:22:28', '2023-06-06 05:22:28');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
