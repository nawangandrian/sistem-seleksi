-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2025 at 02:35 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_seleksi`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrasi`
--

CREATE TABLE `administrasi` (
  `id_administrasi` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nip_administrasi` varchar(20) NOT NULL,
  `nama_administrasi` varchar(50) NOT NULL,
  `alamat_administrasi` varchar(50) NOT NULL,
  `no_telp_administrasi` varchar(16) NOT NULL,
  `email_administrasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrasi`
--

INSERT INTO `administrasi` (`id_administrasi`, `user_id`, `nip_administrasi`, `nama_administrasi`, `alamat_administrasi`, `no_telp_administrasi`, `email_administrasi`) VALUES
(18, 93, '202153019', 'Nawang Alan Andrian', 'Gebog, Kudus', '085678084545', 'andrian@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `benarsalah`
--

CREATE TABLE `benarsalah` (
  `id_benarsalah` int(11) NOT NULL,
  `soal_id` int(11) NOT NULL,
  `jawaban_benar_salah` enum('Benar','Salah','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `benarsalah`
--

INSERT INTO `benarsalah` (`id_benarsalah`, `soal_id`, `jawaban_benar_salah`) VALUES
(5, 93, 'Salah'),
(6, 94, 'Benar'),
(7, 95, 'Salah'),
(8, 96, 'Benar'),
(9, 97, 'Salah'),
(10, 98, 'Benar');

-- --------------------------------------------------------

--
-- Table structure for table `exam_status`
--

CREATE TABLE `exam_status` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ujian_id` int(11) NOT NULL,
  `status` enum('completed','not_completed') DEFAULT 'not_completed',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_status`
--

INSERT INTO `exam_status` (`id`, `user_id`, `ujian_id`, `status`, `created_at`) VALUES
(1, 260, 1, 'completed', '2025-03-03 11:51:54'),
(2, 261, 1, 'completed', '2025-03-03 13:18:33'),
(3, 262, 1, 'completed', '2025-03-03 13:54:11'),
(4, 263, 1, 'completed', '2025-03-03 13:57:21'),
(5, 264, 1, 'completed', '2025-03-03 13:59:24'),
(6, 265, 1, 'completed', '2025-03-03 14:01:40'),
(7, 266, 1, 'completed', '2025-03-03 14:03:05'),
(8, 267, 1, 'completed', '2025-03-03 14:05:02'),
(9, 268, 1, 'completed', '2025-03-03 14:06:33'),
(10, 269, 1, 'completed', '2025-03-03 14:08:09'),
(11, 270, 1, 'completed', '2025-03-03 14:09:52'),
(12, 271, 1, 'completed', '2025-03-03 14:11:26'),
(13, 272, 1, 'completed', '2025-03-03 14:12:39'),
(14, 273, 1, 'completed', '2025-03-03 14:14:01'),
(15, 274, 1, 'completed', '2025-03-03 14:15:08'),
(16, 275, 1, 'completed', '2025-03-03 14:16:12'),
(17, 276, 1, 'completed', '2025-03-03 14:17:16'),
(18, 277, 1, 'completed', '2025-03-03 14:18:39'),
(19, 278, 1, 'completed', '2025-03-03 14:19:52'),
(20, 279, 1, 'completed', '2025-03-03 14:20:58'),
(21, 280, 1, 'completed', '2025-03-03 14:22:22'),
(22, 281, 1, 'completed', '2025-03-03 14:23:26'),
(23, 282, 1, 'completed', '2025-03-03 14:24:36'),
(24, 283, 1, 'completed', '2025-03-03 14:25:57'),
(25, 284, 1, 'completed', '2025-03-03 14:27:02'),
(26, 319, 11, 'completed', '2025-03-07 04:13:22'),
(27, 323, 11, 'completed', '2025-03-07 04:14:07'),
(28, 339, 11, 'completed', '2025-04-27 12:21:09'),
(29, 292, 9, 'completed', '2025-05-23 13:19:15'),
(30, 293, 9, 'completed', '2025-05-23 13:22:48'),
(31, 294, 9, 'completed', '2025-05-23 13:24:13'),
(32, 295, 9, 'completed', '2025-05-23 13:25:38'),
(33, 296, 9, 'completed', '2025-05-23 13:26:59'),
(34, 297, 9, 'completed', '2025-05-23 13:28:51'),
(35, 298, 9, 'completed', '2025-05-23 13:30:01'),
(36, 299, 9, 'completed', '2025-05-23 13:31:09'),
(37, 300, 9, 'completed', '2025-05-23 13:32:18'),
(38, 301, 9, 'completed', '2025-05-23 13:33:25'),
(39, 302, 9, 'completed', '2025-05-23 13:34:41'),
(40, 303, 9, 'completed', '2025-05-23 13:35:51'),
(41, 304, 9, 'completed', '2025-05-23 13:37:13'),
(42, 305, 9, 'completed', '2025-05-23 13:38:33'),
(43, 306, 9, 'completed', '2025-05-23 13:39:50'),
(44, 307, 9, 'completed', '2025-05-23 13:41:30'),
(45, 308, 9, 'completed', '2025-05-23 13:42:54'),
(46, 309, 9, 'completed', '2025-05-23 13:44:15'),
(47, 310, 9, 'completed', '2025-05-23 13:45:35'),
(48, 311, 9, 'completed', '2025-05-23 13:46:48'),
(49, 312, 9, 'completed', '2025-05-23 13:47:56'),
(50, 313, 9, 'completed', '2025-05-23 13:48:56'),
(51, 314, 9, 'completed', '2025-05-23 13:49:56'),
(52, 315, 9, 'completed', '2025-05-23 13:51:30'),
(53, 316, 9, 'completed', '2025-05-23 13:52:43'),
(54, 235, 10, 'completed', '2025-05-23 15:09:53'),
(55, 236, 10, 'completed', '2025-05-23 15:14:44'),
(56, 237, 10, 'completed', '2025-05-23 15:15:59'),
(57, 238, 10, 'completed', '2025-05-23 15:17:28'),
(58, 239, 10, 'completed', '2025-05-23 15:19:35'),
(59, 240, 10, 'completed', '2025-05-23 15:22:04'),
(60, 241, 10, 'completed', '2025-05-23 15:23:39'),
(61, 242, 10, 'completed', '2025-05-23 15:25:07'),
(62, 243, 10, 'completed', '2025-05-23 15:26:41'),
(63, 244, 10, 'completed', '2025-05-23 15:27:51'),
(64, 245, 10, 'completed', '2025-05-23 15:29:18'),
(65, 246, 10, 'completed', '2025-05-23 15:30:39'),
(66, 247, 10, 'completed', '2025-05-23 15:31:49'),
(67, 248, 10, 'completed', '2025-05-23 15:32:59'),
(68, 249, 10, 'completed', '2025-05-23 15:34:02'),
(69, 250, 10, 'completed', '2025-05-23 15:35:12'),
(70, 251, 10, 'completed', '2025-05-23 15:36:45'),
(71, 252, 10, 'completed', '2025-05-23 15:37:51'),
(72, 253, 10, 'completed', '2025-05-23 15:39:52'),
(73, 254, 10, 'completed', '2025-05-23 15:41:11'),
(74, 255, 10, 'completed', '2025-05-23 15:43:04'),
(75, 256, 10, 'completed', '2025-05-23 15:44:16'),
(76, 257, 10, 'completed', '2025-05-23 15:45:26'),
(77, 258, 10, 'completed', '2025-05-23 15:46:41'),
(78, 259, 10, 'completed', '2025-05-23 15:49:41');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_pengetahuan`
--

CREATE TABLE `hasil_pengetahuan` (
  `id_hasil` int(11) NOT NULL,
  `peserta_id` int(11) NOT NULL,
  `pengetahuan_hasil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_pengetahuan`
--

INSERT INTO `hasil_pengetahuan` (`id_hasil`, `peserta_id`, `pengetahuan_hasil`) VALUES
(1, 201, 100),
(2, 202, 90),
(3, 203, 90),
(4, 204, 80),
(5, 205, 80),
(6, 206, 60),
(7, 207, 100),
(8, 208, 70),
(9, 209, 60),
(10, 210, 90),
(11, 211, 80),
(12, 212, 80),
(13, 213, 80),
(14, 214, 70),
(15, 215, 90),
(16, 216, 50),
(17, 217, 90),
(18, 218, 50),
(19, 219, 80),
(20, 220, 90),
(21, 221, 70),
(22, 222, 90),
(23, 223, 90),
(24, 224, 80),
(25, 225, 90),
(26, 258, 0),
(27, 262, 20),
(28, 274, 50),
(29, 233, 78),
(30, 234, 40),
(31, 235, 55),
(32, 236, 80),
(33, 237, 75),
(34, 238, 60),
(35, 239, 93),
(36, 240, 70),
(37, 241, 80),
(38, 242, 68),
(39, 243, 95),
(40, 244, 68),
(41, 245, 70),
(42, 246, 80),
(43, 247, 58),
(44, 248, 87),
(45, 249, 75),
(46, 250, 83),
(47, 251, 88),
(48, 252, 65),
(49, 253, 63),
(50, 254, 87),
(51, 255, 90),
(52, 256, 73),
(53, 257, 77),
(54, 176, 98),
(55, 177, 85),
(56, 178, 70),
(57, 179, 67),
(58, 180, 83),
(59, 181, 63),
(60, 182, 90),
(61, 183, 73),
(62, 184, 85),
(63, 185, 83),
(64, 186, 70),
(65, 187, 78),
(66, 188, 65),
(67, 189, 70),
(68, 190, 98),
(69, 191, 76),
(70, 192, 83),
(71, 193, 70),
(72, 194, 88),
(73, 195, 80),
(74, 196, 75),
(75, 197, 80),
(76, 198, 75),
(77, 199, 90),
(78, 200, 89);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_seleksi`
--

CREATE TABLE `hasil_seleksi` (
  `id_hasil_seleksi` int(11) NOT NULL,
  `pelatihan_id` int(11) NOT NULL,
  `peserta_id` int(11) NOT NULL,
  `pengetahuan_hasil_id` int(11) NOT NULL,
  `wawancara_hasil_id` int(11) NOT NULL,
  `nilai_usia` int(11) DEFAULT NULL,
  `nilai_status_pekerjaan` int(11) DEFAULT NULL,
  `hasil_total_seleksi` float DEFAULT NULL,
  `hasil_tes_seleksi` enum('Lolos','Tidak Lolos') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_seleksi`
--

INSERT INTO `hasil_seleksi` (`id_hasil_seleksi`, `pelatihan_id`, `peserta_id`, `pengetahuan_hasil_id`, `wawancara_hasil_id`, `nilai_usia`, `nilai_status_pekerjaan`, `hasil_total_seleksi`, `hasil_tes_seleksi`) VALUES
(50, 1, 207, 7, 13, 2, 3, 0.946615, 'Lolos'),
(51, 1, 201, 1, 1, 3, 3, 0.976562, 'Lolos'),
(52, 1, 215, 15, 7, 2, 3, 0.909115, 'Lolos'),
(53, 1, 202, 2, 2, 3, 3, 0.950781, 'Lolos'),
(54, 1, 203, 3, 3, 3, 3, 0.93125, 'Lolos'),
(55, 1, 223, 23, 19, 3, 3, 0.93125, 'Lolos'),
(56, 1, 210, 10, 12, 3, 3, 0.93125, 'Lolos'),
(57, 1, 204, 4, 4, 2, 3, 0.883333, 'Lolos'),
(58, 1, 217, 17, 21, 3, 3, 0.923437, 'Lolos'),
(59, 1, 211, 11, 6, 3, 3, 0.921094, 'Lolos'),
(60, 1, 222, 22, 17, 3, 3, 0.919531, 'Lolos'),
(61, 1, 205, 5, 5, 3, 3, 0.913281, 'Lolos'),
(62, 1, 225, 25, 20, 3, 3, 0.911719, 'Lolos'),
(63, 1, 212, 12, 10, 3, 3, 0.905469, 'Lolos'),
(64, 1, 220, 20, 25, 2, 3, 0.86224, 'Tidak Lolos'),
(65, 1, 224, 24, 18, 2, 3, 0.859896, 'Tidak Lolos'),
(66, 1, 219, 19, 22, 3, 3, 0.89375, 'Lolos'),
(67, 1, 214, 14, 8, 3, 3, 0.867969, 'Lolos'),
(68, 1, 208, 8, 15, 3, 3, 0.864062, 'Tidak Lolos'),
(69, 1, 221, 21, 16, 3, 3, 0.848437, 'Tidak Lolos'),
(70, 1, 213, 13, 9, 2, 3, 0.805208, 'Tidak Lolos'),
(71, 1, 206, 6, 11, 3, 3, 0.791406, 'Tidak Lolos'),
(72, 1, 209, 9, 14, 3, 3, 0.7875, 'Tidak Lolos'),
(73, 1, 216, 16, 23, 3, 3, 0.769531, 'Tidak Lolos'),
(74, 1, 218, 18, 24, 3, 3, 0.734375, 'Tidak Lolos'),
(75, 6, 262, 27, 27, 3, NULL, 0.712857, 'Tidak Lolos'),
(76, 6, 258, 26, 26, 3, NULL, 0.571429, 'Tidak Lolos'),
(77, 6, 274, 28, 28, 3, NULL, 0.97, 'Lolos'),
(78, 4, 233, 29, 29, 3, NULL, 0.868421, 'Lolos'),
(79, 4, 254, 50, 37, 3, NULL, 0.950316, 'Lolos'),
(80, 4, 239, 35, 53, 3, NULL, 0.943579, 'Lolos'),
(81, 4, 248, 44, 45, 3, NULL, 0.938316, 'Lolos'),
(82, 4, 251, 47, 48, 3, NULL, 0.934526, 'Lolos'),
(83, 4, 255, 51, 36, 3, NULL, 0.930947, 'Lolos'),
(84, 4, 236, 32, 32, 3, NULL, 0.916842, 'Lolos'),
(85, 4, 243, 39, 39, 3, NULL, 0.912, 'Lolos'),
(86, 4, 250, 46, 46, 3, NULL, 0.909474, 'Lolos'),
(87, 4, 246, 42, 42, 3, NULL, 0.908842, 'Lolos'),
(88, 4, 241, 37, 50, 3, NULL, 0.892842, 'Lolos'),
(89, 4, 237, 33, 33, 3, NULL, 0.879789, 'Lolos'),
(90, 4, 257, 53, 35, 3, NULL, 0.864211, 'Lolos'),
(91, 4, 245, 41, 40, 3, NULL, 0.846737, 'Lolos'),
(92, 4, 238, 34, 51, 3, NULL, 0.844632, 'Lolos'),
(93, 4, 242, 38, 49, 3, NULL, 0.838316, 'Lolos'),
(94, 4, 244, 40, 43, 3, NULL, 0.838316, 'Tidak Lolos'),
(95, 4, 249, 45, 44, 3, NULL, 0.83579, 'Tidak Lolos'),
(96, 4, 240, 36, 52, 3, NULL, 0.834737, 'Tidak Lolos'),
(97, 4, 235, 31, 31, 3, NULL, 0.831579, 'Tidak Lolos'),
(98, 4, 256, 52, 38, 3, NULL, 0.831368, 'Tidak Lolos'),
(99, 4, 247, 43, 41, 3, NULL, 0.800211, 'Tidak Lolos'),
(100, 4, 252, 48, 47, 3, NULL, 0.797684, 'Tidak Lolos'),
(101, 4, 253, 49, 34, 3, NULL, 0.797263, 'Tidak Lolos'),
(102, 4, 234, 30, 30, 3, NULL, 0.700421, 'Tidak Lolos'),
(103, 5, 190, 68, 68, 3, NULL, 0.969388, 'Lolos'),
(104, 5, 176, 54, 54, 2, NULL, 0.939261, 'Lolos'),
(105, 5, 185, 63, 63, 3, NULL, 0.934402, 'Lolos'),
(106, 5, 177, 55, 55, 3, NULL, 0.921283, 'Lolos'),
(107, 5, 200, 78, 70, 3, NULL, 0.91691, 'Lolos'),
(108, 5, 187, 65, 65, 3, NULL, 0.912536, 'Lolos'),
(109, 5, 194, 72, 78, 3, NULL, 0.899417, 'Lolos'),
(110, 5, 199, 77, 72, 3, NULL, 0.890671, 'Lolos'),
(111, 5, 197, 75, 73, 3, NULL, 0.886297, 'Lolos'),
(112, 5, 195, 73, 76, 3, NULL, 0.881924, 'Lolos'),
(113, 5, 182, 60, 59, 3, NULL, 0.877551, 'Lolos'),
(114, 5, 184, 62, 61, 2, NULL, 0.856171, 'Lolos'),
(115, 5, 192, 70, 74, 3, NULL, 0.838192, 'Lolos'),
(116, 5, 186, 64, 64, 3, NULL, 0.833819, 'Lolos'),
(117, 5, 183, 61, 62, 3, NULL, 0.833819, 'Lolos'),
(118, 5, 191, 69, 77, 3, NULL, 0.825073, 'Lolos'),
(119, 5, 179, 57, 57, 3, NULL, 0.811953, 'Tidak Lolos'),
(120, 5, 178, 56, 56, 3, NULL, 0.811953, 'Tidak Lolos'),
(121, 5, 181, 59, 60, 3, NULL, 0.803207, 'Tidak Lolos'),
(122, 5, 198, 76, 71, 3, NULL, 0.803207, 'Tidak Lolos'),
(123, 5, 180, 58, 58, 2, NULL, 0.79932, 'Tidak Lolos'),
(124, 5, 196, 74, 69, 2, NULL, 0.79932, 'Tidak Lolos'),
(125, 5, 189, 67, 67, 3, NULL, 0.790087, 'Tidak Lolos'),
(126, 5, 188, 66, 66, 3, NULL, 0.772595, 'Tidak Lolos'),
(127, 5, 193, 71, 75, 2, NULL, 0.729349, 'Tidak Lolos');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_wawancara`
--

CREATE TABLE `hasil_wawancara` (
  `id_wawancara` int(11) NOT NULL,
  `peserta_id` int(11) NOT NULL,
  `wawancara_hasil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_wawancara`
--

INSERT INTO `hasil_wawancara` (`id_wawancara`, `peserta_id`, `wawancara_hasil`) VALUES
(1, 201, 90),
(2, 202, 93),
(3, 203, 88),
(4, 204, 96),
(5, 205, 93),
(6, 211, 95),
(7, 215, 93),
(8, 214, 91),
(9, 213, 76),
(10, 212, 91),
(11, 206, 81),
(12, 210, 88),
(13, 207, 93),
(14, 209, 80),
(15, 208, 90),
(16, 221, 86),
(17, 222, 85),
(18, 224, 90),
(19, 223, 88),
(20, 225, 83),
(21, 217, 86),
(22, 219, 88),
(23, 216, 85),
(24, 218, 76),
(25, 220, 81),
(26, 258, 100),
(27, 262, 93),
(28, 274, 93),
(29, 233, 85),
(30, 234, 83),
(31, 235, 100),
(32, 236, 95),
(33, 237, 91),
(34, 253, 83),
(35, 257, 85),
(36, 255, 88),
(37, 254, 96),
(38, 256, 81),
(39, 243, 78),
(40, 245, 88),
(41, 247, 89),
(42, 246, 93),
(43, 244, 88),
(44, 249, 80),
(45, 248, 93),
(46, 250, 90),
(47, 252, 81),
(48, 251, 91),
(49, 242, 88),
(50, 241, 89),
(51, 238, 98),
(52, 240, 85),
(53, 239, 88),
(54, 176, 95),
(55, 177, 93),
(56, 178, 83),
(57, 179, 86),
(58, 180, 78),
(59, 182, 78),
(60, 181, 88),
(61, 184, 89),
(62, 183, 85),
(63, 185, 98),
(64, 186, 88),
(65, 187, 98),
(66, 188, 79),
(67, 189, 78),
(68, 190, 91),
(69, 196, 86),
(70, 200, 88),
(71, 198, 76),
(72, 199, 81),
(73, 197, 90),
(74, 192, 76),
(75, 193, 75),
(76, 195, 89),
(77, 191, 80),
(78, 194, 85);

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_sementara`
--

CREATE TABLE `jawaban_sementara` (
  `id_jawab` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `soal_id` int(11) NOT NULL,
  `nomor_soal` int(11) NOT NULL,
  `jawaban` text NOT NULL,
  `jawab_benar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban_sementara`
--

INSERT INTO `jawaban_sementara` (`id_jawab`, `user_id`, `soal_id`, `nomor_soal`, `jawaban`, `jawab_benar`) VALUES
(278, 259, 79, 1, '232', '0'),
(279, 259, 80, 2, '237', '1'),
(280, 259, 81, 3, '246', '1'),
(281, 259, 101, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '0.9'),
(282, 259, 85, 7, '262', '1'),
(283, 259, 84, 6, '259', '1'),
(284, 260, 66, 1, '196', '1'),
(285, 260, 67, 2, '199', '1'),
(286, 260, 68, 3, '205', '1'),
(287, 260, 69, 4, '210', '1'),
(288, 260, 70, 5, '216', '1'),
(289, 260, 71, 6, '220', '1'),
(290, 260, 72, 7, '224', '1'),
(291, 260, 95, 8, 'Salah', '1'),
(292, 260, 96, 9, 'Benar', '1'),
(293, 260, 99, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(294, 261, 66, 1, '196', '1'),
(295, 261, 67, 2, '199', '1'),
(296, 261, 68, 3, '204', '0'),
(297, 261, 69, 4, '210', '1'),
(298, 261, 70, 5, '216', '1'),
(299, 261, 71, 6, '220', '1'),
(300, 261, 72, 7, '224', '1'),
(301, 261, 95, 8, 'Salah', '1'),
(302, 261, 96, 9, 'Benar', '1'),
(303, 261, 99, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(304, 262, 66, 1, '196', '1'),
(305, 262, 67, 2, '199', '1'),
(306, 262, 68, 3, '205', '1'),
(307, 262, 69, 4, '210', '1'),
(308, 262, 70, 5, '216', '1'),
(309, 262, 71, 6, '220', '1'),
(310, 262, 72, 7, '227', '0'),
(311, 262, 95, 8, 'Salah', '1'),
(312, 262, 96, 9, 'Benar', '1'),
(313, 262, 99, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.\n', '1'),
(314, 263, 66, 1, '196', '1'),
(315, 263, 67, 2, '203', '0'),
(316, 263, 68, 3, '205', '1'),
(317, 263, 69, 4, '210', '1'),
(318, 263, 70, 5, '217', '0'),
(319, 263, 71, 6, '220', '1'),
(320, 263, 72, 7, '224', '1'),
(321, 263, 95, 8, 'Salah', '1'),
(322, 263, 96, 9, 'Benar', '1'),
(323, 263, 99, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(324, 264, 66, 1, '196', '1'),
(325, 264, 67, 2, '199', '1'),
(326, 264, 68, 3, '205', '1'),
(327, 264, 69, 4, '212', '0'),
(328, 264, 70, 5, '216', '1'),
(329, 264, 71, 6, '220', '1'),
(330, 264, 72, 7, '228', '0'),
(331, 264, 95, 8, 'Salah', '1'),
(332, 264, 96, 9, 'Benar', '1'),
(333, 264, 99, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(334, 265, 66, 1, '195', '0'),
(335, 265, 67, 2, '203', '0'),
(336, 265, 68, 3, '205', '1'),
(337, 265, 69, 4, '210', '1'),
(338, 265, 70, 5, '217', '0'),
(339, 265, 71, 6, '220', '1'),
(340, 265, 72, 7, '228', '0'),
(341, 265, 95, 8, 'Salah', '1'),
(342, 265, 96, 9, 'Benar', '1'),
(343, 265, 99, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(344, 266, 66, 1, '196', '1'),
(345, 266, 67, 2, '199', '1'),
(346, 266, 68, 3, '205', '1'),
(347, 266, 69, 4, '210', '1'),
(348, 266, 70, 5, '216', '1'),
(349, 266, 71, 6, '220', '1'),
(350, 266, 72, 7, '224', '1'),
(351, 266, 95, 8, 'Salah', '1'),
(352, 266, 96, 9, 'Benar', '1'),
(353, 266, 99, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(354, 267, 66, 1, '196', '1'),
(355, 267, 67, 2, '203', '0'),
(356, 267, 68, 3, '205', '1'),
(357, 267, 69, 4, '212', '0'),
(358, 267, 70, 5, '217', '0'),
(359, 267, 71, 6, '220', '1'),
(360, 267, 72, 7, '224', '1'),
(361, 267, 95, 8, 'Salah', '1'),
(362, 267, 96, 9, 'Benar', '1'),
(363, 267, 99, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(364, 268, 66, 1, '195', '0'),
(365, 268, 67, 2, '199', '1'),
(366, 268, 68, 3, '205', '1'),
(367, 268, 69, 4, '210', '1'),
(368, 268, 70, 5, '217', '0'),
(369, 268, 71, 6, '220', '1'),
(370, 268, 72, 7, '227', '0'),
(371, 268, 95, 8, 'Benar', '0'),
(372, 268, 96, 9, 'Benar', '1'),
(373, 268, 99, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(374, 269, 66, 1, '196', '1'),
(375, 269, 96, 9, 'Benar', '1'),
(376, 269, 99, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(377, 269, 95, 8, 'Salah', '1'),
(378, 269, 72, 7, '224', '1'),
(379, 269, 71, 6, '220', '1'),
(380, 269, 70, 5, '216', '1'),
(381, 269, 69, 4, '209', '0'),
(382, 269, 68, 3, '205', '1'),
(383, 269, 67, 2, '199', '1'),
(384, 270, 66, 1, '196', '1'),
(385, 270, 72, 7, '227', '0'),
(386, 270, 95, 8, 'Salah', '1'),
(387, 270, 96, 9, 'Benar', '1'),
(388, 270, 99, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(389, 270, 67, 2, '201', '0'),
(390, 270, 68, 3, '205', '1'),
(391, 270, 69, 4, '210', '1'),
(392, 270, 70, 5, '216', '1'),
(393, 270, 71, 6, '220', '1'),
(394, 271, 66, 1, '196', '1'),
(395, 271, 67, 2, '200', '0'),
(396, 271, 68, 3, '205', '1'),
(397, 271, 69, 4, '210', '1'),
(398, 271, 70, 5, '217', '0'),
(399, 271, 71, 6, '220', '1'),
(400, 271, 72, 7, '224', '1'),
(401, 271, 95, 8, 'Salah', '1'),
(402, 271, 96, 9, 'Benar', '1'),
(403, 271, 99, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(404, 272, 66, 1, '196', '1'),
(405, 272, 67, 2, '199', '1'),
(406, 272, 68, 3, '205', '1'),
(407, 272, 69, 4, '211', '0'),
(408, 272, 70, 5, '216', '1'),
(409, 272, 71, 6, '220', '1'),
(410, 272, 72, 7, '226', '0'),
(411, 272, 95, 8, 'Salah', '1'),
(412, 272, 96, 9, 'Benar', '1'),
(413, 272, 99, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(414, 273, 66, 1, '196', '1'),
(415, 273, 67, 2, '199', '1'),
(416, 273, 68, 3, '205', '1'),
(417, 273, 69, 4, '212', '0'),
(418, 273, 70, 5, '217', '0'),
(419, 273, 71, 6, '220', '1'),
(420, 273, 72, 7, '228', '0'),
(421, 273, 95, 8, 'Salah', '1'),
(422, 273, 96, 9, 'Benar', '1'),
(423, 273, 99, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(424, 274, 66, 1, '196', '1'),
(425, 274, 67, 2, '199', '1'),
(426, 274, 68, 3, '205', '1'),
(427, 274, 69, 4, '210', '1'),
(428, 274, 70, 5, '215', '0'),
(429, 274, 71, 6, '220', '1'),
(430, 274, 72, 7, '224', '1'),
(431, 274, 95, 8, 'Salah', '1'),
(432, 274, 96, 9, 'Benar', '1'),
(433, 274, 99, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(434, 275, 67, 2, '199', '1'),
(435, 275, 68, 3, '205', '1'),
(436, 275, 69, 4, '211', '0'),
(437, 275, 70, 5, '214', '0'),
(438, 275, 71, 6, '220', '1'),
(439, 275, 72, 7, '226', '0'),
(440, 275, 95, 8, 'Salah', '1'),
(441, 275, 96, 9, 'Salah', '0'),
(442, 275, 99, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(443, 276, 66, 1, '196', '1'),
(444, 276, 67, 2, '199', '1'),
(445, 276, 68, 3, '205', '1'),
(446, 276, 69, 4, '210', '1'),
(447, 276, 70, 5, '216', '1'),
(448, 276, 71, 6, '220', '1'),
(449, 276, 72, 7, '227', '0'),
(450, 276, 95, 8, 'Salah', '1'),
(451, 276, 96, 9, 'Benar', '1'),
(452, 276, 99, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(453, 277, 66, 1, '196', '1'),
(454, 277, 67, 2, '199', '1'),
(455, 277, 68, 3, '206', '0'),
(456, 277, 69, 4, '211', '0'),
(457, 277, 70, 5, '215', '0'),
(458, 277, 71, 6, '220', '1'),
(459, 277, 72, 7, '227', '0'),
(460, 277, 95, 8, 'Salah', '1'),
(461, 277, 96, 9, 'Salah', '0'),
(462, 277, 99, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(463, 278, 67, 2, '200', '0'),
(464, 278, 68, 3, '205', '1'),
(465, 278, 69, 4, '210', '1'),
(466, 278, 70, 5, '216', '1'),
(467, 278, 71, 6, '220', '1'),
(468, 278, 72, 7, '224', '1'),
(469, 278, 95, 8, 'Salah', '1'),
(470, 278, 96, 9, 'Benar', '1'),
(471, 278, 99, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(472, 279, 66, 1, '196', '1'),
(473, 279, 67, 2, '199', '1'),
(474, 279, 68, 3, '205', '1'),
(475, 279, 69, 4, '210', '1'),
(476, 279, 70, 5, '217', '0'),
(477, 279, 71, 6, '220', '1'),
(478, 279, 72, 7, '224', '1'),
(479, 279, 95, 8, 'Salah', '1'),
(480, 279, 96, 9, 'Benar', '1'),
(481, 279, 99, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(482, 280, 67, 2, '199', '1'),
(483, 280, 68, 3, '205', '1'),
(484, 280, 69, 4, '209', '0'),
(485, 280, 70, 5, '216', '1'),
(486, 280, 71, 6, '220', '1'),
(487, 280, 72, 7, '228', '0'),
(488, 280, 95, 8, 'Salah', '1'),
(489, 280, 96, 9, 'Benar', '1'),
(490, 280, 99, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(491, 281, 66, 1, '196', '1'),
(492, 281, 67, 2, '199', '1'),
(493, 281, 68, 3, '205', '1'),
(494, 281, 69, 4, '210', '1'),
(495, 281, 70, 5, '215', '0'),
(496, 281, 71, 6, '220', '1'),
(497, 281, 72, 7, '224', '1'),
(498, 281, 95, 8, 'Salah', '1'),
(499, 281, 96, 9, 'Benar', '1'),
(500, 281, 99, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(501, 282, 66, 1, '196', '1'),
(502, 282, 67, 2, '199', '1'),
(503, 282, 68, 3, '205', '1'),
(504, 282, 69, 4, '210', '1'),
(505, 282, 70, 5, '216', '1'),
(506, 282, 71, 6, '220', '1'),
(507, 282, 72, 7, '227', '0'),
(508, 282, 95, 8, 'Salah', '1'),
(509, 282, 96, 9, 'Benar', '1'),
(510, 282, 99, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(511, 283, 66, 1, '196', '1'),
(512, 283, 67, 2, '199', '1'),
(513, 283, 68, 3, '205', '1'),
(514, 283, 69, 4, '210', '1'),
(515, 283, 70, 5, '217', '0'),
(516, 283, 71, 6, '220', '1'),
(517, 283, 72, 7, '225', '0'),
(518, 283, 95, 8, 'Salah', '1'),
(519, 283, 96, 9, 'Benar', '1'),
(520, 283, 99, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(521, 284, 67, 2, '199', '1'),
(522, 284, 68, 3, '205', '1'),
(523, 284, 69, 4, '210', '1'),
(524, 284, 70, 5, '216', '1'),
(525, 284, 71, 6, '220', '1'),
(526, 284, 72, 7, '224', '1'),
(527, 284, 95, 8, 'Salah', '1'),
(528, 284, 96, 9, 'Benar', '1'),
(529, 284, 99, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(530, 319, 102, 1, '304', '0'),
(531, 319, 103, 2, '307', '0'),
(532, 319, 104, 3, '315', '0'),
(533, 319, 105, 4, '317', '0'),
(534, 319, 106, 5, '324', '0'),
(535, 323, 102, 1, '302', '1'),
(536, 323, 103, 2, '309', '0'),
(537, 323, 104, 3, '316', '0'),
(538, 323, 105, 4, '318', '1'),
(539, 323, 106, 5, '325', '0'),
(540, 339, 102, 1, '302', '1'),
(541, 339, 103, 2, '311', '1'),
(542, 339, 104, 3, '312', '1'),
(543, 339, 105, 4, '318', '1'),
(544, 339, 106, 5, '326', '1'),
(545, 292, 86, 1, '267', '1'),
(546, 292, 87, 2, '276', '1'),
(547, 292, 88, 3, '277', '1'),
(548, 292, 89, 4, '283', '1'),
(549, 292, 90, 5, '287', '0'),
(550, 292, 91, 6, '292', '1'),
(551, 292, 92, 7, '300', '0'),
(552, 292, 97, 8, 'Salah', '1'),
(553, 292, 98, 9, 'Benar', '1'),
(554, 292, 100, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '0.8'),
(555, 293, 86, 1, '268', '0'),
(556, 293, 86, 1, '267', '1'),
(557, 293, 86, 2, '271', '0'),
(558, 293, 87, 3, '272', '0'),
(559, 293, 88, 4, '278', '0'),
(560, 293, 89, 5, '286', '0'),
(561, 293, 90, 6, '287', '0'),
(562, 293, 91, 7, '296', '0'),
(563, 293, 97, 8, 'Salah', '1'),
(564, 293, 98, 9, 'Benar', '1'),
(565, 293, 100, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(566, 294, 86, 1, '267', '1'),
(567, 294, 87, 2, '273', '0'),
(568, 294, 88, 3, '277', '1'),
(569, 294, 89, 4, '283', '1'),
(570, 294, 90, 5, '287', '0'),
(571, 294, 91, 6, '292', '1'),
(572, 294, 92, 7, '300', '0'),
(573, 294, 97, 8, 'Salah', '1'),
(574, 294, 98, 9, 'Salah', '0'),
(575, 294, 100, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '0.5'),
(576, 295, 86, 1, '267', '1'),
(577, 295, 87, 2, '275', '0'),
(578, 295, 88, 3, '277', '1'),
(579, 295, 89, 4, '283', '1'),
(580, 295, 90, 5, '291', '1'),
(581, 295, 91, 6, '292', '1'),
(582, 295, 92, 7, '300', '0'),
(583, 295, 97, 8, 'Salah', '1'),
(584, 295, 98, 9, 'Benar', '1'),
(585, 295, 100, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(586, 296, 86, 1, '270', '0'),
(587, 296, 87, 2, '276', '1'),
(588, 296, 88, 3, '277', '1'),
(589, 296, 89, 4, '283', '1'),
(590, 296, 90, 5, '291', '1'),
(591, 296, 91, 6, '292', '1'),
(592, 296, 92, 7, '301', '1'),
(593, 296, 97, 8, 'Salah', '1'),
(594, 296, 98, 9, 'Salah', '0'),
(595, 296, 100, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '0.5'),
(596, 297, 87, 2, '273', '0'),
(597, 297, 88, 3, '277', '1'),
(598, 297, 89, 4, '283', '1'),
(599, 297, 90, 5, '291', '1'),
(600, 297, 91, 6, '292', '1'),
(601, 297, 92, 7, '300', '0'),
(602, 297, 97, 8, 'Benar', '0'),
(603, 297, 98, 9, 'Benar', '1'),
(604, 297, 100, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(605, 298, 86, 1, '267', '1'),
(606, 298, 87, 2, '276', '1'),
(607, 298, 88, 3, '277', '1'),
(608, 298, 89, 4, '283', '1'),
(609, 298, 90, 5, '291', '1'),
(610, 298, 91, 6, '292', '1'),
(611, 298, 92, 7, '301', '1'),
(612, 298, 97, 8, 'Salah', '1'),
(613, 298, 98, 9, 'Benar', '1'),
(614, 298, 100, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '0.3'),
(615, 299, 87, 2, '274', '0'),
(616, 299, 88, 3, '281', '0'),
(617, 299, 89, 4, '283', '1'),
(618, 299, 90, 5, '291', '1'),
(619, 299, 91, 6, '292', '1'),
(620, 299, 92, 7, '301', '1'),
(621, 299, 97, 8, 'Salah', '1'),
(622, 299, 98, 9, 'Benar', '1'),
(623, 299, 100, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(624, 300, 86, 1, '267', '1'),
(625, 300, 87, 2, '276', '1'),
(626, 300, 88, 3, '277', '1'),
(627, 300, 89, 4, '283', '1'),
(628, 300, 90, 5, '289', '0'),
(629, 300, 91, 6, '296', '0'),
(630, 300, 92, 7, '301', '1'),
(631, 300, 97, 8, 'Salah', '1'),
(632, 300, 98, 9, 'Benar', '1'),
(633, 300, 100, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(634, 301, 87, 2, '276', '1'),
(635, 301, 88, 3, '278', '0'),
(636, 301, 89, 4, '283', '1'),
(637, 301, 90, 5, '291', '1'),
(638, 301, 91, 6, '292', '1'),
(639, 301, 92, 7, '301', '1'),
(640, 301, 97, 8, 'Benar', '0'),
(641, 301, 98, 9, 'Benar', '1'),
(642, 301, 100, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '0.8'),
(643, 302, 86, 1, '267', '1'),
(644, 302, 87, 2, '276', '1'),
(645, 302, 88, 3, '277', '1'),
(646, 302, 89, 4, '283', '1'),
(647, 302, 90, 5, '291', '1'),
(648, 302, 91, 6, '292', '1'),
(649, 302, 92, 7, '301', '1'),
(650, 302, 97, 8, 'Salah', '1'),
(651, 302, 98, 9, 'Benar', '1'),
(652, 302, 100, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '0.5'),
(653, 303, 86, 1, '267', '1'),
(654, 303, 87, 2, '274', '0'),
(655, 303, 88, 3, '277', '1'),
(656, 303, 89, 4, '283', '1'),
(657, 303, 90, 5, '287', '0'),
(658, 303, 91, 6, '292', '1'),
(659, 303, 92, 7, '301', '1'),
(660, 303, 97, 8, 'Benar', '0'),
(661, 303, 98, 9, 'Benar', '1'),
(662, 303, 100, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '0.8'),
(663, 304, 87, 2, '276', '1'),
(664, 304, 88, 3, '277', '1'),
(665, 304, 89, 4, '285', '0'),
(666, 304, 90, 5, '289', '0'),
(667, 304, 91, 6, '292', '1'),
(668, 304, 92, 7, '301', '1'),
(669, 304, 97, 8, 'Salah', '1'),
(670, 304, 98, 9, 'Benar', '1'),
(671, 304, 100, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(672, 305, 87, 2, '276', '1'),
(673, 305, 88, 3, '277', '1'),
(674, 305, 89, 4, '283', '1'),
(675, 305, 90, 5, '291', '1'),
(676, 305, 91, 6, '292', '1'),
(677, 305, 92, 7, '300', '0'),
(678, 305, 97, 8, 'Salah', '1'),
(679, 305, 98, 9, 'Benar', '1'),
(680, 305, 100, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(681, 306, 87, 2, '276', '1'),
(682, 306, 88, 3, '277', '1'),
(683, 306, 89, 4, '284', '0'),
(684, 306, 90, 5, '291', '1'),
(685, 306, 91, 6, '294', '0'),
(686, 306, 92, 7, '301', '1'),
(687, 306, 97, 8, 'Salah', '1'),
(688, 306, 98, 9, 'Salah', '0'),
(689, 306, 100, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '0.8'),
(690, 307, 87, 2, '276', '1'),
(691, 307, 88, 3, '277', '1'),
(692, 307, 89, 4, '283', '1'),
(693, 307, 90, 5, '291', '1'),
(694, 307, 91, 6, '292', '1'),
(695, 307, 92, 7, '301', '1'),
(696, 307, 97, 8, 'Salah', '1'),
(697, 307, 98, 9, 'Benar', '1'),
(698, 307, 100, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '0.7'),
(699, 308, 87, 2, '276', '1'),
(700, 308, 88, 3, '277', '1'),
(701, 308, 89, 4, '283', '1'),
(702, 308, 90, 5, '291', '1'),
(703, 308, 91, 6, '292', '1'),
(704, 308, 92, 7, '300', '0'),
(705, 308, 97, 8, 'Salah', '1'),
(706, 308, 98, 9, 'Benar', '1'),
(707, 308, 100, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '0.5'),
(708, 309, 87, 2, '276', '1'),
(709, 309, 88, 3, '277', '1'),
(710, 309, 89, 4, '283', '1'),
(711, 309, 90, 5, '291', '1'),
(712, 309, 91, 6, '292', '1'),
(713, 309, 92, 7, '301', '1'),
(714, 309, 97, 8, 'Salah', '1'),
(715, 309, 98, 9, 'Benar', '1'),
(716, 309, 100, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '0.3'),
(717, 310, 86, 1, '267', '1'),
(718, 310, 87, 2, '275', '0'),
(719, 310, 88, 3, '277', '1'),
(720, 310, 89, 4, '283', '1'),
(721, 310, 90, 5, '291', '1'),
(722, 310, 91, 6, '292', '1'),
(723, 310, 92, 7, '301', '1'),
(724, 310, 97, 8, 'Salah', '1'),
(725, 310, 98, 9, 'Benar', '1'),
(726, 310, 100, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '0.8'),
(727, 311, 87, 2, '274', '0'),
(728, 311, 88, 3, '277', '1'),
(729, 311, 89, 4, '283', '1'),
(730, 311, 90, 5, '287', '0'),
(731, 311, 91, 6, '292', '1'),
(732, 311, 92, 7, '301', '1'),
(733, 311, 97, 8, 'Salah', '1'),
(734, 311, 98, 9, 'Benar', '1'),
(735, 311, 100, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '0.5'),
(736, 312, 87, 2, '273', '0'),
(737, 312, 88, 3, '277', '1'),
(738, 312, 89, 4, '283', '1'),
(739, 312, 90, 5, '291', '1'),
(740, 312, 91, 6, '292', '1'),
(741, 312, 92, 7, '300', '0'),
(742, 312, 97, 8, 'Salah', '1'),
(743, 312, 98, 9, 'Benar', '1'),
(744, 312, 100, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '0.3'),
(745, 313, 86, 1, '267', '1'),
(746, 313, 87, 2, '273', '0'),
(747, 313, 88, 3, '277', '1'),
(748, 313, 89, 4, '283', '1'),
(749, 313, 90, 5, '291', '1'),
(750, 313, 91, 6, '292', '1'),
(751, 313, 92, 7, '301', '1'),
(752, 313, 97, 8, 'Salah', '1'),
(753, 313, 98, 9, 'Benar', '1'),
(754, 313, 100, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '0.7'),
(755, 314, 87, 2, '276', '1'),
(756, 314, 88, 3, '277', '1'),
(757, 314, 89, 4, '283', '1'),
(758, 314, 90, 5, '291', '1'),
(759, 314, 91, 6, '292', '1'),
(760, 314, 92, 7, '301', '1'),
(761, 314, 97, 8, 'Salah', '1'),
(762, 314, 98, 9, 'Benar', '1'),
(763, 314, 100, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(764, 315, 86, 1, '267', '1'),
(765, 315, 86, 2, '271', '0'),
(766, 315, 87, 3, '272', '0'),
(767, 315, 89, 4, '283', '1'),
(768, 315, 90, 5, '291', '1'),
(769, 315, 91, 6, '292', '1'),
(770, 315, 92, 7, '301', '1'),
(771, 315, 97, 8, 'Salah', '1'),
(772, 315, 98, 9, 'Benar', '1'),
(773, 315, 100, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '0.3'),
(774, 316, 86, 1, '267', '1'),
(775, 316, 87, 2, '276', '1'),
(776, 316, 88, 3, '277', '1'),
(777, 316, 89, 4, '283', '1'),
(778, 316, 90, 5, '291', '1'),
(779, 316, 91, 6, '294', '0'),
(780, 316, 92, 7, '301', '1'),
(781, 316, 97, 8, 'Salah', '1'),
(782, 316, 98, 9, 'Salah', '0'),
(783, 316, 100, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '0.7'),
(784, 235, 79, 1, '233', '1'),
(785, 235, 80, 2, '237', '1'),
(786, 235, 81, 3, '246', '1'),
(787, 235, 82, 4, '247', '1'),
(788, 235, 83, 5, '256', '1'),
(791, 235, 93, 8, 'Salah', '1'),
(792, 235, 85, 7, '262', '1'),
(793, 235, 84, 6, '259', '1'),
(794, 235, 94, 9, 'Benar', '1'),
(795, 235, 101, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.\n', '0.8'),
(796, 236, 79, 1, '233', '1'),
(797, 236, 80, 2, '237', '1'),
(798, 236, 81, 3, '246', '1'),
(799, 236, 82, 4, '247', '1'),
(800, 236, 83, 5, '256', '1'),
(801, 236, 84, 6, '258', '0'),
(802, 236, 85, 7, '262', '1'),
(803, 236, 93, 8, 'Salah', '1'),
(804, 236, 94, 9, 'Benar', '1'),
(805, 236, 101, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '0.5'),
(806, 237, 79, 1, '233', '1'),
(807, 237, 80, 2, '237', '1'),
(808, 237, 81, 3, '246', '1'),
(809, 237, 82, 4, '247', '1'),
(810, 237, 83, 5, '256', '1'),
(811, 237, 84, 6, '260', '0'),
(812, 237, 85, 7, '263', '0'),
(813, 237, 93, 8, 'Benar', '0'),
(814, 237, 94, 9, 'Benar', '1'),
(815, 237, 101, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(816, 238, 79, 1, '233', '1'),
(817, 238, 80, 2, '240', '0'),
(818, 238, 81, 3, '246', '1'),
(819, 238, 82, 4, '247', '1'),
(820, 238, 83, 5, '256', '1'),
(821, 238, 84, 6, '259', '1'),
(822, 238, 85, 7, '264', '0'),
(823, 238, 93, 8, 'Benar', '0'),
(824, 238, 94, 9, 'Benar', '1'),
(825, 238, 101, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '0.7'),
(826, 239, 79, 1, '233', '1'),
(827, 239, 80, 2, '237', '1'),
(828, 239, 81, 3, '246', '1'),
(829, 239, 82, 4, '248', '0'),
(830, 239, 83, 5, '256', '1'),
(831, 239, 84, 6, '259', '1'),
(832, 239, 85, 7, '262', '1'),
(833, 239, 93, 8, 'Salah', '1'),
(834, 239, 94, 9, 'Benar', '1'),
(835, 239, 101, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '0.3'),
(836, 240, 79, 1, '233', '1'),
(837, 240, 80, 2, '237', '1'),
(838, 240, 81, 3, '246', '1'),
(839, 240, 82, 4, '247', '1'),
(840, 240, 83, 5, '256', '1'),
(841, 240, 84, 6, '259', '1'),
(842, 240, 85, 7, '266', '0'),
(843, 240, 93, 8, 'Benar', '0'),
(845, 240, 94, 9, 'Salah', '0'),
(846, 240, 101, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '0.3'),
(847, 241, 80, 2, '237', '1'),
(848, 241, 81, 3, '246', '1'),
(849, 241, 82, 4, '247', '1'),
(850, 241, 83, 5, '256', '1'),
(851, 241, 84, 6, '259', '1'),
(852, 241, 85, 7, '262', '1'),
(853, 241, 93, 8, 'Salah', '1'),
(854, 241, 94, 9, 'Benar', '1'),
(855, 241, 101, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(856, 242, 79, 1, '232', '0'),
(857, 242, 80, 2, '237', '1'),
(858, 242, 81, 3, '246', '1'),
(859, 242, 82, 4, '247', '1'),
(860, 242, 83, 5, '256', '1'),
(861, 242, 84, 6, '259', '1'),
(862, 242, 85, 7, '262', '1'),
(863, 242, 93, 8, 'Salah', '1'),
(864, 242, 94, 9, 'Salah', '0'),
(865, 242, 101, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '0.3'),
(866, 243, 79, 1, '233', '1'),
(867, 243, 80, 2, '237', '1'),
(868, 243, 81, 3, '246', '1'),
(869, 243, 82, 4, '249', '0'),
(870, 243, 83, 5, '256', '1'),
(871, 243, 84, 6, '259', '1'),
(872, 243, 85, 7, '262', '1'),
(873, 243, 93, 8, 'Salah', '1'),
(874, 243, 94, 9, 'Benar', '1'),
(875, 243, 101, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '0.5'),
(876, 244, 79, 1, '233', '1'),
(877, 244, 80, 2, '237', '1'),
(878, 244, 81, 3, '246', '1'),
(879, 244, 82, 4, '247', '1'),
(880, 244, 83, 5, '256', '1'),
(881, 244, 84, 6, '259', '1'),
(882, 244, 85, 7, '263', '0'),
(883, 244, 93, 8, 'Salah', '1'),
(884, 244, 94, 9, 'Benar', '1'),
(885, 244, 101, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '0.3'),
(886, 245, 80, 2, '239', '0'),
(887, 245, 81, 3, '246', '1'),
(888, 245, 82, 4, '247', '1'),
(889, 245, 83, 5, '254', '0'),
(890, 245, 84, 6, '259', '1'),
(891, 245, 85, 7, '262', '1'),
(892, 245, 93, 8, 'Salah', '1'),
(893, 245, 94, 9, 'Benar', '1'),
(894, 245, 101, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(895, 246, 79, 1, '233', '1'),
(896, 246, 80, 2, '237', '1'),
(897, 246, 81, 3, '246', '1'),
(898, 246, 82, 4, '247', '1'),
(899, 246, 83, 5, '256', '1'),
(900, 246, 84, 6, '258', '0'),
(901, 246, 85, 7, '262', '1'),
(902, 246, 93, 8, 'Salah', '1'),
(903, 246, 94, 9, 'Salah', '0'),
(904, 246, 101, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '0.8'),
(905, 247, 79, 1, '233', '1'),
(906, 247, 80, 2, '237', '1'),
(907, 247, 81, 3, '246', '1'),
(908, 247, 82, 4, '247', '1'),
(909, 247, 83, 5, '256', '1'),
(910, 247, 84, 6, '257', '0'),
(911, 247, 85, 7, '265', '0'),
(912, 247, 93, 8, 'Benar', '0'),
(913, 247, 94, 9, 'Benar', '1'),
(914, 247, 101, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '0.5'),
(915, 248, 79, 1, '233', '1'),
(916, 248, 80, 2, '237', '1'),
(917, 248, 81, 3, '246', '1'),
(918, 248, 82, 4, '247', '1'),
(919, 248, 83, 5, '254', '0'),
(920, 248, 84, 6, '261', '0'),
(921, 248, 85, 7, '264', '0'),
(922, 248, 93, 8, 'Salah', '1'),
(923, 248, 94, 9, 'Benar', '1'),
(924, 248, 101, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.\n', '1'),
(925, 249, 79, 1, '233', '1'),
(926, 249, 80, 2, '237', '1'),
(927, 249, 81, 3, '246', '1'),
(928, 249, 82, 4, '247', '1'),
(929, 249, 83, 5, '256', '1'),
(930, 249, 84, 6, '259', '1'),
(931, 249, 85, 7, '262', '1'),
(932, 249, 93, 8, 'Salah', '1'),
(933, 249, 94, 9, 'Benar', '1'),
(934, 249, 101, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '0.8'),
(935, 250, 79, 1, '233', '1'),
(936, 250, 80, 2, '237', '1'),
(937, 250, 81, 3, '242', '0'),
(938, 250, 82, 4, '251', '0'),
(939, 250, 83, 5, '256', '1'),
(940, 250, 84, 6, '259', '1'),
(941, 250, 85, 7, '262', '1'),
(942, 250, 93, 8, 'Salah', '1'),
(943, 250, 94, 9, 'Benar', '1'),
(944, 250, 101, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '0.6'),
(945, 251, 79, 1, '233', '1'),
(946, 251, 80, 2, '237', '1'),
(947, 251, 81, 3, '246', '1'),
(948, 251, 82, 4, '247', '1'),
(949, 251, 83, 5, '256', '1'),
(950, 251, 84, 6, '259', '1'),
(951, 251, 85, 7, '262', '1'),
(952, 251, 93, 8, 'Salah', '1'),
(953, 251, 94, 9, 'Salah', '0'),
(954, 251, 101, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '0.3'),
(955, 252, 80, 2, '240', '0'),
(956, 252, 81, 3, '246', '1'),
(957, 252, 82, 4, '247', '1'),
(958, 252, 83, 5, '256', '1'),
(959, 252, 84, 6, '259', '1'),
(960, 252, 85, 8, '262', '1'),
(961, 252, 93, 9, 'Salah', '1'),
(962, 252, 94, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(963, 253, 79, 1, '233', '1'),
(964, 253, 80, 2, '237', '1'),
(965, 253, 81, 3, '246', '1'),
(966, 253, 82, 4, '251', '0'),
(967, 253, 83, 5, '256', '1'),
(968, 253, 84, 6, '259', '1'),
(969, 253, 85, 7, '262', '1'),
(970, 253, 93, 8, 'Salah', '1'),
(971, 253, 94, 9, 'Benar', '1'),
(972, 253, 101, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '0.8'),
(973, 254, 80, 2, '237', '1'),
(974, 254, 81, 3, '246', '1'),
(975, 254, 82, 4, '247', '1'),
(976, 254, 83, 5, '256', '1'),
(977, 254, 84, 6, '258', '0'),
(978, 254, 85, 7, '262', '1'),
(979, 254, 93, 8, 'Salah', '1'),
(980, 254, 94, 9, 'Benar', '1'),
(981, 254, 101, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(982, 255, 79, 1, '233', '1'),
(983, 255, 80, 2, '237', '1'),
(984, 255, 81, 3, '243', '0'),
(985, 255, 82, 4, '251', '0'),
(986, 255, 83, 5, '256', '1'),
(987, 255, 84, 6, '259', '1'),
(988, 255, 85, 7, '262', '1'),
(989, 255, 93, 8, 'Salah', '1'),
(990, 255, 94, 9, 'Benar', '1'),
(991, 255, 101, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '0.5'),
(992, 256, 79, 1, '233', '1'),
(993, 256, 80, 2, '237', '1'),
(994, 256, 81, 3, '246', '1'),
(995, 256, 82, 4, '247', '1'),
(996, 256, 83, 5, '256', '1'),
(997, 256, 84, 6, '259', '1'),
(998, 256, 85, 7, '265', '0'),
(999, 256, 93, 8, 'Benar', '0'),
(1000, 256, 94, 9, 'Benar', '1'),
(1001, 256, 101, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(1002, 257, 79, 1, '233', '1'),
(1003, 257, 80, 2, '241', '0'),
(1004, 257, 81, 3, '245', '0'),
(1005, 257, 82, 4, '247', '1'),
(1006, 257, 83, 5, '256', '1'),
(1007, 257, 84, 6, '259', '1'),
(1008, 257, 85, 7, '262', '1'),
(1009, 257, 93, 8, 'Salah', '1'),
(1010, 257, 94, 9, 'Benar', '1'),
(1011, 257, 101, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '0.5'),
(1012, 258, 79, 1, '233', '1'),
(1013, 258, 80, 2, '237', '1'),
(1014, 258, 81, 3, '246', '1'),
(1015, 258, 82, 4, '247', '1'),
(1016, 258, 83, 5, '256', '1'),
(1017, 258, 84, 6, '259', '1'),
(1018, 258, 85, 7, '262', '1'),
(1019, 258, 93, 8, 'Salah', '1'),
(1020, 258, 94, 9, 'Salah', '0'),
(1021, 258, 101, 10, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.', '1'),
(1022, 259, 94, 9, 'Benar', '1'),
(1023, 259, 82, 4, '247', '1'),
(1024, 259, 83, 5, '256', '1'),
(1025, 259, 93, 8, 'Salah', '1');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_wawancara`
--

CREATE TABLE `jawaban_wawancara` (
  `id_jawaban_wawancara` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `soal_wawancara_id` int(11) NOT NULL,
  `hasil_jawaban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban_wawancara`
--

INSERT INTO `jawaban_wawancara` (`id_jawaban_wawancara`, `user_id`, `soal_wawancara_id`, `hasil_jawaban`) VALUES
(1, 260, 8, 20),
(2, 260, 9, 20),
(3, 260, 10, 20),
(4, 260, 11, 15),
(5, 260, 12, 15),
(6, 261, 8, 20),
(7, 261, 9, 20),
(8, 261, 10, 20),
(9, 261, 11, 15),
(10, 261, 12, 18),
(11, 262, 8, 15),
(12, 262, 9, 15),
(13, 262, 10, 20),
(14, 262, 11, 20),
(15, 262, 12, 18),
(16, 263, 8, 18),
(17, 263, 9, 18),
(18, 263, 10, 20),
(19, 263, 11, 20),
(20, 263, 12, 20),
(21, 264, 8, 15),
(22, 264, 9, 18),
(23, 264, 10, 20),
(24, 264, 11, 20),
(25, 264, 12, 20),
(26, 270, 8, 15),
(27, 270, 9, 20),
(28, 270, 10, 20),
(29, 270, 11, 20),
(30, 270, 12, 20),
(31, 274, 8, 20),
(32, 274, 9, 18),
(33, 274, 10, 20),
(34, 274, 11, 20),
(35, 274, 12, 15),
(36, 273, 8, 18),
(37, 273, 9, 20),
(38, 273, 10, 18),
(39, 273, 11, 20),
(40, 273, 12, 15),
(41, 272, 8, 15),
(42, 272, 9, 13),
(43, 272, 10, 15),
(44, 272, 11, 13),
(45, 272, 12, 20),
(46, 271, 8, 20),
(47, 271, 9, 20),
(48, 271, 10, 18),
(49, 271, 11, 13),
(50, 271, 12, 20),
(51, 265, 8, 20),
(52, 265, 9, 13),
(53, 265, 10, 10),
(54, 265, 11, 20),
(55, 265, 12, 18),
(56, 269, 8, 15),
(57, 269, 9, 20),
(58, 269, 10, 15),
(59, 269, 11, 18),
(60, 269, 12, 20),
(61, 266, 8, 20),
(62, 266, 9, 18),
(63, 266, 10, 20),
(64, 266, 11, 15),
(65, 266, 12, 20),
(66, 268, 8, 10),
(67, 268, 9, 20),
(68, 268, 10, 10),
(69, 268, 11, 20),
(70, 268, 12, 20),
(71, 267, 8, 20),
(72, 267, 9, 20),
(73, 267, 10, 20),
(74, 267, 11, 10),
(75, 267, 12, 20),
(76, 280, 8, 20),
(77, 280, 9, 18),
(78, 280, 10, 13),
(79, 280, 11, 20),
(80, 280, 12, 15),
(81, 281, 8, 20),
(82, 281, 9, 20),
(83, 281, 10, 20),
(84, 281, 11, 10),
(85, 281, 12, 15),
(86, 283, 8, 20),
(87, 283, 9, 20),
(88, 283, 10, 10),
(89, 283, 11, 20),
(90, 283, 12, 20),
(91, 282, 8, 20),
(92, 282, 9, 20),
(93, 282, 10, 18),
(94, 282, 11, 15),
(95, 282, 12, 15),
(96, 284, 8, 10),
(97, 284, 9, 20),
(98, 284, 10, 20),
(99, 284, 11, 15),
(100, 284, 12, 18),
(101, 276, 8, 20),
(102, 276, 9, 13),
(103, 276, 10, 20),
(104, 276, 11, 13),
(105, 276, 12, 20),
(106, 278, 8, 20),
(107, 278, 9, 20),
(108, 278, 10, 20),
(109, 278, 11, 13),
(110, 278, 12, 15),
(111, 275, 8, 20),
(112, 275, 9, 20),
(113, 275, 10, 20),
(114, 275, 11, 15),
(115, 275, 12, 10),
(116, 277, 8, 20),
(117, 277, 9, 10),
(118, 277, 10, 13),
(119, 277, 11, 18),
(120, 277, 12, 15),
(121, 279, 8, 20),
(122, 279, 9, 10),
(123, 279, 10, 15),
(124, 279, 11, 18),
(125, 279, 12, 18),
(126, 319, 18, 20),
(127, 319, 19, 20),
(128, 319, 20, 20),
(129, 319, 21, 20),
(130, 319, 22, 20),
(131, 323, 18, 20),
(132, 323, 19, 20),
(133, 323, 20, 15),
(134, 323, 21, 20),
(135, 323, 22, 18),
(136, 339, 18, 20),
(137, 339, 19, 20),
(138, 339, 20, 18),
(139, 339, 21, 20),
(140, 339, 22, 15),
(141, 292, 3, 20),
(142, 292, 4, 20),
(143, 292, 5, 20),
(144, 292, 6, 15),
(145, 292, 7, 10),
(146, 293, 3, 20),
(147, 293, 4, 11),
(148, 293, 5, 14),
(149, 293, 6, 20),
(150, 293, 7, 18),
(151, 294, 3, 20),
(152, 294, 4, 20),
(153, 294, 5, 20),
(154, 294, 6, 20),
(155, 294, 7, 20),
(156, 295, 3, 20),
(157, 295, 4, 15),
(158, 295, 5, 20),
(159, 295, 6, 20),
(160, 295, 7, 20),
(161, 296, 3, 13),
(162, 296, 4, 18),
(163, 296, 5, 20),
(164, 296, 6, 20),
(165, 296, 7, 20),
(166, 312, 3, 20),
(167, 312, 4, 20),
(168, 312, 5, 18),
(169, 312, 6, 15),
(170, 312, 7, 10),
(171, 316, 3, 15),
(172, 316, 4, 10),
(173, 316, 5, 20),
(174, 316, 6, 20),
(175, 316, 7, 20),
(176, 314, 3, 20),
(177, 314, 4, 20),
(178, 314, 5, 13),
(179, 314, 6, 15),
(180, 314, 7, 20),
(181, 313, 3, 20),
(182, 313, 4, 18),
(183, 313, 5, 18),
(184, 313, 6, 20),
(185, 313, 7, 20),
(186, 315, 3, 13),
(187, 315, 4, 13),
(188, 315, 5, 20),
(189, 315, 6, 20),
(190, 315, 7, 15),
(191, 302, 3, 20),
(192, 302, 4, 20),
(193, 302, 5, 10),
(194, 302, 6, 10),
(195, 302, 7, 18),
(196, 304, 3, 20),
(197, 304, 4, 15),
(198, 304, 5, 15),
(199, 304, 6, 20),
(200, 304, 7, 18),
(201, 306, 3, 13),
(202, 306, 4, 18),
(203, 306, 5, 20),
(204, 306, 6, 20),
(205, 306, 7, 18),
(206, 305, 3, 20),
(207, 305, 4, 20),
(208, 305, 5, 20),
(209, 305, 6, 20),
(210, 305, 7, 13),
(211, 303, 3, 20),
(212, 303, 4, 10),
(213, 303, 5, 20),
(214, 303, 6, 20),
(215, 303, 7, 18),
(216, 308, 3, 20),
(217, 308, 4, 15),
(218, 308, 5, 10),
(219, 308, 6, 20),
(220, 308, 7, 15),
(221, 307, 3, 20),
(222, 307, 4, 20),
(223, 307, 5, 15),
(224, 307, 6, 20),
(225, 307, 7, 18),
(226, 309, 3, 20),
(227, 309, 4, 20),
(228, 309, 5, 15),
(229, 309, 6, 15),
(230, 309, 7, 20),
(231, 311, 3, 20),
(232, 311, 4, 13),
(233, 311, 5, 13),
(234, 311, 6, 20),
(235, 311, 7, 15),
(236, 310, 3, 20),
(237, 310, 4, 18),
(238, 310, 5, 15),
(239, 310, 6, 18),
(240, 310, 7, 20),
(241, 301, 3, 20),
(242, 301, 4, 20),
(243, 301, 5, 15),
(244, 301, 6, 20),
(245, 301, 7, 13),
(246, 300, 3, 20),
(247, 300, 4, 18),
(248, 300, 5, 18),
(249, 300, 6, 15),
(250, 300, 7, 18),
(251, 297, 3, 20),
(252, 297, 4, 20),
(253, 297, 5, 20),
(254, 297, 6, 20),
(255, 297, 7, 18),
(256, 299, 3, 20),
(257, 299, 4, 10),
(258, 299, 5, 20),
(259, 299, 6, 20),
(260, 299, 7, 15),
(261, 298, 3, 20),
(262, 298, 4, 15),
(263, 298, 5, 20),
(264, 298, 6, 15),
(265, 298, 7, 18),
(266, 235, 13, 20),
(267, 235, 14, 20),
(268, 235, 15, 20),
(269, 235, 16, 15),
(270, 235, 17, 20),
(271, 236, 13, 20),
(272, 236, 14, 20),
(273, 236, 15, 20),
(274, 236, 16, 15),
(275, 236, 17, 18),
(276, 237, 13, 20),
(277, 237, 14, 20),
(278, 237, 15, 20),
(279, 237, 16, 13),
(280, 237, 17, 10),
(281, 238, 13, 20),
(282, 238, 14, 20),
(283, 238, 15, 20),
(284, 238, 16, 13),
(285, 238, 17, 13),
(286, 239, 13, 20),
(287, 239, 14, 15),
(288, 239, 15, 10),
(289, 239, 16, 20),
(290, 239, 17, 13),
(291, 241, 13, 10),
(292, 241, 14, 20),
(293, 241, 15, 20),
(294, 241, 16, 13),
(295, 241, 17, 15),
(296, 240, 13, 20),
(297, 240, 14, 20),
(298, 240, 15, 20),
(299, 240, 16, 13),
(300, 240, 17, 15),
(301, 243, 13, 13),
(302, 243, 14, 18),
(303, 243, 15, 18),
(304, 243, 16, 20),
(305, 243, 17, 20),
(306, 242, 13, 20),
(307, 242, 14, 20),
(308, 242, 15, 15),
(309, 242, 16, 10),
(310, 242, 17, 20),
(311, 244, 13, 20),
(312, 244, 14, 18),
(313, 244, 15, 20),
(314, 244, 16, 20),
(315, 244, 17, 20),
(316, 245, 13, 20),
(317, 245, 14, 20),
(318, 245, 15, 12),
(319, 245, 16, 20),
(320, 245, 17, 16),
(321, 246, 13, 20),
(322, 246, 14, 20),
(323, 246, 15, 20),
(324, 246, 16, 20),
(325, 246, 17, 18),
(326, 247, 13, 13),
(327, 247, 14, 10),
(328, 247, 15, 18),
(329, 247, 16, 18),
(330, 247, 17, 20),
(331, 248, 13, 20),
(332, 248, 14, 10),
(333, 248, 15, 13),
(334, 248, 16, 15),
(335, 248, 17, 20),
(336, 249, 13, 20),
(337, 249, 14, 20),
(338, 249, 15, 20),
(339, 249, 16, 13),
(340, 249, 17, 18),
(341, 255, 13, 20),
(342, 255, 14, 20),
(343, 255, 15, 13),
(344, 255, 16, 13),
(345, 255, 17, 20),
(346, 259, 13, 20),
(347, 259, 14, 20),
(348, 259, 15, 15),
(349, 259, 16, 15),
(350, 259, 17, 18),
(351, 257, 13, 20),
(352, 257, 14, 20),
(353, 257, 15, 13),
(354, 257, 16, 13),
(355, 257, 17, 10),
(356, 258, 13, 10),
(357, 258, 14, 20),
(358, 258, 15, 15),
(359, 258, 16, 18),
(360, 258, 17, 18),
(361, 256, 13, 20),
(362, 256, 14, 20),
(363, 256, 15, 20),
(364, 256, 16, 20),
(365, 256, 17, 10),
(366, 251, 13, 13),
(367, 251, 14, 20),
(368, 251, 15, 13),
(369, 251, 16, 15),
(370, 251, 17, 15),
(371, 252, 13, 20),
(372, 252, 14, 20),
(373, 252, 15, 15),
(374, 252, 16, 10),
(375, 252, 17, 10),
(376, 254, 13, 20),
(377, 254, 14, 18),
(378, 254, 15, 18),
(379, 254, 16, 13),
(380, 254, 17, 20),
(381, 250, 13, 20),
(382, 250, 14, 20),
(383, 250, 15, 20),
(384, 250, 16, 10),
(385, 250, 17, 10),
(386, 253, 13, 20),
(387, 253, 14, 20),
(388, 253, 15, 15),
(389, 253, 16, 15),
(390, 253, 17, 15);

-- --------------------------------------------------------

--
-- Table structure for table `kepala_blk`
--

CREATE TABLE `kepala_blk` (
  `id_kepala_blk` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nip_kepala_blk` varchar(20) NOT NULL,
  `nama_kepala_blk` varchar(50) NOT NULL,
  `alamat_kepala_blk` varchar(50) NOT NULL,
  `no_telp_kepala_blk` varchar(16) NOT NULL,
  `email_kepala_blk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kepala_blk`
--

INSERT INTO `kepala_blk` (`id_kepala_blk`, `user_id`, `nip_kepala_blk`, `nama_kepala_blk`, `alamat_kepala_blk`, `no_telp_kepala_blk`, `email_kepala_blk`) VALUES
(1, 100, '19690101 199403 2001', 'Nawang Alan Andrian', 'Gebog, Kudus', '085678087821', 'nawang@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pelatihan`
--

CREATE TABLE `pelatihan` (
  `id_pelatihan` int(11) NOT NULL,
  `nama_pelatihan` varchar(50) NOT NULL,
  `tahun_pelatihan` year(4) NOT NULL,
  `jenis_pelatihan` enum('DBHCHT','APBN') NOT NULL,
  `lama_pelatihan` int(11) NOT NULL,
  `jumlah_peserta` int(11) NOT NULL,
  `daftar_hasil_seleksi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelatihan`
--

INSERT INTO `pelatihan` (`id_pelatihan`, `nama_pelatihan`, `tahun_pelatihan`, `jenis_pelatihan`, `lama_pelatihan`, `jumlah_peserta`, `daftar_hasil_seleksi`) VALUES
(1, 'Make Up Tahap 1', 2025, 'DBHCHT', 33, 16, '1741173646_8a100cd23846b4d7176f.pdf'),
(4, 'Junior Administrative Assistant Tahap 1', 2025, 'APBN', 33, 16, ''),
(5, 'Menjahit Pakaian Wanita Dewasa Tahap 1', 2024, 'APBN', 33, 16, ''),
(6, 'Pembuatan Roti dan Kue Tahap 1', 2025, 'APBN', 25, 1, '1745930547_3ecb47b423b5b8e1dabc.pdf'),
(7, 'Perbengekelan Motor Tahap 1', 2025, 'DBHCHT', 30, 16, '');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pelatihan_id` int(11) NOT NULL,
  `nip_peserta` varchar(16) NOT NULL,
  `nik_peserta` varchar(30) NOT NULL,
  `nama_peserta` varchar(50) NOT NULL,
  `tgl_lahir_peserta` date NOT NULL,
  `jk_peserta` enum('Laki-laki','Perempuan') NOT NULL,
  `kota_peserta` varchar(50) NOT NULL,
  `kecamatan_peserta` varchar(50) NOT NULL,
  `desa_peserta` varchar(50) NOT NULL,
  `rw_peserta` varchar(50) NOT NULL,
  `rt_peserta` varchar(50) NOT NULL,
  `no_telp_peserta` varchar(16) NOT NULL,
  `email_peserta` varchar(50) NOT NULL,
  `status_pekerjaan` enum('Aktif','PHK','Tidak Bekerja') DEFAULT 'Tidak Bekerja',
  `pelatihan_sebelumnya` enum('Sudah','Belum') DEFAULT 'Belum',
  `status_tni_polri_asn` enum('Bukan','TNI','Polri','ASN') DEFAULT 'Bukan',
  `status_peserta` enum('Lolos','Tidak Lolos Administrasi') DEFAULT 'Lolos'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `user_id`, `pelatihan_id`, `nip_peserta`, `nik_peserta`, `nama_peserta`, `tgl_lahir_peserta`, `jk_peserta`, `kota_peserta`, `kecamatan_peserta`, `desa_peserta`, `rw_peserta`, `rt_peserta`, `no_telp_peserta`, `email_peserta`, `status_pekerjaan`, `pelatihan_sebelumnya`, `status_tni_polri_asn`, `status_peserta`) VALUES
(176, 235, 5, 'REGBLK2400950', '3456783456', 'Reza Prasetyo', '1998-07-14', 'Laki-laki', 'Kudus', 'Kaliwungu', 'Purwosari', '23', '25', '081223456789', 'rezaprasetyo@email.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(177, 236, 5, 'REGBLK2400949', '3456782345', 'Fina Widjaya', '2000-12-09', 'Perempuan', 'Kudus', 'Jati', 'Gondosari', '22', '24', '085234567890', 'finawidjaya@email.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(178, 237, 5, 'REGBLK2400948', '3456781234', 'Abdurrahman', '2001-09-25', 'Laki-laki', 'Kudus', 'Kota Kudus', 'Kauman', '21', '23', '089876543210', 'abdurrahman@email.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(179, 238, 5, 'REGBLK2400947', '3456780123', 'Yuniwati Sari', '2003-02-03', 'Perempuan', 'Kudus', 'Gebog', 'Purwosari', '20', '22', '082345678987', 'yuniwatisari@email.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(180, 239, 5, 'REGBLK2400946', '3456789012', 'Rudi Hartono', '1999-05-17', 'Laki-laki', 'Kudus', 'Bae', 'Tanggulangin', '19', '21', '087765432109', 'rudihartono@email.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(181, 240, 5, 'REGBLK2400945', '3456788901', 'Eka Novita', '2002-07-29', 'Perempuan', 'Kudus', 'Kaliwungu', 'Juwana', '18', '20', '082234567890', 'ekanovita@email.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(182, 241, 5, 'REGBLK2400944', '3456787890', 'Galih Prakoso', '2000-10-14', 'Laki-laki', 'Kudus', 'Kota Kudus', 'Bacin', '17', '19', '081234567890', 'galihprakoso@email.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(183, 242, 5, 'REGBLK2400943', '3456786789', 'Nadya Ristiani', '2001-04-11', 'Perempuan', 'Kudus', 'Gebog', 'Karanganyar', '16', '18', '087654321098', 'nadyaristiani@email.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(184, 243, 5, 'REGBLK2400942', '3456785678', 'Dika Wicaksono', '1998-06-03', 'Laki-laki', 'Kudus', 'Bae', 'Gondosari', '15', '17', '085234567890', 'dikawicaksono@email.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(185, 244, 5, 'REGBLK2400941', '3456784567', 'Rina Putri', '2002-09-14', 'Perempuan', 'Kudus', 'Kota Kudus', 'Purwosari', '14', '16', '082345678987', 'rinaputri@email.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(186, 245, 5, 'REGBLK2400940', '3456783456', 'Farhan Pratama', '2000-12-05', 'Laki-laki', 'Kudus', 'Jati', 'Jati', '13', '15', '087765432109', 'farhanpratama@email.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(187, 246, 5, 'REGBLK2400939', '3456782345', 'Fitri Hidayati', '2003-02-25', 'Perempuan', 'Kudus', 'Gebog', 'Gondosari', '12', '14', '085234567890', 'fitrihidayati@email.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(188, 247, 5, 'REGBLK2400938', '3456781234', 'Benny Taufik', '1999-08-20', 'Laki-laki', 'Kudus', 'Kota Kudus', 'Purwosari', '11', '13', '089876543210', 'bennytaufik@email.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(189, 248, 5, 'REGBLK2400937', '3456780123', 'Siti Aisyah', '2000-05-01', 'Perempuan', 'Kudus', 'Kaliwungu', 'Karangrejo', '10', '12', '082234567890', 'sitiaisyah@email.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(190, 249, 5, 'REGBLK2400936', '3456789012', 'Eko Prabowo', '2003-09-14', 'Laki-laki', 'Kudus', 'Gebog', 'Tanggulangin', '9', '11', '089876543210', 'ekoprabowo@email.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(191, 250, 5, 'REGBLK2400935', '3456788901', 'Dian Rachmawati', '2001-03-18', 'Perempuan', 'Kudus', 'Kota Kudus', 'Bacin', '8', '10', '085765432109', 'dianrachmawati@email.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(192, 251, 5, 'REGBLK2400934', '3456787890', 'Nadia Sari', '2002-07-05', 'Perempuan', 'Kudus', 'Jati', 'Purwosari', '7', '9', '082345678987', 'nadiasari@email.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(193, 252, 5, 'REGBLK2400933', '3456786789', 'Rizky Febrianto', '1999-04-12', 'Laki-laki', 'Kudus', 'Bae', 'Karanganyar', '6', '8', '087654321098', 'rizkyfebrianto@email.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(194, 253, 5, 'REGBLK2400932', '3456785678', 'Arief Kurniawan', '2003-08-17', 'Laki-laki', 'Kudus', 'Gebog', 'Gondosari', '5', '7', '085234567890', 'ariefkurniawan@email.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(195, 254, 5, 'REGBLK2400931', '3456784567', 'Wulan Maharani', '2000-10-25', 'Perempuan', 'Kudus', 'Kota Kudus', 'Karangrejo', '4', '6', '087765432109', 'wulanmaharani@email.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(196, 255, 5, 'REGBLK2400930', '3456783456', 'Iwan Setiawan', '1998-02-14', 'Laki-laki', 'Kudus', 'Undaan', 'Kauman', '2', '5', '081223456789', 'iwansetiwan@email.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(197, 256, 5, 'REGBLK2400929', '3456782345', 'Nurul Aisyah', '2001-05-23', 'Perempuan', 'Kudus', 'Kaliwungu', 'Tanggulangin', '1', '4', '085876543210', 'nurulaisyah@email.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(198, 257, 5, 'REGBLK2400928', '3456781234', 'Taufik Hidayat', '2003-01-10', 'Laki-laki', 'Kudus', 'Gebog', 'Ngembal', '6', '3', '082345678901', 'taufikhidayat@email.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(199, 258, 5, 'REGBLK2400927', '3456780123', 'Linda Suryani', '1999-06-22', 'Perempuan', 'Kudus', 'Bae', 'Jati', '3', '2', '085234567890', 'lindasuryani@email.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(200, 259, 5, 'REGBLK2400926', '3456789012', 'Agus Priyanto', '2000-11-11', 'Laki-laki', 'Kudus', 'Kota Kudus', 'Purwosari', '5', '1', '087654321234', 'aguspriyanto@email.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(201, 260, 1, 'REGBLK2400925', '3456788901', 'Kiki Ayu', '2002-03-19', 'Perempuan', 'Kudus', 'Kaliwungu', 'Juwana', '2', '25', '089876543210', 'kiki.ayu@gmail.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(202, 261, 1, 'REGBLK2400924', '3456787890', 'Fadli Anwar', '2001-05-12', 'Laki-laki', 'Kudus', 'Undaan', 'Tanggulangin', '1', '24', '087654321098', 'fadli.anwar@yahoo.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(203, 262, 1, 'REGBLK2400923', '3456786789', 'Ratna Puspita', '2003-04-17', 'Perempuan', 'Kudus', 'Kota Kudus', 'Karanganyar', '3', '23', '081223456789', 'ratna.puspita@outlook.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(204, 263, 1, 'REGBLK2400922', '3456785678', 'Tio Gunawan', '1998-08-09', 'Laki-laki', 'Kudus', 'Gebog', 'Gondosari', '2', '22', '085987654321', 'tio.gunawan@mail.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(205, 264, 1, 'REGBLK2400921', '3456784567', 'Sari Wulandari', '2000-02-14', 'Perempuan', 'Kudus', 'Jati', 'Tanggulangin', '7', '21', '085234567891', 'sari.wulandari@gmail.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(206, 265, 1, 'REGBLK2400920', '3456783456', 'Farhan Rizky', '2001-11-10', 'Laki-laki', 'Kudus', 'Kota Kudus', 'Kauman', '6', '20', '082334567892', 'farhan.rizky@outlook.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(207, 266, 1, 'REGBLK2400919', '3456782345', 'Dina Anggraeni', '1999-07-22', 'Perempuan', 'Kudus', 'Jati', 'Karangrejo', '1', '19', '089876543210', 'dina.anggraeni@gmail.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(208, 267, 1, 'REGBLK2400918', '3456781234', 'Ardi Subakti', '2003-03-30', 'Laki-laki', 'Kudus', 'Bae', 'Bacin', '5', '18', '085234567890', 'ardi.subakti@mail.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(209, 268, 1, 'REGBLK2400917', '3456780123', 'Yuni Rahmawati', '2000-12-21', 'Perempuan', 'Kudus', 'Gebog', 'Gondosari', '4', '17', '087665432198', 'yuni.rahmawati@yahoo.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(210, 269, 1, 'REGBLK2400916', '3456789012', 'Dedi Setyawan', '2001-09-05', 'Laki-laki', 'Kudus', 'Kota Kudus', 'Purwosari', '2', '16', '082345678987', 'dedi.setyawan@outlook.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(211, 270, 1, 'REGBLK2400915', '3456788901', 'Lani Pratama', '2002-10-13', 'Perempuan', 'Kudus', 'Kaliwungu', 'Juwana', '3', '15', '085876543210', 'lani.pratama@gmail.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(212, 271, 1, 'REGBLK2400914', '3456787890', 'Melia Sari', '2001-04-25', 'Perempuan', 'Kudus', 'Kota Kudus', 'Purwosari', '1', '14', '087654321098', 'melia.sari@mail.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(213, 272, 1, 'REGBLK2400913', '3456786789', 'Ardiansyah', '1999-01-18', 'Laki-laki', 'Kudus', 'Bae', 'Bacin', '2', '13', '089345678901', 'ardiansyah@email.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(214, 273, 1, 'REGBLK2400912', '3456785678', 'Nanda Nuraini', '2000-05-06', 'Perempuan', 'Kudus', 'Gebog', 'Gondosari', '5', '12', '085987654321', 'nanda.nuraini@outlook.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(215, 274, 1, 'REGBLK2400911', '3456784567', 'Budi Darmawan', '1996-07-27', 'Laki-laki', 'Kudus', 'Kota Kudus', 'Karanganyar', '4', '11', '081234567890', 'budi.darmawan@gmail.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(216, 275, 1, 'REGBLK2400910', '3456783456', 'Citra Dewi', '2003-05-14', 'Perempuan', 'Kudus', 'Jati', 'Jati', '1', '10', '082345678901', 'citra.dewi@yahoo.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(217, 276, 1, 'REGBLK2400909', '3456782345', 'Arif Rachman', '2004-02-02', 'Laki-laki', 'Kudus', 'Kaliwungu', 'Juwana', '2', '9', '085234567890', 'arif.rachman@email.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(218, 277, 1, 'REGBLK2400908', '3456781234', 'Dwi Purnomo', '2002-12-11', 'Laki-laki', 'Kudus', 'Undaan', 'Tanggulangin', '3', '8', '089876543210', 'dwi.purnomo@gmail.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(219, 278, 1, 'REGBLK2400907', '3456780123', 'Fajar Setiawan', '2001-08-30', 'Laki-laki', 'Kudus', 'Kota Kudus', 'Kauman', '6', '1', '087765432109', 'fajar.setiawan@outlook.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(220, 279, 1, 'REGBLK2400906', '3456789012', 'Clara Dewi', '1998-03-18', 'Perempuan', 'Kudus', 'Bae', 'Bacin', '3', '6', '081212345678', 'clara.dewi@mail.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(221, 280, 1, 'REGBLK2400905', '3456788901', 'Ahmad Zaki', '2003-11-20', 'Laki-laki', 'Kudus', 'Gebog', 'Ngembal', '5', '4', '085345678901', 'ahmad.zaki@gmail.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(222, 281, 1, 'REGBLK2400904', '3456787890', 'Lilis Suryani', '2000-04-10', 'Perempuan', 'Kudus', 'Kota Kudus', 'Karangrejo', '7', '3', '085654321234', 'lilis.suryani@yahoo.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(223, 282, 1, 'REGBLK2400903', '3456786789', 'Joko Prabowo', '2004-06-22', 'Laki-laki', 'Kudus', 'Mejobo', 'Mejobo', '4', '5', '089123456789', 'joko.prabowo@outlook.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(224, 283, 1, 'REGBLK2400902', '3456785678', 'Siti Nurhaliza', '1997-09-05', 'Perempuan', 'Kudus', 'Kaliwungu', 'Kaliwungu', '2', '2', '082123456789', 'siti.nurhaliza@gmail.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(225, 284, 1, 'REGBLK2400901', '3456784567', 'Rudi Hartono', '2002-01-15', 'Laki-laki', 'Kudus', 'Jati', 'Jati', '3', '7', '087654321234', 'rudi.hartono@email.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(233, 292, 4, 'REGBLK2401005', '3456783437', 'Oki Permana', '2004-05-25', 'Laki-laki', 'Kudus', 'Jekulo', 'Glagahwaru', '4', '2', '082345678456', 'oki.permana@outlook.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(234, 293, 4, 'REGBLK2401004', '3456783436', 'Novi Andika', '2004-04-20', 'Laki-laki', 'Kudus', 'Undaan', 'Undaan Kidul', '3', '5', '081234569001', 'novi.andika@gmail.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(235, 294, 4, 'REGBLK2401003', '3456783435', 'Mira Safira', '2004-03-15', 'Perempuan', 'Kudus', 'Mejobo', 'Honggosoco', '2', '4', '085765432123', 'mira.safira@yahoo.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(236, 295, 4, 'REGBLK2401002', '3456783434', 'Lina Sari', '2004-02-10', 'Perempuan', 'Kudus', 'Jati', 'Jekulo', '1', '3', '087654123890', 'lina.sari@outlook.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(237, 296, 4, 'REGBLK2401001', '3456783433', 'Kiki Ramadhan', '2004-01-05', 'Laki-laki', 'Kudus', 'Dawe', 'Kajar', '2', '1', '082345679012', 'kiki.ramadhan@gmail.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(238, 297, 4, 'REGBLK2401000', '3456783432', 'Joko Sunaryo', '2003-12-25', 'Laki-laki', 'Kudus', 'Bae', 'Bacin', '3', '6', '081234569876', 'joko.sunaryo@yahoo.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(239, 298, 4, 'REGBLK2400999', '3456783431', 'Indah Lestari', '2003-11-20', 'Perempuan', 'Kudus', 'Gebog', 'Gondosari', '5', '2', '085765780912', 'indah.lestari@outlook.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(240, 299, 4, 'REGBLK2400998', '3456783430', 'Heri Setiawan', '2003-10-15', 'Laki-laki', 'Kudus', 'Kota Kudus', 'Kerjasan', '4', '4', '089836523490', 'heri.setiawan@email.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(241, 300, 4, 'REGBLK2400997', '3456783429', 'Gina Kurnia', '2003-09-10', 'Perempuan', 'Kudus', 'Jekulo', 'Glagahwaru', '4', '2', '087654123456', 'gina.kurnia@outlook.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(242, 301, 4, 'REGBLK2400996', '3456783428', 'Fajar Hidayat', '2003-08-05', 'Laki-laki', 'Kudus', 'Undaan', 'Undaan Kidul', '3', '5', '081276543290', 'fajar.hidayat@gmail.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(243, 302, 4, 'REGBLK2400995', '3456783427', 'Eka Suryani', '2003-07-30', 'Perempuan', 'Kudus', 'Mejobo', 'Honggosoco', '2', '4', '082345678921', 'eka.suryani@yahoo.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(244, 303, 4, 'REGBLK2400994', '3456783426', 'Dian Prasetyo', '2003-06-25', 'Laki-laki', 'Kudus', 'Jati', 'Jekulo', '1', '3', '085765432198', 'dian.prasetyo@outlook.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(245, 304, 4, 'REGBLK2400993', '3456783425', 'Citra Dewi', '2003-05-20', 'Perempuan', 'Kudus', 'Dawe', 'Kajar', '2', '1', '081234567890', 'citra.dewi@gmail.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(246, 305, 4, 'REGBLK2400992', '3456783456', 'Dita Pertiwi', '2002-12-21', 'Perempuan', 'Kudus', 'Undaan', 'Undaan', '2', '4', '085612345678', 'dita.pertiwi@outlook.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(247, 306, 4, 'REGBLK2400991', '3456782345', 'Agus Setiawan', '2002-09-02', 'Laki-laki', 'Kudus', 'Kota Kudus', 'Purwosari', '6', '2', '089876543210', 'agus.setiawan@mail.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(248, 307, 4, 'REGBLK2400990', '3456781234', 'Rina Sari', '2002-02-12', 'Perempuan', 'Kudus', 'Kaliwungu', 'Juwana', '3', '1', '081234567890', 'rina.sari@gmail.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(249, 308, 4, 'REGBLK2400988', '3456782386', 'Maya Putri', '2003-02-25', 'Laki-laki', 'Kudus', 'Bae', 'Bacin', '3', '6', '087654238905', 'maya.putri@yahoo.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(250, 309, 4, 'REGBLK2400987', '3456786432', 'Budi Santoso', '2003-02-25', 'Laki-laki', 'Kudus', 'Gebog', 'Gondosari', '5', '2', '085765782347', 'budi.santoso@outlook.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(251, 310, 4, 'REGBLK2400986', '3456783421', 'Andi Wijaya', '2003-02-25', 'Laki-laki', 'Kudus', 'Kota Kudus', 'Kerjasan', '4', '4', '089836524556', 'andi.wijaya@email.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(252, 311, 4, 'REGBLK2400989', '3314567890', 'Niken Salindry', '2004-05-11', 'Perempuan', 'Kudus', 'Gebog', 'Besito', '2', '3', '085678085678', 'niken@gmail.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(253, 312, 4, 'REGBLK2400985', '3315567893', 'Satya Kirana', '2005-11-30', 'Perempuan', 'Kudus', 'Gebog', 'Gondosari', '2', '1', '087654096745', 'satya@gmail.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(254, 313, 4, 'REGBLK2400984', '3315567890', 'Freya Tamaya', '2006-03-15', 'Perempuan', 'Kudus', 'Gebog', 'Jurang', '5', '3', '087654090906', 'freya@gmail.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(255, 314, 4, 'REGBLK2400983', '3456789236', 'Giofani Jevan', '2003-02-25', 'Laki-laki', 'Kudus', 'Gebog', 'Rahtawu', '5', '4', '087654231278', 'gion@gmail.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(256, 315, 4, 'REGBLK2400982', '3456789235', 'Fian Narendra', '2003-02-25', 'Laki-laki', 'Kudus', 'Gebog', 'Besito', '1', '4', '085765782345', 'fia.na@gmail.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(257, 316, 4, 'REGBLK2400981', '3456789234', 'Dias Parker', '2003-02-25', 'Laki-laki', 'Kudus', 'Gebog', 'Karang Malang', '4', '3', '089836528399', 'dias.p@gmail.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(258, 319, 6, 'REGBLK2400100', '3456783100', 'Nawang Alan Andrian', '2003-07-20', 'Laki-laki', 'Kudus', 'Gebog', 'Gondosari', '3', '6', '085678087821', 'andrian.wang127@gmail.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(262, 323, 6, 'REGBLK2400101', '3456783101', 'Nawang Andrian', '2004-09-07', 'Laki-laki', 'Kudus', 'Gebog', 'Gondosari', '3', '6', '085865317821', 'andrian.wang127@gmail.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos'),
(272, 337, 6, 'REGBLK2400103', '3456786789', 'Dinda Nurjanah', '1999-03-11', 'Perempuan', 'Kudus', 'Kota Kudus', 'Purwosari', '1', '2', '085678901234', 'nawangandrian@gmail.com', 'Aktif', 'Belum', 'Bukan', 'Tidak Lolos Administrasi'),
(273, 338, 6, 'REGBLK2400104', '3456787890', 'Wildan Salim', '2014-01-19', 'Laki-laki', 'Kudus', 'Gebog', 'Gondosari', '2', '3', '081234567890', 'nawangandrian@gmail.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Tidak Lolos Administrasi'),
(274, 339, 6, 'REGBLK2400102', '331521', 'Nawang Alan', '2003-07-05', 'Laki-laki', 'Kudus', 'Gebog', 'Gondosari', '5', '3', '085678087821', 'nawangandrian@gmail.com', 'Tidak Bekerja', 'Belum', 'Bukan', 'Lolos');

-- --------------------------------------------------------

--
-- Table structure for table `pilgan`
--

CREATE TABLE `pilgan` (
  `id_pilgan` int(11) NOT NULL,
  `soal_id` int(11) DEFAULT NULL,
  `pilgan` varchar(255) NOT NULL,
  `img_pilgan` text NOT NULL,
  `jawaban_benar` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pilgan`
--

INSERT INTO `pilgan` (`id_pilgan`, `soal_id`, `pilgan`, `img_pilgan`, `jawaban_benar`) VALUES
(194, 66, 'Mengabaikan masalah tersebut', '', 0),
(195, 66, 'Menunggu bantuan dari orang lain', '', 0),
(196, 66, 'Berusaha mencari solusi sendiri', '', 1),
(197, 66, 'Mencari solusi dengan cepat tanpa pertimbangan', '', 0),
(198, 66, 'Menyerah dan tidak menghadapinya lagi', '', 0),
(199, 67, 'Menjaga kepercayaan orang lain', '', 1),
(200, 67, 'Menghindari peraturan', '', 0),
(201, 67, 'Menilai orang berdasarkan latar belakangnya', '', 0),
(202, 67, 'Berbuat curang demi kepentingan pribadi', '', 0),
(203, 67, 'Menjaga kepercayaan orang lain', '', 0),
(204, 68, 'Menyalahkan anggota tim lain', '', 0),
(205, 68, 'Mencari solusi yang win-win', '', 1),
(206, 68, 'Mengabaikan pendapat yang berbeda', '', 0),
(207, 68, 'Memaksakan kehendak sendiri', '', 0),
(208, 68, 'Menghindari diskusi lebih lanjut', '', 0),
(209, 69, 'Menghindari tanggung jawab', '', 0),
(210, 69, 'Tetap tenang dan fokus pada solusi', '', 1),
(211, 69, 'Menyerah begitu saja', '', 0),
(212, 69, 'Mencari bantuan sebanyak-banyaknya', '', 0),
(213, 69, 'Menyalahkan pihak lain', '', 0),
(214, 70, 'Menunda pekerjaan hingga terakhir', '', 0),
(215, 70, 'Segera meminta bantuan dari teman', '', 0),
(216, 70, 'Membaca petunjuk dan mencari referensi', '', 1),
(217, 70, 'Berpikir sejenak dan merencanakan langkah-langkahnya', '', 0),
(218, 70, 'Menghindari tugas tersebut', '', 0),
(219, 71, 'Menanggapinya dengan sikap marah', '', 0),
(220, 71, 'Berusaha tenang dan memahami', '', 1),
(221, 71, 'Mencoba menghindari pelayanan tersebut', '', 0),
(222, 71, 'Membiarkan orang tersebut menunggu lebih lama', '', 0),
(223, 71, 'Mengabaikan keluhan yang ada', '', 0),
(224, 72, 'Menyelesaikan tanpa bantuan orang lain', '', 1),
(225, 72, 'Bertanya kepada teman', '', 0),
(226, 72, 'Menggunakan kalkulator untuk mencari solusi', '', 0),
(227, 72, 'Melihat contoh soal yang mirip', '', 0),
(228, 72, 'Mencari tahu secara mandiri', '', 0),
(232, 79, 'Menyerah dan berhenti', '', 0),
(233, 79, 'Mencari solusi alternatif', '', 1),
(234, 79, 'Menyalahkan orang lain', '', 0),
(235, 79, 'Mengabaikan kendala tersebut', '', 0),
(236, 79, 'Mencari solusi eksternal', '', 0),
(237, 80, 'Menentukan tujuan dan arah yang jelas', '', 1),
(238, 80, 'Membagi tugas tanpa koordinasi', '', 0),
(239, 80, 'Memulai tanpa perencanaan', '', 0),
(240, 80, 'Membiarkan anggota tim bekerja sendiri', '', 0),
(241, 80, 'Menentukan tujuan dan arah yang tidak jelas', '', 0),
(242, 81, 'Mengambil keputusan berdasarkan rasa', '', 0),
(243, 81, 'Mengumpulkan informasi lebih lanjut', '', 0),
(244, 81, 'Menunggu persetujuan atasan', '', 0),
(245, 81, 'Mencari opini dari orang lain', '', 0),
(246, 81, 'Mengambil keputusan berdasarkan insting', '', 1),
(247, 82, 'Berbicara dengan rekan kerja untuk mencari solusi', '', 1),
(248, 82, 'Menyelesaikan masalah sendiri', '', 0),
(249, 82, 'Mengabaikan masalah tersebut', '', 0),
(250, 82, 'Menunda pekerjaan sampai waktu luang', '', 0),
(251, 82, 'Berbicara sendiri untuk mencari solusi', '', 0),
(252, 83, 'Mencari tahu saja', '', 0),
(253, 83, 'Langsung mengerjakan tanpa ragu', '', 0),
(254, 83, 'Menunggu instruksi lebih lanjut', '', 0),
(255, 83, 'Menanyakan cara kerja ke orang lain', '', 0),
(256, 83, 'Mencari tahu semua hal sebelum mulai', '', 1),
(257, 84, 'Menghindari perdebatan', '', 0),
(258, 84, 'Menerima pendapat mereka', '', 0),
(259, 84, 'Menyampaikan pendapat Anda secara jelas', '', 1),
(260, 84, 'Menyalahkan pendapat mereka', '', 0),
(261, 84, 'Menyela pendapat ', '', 0),
(262, 85, 'Mengingatkan anggota tersebut secara langsung', '', 1),
(263, 85, 'Mengabaikan dan melanjutkan tugas', '', 0),
(264, 85, 'Melapor kepada atasan', '', 0),
(265, 85, 'Mengerjakan tugas tersebut sendiri', '', 0),
(266, 85, 'Mengingatkan anggota tersebut secara tidak langsung', '', 0),
(267, 86, 'Menyelesaikan pekerjaan satu per satu', '', 1),
(268, 86, 'Mencari cara untuk menyelesaikan semuanya sekaligus', '', 0),
(269, 86, 'Mengabaikan pekerjaan yang lebih kecil', '', 0),
(270, 86, 'Menunda pekerjaan hingga terakhir', '', 0),
(271, 86, 'Mengingatkan mereka secara langsung', '', 0),
(272, 87, 'Menerima kritik tersebut dengan kepala dingin', '', 0),
(273, 87, 'Menyerah karena merasa tidak cukup kompeten', '', 0),
(274, 87, 'Mencari bantuan dari orang yang lebih ahli', '', 0),
(275, 87, 'Mengabaikan tugas tersebut', '', 0),
(276, 87, 'Mencari tahu lebih banyak dan mempelajari topik tersebut', '', 1),
(277, 88, 'Tetap optimis dan fokus mencari solusi', '', 1),
(278, 88, 'Menghindari masalah tersebut', '', 0),
(279, 88, 'Menunggu masalah hilang dengan sendirinya', '', 0),
(280, 88, 'Menyerah dan menghindari tantangan', '', 0),
(281, 88, 'Mengutamakan tugas yang paling penting', '', 0),
(282, 89, 'Ada pemimpin yang tegas dan jelas', '', 0),
(283, 89, 'Semua anggota berbagi tanggung jawab', '', 1),
(284, 89, 'Ada pembagian tugas yang jelas', '', 0),
(285, 89, 'Semua anggota bekerja secara mandiri', '', 0),
(286, 89, 'Mengingatkan mereka secara langsung', '', 0),
(287, 90, 'Membuat keputusan cepat tanpa terlalu banyak berpikir', '', 0),
(288, 90, 'Menerima kritik tersebut dengan kepala dingin', '', 0),
(289, 90, 'Mencari saran dari orang lain', '', 0),
(290, 90, 'Menunda hingga tenggat waktu', '', 0),
(291, 90, 'Mengumpulkan informasi sebanyak mungkin', '', 1),
(292, 91, 'Tujuan pekerjaan jelas dan menantang', '', 1),
(293, 91, 'Tugas terasa rutin dan mudah', '', 0),
(294, 91, 'Pekerjaan memberikan tantangan baru', '', 0),
(295, 91, 'Pekerjaan diselesaikan tanpa hambatan', '', 0),
(296, 91, 'Tujuan pekerjaan jelas dan menantang', '', 0),
(297, 92, 'Menyelesaikan tugas dengan cepat tanpa banyak berpikir', '', 0),
(298, 92, 'Mengutamakan tugas yang paling penting', '', 0),
(299, 92, 'Menghindari pekerjaan sulit', '', 0),
(300, 92, 'Berusaha mengerjakan semua hal sekaligus', '', 0),
(301, 92, 'Menyelesaikan tugas dengan cermat dan teliti', '', 1),
(302, 102, 'Menyelesaikan pekerjaan satu per satu', '', 1),
(303, 102, 'Mencari cara untuk menyelesaikan semuanya sekaligus', '', 0),
(304, 102, 'Mengabaikan pekerjaan yang lebih kecil', '', 0),
(305, 102, 'Menunda pekerjaan hingga terakhir', '', 0),
(306, 102, 'Mengingatkan mereka secara langsung', '', 0),
(307, 103, 'Menerima kritik tersebut dengan kepala dingin', '', 0),
(308, 103, 'Menyerah karena merasa tidak cukup kompeten', '', 0),
(309, 103, 'Mencari bantuan dari orang yang lebih ahli', '', 0),
(310, 103, 'Mengabaikan tugas tersebut', '', 0),
(311, 103, 'Mencari tahu lebih banyak dan mempelajari topik tersebut', '', 1),
(312, 104, 'Tetap optimis dan fokus mencari solusi', '', 1),
(313, 104, 'Menghindari masalah tersebut', '', 0),
(314, 104, 'Menunggu masalah hilang dengan sendirinya', '', 0),
(315, 104, 'Menyerah dan menghindari tantangan', '', 0),
(316, 104, 'Mengutamakan tugas yang paling penting', '', 0),
(317, 105, 'Ada pemimpin yang tegas dan jelas', '', 0),
(318, 105, 'Semua anggota berbagi tanggung jawab', '', 1),
(319, 105, 'Ada pembagian tugas yang jelas', '', 0),
(320, 105, 'Semua anggota bekerja secara mandiri', '', 0),
(321, 105, 'Mengingatkan mereka secara langsung', '', 0),
(322, 106, 'Membuat keputusan cepat tanpa terlalu banyak berpikir', '', 0),
(323, 106, 'Menerima kritik tersebut dengan kepala dingin', '', 0),
(324, 106, 'Mencari saran dari orang lain', '', 0),
(325, 106, 'Menunda hingga tenggat waktu', '', 0),
(326, 106, 'Mengumpulkan informasi sebanyak mungkin', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(11) NOT NULL,
  `ujian_id` int(11) DEFAULT NULL,
  `soal` text NOT NULL,
  `img_soal` text NOT NULL,
  `tipe_soal` enum('Pilihan Ganda','Benar Salah','Uraian') NOT NULL,
  `bobot_soal` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `ujian_id`, `soal`, `img_soal`, `tipe_soal`, `bobot_soal`) VALUES
(66, 1, 'Ketika menghadapi masalah yang sulit, Anda lebih memilih…', '', 'Pilihan Ganda', 10),
(67, 1, 'Di bawah ini yang termasuk dalam prinsip dasar integritas adalah…', '', 'Pilihan Ganda', 10),
(68, 1, 'Jika Anda bekerja dalam tim, jika terjadi perbedaan pendapat, Anda akan…', '', 'Pilihan Ganda', 10),
(69, 1, 'Dalam situasi yang penuh tekanan, Anda cenderung…', '', 'Pilihan Ganda', 10),
(70, 1, 'Anda menerima tugas yang sulit dan tidak familiar, langkah pertama yang akan Anda ambil adalah…', '', 'Pilihan Ganda', 10),
(71, 1, 'Jika Anda dihadapkan dengan situasi di mana Anda harus memberikan pelayanan kepada seseorang yang tidak sabar, Anda akan…', '', 'Pilihan Ganda', 10),
(72, 1, 'Dalam memecahkan masalah matematika yang rumit, Anda lebih suka…', '', 'Pilihan Ganda', 10),
(79, 10, 'Jika Anda sedang bekerja pada suatu proyek dan menemui kendala yang sulit, Anda cenderung untuk…', '', 'Pilihan Ganda', 10),
(80, 10, 'Jika Anda diminta untuk memimpin sebuah tim, hal pertama yang Anda lakukan adalah…', '', 'Pilihan Ganda', 10),
(81, 10, 'Jika Anda dihadapkan pada situasi yang membutuhkan keputusan cepat, Anda akan…', '', 'Pilihan Ganda', 10),
(82, 10, 'Dalam situasi di tempat kerja yang penuh tekanan, Anda akan lebih memilih untuk…', '', 'Pilihan Ganda', 10),
(83, 10, 'Ketika Anda menerima tugas baru yang menantang, Anda lebih suka…', '', 'Pilihan Ganda', 10),
(84, 10, 'Saat menghadapi orang yang berbeda pendapat dengan Anda, Anda akan…', '', 'Pilihan Ganda', 10),
(85, 10, 'Jika Anda bekerja dalam tim dan salah satu anggota tim tidak melakukan bagian tugasnya, Anda akan…', '', 'Pilihan Ganda', 10),
(86, 9, 'Dalam menghadapi banyak pekerjaan dengan tenggat waktu yang ketat, Anda akan…', '', 'Pilihan Ganda', 10),
(87, 9, 'Anda diminta untuk bekerja pada sebuah proyek baru yang sangat penting, namun Anda belum menguasai topik tersebut. Apa yang akan Anda lakukan?', '', 'Pilihan Ganda', 10),
(88, 9, 'Saat berhadapan dengan situasi yang sulit, Anda cenderung…', '', 'Pilihan Ganda', 10),
(89, 9, 'Ketika bekerja dengan kelompok, Anda merasa paling nyaman ketika…', '', 'Pilihan Ganda', 10),
(90, 9, 'Ketika menghadapi masalah besar yang membutuhkan perhatian segera, Anda lebih suka…', '', 'Pilihan Ganda', 10),
(91, 9, 'Dalam sebuah pekerjaan, Anda akan merasa termotivasi jika…', '', 'Pilihan Ganda', 10),
(92, 9, 'Dalam bekerja di bawah tekanan, Anda lebih memilih untuk…', '', 'Pilihan Ganda', 10),
(93, 10, 'Menghadapi masalah yang sulit, langkah pertama yang tepat adalah mencari solusi tanpa mempertimbangkan akibat jangka panjang.', '', 'Benar Salah', 10),
(94, 10, 'Integritas dalam pekerjaan berarti menjalankan tugas dengan jujur dan tidak menyalahgunakan wewenang yang dimiliki.', '', 'Benar Salah', 10),
(95, 1, 'Dalam bekerja di bawah tekanan, cara yang efektif adalah mengabaikan masalah dan berharap masalah itu akan selesai dengan sendirinya.', '', 'Benar Salah', 10),
(96, 1, 'Saat berkomunikasi dalam tim, mendengarkan dengan baik dan memberikan feedback yang konstruktif adalah cara untuk menjaga hubungan kerja yang baik.', '', 'Benar Salah', 10),
(97, 9, 'Ketika menerima tugas yang sulit, sebaiknya kita menunggu instruksi lebih lanjut daripada mengambil inisiatif.', '', 'Benar Salah', 10),
(98, 9, 'Menjaga profesionalisme di tempat kerja berarti menjaga sikap, etika, dan menghormati rekan kerja.', '', 'Benar Salah', 10),
(99, 1, 'Mengapa Anda tertarik mengikuti pelatihan ini? Jelaskan alasan Anda dengan mempertimbangkan pengembangan karir dan kemampuan yang ingin Anda tingkatkan.', '', 'Uraian', 10),
(100, 9, 'Mengapa Anda tertarik mengikuti pelatihan ini? Jelaskan alasan Anda dengan mempertimbangkan pengembangan karir dan kemampuan yang ingin Anda tingkatkan.', '', 'Uraian', 10),
(101, 10, 'Mengapa Anda tertarik mengikuti pelatihan ini? Jelaskan alasan Anda dengan mempertimbangkan pengembangan karir dan kemampuan yang ingin Anda tingkatkan.', '', 'Uraian', 10),
(102, 11, 'Dalam menghadapi banyak pekerjaan dengan tenggat waktu yang ketat, Anda akan…', '', 'Pilihan Ganda', 10),
(103, 11, 'Anda diminta untuk bekerja pada sebuah proyek baru yang sangat penting, namun Anda belum menguasai topik tersebut. Apa yang akan Anda lakukan?', '', 'Pilihan Ganda', 10),
(104, 11, 'Saat berhadapan dengan situasi yang sulit, Anda cenderung…', '', 'Pilihan Ganda', 10),
(105, 11, 'Ketika bekerja dengan kelompok, Anda merasa paling nyaman ketika…', '', 'Pilihan Ganda', 10),
(106, 11, 'Ketika menghadapi masalah besar yang membutuhkan perhatian segera, Anda lebih suka…', '', 'Pilihan Ganda', 10);

-- --------------------------------------------------------

--
-- Table structure for table `soal_wawancara`
--

CREATE TABLE `soal_wawancara` (
  `id_soal_wawancara` int(11) NOT NULL,
  `pelatihan_id` int(11) NOT NULL,
  `soal_wawancara` text NOT NULL,
  `bobot_soal_wawancara` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal_wawancara`
--

INSERT INTO `soal_wawancara` (`id_soal_wawancara`, `pelatihan_id`, `soal_wawancara`, `bobot_soal_wawancara`) VALUES
(3, 4, 'Apa yang menjadi alasanmu dalam memilih pelatihan ini?', 20),
(4, 4, 'Rencana setelah berhasil menyelesaikan pelatihan?', 20),
(5, 4, 'Bisa ceritakan tentang diri kamu?', 20),
(6, 4, 'Apa kelebihan dan kekurangan kamu?', 20),
(7, 4, 'Apa yang bisa meyakinkan kami untuk menerima kamu?', 20),
(8, 1, 'Apa yang menjadi alasanmu dalam memilih pelatihan ini?', 20),
(9, 1, 'Rencana setelah berhasil menyelesaikan pelatihan?', 20),
(10, 1, 'Bisa ceritakan tentang diri kamu?', 20),
(11, 1, 'Apa kelebihan dan kekurangan kamu?', 20),
(12, 1, 'Apa yang bisa meyakinkan kami untuk menerima kamu?', 20),
(13, 5, 'Apa yang menjadi alasanmu dalam memilih pelatihan ini?', 20),
(14, 5, 'Rencana setelah berhasil menyelesaikan pelatihan?', 20),
(15, 5, 'Bisa ceritakan tentang diri kamu?', 20),
(16, 5, 'Apa kelebihan dan kekurangan kamu?', 20),
(17, 5, 'Apa yang bisa meyakinkan kami untuk menerima kamu?', 20),
(18, 6, 'Apa yang menjadi alasanmu dalam memilih pelatihan ini?', 20),
(19, 6, 'Rencana setelah berhasil menyelesaikan pelatihan?', 20),
(20, 6, 'Bisa ceritakan tentang diri kamu?', 20),
(21, 6, 'Apa kelebihan dan kekurangan kamu?', 20),
(22, 6, 'Apa yang bisa meyakinkan kami untuk menerima kamu?', 20);

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

CREATE TABLE `ujian` (
  `id_ujian` int(11) NOT NULL,
  `pelatihan_id` int(11) NOT NULL,
  `nama_ujian` varchar(200) NOT NULL,
  `jumlah_soal` int(11) NOT NULL,
  `waktu` int(11) NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ujian`
--

INSERT INTO `ujian` (`id_ujian`, `pelatihan_id`, `nama_ujian`, `jumlah_soal`, `waktu`, `tgl_mulai`, `tgl_selesai`) VALUES
(1, 1, 'Seleksi MU', 10, 30, '2025-02-24 08:00:00', '2025-03-31 15:00:00'),
(9, 4, 'Seleksi JAA', 10, 30, '2025-02-24 08:00:00', '2025-07-31 15:30:00'),
(10, 5, 'Seleksi MPWD', 10, 30, '2025-02-24 08:00:00', '2025-07-31 15:00:00'),
(11, 6, 'PRK', 5, 15, '2025-03-07 08:00:00', '2025-08-10 13:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `uraian`
--

CREATE TABLE `uraian` (
  `id_uraian` int(11) NOT NULL,
  `soal_id` int(11) NOT NULL,
  `jawaban_uraian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uraian`
--

INSERT INTO `uraian` (`id_uraian`, `soal_id`, `jawaban_uraian`) VALUES
(4, 99, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.'),
(5, 100, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.'),
(6, 101, 'Saya tertarik mengikuti pelatihan ini karena ingin mengembangkan keterampilan profesional, memperluas pengetahuan di bidang ini, dan meningkatkan kemampuan saya untuk dapat berkontribusi lebih efektif di tempat kerja.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(16) NOT NULL,
  `role` enum('peserta','admin','kepala blk') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `foto` text NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `login_token` varchar(64) DEFAULT NULL,
  `pw_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `no_telp`, `role`, `password`, `created_at`, `foto`, `is_active`, `login_token`, `pw_user`) VALUES
(93, 'Nawang Alan Andrian', 'alan', 'andrian@gmail.com', '085678084545', 'admin', '$2y$10$QjcGiyrp5bbNZrc5UgjIJuKny2FKnrQ7wTTu.dzGVhQQ3A/CdDXlK', 1716766450, 'admin@gmail.com64879c5a606b14.23273712_2.jpeg', 1, NULL, '123'),
(100, 'Nawang Alan Andrian', 'kepalaBLK', 'nawang@gmail.com', '085678087821', 'kepala blk', '$2y$10$jHq51MQ7R.z7CKIHHsjwF.Qr2Jcj2ueb.WyDCKEyZL/mtV2pXaxTK', 1720623519, 'user.png', 1, NULL, '123'),
(235, 'Reza Prasetyo', 'REGBLK2400950', 'rezaprasetyo@email.com', '081223456789', 'peserta', '$2y$10$VfcIwUMovfgmwYeBtVCr/eBebzFuJpSG/HZ2/c.A.imPPbvJ2gOtS', 1740387350, 'user.png', 1, NULL, 'REGBLK2400950'),
(236, 'Fina Widjaya', 'REGBLK2400949', 'finawidjaya@email.com', '085234567890', 'peserta', '$2y$10$nMZg.zDt3ixowbJxlMoA.u9oe.0ga3uTBqeyyQesFTm3/SCMlZxBC', 1740387350, 'user.png', 1, NULL, 'REGBLK2400949'),
(237, 'Abdurrahman', 'REGBLK2400948', 'abdurrahman@email.com', '089876543210', 'peserta', '$2y$10$aq20jMcxsQO6X4WSA0Uo/.npYXDRDzwPqHxhkDo8XSKsHM0MHCyLa', 1740387350, 'user.png', 1, NULL, 'REGBLK2400948'),
(238, 'Yuniwati Sari', 'REGBLK2400947', 'yuniwatisari@email.com', '082345678987', 'peserta', '$2y$10$sYyh4LuqsSVkfEZ5KYA36eEmR592Db.Ddyeh5Zbjg5uahYJiLnDHu', 1740387350, 'user.png', 1, NULL, 'REGBLK2400947'),
(239, 'Rudi Hartono', 'REGBLK2400946', 'rudihartono@email.com', '087765432109', 'peserta', '$2y$10$GEGZ6JUQXYh85sV.7p2elOPmvSvvgYG/10j0/PNX58aUFdO9J4wHu', 1740387351, 'user.png', 1, NULL, 'REGBLK2400946'),
(240, 'Eka Novita', 'REGBLK2400945', 'ekanovita@email.com', '082234567890', 'peserta', '$2y$10$ug1343ZDZAGwA3230vhj3.z1d0D.N8HA453aRQfMVn2GIS/9c8GJe', 1740387351, 'user.png', 1, NULL, 'REGBLK2400945'),
(241, 'Galih Prakoso', 'REGBLK2400944', 'galihprakoso@email.com', '081234567890', 'peserta', '$2y$10$dakkY1e8GQPmzzb/w1F6W.UaI102qtv1huy6wqewKZnrFHIwdimW6', 1740387351, 'user.png', 1, NULL, 'REGBLK2400944'),
(242, 'Nadya Ristiani', 'REGBLK2400943', 'nadyaristiani@email.com', '087654321098', 'peserta', '$2y$10$mdvmEnhCdyn/wFqU0Ad2kescIiZgKv.VJsBsqzDS609RCEQODu1f.', 1740387352, 'user.png', 1, NULL, 'REGBLK2400943'),
(243, 'Dika Wicaksono', 'REGBLK2400942', 'dikawicaksono@email.com', '085234567890', 'peserta', '$2y$10$TKdo6.HWf3dRVSJNbZt1beOX6fKBqi//6nShJng/QRM/fXtdBHv.W', 1740387352, 'user.png', 1, NULL, 'REGBLK2400942'),
(244, 'Rina Putri', 'REGBLK2400941', 'rinaputri@email.com', '082345678987', 'peserta', '$2y$10$MtzGauschN9pmqZmqMTJxeAexbdNIV2KwhfJAIykModVYLmVBgrk2', 1740387352, 'user.png', 1, NULL, 'REGBLK2400941'),
(245, 'Farhan Pratama', 'REGBLK2400940', 'farhanpratama@email.com', '087765432109', 'peserta', '$2y$10$bCbe1pn1XGAJgCKU6UwVlugXGFDZEr8Ju7GuQPrYyrhaxRT1XBSJe', 1740387352, 'user.png', 1, NULL, 'REGBLK2400940'),
(246, 'Fitri Hidayati', 'REGBLK2400939', 'fitrihidayati@email.com', '085234567890', 'peserta', '$2y$10$apxi08ifnaJK.m.rgfOLbuP908lX0JBJ8hrN0EAhMTofiMZd9fZ8G', 1740387353, 'user.png', 1, NULL, 'REGBLK2400939'),
(247, 'Benny Taufik', 'REGBLK2400938', 'bennytaufik@email.com', '089876543210', 'peserta', '$2y$10$EUbJMCkro660eww9clcrHeZYzX7GBAZbr8guObYMGMCx3Sl.mYN32', 1740387353, 'user.png', 1, NULL, 'REGBLK2400938'),
(248, 'Siti Aisyah', 'REGBLK2400937', 'sitiaisyah@email.com', '082234567890', 'peserta', '$2y$10$dgYOScZD2hqvHInMCOoEzOaSFRybVJVc0XKAqvKzI5UALVz2cWYIy', 1740387353, 'user.png', 1, NULL, 'REGBLK2400937'),
(249, 'Eko Prabowo', 'REGBLK2400936', 'ekoprabowo@email.com', '089876543210', 'peserta', '$2y$10$BPDCfJrZTf9/3x3ospV13euT/KFWb9z9BHXvagQA4/s6Lcq/VhMFy', 1740387353, 'user.png', 1, NULL, 'REGBLK2400936'),
(250, 'Dian Rachmawati', 'REGBLK2400935', 'dianrachmawati@email.com', '085765432109', 'peserta', '$2y$10$6vaRhajzWnou7zxIUQPE8uDGeTUb3VBdmBtc8R3c5Y.baLQw8zfea', 1740387353, 'user.png', 1, NULL, 'REGBLK2400935'),
(251, 'Nadia Sari', 'REGBLK2400934', 'nadiasari@email.com', '082345678987', 'peserta', '$2y$10$t6sGZ4RPrv.8Khtyc4u5Q.2JMmw8TjkKakV2mau34AqB6bI0rSNJO', 1740387355, 'user.png', 1, NULL, 'REGBLK2400934'),
(252, 'Rizky Febrianto', 'REGBLK2400933', 'rizkyfebrianto@email.com', '087654321098', 'peserta', '$2y$10$o.fzaz3jE1FEIMquRjuX5O2PS4unoLDe2elfRJlxJEg.8BdhsPiqm', 1740387355, 'user.png', 1, NULL, 'REGBLK2400933'),
(253, 'Arief Kurniawan', 'REGBLK2400932', 'ariefkurniawan@email.com', '085234567890', 'peserta', '$2y$10$mwZiutBYUqzGlPSZd4DBx.8xaSeq8UwFE104OPju7NIQOBjwYX3tG', 1740387355, 'user.png', 1, NULL, 'REGBLK2400932'),
(254, 'Wulan Maharani', 'REGBLK2400931', 'wulanmaharani@email.com', '087765432109', 'peserta', '$2y$10$Vofg911GxOImCWgGL4cy..ZP.0F4KfhgYrmd99b7bahofQq/.g2uS', 1740387355, 'user.png', 1, NULL, 'REGBLK2400931'),
(255, 'Iwan Setiawan', 'REGBLK2400930', 'iwansetiwan@email.com', '081223456789', 'peserta', '$2y$10$XmyyWQ6jz6TsJnDZ0bdosOR6r5ltdnzn.piM86dENif/Kp857vdzK', 1740387356, 'user.png', 1, NULL, 'REGBLK2400930'),
(256, 'Nurul Aisyah', 'REGBLK2400929', 'nurulaisyah@email.com', '085876543210', 'peserta', '$2y$10$qO.2aSxK.OjURz8s62VuDuLpGllWQ4dRgdQYKnsuC0k8jW6RTzSKm', 1740387356, 'user.png', 1, NULL, 'REGBLK2400929'),
(257, 'Taufik Hidayat', 'REGBLK2400928', 'taufikhidayat@email.com', '082345678901', 'peserta', '$2y$10$tyAmFNoz/QOTOF.910SCNurmENYz5uxfnkAG4j0g8Bgpol5gjrCLG', 1740387356, 'user.png', 1, NULL, 'REGBLK2400928'),
(258, 'Linda Suryani', 'REGBLK2400927', 'lindasuryani@email.com', '085234567890', 'peserta', '$2y$10$6O.jbky9nzAQ.Ztj4wXEWuUBKgAmlO7dwvx2ciPGBL38P7fkMGGGK', 1740387356, 'user.png', 1, NULL, 'REGBLK2400927'),
(259, 'Agus Priyanto', 'REGBLK2400926', 'aguspriyanto@email.com', '087654321234', 'peserta', '$2y$10$nWG9QLv8nI6RpY./.9y1cuSaCt4z9m6ooa5m0QJ1nlc95EALsldGW', 1740387356, 'user.png', 1, NULL, 'REGBLK2400926'),
(260, 'Kiki Ayu', 'REGBLK2400925', 'kiki.ayu@gmail.com', '089876543210', 'peserta', '$2y$10$4/F7mYTuEqGQ3OyC51Q6M.bJYFhR9lDuXsGLKoC/jv80wTAGBGtVG', 1740388215, 'user.png', 1, NULL, 'REGBLK2400925'),
(261, 'Fadli Anwar', 'REGBLK2400924', 'fadli.anwar@yahoo.com', '087654321098', 'peserta', '$2y$10$WDFRCDV4z.Jj4XvhXeW8A.EMqsa4UWvGcRDaCZud6upDpEu.2JlKG', 1740388215, 'user.png', 1, NULL, 'REGBLK2400924'),
(262, 'Ratna Puspita', 'REGBLK2400923', 'ratna.puspita@outlook.com', '081223456789', 'peserta', '$2y$10$VO3UxrMlIteEYGr4psdXyewKs9ZAf.mi/GeZ.d3Pv.p8sYbB5nElu', 1740388215, 'user.png', 1, NULL, 'REGBLK2400923'),
(263, 'Tio Gunawan', 'REGBLK2400922', 'tio.gunawan@mail.com', '085987654321', 'peserta', '$2y$10$Po/dC35fM6Xq88xaXFG1EOTyOoBDvXHDIgokq3jNTgCZ/Edm3PFlu', 1740388215, 'user.png', 1, NULL, 'REGBLK2400922'),
(264, 'Sari Wulandari', 'REGBLK2400921', 'sari.wulandari@gmail.com', '085234567891', 'peserta', '$2y$10$wRUkWPhy7CKXA4R4zt8r5eu3cSsFiGYUrg0Sq7ezUeougB2hs3WNG', 1740388216, 'user.png', 1, NULL, 'REGBLK2400921'),
(265, 'Farhan Rizky', 'REGBLK2400920', 'farhan.rizky@outlook.com', '082334567892', 'peserta', '$2y$10$bVvGht5stpKYQnyYZBBhm.jpLouDYMCSnXlEu.RGsupt8G0TlOhsC', 1740388216, 'user.png', 1, NULL, 'REGBLK2400920'),
(266, 'Dina Anggraeni', 'REGBLK2400919', 'dina.anggraeni@gmail.com', '089876543210', 'peserta', '$2y$10$7gElhqtl3ZcPLhlwrC0tye58wKdIADWbyuDRgRRY4EDkfHyPn8PBa', 1740388217, 'user.png', 1, NULL, 'REGBLK2400919'),
(267, 'Ardi Subakti', 'REGBLK2400918', 'ardi.subakti@mail.com', '085234567890', 'peserta', '$2y$10$6dhNUb9Vrdb1ViHuqGO7uenbTs.0zvGz3uObe2jt/TJjDpswxG8vm', 1740388217, 'user.png', 1, NULL, 'REGBLK2400918'),
(268, 'Yuni Rahmawati', 'REGBLK2400917', 'yuni.rahmawati@yahoo.com', '087665432198', 'peserta', '$2y$10$7dkjley2t852voaZpeY3GeovCfzpRBxr.lisIOHcCL82U6G4pYR3a', 1740388217, 'user.png', 1, NULL, 'REGBLK2400917'),
(269, 'Dedi Setyawan', 'REGBLK2400916', 'dedi.setyawan@outlook.com', '082345678987', 'peserta', '$2y$10$aDFjEZVmNNhDuofO9rhNdON2bF6tQTUaQWotP6W/82yU1fAlBdR1O', 1740388217, 'user.png', 1, NULL, 'REGBLK2400916'),
(270, 'Lani Pratama', 'REGBLK2400915', 'lani.pratama@gmail.com', '085876543210', 'peserta', '$2y$10$mIRu1sAx5O1J7RsvN0Q6.Oleo46L7wdoEspYu1XANNHnHwerospIG', 1740388218, 'user.png', 1, NULL, 'REGBLK2400915'),
(271, 'Melia Sari', 'REGBLK2400914', 'melia.sari@mail.com', '087654321098', 'peserta', '$2y$10$qAf1PkU8ZWrNI00GIIkhb.M36MjaWOTHmU6CFQekck3Kic0VVfE8u', 1740388218, 'user.png', 1, NULL, 'REGBLK2400914'),
(272, 'Ardiansyah', 'REGBLK2400913', 'ardiansyah@email.com', '089345678901', 'peserta', '$2y$10$xSwWbvs1FTuQLKiJk74l9.keX9RHFTg7zPN1yuWe81UUKQAaBrSEy', 1740388218, 'user.png', 1, NULL, 'REGBLK2400913'),
(273, 'Nanda Nuraini', 'REGBLK2400912', 'nanda.nuraini@outlook.com', '085987654321', 'peserta', '$2y$10$VMFtFdwRRQHn4cPweFAs6O9mENevlLs1vxb4YkJ.zmWSZp4THaOlC', 1740388218, 'user.png', 1, NULL, 'REGBLK2400912'),
(274, 'Budi Darmawan', 'REGBLK2400911', 'budi.darmawan@gmail.com', '081234567890', 'peserta', '$2y$10$4RlU572cV4mKindFZJrt1e9ZVs3XY0QX2k9QRWw7zWpSQaBqyOrVe', 1740388218, 'user.png', 1, NULL, 'REGBLK2400911'),
(275, 'Citra Dewi', 'REGBLK2400910', 'citra.dewi@yahoo.com', '082345678901', 'peserta', '$2y$10$..PtL5bXNrvTg4KaGRRagOFug8B.C2vsHB.fa9EpGBDzVregx6oba', 1740388220, 'user.png', 1, NULL, 'REGBLK2400910'),
(276, 'Arif Rachman', 'REGBLK2400909', 'arif.rachman@email.com', '085234567890', 'peserta', '$2y$10$ps6bauD4s50hINAEXQQ6HOIvaW4WFnA4cLwk6vZ62Dp1ktShVD2QG', 1740388220, 'user.png', 1, NULL, 'REGBLK2400909'),
(277, 'Dwi Purnomo', 'REGBLK2400908', 'dwi.purnomo@gmail.com', '089876543210', 'peserta', '$2y$10$JFnBb4I1HNIK4zJZog4Qgeoox5n5Hh3pwxak/M7./JTV2sa1MIkUe', 1740388220, 'user.png', 1, NULL, 'REGBLK2400908'),
(278, 'Fajar Setiawan', 'REGBLK2400907', 'fajar.setiawan@outlook.com', '087765432109', 'peserta', '$2y$10$J3d8kWMJvCjFPZdzDvJ6NuTpI1SZHymwuu53Kc0yR5vHdxWV3SHO2', 1740388220, 'user.png', 1, NULL, 'REGBLK2400907'),
(279, 'Clara Dewi', 'REGBLK2400906', 'clara.dewi@mail.com', '081212345678', 'peserta', '$2y$10$fHUVFTqbPQC73x2hMMP06.soRAlyy3J16fRgaZZLBBgNH/PVUt7aO', 1740388221, 'user.png', 1, NULL, 'REGBLK2400906'),
(280, 'Ahmad Zaki', 'REGBLK2400905', 'ahmad.zaki@gmail.com', '085345678901', 'peserta', '$2y$10$6H1g2t/HRYI0I75Wrgtlr.GAR75NR3GppbueW4ryIKh5cBFMxFwlO', 1740388221, 'user.png', 1, NULL, 'REGBLK2400905'),
(281, 'Lilis Suryani', 'REGBLK2400904', 'lilis.suryani@yahoo.com', '085654321234', 'peserta', '$2y$10$iZoz3xTNMBMOyGfXASifc.efRz9I7hubV8J42i2lmWj/pPL/aY76u', 1740388221, 'user.png', 1, NULL, 'REGBLK2400904'),
(282, 'Joko Prabowo', 'REGBLK2400903', 'joko.prabowo@outlook.com', '089123456789', 'peserta', '$2y$10$JdsgkJ3v/G7n1hwoHPiFmOz7ZALn3ucPxYoDzXuKWF51/iOIbWUuS', 1740388221, 'user.png', 1, NULL, 'REGBLK2400903'),
(283, 'Siti Nurhaliza', 'REGBLK2400902', 'siti.nurhaliza@gmail.com', '082123456789', 'peserta', '$2y$10$i9D.xEm3L2ZBPTnAJ/LE2.zNanIMlQzvbvgaUi7OnKwM4kbqcmIW.', 1740388221, 'user.png', 1, NULL, 'REGBLK2400902'),
(284, 'Rudi Hartono', 'REGBLK2400901', 'rudi.hartono@email.com', '087654321234', 'peserta', '$2y$10$uTQJ628.Ed4TRP2m2X56JOqYJbBvw58oSJRnyBV5bXOjA6Il2SYxW', 1740388222, 'user.png', 1, NULL, 'REGBLK2400901'),
(292, 'Oki Permana', 'REGBLK2401005', 'oki.permana@outlook.com', '082345678456', 'peserta', '$2y$10$WN6laVGM/ARZ1nGI6o/ViO5ASzk4YbyHZTmxL26jG1m1mvHSIFCn.', 1740389680, 'user.png', 1, NULL, 'REGBLK2401005'),
(293, 'Novi Andika', 'REGBLK2401004', 'novi.andika@gmail.com', '081234569001', 'peserta', '$2y$10$VXOyUxmvkogTytXGb0U5.ee0VPGIrQHAhEQEA0fRq0OVpbAiNxBqK', 1740389680, 'user.png', 1, NULL, 'REGBLK2401004'),
(294, 'Mira Safira', 'REGBLK2401003', 'mira.safira@yahoo.com', '085765432123', 'peserta', '$2y$10$5O81dMILuglYTsR5P99Ro.ryqObtHCZaKTTc8mD6BMhjYa46z/7mq', 1740389680, 'user.png', 1, NULL, 'REGBLK2401003'),
(295, 'Lina Sari', 'REGBLK2401002', 'lina.sari@outlook.com', '087654123890', 'peserta', '$2y$10$KX.DmyBJ4kr4d5MeS43s9ufhJwh30RGAusmyNlB5Wo81R67/ZdSZK', 1740389680, 'user.png', 1, NULL, 'REGBLK2401002'),
(296, 'Kiki Ramadhan', 'REGBLK2401001', 'kiki.ramadhan@gmail.com', '082345679012', 'peserta', '$2y$10$Y1ytpEiEgbL8glzMxz.jp.9a52GgDo1L1fZ6TSZLCVa0A3HxHBMoe', 1740389680, 'user.png', 1, NULL, 'REGBLK2401001'),
(297, 'Joko Sunaryo', 'REGBLK2401000', 'joko.sunaryo@yahoo.com', '081234569876', 'peserta', '$2y$10$qC816mxbLiAlVzd7hGKiVObNhr5V1M7ySx2KpBJOgfyItLRofUymC', 1740389681, 'user.png', 1, NULL, 'REGBLK2401000'),
(298, 'Indah Lestari', 'REGBLK2400999', 'indah.lestari@outlook.com', '085765780912', 'peserta', '$2y$10$A6Hgs9K9h07K9ef89bLeHOi7avydAp/GElG7anO5KEZcHrJzed3au', 1740389681, 'user.png', 1, NULL, 'REGBLK2400999'),
(299, 'Heri Setiawan', 'REGBLK2400998', 'heri.setiawan@email.com', '089836523490', 'peserta', '$2y$10$8x9.2E0ODcWKyxZBYuh5b.ri0ucWQQXZGp.51LTfz.Ya3Idx3I7LW', 1740389682, 'user.png', 1, NULL, 'REGBLK2400998'),
(300, 'Gina Kurnia', 'REGBLK2400997', 'gina.kurnia@outlook.com', '087654123456', 'peserta', '$2y$10$LRPPzIIvleLjDSXNaA54ful8bohKBky.NYjcak8ndC9tyb4jOJ3ZC', 1740389682, 'user.png', 1, NULL, 'REGBLK2400997'),
(301, 'Fajar Hidayat', 'REGBLK2400996', 'fajar.hidayat@gmail.com', '081276543290', 'peserta', '$2y$10$KSGe.1ESyeQAGys.wSoAReEN2e8O8kpa/MHLc/vdQxVnjdCoMWSBq', 1740389682, 'user.png', 1, NULL, 'REGBLK2400996'),
(302, 'Eka Suryani', 'REGBLK2400995', 'eka.suryani@yahoo.com', '082345678921', 'peserta', '$2y$10$Q67F0lJacLxpViZrSB0yfu72AQnIHFAoaczW1pToN4vMsSURCQ8Mq', 1740389682, 'user.png', 1, NULL, 'REGBLK2400995'),
(303, 'Dian Prasetyo', 'REGBLK2400994', 'dian.prasetyo@outlook.com', '085765432198', 'peserta', '$2y$10$FakHwGfIOMcYmombcs8e4OTArl2ic8au17hxIIiLF1zxi6FomzqIm', 1740389682, 'user.png', 1, NULL, 'REGBLK2400994'),
(304, 'Citra Dewi', 'REGBLK2400993', 'citra.dewi@gmail.com', '081234567890', 'peserta', '$2y$10$xpxZxkNZmAAVzFFclYtBNOs1uyP/gFc.GCM6M0xqQ8bc/.a00po6S', 1740389683, 'user.png', 1, NULL, 'REGBLK2400993'),
(305, 'Dita Pertiwi', 'REGBLK2400992', 'dita.pertiwi@outlook.com', '085612345678', 'peserta', '$2y$10$zj5jK/50fEiFVls/nzFuMuxB7.xiMi6eCeLQ7WwcVD97FVL/CJaXu', 1740389683, 'user.png', 1, NULL, 'REGBLK2400992'),
(306, 'Agus Setiawan', 'REGBLK2400991', 'agus.setiawan@mail.com', '089876543210', 'peserta', '$2y$10$7QLCwsHQLt3YkwkCFc7J2ekP8mGGL/qaQ7CvVd9Zri7NUNQZfQa.O', 1740389683, 'user.png', 1, NULL, 'REGBLK2400991'),
(307, 'Rina Sari', 'REGBLK2400990', 'rina.sari@gmail.com', '081234567890', 'peserta', '$2y$10$cCPkuG7Rz.Frj6zURcu58u7OUEjfADsJ1WI35AJEI85nQqAwCJAzO', 1740389683, 'user.png', 1, NULL, 'REGBLK2400990'),
(308, 'Maya Putri', 'REGBLK2400988', 'maya.putri@yahoo.com', '087654238905', 'peserta', '$2y$10$x3V6NDb0FTr1EuD0HRWcWOFeMdgqS.hJzxmcDBnBPsHbBXG8dNSXq', 1740389683, 'user.png', 1, NULL, 'REGBLK2400988'),
(309, 'Budi Santoso', 'REGBLK2400987', 'budi.santoso@outlook.com', '085765782347', 'peserta', '$2y$10$qv730EmXnVh07uHTk05.6O2StD.pqCqNo40AgwTGCQ.a/6mboFUHy', 1740389683, 'user.png', 1, NULL, 'REGBLK2400987'),
(310, 'Andi Wijaya', 'REGBLK2400986', 'andi.wijaya@email.com', '089836524556', 'peserta', '$2y$10$.xxGH9oKhZtXuUeV1bRYa.murm69UtKsd6L4ZbZlKTpmL6qADvx92', 1740389684, 'user.png', 1, NULL, 'REGBLK2400986'),
(311, 'Niken Salindry', 'REGBLK2400989', 'niken@gmail.com', '085678085678', 'peserta', '$2y$10$ra.I/hhPeO64agBCMSrOy.4mBHNzjKfysYZuwIziAR92aF9lXZj9m', 1740389684, 'user.png', 1, NULL, 'REGBLK2400989'),
(312, 'Satya Kirana', 'REGBLK2400985', 'satya@gmail.com', '087654096745', 'peserta', '$2y$10$TKngkRvYeXSfaGZHPs27KOJubdWjHMaHl3jhefi7mv6UufgdUyx3G', 1740389684, 'user.png', 1, NULL, 'REGBLK2400985'),
(313, 'Freya Tamaya', 'REGBLK2400984', 'freya@gmail.com', '087654090906', 'peserta', '$2y$10$0uFu0OzgQvuP4L6d5HRFSOKs8W/FNvrJMeuPrZCixOA8m/KQr74sy', 1740389684, 'user.png', 1, NULL, 'REGBLK2400984'),
(314, 'Giofani Jevan', 'REGBLK2400983', 'gion@gmail.com', '087654231278', 'peserta', '$2y$10$3q8ZY3Kk2ShUX6gDZm7RT.CSAdGm8rFtvTmHax.vGZp2GON7SVHFC', 1740389685, 'user.png', 1, NULL, 'REGBLK2400983'),
(315, 'Fian Narendra', 'REGBLK2400982', 'fia.na@gmail.com', '085765782345', 'peserta', '$2y$10$JEUej0B4y4/l/Inue8iWO.ZgDJBSVM2pfMoY0INz7kw.HL.6wX1j.', 1740389685, 'user.png', 1, NULL, 'REGBLK2400982'),
(316, 'Dias Parker', 'REGBLK2400981', 'dias.p@gmail.com', '089836528399', 'peserta', '$2y$10$xEXdOm1kRaXp5ThtWiL.r.pFIHScf1Wcoh.ueSd7zeKo3K2zk0Mdi', 1740389685, 'user.png', 1, NULL, 'REGBLK2400981'),
(318, 'Nawang Alan Andrian', 'admin', 'admin@gmail.com', '085678087821', 'admin', '$2y$10$H4WmGXZHT.Uhrs7VDGyzJe/0Ge9XDpvOdIdg5/LGu6u8rhmdlaISW', 1741077311, 'user.png', 1, NULL, '123'),
(319, 'Nawang Alan Andrian', 'REGBLK2400100', 'nawangandrian@gmail.com', '085678087821', 'peserta', '$2y$10$jf996XFFdPh3dmaGfvuMIeuk3v/c5E9LA5Czh7BTlBKZ/vbzJeThm', 1741269585, 'user.png', 1, 'be3f07938fad9338404339d15f3eb1d2e33db0701033e566a0023c25ca271ca8', 'REGBLK2400100'),
(323, 'Nawang Andrian', 'REGBLK2400101', 'andrian.wang127@gmail.com', '085865317821', 'peserta', '$2y$10$vgjSyN7gjHtEXVhzY2Md/OGwtivF9Y4Lt1OvzSrnSRcGYGaAv8bt.', 1741315202, 'user.png', 1, '996abc34ae4d4d91833e808be82eae2ed4d788c966ed81cdfac58c233af9194f', 'REGBLK2400101'),
(337, 'Dinda Nurjanah', 'REGBLK2400103', 'nawangandrian3@gmail.com', '085678901234', 'peserta', '$2y$10$7ywPkxDNgiw53Wlm8tXn4eVgQ3lDuxB.r08ghROw/DcyhF3OeiCa6', 1745676594, 'user.png', 1, 'c2edb5d2368dc0127a1b6aa3c8b231fc9d81b400671d39668e51218877b544e5', 'REGBLK2400103'),
(338, 'Wildan Salim', 'REGBLK2400104', 'nawangandrian@gmail.com', '081234567890', 'peserta', '$2y$10$nnAG54l7plf4.ZD.FLdbPOjroTp9sNKRnA2yPsFIu/R1/HaLpoF3C', 1745676594, 'user.png', 1, '96de85fcd610c692f185dd798f7aa0dcf95df24c242b70fdc24bca09db357821', 'REGBLK2400104'),
(339, 'Nawang Alan', 'REGBLK2400102', 'nawangandrian1@gmail.com', '085678087821', 'peserta', '$2y$10$3T3GE3i8uQtMvS5Ag7l1tejnfBNznhL4/dNaikfDG8inDPeYnFSGi', 1745676700, 'user.png', 1, '107ba417483426aa3d1002e9a8a9b1c9a5dae1293cd8a144b9aa5ebe798954d3', 'REGBLK2400102');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrasi`
--
ALTER TABLE `administrasi`
  ADD PRIMARY KEY (`id_administrasi`),
  ADD UNIQUE KEY `nip_administrasi` (`nip_administrasi`);

--
-- Indexes for table `benarsalah`
--
ALTER TABLE `benarsalah`
  ADD PRIMARY KEY (`id_benarsalah`),
  ADD KEY `benarsalah_ibfk_1` (`soal_id`);

--
-- Indexes for table `exam_status`
--
ALTER TABLE `exam_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ujian_id` (`ujian_id`);

--
-- Indexes for table `hasil_pengetahuan`
--
ALTER TABLE `hasil_pengetahuan`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `ibfk_hasil_1` (`peserta_id`);

--
-- Indexes for table `hasil_seleksi`
--
ALTER TABLE `hasil_seleksi`
  ADD PRIMARY KEY (`id_hasil_seleksi`),
  ADD KEY `seleksi_ibfk_1` (`pelatihan_id`),
  ADD KEY `seleksi_ibfk_2` (`peserta_id`),
  ADD KEY `seleksi_ibfk_3` (`pengetahuan_hasil_id`),
  ADD KEY `seleksi_ibfk_4` (`wawancara_hasil_id`);

--
-- Indexes for table `hasil_wawancara`
--
ALTER TABLE `hasil_wawancara`
  ADD PRIMARY KEY (`id_wawancara`),
  ADD KEY `ibfk_wawancara_1` (`peserta_id`);

--
-- Indexes for table `jawaban_sementara`
--
ALTER TABLE `jawaban_sementara`
  ADD PRIMARY KEY (`id_jawab`);

--
-- Indexes for table `jawaban_wawancara`
--
ALTER TABLE `jawaban_wawancara`
  ADD PRIMARY KEY (`id_jawaban_wawancara`);

--
-- Indexes for table `kepala_blk`
--
ALTER TABLE `kepala_blk`
  ADD PRIMARY KEY (`id_kepala_blk`),
  ADD UNIQUE KEY `nip_kepala_blk` (`nip_kepala_blk`);

--
-- Indexes for table `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD PRIMARY KEY (`id_pelatihan`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`),
  ADD UNIQUE KEY `nip_peserta` (`nip_peserta`),
  ADD KEY `id_kelas` (`pelatihan_id`);

--
-- Indexes for table `pilgan`
--
ALTER TABLE `pilgan`
  ADD PRIMARY KEY (`id_pilgan`),
  ADD KEY `fk_soal_id` (`soal_id`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `fk_ujian_id` (`ujian_id`);

--
-- Indexes for table `soal_wawancara`
--
ALTER TABLE `soal_wawancara`
  ADD PRIMARY KEY (`id_soal_wawancara`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id_ujian`),
  ADD KEY `ujian_ibfk_1` (`pelatihan_id`);

--
-- Indexes for table `uraian`
--
ALTER TABLE `uraian`
  ADD PRIMARY KEY (`id_uraian`),
  ADD KEY `uraian_ibfk_1` (`soal_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrasi`
--
ALTER TABLE `administrasi`
  MODIFY `id_administrasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `benarsalah`
--
ALTER TABLE `benarsalah`
  MODIFY `id_benarsalah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `exam_status`
--
ALTER TABLE `exam_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `hasil_pengetahuan`
--
ALTER TABLE `hasil_pengetahuan`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `hasil_seleksi`
--
ALTER TABLE `hasil_seleksi`
  MODIFY `id_hasil_seleksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `hasil_wawancara`
--
ALTER TABLE `hasil_wawancara`
  MODIFY `id_wawancara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `jawaban_sementara`
--
ALTER TABLE `jawaban_sementara`
  MODIFY `id_jawab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1026;

--
-- AUTO_INCREMENT for table `jawaban_wawancara`
--
ALTER TABLE `jawaban_wawancara`
  MODIFY `id_jawaban_wawancara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=391;

--
-- AUTO_INCREMENT for table `kepala_blk`
--
ALTER TABLE `kepala_blk`
  MODIFY `id_kepala_blk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelatihan`
--
ALTER TABLE `pelatihan`
  MODIFY `id_pelatihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;

--
-- AUTO_INCREMENT for table `pilgan`
--
ALTER TABLE `pilgan`
  MODIFY `id_pilgan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=327;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `soal_wawancara`
--
ALTER TABLE `soal_wawancara`
  MODIFY `id_soal_wawancara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `uraian`
--
ALTER TABLE `uraian`
  MODIFY `id_uraian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=340;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `benarsalah`
--
ALTER TABLE `benarsalah`
  ADD CONSTRAINT `benarsalah_ibfk_1` FOREIGN KEY (`soal_id`) REFERENCES `soal` (`id_soal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam_status`
--
ALTER TABLE `exam_status`
  ADD CONSTRAINT `exam_status_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `exam_status_ibfk_2` FOREIGN KEY (`ujian_id`) REFERENCES `ujian` (`id_ujian`);

--
-- Constraints for table `hasil_pengetahuan`
--
ALTER TABLE `hasil_pengetahuan`
  ADD CONSTRAINT `ibfk_hasil_1` FOREIGN KEY (`peserta_id`) REFERENCES `peserta` (`id_peserta`);

--
-- Constraints for table `hasil_seleksi`
--
ALTER TABLE `hasil_seleksi`
  ADD CONSTRAINT `seleksi_ibfk_1` FOREIGN KEY (`pelatihan_id`) REFERENCES `pelatihan` (`id_pelatihan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seleksi_ibfk_2` FOREIGN KEY (`peserta_id`) REFERENCES `peserta` (`id_peserta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seleksi_ibfk_3` FOREIGN KEY (`pengetahuan_hasil_id`) REFERENCES `hasil_pengetahuan` (`id_hasil`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seleksi_ibfk_4` FOREIGN KEY (`wawancara_hasil_id`) REFERENCES `hasil_wawancara` (`id_wawancara`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hasil_wawancara`
--
ALTER TABLE `hasil_wawancara`
  ADD CONSTRAINT `ibfk_wawancara_1` FOREIGN KEY (`peserta_id`) REFERENCES `peserta` (`id_peserta`);

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_ibfk_1` FOREIGN KEY (`pelatihan_id`) REFERENCES `pelatihan` (`id_pelatihan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pilgan`
--
ALTER TABLE `pilgan`
  ADD CONSTRAINT `fk_soal_id` FOREIGN KEY (`soal_id`) REFERENCES `soal` (`id_soal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `fk_ujian_id` FOREIGN KEY (`ujian_id`) REFERENCES `ujian` (`id_ujian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ujian`
--
ALTER TABLE `ujian`
  ADD CONSTRAINT `ujian_ibfk_1` FOREIGN KEY (`pelatihan_id`) REFERENCES `pelatihan` (`id_pelatihan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `uraian`
--
ALTER TABLE `uraian`
  ADD CONSTRAINT `uraian_ibfk_1` FOREIGN KEY (`soal_id`) REFERENCES `soal` (`id_soal`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
