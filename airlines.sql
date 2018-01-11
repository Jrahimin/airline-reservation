-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 10, 2018 at 12:46 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airlines`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_details` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `passenger_info` text COLLATE utf8mb4_unicode_ci,
  `seat_selected_departure` text COLLATE utf8mb4_unicode_ci,
  `seat_selected_destination` text COLLATE utf8mb4_unicode_ci,
  `collector_info` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `description`, `location`, `image_url`, `status`, `created_at`, `updated_at`, `deleted_at`, `telephone`, `account_number`) VALUES
(1, 'Tour-Trip International Ferry Company', 'good', '10/L, Noya Paltan, Dhaka', 'images/company_logo/2380542d-25f6-4a2d-92c2-4372a6c4af1a.jpg', 1, '2017-12-05 23:20:14', '2018-01-09 06:22:02', NULL, '12345678901', '1532fbe6-e6ac-4d49-898f-293412b71a7d'),
(2, 'Byte-Lab Family Tour', 'many', 'noya paltan masjid road, dhaka', 'images/company_logo/66d7f9a4-675d-4f40-9f03-aecb56370bbb.jpg', 1, '2017-12-05 23:20:44', '2018-01-07 23:59:04', NULL, '80970790790', '7ccf26aa-b0df-434d-abb4-89d7d9f241ca');

-- --------------------------------------------------------

--
-- Table structure for table `ferries`
--

