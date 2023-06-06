-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 24, 2023 at 04:32 PM
-- Server version: 8.0.33-0ubuntu0.22.04.2
-- PHP Version: 8.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud-php`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(2) NOT NULL,
  `membership` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `nama`, `username`, `email`, `password`, `level`, `membership`) VALUES
(3, 'user', 'user', 'user@gmail.com', '$2y$10$/yBXT.r/4TT8QwQ5575.juIqxeXm8E4KUHnWDQ3PsrFGFxSBjICby', '3', 0),
(4, 'user1', 'user1', 'user1@gmail.com', '$2y$10$LAvKdNGysNe8ckQl5ICSle1ROG/hhja7XVewZdWgoNw.V8IsHBWnm', '3', 1),
(5, 'admin3', 'admin3', 'admin3@gmail.com', '$2y$10$LAvKdNGysNe8ckQl5ICSle1ROG/hhja7XVewZdWgoNw.V8IsHBWnm', '1', 0),
(6, 'user3', 'user3', 'dddd@gmail.com', '$2y$10$LAvKdNGysNe8ckQl5ICSle1ROG/hhja7XVewZdWgoNw.V8IsHBWnm', '3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `jumlah`, `harga`, `tanggal`) VALUES
(1, 'kursi', '15', '15000000', '2023-05-06 13:56:03'),
(2, 'handhone', '14', '100000', '2023-05-04 10:59:01'),
(3, 'headset', '12', '10000000000', '2023-05-04 07:55:17'),
(7, 'komputer', '4', '150000000', '2023-05-06 13:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `episode`
--

CREATE TABLE `episode` (
  `id_episode` int NOT NULL,
  `id_judul` int NOT NULL,
  `judul` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `episode` varchar(255) NOT NULL,
  `tgl` date NOT NULL,
  `foto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `episode`
--

