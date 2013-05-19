-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 19, 2013 at 12:29 PM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `dsa_property`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `addressLine1` varchar(100) NOT NULL,
  `addressLine2` varchar(100) NOT NULL,
  `addressLine3` varchar(100) NOT NULL,
  `county_id` int(11) NOT NULL,
  PRIMARY KEY (`address_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `addressLine1`, `addressLine2`, `addressLine3`, `county_id`) VALUES
(16, '15 The Lawn', 'Clonattin Town', 'Gorey', 25),
(17, '22 Merrion House', 'Merrion Square', 'Merrion', 7),
(18, '40 Woodvale', 'WoodLawn', 'Carrickmacross', 26),
(19, '86 Moybridge', 'Moybridge Estate', 'Emyvale', 26),
(20, '8 Ard Na Greine', 'Donn Road', 'Castleredmond', 2),
(21, '17 Greenhill Park', 'Greenhill', 'Wicklow Town', 24),
(22, '44 The Beeches', 'Beechgrange', '', 27),
(23, '65 The Hills', 'Haveyes', '', 7),
(24, '17 Greenhill Park', 'Greenhill', 'Wicklow Town', 24),
(25, '4 Mulberry Bush', '', 'Castleknock', 7),
(26, '367 South Circular Road', 'South Circular Road', '', 7),
(27, 'Ballylickey', '', 'Bantry', 2),
(28, '17 The Lawns', 'Liffey Hall', 'Newbridge', 22),
(29, '111 The Avenue', 'Roseberry Hill', 'Newbridge', 22),
(30, 'Satch Cottage', 'Killala', '', 13);

-- --------------------------------------------------------

--
-- Table structure for table `adminusers`
--

CREATE TABLE `adminusers` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `adminusers`
--

INSERT INTO `adminusers` (`user_id`, `username`, `password`) VALUES
(1, 'admin', 'letmein');

-- --------------------------------------------------------

--
-- Table structure for table `counties`
--

CREATE TABLE `counties` (
  `county_id` int(11) NOT NULL AUTO_INCREMENT,
  `county` varchar(30) NOT NULL,
  PRIMARY KEY (`county_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `counties`
--

INSERT INTO `counties` (`county_id`, `county`) VALUES
(1, 'Kerry'),
(2, 'Cork'),
(3, 'Limerick'),
(4, 'Tipperary'),
(5, 'Clare'),
(6, 'Waterford'),
(7, 'Dublin'),
(8, 'Meath'),
(9, 'Westmeath'),
(10, 'Longford'),
(11, 'Offaly'),
(12, 'Kilkenny'),
(13, 'Mayo'),
(14, 'Galway'),
(15, 'Sligo'),
(16, 'Roscommon'),
(17, 'Leitrim'),
(18, 'Donegal'),
(19, 'Laois'),
(20, 'Cavan'),
(21, 'Louth'),
(22, 'Kildare'),
(23, 'Carlow'),
(24, 'Wicklow'),
(25, 'Wexford'),
(26, 'Monaghan'),
(27, 'Fermanagh'),
(28, 'Down'),
(29, 'Derry'),
(30, 'Antrim'),
(31, 'Tyrone'),
(32, 'Armagh');

-- --------------------------------------------------------

--
-- Table structure for table `pricerange`
--

CREATE TABLE `pricerange` (
  `range_id` int(11) NOT NULL AUTO_INCREMENT,
  `priceRange` varchar(50) NOT NULL,
  PRIMARY KEY (`range_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pricerange`
--

INSERT INTO `pricerange` (`range_id`, `priceRange`) VALUES
(1, '<€100k'),
(2, '€100k-€200k'),
(3, '€200k-€300k');

-- --------------------------------------------------------

--
-- Table structure for table `propertytable`
--

CREATE TABLE `propertytable` (
  `property_id` int(11) NOT NULL AUTO_INCREMENT,
  `county_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `range_id` int(11) NOT NULL,
  `sale_id` int(12) NOT NULL,
  `imagefile` blob NOT NULL,
  `addressLine1` varchar(150) NOT NULL,
  `addressLine2` varchar(150) NOT NULL,
  `addressLine3` varchar(100) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`property_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `propertytable`
--

INSERT INTO `propertytable` (`property_id`, `county_id`, `type_id`, `price`, `range_id`, `sale_id`, `imagefile`, `addressLine1`, `addressLine2`, `addressLine3`, `dateCreated`) VALUES
(35, 24, 1, 290000, 3, 2, 0x686f757365332e6a706567, '10 The Avenue', 'Grange Con', 'Grange', '2013-05-18 02:13:14'),
(28, 26, 1, 255000, 3, 1, 0x686f757365342e6a7067, '86 Moybridge', 'Moybridge Estate', 'Emyvale', '2013-05-18 14:40:21'),
(27, 26, 2, 120000, 2, 2, 0x686f757365322e6a7067, '40 Woodvale', 'WoodLawn', 'Carrickmacross', '2013-05-18 09:28:25'),
(26, 7, 3, 220000, 3, 2, 0x686f757365312e6a7067, '22 Eastbride Estate', 'Eastbride', 'Rathfarnham', '2013-05-18 04:24:12'),
(34, 7, 3, 169000, 2, 2, 0x686f757365362e6a7067, '45 Conleths Road', 'Conleth', 'Walkinstown', '2013-05-16 16:45:38'),
(33, 7, 2, 199999, 2, 2, 0x686f757365352e6a7067, '3 Deerpark Walk', 'Deerpark', 'Tallaght', '2013-05-15 03:13:21'),
(36, 1, 1, 220000, 3, 2, 0x686f757365372e6a7067, 'Shanacloon', 'Beaufort', 'Killarney', '2013-05-17 08:15:21'),
(37, 29, 1, 80000, 1, 2, 0x686f757365382e6a7067, '22 Acacia Avenue', 'Whispering Pines', 'Limavady', '2013-05-14 09:16:14'),
(38, 18, 1, 155000, 2, 2, 0x686f757365392e6a7067, 'The Main Street', 'Muff', '', '2013-05-15 03:13:15'),
(39, 25, 3, 72500, 1, 2, 0x686f75736531302e6a7067, '119 The Faythe', 'Wexford Town', '', '2013-05-15 05:13:11'),
(40, 6, 2, 297000, 3, 1, 0x686f75736531312e6a7067, '27 Newtown', 'Waterford City', '', '2013-05-15 02:00:18'),
(41, 20, 3, 120000, 2, 2, 0x686f75736531322e6a7067, '45 College Street', 'Cavan Town', '', '2013-05-18 20:17:31'),
(42, 13, 2, 90000, 1, 2, 0x686f75736531332e6a7067, '1 Chapel Lane', 'Killala', '', '2013-05-18 20:20:29');

-- --------------------------------------------------------

--
-- Table structure for table `propertytype`
--

CREATE TABLE `propertytype` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `propertyType` varchar(20) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `propertytype`
--

INSERT INTO `propertytype` (`type_id`, `propertyType`) VALUES
(1, 'Detached'),
(2, 'Semi-Detached'),
(3, 'Terraced');

-- --------------------------------------------------------

--
-- Table structure for table `salestatus`
--

CREATE TABLE `salestatus` (
  `sale_id` int(11) NOT NULL AUTO_INCREMENT,
  `saleStatus` varchar(23) NOT NULL,
  PRIMARY KEY (`sale_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `salestatus`
--

INSERT INTO `salestatus` (`sale_id`, `saleStatus`) VALUES
(1, 'SOLD'),
(2, 'FOR SALE');
