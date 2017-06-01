-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2017 at 03:51 AM
-- Server version: 5.5.51-log
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_property`
--

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE IF NOT EXISTS `property` (
  `id` int(11) NOT NULL,
  `type_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_phnumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sale_rent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(111) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `type_name`, `price`, `location`, `contact_phnumber`, `contact_address`, `sale_rent`, `photo`, `user_id`) VALUES
(3, 'Office', '150000000', 'mandalay', '09795890912', 'Thingangkuun | Yangon', 'sale', 'office.jpg', 4),
(4, 'Condo', '50000000', 'yangon', '09465555', 'South Okkalapa ၊ Yangon', 'sale', 'apart3.jpg', 2),
(6, 'Office', '80000000', 'mandalay', '0947185524', 'ChanAyeTharZan|Mandalay', 'sale', 'office5.jpg', 1),
(7, 'Condo', '250000', 'mandalay', '09123456', 'MyaKyarYet|Mandalay', 'rent', 'condo.jpg', 2),
(10, 'Office', '150000000', 'mandalay', '09425465133', 'NanShate|Mandalay', 'sale', 'office.jpg', 1),
(11, 'House', '800000', 'mandalay', '09778421542', 'MyoutPyin|Mandalay', 'sale', 'house.jpg', 1),
(12, 'Land', '900000', 'mandalay', '0955555', 'MyoThit|Mandalay', 'sale', 'land6.jpg', 1),
(13, 'House', '100000000', 'yangon', '09445872135', 'Kamaryut ၊ Yangon', 'sale', 'home1.jpg', 3),
(14, 'Apartment', '200000', 'mandalay', '09447812869', 'Pyigyitagon ၊ Mandalay', 'rent', 'apart1.jpg', 2),
(15, 'Condo', '1000000', 'yangon', '09254063008', 'Kyauktadar|Yangon', 'rent', 'condo.jpg', 2),
(16, 'Factory', '500000', 'mandalay', '09771051027', 'Amarapura|Mandalay', 'rent', 'fact.jpg', 3),
(17, 'Apartment', '500000', 'mandalay', '09785965415', 'Chanmyatharzi|Mandalay', 'rent', 'apart1.jpg', 4),
(18, 'Land', '80000000', 'mandalay', '0947132243', 'KayaukSe|Mandalay', 'sale', 'land3.jpg', 4),
(20, 'Condo', '1000000', 'yangon', '09789321564', 'Dagon|Yangon', 'rent', 'condo.jpg', 4),
(21, 'House', '50000000', 'mandalay', '094211117412', 'Meikhtila|Mandalay', 'sale', 'home.jpg', 4),
(22, 'Land', '50000000', 'mandalay', '0947132243', 'MyinGyan|Mandalay', 'sale', 'land1.jpg', 4),
(24, 'Condo', '10000000', 'mandalay', '0942111143', 'MaHlaing|Mandalay', 'sale', 'condo3.jpg', 4),
(25, 'Apartment', '50000000', 'yangon', '0946555567', 'Mayangone|Yangon', 'sale', 'apart3.jpg', 4),
(26, 'House', '25000000', 'mandalay', '09791618958', 'TharZi|Mandalay', 'sale', 'house3.jpg', 4),
(27, 'House', '90000000', 'yangon', '09444820021', 'InSein|Yangon', 'sale', 'home.jpg', 4),
(28, 'Condo', '250000000', 'yangon', '0947132243', 'PazunTaung|Yangon', 'sale', 'codo3.jpg', 4),
(29, 'Office', '15000000', 'yangon', '0948265314', 'Bahan|Yangon', 'rent', 'office3.jpg', 1),
(30, 'Condo', '2500000', 'yangon', '09421117412', 'North Dagon|Yangon', 'sale', 'apart2.jpg', 4),
(32, 'Factory', '1500000', 'mandalay', '09796287606', 'NyaunOo|Mandalay', 'sale', 'factory2.jpg', 8),
(33, 'House', '2500000', 'mandalay', '0943140637', 'NayPyiDaw|Mandalay', 'rent', 'house.jpg', 8),
(34, 'Office', '2500000', 'yangon', '09123456', 'SanChaung|Yangon', 'rent', 'office5.jpg', 8),
(35, 'House', '50000000', 'mandalay', '0945217784', 'MyoutPyin|Mandalay', 'sale', 'house1.jpg', 8),
(36, 'Land', '200000000', 'mandalay', '094211114', 'AungMyaeTharZan|Mandalay', 'sale', 'land5.jpg', 9),
(37, 'Apartment', '250000', 'mandalay', '0946555598', 'AungMyaeTharZan|Mandalay', 'rent', 'apart3.jpg', 9),
(38, 'Land', '100000000', 'mandalay', '09421111467', 'MyaKyarYet|Mandalay', 'sale', 'land4.jpg', 9),
(39, 'House', '100000000', 'mandalay', '0947132243', 'ChanMyaTharZi|Mandalay', 'sale', 'home2.jpg', 2),
(40, 'Apartment', '30000000', 'mandalay', '09791618958', 'ChanMyaTharZi|Mandalay', 'sale', 'apart3.jpg', 5),
(41, 'Land', '10000000', 'yangon', '0945625562', 'ShwePyiThar|Yangon', 'sale', 'land4.jpg', 5),
(42, 'Factory', '100000000', 'yangon', '09792245614', 'PearlMyoThit|Yangon', 'sale', 'factory1.jpg', 5),
(43, 'Office', '30000000', 'yangon', '09254063008', 'Sanchaung|Yangon', 'sale', 'office2.jpg', 5),
(44, 'Condo', '30000000', 'yangon', '02788555', 'HleDan|Yangon', 'sale', 'condo3.jpg', 5),
(45, 'Land', '10000000', 'yangon', '094211114', 'ShwePyiThar|Yangon', 'rent', 'land5.jpg', 2),
(46, 'Apartment', '200000', 'yangon', '094211114', 'SanChaung|Yangon', 'rent', 'apart1.jpg', 2),
(47, 'Land', '1000000', 'mandalay', '0947132243', 'MyoThit|Mandalay', 'rent', 'land1.jpg', 2),
(48, 'Factory', '3000000', 'yangon', '0950096455', 'HlaingTharYar|Yangon', 'rent', 'factory1.jpg', 6),
(49, 'House', '200000', 'yangon', '0947132243', 'Tarmwe|Yangon', 'rent', 'house1.jpg', 6),
(50, 'Office', '250000', 'mandalay', '09792245614', 'PyiGyiTaGon|Mandalay', 'rent', 'office3.jpg', 6),
(51, 'House', '15000000', 'yangon', '09444820021', 'Bahan|Yangon', 'rent', 'house4.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL,
  `type_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `type_name`) VALUES
(1, 'condo');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `auth` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `auth`) VALUES
(1, 'marlar', '123', 2),
(2, 'maythu', '123', 2),
(3, 'admin', 'admin', 1),
(4, 'eitone', '33333', 2),
(5, 'phyuphyu', '123456', 2),
(6, 'susu', '123', 2),
(8, 'sweswe', '111111', 2),
(9, 'kaykay', '222222', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