INSERT INTO `episode` (`id_episode`, `id_judul`, `judul`, `genre`, `episode`, `tgl`, `foto`) VALUES
(31, 40, 'doom breker', 'Action', '2', '2023-05-04', '64660ba41ba59.jpg'),
(32, 40, 'doom breker', 'Action', '3', '2023-05-04', '64660ba41bed4.jpg'),
(35, 39, 'Ryusui Honkai', 'Action', '1', '2023-05-19', '64672599a01fc.jpg'),
(36, 39, 'Eius ea non eiusmod ', 'Romantis', '2', '1994-02-09', '6467261001b51.jpg'),
(37, 39, 'Natus dolor explicab', 'Romantis', '3', '2000-12-17', '64672641b6d21.jpg'),
(38, 39, 'Enim corrupti repel', 'Action', '37', '1979-02-11', NULL),
(39, 46, 'Id in culpa sunt es', 'Comedy', '78', '1987-02-25', NULL),
(40, 48, 'Dolor et cupidatat n', 'Comedy', '15', '1974-10-12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `foto_episode`
--

CREATE TABLE `foto_episode` (
  `id_foto` int NOT NULL,
  `id_episode` int NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto_episode`
--

INSERT INTO `foto_episode` (`id_foto`, `id_episode`, `foto`) VALUES
(1, 38, '64672d61e9dab.jpg'),
(2, 38, '64672d61e9feb.png'),
(3, 38, '64672d61ea039.png'),
(4, 38, '64672d61ea05e.png'),
(5, 39, '6467355a31950.jpg'),
(6, 39, '6467355a3199f.png'),
(7, 39, '6467355a32d01.png'),
(8, 39, '6467355a33b89.png'),
(9, 40, '64681ceee111d.jpg'),
(10, 40, '64681ceee13c2.png'),
(11, 40, '64681ceee156f.png'),
(12, 40, '64681ceee1693.png');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id_genre` int NOT NULL,
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id_genre`, `genre`) VALUES
(1, 'Action'),
(2, 'Comedy'),
(3, 'Fantasy'),
(4, 'horor');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama`, `prodi`, `jk`, `telepon`, `email`, `foto`) VALUES
(2, 'slamet', 'sistem informasi', 'cowo', '234234', 'nur@gmail.com', 'foto.jpeg'),
(3, 'headset', 'sistem informasi', 'cewe', '123123123', 'admin1@gmail.com', 'foto.jpeg'),
(12, 'headset', 'teknik informatika', 'cowo', '123', 'nurriadykun86550@gmail.com', '6464cd66ceb2a.jpg'),
(13, 'headset', 'teknik informatika', 'cowo', '23', 'nurriadykun86550@gmail.com', '6464cf1bcca2b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `id_member` int NOT NULL,
  `id_akun` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `bank` varchar(5) NOT NULL,
  `struk` varchar(255) NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id_member`, `id_akun`, `nama`, `email`, `bank`, `struk`, `status`) VALUES
(4, 4, 'test', 'test@gmail.com', 'BNI', '646ae118c4550.png', 1),
(5, 4, 'test2', 'test2@gmail.com', 'BCA', '646b078f3a337.png', 0),
(6, 5, 'Ryan', 'test2@gmail.com', 'BCA', '646c057f9d4b0.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `terbit`
--

CREATE TABLE `terbit` (
  `id_judul` int NOT NULL,
  `id_akun` int NOT NULL,
  `judul` varchar(100) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ringkasan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `disetujui` int NOT NULL,
  `premium` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terbit`
--

INSERT INTO `terbit` (`id_judul`, `id_akun`, `judul`, `genre`, `email`, `ringkasan`, `foto`, `disetujui`, `premium`) VALUES
(39, 6, 'The God High School', 'Action', 'user1@gmail.com', 'asdasd', '6465f9b70cff8.jpg', 1, 1),
(40, 3, 'doom brekerrr', 'Action', 'user@gmail.com', 'asdasdasd', '6466bd4e706fe.jpeg', 1, 0),
(41, 4, 'Illum eum dolorem d', 'Romantis', 'togi@mailinator.com', 'Et doloribus magna n', '6466d2b4ee900.jpg', 1, 0),
(42, 3, 'Dolore deserunt volu', 'Comedy', 'jyvyw@mailinator.com', 'Distinctio Mollitia', '6466d8326ee6b.jpg', 0, 0),
(43, 4, 'Voluptas iste sequi ', 'Comedy', 'zikavadec@mailinator.com', 'Corrupti quae velit', '6466d923e6746.jpg', 0, 0),
(44, 6, 'Labore dolor omnis va', 'Romantis', 'podacogibi@mailinator.com', 'Sunt illum incidunt', '6466d9332f551.jpg', 0, 0),
(45, 6, 'Ut reiciendis aute q', 'Comedy', 'talezavis@mailinator.com', 'Unde deserunt quasi ', '6466d96c0e45d.jpg', 1, 1),
(46, 3, 'Aut aut perferendis ', 'Romantis', 'rivolisygu@mailinator.com', 'Velit qui eu dolorem', '6466d9a2d1f55.jpg', 1, 0),
(47, 4, 'At ipsum id est et ', 'Horor', 'kutatimagy@mailinator.com', 'Ullam illum laudant', '6467352a194e3.png', 0, 0),
(48, 4, 'Sunt et placeat qui', 'Fantasy', 'qitoxezex@mailinator.com', 'Quaerat Nam architec', '64681bea2964a.png', 1, 0),
(49, 6, 'Culpa quis qui in laa', 'Comedy', 'gexu@mailinator.com', 'A in ad dolor eius a', '64682a3e73528.png', 0, 0),
(50, 6, 'Eum deserunt consequ', 'Fantasy', 'beti@mailinator.com', 'Nobis ut et autem as', '64682b1d2d603.png', 0, 0),
(51, 6, 'Nostrum magna repudi', 'Horor', 'tosybomi@mailinator.com', 'Voluptatem quia modi', '64686727bd31c.png', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `episode`
--
ALTER TABLE `episode`
  ADD PRIMARY KEY (`id_episode`);

--
-- Indexes for table `foto_episode`
--
ALTER TABLE `foto_episode`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `terbit`
--
ALTER TABLE `terbit`
  ADD PRIMARY KEY (`id_judul`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `episode`
--
ALTER TABLE `episode`
  MODIFY `id_episode` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `foto_episode`
--
ALTER TABLE `foto_episode`
  MODIFY `id_foto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id_member` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `terbit`
--
ALTER TABLE `terbit`
  MODIFY `id_judul` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
