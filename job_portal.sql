-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2025 at 08:54 PM
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
-- Database: `job_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `posted_job_id` bigint(20) UNSIGNED NOT NULL,
  `cover_letter` text DEFAULT NULL,
  `resume` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `user_id`, `posted_job_id`, `cover_letter`, `resume`, `created_at`, `updated_at`) VALUES
(6, 1, 6, 'hello!', 'resumes/yBsjEIkzCEzbrSonxGAGOwVWjNbPAD8Bp6H7Ztbk.pdf', '2025-04-14 04:24:07', '2025-04-14 04:24:07'),
(7, 1, 5, 'hello', 'resumes/86WLJnqavoz59H629mV0sKgcrL5wiLHZtnCIB5Nt.pdf', '2025-04-14 04:25:50', '2025-04-14 04:25:50'),
(8, 1, 3, 'hello', 'resumes/eMwyqO5yH4hPx9kJHirhCMDYeq3SPHP5rIOFepS3.pdf', '2025-04-14 04:26:57', '2025-04-14 04:26:57');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `company_address` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `industry_sector` varchar(255) NOT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) NOT NULL,
  `company_website` varchar(255) DEFAULT NULL,
  `about` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`id`, `company_name`, `email`, `password`, `company_address`, `name`, `industry_sector`, `cover_image`, `profile_image`, `user_type`, `company_website`, `about`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Innodeed Systems', 'innodeed.dummy@gmail.com', '$2y$12$f9XVu56PlhGRzHlOme02T.h9vcE5R0ZItOoCZEVc7BgtIvXAm/27K', 'Bhilai, Chhattisgarh', 'Innodeed Systems', 'information technology', NULL, NULL, 'Employer', 'www.innodeed.com', NULL, NULL, '2025-04-10 10:57:36', '2025-04-10 10:58:20'),
(2, 'Sjain Ventures Limited', 'sjain@gmail.com', '$2y$12$1XyP4wnkA4xcmMSK0Rdsce7FoIj0FGfLz7h.sd3qtYPaToRPIMZXa', 'Raipur,Chhattisgarh', 'Sjain Ventures', 'information technology', NULL, NULL, 'Employer', 'sjain.io', NULL, NULL, '2025-04-10 11:03:10', '2025-04-10 11:04:10'),
(3, 'Hunarstreet Technologies', 'hunarstreet.dummy@gmail.com', '$2y$12$y223.n6F0.2j0tPFH68TsuDP7/y4C2pWVyCqy04A6s36zB46iohw.', 'Raipur, Chhattisgarh', 'Hunarstreet Technologies', 'education', NULL, NULL, 'Employer', NULL, NULL, NULL, '2025-04-10 11:09:11', '2025-04-10 11:09:11'),
(4, 'MSB Educational Institute, Raipur', 'msb@gmail.comm', '$2y$12$rmsV5DGbCiTvD2B5.r/xfepLQs/oIx.TXKHYpIpFYDxbLrLOZg.0.', 'Moudhapara, Raipur, Chhattisgarh', 'MSB Educational Institute', 'education', NULL, NULL, 'Employer', NULL, NULL, NULL, '2025-04-10 11:46:10', '2025-04-10 11:46:10'),
(5, 'IDBI Capital Market Services Ltd', 'idbi@gmail.com', '$2y$12$RM4F72dWQBMRvacA882Wk./IJLUPLs5XPjrlW9VUaRtITrzDU9nOG', 'Raipur, Chhattisgarh', 'IDBI', 'finance', NULL, NULL, 'Employer', NULL, NULL, NULL, '2025-04-10 11:50:49', '2025-04-10 11:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `employer_password_reset_tokens`
--

CREATE TABLE `employer_password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employer_sessions`
--

CREATE TABLE `employer_sessions` (
  `id` varchar(255) NOT NULL,
  `employer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(46, '0001_01_01_000000_create_users_table', 1),
