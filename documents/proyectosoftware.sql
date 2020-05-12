-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2020 at 05:26 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyectosoftware`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `trainer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `date`, `time`, `description`, `user_id`, `trainer_id`, `created_at`, `updated_at`) VALUES
(1, '2020-06-20', '10:15:00', 'Modify the training routine.', 5, 3, '2020-05-10 04:08:32', '2020-05-10 04:08:32'),
(2, '2020-06-21', '11:30:00', 'Modify the training routine.', 6, 3, '2020-05-10 04:08:32', '2020-05-10 04:08:32'),
(3, '2020-06-22', '12:15:00', 'Modify the training routine.', 7, 3, '2020-05-10 04:08:32', '2020-05-10 04:08:32'),
(4, '2020-06-23', '13:30:00', 'Take body measurements.', 8, 4, '2020-05-10 04:08:32', '2020-05-10 04:08:32'),
(5, '2020-06-24', '14:15:00', 'Take body measurements.', 9, 4, '2020-05-10 04:08:32', '2020-05-10 04:08:32'),
(6, '2020-06-25', '15:30:00', 'Take body measurements.', 10, 4, '2020-05-10 04:08:32', '2020-05-10 04:08:32'),
(7, '2020-07-03', '16:15:00', 'Modify the training routine.', 5, 3, '2020-05-10 04:08:32', '2020-05-10 04:08:32'),
(8, '2020-07-04', '10:40:00', 'Take body measurements.', 6, 4, '2020-05-10 04:08:32', '2020-05-10 04:08:32');


-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `exercise_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `exercise_id`, `created_at`, `updated_at`) VALUES
(1, 'Good exercise', 5, 1, '2020-05-10 04:08:34', '2020-05-10 04:08:34'),
(2, 'Excellent', 5, 2, '2020-05-10 04:08:34', '2020-05-10 04:08:34'),
(3, 'Good exercise', 6, 3, '2020-05-10 04:08:34', '2020-05-10 04:08:34'),
(4, 'Excellent', 6, 4, '2020-05-10 04:08:34', '2020-05-10 04:08:34'),
(5, 'Amazing', 7, 5, '2020-05-10 04:08:34', '2020-05-10 04:08:34'),
(6, 'Excellent', 7, 6, '2020-05-10 04:09:23', '2020-05-10 04:09:23'),
(7, 'Excellent', 7, 7, '2020-05-10 04:09:23', '2020-05-10 04:09:23'),
(8, 'Good exercise', 8, 8, '2020-05-10 04:09:23', '2020-05-10 04:09:23'),
(9, 'The best', 8, 9, '2020-05-10 04:09:23', '2020-05-10 04:09:23'),
(10, 'Excellent', 8, 10, '2020-05-10 04:09:23', '2020-05-10 04:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `exercises`
--

CREATE TABLE `exercises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recommendations` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path_video` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `path_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exercises`
--

