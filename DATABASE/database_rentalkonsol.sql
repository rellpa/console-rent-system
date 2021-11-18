-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 07:13 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `konsol`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Site Administrator'),
(2, 'customer', 'User/Customer');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(1, 9),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 8),
(2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'willz@gmail.com', 1, '2021-03-13 11:01:27', 1),
(2, '::1', 'willz123', NULL, '2021-03-13 11:13:32', 0),
(3, '::1', 'willz@gmail.com', 1, '2021-03-13 11:13:41', 1),
(4, '::1', 'willz123@gmail.com', NULL, '2021-03-13 11:21:15', 0),
(5, '::1', 'willz@gmail.com', 1, '2021-03-13 11:21:31', 1),
(6, '::1', 'willze@gmail.com', 2, '2021-03-13 11:30:57', 1),
(7, '::1', 'kakax@gmail.com', 3, '2021-03-13 11:31:15', 1),
(8, '::1', 'willz@gmail.com', 1, '2021-03-13 11:47:34', 1),
(9, '::1', 'willz@gmail.com', 1, '2021-03-13 12:10:07', 1),
(10, '::1', 'willze@gmail.com', 2, '2021-03-13 13:45:27', 1),
(11, '::1', 'kakax@gmail.com', 3, '2021-03-13 13:45:39', 1),
(12, '::1', 'willz@gmail.com', 1, '2021-03-13 13:48:33', 1),
(13, '::1', 'willz@gmail.com', 1, '2021-03-13 13:50:06', 1),
(14, '::1', 'rellpa', NULL, '2021-03-13 23:40:27', 0),
(15, '::1', 'dwqdq', NULL, '2021-03-14 00:34:31', 0),
(16, '::1', 'qdqdq', NULL, '2021-03-14 00:34:36', 0),
(17, '::1', 'qwdwqdqd', NULL, '2021-03-14 03:28:16', 0),
(18, '::1', 'rellpa', NULL, '2021-03-14 03:29:41', 0),
(19, '::1', 'ff', NULL, '2021-03-14 03:29:44', 0),
(20, '::1', 'waaa@gmail.com', NULL, '2021-03-14 03:29:58', 0),
(21, '::1', 'willz@gmail.com', 1, '2021-03-14 03:32:11', 1),
(22, '::1', 'willz@gmail.com', 1, '2021-03-14 03:45:48', 1),
(23, '::1', 'willz@gmail.com', 1, '2021-03-14 04:24:46', 1),
(24, '::1', 'willz@gmail.com', 1, '2021-03-14 04:26:07', 1),
(25, '::1', 'michaeliandiraa@gmail.com', 7, '2021-03-14 08:22:43', 1),
(26, '::1', 'willz@gmail.com', 1, '2021-03-14 08:37:37', 1),
(27, '::1', 'denaddd9990@ggmail.com', 8, '2021-03-14 09:22:41', 1),
(28, '::1', 'michaeliandiraa@gmail.com', 9, '2021-03-14 09:26:23', 1),
(29, '::1', 'michaeliandiraa@gmail.com', 9, '2021-03-14 09:32:07', 1),
(30, '::1', 'farel00', NULL, '2021-03-14 09:48:55', 0),
(31, '::1', 'denaddd9990@ggmail.com', 8, '2021-03-14 09:48:58', 1),
(32, '::1', 'willz@gmail.com', 1, '2021-03-15 08:21:58', 1),
(33, '::1', 'willz@gmail.com', 1, '2021-03-15 09:01:15', 1),
(34, '::1', 'denaddd9990@ggmail.com', 8, '2021-03-15 10:09:53', 1),
(35, '::1', 'denaddd9990@ggmail.com', 8, '2021-03-15 10:26:36', 1),
(36, '::1', 'denaddd9990@ggmail.com', 8, '2021-03-15 10:41:41', 1),
(37, '::1', 'willz@gmail.com', 1, '2021-03-15 12:01:45', 1),
(38, '::1', 'denaddd9990@ggmail.com', 8, '2021-03-15 12:03:19', 1),
(39, '::1', 'denaddd9990@ggmail.com', 8, '2021-03-15 12:16:21', 1),
(40, '::1', 'agung@umn.ac.id', 10, '2021-03-15 12:16:29', 1),
(41, '::1', 'denaddd9990@ggmail.com', 8, '2021-03-15 12:16:58', 1),
(42, '::1', 'willz@gmail.com', 1, '2021-03-15 12:57:14', 1),
(43, '::1', 'agung@umn.ac.id', 10, '2021-03-15 12:57:37', 1),
(44, '::1', 'denaddd9990@ggmail.com', 8, '2021-03-15 12:57:43', 1),
(45, '180.241.29.228', 'denaddd9990@ggmail.com', 8, '2021-03-15 17:12:38', 1),
(46, '180.241.29.228', 'denaddd9990@ggmail.com', 8, '2021-03-15 17:12:47', 1),
(47, '180.252.224.245', 'willz@gmail.com', 1, '2021-03-15 17:14:03', 1),
(48, '180.241.29.228', 'willz@gmail.com', 1, '2021-03-15 17:21:03', 1),
(49, '180.241.29.228', 'willz@gmail.com', 1, '2021-03-15 17:26:12', 1),
(50, '180.241.29.228', 'willz@gmail.com', 1, '2021-03-15 17:26:37', 1),
(51, '180.241.29.228', 'willz@gmail.com', 1, '2021-03-15 17:26:45', 1),
(52, '125.167.191.239', 'Willz123', NULL, '2021-03-15 17:26:53', 0),
(53, '180.241.29.228', 'willz@gmail.com', 1, '2021-03-15 17:26:54', 1),
(54, '125.167.191.239', 'Willz123', NULL, '2021-03-15 17:27:19', 0),
(55, '180.241.29.228', 'willz@gmail.com', 1, '2021-03-15 17:27:40', 1),
(56, '180.252.224.245', 'willz@gmail.com', 1, '2021-03-15 17:28:54', 1),
(57, '125.167.191.239', 'Willz123', NULL, '2021-03-15 17:28:55', 0),
(58, '125.167.191.239', 'maxmanroe@gmail.com', NULL, '2021-03-15 17:36:03', 0),
(59, '125.167.191.239', 'maxmanroe@gmail.com', NULL, '2021-03-15 17:40:29', 0),
(60, '125.167.191.239', 'maxmanroe@gmail.com', NULL, '2021-03-15 17:40:53', 0),
(61, '::1', 'willz@gmail.com', 1, '2021-05-14 08:16:39', 1),
(62, '::1', 'willz@gmail.com', 1, '2021-05-15 12:21:54', 1),
(63, '::1', 'willz@gmail.com', 1, '2021-05-16 01:55:02', 1),
(64, '::1', 'willz@gmail.com', 1, '2021-05-16 08:00:07', 1),
(65, '::1', 'willz@gmail.com', 1, '2021-05-16 22:16:28', 1),
(66, '::1', 'willz@gmail.com', 1, '2021-05-17 06:03:17', 1),
(67, '::1', 'denaddd9990@ggmail.com', 8, '2021-05-17 07:02:36', 1),
(68, '::1', 'denaddd9990@ggmail.com', 8, '2021-05-17 07:14:08', 1),
(69, '::1', 'willz@gmail.com', 1, '2021-05-17 09:34:48', 1),
(70, '::1', 'denaddd9990@ggmail.com', 8, '2021-05-17 09:36:32', 1),
(71, '::1', 'willz@gmail.com', 1, '2021-05-17 10:25:31', 1),
(72, '::1', 'willz@gmail.com', 1, '2021-05-18 04:47:54', 1),
(73, '::1', 'denaddd9990@ggmail.com', 8, '2021-05-18 09:37:26', 1),
(74, '::1', 'denaddd9990@ggmail.com', 8, '2021-05-18 10:09:34', 1),
(75, '::1', 'willz@gmail.com', 1, '2021-05-18 14:02:45', 1),
(76, '::1', 'willz@gmail.com', 1, '2021-05-18 23:34:36', 1),
(77, '::1', 'willz@gmail.com', 1, '2021-05-19 01:02:04', 1),
(78, '::1', 'willz@gmail.com', 1, '2021-05-19 13:20:20', 1),
(79, '::1', 'denaddd9990@ggmail.com', 8, '2021-05-19 14:13:47', 1),
(80, '::1', 'willz@gmail.com', 1, '2021-05-19 14:16:37', 1),
(81, '::1', 'willz@gmail.com', 1, '2021-05-19 14:19:24', 1),
(82, '::1', 'denaddd9990@ggmail.com', 8, '2021-05-19 14:19:49', 1),
(83, '::1', 'willz@gmail.com', 1, '2021-05-19 14:28:56', 1),
(84, '::1', 'denaddd9990@ggmail.com', 8, '2021-05-19 14:29:09', 1),
(85, '::1', 'denaddd9990@ggmail.com', 8, '2021-05-19 14:32:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-menu', 'admin boleh manage menu'),
(2, 'manage-order', 'semua bisa manage orderan');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(1) NOT NULL,
  `CategoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`) VALUES
