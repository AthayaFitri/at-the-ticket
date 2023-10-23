-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Apr 2022 pada 18.21
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `nama_kota` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`) VALUES
(2, 'Bandung'),
(1, 'Jakarta'),
(3, 'Makassar'),
(4, 'Surabaya'),
(5, 'Yogyakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'admin'),
(2, 'users');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rute`
--

CREATE TABLE `rute` (
  `id_rute` int(11) NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `tanggal_sampai` date NOT NULL,
  `waktu_berangkat` time NOT NULL,
  `waktu_sampai` time NOT NULL,
  `nama_tempat_berangkat` varchar(255) NOT NULL,
  `nama_tempat_sampai` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_transportasi` int(11) NOT NULL,
  `id_transportasi_tipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rute`
--

INSERT INTO `rute` (`id_rute`, `tanggal_berangkat`, `tanggal_sampai`, `waktu_berangkat`, `waktu_sampai`, `nama_tempat_berangkat`, `nama_tempat_sampai`, `harga`, `id_transportasi`, `id_transportasi_tipe`) VALUES
(7, '2022-05-05', '2022-05-05', '16:05:00', '18:15:00', 'Juanda', 'Soekarno Hatta', 3000000, 1, 1),
(8, '2022-04-30', '2022-04-30', '22:45:00', '23:40:00', 'Hasanuddin', 'Husein Sastranegara', 500000, 1, 1),
(9, '2022-05-01', '2022-05-01', '08:30:00', '10:00:00', 'Husein Sastranegara', 'Adisutjipto', 960000, 1, 1),
(10, '2022-05-02', '2022-05-02', '11:45:00', '13:50:00', 'Soekarno Hatta', 'Juanda', 800000, 1, 1),
(12, '2022-05-03', '2022-05-03', '06:10:00', '09:15:00', 'Adisutjipto', 'Hasanuddin', 1500000, 4, 1),
(13, '2022-05-04', '2022-05-04', '10:45:00', '14:10:00', 'Padalarang', 'Parangloe', 2500000, 9, 2),
(14, '2022-05-06', '2022-05-06', '04:20:00', '05:21:00', 'Parangloe', 'Pasar Turi', 950000, 10, 2),
(15, '2022-05-07', '2022-05-07', '14:00:00', '17:45:00', 'Pasar Turi', 'Tugu', 1200000, 11, 2),
(16, '2022-05-08', '2022-05-09', '09:40:00', '03:35:00', 'Tugu', 'Padalarang', 1250000, 12, 2),
(17, '2022-05-07', '2022-05-07', '11:40:00', '14:30:00', 'Padalarang', 'Pasar Turi', 550000, 16, 2),
(18, '2022-05-02', '2022-05-02', '11:45:00', '14:45:00', 'Adisutjipto', 'Soekarno Hatta', 1500000, 4, 1),
(19, '2022-05-03', '2022-05-03', '15:15:00', '17:20:00', 'Husein Sastranegara', 'Soekarno Hatta', 1250000, 15, 1),
(21, '2022-05-03', '2022-05-03', '11:20:00', '14:40:00', 'Hasanuddin', 'Juanda', 1350000, 5, 1),
(22, '2022-05-03', '2022-05-03', '14:10:00', '19:35:00', 'Pasar Turi', 'Tugu', 210000, 8, 2),
(23, '2022-05-04', '2022-05-04', '08:15:00', '11:55:00', 'Tugu', 'Sudirman', 350000, 10, 2),
(24, '2022-05-04', '2022-05-04', '09:20:00', '11:50:00', 'Juanda', 'Hasanuddin', 1500000, 7, 1),
(26, '2022-05-06', '2022-05-06', '17:20:00', '19:15:00', 'Hasanuddin', 'Husein Sastranegara', 1350000, 7, 1),
(27, '2022-05-05', '2022-05-05', '16:40:00', '20:15:00', 'Hasanuddin', 'Juanda', 750000, 4, 1),
(28, '2022-05-06', '2022-05-06', '11:35:00', '14:40:00', 'Pasar Turi', 'Tugu', 475000, 16, 2),
(29, '2022-05-07', '2022-05-07', '08:10:00', '11:20:00', 'Hasanuddin', 'Husein Sastranegara', 675000, 14, 1),
(30, '2022-05-05', '2022-05-05', '13:15:00', '15:45:00', 'Padalarang', 'Parangloe', 825000, 9, 2),
(31, '2022-05-03', '2022-05-03', '09:45:00', '14:10:00', 'Sudirman', 'Parangloe', 650000, 12, 2),
(32, '2022-06-01', '2022-05-01', '18:45:00', '21:25:00', 'Pasar Turi', 'Tugu', 550000, 11, 2),
(33, '2022-05-07', '2022-05-07', '07:50:00', '10:50:00', 'Soekarno Hatta', 'Adisutjipto', 875000, 1, 1),
(34, '2022-05-06', '2022-05-06', '09:15:00', '17:45:00', 'Sudirman', 'Parangloe', 650000, 12, 2),
(35, '2022-04-30', '2022-04-30', '22:45:00', '23:40:00', 'Hasanuddin', 'Husein Sastranegara', 500000, 5, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempat`
--

CREATE TABLE `tempat` (
  `nama_tempat` varchar(255) NOT NULL,
  `kode_tempat` varchar(3) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `id_transportasi_tipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tempat`
--

INSERT INTO `tempat` (`nama_tempat`, `kode_tempat`, `id_kota`, `id_transportasi_tipe`) VALUES
('Adisutjipto', 'ADS', 5, 1),
('Hasanuddin', 'UPG', 3, 1),
('Husein Sastranegara', 'HST', 2, 1),
('Juanda', 'JND', 4, 1),
('Padalarang', 'PDL', 2, 2),
('Parangloe', 'PRL', 3, 2),
('Pasar Turi', 'PTR', 4, 2),
('Soekarno Hatta', 'CGK', 1, 1),
('Soekarno Hattat', 'eee', 2, 1),
('Sudirman', 'SDR', 1, 2),
('Tugu', 'STG', 5, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transportasi`
--

CREATE TABLE `transportasi` (
  `id_transportasi` int(11) NOT NULL,
  `kode_transportasi` varchar(255) NOT NULL,
  `nama_transportasi` varchar(255) NOT NULL,
  `id_transportasi_kelas` int(11) NOT NULL,
  `id_transportasi_tipe` int(11) NOT NULL,
  `jumlah_kursi` int(11) NOT NULL,
  `id_transportasi_perusahaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transportasi`
--

INSERT INTO `transportasi` (`id_transportasi`, `kode_transportasi`, `nama_transportasi`, `id_transportasi_kelas`, `id_transportasi_tipe`, `jumlah_kursi`, `id_transportasi_perusahaan`) VALUES
(1, 'GA-187', 'Airbus A330-200', 12, 1, 80, 22),
(4, 'BA-162', 'Boeing 737', 12, 1, 78, 15),
(5, 'LA-194', 'Airbus A320', 15, 1, 98, 16),
(6, 'CI-232', 'ATR 72', 15, 1, 86, 17),
(7, 'NM-145', 'Boeing 747', 17, 1, 80, 30),
(8, 'ARW-92', 'Argo Wilis', 12, 2, 180, 19),
(9, 'GJ-125', 'Gajayana', 16, 2, 120, 24),
(10, 'TK-285', 'Taksaka', 18, 2, 145, 25),
(11, 'LD-112', 'Lodaya', 19, 2, 200, 26),
(12, 'SC-224', 'Sancaka', 15, 2, 100, 27),
(13, 'WA-372', 'Boeing 787', 17, 1, 85, 1),
(14, 'RA-412', ' ATR 72', 19, 1, 90, 18),
(15, 'SR-128', 'Boeing 787', 17, 1, 92, 29),
(16, 'ARL-94', 'Argo Lawu', 19, 2, 150, 28),
(19, 'GA-188', 'Boeing 737', 15, 1, 98, 22),
(20, 'WA-373', 'ATR 72', 13, 1, 78, 1),
(21, 'BA-163', 'Airbus A320', 19, 1, 80, 15),
(23, 'CI-233', 'Boeing 787', 17, 1, 94, 17),
(24, 'SR-127', 'Airbus A330-200', 12, 1, 89, 29),
(25, 'TK-286', 'Taksaka', 19, 2, 120, 25),
(26, 'GJ-127', 'Gajayana', 12, 2, 142, 24),
(27, 'LD-113', 'Lodaya', 18, 2, 115, 26),
(28, 'ARW-93', 'Argo Wilis', 21, 2, 125, 19),
(29, 'NM-146', 'Airbus A320', 13, 1, 88, 30),
(30, 'SC-225', 'Sancaka', 13, 2, 110, 27);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transportasi_kelas`
--

CREATE TABLE `transportasi_kelas` (
  `id_transportasi_kelas` int(11) NOT NULL,
  `id_transportasi_tipe` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transportasi_kelas`
--

INSERT INTO `transportasi_kelas` (`id_transportasi_kelas`, `id_transportasi_tipe`, `nama_kelas`) VALUES
(12, 2, 'Bisnis'),
(13, 1, 'Bisnis'),
(15, 1, 'Premium'),
(16, 2, 'Premium'),
(17, 1, 'First'),
(18, 2, 'Eksekutif'),
(19, 1, 'Ekonomi'),
(21, 2, 'Ekonomi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transportasi_perusahaan`
--

CREATE TABLE `transportasi_perusahaan` (
  `id_transportasi_perusahaan` int(11) NOT NULL,
  `id_transportasi_tipe` int(11) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `logo_perusahaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transportasi_perusahaan`
--

INSERT INTO `transportasi_perusahaan` (`id_transportasi_perusahaan`, `id_transportasi_tipe`, `nama_perusahaan`, `logo_perusahaan`) VALUES
(1, 1, 'Wings Air', 'wingsair.png'),
(15, 1, 'Batik Air', 'batikair.png'),
(16, 1, 'Lion Air', 'lionair.png'),
(17, 1, 'Citilink', 'citilink.png'),
(18, 2, 'Railink', 'railink.png'),
(19, 2, 'Argo Wilis', 'argowilis.jpeg'),
(22, 1, 'Garuda Indonesia', 'garudaindonesia.png'),
(24, 2, 'Gajayana', 'gajayana.jpg'),
(25, 2, 'Taksaka', 'taksaka.png'),
(26, 2, 'Lodaya', 'lodaya.png'),
(27, 2, 'Sancaka', 'sancaka.png'),
(28, 2, 'Argo Lawu', 'argolawu.jpg'),
(29, 1, 'Sriwijaya Air', 'sriwijaya.png'),
(30, 1, 'NAM Air', 'nam.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transportasi_tipe`
--

CREATE TABLE `transportasi_tipe` (
  `id_transportasi_tipe` int(11) NOT NULL,
  `nama_tipe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transportasi_tipe`
--

INSERT INTO `transportasi_tipe` (`id_transportasi_tipe`, `nama_tipe`) VALUES
(1, 'Pesawat'),
(2, 'Kereta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `username`, `email`, `password`, `id_level`) VALUES
(1, 'admin', '', 'eda7b631ed23704be6ae1816cd52121b', 1),
(7, 'athaya', 'athayarizqiafitriani@gmail.com', 'a16de7cdbd5366a23317508a463abaf0', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`),
  ADD UNIQUE KEY `nama_kota` (`nama_kota`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id_rute`),
  ADD KEY `id_transportasi` (`id_transportasi`),
  ADD KEY `id_transportasi_tipe` (`id_transportasi_tipe`),
  ADD KEY `nama_tempat_berangkat` (`nama_tempat_berangkat`),
  ADD KEY `nama_tempat_sampai` (`nama_tempat_sampai`);

--
-- Indeks untuk tabel `tempat`
--
ALTER TABLE `tempat`
  ADD PRIMARY KEY (`nama_tempat`),
  ADD KEY `id_kota` (`id_kota`),
  ADD KEY `id_transportasi_tipe` (`id_transportasi_tipe`);

--
-- Indeks untuk tabel `transportasi`
--
ALTER TABLE `transportasi`
  ADD PRIMARY KEY (`id_transportasi`),
  ADD UNIQUE KEY `kode_transportasi` (`kode_transportasi`),
  ADD KEY `id_transportasi_tipe` (`id_transportasi_tipe`),
  ADD KEY `id_transportasi_kelas` (`id_transportasi_kelas`),
  ADD KEY `id_transportasi_perusahaan` (`id_transportasi_perusahaan`);

--
-- Indeks untuk tabel `transportasi_kelas`
--
ALTER TABLE `transportasi_kelas`
  ADD PRIMARY KEY (`id_transportasi_kelas`),
  ADD KEY `id_transportasi_tipe` (`id_transportasi_tipe`);

--
-- Indeks untuk tabel `transportasi_perusahaan`
--
ALTER TABLE `transportasi_perusahaan`
  ADD PRIMARY KEY (`id_transportasi_perusahaan`),
  ADD UNIQUE KEY `nama_transportasi_perusahaan` (`nama_perusahaan`),
  ADD KEY `id_transportasi_tipe` (`id_transportasi_tipe`);

--
-- Indeks untuk tabel `transportasi_tipe`
--
ALTER TABLE `transportasi_tipe`
  ADD PRIMARY KEY (`id_transportasi_tipe`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `rute`
--
ALTER TABLE `rute`
  MODIFY `id_rute` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `transportasi`
--
ALTER TABLE `transportasi`
  MODIFY `id_transportasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT untuk tabel `transportasi_kelas`
--
ALTER TABLE `transportasi_kelas`
  MODIFY `id_transportasi_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `transportasi_perusahaan`
--
ALTER TABLE `transportasi_perusahaan`
  MODIFY `id_transportasi_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `transportasi_tipe`
--
ALTER TABLE `transportasi_tipe`
  MODIFY `id_transportasi_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `rute`
--
ALTER TABLE `rute`
  ADD CONSTRAINT `rute_ibfk_1` FOREIGN KEY (`id_transportasi`) REFERENCES `transportasi` (`id_transportasi`),
  ADD CONSTRAINT `rute_ibfk_2` FOREIGN KEY (`id_transportasi_tipe`) REFERENCES `transportasi_tipe` (`id_transportasi_tipe`),
  ADD CONSTRAINT `rute_ibfk_3` FOREIGN KEY (`id_transportasi`) REFERENCES `transportasi` (`id_transportasi`),
  ADD CONSTRAINT `rute_ibfk_4` FOREIGN KEY (`id_transportasi_tipe`) REFERENCES `transportasi_tipe` (`id_transportasi_tipe`),
  ADD CONSTRAINT `rute_ibfk_5` FOREIGN KEY (`nama_tempat_berangkat`) REFERENCES `tempat` (`nama_tempat`),
  ADD CONSTRAINT `rute_ibfk_6` FOREIGN KEY (`nama_tempat_sampai`) REFERENCES `tempat` (`nama_tempat`);

--
-- Ketidakleluasaan untuk tabel `tempat`
--
ALTER TABLE `tempat`
  ADD CONSTRAINT `tempat_ibfk_1` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`),
  ADD CONSTRAINT `tempat_ibfk_2` FOREIGN KEY (`id_transportasi_tipe`) REFERENCES `transportasi_tipe` (`id_transportasi_tipe`);

--
-- Ketidakleluasaan untuk tabel `transportasi`
--
ALTER TABLE `transportasi`
  ADD CONSTRAINT `transportasi_ibfk_1` FOREIGN KEY (`id_transportasi_tipe`) REFERENCES `transportasi_tipe` (`id_transportasi_tipe`),
  ADD CONSTRAINT `transportasi_ibfk_2` FOREIGN KEY (`id_transportasi_tipe`) REFERENCES `transportasi_tipe` (`id_transportasi_tipe`),
  ADD CONSTRAINT `transportasi_ibfk_3` FOREIGN KEY (`id_transportasi_kelas`) REFERENCES `transportasi_kelas` (`id_transportasi_kelas`),
  ADD CONSTRAINT `transportasi_ibfk_4` FOREIGN KEY (`id_transportasi_perusahaan`) REFERENCES `transportasi_perusahaan` (`id_transportasi_perusahaan`);

--
-- Ketidakleluasaan untuk tabel `transportasi_kelas`
--
ALTER TABLE `transportasi_kelas`
  ADD CONSTRAINT `transportasi_kelas_ibfk_1` FOREIGN KEY (`id_transportasi_tipe`) REFERENCES `transportasi_tipe` (`id_transportasi_tipe`);

--
-- Ketidakleluasaan untuk tabel `transportasi_perusahaan`
--
ALTER TABLE `transportasi_perusahaan`
  ADD CONSTRAINT `transportasi_perusahaan_ibfk_1` FOREIGN KEY (`id_transportasi_tipe`) REFERENCES `transportasi_tipe` (`id_transportasi_tipe`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
