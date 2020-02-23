-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Feb 2020 pada 14.48
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pv_kasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_pesanan` varchar(20) NOT NULL,
  `admin_pesanan` varchar(50) NOT NULL,
  `nama_pesanan` varchar(50) NOT NULL,
  `harga_pesanan` int(20) NOT NULL,
  `banyak_pesanan` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` int(20) NOT NULL,
  `stok_produk` int(20) NOT NULL,
  `total_produk` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `stok_produk`, `total_produk`) VALUES
('GRG001', 'Gorengan', 750, 100, 0),
('NSBKS001', 'Nasi Bungkus', 8000, 100, 0),
('NSGR001', 'Nasi Goreng', 10000, 100, 0),
('SATE001', 'Sate', 1000, 200, 0),
('TELOR001', 'Telor', 2500, 200, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat`
--

CREATE TABLE `riwayat` (
  `no_pesanan` int(11) NOT NULL,
  `admin_pesanan` varchar(50) NOT NULL,
  `total_pesanan` int(11) NOT NULL,
  `tanggal_pesanan` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `riwayat`
--

INSERT INTO `riwayat` (`no_pesanan`, `admin_pesanan`, `total_pesanan`, `tanggal_pesanan`) VALUES
(1, 'AYoKYa', 10000, '2020-02-22'),
(2, 'AYoKYa', 18000, '2020-02-22'),
(3, 'AYoKYa', 18750, '2020-02-22'),
(4, 'AYoKYa', 750, '2020-02-22'),
(5, 'aYoKYa', 19750, '2020-02-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_acces` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `password`, `user_acces`) VALUES
(34, 'AYoKYa', 'yogiekaprastiya1@gmail.com', '$2y$10$zs7r/9uxzDpa9nNJGti4Q.BWyB.nLHTYQ45FjZgfxEvJTdNsnWYL6', 1),
(37, 'yokya1', 'mita1@gmail.com', '$2y$10$8qnVb8tmyfqFq/cm6uguweGrVDGae6p2UHJVGpGmn7qYHtQUA60gq', 0),
(39, 'yokya2', 'mita@gmail.com', '$2y$10$KVEdLo3nEKqLVqQTMsn/eOiMeujfFlURI0luh/SnX0Yqs3cwQt4dm', 0),
(40, 'yokya3', 'yogi@gmail.com', '$2y$10$Bq75vAursQ/btOvajfZK..DBHhGILibQvxuW6lkkPon8JvOj/nIu2', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD KEY `admin_pesanan` (`admin_pesanan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`no_pesanan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `no_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