INSERT INTO `exercises` (`id`, `name`, `description`, `recommendations`, `path_video`, `created_at`, `updated_at`, `path_image`) VALUES
(1, 'Bench press', 'Lie on a flat bench holding a barbell with your hands slightly wider than shoulder-width apart. Brace your core, then lower the bar towards your chest. Press it back up to the start.', 'Take care of your back.', 'exercise/video1.mp4', '2020-05-10 04:08:34', '2020-05-10 04:08:34', 'exercise/image1.jpg'),
(2, 'Triceps dip', 'Grip rings or parallel bars with your arms straight. Keeping your chest up, bend your elbows to lower your body as far as your shoulders allow. Press back up powerfully to return to the start.', 'Be careful with your shoulders.', 'exercise/video2.mp4', '2020-05-10 04:08:34', '2020-05-10 04:08:34', 'exercise/image2.jpg'),
(3, 'Incline dumbbell press', 'Lie on an incline bench holding a dumbbell in each hand by your shoulders. Press the weights up until your arms are straight, then lower them back to the start under control.', 'Take care of your back', 'exercise/video3.mp4', '2020-05-10 04:08:34', '2020-05-10 04:08:34', 'exercise/image3.jpg'),
(4, 'Incline dumbbell flye', 'Lie on an incline bench holding a dumbbell in each hand above your face, with your palms facing and a slight bend in your elbows. Lower them to the sides, then bring them back to the top.', 'Be careful with your shoulders.', 'exercise/video4.mp4', '2020-05-10 04:08:34', '2020-05-10 04:08:34', 'exercise/image4.jpg'),
(5, 'Triceps extension', 'Stand tall holding a dumbbell over your head with both hands, arms straight. Keeping your chest up, lower the weight behind your head, then raise it back to the start.', 'Take care of your back', 'exercise/video5.mp4', '2020-05-10 04:08:34', '2020-05-10 04:08:34', 'exercise/image5.jpg'),
(6, 'Pull-up', 'Hold a pull-up bar with an overhand grip, hands shoulder-width apart. Brace your core, then pull yourself up until your lower chest touches the bar. Lower until your arms are straight again.', 'Be careful with your shoulders.', 'exercise/video6.mp4', '2020-05-10 04:08:34', '2020-05-10 04:08:34', 'exercise/image6.jpg'),
(7, 'Bent-over row', 'Hold a barbell using an overhand grip, hands just outside your legs, and lean forward from the hips. Bend your knees slightly and brace your core, then pull the bar up, leading with your elbows. Lower it back to the start.', 'Take care of your back', 'exercise/video7.mp4', '2020-05-10 04:08:34', '2020-05-10 04:08:34', 'exercise/image7.jpg'),
(8, 'Chin-up', 'Hold a pull-up bar with hands shoulder-width apart, palms facing you. Brace your core, then pull yourself up until your chin is over the bar. Lower until your arms are straight again.', 'Be careful with your shoulders.', 'exercise/video8.mp4', '2020-05-10 04:08:34', '2020-05-10 04:08:34', 'exercise/image8.jpg'),
(9, 'Standing biceps curl', 'Stand with dumbbells by your sides, palms facing forwards. Keeping your elbows tucked in, curl the weights up, squeezing your biceps at the top. Lower them back to the start.', 'Take care of your back', 'exercise/video9.mp4', '2020-05-10 04:08:34', '2020-05-10 04:08:34', 'exercise/image9.jpg'),
(10, 'Seated incline curl', 'Sit on an incline bench with dumbbells by your sides, palms facing forwards. Keeping your elbows tucked in, curl the weights up, squeezing your biceps at the top. Lower them back to the start.', 'Be careful with your shoulders.', 'exercise/video10.mp4', '2020-05-10 04:08:34', '2020-05-10 04:08:34', 'exercise/image10.jpg');


-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_02_23_000000_create_users_table', 1),
(4, '2020_02_24_000000_create_exercise_table', 1),
(5, '2020_03_08_000000_create_comments_table', 1),
(6, '2020_03_09_000000_create_trainings_table', 1),
(7, '2020_03_10_000000_create_appointments_table', 1),
(8, '2020_03_10_000000_create_records_table', 1),
(9, '2020_03_10_000000_create_routines_table', 1),
(10, '2020_05_09_000000_update_exercise_table', 1);

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
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `weight` double NOT NULL,
  `height` double NOT NULL,
  `imc` double NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `weight`, `height`, `imc`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 60, 170, 21, 5, '2020-01-10 04:08:33', '2020-01-10 04:08:33'),
(2, 65, 170, 23, 5, '2020-02-10 04:08:33', '2020-02-10 04:08:33'),
(3, 70, 170, 25, 5, '2020-03-10 04:08:33', '2020-03-10 04:08:33'),
(4, 80, 170, 28, 5, '2020-04-10 04:08:33', '2020-04-10 04:08:33'),

(5, 90, 185, 26, 6, '2020-01-10 04:08:33', '2020-01-10 04:08:33'),
(6, 85, 185, 26, 6, '2020-02-10 04:08:33', '2020-02-10 04:08:33'),
(7, 70, 185, 25, 6, '2020-03-10 04:08:33', '2020-03-10 04:08:33'),

(8, 50, 160, 23, 7, '2020-01-10 04:08:33', '2020-01-10 04:08:33'),
(9, 55, 160, 24, 7, '2020-02-10 04:08:34', '2020-02-10 04:08:34'),
(10, 60, 160, 25, 7, '2020-03-10 04:08:34', '2020-03-10 04:08:34'),

(11, 45, 160, 22, 8, '2020-01-10 04:08:35', '2020-01-10 04:08:35'),
(12, 48, 160, 22, 8, '2020-02-10 04:08:35', '2020-02-10 04:08:35'),
(13, 50, 160, 23, 8, '2020-03-10 04:08:35', '2020-03-10 04:08:35'),

(14, 75, 170, 23, 9, '2020-01-10 04:08:35', '2020-01-10 04:08:35'),
(15, 85, 170, 25, 9, '2020-02-10 04:08:35', '2020-02-10 04:08:35'),
(16, 80, 170, 24, 9, '2020-03-10 04:08:35', '2020-03-10 04:08:35'),

