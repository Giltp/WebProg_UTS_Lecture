-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Okt 2023 pada 16.52
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoranif330`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `email_admin` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`email_admin`, `full_name`, `password`) VALUES
('admin@gmail.com', 'Administrator', 'e3afed0047b08059d0fada10f400c1e5'),
('tsbpakpahan@gmail.com', 'Gilbert Parluhutan Pakpahan', 'b3233e86e17f1e25e6cc3d7176835825');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(6, 'Dessert', 'Food_Category_766.jpeg', 'Yes', 'Yes'),
(7, 'Lauk', 'Food_Category_776.jpeg', 'Yes', 'Yes'),
(8, 'Minuman', 'Food_Category_471.jpeg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(10) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `harga` decimal(10,0) DEFAULT NULL,
  `deskripsi` varchar(30) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `id_kategori` int(10) UNSIGNED DEFAULT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama`, `harga`, `deskripsi`, `gambar`, `id_kategori`, `featured`, `active`) VALUES
(4, 'Brownies', 23000, 'Brownies Coklat', 'Food-Name-5529.jpeg', 6, 'Yes', 'Yes'),
(5, 'Ramen', 25000, 'Ramen khas Jepang', 'Food-Name-7923.jpeg', 7, 'Yes', 'Yes'),
(6, 'Milk', 8000, 'Susu putih sehat ', 'Food-Name-4073.jpeg', 6, 'Yes', 'Yes'),
(7, 'Croissants', 15000, 'Croissants ala France', 'Food-Name-9924.jpeg', 6, 'Yes', 'Yes'),
(8, 'Orange Juice', 5000, 'Refreshing Orange Juice', 'Food-Name-1044.jpeg', 8, 'Yes', 'Yes'),
(9, 'Biryani Rice', 30000, 'Delicious Afternoon Food', 'Food-Name-4709.jpeg', 7, 'Yes', 'No'),
(10, 'Ice Cream', 8000, 'Yummy Ice Cream', 'Food-Name-7430.jpeg', 6, 'Yes', 'Yes'),
(11, 'Beef Rendang', 30000, 'Delicious Beef Rendang', 'Food-Name-2363.jpeg', 6, 'Yes', 'No'),
(12, 'Cofee', 10000, 'Energizing Coffee', 'Food-Name-6123.jpeg', 8, 'No', 'Yes'),
(13, 'Pancake', 15000, 'Crunchy Pancake', 'Food-Name-7643.jpeg', 6, 'Yes', 'Yes'),
(14, 'Fried Rice', 10000, 'Nostalgia Fried Rice', 'Food-Name-150.jpeg', 7, 'No', 'Yes'),
(15, 'Pie', 12000, 'Ate A Pie', 'Food-Name-183.jpeg', 6, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `email` varchar(15) NOT NULL,
  `email_admin` varchar(15) NOT NULL,
  `id_menu` int(10) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `email` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_depan` varchar(15) DEFAULT NULL,
  `nama_belakang` varchar(15) DEFAULT NULL,
  `tanggal_lahir` varchar(15) DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`email`, `password`, `nama_depan`, `nama_belakang`, `tanggal_lahir`, `alamat`) VALUES
('glbrtpkphn@gmail.com', '$2y$10$eZDR8l.rnPwLkTrG/gFa6ONupCjlFh5aOTrQCko.T9vHq4HeHhojq', 'Gilbert', 'Pakpahan', '2023-10-24', 'Jl. Olah Raga VIII No.9, RT.11');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email_admin`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`email`,`email_admin`,`id_menu`) USING BTREE,
  ADD UNIQUE KEY `id_menu` (`id_menu`),
  ADD KEY `email_admin` (`email_admin`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `email` FOREIGN KEY (`email`) REFERENCES `user` (`email`),
  ADD CONSTRAINT `email_admin` FOREIGN KEY (`email_admin`) REFERENCES `admin` (`email_admin`),
  ADD CONSTRAINT `id_menu` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
