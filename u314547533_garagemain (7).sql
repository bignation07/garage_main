-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 19, 2025 at 06:04 AM
-- Server version: 10.11.10-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u314547533_garagemain`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `check_in_time` time DEFAULT NULL,
  `check_out_time` time DEFAULT NULL,
  `total_working_hours` int(11) DEFAULT NULL,
  `breaks_taken` varchar(255) DEFAULT NULL,
  `leave_status` enum('Present','Absent','Half-day') NOT NULL DEFAULT 'Present',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `employee_name`, `employee_id`, `date`, `check_in_time`, `check_out_time`, `total_working_hours`, `breaks_taken`, `leave_status`, `created_at`, `updated_at`) VALUES
(11, 'Vishal', '4', '2025-03-21', '16:24:00', '17:24:00', 45, '53', 'Half-day', '2025-03-21 06:54:36', '2025-03-21 06:54:36'),
(12, 'Vishal', '4', '2025-03-21', '12:28:00', '13:28:00', 2, '232', 'Present', '2025-03-21 06:58:35', '2025-03-21 06:58:35'),
(13, 'Vishal', '4', '2025-03-23', '12:33:00', '13:33:00', 1, '11', 'Present', '2025-03-21 07:03:28', '2025-03-21 07:03:28'),
(14, 'rohan singh', '2', '2025-03-29', '23:35:00', '12:35:00', 1, '11', 'Present', '2025-03-21 07:05:21', '2025-03-21 07:05:21'),
(15, 'rohan singh', '2', '2025-03-19', '16:15:00', '22:18:00', 4, 'd378483', 'Present', '2025-03-21 10:42:16', '2025-03-21 10:42:16'),
(16, 'rohan singh', '2', '2025-03-27', '22:37:00', '18:37:00', 45, 'd378483', 'Half-day', '2025-03-26 10:12:19', '2025-03-26 10:12:19'),
(17, 'rohan singh', '2', '2025-03-26', '22:49:00', '18:49:00', 8, 'd3784832', 'Present', '2025-03-26 11:20:27', '2025-03-26 11:20:27'),
(18, 'Vishal', '4', '2025-03-26', '22:09:00', '06:44:00', 8, 'd37848366', 'Present', '2025-03-26 12:10:49', '2025-03-26 12:10:49'),
(19, 'rohan singh', '2', '2025-02-01', '10:47:00', '18:53:00', 8, 'd378483', 'Present', '2025-03-27 07:18:14', '2025-03-27 07:18:14'),
(20, 'rohan singh', '2', '2025-03-02', '09:48:00', '18:54:00', 8, '34sfjalksdf3fdf', 'Present', '2025-03-27 07:18:56', '2025-03-27 07:18:56'),
(21, 'rohan singh', '2', '2025-03-03', '10:49:00', '20:49:00', 8, 'd3784832', 'Present', '2025-03-27 07:19:31', '2025-03-27 07:19:31'),
(22, 'rohan singh', '2', '2025-03-31', '10:49:00', '18:55:00', 8, 'd37848366', 'Present', '2025-03-27 07:20:08', '2025-03-27 07:20:08'),
(23, 'rohan singh', '2', '2025-02-27', '10:56:00', '18:56:00', 8, '4554', 'Present', '2025-03-27 07:27:19', '2025-03-27 07:27:19'),
(24, 'rohan singh', '2', '2025-02-28', '09:58:00', '18:58:00', 8, 'd37848322', 'Present', '2025-03-27 07:28:38', '2025-03-27 07:28:38'),
(25, 'rohan singh', '2', '2025-02-27', '10:00:00', '19:00:00', 8, 'd378483', 'Present', '2025-03-27 07:29:40', '2025-03-27 07:29:40'),
(26, 'rohan singh', '2', '2025-02-05', '22:16:00', '19:16:00', 8, 'd37848366', 'Present', '2025-03-27 07:46:47', '2025-03-27 07:46:47'),
(27, 'rohan singh', '2', '2025-02-06', '10:17:00', '19:17:00', 8, '34sfjalksdf', 'Present', '2025-03-27 07:47:44', '2025-03-27 07:47:44'),
(28, 'rohan singh', '2', '2025-02-07', '10:17:00', '19:18:00', 8, '34sfjalksdf', 'Present', '2025-03-27 07:48:22', '2025-03-27 07:48:22'),
(29, 'rohan singh', '2', '2025-02-08', '10:18:00', '19:18:00', 8, 'd37848322', 'Present', '2025-03-27 07:49:07', '2025-03-27 07:49:07'),
(30, 'rohan singh', '2', '2025-02-09', '10:19:00', '19:19:00', 8, 'd37848366', 'Present', '2025-03-27 07:49:51', '2025-03-27 07:49:51'),
(31, 'rohan singh', '2', '2025-02-10', '10:10:00', '19:00:00', 8, '34sfjalksdf3fdf', 'Present', '2025-03-27 07:51:06', '2025-03-27 07:51:06'),
(32, 'rohan singh', '2', '2025-02-11', '10:10:00', '19:10:00', 8, 'fsjkl', 'Present', '2025-03-27 07:51:46', '2025-03-27 07:51:46'),
(33, 'rohan singh', '2', '2025-03-27', '10:00:00', '19:00:00', 8, '345232', 'Present', '2025-03-27 09:29:29', '2025-03-27 09:29:29'),
(34, 'rohan singh', '2', '2025-02-15', '10:01:00', '19:01:00', 8, 'd37848322', 'Present', '2025-03-27 09:31:43', '2025-03-27 09:31:43'),
(35, 'rohan singh', '2', '2025-02-27', '10:04:00', '19:04:00', 8, 'd378483662', 'Present', '2025-03-27 09:34:36', '2025-03-27 09:34:36'),
(36, 'rohan singh', '2', '2025-02-16', '10:05:00', '19:05:00', 8, '28882', 'Present', '2025-03-27 09:36:14', '2025-03-27 09:36:14'),
(37, 'rohan singh', '2', '2025-02-20', '10:19:00', '19:10:00', 5, 'd378483', 'Half-day', '2025-03-28 10:08:56', '2025-03-28 10:08:56'),
(38, 'rohan singh', '2', '2025-02-16', '10:07:00', '19:08:00', 8, 'd37848322', 'Present', '2025-03-28 10:38:47', '2025-03-28 10:38:47'),
(39, 'Ankit Singh Rajput', '5', '2025-04-02', '10:27:00', '19:27:00', 8, 'd37848322', 'Present', '2025-04-02 11:58:07', '2025-04-02 11:58:07');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_vinayrajput7812@gmail.com|2405:201:300b:79ad:fc92:760c:5730:384c', 'i:1;', 1743754243),
('laravel_cache_vinayrajput7812@gmail.com|2405:201:300b:79ad:fc92:760c:5730:384c:timer', 'i:1743754243;', 1743754243);

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
-- Table structure for table `customer_complaints`
--

CREATE TABLE `customer_complaints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_checkin_id` bigint(20) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `complaint_type` varchar(255) NOT NULL,
  `previous_repairs_done` tinyint(1) NOT NULL,
  `urgency_level` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_complaints`
--

INSERT INTO `customer_complaints` (`id`, `vehicle_checkin_id`, `description`, `complaint_type`, `previous_repairs_done`, `urgency_level`, `created_at`, `updated_at`) VALUES
(1, 14, 'sfsaasdf', 'Mechanical', 1, 'High', '2025-03-22 11:49:32', '2025-03-22 11:49:32'),
(2, 14, 'sdgrf', 'Mechanical', 1, 'High', '2025-03-22 11:49:32', '2025-03-22 11:49:32'),
(3, 15, 'demo423', 'Electrical', 0, 'Low', '2025-03-22 11:50:04', '2025-03-31 07:45:17'),
(4, 15, 'all done', 'Performance', 1, 'Medium', '2025-03-22 11:50:04', '2025-03-22 11:50:04'),
(5, 13, 'sssss', 'Electrical', 1, 'High', '2025-03-22 11:53:03', '2025-03-22 11:53:03'),
(6, 13, 'sdfsf', 'Mechanical', 1, 'High', '2025-03-22 11:53:03', '2025-03-22 11:53:03'),
(7, 13, 'sdfsdfsfsdf', 'Mechanical', 1, 'High', '2025-03-22 11:53:03', '2025-03-22 11:53:03'),
(8, 17, 'ergf', 'Mechanical', 1, 'High', '2025-03-28 07:06:46', '2025-03-28 07:06:46'),
(9, 17, 'fa', 'Mechanical', 1, 'High', '2025-03-28 07:06:46', '2025-03-28 07:06:46'),
(12, 17, 'wrt', 'Mechanical', 1, 'High', '2025-03-28 07:07:14', '2025-03-28 07:07:14'),
(13, 15, 'demo123', 'Mechanical', 1, 'High', '2025-03-28 07:46:41', '2025-03-31 07:45:04'),
(14, 23, 'demo23', 'Body', 1, 'Medium', '2025-03-28 07:46:52', '2025-03-31 07:44:38'),
(15, 23, 'demo12', 'Mechanical', 1, 'High', '2025-03-28 08:02:27', '2025-03-31 07:44:48'),
(17, 25, 'sakjf', 'Mechanical', 1, 'High', '2025-03-31 12:06:00', '2025-03-31 12:06:00'),
(18, 25, 'ajskf', 'Mechanical', 1, 'High', '2025-03-31 12:06:00', '2025-03-31 12:06:00'),
(19, 25, 'ajldksf', 'Mechanical', 1, 'High', '2025-03-31 12:06:00', '2025-03-31 12:06:00'),
(20, 36, 'Ac not working', 'Mechanical', 1, 'High', '2025-04-07 07:37:54', '2025-04-07 07:37:54'),
(21, 39, 'washing', 'Body', 0, 'High', '2025-04-08 10:02:17', '2025-04-08 10:02:17'),
(22, 39, 'hfffyuyf', 'Mechanical', 0, 'High', '2025-04-08 10:02:17', '2025-04-08 10:02:17'),
(23, 43, 'Steering voice problem', 'Mechanical', 0, 'Medium', '2025-04-10 05:57:08', '2025-04-10 05:57:08'),
(24, 44, 'Rear bumper fitting', 'Mechanical', 0, 'High', '2025-04-10 07:45:42', '2025-04-10 07:45:42'),
(25, 45, 'GENRAL SERVIECE', 'Mechanical', 1, 'High', '2025-04-12 08:52:05', '2025-04-12 08:52:05'),
(26, 46, 'Suspension work', 'Mechanical', 1, 'High', '2025-04-14 06:09:56', '2025-04-14 06:09:56'),
(27, 49, 'Front glass change', 'Mechanical', 1, 'High', '2025-04-15 06:24:40', '2025-04-15 06:24:40'),
(28, 50, 'Engine repair', 'Mechanical', 1, 'High', '2025-04-16 06:42:44', '2025-04-16 06:42:44'),
(29, 51, 'Polish', 'Body', 1, 'High', '2025-04-16 06:57:45', '2025-04-16 06:57:45'),
(30, 52, 'Accident', 'Mechanical', 1, 'High', '2025-04-17 06:38:28', '2025-04-17 06:38:28');

-- --------------------------------------------------------

--
-- Table structure for table `drawback_lists`
--

CREATE TABLE `drawback_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_checkin_id` bigint(20) UNSIGNED NOT NULL,
  `issue_name` varchar(255) NOT NULL,
  `issue_severity` enum('Minor','Major','Critical') NOT NULL,
  `additional_repairs` text DEFAULT NULL,
  `mechanic_notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drawback_lists`
--

INSERT INTO `drawback_lists` (`id`, `vehicle_checkin_id`, `issue_name`, `issue_severity`, `additional_repairs`, `mechanic_notes`, `created_at`, `updated_at`) VALUES
(4, 13, 'vivek', 'Critical', 'vinay rajput', 'vinay rajput', '2025-03-20 07:26:33', '2025-03-31 07:29:01'),
(5, 23, 'alld one', 'Critical', 'sdkhfaksf', 'asfdoj', '2025-03-31 07:06:43', '2025-03-31 07:06:43');

-- --------------------------------------------------------

--
-- Table structure for table `drawback_parts`
--

CREATE TABLE `drawback_parts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `drawback_list_id` bigint(20) UNSIGNED NOT NULL,
  `issue_name` varchar(255) NOT NULL,
  `spare_part_needed` varchar(255) NOT NULL,
  `part_number` varchar(255) DEFAULT NULL,
  `estimated_cost` decimal(10,2) DEFAULT NULL,
  `parts_availability` enum('In Stock','Ordered','Not Available') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drawback_parts`
--

INSERT INTO `drawback_parts` (`id`, `drawback_list_id`, `issue_name`, `spare_part_needed`, `part_number`, `estimated_cost`, `parts_availability`, `created_at`, `updated_at`) VALUES
(3, 4, 'demo22', 'demodon', '5000', 4000.00, 'Ordered', '2025-03-20 07:26:53', '2025-03-31 07:39:20'),
(4, 4, 'vivek', 'demo11', '34343', 5000.00, 'Ordered', '2025-03-21 11:35:52', '2025-03-21 11:35:52');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `salary`, `created_at`, `updated_at`) VALUES
(1, 4, 25000.00, '2025-03-26 13:02:07', '2025-03-26 13:02:07'),
(4, 2, 34000.00, '2025-03-27 07:20:59', '2025-03-27 07:20:59'),
(5, 5, 160000.00, '2025-04-02 12:23:03', '2025-04-02 12:24:03');

-- --------------------------------------------------------

--
-- Table structure for table `estimated_inspections`
--

CREATE TABLE `estimated_inspections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_checkin_id` bigint(20) UNSIGNED NOT NULL,
  `inspection_report` text NOT NULL,
  `issues_identified` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`issues_identified`)),
  `parts_required` text NOT NULL,
  `estimated_cost` decimal(10,2) NOT NULL,
  `approval_status` enum('Pending','Approved','Rejected') NOT NULL DEFAULT 'Pending',
  `customer_approval_method` enum('WhatsApp','Call','Email') NOT NULL,
  `approval_date_time` datetime DEFAULT NULL,
  `customer_signature` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `estimated_inspections`
--

INSERT INTO `estimated_inspections` (`id`, `vehicle_checkin_id`, `inspection_report`, `issues_identified`, `parts_required`, `estimated_cost`, `approval_status`, `customer_approval_method`, `approval_date_time`, `customer_signature`, `created_at`, `updated_at`) VALUES
(3, 13, 'gsdfg', '\"[\\\"Electrical\\\"]\"', '2342wqqr', 44000.00, 'Approved', 'WhatsApp', '2025-03-20 12:34:00', 'signatures/WAsmugrLZlsgpvixxRZWy0j2KDcIWdVq9o0n8TxP.jpg', '2025-03-20 07:04:35', '2025-03-20 07:04:35'),
(4, 13, 'sdfjkah', '\"[\\\"Engine\\\",\\\"Brakes\\\",\\\"Suspension\\\",\\\"Electrical\\\"]\"', '34ljsasdf', 5000.00, 'Rejected', 'WhatsApp', '2025-03-21 13:27:00', 'signatures/s8Udp4N3Dj4yqqnJgZc62pssbeaciMU4B8nViU1t.png', '2025-03-20 07:57:15', '2025-03-20 07:57:15'),
(5, 15, 'Vehicle has dent on the bonnet, and scratches on the right side of the door and has some electrical issues in the self start', '\"[\\\"Engine\\\",\\\"Brakes\\\",\\\"Suspension\\\",\\\"Electrical\\\",\\\"AC\\\"]\"', '1. Paint , 2. handel ,3 denting painting kit', 35000.00, 'Pending', 'WhatsApp', '2025-03-20 15:34:00', 'signatures/DAF1KsG26VsX8shmOllr64Ca56UOJ6L45TMhAUXK.jpg', '2025-03-20 10:04:39', '2025-03-20 10:04:39');

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
-- Table structure for table `final_bills`
--

