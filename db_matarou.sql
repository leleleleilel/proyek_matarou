-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Des 2022 pada 15.04
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_matarou`
--
CREATE DATABASE IF NOT EXISTS `db_matarou` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_matarou`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `baju`
--

CREATE TABLE `baju` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `deskripsi` longtext DEFAULT NULL,
  `harga` int(25) DEFAULT NULL,
  `fk_kategori` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `baju`
--

INSERT INTO `baju` (`id`, `kode`, `nama`, `deskripsi`, `harga`, `fk_kategori`, `status`, `deleted_at`) VALUES
(1, 'LA001', 'Lace-detail Satin Blouse', 'Cropped blouse in satin with a round neckline and wrapover back with narrow ties at the hem that can be wound around the body. Long, flared sleeves with lace inserts on the cuffs. Unlined.', 480000, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `d_baju`
--

CREATE TABLE `d_baju` (
  `id` int(11) NOT NULL,
  `fk_baju` int(11) DEFAULT NULL,
  `stok` int(25) DEFAULT NULL,
  `fk_size` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `d_foto_baju`
--

CREATE TABLE `d_foto_baju` (
  `id` int(11) NOT NULL,
  `id_baju` int(11) NOT NULL,
  `nama_file` mediumtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `d_foto_baju`
--

INSERT INTO `d_foto_baju` (`id`, `id_baju`, `nama_file`, `status`, `deleted_at`) VALUES
(1, 1, 'RQhqcqzY.jpg', 1, NULL),
(2, 1, 'nyW8DaDW.jpg', 1, NULL),
(3, 1, 'Nl6YKsxm.jpg', 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `d_trans`
--

CREATE TABLE `d_trans` (
  `nomornota` varchar(20) NOT NULL,
  `fk_dbaju` int(11) NOT NULL,
  `qty` int(25) NOT NULL,
  `harga` int(25) NOT NULL,
  `subtotal` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `h_trans`
--

CREATE TABLE `h_trans` (
  `nomornota` varchar(20) NOT NULL,
  `tanggal_trans` date DEFAULT NULL,
  `fk_kode_promo` int(11) DEFAULT NULL,
  `fk_user` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `status`, `deleted_at`) VALUES
(1, 'Shirt', 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kode_promo`
--

CREATE TABLE `kode_promo` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `besar_potongan` int(25) DEFAULT NULL,
  `jenis_potongan` varchar(255) DEFAULT NULL,
  `valid_from` date DEFAULT NULL,
  `valid_until` date DEFAULT NULL,
  `minimum_total` int(25) DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kode_promo`
--

INSERT INTO `kode_promo` (`id`, `nama`, `besar_potongan`, `jenis_potongan`, `valid_from`, `valid_until`, `minimum_total`, `status`, `deleted_at`) VALUES
(1, 'End Year Sale', 50000, 'Potongan', '2022-12-06', '2023-01-01', 500000, 1, NULL),
(2, 'Black Friday Vol 1.1', 5, 'Diskon', '2022-12-06', '2022-12-31', 500000, 1, '2022-12-06 02:30:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `rate` int(10) NOT NULL,
  `deskripsi_review` longtext NOT NULL,
  `fk_htrans` varchar(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `size`
--

INSERT INTO `size` (`id`, `kode`, `nama`, `status`) VALUES
(1, 'XS', 'Extra Small', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` longtext DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `alamat`, `no_telp`, `email`, `role`, `status`) VALUES
(1, 'clarissaacg', 'Gracienne08_', 'Clarissa Gracienne', 'Jl. Uptown Road No. 5', '087855022221', 'clarissagracia.cg@gmail.com', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `baju`
--
ALTER TABLE `baju`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baju_cons_kategori` (`fk_kategori`);

--
-- Indeks untuk tabel `d_baju`
--
ALTER TABLE `d_baju`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baju_cons_fk_baju` (`fk_baju`),
  ADD KEY `baju_cons_fk_size` (`fk_size`);

--
-- Indeks untuk tabel `d_foto_baju`
--
ALTER TABLE `d_foto_baju`
  ADD PRIMARY KEY (`id`),
  ADD KEY `const_dfoto_baju_id` (`id_baju`);

--
-- Indeks untuk tabel `d_trans`
--
ALTER TABLE `d_trans`
  ADD KEY `dtrans_cons_htrans` (`nomornota`),
  ADD KEY `d_trans_cons_dbaju` (`fk_dbaju`);

--
-- Indeks untuk tabel `h_trans`
--
ALTER TABLE `h_trans`
  ADD PRIMARY KEY (`nomornota`),
  ADD KEY `h_trans_cons_kodepromo` (`fk_kode_promo`),
  ADD KEY `h_trans_cons_user` (`fk_user`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kode_promo`
--
ALTER TABLE `kode_promo`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `review_cons_nomornota` (`fk_htrans`);

--
-- Indeks untuk tabel `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `baju`
--
ALTER TABLE `baju`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `d_baju`
--
ALTER TABLE `d_baju`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `d_foto_baju`
--
ALTER TABLE `d_foto_baju`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kode_promo`
--
ALTER TABLE `kode_promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `baju`
--
ALTER TABLE `baju`
  ADD CONSTRAINT `baju_cons_kategori` FOREIGN KEY (`fk_kategori`) REFERENCES `kategori` (`id`);

--
-- Ketidakleluasaan untuk tabel `d_baju`
--
ALTER TABLE `d_baju`
  ADD CONSTRAINT `baju_cons_fk_baju` FOREIGN KEY (`fk_baju`) REFERENCES `baju` (`id`),
  ADD CONSTRAINT `baju_cons_fk_size` FOREIGN KEY (`fk_size`) REFERENCES `size` (`id`);

--
-- Ketidakleluasaan untuk tabel `d_foto_baju`
--
ALTER TABLE `d_foto_baju`
  ADD CONSTRAINT `const_dfoto_baju_id` FOREIGN KEY (`id_baju`) REFERENCES `baju` (`id`);

--
-- Ketidakleluasaan untuk tabel `d_trans`
--
ALTER TABLE `d_trans`
  ADD CONSTRAINT `d_trans_cons_dbaju` FOREIGN KEY (`fk_dbaju`) REFERENCES `d_baju` (`id`),
  ADD CONSTRAINT `dtrans_cons_htrans` FOREIGN KEY (`nomornota`) REFERENCES `h_trans` (`nomornota`);

--
-- Ketidakleluasaan untuk tabel `h_trans`
--
ALTER TABLE `h_trans`
  ADD CONSTRAINT `h_trans_cons_kodepromo` FOREIGN KEY (`fk_kode_promo`) REFERENCES `kode_promo` (`id`),
  ADD CONSTRAINT `h_trans_cons_user` FOREIGN KEY (`fk_user`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_cons_nomornota` FOREIGN KEY (`fk_htrans`) REFERENCES `h_trans` (`nomornota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
