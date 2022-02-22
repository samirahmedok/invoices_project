-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2022 at 06:48 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invoices`
--

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
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_Date` date DEFAULT NULL,
  `Due_date` date DEFAULT NULL,
  `product` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `Amount_collection` decimal(8,2) DEFAULT NULL,
  `Amount_Commission` decimal(8,2) NOT NULL,
  `Discount` decimal(8,2) NOT NULL,
  `Value_VAT` decimal(8,2) NOT NULL,
  `Rate_VAT` varchar(999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Total` decimal(8,2) NOT NULL,
  `Status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Value_Status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Payment_Date` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_number`, `invoice_Date`, `Due_date`, `product`, `section_id`, `Amount_collection`, `Amount_Commission`, `Discount`, `Value_VAT`, `Rate_VAT`, `Total`, `Status`, `Value_Status`, `note`, `Payment_Date`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '98496', '2021-12-02', '2021-12-08', 'watches', 1, '60000.00', '30000.00', '0.00', '2100.00', '7%', '32100.00', 'غير مدفوعه', 'unpaid', NULL, NULL, NULL, '2021-12-02 21:37:02', '2021-12-02 21:37:02'),
(2, '9865', '2021-12-02', '2021-12-12', 'apple', 2, '50000.00', '30000.00', '0.00', '2100.00', '7%', '32100.00', 'مدفوعة', 'paid', NULL, '2021-12-02', NULL, '2021-12-02 21:37:19', '2021-12-02 21:39:15'),
(3, '65312', '2021-12-02', '2021-12-16', 'watches', 1, '30000.00', '20203.00', '0.00', '1212.18', '6%', '21415.18', 'مدفوعة جزئيا', 'partial', NULL, '2021-12-13', NULL, '2021-12-02 21:37:43', '2021-12-02 21:39:24'),
(4, '89564', '2021-12-09', '2021-12-20', 'watches', 1, '800000.00', '30000.00', '6000.00', '1920.00', '8%', '25920.00', 'مدفوعة', 'paid', NULL, '2021-12-03', NULL, '2021-12-02 21:38:09', '2021-12-02 21:39:48'),
(5, '6523', '2021-12-02', '2021-12-05', 'apple', 2, '30000.00', '10000.00', '0.00', '900.00', '9%', '10900.00', 'غير مدفوعه', 'unpaid', NULL, NULL, NULL, '2021-12-02 21:40:09', '2021-12-02 21:40:09'),
(6, '56255', '2021-12-02', '2021-12-23', 'watches', 1, '30000.00', '5000.00', '0.00', '450.00', '9%', '5450.00', 'مدفوعة جزئيا', 'partial', NULL, '2021-12-03', NULL, '2021-12-02 21:40:39', '2021-12-02 21:40:53'),
(7, '123111', '2021-12-03', '2021-12-04', 'watches', 1, '20000.00', '5000.00', '0.00', '500.00', '10%', '5500.00', 'غير مدفوعه', 'unpaid', NULL, NULL, NULL, '2021-12-03 10:47:28', '2021-12-03 10:47:28'),
(8, '744744', '2021-12-03', '2021-12-04', 'apple', 2, '50000.00', '20000.00', '0.00', '1400.00', '7%', '21400.00', 'غير مدفوعه', 'unpaid', NULL, NULL, NULL, '2021-12-03 10:52:06', '2021-12-03 10:52:06'),
(13, '59545656', '2021-12-03', '2021-12-04', 'watches', 1, '3000.00', '1000.00', '0.00', '100.00', '10%', '1100.00', 'غير مدفوعه', 'unpaid', NULL, NULL, NULL, '2021-12-03 12:34:01', '2021-12-03 12:34:01'),
(14, '74444', '2021-12-03', '2021-12-09', 'apple', 2, '9999.00', '6000.00', '0.00', '420.00', '7%', '6420.00', 'غير مدفوعه', 'unpaid', NULL, NULL, NULL, '2021-12-03 12:34:23', '2021-12-03 12:34:23'),
(15, '2858952', '2021-12-04', '2021-12-05', 'watches', 1, '90000.00', '40000.00', '0.00', '3600.00', '9%', '43600.00', 'غير مدفوعه', 'unpaid', NULL, NULL, NULL, '2021-12-03 15:42:48', '2021-12-03 15:42:48');

