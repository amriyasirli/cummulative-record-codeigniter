-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 08, 2020 at 10:26 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cummulative`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `guru_id` int(11) NOT NULL,
  `guru_nip` varchar(128) NOT NULL,
  `guru_nama` varchar(128) NOT NULL,
  `guru_golongan` varchar(20) NOT NULL,
  `guru_gender` varchar(20) NOT NULL,
  `guru_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`guru_id`, `guru_nip`, `guru_nama`, `guru_golongan`, `guru_gender`, `guru_jabatan`) VALUES
(1, '3557687697346346', 'M. Sholeh', 'III/B', 'Laki-Laki', 'Wakil Kurikulum'),
(2, '3557687697346334', 'Yassirli Amri', 'I/A', 'Laki-Laki', 'Kepala Sekolah');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` int(11) NOT NULL,
  `kelas_nama` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `kelas_nama`) VALUES
(1, 'VII A'),
(2, 'VII B'),
(3, 'VII C'),
(4, 'VII D'),
(5, 'VII E');

-- --------------------------------------------------------

--
-- Table structure for table `kesehatan`
--

CREATE TABLE `kesehatan` (
  `kesehatan_id` int(20) NOT NULL,
  `kesehatan_siswa_id` int(11) NOT NULL,
  `kesehatan_darah` varchar(128) NOT NULL,
  `kesehatan_penyakit` varchar(128) NOT NULL,
  `kesehatan_kelainan_jasmani` varchar(128) NOT NULL,
  `kesehatan_tinggi` varchar(50) NOT NULL,
  `kesehatan_berat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kesehatan`
--

INSERT INTO `kesehatan` (`kesehatan_id`, `kesehatan_siswa_id`, `kesehatan_darah`, `kesehatan_penyakit`, `kesehatan_kelainan_jasmani`, `kesehatan_tinggi`, `kesehatan_berat`) VALUES
(1, 0, '-', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `permasalahan`
--

CREATE TABLE `permasalahan` (
  `permasalahan_id` int(11) NOT NULL,
  `permasalahan_siswa_id` int(11) NOT NULL,
  `permasalahan_sekolah` varchar(128) NOT NULL,
  `permasalahan_keluarga` varchar(128) NOT NULL,
  `permasalahan_masyarakat` varchar(128) NOT NULL,
  `permasalahan_teman` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permasalahan`
--

INSERT INTO `permasalahan` (`permasalahan_id`, `permasalahan_siswa_id`, `permasalahan_sekolah`, `permasalahan_keluarga`, `permasalahan_masyarakat`, `permasalahan_teman`) VALUES
(1, 0, '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `psikologi`
--

CREATE TABLE `psikologi` (
  `psikologi_id` int(11) NOT NULL,
  `psikologi_siswa_id` int(11) NOT NULL,
  `psikologi_bakat` varchar(128) NOT NULL,
  `psikologi_minat` varchar(128) NOT NULL,
  `psikologi_hobi` varchar(128) NOT NULL,
  `psikologi_citacita` varchar(128) NOT NULL,
  `psikologi_sekolah_impian` varchar(128) NOT NULL,
  `psikologi_perguruan` varchar(128) NOT NULL,
  `psikologi_dunia_kerja` varchar(128) NOT NULL,
  `psikologi_ekskul` varchar(128) NOT NULL,
  `psikologi_pelajaran_suka` varchar(128) NOT NULL,
  `psikologi_pelajaran_sulit` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `psikologi`
--

INSERT INTO `psikologi` (`psikologi_id`, `psikologi_siswa_id`, `psikologi_bakat`, `psikologi_minat`, `psikologi_hobi`, `psikologi_citacita`, `psikologi_sekolah_impian`, `psikologi_perguruan`, `psikologi_dunia_kerja`, `psikologi_ekskul`, `psikologi_pelajaran_suka`, `psikologi_pelajaran_sulit`) VALUES
(1, 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `siswa_id` int(11) NOT NULL,
  `siswa_nis` int(11) NOT NULL,
  `siswa_nama` varchar(128) NOT NULL,
  `siswa_panggilan` varchar(128) NOT NULL,
  `siswa_gender` varchar(50) NOT NULL,
  `siswa_tgl_lahir` date NOT NULL,
  `siswa_tempat_lahir` varchar(128) NOT NULL,
  `siswa_ortu` varchar(128) NOT NULL,
  `siswa_alamat` text NOT NULL,
  `siswa_hp` varchar(128) NOT NULL,
  `siswa_agama` varchar(128) NOT NULL,
  `siswa_bahasa` varchar(128) NOT NULL,
  `siswa_tinggal` varchar(128) NOT NULL,
  `siswa_anak_ke` varchar(50) NOT NULL,
  `siswa_foto` varchar(128) NOT NULL,
  `siswa_kelas_id` int(11) DEFAULT NULL,
  `siswa_kesehatan_id` int(11) DEFAULT NULL,
  `siswa_permasalahan_id` int(11) DEFAULT NULL,
  `siswa_psikologi_id` int(11) DEFAULT NULL,
  `siswa_sosial_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sosial`
--

CREATE TABLE `sosial` (
  `sosial_id` int(11) NOT NULL,
  `sosial_siswa_id` int(11) NOT NULL,
  `sosial_sifat_suka` varchar(128) NOT NULL,
  `sosial_sifat_tdksuka` varchar(128) NOT NULL,
  `sosial_motif_rumah` varchar(128) NOT NULL,
  `sosial_motif_sekolah` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sosial`
--

INSERT INTO `sosial` (`sosial_id`, `sosial_siswa_id`, `sosial_sifat_suka`, `sosial_sifat_tdksuka`, `sosial_motif_rumah`, `sosial_motif_sekolah`) VALUES
(1, 0, '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `data_created` int(11) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nama`, `username`, `password`, `foto`, `data_created`, `role_id`) VALUES
(7, 'Yassirli Amri', 'amri', '$2y$10$10VfkHQCemqXmgSr4SlRpuayKqHSGke28teWg4GBqQ2QVN4eu/kBW', '5d9d5cff6efba60a85174cb1a2dc8bd5.jpg', 1573665126, 1),
(8, 'Ulfa Wahyuni', 'member', '$2y$10$q.n4N22Fe3DaGYUgALMA4eCXVTiV/Pv9e6udJiVicOdkWx8Jjjq76', 'd98e3b4de129a0667ecd95221a07d4ad.png', 0, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`guru_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indexes for table `kesehatan`
--
ALTER TABLE `kesehatan`
  ADD PRIMARY KEY (`kesehatan_id`);

--
-- Indexes for table `permasalahan`
--
ALTER TABLE `permasalahan`
  ADD PRIMARY KEY (`permasalahan_id`);

--
-- Indexes for table `psikologi`
--
ALTER TABLE `psikologi`
  ADD PRIMARY KEY (`psikologi_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`siswa_id`);

--
-- Indexes for table `sosial`
--
ALTER TABLE `sosial`
  ADD PRIMARY KEY (`sosial_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `guru_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kelas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kesehatan`
--
ALTER TABLE `kesehatan`
  MODIFY `kesehatan_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2078251666;

--
-- AUTO_INCREMENT for table `permasalahan`
--
ALTER TABLE `permasalahan`
  MODIFY `permasalahan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2006651633;

--
-- AUTO_INCREMENT for table `psikologi`
--
ALTER TABLE `psikologi`
  MODIFY `psikologi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1699558426;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `siswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `sosial`
--
ALTER TABLE `sosial`
  MODIFY `sosial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1971052916;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
