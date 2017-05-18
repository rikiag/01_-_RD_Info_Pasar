-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17 Mei 2017 pada 10.36
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `info_pasar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `foto_barang` varchar(50) NOT NULL,
  `harga_sekarang` int(11) NOT NULL,
  `harga_sebelumnya` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `foto_barang`, `harga_sekarang`, `harga_sebelumnya`) VALUES
(1, 'cabai hijau', 'Screenshot (42).png', 4500, 5000),
(2, 'bawang merah', 'bawang-merah.jpg', 2000, 2500),
(3, 'cabai hijau', 'cabai-hijau-1.jpg', 5500, 5000),
(4, 'telur', 'telur.jpg', 1500, 0),
(5, 'ayam', '', 45000, 0),
(7, 'kopi', '4000', 0, 0),
(8, 'susu', '5000', 0, 0),
(9, 'teh', '5000', 0, 0),
(10, 'ksdjh', '10000', 0, 0),
(11, 'bayam', 'Screenshot (50).png', 2500, 0),
(12, 'Riki', '', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_user`
--

CREATE TABLE `barang_user` (
  `no_telp` varchar(15) NOT NULL,
  `id_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_user`
--

INSERT INTO `barang_user` (`no_telp`, `id_barang`) VALUES
('0822', 1),
('0822', 2),
('08123', 3),
('08123', 10),
('08123', 11),
('08123', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `isi_komentar` text NOT NULL,
  `id_barang` int(11) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `isi_komentar`, `id_barang`, `no_telp`) VALUES
(1, 'komentar 1', 2, '0822'),
(2, 'komentar 2', 2, '08123'),
(3, 'komentar barang lain', 1, '08123'),
(6, 'balasan', 2, '0822'),
(7, 'yoo, whats up ??', 2, '0822'),
(13, 'ini foto cabe rawit, bukan cabe merah.', 3, '0822');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasar`
--

CREATE TABLE `pasar` (
  `id_pasar` int(11) NOT NULL,
  `nama_pasar` varchar(50) NOT NULL,
  `alamat_pasar` text NOT NULL,
  `lat` varchar(10) NOT NULL,
  `long` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasar`
--

INSERT INTO `pasar` (`id_pasar`, `nama_pasar`, `alamat_pasar`, `lat`, `long`) VALUES
(1, 'Pasar Tradisional Rukoh', 'Rukoh, Syiah Kuala, Kota Banda Aceh, Aceh 24415', '5.575377', '95.360449'),
(2, 'Pasar Sayur Lamnyong', 'Jl. Teuku Nyak Arief No.23, Lamgugob, Syiah Kuala, Kota Banda Aceh, Aceh 24415, Indonesia', '5.57559263', '95.3544724');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `no_telp` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(50) NOT NULL,
  `level` int(1) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_pasar` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`no_telp`, `nama`, `alamat`, `foto`, `level`, `password`, `id_pasar`) VALUES
('08123', 'Riki Agusnaidi', 'rukoh', '', 1, '08123', 1),
('081234', 'Riki', 'rukoh', '', 1, '08123', 0),
('0822', 'Ilham', 'Banda Aceh', '', 1, '0822', 2),
('1234', 'yusran', 'peurada', 'images/BLS-01.jpg', 2, '1234', 0),
('45', 'andre', 'rukoh', 'images/naruto_shippuden_sasuke.png', 3, '45', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `barang_user`
--
ALTER TABLE `barang_user`
  ADD KEY `no_telp` (`no_telp`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `no_telp` (`no_telp`);

--
-- Indexes for table `pasar`
--
ALTER TABLE `pasar`
  ADD PRIMARY KEY (`id_pasar`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`no_telp`),
  ADD KEY `user_ibfk_1` (`id_pasar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pasar`
--
ALTER TABLE `pasar`
  MODIFY `id_pasar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang_user`
--
ALTER TABLE `barang_user`
  ADD CONSTRAINT `barang_user_ibfk_1` FOREIGN KEY (`no_telp`) REFERENCES `user` (`no_telp`),
  ADD CONSTRAINT `barang_user_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`no_telp`) REFERENCES `user` (`no_telp`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