CREATE TABLE `final_bills` (
  `id` int(11) NOT NULL,
  `vehicle_checkin_id` int(11) NOT NULL,
  `job_card_id` int(11) DEFAULT NULL,
  `customer_name` varchar(255) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `vehicle_registration_number` varchar(50) NOT NULL,
  `service_details` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `final_bills`
--

INSERT INTO `final_bills` (`id`, `vehicle_checkin_id`, `job_card_id`, `customer_name`, `contact_number`, `vehicle_registration_number`, `service_details`, `created_at`, `updated_at`) VALUES
(21, 36, NULL, 'Mr kv ravi', '8349147625', 'Mp09wk0916', 'Ac work demo', '2025-04-07 10:35:29', '2025-04-07 12:32:17'),
(22, 34, NULL, 'Atul', '9425022242', 'Mp28ca3048', 'Suspension  work', '2025-04-07 12:03:49', '2025-04-07 13:02:07'),
(28, 49, NULL, 'Mr. Methew', '8962532649', 'Mp09cn6640', 'Front glass change', '2025-04-16 06:12:16', '2025-04-16 06:12:16'),
(36, 42, NULL, 'Mr. Babu mathew', '9826904868', 'Mp09cg9975', 'Steering repair', '2025-04-16 08:43:53', '2025-04-16 08:43:53'),
(37, 28, NULL, 'Manoj Tiwari', '8200454542', 'Jp09cy2740', 'Caliper pin repair', '2025-04-16 09:42:38', '2025-04-16 09:42:38'),
(39, 48, NULL, 'Shailendra Singh', '7879434443', 'Mp37c1497', 'Full service', '2025-04-19 05:01:16', '2025-04-19 05:01:16');

-- --------------------------------------------------------

--
-- Table structure for table `inspections`
--

CREATE TABLE `inspections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_checkin_id` bigint(20) UNSIGNED NOT NULL,
  `inspection_item` varchar(255) NOT NULL,
  `check` tinyint(1) DEFAULT 0,
  `deficiencies` text DEFAULT NULL,
  `services_performed` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inspections`
--

INSERT INTO `inspections` (`id`, `vehicle_checkin_id`, `inspection_item`, `check`, `deficiencies`, `services_performed`, `created_at`, `updated_at`) VALUES
(301, 34, 'WINDSHIELD WIPERS', 0, 'Water topup', '10', '2025-04-05 07:34:10', '2025-04-05 07:34:10'),
(302, 34, 'MIRRORS', 0, 'Outer cover', '300', '2025-04-05 07:34:10', '2025-04-05 07:34:10'),
(304, 34, 'EMERGENCY BRAKE', 1, 'Repair required', '200', '2025-04-05 07:34:10', '2025-04-05 07:34:10'),
(305, 34, 'BRAKES', 0, '', '', '2025-04-05 07:34:10', '2025-04-05 07:34:10'),
(306, 34, 'HORN', 0, '', '', '2025-04-05 07:34:10', '2025-04-05 07:34:10'),
(307, 34, 'STEERING & ALIGNMENT', 0, 'Alignment required', '350', '2025-04-05 07:34:10', '2025-04-05 07:34:10'),
(308, 34, 'ENGINE OIL LEVEL', 0, '', '', '2025-04-05 07:34:10', '2025-04-05 07:34:10'),
(309, 34, 'AIR CLEANER', 0, '', '', '2025-04-05 07:34:10', '2025-04-05 07:34:10'),
(310, 34, 'ALL GLASS', 0, '', '', '2025-04-05 07:34:10', '2025-04-05 07:34:10'),
(311, 34, 'AIR CONDITIONER', 0, '', '', '2025-04-05 07:34:10', '2025-04-05 07:34:10'),
(312, 34, 'GENERAL ENGINE OPERATION', 0, '', '', '2025-04-05 07:34:10', '2025-04-05 07:34:10'),
(313, 34, 'COOLING SYSTEM', 0, '', '', '2025-04-05 07:34:10', '2025-04-05 07:34:10'),
(314, 34, 'FIRE & TIRE PRESSURE', 0, '', '', '2025-04-05 07:34:10', '2025-04-05 07:34:10'),
(315, 34, 'BELTS', 1, 'Alterneterbelt', '1100', '2025-04-05 07:34:10', '2025-04-05 07:34:10'),
(316, 34, 'STARTB & IGNITION', 0, '', '', '2025-04-05 07:34:10', '2025-04-05 07:34:10'),
(317, 34, 'ALTERNATOR OUTPUT', 0, '', '', '2025-04-05 07:34:10', '2025-04-05 07:34:10'),
(318, 34, 'FUEL SYSTEM', 0, '', '', '2025-04-05 07:34:10', '2025-04-05 07:34:10'),
(319, 34, 'TRANSMISSION OIL LEVEL', 1, 'Gear oil', '790', '2025-04-05 07:34:10', '2025-04-05 07:34:10'),
(320, 34, 'BRAKE LIGHTS', 1, 'Right side not wor', '120', '2025-04-05 07:34:10', '2025-04-05 07:34:10'),
(321, 34, 'TURN SIGNALS', 0, '', '', '2025-04-05 07:34:10', '2025-04-05 07:34:10'),
(322, 34, 'HEAD LIGHTS', 1, 'Right not working and bothparking bulb', '350', '2025-04-05 07:34:10', '2025-04-05 07:34:10'),
(323, 34, 'BATTERY OPERATION & LEVELS', 0, '', '', '2025-04-05 07:34:10', '2025-04-05 07:34:10'),
(324, 34, 'EXHAUST SYSTEM', 0, '', '', '2025-04-05 07:34:10', '2025-04-05 07:34:10'),
(325, 34, 'REFLECTORS', 0, '', '', '2025-04-05 07:34:10', '2025-04-05 07:34:10'),
(501, 26, 'WINDSHIELD WIPERS', 0, 'wetg', '565', '2025-04-05 09:57:43', '2025-04-05 09:57:43'),
(502, 26, 'MIRRORS', 0, 'gh', '456', '2025-04-05 09:57:43', '2025-04-05 09:57:43'),
(503, 26, 'INSTRUMENTS OPERATION', 0, '', '', '2025-04-05 09:57:43', '2025-04-05 09:57:43'),
(504, 26, 'EMERGENCY BRAKE', 0, '', '', '2025-04-05 09:57:43', '2025-04-05 09:57:43'),
(505, 26, 'BRAKES', 0, '', '', '2025-04-05 09:57:43', '2025-04-05 09:57:43'),
(506, 26, 'HORN', 0, '', '', '2025-04-05 09:57:43', '2025-04-05 09:57:43'),
(507, 26, 'STEERING & ALIGNMENT', 0, '', '', '2025-04-05 09:57:43', '2025-04-05 09:57:43'),
(508, 26, 'ENGINE OIL LEVEL', 0, '', '', '2025-04-05 09:57:43', '2025-04-05 09:57:43'),
(509, 26, 'AIR CLEANER', 0, '', '', '2025-04-05 09:57:43', '2025-04-05 09:57:43'),
(510, 26, 'ALL GLASS', 0, '', '', '2025-04-05 09:57:43', '2025-04-05 09:57:43'),
(511, 26, 'AIR CONDITIONER', 0, '', '', '2025-04-05 09:57:43', '2025-04-05 09:57:43'),
(512, 26, 'GENERAL ENGINE OPERATION', 0, '', '', '2025-04-05 09:57:43', '2025-04-05 09:57:43'),
(513, 26, 'COOLING SYSTEM', 0, '', '', '2025-04-05 09:57:43', '2025-04-05 09:57:43'),
(514, 26, 'FIRE & TIRE PRESSURE', 0, '', '', '2025-04-05 09:57:43', '2025-04-05 09:57:43'),
(515, 26, 'BELTS', 0, '', '', '2025-04-05 09:57:43', '2025-04-05 09:57:43'),
(516, 26, 'STARTB & IGNITION', 0, '', '', '2025-04-05 09:57:43', '2025-04-05 09:57:43'),
(517, 26, 'ALTERNATOR OUTPUT', 0, '', '', '2025-04-05 09:57:43', '2025-04-05 09:57:43'),
(518, 26, 'FUEL SYSTEM', 0, '', '', '2025-04-05 09:57:43', '2025-04-05 09:57:43'),
(519, 26, 'SUSPENSION SYSTEM', 0, '', '', '2025-04-05 09:57:43', '2025-04-05 09:57:43'),
(520, 26, 'TRANSMISSION OIL LEVEL', 0, '', '', '2025-04-05 09:57:43', '2025-04-05 09:57:43'),
(521, 26, 'BRAKE LIGHTS', 0, '', '', '2025-04-05 09:57:43', '2025-04-05 09:57:43'),
(522, 26, 'TURN SIGNALS', 0, '', '', '2025-04-05 09:57:43', '2025-04-05 09:57:43'),
(523, 26, 'HEAD LIGHTS', 0, '', '', '2025-04-05 09:57:43', '2025-04-05 09:57:43'),
(524, 26, 'BATTERY OPERATION & LEVELS', 0, '', '', '2025-04-05 09:57:43', '2025-04-05 09:57:43'),
(525, 26, 'EXHAUST SYSTEM', 0, '', '', '2025-04-05 09:57:43', '2025-04-05 09:57:43'),
(526, 26, 'REFLECTORS', 0, '', '', '2025-04-05 09:57:43', '2025-04-05 09:57:43'),
(527, 26, 'SCRATCHES & DENTS', 0, '', '', '2025-04-05 09:57:43', '2025-04-05 09:57:43'),
(528, 26, 'OTHER (MotorPool)', 0, '', '', '2025-04-05 09:57:43', '2025-04-05 09:57:43'),
(529, 26, 'Labor Charge', 1, 'hs', '5636', '2025-04-05 09:57:43', '2025-04-05 09:57:43'),
(530, 26, 'demos', 0, 'dgx', '345', '2025-04-05 09:57:43', '2025-04-05 09:57:43'),
(531, 26, 'dgs', 0, 'dsg', '545', '2025-04-05 09:57:43', '2025-04-05 09:57:43'),
(532, 33, 'WINDSHIELD WIPERS', 0, 'hello', '540', '2025-04-05 10:04:22', '2025-04-05 10:04:22'),
(533, 33, 'INSTRUMENTS OPERATION', 0, 'jfsdl', '343', '2025-04-05 10:04:22', '2025-04-05 10:04:22'),
(534, 33, 'HORN', 1, 'fjlas', '343', '2025-04-05 10:04:22', '2025-04-05 10:04:22'),
(535, 33, 'Labor Charge', 0, 'afjlk', '484', '2025-04-05 10:04:22', '2025-04-05 10:04:22'),
(536, 33, 'demos', 0, 'sdjlf', '4343', '2025-04-05 10:04:22', '2025-04-05 10:04:22'),
(537, 33, 'dgs', 0, 'asg', '600', '2025-04-05 10:04:22', '2025-04-05 10:04:22'),
(538, 35, 'WINDSHIELD WIPERS', 1, '', '', '2025-04-05 11:08:29', '2025-04-05 11:08:29'),
(539, 35, 'SCRATCHES & DENTS', 0, 'shkj', '3663', '2025-04-05 11:08:29', '2025-04-05 11:08:29'),
(540, 35, 'OTHER (MotorPool)', 0, 'dfjkjfd', '4563', '2025-04-05 11:08:29', '2025-04-05 11:08:29'),
(541, 35, 'fdsfa', 0, 'hkd', '8773', '2025-04-05 11:08:29', '2025-04-05 11:08:29'),
(542, 36, 'WINDSHIELD WIPERS', 0, '', '', '2025-04-07 07:44:47', '2025-04-07 07:44:47'),
(543, 36, 'MIRRORS', 0, '', '', '2025-04-07 07:44:47', '2025-04-07 07:44:47'),
(544, 36, 'INSTRUMENTS OPERATION', 0, '', '', '2025-04-07 07:44:47', '2025-04-07 07:44:47'),
(545, 36, 'EMERGENCY BRAKE', 0, '', '', '2025-04-07 07:44:47', '2025-04-07 07:44:47'),
(546, 36, 'BRAKES', 0, '', '', '2025-04-07 07:44:47', '2025-04-07 07:44:47'),
(547, 36, 'HORN', 0, '', '', '2025-04-07 07:44:47', '2025-04-07 07:44:47'),
(548, 36, 'STEERING & ALIGNMENT', 0, '', '', '2025-04-07 07:44:47', '2025-04-07 07:44:47'),
(549, 36, 'ENGINE OIL LEVEL', 0, '', '', '2025-04-07 07:44:47', '2025-04-07 07:44:47'),
(550, 36, 'AIR CLEANER', 0, '', '', '2025-04-07 07:44:47', '2025-04-07 07:44:47'),
(551, 36, 'ALL GLASS', 0, '', '', '2025-04-07 07:44:47', '2025-04-07 07:44:47'),
(552, 36, 'AIR CONDITIONER', 1, 'Ac gase leakages', '', '2025-04-07 07:44:47', '2025-04-07 07:44:47'),
(553, 36, 'GENERAL ENGINE OPERATION', 0, '', '', '2025-04-07 07:44:47', '2025-04-07 07:44:47'),
(554, 36, 'COOLING SYSTEM', 0, '', '', '2025-04-07 07:44:47', '2025-04-07 07:44:47'),
(555, 36, 'FIRE & TIRE PRESSURE', 0, '', '', '2025-04-07 07:44:47', '2025-04-07 07:44:47'),
(556, 36, 'BELTS', 0, '', '', '2025-04-07 07:44:47', '2025-04-07 07:44:47'),
(557, 36, 'STARTB & IGNITION', 0, '', '', '2025-04-07 07:44:47', '2025-04-07 07:44:47'),
(558, 36, 'ALTERNATOR OUTPUT', 0, '', '', '2025-04-07 07:44:47', '2025-04-07 07:44:47'),
(559, 36, 'FUEL SYSTEM', 0, '', '', '2025-04-07 07:44:47', '2025-04-07 07:44:47'),
(560, 36, 'SUSPENSION SYSTEM', 0, '', '', '2025-04-07 07:44:47', '2025-04-07 07:44:47'),
(561, 36, 'TRANSMISSION OIL LEVEL', 0, '', '', '2025-04-07 07:44:47', '2025-04-07 07:44:47'),
(562, 36, 'BRAKE LIGHTS', 0, '', '', '2025-04-07 07:44:47', '2025-04-07 07:44:47'),
(563, 36, 'TURN SIGNALS', 0, '', '', '2025-04-07 07:44:47', '2025-04-07 07:44:47'),
(564, 36, 'HEAD LIGHTS', 0, '', '', '2025-04-07 07:44:47', '2025-04-07 07:44:47'),
(565, 36, 'BATTERY OPERATION & LEVELS', 0, '', '', '2025-04-07 07:44:47', '2025-04-07 07:44:47'),
(566, 36, 'EXHAUST SYSTEM', 0, '', '', '2025-04-07 07:44:47', '2025-04-07 07:44:47'),
(567, 36, 'REFLECTORS', 0, '', '', '2025-04-07 07:44:47', '2025-04-07 07:44:47'),
(568, 36, 'SCRATCHES & DENTS', 0, '', '', '2025-04-07 07:44:47', '2025-04-07 07:44:47'),
(569, 36, 'OTHER (MotorPool)', 0, '', '', '2025-04-07 07:44:47', '2025-04-07 07:44:47'),
(570, 36, 'Labor Charge', 0, '', '', '2025-04-07 07:44:47', '2025-04-07 07:44:47'),
(571, 36, 'Washing', 1, '', '350', '2025-04-07 07:44:47', '2025-04-07 07:44:47'),
(572, 39, 'WINDSHIELD WIPERS', 1, '', '888', '2025-04-08 10:11:21', '2025-04-08 10:11:21'),
(573, 39, 'MIRRORS', 0, 'damage', '2442', '2025-04-08 10:11:21', '2025-04-08 10:11:21'),
(574, 39, 'EMERGENCY BRAKE', 0, '', '', '2025-04-08 10:11:21', '2025-04-08 10:11:21'),
(575, 39, 'BRAKES', 0, 'repair', '', '2025-04-08 10:11:21', '2025-04-08 10:11:21'),
(576, 39, 'BRAKE LIGHTS', 0, 'hbhsd', '223', '2025-04-08 10:11:21', '2025-04-08 10:11:21'),
(577, 39, 'EXHAUST SYSTEM', 1, '', '33', '2025-04-08 10:11:21', '2025-04-08 10:11:21'),
(578, 39, 'SCRATCHES & DENTS', 1, '', '3232', '2025-04-08 10:11:21', '2025-04-08 10:11:21'),
(579, 39, 'OTHER (MotorPool)', 1, '', '54', '2025-04-08 10:11:21', '2025-04-08 10:11:21'),
(580, 39, 'Labor Charge', 1, '', '7499', '2025-04-08 10:11:21', '2025-04-08 10:11:21'),
(581, 43, 'WINDSHIELD WIPERS', 1, 'Wiper change', '400', '2025-04-10 06:32:24', '2025-04-10 06:32:24'),
(582, 43, 'MIRRORS', 0, '', '', '2025-04-10 06:32:24', '2025-04-10 06:32:24'),
(583, 43, 'INSTRUMENTS OPERATION', 0, '', '', '2025-04-10 06:32:24', '2025-04-10 06:32:24'),
(584, 43, 'EMERGENCY BRAKE', 0, '', '', '2025-04-10 06:32:24', '2025-04-10 06:32:24'),
(585, 43, 'BRAKES', 0, '', '', '2025-04-10 06:32:24', '2025-04-10 06:32:24'),
(586, 43, 'HORN', 0, '', '', '2025-04-10 06:32:24', '2025-04-10 06:32:24'),
(587, 43, 'STEERING & ALIGNMENT', 1, 'Steering change noice problem', '2500', '2025-04-10 06:32:24', '2025-04-10 06:32:24'),
(588, 43, 'ENGINE OIL LEVEL', 1, 'Change', '1575', '2025-04-10 06:32:24', '2025-04-10 06:32:24'),
(590, 43, 'ALL GLASS', 0, '', '', '2025-04-10 06:32:24', '2025-04-10 06:32:24'),
(591, 43, 'AIR CONDITIONER', 0, '', '', '2025-04-10 06:32:24', '2025-04-10 06:32:24'),
(592, 43, 'GENERAL ENGINE OPERATION', 0, '', '', '2025-04-10 06:32:24', '2025-04-10 06:32:24'),
(593, 43, 'COOLING SYSTEM', 1, 'Change', '370', '2025-04-10 06:32:24', '2025-04-10 06:32:24'),
(594, 43, 'FIRE & TIRE PRESSURE', 0, '', '', '2025-04-10 06:32:24', '2025-04-10 06:32:24'),
(595, 43, 'BELTS', 0, '', '', '2025-04-10 06:32:24', '2025-04-10 06:32:24'),
(596, 43, 'STARTB & IGNITION', 0, '', '', '2025-04-10 06:32:24', '2025-04-10 06:32:24'),
(597, 43, 'ALTERNATOR OUTPUT', 0, '', '', '2025-04-10 06:32:24', '2025-04-10 06:32:24'),
(598, 43, 'FUEL SYSTEM', 0, '', '', '2025-04-10 06:32:24', '2025-04-10 06:32:24'),
(599, 43, 'SUSPENSION SYSTEM', 0, '', '', '2025-04-10 06:32:24', '2025-04-10 06:32:24'),
(600, 43, 'TRANSMISSION OIL LEVEL', 1, 'Gear oil ,axel oil change ,axel repair', '3500', '2025-04-10 06:32:24', '2025-04-10 06:32:24'),
(601, 43, 'BRAKE LIGHTS', 1, 'Right side', '100', '2025-04-10 06:32:24', '2025-04-10 06:32:24'),
(602, 43, 'TURN SIGNALS', 0, '', '', '2025-04-10 06:32:24', '2025-04-10 06:32:24'),
(603, 43, 'HEAD LIGHTS', 0, '', '', '2025-04-10 06:32:24', '2025-04-10 06:32:24'),
(604, 43, 'BATTERY OPERATION & LEVELS', 0, '', '', '2025-04-10 06:32:24', '2025-04-10 06:32:24'),
(605, 43, 'EXHAUST SYSTEM', 0, '', '', '2025-04-10 06:32:24', '2025-04-10 06:32:24'),
(606, 43, 'REFLECTORS', 0, '', '', '2025-04-10 06:32:24', '2025-04-10 06:32:24'),
(607, 43, 'SCRATCHES & DENTS', 0, '', '', '2025-04-10 06:32:24', '2025-04-10 06:32:24'),
(608, 43, 'Labor Charge', 1, '', '2500', '2025-04-10 06:32:24', '2025-04-10 06:32:24'),
(609, 44, 'WINDSHIELD WIPERS', 0, '', '', '2025-04-10 08:17:52', '2025-04-10 08:17:52'),
(610, 44, 'MIRRORS', 0, '', '', '2025-04-10 08:17:52', '2025-04-10 08:17:52'),
(611, 44, 'INSTRUMENTS OPERATION', 0, '', '', '2025-04-10 08:17:52', '2025-04-10 08:17:52'),
(612, 44, 'EMERGENCY BRAKE', 0, '', '', '2025-04-10 08:17:52', '2025-04-10 08:17:52'),
(613, 44, 'BRAKES', 0, '', '', '2025-04-10 08:17:52', '2025-04-10 08:17:52'),
(614, 44, 'HORN', 0, '', '', '2025-04-10 08:17:52', '2025-04-10 08:17:52'),
(615, 44, 'STEERING & ALIGNMENT', 0, '', '', '2025-04-10 08:17:52', '2025-04-10 08:17:52'),
(616, 44, 'ENGINE OIL LEVEL', 1, 'Oil filter change \r\nEngine oil', '250\r\n2250', '2025-04-10 08:17:52', '2025-04-10 08:17:52'),
(617, 44, 'AIR CLEANER', 1, 'Air filter change', '449', '2025-04-10 08:17:52', '2025-04-10 08:17:52'),
(618, 44, 'ALL GLASS', 0, '', '', '2025-04-10 08:17:52', '2025-04-10 08:17:52'),
(619, 44, 'AIR CONDITIONER', 0, '', '', '2025-04-10 08:17:52', '2025-04-10 08:17:52'),
(620, 44, 'GENERAL ENGINE OPERATION', 0, '', '', '2025-04-10 08:17:52', '2025-04-10 08:17:52'),
(621, 44, 'COOLING SYSTEM', 1, 'Ac filter', '318', '2025-04-10 08:17:52', '2025-04-10 08:17:52'),
(622, 44, 'FIRE & TIRE PRESSURE', 0, '', '', '2025-04-10 08:17:52', '2025-04-10 08:17:52'),
(623, 44, 'BELTS', 0, '', '', '2025-04-10 08:17:52', '2025-04-10 08:17:52'),
(624, 44, 'STARTB & IGNITION', 0, '', '', '2025-04-10 08:17:52', '2025-04-10 08:17:52'),
(625, 44, 'ALTERNATOR OUTPUT', 0, '', '', '2025-04-10 08:17:52', '2025-04-10 08:17:52'),
(626, 44, 'FUEL SYSTEM', 0, '', '', '2025-04-10 08:17:52', '2025-04-10 08:17:52'),
(627, 44, 'SUSPENSION SYSTEM', 1, 'ShockAbsorber\r\nShock mount', '5000+2400', '2025-04-10 08:17:52', '2025-04-10 08:17:52'),
(628, 44, 'TRANSMISSION OIL LEVEL', 0, '', '', '2025-04-10 08:17:52', '2025-04-10 08:17:52'),
(629, 44, 'BRAKE LIGHTS', 0, '', '', '2025-04-10 08:17:52', '2025-04-10 08:17:52'),
(630, 44, 'TURN SIGNALS', 0, '', '', '2025-04-10 08:17:52', '2025-04-10 08:17:52'),
(631, 44, 'HEAD LIGHTS', 0, '', '', '2025-04-10 08:17:52', '2025-04-10 08:17:52'),
(632, 44, 'BATTERY OPERATION & LEVELS', 0, '', '', '2025-04-10 08:17:52', '2025-04-10 08:17:52'),
(633, 44, 'EXHAUST SYSTEM', 0, '', '', '2025-04-10 08:17:52', '2025-04-10 08:17:52'),
(634, 44, 'REFLECTORS', 0, '', '', '2025-04-10 08:17:52', '2025-04-10 08:17:52'),
(635, 44, 'SCRATCHES & DENTS', 0, '', '', '2025-04-10 08:17:52', '2025-04-10 08:17:52'),
(636, 44, 'OTHER (MotorPool)', 1, 'Rear bumper fitting', '', '2025-04-10 08:17:52', '2025-04-10 08:17:52'),
(637, 44, 'Labor Charge', 1, '', '2500', '2025-04-10 08:17:52', '2025-04-10 08:17:52'),
(665, 45, 'WINDSHIELD WIPERS', 0, 'CHANGE WIPER BLADE', '400', '2025-04-12 09:34:08', '2025-04-12 09:34:08'),
(666, 45, 'MIRRORS', 0, 'LH MIRROR NOT WORKING', '1500', '2025-04-12 09:34:08', '2025-04-12 09:34:08'),
(667, 45, 'INSTRUMENTS OPERATION', 1, '', '', '2025-04-12 09:34:08', '2025-04-12 09:34:08'),
(668, 45, 'EMERGENCY BRAKE', 1, '', '', '2025-04-12 09:34:08', '2025-04-12 09:34:08'),
(669, 45, 'BRAKES', 1, '', '', '2025-04-12 09:34:08', '2025-04-12 09:34:08'),
(670, 45, 'HORN', 1, '', '', '2025-04-12 09:34:08', '2025-04-12 09:34:08'),
(671, 45, 'STEERING & ALIGNMENT', 0, 'STEERING RACK', '2500', '2025-04-12 09:34:08', '2025-04-12 09:34:08'),
(672, 45, 'AIR CLEANER', 0, 'AIR FILTER', '210', '2025-04-12 09:34:08', '2025-04-12 09:34:08'),
(673, 45, 'ALL GLASS', 0, 'GLASS CHANGER', '1920', '2025-04-12 09:34:08', '2025-04-12 09:34:08'),
(674, 45, 'AIR CONDITIONER', 0, 'AC FILTER', '475', '2025-04-12 09:34:08', '2025-04-12 09:34:08'),
(675, 45, 'GENERAL ENGINE OPERATION', 1, '', '', '2025-04-12 09:34:08', '2025-04-12 09:34:08'),
(676, 45, 'COOLING SYSTEM', 1, '', '', '2025-04-12 09:34:08', '2025-04-12 09:34:08'),
(677, 45, 'FIRE & TIRE PRESSURE', 1, '', '', '2025-04-12 09:34:08', '2025-04-12 09:34:08'),
(678, 45, 'BELTS', 1, '', '', '2025-04-12 09:34:08', '2025-04-12 09:34:08'),
(679, 45, 'STARTB & IGNITION', 1, '', '', '2025-04-12 09:34:08', '2025-04-12 09:34:08'),
(680, 45, 'ALTERNATOR OUTPUT', 1, '', '', '2025-04-12 09:34:08', '2025-04-12 09:34:08'),
(681, 45, 'FUEL SYSTEM', 1, '', '', '2025-04-12 09:34:08', '2025-04-12 09:34:08'),
(682, 45, 'SUSPENSION SYSTEM', 0, 'ARAM BHUCH KIT\r\nLINKAGE\r\nBALANCE ROAD\r\nSHOCUP REAR', '6000', '2025-04-12 09:34:08', '2025-04-12 09:34:08'),
(683, 45, 'TRANSMISSION OIL LEVEL', 1, '', '', '2025-04-12 09:34:08', '2025-04-12 09:34:08'),
(684, 45, 'BRAKE LIGHTS', 1, '', '', '2025-04-12 09:34:08', '2025-04-12 09:34:08'),
(685, 45, 'TURN SIGNALS', 1, '', '', '2025-04-12 09:34:08', '2025-04-12 09:34:08'),
(686, 45, 'HEAD LIGHTS', 0, 'HADLIGHT NOT WORK RH', '300', '2025-04-12 09:34:08', '2025-04-12 09:34:08'),
(687, 45, 'BATTERY OPERATION & LEVELS', 0, 'FOGLAMP', '300', '2025-04-12 09:34:08', '2025-04-12 09:34:08'),
(688, 45, 'EXHAUST SYSTEM', 1, '', '', '2025-04-12 09:34:08', '2025-04-12 09:34:08'),
(689, 45, 'REFLECTORS', 1, '', '', '2025-04-12 09:34:08', '2025-04-12 09:34:08'),
(690, 45, 'Labor Charge', 0, '', '3500', '2025-04-12 09:34:08', '2025-04-12 09:34:08'),
(691, 46, 'WINDSHIELD WIPERS', 1, '', '', '2025-04-14 06:15:31', '2025-04-14 06:15:31'),
(692, 46, 'MIRRORS', 1, '', '', '2025-04-14 06:15:31', '2025-04-14 06:15:31'),
(693, 46, 'INSTRUMENTS OPERATION', 1, '', '', '2025-04-14 06:15:31', '2025-04-14 06:15:31'),
(694, 46, 'EMERGENCY BRAKE', 1, '', '', '2025-04-14 06:15:31', '2025-04-14 06:15:31'),
(695, 46, 'BRAKES', 1, '', '', '2025-04-14 06:15:31', '2025-04-14 06:15:31'),
(696, 46, 'HORN', 0, 'Horn change', '500', '2025-04-14 06:15:31', '2025-04-14 06:15:31'),
(697, 46, 'STEERING & ALIGNMENT', 1, '', '', '2025-04-14 06:15:31', '2025-04-14 06:15:31'),
(698, 46, 'ENGINE OIL LEVEL', 1, '', '', '2025-04-14 06:15:31', '2025-04-14 06:15:31'),
(699, 46, 'AIR CLEANER', 1, '', '', '2025-04-14 06:15:31', '2025-04-14 06:15:31'),
(700, 46, 'ALL GLASS', 1, '', '', '2025-04-14 06:15:31', '2025-04-14 06:15:31'),
(701, 46, 'AIR CONDITIONER', 1, '', '', '2025-04-14 06:15:31', '2025-04-14 06:15:31'),
(702, 46, 'GENERAL ENGINE OPERATION', 1, '', '', '2025-04-14 06:15:31', '2025-04-14 06:15:31'),
(703, 46, 'COOLING SYSTEM', 1, '', '', '2025-04-14 06:15:31', '2025-04-14 06:15:31'),
(704, 46, 'FIRE & TIRE PRESSURE', 1, '', '', '2025-04-14 06:15:31', '2025-04-14 06:15:31'),
(705, 46, 'BELTS', 1, '', '', '2025-04-14 06:15:31', '2025-04-14 06:15:31'),
(706, 46, 'STARTB & IGNITION', 1, '', '', '2025-04-14 06:15:31', '2025-04-14 06:15:31'),
(707, 46, 'ALTERNATOR OUTPUT', 1, '', '', '2025-04-14 06:15:31', '2025-04-14 06:15:31'),
(708, 46, 'FUEL SYSTEM', 1, '', '', '2025-04-14 06:15:31', '2025-04-14 06:15:31'),
(709, 46, 'SUSPENSION SYSTEM', 0, 'Shockup change, caliper pin', '6600', '2025-04-14 06:15:31', '2025-04-14 06:15:31'),
(710, 46, 'TRANSMISSION OIL LEVEL', 1, '', '', '2025-04-14 06:15:31', '2025-04-14 06:15:31'),
(711, 46, 'BRAKE LIGHTS', 1, '', '', '2025-04-14 06:15:31', '2025-04-14 06:15:31'),
(712, 46, 'TURN SIGNALS', 1, '', '', '2025-04-14 06:15:31', '2025-04-14 06:15:31'),
(713, 46, 'HEAD LIGHTS', 1, '', '', '2025-04-14 06:15:31', '2025-04-14 06:15:31'),
(714, 46, 'BATTERY OPERATION & LEVELS', 1, '', '', '2025-04-14 06:15:31', '2025-04-14 06:15:31'),
(715, 46, 'EXHAUST SYSTEM', 1, '', '', '2025-04-14 06:15:31', '2025-04-14 06:15:31'),
(716, 46, 'REFLECTORS', 1, '', '', '2025-04-14 06:15:31', '2025-04-14 06:15:31'),
(717, 46, 'SCRATCHES & DENTS', 1, '', '', '2025-04-14 06:15:31', '2025-04-14 06:15:31'),
(718, 46, 'OTHER (MotorPool)', 1, '', '', '2025-04-14 06:15:31', '2025-04-14 06:15:31'),
(719, 46, 'Labor Charge', 1, '', '1500', '2025-04-14 06:15:31', '2025-04-14 06:15:31'),
(778, 49, 'WINDSHIELD WIPERS', 1, '', '', '2025-04-15 07:01:13', '2025-04-15 07:01:13'),
(779, 49, 'MIRRORS', 1, '', '', '2025-04-15 07:01:13', '2025-04-15 07:01:13'),
(780, 49, 'INSTRUMENTS OPERATION', 1, '', '', '2025-04-15 07:01:13', '2025-04-15 07:01:13'),
(781, 49, 'EMERGENCY BRAKE', 1, '', '', '2025-04-15 07:01:13', '2025-04-15 07:01:13'),
(782, 49, 'BRAKES', 1, '', '', '2025-04-15 07:01:13', '2025-04-15 07:01:13'),
(783, 49, 'HORN', 1, '', '', '2025-04-15 07:01:13', '2025-04-15 07:01:13'),
(784, 49, 'STEERING & ALIGNMENT', 0, 'Alignment', '300', '2025-04-15 07:01:13', '2025-04-15 07:01:13'),
(785, 49, 'ENGINE OIL LEVEL', 1, '', '', '2025-04-15 07:01:13', '2025-04-15 07:01:13'),
(786, 49, 'AIR CLEANER', 1, '', '', '2025-04-15 07:01:13', '2025-04-15 07:01:13'),
(787, 49, 'ALL GLASS', 0, 'Front glass change', '6600', '2025-04-15 07:01:13', '2025-04-15 07:01:13'),
(788, 49, 'AIR CONDITIONER', 1, '', '', '2025-04-15 07:01:13', '2025-04-15 07:01:13'),
(789, 49, 'GENERAL ENGINE OPERATION', 1, '', '', '2025-04-15 07:01:13', '2025-04-15 07:01:13'),
(790, 49, 'COOLING SYSTEM', 1, '', '', '2025-04-15 07:01:13', '2025-04-15 07:01:13'),
(791, 49, 'FIRE & TIRE PRESSURE', 1, '', '', '2025-04-15 07:01:13', '2025-04-15 07:01:13'),
(792, 49, 'BELTS', 0, '', '', '2025-04-15 07:01:13', '2025-04-15 07:01:13'),
(793, 49, 'STARTB & IGNITION', 1, '', '', '2025-04-15 07:01:13', '2025-04-15 07:01:13'),
(794, 49, 'ALTERNATOR OUTPUT', 1, '', '', '2025-04-15 07:01:13', '2025-04-15 07:01:13'),
(795, 49, 'FUEL SYSTEM', 1, '', '', '2025-04-15 07:01:13', '2025-04-15 07:01:13'),
(796, 49, 'SUSPENSION SYSTEM', 0, 'Shockup mount \r\nShocup', '5600', '2025-04-15 07:01:13', '2025-04-15 07:01:13'),
(797, 49, 'TRANSMISSION OIL LEVEL', 1, '', '', '2025-04-15 07:01:13', '2025-04-15 07:01:13'),
(798, 49, 'BRAKE LIGHTS', 1, '', '', '2025-04-15 07:01:13', '2025-04-15 07:01:13'),
(799, 49, 'TURN SIGNALS', 1, '', '', '2025-04-15 07:01:13', '2025-04-15 07:01:13'),
(800, 49, 'HEAD LIGHTS', 1, '', '', '2025-04-15 07:01:13', '2025-04-15 07:01:13'),
(801, 49, 'BATTERY OPERATION & LEVELS', 1, '', '', '2025-04-15 07:01:13', '2025-04-15 07:01:13'),
(802, 49, 'EXHAUST SYSTEM', 1, '', '', '2025-04-15 07:01:13', '2025-04-15 07:01:13'),
(803, 49, 'REFLECTORS', 1, '', '', '2025-04-15 07:01:13', '2025-04-15 07:01:13'),
(804, 49, 'SCRATCHES & DENTS', 0, 'Dent and pent', '2500', '2025-04-15 07:01:13', '2025-04-15 07:01:13'),
(805, 49, 'OTHER (MotorPool)', 1, '', '', '2025-04-15 07:01:13', '2025-04-15 07:01:13'),
(806, 49, 'Labor Charge', 0, '', '1500', '2025-04-15 07:01:13', '2025-04-15 07:01:13'),
(807, 51, 'WINDSHIELD WIPERS', 0, '', '', '2025-04-16 06:59:13', '2025-04-16 06:59:13'),
(808, 51, 'MIRRORS', 0, '', '', '2025-04-16 06:59:13', '2025-04-16 06:59:13'),
(809, 51, 'INSTRUMENTS OPERATION', 0, '', '', '2025-04-16 06:59:13', '2025-04-16 06:59:13'),
(810, 51, 'EMERGENCY BRAKE', 0, '', '', '2025-04-16 06:59:13', '2025-04-16 06:59:13'),
(811, 51, 'BRAKES', 0, '', '', '2025-04-16 06:59:13', '2025-04-16 06:59:13'),
(812, 51, 'HORN', 0, '', '', '2025-04-16 06:59:13', '2025-04-16 06:59:13'),
(813, 51, 'STEERING & ALIGNMENT', 0, '', '', '2025-04-16 06:59:13', '2025-04-16 06:59:13'),
(814, 51, 'ENGINE OIL LEVEL', 0, '', '', '2025-04-16 06:59:13', '2025-04-16 06:59:13'),
(815, 51, 'AIR CLEANER', 0, '', '', '2025-04-16 06:59:13', '2025-04-16 06:59:13'),
(816, 51, 'ALL GLASS', 0, '', '', '2025-04-16 06:59:13', '2025-04-16 06:59:13'),
(817, 51, 'AIR CONDITIONER', 0, '', '', '2025-04-16 06:59:13', '2025-04-16 06:59:13'),
(818, 51, 'GENERAL ENGINE OPERATION', 0, '', '', '2025-04-16 06:59:13', '2025-04-16 06:59:13'),
(819, 51, 'COOLING SYSTEM', 0, '', '', '2025-04-16 06:59:13', '2025-04-16 06:59:13'),
(820, 51, 'FIRE & TIRE PRESSURE', 0, '', '', '2025-04-16 06:59:13', '2025-04-16 06:59:13'),
(821, 51, 'BELTS', 0, '', '', '2025-04-16 06:59:13', '2025-04-16 06:59:13'),
(822, 51, 'STARTB & IGNITION', 0, '', '', '2025-04-16 06:59:13', '2025-04-16 06:59:13'),
(823, 51, 'ALTERNATOR OUTPUT', 0, '', '', '2025-04-16 06:59:13', '2025-04-16 06:59:13'),
(824, 51, 'FUEL SYSTEM', 0, '', '', '2025-04-16 06:59:13', '2025-04-16 06:59:13'),
(825, 51, 'SUSPENSION SYSTEM', 0, '', '', '2025-04-16 06:59:13', '2025-04-16 06:59:13'),
(826, 51, 'TRANSMISSION OIL LEVEL', 0, '', '', '2025-04-16 06:59:13', '2025-04-16 06:59:13'),
(827, 51, 'BRAKE LIGHTS', 0, '', '', '2025-04-16 06:59:13', '2025-04-16 06:59:13'),
(828, 51, 'TURN SIGNALS', 0, '', '', '2025-04-16 06:59:13', '2025-04-16 06:59:13'),
(829, 51, 'HEAD LIGHTS', 0, '', '', '2025-04-16 06:59:13', '2025-04-16 06:59:13'),
(830, 51, 'BATTERY OPERATION & LEVELS', 0, '', '', '2025-04-16 06:59:13', '2025-04-16 06:59:13'),
(831, 51, 'EXHAUST SYSTEM', 0, '', '', '2025-04-16 06:59:13', '2025-04-16 06:59:13'),
(832, 51, 'REFLECTORS', 0, '', '', '2025-04-16 06:59:13', '2025-04-16 06:59:13'),
(833, 51, 'SCRATCHES & DENTS', 0, '', '', '2025-04-16 06:59:13', '2025-04-16 06:59:13'),
(834, 51, 'OTHER (MotorPool)', 1, 'Polish', '1500', '2025-04-16 06:59:13', '2025-04-16 06:59:13'),
(835, 51, 'Labor Charge', 0, '', '', '2025-04-16 06:59:13', '2025-04-16 06:59:13'),
(865, 52, 'WINDSHIELD WIPERS', 1, '', '', '2025-04-17 06:57:07', '2025-04-17 06:57:07'),
(866, 52, 'MIRRORS', 1, '', '', '2025-04-17 06:57:07', '2025-04-17 06:57:07'),
(867, 52, 'INSTRUMENTS OPERATION', 1, '', '', '2025-04-17 06:57:07', '2025-04-17 06:57:07'),
(868, 52, 'EMERGENCY BRAKE', 1, '', '', '2025-04-17 06:57:07', '2025-04-17 06:57:07'),
(869, 52, 'BRAKES', 1, '', '', '2025-04-17 06:57:07', '2025-04-17 06:57:07'),
(870, 52, 'HORN', 1, '', '', '2025-04-17 06:57:07', '2025-04-17 06:57:07'),
(871, 52, 'STEERING & ALIGNMENT', 1, '', '', '2025-04-17 06:57:07', '2025-04-17 06:57:07'),
(872, 52, 'ENGINE OIL LEVEL', 1, '', '', '2025-04-17 06:57:07', '2025-04-17 06:57:07'),
(873, 52, 'AIR CLEANER', 1, '', '', '2025-04-17 06:57:07', '2025-04-17 06:57:07'),
(874, 52, 'ALL GLASS', 1, '', '', '2025-04-17 06:57:07', '2025-04-17 06:57:07'),
(875, 52, 'AIR CONDITIONER', 1, '', '', '2025-04-17 06:57:07', '2025-04-17 06:57:07'),
(876, 52, 'GENERAL ENGINE OPERATION', 1, '', '', '2025-04-17 06:57:07', '2025-04-17 06:57:07'),
(877, 52, 'COOLING SYSTEM', 1, '', '', '2025-04-17 06:57:07', '2025-04-17 06:57:07'),
(878, 52, 'FIRE & TIRE PRESSURE', 1, '', '', '2025-04-17 06:57:07', '2025-04-17 06:57:07'),
(879, 52, 'BELTS', 1, '', '', '2025-04-17 06:57:07', '2025-04-17 06:57:07'),
(880, 52, 'STARTB & IGNITION', 1, '', '', '2025-04-17 06:57:07', '2025-04-17 06:57:07'),
(881, 52, 'ALTERNATOR OUTPUT', 0, 'Menu fold', '2500', '2025-04-17 06:57:07', '2025-04-17 06:57:07'),
(882, 52, 'FUEL SYSTEM', 1, '', '', '2025-04-17 06:57:07', '2025-04-17 06:57:07'),
(883, 52, 'SUSPENSION SYSTEM', 0, 'Bonet', '3500', '2025-04-17 06:57:07', '2025-04-17 06:57:07'),
(884, 52, 'TRANSMISSION OIL LEVEL', 1, '', '', '2025-04-17 06:57:07', '2025-04-17 06:57:07'),
(885, 52, 'BRAKE LIGHTS', 1, '', '', '2025-04-17 06:57:07', '2025-04-17 06:57:07'),
(886, 52, 'HEAD LIGHTS', 0, 'Headlight', '2500', '2025-04-17 06:57:07', '2025-04-17 06:57:07'),
(887, 52, 'BATTERY OPERATION & LEVELS', 1, '', '', '2025-04-17 06:57:07', '2025-04-17 06:57:07'),
(888, 52, 'EXHAUST SYSTEM', 1, 'Radiator', '1500', '2025-04-17 06:57:07', '2025-04-17 06:57:07'),
(889, 52, 'REFLECTORS', 1, '', '', '2025-04-17 06:57:07', '2025-04-17 06:57:07'),
(890, 52, 'SCRATCHES & DENTS', 0, 'Denting penting', '9500', '2025-04-17 06:57:07', '2025-04-17 06:57:07'),
(891, 52, 'OTHER (MotorPool)', 0, 'Crom', '750', '2025-04-17 06:57:07', '2025-04-17 06:57:07'),
(892, 52, 'Labor Charge', 0, 'Labour charge', '2300', '2025-04-17 06:57:07', '2025-04-17 06:57:07');

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
-- Table structure for table `job_cards`
--

CREATE TABLE `job_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_card_number` varchar(255) NOT NULL,
  `vehicle_checkin_id` bigint(20) UNSIGNED NOT NULL,
  `service_advisor` varchar(255) NOT NULL,
  `mechanic` varchar(255) NOT NULL,
  `expected_delivery_date` date NOT NULL,
  `fuel_level` enum('Empty','Low','Half','Full') NOT NULL,
  `vehicle_condition` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`vehicle_condition`)),
  `additional_work` tinyint(1) NOT NULL DEFAULT 0,
  `advance_payment` decimal(10,2) DEFAULT NULL,
  `customer_signature` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_cards`
--

INSERT INTO `job_cards` (`id`, `job_card_number`, `vehicle_checkin_id`, `service_advisor`, `mechanic`, `expected_delivery_date`, `fuel_level`, `vehicle_condition`, `additional_work`, `advance_payment`, `customer_signature`, `created_at`, `updated_at`) VALUES
(19, 'JC1743673155', 27, 'Sanskriti naik', 'Jitendra', '2025-04-03', 'Half', '\"Ok\"', 0, 0.00, NULL, '2025-04-03 09:39:15', '2025-04-03 09:39:15'),
(21, 'JC1743837726', 34, 'Sanskriti naik', 'Jitendra', '2025-04-06', 'Low', '\"Average\"', 0, 0.00, NULL, '2025-04-05 07:22:06', '2025-04-05 07:22:06'),
(23, 'JC1743851853', 35, 'hello', 'rohan', '2025-04-05', 'Empty', '\"6676\"', 1, 3000.00, 'signatures/AgntiNvHINJO0BYa4uxXaCUgiDsAkDY2if7CFlDw.png', '2025-04-05 11:17:33', '2025-04-05 11:17:33'),
(24, 'JC1744011432', 36, 'Sanskrit naik', 'Jitendra', '2025-04-07', 'Half', '\"Good\"', 0, 0.00, NULL, '2025-04-07 07:37:12', '2025-04-07 07:37:12'),
(25, 'JC1744011438', 36, 'Sanskrit naik', 'Jitendra', '2025-04-07', 'Half', '\"Good\"', 0, 0.00, NULL, '2025-04-07 07:37:18', '2025-04-07 07:37:18'),
(26, 'JC1744122329', 40, 'Kuldeep', 'Noorani', '2025-04-09', 'Half', '\"Ghuhh\"', 1, 5000.00, NULL, '2025-04-08 14:25:29', '2025-04-08 14:25:29'),
(27, 'JC1744182354', 41, 'Smarjin mathew', 'Jithendra', '2025-04-09', 'Low', '\"Suspension eork\"', 0, 0.00, NULL, '2025-04-09 07:05:54', '2025-04-09 07:05:54'),
(28, 'JC1744264430', 43, 'Sanskriti naik', 'Jitendra', '2025-04-11', 'Low', '\"Ok\"', 0, 0.00, NULL, '2025-04-10 05:53:50', '2025-04-10 05:53:50'),
(29, 'JC1744271087', 44, 'Sanskrit naik', 'Jitendra sahani', '2025-04-10', 'Half', '\"Ok\"', 0, 0.00, NULL, '2025-04-10 07:44:47', '2025-04-10 07:44:47'),
(30, 'JC1744447882', 45, 'SANSKRITI NAIK', 'JITENDRA', '2025-04-13', 'Half', '\"OK\"', 0, 0.00, NULL, '2025-04-12 08:51:22', '2025-04-12 08:51:22'),
(31, 'JC1744610973', 46, 'Sanskriti naik', 'Jitendra', '2025-04-15', 'Half', '\"Ok\"', 0, 0.00, NULL, '2025-04-14 06:09:33', '2025-04-14 06:09:33'),
(32, 'JC1744635576', 47, 'vinay singh', 'rohan rajput', '2025-04-14', 'Half', '\"sonu\"', 1, 5600.00, 'signatures/RQDb8VOeOTP4ZwcGI3ucVsFgww4cglTr5kLhax4c.jpg', '2025-04-14 12:59:36', '2025-04-14 12:59:36'),
(33, 'JC1744695391', 48, 'Sanskrit naik', 'Jitendra sahani', '2025-04-20', 'Half', '\"Ok\"', 0, 5000.00, NULL, '2025-04-15 05:36:31', '2025-04-15 05:36:31'),
(34, 'JC1744698255', 49, 'Sanskriti naik', 'Jitendra', '2025-04-18', 'Low', '\"Ok\"', 0, 0.00, NULL, '2025-04-15 06:24:15', '2025-04-15 06:24:15'),
(35, 'JC1744785725', 50, 'Sanskrit naik', 'Jitendra', '2025-04-20', 'Full', '\"Ok\"', 0, 0.00, NULL, '2025-04-16 06:42:05', '2025-04-16 06:42:05'),
(36, 'JC1744786627', 51, 'Sanskrit naik', 'Jitendra', '2025-04-16', 'Low', '\"Ok\"', 0, 0.00, NULL, '2025-04-16 06:57:07', '2025-04-16 06:57:07'),
(37, 'JC1744871889', 52, 'Sanskriti naik', 'Jitendra sahani', '2025-04-20', 'Half', '\"Ok\"', 0, 5000.00, NULL, '2025-04-17 06:38:09', '2025-04-17 06:38:09');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `leave_type` enum('Casual','Sick','Paid','Unpaid') NOT NULL,
  `leave_start_date` date NOT NULL,
  `leave_end_date` date NOT NULL,
  `total_days_requested` int(11) NOT NULL,
  `leave_approval_status` enum('Pending','Approved','Rejected') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `employee_name`, `employee_id`, `leave_type`, `leave_start_date`, `leave_end_date`, `total_days_requested`, `leave_approval_status`, `created_at`, `updated_at`) VALUES
