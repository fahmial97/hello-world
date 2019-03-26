-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Mar 2019 pada 14.01
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ruang_diskusi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data_peminjam`
--

CREATE TABLE `tb_data_peminjam` (
  `id_peminjam` int(12) NOT NULL,
  `nama_peminjam` varchar(30) NOT NULL,
  `nim_peminjam` varchar(15) NOT NULL,
  `no_telpon_peminjam` int(14) NOT NULL,
  `id_pesan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mhs`
--

CREATE TABLE `tb_mhs` (
  `nim` int(13) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `fakultas` varchar(30) NOT NULL,
  `no_telpon` int(13) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(12) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ruang`
--

CREATE TABLE `tb_ruang` (
  `id` int(11) NOT NULL,
  `image` varchar(256) NOT NULL,
  `no_ruang` varchar(12) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_ruang`
--

INSERT INTO `tb_ruang` (`id`, `image`, `no_ruang`, `status`) VALUES
(1, 'ruang.jpg', 'A-601', 1),
(5, 'default.jpg', 'A-602', 1),
(6, 'default.jpg', 'A-6087', 1),
(7, 'default.jpg', 'A-6012', 2),
(8, 'default.jpg', 'A-603', 1),
(9, 'default.jpg', 'A-603', 12),
(10, 'default.jpg', '512', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nim`, `nama`, `fakultas`, `email`, `no_telpon`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(8, '41515010118', 'Muhammad Fahmissurur', 'Fasilkom', 'akungugel1990@gmail.com', '0898981212', 'default.jpg', '$2y$10$Q.VCcGJ9sgugAjxAd2rbHOaFERf7j7vRSFyz3VSAUfKXq5U4IWdMO', 2, 1, 1552553131),
(10, '41515010120', 'Joko driyono', 'Fasilkom', 'akunakun@gmail.com', '0898912812', 'default.jpg', '$2y$10$HPT7kC6BtQ5dZIopfJb6HuF0CsRZVh74H2kW220ifHNSbGB7/adj2', 2, 1, 1552554897),
(11, '41515010077', 'madzar maulana rizaldi', 'Fasilkom', 'madzarmr@gmail.com', '0898912812', 'default.jpg', '$2y$10$nBoA0KD147dNe/wRXt3euu6/ZgoRMXzZAvDrE3Bcmp82Hg66pUpkq', 2, 1, 1552975621),
(12, '41515010100', 'Muhammad Zikri Hasanudin khairul anwar jainudin naciro Al-batawie', 'fasilkom', 'emailjanidun@gmail.com', '0898923911', 'default.jpg', '$2y$10$Lb4byBvRep8GQ6jkoYOka.3d1O3pk6K3ElM868rIimnVNLqZ9nY6O', 2, 1, 1553435818),
(13, '41515010119', 'tes123', 'Fasilkom', 'tes123@gmail.com', '08989307122', 'default.jpg', '$2y$10$Jy08riRJMNP4cQ3DTqWTEu39ewl/sdlCZ0O9kS0wse.P5UG1CJjoG', 2, 1, 1553520821);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_data_peminjam`
--
ALTER TABLE `tb_data_peminjam`
  ADD PRIMARY KEY (`id_peminjam`),
  ADD KEY `nama_peminjam` (`nama_peminjam`);

--
-- Indeks untuk tabel `tb_mhs`
--
ALTER TABLE `tb_mhs`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tb_ruang`
--
ALTER TABLE `tb_ruang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_ruang`
--
ALTER TABLE `tb_ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
