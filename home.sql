-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-05-08 10:00:09
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
-- 資料庫： `home`
--

-- --------------------------------------------------------

--
-- 資料表結構 `expense`
--

CREATE TABLE `expense` (
  `id` int(11) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `note` varchar(64) NOT NULL,
  `payment` int(11) UNSIGNED NOT NULL,
  `type_id` int(2) UNSIGNED NOT NULL,
  `payto_id` int(1) UNSIGNED NOT NULL,
  `item_id` int(12) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `expense`
--

INSERT INTO `expense` (`id`, `date`, `note`, `payment`, `type_id`, `payto_id`, `item_id`) VALUES
(1, '2023-05-04', '', 100, 1, 1, 1),
(10, '2023-05-04', '', 100, 1, 1, 1),
(11, '2023-05-05', '', 110, 2, 2, 4),
(12, '2023-05-06', '', 120, 1, 1, 1),
(13, '2023-05-03', '', 60, 4, 3, 5),
(14, '2023-05-02', '', 300, 1, 1, 3),
(15, '2023-05-01', '', 200, 4, 3, 6),
(16, '2023-05-03', '', 600, 1, 1, 1),
(17, '2023-05-04', '', 170, 2, 1, 7),
(18, '2023-05-05', '', 20, 1, 1, 2),
(19, '2023-05-06', '', 300, 5, 2, 8);

-- --------------------------------------------------------

--
-- 資料表結構 `item`
--

CREATE TABLE `item` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `item`
--

INSERT INTO `item` (`id`, `name`) VALUES
(1, '早餐'),
(2, '午餐'),
(3, '晚餐'),
(4, '褲子'),
(5, '公車'),
(6, '計程車'),
(7, '上衣'),
(8, '買書');

-- --------------------------------------------------------

--
-- 資料表結構 `payto`
--

CREATE TABLE `payto` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `payto`
--

INSERT INTO `payto` (`id`, `name`) VALUES
(1, '現金'),
(2, '信用卡'),
(3, 'Apple Pay');

-- --------------------------------------------------------

--
-- 資料表結構 `type`
--

CREATE TABLE `type` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(1, '食'),
(2, '衣'),
(3, '住'),
(4, '行'),
(5, '育'),
(6, '樂');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `payto`
--
ALTER TABLE `payto`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `item`
--
ALTER TABLE `item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `payto`
--
ALTER TABLE `payto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
