-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2019 pada 01.38
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_desainsita`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_a`
--

CREATE TABLE `tbl_a` (
  `no` int(11) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `photo` mediumtext NOT NULL,
  `judul` mediumtext NOT NULL,
  `isi` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_a`
--

INSERT INTO `tbl_a` (`no`, `tanggal`, `photo`, `judul`, `isi`) VALUES
(2, '2019-06-15', '0daf11ce15a891e38a7a48d6cbe89f8e.JPG', 'aa', 'askldlaskd'),
(3, '2019-06-14', 'e4f8b5bbd0a6d3eb98646ef75f69ad93.JPG', 'qwqe', 'saldkjalskdjlkas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `no` int(11) NOT NULL,
  `photo` mediumtext NOT NULL,
  `judul` mediumtext NOT NULL,
  `isi` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`no`, `photo`, `judul`, `isi`) VALUES
(4, '4a3ab90fedc6e770a75f35a2665edf54.jpg', 'BACHTIAR FIRDAUS', 'SALAH SATU ANGGOTA DEWAN GANTENG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_b`
--

CREATE TABLE `tbl_b` (
  `no` int(11) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `photo` mediumtext NOT NULL,
  `judul` mediumtext NOT NULL,
  `isi` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_b`
--

INSERT INTO `tbl_b` (`no`, `tanggal`, `photo`, `judul`, `isi`) VALUES
(2, '2019-06-06', 'aec5592db6d9243298ea68545b28dde8.JPG', 'qwqe', 'daus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_k`
--

CREATE TABLE `tbl_k` (
  `no` int(11) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `photo` mediumtext NOT NULL,
  `judul` mediumtext NOT NULL,
  `isi` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_k`
--

INSERT INTO `tbl_k` (`no`, `tanggal`, `photo`, `judul`, `isi`) VALUES
(22, '2019-06-05', 'ead2c1b7092ff3c9629ce520d6b4ae47.JPG', 'judulnya', 'daus ganteng');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_komentar`
--

CREATE TABLE `tbl_komentar` (
  `no` int(11) NOT NULL,
  `kd_komentar` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(100) NOT NULL,
  `isikomentar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_komentar`
--

INSERT INTO `tbl_komentar` (`no`, `kd_komentar`, `tanggal`, `nama`, `isikomentar`) VALUES
(32, '3tbl_a', '2019-06-28', 'daus', 'jelek'),
(33, '22tbl_k', '2019-06-28', 'ganteng', 'banget'),
(34, '2tbl_b', '2019-06-28', 'days', '2'),
(35, '2tbl_p', '2019-06-28', 'daus', 'ganteng banget'),
(36, '2tbl_p', '2019-06-28', 'dayat', 'beler'),
(37, '2tbl_a', '2019-06-28', 'daus', 'daus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_p`
--

CREATE TABLE `tbl_p` (
  `no` int(11) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `photo` mediumtext NOT NULL,
  `judul` mediumtext NOT NULL,
  `isi` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_p`
--

INSERT INTO `tbl_p` (`no`, `tanggal`, `photo`, `judul`, `isi`) VALUES
(2, '2019-06-08', '16869217d29e63c9a180c27d42ca9676.JPG', 'daus', 'daus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus gantengdaus ganteng');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_saran`
--

CREATE TABLE `tbl_saran` (
  `no` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(100) NOT NULL,
  `isisaran` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_saran`
--

INSERT INTO `tbl_saran` (`no`, `tanggal`, `nama`, `isisaran`) VALUES
(1, '2019-06-06', '2', '3'),
(2, '2019-06-28', '1', '2'),
(3, '2019-07-03', 'daus', 'ganteng banget');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_a`
--
ALTER TABLE `tbl_a`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `tbl_b`
--
ALTER TABLE `tbl_b`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `tbl_k`
--
ALTER TABLE `tbl_k`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `tbl_p`
--
ALTER TABLE `tbl_p`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `tbl_saran`
--
ALTER TABLE `tbl_saran`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_a`
--
ALTER TABLE `tbl_a`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_b`
--
ALTER TABLE `tbl_b`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_k`
--
ALTER TABLE `tbl_k`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tbl_p`
--
ALTER TABLE `tbl_p`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_saran`
--
ALTER TABLE `tbl_saran`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
