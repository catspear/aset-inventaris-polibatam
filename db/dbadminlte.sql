-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jul 2022 pada 06.52
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbadminlte`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `kondisi` varchar(10) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `tgl_rekam` date NOT NULL,
  `tgl_perolehan` date NOT NULL,
  `nilai_perolehan` int(11) NOT NULL,
  `ruangan` varchar(10) NOT NULL,
  `img_qrcode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `inventory`
--

INSERT INTO `inventory` (`id`, `kode_barang`, `nama_barang`, `kondisi`, `merk`, `tgl_rekam`, `tgl_perolehan`, `nilai_perolehan`, `ruangan`, `img_qrcode`) VALUES
(1, '3100102002', 'Laptop', 'Baik', 'MGN63ID A-Macbook air-Space Grey', '2021-06-16', '2021-06-11', 1550000, '704', ''),
(2, '3100102003', 'Meja Panjang', 'Baik', 'IKEA', '2021-06-19', '2021-06-10', 3000000, '707', ''),
(3, '3100102004', 'Laptop', 'Baik', 'Asus ROG', '2022-06-09', '2022-06-05', 120000000, '704', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbuser`
--

CREATE TABLE `tbuser` (
  `iduser` varchar(6) NOT NULL,
  `namauser` varchar(50) NOT NULL,
  `setatus` varchar(50) NOT NULL,
  `pasword` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbuser`
--

INSERT INTO `tbuser` (`iduser`, `namauser`, `setatus`, `pasword`) VALUES
('SBUM02', 'Fariz', 'Admin', 'SBUM02'),
('SBUM03', 'Deni', 'Karyawan', 'SBUM03'),
('SBUM04', 'Billy', 'Karyawan', 'SBUM04');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
