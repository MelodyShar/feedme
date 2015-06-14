-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 14, 2015 at 08:29 PM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `feedme`
--

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `dealId` int(11) NOT NULL,
  `dealProvider` text NOT NULL,
  `dealDescription` text NOT NULL,
  `dealType` text NOT NULL,
  `dealAddress` text NOT NULL,
  `dealCity` text NOT NULL,
  `dealState` text NOT NULL,
  `dealZip` text NOT NULL,
  `dealLat` double NOT NULL,
  `dealLong` double NOT NULL,
  `dealTags` longtext NOT NULL,
  `dealCreated` datetime NOT NULL,
  `dealExpires` datetime NOT NULL,
  `dealStatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`dealId`, `dealProvider`, `dealDescription`, `dealType`, `dealAddress`, `dealCity`, `dealState`, `dealZip`, `dealLat`, `dealLong`, `dealTags`, `dealCreated`, `dealExpires`, `dealStatus`) VALUES
(1, 'Cicada', '50% off Regular Latte', 'italian', '', '', '', '', 0, 0, '', '2015-06-13 00:00:00', '2015-06-20 00:00:00', 'active'),
(2, 'Pez Cantina', 'Get 2 tacos for the price of one', 'mexican', '401 S Grand Ave', 'Los Angeles', 'CA', '90071', 34.0519265, -118.2532229, 'Mexican Food', '2015-06-13 00:00:00', '2015-06-20 00:00:00', 'active'),
(9, 'Taipan Restaurant', 'All you can eat for $25', 'chinese', '330 S Hope St', 'Los Angeles', 'CA', '90071', 34.052679, -118.2523415, 'chinese cuisine', '2015-06-14 00:40:30', '2015-07-14 00:40:30', 'active'),
(10, 'Panda Express', 'Free Drink', 'Chinese', '630 5th St', 'Los Angeles', 'CA', '90071', 34.0506708, -118.2551963, 'Chinese Food', '2015-06-14 02:02:46', '2015-07-14 02:02:46', 'active'),
(11, 'Soup Bazaar', '$40 for $50 Deal', 'Soup', '199 W Olympic Blvd', 'Los Angeles', 'CA', '90015', 34.0409314, -118.2573775, 'Soup', '2015-06-14 18:51:07', '2015-07-14 18:51:07', 'active'),
(12, 'Stuff Em', 'Free Burgers...jk', 'American', '934 S Los Angeles St', 'Los Angeles', 'CA', '90015', 34.0399226, -118.2550165, 'Hamburger', '2015-06-14 18:59:58', '2015-07-14 18:59:58', 'active'),
(13, 'Yang Chow', '20% off if you spend more than $50', 'Chinese', '819 N Broadway', 'Los Angeles', 'CA', '90012', 34.0629738, -118.2382734, 'Chinese Cuisine', '2015-06-14 19:02:00', '2015-07-14 19:02:00', 'active'),
(14, 'Sea Dragon Chinese Restaurant', '40% off all you can eat if you bring a friend', 'chinese', '101 S Vermont Ave', 'Los Angeles', 'CA', '90004', 34.0727329, -118.2916977, 'chinese cuisine', '2015-06-14 19:56:15', '2015-07-14 19:56:15', 'active'),
(15, 'Guisados', 'Free Tacos on Tuesday', 'mexican', '1261 W Sunset Blvd', 'Los Angeles', 'CA', '90026', 34.0702317, -118.2502725, 'taco', '2015-06-14 19:58:01', '2015-07-14 19:58:01', 'active'),
(16, 'Cactus Mexican Food', '2 tacos for the price of one', 'mexican', '950 Vine St', 'Los Angeles', 'CA', '90038', 34.088279, -118.326335, 'taco', '2015-06-14 19:59:35', '2015-07-14 19:59:35', 'active'),
(17, 'Beer Belly', '$2 Beer on Thursday Nights', 'american', '532 S Western Ave', 'Los Angeles', 'CA', '90020', 34.0643548, -118.3085399, 'beer', '2015-06-14 20:01:33', '2015-07-14 20:01:33', 'active'),
(18, 'Sunset Beer Company', 'Bring a friend a get a free beer tasting', 'american', '1498 W Sunset Blvd', 'Los Angeles', 'CA', '90026', 34.0754783, -118.2553806, 'beer', '2015-06-14 20:07:24', '2015-07-14 20:07:24', 'active'),
(19, 'Koi', 'All you can eat for $25', 'sushi', '730 N LA Cienega Blvd', 'West Hollywood', 'CA', '90069', 34.0845064, -118.3761899, 'sushi', '2015-06-14 20:13:24', '2015-07-14 20:13:24', 'active'),
(20, 'The Room Sushi Bar', 'Free bottle of saki', 'japanese', '1884 Westwood Blvd', 'Los Angeles', 'CA', '90025', 34.0485656, -118.4354025, 'sushi', '2015-06-14 20:17:43', '2015-07-14 20:17:43', 'active'),
(21, 'Noshi Sushi', '$10 Rolls during Happy Hour', 'Sushi', '4430 Beverly Blvd', 'Los Angeles', 'CA', '90004', 34.0760316, -118.3053554, 'sushi', '2015-06-14 20:20:53', '2015-07-14 20:20:53', 'active');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
