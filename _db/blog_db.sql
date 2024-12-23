-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2024 at 06:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `username`, `password`) VALUES
(1, 'Elias', 'A', 'admin', '$2y$10$e61f2qtrkodA16dqKJKmj.7QGIyQydUWvUnLJzieL1LMxCO.AnxRC'),
(3, 'hudaaaaa', 'hhhhhhh', 'hudaa', '$2y$10$oaAQapcrHqmNo9vobTVwKuMaR5QaUpmoGjKfSXaQcNk/RgeiGWvLe'),
(4, '', '', 'razan', '$2y$10$spTVBTyJgzgM4ll7HXkqZOImNoCH3yyBiNgh0GfXqnjDm3iTbcVNS'),
(5, '', '', 'ad', '$2y$10$TdTBjXMa4URPIUs22j1w5eTKa.aHDG2etTghlhAI3J8fKD1IHgr5a'),
(8, '', '', 'jess', '$2y$10$ItWogVzlZdn02XIUAKoxie3u8mEKAoXp09xTMNrX/mO4Ud5y0YpoK');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(127) NOT NULL,
  `post_text` text NOT NULL,
  `publish` int(2) NOT NULL DEFAULT 1,
  `cover_url` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `crated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `post_text`, `publish`, `cover_url`, `crated_at`) VALUES
(10, 'Future of Technology 2222', 'joiqj4roi34jroq43jorj', 1, 'COVER-64ba9e879b0c83.79174008.jpg', '2024-07-21 18:04:39'),
(11, 'What is AI', '<div id=\"8a15280b-8a40-4fea-ab8a-9bae5f36da40\" class=\"c-shortcodeListicle g-outer-spacing-bottom-medium\">...</div>', 1, 'COVER-64baa69b661be3.43596849.jpg', '2024-07-21 18:11:07'),
(12, 'What is general AI?', '<div><div>Artificial general intelligence (AGI)...</div></div>', 1, 'COVER-64baa114e66609.40375739.jpg', '2024-07-21 18:13:58'),
(13, 'What is programming?', '<div><h2 id=\"0-what-is-programming\">...</h2></div>', 0, 'COVER-64baa5c24d8949.62444141.jpg', '2024-07-21 18:35:30'),
(14, 'Types of programming languages', '<div><div>While hundreds of programming languages...</div></div>', 0, 'COVER-64baa64818c1c1.96344816.jpg', '2024-07-21 18:37:44'),
(20, 'Hello, World test 1', '<div><h2>Lorem, ipsum dolor sit amet consectetur...</h2></div>', 0, 'COVER-64bab16c6cb184.30984126.png', '2024-07-21 19:25:16'),
(21, 'huuuuuuuuuuuuuuuuuuuuuuu', 'jhoijrafoprekfpoaje', 0, 'COVER-67699b9c4f0c71.03271825.jpg', '2024-12-23 19:19:24'),
(22, 'huuuuuuuuuuuuuuuuuuuuuuu', 'hhhhhhhh', 0, 'COVER-67699f4793ad72.65761962.jpg', '2024-12-23 19:35:03'),
(23, 'rrrrrrrrrrrrrrr', 'صدى الافكار حيث الافكار لها صوت', 1, 'COVER-6769a1255016d3.29892717.jpg', '2024-12-23 19:43:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_photo` varchar(255) DEFAULT 'img/user-default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `username`, `password`, `profile_photo`) VALUES
(7, 'huda', 'huda', '$2y$10$jSRd.bf4galtSoAyQ7q0B.2rde67Y.xSmfQRQb4nhwzJJ8QxwLtgy', 'img/user-default.png'),
(11, 'razan ', 'razannnnnn', '$2y$10$HlSdhniNzeVp9wCRFcOfBODnu8G.3UeWYQE0qHZTKbUG..30xm1dO', '676967501803b-خريطة ولاية الوسط العظمى.jpg'),
(12, 'John Doe', 'John', '$2y$10$oAoVscOtOeYnW/6dDBnSPONMfRxl.sFt8Hs7jvyOiKy/5VtGoWiO6', '67697591efb80-Untitled design.jpg'),
(14, 'Huda ', 'jkhhoihjoi', '$2y$10$QOsYKyfUXKIKrWMFBMjFwu8dm9lIVzURFqWmGQ6vOLlpcgzSCD9KC', '67699ddb432b8-خريطة ولاية الوسط العظمى.jpg'),
(15, 'John Doe', 'hhh', '$2y$10$wOkht0XN16TLaRMjr1Y.9.FFtq.uC3aqElHHiATD2KtjdeL2f8PBG', '67699e5a029b1-خريطة ولاية الوسط العظمى.jpg'),
(16, 'John Doe', 'hudaaaa', '$2y$10$oFdXzo5sowDmMu93bXwYdufMxZuRevui7CI1xXD8bXLX8aKd0/6/6', '6769a1ce617c8-Madani Arabic (4).jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