(47, '0001_01_01_000001_create_cache_table', 1),
(48, '0001_01_01_000002_create_jobs_table', 1),
(49, '2025_03_31_092605_create_employers_table', 1),
(50, '2025_04_05_100323_create_posted_jobs_table', 1),
(51, '2025_04_08_092507_create_applications_table', 1),
(52, '2025_04_08_113345_create_saved_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posted_jobs`
--

CREATE TABLE `posted_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employer_id` bigint(20) UNSIGNED NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_website` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `min_salary` int(11) DEFAULT NULL,
  `max_salary` int(11) DEFAULT NULL,
  `contract_length` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `job_type` varchar(255) NOT NULL,
  `schedule` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`schedule`)),
  `description` text NOT NULL,
  `responsibilities` text DEFAULT NULL,
  `qualifications` text DEFAULT NULL,
  `industry_sector` varchar(255) NOT NULL,
  `skills` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posted_jobs`
--

INSERT INTO `posted_jobs` (`id`, `employer_id`, `job_title`, `company_name`, `company_website`, `location`, `min_salary`, `max_salary`, `contract_length`, `experience`, `job_type`, `schedule`, `description`, `responsibilities`, `qualifications`, `industry_sector`, `skills`, `created_at`, `updated_at`) VALUES
(1, 1, 'React Developer', 'Innodeed Systems', 'www.innodeed.com', 'Bhilai, Chhattisgarh', 3500000, 400000, '2 years', '4 years', 'Full-time', '[\"Day Shift\"]', 'Your primary focus will be on developing user interface components and implementing them following well-known React.js workflows (such as Flux or Redux). You will ensure that these components and the overall application are robust and easy to maintain. You will coordinate with the rest of the team working on different layers of the infrastructure. Therefore, a commitment to collaborative problem solving, sophisticated design, and quality product are important.', 'Developing new user-facing features using React.js\r\nBuilding reusable components and front-end libraries for future use.\r\nTranslating designs and wire-frames into high-quality code\r\nOptimizing components for maximum performance across a vast array of web-capable devices and browsers.\r\nWriting unit test code using jest and enzyme.', NULL, 'information technology', 'Redux,React', '2025-04-10 11:01:04', '2025-04-10 11:01:04'),
(2, 2, 'React.js Developer', 'Sjain Ventures Limited', 'sjain.io', 'Raipur District, Chhattisgarh', 4500000, 500000, '2 years', NULL, 'Full-time', '[\"Day Shift\"]', 'React.js Developer\r\nWe are looking for a great JavaScript developer who is proficient with React.js. Your primary focus will be on developing user interface components and implementing them following well-known React.js workflows (such as Flux or Redux). You will ensure that these components and the overall application are robust and easy to maintain. You will coordinate with the rest of the team working on different layers of the infrastructure. Therefore, a commitment to collaborative problem solving, sophisticated design, and quality product is important.', 'Developing new user-facing features using React.js.\r\nBuilding reusable components and front-end libraries for future use.\r\nTranslating designs and wireframes into high quality code.\r\nOptimizing components for maximum performance across a vast array of web-capable devices and browsers.', 'Strong proficiency in JavaScript, including DOM manipulation and the JavaScript object model.\r\nThorough understanding of React.js and its core principles.\r\nExperience with popular React.js workflows (such as Flux or Redux).\r\nFamiliarity with newer specifications of EcmaScript.\r\nExperience with data structure libraries (e.g., Immutable.js).\r\nKnowledge of isomorphic React is a plus.\r\nFamiliarity with RESTful APIs.\r\nKnowledge of modern authorization mechanisms, such as JSON Web Token.\r\nFamiliarity with modern front-end build pipelines and tools.\r\nExperience with common front-end development tools such as Babel, Webpack, NPM, etc.\r\nAbility to understand business requirements and translate them into technical requirements.\r\nA knack for benchmarking and optimization.\r\nFamiliarity with code versioning tools {{such as Git, Bitbucket}}.', 'information technology', 'JSON,\r\n\r\nBusiness requirements,\r\n\r\nAPIs,\r\n\r\nRedux,', '2025-04-10 11:06:28', '2025-04-10 11:06:28'),
(3, 3, 'Academic Coordinator', 'Hunarstreet Technologies', 'www.hunarstreet.com', 'Raipur District, Chhattisgarh', 400000, 500000, '2 years', '4 years', 'Full-time', '[\"Day Shift\"]', 'Teacher Training and curriculum implementation.\r\nCentre Visits for operational support.\r\nAcademic audits.\r\nOrientation programs for parents and teachers.\r\nRegular Mentoring of all centres in your assigned territory.', 'Teacher Training and curriculum implementation.\r\nCentre Visits for operational support.\r\nAcademic audits.\r\nOrientation programs for parents and teachers.\r\nRegular Mentoring of all centres in your assigned territory.', 'Minimum 1 year of experience as academic coordinator.\r\nExcellent command over English language.\r\nShould be familiar with the preschool industry.\r\nPreschool Franchising knowledge will be an added advantage.\r\nThe candidate should be comfortable with travelling for 15-20 days in a month.', 'education', 'Academic counseling', '2025-04-10 11:13:25', '2025-04-10 11:13:25'),
(4, 4, 'Maths/Physics teacher', 'MSB Educational Institute, Raipur', 'www.msb.com', 'Raipur District, Chhattisgarh', 300000, 400000, '2 years', NULL, 'Full-time', '[\"Day Shift\"]', 'SHOULD BE ABLE TO TEACH IN ENGLISH ONLY.', 'READY TO ACCEPT ALL THE RESPONSIBILITIES ALLOTED BY SCHOOL.', 'SHOULD BE GRADUATE WITH B.ED\r\n\r\nHIGHLY DEDICATED AND GOOD COMMUNICATION SKILLS.', 'education', 'Lesson planning,Teaching experience', '2025-04-10 11:48:07', '2025-04-10 11:48:07'),
(5, 5, 'Sales executive girl', 'IDBI Capital Market Services Ltd', 'www.idbi.com', 'Raipur, Chhattisgarh', 350000, 400000, '2 years', '4 years', 'Full-time', '[\"Day Shift\"]', 'need candidates for banking product DEMAT TRADING A/C sales 100% open market job and hug incentive +esic+pf', 'Only girls\r\n\r\nfresher can be apply', 'minimum education - graduate', 'finance', 'sales,marketings', '2025-04-10 11:53:01', '2025-04-10 11:53:01'),
(6, 5, 'Sales Executive - Commercial Vehicles', 'IDBI Capital Market Services Ltd', 'www.idbi.com', 'Raipur District, Chhattisgarh', 350000, 400000, '2 years', '2+ years', 'Full-time', '[\"Day Shift\"]', 'Candidate needs to have minimum 2 to 3 years’ experience in above products and business.', 'Sr. Sales Executive - Commercial Vehicles', 'Knowledge of end to end SCV Vehicles and used vehicle finance including Commercial Vehicle.\r\nIn depth knowledge of areas New & refinance and used vehicle Business Market.', 'finance', 'sales,marketing', '2025-04-10 11:56:43', '2025-04-10 11:56:43');

-- --------------------------------------------------------

--
-- Table structure for table `saved_jobs`
--

CREATE TABLE `saved_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `posted_job_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saved_jobs`
--

INSERT INTO `saved_jobs` (`id`, `user_id`, `posted_job_id`, `created_at`, `updated_at`) VALUES
(4, 1, 4, '2025-04-13 13:43:00', '2025-04-13 13:43:00'),
(5, 1, 5, '2025-04-14 04:35:59', '2025-04-14 04:35:59');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('nBKX5uQ6wbQl2FIqb7NYyjnAI4AqazMeQCoaI4Kc', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSXQzVTdxTGdBOTJMNjNRZXJTNzIwTzJVb21kTjkyRUlZWXRmWExJdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1744655081),
('q6i8dx1WkY7wZtiTKNBooW8XW4TELPkBjCc25OEi', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM1VSc0plRzZ3V3I2anBIcEFVa05DWk52dUZ2Sm9UeE92ZEVSbExVQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9lbXBsb3llZS9qb2JzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1745603140);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `user_type`, `password`, `profile_image`, `location`, `contact`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Vaibhav Dewangan', 'vaibhav@gmail.com', NULL, 'employee', '$2y$12$Kpe1.ds4KJeQ5eeIyqrsUuGVHMWjDk24AE8jVmLd8rVw5L8m6Z5U.', NULL, NULL, NULL, NULL, '2025-04-13 09:37:42', '2025-04-13 09:37:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applications_user_id_foreign` (`user_id`),
  ADD KEY `applications_posted_job_id_foreign` (`posted_job_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employers_company_name_unique` (`company_name`),
  ADD UNIQUE KEY `employers_email_unique` (`email`);

--
-- Indexes for table `employer_password_reset_tokens`
--
ALTER TABLE `employer_password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `employer_sessions`
--
ALTER TABLE `employer_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employer_sessions_employer_id_foreign` (`employer_id`),
  ADD KEY `employer_sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `posted_jobs`
--
ALTER TABLE `posted_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posted_jobs_employer_id_foreign` (`employer_id`);

--
-- Indexes for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `saved_jobs_user_id_foreign` (`user_id`),
  ADD KEY `saved_jobs_posted_job_id_foreign` (`posted_job_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_foreign` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `posted_jobs`
--
ALTER TABLE `posted_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_posted_job_id_foreign` FOREIGN KEY (`posted_job_id`) REFERENCES `posted_jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employer_sessions`
--
ALTER TABLE `employer_sessions`
  ADD CONSTRAINT `employer_sessions_employer_id_foreign` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posted_jobs`
--
ALTER TABLE `posted_jobs`
  ADD CONSTRAINT `posted_jobs_employer_id_foreign` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  ADD CONSTRAINT `saved_jobs_posted_job_id_foreign` FOREIGN KEY (`posted_job_id`) REFERENCES `posted_jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `saved_jobs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