(1, 'rohit singh', '3234 sfsf', 'Paid', '2025-03-17', '2025-03-20', 4, 'Approved', '2025-03-17 00:53:36', '2025-03-21 07:21:22'),
(2, 'vinay singh', '102', 'Paid', '2025-03-22', '2025-03-28', 7, 'Approved', '2025-03-21 06:04:09', '2025-03-21 07:21:34'),
(3, 'rohan singh', '2', 'Sick', '2025-03-21', '2025-03-28', 8, 'Pending', '2025-03-21 07:22:53', '2025-03-21 07:22:53'),
(4, 'Vishal', '4', 'Casual', '2025-03-22', '2025-03-27', 6, 'Approved', '2025-03-21 07:29:59', '2025-03-21 07:35:23'),
(5, 'rohan singh', 'EMP002', 'Paid', '2025-03-11', '2025-03-29', 19, 'Pending', '2025-03-21 07:43:33', '2025-03-21 07:43:33'),
(6, 'Vishal', 'EMP004', 'Paid', '2025-03-22', '2025-03-24', 3, 'Pending', '2025-03-21 07:47:59', '2025-03-21 07:47:59'),
(7, 'Vishal', '4', 'Unpaid', '2025-03-20', '2025-03-28', 9, 'Pending', '2025-03-21 07:54:01', '2025-03-21 07:54:01'),
(8, 'rohan singh', '2', 'Paid', '2025-03-22', '2025-04-05', 15, 'Rejected', '2025-03-21 08:13:49', '2025-03-21 08:15:20'),
(9, 'Vishal', '4', 'Sick', '2025-03-04', '2025-04-04', 32, 'Pending', '2025-03-21 11:14:32', '2025-03-21 11:14:32'),
(10, 'rohan singh', '2', 'Paid', '2025-03-20', '2025-03-28', 9, 'Approved', '2025-03-21 11:25:03', '2025-03-21 11:26:56'),
(11, 'rohan singh', '2', 'Sick', '2025-03-11', '2025-03-25', 15, 'Pending', '2025-03-27 07:43:51', '2025-03-27 07:43:51'),
(12, 'rohan singh', '2', 'Sick', '2025-02-12', '2025-02-20', 8, 'Approved', '2025-03-27 07:45:17', '2025-03-27 08:23:52'),
(13, 'rohan singh', '2', 'Sick', '2025-02-28', '2025-02-28', 1, 'Approved', '2025-03-28 10:52:52', '2025-03-28 10:54:00'),
(14, 'Ankit Singh Rajput', '5', 'Unpaid', '2025-04-09', '2025-04-10', 2, 'Rejected', '2025-04-02 11:59:22', '2025-04-04 12:59:52');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_01_074234_create_vehicle_checkins_table', 1),
(5, '2025_03_01_083519_create_job_cards_table', 1),
(6, '2025_03_05_071939_create_customer_complaints_table', 1),
(7, '2025_03_05_074008_create_estimated_inspections_table', 1),
(8, '2025_03_05_091424_create_drawback_lists_table', 1),
(9, '2025_03_05_092726_create_drawback_parts_table', 1),
(10, '2025_03_05_093636_create_work_starts_table', 1),
(11, '2025_03_17_052742_create_attendances_table', 2),
(12, '2025_03_17_061559_create_leaves_table', 3),
(13, '2025_03_17_065918_create_salaries_table', 4),
(14, '2025_03_17_065930_create_vendor_payments_table', 4),
(15, '2025_03_17_094349_create_final_bills_table', 5),
(16, '2025_03_17_113100_create_profit_reports_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$12$uIWW.8csz/KXEk9ebgS37ekOpRkWW.eJ1Ky5S6ocT0RmB1mTFSfsy', '2025-04-04 08:08:37'),
('vinayrajput7812@gmail.com', '$2y$12$6WHCAaD00RT2YQx4KVYBHOktPqzWe6I7fqvgFhJ7HhviqZY54J2k.', '2025-04-04 08:11:22');

