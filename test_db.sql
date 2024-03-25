-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Mar 2024 pada 05.44
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

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
-- Struktur dari tabel `guru`
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
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id`, `nama`, `nip`, `mapel`, `kelas_id`, `ttl`) VALUES
(1, 'Muh. Miftah, M. Pd.', '19680323 199103 1 010', NULL, NULL, NULL),
(2, 'Darto, S.Pd', '19660829 199003 1 006', 'IPA 9 ABCD, Informatika 7 ABC', 8, NULL),
(3, 'Drs. Tantri Santoso', '19660822 200003 1 003  ', 'Matematika 7 ABC dan 8 AB', 3, NULL),
(4, 'Endang Mahmudah, S.Pd', '19700220 199203 2 008 ', 'Matematika 9 ABCD dan 8 C, PPKn 7 AB', 10, NULL),
(5, 'Johan Wahyudi, M.Pd', '19720804 199903 1 008 ', 'Bhs. Indonesia 7 ABC dan 8 C, PPKn 8 A', 6, NULL),
(6, 'Supriyati, S.Pd', '19740819 200003 2 002 ', 'Bhs. Indonesia 9 ABCD, PPKn 8 BC', 7, NULL),
(7, 'Tatang Johani Asfari, S.Pd', '19720622 200012 1 003 ', 'IPA 7 ABC, Informatika 8 ABC', 1, NULL),
(8, 'Wiwik Asih P, S.Pd', '19750430 200012 2 005', 'IPA 8 ABC, PPKn 9 AB', 4, NULL),
(9, 'Evi Dwi Suryani, SS', '19830308 200903 2 004', 'Bhs. Inggris 7 ABC', NULL, NULL),
(10, 'Sri Murni Wijayanti, S.Pd', '19790428 200903 2 002', 'BK 7 ABC, 8 ABC dan 9 ABCD', 2, NULL),
(11, 'Dwys Apga Kartiyanto, S.Pd', '19830421 200903 1 009', 'Seni Budaya 7 ABC, 8 ABC dan 9 ABCD, PPKn 7 C', NULL, NULL),
(12, 'Nihayatul Chasanah, S.S', '19830824 200903 2 006', 'Bhs. Jawa 7 ABC, 8 ABC dan 9 ABCD', NULL, NULL),
(13, 'Kistantini, S.Si', '19780222 200603 2 002', 'IPS 7 ABC, 8 ABC dan 9 ABCD', NULL, NULL),
(14, 'Tein Maimunah, S.Pd', '19720303 200701 2 020', 'Bhs. Inggris 9 ABCD dan 8 ABC, PPKn 9 CD', NULL, NULL),
(15, 'Muhammad Abdul Rokhim, S.Pd', '19901210 202012 1 010', 'Penjas Orkes 7 ABC, 8 ABC dan 9 ABCD', NULL, NULL),
(16, 'Dwi Widiyastuti, S.Ag ', '19730405 202121 2 006', 'PAI 7 ABC, 8 ABC, 9 ABCD', 5, NULL),
(17, 'Endang Kristini, S.Pd', '19690527 202121 2 002', 'Bhs. Indonesia 8 AB, Prakarya 9 ABCD', 9, NULL),
(18, 'Drs. Sriyanto A P', '19630721 200003 1 002', 'PKn  7 ABC, 8 ABC dan 9 ABCD', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kbm`
--

CREATE TABLE `kbm` (
  `id` int(11) NOT NULL,
  `jam_masuk` datetime DEFAULT NULL,
  `jam_selesai` datetime DEFAULT NULL,
  `materi` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kehadiran_siswa`
--

CREATE TABLE `kehadiran_siswa` (
  `presensi_id` int(11) NOT NULL,
  `keterangan` enum('Bolos','Izin','Sakit') DEFAULT NULL,
  `siswa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kelas`
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
-- Struktur dari tabel `presensi`
--

CREATE TABLE `presensi` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `nama`) VALUES
(1, 'admin'),
(2, 'guru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sikap`
--

CREATE TABLE `sikap` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) DEFAULT NULL,
  `guru_id` int(11) DEFAULT NULL,
  `penilaian` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama_siswa` varchar(255) DEFAULT NULL,
  `nisn` varchar(255) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `ttl` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nama_siswa`, `nisn`, `kelas_id`, `ttl`) VALUES
