-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2017 at 08:30 AM
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
(6, 'jenny', '123', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch_tbl`
--

INSERT INTO `branch_tbl` (`id`, `name`, `address`, `description`, `branch_code`, `modified_by_fk`, `active`) VALUES
(1, 'ust branch', '123 ust st.', 'kljjalk;jadsfkjl', 'b0123', 0, 1),
(2, 'lasalle branch', '123 lasale street', 'a;lkf;ljagdfgohdfghfdshgs', 'b0124', 0, 1);

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
(4, 'Others', 'O01', 'DUMMY', '2017-10-16 03:09:47', NULL, 1),
(5, 'testing', 't001', 'testing. delete after', '2017-12-15 03:51:41', NULL, 1);

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
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `birth_day` date DEFAULT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_tbl`
--

INSERT INTO `employee_tbl` (`id`, `name`, `address`, `contact_number`, `email`, `position_fk`, `branch_fk`, `salary`, `date_modified`, `active`, `birth_day`, `gender`) VALUES
(1, 'jemuel elimanco', 'ewan ko st', '4564564', 'jemuel@gmail.com', 3, 2, '12000.00', '2017-10-18 08:47:39', 1, '1995-02-28', 1),
(2, 'Karen Talla', 'ewan ko st', '123123', 'karen@gmail.com', 2, 1, '15000.00', '2017-10-18 10:51:25', 1, '1995-02-28', 0),
(3, 'Gina Talla', 'ewan ko st 1223123', '123', 'karen@gmail.com', 1, 1, '14000.00', '2017-10-20 07:58:50', 1, '1995-02-28', 0),
(4, 'Liah talla', 'wenrq;werjqej', '123123123', 'lkdslksdafjlk@gmail.com', 2, 2, '20000.00', '2017-10-20 08:00:04', 1, '1990-05-04', 0),
(5, 'Liah talla', 'wenrq;werjqej', '123123123', 'lkdslksdafjlk@gmail.com', 1, 2, '20000.00', '2017-10-20 08:09:12', 0, '1990-05-04', 0),
(6, 'Jenny Elimanco', 'kjfkljdglkhsdjkgf st', '12312312', 'jenny@gmail.com', 1, 1, '20000.00', '2017-10-20 08:13:59', 1, '1991-05-04', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

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
(24, 'bagong test', 't002', 5, '2017-12-15 07:08:18', 1, 1, '50.00', 0);

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
  `description` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `discount` decimal(11,2) DEFAULT NULL,
  `multiplyer` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_line_tbl`
--

INSERT INTO `order_line_tbl` (`order_id_fk`, `item_id_fk`, `name`, `description`, `code`, `quantity`, `price`, `discount`, `multiplyer`) VALUES
(1, 2, 'Name tag', '', 'ID02', 3, '50.00', '0.00', '1.00'),
(1, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(1, 4, 'Package A', '', 'ID04P01', 1, '100.00', '0.00', '1.00'),
(2, 6, 'Package C', '', 'ID04P03', 1, '140.00', '0.00', '1.00'),
(3, 3, 'Change background', '', 'ID02', 1, '100.00', '0.00', '1.00'),
(3, 2, 'Name tag', '', 'ID02', 3, '50.00', '0.00', '1.00'),
(3, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(4, 2, 'Name tag', '', 'ID02', 1, '50.00', '0.00', '1.00'),
(4, 7, 'Package D', '', 'ID04P04', 1, '160.00', '0.00', '1.00'),
(4, 12, 'Tarpulin', '', 'OT01', 90, '40.00', '0.00', '1.00'),
(5, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(6, 2, 'Name tag', '', 'ID02', 1, '50.00', '0.00', '1.00'),
(7, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(8, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(9, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(9, 2, 'Name tag', '', 'ID02', 2, '50.00', '0.00', '1.00'),
(10, 3, 'Change background', '', 'ID02', 2, '100.00', '0.00', '1.00'),
(11, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(11, 2, 'Name tag', '', 'ID02', 1, '50.00', '0.00', '1.00'),
(12, 2, 'Name tag', '', 'ID02', 1, '50.00', '0.00', '1.00'),
(13, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(13, 2, 'Name tag', '', 'ID02', 1, '50.00', '0.00', '1.00'),
(13, 3, 'Change background', '', 'ID02', 1, '100.00', '0.00', '1.00'),
(14, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(14, 2, 'Name tag', '', 'ID02', 1, '50.00', '0.00', '1.00'),
(14, 3, 'Change background', '', 'ID02', 1, '100.00', '0.00', '1.00'),
(15, 2, 'Name tag', '', 'ID02', 1, '50.00', '0.00', '1.00'),
(16, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(17, 1, 'Digital coat', 'wala', 'ID01', 1, '100.00', '0.00', '1.00'),
(18, 1, 'Digital coat', 'wala', 'ID01', 1, '150.00', '0.00', '1.00'),
(18, 2, 'Name tag', '', 'ID02', 1, '50.00', '0.00', '1.00'),
(19, 1, 'Digital coat', '', 'ID01', 2, '100.00', '0.00', '1.00'),
(20, 1, 'Digital coat', '', 'ID01', 2, '100.00', '0.00', '1.00'),
(21, 1, 'Digital coat', 'wala', 'ID01', 1, '100.00', '0.00', '1.00'),
(21, 2, 'Name tag', 'meron', 'ID02', 1, '50.00', '0.00', '1.00'),
(22, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(22, 2, 'Name tag', '', 'ID02', 1, '50.00', '0.00', '1.00'),
(23, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(24, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(24, 2, 'Name tag', '', 'ID02', 1, '50.00', '0.00', '1.00'),
(25, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(25, 2, 'Name tag', '', 'ID02', 1, '50.00', '0.00', '1.00'),
(26, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(26, 2, 'Name tag', '', 'ID02', 1, '50.00', '0.00', '1.00'),
(27, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(27, 2, 'Name tag', '', 'ID02', 1, '50.00', '0.00', '1.00'),
(28, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(29, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(30, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(31, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(32, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(32, 2, 'Name tag', '', 'ID02', 1, '50.00', '0.00', '1.00'),
(33, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(34, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(35, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(36, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(37, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(38, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(39, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(40, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(41, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(42, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(43, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(44, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(45, 6, 'Package C', '', 'ID04P03', 1, '140.00', '0.00', '1.00'),
(46, 3, 'Change background', '', 'ID02', 1, '100.00', '0.00', '1.00'),
(47, 6, 'Package C', '', 'ID04P03', 1, '140.00', '0.00', '1.00'),
(48, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '1.00'),
(49, 4, 'Package A', '', 'ID04P01', 1, '100.00', '0.00', '1.00'),
(50, 2, 'Name tag', '', 'ID02', 1, '50.00', '0.00', '1.00'),
(51, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '0.00'),
(52, 2, 'Name tag', '', 'ID02', 1, '50.00', '0.00', '0.00'),
(53, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '0.00'),
(54, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '0.00'),
(55, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '0.00'),
(56, 7, 'Package D', '', 'ID04P04', 1, '160.00', '0.00', '0.00'),
(57, 3, 'Change background', '', 'ID02', 1, '100.00', '0.00', '0.00'),
(58, 2, 'Name tag', '', 'ID02', 1, '50.00', '0.00', '0.00'),
(59, 2, 'Name tag', '', 'ID02', 1, '50.00', '0.00', '0.00'),
(60, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '0.00'),
(61, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '0.00'),
(62, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '0.00'),
(63, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '0.00'),
(68, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '0.00'),
(69, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '0.00'),
(69, 4, 'Package A', '', 'ID04P01', 1, '100.00', '0.00', '0.00'),
(70, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '0.00'),
(70, 2, 'Name tag', '', 'ID02', 1, '50.00', '0.00', '0.00'),
(71, 2, 'Name tag', 'wala', 'ID02', 1, '50.00', '0.00', '0.00'),
(71, 2, 'Name tag', 'werwerwerwer', 'ID02', 1, '50.00', '0.00', '0.00'),
(72, 1, 'Digital coat', '', 'ID01', 1, '100.00', '0.00', '0.00'),
(73, 1, 'Digital coat', '120; DROP TABLE testingtable', 'ID01', 1, '100.00', '0.00', '0.00'),
(74, 16, 'Print', '', 'P001', 1, '1.00', '0.00', '0.00');

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
  `down_payment` decimal(11,2) NOT NULL DEFAULT '0.00',
  `received_date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`id`, `order_date`, `cashier_fk`, `branch_fk`, `operator_fk`, `void_fk`, `total_amount`, `customer_name`, `payment`, `down_payment`, `received_date`) VALUES
(1, '2017-11-06 08:17:47', 1, 1, 1, 0, '350.00', 'jemuel', '350.00', '0.00', '2017-11-06 16:31:58'),
(2, '2017-11-06 08:17:58', 1, 1, 1, 0, '490.00', 'karen', '490.00', '0.00', '2017-11-06 16:33:16'),
(3, '2017-11-06 08:18:14', 1, 1, 1, 0, '840.00', 'Liah', '840.00', '0.00', '2017-11-06 16:32:20'),
(4, '2017-11-06 08:18:49', 1, 1, 1, 0, '4650.00', 'anne', '4650.00', '0.00', '2017-11-06 16:34:01'),
(5, '2017-11-06 08:41:10', 1, 1, 1, 0, '100.00', 'jem', '100.00', '0.00', '2017-11-06 16:42:08'),
(6, '2017-11-06 08:41:30', 1, 1, 1, 0, '50.00', 'angie', '50.00', '0.00', '2017-11-06 16:43:06'),
(7, '2017-11-07 07:30:07', 1, 1, 1, 0, '100.00', 'mj', '5000.00', '0.00', '2017-11-22 16:31:41'),
(8, '2017-11-22 10:58:07', 1, 1, 1, 0, '100.00', 'jem', '400.00', '0.00', '2017-11-22 19:04:56'),
(9, '2017-11-23 08:14:03', 6, 1, 2, 0, '200.00', 'anna', '500.00', '0.00', '2017-11-23 16:15:25'),
(10, '2017-11-23 08:14:23', 6, 1, 4, 0, '200.00', 'james', '800.00', '0.00', '2017-11-23 16:15:34'),
(11, '2017-11-28 07:05:57', 2, 1, 2, 0, '150.00', 'jj', '500.00', '0.00', '2017-11-28 15:15:03'),
(12, '2017-11-28 07:20:31', 2, 1, 2, 0, '50.00', 'jemuel', '50.00', '0.00', '2017-11-28 16:11:33'),
(13, '2017-11-28 07:31:05', 2, 1, 2, 0, '250.00', 'jemuel', '0.00', '500.00', '2017-11-28 16:12:52'),
(14, '2017-11-28 08:16:59', 2, 1, 2, 0, '250.00', 'jane', '250.00', '0.00', '2017-11-28 16:17:39'),
(15, '2017-11-28 08:18:42', 2, 1, 2, 0, '50.00', 'x', '100.00', '0.00', '2017-11-28 16:18:57'),
(16, '2017-11-29 10:26:33', 6, 1, 4, 0, '100.00', 'a', '200.00', '0.00', '2017-12-01 11:04:52'),
(17, '2017-11-29 10:32:24', 6, 1, 4, 0, '100.00', 'a', '100.00', '0.00', '2017-12-01 11:05:00'),
(18, '2017-12-01 02:49:26', 6, 1, 2, 0, '200.00', 'jem', '200.00', '0.00', '2017-12-01 11:05:10'),
(19, '2017-12-01 02:57:45', 6, 1, 2, 0, '200.00', 'a', '200.00', '0.00', '2017-12-01 11:05:15'),
(20, '2017-12-01 02:58:36', 6, 1, 2, 0, '200.00', '1', '200.00', '0.00', '2017-12-01 11:05:24'),
(21, '2017-12-01 03:04:03', 6, 1, 2, 0, '150.00', 'a', '200.00', '0.00', '2017-12-01 11:05:20'),
(22, '2017-12-01 03:04:20', 6, 1, 2, 0, '150.00', 'g', '150.00', '0.00', '2017-12-01 11:05:33'),
(23, '2017-12-01 03:06:28', 1, 1, 1, 0, '100.00', 'a', '200.00', '0.00', '2017-12-01 11:06:45'),
(24, '2017-12-01 03:32:39', 1, 1, 1, 0, '150.00', 'a', '200.00', '0.00', '2017-12-01 14:21:47'),
(25, '2017-12-01 03:32:48', 1, 1, 1, 0, '150.00', 'a', '200.00', '0.00', '2017-12-01 14:22:01'),
(26, '2017-12-01 03:32:53', 1, 1, 1, 0, '150.00', 'a', '200.00', '0.00', '2017-12-01 14:22:38'),
(27, '2017-12-01 03:32:55', 1, 1, 1, 0, '150.00', 'a', '200.00', '0.00', '2017-12-01 14:22:43'),
(28, '2017-12-01 03:33:29', 1, 1, 1, 0, '100.00', 'a', '100.00', '50.00', '2017-12-01 14:22:48'),
(29, '2017-12-01 03:33:58', 1, 1, 1, 0, '100.00', '1', '100.00', '0.00', '2017-12-01 14:22:55'),
(30, '2017-12-01 03:35:22', 1, 1, 1, 0, '100.00', 'a', '100.00', '0.00', '2017-12-01 14:22:59'),
(31, '2017-12-01 03:37:18', 1, 1, 1, 0, '100.00', 'a', '100.00', '0.00', '2017-12-01 14:23:02'),
(32, '2017-12-01 03:46:56', 1, 1, 1, 0, '150.00', 'a', '150.00', '0.00', '2017-12-01 14:23:06'),
(33, '2017-12-01 03:48:23', 1, 1, 1, 0, '100.00', 'a', '100.00', '0.00', '2017-12-01 14:23:10'),
(34, '2017-12-01 03:56:36', 1, 1, 1, 0, '100.00', 'a', '100.00', '0.00', '2017-12-01 14:23:14'),
(35, '2017-12-01 06:16:45', 1, 1, 1, 0, '100.00', 'E', '100.00', '0.00', '2017-12-01 14:23:17'),
(36, '2017-12-01 06:17:51', 1, 1, 1, 0, '100.00', 'a', '100.00', '0.00', '2017-12-01 14:23:20'),
(37, '2017-12-01 06:18:33', 1, 1, 1, 0, '100.00', 'a', '100.00', '0.00', '2017-12-01 14:23:23'),
(38, '2017-12-01 06:19:52', 1, 1, 1, 0, '100.00', 'a', '100.00', '0.00', '2017-12-01 14:23:26'),
(39, '2017-12-01 06:52:36', 1, 1, 1, 0, '100.00', 'jem', '100.00', '0.00', '2017-12-07 11:25:15'),
(40, '2017-12-07 03:24:54', 1, 1, 1, 0, '100.00', 'jemuel', '100.00', '0.00', '2017-12-07 11:25:11'),
(41, '2017-12-07 03:26:57', 1, 1, 1, 0, '100.00', 'jemuel', '100.00', '0.00', '2017-12-07 11:27:16'),
(42, '2017-12-07 08:57:49', 2, 1, 2, 0, '100.00', 'j', '100.00', '0.00', '2017-12-07 16:58:03'),
(43, '2017-12-08 04:01:40', 6, 1, 1, 0, '100.00', 'jemuel', '100.00', '0.00', '2017-12-11 13:56:01'),
(44, '2017-12-08 04:05:30', 6, 1, 1, 0, '100.00', 'jen', '100.00', '0.00', '2017-12-11 13:55:51'),
(45, '2017-12-08 04:08:25', 6, 1, 1, 0, '140.00', 'r', '140.00', '0.00', '2017-12-11 13:55:41'),
(46, '2017-12-08 04:11:37', 6, 1, 1, 0, '100.00', 'h', '100.00', '0.00', '2017-12-11 13:56:09'),
(47, '2017-12-08 04:11:57', 2, 1, 1, 0, '140.00', 'e', '150.00', '0.00', '2017-12-11 15:16:27'),
(48, '2017-12-11 01:10:13', 6, 1, 6, 0, '100.00', 'a', '100.00', '0.00', '2017-12-11 10:45:21'),
(49, '2017-12-11 01:10:34', 6, 1, 6, 0, '100.00', 'rey', '100.00', '0.00', '2017-12-11 10:44:35'),
(50, '2017-12-11 05:00:02', 2, 1, 6, 0, '50.00', '4', '200.00', '0.00', '2017-12-12 11:40:26'),
(51, '2017-12-11 05:08:28', 6, 1, 6, 0, '100.00', 'hr', '100.00', '0.00', '2017-12-11 13:56:14'),
(52, '2017-12-11 05:11:33', 2, 1, 6, 0, '50.00', 'g', '100.00', '0.00', '2017-12-12 11:40:22'),
(53, '2017-12-11 06:16:33', 2, 1, 6, 0, '100.00', 'p', '500.00', '0.00', '2017-12-12 11:40:33'),
(54, '2017-12-11 06:18:13', 2, 1, 6, 0, '100.00', 'k', '100.00', '0.00', '2017-12-12 11:40:18'),
(55, '2017-12-11 06:18:32', 2, 1, 6, 0, '100.00', 'j', '100.00', '0.00', '2017-12-12 11:40:43'),
(56, '2017-12-11 06:20:00', 2, 1, 6, 0, '160.00', 'jj', '200.00', '0.00', '2017-12-12 11:40:39'),
(57, '2017-12-11 06:20:25', 2, 1, 6, 0, '100.00', 'a', '100.00', '0.00', '2017-12-12 11:40:46'),
(58, '2017-12-11 06:24:25', 2, 1, 6, 0, '50.00', 'ger', '100.00', '0.00', '2017-12-12 11:40:51'),
(59, '2017-12-11 06:26:18', 2, 1, 6, 0, '50.00', 'y', '50.00', '0.00', '2017-12-12 11:40:58'),
(60, '2017-12-11 06:26:50', 2, 1, 6, 0, '100.00', 'w', '200.00', '0.00', '2017-12-12 11:40:55'),
(61, '2017-12-11 06:28:27', 1, 1, 2, 0, '100.00', 'a', '100.00', '0.00', '2017-12-11 14:28:54'),
(62, '2017-12-11 06:30:31', 2, 1, 2, 0, '100.00', 'h', '100.00', '0.00', '2017-12-11 15:16:19'),
(63, '2017-12-11 09:12:01', 2, 1, 2, 0, '100.00', 'A', '100.00', '0.00', '2017-12-12 11:41:01'),
(64, '2017-12-12 03:34:26', 1, 1, 2, 0, '100.00', 'h', NULL, '0.00', NULL),
(65, '2017-12-12 03:34:26', 1, 1, 2, 0, '100.00', 'h', NULL, '0.00', NULL),
(66, '2017-12-12 03:35:40', 1, 1, 2, 0, '100.00', 'qwe', NULL, '0.00', NULL),
(67, '2017-12-12 03:35:40', 1, 1, 2, 0, '100.00', 'qwe', NULL, '0.00', NULL),
(68, '2017-12-12 03:37:03', 2, 1, 2, 0, '100.00', 'dfg', '100.00', '0.00', '2017-12-12 11:41:06'),
(69, '2017-12-12 03:37:38', 2, 1, 2, 0, '200.00', 'twe', '200.00', '100.00', '2017-12-12 11:41:11'),
(70, '2017-12-12 03:38:40', 2, 1, 2, 0, '150.00', 'rwe', '150.00', '0.00', '2017-12-12 11:41:17'),
(71, '2017-12-12 03:41:55', 1, 1, 2, 0, '100.00', 'wer', '80.00', '20.00', '2017-12-13 13:16:47'),
(72, '2017-12-12 03:42:48', 1, 1, 2, 0, '100.00', 'sdf', '100.00', '0.00', '2017-12-13 13:16:53'),
(73, '2017-12-12 03:46:59', 1, 1, 2, 0, '100.00', 'DROP TABLE testingtable', '100.00', '0.00', '2017-12-13 13:16:57'),
(74, '2017-12-13 05:19:28', 1, 1, 1, 0, '1.00', 'a', '1.00', '0.00', '2017-12-13 13:19:44');

-- --------------------------------------------------------

--
-- Table structure for table `position_tbl`
--

CREATE TABLE IF NOT EXISTS `position_tbl` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position_tbl`
--

INSERT INTO `position_tbl` (`id`, `name`, `description`, `active`) VALUES
(1, 'cashier', 'Gets the payment', 1),
(2, 'operator', 'makes the services', 1),
(3, 'admin', 'Can access the whole buisness system', 1),
(4, 'supervisor', 'Super vice the whole branch', 1),
(5, 'Trainee', 'Training employee', 1);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `log_tbl`
--
ALTER TABLE `log_tbl`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `position_tbl`
--
ALTER TABLE `position_tbl`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
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
