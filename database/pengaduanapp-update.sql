-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 07, 2024 at 06:11 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduanapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_masyarakat`
--

CREATE TABLE `tb_masyarakat` (
  `nik_masyarakat` varchar(20) NOT NULL,
  `password_masyarakat` varchar(150) NOT NULL,
  `namalengkap_masyarakat` varchar(60) NOT NULL,
  `email_masyarakat` varchar(50) NOT NULL,
  `notelp_masyarakat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_masyarakat`
--

INSERT INTO `tb_masyarakat` (`nik_masyarakat`, `password_masyarakat`, `namalengkap_masyarakat`, `email_masyarakat`, `notelp_masyarakat`) VALUES
('3201234567891011', '22f7ee24d04366ef973c3ed933536fc8', 'Selvi', 'masyarakat1@gmail.com', '62895339046899'),
('3201234567891012', '22f7ee24d04366ef973c3ed933536fc8', 'Selvi 2', 'selvi2@gmail.com', '62895539048955');

-- --------------------------------------------------------

--
-- Table structure for table `tb_operator`
--

CREATE TABLE `tb_operator` (
  `id_operator` int(11) NOT NULL,
  `username_operator` varchar(50) NOT NULL,
  `password_operator` varchar(200) NOT NULL,
  `nama_operator` varchar(100) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_operator`
--

INSERT INTO `tb_operator` (`id_operator`, `username_operator`, `password_operator`, `nama_operator`, `role`) VALUES
(1, 'operator', '4b583376b2767b923c3e1da60d10de59', 'Selvi', 0),
(99, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 1),
(101, 'operator2', '9e64fc8a2ad3331c44a846c3a2b4bb14', 'Selvi 2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_panduan`
--

CREATE TABLE `tb_panduan` (
  `id_panduan` int(11) NOT NULL,
  `isi_panduan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_panduan`
--

INSERT INTO `tb_panduan` (`id_panduan`, `isi_panduan`) VALUES
(1, 'Register terlebih dahulu, masukan data dengan lengkap.'),
(2, 'Setelah register berhasil, masuk ke form login, sesuaikan nik dan password.\r\n'),
(3, 'Lakukan pengaduan pada halaman dashboard.'),
(4, 'Buka menu riwayat untuk melihat serta meninjau aduan yang pernah diajukan.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengaduan`
--

CREATE TABLE `tb_pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `nik_masyarakat` varchar(20) NOT NULL,
  `fotokejadian_pengaduan` varchar(100) NOT NULL,
  `tanggalkejadian_pengaduan` date NOT NULL,
  `lokasikejadian_pengaduan` varchar(100) NOT NULL,
  `isilaporan_pengaduan` text NOT NULL,
  `statuspengaduan_pengaduan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pengaduan`
--

INSERT INTO `tb_pengaduan` (`id_pengaduan`, `nik_masyarakat`, `fotokejadian_pengaduan`, `tanggalkejadian_pengaduan`, `lokasikejadian_pengaduan`, `isilaporan_pengaduan`, `statuspengaduan_pengaduan`) VALUES
(1, '3201234567891012', 'fotostandar.png', '2023-12-05', 'Jl. Mutiara RT 010/ RW 005, Desa Kekiling', 'Pada tanggal terlampir, saya mengalami kejadian pungutan liar (pungli) yang dilakukan oleh Orang Asing di tersebut. Berikut adalah kronologi kejadian secara singkat:\r\n1. Tiba-tiba melakukan pungutan atas dasar pajak.', 1),
(2, '3201234567891012', 'fotostandar.png', '2023-12-06', 'Jl. Mutiara RT 010/ RW 005, Desa Kekiling', 'Pada tanggal terlampir, saya mengalami kejadian pungutan liar (pungli) yang dilakukan oleh Orang Asing di tersebut. Berikut adalah kronologi kejadian secara singkat:\r\n1. Tiba-tiba melakukan pungutan atas dasar pajak.\r\n(Hal ini terjadi lagi) Belum ada tindakan', 1),
(7, '3201234567891012', '12122323091231.jpg', '2023-12-13', 'Jl. Indonesia No 9 Selatan', 'Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen grafis atau presentasi visual seperti font, tipografi, dan tata letak.', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  ADD PRIMARY KEY (`nik_masyarakat`);

--
-- Indexes for table `tb_operator`
--
ALTER TABLE `tb_operator`
  ADD PRIMARY KEY (`id_operator`);

--
-- Indexes for table `tb_panduan`
--
ALTER TABLE `tb_panduan`
  ADD PRIMARY KEY (`id_panduan`);

--
-- Indexes for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `fk_nik_masyarakat` (`nik_masyarakat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_operator`
--
ALTER TABLE `tb_operator`
  MODIFY `id_operator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `tb_panduan`
--
ALTER TABLE `tb_panduan`
  MODIFY `id_panduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
