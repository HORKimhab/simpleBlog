-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2021 at 04:09 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simple-blog-codeigniter3`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Technology', '2021-10-21 11:35:24', '2021-10-21 11:35:24'),
(2, 'Business', '2021-10-21 11:35:24', '2021-10-21 11:35:24'),
(3, 'cyber-news', '2021-10-21 11:37:11', '2021-10-21 11:37:11'),
(4, 'social', '2021-10-21 11:37:11', '2021-10-21 11:37:11'),
(5, 'Fashion', '2021-11-08 12:51:54', '2021-11-08 12:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT 0 COMMENT '0. Active\r\n1. Delete',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `title`, `slug`, `body`, `post_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Self-driving Waymo cars clog up dead-end San Francisco street', 'Self-driving-Waymo-cars-clog-up-dead-end-San-Francisco-street', '<p>Residents in a &quot;dead-end&quot; street in San Francisco say they are being plagued by an influx of self-driving vehicles. Autonomous-driving firm Waymo&#39;s cars have been going up and down the cul-de-sac at all hours &quot;for weeks&quot;, according to local news station KPIX. Residents say vehicles sometimes have to queue before making multi-point turns to leave the way they came. Waymo says the vehicles are just &quot;obeying road rules&quot; designed to limit traffic in certain residential streets. Toyota restarts driverless vehicles after accident &#39;Self-driving&#39; cars to be allowed on roads this year &quot;There are some days where it can be up to 50,&quot; Jennifer King told KPIX. &quot;It&#39;s literally every five minutes. And we&#39;re all working from home, so this is what we hear.&quot; She said the human &quot;safety drivers&quot; supervising the automated cars &quot;don&#39;t have much to say other than the car is programmed and they&#39;re just doing their job&quot;.</p>\r\n', 'noimage.png', 1, '2021-10-17 23:39:16', '2021-10-21 07:29:41'),
(2, 2, 'dfdfgds', 'dfdfgds', '<p>dfgdf</p>\r\n', 'noimage.png', 1, '2021-10-18 00:10:26', '2021-10-21 07:29:33'),
(3, 4, 'sdfs updated', 'sdfs-updated', '<p>sfsddfsdfsdfsdfsdfsdfdsf</p>\r\n', 'noimage.png', 1, '2021-10-18 00:11:26', '2021-10-21 06:28:58'),
(4, 3, 'as', 'as', 'dasasdasdsfsdfsdfsdfsdfsdfsd', 'noimage.png', 1, '2021-10-19 15:27:49', '2021-10-20 12:42:57'),
(5, 1, 'New Testd', 'New-Testd', '<p>New Testd New TestdNew Testd</p>', 'noimage.png', 1, '2021-10-21 12:28:03', '2021-10-21 12:28:03'),
(6, 2, 'Dsdfsdfsdfsdfs', 'Dsdfsdfsdfsdfs', '<p>dfsdfsdfsdfsdfsdfsdfsdfsdf sdfsfsdfsdfsd</p>', 'noimage.png', 1, '2021-10-29 16:41:15', '2021-10-29 16:41:15'),
(7, 2, 'dfsdfsdfsdfs', 'dfsdfsdfsdfs', '<p>dfsdfsdfsdfsfsdfs sdfsd4545345345345345</p>', 'noimage.png', 1, '2021-10-29 16:42:50', '2021-10-29 16:42:50'),
(8, 5, 'What is Lorem Ipsum?', 'What-is-Lorem-Ipsum', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '795791573723140.jpg', 0, '2021-10-29 16:45:22', '2021-11-08 08:54:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
