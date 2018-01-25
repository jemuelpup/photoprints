-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2018 at 07:25 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `photoprints`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_tbl`
--

CREATE TABLE IF NOT EXISTS `access_tbl` (
  `employee_id_fk` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_tbl`
--

INSERT INTO `access_tbl` (`employee_id_fk`, `username`, `password`, `active`) VALUES
(1, 'jemuel', '123', 1),
(2, 'karen', '123', 1),
(4, 'liah', '123', 1),
(6, 'jenny', '1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `branch_tbl`
--

CREATE TABLE IF NOT EXISTS `branch_tbl` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `branch_code` varchar(10) NOT NULL,
  `modified_by_fk` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch_tbl`
--

INSERT INTO `branch_tbl` (`id`, `name`, `address`, `description`, `branch_code`, `modified_by_fk`, `active`) VALUES
(1, 'ust branch', '123 ust st.', 'kljjalk;jadsfkjl', 'b0123', 0, 1),
(2, 'lasalle branch', '123 lasale street', 'a;lkf;ljagdfgohdfghfdshgs', 'b0124', 0, 1),
(3, 'testing', '123 testing st', '123123', 'b333', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_tbl`
--

CREATE TABLE IF NOT EXISTS `category_tbl` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category_code` varchar(10) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by_fk` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_tbl`
--

INSERT INTO `category_tbl` (`id`, `name`, `category_code`, `description`, `date_modified`, `modified_by_fk`, `active`) VALUES
(1, 'ID', 'id123', 'dsgffdafdsfsdf', '2017-10-13 07:05:06', NULL, 1),
(2, 'Document', 'D01', 'werwerwerwer', '2017-10-13 07:35:32', NULL, 1),
(3, 'Pictures', 'p01', 'DUMMY', '2017-10-16 03:06:22', NULL, 1),
(4, 'Others', 'O01', 'DUMMY files', '2017-10-16 03:09:47', NULL, 1),
(5, 'Testings', 't001', 'testing delete after 123', '2017-12-18 09:45:28', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_tbl`
--

CREATE TABLE IF NOT EXISTS `employee_tbl` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `contact_number` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `position_fk` int(11) DEFAULT NULL,
  `branch_fk` int(11) DEFAULT NULL,
  `salary` decimal(11,2) NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by_fk` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `birth_day` date DEFAULT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_tbl`
--

INSERT INTO `employee_tbl` (`id`, `name`, `address`, `contact_number`, `email`, `position_fk`, `branch_fk`, `salary`, `date_modified`, `modified_by_fk`, `active`, `birth_day`, `gender`) VALUES
(1, 'jemuel elimanco', 'ewan ko st', '4564564', 'jemuel@gmail.com', 3, 2, '12000.00', '2017-10-18 08:47:39', 0, 1, '1995-02-28', 1),
(2, 'Karen Talla', 'ewan ko st', '123123', 'karen@gmail.com', 6, 1, '15000.00', '2017-10-18 10:51:25', 0, 1, '1995-02-28', 0),
(3, 'Gina Talla', 'ewan ko st 1223123', '123', 'karen@gmail.com', 1, 1, '14000.00', '2017-10-20 07:58:50', 0, 1, '1995-02-28', 0),
(4, 'Liah talla', 'wenrq;werjqej', '123123123', 'lkdslksdafjlk@gmail.com', 2, 2, '20000.00', '2017-10-20 08:00:04', 0, 1, '1990-05-04', 0),
(5, 'Liah talla', 'wenrq;werjqej', '123123123', 'lkdslksdafjlk@gmail.com', 1, 2, '20000.00', '2017-10-20 08:09:12', 0, 0, '1990-05-04', 0),
(6, 'Jenny Elimanco', '17 womens club brgy san isidro galas qc', '12312312', 'jenny@gmail.com', 1, 1, '20000.00', '2017-10-20 08:13:59', 0, 1, '1991-05-04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `item_tbl`
--

CREATE TABLE IF NOT EXISTS `item_tbl` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `item_code` varchar(10) DEFAULT NULL,
  `category_fk` int(11) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by_fk` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `price` decimal(11,2) DEFAULT NULL,
  `price_changing` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_tbl`
--

INSERT INTO `item_tbl` (`id`, `name`, `item_code`, `category_fk`, `date_modified`, `modified_by_fk`, `active`, `price`, `price_changing`) VALUES
(1, 'Digital coat', 'ID01', 1, '2017-10-24 07:32:18', 1, 1, '100.00', 0),
(2, 'Name tag', 'ID02', 1, '2017-10-24 07:32:43', 1, 1, '50.00', 0),
(3, 'Change background', 'ID02', 1, '2017-10-24 07:32:59', 1, 1, '100.00', 0),
(4, 'Package A', 'ID04P01', 1, '2017-10-24 07:34:12', 1, 1, '100.00', 0),
(5, 'Package B', 'ID04P02', 1, '2017-10-24 07:34:29', 1, 1, '150.00', 0),
(6, 'Package C', 'ID04P03', 1, '2017-10-24 07:34:37', 1, 1, '140.00', 0),
(7, 'Package D', 'ID04P04', 1, '2017-10-24 07:35:00', 1, 1, '160.00', 0),
(8, 'Cute size', 'PIC01', 3, '2017-10-24 07:35:34', 1, 1, '20.00', 0),
(9, 'Wallet size', 'PIC01', 3, '2017-10-24 07:35:57', 1, 1, '25.00', 0),
(10, '3x4 grad pic', 'PIC03', 3, '2017-10-24 07:36:20', 1, 1, '100.00', 0),
(11, '3R', 'PIC04', 3, '2017-10-24 07:36:45', 1, 1, '180.00', 0),
(12, 'Tarpulin', 'OT01', 3, '2017-10-26 07:58:28', 1, 1, '40.00', 0),
(13, 'Wide format', 'OT02', 4, '2017-10-26 07:58:51', 1, 1, '20.00', 0),
(14, 'Scan', 'OT03', 4, '2017-10-26 07:59:05', 1, 1, '10.00', 0),
(15, 'File transfer', 'OT04', 4, '2017-10-26 07:59:24', 1, 1, '5.00', 0),
(16, 'Print', 'P001', 2, '2017-11-07 09:06:57', 1, 1, '1.00', 0),
(22, 'testing', 't01', 5, '2017-12-15 05:34:06', 1, 1, '100.00', 0),
(24, 'bagong test', 't002', 5, '2017-12-18 09:46:17', 1, 0, '50.00', 0),
(25, 'test02', 't02', 5, '2017-12-20 06:55:40', 1, 1, '5.00', 0),
(26, 'test03', 't03', 5, '2017-12-20 06:57:58', 1, 1, '60.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `log_tbl`
--

CREATE TABLE IF NOT EXISTS `log_tbl` (
`id` int(11) NOT NULL,
  `event` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_line_tbl`
--

CREATE TABLE IF NOT EXISTS `order_line_tbl` (
  `order_id_fk` int(11) NOT NULL,
  `item_id_fk` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `discount` decimal(11,2) DEFAULT NULL,
  `multiplyer` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_line_tbl`
--

INSERT INTO `order_line_tbl` (`order_id_fk`, `item_id_fk`, `name`, `code`, `quantity`, `price`, `discount`, `multiplyer`) VALUES
(1, 1, 'Digital coat', 'ID01', 1, '100.00', '0.00', '0.00'),
(1, 2, 'Name tag', 'ID02', 1, '50.00', '0.00', '0.00'),
(2, 6, 'Package C', 'ID04P03', 1, '140.00', '0.00', '0.00'),
(2, 7, 'Package D', 'ID04P04', 1, '160.00', '0.00', '0.00'),
(3, 6, 'Package C', 'ID04P03', 1, '140.00', '0.00', '0.00'),
(3, 7, 'Package D', 'ID04P04', 1, '160.00', '0.00', '0.00'),
(4, 3, 'Change background', 'ID02', 1, '100.00', '0.00', '0.00'),
(5, 1, 'Digital coat', 'ID01', 1, '100.00', '0.00', '0.00'),
(6, 1, 'Digital coat', 'ID01', 1, '100.00', '0.00', '0.00'),
(6, 2, 'Name tag', 'ID02', 1, '50.00', '0.00', '0.00'),
(7, 1, 'Digital coat', 'ID01', 1, '100.00', '0.00', '0.00'),
(7, 2, 'Name tag', 'ID02', 1, '50.00', '0.00', '0.00'),
(8, 16, 'Print', 'P001', 500, '1.00', '12.00', '0.00'),
(9, 16, 'Print', 'P001', 21, '1.00', '0.00', '0.00'),
(10, 1, 'Digital coat', 'ID01', 1, '100.00', '0.00', '0.00'),
(11, 1, 'Digital coat', 'ID01', 1, '100.00', '0.00', '0.00'),
(12, 16, 'Print', 'P001', 100, '1.00', '12.00', '0.00'),
(13, 1, 'Digital coat', 'ID01', 1, '100.00', '0.00', '0.00'),
(14, 1, 'Digital coat', 'ID01', 1, '100.00', '0.00', '0.00'),
(15, 1, 'Digital coat', 'ID01', 1, '100.00', '0.00', '0.00'),
(16, 1, 'Digital coat', 'ID01', 2, '100.00', '0.00', '0.00'),
(17, 8, 'Cute size', 'PIC01', 1, '20.00', '0.00', '0.00'),
(18, 8, 'Cute size', 'PIC01', 2, '20.00', '0.00', '0.00'),
(19, 1, 'Digital coat', 'ID01', 1, '100.00', '0.00', '0.00'),
(20, 1, 'Digital coat', 'ID01', 2, '100.00', '0.00', '0.00'),
(21, 1, 'Digital coat', 'ID01', 1, '100.00', '0.00', '0.00'),
(21, 1, 'Digital coat', 'ID01', 1, '100.00', '0.00', '0.00'),
(21, 1, 'Digital coat', 'ID01', 1, '100.00', '12.00', '0.00'),
(21, 2, 'Name tag', 'ID02', 6, '50.00', '12.00', '0.00'),
(21, 2, 'Name tag', 'ID02', 12, '50.00', '12.00', '0.00'),
(22, 16, 'Print', 'P001', 5, '1.00', '0.00', '0.00'),
(23, 8, 'Cute size', 'PIC01', 2, '20.00', '0.00', '0.00'),
(24, 8, 'Cute size', 'PIC01', 3, '20.00', '0.00', '0.00'),
(25, 16, 'Print', 'P001', 5, '1.00', '0.00', '0.00'),
(26, 16, 'Print', 'P001', 7, '1.00', '0.00', '0.00'),
(27, 16, 'Print', 'P001', 10, '1.00', '0.00', '0.00'),
(28, 1, 'Digital coat', 'ID01', 1, '100.00', '12.00', '0.00'),
(29, 16, 'Print', 'P001', 5, '1.00', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE IF NOT EXISTS `order_tbl` (
`id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cashier_fk` int(11) NOT NULL,
  `branch_fk` int(11) NOT NULL,
  `operator_fk` int(11) NOT NULL,
  `void_fk` int(11) NOT NULL DEFAULT '0',
  `total_amount` decimal(11,2) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `payment` decimal(11,2) DEFAULT NULL,
  `notes` varchar(200) DEFAULT NULL,
  `down_payment` decimal(11,2) NOT NULL DEFAULT '0.00',
  `received_date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`id`, `order_date`, `cashier_fk`, `branch_fk`, `operator_fk`, `void_fk`, `total_amount`, `customer_name`, `payment`, `notes`, `down_payment`, `received_date`) VALUES
(1, '2017-12-20 09:12:25', 2, 1, 2, 0, '150.00', 'jem', '150.00', '', '0.00', '2017-12-20 17:12:38'),
(2, '2017-12-20 09:17:05', 1, 1, 2, 0, '300.00', 'adf', '500.00', '', '0.00', '2017-12-20 18:31:14'),
(3, '2017-12-20 10:28:54', 1, 1, 2, 0, '300.00', '', '500.00', '', '0.00', '2017-12-20 18:33:18'),
(4, '2017-12-20 10:30:43', 1, 1, 2, 0, '100.00', 'a', '100.00', '', '0.00', '2017-12-20 18:33:23'),
(5, '2017-12-21 06:48:32', 1, 1, 2, 0, '100.00', 'adsf', '100.00', '', '0.00', '2017-12-21 16:08:53'),
(6, '2017-12-21 06:51:16', 1, 1, 2, 0, '150.00', 'sre', '0.00', '', '150.00', '2017-12-21 16:03:27'),
(7, '2017-12-21 06:55:41', 2, 1, 2, 0, '150.00', '', '150.00', '', '0.00', '2018-01-05 14:24:45'),
(8, '2017-12-21 08:25:12', 1, 1, 1, 0, '440.00', 'r', '250.00', 'Bukas babayaran yung kulang', '200.00', '2017-12-21 16:25:43'),
(9, '2018-01-05 02:06:00', 2, 1, 2, 0, '21.00', '', '50.00', '', '0.00', '2018-01-05 14:24:40'),
(10, '2018-01-05 07:43:05', 2, 1, 2, 0, '100.00', '1', '100.00', '', '0.00', '2018-01-05 17:30:44'),
(11, '2018-01-05 09:30:30', 2, 1, 2, 0, '100.00', '1', '100.00', '', '0.00', '2018-01-05 18:54:27'),
(12, '2018-01-05 10:56:03', 2, 1, 2, 0, '88.00', 'aila', '100.00', 'wala', '0.00', '2018-01-05 19:38:04'),
(13, '2018-01-05 11:05:35', 2, 1, 2, 0, '100.00', '123', '200.00', '123', '0.00', '2018-01-05 19:38:10'),
(14, '2018-01-05 11:08:55', 2, 1, 2, 0, '100.00', 'a', '100.00', '123', '0.00', '2018-01-05 19:38:19'),
(15, '2018-01-05 11:09:37', 2, 1, 2, 0, '100.00', 'qwqe', '100.00', 'qwe', '12.00', '2018-01-05 19:46:26'),
(16, '2018-01-05 11:17:41', 2, 1, 2, 0, '200.00', 'qwe', '200.00', '123', '123.00', '2018-01-05 19:46:34'),
(17, '2018-01-05 11:23:37', 2, 1, 2, 0, '20.00', 'a', '50.00', '', '0.00', '2018-01-05 19:46:38'),
(18, '2018-01-05 11:23:54', 2, 1, 2, 0, '40.00', 'wer', '50.00', '', '12.00', '2018-01-05 19:46:40'),
(19, '2018-01-05 11:24:39', 2, 1, 2, 0, '100.00', '123', '100.00', '12', '12.00', '2018-01-05 19:46:44'),
(20, '2018-01-05 11:28:52', 2, 1, 2, 0, '200.00', 'as', '200.00', '', '12.00', '2018-01-05 19:46:48'),
(21, '2018-01-05 11:37:37', 2, 1, 2, 0, '1080.00', 'sheena', '600.00', 'balik bukas', '500.00', '2018-01-05 19:37:59'),
(22, '2018-01-15 01:57:41', 2, 1, 2, 0, '5.00', '', '5.00', '', '0.00', '2018-01-15 09:58:10'),
(23, '2018-01-15 01:58:23', 2, 1, 2, 0, '40.00', 'a', '40.00', '', '0.00', '2018-01-15 12:01:28'),
(24, '2018-01-15 03:54:19', 2, 1, 2, 0, '60.00', 'a', '100.00', '', '0.00', '2018-01-15 12:01:34'),
(25, '2018-01-15 03:54:41', 2, 1, 2, 0, '5.00', 'e', '5.00', '', '0.00', '2018-01-15 12:01:40'),
(26, '2018-01-15 03:55:07', 2, 1, 2, 0, '7.00', 'a', '10.00', '', '0.00', '2018-01-15 12:01:45'),
(27, '2018-01-15 04:00:05', 2, 1, 2, 0, '10.00', '', '27.00', '', '0.00', '2018-01-15 12:01:51'),
(28, '2018-01-15 04:00:51', 2, 1, 2, 0, '88.00', 'g', '100.00', '', '0.00', '2018-01-15 12:01:57'),
(29, '2018-01-23 00:49:41', 2, 1, 2, 0, '5.00', 'a', '5.00', '234', '0.00', '2018-01-23 08:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `position_tbl`
--

CREATE TABLE IF NOT EXISTS `position_tbl` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position_tbl`
--

INSERT INTO `position_tbl` (`id`, `name`, `description`, `active`) VALUES
(1, 'cashier', 'Gets the payment', 1),
(2, 'operator', 'makes the services', 1),
(3, 'admin', 'Can access the whole buisness system', 1),
(4, 'supervisor', 'Supervise the branch', 1),
(5, 'Trainee', 'Training employee', 1),
(6, 'Cashier/Operator', 'Acts as cashier and operator', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_tbl`
--
ALTER TABLE `access_tbl`
 ADD UNIQUE KEY `employee_id_fk` (`employee_id_fk`);

--
-- Indexes for table `branch_tbl`
--
ALTER TABLE `branch_tbl`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_tbl`
--
ALTER TABLE `category_tbl`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_tbl`
--
ALTER TABLE `item_tbl`
 ADD PRIMARY KEY (`id`), ADD KEY `category_fk` (`category_fk`);

--
-- Indexes for table `log_tbl`
--
ALTER TABLE `log_tbl`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position_tbl`
--
ALTER TABLE `position_tbl`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch_tbl`
--
ALTER TABLE `branch_tbl`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category_tbl`
--
ALTER TABLE `category_tbl`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `item_tbl`
--
ALTER TABLE `item_tbl`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `log_tbl`
--
ALTER TABLE `log_tbl`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `position_tbl`
--
ALTER TABLE `position_tbl`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `item_tbl`
--
ALTER TABLE `item_tbl`
ADD CONSTRAINT `item_tbl_ibfk_1` FOREIGN KEY (`category_fk`) REFERENCES `category_tbl` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
