-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 24, 2021 at 01:50 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grading`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ests` double(8,2) NOT NULL,
  `credithour` double(8,2) NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `grade_id` bigint(20) UNSIGNED DEFAULT NULL,
  `corsecode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_desc`, `ests`, `credithour`, `student_id`, `semester_id`, `created_at`, `updated_at`, `grade_id`, `corsecode`) VALUES
(1, 'C1S1', 'C1S1', 7.00, 4.00, 1, 1, NULL, NULL, 1, 'C1S1'),
(2, 'C2S2', 'C2S2', 7.00, 4.00, 2, 1, NULL, NULL, 2, 'C2S2'),
(3, 'C2S1', 'C2S1', 8.00, 4.00, 1, 1, NULL, NULL, 2, 'C2S1'),
(4, 'C2S1', 'C2S1', 6.00, 3.00, 1, 1, NULL, NULL, 3, 'C2S1'),
(5, 'C2S1', 'C2S1', 6.00, 3.00, 1, 2, NULL, NULL, 1, 'C2S1'),
(6, 'test', 'test', 7.00, 4.00, 3, 1, NULL, NULL, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `mark` float NOT NULL,
  `grade` varchar(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`id`, `created_at`, `updated_at`, `mark`, `grade`, `status`) VALUES
(1, NULL, NULL, 90.5, 'A', 1),
(2, NULL, NULL, 90.5, 'A', 1);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mark` double(8,2) NOT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `created_at`, `updated_at`, `mark`, `grade`, `status`) VALUES
(1, NULL, NULL, 98.00, 'A+', 1),
(2, NULL, NULL, 33.00, 'F', 2),
(3, NULL, NULL, 33.00, 'F', 1),
(10, NULL, NULL, 0.00, 'F', 1);

-- --------------------------------------------------------

--
-- Table structure for table `instractors`
--

CREATE TABLE `instractors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_15_051731_create_courses_table', 1),
(6, '2021_09_15_052019_create_grades_table', 1),
(7, '2021_09_15_052043_create_students_table', 1),
(8, '2021_09_15_052624_create_instractors_table', 1),
(9, '2021_09_16_084614_add_marks_to_grades', 1),
(10, '2021_09_17_125621_add_ests_to_courses', 1),
(11, '2021_09_17_125623_create_semesters_table', 1),
(12, '2021_09_17_133333_add_corsecode_to_courses', 1),
(14, '2021_09_24_124552_create_courses_table', 2),
(15, '2021_09_27_070047_add_cource_id_grades_table', 2),
(16, '2021_09_29_090430_add_corsecode_to_courses', 3),
(22, '2021_10_01_062846_create_student_user_table', 4),
(34, '2021_10_23_044624_create_new_acad_terms_table', 5),
(35, '2021_10_23_044723_create_new_curriculam_table', 5),
(36, '2021_10_23_044737_create_new_courses_table', 5),
(37, '2021_10_23_044738_create_new_curriculum_details_table', 5),
(38, '2021_10_23_045006_create_new_employees_table', 5),
(39, '2021_10_23_045019_create_new_students_table', 5),
(40, '2021_10_23_045030_create_new_classes_table', 5),
(41, '2021_10_23_045042_create_new_grades_table', 5),
(43, '2021_10_25_164910_create_new_course_creditations_table', 6),
(44, '2021_10_25_165314_create_new_course_creditation_details_table', 6),
(45, '2021_11_11_144404_create_permission_tables', 7),
(46, '2021_11_17_062939_add_department_name_to_new_curriculums_table', 8),
(47, '2021_11_17_150811_create_new_new_students_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 3),
(1, 'App\\Models\\User', 4),
(1, 'App\\Models\\User', 5),
(1, 'App\\Models\\User', 6),
(1, 'App\\Models\\User', 7),
(1, 'App\\Models\\User', 11),
(1, 'App\\Models\\User', 12),
(1, 'App\\Models\\User', 13),
(2, 'App\\Models\\User', 9),
(2, 'App\\Models\\User', 10),
(3, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 8),
(4, 'App\\Models\\User', 9);

-- --------------------------------------------------------

--
-- Table structure for table `newnewstudents`
--

CREATE TABLE `newnewstudents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newnewstudents`
--

INSERT INTO `newnewstudents` (`id`, `name`, `email`, `username`, `phone`, `dob`, `created_at`, `updated_at`) VALUES
(1, 'Ernest Gottlieb', 'zschaden@cormier.net', 'ohara.heath', '+1-269-254-6083', '2017-08-25', NULL, NULL),
(2, 'Destin Carroll', 'rgerlach@gmail.com', 'rosanna23', '703.295.1586', '1986-07-06', NULL, NULL),
(3, 'Robbie Cartwright', 'zita.murazik@hotmail.com', 'turcotte.lenora', '1-706-926-0031', '2007-08-03', NULL, NULL),
(4, 'Prof. Thomas Jones', 'schulist.candace@shields.org', 'emard.kaylee', '+1-276-493-5850', '1994-09-15', NULL, NULL),
(5, 'Junius Hegmann', 'kiley92@satterfield.com', 'giles78', '+1-332-472-3255', '2004-09-09', NULL, NULL),
(6, 'Dr. Wilfred Dickens II', 'reichel.cheyenne@hotmail.com', 'leonel23', '+1-214-298-7577', '1982-05-25', NULL, NULL),
(7, 'Archibald Lubowitz', 'dweber@yahoo.com', 'uparker', '+1-661-276-9350', '1999-04-29', NULL, NULL),
(8, 'Jayden Smitham', 'qokon@gmail.com', 'terry.alanna', '+1 (530) 708-0487', '2003-12-27', NULL, NULL),
(9, 'Clyde Wisoky', 'stark.eveline@yahoo.com', 'crawford79', '+1-904-400-7914', '1993-01-26', NULL, NULL),
(10, 'Lamont Schroeder', 'goldner.thad@hotmail.com', 'renner.amya', '+1 (410) 360-8810', '2013-09-30', NULL, NULL),
(11, 'Bobby Stiedemann', 'shemar87@oconnell.net', 'jrodriguez', '831.399.2881', '1981-12-05', NULL, NULL),
(12, 'Mr. Dylan Conroy', 'arnoldo71@lowe.com', 'dshanahan', '+1.405.574.3746', '2003-05-10', NULL, NULL),
(13, 'Xavier Luettgen', 'imorissette@blick.org', 'pmckenzie', '+1 (828) 320-6385', '1986-12-13', NULL, NULL),
(14, 'Mavis Harris PhD', 'moen.elliot@bartoletti.com', 'gabriella.swift', '+1-351-229-6987', '2004-04-01', NULL, NULL),
(15, 'Robert Schmidt', 'emmy85@hotmail.com', 'meggie42', '1-574-647-1896', '1980-04-06', NULL, NULL),
(16, 'Godfrey Lang', 'baron25@hotmail.com', 'sim57', '(480) 484-9143', '1980-07-06', NULL, NULL),
(17, 'Dr. Gaston Jones', 'borer.derrick@feil.info', 'buford.mclaughlin', '+1 (234) 948-0097', '2001-07-22', NULL, NULL),
(18, 'Carmel Mosciski IV', 'zmohr@bogisich.com', 'serena.mckenzie', '1-404-280-3903', '1973-09-30', NULL, NULL),
(19, 'Prof. Gaston Glover II', 'ricky70@yahoo.com', 'isaac.oreilly', '(401) 380-2341', '1982-04-26', NULL, NULL),
(20, 'German Steuber', 'turcotte.leta@dubuque.biz', 'vrosenbaum', '283-732-3335', '1981-03-07', NULL, NULL),
(21, 'Blair Paucek', 'dakota97@gmail.com', 'bwehner', '1-229-236-6771', '1978-09-04', NULL, NULL),
(22, 'Garnet Zieme', 'ally.hartmann@mclaughlin.com', 'santino11', '267-259-7589', '1975-04-16', NULL, NULL),
(23, 'Alek Boyer', 'fgreen@hotmail.com', 'osinski.marquise', '952-989-3655', '1976-07-05', NULL, NULL),
(24, 'Dallas Stoltenberg', 'calista67@walker.com', 'wisoky.corine', '731.693.9345', '2014-08-24', NULL, NULL),
(25, 'Oran Lind', 'dominique.fahey@hotmail.com', 'karelle.stamm', '+1-279-579-7648', '2006-03-18', NULL, NULL),
(26, 'Buddy Volkman DVM', 'leannon.danial@koss.com', 'kertzmann.caleb', '802.612.4298', '1999-10-31', NULL, NULL),
(27, 'Dr. Percy Sporer', 'brian.hauck@hotmail.com', 'letha.abshire', '719.957.0638', '2014-07-25', NULL, NULL),
(28, 'Finn Bechtelar', 'kub.mustafa@grimes.com', 'fahey.justina', '(341) 955-3993', '2004-09-17', NULL, NULL),
(29, 'Dr. Federico Oberbrunner', 'orland.metz@krajcik.com', 'dickinson.adrien', '+1 (662) 504-1789', '1999-05-22', NULL, NULL),
(30, 'Leopold West', 'schamberger.kelvin@leannon.net', 'baby.cruickshank', '+1-605-326-6831', '1975-10-10', NULL, NULL),
(31, 'Reece Streich', 'tamara.hand@strosin.com', 'hollie30', '508-262-0856', '1975-08-30', NULL, NULL),
(32, 'Soledad Purdy', 'ebergstrom@gmail.com', 'sylvia23', '(678) 801-8506', '1995-07-17', NULL, NULL),
(33, 'Dewayne Carroll', 'wolff.phoebe@gutmann.com', 'lynch.general', '225-560-4271', '2011-04-04', NULL, NULL),
(34, 'Chelsey Thiel', 'langworth.mia@howe.com', 'boyle.shea', '+1-630-720-3507', '1987-05-18', NULL, NULL),
(35, 'Sigmund Cormier', 'jabari.casper@yahoo.com', 'mcdermott.macy', '(972) 535-9301', '2005-06-16', NULL, NULL),
(36, 'Santos Botsford', 'javier63@legros.com', 'morar.wayne', '928-576-7777', '2007-10-08', NULL, NULL),
(37, 'Ethan Kerluke', 'imedhurst@yahoo.com', 'bernhard.wilfred', '+1 (585) 681-1332', '2005-10-22', NULL, NULL),
(38, 'Prof. Kyle Murray MD', 'hayden.bradtke@hotmail.com', 'tmclaughlin', '458.625.5308', '1995-04-19', NULL, NULL),
(39, 'Charley Kling', 'vschinner@yahoo.com', 'hanna94', '+1.838.384.1396', '2011-05-05', NULL, NULL),
(40, 'Dominic Kuhlman II', 'abdullah.cormier@romaguera.info', 'lesch.providenci', '1-952-715-6822', '2012-07-09', NULL, NULL),
(41, 'Brook Hane II', 'sbashirian@ernser.com', 'wilkinson.june', '559-609-4423', '1976-05-30', NULL, NULL),
(42, 'Mr. Arthur Crooks', 'bernardo28@walter.biz', 'ritchie.reanna', '1-618-994-2603', '1991-07-02', NULL, NULL),
(43, 'Mr. Carmine Hirthe', 'kelsie.dicki@lynch.com', 'bhills', '814-401-2836', '1984-06-20', NULL, NULL),
(44, 'Thaddeus Muller', 'medhurst.ike@gmail.com', 'kilback.wellington', '726-418-5130', '1992-02-20', NULL, NULL),
(45, 'Prof. Emmet Schiller III', 'graham.alexandria@rutherford.com', 'uwest', '231-783-0617', '2005-01-06', NULL, NULL),
(46, 'Dr. Arjun Eichmann', 'ukutch@satterfield.com', 'goyette.shanel', '(956) 819-6606', '2005-11-11', NULL, NULL),
(47, 'Carroll Bosco I', 'mac.glover@greenfelder.org', 'bsatterfield', '(386) 961-1490', '1996-03-11', NULL, NULL),
(48, 'Mr. Toney Leannon', 'daniella16@hotmail.com', 'willa28', '+1-336-441-2254', '1973-06-25', NULL, NULL),
(49, 'Victor Bartoletti', 'turcotte.edythe@rogahn.com', 'armstrong.brandt', '+1.689.673.6564', '1996-02-07', NULL, NULL),
(50, 'Fern Pacocha', 'christina.beatty@abbott.net', 'murphy.meaghan', '1-240-932-4123', '2000-06-11', NULL, NULL),
(51, 'Okey Aufderhar', 'crooks.katrine@powlowski.com', 'lazaro.dare', '1-407-610-0242', '2015-08-15', NULL, NULL),
(52, 'Dr. Adelbert Pfannerstill II', 'kylie39@beahan.com', 'bschowalter', '(779) 253-6159', '1998-04-06', NULL, NULL),
(53, 'Layne Littel', 'charlotte.vandervort@hermann.net', 'bosco.loyce', '(351) 229-9843', '1994-04-23', NULL, NULL),
(54, 'Amani Gibson', 'istreich@hotmail.com', 'bonnie.quigley', '220.863.5820', '1982-07-11', NULL, NULL),
(55, 'Mr. Gideon Conn DVM', 'mollie.durgan@yahoo.com', 'lonny.ernser', '(309) 734-5567', '2013-11-30', NULL, NULL),
(56, 'Coty Nicolas MD', 'devin55@runte.com', 'jedediah.armstrong', '949.779.3240', '1983-07-08', NULL, NULL),
(57, 'Dr. Sofia Dickens V', 'jeffry.kuhlman@yahoo.com', 'kub.stephon', '(256) 444-5720', '2015-05-27', NULL, NULL),
(58, 'Buford Roob', 'gnitzsche@hotmail.com', 'alejandra66', '330.972.1726', '2009-09-23', NULL, NULL),
(59, 'Taylor Dare', 'connelly.juliet@hauck.com', 'moen.flossie', '838-973-6717', '1995-10-02', NULL, NULL),
(60, 'Mr. Terrill Breitenberg I', 'ubarton@ruecker.com', 'carroll.elmira', '(785) 412-2294', '2009-03-06', NULL, NULL),
(61, 'Clement Hermann', 'glover.madelynn@gmail.com', 'lilian.vonrueden', '(202) 970-8352', '1991-07-19', NULL, NULL),
(62, 'Wilfred Muller', 'herman.samantha@cummerata.com', 'tamara.grimes', '952-789-7495', '2012-04-07', NULL, NULL),
(63, 'Prof. Adelbert Ledner Jr.', 'mhammes@williamson.com', 'kautzer.courtney', '(239) 396-5370', '1997-10-05', NULL, NULL),
(64, 'Mose Batz', 'khalil73@hotmail.com', 'gay.wisoky', '580.752.8570', '2011-10-01', NULL, NULL),
(65, 'Jocelyn Hill', 'josefa.kunde@gmail.com', 'larry.russel', '754-460-3384', '1987-01-18', NULL, NULL),
(66, 'Tobin Krajcik DDS', 'malachi.schimmel@gmail.com', 'beer.jeffry', '352-925-5979', '2021-03-15', NULL, NULL),
(67, 'Noel Schroeder IV', 'kiehn.jean@gmail.com', 'sritchie', '+19545260714', '1983-11-05', NULL, NULL),
(68, 'Cesar Howe', 'udurgan@yahoo.com', 'stehr.eda', '+1.650.372.6879', '2003-03-15', NULL, NULL),
(69, 'Wilford Buckridge', 'ywilkinson@hotmail.com', 'padberg.jean', '346-881-8654', '2019-10-08', NULL, NULL),
(70, 'Mr. Avery Ferry', 'arunolfsdottir@denesik.biz', 'norberto.pagac', '+1-561-788-4967', '2014-06-28', NULL, NULL),
(71, 'Dr. Gonzalo Marvin I', 'kub.lydia@gmail.com', 'eduardo.toy', '252-917-7440', '1993-06-26', NULL, NULL),
(72, 'Carmel Renner', 'jaycee.heaney@cartwright.com', 'aletha.schowalter', '+1-239-658-6781', '2020-02-27', NULL, NULL),
(73, 'Leonel Kutch', 'koss.nikita@yahoo.com', 'sawayn.tyree', '940-259-5307', '2017-05-18', NULL, NULL),
(74, 'Adrien Bruen', 'kirlin.kade@hotmail.com', 'erick.wiza', '+18486056269', '1971-12-30', NULL, NULL),
(75, 'Victor Bashirian', 'glennie.koss@collins.com', 'goyette.hank', '+15403672568', '2020-11-14', NULL, NULL),
(76, 'Jared Eichmann', 'geoffrey45@gmail.com', 'gaylord.hertha', '+14178523351', '1981-05-08', NULL, NULL),
(77, 'Kareem Lynch', 'yjacobi@hotmail.com', 'blick.jaqueline', '567.537.0819', '2002-10-23', NULL, NULL),
(78, 'Dr. Wilfredo Schulist Jr.', 'selena.effertz@yahoo.com', 'oframi', '+1 (636) 852-0278', '1973-08-11', NULL, NULL),
(79, 'Thaddeus Ullrich DVM', 'bernita97@yahoo.com', 'wilford.muller', '+1-341-970-6406', '1980-04-08', NULL, NULL),
(80, 'Greyson Wolff', 'obreitenberg@rowe.com', 'rschimmel', '360.499.5780', '2010-06-09', NULL, NULL),
(81, 'Prof. Floy Will', 'champlin.marguerite@yahoo.com', 'dare.ellen', '301.410.3459', '1994-05-10', NULL, NULL),
(82, 'Layne Cummerata', 'luna.pfeffer@hotmail.com', 'odie21', '1-734-839-0136', '1983-12-18', NULL, NULL),
(83, 'Dr. Noah Dooley MD', 'maximilian.ebert@cruickshank.org', 'molly09', '+16024911151', '2000-05-28', NULL, NULL),
(84, 'Jaylan Bartell', 'kyle.considine@schroeder.com', 'ryder.harvey', '1-224-503-7525', '1989-04-04', NULL, NULL),
(85, 'Jermain McLaughlin', 'abernathy.terrence@baumbach.info', 'brekke.kelli', '920-349-1393', '2019-06-30', NULL, NULL),
(86, 'Mr. Rigoberto O\'Kon Sr.', 'gkuhn@damore.net', 'jaylan.harvey', '+1-843-935-5505', '1998-12-24', NULL, NULL),
(87, 'Felipe Vandervort', 'iwisoky@hotmail.com', 'laurie.bins', '+1.520.252.1084', '1975-02-06', NULL, NULL),
(88, 'Prof. Laverne O\'Hara V', 'luis56@quigley.biz', 'schowalter.dortha', '(432) 363-6105', '1984-08-07', NULL, NULL),
(89, 'Emmitt Herzog I', 'evans03@yahoo.com', 'schultz.burley', '360.386.6702', '1989-05-30', NULL, NULL),
(90, 'Elwin Schuppe', 'leatha.weimann@hotmail.com', 'morton.lebsack', '+1.980.367.7885', '1994-06-18', NULL, NULL),
(91, 'Malachi Denesik', 'bbechtelar@yahoo.com', 'lubowitz.herbert', '248-945-9718', '1995-08-12', NULL, NULL),
(92, 'Terrill Bruen', 'voreilly@haag.com', 'billy.greenfelder', '(747) 771-8665', '1997-01-15', NULL, NULL),
(93, 'Nolan Kris DVM', 'manuel94@crooks.com', 'justen.pouros', '+1.919.781.3858', '2021-07-09', NULL, NULL),
(94, 'Hardy Willms', 'ashlynn.brown@mcdermott.org', 'tyrel76', '773-727-7541', '1998-02-14', NULL, NULL),
(95, 'Mr. Javonte Kozey III', 'montana.windler@gmail.com', 'willms.katrina', '620.970.6416', '2003-11-13', NULL, NULL),
(96, 'Prof. Kelvin Graham III', 'maximo00@gmail.com', 'courtney.murazik', '520-497-3093', '2011-09-20', NULL, NULL),
(97, 'Kennedi Hermiston', 'kuphal.connor@roberts.com', 'nikki.heller', '+1-562-309-3786', '1977-11-09', NULL, NULL),
(98, 'Hans Walker', 'mayert.paolo@fahey.com', 'briana.grant', '+1 (773) 678-8171', '2005-03-09', NULL, NULL),
(99, 'Jerad Grady', 'flossie23@kuvalis.com', 'gertrude66', '828-447-9579', '1999-08-13', NULL, NULL),
(100, 'Marcelino Lemke', 'rosalee97@jones.info', 'verlie01', '773.727.1507', '2009-03-27', NULL, NULL),
(101, 'Arnulfo Hartmann', 'vkihn@hotmail.com', 'reginald.stamm', '1-801-881-8612', '2001-05-28', NULL, NULL),
(102, 'Rupert Hessel PhD', 'howe.king@gmail.com', 'shields.stan', '201-457-0931', '1986-10-08', NULL, NULL),
(103, 'Mr. Hailey Waelchi DVM', 'orlando.hilpert@yahoo.com', 'miles04', '(806) 362-1868', '1992-05-08', NULL, NULL),
(104, 'Lewis Streich', 'mercedes28@gmail.com', 'zebert', '850.932.2529', '2001-01-26', NULL, NULL),
(105, 'Uriel Feest', 'njenkins@yahoo.com', 'fboehm', '410-330-0291', '1984-05-08', NULL, NULL),
(106, 'Dr. Jasper Stoltenberg Jr.', 'jenkins.lavonne@gmail.com', 'dustin.stiedemann', '+1-915-791-4333', '2016-05-31', NULL, NULL),
(107, 'Janick Conn', 'bhessel@kemmer.net', 'ressie.wilderman', '(508) 757-2872', '1996-06-30', NULL, NULL),
(108, 'Kamryn Schultz', 'lucious48@yahoo.com', 'koss.shana', '1-732-362-9860', '1977-12-09', NULL, NULL),
(109, 'Billy Krajcik MD', 'claire.moen@yahoo.com', 'ikirlin', '223.374.6679', '2006-03-08', NULL, NULL),
(110, 'Laverne Pouros', 'natasha63@beatty.info', 'xcorkery', '(978) 332-7775', '1970-07-02', NULL, NULL),
(111, 'Cole Crist PhD', 'allie.gleichner@yahoo.com', 'nat61', '541.924.3075', '1986-04-18', NULL, NULL),
(112, 'Donato Cruickshank II', 'minnie10@gorczany.com', 'fschmitt', '+18307161275', '2010-03-11', NULL, NULL),
(113, 'Darian Hane', 'wfunk@schmeler.net', 'cicero.orn', '+14156955504', '2003-06-03', NULL, NULL),
(114, 'Ole Douglas', 'richie62@hotmail.com', 'ylangworth', '(580) 528-8133', '1990-05-12', NULL, NULL),
(115, 'Deshaun Dietrich', 'angelina28@yahoo.com', 'declan.jenkins', '+1-769-408-1131', '2005-11-25', NULL, NULL),
(116, 'Arturo Jacobs', 'mueller.larry@schinner.com', 'amber.tremblay', '1-386-284-0368', '2006-04-07', NULL, NULL),
(117, 'Kendall Lebsack III', 'gfarrell@bruen.net', 'omayert', '205.726.8969', '2018-10-23', NULL, NULL),
(118, 'Waino O\'Keefe', 'gutkowski.heaven@gmail.com', 'corwin.chelsie', '+1-607-200-6119', '2014-05-26', NULL, NULL),
(119, 'Domenick Monahan', 'elissa.mckenzie@hotmail.com', 'maggio.rodolfo', '(986) 465-9732', '2021-09-20', NULL, NULL),
(120, 'Kelvin McGlynn', 'mckenzie.napoleon@hotmail.com', 'lbahringer', '+1.678.491.5370', '1974-09-03', NULL, NULL),
(121, 'Kenton Pfannerstill', 'kcassin@hotmail.com', 'milford19', '+17756242967', '1973-06-17', NULL, NULL),
(122, 'Laron Lockman III', 'vickie.ratke@gmail.com', 'kbernhard', '339-364-4361', '1972-10-04', NULL, NULL),
(123, 'Forest Daniel', 'hanna96@luettgen.net', 'schuppe.melyssa', '(878) 266-3035', '2009-12-21', NULL, NULL),
(124, 'Jayce Pfeffer', 'kuvalis.trycia@kerluke.com', 'kirsten36', '1-580-419-2900', '2010-05-20', NULL, NULL),
(125, 'Judd Robel', 'litzy.ondricka@yahoo.com', 'dolly25', '(928) 847-1464', '2007-02-12', NULL, NULL),
(126, 'Bud Prosacco', 'larue.lueilwitz@hotmail.com', 'isac.greenholt', '+1.412.437.3140', '1985-04-28', NULL, NULL),
(127, 'Mr. Leo Sawayn', 'uwilkinson@balistreri.net', 'felicita88', '+1-737-531-3771', '2007-05-21', NULL, NULL),
(128, 'Odell Gibson', 'jstreich@gmail.com', 'emory.morissette', '+1-205-733-5742', '1997-10-13', NULL, NULL),
(129, 'Mr. Modesto Ruecker', 'harvey18@gleichner.biz', 'jewel73', '+1.423.813.3791', '1994-12-18', NULL, NULL),
(130, 'Frederic Murazik', 'wconn@yahoo.com', 'martine.king', '+1.845.745.2616', '1995-09-09', NULL, NULL),
(131, 'Juston Moen I', 'kconsidine@hotmail.com', 'richie05', '+1-315-513-0279', '2012-09-03', NULL, NULL),
(132, 'Prof. Glen Spencer', 'iheaney@cummings.com', 'alessia61', '224.591.3676', '1975-07-23', NULL, NULL),
(133, 'Green Cartwright', 'ekirlin@yahoo.com', 'godfrey38', '(409) 748-9164', '2016-02-09', NULL, NULL),
(134, 'Mariano Witting', 'shanahan.rashad@yahoo.com', 'sherman20', '+1-636-555-3370', '1998-02-17', NULL, NULL),
(135, 'Aron Schroeder PhD', 'okeefe.dahlia@cassin.biz', 'dbauch', '+1-217-562-9584', '1996-06-19', NULL, NULL),
(136, 'Hiram Sawayn', 'queen07@gmail.com', 'ewillms', '980.904.9497', '2014-05-30', NULL, NULL),
(137, 'Prof. Rodger Witting', 'fcole@greenfelder.biz', 'kirlin.danika', '215.783.3831', '1997-04-26', NULL, NULL),
(138, 'Mr. Rocky McCullough PhD', 'dubuque.alfred@fay.com', 'marlin12', '+1-470-867-0796', '1989-01-06', NULL, NULL),
(139, 'Maverick Bahringer Jr.', 'claudie61@stoltenberg.com', 'kilback.favian', '(949) 200-3660', '2020-12-18', NULL, NULL),
(140, 'Christophe Lueilwitz', 'urutherford@zemlak.com', 'crooks.vicky', '1-458-314-0094', '1987-01-23', NULL, NULL),
(141, 'Arden Lind', 'czemlak@konopelski.com', 'gschneider', '401.674.1766', '1978-02-25', NULL, NULL),
(142, 'Hobart Eichmann DVM', 'hnikolaus@gmail.com', 'alexandre.kutch', '+1 (253) 885-1256', '2007-01-04', NULL, NULL),
(143, 'Raul Braun', 'loyce99@nolan.info', 'donnelly.horacio', '(828) 574-8202', '1977-03-06', NULL, NULL),
(144, 'Jaime Hettinger', 'julie.hand@yundt.com', 'conn.edgardo', '+17016057945', '2004-10-08', NULL, NULL),
(145, 'Evans Williamson', 'abshire.efrain@davis.info', 'mkoelpin', '423-420-7845', '1996-08-30', NULL, NULL),
(146, 'Gus Goodwin', 'ezra16@hessel.com', 'ypagac', '(469) 721-8806', '2019-04-16', NULL, NULL),
(147, 'Tyshawn Wiegand', 'ritchie.marcelle@gmail.com', 'lbahringer', '+1.629.875.9659', '2005-03-18', NULL, NULL),
(148, 'Durward Dicki', 'stacey.toy@hotmail.com', 'spencer.ethan', '1-339-738-0803', '1998-04-15', NULL, NULL),
(149, 'Roman Zulauf', 'carter.margaretta@jacobs.com', 'kiehn.lee', '+13308129819', '2002-04-27', NULL, NULL),
(150, 'Jairo Rohan', 'nkeeling@padberg.com', 'rosella.schulist', '424-627-2982', '2011-05-19', NULL, NULL),
(151, 'Lonnie Gleason', 'mlind@deckow.com', 'kulas.anika', '828.664.7233', '1970-12-15', NULL, NULL),
(152, 'Virgil Greenfelder', 'reynolds.sonny@yahoo.com', 'lbernier', '904-507-2056', '2008-05-20', NULL, NULL),
(153, 'Tevin Herzog', 'asenger@satterfield.com', 'robert.cruickshank', '1-903-590-0185', '2005-08-24', NULL, NULL),
(154, 'Dr. Trent Adams PhD', 'fred31@erdman.org', 'maia.raynor', '1-520-320-6454', '1998-12-30', NULL, NULL),
(155, 'Bennett Schulist', 'christiansen.melissa@hotmail.com', 'schumm.ludie', '1-907-698-5476', '1997-10-17', NULL, NULL),
(156, 'Declan Hermiston', 'elliot53@hotmail.com', 'legros.terrence', '725-819-7262', '2017-12-23', NULL, NULL),
(157, 'Mr. Alek Pacocha', 'mpacocha@gmail.com', 'glover.jedediah', '+17174340243', '1990-02-08', NULL, NULL),
(158, 'Jimmy Harber', 'king.bradtke@yahoo.com', 'vandervort.mollie', '+18158696621', '2021-01-08', NULL, NULL),
(159, 'Salvatore Littel', 'german.corwin@gmail.com', 'stevie.bartoletti', '(820) 977-2982', '1971-02-01', NULL, NULL),
(160, 'Lane Conn', 'wuckert.wava@yahoo.com', 'mertie.hyatt', '951-790-4999', '1997-10-10', NULL, NULL),
(161, 'Prof. Payton Little PhD', 'zshields@spinka.biz', 'cruickshank.andreane', '(443) 392-6421', '1977-11-14', NULL, NULL),
(162, 'Jerome Dicki', 'ddicki@yahoo.com', 'xfay', '+1 (425) 432-1480', '2003-03-08', NULL, NULL),
(163, 'Salvatore Donnelly', 'jerde.rory@lakin.org', 'moore.bethany', '+1.364.283.5570', '1976-03-01', NULL, NULL),
(164, 'Prof. Quinton Cruickshank DDS', 'jasmin.mckenzie@yahoo.com', 'gutkowski.gaston', '1-765-923-9602', '1977-03-02', NULL, NULL),
(165, 'Augustus Strosin', 'wilfred.hessel@yahoo.com', 'demetris.oberbrunner', '1-520-277-1336', '2004-12-29', NULL, NULL),
(166, 'Prof. Khalid Abernathy V', 'mbuckridge@goldner.com', 'bhirthe', '+1-979-355-0306', '1995-09-22', NULL, NULL),
(167, 'Amparo Rempel DVM', 'leonard39@harris.com', 'katlynn.heller', '815.874.4169', '1984-03-25', NULL, NULL),
(168, 'Zachariah Kovacek', 'leffler.buford@ullrich.net', 'habbott', '+1 (914) 419-2621', '2008-07-15', NULL, NULL),
(169, 'Aric Kassulke', 'jkuhic@gmail.com', 'bailey.anjali', '+1 (838) 542-0825', '1989-02-20', NULL, NULL),
(170, 'Bradly Pouros', 'thalia.abshire@nicolas.com', 'reynolds.rowan', '619.938.7237', '2004-11-12', NULL, NULL),
(171, 'Maximus O\'Connell III', 'loraine47@hotmail.com', 'hauck.amiya', '308-531-6881', '1979-05-27', NULL, NULL),
(172, 'Prof. Lorenza Treutel', 'edgar.schamberger@yahoo.com', 'mertz.hazle', '+1-407-379-8567', '1994-11-05', NULL, NULL),
(173, 'Dr. Zion Skiles', 'joyce.nitzsche@hotmail.com', 'billie.orn', '+1.240.776.7331', '2013-10-07', NULL, NULL),
(174, 'Jules Toy', 'ypagac@shanahan.com', 'lavada.schmidt', '1-630-389-1666', '1999-04-01', NULL, NULL),
(175, 'Dayton Emard DDS', 'sauer.eddie@hotmail.com', 'oharvey', '(319) 834-0741', '2017-10-30', NULL, NULL),
(176, 'Moses Boehm I', 'ahuels@hotmail.com', 'margaretta.jast', '+1.541.673.7155', '1973-06-11', NULL, NULL),
(177, 'Prof. Tristin Kuhlman', 'tmohr@bergstrom.net', 'consuelo63', '+1-620-545-9720', '2019-09-18', NULL, NULL),
(178, 'Cruz Weber', 'nicholaus.gulgowski@gmail.com', 'nicole68', '475.233.4532', '2002-05-28', NULL, NULL),
(179, 'Chesley Wisozk MD', 'asawayn@yahoo.com', 'kayden68', '720.701.6329', '2018-01-08', NULL, NULL),
(180, 'Prof. Doug O\'Connell', 'marks.kyra@walker.com', 'verla10', '561.839.2565', '1986-03-24', NULL, NULL),
(181, 'Bobby Krajcik', 'bhoeger@fisher.com', 'santos.donnelly', '+1 (606) 914-2206', '2013-01-29', NULL, NULL),
(182, 'Prof. Aurelio Leuschke', 'jerel.corwin@hotmail.com', 'considine.carmel', '+1-539-574-3595', '2010-01-13', NULL, NULL),
(183, 'Wilmer Hilpert', 'dianna.price@hill.com', 'roxanne58', '+1-931-236-7937', '1977-04-25', NULL, NULL),
(184, 'Harrison Crooks', 'schuyler98@yahoo.com', 'iortiz', '1-283-452-6508', '1992-09-21', NULL, NULL),
(185, 'Emmett Rolfson', 'fkihn@yahoo.com', 'harvey.gabriella', '707-354-2805', '1985-10-01', NULL, NULL),
(186, 'Myles Keebler', 'berenice.greenholt@yahoo.com', 'yvonne.rodriguez', '+1 (660) 490-8092', '2000-04-21', NULL, NULL),
(187, 'Dane Mraz', 'lily.bins@hotmail.com', 'ernser.annie', '+1-678-891-1686', '1996-06-16', NULL, NULL),
(188, 'Ward Wisoky', 'jaren.thompson@hotmail.com', 'ubaldo.will', '+13364748235', '1992-11-17', NULL, NULL),
(189, 'Julien Haag PhD', 'hauck.keshaun@hotmail.com', 'oreilly.daren', '+1 (626) 219-0922', '2005-10-26', NULL, NULL),
(190, 'Chandler Sauer', 'hcollier@cremin.com', 'ciara.williamson', '973.362.6743', '2015-04-08', NULL, NULL),
(191, 'Abdiel Hirthe Jr.', 'mreilly@gulgowski.info', 'emard.mohammad', '+1-845-390-5384', '2013-05-14', NULL, NULL),
(192, 'Donny Witting IV', 'nkling@hotmail.com', 'murazik.billy', '641-705-9746', '1983-01-20', NULL, NULL),
(193, 'Diego Hyatt', 'yost.gustave@swaniawski.com', 'allan.zieme', '+1 (225) 306-6192', '2003-08-29', NULL, NULL),
(194, 'Prof. Dangelo Stanton V', 'schinner.ova@nikolaus.com', 'fbayer', '814-737-5217', '1989-03-30', NULL, NULL),
(195, 'Adalberto Wehner', 'jesse38@gmail.com', 'tyreek07', '(432) 798-0711', '2006-12-28', NULL, NULL),
(196, 'Prof. Eladio Stiedemann MD', 'jamaal44@schroeder.com', 'wcremin', '1-845-757-3341', '2004-08-02', NULL, NULL),
(197, 'Johnson Pfannerstill', 'trey.dach@jaskolski.com', 'roberts.torey', '478-782-7917', '1987-09-06', NULL, NULL),
(198, 'Emilio Treutel', 'qjacobson@hotmail.com', 'chet.tromp', '215-452-0223', '2014-07-14', NULL, NULL),
(199, 'Adonis Wyman', 'bartoletti.carrie@hotmail.com', 'murray.kianna', '+1-903-829-1017', '1999-01-03', NULL, NULL),
(200, 'Jayson Dietrich', 'kaylie60@jacobs.biz', 'mike50', '+1.206.444.0160', '2000-03-02', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `new_acad_terms`
--

CREATE TABLE `new_acad_terms` (
  `acad_term_id` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `new_acad_terms`
--

INSERT INTO `new_acad_terms` (`acad_term_id`, `year`, `semester`, `created_at`, `updated_at`) VALUES
('212101', '2021-2021', 1, '2021-10-29 00:28:44', '2021-10-29 00:28:44');

-- --------------------------------------------------------

--
-- Table structure for table `new_classes`
--

CREATE TABLE `new_classes` (
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `section` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acad_term_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `curriculum_id` bigint(20) UNSIGNED DEFAULT 2021
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `new_classes`
--

INSERT INTO `new_classes` (`class_id`, `section`, `room`, `acad_term_id`, `course_code`, `instructor_id`, `created_at`, `updated_at`, `curriculum_id`) VALUES
(7, 'A', 'A', '212101', 'COMP11120', 'Em1', NULL, NULL, 2021),
(23, NULL, NULL, '212101', 'a', 'Em1', '2021-11-18 14:39:39', '2021-11-18 14:39:39', 2021),
(24, NULL, NULL, '212101', 'IT101', 'EMP', '2021-11-18 14:44:57', '2021-11-18 14:44:57', 2021),
(25, NULL, NULL, '212101', 'IT102', 'EMP', '2021-11-18 14:46:01', '2021-11-18 14:46:01', 2021),
(26, NULL, NULL, '212101', 'Web101', 'Em1', '2021-11-18 14:47:09', '2021-11-18 14:47:09', 2021),
(27, NULL, NULL, '212101', 'COMP11120', 'EMP', '2021-11-18 14:48:55', '2021-11-18 14:48:55', 2021),
(28, NULL, NULL, '212101', 'COMP11212', 'EMP', '2021-11-18 14:51:49', '2021-11-18 14:51:49', 2021),
(29, NULL, NULL, '212101', 'COMP13212', 'Em1', '2021-11-18 14:52:43', '2021-11-18 14:52:43', 2021),
(30, NULL, NULL, '212101', 'COMP13212', 'Em1', '2021-11-18 15:56:45', '2021-11-18 15:56:45', 2021);

-- --------------------------------------------------------

--
-- Table structure for table `new_courses`
--

CREATE TABLE `new_courses` (
  `course_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ch` tinyint(4) NOT NULL,
  `ects` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `new_courses`
--

INSERT INTO `new_courses` (`course_code`, `description`, `ch`, `ects`, `created_at`, `updated_at`) VALUES
('a', 'a', 3, 5, '2021-11-17 12:59:20', '2021-11-17 12:59:20'),
('COMP11120', 'Mathematical Techniques for Computer Science', 3, 6, '2021-10-29 00:49:40', '2021-10-29 00:49:40'),
('COMP11212', 'Fundamentals of Computation', 3, 5, '2021-10-29 00:50:12', '2021-10-29 00:50:12'),
('COMP13200', 'Fundamental Web Development', 4, 7, '2021-10-29 00:51:24', '2021-10-29 00:51:24'),
('COMP13212', 'Data Science', 4, 7, '2021-10-29 00:50:47', '2021-10-29 00:50:47'),
('COMP13220', 'Software Engineering 2', 4, 7, '2021-10-29 00:52:27', '2021-10-29 00:52:27'),
('COMP23311', 'Software Engineering 1', 4, 7, '2021-10-29 00:51:58', '2021-10-29 00:51:58'),
('IT101', 'Web Programming', 3, 6, '2021-10-26 08:42:50', '2021-10-26 08:42:50'),
('IT102', 'IT102', 3, 6, '2021-10-29 00:45:42', '2021-10-29 00:45:42'),
('MMMP13212', 'Managing Business Operations', 2, 4, '2021-10-29 00:53:01', '2021-10-29 00:53:01'),
('Web101', 'Web Development', 4, 7, '2021-10-29 00:40:58', '2021-10-29 00:40:58');

-- --------------------------------------------------------

--
-- Table structure for table `new_course_creditations`
--

CREATE TABLE `new_course_creditations` (
  `credit_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_no` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `new_course_creditation_details`
--

CREATE TABLE `new_course_creditation_details` (
  `credit_details_id` bigint(20) UNSIGNED NOT NULL,
  `course_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ch` tinyint(4) NOT NULL,
  `ects` tinyint(4) NOT NULL,
  `is_inc` tinyint(1) NOT NULL DEFAULT 0,
  `credit_id` bigint(20) UNSIGNED NOT NULL,
  `curriculum_details_id` bigint(20) DEFAULT NULL,
  `acad_term_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `new_curriculum`
--

CREATE TABLE `new_curriculum` (
  `curriculum_id` bigint(20) UNSIGNED NOT NULL,
  `effective_year` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `new_curriculum`
--

INSERT INTO `new_curriculum` (`curriculum_id`, `effective_year`, `created_at`, `updated_at`, `department_name`) VALUES
(2021, '2021-2025', NULL, NULL, 'Software'),
(2022, '2022-2024', NULL, NULL, 'IT'),
(188878101119, '1888-1892', NULL, NULL, 'New'),
(199999111109112, '1999-2002', NULL, NULL, 'comp');

-- --------------------------------------------------------

--
-- Table structure for table `new_curriculum_details`
--

CREATE TABLE `new_curriculum_details` (
  `curriculum_details_id` bigint(20) UNSIGNED NOT NULL,
  `year` tinyint(4) NOT NULL,
  `semester` tinyint(4) NOT NULL,
  `is_year_active` tinyint(1) DEFAULT NULL,
  `curriculum_id` bigint(20) UNSIGNED NOT NULL,
  `course_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `new_curriculum_details`
--

INSERT INTO `new_curriculum_details` (`curriculum_details_id`, `year`, `semester`, `is_year_active`, `curriculum_id`, `course_code`, `created_at`, `updated_at`) VALUES
(5, 1, 1, NULL, 2021, 'IT101', NULL, NULL),
(6, 1, 2, NULL, 2021, 'Web101', NULL, NULL),
(7, 1, 1, NULL, 2021, 'IT102', NULL, NULL),
(8, 2, 1, NULL, 2021, 'COMP11120', NULL, NULL),
(9, 2, 1, NULL, 2021, 'COMP11212', NULL, NULL),
(10, 2, 2, NULL, 2021, 'COMP13212', NULL, NULL),
(11, 1, 1, NULL, 2022, 'COMP11120', NULL, NULL),
(12, 1, 1, NULL, 2022, 'COMP11212', NULL, NULL),
(13, 2, 1, NULL, 2022, 'COMP13200', NULL, NULL),
(14, 1, 2, NULL, 2022, 'COMP13212', NULL, NULL),
(15, 1, 2, NULL, 2022, 'COMP13220', NULL, NULL),
(20, 1, 1, NULL, 2021, 'a', NULL, NULL),
(21, 2, 1, NULL, 2022, 'IT102', NULL, NULL),
(22, 2, 2, NULL, 2021, 'MMMP13212', NULL, NULL),
(23, 1, 1, NULL, 199999111109112, 'COMP11120', NULL, NULL),
(24, 1, 1, NULL, 188878101119, 'COMP11120', NULL, NULL),
(25, 1, 2, NULL, 188878101119, 'COMP13200', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `new_employees`
--

CREATE TABLE `new_employees` (
  `employee_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_employed` date DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `new_employees`
--

INSERT INTO `new_employees` (`employee_no`, `date_employed`, `user_id`, `created_at`, `updated_at`) VALUES
('Em1', NULL, 10, NULL, NULL),
('EMP', '2021-11-04', 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `new_grades`
--

CREATE TABLE `new_grades` (
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `others` decimal(4,2) DEFAULT NULL,
  `midterms` decimal(4,2) DEFAULT NULL,
  `finals` float(4,2) DEFAULT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `student_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `curriculum_details_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `new_grades`
--

INSERT INTO `new_grades` (`grade_id`, `others`, `midterms`, `finals`, `grade`, `class_id`, `student_no`, `curriculum_details_id`, `created_at`, `updated_at`) VALUES
(11, '20.00', '30.00', 50.00, NULL, 7, 'STU001', 8, NULL, NULL),
(12, '15.50', '12.00', 12.00, NULL, 7, 'STU002', 8, NULL, NULL),
(13, '20.00', '20.00', 50.00, NULL, 7, 'STU005', 8, NULL, NULL),
(15, '10.00', '10.00', 30.00, NULL, 23, 'STU001', 20, NULL, NULL),
(16, '20.00', '20.00', 25.00, NULL, 24, 'STU001', 5, NULL, NULL),
(17, '15.00', '15.00', 40.00, NULL, 25, 'STU001', 7, NULL, NULL),
(18, '16.00', '12.00', 35.00, NULL, 26, 'STU001', 6, NULL, NULL),
(19, '13.00', '11.00', 18.00, NULL, 27, 'STU001', 11, NULL, NULL),
(20, '20.00', '20.00', 20.00, NULL, 28, 'STU001', 9, NULL, NULL),
(21, '14.00', '16.00', 34.00, NULL, 29, 'STU001', 10, NULL, NULL),
(22, '15.00', '15.00', 15.00, NULL, 30, 'STU002', 9, NULL, NULL),
(23, NULL, NULL, NULL, NULL, 27, 'STU002', 8, NULL, NULL),
(24, NULL, NULL, NULL, NULL, 26, 'STU002', 6, NULL, NULL),
(25, NULL, NULL, NULL, NULL, 23, 'STU002', 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `new_students`
--

CREATE TABLE `new_students` (
  `student_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `curriculum_id` bigint(20) UNSIGNED NOT NULL,
  `acad_term_admitted_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `new_students`
--

INSERT INTO `new_students` (`student_no`, `student_type`, `curriculum_id`, `acad_term_admitted_id`, `user_id`, `created_at`, `updated_at`) VALUES
('ST007', '1', 2022, '212101', 7, NULL, NULL),
('STU001', '1', 2021, '212101', 2, NULL, NULL),
('STU002', '1', 2021, '212101', 3, NULL, NULL),
('STU004', '1', 2021, '212101', 4, NULL, NULL),
('STU005', '1', 2021, '212101', 5, NULL, NULL),
('STU009', '1', 2021, '212101', 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'manage user', 'web', '2021-11-12 00:44:54', '2021-11-12 00:44:54'),
(2, 'manage grade', 'web', '2021-11-12 00:45:39', '2021-11-12 00:45:39'),
(3, 'manage class', 'web', '2021-11-12 00:45:49', '2021-11-12 00:45:49'),
(4, 'manage students', 'web', '2021-11-12 00:46:29', '2021-11-12 00:46:29'),
(5, 'manage employee', 'web', '2021-11-12 00:46:35', '2021-11-12 00:46:35');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'student', 'web', '2021-11-11 12:04:37', '2021-11-11 12:04:37'),
(2, 'instartor', 'web', '2021-11-11 12:04:55', '2021-11-11 12:04:55'),
(3, 'admin', 'web', '2021-11-11 12:05:01', '2021-11-11 12:05:01'),
(4, 'registrar', 'web', '2021-11-11 12:05:20', '2021-11-11 12:05:20'),
(5, 'user', 'web', '2021-11-11 12:05:42', '2021-11-11 12:05:42'),
(6, 'Super-Admin', 'web', '2021-11-12 01:11:24', '2021-11-12 01:11:24');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(2, 2),
(2, 3),
(3, 3),
(3, 4),
(4, 1),
(4, 3),
(4, 4),
(5, 3),
(5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` int(11) NOT NULL,
  `semester` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `year`, `semester`) VALUES
(1, 2019, 1),
(2, 2020, 2),
(3, 2019, 2),
(4, 2020, 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `full_name`, `sex`, `email`, `address`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'STU1', 1, 'stu@dent.one', 'addis', NULL, NULL, 1),
(2, 'STU2', 2, 'stu@dent.two', 'addis', NULL, NULL, 2),
(3, 'STU3', 1, 'stu@dent.three', 'STU3', '2021-09-29 09:15:26', '2021-09-29 09:15:26', 3),
(6, 'STU3', 1, 'stu@dent.three', 'addis', NULL, NULL, 4),
(7, 'STU1', 1, 'stu@dent.one', 'addis', NULL, NULL, 6),
(8, 'user2', 1, 'user2@user2.user2', 'user2', NULL, NULL, 5),
(9, 'as', 1, 'as', 'as', NULL, NULL, 7),
(10, 'Abraham Sisay', 1, 'user@user.user', 'kzdjh', '2021-11-02 09:24:26', '2021-11-02 09:24:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_user`
--

CREATE TABLE `student_user` (
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Abraham', 'abrahamsisaysis@gmail.com', NULL, '$2y$10$f8MRSpj/1t6Q2jwuVy7YluHQpA.KEg/B5eGzgPHw1PNbixTN6HG66', NULL, '2021-09-30 05:23:19', '2021-09-30 05:23:19'),
(2, 'user', 'user@user.user', NULL, '$2y$10$m89lzt81ktzj.o/U55KKKOXx8ftPwO5rZXYXYE/r5FqlfVEaiUcnO', NULL, '2021-10-03 05:48:43', '2021-10-03 05:48:43'),
(3, 'student1', 'student1@student1.student1', NULL, '$2y$10$mwslHD2W1x92fIJ9DYcoq.9nE8ETkZyvlTDHsAiVHhbi83MuXgltq', NULL, '2021-10-29 01:17:15', '2021-10-29 01:17:15'),
(4, 'user2', 'user2@user2.user2', NULL, '$2y$10$nJGfrp29anUXAQmnF8dKVuOXkswx5hd3caHricaPaGcZlhRkxMGMm', NULL, '2021-11-11 03:27:54', '2021-11-11 03:27:54'),
(5, 'user3', 'user3@user3.user3', NULL, '$2y$10$i5RaninSwivx5SKGGUTzoeNLmnvmaIx/J7oOq3N9/GGbXcjbJle.W', NULL, '2021-11-11 03:28:20', '2021-11-11 03:28:20'),
(6, 'user4', 'user4@user4.user4', NULL, '$2y$10$87kb.onnDhC35.l6sUaOousj5vFnY.oZa.sboc7AwFgZ9eb74P2Mq', NULL, '2021-11-11 03:28:52', '2021-11-11 03:28:52'),
(7, 'student7', 'student7@student7.student7', NULL, '$2y$10$f9VeeZGYXbOfEaonKHLHnuqFECwanulA7P6VNv0xqGoLXV2ie8xcW', NULL, '2021-11-12 02:28:38', '2021-11-12 02:28:38'),
(8, 'admin', 'admin@admin.admin', NULL, '$2y$10$29UUGzBP3VyFlQRg15eLh.ym452REk2fEkeSFdTrjA8bXhLpw2u2G', NULL, '2021-11-12 02:29:08', '2021-11-12 02:29:08'),
(9, 'registrar', 'registrar@registrar.registrar', NULL, '$2y$10$EPFRZcbuAYxyTAZTrq.dMONARyLLXH5AmES1TM4xFYbs6u88huBoG', NULL, '2021-11-12 02:29:38', '2021-11-12 02:29:38'),
(10, 'instractor', 'instractor@instractor.instractor', NULL, '$2y$10$o/wfZESlBdlu5yEEdA/1w.ncrCt3A.UTuKDy7J9QMwkQSpDqMRT32', NULL, '2021-11-12 02:30:07', '2021-11-12 02:30:07'),
(11, 'Ababa', 'abab@ababa.com', NULL, '$2y$10$seVYCvd6k06kDBz3dLglMeWRHO6JJI/pwC/dPqCViaBm7zdR.lRF6', NULL, '2021-11-17 12:50:06', '2021-11-17 12:50:06'),
(12, 'ayele', 'ayele@ayele.com', NULL, '$2y$10$5mvGdxm8KhRhKewAfle6QOIFI8Am3AyM0KAEbUBbKb8gqYklFvjvq', NULL, '2021-11-17 13:37:25', '2021-11-17 13:37:25'),
(13, 'ayeleayele', 'ayeleayele@ayeleayele.com', NULL, '$2y$10$mn89SIxZ/5f6eRkbCEUZ1.lHJ/ADktFApgLcLCQyEGpwe9J1ySe..', NULL, '2021-11-17 13:38:47', '2021-11-17 13:38:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_student_id_foreign` (`student_id`),
  ADD KEY `courses_semester_id_foreign` (`semester_id`),
  ADD KEY `courses_grade_id_foreign` (`grade_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instractors`
--
ALTER TABLE `instractors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `newnewstudents`
--
ALTER TABLE `newnewstudents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newnewstudents_email_unique` (`email`);

--
-- Indexes for table `new_acad_terms`
--
ALTER TABLE `new_acad_terms`
  ADD PRIMARY KEY (`acad_term_id`);

--
-- Indexes for table `new_classes`
--
ALTER TABLE `new_classes`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `new_classes_acad_term_id_foreign` (`acad_term_id`),
  ADD KEY `new_classes_course_code_foreign` (`course_code`),
  ADD KEY `new_classes_instructor_id_foreign` (`instructor_id`);

--
-- Indexes for table `new_courses`
--
ALTER TABLE `new_courses`
  ADD PRIMARY KEY (`course_code`);

--
-- Indexes for table `new_course_creditations`
--
ALTER TABLE `new_course_creditations`
  ADD PRIMARY KEY (`credit_id`),
  ADD KEY `new_course_creditations_student_no_foreign` (`student_no`);

--
-- Indexes for table `new_course_creditation_details`
--
ALTER TABLE `new_course_creditation_details`
  ADD PRIMARY KEY (`credit_details_id`),
  ADD KEY `new_course_creditation_details_credit_id_foreign` (`credit_id`),
  ADD KEY `new_course_creditation_details_acad_term_id_foreign` (`acad_term_id`);

--
-- Indexes for table `new_curriculum`
--
ALTER TABLE `new_curriculum`
  ADD PRIMARY KEY (`curriculum_id`);

--
-- Indexes for table `new_curriculum_details`
--
ALTER TABLE `new_curriculum_details`
  ADD PRIMARY KEY (`curriculum_details_id`),
  ADD KEY `new_curriculum_details_curriculum_id_foreign` (`curriculum_id`),
  ADD KEY `new_curriculum_details_course_code_foreign` (`course_code`);

--
-- Indexes for table `new_employees`
--
ALTER TABLE `new_employees`
  ADD PRIMARY KEY (`employee_no`),
  ADD KEY `new_employees_user_id_foreign` (`user_id`);

--
-- Indexes for table `new_grades`
--
ALTER TABLE `new_grades`
  ADD PRIMARY KEY (`grade_id`),
  ADD KEY `new_grades_class_id_foreign` (`class_id`),
  ADD KEY `new_grades_student_no_foreign` (`student_no`),
  ADD KEY `new_grades_curriculum_details_id_foreign` (`curriculum_details_id`);

--
-- Indexes for table `new_students`
--
ALTER TABLE `new_students`
  ADD PRIMARY KEY (`student_no`),
  ADD KEY `new_students_curriculum_id_foreign` (`curriculum_id`),
  ADD KEY `new_students_acad_term_admitted_id_foreign` (`acad_term_admitted_id`),
  ADD KEY `new_students_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_user_id_foreign` (`user_id`);

--
-- Indexes for table `student_user`
--
ALTER TABLE `student_user`
  ADD KEY `student_user_student_id_foreign` (`student_id`),
  ADD KEY `student_user_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `instractors`
--
ALTER TABLE `instractors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `newnewstudents`
--
ALTER TABLE `newnewstudents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `new_classes`
--
ALTER TABLE `new_classes`
  MODIFY `class_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `new_course_creditations`
--
ALTER TABLE `new_course_creditations`
  MODIFY `credit_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `new_course_creditation_details`
--
ALTER TABLE `new_course_creditation_details`
  MODIFY `credit_details_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `new_curriculum`
--
ALTER TABLE `new_curriculum`
  MODIFY `curriculum_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=831111021161192223;

--
-- AUTO_INCREMENT for table `new_curriculum_details`
--
ALTER TABLE `new_curriculum_details`
  MODIFY `curriculum_details_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `new_grades`
--
ALTER TABLE `new_grades`
  MODIFY `grade_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`),
  ADD CONSTRAINT `courses_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`),
  ADD CONSTRAINT `courses_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `new_classes`
--
ALTER TABLE `new_classes`
  ADD CONSTRAINT `new_classes_acad_term_id_foreign` FOREIGN KEY (`acad_term_id`) REFERENCES `new_acad_terms` (`acad_term_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `new_classes_course_code_foreign` FOREIGN KEY (`course_code`) REFERENCES `new_courses` (`course_code`) ON DELETE CASCADE,
  ADD CONSTRAINT `new_classes_instructor_id_foreign` FOREIGN KEY (`instructor_id`) REFERENCES `new_employees` (`employee_no`) ON DELETE CASCADE;

--
-- Constraints for table `new_course_creditations`
--
ALTER TABLE `new_course_creditations`
  ADD CONSTRAINT `new_course_creditations_student_no_foreign` FOREIGN KEY (`student_no`) REFERENCES `new_students` (`student_no`) ON DELETE CASCADE;

--
-- Constraints for table `new_course_creditation_details`
--
ALTER TABLE `new_course_creditation_details`
  ADD CONSTRAINT `new_course_creditation_details_acad_term_id_foreign` FOREIGN KEY (`acad_term_id`) REFERENCES `new_acad_terms` (`acad_term_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `new_course_creditation_details_credit_id_foreign` FOREIGN KEY (`credit_id`) REFERENCES `new_course_creditations` (`credit_id`) ON DELETE CASCADE;

--
-- Constraints for table `new_curriculum_details`
--
ALTER TABLE `new_curriculum_details`
  ADD CONSTRAINT `new_curriculum_details_course_code_foreign` FOREIGN KEY (`course_code`) REFERENCES `new_courses` (`course_code`) ON DELETE CASCADE,
  ADD CONSTRAINT `new_curriculum_details_curriculum_id_foreign` FOREIGN KEY (`curriculum_id`) REFERENCES `new_curriculum` (`curriculum_id`) ON DELETE CASCADE;

--
-- Constraints for table `new_employees`
--
ALTER TABLE `new_employees`
  ADD CONSTRAINT `new_employees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `new_grades`
--
ALTER TABLE `new_grades`
  ADD CONSTRAINT `new_grades_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `new_classes` (`class_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `new_grades_curriculum_details_id_foreign` FOREIGN KEY (`curriculum_details_id`) REFERENCES `new_curriculum_details` (`curriculum_details_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `new_grades_student_no_foreign` FOREIGN KEY (`student_no`) REFERENCES `new_students` (`student_no`) ON DELETE CASCADE;

--
-- Constraints for table `new_students`
--
ALTER TABLE `new_students`
  ADD CONSTRAINT `new_students_acad_term_admitted_id_foreign` FOREIGN KEY (`acad_term_admitted_id`) REFERENCES `new_acad_terms` (`acad_term_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `new_students_curriculum_id_foreign` FOREIGN KEY (`curriculum_id`) REFERENCES `new_curriculum` (`curriculum_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `new_students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_user`
--
ALTER TABLE `student_user`
  ADD CONSTRAINT `student_user_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `student_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
