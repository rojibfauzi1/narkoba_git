-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 30 Agu 2016 pada 11.17
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jitc5`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(3) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_telp` int(15) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nip`, `password`, `nama`, `no_telp`, `alamat`) VALUES
(2, '123456', 'admin', 'admin', 57657, 'jahsjkasa'),
(3, '1234567', 'admin', 'rojib', 23456, 'njsxksa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(3) NOT NULL,
  `id_admin` int(3) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `id_admin`, `judul`, `isi`, `tanggal`) VALUES
(3, 2, 'dsadsa', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.\r\n\r\nDuis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\r\n\r\nUt wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.', '2016-07-26 02:26:29'),
(4, 2, 'aggagagd', 'sadsadas', '2016-08-12 03:04:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `chatting`
--

CREATE TABLE `chatting` (
  `id_chat` int(3) NOT NULL,
  `id_pelapor` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `chatting`
--

INSERT INTO `chatting` (`id_chat`, `id_pelapor`) VALUES
(42, 57),
(43, 58),
(44, 59),
(46, 62),
(47, 64);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_chatting`
--

CREATE TABLE `detail_chatting` (
  `id_detail_chat` int(3) NOT NULL,
  `id_chat` int(3) NOT NULL,
  `id_admin` int(3) NOT NULL,
  `status` enum('1','2') NOT NULL,
  `tanggal` datetime NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_chatting`
--

INSERT INTO `detail_chatting` (`id_detail_chat`, `id_chat`, `id_admin`, `status`, `tanggal`, `isi`) VALUES
(257, 43, 0, '2', '2016-08-05 18:19:10', 'jajal'),
(258, 44, 2, '2', '2016-08-05 20:37:50', 'fafa'),
(259, 44, 2, '2', '2016-08-05 20:41:55', 'yayay'),
(260, 44, 0, '2', '0000-00-00 00:00:00', 'wkwkkw'),
(261, 44, 2, '2', '2016-08-06 08:15:59', 'lagii'),
(262, 44, 2, '2', '2016-08-06 08:25:30', 'hehhe'),
(263, 44, 2, '2', '2016-08-06 08:26:46', 'wwoowo'),
(264, 44, 2, '2', '2016-08-06 08:29:06', 'xzcxzcxz'),
(265, 44, 2, '2', '2016-08-06 08:30:46', 'yahhh'),
(266, 44, 2, '2', '2016-08-06 08:32:23', 'xaxsa'),
(267, 44, 2, '2', '2016-08-06 08:33:29', 'zazaza'),
(268, 44, 2, '2', '2016-08-06 08:35:23', 'zuuzuz'),
(269, 44, 2, '2', '2016-08-06 08:37:12', 'ewewew'),
(270, 44, 2, '2', '2016-08-06 08:37:23', 'sasa'),
(271, 44, 0, '2', '2016-08-07 06:17:13', 'sads'),
(272, 44, 0, '2', '2016-08-07 06:17:43', 'jossss'),
(273, 44, 0, '2', '2016-08-07 06:19:05', 'alhamdulillah'),
(274, 44, 2, '2', '2016-08-07 06:30:02', 'dasdsa'),
(275, 44, 2, '2', '2016-08-07 06:30:04', 'dsda'),
(276, 44, 2, '2', '2016-08-07 06:30:25', 'koko'),
(277, 44, 2, '2', '2016-08-07 06:30:39', 'xzxzxz'),
(278, 44, 2, '2', '2016-08-07 06:32:20', 'wawa'),
(279, 44, 2, '2', '2016-08-07 06:35:43', 'asas'),
(280, 44, 2, '2', '2016-08-07 06:35:49', 'sasa'),
(281, 44, 2, '2', '2016-08-07 06:35:51', 'wqwq'),
(282, 44, 2, '2', '2016-08-07 06:36:20', 'zazaq'),
(283, 44, 2, '2', '2016-08-07 06:37:39', 'azaza'),
(284, 44, 0, '2', '2016-08-07 06:49:52', 'fafa'),
(285, 44, 0, '2', '2016-08-07 06:50:39', 'yeyeyy'),
(286, 44, 2, '2', '2016-08-07 06:56:12', 'hahaha'),
(287, 44, 2, '2', '2016-08-07 06:56:22', 'hehhehe'),
(288, 44, 2, '2', '2016-08-07 06:56:43', 'huhuhu'),
(289, 44, 0, '2', '2016-08-07 06:57:13', 'heheheh'),
(290, 44, 0, '2', '2016-08-07 06:57:18', 'huhuh'),
(291, 44, 0, '2', '2016-08-07 07:04:20', 'nyoba'),
(292, 44, 0, '2', '2016-08-07 07:04:36', 'wawaw'),
(293, 42, 2, '1', '2016-08-07 07:33:50', 'wkwkkw'),
(294, 44, 2, '2', '2016-08-07 07:34:24', 'hehhhe'),
(295, 44, 0, '2', '2016-08-07 07:35:08', 'huhuu'),
(296, 44, 0, '2', '2016-08-07 07:35:27', 'wuwuuw'),
(297, 44, 0, '2', '2016-08-07 07:46:54', 'ahhahah'),
(298, 44, 0, '2', '2016-08-07 08:23:26', 'yayayh'),
(299, 44, 0, '2', '2016-08-07 09:28:34', 'yawyaw'),
(300, 44, 0, '2', '2016-08-07 09:32:06', 'wwiiwiw'),
(301, 43, 2, '2', '2016-08-07 22:46:27', 'hehehe'),
(302, 43, 0, '2', '2016-08-07 22:46:37', 'wawaw'),
(303, 43, 0, '2', '2016-08-07 22:46:51', 'awxaw'),
(304, 43, 0, '2', '2016-08-07 22:46:56', 'axsa'),
(305, 43, 0, '2', '2016-08-07 22:49:18', 'dsadsa'),
(306, 43, 0, '2', '2016-08-07 22:52:46', 'saxas'),
(307, 43, 0, '2', '2016-08-07 23:03:50', 'yaya'),
(308, 43, 0, '2', '2016-08-07 23:12:41', 'asa'),
(309, 43, 0, '2', '2016-08-07 23:14:21', 'heyy'),
(310, 43, 0, '2', '2016-08-08 05:58:41', 'wawawa'),
(311, 43, 2, '2', '2016-08-08 05:58:59', 'wuwuuw'),
(312, 43, 0, '2', '2016-08-08 06:02:23', 'wawawa'),
(313, 43, 2, '2', '2016-08-08 06:02:38', 'lalalal'),
(314, 43, 0, '2', '2016-08-08 06:02:56', 'luulu'),
(315, 43, 0, '2', '2016-08-08 06:02:58', 'xaa'),
(316, 43, 0, '2', '2016-08-08 06:03:00', 'waewa'),
(317, 43, 0, '2', '2016-08-08 06:05:14', 'hahaha'),
(318, 43, 0, '2', '2016-08-08 06:05:17', 'hihihi'),
(319, 43, 0, '2', '2016-08-08 06:06:51', 'zaza'),
(320, 43, 2, '2', '2016-08-08 08:42:37', 'wawwaaw'),
(321, 43, 0, '2', '2016-08-08 09:49:09', 'vavvssva'),
(322, 43, 0, '2', '2016-08-08 09:54:17', 'wawwadsadxsa'),
(323, 43, 0, '2', '2016-08-11 14:23:15', 'sayangku'),
(324, 43, 2, '2', '2016-08-11 14:23:38', 'iya sayang'),
(325, 43, 0, '2', '2016-08-12 14:35:32', 'rararara'),
(326, 43, 2, '2', '2016-08-12 14:35:52', 'papappaap'),
(327, 43, 2, '2', '2016-08-22 14:52:35', 'ghgh'),
(328, 43, 0, '2', '2016-08-22 14:53:22', 'heheeh'),
(329, 43, 2, '1', '2016-08-22 15:07:31', 'hahah'),
(330, 46, 0, '1', '2016-08-23 19:11:16', 'dsadsa'),
(331, 47, 0, '1', '2016-08-23 19:38:34', 'yahh'),
(332, 47, 0, '1', '2016-08-23 19:38:51', 'dsadas'),
(333, 47, 0, '1', '2016-08-23 19:39:19', 'mantavv');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(3) NOT NULL,
  `id_admin` int(3) NOT NULL,
  `id_tanya` int(3) NOT NULL,
  `id_pelapor` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_telp` int(15) NOT NULL,
  `no_ktp/sim` varchar(100) NOT NULL,
  `deskripsi_komen` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_admin`, `id_tanya`, `id_pelapor`, `nama`, `no_telp`, `no_ktp/sim`, `deskripsi_komen`, `tanggal`) VALUES
(20, 0, 1, 57, 'rojib', 0, '', 'dhshdas', '2016-08-23 12:44:05'),
(21, 0, 1, 57, 'rojib', 0, '', 'nyoba', '2016-08-23 12:44:05'),
(22, 2, 1, 0, 'admin', 0, '', 'ini baru', '2016-08-23 12:44:05'),
(23, 0, 1, 58, 'fauzi', 2121, '31283129', 'lagiii', '2016-08-23 12:44:05'),
(24, 0, 1, 58, 'fauzi', 2121, '31283129', 'wawa', '2016-08-23 12:44:05'),
(25, 0, 1, 58, 'fauzi', 2121, '31283129', 'wuwuuw', '2016-08-23 12:44:05'),
(26, 0, 1, 58, 'fauzi', 2121, '31283129', 'coba lagi', '2016-08-23 12:44:05'),
(27, 0, 1, 58, 'fauzi', 2121, '31283129', 'geggeeg', '2016-08-23 12:44:05'),
(33, 0, 1, 0, '', 2121, '31283129', 'heheheh', '2016-08-23 12:44:05'),
(34, 0, 1, 0, 'fauzi', 2121, '31283129', 'heheheh', '2016-08-23 12:44:05'),
(35, 0, 1, 0, 'fauzi', 2121, '31283129', 'heheheh', '2016-08-23 12:44:05'),
(36, 0, 1, 58, 'fauzi', 2121, '31283129', 'ayayyaya', '2016-08-23 12:44:05'),
(37, 0, 1, 58, 'fauzi', 2121, '31283129', 'ayayyaya', '2016-08-23 12:44:05'),
(38, 0, 1, 58, 'fauzi', 2121, '31283129', 'ayayyaya', '2016-08-23 12:44:05'),
(39, 0, 1, 58, 'fauzi', 2121, '31283129', 'jajal neh', '2016-08-23 12:44:05'),
(40, 0, 2, 58, 'fauzi', 2121, '31283129', 'yayay', '2016-08-23 12:44:05'),
(41, 2, 1, 0, 'admin', 0, '', 'dsadas', '2016-08-23 12:44:05'),
(42, 0, 2, 64, 'zainn', 32198, '37812739122019', 'siib', '0000-00-00 00:00:00'),
(50, 0, 3, 64, 'zainn', 32198, '37812739122019', 'wawa', '2016-08-23 12:56:10'),
(51, 0, 3, 64, 'zainn', 32198, '37812739122019', 'wawa', '2016-08-23 12:57:16'),
(52, 0, 3, 64, 'zainn', 32198, '37812739122019', 'wawa', '2016-08-23 12:57:57'),
(53, 0, 3, 64, 'zainn', 32198, '37812739122019', 'wawa', '2016-08-23 12:58:55'),
(54, 0, 3, 64, 'zainn', 32198, '37812739122019', 'wawa', '2016-08-23 12:59:52'),
(55, 0, 3, 64, 'zainn', 32198, '37812739122019', 'wawa', '2016-08-23 13:00:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pecandu`
--

CREATE TABLE `pecandu` (
  `id_pecandu` int(3) NOT NULL,
  `id_admin` int(3) NOT NULL,
  `id_pelapor` int(3) NOT NULL,
  `no_rekam_medis` char(50) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_ktp/sim` varchar(25) NOT NULL,
  `nama_ibu` varchar(30) NOT NULL,
  `nama_ayah` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `umur` int(3) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `agama` enum('islam','kristen','katolik','hindhu','budha') NOT NULL,
  `suku` varchar(20) NOT NULL,
  `status_menikah` enum('menikah','belum menikah') NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `alamat_ktp` text NOT NULL,
  `alamat_domisili` text NOT NULL,
  `golongan_darah` enum('O','A','B','AB') NOT NULL,
  `no_telp` int(15) NOT NULL,
  `status` enum('1','2','3') NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pecandu`
--

INSERT INTO `pecandu` (`id_pecandu`, `id_admin`, `id_pelapor`, `no_rekam_medis`, `nama`, `no_ktp/sim`, `nama_ibu`, `nama_ayah`, `tgl_lahir`, `umur`, `jenis_kelamin`, `agama`, `suku`, `status_menikah`, `pekerjaan`, `alamat_ktp`, `alamat_domisili`, `golongan_darah`, `no_telp`, `status`, `tgl`) VALUES
(1, 0, 58, '1900', 'paijem', '7678', 'hjajksb', 'jiojhoi', '2016-08-04', 78, 'laki-laki', 'islam', 'jkkn,m', 'menikah', 'uijlkm,', 'kljnm,', 'klm.,', 'AB', 8798, '1', '2016-08-12 14:28:40'),
(2, 0, 58, '1901', 'rereww', '312312', 'dasdsad', 'sadsadas', '2016-08-12', 32, 'laki-laki', 'islam', 'wqswq', 'menikah', 'swqsq', 'sqw', 'sqswq', 'O', 321321, '2', '2016-08-12 14:28:40'),
(3, 0, 58, '1902', 'ggagag', '362178', 'djkasdnsam', 'dhbnasm', '1993-12-01', 32, 'laki-laki', 'islam', 'dsadas', 'menikah', 'dsadad', 'sadasx', 'saxa', 'A', 432432, '3', '2016-08-12 14:28:40'),
(4, 0, 57, '12', 'sds', '32131', 'fdsfsd', 'fdsfds', '2016-08-09', 32, 'perempuan', 'kristen', 'ewqewq', 'menikah', 'saxsa', 'xsaxsa', 'xsaxsa', 'A', 2343232, '1', '2016-08-16 03:19:37'),
(6, 0, 57, '112', 'sds', '32131', 'fdsfsd', 'fdsfds', '2016-08-09', 32, 'perempuan', 'kristen', 'ewqewq', 'menikah', 'saxsa', 'xsaxsa', 'xsaxsa', 'A', 2343232, '1', '2016-07-15 03:20:22'),
(7, 0, 64, '1903', 'ewqewq', '432423', 'asdas', 'dsada', '2016-08-26', 32, 'laki-laki', 'islam', 'dasdas', 'menikah', 'dsadsa', 'dsadas', 'dsadas', 'A', 432432, '3', '2016-08-23 20:07:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelapor`
--

CREATE TABLE `pelapor` (
  `id_pelapor` int(3) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_pelapor` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` int(15) NOT NULL,
  `no_ktp/sim` varchar(25) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL,
  `social_id` varchar(100) NOT NULL,
  `picture` varchar(250) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelapor`
--

INSERT INTO `pelapor` (`id_pelapor`, `email`, `password`, `nama_pelapor`, `alamat`, `no_telp`, `no_ktp/sim`, `status`, `social_id`, `picture`, `created`) VALUES
(57, 'rojib@fauzi.com', 'admin', 'rojib', '', 321321, '321321', 'aktif', '', '', '0000-00-00 00:00:00'),
(58, 'fauzi@fauzi.com', 'admin', 'fauzi', '', 2121, '31283129', 'aktif', '', '', '0000-00-00 00:00:00'),
(59, 'activitymoney1@gmail.com', 'admin', 'fauzi@fauzi.com', '', 321321, '321321', 'aktif', '', '', '0000-00-00 00:00:00'),
(60, 'ew@add', 'admin', 'dada', '', 232, '321312', 'aktif', '', '', '0000-00-00 00:00:00'),
(61, 'rojib@gmail.com', 'admin', 'wkwkkw', '', 2147483647, '31290839082190', 'aktif', '', '', '0000-00-00 00:00:00'),
(62, 'jajal@gmail.com', 'admin', 'jajal', '', 39821901, '4732874392', 'aktif', '', '', '0000-00-00 00:00:00'),
(63, 'mangkat@gmail.com', 'admin', 'mangkat', '', 832897, '7327392', 'aktif', '', '', '0000-00-00 00:00:00'),
(64, 'zainn@gmail.com', 'admin', 'zainn', '', 32198, '37812739122019', 'aktif', '', '', '0000-00-00 00:00:00'),
(65, 'rojibfauzi@gmail.com', '', 'Rojib Fauzi', '', 0, '', 'aktif', '114976329745033530599', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', '2016-08-28 17:32:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanya_jawab`
--

CREATE TABLE `tanya_jawab` (
  `id_tanya` int(3) NOT NULL,
  `id_pelapor` int(3) NOT NULL,
  `id_admin` int(3) NOT NULL,
  `no_ktp/sim` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tanya_jawab`
--

INSERT INTO `tanya_jawab` (`id_tanya`, `id_pelapor`, `id_admin`, `no_ktp/sim`, `deskripsi`, `tanggal`) VALUES
(1, 57, 0, '321321', 'ini hanya coba', '2016-08-23 12:44:43'),
(2, 58, 0, '31283129', 'jajal', '2016-08-23 12:44:43'),
(3, 64, 0, '37812739122019', 'dsadsa', '2016-08-23 12:49:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `chatting`
--
ALTER TABLE `chatting`
  ADD PRIMARY KEY (`id_chat`),
  ADD KEY `id_pelapor` (`id_pelapor`);

--
-- Indexes for table `detail_chatting`
--
ALTER TABLE `detail_chatting`
  ADD PRIMARY KEY (`id_detail_chat`),
  ADD KEY `id_chat` (`id_chat`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_tanya` (`id_tanya`),
  ADD KEY `id_pelapor` (`id_pelapor`);

--
-- Indexes for table `pecandu`
--
ALTER TABLE `pecandu`
  ADD PRIMARY KEY (`id_pecandu`),
  ADD UNIQUE KEY `no_rekam_medis` (`no_rekam_medis`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_pelapor` (`id_pelapor`);

--
-- Indexes for table `pelapor`
--
ALTER TABLE `pelapor`
  ADD PRIMARY KEY (`id_pelapor`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tanya_jawab`
--
ALTER TABLE `tanya_jawab`
  ADD PRIMARY KEY (`id_tanya`),
  ADD KEY `id_pelapor` (`id_pelapor`),
  ADD KEY `id_admin` (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `chatting`
--
ALTER TABLE `chatting`
  MODIFY `id_chat` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `detail_chatting`
--
ALTER TABLE `detail_chatting`
  MODIFY `id_detail_chat` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=334;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `pecandu`
--
ALTER TABLE `pecandu`
  MODIFY `id_pecandu` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pelapor`
--
ALTER TABLE `pelapor`
  MODIFY `id_pelapor` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `tanya_jawab`
--
ALTER TABLE `tanya_jawab`
  MODIFY `id_tanya` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `chatting`
--
ALTER TABLE `chatting`
  ADD CONSTRAINT `chatting_ibfk_1` FOREIGN KEY (`id_pelapor`) REFERENCES `pelapor` (`id_pelapor`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_chatting`
--
ALTER TABLE `detail_chatting`
  ADD CONSTRAINT `detail_chatting_ibfk_2` FOREIGN KEY (`id_chat`) REFERENCES `chatting` (`id_chat`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_3` FOREIGN KEY (`id_tanya`) REFERENCES `tanya_jawab` (`id_tanya`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pecandu`
--
ALTER TABLE `pecandu`
  ADD CONSTRAINT `pecandu_ibfk_1` FOREIGN KEY (`id_pelapor`) REFERENCES `pelapor` (`id_pelapor`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tanya_jawab`
--
ALTER TABLE `tanya_jawab`
  ADD CONSTRAINT `tanya_jawab_ibfk_2` FOREIGN KEY (`id_pelapor`) REFERENCES `pelapor` (`id_pelapor`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
