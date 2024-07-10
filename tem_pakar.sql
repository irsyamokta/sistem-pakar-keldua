-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2023 at 03:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_ayam`
--

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL,
  `gejala` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `gejala`) VALUES
(1, 'Dada ( Bagian atas Tubuh) \r\n'),
(2, 'Punggung ( Bagian Atas Tubuh )\r\n'),
(3, 'Bahu ( Bagian Atas Tubuh )\r\n'),
(4, 'Lengan Atas ( Bagian atas Tubuh ) \r\n'),
(5, 'Kaki ( Bagian Bawah Tubuh )\r\n'),
(6, 'Betis ( Bagian Bawah Tubuh )\r\n'),
(7, 'Perut ( Bagian Inti tubuh ) \r\n');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `penyakit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `penyakit`) VALUES
(1, 'Bench Press\r\n'),
(2, 'Dumbbell Flys\r\n'),
(3, 'Push-Ups\r\n'),
(4, 'Pull-Ups/Chin-Ups\r\n'),
(5, 'Lat Pull-Downs\r\n'),
(6, 'Barbell Rows\r\n'),
(7, 'Shoulder Press\r\n'),
(8, 'Lateral Raises\r\n'),
(9, 'Bent-Over Raises\r\n'),
(10, 'Bicep Curls\r\n'),
(11, 'Tricep Dips\r\n'),
(12, 'Tricep Extensions\r\n'),
(13, 'Squats\r\n'),
(14, 'Lunges\r\n'),
(15, 'Leg Presses\r\n'),
(16, 'Calf Raises\r\n'),
(17, 'Seated Calf Raises\r\n'),
(18, 'Crunches\r\n'),
(19, 'Leg Raises\r\n'),
(20, 'Planks\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `relasi`
--

CREATE TABLE `relasi` (
  `id_relasi` int(11) NOT NULL,
  `id_gejala` int(11) DEFAULT NULL,
  `id_penyakit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `relasi`
--

INSERT INTO `relasi` (`id_relasi`, `id_gejala`, `id_penyakit`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 4),
(5, 2, 5),
(6, 2, 6),
(7, 3, 7),
(8, 3, 8),
(9, 3, 9),
(10, 4, 10),
(11, 4, 11),
(12, 4, 12),
(13, 5, 13),
(14, 5, 14),
(15, 5, 15),
(16, 6, 16),
(17, 6, 17),
(18, 7, 18),
(19, 7, 19),
(20, 7, 20);

-- --------------------------------------------------------

--
-- Table structure for table `solusi`
--

CREATE TABLE `solusi` (
  `id_solusi` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `solusi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `solusi`
--

INSERT INTO `solusi` (`id_solusi`, `id_penyakit`, `solusi`) VALUES
(1, 1, 'Latihan ini melibatkan mengangkat beban dari posisi berbaring di atas bench.'),
(2, 2, 'Melibatkan gerakan membuka dan menutup tangan dengan beban dumbbell untuk mengisolasi otot dada.'),
(3, 3, 'Latihan tubuh menggunakan berat badan yang efektif untuk menguatkan otot dada.\r\n'),
(4, 4, 'Latihan angkat badan dengan menggunakan pegangan yang berbeda untuk memperkuat otot punggung dan bahu.'),
(5, 5, 'Latihan untuk memperkuat otot punggung menggunakan mesin kabel.'),
(6, 6, 'Melibatkan menarik beban ke tubuh dari posisi jongkok, memperkuat punggung dan lengan.'),
(7, 7, 'Angkat beban dari atas kepala untuk membangun otot bahu.'),
(8, 8, 'Angkat beban ke samping untuk mengisolasi otot deltoid lateral.'),
(9, 9, 'Latihan membungkuk untuk memperkuat belakang bahu.'),
(10, 10, 'Mengangkat beban dengan tangan ke arah bahu untuk menguatkan otot bicep.'),
(11, 11, 'Latihan untuk memperkuat otot trisep dengan menggunakan berat badan.'),
(12, 12, 'Memperpanjang lengan ke belakang kepala untuk memperkuat trisep.'),
(13, 13, 'Latihan fundamental untuk membangun kekuatan otot paha dan gluteus.'),
(14, 14, 'Langkah besar ke depan atau belakang untuk menguatkan otot paha.'),
(15, 15, 'Latihan menggunakan mesin untuk membangun kekuatan dan massa otot kaki.'),
(16, 16, 'Latihan mengangkat tumit untuk memperkuat otot betis.'),
(17, 17, 'versi duduk dari calf raises untuk isolasi otot betis.'),
(18, 18, 'Latihan untuk menguatkan otot perut dengan mengangkat bahu dari lantai.'),
(19, 19, 'Mengangkat kaki ke atas untuk melibatkan otot perut bagian bawah.'),
(20, 20, 'Mempertahankan posisi tubuh tegak untuk memperkuat seluruh inti tubuh.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `role`, `nama`, `email`, `alamat`, `tgl_lahir`, `password`) VALUES
(2, 0, 'admin', 'admin@gmail.com', 'Tabanan', '2020-04-17', '$2y$10$ASS50col3niwOOku4Zkky.HpmF18hiPWL9pi2DnE8CS7jTDSD4ufe'),
(4, 2, 'Dokter Budi', 'budi@gmail.com', 'Bandung', '2020-04-09', '$2y$10$n2nS/Rg7Zvjdv.q1mrv7TOJYrzf18LVQQzsWuDWqPf5Ieos/OIWiG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `relasi`
--
ALTER TABLE `relasi`
  ADD PRIMARY KEY (`id_relasi`),
  ADD KEY `id_gejala` (`id_gejala`),
  ADD KEY `id_penyakit` (`id_penyakit`);

--
-- Indexes for table `solusi`
--
ALTER TABLE `solusi`
  ADD PRIMARY KEY (`id_solusi`),
  ADD KEY `id_penyakit` (`id_penyakit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `relasi`
--
ALTER TABLE `relasi`
  MODIFY `id_relasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `solusi`
--
ALTER TABLE `solusi`
  MODIFY `id_solusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `relasi`
--
ALTER TABLE `relasi`
  ADD CONSTRAINT `relasi_ibfk_1` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`),
  ADD CONSTRAINT `relasi_ibfk_2` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`);

--
-- Constraints for table `solusi`
--
ALTER TABLE `solusi`
  ADD CONSTRAINT `solusi_ibfk_1` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