(1, 'Adib Machrus', NULL, 1, NULL),
(2, 'Affandi Wildan Pratama', NULL, 1, NULL),
(3, 'Afrilia Agustin', NULL, 1, NULL),
(4, 'Agus Bakti Widodo', NULL, 1, NULL),
(5, 'Ahmad Rava Ardiansyah', NULL, 1, NULL),
(6, 'Airin', NULL, 1, NULL),
(7, 'Aji Sukma Jati', NULL, 1, NULL),
(8, 'Alung Vandiogana', NULL, 1, NULL),
(9, 'Anita Rahayu Sifitri', NULL, 1, NULL),
(10, 'Aprita Regina Putri', NULL, 1, NULL),
(11, 'Atnandhika Laksana', NULL, 1, NULL),
(12, 'Aurel Eka Ramdani', NULL, 1, NULL),
(13, 'Ayup Hendra Saputra', NULL, 1, NULL),
(14, 'Azzahra Zulaikha Nikmatulloh', NULL, 1, NULL),
(15, 'Bagas Fathul Ramadhan', NULL, 1, NULL),
(16, 'Bintang Agustin', NULL, 1, NULL),
(17, 'Bintang Cahaya Mayasyafana', NULL, 1, NULL),
(18, 'Brian Afiansyah Rezie Apriano', NULL, 1, NULL),
(19, 'Byaz Putra Ramaditya Riyanto', NULL, 1, NULL),
(20, 'Chinta Dewi Lestari', NULL, 1, NULL),
(21, 'Daniel Mahendaru', NULL, 1, NULL),
(22, 'Dwi Cahyo Utomo', NULL, 1, NULL),
(23, 'Fauziyyah Ghaida Noshelly', NULL, 1, NULL),
(24, 'Ghezza Ardhanta Abhinaya', NULL, 2, NULL),
(25, 'Ibnu Zakky Saputra', NULL, 2, NULL),
(26, 'Ilham Andi Kusuma', NULL, 2, NULL),
(27, 'Ilham Rasyid Putra Juliansah', NULL, 2, NULL),
(28, 'Iqbal Rasya Bakhtiar', NULL, 2, NULL),
(29, 'Irfan Kurniawan', NULL, 2, NULL),
(30, 'Jeni Olivia Ramadani', NULL, 2, NULL),
(31, 'Kafa Ardana Putra', NULL, 2, NULL),
(32, 'Kezia Omega Renata', NULL, 2, NULL),
(33, 'Khoirul Huda', NULL, 2, NULL),
(34, 'Lailatul Mardhiyah', NULL, 2, NULL),
(35, 'Lutfi Sulistiyaning Cahyo Nur Sejati', NULL, 2, NULL),
(36, 'Mirza Wahyu Putra Priyana', NULL, 2, NULL),
(37, 'Muh Fajar Bayu Saputro', NULL, 2, NULL),
(38, 'Muhamad Rafi Risqulah', NULL, 2, NULL),
(39, 'Muhammad Evan Dwi Saputra', NULL, 2, NULL),
(40, 'Muhammad Fathan Alfarizi', NULL, 2, NULL),
(41, 'Muhammad Fikri Abdullah', NULL, 2, NULL),
(42, 'Nabila Laila Ramadhani', NULL, 2, NULL),
(43, 'Nadila Anna Tasya', NULL, 2, NULL),
(44, 'Nur Indah Devita Sari', NULL, 2, NULL),
(45, 'Oktaviana Soninda Dwi Nova', NULL, 2, NULL),
(46, 'Rahma Diana', NULL, 2, NULL),
(47, 'Zidnii Dhiyaul Auliyah', NULL, 2, NULL),
(48, 'Fajar Tri Atmojo', NULL, 3, NULL),
(49, 'Firmansyah', NULL, 3, NULL),
(50, 'Frendy Hendrawan Wijaya', NULL, 3, NULL),
(51, 'Fristco Alvian Juliansyah', NULL, 3, NULL),
(52, 'Muhammad Guntur Pamungkas', NULL, 3, NULL),
(53, 'Muhtadi Asnun', NULL, 3, NULL),
(54, 'Radithya Azka Permana Putra', NULL, 3, NULL),
(55, 'Ravael Putra Bachtiyan', NULL, 3, NULL),
(56, 'Reditha Ayu Putri Setiawan', NULL, 3, NULL),
(57, 'Ryan Gunawan', NULL, 3, NULL),
(58, 'Sabrina Lutfia Gassania', NULL, 3, NULL),
(59, 'Sehat Maidika', NULL, 3, NULL),
(60, 'Septa Adytama', NULL, 3, NULL),
(61, 'Siti Nur Hatimah', NULL, 3, NULL),
(62, 'Syafa Andara Kaifa Putri', NULL, 3, NULL),
(63, 'Syifa Fauziah', NULL, 3, NULL),
(64, 'Valentino Putra Pradani', NULL, 3, NULL),
(65, 'Vian Octa Saputri', NULL, 3, NULL),
(66, 'Vicko Aji Pratama', NULL, 3, NULL),
(67, 'Yulianti Agustin', NULL, 3, NULL),
(68, 'Zafira Surya Putri', NULL, 3, NULL),
(69, 'Zahwa Bagus Febriyanto', NULL, 3, NULL),
(70, 'Alfian Dwi Saputro', NULL, 4, NULL),
(71, 'Alfin Rakha Atmaja', NULL, 4, NULL),
(72, 'Alisa Riski Yani', NULL, 4, NULL),
(73, 'Alvin Cahya Putra', NULL, 4, NULL),
(74, 'Bagus Gangga Pabregas', NULL, 4, NULL),
(75, 'Desta Saputra', NULL, 4, NULL),
(76, 'Eni Widiyanti', NULL, 4, NULL),
(77, 'Erzha Gifari Nugroho', NULL, 4, NULL),
(78, 'Ilham Dwi Armanto', NULL, 4, NULL),
(79, 'Javiro David Sriyono', NULL, 4, NULL),
(80, 'Kelvin Winata', NULL, 4, NULL),
(81, 'Khusnul Khotimah', NULL, 4, NULL),
(82, 'Kurnia Fitri Anjani', NULL, 4, NULL),
(83, 'Merlina Nur\'Aini ', NULL, 4, NULL),
(84, 'Mifta Angelina Putri Wibowo', NULL, 4, NULL),
(85, 'Monika Putri Nur Janah', NULL, 4, NULL),
(86, 'Muhamad Furqon', NULL, 4, NULL),
(87, 'Muhammad Fauzan Nashir', NULL, 4, NULL),
(88, 'Muhammad Rafli Adinata', NULL, 4, NULL),
(89, 'Muhammad Ulin Nuha', NULL, 4, NULL),
(90, 'Musyafa Naufal Rizki', NULL, 4, NULL),
(91, 'Nabila', NULL, 4, NULL),
(92, 'Niken Amelia Dwi Maharani', NULL, 4, NULL),
(93, 'Nindira Salsabila', NULL, 4, NULL),
(94, 'Oktavia Nur Aini', NULL, 4, NULL),
(95, 'Puji Jaya Lestari', NULL, 4, NULL),
(96, 'Rahma Azzahra Dzulaikha', NULL, 4, NULL),
(97, 'Rasyid Aryasatya Natama', NULL, 4, NULL),
(98, 'Satria Alamsyah Putra', NULL, 4, NULL),
(99, 'Shaskya Jelita Putri Ernanda', NULL, 4, NULL),
(100, 'Shofia Dwi Muwardiana', NULL, 4, NULL),
(101, 'Abullah Assidiq', NULL, 5, NULL),
(102, 'Alfiansyah Pratama', NULL, 5, NULL),
(103, 'Alifia Azzahra', NULL, 5, NULL),
(104, 'Alvino Pranata Putra', NULL, 5, NULL),
(105, 'Amelia Sintia Novitasari', NULL, 5, NULL),
(106, 'Andini Nailah Paramita', NULL, 5, NULL),
(107, 'Arif Tri Gunawan', NULL, 5, NULL),
(108, 'Arletta Langit Azzarine', NULL, 5, NULL),
(109, 'Aulia Kanindita Kirana', NULL, 5, NULL),
(110, 'Eriko Setyawan', NULL, 5, NULL),
(111, 'Farel Aldiansyah Fahreza', NULL, 5, NULL),
(112, 'Fauzia Dwi Anisa', NULL, 5, NULL),
(113, 'Fawwaz Akbar Pratama', NULL, 5, NULL),
(114, 'Ilham Aldiansyah Putra', NULL, 5, NULL),
(115, 'Juanita Rohanda', NULL, 5, NULL),
(116, 'Kanaya Suci Larasati', NULL, 5, NULL),
(117, 'Keisya Syifa Nurfitria', NULL, 5, NULL),
(118, 'Kharisma Oktaviani', NULL, 5, NULL),
(119, 'Kiki Hermawan', NULL, 5, NULL),
(120, 'Mitha Khairunnisa', NULL, 5, NULL),
(121, 'Muhammad Denis Dwi Prasetyo', NULL, 5, NULL),
(122, 'Najriel Ilham Anwar', NULL, 5, NULL),
(123, 'Najwa Eka Syahfitri', NULL, 5, NULL),
(124, 'Rafa Alka  Dailany', NULL, 5, NULL),
(125, 'Rafi Aulia Ryan Tama', NULL, 5, NULL),
(126, 'Rehan Ady Pratama', NULL, 5, NULL),
(127, 'Riko Wahyu Saputra', NULL, 5, NULL),
(128, 'Rizky Wahyu P.', NULL, 5, NULL),
(129, 'Sekar Dwi Larasati', NULL, 5, NULL),
(130, 'Vadila Nurul Hidayah', NULL, 5, NULL),
(131, 'Yulianda Candra', NULL, 5, NULL),
(132, 'Adinda Laila Nur Cahayani', NULL, 6, NULL),
(133, 'Alif Indrian Saputro', NULL, 6, NULL),
(134, 'Amelta Novi Labeebah', NULL, 6, NULL),
(135, 'Azalya Nurani', NULL, 6, NULL),
(136, 'Baihaki Asadil Alam', NULL, 6, NULL),
(137, 'Bayu Pambudi', NULL, 6, NULL),
(138, 'Chiko Ridho Setiawan', NULL, 6, NULL),
(139, 'Dani Saputri Fadlillah', NULL, 6, NULL),
(140, 'Dewi Mardiana', NULL, 6, NULL),
(141, 'Emiliana Setyo P.', NULL, 6, NULL),
(142, 'Enggar Fiqieh Hutama', NULL, 6, NULL),
(143, 'Enggel Purnama Sari', NULL, 6, NULL),
(144, 'Fakhrul Nurhidayat', NULL, 6, NULL),
(145, 'Julian Alfianto', NULL, 6, NULL),
(146, 'Kafka Putra Riyanto', NULL, 6, NULL),
(147, 'Kelvin Aditya Azka', NULL, 6, NULL),
(148, 'Muhammad` Galang Saputro', NULL, 6, NULL),
(149, 'Raka Adi Saputra', NULL, 6, NULL),
(150, 'Rehan Novi Putra Sadewa', NULL, 6, NULL),
(151, 'Rifa Bunga Rosiyana', NULL, 6, NULL),
(152, 'Safira Widiyawati', NULL, 6, NULL),
(153, 'Satria Isnan Maulizan', NULL, 6, NULL),
(154, 'Sholeh Bekti Saputro', NULL, 6, NULL),
(155, 'Sholihah Alfatikhatul Jannah', NULL, 6, NULL),
(156, 'Siti Sekar Tanjung', NULL, 6, NULL),
(157, 'Surya Darma Kusuma', NULL, 6, NULL),
(158, 'Suwantinah Setyaningrum', NULL, 6, NULL),
(159, 'Syifa Fauza Yuanita', NULL, 6, NULL),
(160, 'Syifa Mellanda', NULL, 6, NULL),
(161, 'Widagdo Mukti Pamungkas', NULL, 6, NULL),
(162, 'Yemima Alfa Renata', NULL, 6, NULL),
(163, 'Ananda Arif Romadhon', NULL, 7, NULL),
(164, 'Arif Nugroho', NULL, 7, NULL),
(165, 'Atsna Putri Ryaningsih', NULL, 7, NULL),
(166, 'Calysta Ayu Safitri', NULL, 7, NULL),
(167, 'Carista Ekayanti', NULL, 7, NULL),
(168, 'Davy Nur Permana', NULL, 7, NULL),
(169, 'Diva Riana', NULL, 7, NULL),
(170, 'Efara Ardinda Mulya Dewi', NULL, 7, NULL),
(171, 'Gilang Putra Septiawan', NULL, 7, NULL),
(172, 'Hario Muhammad Sungkono', NULL, 7, NULL),
(173, 'Kukuh Maulana Pratama', NULL, 7, NULL),
(174, 'Mirza Billy Arrasyid', NULL, 7, NULL),
(175, 'Muhamad Fathoni', NULL, 7, NULL),
(176, 'Muhammad Abdul Ro’Uf', NULL, 7, NULL),
(177, 'Ninda Rahmawati', NULL, 7, NULL),
(178, 'Novitasari Pratama', NULL, 7, NULL),
(179, 'Paolin Elga Saputri', NULL, 7, NULL),
(180, 'Prima Agung Yudistira', NULL, 7, NULL),
(181, 'Putri Purbosari', NULL, 7, NULL),
(182, 'Rafael Eka Putra Nurcahyo', NULL, 7, NULL),
(183, 'Rendi Nurdin Bahtiar', NULL, 7, NULL),
(184, 'Revaline Ayu Putri Waluyo', NULL, 7, NULL),
(185, 'Saskia Putri Rahmadani', NULL, 7, NULL),
(186, 'Septian Fajar Ramadhani', NULL, 7, NULL),
(187, 'Aditya Pratama', NULL, 8, NULL),
(188, 'Akbar Aprilio Dwianda', NULL, 8, NULL),
(189, 'Andreaz Mikhalkov', NULL, 8, NULL),
(190, 'Arya Dwi Erlangga', NULL, 8, NULL),
(191, 'Aura Try Dewi', NULL, 8, NULL),
(192, 'Chania Fahrany Choirunnisa', NULL, 8, NULL),
(193, 'Daffa Rafid Fadhullah', NULL, 8, NULL),
(194, 'Dika Mulya', NULL, 8, NULL),
(195, 'Diva Wibowo', NULL, 8, NULL),
(196, 'Ela Rusita', NULL, 8, NULL),
(197, 'Faiqoh Nisa Azzahra', NULL, 8, NULL),
(198, 'Galyh Mohammad  Ibrahim', NULL, 8, NULL),
(199, 'Ilham Faqih Dikrullah', NULL, 8, NULL),
(200, 'Kaysa Chaterina', NULL, 8, NULL),
(201, 'Khadijah Rahma Wati', NULL, 8, NULL),
(202, 'Kiana Tri Makarti', NULL, 8, NULL),
(203, 'Liofi Cika Abellia', NULL, 8, NULL),
(204, 'Muhammad Nayoko Seto', NULL, 8, NULL),
(205, 'Risma Pujiyanti', NULL, 8, NULL),
(206, 'Rizquloh Bahtiar Putra', NULL, 8, NULL),
(207, 'Safa Adinda Putri', NULL, 8, NULL),
(208, 'Vicky Ardiansyah', NULL, 8, NULL),
(209, 'Waliet Allatif', NULL, 8, NULL),
(210, 'Yoga Chua Dwi Pangga', NULL, 8, NULL),
(211, 'Yulia Citra ', NULL, 8, NULL),
(212, 'Adinda Tri Julia Rahmawati', NULL, 9, NULL),
(213, 'Alexsa Fajriyati', NULL, 9, NULL),
(214, 'Arhansyah', NULL, 9, NULL),
(215, 'Bagus Dwi Prasetyo', NULL, 9, NULL),
(216, 'Bagus Tian Arianto', NULL, 9, NULL),
(217, 'Bernando Ameysiah', NULL, 9, NULL),
(218, 'Bilqis Cahaya Madina', NULL, 9, NULL),
(219, 'Cheryl Andra Olita', NULL, 9, NULL),
(220, 'Choirullia Nur Asyifa', NULL, 9, NULL),
(221, 'Dimas Arya Pratama', NULL, 9, NULL),
(222, 'Dina Rahmadani', NULL, 9, NULL),
(223, 'Galang Putra Ramadhan', NULL, 9, NULL),
(224, 'Galih Suseta', NULL, 9, NULL),
(225, 'Keysa Rahmawati', NULL, 9, NULL),
(226, 'Lailatul Khoiriyah', NULL, 9, NULL),
(227, 'Melvin Winanta', NULL, 9, NULL),
(228, 'Muhammad Aken Satria Pratama', NULL, 9, NULL),
(229, 'Muhammad Alfiansyah', NULL, 9, NULL),
(230, 'Muhammad Nur Rizqi', NULL, 9, NULL),
(231, 'Rayhan Dwi Agusta', NULL, 9, NULL),
(232, 'Riska Oktavia', NULL, 9, NULL),
(233, 'Saskia Ainur Rohmah', NULL, 9, NULL),
(234, 'Satria Dewangga Desta Harya Pamungkas', NULL, 9, NULL),
(235, 'Shifa Amelia Kurniawati', NULL, 9, NULL),
(236, 'Sukma Nur Kamal', NULL, 9, NULL),
(237, 'Aditya Putra Pratama', NULL, 10, NULL),
(238, 'Afgan Reyhan Syah Putra', NULL, 10, NULL),
(239, 'Almira Nissa Salsabila', NULL, 10, NULL),
(240, 'Aprilia Nisa Khaerun Nada', NULL, 10, NULL),
(241, 'Arif Setiawan Nugroho', NULL, 10, NULL),
(242, 'Az-Zahra Meifa Syifa Unnisa', NULL, 10, NULL),
(243, 'Bagas Alviano Herlambang', NULL, 10, NULL),
(244, 'Betran Dewangga', NULL, 10, NULL),
(245, 'Doni Saputro', NULL, 10, NULL),
(246, 'Elsa Bekti Faradhina', NULL, 10, NULL),
(247, 'Enjelina Valentina Febiyana', NULL, 10, NULL),
(248, 'Fahrul Ramadhani', NULL, 10, NULL),
(249, 'Febi Sekar Lauren', NULL, 10, NULL),
(250, 'Firman Arip Fadila', NULL, 10, NULL),
(251, 'Galih Al Rabanu', NULL, 10, NULL),
(252, 'Kandha Nanang Bramantio', NULL, 10, NULL),
(253, 'Nayla Nur Akila', NULL, 10, NULL),
(254, 'Nova Aprelia', NULL, 10, NULL),
(255, 'Rafli Ahmad Fahrezi', NULL, 10, NULL),
(256, 'Rufail Tri Prabowo', NULL, 10, NULL),
(257, 'Shifa Zaskia Julianti', NULL, 10, NULL),
(258, 'Tegar Widi Maulana', NULL, 10, NULL),
(259, 'Vahra Juliana', NULL, 10, NULL),
(260, 'Wahyu Cahyo Saputro', NULL, 10, NULL),
(261, 'Zahra Fauzatun Nikmah', NULL, 10, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role_id`) VALUES
(1, 'admin', '25d55ad283aa400af464c76d713c07ad', 1),
(2, 'Muh. Miftah, M. Pd.', '25d55ad283aa400af464c76d713c07ad', 2),
(3, 'Darto, S.Pd', '25d55ad283aa400af464c76d713c07ad', 2),
(4, 'Drs. Tantri Santoso', '25d55ad283aa400af464c76d713c07ad', 2),
(5, 'Endang Mahmudah, S.Pd', '25d55ad283aa400af464c76d713c07ad', 2),
(6, 'Johan Wahyudi, M.Pd', '25d55ad283aa400af464c76d713c07ad', 2),
(7, 'Supriyati, S.Pd', '25d55ad283aa400af464c76d713c07ad', 2),
(8, 'Tatang Johani Asfari, S.Pd', '25d55ad283aa400af464c76d713c07ad', 2),
(9, 'Wiwik Asih P, S.Pd', '25d55ad283aa400af464c76d713c07ad', 2),
(10, 'Evi Dwi Suryani, SS', '25d55ad283aa400af464c76d713c07ad', 2),
(11, 'Sri Murni Wijayanti, S.Pd', '25d55ad283aa400af464c76d713c07ad', 2),
(12, 'Dwys Apga Kartiyanto, S.Pd', '25d55ad283aa400af464c76d713c07ad', 2),
(13, 'Nihayatul Chasanah, S.S', '25d55ad283aa400af464c76d713c07ad', 2),
(14, 'Kistantini, S.Si', '25d55ad283aa400af464c76d713c07ad', 2),
(15, 'Tein Maimunah, S.Pd', '25d55ad283aa400af464c76d713c07ad', 2),
(16, 'Muhammad Abdul Rokhim, S.Pd', '25d55ad283aa400af464c76d713c07ad', 2),
(17, 'Dwi Widiyastuti, S.Ag ', '25d55ad283aa400af464c76d713c07ad', 2),
(18, 'Endang Kristini, S.Pd', '25d55ad283aa400af464c76d713c07ad', 2),
(19, 'Drs. Sriyanto A P', '25d55ad283aa400af464c76d713c07ad', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indeks untuk tabel `kbm`
--
ALTER TABLE `kbm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kehadiran_siswa`
--
ALTER TABLE `kehadiran_siswa`
  ADD PRIMARY KEY (`presensi_id`,`siswa_id`),
  ADD KEY `siswa_id` (`siswa_id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sikap`
--
ALTER TABLE `sikap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_id` (`siswa_id`),
  ADD KEY `id_guru` (`guru_id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_role` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `kbm`
--
ALTER TABLE `kbm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sikap`
--
ALTER TABLE `sikap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`);

--
-- Ketidakleluasaan untuk tabel `kehadiran_siswa`
--
ALTER TABLE `kehadiran_siswa`
  ADD CONSTRAINT `kehadiran_siswa_ibfk_1` FOREIGN KEY (`presensi_id`) REFERENCES `presensi` (`id`),
  ADD CONSTRAINT `kehadiran_siswa_ibfk_2` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`);

--
-- Ketidakleluasaan untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD CONSTRAINT `presensi_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`);

--
-- Ketidakleluasaan untuk tabel `sikap`
--
ALTER TABLE `sikap`
  ADD CONSTRAINT `sikap_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`),
  ADD CONSTRAINT `sikap_ibfk_2` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`);

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
