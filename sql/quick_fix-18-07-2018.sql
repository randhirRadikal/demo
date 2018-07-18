-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2018 at 11:59 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quick_fix`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `name`, `profile_pic`, `created`, `modified`) VALUES
(1, 'randhirjha@yopmail.com', '$2y$10$uVznJGrpflk3BllvDyK87uKxMkV9GZxEbW5X3dDi9mA.xhek.DUNq', 'Randhir Jha', '', '2016-12-20 10:36:14', '2016-12-20 10:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `job_id`, `title`, `description`, `created`, `amount`, `created_by`, `status`) VALUES
(1, 1, 'Demo', 'DEmo', '2018-07-12 21:52:45', 50, 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `user_id_1` int(11) NOT NULL,
  `user_id_2` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `is_readed` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `urgency` varchar(255) NOT NULL,
  `type` enum('Repairing','Electrical','Replacement','Fixing') DEFAULT NULL,
  `description` text NOT NULL,
  `completed_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `budget` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `pincode` int(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Pending','New','Completed','Cancelled') NOT NULL DEFAULT 'New',
  `job_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `urgency`, `type`, `description`, `completed_date`, `user_id`, `budget`, `address`, `city`, `state`, `country`, `pincode`, `created`, `status`, `job_type_id`) VALUES
(1, 'Randhir', 'Randhir K', 'Repairing', 'Demo Jobs', '2018-07-20', 1, 80, 'Ra', 'Ra', 'Ra', '', 123456, '2018-07-16 00:00:00', 'Completed', 1),
(2, 'Randhir', 'NOt now', 'Repairing', 'Demo Jobs', '2018-07-20', 1, 80, '', '', '', '', 0, '2018-07-16 00:00:00', 'Cancelled', 2),
(5, 'Test', '', 'Electrical', 'Test', '0000-00-00', 1, 100, '', '', '', '', 0, '2018-07-18 09:08:54', 'New', 1),
(6, 'Test', '', 'Electrical', 'Test', '0000-00-00', 1, 100, '', '', '', '', 0, '2018-07-18 09:10:21', 'New', 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_images`
--

CREATE TABLE `job_images` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_images`
--

INSERT INTO `job_images` (`id`, `job_id`, `image`, `created`) VALUES
(1, 1, 'da', '2018-07-12 21:53:02'),
(2, 1, 'sdfs', '2018-07-12 21:53:02'),
(3, 1, 'Randhir K', '2018-07-18 09:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `job_messages`
--

CREATE TABLE `job_messages` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `is_readed` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_messages`
--

INSERT INTO `job_messages` (`id`, `job_id`, `message`, `image`, `receiver_id`, `sender_id`, `is_readed`, `created`) VALUES
(1, 1, 'Randhir Jha', '', 2, 1, 0, '2018-07-17 13:04:33'),
(2, 1, 'qwqw', '', 2, 1, 0, '2018-07-19 13:04:33'),
(3, 2, '56464', '', 2, 1, 0, '2018-07-20 13:04:33');

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`id`, `name`, `created`, `status`) VALUES
(1, 'Plumber', '2018-07-18 13:46:49', 'Active'),
(2, 'Carpenter', '2018-07-18 13:46:49', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `bid_id` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `transection_id` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Pending','Completed','Cancelled') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `bid_id`, `job_id`, `transection_id`, `amount`, `created`, `status`) VALUES
(1, 1, NULL, '123456', '40', '2018-07-17 00:35:20', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `bid_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `ratting` tinyint(4) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `status`) VALUES
(1, 'Repairing', 'Active'),
(2, 'Electrical', 'Active'),
(3, 'Replacement', 'Active'),
(4, 'Fixing', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` enum('Contractor','Owner','PremiumContractor') NOT NULL DEFAULT 'Contractor',
  `access_token` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pincode` int(11) NOT NULL,
  `country` varchar(100) NOT NULL DEFAULT 'India',
  `fcm_token` varchar(255) NOT NULL,
  `all_push_notification` tinyint(4) NOT NULL DEFAULT '1',
  `notification_ping_by_urgency` tinyint(4) NOT NULL DEFAULT '1',
  `verification_code` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `phone_number`, `email`, `password`, `type`, `access_token`, `profile_pic`, `address`, `city`, `state`, `pincode`, `country`, `fcm_token`, `all_push_notification`, `notification_ping_by_urgency`, `verification_code`, `created`, `status`) VALUES
(1, 'Randhir', 'randhirjha', '+9180025922', 'randhirjha2212@gmail.com', '$2y$10$ojDdYNSM0skFOIR027luhOhM6MFK4.RuEnmBcI0CDgwlu6NQqf87e', 'Contractor', '', '', 'AA-21 salt lake sector 1', 'Kolkata', 'West Bangal', 7200064, 'India', 'not required', 1, 1, '4bff1862bd9ef4ae411ff4a94a299906', '2018-07-11 02:47:27', 'Active'),
(2, 'Randhir', 'randhir jha', '+918002592912', 'rj@gmail.com', '$2y$10$QoyZJiUcQEBu4vUkkoWVpes.SU5Wq1flTwPFLMT2Rl49kH9O1Fxim', 'Contractor', '', '', 'AA-21 salt lake sector 1', 'Kolkata', 'West Bangal', 7200064, 'India1', '', 1, 1, '', '2018-07-18 06:07:52', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_images`
--
ALTER TABLE `job_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_messages`
--
ALTER TABLE `job_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job_images`
--
ALTER TABLE `job_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job_messages`
--
ALTER TABLE `job_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