(17, 100, 175, 28, 10, '2020-01-10 04:09:22', '2020-01-10 04:09:22'),
(18, 90, 175, 26, 10, '2020-02-10 04:09:22', '2020-02-10 04:09:22'),
(19, 85, 175, 24, 10, '2020-03-10 04:09:24', '2020-03-10 04:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `routines`
--

CREATE TABLE `routines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `repetitions` bigint(20) UNSIGNED NOT NULL,
  `sequences` bigint(20) UNSIGNED NOT NULL,
  `seconds_to_rest` bigint(20) UNSIGNED NOT NULL,
  `exercise_id` bigint(20) UNSIGNED NOT NULL,
  `training_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `routines`
--

INSERT INTO `routines` (`id`, `repetitions`, `sequences`, `seconds_to_rest`, `exercise_id`, `training_id`, `created_at`, `updated_at`) VALUES
(1, 20, 4, 60, 1, 1, '2020-05-10 04:08:35', '2020-05-10 04:08:35'),
(2, 20, 5, 90, 2, 1, '2020-05-10 04:08:35', '2020-05-10 04:08:35'),
(3, 15, 3, 120, 3, 1, '2020-05-10 04:08:35', '2020-05-10 04:08:35'),
(4, 15, 4, 30, 4, 1, '2020-05-10 04:08:35', '2020-05-10 04:08:35'),
(5, 10, 5, 60, 5, 2, '2020-05-10 04:08:35', '2020-05-10 04:08:35'),
(6, 10, 3, 90, 6, 2, '2020-05-10 04:09:24', '2020-05-10 04:09:24'),
(7, 25, 4, 120, 7, 2, '2020-05-10 04:09:24', '2020-05-10 04:09:24'),
(8, 25, 5, 60, 8, 3, '2020-05-10 04:09:24', '2020-05-10 04:09:24'),
(9, 25, 3, 30, 9, 3, '2020-05-10 04:09:24', '2020-05-10 04:09:24'),
(10, 20, 4, 120, 10, 3, '2020-05-10 04:09:24', '2020-05-10 04:09:24'),
(11, 20, 4, 60, 1, 4, '2020-05-10 04:08:35', '2020-05-10 04:08:35'),
(12, 20, 5, 90, 2, 5, '2020-05-10 04:08:35', '2020-05-10 04:08:35'),
(13, 15, 3, 120, 3, 6, '2020-05-10 04:08:35', '2020-05-10 04:08:35'),
(14, 15, 4, 30, 4, 7, '2020-05-10 04:08:35', '2020-05-10 04:08:35'),
(15, 10, 5, 60, 5, 8, '2020-05-10 04:08:35', '2020-05-10 04:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` int(10) UNSIGNED NOT NULL,
  `duration` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`id`, `name`, `day`, `duration`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Hard Biceps', 1, 120, 5, '2020-05-10 04:08:33', '2020-05-10 04:08:33'),
(2, 'Hard Back', 2, 120, 5, '2020-05-10 04:08:33', '2020-05-10 04:08:33'),
(3, 'Back and Biceps', 3, 120, 5, '2020-05-10 04:08:33', '2020-05-10 04:08:33'),
(4, 'Hard Biceps', 1, 120, 6, '2020-05-10 04:08:33', '2020-05-10 04:08:33'),
(5, 'Hard Back', 1, 120, 7, '2020-05-10 04:08:33', '2020-05-10 04:08:33'),
(6, 'Back and Biceps', 1, 120, 8, '2020-05-10 04:08:33', '2020-05-10 04:08:33'),
(7, 'Hard Back', 1, 120, 9, '2020-05-10 04:08:33', '2020-05-10 04:08:33'),
(8, 'Back and Biceps', 1, 120, 10, '2020-05-10 04:08:33', '2020-05-10 04:08:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `age`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Alejandro', 'Cano', 20, 'admin@gym.com', '2020-05-10 04:08:32', '$2y$12$rPAB1hA6yoyt23Ks/M8pZOrLU7yCwlxl2HMT9POVfnyjig4MSdT0C', 3, 'StsGC54P60hEW4OyviQnBjkKl8AL94jy7GOBcplxDqjRWSbLuSlMJO9kcofx', '2020-05-10 04:08:32', '2020-05-10 04:08:32'),
(2, 'Luis Javier', 'Palacio', 20, 'admin2@gym.com', '2020-05-10 04:08:32', '$2y$12$rPAB1hA6yoyt23Ks/M8pZOrLU7yCwlxl2HMT9POVfnyjig4MSdT0C', 3, 'qY0OMbqhw6', '2020-05-10 04:08:32', '2020-05-10 04:08:32'),
(3, 'Sebastian', 'Giraldo', 20, 'trainer@gym.com', '2020-05-10 04:08:32', '$2y$12$rPAB1hA6yoyt23Ks/M8pZOrLU7yCwlxl2HMT9POVfnyjig4MSdT0C', 2, '4FgWUPKqFZ', '2020-05-10 04:08:32', '2020-05-10 04:08:32'),
(4, 'Kevyn Santiago', 'Gomez', 19, 'trainer2@gym.com', '2020-05-10 04:08:32', '$2y$12$rPAB1hA6yoyt23Ks/M8pZOrLU7yCwlxl2HMT9POVfnyjig4MSdT0C', 2, 'Jvt1gyVQk1', '2020-05-10 04:08:32', '2020-05-10 04:08:32'),
(5, 'Luis Eduardo', 'Gir4ldo', 40, 'cuatro@gym.com', '2020-05-10 04:08:32', '$2y$12$rPAB1hA6yoyt23Ks/M8pZOrLU7yCwlxl2HMT9POVfnyjig4MSdT0C', 1, '3H6dBMjiPA', '2020-05-10 04:08:32', '2020-05-10 04:08:32'),
(6, 'Willinton', 'Muñoz', 22, 'sal@gym.com', '2020-05-10 04:09:21', '$2y$12$rPAB1hA6yoyt23Ks/M8pZOrLU7yCwlxl2HMT9POVfnyjig4MSdT0C', 1, 'JiD2UKy5q2', '2020-05-10 04:09:21', '2020-05-10 04:09:21'),
(7, 'Santiago', 'Castrillon', 24, 'decepcion@gym.com', '2020-05-10 04:09:21', '$2y$12$rPAB1hA6yoyt23Ks/M8pZOrLU7yCwlxl2HMT9POVfnyjig4MSdT0C', 1, 'JzzhZ3WRIu', '2020-05-10 04:09:21', '2020-05-10 04:09:21'),
(8, 'Santiago', 'Arredondo', 26, 'shaggy@gym.com', '2020-05-10 04:09:21', '$2y$12$rPAB1hA6yoyt23Ks/M8pZOrLU7yCwlxl2HMT9POVfnyjig4MSdT0C', 1, 'XLh3YHiRgG', '2020-05-10 04:09:21', '2020-05-10 04:09:21'),
(9, 'Alejandro', 'Arroyave', 28, 'arroch@gym.com', '2020-05-10 04:09:21', '$2y$12$rPAB1hA6yoyt23Ks/M8pZOrLU7yCwlxl2HMT9POVfnyjig4MSdT0C', 1, '9otO8Vn1N4', '2020-05-10 04:09:21', '2020-05-10 04:09:21'),
(10, 'Aguskiu', 'Nieto', 30, 'elcampeon@gym.com', '2020-05-10 04:09:21', '$2y$12$rPAB1hA6yoyt23Ks/M8pZOrLU7yCwlxl2HMT9POVfnyjig4MSdT0C', 1, 'CyrnsQcLII', '2020-05-10 04:09:21', '2020-05-10 04:09:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_user_id_foreign` (`user_id`),
  ADD KEY `appointments_trainer_id_foreign` (`trainer_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_exercise_id_foreign` (`exercise_id`);

--
-- Indexes for table `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `records_user_id_foreign` (`user_id`);

--
-- Indexes for table `routines`
--
ALTER TABLE `routines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `routines_exercise_id_foreign` (`exercise_id`),
  ADD KEY `routines_training_id_foreign` (`training_id`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainings_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `exercises`
--
ALTER TABLE `exercises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `routines`
--
ALTER TABLE `routines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_trainer_id_foreign` FOREIGN KEY (`trainer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_exercise_id_foreign` FOREIGN KEY (`exercise_id`) REFERENCES `exercises` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `records_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `routines`
--
ALTER TABLE `routines`
  ADD CONSTRAINT `routines_exercise_id_foreign` FOREIGN KEY (`exercise_id`) REFERENCES `exercises` (`id`),
  ADD CONSTRAINT `routines_training_id_foreign` FOREIGN KEY (`training_id`) REFERENCES `trainings` (`id`);

--
-- Constraints for table `trainings`
--
ALTER TABLE `trainings`
  ADD CONSTRAINT `trainings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
