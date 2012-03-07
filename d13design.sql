-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 07, 2012 at 09:08 AM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `d13design`
--

-- --------------------------------------------------------

--
-- Table structure for table `fw_articles`
--

CREATE TABLE `fw_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `synopsis` text NOT NULL,
  `contents` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `fw_articles`
--

INSERT INTO `fw_articles` VALUES(23, 1, 'A+blog+post', 'a-blog-post', 'A+simple+blog+post', '%3Cp%3ETo+show+the+structure+of+the+site.%3C%2Fp%3E', '2012-03-06 17:22:59');
INSERT INTO `fw_articles` VALUES(24, 7, 'Work+item', 'work-item', 'A+simple+work+item', '%3Cp%3ETo+show+how+the+portfolio+might+work.%3C%2Fp%3E', '2012-03-06 17:23:26');

-- --------------------------------------------------------

--
-- Table structure for table `fw_pages`
--

CREATE TABLE `fw_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `contents` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `fw_pages`
--

INSERT INTO `fw_pages` VALUES(6, 'About', 'about', '%3Cp%3EAbout+the+site%3C%2Fp%3E');
INSERT INTO `fw_pages` VALUES(7, 'Contact', 'contact', '%3Cp%3EA+simple+contact+page%3C%2Fp%3E');

-- --------------------------------------------------------

--
-- Table structure for table `fw_sections`
--

CREATE TABLE `fw_sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `fw_sections`
--

INSERT INTO `fw_sections` VALUES(1, 'Blog', 'blog');
INSERT INTO `fw_sections` VALUES(7, 'Portfolio', 'portfolio');

-- --------------------------------------------------------

--
-- Table structure for table `fw_users`
--

CREATE TABLE `fw_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fw_users`
--

INSERT INTO `fw_users` VALUES(1, 'admin', 'vXhYtXV.xRZ5.', 'dave@d13design.co.uk');
