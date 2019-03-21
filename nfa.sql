-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2016 at 06:09 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nfa`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE IF NOT EXISTS `cart_details` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `ud_id` int(11) NOT NULL,
  `prd_id` int(11) NOT NULL,
  `cart_product_qty` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `ud_id` (`ud_id`),
  KEY `prd_id` (`prd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(6, 'Apple'),
(8, 'Orange'),
(9, 'Peru'),
(10, 'Kiwi'),
(11, 'Grapes'),
(12, 'Dragon fruit'),
(13, 'Plum');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `ord_id` int(11) NOT NULL AUTO_INCREMENT,
  `ord_status` tinyint(1) NOT NULL COMMENT '0=pending,1=approved,2=dispatch,3=delivered,4=disapproved',
  `ord_date` datetime NOT NULL,
  `ord_shipping_date` date NOT NULL,
  `ord_shipping_address` varchar(500) NOT NULL,
  `ud_id` int(11) NOT NULL,
  PRIMARY KEY (`ord_id`),
  KEY `ud_id` (`ud_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE IF NOT EXISTS `order_products` (
  `oprd_id` int(11) NOT NULL AUTO_INCREMENT,
  `ord_id` int(11) NOT NULL,
  `prd_id` int(11) NOT NULL,
  `oprd_qty` int(11) NOT NULL,
  `oprd_unit_price` int(11) NOT NULL,
  `oprd_total_amount` float(7,2) NOT NULL,
  PRIMARY KEY (`oprd_id`),
  KEY `ord_id` (`ord_id`),
  KEY `prd_id` (`prd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE IF NOT EXISTS `product_details` (
  `prd_id` int(11) NOT NULL AUTO_INCREMENT,
  `prd_name` varchar(50) NOT NULL,
  `prd_about` varchar(500) NOT NULL,
  `prd_image` varchar(100) NOT NULL,
  `prd_mrp` int(11) NOT NULL,
  `prd_quantity` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`prd_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`prd_id`, `prd_name`, `prd_about`, `prd_image`, `prd_mrp`, `prd_quantity`, `cat_id`) VALUES
(19, 'Fuji Apple', 'High Quality apple exported from china', './images/product_images/Fuji Apple.png', 180, 20, 6),
(20, 'Golden Apple', 'Golden apple ', './images/product_images/Golden Apple.jpg', 120, 20, 6),
(21, 'South Africa Orange', 'Orange exported from south africa of high quality', './images/product_images/South Africa Orange.jpg', 160, 20, 8),
(22, 'Zespri Golden Kiwi', 'Golden kiwi', './images/product_images/Zespri Golden Kiwi.jpg', 40, 20, 10),
(23, 'Zespri Green Kiwi', 'Green Kiwi', './images/product_images/Zespri Green Kiwi.jpg', 25, 20, 10),
(24, 'Golden Pear', 'High quality pear ', './images/product_images/Golden Pear.jpg', 170, 20, 9),
(25, 'Red California Grapes', 'Quality grapes exported from California (USA)', './images/product_images/Red California Grapes.jpg', 360, 20, 11),
(26, 'White Dragon Fruit ', 'Dragon fruit', './images/product_images/White Dragon Fruit .jpg', 70, 20, 12),
(27, 'Red Dragon Fruit ', 'Dragon fruit red ', './images/product_images/Red Dragon Fruit .jpg', 90, 20, 12),
(28, 'South African Aalu', 'Aalu exported all the way from south africa', './images/product_images/South African Aalu.jpg', 300, 20, 13);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `ud_id` int(11) NOT NULL AUTO_INCREMENT,
  `ud_fname` varchar(20) NOT NULL,
  `ud_lname` varchar(20) NOT NULL,
  `ud_password` varchar(48) NOT NULL,
  `ud_email` varchar(30) NOT NULL,
  `ud_mobile` varchar(10) NOT NULL,
  `ud_address` varchar(200) NOT NULL,
  `ud_city` varchar(25) NOT NULL,
  `ud_code` varchar(10) NOT NULL COMMENT 'Reset password code',
  `ud_joindate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ud_type` tinyint(1) NOT NULL,
  PRIMARY KEY (`ud_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`ud_id`, `ud_fname`, `ud_lname`, `ud_password`, `ud_email`, `ud_mobile`, `ud_address`, `ud_city`, `ud_code`, `ud_joindate`, `ud_type`) VALUES
(1, 'Admin', 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@fruitkart.com', '', '', '', '', '2016-08-10 00:00:00', 0),
(2, 'Harsh', 'Tiwar', 'ec2b26d3c7907a334deb5a59925fe164', 'harsh.tiwar9@gmail.com', '123456789', 'Warasia, Vadodara - 390006', '', '', '2016-08-24 23:45:44', 0),
(3, 'parth', 'shah', '36740f97ee381af4a087d7f3089a37a3', 'parthshah235@gmail.com', '123456789', 'Vadodara', '', '', '2016-08-26 23:55:43', 0),
(42, 'Vinita', 'Soni', '76ce88ad7d035b1ca7f89175da28965c', 'vinitasoni0811@gmail.com', '8141985480', 'Dandiya Bazar', '', '', '2016-11-07 11:38:35', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD CONSTRAINT `cart_details_ibfk_1` FOREIGN KEY (`ud_id`) REFERENCES `user_details` (`ud_id`),
  ADD CONSTRAINT `cart_details_ibfk_2` FOREIGN KEY (`prd_id`) REFERENCES `product_details` (`prd_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`ud_id`) REFERENCES `user_details` (`ud_id`);

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_ibfk_1` FOREIGN KEY (`prd_id`) REFERENCES `product_details` (`prd_id`),
  ADD CONSTRAINT `order_products_ibfk_2` FOREIGN KEY (`ord_id`) REFERENCES `order_details` (`ord_id`);

--
-- Constraints for table `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `product_details_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
