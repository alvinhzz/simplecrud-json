-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22 Okt 2019 pada 22.15
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pwd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` char(128) NOT NULL,
  `email` char(128) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `password`) VALUES
(1, 'Aslamadin Alvian Haz', 'aslamadin1600018092@webmail.uad.ac.id', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fingerprint_machine`
--

CREATE TABLE `fingerprint_machine` (
  `id` int(3) NOT NULL,
  `machine_id` varchar(15) NOT NULL,
  `machine_code` varchar(15) NOT NULL,
  `max_id_numbers` int(4) NOT NULL DEFAULT '127',
  `group_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `group_members`
--

CREATE TABLE `group_members` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `meetings`
--

CREATE TABLE `meetings` (
  `meeting_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `meeting_name` char(50) NOT NULL,
  `meeting_date` date NOT NULL,
  `meeting_start` time NOT NULL,
  `meeting_end` time NOT NULL,
  `meeting_place` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `meeting_attendance`
--

CREATE TABLE `meeting_attendance` (
  `id` int(11) NOT NULL,
  `meeting_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `member_name` char(50) NOT NULL,
  `status` enum('Tidak hadir','Hadir','','') NOT NULL DEFAULT 'Tidak hadir',
  `attendance_time` varchar(20) DEFAULT '00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `meeting_groups`
--

CREATE TABLE `meeting_groups` (
  `group_id` int(3) NOT NULL,
  `group_name` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `members`
--

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL,
  `member_name` char(60) NOT NULL,
  `member_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `members`
--

INSERT INTO `members` (`member_id`, `member_name`, `member_email`) VALUES
(2, 'Shanty Puspitasari', 'yyshntyp@gmail.com'),
(4, 'I Made Candra Aditya Irawan', 'st_hitam27@gmail.com'),
(5, 'Khairul Maftuh Hidayat', 'khairulmh9@gmail.com'),
(19, 'Aslamadin Alvian Haz', 'alvianaslamadin@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member_fingerprint`
--

CREATE TABLE `member_fingerprint` (
  `id` int(11) NOT NULL,
  `fingerprint_machine_id` varchar(10) NOT NULL,
  `member_id` int(11) NOT NULL,
  `fingerprint_code` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member_fingerprint`
--

INSERT INTO `member_fingerprint` (`id`, `fingerprint_machine_id`, `member_id`, `fingerprint_code`) VALUES
(1, 'FTI-TIF-01', 1, 2),
(2, 'FTI-TIF-01', 1, 1),
(5, 'FTI-TIF-01', 2, 4),
(6, 'FTI-TIF-01', 2, 3),
(7, 'FTI-TE-01', 4, 10),
(8, 'FTI-TE-01', 3, 1),
(9, 'FTI-TE-01', 3, 3),
(10, 'FTI-TE-01', 3, 5),
(11, 'FTI-TE-01', 4, 2),
(12, 'FTI-TE-01', 4, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fingerprint_machine`
--
ALTER TABLE `fingerprint_machine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `machine_id` (`machine_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `group_members`
--
ALTER TABLE `group_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_belongsto_group` (`group_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`meeting_id`);

--
-- Indexes for table `meeting_attendance`
--
ALTER TABLE `meeting_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting_groups`
--
ALTER TABLE `meeting_groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `member_fingerprint`
--
ALTER TABLE `member_fingerprint`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fingerprint_machine_id` (`fingerprint_machine_id`),
  ADD KEY `member_id` (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fingerprint_machine`
--
ALTER TABLE `fingerprint_machine`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `group_members`
--
ALTER TABLE `group_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `meeting_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `meeting_attendance`
--
ALTER TABLE `meeting_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `member_fingerprint`
--
ALTER TABLE `member_fingerprint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
