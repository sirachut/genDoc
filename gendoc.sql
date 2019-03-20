-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2019 at 04:49 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gendoc`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `bill_id` int(11) NOT NULL,
  `bill_number` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`bill_id`, `bill_number`, `created_at`, `updated_at`) VALUES
(1, '01', NULL, NULL),
(2, '02', NULL, NULL),
(3, '03', NULL, NULL),
(4, '04', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_02_20_152017_create_projects_table', 2),
(4, '2019_02_20_154216_create_stores_table', 3),
(5, '2019_02_20_154646_create_products_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_name` varchar(255) NOT NULL,
  `product_unitname` varchar(255) NOT NULL,
  `product_amount` int(11) NOT NULL,
  `product_price` double(30,2) NOT NULL,
  `product_pricesum` double(30,2) NOT NULL,
  `project_fk` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_name`, `product_unitname`, `product_amount`, `product_price`, `product_pricesum`, `project_fk`, `created_at`, `updated_at`) VALUES
('ดินสอ', 'แท่ง', 2, 5.00, 10.00, 1, NULL, NULL),
('ปากกา', 'ด้าม', 3, 9.00, 27.00, 1, NULL, NULL),
('สมุด', 'เล่ม', 2, 10.00, 20.00, 1, NULL, NULL),
('หนังสือ', 'เล่ม', 1, 299.00, 299.00, 1, NULL, NULL),
('กระเป๋าเครื่องเขียน', 'ใบ', 1, 29.00, 29.00, 1, NULL, NULL),
('ขนมขบเคี้ยว', 'ถัง', 1, 99.00, 99.00, 3, NULL, NULL),
('เครื่องปริ้น PIXMA G1010', 'เครื่อง', 1, 3290.25, 3290.25, 4, NULL, NULL),
('test', 'test', 1, 20.00, 20.00, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `id_fk` int(11) DEFAULT NULL,
  `store_fk` int(11) DEFAULT NULL,
  `bill_number` varchar(255) NOT NULL,
  `project_department` varchar(255) DEFAULT NULL,
  `project_name` varchar(255) DEFAULT NULL,
  `project_subject` varchar(255) DEFAULT NULL,
  `project_getday` int(11) DEFAULT NULL,
  `project_number` varchar(255) DEFAULT NULL,
  `project_status` varchar(11) DEFAULT NULL,
  `project_orderNumber` varchar(255) DEFAULT NULL,
  `project_typemoney` varchar(255) DEFAULT NULL,
  `project_datein` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `project_dateget` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `teacher_get_name` varchar(255) NOT NULL,
  `teacher_rank` varchar(255) NOT NULL,
  `parcel_name` varchar(255) NOT NULL,
  `parcelLeader_name` varchar(255) NOT NULL,
  `manageschool_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `id_fk`, `store_fk`, `bill_number`, `project_department`, `project_name`, `project_subject`, `project_getday`, `project_number`, `project_status`, `project_orderNumber`, `project_typemoney`, `project_datein`, `project_dateget`, `teacher_get_name`, `teacher_rank`, `parcel_name`, `parcelLeader_name`, `manageschool_name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '01', 'วิชาการ', 'ProjectDay 2019', 'ภาษาไทย', 3, '01/2562', 'n', 'ไม่ใช้', '(ยังไม่ได้ระบุ)', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '(ยังไม่ได้ระบุ)', '(ยังไม่ได้ระบุ)', '(ยังไม่ได้ระบุ)', '(ยังไม่ได้ระบุ)', '(ยังไม่ได้ระบุ)', '2019-03-03 11:09:11', NULL),
(3, 1, 2, '02', 'แผนกอะไรขักอย่างนี่แหละ', 'งานซื้อเครื่องเขียนของร้านศิรชัช', 'ศิลปะ', 3, '03/2562', 'n', 'ไม่ใช่', '(ยังไม่ได้ระบุ)', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '(ยังไม่ได้ระบุ)', '(ยังไม่ได้ระบุ)', '(ยังไม่ได้ระบุ)', '(ยังไม่ได้ระบุ)', '(ยังไม่ได้ระบุ)', '2019-03-03 11:09:16', NULL),
(5, 1, 2, 'ยังไม่ได้ระบุ', 'asdas', 'asd', 'sdsdf', 3, 'q', 'n', '(ยังไม่ได้ระบุ)', 'sdfsdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '(ยังไม่ได้ระบุ)', '(ยังไม่ได้ระบุ)', '(ยังไม่ได้ระบุ)', '(ยังไม่ได้ระบุ)', '(ยังไม่ได้ระบุ)', '2019-03-19 09:56:01', '2019-03-19 09:56:01'),
(6, 1, 1, 'ยังไม่ได้ระบุ', 'asd', 'sd', 'sdasd', 3, '(ยังไม่ได้ระบุ)', 'n', '(ยังไม่ได้ระบุ)', 'asd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '(ยังไม่ได้ระบุ)', '(ยังไม่ได้ระบุ)', '(ยังไม่ได้ระบุ)', '(ยังไม่ได้ระบุ)', '(ยังไม่ได้ระบุ)', '2019-03-19 09:57:01', '2019-03-19 09:57:01'),
(7, 1, 1, 'ยังไม่ได้ระบุ', 'asd', 'asd', 'asd', 3, '(ยังไม่ได้ระบุ)', 'n', '(ยังไม่ได้ระบุ)', 'asdasdas', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '(ยังไม่ได้ระบุ)', '(ยังไม่ได้ระบุ)', '(ยังไม่ได้ระบุ)', '(ยังไม่ได้ระบุ)', '(ยังไม่ได้ระบุ)', '2019-03-19 09:58:24', '2019-03-19 09:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `store_id` int(11) NOT NULL,
  `store_id_fk` int(11) DEFAULT NULL,
  `store_name` varchar(255) DEFAULT NULL,
  `store_tel` varchar(255) DEFAULT NULL,
  `store_teletex` varchar(255) DEFAULT NULL,
  `store_address` varchar(255) DEFAULT NULL,
  `store_employee` varchar(255) DEFAULT NULL,
  `store_employeeNumber` varchar(255) DEFAULT NULL,
  `bank_branch` varchar(255) DEFAULT NULL,
  `bank_number` varchar(255) DEFAULT NULL,
  `bank_account` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`store_id`, `store_id_fk`, `store_name`, `store_tel`, `store_teletex`, `store_address`, `store_employee`, `store_employeeNumber`, `bank_branch`, `bank_number`, `bank_account`, `bank_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'สหเครื่องเขียน', '0801258841', '-', '130 หมู่ 11 ต.เจดีย์หลวง อ.แม่สรวย จ.เชียงราย 57180', 'นายศิรชัช มีใจดี', '1571000086015', 'พะเยา', '9836737650', 'นายศิรชัช มีใจดี', 'กรุงไทย', NULL, NULL),
