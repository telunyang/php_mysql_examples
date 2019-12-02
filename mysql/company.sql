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
-- 資料庫： `company`
--

-- --------------------------------------------------------

--
-- 資料表結構 `department`
--

CREATE TABLE `department` (
  `Dname` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Dnumber` int(11) NOT NULL,
  `Mgr_ssn` char(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mgr_start_date` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '結束時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='department';

--
-- 傾印資料表的資料 `department`
--

INSERT INTO `department` (`Dname`, `Dnumber`, `Mgr_ssn`, `Mgr_start_date`, `created_at`, `updated_at`) VALUES
('Headquarters', 1, '888665555', '1981-06-19', '2019-12-02 21:23:56', '2019-12-02 21:23:56'),
('Administration', 4, '987654321', '1995-01-01', '2019-12-02 21:23:56', '2019-12-02 21:23:56'),
('Research', 5, '333445555', '1988-05-22', '2019-12-02 21:23:56', '2019-12-02 21:23:56');

-- --------------------------------------------------------

--
-- 資料表結構 `dependent`
--

CREATE TABLE `dependent` (
  `Essn` char(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Dependent_name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sex` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Bdate` date DEFAULT NULL,
  `Relationship` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '修改時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='dependent';

--
-- 傾印資料表的資料 `dependent`
--

INSERT INTO `dependent` (`Essn`, `Dependent_name`, `Sex`, `Bdate`, `Relationship`, `created_at`, `updated_at`) VALUES
('123456789', 'Alice', 'F', '1988-12-30', 'Daughter', '2019-12-02 21:45:14', '2019-12-02 21:45:14'),
('123456789', 'Elizabeth', 'F', '1967-05-05', 'spouse', '2019-12-02 21:45:14', '2019-12-02 21:45:14'),
('123456789', 'Michael', 'M', '1988-01-04', 'Son', '2019-12-02 21:45:14', '2019-12-02 21:45:14'),
('333445555', 'Alice', 'F', '1986-04-05', 'Daughter', '2019-12-02 21:41:37', '2019-12-02 21:41:37'),
('333445555', 'Joy', 'F', '1958-05-03', 'Spouse', '2019-12-02 21:45:14', '2019-12-02 21:45:14'),
('333445555', 'Theodore', 'M', '1983-10-25', 'Son', '2019-12-02 21:41:37', '2019-12-02 21:41:37'),
('987654321', 'Abner', 'M', '1942-02-28', 'Spouse', '2019-12-02 21:45:14', '2019-12-02 21:45:14');

-- --------------------------------------------------------

--
-- 資料表結構 `dept_locations`
--

CREATE TABLE `dept_locations` (
  `Dnumber` int(11) NOT NULL,
  `Dlocation` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='dept_locations';

--
-- 傾印資料表的資料 `dept_locations`
--

INSERT INTO `dept_locations` (`Dnumber`, `Dlocation`, `created_at`, `updated_at`) VALUES
(1, 'Houston', '2019-12-02 21:25:12', '2019-12-02 21:25:12'),
(4, 'Stafford', '2019-12-02 21:25:12', '2019-12-02 21:25:12'),
(5, 'Bellaire', '2019-12-02 21:25:12', '2019-12-02 21:25:12'),
(5, 'Houston', '2019-12-02 21:25:12', '2019-12-02 21:25:12'),
(5, 'Sugarland', '2019-12-02 21:25:12', '2019-12-02 21:25:12');

-- --------------------------------------------------------

--
-- 資料表結構 `employee`
--

CREATE TABLE `employee` (
  `Fname` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Minit` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Lname` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ssn` char(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Bdate` date DEFAULT NULL,
  `Address` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Sex` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Salary` decimal(10,2) DEFAULT NULL,
  `Super_ssn` char(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Dno` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='EMPLOYEE';

--
-- 傾印資料表的資料 `employee`
--

INSERT INTO `employee` (`Fname`, `Minit`, `Lname`, `Ssn`, `Bdate`, `Address`, `Sex`, `Salary`, `Super_ssn`, `Dno`, `created_at`, `updated_at`) VALUES
('John', 'B', 'Smith', '123456789', '1965-01-09', '731 Fondren, Houston, TX', 'M', '30000.00', '333445555', 5, '2019-12-02 21:11:36', '2019-12-02 21:11:36'),
('Franklin', 'T', 'Wong', '333445555', '1955-12-08', '638 Voss, houston, TX', 'M', '40000.00', '888665555', 5, '2019-12-02 21:14:28', '2019-12-02 21:14:28'),
('Joyce', 'A', 'English', '453453453', '1972-07-31', '5631 Rice, Houston, TX', 'F', '25000.00', '333445555', 5, '2019-12-02 21:22:14', '2019-12-02 21:22:14'),
('Ramesh', 'K', 'Narayan', '666884444', '1962-09-15', '975 Fire Oak, Humble, TX', 'M', '38000.00', '333445555', 5, '2019-12-02 21:22:14', '2019-12-02 21:22:14'),
('James', 'E', 'Borg', '888665555', '1937-11-10', '450 Stone, Houston, TX', 'M', '55000.00', NULL, 1, '2019-12-02 21:22:14', '2019-12-02 21:22:14'),
('Jennifer', 'S', 'Wallace', '987654321', '1941-06-20', '291 Berry, Bellaire, TX', 'F', '43000.00', '888665555', 4, '2019-12-02 21:22:14', '2019-12-02 21:22:14'),
('Ahmad', 'V', 'Jabbar', '987987987', '1969-03-29', '980 Dallas, Houston, TX', 'M', '250000.00', '987654321', 4, '2019-12-02 21:22:14', '2019-12-02 21:22:14'),
('Alicia', 'J', 'Zelaya', '999887777', '1968-01-19', '3321 Castle, Spring, TX', 'F', '25000.00', '987654321', 4, '2019-12-02 21:14:28', '2019-12-02 21:14:28');

-- --------------------------------------------------------

--
-- 資料表結構 `project`
--

CREATE TABLE `project` (
  `Pname` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Pnumber` int(11) NOT NULL,
  `Plocation` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Dnum` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='project';

--
-- 傾印資料表的資料 `project`
--

INSERT INTO `project` (`Pname`, `Pnumber`, `Plocation`, `Dnum`, `created_at`, `updated_at`) VALUES
('ProductX', 1, 'Bellaire', 5, '2019-12-02 21:36:29', '2019-12-02 21:36:29'),
('ProductY', 2, 'Sugarland', 5, '2019-12-02 21:36:29', '2019-12-02 21:36:29'),
('ProductZ', 3, 'Houston', 5, '2019-12-02 21:36:29', '2019-12-02 21:36:29'),
('Computerization', 10, 'Stafford', 4, '2019-12-02 21:36:29', '2019-12-02 21:36:29'),
('Reorganization', 20, 'Houston', 1, '2019-12-02 21:36:29', '2019-12-02 21:36:29'),
('Newbenefits', 30, 'Stafford', 4, '2019-12-02 21:36:29', '2019-12-02 21:36:29');

-- --------------------------------------------------------

--
-- 資料表結構 `works_on`
--

CREATE TABLE `works_on` (
  `Essn` char(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Pno` int(11) NOT NULL,
  `Hours` decimal(3,1) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '修改時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='works_on';

--
-- 傾印資料表的資料 `works_on`
--

INSERT INTO `works_on` (`Essn`, `Pno`, `Hours`, `created_at`, `updated_at`) VALUES
('123456789', 1, '32.5', '2019-12-02 21:26:47', '2019-12-02 21:26:47'),
('123456789', 2, '7.5', '2019-12-02 21:26:47', '2019-12-02 21:26:47'),
('333445555', 2, '10.0', '2019-12-02 21:29:38', '2019-12-02 21:29:38'),
('333445555', 3, '10.0', '2019-12-02 21:29:38', '2019-12-02 21:29:38'),
('333445555', 10, '10.0', '2019-12-02 21:29:38', '2019-12-02 21:29:38'),
('333445555', 20, '10.0', '2019-12-02 21:29:38', '2019-12-02 21:29:38'),
('453453453', 1, '20.0', '2019-12-02 21:26:47', '2019-12-02 21:26:47'),
('453453453', 2, '20.0', '2019-12-02 21:26:47', '2019-12-02 21:26:47'),
('666884444', 3, '40.0', '2019-12-02 21:26:47', '2019-12-02 21:26:47'),
('888665555', 20, '0.0', '2019-12-02 21:33:12', '2019-12-02 21:33:12'),
('987654321', 20, '15.0', '2019-12-02 21:33:12', '2019-12-02 21:33:12'),
('987654321', 30, '20.0', '2019-12-02 21:33:12', '2019-12-02 21:33:12'),
('987987987', 10, '35.0', '2019-12-02 21:33:12', '2019-12-02 21:33:12'),
('987987987', 30, '5.0', '2019-12-02 21:33:12', '2019-12-02 21:33:12'),
('99887777', 30, '30.0', '2019-12-02 21:29:38', '2019-12-02 21:29:38'),
('999887777', 10, '10.0', '2019-12-02 21:33:12', '2019-12-02 21:33:12');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Dnumber`);

--
-- 資料表索引 `dependent`
--
ALTER TABLE `dependent`
  ADD PRIMARY KEY (`Essn`,`Dependent_name`);

--
-- 資料表索引 `dept_locations`
--
ALTER TABLE `dept_locations`
  ADD PRIMARY KEY (`Dnumber`,`Dlocation`);

--
-- 資料表索引 `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Ssn`);

--
-- 資料表索引 `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`Pnumber`),
  ADD UNIQUE KEY `Pname` (`Pname`);

--
-- 資料表索引 `works_on`
--
ALTER TABLE `works_on`
  ADD PRIMARY KEY (`Essn`,`Pno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