DROP TABLE IF EXISTS `ferries`;
CREATE TABLE IF NOT EXISTS `ferries` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_seat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `captain_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_crew` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ferries`
--

INSERT INTO `ferries` (`id`, `name`, `image_url`, `number_of_seat`, `created_at`, `updated_at`, `deleted_at`, `status`, `captain_name`, `number_of_crew`, `company_id`) VALUES
(1, 'Large', 'images/ferry_logo/d3ed1279-4be3-4bb3-91d7-bfd946e92cc4.jpg', 250, '2017-12-05 23:21:28', '2017-12-05 23:21:28', NULL, 1, 'Amin', 25, 1),
(2, 'Heavy', 'images/ferry_logo/56fc0235-9713-4eff-b9ee-3ebb203be2ca.jpg', 300, '2017-12-10 22:22:06', '2017-12-10 22:22:06', NULL, 1, 'Alam', 22, 2);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_04_07_083602_add_different_usertype_column_to_users_table', 1),
(4, '2017_04_07_122516_set_staff_user_and_user_default', 1),
(5, '2017_04_10_044356_remove_differentUserField', 1),
(6, '2017_04_10_044810_add_field_role_to_user', 1),
(7, '2017_04_10_094221_softDeleting_to_users_table', 1),
(8, '2017_04_10_100218_removing_status_field', 1),
(9, '2017_04_11_054251_create_table_ferries', 1),
(10, '2017_04_11_061411_create_table_trips', 1),
(11, '2017_04_13_092008_deleteing_field_from_ferries_table', 1),
(12, '2017_04_13_092839_add_three_field_to_ferries_table', 1),
(13, '2017_04_17_040445_create_passenger_types_table', 1),
(14, '2017_04_17_061357_create_ports_table', 1),
(15, '2017_04_17_075414_drop_column_longitude_and_latitude_in_port_table', 1),
(16, '2017_04_17_075702_create_again_longitude_and_latitude_to_port_table', 1),
(17, '2017_04_17_081903_add_status_field_to_port', 1),
(18, '2017_04_17_082331_add_default_value_to_status_field_to_port_table', 1),
(19, '2017_04_17_084337_changing_two_fields_type_to_port_table', 1),
(20, '2017_04_17_092523_drop_field_status_for_field_type', 1),
(21, '2017_04_17_092712_to_make_status_field_tinyint_and_default_one', 1),
(22, '2017_04_17_105337_modifying_latitude_and_longitude', 1),
(23, '2017_04_17_110453_modifying_latitude_and_longitude_again', 1),
(24, '2017_04_18_034541_deleting_country_field_from_port_table', 1),
(25, '2017_04_18_083222_changing_length_country_code_to_ports_table', 1),
(26, '2017_04_19_082236_drop_name_field_from_trips', 1),
(27, '2017_04_19_082432_add_fields_to_trips_table', 1),
(28, '2017_04_19_095654_trips_table_creation_with_fields', 1),
(29, '2017_04_19_104040_create_passenger_price', 1),
(30, '2017_04_19_120750_add_id_in_Trip_passenger_price', 1),
(31, '2017_04_27_085001_create_settings_table', 1),
(32, '2017_05_20_005809_create_company_table', 1),
(33, '2017_05_22_182041_add_telephone_and_account_number_to_company_table', 1),
(34, '2017_05_22_183112_add_company_id_to_users_table', 1),
(35, '2017_05_22_190735_add_company_id_to_ferry_table', 1),
(36, '2017_05_22_190954_add_company_id_to_trip_table', 1),
(37, '2017_05_30_192003_create_cart_details_table', 1),
(38, '2017_05_30_202145_deleting_column_of_cart_details', 1),
(39, '2017_05_30_202724_drop_card_details_table', 1),
(40, '2017_05_30_210043_create_cart_table', 1),
(41, '2017_06_01_230522_add_column_updated_cart_details', 1),
(42, '2017_06_02_002913_add_column_in_cart_table', 1),
(43, '2017_06_02_003725_drop_updaetd_cart_details_from_cart_table', 1),
(44, '2017_08_10_192905_add_field_ferry_seat_and_remaining_seat_in_trip_table', 1),
(45, '2017_08_11_165919_create_customer_table', 1),
(46, '2017_08_11_183645_create_tickets_table', 1),
(47, '2017_08_11_193534_add_field_customer_table', 1),
(48, '2017_08_11_234746_change_table_name', 1),
(49, '2017_08_28_214805_add_field_to_order', 1),
(50, '2017_09_28_084001_rename_price_id_to_price_in_trip_passenger_price_table', 1),
(51, '2017_09_28_084433_change_int_float_price_in_trip_passenger_price_table', 1),
(52, '2017_12_06_060653_create_passengers_table', 2),
(53, '2017_12_06_103813_add_field_to_passengers', 3),
(54, '2017_12_08_034904_add_deleted_at_to_tickets', 4),
(56, '2017_12_11_050656_add_price_to_tickets', 5),
(57, '2017_12_12_053506_add_code_to_passengers', 6),
(58, '2017_12_12_063624_add_code_to_passenger', 7),
(59, '2017_12_13_042626_add_order_id_to_tickets', 8),
(60, '2017_12_13_043702_create_order_new', 9),
(61, '2017_12_13_045221_create_orders_table_fresh', 10),
(62, '2017_12_13_070640_add_company_id_to_tickets', 11),
(63, '2017_12_14_054600_add_order_type_trip_to_orders', 12),
(64, '2017_12_14_080812_add_depart_destination_to_orders', 13),
(65, '2017_12_14_105046_add_soft_delete_to_passengers', 14),
(66, '2016_06_01_000001_create_oauth_auth_codes_table', 15),
(67, '2016_06_01_000002_create_oauth_access_tokens_table', 15),
(68, '2016_06_01_000003_create_oauth_refresh_tokens_table', 15),
(69, '2016_06_01_000004_create_oauth_clients_table', 15),
(70, '2016_06_01_000005_create_oauth_personal_access_clients_table', 15),
(72, '2017_12_27_044809_add_checked_to_ticket', 16),
(73, '2017_12_27_063738_change_field_trips', 17),
(74, '2017_12_27_100516_add_dateTime_tickets', 18);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_id`, `model_type`) VALUES
(7, 2, 'App\\User'),
(12, 1, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('810e4b710b365bd8e27a403d761c51f10dcf7a6e1684794af18d051b90ca8bb17a5e69cbf2f392e1', 2, 1, 'MyApp', '[]', 0, '2017-12-26 22:38:32', '2017-12-26 22:38:32', '2018-12-27 04:38:32'),
('af82c3da2d4627835a042411bf1c20ac2e6d09e8dbe4131d474ddb5ab88561262ee478e9cf2ad89c', 2, 1, 'MyApp', '[]', 0, '2017-12-28 00:14:35', '2017-12-28 00:14:35', '2018-12-28 06:14:35'),
('840e83c5031a9336424538c75f292fbecbcf3330721910b6b9b465da3c615ce1be5969b2ee6cee02', 1, 1, 'MyApp', '[]', 0, '2018-01-02 04:15:25', '2018-01-02 04:15:25', '2019-01-02 10:15:25'),
('3714585b08189e6a51d242aaeafadba10b5d5056a14c5142e5bbb464aec75e953971565331d6e42b', 1, 1, 'MyApp', '[]', 0, '2018-01-03 12:32:33', '2018-01-03 12:32:33', '2019-01-03 05:32:33'),
('7a2cc01028abda533e46a63a13151c7c054bec05a1460adb6344918f088de6fd3612bda443458154', 2, 1, 'MyApp', '[]', 0, '2018-01-03 02:31:23', '2018-01-03 02:31:23', '2019-01-03 08:31:23');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Ferry Ticketing Personal Access Client', 'LyIYJNqA3X2beW6U6hD8UiMTKScd4uWXQdRo0cLY', 'http://localhost', 1, 0, 0, '2017-12-26 22:32:43', '2017-12-26 22:32:43'),
(2, NULL, 'Ferry Ticketing Password Grant Client', 'cMNR4VE6ET6knbdWB97xMfBx3S4ZoHyUmPaLOyju', 'http://localhost', 0, 1, 0, '2017-12-26 22:32:44', '2017-12-26 22:32:44'),
(3, NULL, 'Laravel Personal Access Client', 'BZO1GmVIUWj4ikGxsIIDqpkrPNv5rLaS9tFXZccf', 'http://localhost', 1, 0, 0, '2018-01-10 05:13:56', '2018-01-10 05:13:56'),
(4, NULL, 'Laravel Password Grant Client', 'FQnNygOHW7dPV6KNktxTPuaCWy0Z8HosoXIZE5w4', 'http://localhost', 0, 1, 0, '2018-01-10 05:13:56', '2018-01-10 05:13:56');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-12-26 22:32:44', '2017-12-26 22:32:44'),
(2, 3, '2018-01-10 05:13:56', '2018-01-10 05:13:56');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `trip_type` int(10) UNSIGNED NOT NULL,
  `departure_trip_id` int(10) UNSIGNED NOT NULL,
  `return_trip_id` int(10) UNSIGNED DEFAULT NULL,
  `departure_port_id` int(10) UNSIGNED NOT NULL,
  `destination_port_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `email`, `contact_no`, `created_at`, `updated_at`, `deleted_at`, `trip_type`, `departure_trip_id`, `return_trip_id`, `departure_port_id`, `destination_port_id`) VALUES
(1, 'jr@gmail.com', '01846699876', '2018-01-03 12:40:05', '2018-01-03 12:40:05', NULL, 2, 2, 11, 1, 2),
(2, 'jr@gmail.com', '01846699876', '2018-01-03 12:52:23', '2018-01-03 12:52:23', NULL, 2, 2, 11, 1, 2),
(3, 'algrims@gmail.com', '08097097809809', '2018-01-03 12:53:04', '2018-01-03 12:53:04', NULL, 1, 2, NULL, 1, 2),
(4, 'algrims@gmail.com', '08097097809809', '2018-01-03 12:53:30', '2018-01-03 12:53:30', NULL, 1, 2, NULL, 1, 2),
(5, 'algrims@gmail.com', '00997716554', '2018-01-03 12:54:23', '2018-01-03 12:54:23', NULL, 1, 10, NULL, 2, 1),
(6, 'jr@gmail.com', '070976900', '2018-01-03 04:20:53', '2018-01-03 04:20:53', NULL, 1, 2, NULL, 1, 2),
(7, 'jr@gmail.com', '070976900', '2018-01-03 04:22:41', '2018-01-03 04:22:41', NULL, 1, 2, NULL, 1, 2),
(8, 'jr@gmail.com', '070976900', '2018-01-03 04:23:33', '2018-01-03 04:23:33', NULL, 1, 2, NULL, 1, 2),
(9, 'jr@gmail.com', '070976900', '2018-01-03 04:32:06', '2018-01-03 04:32:06', NULL, 1, 2, NULL, 1, 2),
(10, 'jr@gmail.com', '070976900', '2018-01-03 04:42:00', '2018-01-03 04:42:00', NULL, 1, 2, NULL, 1, 2),
(11, 'algrims@gmail.com', '00997716554', '2018-01-03 04:53:18', '2018-01-03 04:53:18', NULL, 2, 2, 11, 1, 2),
(12, 'algrims@gmail.com', '00997716554', '2018-01-03 05:43:11', '2018-01-03 05:43:11', NULL, 2, 2, 11, 1, 2),
(13, 'algrims@gmail.com', '00997716554', '2018-01-03 05:43:29', '2018-01-03 05:43:29', NULL, 2, 2, 11, 1, 2),
(14, 'algrims@gmail.com', '00997716554', '2018-01-03 05:56:31', '2018-01-03 05:56:31', NULL, 2, 2, 11, 1, 2),
(15, 'algrims@gmail.com', '00997716554', '2018-01-03 05:58:01', '2018-01-03 05:58:01', NULL, 2, 2, 11, 1, 2),
(16, 'algrims@gmail.com', '00997716554', '2018-01-03 06:01:01', '2018-01-03 06:01:01', NULL, 2, 2, 11, 1, 2),
(17, 'algrims@gmail.com', '00997716554', '2018-01-03 06:01:21', '2018-01-03 06:01:21', NULL, 2, 2, 11, 1, 2),
(18, 'algrims@gmail.com', '00997716554', '2018-01-03 06:02:42', '2018-01-03 06:02:42', NULL, 2, 2, 11, 1, 2),
(19, 'algrims@gmail.com', '00997716554', '2018-01-03 06:03:16', '2018-01-03 06:03:16', NULL, 2, 2, 11, 1, 2),
(20, 'algrims@gmail.com', '00997716554', '2018-01-03 06:04:39', '2018-01-03 06:04:39', NULL, 2, 2, 11, 1, 2),
(21, 'algrims@gmail.com', '00997716554', '2018-01-03 06:05:54', '2018-01-03 06:05:54', NULL, 2, 2, 11, 1, 2),
(22, 'algrims@gmail.com', '08097097809809', '2018-01-03 06:13:11', '2018-01-03 06:13:11', NULL, 2, 2, 11, 1, 2),
(23, 'algrims@gmail.com', '08097097809809', '2018-01-03 06:15:22', '2018-01-03 06:15:22', NULL, 2, 2, 11, 1, 2),
(24, 'algrims@gmail.com', '00997716554', '2018-01-03 22:49:22', '2018-01-03 22:49:22', NULL, 2, 3, 12, 1, 2),
(25, 'algrims@gmail.com', '00997716554', '2018-01-03 22:50:01', '2018-01-03 22:50:01', NULL, 2, 3, 12, 1, 2),
(26, 'algrims@gmail.com', '00997716554', '2018-01-03 22:51:28', '2018-01-03 22:51:28', NULL, 2, 3, 12, 1, 2),
(27, 'algrims@gmail.com', '00997716554', '2018-01-03 22:52:06', '2018-01-03 22:52:06', NULL, 2, 3, 12, 1, 2),
(28, 'algrims@gmail.com', '00997716554', '2018-01-03 23:01:33', '2018-01-03 23:01:33', NULL, 2, 3, 12, 1, 2),
(29, 'algrims@gmail.com', '00997716554', '2018-01-03 23:02:40', '2018-01-03 23:02:40', NULL, 2, 3, 12, 1, 2),
(30, 'jr@gmail.com', '070976900', '2018-01-03 23:09:08', '2018-01-03 23:09:08', NULL, 2, 2, NULL, 1, 2),
(31, 'jr@gmail.com', '070976900', '2018-01-03 23:09:49', '2018-01-03 23:09:49', NULL, 2, 2, NULL, 1, 2),
(32, 'jr@gmail.com', '070976900', '2018-01-03 23:10:21', '2018-01-03 23:10:21', NULL, 2, 2, NULL, 1, 2),
(33, 'jr@gmail.com', '070976900', '2018-01-03 23:13:19', '2018-01-03 23:13:19', NULL, 2, 2, NULL, 1, 2),
(34, 'jr@gmail.com', '070976900', '2018-01-03 23:14:05', '2018-01-03 23:14:05', NULL, 2, 2, 12, 1, 2),
(35, 'jr@gmail.com', '070976900', '2018-01-03 23:14:36', '2018-01-03 23:14:36', NULL, 1, 2, 12, 1, 2),
(36, 'jr@gmail.com', '070976900', '2018-01-03 23:16:44', '2018-01-03 23:16:44', NULL, 2, 2, 12, 1, 2),
(37, 'algrims@gmail.com', '08097097809809', '2018-01-04 02:23:35', '2018-01-04 02:23:35', NULL, 2, 3, 12, 1, 2),
(38, 'algrims@gmail.com', '08097097809809', '2018-01-04 02:43:47', '2018-01-04 02:43:47', NULL, 2, 3, 12, 1, 2),
(39, 'algrims@gmail.com', '08097097809809', '2018-01-04 02:46:43', '2018-01-04 02:46:43', NULL, 2, 3, 12, 1, 2),
(40, 'algrims@gmail.com', '08097097809809', '2018-01-04 02:48:21', '2018-01-04 02:48:21', NULL, 2, 3, 12, 1, 2),
(41, 'algrims@gmail.com', '08097097809809', '2018-01-04 02:52:40', '2018-01-04 02:52:40', NULL, 2, 3, 12, 1, 2),
(42, 'algrims@gmail.com', '08097097809809', '2018-01-04 02:53:18', '2018-01-04 02:53:18', NULL, 2, 3, 12, 1, 2),
(43, 'algrims@gmail.com', '08097097809809', '2018-01-04 02:53:38', '2018-01-04 02:53:38', NULL, 2, 3, 12, 1, 2),
(44, 'algrims@gmail.com', '08097097809809', '2018-01-04 02:55:20', '2018-01-04 02:55:20', NULL, 2, 3, 12, 1, 2),
(45, 'algrims@gmail.com', '08097097809809', '2018-01-04 02:55:57', '2018-01-04 02:55:57', NULL, 2, 3, 12, 1, 2),
(46, 'jr@gmail.com', '070976900', '2018-01-04 03:32:25', '2018-01-04 03:32:25', NULL, 2, 2, 12, 1, 2),
(47, 'jr@gmail.com', '070976900', '2018-01-04 03:40:58', '2018-01-04 03:40:58', NULL, 2, 2, 12, 1, 2),
(48, 'jr@gmail.com', '66666666', '2018-01-04 03:43:30', '2018-01-04 03:43:30', NULL, 2, 2, 12, 1, 2),
(49, 'jr@gmail.com', '66666666', '2018-01-05 05:04:34', '2018-01-05 05:04:34', NULL, 2, 2, 12, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

DROP TABLE IF EXISTS `passengers`;
CREATE TABLE IF NOT EXISTS `passengers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_exp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type_id` int(11) NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `passengers`
--

INSERT INTO `passengers` (`id`, `name`, `gender`, `dob`, `nationality`, `passport_no`, `passport_exp`, `ticket_id`, `created_at`, `updated_at`, `type_id`, `code`, `deleted_at`) VALUES
(1, 'jamil', 'Male', '2017-09-20', 'bangladeshi', '112121212111', '2018-01-25', 1, '2018-01-03 12:40:05', '2018-01-08 00:22:34', 1, 'Oa6O4Z4CReY32tTJdl30', NULL),
(2, 'Kamarin', 'Female', '2017-12-21', 'austratian', '43636252', '2018-01-18', 2, '2018-01-03 12:40:05', '2018-01-03 12:40:05', 2, 'rjtqzbk9dQ3oR1HTJDhM', NULL),
(3, 'jamil', 'Male', '2017-09-20', 'bangladeshi', '112121212111', '2018-01-25', 3, '2018-01-03 12:40:05', '2018-01-03 12:40:05', 1, 'RAhwyCORZjkp2dIVmFjg', NULL),
(4, 'Kamarin', 'Female', '2017-12-21', 'austratian', '43636252', '2018-01-18', 4, '2018-01-03 12:40:05', '2018-01-03 12:40:05', 2, 'pVdXvLeWZXNi8SYhymUa', NULL),
(5, 'jamila', 'Female', '2017-09-20', 'bangladeshi', '112121212111', '2018-01-25', 5, '2018-01-03 12:52:23', '2018-01-03 12:52:23', 1, 'xvMLwfRpZ3J7u10eHSBM', NULL),
(6, 'Kamarinain', 'Male', '2018-01-11', 'austratian', '43636252', '2018-02-08', 6, '2018-01-03 12:52:23', '2018-01-03 12:52:23', 1, 'al3nqdkvhQWkKDARWXnc', NULL),
(7, 'jamila', 'Female', '2017-09-20', 'bangladeshi', '112121212111', '2018-01-25', 7, '2018-01-03 12:52:23', '2018-01-03 12:52:23', 1, 'ijJnqxdtPn9B5KBps3Rh', NULL),
(8, 'Kamarinain', 'Male', '2018-01-11', 'austratian', '43636252', '2018-02-08', 8, '2018-01-03 12:52:23', '2018-01-03 12:52:23', 1, 'hMajTCMxwyWKIHFbBNTX', NULL),
(9, 'Abdul', 'Male', '2017-12-21', 'bangladeshi', '11212121212', '2018-01-24', 9, '2018-01-03 12:53:04', '2018-01-03 12:53:04', 1, 'UqMNZQkAuGX6z7gpJUvY', NULL),
(10, 'Nami', 'Female', '2017-12-07', 'austratian', '43636252', '2018-01-25', 10, '2018-01-03 12:53:04', '2018-01-03 12:53:04', 2, 'OHzYWlr7TAujcyYrSxM4', NULL),
(11, 'Abdullah', 'Male', '2017-11-30', 'austratian', '11212121212', '2018-01-26', 11, '2018-01-03 12:53:30', '2018-01-03 12:53:30', 2, 'rhMV35QeoG0jkzYjmjiw', NULL),
(12, 'Namina', 'Female', '2017-12-07', 'austratian', '43636252', '2018-01-25', 12, '2018-01-03 12:53:30', '2018-01-03 12:53:30', 1, 'invHdw4K4nY6GUkZalzz', NULL),
(13, 'jamil', 'Male', '2017-12-21', 'austratian', '11212121212', '2018-01-24', 13, '2018-01-03 12:54:23', '2018-01-03 12:54:23', 2, 'JEKfu7gSBYJorKV9ngtN', NULL),
(14, 'Abdul', 'Male', '2018-01-24', 'bangladeshi', '2707090', '2018-01-18', 14, '2018-01-03 12:54:23', '2018-01-03 12:54:23', 1, 'isT7ueW5a7vYyBv35M6X', NULL),
(15, 'Amin', 'Male', '2017-09-20', 'Bangladeshi', '9709709', '2017-09-30', 15, '2018-01-03 04:23:33', '2018-01-03 04:23:33', 1, 'aRKmlPFkFmp5BVIwoHfx', NULL),
(16, 'Amin', 'Male', '2017-09-20', 'Bangladeshi', '9709709', '2017-09-30', 16, '2018-01-03 04:32:06', '2018-01-03 04:32:06', 1, 'H76gm2f3xhDIegFNI0go', NULL),
(17, 'Amin', 'Male', '2017-09-20', 'Bangladeshi', '9709709', '2017-09-30', 17, '2018-01-03 04:42:00', '2018-01-03 04:42:00', 1, 'vxYSYZzTDywIxGRu4oFo', NULL),
(18, 'jamil', 'Male', '2018-01-17', 'austratian', '11212121212', '2018-01-17', 18, '2018-01-03 04:53:18', '2018-01-03 04:53:18', 2, 'mAR1ExvBpG9wXEv3BIsY', NULL),
(19, 'jamil', 'Male', '2018-01-17', 'austratian', '11212121212', '2018-01-17', 19, '2018-01-03 04:53:18', '2018-01-03 04:53:18', 2, '9DtrxMG1AfQDHx9IUC2c', NULL),
(20, 'jamil', 'Male', '2018-01-17', 'austratian', '11212121212', '2018-01-17', 20, '2018-01-03 05:43:11', '2018-01-03 05:43:11', 2, 'ccioTFpyfR0zi8ILG6Qt', NULL),
(21, 'jamil', 'Male', '2018-01-17', 'austratian', '11212121212', '2018-01-17', 21, '2018-01-03 05:43:11', '2018-01-03 05:43:11', 2, 'Hvw8dBiKxHun71ZtGAcn', NULL),
(22, 'jamil', 'Male', '2018-01-17', 'austratian', '11212121212', '2018-01-17', 22, '2018-01-03 05:43:29', '2018-01-03 05:43:29', 2, 'PI6kfagg6qXDYnyUzB9r', NULL),
(23, 'jamil', 'Male', '2018-01-17', 'austratian', '11212121212', '2018-01-17', 23, '2018-01-03 05:43:29', '2018-01-03 05:43:29', 2, 'xyX1oZCqAjDeSRc4jEaE', NULL),
(24, 'jamil', 'Male', '2018-01-17', 'austratian', '11212121212', '2018-01-17', 29, '2018-01-03 06:05:54', '2018-01-03 06:05:54', 2, 'KvIu06gg48UCGmetfCmZ', NULL),
(25, 'jamil', 'Male', '2018-01-17', 'austratian', '11212121212', '2018-01-17', 30, '2018-01-03 06:05:54', '2018-01-03 06:05:54', 2, 'YBHQ95BySlpOS7vO7BJv', NULL),
(26, 'Nomuna', 'Male', '2017-11-24', 'austratian', '112121212111', '2018-01-25', 32, '2018-01-03 06:15:22', '2018-01-03 06:15:22', 2, 'xhx7kYoryzFeVNCYJ5gn', NULL),
(27, 'Jimna', 'Female', '2017-12-15', 'bangladeshi', '43636252', '2018-01-25', 33, '2018-01-03 06:15:22', '2018-01-03 06:15:22', 1, 'y3givPRJwHgBIwowPzwW', NULL),
(28, 'Nomuna', 'Male', '2017-11-24', 'austratian', '112121212111', '2018-01-25', 34, '2018-01-03 06:15:22', '2018-01-03 06:15:22', 2, '2J1um7uYztQvP3u59tVr', NULL),
(29, 'Jimna', 'Female', '2017-12-15', 'bangladeshi', '43636252', '2018-01-25', 35, '2018-01-03 06:15:22', '2018-01-03 06:15:22', 1, 'yEcGuor1AE5yghnnkcU6', NULL),
(30, 'jamil', 'Male', '2017-12-14', 'bangladeshi', '11212121212', '2018-01-25', 36, '2018-01-03 22:49:22', '2018-01-03 22:49:22', 1, 'hhBTyN6g1dBi9CE2vTh0', NULL),
(31, 'Abdul', 'Male', '2017-12-15', 'austratian', '43636252', '2018-01-18', 37, '2018-01-03 22:49:22', '2018-01-03 22:49:22', 2, '4MHWgtPXcNAqSHTMbkrw', NULL),
(32, 'jamil', 'Male', '2017-12-14', 'bangladeshi', '11212121212', '2018-01-25', 38, '2018-01-03 22:50:01', '2018-01-03 22:50:01', 1, 'vbFPiDP8V2y4xrkH9xKp', NULL),
(33, 'Abdul', 'Male', '2017-12-15', 'austratian', '43636252', '2018-01-18', 39, '2018-01-03 22:50:01', '2018-01-03 22:50:01', 2, 'gF9b4OjHBi4b5QFrIUMA', NULL),
(34, 'jamil', 'Male', '2017-12-14', 'bangladeshi', '11212121212', '2018-01-25', 40, '2018-01-03 22:52:06', '2018-01-03 22:52:06', 1, 'uJHefroGdYS46Pp9ujGQ', NULL),
(35, 'Abdul', 'Male', '2017-12-15', 'austratian', '43636252', '2018-01-18', 41, '2018-01-03 22:52:06', '2018-01-03 22:52:06', 2, 'wDoX8euLtTETxNqB3DMP', NULL),
(36, 'jamil', 'Male', '2017-12-14', 'bangladeshi', '11212121212', '2018-01-25', 42, '2018-01-03 23:01:33', '2018-01-03 23:01:33', 1, 'xtASw9XzOXtp83OfkhFF', NULL),
(37, 'Abdul', 'Male', '2017-12-15', 'austratian', '43636252', '2018-01-18', 43, '2018-01-03 23:01:33', '2018-01-03 23:01:33', 2, 'TpcVL5C1a7Cs0VvE2mkz', NULL),
(38, 'jamil', 'Male', '2017-12-14', 'bangladeshi', '11212121212', '2018-01-25', 44, '2018-01-03 23:01:34', '2018-01-03 23:01:34', 1, 'RpsthdwHoDwxJlQhpWYA', NULL),
(39, 'Abdul', 'Male', '2017-12-15', 'austratian', '43636252', '2018-01-18', 45, '2018-01-03 23:01:34', '2018-01-03 23:01:34', 2, 'StKvxPmatzUavCJgj3pV', NULL),
(40, 'new1', 'Male', '2017-12-14', 'bangladeshi', '11212121212', '2018-01-25', 46, '2018-01-03 23:02:40', '2018-01-03 23:02:40', 1, 'ccEBV9lsY7b0XzYALOOU', NULL),
(41, 'new2', 'Male', '2017-12-15', 'austratian', '43636252', '2018-01-18', 47, '2018-01-03 23:02:40', '2018-01-03 23:02:40', 2, 'fzz2poQk6eKKseL0lt4e', NULL),
(42, 'new1', 'Male', '2017-12-14', 'bangladeshi', '11212121212', '2018-01-25', 48, '2018-01-03 23:02:40', '2018-01-03 23:02:40', 1, 'Z12h3ESarwjJEU4uVMKc', NULL),
(43, 'new2', 'Male', '2017-12-15', 'austratian', '43636252', '2018-01-18', 49, '2018-01-03 23:02:40', '2018-01-03 23:02:40', 2, 'rfE7WPzOAgVbC0YA6d9g', NULL),
(44, 'Amin', 'Male', '2017-09-20', 'Bangladeshi', '9709709', '2017-09-30', 50, '2018-01-03 23:09:08', '2018-01-03 23:09:08', 1, 'F7eM1BX0p9jkFvdVUAvb', NULL),
(45, 'Amin', 'Male', '2017-09-20', 'Bangladeshi', '9709709', '2017-09-30', 51, '2018-01-03 23:09:49', '2018-01-03 23:09:49', 1, 'lHGqaSc6gwq154tdGvu7', NULL),
(46, 'Amin', 'Male', '2017-09-20', 'Bangladeshi', '9709709', '2017-09-30', 52, '2018-01-03 23:10:21', '2018-01-03 23:10:21', 1, 'RHvTkq4eACI17ov7Xiva', NULL),
(47, 'Amin', 'Male', '2017-09-20', 'Bangladeshi', '9709709', '2017-09-30', 53, '2018-01-03 23:13:19', '2018-01-03 23:13:19', 1, 'DXEO66neSFGj68tDriiO', NULL),
(48, 'Amin', 'Male', '2017-09-20', 'Bangladeshi', '9709709', '2017-09-30', 54, '2018-01-03 23:14:05', '2018-01-03 23:14:05', 1, '3HDglhwbSSQDDFaYUphi', NULL),
(49, 'Amin', 'Male', '2017-09-20', 'Bangladeshi', '9709709', '2017-09-30', 55, '2018-01-03 23:14:05', '2018-01-03 23:14:05', 1, 'GbXPtYmfpvJ4QlWey3mx', NULL),
(50, 'Amin', 'Male', '2017-09-20', 'Bangladeshi', '9709709', '2017-09-30', 56, '2018-01-03 23:14:36', '2018-01-03 23:14:36', 1, 'qMlCyYnudFw18zjWHG4c', NULL),
(51, 'Amin', 'Male', '2017-09-20', 'Bangladeshi', '9709709', '2017-09-30', 57, '2018-01-03 23:16:44', '2018-01-03 23:16:44', 1, 'GHYoXazNB17Ed5ieRe6Y', NULL),
(52, 'Amin', 'Male', '2017-09-20', 'Bangladeshi', '9709709', '2017-09-30', 58, '2018-01-03 23:16:44', '2018-01-03 23:16:44', 1, 'TwyY9EW6W42kewEMUVef', NULL),
(53, 'abc', 'Male', '2017-12-15', 'bangladeshi', '11212121212', '2018-01-26', 59, '2018-01-04 02:23:35', '2018-01-04 02:23:35', 1, 'dwFyiLJXolXKkm6CwVkp', NULL),
(54, 'abc', 'Male', '2017-12-15', 'bangladeshi', '11212121212', '2018-01-26', 60, '2018-01-04 02:23:35', '2018-01-04 02:23:35', 1, 'ERzgbdWdSSIp5q1wh3a5', NULL),
(55, 'abc', 'Male', '2017-12-15', 'bangladeshi', '11212121212', '2018-01-26', 61, '2018-01-04 02:43:47', '2018-01-04 02:43:47', 1, 'Te37JBxKVlFnQh3JpjbO', NULL),
(56, 'abc', 'Male', '2017-12-15', 'bangladeshi', '11212121212', '2018-01-26', 62, '2018-01-04 02:43:47', '2018-01-04 02:43:47', 1, 'iqhr9jhBzfII6YQGExT6', NULL),
(57, 'abc', 'Male', '2017-12-15', 'bangladeshi', '11212121212', '2018-01-26', 63, '2018-01-04 02:46:43', '2018-01-04 02:46:43', 1, 'a8Xm7HeifCNrLcvs9RcS', NULL),
(58, 'abc', 'Male', '2017-12-15', 'bangladeshi', '11212121212', '2018-01-26', 64, '2018-01-04 02:46:43', '2018-01-04 02:46:43', 1, 'GnolKdUdrJ7bgh86JjoL', NULL),
(59, 'abc', 'Male', '2017-12-15', 'bangladeshi', '11212121212', '2018-01-26', 65, '2018-01-04 02:48:21', '2018-01-04 02:48:21', 1, 'GKCg5B8jMAOmx42n9MzF', NULL),
(60, 'abc', 'Male', '2017-12-15', 'bangladeshi', '11212121212', '2018-01-26', 66, '2018-01-04 02:48:21', '2018-01-04 02:48:21', 1, 'pt1DBQuaIE8vlYNyuGaC', NULL),
(61, 'abc', 'Male', '2017-12-15', 'bangladeshi', '11212121212', '2018-01-26', 67, '2018-01-04 02:52:40', '2018-01-04 02:52:40', 1, 'M8yY8Z16hMSabBlc4MuC', NULL),
(62, 'abc', 'Male', '2017-12-15', 'bangladeshi', '11212121212', '2018-01-26', 68, '2018-01-04 02:52:40', '2018-01-04 02:52:40', 1, 'oD41xqgC4sVIZYCgPm62', NULL),
(63, 'abc', 'Male', '2017-12-15', 'bangladeshi', '11212121212', '2018-01-26', 69, '2018-01-04 02:53:18', '2018-01-04 02:53:18', 1, 'uur6iG51pQ5APVPtnly5', NULL),
(64, 'abc', 'Male', '2017-12-15', 'bangladeshi', '11212121212', '2018-01-26', 70, '2018-01-04 02:53:18', '2018-01-04 02:53:18', 1, 'Fb6YaTWc1be1J4ZOhrR9', NULL),
(65, 'abc', 'Male', '2017-12-15', 'bangladeshi', '11212121212', '2018-01-26', 71, '2018-01-04 02:53:38', '2018-01-04 02:53:38', 1, 'Qywsquder6iFx2uElkDb', NULL),
(66, 'abc', 'Male', '2017-12-15', 'bangladeshi', '11212121212', '2018-01-26', 72, '2018-01-04 02:53:38', '2018-01-04 02:53:38', 1, 'aVApoA49IBkAWlkyLr1W', NULL),
(67, 'abc', 'Male', '2017-12-15', 'bangladeshi', '11212121212', '2018-01-26', 73, '2018-01-04 02:55:20', '2018-01-04 02:55:20', 1, 'nRRKiuOWODvZ6NyTjx6P', NULL),
(68, 'abc', 'Male', '2017-12-15', 'bangladeshi', '11212121212', '2018-01-26', 74, '2018-01-04 02:55:20', '2018-01-04 02:55:20', 1, 'gRmdGwvYRqH2aAHpAtJH', NULL),
(69, 'abcd', 'Female', '2017-12-08', 'bangladeshi', '999999', '2018-01-26', 75, '2018-01-04 02:55:57', '2018-01-04 02:55:57', 2, 'DsKENsUORfn4vg7pjoml', NULL),
(70, 'abcd', 'Female', '2017-12-08', 'bangladeshi', '999999', '2018-01-26', 76, '2018-01-04 02:55:57', '2018-01-04 02:55:57', 2, 'G2CfMcz93pcxqh6vsPBr', NULL),
(71, 'Aminaaa', 'Female', '2017-09-20', 'Bangladeshi', '9709709', '2017-09-30', 77, '2018-01-04 03:40:58', '2018-01-04 03:40:58', 1, 'Jw3yuTEtbZId0a7zSBNQ', NULL),
(72, 'Aminaaa', 'Female', '2017-09-20', 'Bangladeshi', '9709709', '2017-09-30', 78, '2018-01-04 03:40:58', '2018-01-04 03:40:58', 1, 'hcWZsj7xV1tbPwGXbsEE', NULL),
(73, 'Kamila', 'Female', '2017-09-20', 'Bangladeshi', '8888888', '2017-09-30', 79, '2018-01-04 03:43:30', '2018-01-04 03:43:30', 1, 'KVYc4mdQU5LU42QfXsWG', NULL),
(74, 'Kamila', 'Female', '2017-09-20', 'Bangladeshi', '8888888', '2017-09-30', 80, '2018-01-04 03:43:30', '2018-01-04 03:43:30', 1, 'JJqzgGU3zneyzPKefacP', NULL),
(75, 'Nabisco', 'Male', '2017-09-20', 'Bangladeshi', '8888888', '2017-09-30', 81, '2018-01-05 05:04:34', '2018-01-05 05:04:34', 1, 'GaCmKHBgR0jzfQ4dXPOk', NULL),
(76, 'Nabisco', 'Male', '2017-09-20', 'Bangladeshi', '8888888', '2017-09-30', 82, '2018-01-05 05:04:34', '2018-01-05 05:04:34', 1, 'oEXLPHajgAjHfHJifFc9', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `passenger_types`
--

DROP TABLE IF EXISTS `passenger_types`;
CREATE TABLE IF NOT EXISTS `passenger_types` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `passenger_types`
--

INSERT INTO `passenger_types` (`id`, `created_at`, `updated_at`, `name`, `status`, `deleted_at`) VALUES
(1, '2017-12-05 23:17:20', '2018-01-09 06:22:18', 'Adult', 1, NULL),
(2, '2017-12-05 23:17:25', '2017-12-05 23:17:25', 'Child', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(5, 'register passengers', 'web', '2018-01-10 03:38:33', '2018-01-10 03:38:33'),
(4, 'check tickets', 'web', '2018-01-10 03:15:24', '2018-01-10 03:15:24'),
(6, 'check boarding pass', 'web', '2018-01-10 03:38:33', '2018-01-10 03:38:33'),
(7, 'assign roles', 'web', '2018-01-10 03:38:33', '2018-01-10 03:38:33');

-- --------------------------------------------------------

--
-- Table structure for table `ports`
--

DROP TABLE IF EXISTS `ports`;
CREATE TABLE IF NOT EXISTS `ports` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `city_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `latitude` double(30,20) NOT NULL,
  `longitude` double(30,20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ports`
--

INSERT INTO `ports` (`id`, `city_name`, `name`, `country_code`, `created_at`, `updated_at`, `deleted_at`, `status`, `latitude`, `longitude`) VALUES
(1, 'Chittagong', 'Chittagong', 'BD', '2017-12-05 23:16:40', '2017-12-31 23:42:10', NULL, 1, 40.73145630034573000000, -73.82459320105698000000),
(2, 'Dhaka', 'Dhaka', 'BD', '2017-12-05 23:16:55', '2017-12-31 23:42:18', NULL, 1, 40.73015547855510000000, -73.82073082007503000000);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(10, 'counter staff', 'web', '2018-01-10 03:38:52', '2018-01-10 03:38:52'),
(9, 'test', 'web', '2018-01-10 03:30:55', '2018-01-10 03:30:55'),
(8, 'another', 'web', '2018-01-10 03:25:56', '2018-01-10 03:25:56'),
(7, 'security staff', 'web', '2018-01-10 03:23:27', '2018-01-10 03:23:27'),
(11, 'office', 'web', '2018-01-10 03:39:34', '2018-01-10 03:39:34'),
(12, 'Admin', 'web', '2018-01-10 03:47:12', '2018-01-10 03:47:12');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(4, 9),
(5, 10),
(6, 11),
(7, 12);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `depart_from` int(10) UNSIGNED NOT NULL,
  `arrive_at` int(10) UNSIGNED NOT NULL,
  `trip_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `price` double NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `checked` int(11) NOT NULL DEFAULT '0',
  `departure_date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `depart_from`, `arrive_at`, `trip_id`, `created_at`, `updated_at`, `deleted_at`, `price`, `order_id`, `company_id`, `checked`, `departure_date_time`) VALUES
(1, 1, 2, 2, '2018-01-03 12:40:05', '2018-01-08 00:22:35', NULL, 600, 1, 1, 0, '2018-01-04 11:20:00'),
(2, 1, 2, 2, '2018-01-03 12:40:05', '2018-01-03 12:40:05', NULL, 400, 1, 1, 0, '2018-01-04 11:20:00'),
(3, 2, 1, 11, '2018-01-03 12:40:05', '2018-01-03 12:40:05', NULL, 700, 1, 2, 0, '2018-01-05 08:30:00'),
(4, 2, 1, 11, '2018-01-03 12:40:05', '2018-01-03 12:40:05', NULL, 500, 1, 2, 0, '2018-01-05 08:30:00'),
(5, 1, 2, 2, '2018-01-03 12:52:23', '2018-01-03 12:52:23', NULL, 600, 2, 1, 0, '2018-01-04 11:20:00'),
(6, 1, 2, 2, '2018-01-03 12:52:23', '2018-01-03 12:52:23', NULL, 600, 2, 1, 0, '2018-01-04 11:20:00'),
(7, 2, 1, 11, '2018-01-03 12:52:23', '2018-01-03 12:52:23', NULL, 700, 2, 2, 0, '2018-01-05 08:30:00'),
(8, 2, 1, 11, '2018-01-03 12:52:23', '2018-01-03 12:52:23', NULL, 700, 2, 2, 0, '2018-01-05 08:30:00'),
(9, 1, 2, 2, '2018-01-03 12:53:04', '2018-01-03 12:53:04', NULL, 600, 3, 1, 0, '2018-01-04 11:20:00'),
(10, 1, 2, 2, '2018-01-03 12:53:04', '2018-01-03 12:53:04', NULL, 400, 3, 1, 0, '2018-01-04 11:20:00'),
(11, 1, 2, 2, '2018-01-03 12:53:30', '2018-01-03 12:53:30', NULL, 400, 4, 1, 0, '2018-01-04 11:20:00'),
(12, 1, 2, 2, '2018-01-03 12:53:30', '2018-01-03 12:53:30', NULL, 600, 4, 1, 0, '2018-01-04 11:20:00'),
(13, 2, 1, 10, '2018-01-03 12:54:23', '2018-01-03 12:54:23', NULL, 500, 5, 2, 0, '2018-01-04 08:30:00'),
(14, 2, 1, 10, '2018-01-03 12:54:23', '2018-01-03 12:54:23', NULL, 700, 5, 2, 0, '2018-01-04 08:30:00'),
(15, 1, 2, 2, '2018-01-03 04:23:33', '2018-01-03 04:23:33', NULL, 600, 8, 1, 0, '2018-01-04 11:20:00'),
(16, 1, 2, 2, '2018-01-03 04:32:06', '2018-01-03 04:32:06', NULL, 600, 9, 1, 0, '2018-01-04 11:20:00'),
(17, 1, 2, 2, '2018-01-03 04:42:00', '2018-01-03 04:42:00', NULL, 600, 10, 1, 0, '2018-01-04 11:20:00'),
(18, 1, 2, 2, '2018-01-03 04:53:18', '2018-01-03 04:53:18', NULL, 400, 11, 1, 0, '2018-01-04 11:20:00'),
(19, 2, 1, 11, '2018-01-03 04:53:18', '2018-01-03 04:53:18', NULL, 500, 11, 2, 0, '2018-01-05 08:30:00'),
(20, 1, 2, 2, '2018-01-03 05:43:11', '2018-01-03 05:43:11', NULL, 400, 12, 1, 0, '2018-01-04 11:20:00'),
(21, 2, 1, 11, '2018-01-03 05:43:11', '2018-01-03 05:43:11', NULL, 500, 12, 2, 0, '2018-01-05 08:30:00'),
(22, 1, 2, 2, '2018-01-03 05:43:29', '2018-01-03 05:43:29', NULL, 400, 13, 1, 0, '2018-01-04 11:20:00'),
(23, 2, 1, 11, '2018-01-03 05:43:29', '2018-01-03 05:43:29', NULL, 500, 13, 2, 0, '2018-01-05 08:30:00'),
(24, 1, 2, 2, '2018-01-03 05:58:01', '2018-01-03 05:58:01', NULL, 400, 15, 1, 0, '2018-01-04 11:20:00'),
(25, 1, 2, 2, '2018-01-03 06:01:01', '2018-01-03 06:01:01', NULL, 400, 16, 1, 0, '2018-01-04 11:20:00'),
(26, 1, 2, 2, '2018-01-03 06:02:42', '2018-01-03 06:02:42', NULL, 400, 18, 1, 0, '2018-01-04 11:20:00'),
(27, 1, 2, 2, '2018-01-03 06:03:16', '2018-01-03 06:03:16', NULL, 400, 19, 1, 0, '2018-01-04 11:20:00'),
(28, 1, 2, 2, '2018-01-03 06:04:39', '2018-01-03 06:04:39', NULL, 400, 20, 1, 0, '2018-01-04 11:20:00'),
(29, 1, 2, 2, '2018-01-03 06:05:54', '2018-01-03 06:05:54', NULL, 400, 21, 1, 0, '2018-01-04 11:20:00'),
(30, 2, 1, 11, '2018-01-03 06:05:54', '2018-01-03 06:05:54', NULL, 500, 21, 2, 0, '2018-01-05 08:30:00'),
(31, 1, 2, 2, '2018-01-03 06:13:11', '2018-01-03 06:13:11', NULL, 400, 22, 1, 0, '2018-01-04 11:20:00'),
(32, 1, 2, 2, '2018-01-03 06:15:22', '2018-01-03 06:15:22', NULL, 400, 23, 1, 0, '2018-01-04 11:20:00'),
(33, 1, 2, 2, '2018-01-03 06:15:22', '2018-01-03 06:15:22', NULL, 600, 23, 1, 0, '2018-01-04 11:20:00'),
(34, 2, 1, 11, '2018-01-03 06:15:22', '2018-01-03 06:15:22', NULL, 500, 23, 2, 0, '2018-01-05 08:30:00'),
(35, 2, 1, 11, '2018-01-03 06:15:22', '2018-01-03 06:15:22', NULL, 700, 23, 2, 0, '2018-01-05 08:30:00'),
(36, 1, 2, 3, '2018-01-03 22:49:22', '2018-01-03 22:49:22', NULL, 600, 24, 1, 0, '2018-01-05 11:20:00'),
(37, 1, 2, 3, '2018-01-03 22:49:22', '2018-01-03 22:49:22', NULL, 400, 24, 1, 0, '2018-01-05 11:20:00'),
(38, 1, 2, 3, '2018-01-03 22:50:01', '2018-01-03 22:50:01', NULL, 600, 25, 1, 0, '2018-01-05 11:20:00'),
(39, 1, 2, 3, '2018-01-03 22:50:01', '2018-01-03 22:50:01', NULL, 400, 25, 1, 0, '2018-01-05 11:20:00'),
(40, 1, 2, 3, '2018-01-03 22:52:06', '2018-01-03 22:52:06', NULL, 600, 27, 1, 0, '2018-01-05 11:20:00'),
(41, 1, 2, 3, '2018-01-03 22:52:06', '2018-01-03 22:52:06', NULL, 400, 27, 1, 0, '2018-01-05 11:20:00'),
(42, 1, 2, 3, '2018-01-03 23:01:33', '2018-01-03 23:01:33', NULL, 600, 28, 1, 0, '2018-01-05 11:20:00'),
(43, 1, 2, 3, '2018-01-03 23:01:33', '2018-01-03 23:01:33', NULL, 400, 28, 1, 0, '2018-01-05 11:20:00'),
(44, 2, 1, 12, '2018-01-03 23:01:34', '2018-01-03 23:01:34', NULL, 700, 28, 2, 0, '2018-01-06 08:30:00'),
(45, 2, 1, 12, '2018-01-03 23:01:34', '2018-01-03 23:01:34', NULL, 500, 28, 2, 0, '2018-01-06 08:30:00'),
(46, 1, 2, 3, '2018-01-03 23:02:40', '2018-01-03 23:02:40', NULL, 600, 29, 1, 0, '2018-01-05 11:20:00'),
(47, 1, 2, 3, '2018-01-03 23:02:40', '2018-01-03 23:02:40', NULL, 400, 29, 1, 0, '2018-01-05 11:20:00'),
(48, 2, 1, 12, '2018-01-03 23:02:40', '2018-01-03 23:02:40', NULL, 700, 29, 2, 0, '2018-01-06 08:30:00'),
(49, 2, 1, 12, '2018-01-03 23:02:40', '2018-01-03 23:02:40', NULL, 500, 29, 2, 0, '2018-01-06 08:30:00'),
(50, 1, 2, 2, '2018-01-03 23:09:08', '2018-01-03 23:09:08', NULL, 600, 30, 1, 0, '2018-01-04 11:20:00'),
(51, 1, 2, 2, '2018-01-03 23:09:49', '2018-01-03 23:09:49', NULL, 600, 31, 1, 0, '2018-01-04 11:20:00'),
(52, 1, 2, 2, '2018-01-03 23:10:21', '2018-01-03 23:10:21', NULL, 600, 32, 1, 0, '2018-01-04 11:20:00'),
(53, 1, 2, 2, '2018-01-03 23:13:19', '2018-01-03 23:13:19', NULL, 600, 33, 1, 0, '2018-01-04 11:20:00'),
(54, 1, 2, 2, '2018-01-03 23:14:05', '2018-01-03 23:14:05', NULL, 600, 34, 1, 0, '2018-01-04 11:20:00'),
(55, 2, 1, 12, '2018-01-03 23:14:05', '2018-01-03 23:14:05', NULL, 700, 34, 2, 0, '2018-01-06 08:30:00'),
(56, 1, 2, 2, '2018-01-03 23:14:36', '2018-01-03 23:14:36', NULL, 600, 35, 1, 0, '2018-01-04 11:20:00'),
(57, 1, 2, 2, '2018-01-03 23:16:44', '2018-01-03 23:16:44', NULL, 600, 36, 1, 0, '2018-01-04 11:20:00'),
(58, 2, 1, 12, '2018-01-03 23:16:44', '2018-01-03 23:16:44', NULL, 700, 36, 2, 0, '2018-01-06 08:30:00'),
(59, 1, 2, 3, '2018-01-04 02:23:35', '2018-01-04 02:23:35', NULL, 600, 37, 1, 0, '2018-01-05 11:20:00'),
(60, 2, 1, 12, '2018-01-04 02:23:35', '2018-01-04 02:23:35', NULL, 700, 37, 2, 0, '2018-01-06 08:30:00'),
(61, 1, 2, 3, '2018-01-04 02:43:47', '2018-01-04 02:43:47', NULL, 600, 38, 1, 0, '2018-01-05 11:20:00'),
(62, 2, 1, 12, '2018-01-04 02:43:47', '2018-01-04 02:43:47', NULL, 700, 38, 2, 0, '2018-01-06 08:30:00'),
(63, 1, 2, 3, '2018-01-04 02:46:43', '2018-01-04 02:46:43', NULL, 600, 39, 1, 0, '2018-01-05 11:20:00'),
(64, 2, 1, 12, '2018-01-04 02:46:43', '2018-01-04 02:46:43', NULL, 700, 39, 2, 0, '2018-01-06 08:30:00'),
(65, 1, 2, 3, '2018-01-04 02:48:21', '2018-01-04 02:48:21', NULL, 600, 40, 1, 0, '2018-01-05 11:20:00'),
(66, 2, 1, 12, '2018-01-04 02:48:21', '2018-01-04 02:48:21', NULL, 700, 40, 2, 0, '2018-01-06 08:30:00'),
(67, 1, 2, 3, '2018-01-04 02:52:40', '2018-01-04 02:52:40', NULL, 600, 41, 1, 0, '2018-01-05 11:20:00'),
(68, 2, 1, 12, '2018-01-04 02:52:40', '2018-01-04 02:52:40', NULL, 700, 41, 2, 0, '2018-01-06 08:30:00'),
(69, 1, 2, 3, '2018-01-04 02:53:18', '2018-01-04 02:53:18', NULL, 600, 42, 1, 0, '2018-01-05 11:20:00'),
(70, 2, 1, 12, '2018-01-04 02:53:18', '2018-01-04 02:53:18', NULL, 700, 42, 2, 0, '2018-01-06 08:30:00'),
(71, 1, 2, 3, '2018-01-04 02:53:38', '2018-01-04 02:53:38', NULL, 600, 43, 1, 0, '2018-01-05 11:20:00'),
(72, 2, 1, 12, '2018-01-04 02:53:38', '2018-01-04 02:53:38', NULL, 700, 43, 2, 0, '2018-01-06 08:30:00'),
(73, 1, 2, 3, '2018-01-04 02:55:20', '2018-01-04 02:55:20', NULL, 600, 44, 1, 0, '2018-01-05 11:20:00'),
(74, 2, 1, 12, '2018-01-04 02:55:20', '2018-01-04 02:55:20', NULL, 700, 44, 2, 0, '2018-01-06 08:30:00'),
(75, 1, 2, 3, '2018-01-04 02:55:57', '2018-01-04 02:55:57', NULL, 400, 45, 1, 0, '2018-01-05 11:20:00'),
(76, 2, 1, 12, '2018-01-04 02:55:57', '2018-01-04 02:55:57', NULL, 500, 45, 2, 0, '2018-01-06 08:30:00'),
(77, 1, 2, 2, '2018-01-04 03:40:58', '2018-01-04 03:40:58', NULL, 600, 47, 1, 0, '2018-01-04 11:20:00'),
(78, 2, 1, 12, '2018-01-04 03:40:58', '2018-01-04 03:40:58', NULL, 700, 47, 2, 0, '2018-01-06 08:30:00'),
(79, 1, 2, 2, '2018-01-04 03:43:30', '2018-01-04 03:43:30', NULL, 600, 48, 1, 0, '2018-01-04 11:20:00'),
(80, 2, 1, 12, '2018-01-04 03:43:30', '2018-01-04 03:43:30', NULL, 700, 48, 2, 0, '2018-01-06 08:30:00'),
(81, 1, 2, 2, '2018-01-05 05:04:34', '2018-01-05 05:04:34', NULL, 600, 49, 1, 0, '2018-01-04 11:20:00'),
(82, 2, 1, 12, '2018-01-05 05:04:34', '2018-01-05 05:04:34', NULL, 700, 49, 2, 0, '2018-01-06 08:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

DROP TABLE IF EXISTS `trips`;
CREATE TABLE IF NOT EXISTS `trips` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `departure_port_id` int(11) NOT NULL,
  `destination_port_id` int(11) NOT NULL,
  `ferry_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `ferry_total_seat` int(11) NOT NULL,
  `ferry_remaining_seat` int(11) NOT NULL,
  `departure_date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `departure_port_id`, `destination_port_id`, `ferry_id`, `created_at`, `updated_at`, `deleted_at`, `company_id`, `ferry_total_seat`, `ferry_remaining_seat`, `departure_date_time`) VALUES
(1, 1, 2, 1, '2018-01-03 12:38:38', '2018-01-03 12:38:38', NULL, 1, 250, 250, '2018-01-03 11:20:00'),
(2, 1, 2, 1, '2018-01-03 12:38:38', '2018-01-08 00:22:34', NULL, 1, 250, 219, '2018-01-04 11:20:00'),
(3, 1, 2, 1, '2018-01-03 12:38:38', '2018-01-04 02:55:57', NULL, 1, 250, 231, '2018-01-05 11:20:00'),
(4, 1, 2, 1, '2018-01-03 12:38:38', '2018-01-03 12:38:38', NULL, 1, 250, 250, '2018-01-06 11:20:00'),
(5, 1, 2, 1, '2018-01-03 12:38:38', '2018-01-03 12:38:38', NULL, 1, 250, 250, '2018-01-07 11:20:00'),
(6, 1, 2, 1, '2018-01-03 12:38:38', '2018-01-03 12:38:38', NULL, 1, 250, 250, '2018-01-08 11:20:00'),
(7, 1, 2, 1, '2018-01-03 12:38:38', '2018-01-03 12:38:38', NULL, 1, 250, 250, '2018-01-09 11:20:00'),
(8, 1, 2, 1, '2018-01-03 12:38:38', '2018-01-03 12:38:38', NULL, 1, 250, 250, '2018-01-10 11:20:00'),
(9, 2, 1, 2, '2018-01-03 12:39:11', '2018-01-03 12:39:11', NULL, 2, 300, 300, '2018-01-03 08:30:00'),
(10, 2, 1, 2, '2018-01-03 12:39:11', '2018-01-03 12:54:23', NULL, 2, 300, 298, '2018-01-04 08:30:00'),
(11, 2, 1, 2, '2018-01-03 12:39:11', '2018-01-03 12:39:11', NULL, 2, 300, 300, '2018-01-05 08:30:00'),
(12, 2, 1, 2, '2018-01-03 12:39:11', '2018-01-05 05:04:34', NULL, 2, 300, 282, '2018-01-06 08:30:00'),
(13, 2, 1, 2, '2018-01-03 12:39:11', '2018-01-03 12:39:11', NULL, 2, 300, 300, '2018-01-07 08:30:00'),
(14, 2, 1, 2, '2018-01-03 12:39:11', '2018-01-03 12:39:11', NULL, 2, 300, 300, '2018-01-08 08:30:00'),
(15, 2, 1, 2, '2018-01-03 12:39:11', '2018-01-03 12:39:11', NULL, 2, 300, 300, '2018-01-09 08:30:00'),
(16, 2, 1, 2, '2018-01-03 12:39:11', '2018-01-03 12:39:11', NULL, 2, 300, 300, '2018-01-10 08:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `trip_passenger_price`
--

DROP TABLE IF EXISTS `trip_passenger_price`;
CREATE TABLE IF NOT EXISTS `trip_passenger_price` (
  `passenger_type_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `trip_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trip_passenger_price`
--

INSERT INTO `trip_passenger_price` (`passenger_type_id`, `price`, `trip_id`, `created_at`, `updated_at`, `deleted_at`, `id`) VALUES
(1, 600, 1, '2018-01-03 12:38:38', '2018-01-03 12:38:38', NULL, 1),
(2, 400, 1, '2018-01-03 12:38:38', '2018-01-03 12:38:38', NULL, 2),
(1, 600, 2, '2018-01-03 12:38:38', '2018-01-03 12:38:38', NULL, 3),
(2, 400, 2, '2018-01-03 12:38:38', '2018-01-03 12:38:38', NULL, 4),
(1, 600, 3, '2018-01-03 12:38:38', '2018-01-03 12:38:38', NULL, 5),
(2, 400, 3, '2018-01-03 12:38:38', '2018-01-03 12:38:38', NULL, 6),
(1, 600, 4, '2018-01-03 12:38:38', '2018-01-03 12:38:38', NULL, 7),
(2, 400, 4, '2018-01-03 12:38:38', '2018-01-03 12:38:38', NULL, 8),
(1, 600, 5, '2018-01-03 12:38:38', '2018-01-03 12:38:38', NULL, 9),
(2, 400, 5, '2018-01-03 12:38:38', '2018-01-03 12:38:38', NULL, 10),
(1, 600, 6, '2018-01-03 12:38:38', '2018-01-03 12:38:38', NULL, 11),
(2, 400, 6, '2018-01-03 12:38:38', '2018-01-03 12:38:38', NULL, 12),
(1, 600, 7, '2018-01-03 12:38:38', '2018-01-03 12:38:38', NULL, 13),
(2, 400, 7, '2018-01-03 12:38:38', '2018-01-03 12:38:38', NULL, 14),
(1, 600, 8, '2018-01-03 12:38:38', '2018-01-03 12:38:38', NULL, 15),
(2, 400, 8, '2018-01-03 12:38:38', '2018-01-03 12:38:38', NULL, 16),
(1, 700, 9, '2018-01-03 12:39:11', '2018-01-03 12:39:11', NULL, 17),
(2, 500, 9, '2018-01-03 12:39:11', '2018-01-03 12:39:11', NULL, 18),
(1, 700, 10, '2018-01-03 12:39:11', '2018-01-03 12:39:11', NULL, 19),
(2, 500, 10, '2018-01-03 12:39:11', '2018-01-03 12:39:11', NULL, 20),
(1, 700, 11, '2018-01-03 12:39:11', '2018-01-03 12:39:11', NULL, 21),
(2, 500, 11, '2018-01-03 12:39:11', '2018-01-03 12:39:11', NULL, 22),
(1, 700, 12, '2018-01-03 12:39:11', '2018-01-03 12:39:11', NULL, 23),
(2, 500, 12, '2018-01-03 12:39:11', '2018-01-03 12:39:11', NULL, 24),
(1, 700, 13, '2018-01-03 12:39:11', '2018-01-03 12:39:11', NULL, 25),
(2, 500, 13, '2018-01-03 12:39:11', '2018-01-03 12:39:11', NULL, 26),
(1, 700, 14, '2018-01-03 12:39:11', '2018-01-03 12:39:11', NULL, 27),
(2, 500, 14, '2018-01-03 12:39:11', '2018-01-03 12:39:11', NULL, 28),
(1, 700, 15, '2018-01-03 12:39:11', '2018-01-03 12:39:11', NULL, 29),
(2, 500, 15, '2018-01-03 12:39:11', '2018-01-03 12:39:11', NULL, 30),
(1, 700, 16, '2018-01-03 12:39:11', '2018-01-03 12:39:11', NULL, 31),
(2, 500, 16, '2018-01-03 12:39:11', '2018-01-03 12:39:11', NULL, 32);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `deleted_at`, `company_id`) VALUES
(1, 'saif', 'sai@gmail.com', '$2y$10$zzHEJUPGInFWF2AQ7Lex..OFu9X/orQqwyg43UEd6oL1xwgc5Uura', 'M759fxKtxOGjJ11feRpOvQXt4t8KYLOatSm8n0MiAH37Dsk3Bzl7CTgo7PX2', '2017-12-05 23:12:27', '2017-12-05 23:12:27', 1, NULL, 1),
(2, 'Rahimin', 'jr@gmail.com', '$2y$10$8ijH.8f26CNIqv5SBZlqqufvzNAOGDA/E82sKplRI809mowFaYLM.', 'oBlbfduxf0lB4TIL8umVa7M8FBNRZCOj9uza8typipbkdw9Xa6XGARJq4jMv', '2017-12-06 21:52:09', '2017-12-06 21:52:09', 1, NULL, 1),
(3, 'Abdul', 'abc@gmail.com', '$2y$10$1pkEJm4jvzn0bodAd7a4EuSSPE2MaKzvXRo5SgMVoUN3.Sm6Y2y6a', 'V0eWqhv9jAMkMugli7yVklxmhONLFa0KFGMROSy5H3R7Ugjd5PFSDatoDhVQ', '2017-12-13 03:02:56', '2017-12-13 03:02:56', 3, NULL, 2),
(4, 'Staff', 'stf@gmail.com', '$2y$10$7jwPQilSELsHjctit5X9segOE7d1hkopj2mn8.Ga5O4FYEOATxhpi', 'O58fdzbyJGaHgKeER9hYchEprXN4ZF4E0v7kKgAET9RdWEKvVYzTN70I1hyh', '2018-01-05 05:19:37', '2018-01-05 05:19:37', 5, NULL, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