(2, 1, 'ศิรชัชเครื่องเขียน', '0801258841', '-', '111 หมู่ 12', 'นายศิรชัช มีใจดี', '1571000086015', 'พะเยา', '9836737650', 'นายศิรชัช มีใจดี', 'กรุงไทย', NULL, NULL),
(12, 1, 'asdasd', 'asd', '-', 'asdasdad', '(ยังไม่ได้ระบุ)', '(ยังไม่ได้ระบุ)', '(ยังไม่ได้ระบุ)', '(ยังไม่ได้ระบุ)', '(ยังไม่ได้ระบุ)', '(ยังไม่ได้ระบุ)', '2019-03-19 02:23:53', '2019-03-19 02:23:53'),
(13, 1, 'asd', 'asd', 'asdasd', 'asd', '(ยังไม่ได้ระบุ)', '(ยังไม่ได้ระบุ)', '(ยังไม่ได้ระบุ)', '(ยังไม่ได้ระบุ)', '(ยังไม่ได้ระบุ)', '(ยังไม่ได้ระบุ)', '2019-03-19 09:29:17', '2019-03-19 09:29:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sirachut', 'sirachutg@gmail.com', NULL, '$2y$10$Fe09ZZFNj/srub1fxhVW7OtK7qPbD/1eV0I/yZB5s.RcArPGUMTs6', 'H151Zkwiu79HtU9zF2CsnEPN2zFp6ljFwlkt5VveX2SZ9bVcP5cbuaBu201U', '2019-02-14 05:12:12', '2019-02-14 05:12:12'),
(2, 'admin', 'admin@gendoc.com', NULL, '$2y$10$xSbtwVN5ZuXJVUX5S7JaKOaSKBM4HctHXRpaldGm3LTzxMhDay5jy', 'dzCauwsFkuGmnvp832MGgWfvVpoSF64IA87GpwsfrsN0fW0XF3AD5xlV88db', '2019-02-20 02:29:38', '2019-02-20 02:29:38'),
(3, 'wolftime', 'wolftime@gmail.com', NULL, '$2y$10$VJxvbDsa2W6eHZRMg6ZoB.THkWgDE22h4eQVMkbQ9ZlrkI8C6uHcW', 'VNWwkwJIEr6tOOSjNsZWHJLtSPAF4I863xbNVIEEZoNEduqZSNTi6VHxHU2n', '2019-03-08 23:25:34', '2019-03-08 23:25:34');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_bills`
-- (See below for the actual view)
--
CREATE TABLE `view_bills` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_documents`
-- (See below for the actual view)
--
CREATE TABLE `view_documents` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_products`
-- (See below for the actual view)
--
CREATE TABLE `view_products` (
);

-- --------------------------------------------------------

--
-- Structure for view `view_bills`
--
DROP TABLE IF EXISTS `view_bills`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_bills`  AS  select `projects`.`project_id` AS `project_id`,`projects`.`project_department` AS `project_department`,`projects`.`project_name` AS `project_name`,`projects`.`project_subject` AS `project_subject`,`projects`.`project_number` AS `project_number`,`projects`.`id_fk` AS `id_fk`,`users`.`name` AS `name`,`projects`.`store_fk` AS `store_fk`,`stores`.`store_name` AS `store_name`,`stores`.`store_tel` AS `store_tel`,`stores`.`store_address` AS `store_address`,`stores`.`store_teletex` AS `store_teletex`,`stores`.`store_employee` AS `store_employee`,`stores`.`store_employeeNumber` AS `store_employeeNumber`,`stores`.`bank_branch` AS `bank_branch`,`stores`.`bank_number` AS `bank_number`,`stores`.`bank_account` AS `bank_account`,`stores`.`bank_name` AS `bank_name`,`projects`.`bill_fk` AS `bill_fk`,`bills`.`bill_number` AS `bill_number`,`bills`.`created_at` AS `created_at`,`bills`.`updated_at` AS `updated_at`,`products`.`product_name` AS `product_name`,`products`.`product_unitname` AS `product_unitname`,`products`.`product_amount` AS `product_amount`,`products`.`product_price` AS `product_price`,`products`.`product_pricesum` AS `product_pricesum` from ((((`projects` join `products` on((`projects`.`project_id` = `products`.`project_fk`))) join `bills` on((`projects`.`bill_fk` = `bills`.`bill_id`))) join `stores` on((`projects`.`store_fk` = `stores`.`store_id`))) join `users` on((`projects`.`id_fk` = `users`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_documents`
--
DROP TABLE IF EXISTS `view_documents`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_documents`  AS  select `projects`.`project_id` AS `project_id`,`projects`.`project_department` AS `project_department`,`projects`.`project_name` AS `project_name`,`projects`.`project_subject` AS `project_subject`,`projects`.`project_getday` AS `project_getday`,`projects`.`project_number` AS `project_number`,`projects`.`project_status` AS `project_status`,`projects`.`created_at` AS `created_at`,`projects`.`updated_at` AS `updated_at`,`users`.`name` AS `name`,`stores`.`store_name` AS `store_name`,`stores`.`store_tel` AS `store_tel`,`stores`.`store_teletex` AS `store_teletex`,`stores`.`store_address` AS `store_address`,`stores`.`store_employee` AS `store_employee`,`stores`.`store_employeeNumber` AS `store_employeeNumber`,`stores`.`bank_branch` AS `bank_branch`,`stores`.`bank_number` AS `bank_number`,`stores`.`bank_account` AS `bank_account`,`stores`.`bank_name` AS `bank_name`,`bills`.`bill_number` AS `bill_number` from (((`projects` join `stores` on((`projects`.`store_fk` = `stores`.`store_id`))) join `users` on((`projects`.`id_fk` = `users`.`id`))) join `bills` on((`projects`.`bill_fk` = `bills`.`bill_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_products`
--
DROP TABLE IF EXISTS `view_products`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_products`  AS  select `projects`.`project_id` AS `project_id`,`projects`.`project_name` AS `project_name`,`bills`.`bill_number` AS `bill_number`,`bills`.`created_at` AS `created_at`,`bills`.`updated_at` AS `updated_at`,`products`.`product_name` AS `product_name`,`products`.`product_unitname` AS `product_unitname`,`products`.`product_amount` AS `product_amount`,`products`.`product_price` AS `product_price`,`products`.`product_pricesum` AS `product_pricesum` from ((`bills` join `projects` on((`projects`.`bill_fk` = `bills`.`bill_id`))) join `products` on((`projects`.`project_id` = `products`.`project_fk`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`bill_id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD KEY `project_fk` (`project_fk`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `id_fk` (`id_fk`),
  ADD KEY `store_fk` (`store_fk`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`store_id`),
  ADD KEY `id_fk` (`store_id_fk`);

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
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