(1, 'PlayStation'),
(2, 'Xbox'),
(3, 'Nintendo'),
(4, 'SEGA');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `MenuID` int(10) NOT NULL,
  `MenuName` varchar(50) NOT NULL,
  `CategoryID` int(1) NOT NULL,
  `Price` decimal(25,2) NOT NULL,
  `Description` text NOT NULL,
  `Rating` int(1) NOT NULL,
  `Stok` int(10) NOT NULL DEFAULT 0,
  `Slug` varchar(50) NOT NULL,
  `FilesUploaded` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`MenuID`, `MenuName`, `CategoryID`, `Price`, `Description`, `Rating`, `Stok`, `Slug`, `FilesUploaded`) VALUES
(1, 'PS1', 1, '2500.00', 'Mainkan game-game lamamu di PS1 ini', 2, 0, 'ps1', 2),
(2, 'Xbox Series X', 2, '100000.00', 'Rasakan pengalaman baru bermain Xbox dengan refresh rate 120Hz di rumahmu bersama teman dan keluarga dengan teknologi ray-tracing', 3, 7, 'xboxseriesx', 4),
(3, 'PS2', 1, '5000.00', 'Nostalgia dengan game PS2 lamamu bersama temanmu', 4, 8, 'ps2', 4),
(4, 'PS3', 1, '600000.00', 'Mainkan game-game dengan kualitas tinggi dan experience bermain kualitas HD', 5, 12, 'ps3', 2),
(5, 'Nintendo Switch Lite', 3, '2000.00', 'Konsol game yang ringkas dengan ukuran yang compact dan mudah dibawa ke mana pun kamu mau', 2, 4, 'nintendoswitchlite', 4),
(6, 'Xbox One S', 2, '15000.00', 'Pengalaman bermain game Xbox yang memanjakan mata di layar 4K', 4, 8, 'xboxones', 3),
(7, 'PS4', 1, '5000.00', 'Game luar biasa langsung di PS4, dengan penyimpanan 500GB atau 1TB', 5, 10, 'ps4', 2),
(8, 'PS4 Pro', 1, '6000.00', 'Game 4K dan hiburan dengan HDR yang dinamis', 3, 4, 'ps4pro', 3),
(9, 'SEGA Genesis', 4, '2500.00', 'Rasakan permainan game retro dengan kualitas gambar 16-bit', 2, 11, 'segagenesis', 3),
(10, 'Nintendo Wii U', 3, '20000.00', 'Mainkan game di Nintendo Wii U dengan kualitas HD di layar touchscreen', 4, 7, 'nintendowiiu', 3),
(11, 'SEGA Saturn', 4, '5500.00', 'Rasakan permainan game retro dengan kualitas gambar 32-bit yang lebih modern', 4, 5, 'segasaturn', 2),
(12, 'Xbox Series S', 2, '10000.00', 'Rasakan pengalaman baru bermain Xbox dengan refresh rate 120Hz di rumahmu dengan ukuran yang lebih compact dengan teknologi ray-tracing', 5, 9, 'xboxseriess', 3),
(13, 'Nintendo Switch', 3, '5000.00', 'Bermain game di mana pun dan kapan pun kamu mau dengan performa yang menakjubkan', 2, 3, 'nintendoswitch', 3),
(14, 'Nintendo 3DS', 3, '16000.00', 'Rasakan pengalaman bermain game dengan efek 3D yang sesungguhnya', 3, 4, 'nintendo3ds', 2),
(15, 'PS5', 1, '50000.00', 'Rasakan sensasi bermain game PlayStation di resolusi 4K 120Hz dengan teknologi ray-tracing', 3, 7, 'ps5', 3),
(16, 'PS5 Digital Edition', 1, '999999.00', 'Rasakan pengalaman bermain game PlayStation 5 yang serba digital tanpa perlu membeli kaset game lagi', 5, 6, 'ps5digitaledition', 3),
(17, 'SEGA Dreamcast', 4, '5000.00', 'Rasakan game retro dari Sega yang lebih immersive dengan kualitas gambar yang menakjubkan', 2, 3, 'segadreamcast', 3);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1615653204, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `OrderID` int(10) NOT NULL,
  `id` int(11) UNSIGNED NOT NULL,
  `MenuID` int(10) NOT NULL,
  `total_order` bigint(1) NOT NULL,
  `total_price` decimal(25,2) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `StatusID` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`OrderID`, `id`, `MenuID`, `total_order`, `total_price`, `order_date`, `StatusID`) VALUES
