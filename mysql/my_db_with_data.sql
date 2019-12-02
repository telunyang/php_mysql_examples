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
-- 資料庫： `my_db`
--

-- --------------------------------------------------------

--
-- 資料表結構 `courses`
--

CREATE TABLE `courses` (
  `cId` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '課程編號',
  `cName` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '課程名稱',
  `credit` tinyint(1) NOT NULL COMMENT '學分數',
  `isCompulsory` tinyint(1) NOT NULL COMMENT '必選修',
  `tId` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '老師編號',
  `created_at` datetime NOT NULL COMMENT '新增時間',
  `updated_at` datetime NOT NULL COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='課程資料表';

--
-- 傾印資料表的資料 `courses`
--

INSERT INTO `courses` (`cId`, `cName`, `credit`, `isCompulsory`, `tId`, `created_at`, `updated_at`) VALUES
('C001', '程式設計', 4, 1, 'T001', '2019-12-02 00:00:00', '2019-12-02 00:00:00'),
('C002', '網頁設計', 3, 1, 'T002', '2019-12-02 00:00:00', '2019-12-02 00:00:00'),
('C003', '視覺設計', 2, 1, 'T003', '2019-12-02 00:00:00', '2019-12-02 00:00:00'),
('C004', '網路教學', 4, 1, 'T005', '2019-12-02 00:00:00', '2019-12-02 00:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `scores`
--

CREATE TABLE `scores` (
  `sId` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '學生編號',
  `cId` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '課程編號',
  `score` tinyint(3) NOT NULL COMMENT '成績',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='成績資料表';

--
-- 傾印資料表的資料 `scores`
--

INSERT INTO `scores` (`sId`, `cId`, `score`, `created_at`, `updated_at`) VALUES
('087', 'C001', 74, '2019-12-02 11:11:59', '2019-12-02 11:11:59'),
('087', 'C002', 93, '2019-12-02 11:12:35', '2019-12-02 11:12:35'),
('088', 'C002', 63, '2019-12-02 11:12:35', '2019-12-02 11:12:35'),
('088', 'C003', 82, '2019-12-02 11:13:06', '2019-12-02 11:13:06'),
('088', 'C004', 94, '2019-12-02 11:13:06', '2019-12-02 11:13:06');

-- --------------------------------------------------------

--
-- 資料表結構 `students`
--

CREATE TABLE `students` (
  `sId` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '學生編號',
  `sName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '學生姓名',
  `sGender` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '學生性別',
  `sNickname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '學生暱稱',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='學生資料表';

--
-- 傾印資料表的資料 `students`
--

INSERT INTO `students` (`sId`, `sName`, `sGender`, `sNickname`, `created_at`, `updated_at`) VALUES
('003', '王○○', '男', '小王', '2019-12-02 18:27:16', '2019-12-02 18:27:16'),
('004', '江○○', '女', '小江', '2019-12-02 18:27:16', '2019-12-02 18:27:16'),
('005', '周○○', '女', '小周', '2019-12-02 18:27:16', '2019-12-02 18:27:16'),
('006', '黃○○', '男', '小黃', '2019-12-02 18:27:16', '2019-12-02 18:27:16'),
('007', '丁○○', '男', '小丁', '2019-12-02 18:27:16', '2019-12-02 18:27:16'),
('008', '鄭○○', '男', '小鄭', '2019-12-02 18:27:16', '2019-12-02 18:27:16'),
('087', '楊○○', '男', '好人', '2019-12-02 11:11:37', '2019-12-02 11:11:37'),
('088', '陳○○', '女', '小白', '2019-12-02 11:11:37', '2019-12-02 11:11:37');

-- --------------------------------------------------------

--
-- 資料表結構 `teachers`
--

CREATE TABLE `teachers` (
  `tId` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '老師編號',
  `tName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '老師姓名',
  `created_at` datetime NOT NULL COMMENT '新增時間',
  `updated_at` datetime NOT NULL COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='老師資料表';

--
-- 傾印資料表的資料 `teachers`
--

INSERT INTO `teachers` (`tId`, `tName`, `created_at`, `updated_at`) VALUES
('T001', '黃○○', '2019-12-02 00:00:00', '2019-12-02 00:00:00'),
('T002', '林○○', '2019-12-02 00:00:00', '2019-12-02 00:00:00'),
('T003', '王○○', '2019-12-02 00:00:00', '2019-12-02 00:00:00'),
('T005', '謝○○', '2019-12-02 00:00:00', '2019-12-02 00:00:00');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`cId`,`tId`);

--
-- 資料表索引 `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`sId`,`cId`);

--
-- 資料表索引 `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`sId`);

--
-- 資料表索引 `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`tId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