-- --------------------------------------------------------

--
-- Table structure for table `profit_reports`
--

CREATE TABLE `profit_reports` (
  `id` int(11) NOT NULL,
  `vehicle_checkin_id` int(11) NOT NULL,
  `name_of_parts` varchar(255) NOT NULL,
  `profit` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `selling_price` decimal(10,2) DEFAULT NULL,
  `qty` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profit_reports`
--

INSERT INTO `profit_reports` (`id`, `vehicle_checkin_id`, `name_of_parts`, `profit`, `created_at`, `updated_at`, `selling_price`, `qty`) VALUES
(77, 35, 'demo1', 400.00, '2025-04-05 11:20:16', '2025-04-05 11:20:16', 400.00, 4.00),
(78, 35, 'demo2', 500.00, '2025-04-05 11:20:16', '2025-04-05 11:20:16', 500.00, 5.00),
(79, 35, 'demo3', 3294.00, '2025-04-05 11:20:16', '2025-04-05 11:20:16', 2443.00, 3.00),
(80, 35, 'demo4', 2331.00, '2025-04-05 11:20:16', '2025-04-05 11:20:16', 433.00, 7.00),
(81, 35, 'demo5', 8172.00, '2025-04-05 11:20:16', '2025-04-05 11:20:16', 5043.00, 4.00),
(82, 36, 'Ac gas', 400.00, '2025-04-07 10:35:29', '2025-04-07 10:35:29', 1200.00, 1.00),
(83, 36, 'Valve', 50.00, '2025-04-07 10:35:29', '2025-04-07 10:35:29', 150.00, 1.00),
(84, 36, 'Washjng', 250.00, '2025-04-07 10:35:29', '2025-04-07 10:35:29', 350.00, 1.00),
(85, 36, 'Service chadge', 300.00, '2025-04-07 10:35:29', '2025-04-07 10:35:29', 300.00, 1.00),
(86, 49, 'Front glass', 1400.00, '2025-04-16 08:15:27', '2025-04-16 08:15:27', 6600.00, 1.00),
(87, 49, 'Alignment', 50.00, '2025-04-16 08:15:27', '2025-04-16 08:15:27', 300.00, 1.00),
(88, 49, 'Dent and pent', 1300.00, '2025-04-16 08:15:27', '2025-04-16 08:15:27', 2500.00, 1.00),
(89, 49, 'Shocup mount', 1620.00, '2025-04-16 08:15:27', '2025-04-16 08:15:27', 1300.00, 2.00),
(90, 49, 'Shocup rear', 6848.00, '2025-04-16 08:15:27', '2025-04-16 08:15:27', 5424.00, 2.00),
(91, 49, 'Labour charge', 1500.00, '2025-04-16 08:15:27', '2025-04-16 08:15:27', 1500.00, 1.00),
(92, 49, 'Full polish', 1500.00, '2025-04-16 08:15:27', '2025-04-16 08:15:27', 1500.00, 1.00),
(93, 49, 'Washing', 350.00, '2025-04-16 08:15:27', '2025-04-16 08:15:27', 350.00, 1.00),
(94, 49, 'Linkage', 295.00, '2025-04-16 08:15:27', '2025-04-16 08:15:27', 1095.00, 1.00),
(95, 43, 'Ac filter', 30.00, '2025-04-16 08:37:35', '2025-04-16 08:37:35', 220.00, 1.00),
(96, 43, 'Seal diff. Rh side', 27.00, '2025-04-16 08:37:35', '2025-04-16 08:37:35', 175.00, 1.00),
(97, 43, 'Seal diff. Lh side', 27.00, '2025-04-16 08:37:35', '2025-04-16 08:37:35', 175.00, 1.00),
(98, 43, 'Steering rack bush', 53.00, '2025-04-16 08:37:35', '2025-04-16 08:37:35', 150.00, 1.00),
(99, 43, 'Damper kit', 63.00, '2025-04-16 08:37:35', '2025-04-16 08:37:35', 285.00, 1.00),
(100, 43, 'Engine oil', 840.00, '2025-04-16 08:37:35', '2025-04-16 08:37:35', 1575.00, 1.00),
(101, 43, 'Air filter', 41.00, '2025-04-16 08:37:35', '2025-04-16 08:37:35', 291.00, 1.00),
(102, 43, 'Washing', 350.00, '2025-04-16 08:37:35', '2025-04-16 08:37:35', 350.00, 1.00),
(103, 43, 'Labour charge', 1500.00, '2025-04-16 08:37:35', '2025-04-16 08:37:35', 1500.00, 1.00),
(104, 43, 'Steering rack', 700.00, '2025-04-16 08:37:35', '2025-04-16 08:37:35', 2200.00, 1.00),
(105, 43, 'Oil filter', 34.00, '2025-04-16 08:37:35', '2025-04-16 08:37:35', 120.00, 1.00),
(106, 43, 'Ac filter', 30.00, '2025-04-16 08:38:14', '2025-04-16 08:38:14', 220.00, 1.00),
(107, 43, 'Seal diff. Rh side', 27.00, '2025-04-16 08:38:14', '2025-04-16 08:38:14', 175.00, 1.00),
(108, 43, 'Seal diff. Lh side', 27.00, '2025-04-16 08:38:14', '2025-04-16 08:38:14', 175.00, 1.00),
(109, 43, 'Steering rack bush', 53.00, '2025-04-16 08:38:14', '2025-04-16 08:38:14', 150.00, 1.00),
(110, 43, 'Damper kit', 63.00, '2025-04-16 08:38:14', '2025-04-16 08:38:14', 285.00, 1.00),
(111, 43, 'Engine oil', 840.00, '2025-04-16 08:38:14', '2025-04-16 08:38:14', 1575.00, 1.00),
(112, 43, 'Air filter', 41.00, '2025-04-16 08:38:14', '2025-04-16 08:38:14', 291.00, 1.00),
(113, 43, 'Washing', 350.00, '2025-04-16 08:38:14', '2025-04-16 08:38:14', 350.00, 1.00),
(114, 43, 'Labour charge', 1500.00, '2025-04-16 08:38:14', '2025-04-16 08:38:14', 1500.00, 1.00),
(115, 43, 'Steering rack', 700.00, '2025-04-16 08:38:14', '2025-04-16 08:38:14', 2200.00, 1.00),
(116, 43, 'Oil filter', 34.00, '2025-04-16 08:38:14', '2025-04-16 08:38:14', 120.00, 1.00),
(117, 43, 'Ac filter', 30.00, '2025-04-16 08:39:45', '2025-04-16 08:39:45', 220.00, 1.00),
(118, 43, 'Seal diff. Rh side', 27.00, '2025-04-16 08:39:45', '2025-04-16 08:39:45', 175.00, 1.00),
(119, 43, 'Seal diff. Lh side', 27.00, '2025-04-16 08:39:45', '2025-04-16 08:39:45', 175.00, 1.00),
(120, 43, 'Steering rack bush', 53.00, '2025-04-16 08:39:45', '2025-04-16 08:39:45', 150.00, 1.00),
(121, 43, 'Damper kit', 63.00, '2025-04-16 08:39:45', '2025-04-16 08:39:45', 285.00, 1.00),
(122, 43, 'Engine oil', 840.00, '2025-04-16 08:39:45', '2025-04-16 08:39:45', 1575.00, 1.00),
(123, 43, 'Air filter', 41.00, '2025-04-16 08:39:45', '2025-04-16 08:39:45', 291.00, 1.00),
(124, 43, 'Washing', 350.00, '2025-04-16 08:39:45', '2025-04-16 08:39:45', 350.00, 1.00),
(125, 43, 'Labour charge', 1500.00, '2025-04-16 08:39:45', '2025-04-16 08:39:45', 1500.00, 1.00),
(126, 43, 'Steering rack', 700.00, '2025-04-16 08:39:45', '2025-04-16 08:39:45', 2200.00, 1.00),
(127, 43, 'Oil filter', 34.00, '2025-04-16 08:39:45', '2025-04-16 08:39:45', 120.00, 1.00),
(128, 43, 'Ac filter', 30.00, '2025-04-16 08:40:28', '2025-04-16 08:40:28', 220.00, 1.00),
(129, 43, 'Seal diff. Rh side', 27.00, '2025-04-16 08:40:28', '2025-04-16 08:40:28', 175.00, 1.00),
(130, 43, 'Seal diff. Lh side', 27.00, '2025-04-16 08:40:28', '2025-04-16 08:40:28', 175.00, 1.00),
(131, 43, 'Steering rack bush', 53.00, '2025-04-16 08:40:28', '2025-04-16 08:40:28', 150.00, 1.00),
(132, 43, 'Damper kit', 63.00, '2025-04-16 08:40:28', '2025-04-16 08:40:28', 285.00, 1.00),
(133, 43, 'Engine oil', 840.00, '2025-04-16 08:40:28', '2025-04-16 08:40:28', 1575.00, 1.00),
(134, 43, 'Air filter', 41.00, '2025-04-16 08:40:28', '2025-04-16 08:40:28', 291.00, 1.00),
(135, 43, 'Washing', 350.00, '2025-04-16 08:40:28', '2025-04-16 08:40:28', 350.00, 1.00),
(136, 43, 'Labour charge', 1500.00, '2025-04-16 08:40:28', '2025-04-16 08:40:28', 1500.00, 1.00),
(137, 43, 'Steering rack', 700.00, '2025-04-16 08:40:28', '2025-04-16 08:40:28', 2200.00, 1.00),
(138, 43, 'Oil filter', 34.00, '2025-04-16 08:40:28', '2025-04-16 08:40:28', 120.00, 1.00),
(139, 43, 'Ac filter', 30.00, '2025-04-16 08:43:20', '2025-04-16 08:43:20', 220.00, 1.00),
(140, 43, 'Seal diff. Rh side', 27.00, '2025-04-16 08:43:20', '2025-04-16 08:43:20', 175.00, 1.00),
(141, 43, 'Seal diff. Lh side', 27.00, '2025-04-16 08:43:20', '2025-04-16 08:43:20', 175.00, 1.00),
(142, 43, 'Steering rack bush', 53.00, '2025-04-16 08:43:20', '2025-04-16 08:43:20', 150.00, 1.00),
(143, 43, 'Damper kit', 63.00, '2025-04-16 08:43:20', '2025-04-16 08:43:20', 285.00, 1.00),
(144, 43, 'Engine oil', 840.00, '2025-04-16 08:43:20', '2025-04-16 08:43:20', 1575.00, 1.00),
(145, 43, 'Air filter', 41.00, '2025-04-16 08:43:20', '2025-04-16 08:43:20', 291.00, 1.00),
(146, 43, 'Washing', 350.00, '2025-04-16 08:43:20', '2025-04-16 08:43:20', 350.00, 1.00),
(147, 43, 'Labour charge', 1500.00, '2025-04-16 08:43:20', '2025-04-16 08:43:20', 1500.00, 1.00),
(148, 43, 'Steering rack', 700.00, '2025-04-16 08:43:20', '2025-04-16 08:43:20', 2200.00, 1.00),
(149, 43, 'Oil filter', 34.00, '2025-04-16 08:43:20', '2025-04-16 08:43:20', 120.00, 1.00),
(150, 42, 'Ac filter', 30.00, '2025-04-16 08:43:53', '2025-04-16 08:43:53', 220.00, 1.00),
(151, 42, 'Seal diff. Rh side', 27.00, '2025-04-16 08:43:53', '2025-04-16 08:43:53', 175.00, 1.00),
(152, 42, 'Seal diff. Lh side', 27.00, '2025-04-16 08:43:53', '2025-04-16 08:43:53', 175.00, 1.00),
(153, 42, 'Steering rack bush', 53.00, '2025-04-16 08:43:53', '2025-04-16 08:43:53', 150.00, 1.00),
(154, 42, 'Damper kit', 63.00, '2025-04-16 08:43:53', '2025-04-16 08:43:53', 285.00, 1.00),
(155, 42, 'Engine oil', 840.00, '2025-04-16 08:43:53', '2025-04-16 08:43:53', 1575.00, 1.00),
(156, 42, 'Air filter', 41.00, '2025-04-16 08:43:53', '2025-04-16 08:43:53', 291.00, 1.00),
(157, 42, 'Washing', 350.00, '2025-04-16 08:43:53', '2025-04-16 08:43:53', 350.00, 1.00),
(158, 42, 'Labour charge', 1500.00, '2025-04-16 08:43:53', '2025-04-16 08:43:53', 1500.00, 1.00),
(159, 42, 'Steering rack', 700.00, '2025-04-16 08:43:53', '2025-04-16 08:43:53', 2200.00, 1.00),
(160, 42, 'Oil filter', 34.00, '2025-04-16 08:43:53', '2025-04-16 08:43:53', 120.00, 1.00),
(161, 28, 'Engine oil', 2376.00, '2025-04-16 09:42:38', '2025-04-16 09:42:38', 1485.00, 3.00),
(162, 28, 'Air filter', 54.00, '2025-04-16 09:42:38', '2025-04-16 09:42:38', 224.00, 1.00),
(163, 28, 'Oil filter', 65.00, '2025-04-16 09:42:38', '2025-04-16 09:42:38', 150.00, 1.00),
(164, 28, 'Ac filter', 181.00, '2025-04-16 09:42:38', '2025-04-16 09:42:38', 421.00, 1.00),
(165, 28, 'Washing, interwash, polish', 1500.00, '2025-04-16 09:42:38', '2025-04-16 09:42:38', 1500.00, 1.00),
(166, 28, 'Labour charge', 1000.00, '2025-04-16 09:42:38', '2025-04-16 09:42:38', 1000.00, 1.00),
(167, 34, 'Alternator belt', 35.00, '2025-04-16 10:07:40', '2025-04-16 10:07:40', 915.00, 1.00),
(168, 34, 'LABOUR charge', 1000.00, '2025-04-16 10:07:40', '2025-04-16 10:07:40', 1000.00, 1.00),
(169, 34, 'Washing', 300.00, '2025-04-16 10:07:40', '2025-04-16 10:07:40', 300.00, 1.00),
(170, 34, 'Holder + bulb', 185.00, '2025-04-16 10:07:40', '2025-04-16 10:07:40', 485.00, 1.00),
(171, 48, 'Linkage', 292.00, '2025-04-19 05:01:16', '2025-04-19 05:01:16', 1142.00, 1.00),
(172, 48, 'Arm Buch kit', 270.00, '2025-04-19 05:01:16', '2025-04-19 05:01:16', 990.00, 1.00),
(173, 48, 'Balance road buch', 160.00, '2025-04-19 05:01:16', '2025-04-19 05:01:16', 200.00, 2.00),
(174, 48, 'Arm boll joint', 242.00, '2025-04-19 05:01:16', '2025-04-19 05:01:16', 932.00, 1.00),
(175, 48, 'Rear shock up', 4384.00, '2025-04-19 05:01:16', '2025-04-19 05:01:16', 3622.00, 2.00),
(176, 48, 'Door visor', 100.00, '2025-04-19 05:01:16', '2025-04-19 05:01:16', 700.00, 1.00),
(177, 48, 'Reasel bearing', 101.00, '2025-04-19 05:01:16', '2025-04-19 05:01:16', 471.00, 1.00),
(178, 48, 'Clutch pressure plate', 668.00, '2025-04-19 05:01:16', '2025-04-19 05:01:16', 2368.00, 1.00),
(179, 48, 'Oil filter', 77.00, '2025-04-19 05:01:16', '2025-04-19 05:01:16', 162.00, 1.00),
(180, 48, 'Outer garnish', 125.00, '2025-04-19 05:01:16', '2025-04-19 05:01:16', 625.00, 1.00),
(181, 48, 'Engine oil', 840.00, '2025-04-19 05:01:16', '2025-04-19 05:01:16', 1575.00, 1.00),
(182, 48, 'Air filter', 88.00, '2025-04-19 05:01:16', '2025-04-19 05:01:16', 308.00, 1.00),
(183, 48, 'Ac filter', 69.00, '2025-04-19 05:01:16', '2025-04-19 05:01:16', 239.00, 1.00),
(184, 48, 'Washing', 350.00, '2025-04-19 05:01:16', '2025-04-19 05:01:16', 350.00, 1.00),
(185, 48, 'Labour charge', 2500.00, '2025-04-19 05:01:16', '2025-04-19 05:01:16', 2500.00, 1.00),
(186, 48, 'Break pad', 364.00, '2025-04-19 05:01:16', '2025-04-19 05:01:16', 1064.00, 1.00),
(187, 48, 'Lath Labour charge', 240.00, '2025-04-19 05:01:16', '2025-04-19 05:01:16', 240.00, 1.00),
(188, 48, 'Clutch cable', 20.00, '2025-04-19 05:01:16', '2025-04-19 05:01:16', 970.00, 1.00);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `name_of_parts` varchar(255) NOT NULL,
  `mrp` decimal(10,2) NOT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `selling_price` decimal(10,2) NOT NULL,
  `profit` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `customer_id`, `name_of_parts`, `mrp`, `purchase_price`, `qty`, `selling_price`, `profit`, `created_at`, `updated_at`) VALUES
(40, 35, 'demo1', 400.00, 300.00, 4, 400.00, 400.00, '2025-04-05 11:19:54', '2025-04-05 11:19:54'),
(41, 35, 'demo2', 500.00, 400.00, 5, 500.00, 500.00, '2025-04-05 11:19:54', '2025-04-05 11:19:54'),
(42, 35, 'demo3', 2443.00, 1345.00, 3, 2443.00, 3294.00, '2025-04-05 11:19:54', '2025-04-05 11:19:54'),
(43, 35, 'demo4', 433.00, 100.00, 7, 433.00, 2331.00, '2025-04-05 11:19:54', '2025-04-05 11:19:54'),
(44, 35, 'demo5', 5043.00, 3000.00, 4, 5043.00, 8172.00, '2025-04-05 11:19:54', '2025-04-05 11:19:54'),
(45, 36, 'Ac gas', 1200.00, 800.00, 1, 1200.00, 400.00, '2025-04-07 10:34:46', '2025-04-07 10:34:46'),
(46, 36, 'Valve', 100.00, 100.00, 1, 150.00, 50.00, '2025-04-07 10:34:46', '2025-04-07 10:34:46'),
(47, 36, 'Washjng', 400.00, 100.00, 1, 350.00, 250.00, '2025-04-07 10:34:46', '2025-04-07 10:34:46'),
(48, 36, 'Service chadge', 300.00, 0.00, 1, 300.00, 300.00, '2025-04-07 10:34:46', '2025-04-07 10:34:46'),
(49, 40, 'Brake pads', 2500.00, 1500.00, 1, 2500.00, 1000.00, '2025-04-08 14:33:03', '2025-04-08 14:33:03'),
(50, 49, 'Front glass', 6600.00, 5200.00, 1, 6600.00, 1400.00, '2025-04-16 08:14:54', '2025-04-16 08:14:54'),
(51, 49, 'Alignment', 300.00, 250.00, 1, 300.00, 50.00, '2025-04-16 08:14:54', '2025-04-16 08:14:54'),
(52, 49, 'Dent and pent', 2500.00, 1200.00, 1, 2500.00, 1300.00, '2025-04-16 08:14:54', '2025-04-16 08:14:54'),
(53, 49, 'Shocup mount', 1300.00, 490.00, 2, 1300.00, 1620.00, '2025-04-16 08:14:54', '2025-04-16 08:14:54'),
(54, 49, 'Shocup rear', 5424.00, 2000.00, 2, 5424.00, 6848.00, '2025-04-16 08:14:54', '2025-04-16 08:14:54'),
(55, 49, 'Labour charge', 1500.00, 0.00, 1, 1500.00, 1500.00, '2025-04-16 08:14:54', '2025-04-16 08:14:54'),
(56, 49, 'Full polish', 1500.00, 0.00, 1, 1500.00, 1500.00, '2025-04-16 08:14:54', '2025-04-16 08:14:54'),
(57, 49, 'Washing', 350.00, 0.00, 1, 350.00, 350.00, '2025-04-16 08:14:54', '2025-04-16 08:14:54'),
(58, 49, 'Linkage', 1095.00, 800.00, 1, 1095.00, 295.00, '2025-04-16 08:14:54', '2025-04-16 08:14:54'),
(61, 42, 'Ac filter', 220.00, 190.00, 1, 220.00, 30.00, '2025-04-16 08:31:16', '2025-04-16 08:36:33'),
(70, 42, 'Seal diff. Rh side', 175.00, 148.00, 1, 175.00, 27.00, '2025-04-16 08:32:45', '2025-04-16 08:32:45'),
(71, 42, 'Seal diff. Lh side', 175.00, 148.00, 1, 175.00, 27.00, '2025-04-16 08:32:45', '2025-04-16 08:32:45'),
(72, 42, 'Steering rack bush', 150.00, 97.00, 1, 150.00, 53.00, '2025-04-16 08:32:45', '2025-04-16 08:32:45'),
(73, 42, 'Damper kit', 285.00, 222.00, 1, 285.00, 63.00, '2025-04-16 08:32:45', '2025-04-16 08:32:45'),
(74, 42, 'Engine oil', 1575.00, 735.00, 1, 1575.00, 840.00, '2025-04-16 08:32:45', '2025-04-16 08:32:45'),
(75, 42, 'Air filter', 291.00, 250.00, 1, 291.00, 41.00, '2025-04-16 08:32:45', '2025-04-16 08:32:45'),
(76, 42, 'Washing', 350.00, 0.00, 1, 350.00, 350.00, '2025-04-16 08:32:45', '2025-04-16 08:32:45'),
(77, 42, 'Labour charge', 1500.00, 0.00, 1, 1500.00, 1500.00, '2025-04-16 08:32:45', '2025-04-16 08:32:45'),
(78, 42, 'Steering rack', 2200.00, 1500.00, 1, 2200.00, 700.00, '2025-04-16 08:32:45', '2025-04-16 08:32:45'),
(79, 42, 'Oil filter', 120.00, 86.00, 1, 120.00, 34.00, '2025-04-16 08:32:45', '2025-04-16 08:32:45'),
(81, 41, 'Lh damper', 2765.00, 2240.00, 1, 2765.00, 525.00, '2025-04-16 09:12:20', '2025-04-16 09:12:20'),
(82, 41, 'Rh damper', 2765.00, 2240.00, 1, 2765.00, 525.00, '2025-04-16 09:12:20', '2025-04-16 09:12:20'),
(83, 41, 'Oil filter', 234.00, 170.00, 1, 234.00, 64.00, '2025-04-16 09:12:20', '2025-04-16 09:12:20'),
(84, 41, 'Ac filter', 318.00, 271.00, 1, 318.00, 47.00, '2025-04-16 09:12:20', '2025-04-16 09:12:20'),
(85, 41, 'Shockup mount', 2100.00, 1620.00, 2, 2100.00, 960.00, '2025-04-16 09:12:20', '2025-04-16 09:12:20'),
(86, 41, 'Labour charge', 2500.00, 0.00, 1, 2500.00, 2500.00, '2025-04-16 09:12:20', '2025-04-16 09:12:20'),
(87, 41, 'Washing', 350.00, 200.00, 1, 350.00, 150.00, '2025-04-16 09:12:20', '2025-04-16 09:12:20'),
(88, 41, 'Air filter', 449.00, 382.00, 1, 449.00, 67.00, '2025-04-16 09:12:20', '2025-04-16 09:12:20'),
(89, 41, 'Engine oil', 1800.00, 840.00, 1, 1800.00, 960.00, '2025-04-16 09:12:20', '2025-04-16 09:12:20'),
(90, 41, 'Wiper pipe', 40.00, 20.00, 1, 40.00, 20.00, '2025-04-16 09:12:20', '2025-04-16 09:12:20'),
(91, 41, 'Interwash', 1000.00, 600.00, 1, 1000.00, 400.00, '2025-04-16 09:12:20', '2025-04-16 09:12:20'),
(92, 41, 'Steering rack + repairing', 2500.00, 1500.00, 1, 2500.00, 1000.00, '2025-04-16 09:12:20', '2025-04-16 09:12:20'),
(93, 28, 'Engine oil', 1485.00, 693.00, 3, 1485.00, 2376.00, '2025-04-16 09:41:24', '2025-04-16 09:41:24'),
(94, 28, 'Air filter', 224.00, 170.00, 1, 224.00, 54.00, '2025-04-16 09:41:24', '2025-04-16 09:41:24'),
(95, 28, 'Oil filter', 150.00, 85.00, 1, 150.00, 65.00, '2025-04-16 09:41:24', '2025-04-16 09:41:24'),
(96, 28, 'Ac filter', 421.00, 240.00, 1, 421.00, 181.00, '2025-04-16 09:41:24', '2025-04-16 09:41:24'),
(97, 28, 'Washing, interwash, polish', 1500.00, 0.00, 1, 1500.00, 1500.00, '2025-04-16 09:41:24', '2025-04-16 09:41:24'),
(98, 28, 'Labour charge', 1000.00, 0.00, 1, 1000.00, 1000.00, '2025-04-16 09:41:24', '2025-04-16 09:41:24'),
(117, 45, 'Shokup rear', 1764.00, 1300.00, 1, 1764.00, 464.00, '2025-04-16 12:04:32', '2025-04-16 12:04:32'),
(118, 45, 'Shocuprear', 1710.00, 1300.00, 1, 1710.00, 410.00, '2025-04-16 12:04:32', '2025-04-16 12:04:32'),
(119, 45, 'Buch kit', 893.00, 650.00, 2, 893.00, 486.00, '2025-04-16 12:04:32', '2025-04-16 12:04:32'),
(120, 45, 'Aram boll joint', 1061.00, 740.00, 2, 1061.00, 642.00, '2025-04-16 12:04:32', '2025-04-16 12:04:32'),
(121, 45, 'Break pad', 1280.00, 880.00, 1, 1280.00, 400.00, '2025-04-16 12:04:32', '2025-04-16 12:04:32'),
(122, 45, 'Balance road Bhushan kit', 114.00, 80.00, 2, 114.00, 68.00, '2025-04-16 12:04:32', '2025-04-16 12:04:32'),
(123, 45, 'Lath Labour charge', 450.00, 380.00, 1, 450.00, 70.00, '2025-04-16 12:04:32', '2025-04-16 12:04:32'),
(124, 45, 'Oil filter', 122.00, 104.00, 1, 122.00, 18.00, '2025-04-16 12:04:32', '2025-04-16 12:04:32'),
(125, 45, 'Engine oil oil', 1575.00, 735.00, 1, 1575.00, 840.00, '2025-04-16 12:04:32', '2025-04-16 12:04:32'),
(126, 45, 'Air filter', 325.00, 277.00, 1, 325.00, 48.00, '2025-04-16 12:04:32', '2025-04-16 12:04:32'),
(127, 45, 'Ac filter', 305.00, 260.00, 1, 305.00, 45.00, '2025-04-16 12:04:32', '2025-04-16 12:04:32'),
(128, 45, 'Washing', 0.00, 0.00, 1, 350.00, 350.00, '2025-04-16 12:04:32', '2025-04-16 12:04:32'),
(129, 45, 'Labour charge', 0.00, 0.00, 1, 1500.00, 1500.00, '2025-04-16 12:04:32', '2025-04-16 12:04:32'),
(130, 45, 'Wiper blade', 508.00, 432.00, 1, 508.00, 76.00, '2025-04-16 12:04:32', '2025-04-16 12:04:32'),
(131, 34, 'Alternator belt', 915.00, 880.00, 1, 915.00, 35.00, '2025-04-16 12:07:43', '2025-04-16 12:07:43'),
(132, 34, 'Labour charge', 1000.00, 0.00, 1, 1000.00, 1000.00, '2025-04-16 12:07:43', '2025-04-16 12:07:43'),
(133, 34, 'Washing', 0.00, 0.00, 1, 300.00, 300.00, '2025-04-16 12:07:43', '2025-04-16 12:07:43'),
(134, 34, 'Holder + bulb', 485.00, 300.00, 1, 485.00, 185.00, '2025-04-16 12:07:43', '2025-04-16 12:07:43'),
(135, 48, 'Linkage', 1142.00, 850.00, 1, 1142.00, 292.00, '2025-04-19 04:59:46', '2025-04-19 04:59:46'),
(136, 48, 'Arm Buch kit', 990.00, 720.00, 1, 990.00, 270.00, '2025-04-19 04:59:46', '2025-04-19 04:59:46'),
(137, 48, 'Balance road buch', 200.00, 120.00, 2, 200.00, 160.00, '2025-04-19 04:59:46', '2025-04-19 04:59:46'),
(138, 48, 'Arm boll joint', 932.00, 690.00, 1, 932.00, 242.00, '2025-04-19 04:59:46', '2025-04-19 04:59:46'),
(139, 48, 'Rear shock up', 3622.00, 1430.00, 2, 3622.00, 4384.00, '2025-04-19 04:59:46', '2025-04-19 04:59:46'),
(140, 48, 'Door visor', 700.00, 600.00, 1, 700.00, 100.00, '2025-04-19 04:59:46', '2025-04-19 04:59:46'),
(141, 48, 'Reasel bearing', 471.00, 370.00, 1, 471.00, 101.00, '2025-04-19 04:59:46', '2025-04-19 04:59:46'),
(142, 48, 'Clutch pressure plate', 2368.00, 1700.00, 1, 2368.00, 668.00, '2025-04-19 04:59:46', '2025-04-19 04:59:46'),
(143, 48, 'Oil filter', 162.00, 85.00, 1, 162.00, 77.00, '2025-04-19 04:59:46', '2025-04-19 04:59:46'),
(144, 48, 'Outer garnish', 625.00, 500.00, 1, 625.00, 125.00, '2025-04-19 04:59:46', '2025-04-19 04:59:46'),
(145, 48, 'Engine oil', 1575.00, 735.00, 1, 1575.00, 840.00, '2025-04-19 04:59:46', '2025-04-19 04:59:46'),
(146, 48, 'Air filter', 308.00, 220.00, 1, 308.00, 88.00, '2025-04-19 04:59:46', '2025-04-19 04:59:46'),
(147, 48, 'Ac filter', 239.00, 170.00, 1, 239.00, 69.00, '2025-04-19 04:59:46', '2025-04-19 04:59:46'),
(148, 48, 'Washing', 0.00, 0.00, 1, 350.00, 350.00, '2025-04-19 04:59:46', '2025-04-19 04:59:46'),
(149, 48, 'Labour charge', 0.00, 0.00, 1, 2500.00, 2500.00, '2025-04-19 04:59:46', '2025-04-19 04:59:46'),
(150, 48, 'Break pad', 1064.00, 700.00, 1, 1064.00, 364.00, '2025-04-19 04:59:46', '2025-04-19 04:59:46'),
(151, 48, 'Lath Labour charge', 0.00, 0.00, 1, 240.00, 240.00, '2025-04-19 04:59:46', '2025-04-19 04:59:46'),
(152, 48, 'Clutch cable', 970.00, 950.00, 1, 970.00, 20.00, '2025-04-19 04:59:46', '2025-04-19 04:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `basic_salary` decimal(10,2) NOT NULL,
  `attendance` int(11) NOT NULL DEFAULT 0,
  `overtime_hours` int(11) NOT NULL DEFAULT 0,
  `deductions` decimal(10,2) NOT NULL DEFAULT 0.00,
  `net_salary` decimal(10,2) NOT NULL,
  `payment_status` enum('Pending','Paid') NOT NULL DEFAULT 'Pending',
  `payment_mode` enum('Cash','Bank Transfer','UPI') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `employee_name`, `employee_id`, `department`, `basic_salary`, `attendance`, `overtime_hours`, `deductions`, `net_salary`, `payment_status`, `payment_mode`, `created_at`, `updated_at`) VALUES
(1, 'vinay singh', '3234 sfsf', 'it', 4000.00, 27, 2342, 343.00, 237857.00, 'Paid', 'UPI', '2025-03-17 01:54:13', '2025-03-17 01:54:13'),
(2, 'rohit singh', '2887373', 'it', 32000.00, 23, 8, 6.00, 32794.00, 'Pending', 'Bank Transfer', '2025-03-17 03:00:50', '2025-03-21 10:06:48'),
(3, 'vinay singh', '6352777', 'it', 5000.00, 6000, 8, 6.00, 5794.00, 'Paid', 'Bank Transfer', '2025-03-21 08:29:31', '2025-03-21 08:29:31'),
(4, 'fsad', '6352777', 'it', 9000.00, 28, 4, 23.00, 9377.00, 'Paid', 'Bank Transfer', '2025-03-21 08:30:40', '2025-03-21 10:07:04'),
(5, 'rohan singh', '2', 'it jalsfdjas', 16000.00, 25, 53, 232.00, 21068.00, 'Paid', 'Cash', '2025-03-21 09:46:44', '2025-03-21 09:46:44'),
(6, 'rohan singh', '2', 'it jalsfdjas', 16000.00, 25, 53, 232.00, 21068.00, 'Paid', 'Cash', '2025-03-21 09:47:26', '2025-03-21 09:47:26'),
(7, 'rohan singh', '2', 'it jalsfdjas', 16000.00, 25, 53, 232.00, 21068.00, 'Paid', 'Cash', '2025-03-21 09:49:53', '2025-03-21 09:49:53'),
(8, 'Vishal', '4', 'it jalsfdjas', 46433.00, 32, 32, 2323.00, 47310.00, 'Pending', 'Cash', '2025-03-21 09:51:54', '2025-03-21 09:51:54'),
(9, 'Vishal', '4', 'it jalsfdjas', 46433.00, 32, 32, 2323.00, 47310.00, 'Pending', 'Cash', '2025-03-21 09:52:01', '2025-03-21 09:52:01'),
(10, 'Vishal', '4', 'done', 34000.00, 23, 23, 42.00, 36258.00, 'Pending', 'Cash', '2025-03-21 09:57:22', '2025-03-21 09:57:22'),
(11, 'Vishal', '4', 'dsfds', 6000.00, 45, 34, 34.00, 9366.00, 'Pending', 'Cash', '2025-03-21 10:22:01', '2025-03-21 10:22:01');

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
('128JGLKX8WejLG3vIrlbx4UYnLylZaJCIVzyitxp', NULL, '2a02:4780:11:c0de::21', 'Go-http-client/2.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiU3pEMlZQNEljcmZaZkFXdnoyODdQS2RIQnBBVHRPOHhuMlN4NDlpUCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1745037984),
('ePvKNSjvfYSrPR0dWdNMcmQpAlvxK0zsgTsjAaLu', NULL, '2a02:4780:11:c0de::21', 'Go-http-client/2.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiVmx1WVZNNnFsQUl6RVdaWElvZGRPR3ZhNXk2WWV6TVVyNVkwTmE5ZSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1745037984),
('IIsytKDHLdjseh4qVS185A4tkGyhsSTIc837bwhb', 1, '106.219.85.3', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUGtYVlhBRUZsaVlFWnlza2hCZEpXa0llTTR2ZHVxNm9iTDkyekZZbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHBzOi8vZ2FyYWdlLnRoZXp1bW9zcy5jb20vZmluYWwtYmlsbHMvZG93bmxvYWQvMzkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1745038879),
('MvRT4YBBvSOD2rJNlA711bdth6hml1xQSnsOTKBa', 1, '2405:201:300b:79ad:14ce:4364:f7cb:cdde', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTjR2bWhJOVhncWUyNG5ITUZaQTJ5SEJ0QnZtQWNqeER3RzNSOVZmTyI7czozOiJ1cmwiO2E6MDp7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vZ2FyYWdlLnRoZXp1bW9zcy5jb20vZGFzaGJvYXJkIjt9fQ==', 1745040939);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_url` varchar(255) DEFAULT NULL,
  `logo_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `company_name`, `company_url`, `logo_path`, `created_at`, `updated_at`) VALUES
(4, 'Big Nation 7 Infotech', 'https://bignation7infotech.com/', 'images/logo_path/1744894919_logo122.png', '2025-04-17 12:42:44', '2025-04-17 13:01:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `employee_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `employee_id`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$5ApcY5w2nU.CLtgDx/MHfuPE7yvnp3Fa9Un9FpPGdKPjpcCSbmGBO', 'wYY9L52kEnPwudzcQttCMVXEnhn3omT1sl0m9A2EGhrVgsYINoG24CHEmJTu', '2025-03-11 03:47:47', '2025-04-05 05:48:45', 'admin', NULL),
(2, 'rohan singh', 'rohan@gmail.com', NULL, '$2y$12$KDcDaFxrYkFWB/04EfU6SObjlkDDFx.h4ZbpEzPZWS5JsPddlAQG.', NULL, '2025-03-12 23:56:35', '2025-03-12 23:56:35', 'user', 'EMP001'),
(4, 'Vishal', 'vishal@shivikaappbox.com', NULL, '$2y$12$94h13nXEQvoTUPe3.rm99uFPA7IQeMv7dcCrhbsKYBiV7dlSB68YS', NULL, '2025-03-21 06:42:58', '2025-03-21 06:42:58', 'user', 'EMP002'),
(5, 'Ankit Singh Rajput', 'ankitrajput@gmail.com', NULL, '$2y$12$5cEEnfNAzCXbK4g5YVqD0O7lXMdRWHx.LDD6NBxxfTOp0RSUDqIZu', NULL, '2025-04-02 11:56:07', '2025-04-02 11:56:07', 'user', NULL),
(6, 'vinay singh', 'vinayrajput7812@gmail.com', NULL, '$2y$12$kzjyw7rV8JO5XpZt2JI.neiZm3ZjM/LMdCdjnp7HAFldRAz0pjKKC', NULL, '2025-04-04 08:11:00', '2025-04-04 08:11:00', 'user', NULL),
(7, 'Test', 'test@gmail.com', NULL, '$2y$12$qEYohvAoryWANT3DTKuk4.I7Dxu3uI8a3R2rV6h/PIB1Ze/bwnxYC', NULL, '2025-04-08 12:34:07', '2025-04-08 12:34:07', 'user', '2887373');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_checkins`
--

CREATE TABLE `vehicle_checkins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `vehicle_registration_number` varchar(255) NOT NULL,
  `make_model` varchar(255) NOT NULL,
  `year_of_manufacture` int(11) NOT NULL,
  `chassis_number` varchar(255) NOT NULL,
  `engine_number` varchar(255) NOT NULL,
  `fuel_type` enum('Petrol','Diesel','CNG','Electric') NOT NULL,
  `odometer_reading` int(11) NOT NULL,
  `service_type` enum('General Service','Accidental Repair','Periodic Maintenance','Custom Work') NOT NULL,
  `additional_notes` text DEFAULT NULL,
  `car_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`car_images`)),
  `arrival_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pickup_dropoff_mode` enum('Self-drop','Pickup Service') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `battery_number` varchar(255) DEFAULT NULL,
  `car_tire` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_checkins`
--

INSERT INTO `vehicle_checkins` (`id`, `customer_name`, `contact_number`, `email`, `address`, `vehicle_registration_number`, `make_model`, `year_of_manufacture`, `chassis_number`, `engine_number`, `fuel_type`, `odometer_reading`, `service_type`, `additional_notes`, `car_images`, `arrival_datetime`, `pickup_dropoff_mode`, `created_at`, `updated_at`, `battery_number`, `car_tire`) VALUES
(13, 'Rohit rajput', '9889348343', 'rajput@gmail.com', 'indore', 'Mp07 SE 0172', 'Tata Safari', 2022, 'nullable|string|max:255', 'nullable|string|max:255', 'CNG', 5, 'Periodic Maintenance', NULL, '\"images\\/1742451595_slider.jpg\"', '2025-04-01 10:24:38', 'Pickup Service', '2025-03-20 06:19:55', '2025-04-01 10:24:38', NULL, NULL),
(14, 'Neha Singh', '773843343', 'rohanwef@gmail.com', 'rewa', 'Mp07 SE 0171', 'Tata Safari', 2024, 'nullable|string|max:255', 'nullable|string|max:255', 'Electric', 234, 'Accidental Repair', '324fasf', '\"images\\/1742452314_digital marketing slider.png\"', '2025-04-01 10:24:57', 'Pickup Service', '2025-03-20 06:31:54', '2025-04-01 10:24:57', NULL, NULL),
(15, 'Vinay Rajput', '9826316201', 'prafull@bignation7infotech.com', '116 ,PU4 vijay nagar', 'Mp07 SE 0177', 'Honda Amaze 2014', 2013, 'HD_1122334455', 'nullable|string|max:255', 'Petrol', 123000, 'Periodic Maintenance', 'Routent Service and  paint the bonet', '\"images\\/1742639629_digital marketing slider.png\"', '2025-03-22 10:33:49', 'Self-drop', '2025-03-20 09:59:43', '2025-03-22 10:33:49', NULL, NULL),
(16, 'Smarjin methew', '8962532649', 'smarjin1989@gmail.com', 'Singapore township indore', 'MP09CA4880', '1.8lxcorolla', 2006, '1234', 'nullable|string|max:255', 'Petrol', 104000, 'General Service', 'Xyz', '\"images\\/1742910021_17429099883437081095768708396759.jpg\"', '2025-03-25 19:08:00', 'Self-drop', '2025-03-25 13:40:21', '2025-03-25 13:40:21', NULL, NULL),
(17, 'Mr. Mahesh', '81625326494', 'smarjin1989@gmail.com', 'Swasth Nagar indore', 'Mp09cl0307', 'Tata nano', 2012, '6272', 'nullable|string|max:255', 'Petrol', 17211, 'General Service', NULL, '\"images\\/1742966316_17429662761274638610929537624872.jpg\"', '2025-03-28 07:11:58', 'Self-drop', '2025-03-26 05:18:36', '2025-03-26 05:18:36', NULL, NULL),
(19, 'rohit singh', '987654321', 'adimn@gmail.com', 'rewa', 'Mp07 SE 0175', 'Tata Altroz', 2013, 'nullable|string|max:255', 'nullable|string|max:255', 'CNG', 21, 'Periodic Maintenance', 'af', '\"images\\/1742966817_Screenshot 2025-02-18 115025.png\"', '2025-03-28 07:12:49', 'Pickup Service', '2025-03-26 05:26:57', '2025-03-26 05:26:57', NULL, NULL),
(20, 'Rohit singh', '07649007812', 'xyz@gmail.com', 'ss', 'Mp07 SE 0173', 'Tata Nexon EV', 2012, 'nullable|string|max:255', 'nullable|string|max:255', 'Petrol', 22, 'General Service', 'dh', '\"images\\/1742966990_Screenshot 2025-01-24 132652.png\"', '2025-04-01 10:24:00', 'Self-drop', '2025-03-26 05:29:50', '2025-04-01 10:24:00', NULL, NULL),
(21, 'sohan singh', '9649007812', 'xyzdd@gmail.com', 'ssd', 'Mp07 SE 0174', 'Tata Nexon EV', 2012, 'nullable|string|max:255', 'nullable|string|max:255', 'Petrol', 22, 'General Service', 'dh', '\"images\\/1742967083_Screenshot 2025-01-24 132652.png\"', '2025-04-01 10:23:39', 'Self-drop', '2025-03-26 05:31:23', '2025-04-01 10:23:39', NULL, NULL),
(22, 'vinay singh', '07649007812', 'vinayrajput7812@gmail.com', 'all done', 'Mp07 SE 0111', 'Tata Nexon EV', 2014, 'nullable|string|max:255', 'nullable|string|max:255', 'Petrol', 23, 'Custom Work', 'vinay singh', '\"images\\/1742967800_Screenshot 2025-02-18 115025.png\"', '2025-04-01 10:23:23', 'Self-drop', '2025-03-26 05:43:20', '2025-04-01 10:23:23', NULL, NULL),
(23, 'Vinay Rajput', '764904444', 'vinaysingh@gmail.com', 'indore hai', 'mp 17 mm 2331', 'Tata Nexon EV', 2024, 'nullable|string|max:255', 'nullable|string|max:255', 'Petrol', 24, 'Accidental Repair', 'sf', '\"images\\/1743145851_Screenshot 2025-02-17 170519.png\"', '2025-03-29 06:09:21', 'Self-drop', '2025-03-28 07:10:51', '2025-03-29 06:09:21', NULL, NULL),
(24, 'Ankit singh rajput', '6758478334', 'ankitrajput@gmail.com', 'indore', 'Mp07 SE 0202', 'Tata Nexon EV', 2014, 'nullable|string|max:255', 'nullable|string|max:255', 'Diesel', 4, 'General Service', 'alld dofn', '\"images\\/1743419144_Screenshot 2025-02-20 130328.png\"', '2025-03-31 11:11:18', 'Self-drop', '2025-03-31 11:05:44', '2025-03-31 11:11:18', 'fds11111111111', 'sdf323211111111'),
(25, 'rohan singh', '8269074797', 'rajput@gmail.com', 'indore', 'Mp07 SE 0172', 'Tata Nexon EV', 2023, 'nullable|string|max:255', 'nullable|string|max:255', 'Petrol', 3, 'General Service', 'sdf', '\"images\\/1743422089_Screenshot 2025-03-29 123526.png\"', '2025-04-01 12:01:51', 'Self-drop', '2025-03-31 11:54:49', '2025-04-01 12:01:51', 'fds12334334', 'sdf3232'),
(26, 'abhishek', '685948454', 'admin@gmail.com', 'indore', 'mp 17 mm 0002', 'tata', 2012, 'nullable|string|max:255', 'nullable|string|max:255', 'Petrol', 3, 'General Service', 'alld one', '\"images\\/1743581778_Screenshot 2025-01-24 132652.png\"', '2025-04-02 13:46:00', 'Self-drop', '2025-04-02 08:16:18', '2025-04-02 08:16:18', '63525', 'one mrf two mrf three mrf and forth'),
(27, 'Mr. Ramesh mishra', '7999604729', NULL, 'Oister near ralamandal indore', 'Mp09wl5026', 'Hundai alcazar', 2022, 'nullable|string|max:255', 'nullable|string|max:255', 'Petrol', 57838, 'General Service', 'Inter wash, polish, remove water mark', '\"images\\/1743672931_17436727938555939293975043404061.jpg\"', '2025-04-03 13:30:00', 'Pickup Service', '2025-04-03 09:35:31', '2025-04-03 09:35:31', '8900', 'Continantal'),
(28, 'Manoj Tiwari', '8200454542', NULL, 'Sham Nagar nx', 'Jp09cy2740', 'Maruti suzuki & wagonr', 2016, 'nullable|string|max:255', 'nullable|string|max:255', 'Petrol', 9957, 'General Service', 'Caliphar pin repair', '\"images\\/1743674379_17436743111488376362512053954042.jpg\"', '2025-04-03 15:29:00', 'Self-drop', '2025-04-03 09:59:39', '2025-04-03 09:59:39', 'Ci22', 'Apollo'),
(33, 'methew ji', '7649007812', 'ankitrajput@gmail.com', 'indore', 'Mp09 HB 0001', 'Tata Nexon EV', 2013, 'nullable|string|max:255', 'nullable|string|max:255', 'Petrol', 4242, 'General Service', 'demo', '\"images\\/1743768595_icon-256.png\"', '2025-04-04 17:39:00', 'Self-drop', '2025-04-04 12:09:55', '2025-04-04 12:09:55', '8484', 'one mrf two mrf three mrf and forth'),
(34, 'Atul', '9425022242', NULL, 'Shukliya', 'Mp28ca3048', 'Ford figo', 2015, 'nullable|string|max:255', 'nullable|string|max:255', 'Diesel', 168357, 'Custom Work', 'Shocabsorble font and rear', '\"images\\/1743837630_17438375433488041533453582882148.jpg\"', '2025-04-06 12:00:00', 'Pickup Service', '2025-04-05 07:20:30', '2025-04-05 07:20:30', '8772', 'yocohama'),
(35, 'vinuu', '7649007812', 'admin@gmail.com', 'indore\r\nindore', 'Mp07 SE 7777', 'Tata Nexon EV', 2012, 'nullable|string|max:255', 'nullable|string|max:255', 'Petrol', 2, 'General Service', 'dsfa', '\"images\\/1743849223_icon-128.png,images\\/1743849223_icon-256.png,images\\/1743849223_istockphoto-1495829139-612x612.jpg,images\\/1743849223_launcher.png\"', '2025-04-05 10:39:29', 'Self-drop', '2025-04-05 10:33:43', '2025-04-05 10:39:29', 'fds11111111111', 'one mrf two mrf three mrf and forth'),
(36, 'Mr kv ravi', '8349147625', NULL, 'S.A.I.M.S', 'Mp09wk0916', 'Baleno', 2018, 'nullable|string|max:255', 'nullable|string|max:255', 'Petrol', 17104, 'General Service', 'Ac repair', '\"images\\/1744011378_17440113388177198091725588509767.jpg\"', '2025-04-07 13:06:00', 'Pickup Service', '2025-04-07 07:36:18', '2025-04-07 07:36:18', '0577', 'Apollo'),
(37, 'vinay singh', '7649007812', 'adminsss@gmail.com', 'indore', 'Mp07 SE 00022', 'Tata Altroz', 2025, 'nullable|string|max:255', 'nullable|string|max:255', 'Diesel', 3, 'Accidental Repair', 'sadfas', '\"images\\/1744105340_icon-114.png,images\\/1744105340_icon-1281.png,images\\/1744105340_istockphoto-1495829139-612x612.jpg,images\\/1744105340_launcher.png\"', '2025-04-08 15:11:00', 'Self-drop', '2025-04-08 09:42:20', '2025-04-08 09:42:20', 'fds11111111111', 'one mrf two mrf three mrf and forth'),
(38, 'jhsadjsadhsa', '8357011903', 'prafull.bignation7infotech@gmail.com', 'indore', 'mp09ub2882', 'swift', 2006, 'nullable|string|max:255', 'nullable|string|max:255', 'Petrol', 2, 'Accidental Repair', 'sdfhjk', '\"images\\/1744105513_Blue Modern We are Hiring Digital Marketing Instagram Post (3).png,images\\/1744105513_Blue Modern We are Hiring Digital Marketing Instagram Post (2).png,images\\/1744105513_Internship (4).png\"', '2025-04-08 15:15:00', 'Self-drop', '2025-04-08 09:45:13', '2025-04-08 09:45:13', '12345', 'new dsfds'),
(39, 'ankit singh', '8357011903', 'ankit@bignation7infotech.com', 'fasfasfaeeqrsd', 'mp09ub2889', 'swift', 2020, 'nullable|string|max:255', 'nullable|string|max:255', 'Petrol', 3000, 'General Service', 'afsfsaf', '\"images\\/1744105722_6c38312f-a9a6-45ae-97ae-78ee697e9daf.jpeg,images\\/1744105722_5961ca37-4da9-4a35-9814-8ab3cd15cb74 (1).jpeg\"', '2025-04-08 15:18:00', 'Pickup Service', '2025-04-08 09:48:42', '2025-04-08 09:48:42', '4213331', 'new'),
(40, 'Sunny', '9755014480', 'abc@gmail.com', 'Maple Woods', 'Mp09ch1899', 'Maruti Suzuki Ritz', 2010, 'nullable|string|max:255', 'nullable|string|max:255', 'Diesel', 75003, 'General Service', 'Brake pads, full service', '\"\"', '2025-04-08 19:53:00', 'Pickup Service', '2025-04-08 14:23:43', '2025-04-08 14:23:43', '123456', 'Apollo'),
(41, 'Mr sandeep', '8962532649', NULL, 'Dewas nakaindore', 'Mp09wl6823', 'Mahindra kuv 2016', 2016, 'nullable|string|max:255', 'nullable|string|max:255', 'Petrol', 23714, 'General Service', 'Suspension', '\"images\\/1744182299_17441822593691691097732948278211.jpg\"', '2025-04-09 10:34:00', 'Pickup Service', '2025-04-09 07:04:59', '2025-04-09 07:04:59', '811n', 'Mrf'),
(42, 'Mr. Babu mathew', '9826904868', NULL, '19 sarvisuvibha nagar', 'Mp09cg9975', 'Maruti Suzuki & zen estilo', 2010, 'nullable|string|max:255', 'nullable|string|max:255', 'Petrol', 71810, 'General Service', 'Steering repair', '\"images\\/1744263963_17442639328742553157609162263029.jpg\"', '2025-04-10 11:13:00', 'Pickup Service', '2025-04-10 05:46:03', '2025-04-10 05:46:03', NULL, NULL),
(43, 'Mr. Babu mathew', '9826904868', NULL, '19 sarvisuvibha nagar', 'Mp09cg9975', 'Maruti Suzuki & zen estilo', 2010, 'nullable|string|max:255', 'nullable|string|max:255', 'Petrol', 71810, 'General Service', 'Steering repair', '\"images\\/1744264112_17442639328742553157609162263029.jpg\"', '2025-04-10 11:13:00', 'Pickup Service', '2025-04-10 05:48:32', '2025-04-10 05:48:32', '0080', 'Kelly'),
(44, 'Mr.sandeep', '9826904868', NULL, 'Dewas naka', 'Mp09wl6823', 'Xuv 300', 2022, 'nullable|string|max:255', 'nullable|string|max:255', 'Petrol', 23714, 'General Service', 'All service', '\"images\\/1744270974_17442708207923407685515900349027.jpg\"', '2025-04-10 13:10:00', 'Pickup Service', '2025-04-10 07:42:54', '2025-04-10 07:42:54', NULL, 'Wander'),
(45, 'MR. JAY PRAKASH', '7770956662', NULL, '123A PRIME CITY', 'MP09CN3318', 'MARUTI SUZUKI & SWIFT', 2013, 'nullable|string|max:255', 'nullable|string|max:255', 'Petrol', 104686, 'General Service', 'STEERING RACK ,LINKAGE,SHOCUP', '\"\"', '2025-04-14 10:54:19', 'Pickup Service', '2025-04-12 08:50:03', '2025-04-14 10:50:02', '3A31', 'MRF'),
(46, 'Smarjin methew', '8162532649', NULL, 'Singapore township', 'MP09CH3374', 'Maruti Suzuki & ritz', 2010, 'nullable|string|max:255', 'nullable|string|max:255', 'Petrol', 54630, 'General Service', 'Suspension work', '\"images\\/1744610933_17446108888854053517997572607540.jpg\"', '2025-04-14 11:38:00', 'Pickup Service', '2025-04-14 06:08:53', '2025-04-14 06:08:53', '2040', 'Jk'),
(47, 'shivendra singh', '7649007812', 'shivendrarajput@gmail.com', 'rewa', 'mp 17 mm 7777', 'panch', 2024, 'nullable|string|max:255', 'nullable|string|max:255', 'Electric', 3, 'Accidental Repair', 'all done', '\"images\\/1744618985_digital marketing slider.png,images\\/1744618985_icon-128.png,images\\/1744618985_icon-256.png,images\\/1744618985_launcher.png\"', '2025-04-13 13:52:00', 'Pickup Service', '2025-04-14 08:23:05', '2025-04-14 10:49:17', 'fds2222222', 'one mrf two mrf three mrf and forth'),
(48, 'Shailendra Singh', '7879434443', NULL, 'District shore village amla', 'Mp37c1497', 'Hundai& i10', 2012, 'nullable|string|max:255', 'nullable|string|max:255', 'Petrol', 112451, 'General Service', 'Full service', '\"images\\/1744695331_17446951994868320053299703748029.jpg\"', '2025-04-15 11:03:00', 'Pickup Service', '2025-04-15 05:35:31', '2025-04-15 05:35:31', '3125', 'CEAT'),
(49, 'Mr. Methew', '8962532649', NULL, 'Singapore township', 'Mp09cn6640', 'Nissan & tarrano', 2013, 'nullable|string|max:255', 'nullable|string|max:255', 'Diesel', 88281, 'General Service', 'Front glass change', '\"images\\/1744698207_1744698128811626409453118642959.jpg\"', '2025-04-15 11:42:00', 'Pickup Service', '2025-04-15 06:23:27', '2025-04-15 06:23:27', '3472', 'HIFLY'),
(50, 'Sanskriti naik', '8162532649', NULL, 'Singapore township', 'Mp09cr4810', 'Asta & i20', 2015, 'nullable|string|max:255', 'nullable|string|max:255', 'Petrol', 74944, 'General Service', 'Engine repair', '\"images\\/1744785656_17447856134868922977584709708209.jpg\"', '2025-04-16 12:10:00', 'Pickup Service', '2025-04-16 06:40:56', '2025-04-16 06:40:56', '6405', 'CEAT'),
(51, 'Jitendra', '9826904868', NULL, 'Nyi Loha mandi', 'Mp09cm5596', 'Swift & Dzire', 2013, 'nullable|string|max:255', 'nullable|string|max:255', 'Petrol', 83523, 'General Service', 'Polish', '\"images\\/1744786591_17447865457151718852866759125766.jpg\"', '2025-04-16 12:23:00', 'Pickup Service', '2025-04-16 06:56:31', '2025-04-16 06:56:31', '1l04', 'Toyo'),
(52, 'Mr. Ramji', '7974590534', NULL, 'Nand bar colony ban Ganga area', 'Mp09cw7544', 'Datsun & redi go', 2018, 'nullable|string|max:255', 'nullable|string|max:255', 'Petrol', 29945, 'General Service', 'Accident car', '\"\"', '2025-04-17 12:06:00', 'Pickup Service', '2025-04-17 06:37:13', '2025-04-17 06:37:13', NULL, 'CEAT');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_checklists`
--

CREATE TABLE `vehicle_checklists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `part_name` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `rate` decimal(8,2) DEFAULT NULL,
  `vehicle_checkin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_checklists`
--

INSERT INTO `vehicle_checklists` (`id`, `category`, `part_name`, `qty`, `rate`, `vehicle_checkin_id`, `created_at`, `updated_at`) VALUES
(1, 'BODY & FRAME', 'demo', 5, 45.00, 15, '2025-03-22 08:10:43', '2025-03-22 08:10:43'),
(2, 'ENGINE', '4', 4, 444.00, 15, '2025-03-22 08:10:43', '2025-03-22 08:10:43'),
(3, 'BODY & FRAME', 'demo', 22, 33232.00, 14, '2025-03-22 08:20:47', '2025-03-22 08:20:47'),
(4, 'RAT REPELLENT', 'd23', 32, 23.00, 14, '2025-03-22 08:20:47', '2025-03-22 08:20:47'),
(5, 'AC SYSTEM', 'dfkdf', 32, 3000.00, 15, '2025-03-22 09:20:45', '2025-03-22 09:20:45'),
(6, 'RAT REPELLENT', 'd23', 32, 23.00, 15, '2025-03-22 09:20:45', '2025-03-22 09:20:45'),
(7, 'SILENCER COATING', 'ddddd', 4, 3400.00, 15, '2025-03-22 10:36:06', '2025-03-22 10:36:06');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_payments`
--

CREATE TABLE `vendor_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `purchase_date` date NOT NULL,
  `parts_list` text NOT NULL,
  `total_cost` decimal(10,2) NOT NULL,
  `payment_status` enum('Pending','Paid') NOT NULL DEFAULT 'Pending',
  `payment_method` enum('Bank Transfer','UPI','Cash') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_payments`
--

INSERT INTO `vendor_payments` (`id`, `vendor_name`, `invoice_number`, `purchase_date`, `parts_list`, `total_cost`, `payment_status`, `payment_method`, `created_at`, `updated_at`) VALUES
(1, 'rohit', 'hello', '2025-03-17', 'hello', 60000.00, 'Paid', 'Bank Transfer', '2025-03-17 01:59:29', '2025-03-17 01:59:29');

-- --------------------------------------------------------

--
-- Table structure for table `work_assignments`
--

CREATE TABLE `work_assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_checkin_id` bigint(20) UNSIGNED NOT NULL,
  `name_of_work` varchar(255) NOT NULL,
  `completed` tinyint(1) DEFAULT 0,
  `result` varchar(255) DEFAULT NULL,
  `mechanic` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_assignments`
--

INSERT INTO `work_assignments` (`id`, `vehicle_checkin_id`, `name_of_work`, `completed`, `result`, `mechanic`, `created_at`, `updated_at`) VALUES
(2, 13, 'dondfs', 0, 'done', 'sohan343', '2025-03-25 09:44:26', '2025-03-31 11:53:28'),
(3, 14, 'done', 0, 'son', 'sohan', '2025-03-25 10:01:11', '2025-03-25 10:01:11'),
(4, 14, 'hai', 1, 'hai', 'rohan', '2025-03-25 10:01:11', '2025-03-25 10:01:11'),
(5, 14, 'kdo', 1, 'ksdlf', 'don', '2025-03-25 10:01:11', '2025-03-25 10:01:11'),
(6, 15, 'hai', 0, 'ajhkldsf', 'sahlkf', '2025-03-25 10:50:53', '2025-03-25 11:46:26'),
(7, 15, 'ajlkfs', 1, 'aljkfd', 'ajsklf', '2025-03-25 10:50:53', '2025-03-25 11:46:26'),
(8, 15, 'fgdjklgd', 1, 'fdhsk', 'fsf', '2025-03-25 10:50:53', '2025-03-25 11:46:26'),
(9, 15, 'done', 1, 'son', 'sohan', '2025-03-25 10:50:53', '2025-03-25 11:46:26'),
(10, 15, 'dklfsj', 0, 'skhdjf', 'wkhjerf', '2025-03-25 11:45:00', '2025-03-25 11:46:26'),
(11, 15, 'shkdjf', 1, 'jshdf', 'jskfa', '2025-03-25 11:45:00', '2025-03-25 11:46:26'),
(12, 15, 'hello', 0, 'sljkdf', 'vinay', '2025-03-25 11:46:26', '2025-03-25 11:46:26'),
(13, 23, 'sfdgfd', 0, '4543', 'sohan', '2025-03-28 09:37:42', '2025-03-28 09:37:42'),
(14, 23, 'fdsg', 1, '545', 'vinay', '2025-03-28 09:37:42', '2025-03-28 09:37:42'),
(15, 13, 'demo', 1, 'son', '33', '2025-03-31 11:53:28', '2025-03-31 11:53:28'),
(16, 13, 'djkldso', 0, '4543', '7734', '2025-03-31 11:53:28', '2025-03-31 11:53:28'),
(17, 25, 'sfdsfg', 0, '3433', 'asdfasf', '2025-03-31 12:27:39', '2025-03-31 12:27:39'),
(18, 25, 'sdfg', 0, '45', 'sfga', '2025-03-31 12:27:39', '2025-03-31 12:27:39'),
(19, 25, '424', 1, '434', 'sfdg', '2025-03-31 12:27:39', '2025-03-31 12:27:39'),
(20, 26, 'done', 0, '4444', 'sohan', '2025-04-03 09:18:36', '2025-04-03 09:18:36'),
(21, 26, 'dondfs', 1, '343', 'vinay', '2025-04-03 09:18:36', '2025-04-03 09:18:36'),
(22, 43, 'Machanical', 0, 'Pending', 'Jitendra', '2025-04-10 06:33:26', '2025-04-10 06:33:26'),
(23, 44, 'Rear bumper fitting', 0, 'Pending', 'Jitendra', '2025-04-10 08:19:08', '2025-04-10 08:19:08'),
(24, 45, 'ALINGMENT & STEERING', 0, 'PENDING', 'JITENDRA', '2025-04-12 09:41:08', '2025-04-12 09:41:08'),
(25, 46, 'Suspension work', 0, 'Pending', 'Jit7', '2025-04-14 06:16:16', '2025-04-14 06:16:16'),
(26, 49, 'Mechanical', 0, 'Pending', 'Jitendra', '2025-04-15 06:30:13', '2025-04-15 06:30:13'),
(27, 50, 'Engine repair', 0, 'Pending', 'Jitendra', '2025-04-16 06:43:09', '2025-04-16 06:43:09'),
(28, 52, 'Accident', 0, 'Pending', 'Jitendra', '2025-04-17 06:58:51', '2025-04-17 06:58:51');

-- --------------------------------------------------------

--
-- Table structure for table `work_starts`
--

CREATE TABLE `work_starts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_card_id` bigint(20) UNSIGNED NOT NULL,
  `start_date_time` datetime NOT NULL,
  `mechanic_assigned` varchar(255) NOT NULL,
  `parts_purchased` varchar(255) DEFAULT NULL,
  `vendor_name` varchar(255) DEFAULT NULL,
  `invoice_details` varchar(255) DEFAULT NULL,
  `total_parts_cost` decimal(10,2) DEFAULT NULL,
  `estimated_service_charge` decimal(10,2) DEFAULT NULL,
  `margin_calculation` decimal(10,2) DEFAULT NULL,
  `status` enum('In Progress','Completed','Delivered') NOT NULL DEFAULT 'In Progress',
  `customer_notification_sent` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `customer_complaints`
--
ALTER TABLE `customer_complaints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_checkin_id` (`vehicle_checkin_id`);

--
-- Indexes for table `drawback_lists`
--
ALTER TABLE `drawback_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drawback_lists_vehicle_checkin_id_foreign` (`vehicle_checkin_id`);

--
-- Indexes for table `drawback_parts`
--
ALTER TABLE `drawback_parts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drawback_parts_drawback_list_id_foreign` (`drawback_list_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `estimated_inspections`
--
ALTER TABLE `estimated_inspections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estimated_inspections_vehicle_checkin_id_foreign` (`vehicle_checkin_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `final_bills`
--
ALTER TABLE `final_bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inspections`
--
ALTER TABLE `inspections`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `job_cards`
--
ALTER TABLE `job_cards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `job_cards_job_card_number_unique` (`job_card_number`),
  ADD KEY `job_cards_vehicle_checkin_id_foreign` (`vehicle_checkin_id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
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
-- Indexes for table `profit_reports`
--
ALTER TABLE `profit_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicle_checkins`
--
ALTER TABLE `vehicle_checkins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_checklists`
--
ALTER TABLE `vehicle_checklists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_checkin_id` (`vehicle_checkin_id`);

--
-- Indexes for table `vendor_payments`
--
ALTER TABLE `vendor_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_assignments`
--
ALTER TABLE `work_assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_checkin_id` (`vehicle_checkin_id`);

--
-- Indexes for table `work_starts`
--
ALTER TABLE `work_starts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_starts_job_card_id_foreign` (`job_card_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `customer_complaints`
--
ALTER TABLE `customer_complaints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `drawback_lists`
--
ALTER TABLE `drawback_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `drawback_parts`
--
ALTER TABLE `drawback_parts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `estimated_inspections`
--
ALTER TABLE `estimated_inspections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final_bills`
--
ALTER TABLE `final_bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `inspections`
--
ALTER TABLE `inspections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=893;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_cards`
--
ALTER TABLE `job_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `profit_reports`
--
ALTER TABLE `profit_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vehicle_checkins`
--
ALTER TABLE `vehicle_checkins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `vehicle_checklists`
--
ALTER TABLE `vehicle_checklists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vendor_payments`
--
ALTER TABLE `vendor_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `work_assignments`
--
ALTER TABLE `work_assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `work_starts`
--
ALTER TABLE `work_starts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_complaints`
--
ALTER TABLE `customer_complaints`
  ADD CONSTRAINT `customer_complaints_ibfk_1` FOREIGN KEY (`vehicle_checkin_id`) REFERENCES `vehicle_checkins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `drawback_lists`
--
ALTER TABLE `drawback_lists`
  ADD CONSTRAINT `drawback_lists_vehicle_checkin_id_foreign` FOREIGN KEY (`vehicle_checkin_id`) REFERENCES `vehicle_checkins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `drawback_parts`
--
ALTER TABLE `drawback_parts`
  ADD CONSTRAINT `drawback_parts_drawback_list_id_foreign` FOREIGN KEY (`drawback_list_id`) REFERENCES `drawback_lists` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `estimated_inspections`
--
ALTER TABLE `estimated_inspections`
  ADD CONSTRAINT `estimated_inspections_vehicle_checkin_id_foreign` FOREIGN KEY (`vehicle_checkin_id`) REFERENCES `vehicle_checkins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_cards`
--
ALTER TABLE `job_cards`
  ADD CONSTRAINT `job_cards_vehicle_checkin_id_foreign` FOREIGN KEY (`vehicle_checkin_id`) REFERENCES `vehicle_checkins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vehicle_checklists`
--
ALTER TABLE `vehicle_checklists`
  ADD CONSTRAINT `vehicle_checklists_ibfk_1` FOREIGN KEY (`vehicle_checkin_id`) REFERENCES `vehicle_checkins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `work_assignments`
--
ALTER TABLE `work_assignments`
  ADD CONSTRAINT `work_assignments_ibfk_1` FOREIGN KEY (`vehicle_checkin_id`) REFERENCES `vehicle_checkins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `work_starts`
--
ALTER TABLE `work_starts`
  ADD CONSTRAINT `work_starts_job_card_id_foreign` FOREIGN KEY (`job_card_id`) REFERENCES `job_cards` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