(1, 8, 1, 2, '5000.00', '2021-03-15 11:18:36', 4),
(2, 8, 2, 4, '400000.00', '2021-03-15 11:20:11', 1),
(3, 4, 6, 4, '60000.00', '2021-03-15 11:20:37', 3),
(4, 6, 2, 4, '400000.00', '2021-03-15 13:02:40', 1),
(5, 10, 12, 5, '50000.00', '2021-03-15 13:10:49', 4),
(6, 3, 2, 10, '1000000.00', '2021-03-15 13:11:03', 2),
(10, 5, 1, 12, '30000.00', '2021-05-18 11:29:04', 1),
(11, 8, 3, 2, '10000.00', '2021-05-19 14:32:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `StatusID` int(1) NOT NULL,
  `StatusName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`StatusID`, `StatusName`) VALUES
(1, 'Sedang Dikirim'),
(2, 'Sudah Dikirim'),
(3, 'Siap di Pick-up'),
(4, 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `birthdate` datetime DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `firstname`, `lastname`, `birthdate`, `gender`, `alamat`, `no_telp`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'willz@gmail.com', 'willz123', 'Wilyamz', 'Gozali', '2019-10-31 21:18:50', 'Female', 'Jl Jend Sudirman, Bandung', '08123266850', '$2y$10$/8FRRhM//Jh2PtC1K7wLKeyiKHq0PyCw2ZxlpUzqIMk4SABP7qaky', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-03-13 11:00:34', '2021-03-13 11:00:34', NULL),
(3, 'kakax@gmail.com', 'kakaktua', 'Kakax', 'Tuakx', '2020-11-15 21:19:11', 'Male', 'Jl. Bedahulu, Bali', '08123904737', '$2y$10$hjXv0p4uNoFVMFCh8qSRlOQig2f4rbzILt3beXjDTemBuEW95I32a', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-03-13 11:12:25', '2021-03-13 11:12:25', NULL),
(4, 'wakanda@gmail.com', 'bigchungus', 'black', 'panther', '2020-11-05 21:18:45', 'Unknown', 'Jl. Kembar Timur, Jawa Barat', '0213855469', '$2y$10$TvcCumK8GW2I62xD.dZmdONmnu9M3v8rGoUeDsBCVcmBHJ27yeC1y', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-03-13 11:58:36', '2021-03-13 11:58:36', NULL),
(5, 'wakandas@gmail.com', 'bigchungusssss', 'dakka', 'kanda', '2019-02-22 21:18:58', 'Male', 'Jl Pandu Raya, Tegal Gundil', '0213855570', '$2y$10$j9qhivncwhgIUw4MQJn6ru05uvU5xCZY5HBYBP./ynhHz2OpU2PY.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-03-13 12:02:06', '2021-03-13 12:02:06', NULL),
(6, 'waaa@gmail.com', 'ikemen', 'mega', 'mama', '2020-07-04 21:18:39', 'Female', 'Jl Palmerah Brt 8, Kemanggisan', '0285421070', '$2y$10$PRDlhcnJZmQP1CVtqZ21Ie4lFaZ3OF.a6aYtOpcCCCWwfGZrkpvYi', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-03-13 13:59:44', '2021-03-13 13:59:44', NULL),
(8, 'denaddd9990@ggmail.com', 'denddd382', 'Dede', 'Hana', '2020-09-03 21:18:33', 'Female', 'Jl Ir H Juanda 362, Dago', '0215826676', '$2y$10$/9EBn61REscaxNjwHbs9wuPR3.zIbjXpbB8RQ6oHZXXj/sf423vXO', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-03-14 09:22:34', '2021-03-14 09:22:34', NULL),
(9, 'michaeliandiraa@gmail.com', 'rellpaa999', 'Michael', 'Fareliandira', '2020-12-01 21:18:29', 'Male', 'Jl Letnan Ramli 31', '08217972204', '$2y$10$ju8992ZsfrmQ/zeWxiaAgOPM.dbzGaQlPkizLhJxtt/WG9FodsJG6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-03-14 09:26:19', '2021-03-14 09:26:19', NULL),
(10, 'agung@umn.ac.id', 'hhyjwwww', 'xzz', 'ss', '2021-03-01 21:18:22', 'Male', 'Jl Buncit Raya 49, Kalibata', '0213855570', '$2y$10$0/rIiGR5bkSMDe/4kybAOe.pn6kJ4iVrPG5.DTVMy9.Czh4jo17gO', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-03-14 11:22:58', '2021-03-14 11:22:58', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`MenuID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `id` (`id`),
  ADD KEY `MenuID` (`MenuID`),
  ADD KEY `StatusID` (`StatusID`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`StatusID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `MenuID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `OrderID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `StatusID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`MenuID`) REFERENCES `menu` (`MenuID`),
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`StatusID`) REFERENCES `order_status` (`StatusID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
