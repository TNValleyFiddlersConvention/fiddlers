-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 02, 2013 at 06:46 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fidcon`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Beginning Fiddler (Age 10 & under)'),
(2, 'Beginning Fiddler (Age 11 - 15)'),
(3, 'Bluegrass Band'),
(4, 'Bluegrass Banjo'),
(5, 'Buck Dancing (Age 15 & under)'),
(6, 'Buck Dancing (Age 16 & over)'),
(7, 'Classic Old Time Banjo'),
(8, 'Dobro'),
(9, 'Dulcimer'),
(10, 'Guitar-Finger'),
(11, 'Guitar-Flat Picking'),
(12, 'Harmonica'),
(13, 'Junior Fiddler'),
(14, 'Mandolin'),
(15, 'Old Time Band'),
(16, 'Old Time Banjo'),
(17, 'Old Time Singing'),
(18, 'Senior Fiddler');

-- --------------------------------------------------------

--
-- Table structure for table `contestants`
--

CREATE TABLE IF NOT EXISTS `contestants` (
  `contestant_id` int(11) NOT NULL AUTO_INCREMENT,
  `registration_date` date DEFAULT NULL,
  `contestant_no` decimal(10,0) DEFAULT NULL,
  `name` varchar(75) DEFAULT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `mi` varchar(1) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `zip` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `age` decimal(10,0) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  PRIMARY KEY (`contestant_id`),
  UNIQUE KEY `contestant_no` (`contestant_no`),
  FULLTEXT KEY `FULLTEXT` (`fname`,`lname`,`mi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=86 ;

-- --------------------------------------------------------

--
-- Table structure for table `enames`
--

CREATE TABLE IF NOT EXISTS `enames` (
  `event_no` int(3) DEFAULT NULL,
  `event_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enames`
--

INSERT INTO `enames` (`event_no`, `event_name`) VALUES
(1, 'Beginning Fiddler (10 & under)'),
(2, 'Beginning Fiddler (Age 11-15)'),
(3, 'Bluegrass Band'),
(4, 'Bluegrass Banjo'),
(5, 'Buck Dancing (Age 15 & under)'),
(6, 'Buck Dancing (Age 16 & older)'),
(7, 'Classic Old Time Banjo'),
(8, 'Dobro'),
(9, 'Dulcimer'),
(10, 'Guitar-Finger'),
(11, 'Guitar-Flat Picking'),
(12, 'Harmonica'),
(13, 'Junior Fiddler'),
(14, 'Mandolin'),
(15, 'Old Time Band'),
(16, 'Old Time Banjo'),
(17, 'Old Time Singing'),
(18, 'Senior Fiddler');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `registration_id` int(11) NOT NULL AUTO_INCREMENT,
  `contestant_id` int(11) DEFAULT NULL,
  `order_no` int(4) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `on_stage` int(1) DEFAULT '2',
  `elimination_tune1` varchar(200) DEFAULT NULL,
  `elimination_tune2` varchar(200) DEFAULT NULL,
  `elimination_tune3` varchar(200) DEFAULT NULL,
  `final_tune1` varchar(200) DEFAULT NULL,
  `final_tune2` varchar(200) DEFAULT NULL,
  `final_tune3` varchar(200) DEFAULT NULL,
  `eliminations_position` int(11) DEFAULT NULL,
  `finals_position` int(11) DEFAULT NULL,
  `eliminations_place` int(11) DEFAULT NULL,
  `finals_place` int(11) DEFAULT NULL,
  `event_year` varchar(4) DEFAULT NULL,
  `results` int(11) DEFAULT NULL,
  PRIMARY KEY (`registration_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

-- --------------------------------------------------------

--
-- Table structure for table `instruments`
--

CREATE TABLE IF NOT EXISTS `instruments` (
  `instrument_id` int(2) NOT NULL AUTO_INCREMENT,
  `instrument_name` varchar(15) NOT NULL,
  PRIMARY KEY (`instrument_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `instruments`
--

INSERT INTO `instruments` (`instrument_id`, `instrument_name`) VALUES
(1, 'Banjo'),
(2, 'Bass'),
(3, 'Dobro'),
(4, 'Dulcimer'),
(5, 'Fiddle'),
(6, 'Guitar'),
(7, 'Harmonica'),
(8, 'Mandolin'),
(9, 'Violin'),
(10, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `contestant_id` int(11) DEFAULT NULL,
  `name` varchar(75) DEFAULT NULL,
  `instrument_id` int(2) DEFAULT NULL,
  `registration_id` int(11) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `privs` int(11) DEFAULT '1',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `privs`) VALUES
(19, 'admin', 'admin', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