-- --------------------------------------------------------

--
-- Table structure for table `invoices_attachments`
--

CREATE TABLE `invoices_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Created_by` varchar(999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices_attachments`
--

INSERT INTO `invoices_attachments` (`id`, `file_name`, `invoice_number`, `Created_by`, `invoice_id`, `created_at`, `updated_at`) VALUES
(1, 'personal_img.jpg', '98496', 'ahmed samir', 1, '2021-12-12 13:47:02', '2021-12-12 13:47:02');

-- --------------------------------------------------------

--
-- Table structure for table `invoices_details`
--

CREATE TABLE `invoices_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Value_Status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Payment_Date` date DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices_details`
--

INSERT INTO `invoices_details` (`id`, `invoice_id`, `invoice_number`, `product`, `section`, `Status`, `Value_Status`, `Payment_Date`, `note`, `user`, `created_at`, `updated_at`) VALUES
(1, 1, '98496', 'watches', '1', 'غير مدفوعه', 'unpaid', NULL, NULL, 'ahmed samir', '2021-12-02 21:37:02', '2021-12-02 21:37:02'),
(2, 2, '9865', 'apple', '2', 'غير مدفوعه', 'unpaid', NULL, NULL, 'ahmed samir', '2021-12-02 21:37:19', '2021-12-02 21:37:19'),
(3, 3, '65312', 'watches', '1', 'غير مدفوعه', 'unpaid', NULL, NULL, 'ahmed samir', '2021-12-02 21:37:43', '2021-12-02 21:37:43'),
(4, 4, '89564', 'watches', '1', 'غير مدفوعه', 'unpaid', NULL, NULL, 'ahmed samir', '2021-12-02 21:38:09', '2021-12-02 21:38:09'),
(5, 2, '9865', 'apple', '2', 'مدفوعة', 'paid', '2021-12-02', NULL, 'ahmed samir', '2021-12-02 21:39:15', '2021-12-02 21:39:15'),
(6, 3, '65312', 'watches', '1', 'مدفوعة جزئيا', 'partial', '2021-12-13', NULL, 'ahmed samir', '2021-12-02 21:39:24', '2021-12-02 21:39:24'),
(7, 4, '89564', 'watches', '1', 'مدفوعة', 'paid', '2021-12-03', NULL, 'ahmed samir', '2021-12-02 21:39:48', '2021-12-02 21:39:48'),
(8, 5, '6523', 'apple', '2', 'غير مدفوعه', 'unpaid', NULL, NULL, 'ahmed samir', '2021-12-02 21:40:09', '2021-12-02 21:40:09'),
(9, 6, '56255', 'watches', '1', 'غير مدفوعه', 'unpaid', NULL, NULL, 'ahmed samir', '2021-12-02 21:40:39', '2021-12-02 21:40:39'),
(10, 6, '56255', 'watches', '1', 'مدفوعة جزئيا', 'partial', '2021-12-03', NULL, 'ahmed samir', '2021-12-02 21:40:53', '2021-12-02 21:40:53'),
(11, 7, '123111', 'watches', '1', 'غير مدفوعه', 'unpaid', NULL, NULL, 'ashraf', '2021-12-03 10:47:28', '2021-12-03 10:47:28'),
(12, 8, '744744', 'apple', '2', 'غير مدفوعه', 'unpaid', NULL, NULL, 'ashraf', '2021-12-03 10:52:06', '2021-12-03 10:52:06'),
(17, 13, '59545656', 'watches', '1', 'غير مدفوعه', 'unpaid', NULL, NULL, 'ahmed samir', '2021-12-03 12:34:01', '2021-12-03 12:34:01'),
(18, 14, '74444', 'apple', '2', 'غير مدفوعه', 'unpaid', NULL, NULL, 'ahmed samir', '2021-12-03 12:34:23', '2021-12-03 12:34:23'),
(19, 15, '2858952', 'watches', '1', 'غير مدفوعه', 'unpaid', NULL, NULL, 'ahmed samir', '2021-12-03 15:42:48', '2021-12-03 15:42:48');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_archives`
--

CREATE TABLE `invoice_archives` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(5, '2021_10_24_121755_create_sections_table', 1),
(6, '2021_10_25_211743_create_invoices_table', 1),
(7, '2021_10_28_163252_create_products_table', 1),
(8, '2021_11_01_200419_create_invoices_details_table', 1),
(9, '2021_11_01_201652_create_invoices_attachments_table', 1),
(10, '2021_11_14_181441_create_invoice_archives_table', 1),
(11, '2021_11_17_144729_create_permission_tables', 1),
(12, '2021_12_02_223440_create_notifications_table', 1);

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
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('7601aa8f-b368-4b01-b71b-a9f9481e5e38', 'App\\Notifications\\added_invoice', 'App\\Models\\User', 1, '{\"id\":9,\"title\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u0641\\u0627\\u062a\\u0648\\u0631\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0647 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629 :\",\"user\":\"ahmed samir\"}', '2021-12-03 12:03:17', '2021-12-03 11:40:41', '2021-12-03 12:03:17'),
('a44cf835-3dc5-4531-adb4-26317f64161f', 'App\\Notifications\\added_invoice', 'App\\Models\\User', 1, '{\"id\":14,\"title\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u0641\\u0627\\u062a\\u0648\\u0631\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0647 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629 :\",\"user\":\"ahmed samir\"}', '2021-12-12 13:46:48', '2021-12-03 12:34:23', '2021-12-12 13:46:48'),
('b2b7f718-abd9-44d0-9fe4-9058529c33b7', 'App\\Notifications\\added_invoice', 'App\\Models\\User', 1, '{\"id\":13,\"title\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u0641\\u0627\\u062a\\u0648\\u0631\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0647 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629 :\",\"user\":\"ahmed samir\"}', '2021-12-12 13:46:48', '2021-12-03 12:34:01', '2021-12-12 13:46:48'),
('b2c26cfa-4660-4159-9313-1cf11ed378d5', 'App\\Notifications\\added_invoice', 'App\\Models\\User', 1, '{\"id\":11,\"title\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u0641\\u0627\\u062a\\u0648\\u0631\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0647 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629 :\",\"user\":\"ahmed samir\"}', '2021-12-03 12:32:14', '2021-12-03 12:31:52', '2021-12-03 12:32:14'),
('bd22ca0d-fb1e-4b15-bb5b-3736f3c97843', 'App\\Notifications\\added_invoice', 'App\\Models\\User', 1, '{\"id\":10,\"title\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u0641\\u0627\\u062a\\u0648\\u0631\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0647 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629 :\",\"user\":\"ahmed samir\"}', '2021-12-03 12:31:01', '2021-12-03 12:10:45', '2021-12-03 12:31:01'),
('d4384678-031a-41d1-8e3b-a3a05c5ea054', 'App\\Notifications\\added_invoice', 'App\\Models\\User', 1, '{\"id\":15,\"title\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u0641\\u0627\\u062a\\u0648\\u0631\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0647 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629 :\",\"user\":\"ahmed samir\"}', '2021-12-12 13:46:48', '2021-12-03 15:42:49', '2021-12-12 13:46:48'),
('f1d190c3-5050-4353-9e20-33bf6777b428', 'App\\Notifications\\added_invoice', 'App\\Models\\User', 1, '{\"id\":12,\"title\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u0641\\u0627\\u062a\\u0648\\u0631\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0647 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629 :\",\"user\":\"ahmed samir\"}', '2021-12-03 12:32:14', '2021-12-03 12:32:09', '2021-12-03 12:32:14'),
('f77e7de5-aa6e-4d56-886a-69c20953d4ce', 'App\\Notifications\\added_invoice', 'App\\Models\\User', 3, '{\"id\":8,\"title\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u0641\\u0627\\u062a\\u0648\\u0631\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0647 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629 :\",\"user\":\"ashraf\"}', NULL, '2021-12-03 10:52:06', '2021-12-03 10:52:06');

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
(1, 'الفواتير', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(2, 'قائمة الفواتير', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(3, 'الفواتير المدفوعة', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(4, 'الفواتير المدفوعة جزئيا', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(5, 'الفواتير الغير مدفوعة', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(6, 'ارشيف الفواتير', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(7, 'التقارير', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(8, 'تقرير الفواتير', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(9, 'تقرير العملاء', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(10, 'المستخدمين', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(11, 'قائمة المستخدمين', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(12, 'صلاحيات المستخدمين', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(13, 'الاعدادات', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(14, 'المنتجات', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(15, 'الاقسام', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(16, 'اضافة فاتورة', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(17, 'حذف الفاتورة', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(18, 'تصدير EXCEL', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(19, 'تغير حالة الدفع', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(20, 'تعديل الفاتورة', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(21, 'ارشفة الفاتورة', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(22, 'طباعةالفاتورة', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(23, 'اضافة مرفق', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(24, 'حذف المرفق', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(25, 'اضافة مستخدم', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(26, 'تعديل مستخدم', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(27, 'حذف مستخدم', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(28, 'عرض صلاحية', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(29, 'اضافة صلاحية', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(30, 'تعديل صلاحية', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(31, 'حذف صلاحية', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(32, 'اضافة منتج', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(33, 'تعديل منتج', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(34, 'حذف منتج', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(35, 'اضافة قسم', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(36, 'تعديل قسم', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(37, 'حذف قسم', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51'),
(38, 'الاشعارات', 'web', '2021-12-02 21:31:51', '2021-12-02 21:31:51');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `description`, `section_id`, `created_at`, `updated_at`) VALUES
(1, 'watches', NULL, 1, '2021-12-02 21:36:27', '2021-12-02 21:36:27'),
(2, 'apple', NULL, 2, '2021-12-02 21:36:37', '2021-12-02 21:36:37');

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
(1, 'Owner', 'web', '2021-12-02 21:32:15', '2021-12-02 21:32:15'),
(2, 'user', 'web', '2021-12-03 10:41:09', '2021-12-03 10:41:09');

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
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(16, 1),
(16, 2),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `section_name`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'al-ahli bank', NULL, 'ahmed samir', '2021-12-02 21:36:13', '2021-12-02 21:36:13'),
(2, 'cib bank', NULL, 'ahmed samir', '2021-12-02 21:36:19', '2021-12-02 21:36:19');

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
  `roles_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `roles_name`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ahmed samir', 'ahmedsamiramin100@gmail.com', NULL, '$2y$10$bXM5yivT5myNQXiTIULPyeYoc1TBycRRGp35WtIgXoZ/QA.8iYJFa', '[\"Owner\"]', 'مفعل', NULL, '2021-12-02 21:32:15', '2021-12-02 21:32:15'),
(2, 'ramy', 'ramy@gmail.com', NULL, '$2y$10$F47s6i5yWamrcswGVEXAzemgQfbkz9xm0vMNSp9m5gDS0kSNq1hdG', '[\"user\"]', 'مفعل', NULL, '2021-12-03 10:41:38', '2021-12-03 10:41:38'),
(3, 'ashraf', 'ashraf@gmail.com', NULL, '$2y$10$CZfG8gZQcdI2v6LbQF5/leqo1Ss8NQX042Ws7HWXlGK30V5Kmmj.y', '[\"Owner\"]', 'مفعل', NULL, '2021-12-03 10:46:18', '2021-12-03 10:46:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_section_id_foreign` (`section_id`);

--
-- Indexes for table `invoices_attachments`
--
ALTER TABLE `invoices_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_attachments_invoice_id_foreign` (`invoice_id`);

--
-- Indexes for table `invoices_details`
--
ALTER TABLE `invoices_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_details_invoice_id_foreign` (`invoice_id`);

--
-- Indexes for table `invoice_archives`
--
ALTER TABLE `invoice_archives`
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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_section_id_foreign` (`section_id`);

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
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `invoices_attachments`
--
ALTER TABLE `invoices_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoices_details`
--
ALTER TABLE `invoices_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `invoice_archives`
--
ALTER TABLE `invoice_archives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoices_attachments`
--
ALTER TABLE `invoices_attachments`
  ADD CONSTRAINT `invoices_attachments_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoices_details`
--
ALTER TABLE `invoices_details`
  ADD CONSTRAINT `invoices_details_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
