-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jan 2019 pada 10.41
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mager1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `histori`
--

CREATE TABLE `histori` (
  `id_file` varchar(10) NOT NULL,
  `dokumen` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `warna` int(50) NOT NULL,
  `hitam` int(50) NOT NULL,
  `telpon` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `histori`
--

INSERT INTO `histori` (`id_file`, `dokumen`, `nama`, `warna`, `hitam`, `telpon`, `tanggal`, `status`) VALUES
('001', 'Bahasa Inggris', 'Citra N', 0, 0, 0, '0000-00-00', 'Diterima'),
('002', 'diaaanti', 'dianti', 0, 0, 0, '2018-12-18', 'pending'),
('', 'sudiroh', 'sudiroh', 0, 0, 0, '2018-12-18', 'diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_user`
--

CREATE TABLE `list_user` (
  `id_file` varchar(30) NOT NULL,
  `nim` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(100) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `list_user`
--

INSERT INTO `list_user` (`id_file`, `nim`, `nama`, `harga`, `status`) VALUES
('005', '1703001', 'bunga', 15000, 'Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `upload`
--

CREATE TABLE `upload` (
  `id_upload` int(3) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_upload` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `berwarna` int(50) NOT NULL,
  `hitamputih` int(50) NOT NULL,
  `jumlahtotal` int(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `hits` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `upload`
--

INSERT INTO `upload` (`id_upload`, `nama_file`, `deskripsi`, `tgl_upload`, `nama`, `berwarna`, `hitamputih`, `jumlahtotal`, `status`, `hits`) VALUES
(1, 'Membuat Login Dengan PHP dan MySQL MD5 - Malas Ngoding.html', 'asdsadsa', '2018-12-16', '', 0, 0, 0, '', 0),
(7, 'Pre-test full.pdf', 'aaa', '2018-12-25', '', 0, 0, 0, '', 0),
(8, 'Pre-test full.pdf', 'aa', '2018-12-26', '', 0, 0, 0, '', 0),
(9, 'Pre-test full(latihan 2)-1.pdf', 'sada', '2018-12-26', '', 0, 0, 0, '', 0),
(10, 'Screenshot (1).png', '111', '2018-12-26', 'sda', 11, 11, 0, '', 0),
(11, 'Part_4 JavaScript.pdf', '2', '2018-12-26', 'agus', 2, 2, 0, '', 0),
(12, 'Part_4 JavaScript.pdf', '1', '2018-12-26', 'coba', 1, 1, 0, '', 0),
(15, '63-wallpaper-baymax-terpopuler.jpg', 'tolong print kan', '2019-01-01', 'agus riyadi', 100, 100, 0, '', 0),
(16, '63-wallpaper-baymax-terpopuler.jpg', 'Tolong Print yang bagus ya', '2019-01-02', 'Ono Men', 10, 5, 12500, '', 0),
(17, '63-wallpaper-baymax-terpopuler.jpg', 'Edisi Dewasa', '2019-01-02', 'Dimas', 190, 10, 195000, 'Menunggu', 0),
(18, 'pertemuan 2 Aplikasi microprocessor.pdf', '123456', '2019-01-02', 'DSAD', 123, 122, 184000, 'Menunggu', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `kelas` varchar(30) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'default.svg',
  `level` varchar(30) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `name`, `nim`, `kelas`, `nohp`, `photo`, `level`) VALUES
(9, 'admin', 'admin@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'admin', '0', '', '', 'default.svg', 'admin'),
(20, 'dianti', 'dianti@gmail.com', '$2y$10$acIJpKAQe/XcwRGfKlSN4.va8Vu8ZXwtEOUnCnMjHmts7g4GueTd.', 'dianti', '1703026', '1703026', '09876789087', 'default.svg', 'user'),
(21, 'sudiroh', 'sudiroh@gmail.com', '$2y$10$3jbir9tdqilPVEcATrFVpeFIG5syZOmtyj6W8G/vJDHL7M5BfvE4u', 'sudiroh', '1702820', '1702820', '0878373837', 'default.svg', 'user'),
(28, 'agus', 'a@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 'agus', 'a', 'a', '1', 'default.svg', 'user'),
(29, 'alipada', 'ad', 'ada', 'da', 'dada', 'da', 'dad', 'default.svg', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id_upload`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `upload`
--
ALTER TABLE `upload`
  MODIFY `id_upload` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
