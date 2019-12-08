-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.4.8-MariaDB
-- PHP 版本： 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `address_book`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL COMMENT '流水號',
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '使用者帳號',
  `pwd` char(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '使用者密碼',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='管理者帳號';

--
-- 傾印資料表的資料 `admin`
--

INSERT INTO `admin` (`id`, `username`, `pwd`, `created_at`, `updated_at`) VALUES
(1, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '2019-12-05 00:43:04', '2019-12-05 00:43:04');

-- --------------------------------------------------------

--
-- 資料表結構 `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL COMMENT '流水號',
  `studentId` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '學號',
  `studentName` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '學生姓名',
  `studentGender` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '學生性別',
  `studentBirthday` date NOT NULL COMMENT '學生生日',
  `studentPhoneNumber` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '學生手機號碼',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='學生資料表';

--
-- 傾印資料表的資料 `students`
--

INSERT INTO `students` (`id`, `studentId`, `studentName`, `studentGender`, `studentBirthday`, `studentPhoneNumber`, `created_at`, `updated_at`) VALUES
(2, 'S001', '陳同學', '女', '1995-02-21', '0911111111', '2019-12-06 00:37:09', '2019-12-08 21:26:51'),
(3, 'S002', '王同學', '男', '1996-03-22', '0922222222', '2019-12-08 21:33:36', '2019-12-08 21:33:36'),
(4, 'S003', '張同學', '女', '1997-04-23', '0933333333', '2019-12-08 21:34:14', '2019-12-08 21:34:14'),
(5, 'S004', '李同學', '女', '1998-05-24', '0944444444', '2019-12-08 22:01:18', '2019-12-08 22:01:18'),
(6, 'S005', '林同學', '男', '1999-06-25', '0955555555', '2019-12-08 22:01:48', '2019-12-08 22:01:48'),
(7, 'S006', '江同學', '女', '2000-07-25', '0966666666', '2019-12-08 22:02:24', '2019-12-08 22:02:24'),
(8, 'S007', '周同學', '男', '2001-08-26', '0977777777', '2019-12-08 22:02:57', '2019-12-08 22:02:57'),
(9, 'S008', '劉同學', '男', '2002-09-27', '0988888888', '2019-12-08 22:03:48', '2019-12-08 22:03:48'),
(10, 'S009', '紀同學', '女', '2003-10-28', '0999999999', '2019-12-08 22:04:17', '2019-12-08 22:04:17');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
