-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jul 2018 pada 16.36
-- Versi server: 10.1.33-MariaDB
-- Versi PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pln`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ct`
--

CREATE TABLE `ct` (
  `id_ct` int(11) NOT NULL,
  `id_pelanggan` varchar(100) NOT NULL,
  `jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pelanggan`
--

CREATE TABLE `data_pelanggan` (
  `unitupi` int(11) NOT NULL,
  `unitap` int(11) NOT NULL,
  `unitup` int(11) NOT NULL,
  `idpel` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `tarif` int(11) NOT NULL,
  `daya` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `meter`
--

CREATE TABLE `meter` (
  `id_meter` varchar(13) NOT NULL,
  `merk` int(11) NOT NULL,
  `tipe` int(11) NOT NULL,
  `kelas` int(11) NOT NULL,
  `tahun_buat` int(11) NOT NULL,
  `arus` int(11) NOT NULL,
  `idpel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `modem`
--

CREATE TABLE `modem` (
  `imei` varchar(20) NOT NULL,
  `merk` int(11) NOT NULL,
  `tipe` int(11) NOT NULL,
  `id_pelanggan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `username` varchar(100) NOT NULL,
  `nama` text NOT NULL,
  `nama_team` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembatas_arus`
--

CREATE TABLE `pembatas_arus` (
  `id_pembatas` int(11) NOT NULL,
  `id_pelanggan` varchar(100) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `arus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `realisasi`
--

CREATE TABLE `realisasi` (
  `id_realisasi` int(11) NOT NULL,
  `id_pelanggan` varchar(100) NOT NULL,
  `id_to` int(11) DEFAULT NULL,
  `ganti_meter` int(11) DEFAULT NULL,
  `ganti_modem` int(11) DEFAULT NULL,
  `ganti_sim` int(11) DEFAULT NULL,
  `ganti_pembatas` int(11) DEFAULT NULL,
  `ganti_ct` int(11) DEFAULT NULL,
  `kesimpulan` text,
  `tanggal` date DEFAULT NULL,
  `arus_r` varchar(50) DEFAULT NULL,
  `arus_s` varchar(50) DEFAULT NULL,
  `arus_t` varchar(50) DEFAULT NULL,
  `tegangan_r` varchar(50) DEFAULT NULL,
  `tegangan_s` varchar(50) DEFAULT NULL,
  `tegangan_t` varchar(50) DEFAULT NULL,
  `stand_total` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sim_card`
--

CREATE TABLE `sim_card` (
  `nomor` varchar(13) NOT NULL,
  `provider` int(11) NOT NULL,
  `id_pelanggan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `target_operasional`
--

CREATE TABLE `target_operasional` (
  `id_to` int(11) NOT NULL,
  `id_pelanggan` varchar(100) NOT NULL,
  `alasan` text NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL,
  `pegawai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(100) NOT NULL,
  `password` varchar(33) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ct`
--
ALTER TABLE `ct`
  ADD PRIMARY KEY (`id_ct`);

--
-- Indeks untuk tabel `data_pelanggan`
--
ALTER TABLE `data_pelanggan`
  ADD PRIMARY KEY (`unitupi`),
  ADD KEY `idpel` (`idpel`);

--
-- Indeks untuk tabel `meter`
--
ALTER TABLE `meter`
  ADD PRIMARY KEY (`id_meter`),
  ADD KEY `idpel` (`idpel`);

--
-- Indeks untuk tabel `modem`
--
ALTER TABLE `modem`
  ADD PRIMARY KEY (`imei`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_pelanggan_2` (`id_pelanggan`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pembatas_arus`
--
ALTER TABLE `pembatas_arus`
  ADD PRIMARY KEY (`id_pembatas`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `realisasi`
--
ALTER TABLE `realisasi`
  ADD PRIMARY KEY (`id_realisasi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_to` (`id_to`);

--
-- Indeks untuk tabel `sim_card`
--
ALTER TABLE `sim_card`
  ADD PRIMARY KEY (`nomor`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_pelanggan_2` (`id_pelanggan`);

--
-- Indeks untuk tabel `target_operasional`
--
ALTER TABLE `target_operasional`
  ADD PRIMARY KEY (`id_to`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `pegawai` (`pegawai`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ct`
--
ALTER TABLE `ct`
  MODIFY `id_ct` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `realisasi`
--
ALTER TABLE `realisasi`
  MODIFY `id_realisasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `target_operasional`
--
ALTER TABLE `target_operasional`
  MODIFY `id_to` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `meter`
--
ALTER TABLE `meter`
  ADD CONSTRAINT `meter_ibfk_1` FOREIGN KEY (`idpel`) REFERENCES `data_pelanggan` (`idpel`);

--
-- Ketidakleluasaan untuk tabel `modem`
--
ALTER TABLE `modem`
  ADD CONSTRAINT `modem_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `data_pelanggan` (`idpel`);

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Ketidakleluasaan untuk tabel `realisasi`
--
ALTER TABLE `realisasi`
  ADD CONSTRAINT `realisasi_ibfk_1` FOREIGN KEY (`id_to`) REFERENCES `target_operasional` (`id_to`);

--
-- Ketidakleluasaan untuk tabel `sim_card`
--
ALTER TABLE `sim_card`
  ADD CONSTRAINT `sim_card_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `data_pelanggan` (`idpel`);

--
-- Ketidakleluasaan untuk tabel `target_operasional`
--
ALTER TABLE `target_operasional`
  ADD CONSTRAINT `target_operasional_ibfk_1` FOREIGN KEY (`pegawai`) REFERENCES `pegawai` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
