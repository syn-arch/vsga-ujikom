-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2021 at 11:09 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_psbonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `email`, `password`, `level`) VALUES
(2, 'Administrator', 'admin@admin.com', '$2y$10$1Rs66TPmu9rn/3WF.WQmN.ij4VxCjT1Q2cln/.odu20H06miOB6Qq', 'admin'),
(5, 'Admin PSB', 'adminpsb@gmail.com', '$2y$10$d93yUk0ya.QFXHXNgTvdtO6.G0/WfhqkLT/6LEXZp9A2aVsVfF9BS', 'admin'),
(7, 'Adiatna Sukmana', 'dyatna.id@gmail.com', '$2y$10$h6Jbh4ZMzyaz12kD.aGTvOjifkc.LsnocGF41SSqO1k3o2b2y.NBi', 'siswa'),
(8, 'siswa baru', 'siswabaru@gmail.com', '$2y$10$qWuo8v3w.6HJvhoPROoaauyZKYi/DG1kv29w3IgSTa.cnQZOt8JvW', 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `asal_sekolah` varchar(255) NOT NULL,
  `ijazah` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `id_pengguna`, `nama_siswa`, `jenis_kelamin`, `alamat`, `telepon`, `asal_sekolah`, `ijazah`, `status`, `gambar`) VALUES
(12, 8, 'Adiatna Sukmana', 'L', 'Bandung ', '083822623170', 'SMPN 2 CIWIDEY', 'SURAT KETERANGAN LULUS.pdf', 'DITERIMA', '3x4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
