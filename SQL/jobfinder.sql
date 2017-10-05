-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2017 at 05:04 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobfinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `candidate_id` int(10) UNSIGNED NOT NULL,
  `dp_link` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` bigint(11) NOT NULL,
  `tel_no` int(11) NOT NULL,
  `location` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expected_salary` int(11) NOT NULL,
  `position` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `educ_attain` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`candidate_id`, `dp_link`, `first_name`, `last_name`, `mobile_no`, `tel_no`, `location`, `expected_salary`, `position`, `educ_attain`, `user_id`) VALUES
(5, '', 'Trish', 'Moreno', 9298473811, 7843812, '1', 200000, 'Manager', '1', 8),
(6, '', 'trish', 'moreno', 9873492819, 7777777, '1', 20000, 'Manager', '3', 9),
(7, '', 'trish', 'moreno', 9999999999, 7777777, '1', 2000000, 'Manager', '1', 10),
(8, '', 'tres', 'moreno', 9999999999, 7777777, '1', 200000, 'Project Manager', '1', 11),
(9, '', 'tres', 'moreno', 9999999999, 7777777, '1', 2000000, 'Project Manager', '1', 12),
(10, '', 'tres', 'moreno', 9999999999, 7777777, '1', 2000000, 'Manager', '1', 13),
(11, '', 'tres', 'moreno', 9999999999, 7777777, '1', 2000000, 'Project Manager', '1', 14),
(12, '', 'tres', 'moreno', 9999999999, 7777777, 'Manila, Metro Manila', 2222222, 'Manager', 'Bachelor\'s Degree', 15),
(13, '', 'Trish', 'Moreno', 9999999999, 8888888, '1', 200000, 'Manager', '4', 16),
(14, '', 'Trish', 'Moreno', 9999999999, 8888888, '1', 200000, 'Manager', '4', 18),
(15, '', 'Trish', 'Moreno', 9999999999, 8888888, '1', 200000, 'Manager', '4', 19),
(16, '', 'Trish', 'Moreno', 9999999999, 8888888, '1', 200000, 'Manager', '4', 20),
(17, '', 'meh', 'mehhh', 9999999999, 8888888, 'Manila, Metro Manila', 50000, 'Senior Developer', 'Bachelor\'s Degree', 23),
(18, 'user.png', 'Trish', 'Moreno', 3333333333, 7878787, 'Manila,Metro Manila', 5000000, 'Senior Developer', 'Undergraduate', 28);

-- --------------------------------------------------------

--
-- Table structure for table `candidate_educ`
--

CREATE TABLE `candidate_educ` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `school` varchar(40) NOT NULL,
  `location` varchar(30) NOT NULL,
  `degree` varchar(20) NOT NULL,
  `notes` varchar(50) DEFAULT NULL,
  `year_entered` year(4) NOT NULL,
  `year_ended` year(4) NOT NULL,
  `show_resume_1` int(11) NOT NULL,
  `show_resume_2` int(11) NOT NULL,
  `show_resume_3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate_educ`
--

