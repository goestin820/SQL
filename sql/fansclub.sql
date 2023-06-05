-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-06-05 17:44:47
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
-- 資料庫： `fansclub`
--

-- --------------------------------------------------------

--
-- 資料表結構 `board`
--

CREATE TABLE `board` (
  `id` int(10) UNSIGNED NOT NULL,
  `mem_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(16) NOT NULL,
  `content` text NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `board`
--

INSERT INTO `board` (`id`, `mem_id`, `name`, `content`, `created_time`) VALUES
(1, 0, '33', '4444', '2023-06-04 07:24:33'),
(2, 0, '33', '4444', '2023-06-04 07:38:32'),
(3, 0, '33', '444', '2023-06-04 07:40:42');

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
(1, 1, 5, '2023-05-22 07:55:38', 'Array', '2023-05-22 05:55:38'),
(3, 1, 2, '2023-05-22 07:55:55', 'Array', '2023-05-22 05:55:55'),
(4, 1, 2, '2023-05-22 07:59:17', 'a:1:{i:2;a:2:{i:0;s:1:\"8\";i:1;s:2:\"18\";}}', '2023-05-22 05:59:17'),
(5, 0, 5, '2023-05-22 08:00:45', 'a:1:{i:5;s:2:\"23\";}', '2023-05-22 06:00:45'),
(6, 0, 5, '2023-05-22 08:00:54', 'a:1:{i:5;s:2:\"23\";}', '2023-05-22 06:00:54'),
(8, 3, 6, '2023-06-04 13:59:33', 'a:1:{i:6;s:2:\"29\";}', '2023-06-04 05:59:33'),
(9, 3, 7, '2023-06-04 13:59:42', 'a:1:{i:7;s:2:\"36\";}', '2023-06-04 05:59:42'),
(10, 3, 8, '2023-06-04 13:59:49', 'a:1:{i:8;a:1:{i:0;s:2:\"37\";}}', '2023-06-04 05:59:49'),
(11, 0, 8, '2023-06-04 14:07:19', 'a:1:{i:8;s:2:\"37\";}', '2023-06-04 06:07:19'),
(12, 2, 8, '2023-06-04 14:07:45', 'a:1:{i:8;s:2:\"38\";}', '2023-06-04 06:07:45');

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
(2, 'john', '1234', '醬', '泰山', 'john@gmail.com', 'member'),
(3, 'tin', '1234', '高', '三重', 'tin@gmail.com', 'admin'),
(4, 'hsu', '1234', 'hsu', '幸福小窩', 'hsu@gmail.com', 'member');

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
(37, '熱火', 8, 1, '2023-05-28 13:41:33', '2023-06-04 06:07:18'),
(38, '金塊', 8, 1, '2023-05-28 13:41:33', '2023-06-04 06:07:45');

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
  `login` tinyint(1) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `topics`
--

INSERT INTO `topics` (`id`, `subject`, `open_time`, `close_time`, `type`, `login`, `created_time`, `updated_time`) VALUES
(8, '熱火 or 金塊 總冠軍？', '2023-06-04 09:41:00', '2023-06-07 21:41:00', 1, 0, '2023-05-28 13:41:33', '2023-06-04 05:43:26');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`id`);

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
-- 使用資料表自動遞增(AUTO_INCREMENT) `board`
--
ALTER TABLE `board`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
