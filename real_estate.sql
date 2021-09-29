-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2021 at 12:51 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `real_estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `country` char(20) NOT NULL,
  `gov` char(50) NOT NULL,
  `city` char(50) NOT NULL,
  `extra_data` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `country`, `gov`, `city`, `extra_data`) VALUES
(1, 'egypt', 'giza', 'giza', '12st'),
(2, 'egypt', 'cairo', 'giza', ''),
(3, 'egypt', 'cairo', 'giza', 'Explicabo Corrupti'),
(4, 'egypt', 'giza', 'giza', 'Explicabo Corrupti'),
(5, 'egypt', 'cairo', 'giza', 'Ducimus mollitia et'),
(6, 'egypt', 'giza', 'giza', 'Atque commodi est ea');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `property_id`, `buyer_id`, `owner_id`, `quantity`) VALUES
(52, 48, 47, 47, 8),
(60, 48, 49, 47, 1);

-- --------------------------------------------------------

--
-- Table structure for table `location_property`
--

CREATE TABLE `location_property` (
  `id` int(11) NOT NULL,
  `country` char(20) NOT NULL,
  `gov` char(20) NOT NULL,
  `city` char(20) NOT NULL,
  `extra_data` char(20) NOT NULL,
  `location_map` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location_property`
--

INSERT INTO `location_property` (`id`, `country`, `gov`, `city`, `extra_data`, `location_map`) VALUES
(1, 'egypt', 'beni swif', 'Naser', '12st', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(2, 'egypt', 'beni swif', 'cairo', 'Nisi eiusmod quis', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(3, 'egypt', 'beni swif', 'Naser', 'Nisi eiusmod quis', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(4, 'egypt', 'beni swif', 'Naser', 'Accusamus velit libe', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(5, 'egypt', 'beni swif', 'Naser', 'Occaecat sunt nostru', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(6, 'egypt', 'beni swif', 'Naser', 'In enim eveniet per', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(7, 'egypt', 'beni swif', 'Naser', 'Maiores tempor dolor', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(8, 'egypt', 'beni swif', 'Naser', 'Ut excepturi assumen', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(9, 'egypt', 'beni swif', 'Naser', 'Excepturi sed aliqui', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(10, 'egypt', 'beni swif', 'Naser', 'Excepturi sed aliqui', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(11, 'egypt', 'beni swif', 'Naser', 'Excepturi sed aliqui', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(12, 'egypt', 'beni swif', 'Naser', 'Excepturi sed aliqui', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(13, 'egypt', 'beni swif', 'Naser', 'Excepturi sed aliqui', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(14, 'egypt', 'beni swif', 'Naser', 'Excepturi sed aliqui', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(15, 'egypt', 'beni swif', 'Naser', 'Excepturi sed aliqui', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(16, 'egypt', 'beni swif', 'Naser', 'Ex tempora officia i', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(17, 'egypt', 'beni swif', 'Naser', 'Ex tempora officia i', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(18, 'egypt', 'beni swif', 'Naser', 'Ex tempora officia i', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(19, 'egypt', 'beni swif', 'Naser', 'Ex tempora officia i', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(20, 'egypt', 'beni swif', 'Naser', 'Ex tempora officia i', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(21, 'egypt', 'beni swif', 'Naser', 'Ex tempora officia i', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(22, 'egypt', 'beni swif', 'Naser', 'Nulla eiusmod sit ut', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(23, 'egypt', 'beni swif', 'Naser', 'Nulla eiusmod sit ut', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(24, 'egypt', 'beni swif', 'ciro', 'Nulla eiusmod sit ut', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(25, 'egypt', 'beni swif', 'Naser', 'Nulla eiusmod sit ut', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(26, 'egypt', 'beni swif', 'Naser', 'Nulla eiusmod sit ut', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(27, 'egypt', 'beni swif', 'Naser', 'Nulla eiusmod sit ut', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(28, 'egypt', 'beni swif', 'Naser', 'Nulla eiusmod sit ut', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(29, 'egypt', 'beni swif', 'Naser', 'Nulla eiusmod sit ut', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(30, 'egypt', 'beni swif', 'Naser', 'Nulla eiusmod sit ut', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(31, 'egypt', 'beni swif', 'Naser', 'Nulla eiusmod sit ut', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(32, 'egypt', 'beni swif', 'Naser', 'Quas quos iusto aut', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(33, 'egypt', 'beni swif', 'Naser', 'Quas quos iusto aut', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(34, 'egypt', 'beni swif', 'Naser', 'Quas quos iusto aut', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(35, 'egypt', 'beni swif', 'Naser', 'Quas quos iusto aut', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(36, 'egypt', 'beni swif', 'Naser', 'Quas quos iusto aut', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(37, 'egypt', 'beni swif', 'Naser', 'Quas quos iusto aut', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(38, 'egypt', 'beni swif', 'Naser', 'Quas quos iusto aut', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(39, 'egypt', 'beni swif', 'Naser', 'Culpa enim et dolor', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(40, 'egypt', 'beni swif', 'Naser', 'Maxime quis voluptat', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(41, 'egypt', 'beni swif', 'Naser', 'Obcaecati qui conseq', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(42, 'egypt', 'beni swif', 'Naser', 'Eaque mollitia nihil', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(43, 'egypt', 'beni swif', 'Naser', 'Numquam molestias de', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(44, 'egypt', 'beni swif', 'Naser', 'Molestiae optio sap', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(45, 'egypt', 'beni swif', 'Naser', 'Ipsum tempore ut t', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(46, 'egypt', 'beni swif', 'Naser', 'Ut eu ipsum adipisi', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(47, 'egypt', 'beni swif', 'Naser', 'Vero aut qui eaque n', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834'),
(48, 'egypt', 'beni swif', 'cairo', 'Vero aut qui eaque n', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834');

-- --------------------------------------------------------

--
-- Table structure for table `orders_don`
--

CREATE TABLE `orders_don` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `date_order` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_don` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL,
  `PayerID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_don`
--

INSERT INTO `orders_don` (`id`, `property_id`, `buyer_id`, `owner_id`, `payment_id`, `date_order`, `order_don`, `quantity`, `PayerID`) VALUES
(16, 49, 47, 44, 1, '2021-09-24 22:50:54', 1, 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(6) NOT NULL,
  `txnid` varchar(20) NOT NULL,
  `payment_amount` decimal(7,2) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `itemid` varchar(25) NOT NULL,
  `createdtime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `txnid`, `payment_amount`, `payment_status`, `itemid`, `createdtime`) VALUES
(2, '12', '2.22', 'oeder', '1', '2021-09-24 18:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(11) NOT NULL,
  `method_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id`, `method_title`) VALUES
(1, 'upon receipt'),
(2, 'visa card');

-- --------------------------------------------------------

--
-- Table structure for table `property_estate`
--

CREATE TABLE `property_estate` (
  `id` int(11) NOT NULL,
  `property_name` char(20) NOT NULL,
  `property_desc` varchar(500) NOT NULL,
  `space` char(50) NOT NULL,
  `price` int(11) NOT NULL,
  `rooms_count` int(11) NOT NULL,
  `grage` int(11) NOT NULL,
  `video` varchar(200) NOT NULL,
  `type_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `is_accepted` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `property_estate`
--

INSERT INTO `property_estate` (`id`, `property_name`, `property_desc`, `space`, `price`, `rooms_count`, `grage`, `video`, `type_id`, `location_id`, `owner_id`, `is_accepted`) VALUES
(48, 'Anne Lyons', 'Et aspernatur ipsam possimus sit vitae quasi sapiente. Eum rerum at porro repudiandae hic rerum vero doloribus ut. Est qui a quia quis odit voluptates cupiditate sit. Aliquam omnis provident distinctio maxime ea qui et mollitia dolores.&quot;&quot;&quot;&quot;&quot;&quot;&quot;&quot;', '77', 860, 89, 48, 'https://www.youtube.com/embed/DJBQCXb1--I', 2, 47, 47, '1'),
(49, 'Anne abdo', 'Et aspernatur ipsam possimus sit vitae quasi sapiente. Eum rerum at porro repudiandae hic rerum vero doloribus ut. Est qui a quia quis odit voluptates cupiditate sit. Aliquam omnis provident distinctio maxime ea qui et mollitia dolores.&quot;', '77', 300, 89, 48, 'https://www.youtube.com/embed/DJBQCXb1--I', 1, 48, 47, '1');

-- --------------------------------------------------------

--
-- Table structure for table `property_imgs`
--

CREATE TABLE `property_imgs` (
  `id` int(11) NOT NULL,
  `img_url` varchar(100) NOT NULL,
  `img_url2` char(200) NOT NULL,
  `img_url3` char(200) NOT NULL,
  `floor_plans_img` varchar(100) NOT NULL,
  `id_property` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `property_imgs`
--

INSERT INTO `property_imgs` (`id`, `img_url`, `img_url2`, `img_url3`, `floor_plans_img`, `id_property`) VALUES
(24, '../uploads/8390743781632380817.jpg', '../uploads/7985602041632380817.jpg', '../uploads/5569465141632380817.jpg', '../uploads/5158050431632380817.jpg', 48),
(25, '../uploads/968283421632380894.jpg', '../uploads/19276422701632380894.jpg', '../uploads/5855695701632380894.jpg', '../uploads/13571655271632380894.jpg', 49);

-- --------------------------------------------------------

--
-- Table structure for table `property_type`
--

CREATE TABLE `property_type` (
  `id` int(11) NOT NULL,
  `title` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `property_type`
--

INSERT INTO `property_type` (`id`, `title`) VALUES
(1, 'villa'),
(2, 'House');

-- --------------------------------------------------------

--
-- Table structure for table `rols`
--

CREATE TABLE `rols` (
  `id` int(11) NOT NULL,
  `title` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rols`
--

INSERT INTO `rols` (`id`, `title`) VALUES
(1, 'admin'),
(2, 'buyer'),
(3, 'owner');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` char(100) NOT NULL,
  `desc_serv` varchar(300) NOT NULL,
  `logo` char(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `desc_serv`, `logo`) VALUES
(3, 'Mariko Riddle', 'Et aut quae. Atque ut corporis blanditiis. Sunt est similique.', '<i class=\"fab fa-lg fa-accusoft\"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` char(20) NOT NULL,
  `email` char(200) NOT NULL,
  `password` char(200) NOT NULL,
  `img` varchar(100) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `img`, `role`) VALUES
(35, 'Germane Herring', 'abdo@ali.com', 'e9b094979a3bdf86b9ed7d9d1a644447', 'uploads/15114064431632246270.jpg', 3),
(44, 'abdelrhman Hassan 22', 'admin@admin.com', 'e9b094979a3bdf86b9ed7d9d1a644447', 'uploads/6770719351632441166.jpg', 1),
(47, 'abdelrhman Hassan', 'abdelrhmanatwa@gmail.com', 'e9b094979a3bdf86b9ed7d9d1a644447', 'uploads/7971851731632417190.jpg', 3),
(49, 'Bevis Gonzales', 'abdo@abdo.com', 'e9b094979a3bdf86b9ed7d9d1a644447', 'uploads/259696681632417738.jpg', 2),
(50, 'Brendan Lang', 'abdo2@abdo.com', 'e9b094979a3bdf86b9ed7d9d1a644447', 'uploads/12231409861632417833.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` char(20) NOT NULL,
  `personal_info` varchar(350) NOT NULL,
  `facebook` char(100) NOT NULL,
  `twitter` char(100) NOT NULL,
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `phone`, `gender`, `personal_info`, `facebook`, `twitter`, `address_id`, `user_id`) VALUES
(26, '201224078648', 'male', 'Hic distinctio et. Incidunt nostrum delectus eaque dolor quas. Quo repellendus pariatur. Non nihil voluptatem neque et dolor numquam quia amet. Debitis molestias eos earum ullam quo cum temporibus inventore eligendi. Repellendus animi dolorem laudantium.', 'https://www.facebook.com/abdelrhman.atwa.7', 'https://twitter.com/Waleed_Bekheeet', 1, 35),
(31, '01224078648', '', 'Quam est sapiente nobis eos corporis. Ut tenetur odit illum. Dolores sit sunt laborum non vero deleniti alias vero libero. Itaque et sequi praesentium. Dolorum deleniti ex et in et pariatur voluptatibus qui corrupti.', 'https://www.facebook.com/abdelrhman.atwa.7', 'https://twitter.com/Waleed_Bekheeet', 3, 44),
(32, '01224078648', '', 'Natus aliquid alias. Nulla error quam laudantium quo et facere sed. Ea assumenda tempora vel quasi. Cupiditate dolorum inventore tenetur dignissimos aut ea tempora. Aspernatur esse a et natus qui ut minus enim veniam. Omnis quod vel qui quia voluptas eius.', 'https://www.facebook.com/abdelrhman.atwa.7', 'https://twitter.com/Waleed_Bekheeet', 4, 47),
(33, '1224078648', 'male', 'Ut reprehenderit consequatur architecto sunt voluptate assumenda. Ut veritatis repellat tempora vel rem non totam sed. Qui debitis atque quis officiis et.', 'https://www.facebook.com/abdelrhman.atwa.7', 'https://twitter.com/Waleed_Bekheeet', 5, 49),
(34, '1224078648', 'male', 'Et sit beatae velit quo et natus pariatur rerum est. Magni doloribus asperiores. Qui ut harum. Et temporibus dolor veniam pariatur sit maxime voluptas et rerum. Earum tenetur aut.', 'https://www.facebook.com/abdelrhman.atwa.7', 'https://twitter.com/Waleed_Bekheeet', 6, 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`),
  ADD KEY `buyer_id` (`buyer_id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `location_property`
--
ALTER TABLE `location_property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_don`
--
ALTER TABLE `orders_don`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_id` (`payment_id`),
  ADD KEY `property_id` (`property_id`),
  ADD KEY `buyer_id` (`buyer_id`),
  ADD KEY `owner_id` (`owner_id`),
  ADD KEY `property_id_2` (`property_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_estate`
--
ALTER TABLE `property_estate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`owner_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `property_imgs`
--
ALTER TABLE `property_imgs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_property` (`id_property`);

--
-- Indexes for table `property_type`
--
ALTER TABLE `property_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rols`
--
ALTER TABLE `rols`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `address_id` (`address_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `location_property`
--
ALTER TABLE `location_property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `orders_don`
--
ALTER TABLE `orders_don`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `property_estate`
--
ALTER TABLE `property_estate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `property_imgs`
--
ALTER TABLE `property_imgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `property_type`
--
ALTER TABLE `property_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rols`
--
ALTER TABLE `rols`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `buyer_id` FOREIGN KEY (`buyer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `owner_id` FOREIGN KEY (`owner_id`) REFERENCES `property_estate` (`owner_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `property_id` FOREIGN KEY (`property_id`) REFERENCES `property_estate` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders_don`
--
ALTER TABLE `orders_don`
  ADD CONSTRAINT `relation_buyer_id` FOREIGN KEY (`buyer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relation_owner_id` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relation_payment_method` FOREIGN KEY (`payment_id`) REFERENCES `payment_method` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relation_product_id` FOREIGN KEY (`property_id`) REFERENCES `property_estate` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `property_estate`
--
ALTER TABLE `property_estate`
  ADD CONSTRAINT `relation_location` FOREIGN KEY (`location_id`) REFERENCES `location_property` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relation_user` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `type_property` FOREIGN KEY (`type_id`) REFERENCES `property_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `property_imgs`
--
ALTER TABLE `property_imgs`
  ADD CONSTRAINT `property_img_id` FOREIGN KEY (`id_property`) REFERENCES `property_estate` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `rols` FOREIGN KEY (`role`) REFERENCES `rols` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `address_user` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relation_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