INSERT INTO `candidate_educ` (`id`, `user_id`, `level`, `school`, `location`, `degree`, `notes`, `year_entered`, `year_ended`, `show_resume_1`, `show_resume_2`, `show_resume_3`) VALUES
(1, 28, 3, 'University of Santo Tomas', 'Manila, Metro Manila', 'BS Computer Science', NULL, 2014, 2017, 1, 0, 0),
(7, 28, 4, 'nyahaha', 'Manila,Metro Manila', 'kyah', NULL, 2006, 2007, 1, 1, 1),
(8, 28, 4, 'University of Santo Tomas', 'Manila,Metro Manila', 'MS Computer Science', NULL, 2014, 2017, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `candidate_exp`
--

CREATE TABLE `candidate_exp` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `job_title` varchar(40) DEFAULT NULL,
  `position` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `company` varchar(30) NOT NULL,
  `description` varchar(40) NOT NULL,
  `year_entered` varchar(10) NOT NULL,
  `year_ended` varchar(10) NOT NULL,
  `industry` varchar(30) NOT NULL,
  `field_of_study` varchar(30) NOT NULL,
  `job_level` int(11) DEFAULT NULL,
  `show_resume_1` int(11) NOT NULL DEFAULT '0',
  `show_resume_2` int(11) NOT NULL DEFAULT '0',
  `show_resume_3` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate_exp`
--

INSERT INTO `candidate_exp` (`id`, `user_id`, `job_title`, `position`, `location`, `company`, `description`, `year_entered`, `year_ended`, `industry`, `field_of_study`, `job_level`, `show_resume_1`, `show_resume_2`, `show_resume_3`) VALUES
(1, 28, '2', 'Senior Developer', 'Manila, Metro Manila', 'Stratworth Solutions Inc.', 'cool', '2010', '2012', '', '', 5, 0, 0, 0),
(2, 28, NULL, 'Project Manager', 'Pasig, Metro Manila', 'mehh', 'nyeh', '2012', '2014', '18', '2', NULL, 0, 1, 0),
(3, 28, NULL, 'Manager', 'Pasig, Metro Manila', 'Tristan\'s Lair', 'awesome', '2013-09-12', '2014-09-12', '17', '5', NULL, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `educ_attainment`
--

CREATE TABLE `educ_attainment` (
  `id` int(10) UNSIGNED NOT NULL,
  `educ_attain` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `educ_attainment`
--

INSERT INTO `educ_attainment` (`id`, `educ_attain`) VALUES
(1, 'Elementary School'),
(2, 'High School'),
(3, 'Undergraduate'),
(4, 'Bachelor\'s Degree'),
(5, 'Master\'s Degree');

-- --------------------------------------------------------

--
-- Table structure for table `job_category`
--

CREATE TABLE `job_category` (
  `id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_category`
--

INSERT INTO `job_category` (`id`, `category`) VALUES
(1, 'Business'),
(2, 'Education'),
(3, 'Computers'),
(4, 'Finance'),
(5, 'Sciences');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(34, '2014_10_12_000000_create_users_table', 1),
(35, '2014_10_12_100000_create_password_resets_table', 1),
(36, '2017_08_22_085314_create_posts_table', 1),
(37, '2017_08_28_041918_create_user_accounts_table', 1),
(38, '2017_08_31_025943_create_tbl_location_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(10) UNSIGNED NOT NULL,
  `latest_pos` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `latest_pos`) VALUES
(1, 'Manager'),
(2, 'Senior Developer'),
(3, 'Junior Web Developer'),
(4, 'Project Manager'),
(5, 'Systems Analyst');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE `resume` (
  `resume_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `resume_1` varchar(20) NOT NULL,
  `resume_2` varchar(20) NOT NULL,
  `resume_3` varchar(20) NOT NULL,
  `current_position` varchar(30) NOT NULL,
  `intro` varchar(60) NOT NULL,
  `url` varchar(40) NOT NULL,
  `public_url` varchar(30) NOT NULL,
  `educ_attain` varchar(30) NOT NULL,
  `last_resume_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resume`
--

INSERT INTO `resume` (`resume_id`, `candidate_id`, `resume_1`, `resume_2`, `resume_3`, `current_position`, `intro`, `url`, `public_url`, `educ_attain`, `last_resume_update`) VALUES
(1, 17, 'Resume 1', 'Resume 2', 'Resume 3', 'Senior Developer', 'yoooo it\'s meh', '/meh', 'www.mehs-corner.com', '4', '0000-00-00'),
(2, 18, 'Resume 1', 'Resume 2', 'Resume 3', 'Senior Developer', '*some random stuff about me*', 'trish', '', 'Undergraduate', '2017-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`) VALUES
(1, 'Java'),
(2, 'MS Office'),
(3, 'PHP'),
(4, 'C++'),
(5, 'Project Management');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_achievements`
--

CREATE TABLE `tbl_achievements` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_achievements`
--

INSERT INTO `tbl_achievements` (`id`, `user_id`, `title`, `description`, `year`) VALUES
(1, 28, 'Awesomeness Award', 'Because I\'m awesome.', 2017),
(2, 28, 'Inner Peace', 'Because we all need it.', 2017),
(3, 28, 'The Enlightenment', 'I have been enlightened', 2016),
(4, 28, 'Nirvana', 'I have achieved Nirvana.', 2015);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`id`, `name`) VALUES
(2, 'Manila'),
(3, 'Caloocan'),
(4, 'Pasig');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_industry`
--

CREATE TABLE `tbl_industry` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_industry`
--

INSERT INTO `tbl_industry` (`id`, `name`) VALUES
(1, 'Aerospace / Aviation / Airline'),
(3, 'Agricultural / Plantation / Poultry / Fisheries'),
(4, 'Apparel'),
(5, 'Architectural Services / Interior Designing'),
(6, 'Arts / Design / Fashion'),
(7, 'Automobile / Automotive Ancillary / Vehicle'),
(8, 'Banking / Financial Services'),
(9, 'BioTechnology / Pharmaceutical / Clinical Research'),
(10, 'Call Center / IT-Enabled Services / BPO'),
(11, 'Chemical / Fertilizers / Pesticides'),
(12, 'Computer / Information Technology (Hardware)'),
(13, 'Computer / Information Technology (Software)'),
(14, 'Construction / Building / Engineering'),
(15, 'Consulting (Business & Management)'),
(16, 'Consulting (IT, Science, Engineering & Technical)'),
(17, 'Consumer Products / FMCG'),
(18, 'Education'),
(19, 'Electrical & Electronics'),
(20, 'Entertainment / Media'),
(21, 'Environment / Health / Safety'),
(22, 'Exhibitions / Event management / MICE'),
(23, 'Food & Beverage / Catering / Restaurant'),
(24, 'Gems / Jewellery'),
(25, 'General & Wholesale Trading'),
(26, 'Government / Defence'),
(27, 'Grooming / Beauty / Fitness'),
(28, 'Healthcare / Medical'),
(29, 'Heavy Industrial / Machinery / Equipment'),
(30, 'Hotel / Hospitality'),
(31, 'Human Resources Management / Consulting'),
(32, 'Insurance'),
(33, 'Journalism'),
(34, 'Law / Legal'),
(35, 'Library / Museum'),
(36, 'Manufacturing / Production'),
(37, 'Marine / Aquaculture'),
(38, 'Mining'),
(39, 'Non-Profit Organisation / Social Services / NGO'),
(40, 'Oil / Gas / Petroleum'),
(41, 'Polymer / Plastic / Rubber / Tyres'),
(42, 'Printing / Publishing'),
(43, 'Property / Real Estate'),
(44, 'R&D'),
(45, 'Repair & Maintenance Services'),
(46, 'Retail / Merchandise'),
(47, 'Science & Technology'),
(48, 'Security / Law Enforcement'),
(49, 'Semiconductor/Wafer Fabrication'),
(50, 'Sports'),
(51, 'Stockbroking / Securities'),
(52, 'Telecommunication'),
(53, 'Textiles / Garment'),
(54, 'Tobacco'),
(55, 'Transportation / Logistics'),
(56, 'Travel / Tourism'),
(57, 'Utilities / Power'),
(58, 'Wood / Fibre / Paper'),
(59, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

CREATE TABLE `tbl_location` (
  `id` int(10) UNSIGNED NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_location`
--

INSERT INTO `tbl_location` (`id`, `city`, `province`) VALUES
(1, 'Manila', 'Metro Manila'),
(2, 'Pasig', 'Metro Manila');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_membership`
--

CREATE TABLE `tbl_membership` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `assoc` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  `date_entered` year(4) NOT NULL,
  `date_ended` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_membership`
--

INSERT INTO `tbl_membership` (`id`, `user_id`, `assoc`, `description`, `date_entered`, `date_ended`) VALUES
(1, 28, 'Fsociety', 'We aree fsociety.', 2014, 2017),
(2, 28, 'The Dark Army', 'We work in secret.', 2015, 2016),
(3, 28, 'Anonymous', 'We are anonymous.', 2012, 2015),
(4, 28, 'Green Day', 'I walk alone.', 2010, 2012),
(5, 28, 'My Chemical Romance', 'Welcome to the black parade.', 2004, 2005),
(6, 28, 'Linkin Park', 'I\'ve tried so hard, and got so far.', 2002, 2017),
(7, 28, 'Guns n\' Roses', 'Welcome to the jungle. We got fun & games.', 2005, 2006),
(8, 28, 'Led Zeppelin', 'Valhalla, I am coming.', 1980, 1997);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skills`
--

CREATE TABLE `tbl_skills` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `skills` varchar(30) NOT NULL,
  `percent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_skills`
--

INSERT INTO `tbl_skills` (`id`, `user_id`, `skills`, `percent`) VALUES
(1, 28, 'C++', 90),
(2, 28, 'Project Management', 68),
(3, 28, 'Java', 47),
(4, 28, 'Marketing', 81);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `last_active` datetime NOT NULL,
  `date_created` date NOT NULL,
  `verified` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `user_type`, `is_active`, `last_active`, `date_created`, `verified`) VALUES
(15, 'tresh@gmail.com', '$2y$10$q0WWZCVFbqCRrQT2NUf26.3unz7uyhB7KiZ9v3f1kbMlFkIT1.xAa', 'CZ8qQKAUVf5Mb2zdXRMn3G7SKrscuII4CG21ReyW2MlnRVYojGwxNs5SS2Ao', 1, 1, '2017-09-15 00:00:00', '2017-09-15', NULL),
(20, 'trish@gmail.com', '$2y$10$IR5FDZWhQbw2MoVBx5hQmul52WKpF.b0hiW0q8vz2wy06/6zh.PVe', NULL, 1, 1, '2017-09-19 00:00:00', '2017-09-19', NULL),
(21, 'trish02@gmail.com', '$2y$10$f9lBd8/JR9eJ5RDaHNFteuiI3m.jC72WsUXxB0aHZZS29zaco2z.K', NULL, 1, 1, '2017-09-19 00:00:00', '2017-09-19', NULL),
(22, 'trish03@gmail.com', '$2y$10$/5j5tdub8u9bJcN5VW6RX.twTXnwYPYN.hiejqFzMoBCmyb4pRVK.', NULL, 1, 1, '2017-09-19 00:00:00', '2017-09-19', NULL),
(23, 'meh@gmail.com', '$2y$10$GeG0PG7OP9KGj9I4lWnV9OHmsFi8dxh8TjE3h0ZZrAxZAckd5Mmm2', 'fKe4tpqahuriyy1NXF33DVn4q8lhHOZCFzDJQioT7wNQXRdHFVmV75mLJmeB', 1, 1, '2017-09-19 00:00:00', '2017-09-19', NULL),
(28, 'trishmoreno@gmail.com', '$2y$10$r/XHPqSSaL/gkOU09GrYF.5VS3Cp2pJqSRkB1hi3pXAswOYQfPthm', 'D4IeqLTiMQjWzHilvlnxX4KfxfsqMoAQR5XMzvKj3UEU1PLJBjmp4i2TeBix', 1, 1, '2017-09-21 00:00:00', '2017-09-21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_links`
--

CREATE TABLE `users_links` (
  `no` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `website` varchar(20) NOT NULL,
  `link` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_links`
--

INSERT INTO `users_links` (`no`, `user_id`, `website`, `link`) VALUES
(1, 23, 'facebook', 'meh'),
(2, 28, 'facebook', 'facebook.com/trish'),
(3, 28, 'twitter', 'twitter.com/trishmoreno');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`candidate_id`),
  ADD KEY `location_id` (`location`),
  ADD KEY `pos_id` (`position`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `educ_attain` (`educ_attain`);

--
-- Indexes for table `candidate_educ`
--
ALTER TABLE `candidate_educ`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `candidate_exp`
--
ALTER TABLE `candidate_exp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educ_attainment`
--
ALTER TABLE `educ_attainment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_category`
--
ALTER TABLE `job_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`resume_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_achievements`
--
ALTER TABLE `tbl_achievements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_industry`
--
ALTER TABLE `tbl_industry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_location`
--
ALTER TABLE `tbl_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_membership`
--
ALTER TABLE `tbl_membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_skills`
--
ALTER TABLE `tbl_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_links`
--
ALTER TABLE `users_links`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `candidate_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `candidate_educ`
--
ALTER TABLE `candidate_educ`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `candidate_exp`
--
ALTER TABLE `candidate_exp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `educ_attainment`
--
ALTER TABLE `educ_attainment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `job_category`
--
ALTER TABLE `job_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `resume`
--
ALTER TABLE `resume`
  MODIFY `resume_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_achievements`
--
ALTER TABLE `tbl_achievements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_industry`
--
ALTER TABLE `tbl_industry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `tbl_location`
--
ALTER TABLE `tbl_location`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_membership`
--
ALTER TABLE `tbl_membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_skills`
--
ALTER TABLE `tbl_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `users_links`
--
ALTER TABLE `users_links`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
