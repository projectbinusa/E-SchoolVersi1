-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2024 at 04:25 AM
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
-- Database: `test_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `mapel` varchar(255) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `ttl` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nama`, `nip`, `mapel`, `kelas_id`, `ttl`) VALUES
(1, 'Muh. Miftah, M. Pd.', '19680323 199103 1 010', NULL, NULL, 'Semarang'),
(2, 'Darto, S.Pd', '19660829 199003 1 006', 'IPA 9 ABCD, Informatika 7 ABC', 8, 'Semarang'),
(3, 'Drs. Tantri Santoso', '19660822 200003 1 003  ', 'Matematika 7 ABC dan 8 AB', 3, 'Semarang'),
(4, 'Endang Mahmudah, S.Pd', '19700220 199203 2 008 ', 'Matematika 9 ABCD dan 8 C, PPKn 7 AB', 10, 'Semarang'),
(5, 'Johan Wahyudi, M.Pd', '19720804 199903 1 008 ', 'Bhs. Indonesia 7 ABC dan 8 C, PPKn 8 A', 6, 'Semarang'),
(6, 'Supriyati, S.Pd', '19740819 200003 2 002 ', 'Bhs. Indonesia 9 ABCD, PPKn 8 BC', 7, 'Kendal'),
(7, 'Tatang Johani Asfari, S.Pd', '19720622 200012 1 003 ', 'IPA 7 ABC, Informatika 8 ABC', 1, 'Kendal'),
(8, 'Wiwik Asih P, S.Pd', '19750430 200012 2 005', 'IPA 8 ABC, PPKn 9 AB', 4, 'Kendal'),
(9, 'Evi Dwi Suryani, SS', '19830308 200903 2 004', 'Bhs. Inggris 7 ABC', NULL, 'Kendal'),
(10, 'Sri Murni Wijayanti, S.Pd', '19790428 200903 2 002', 'BK 7 ABC, 8 ABC dan 9 ABCD', 2, 'Magelang'),
(11, 'Dwys Apga Kartiyanto, S.Pd', '19830421 200903 1 009', 'Seni Budaya 7 ABC, 8 ABC dan 9 ABCD, PPKn 7 C', NULL, 'Jambi'),
(12, 'Nihayatul Chasanah, S.S', '19830824 200903 2 006', 'Bhs. Jawa 7 ABC, 8 ABC dan 9 ABCD', NULL, 'Palembang'),
(13, 'Kistantini, S.Si', '19780222 200603 2 002', 'IPS 7 ABC, 8 ABC dan 9 ABCD', NULL, 'Wonosobo'),
(14, 'Tein Maimunah, S.Pd', '19720303 200701 2 020', 'Bhs. Inggris 9 ABCD dan 8 ABC, PPKn 9 CD', NULL, 'Wonosobo'),
(15, 'Muhammad Abdul Rokhim, S.Pd', '19901210 202012 1 010', 'Penjas Orkes 7 ABC, 8 ABC dan 9 ABCD', NULL, 'Wonosobo'),
(16, 'Dwi Widiyastuti, S.Ag ', '19730405 202121 2 006', 'PAI 7 ABC, 8 ABC, 9 ABCD', 5, 'Surakarta'),
(17, 'Endang Kristini, S.Pd', '19690527 202121 2 002', 'Bhs. Indonesia 8 AB, Prakarya 9 ABCD', 9, 'Surakarta'),
(18, 'Drs. Sriyanto A P', '19630721 200003 1 002', 'PKn  7 ABC, 8 ABC dan 9 ABCD', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kbm`
--

CREATE TABLE `kbm` (
  `id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `jam_masuk` datetime DEFAULT NULL,
  `jam_selesai` datetime DEFAULT NULL,
  `materi` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran_siswa`
--

CREATE TABLE `kehadiran_siswa` (
  `presensi_id` int(11) NOT NULL,
  `keterangan` enum('Bolos','Izin','Sakit') DEFAULT NULL,
  `siswa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kehadiran_siswa`
--

INSERT INTO `kehadiran_siswa` (`presensi_id`, `keterangan`, `siswa_id`) VALUES
(1, 'Sakit', 1),
(2, 'Sakit', 48),
(2, 'Izin', 49),
(2, 'Bolos', 50),
(3, 'Izin', 24),
(3, 'Izin', 25),
(3, 'Izin', 26),
(3, 'Izin', 27),
(3, 'Izin', 28),
(4, 'Izin', 70),
(5, 'Bolos', 101),
(6, 'Bolos', 132),
(7, 'Bolos', 163),
(8, 'Bolos', 187),
(9, 'Bolos', 212),
(10, 'Bolos', 237);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama`) VALUES
(1, '7 A'),
(2, '7 B'),
(3, '7 C'),
(4, '8 A'),
(5, '8 B'),
(6, '8 C'),
(7, '9 A'),
(8, '9 B'),
(9, '9 C'),
(10, '9 D');

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id`, `tanggal`, `kelas_id`) VALUES
(1, '2024-03-25', 1),
(2, '2024-03-25', 3),
(3, '2024-03-25', 2),
(4, '2024-03-25', 4),
(5, '2024-03-25', 5),
(6, '2024-03-25', 6),
(7, '2024-03-25', 7),
(8, '2024-03-25', 8),
(9, '2024-03-25', 9),
(10, '2024-03-25', 10),
(11, '2024-03-25', NULL),
(12, '2024-03-26', NULL),
(13, '2024-03-26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `nama`) VALUES
(1, 'admin'),
(2, 'guru');

-- --------------------------------------------------------

--
-- Table structure for table `sikap`
--

CREATE TABLE `sikap` (
  `id` int(11) NOT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `guru_id` int(11) DEFAULT NULL,
  `penilaian` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama_siswa` varchar(255) DEFAULT NULL,
  `nisn` varchar(255) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `ttl` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama_siswa`, `nisn`, `kelas_id`, `ttl`) VALUES
(1, 'Adib Machrus', '3057', 1, NULL),
(2, 'Affandi Wildan Pratama', '3058', 1, NULL),
(3, 'Afrilia Agustin', '3059', 1, NULL),
(4, 'Agus Bakti Widodo', '3060', 1, NULL),
(5, 'Ahmad Rava Ardiansyah', '3061', 1, NULL),
(6, 'Airin', '3062', 1, NULL),
(7, 'Aji Sukma Jati', '3063', 1, NULL),
(8, 'Alung Vandiogana', '3064', 1, NULL),
(9, 'Anita Rahayu Sifitri', '3065', 1, NULL),
(10, 'Aprita Regina Putri', '3066', 1, NULL),
(11, 'Atnandhika Laksana', '3067', 1, NULL),
(12, 'Aurel Eka Ramdani', '3068', 1, NULL),
(13, 'Ayup Hendra Saputra', '3069', 1, NULL),
(14, 'Azzahra Zulaikha Nikmatulloh', '3070', 1, NULL),
(15, 'Bagas Fathul Ramadhan', '3071', 1, NULL),
(16, 'Bintang Agustin', '3072', 1, NULL),
(17, 'Bintang Cahaya Mayasyafana', '3073', 1, NULL),
(18, 'Brian Afiansyah Rezie Apriano', '3074', 1, NULL),
(19, 'Byaz Putra Ramaditya Riyanto', '3075', 1, NULL),
(20, 'Chinta Dewi Lestari', '3076', 1, NULL),
(21, 'Daniel Mahendaru', '3077', 1, NULL),
(22, 'Dwi Cahyo Utomo', '3078', 1, NULL),
(23, 'Fauziyyah Ghaida Noshelly', '3080', 1, NULL),
(24, 'Ghezza Ardhanta Abhinaya', '3084', 2, NULL),
(25, 'Ibnu Zakky Saputra', '3085', 2, NULL),
(26, 'Ilham Andi Kusuma', '3086', 2, NULL),
(27, 'Ilham Rasyid Putra Juliansah', '3087', 2, NULL),
(28, 'Iqbal Rasya Bakhtiar', '3088', 2, NULL),
(29, 'Irfan Kurniawan', '3089', 2, NULL),
(30, 'Jeni Olivia Ramadani', '3090', 2, NULL),
(31, 'Kafa Ardana Putra', '3091', 2, NULL),
(32, 'Kezia Omega Renata', '3092', 2, NULL),
(33, 'Khoirul Huda', '3093', 2, NULL),
(34, 'Lailatul Mardhiyah', '3094', 2, NULL),
(35, 'Lutfi Sulistiyaning Cahyo Nur Sejati', '3095', 2, NULL),
(36, 'Mirza Wahyu Putra Priyana', '3096', 2, NULL),
(37, 'Muh Fajar Bayu Saputro', '3097', 2, NULL),
(38, 'Muhamad Rafi Risqulah', '3098', 2, NULL),
(39, 'Muhammad Evan Dwi Saputra', '3099', 2, NULL),
(40, 'Muhammad Fathan Alfarizi', '3100', 2, NULL),
(41, 'Muhammad Fikri Abdullah', '3101', 2, NULL),
(42, 'Nabila Laila Ramadhani', '3104', 2, NULL),
(43, 'Nadila Anna Tasya', '3105', 2, NULL),
(44, 'Nur Indah Devita Sari', '3106', 2, NULL),
(45, 'Oktaviana Soninda Dwi Nova', '3107', 2, NULL),
(46, 'Rahma Diana', '3109', 2, NULL),
(47, 'Zidnii Dhiyaul Auliyah', '3125', 2, NULL),
(48, 'Fajar Tri Atmojo', '3079', 3, NULL),
(49, 'Firmansyah', '3081', 3, NULL),
(50, 'Frendy Hendrawan Wijaya', '3082', 3, NULL),
(51, 'Fristco Alvian Juliansyah', '3083', 3, NULL),
(52, 'Muhammad Guntur Pamungkas', '3102', 3, NULL),
(53, 'Muhtadi Asnun', '3103', 3, NULL),
(54, 'Radithya Azka Permana Putra', '3108', 3, NULL),
(55, 'Ravael Putra Bachtiyan', '3110', 3, NULL),
(56, 'Reditha Ayu Putri Setiawan', '3111', 3, NULL),
(57, 'Ryan Gunawan', '3112', 3, NULL),
(58, 'Sabrina Lutfia Gassania', '3113', 3, NULL),
(59, 'Sehat Maidika', '3114', 3, NULL),
(60, 'Septa Adytama', '3115', 3, NULL),
(61, 'Siti Nur Hatimah', '3116', 3, NULL),
(62, 'Syafa Andara Kaifa Putri', '3117', 3, NULL),
(63, 'Syifa Fauziah', '3118', 3, NULL),
(64, 'Valentino Putra Pradani', '3119', 3, NULL),
(65, 'Vian Octa Saputri', '3120', 3, NULL),
(66, 'Vicko Aji Pratama', '3121', 3, NULL),
(67, 'Yulianti Agustin', '3122', 3, NULL),
(68, 'Zafira Surya Putri', '3123', 3, NULL),
(69, 'Zahwa Bagus Febriyanto', '3124', 3, NULL),
(70, 'Alfian Dwi Saputro', '2961', 4, NULL),
(71, 'Alfin Rakha Atmaja', '2967', 4, NULL),
(72, 'Alisa Riski Yani', '2965', 4, NULL),
(73, 'Alvin Cahya Putra', '2966', 4, NULL),
(74, 'Bagus Gangga Pabregas', '2977', 4, NULL),
(75, 'Desta Saputra', '2982', 4, NULL),
(76, 'Eni Widiyanti', '2986', 4, NULL),
(77, 'Erzha Gifari Nugroho', '2988', 4, NULL),
(78, 'Ilham Dwi Armanto', '2994', 4, NULL),
(79, 'Javiro David Sriyono', '2995', 4, NULL),
(80, 'Kelvin Winata', '3002', 4, NULL),
(81, 'Khusnul Khotimah', '3004', 4, NULL),
(82, 'Kurnia Fitri Anjani', '3055', 4, NULL),
(83, 'Merlina Nur\'Aini ', '3006', 4, NULL),
(84, 'Mifta Angelina Putri Wibowo', '3007', 4, NULL),
(85, 'Monika Putri Nur Janah', '3009', 4, NULL),
(86, 'Muhamad Furqon', '3010', 4, NULL),
(87, 'Muhammad Fauzan Nashir', '3011', 4, NULL),
(88, 'Muhammad Rafli Adinata', '3013', 4, NULL),
(89, 'Muhammad Ulin Nuha', '3014', 4, NULL),
(90, 'Musyafa Naufal Rizki', '3017', 4, NULL),
(91, 'Nabila', '3126', 4, NULL),
(92, 'Niken Amelia Dwi Maharani', '3020', 4, NULL),
(93, 'Nindira Salsabila', '3021', 4, NULL),
(94, 'Oktavia Nur Aini', '3052', 4, NULL),
(95, 'Puji Jaya Lestari', '3022', 4, NULL),
(96, 'Rahma Azzahra Dzulaikha', '3025', 4, NULL),
(97, 'Rasyid Aryasatya Natama', '3027', 4, NULL),
(98, 'Satria Alamsyah Putra', '3034', 4, NULL),
(99, 'Shaskya Jelita Putri Ernanda', '3037', 4, NULL),
(100, 'Shofia Dwi Muwardiana', '3038', 4, NULL),
(101, 'Abullah Assidiq', '2959', 5, NULL),
(102, 'Alfiansyah Pratama', '2962', 5, NULL),
(103, 'Alifia Azzahra', '2964', 5, NULL),
(104, 'Alvino Pranata Putra', '2968', 5, NULL),
(105, 'Amelia Sintia Novitasari', '2970', 5, NULL),
(106, 'Andini Nailah Paramita', '2972', 5, NULL),
(107, 'Arif Tri Gunawan', '2973', 5, NULL),
(108, 'Arletta Langit Azzarine', '2974', 5, NULL),
(109, 'Aulia Kanindita Kirana', '2975', 5, NULL),
(110, 'Eriko Setyawan', '2987', 5, NULL),
(111, 'Farel Aldiansyah Fahreza', '2990', 5, NULL),
(112, 'Fauzia Dwi Anisa', '2991', 5, NULL),
(113, 'Fawwaz Akbar Pratama', '2992', 5, NULL),
(114, 'Ilham Aldiansyah Putra', '2993', 5, NULL),
(115, 'Juanita Rohanda', '2996', 5, NULL),
(116, 'Kanaya Suci Larasati', '2999', 5, NULL),
(117, 'Keisya Syifa Nurfitria', '3000', 5, NULL),
(118, 'Kharisma Oktaviani', '3003', 5, NULL),
(119, 'Kiki Hermawan', '3005', 5, NULL),
(120, 'Mitha Khairunnisa', '3008', 5, NULL),
(121, 'Muhammad Denis Dwi Prasetyo', '3054', 5, NULL),
(122, 'Najriel Ilham Anwar', '3018', 5, NULL),
(123, 'Najwa Eka Syahfitri', '3019', 5, NULL),
(124, 'Rafa Alka  Dailany', '3023', 5, NULL),
(125, 'Rafi Aulia Ryan Tama', '3024', 5, NULL),
(126, 'Rehan Ady Pratama', '3028', 5, NULL),
(127, 'Riko Wahyu Saputra', '3031', 5, NULL),
(128, 'Rizky Wahyu P.', '3032', 5, NULL),
(129, 'Sekar Dwi Larasati', '3036', 5, NULL),
(130, 'Vadila Nurul Hidayah', '3045', 5, NULL),
(131, 'Yulianda Candra', '3048', 5, NULL),
(132, 'Adinda Laila Nur Cahayani', '2960', 6, NULL),
(133, 'Alif Indrian Saputro', '2963', 6, NULL),
(134, 'Amelta Novi Labeebah', '2971', 6, NULL),
(135, 'Azalya Nurani', '2976', 6, NULL),
(136, 'Baihaki Asadil Alam', '2978', 6, NULL),
(137, 'Bayu Pambudi', '2979', 6, NULL),
(138, 'Chiko Ridho Setiawan', '2980', 6, NULL),
(139, 'Dani Saputri Fadlillah', '2981', 6, NULL),
(140, 'Dewi Mardiana', '2983', 6, NULL),
(141, 'Emiliana Setyo P.', '2984', 6, NULL),
(142, 'Enggar Fiqieh Hutama', '2985', 6, NULL),
(143, 'Enggel Purnama Sari', '3127', 6, NULL),
(144, 'Fakhrul Nurhidayat', '2989', 6, NULL),
(145, 'Julian Alfianto', '2997', 6, NULL),
(146, 'Kafka Putra Riyanto', '2998', 6, NULL),
(147, 'Kelvin Aditya Azka', '3001', 6, NULL),
(148, 'Muhammad` Galang Saputro', '3015', 6, NULL),
(149, 'Raka Adi Saputra', '3026', 6, NULL),
(150, 'Rehan Novi Putra Sadewa', '3029', 6, NULL),
(151, 'Rifa Bunga Rosiyana', '3030', 6, NULL),
(152, 'Safira Widiyawati', '3033', 6, NULL),
(153, 'Satria Isnan Maulizan', '3035', 6, NULL),
(154, 'Sholeh Bekti Saputro', '3039', 6, NULL),
(155, 'Sholihah Alfatikhatul Jannah', '3040', 6, NULL),
(156, 'Siti Sekar Tanjung', '3041', 6, NULL),
(157, 'Surya Darma Kusuma', '3050', 6, NULL),
(158, 'Suwantinah Setyaningrum', '3042', 6, NULL),
(159, 'Syifa Fauza Yuanita', '3043', 6, NULL),
(160, 'Syifa Mellanda', '3044', 6, NULL),
(161, 'Widagdo Mukti Pamungkas', '3046', 6, NULL),
(162, 'Yemima Alfa Renata', '3047', 6, NULL),
(163, 'Ananda Arif Romadhon', '2860', 7, NULL),
(164, 'Arif Nugroho', '2864', 7, NULL),
(165, 'Atsna Putri Ryaningsih', '2867', 7, NULL),
(166, 'Calysta Ayu Safitri', '2876', 7, NULL),
(167, 'Carista Ekayanti', '2877', 7, NULL),
(168, 'Davy Nur Permana', '2880', 7, NULL),
(169, 'Diva Riana', '2884', 7, NULL),
(170, 'Efara Ardinda Mulya Dewi', '2887', 7, NULL),
(171, 'Gilang Putra Septiawan', '2900', 7, NULL),
(172, 'Hario Muhammad Sungkono', '2901', 7, NULL),
(173, 'Kukuh Maulana Pratama', '2909', 7, NULL),
(174, 'Mirza Billy Arrasyid', '2913', 7, NULL),
(175, 'Muhamad Fathoni', '2914', 7, NULL),
(176, 'Muhammad Abdul Ro’Uf', '2915', 7, NULL),
(177, 'Ninda Rahmawati', '2922', 7, NULL),
(178, 'Novitasari Pratama', '2924', 7, NULL),
(179, 'Paolin Elga Saputri', '2925', 7, NULL),
(180, 'Prima Agung Yudistira', '2926', 7, NULL),
(181, 'Putri Purbosari', '2954', 7, NULL),
(182, 'Rafael Eka Putra Nurcahyo', '2927', 7, NULL),
(183, 'Rendi Nurdin Bahtiar', '2930', 7, NULL),
(184, 'Revaline Ayu Putri Waluyo', '2931', 7, NULL),
(185, 'Saskia Putri Rahmadani', '2938', 7, NULL),
(186, 'Septian Fajar Ramadhani', '2940', 7, NULL),
(187, 'Aditya Pratama', '2854', 8, NULL),
(188, 'Akbar Aprilio Dwianda', '2857', 8, NULL),
(189, 'Andreaz Mikhalkov', '2958', 8, NULL),
(190, 'Arya Dwi Erlangga', '2866', 8, NULL),
(191, 'Aura Try Dewi', '2868', 8, NULL),
(192, 'Chania Fahrany Choirunnisa', '2957', 8, NULL),
(193, 'Daffa Rafid Fadhullah', '2879', 8, NULL),
(194, 'Dika Mulya', '2881', 8, NULL),
(195, 'Diva Wibowo', '2885', 8, NULL),
(196, 'Ela Rusita', '2889', 8, NULL),
(197, 'Faiqoh Nisa Azzahra', '2893', 8, NULL),
(198, 'Galyh Mohammad  Ibrahim', '2898', 8, NULL),
(199, 'Ilham Faqih Dikrullah', '2902', 8, NULL),
(200, 'Kaysa Chaterina', '2905', 8, NULL),
(201, 'Khadijah Rahma Wati', '2907', 8, NULL),
(202, 'Kiana Tri Makarti', '2908', 8, NULL),
(203, 'Liofi Cika Abellia', '2911', 8, NULL),
(204, 'Muhammad Nayoko Seto', '2919', 8, NULL),
(205, 'Risma Pujiyanti', '2933', 8, NULL),
(206, 'Rizquloh Bahtiar Putra', '2934', 8, NULL),
(207, 'Safa Adinda Putri', '2936', 8, NULL),
(208, 'Vicky Ardiansyah', '2947', 8, NULL),
(209, 'Waliet Allatif', '2952', 8, NULL),
(210, 'Yoga Chua Dwi Pangga', '2949', 8, NULL),
(211, 'Yulia Citra ', '2950', 8, NULL),
(212, 'Adinda Tri Julia Rahmawati', '2853', 9, NULL),
(213, 'Alexsa Fajriyati', '2858', 9, NULL),
(214, 'Arhansyah', '2863', 9, NULL),
(215, 'Bagus Dwi Prasetyo', '2871', 9, NULL),
(216, 'Bagus Tian Arianto', '2872', 9, NULL),
(217, 'Bernando Ameysiah', '2873', 9, NULL),
(218, 'Bilqis Cahaya Madina', '2875', 9, NULL),
(219, 'Cheryl Andra Olita', '3056', 9, NULL),
(220, 'Choirullia Nur Asyifa', '2878', 9, NULL),
(221, 'Dimas Arya Pratama', '2882', 9, NULL),
(222, 'Dina Rahmadani', '2883', 9, NULL),
(223, 'Galang Putra Ramadhan', '2896', 9, NULL),
(224, 'Galih Suseta', '2899', 9, NULL),
(225, 'Keysa Rahmawati', '2906', 9, NULL),
(226, 'Lailatul Khoiriyah', '2910', 9, NULL),
(227, 'Melvin Winanta', '2912', 9, NULL),
(228, 'Muhammad Aken Satria Pratama', '2916', 9, NULL),
(229, 'Muhammad Alfiansyah', '2917', 9, NULL),
(230, 'Muhammad Nur Rizqi', '2920', 9, NULL),
(231, 'Rayhan Dwi Agusta', '2929', 9, NULL),
(232, 'Riska Oktavia', '2932', 9, NULL),
(233, 'Saskia Ainur Rohmah', '2937', 9, NULL),
(234, 'Satria Dewangga Desta Harya Pamungkas', '2939', 9, NULL),
(235, 'Shifa Amelia Kurniawati', '2941', 9, NULL),
(236, 'Sukma Nur Kamal', '2944', 9, NULL),
(237, 'Aditya Putra Pratama', '2855', 10, NULL),
(238, 'Afgan Reyhan Syah Putra', '2856', 10, NULL),
(239, 'Almira Nissa Salsabila', '2859', 10, NULL),
(240, 'Aprilia Nisa Khaerun Nada', '2862', 10, NULL),
(241, 'Arif Setiawan Nugroho', '2865', 10, NULL),
(242, 'Az-Zahra Meifa Syifa Unnisa', '2869', 10, NULL),
(243, 'Bagas Alviano Herlambang', '2870', 10, NULL),
(244, 'Betran Dewangga', '2874', 10, NULL),
(245, 'Doni Saputro', '2886', 10, NULL),
(246, 'Elsa Bekti Faradhina', '2890', 10, NULL),
(247, 'Enjelina Valentina Febiyana', '2891', 10, NULL),
(248, 'Fahrul Ramadhani', '2892', 10, NULL),
(249, 'Febi Sekar Lauren', '2894', 10, NULL),
(250, 'Firman Arip Fadila', '2895', 10, NULL),
(251, 'Galih Al Rabanu', '2897', 10, NULL),
(252, 'Kandha Nanang Bramantio', '2904', 10, NULL),
(253, 'Nayla Nur Akila', '2921', 10, NULL),
(254, 'Nova Aprelia', '2923', 10, NULL),
(255, 'Rafli Ahmad Fahrezi', '2928', 10, NULL),
(256, 'Rufail Tri Prabowo', '2935', 10, NULL),
(257, 'Shifa Zaskia Julianti', '2942', 10, NULL),
(258, 'Tegar Widi Maulana', '2945', 10, NULL),
(259, 'Vahra Juliana', '2946', 10, NULL),
(260, 'Wahyu Cahyo Saputro', '2948', 10, NULL),
(261, 'Zahra Fauzatun Nikmah', '2951', 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`, `role_id`) VALUES
(1, NULL, 'admin', '25d55ad283aa400af464c76d713c07ad', 1),
(2, 'miftah@gmail.com', 'Muh. Miftah, M. Pd.', '25d55ad283aa400af464c76d713c07ad', 2),
(3, 'darto@gmail.com', 'Darto, S.Pd', '25d55ad283aa400af464c76d713c07ad', 2),
(4, 'tantri@gmail.com', 'Drs. Tantri Santoso', '25d55ad283aa400af464c76d713c07ad', 2),
(5, 'endang@gmail.com', 'Endang Mahmudah, S.Pd', '25d55ad283aa400af464c76d713c07ad', 2),
(6, 'johan@gmail.com', 'Johan Wahyudi, M.Pd', '25d55ad283aa400af464c76d713c07ad', 2),
(7, 'suprianti@gmail.com', 'Supriyati, S.Pd', '25d55ad283aa400af464c76d713c07ad', 2),
(8, 'tatang@gmail.com', 'Tatang Johani Asfari, S.Pd', '25d55ad283aa400af464c76d713c07ad', 2),
(9, 'wiwik@gmai.com', 'Wiwik Asih P, S.Pd', '25d55ad283aa400af464c76d713c07ad', 2),
(10, 'evi@gmail.com', 'Evi Dwi Suryani, SS', '25d55ad283aa400af464c76d713c07ad', 2),
(11, 'sri@gmail.com', 'Sri Murni Wijayanti, S.Pd', '25d55ad283aa400af464c76d713c07ad', 2),
(12, 'dwys@gmail.com', 'Dwys Apga Kartiyanto, S.Pd', '25d55ad283aa400af464c76d713c07ad', 2),
(13, 'nihayatul@gmail.com', 'Nihayatul Chasanah, S.S', '25d55ad283aa400af464c76d713c07ad', 2),
(14, 'kristantini@gmail.com', 'Kistantini, S.Si', '25d55ad283aa400af464c76d713c07ad', 2),
(15, 'tein@gmail.com', 'Tein Maimunah, S.Pd', '25d55ad283aa400af464c76d713c07ad', 2),
(16, 'muhammad@gmail.com', 'Muhammad Abdul Rokhim, S.Pd', '25d55ad283aa400af464c76d713c07ad', 2),
(17, 'dwi@gmail.com', 'Dwi Widiyastuti, S.Ag ', '25d55ad283aa400af464c76d713c07ad', 2),
(18, 'endangkristini@gmail.com', 'Endang Kristini, S.Pd', '25d55ad283aa400af464c76d713c07ad', 2),
(19, 'sriyanto@gmail.com', 'Drs. Sriyanto A P', '25d55ad283aa400af464c76d713c07ad', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indexes for table `kbm`
--
ALTER TABLE `kbm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guru_id` (`guru_id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indexes for table `kehadiran_siswa`
--
ALTER TABLE `kehadiran_siswa`
  ADD PRIMARY KEY (`presensi_id`,`siswa_id`),
  ADD KEY `siswa_id` (`siswa_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sikap`
--
ALTER TABLE `sikap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_id` (`kelas_id`),
  ADD KEY `id_guru` (`guru_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_role` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kbm`
--
ALTER TABLE `kbm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sikap`
--
ALTER TABLE `sikap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`);

--
-- Constraints for table `kbm`
--
ALTER TABLE `kbm`
  ADD CONSTRAINT `kbm_ibfk_1` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`),
  ADD CONSTRAINT `kbm_ibfk_2` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`);

--
-- Constraints for table `kehadiran_siswa`
--
ALTER TABLE `kehadiran_siswa`
  ADD CONSTRAINT `kehadiran_siswa_ibfk_1` FOREIGN KEY (`presensi_id`) REFERENCES `presensi` (`id`),
  ADD CONSTRAINT `kehadiran_siswa_ibfk_2` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`);

--
-- Constraints for table `presensi`
--
ALTER TABLE `presensi`
  ADD CONSTRAINT `presensi_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`);

--
-- Constraints for table `sikap`
--
ALTER TABLE `sikap`
  ADD CONSTRAINT `sikap_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `sikap_ibfk_2` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
