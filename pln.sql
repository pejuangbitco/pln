-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Jul 2018 pada 05.24
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ct`
--

INSERT INTO `ct` (`id_ct`, `id_pelanggan`, `jenis`) VALUES
(1, '987221212121', 'asa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pelanggan`
--

CREATE TABLE `data_pelanggan` (
  `unitap` int(11) NOT NULL,
  `unitup` int(11) NOT NULL,
  `idpel` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `tarif` int(11) NOT NULL,
  `daya` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `unitupi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_pelanggan`
--

INSERT INTO `data_pelanggan` (`unitap`, `unitup`, `idpel`, `nama`, `alamat`, `tarif`, `daya`, `status`, `unitupi`) VALUES
(1, 1, '111111111111', '1', '1', 1, 1, 1, 1),
(2, 2, '982716251515', 'KKKK', 'asasa', 88, 88, 1, 2),
(1, 1, '987221212121', 'Rezi Apriliansyaha', 'asa', 900, 900, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `geotag`
--

CREATE TABLE `geotag` (
  `id` int(11) NOT NULL,
  `lon` varchar(10) NOT NULL,
  `lat` varchar(10) NOT NULL,
  `idpel` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `geotag`
--

INSERT INTO `geotag` (`id`, `lon`, `lat`, `idpel`) VALUES
(3, '', '', '987221212121');

-- --------------------------------------------------------

--
-- Struktur dari tabel `meter`
--

CREATE TABLE `meter` (
  `id_meter` varchar(13) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `tahun_buat` int(11) NOT NULL,
  `arus` varchar(100) NOT NULL,
  `idpel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `meter`
--

INSERT INTO `meter` (`id_meter`, `merk`, `tipe`, `kelas`, `tahun_buat`, `arus`, `idpel`) VALUES
('1212', 'a', 'as', '12', 2013, '90', '987221212121');

-- --------------------------------------------------------

--
-- Struktur dari tabel `modem`
--

CREATE TABLE `modem` (
  `imei` varchar(20) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `id_pelanggan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `modem`
--

INSERT INTO `modem` (`imei`, `merk`, `tipe`, `id_pelanggan`) VALUES
('9797012916261826', 'amam', '0', '987221212121');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `username` varchar(100) NOT NULL,
  `nama` text NOT NULL,
  `nama_team` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`username`, `nama`, `nama_team`) VALUES
('syad', 'suad', 'asa');

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

--
-- Dumping data untuk tabel `pembatas_arus`
--

INSERT INTO `pembatas_arus` (`id_pembatas`, `id_pelanggan`, `merk`, `tipe`, `arus`) VALUES
(1, '987221212121', 'asa', 'asas', 'asas');

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
  `provider` varchar(100) NOT NULL,
  `id_pelanggan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sim_card`
--

INSERT INTO `sim_card` (`nomor`, `provider`, `id_pelanggan`) VALUES
('08981073502', 'tsel', '987221212121'),
('1', '1', '111111111111');

-- --------------------------------------------------------

--
-- Struktur dari tabel `target_operasional`
--

CREATE TABLE `target_operasional` (
  `id_to` int(11) NOT NULL,
  `id_pelanggan` varchar(100) NOT NULL,
  `alasan` text NOT NULL,
  `keterangan` text NOT NULL,
  `date` date NOT NULL,
  `pegawai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `target_operasional`
--

INSERT INTO `target_operasional` (`id_to`, `id_pelanggan`, `alasan`, `keterangan`, `date`, `pegawai`) VALUES
(2, '111111111111', 'q', 'q', '2018-07-19', 'syad'),
(3, '987221212121', 'q', 'q', '2018-07-19', 'syad');

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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `role`) VALUES
('admin', '202cb962ac59075b964b07152d234b70', '1'),
('syad', '202cb962ac59075b964b07152d234b70', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ct`
--
ALTER TABLE `ct`
  ADD PRIMARY KEY (`id_ct`);

--
-- Indexes for table `data_pelanggan`
--
ALTER TABLE `data_pelanggan`
  ADD PRIMARY KEY (`idpel`),
  ADD KEY `idpel` (`idpel`);

--
-- Indexes for table `geotag`
--
ALTER TABLE `geotag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meter`
--
ALTER TABLE `meter`
  ADD PRIMARY KEY (`id_meter`),
  ADD KEY `idpel` (`idpel`);

--
-- Indexes for table `modem`
--
ALTER TABLE `modem`
  ADD PRIMARY KEY (`imei`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_pelanggan_2` (`id_pelanggan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pembatas_arus`
--
ALTER TABLE `pembatas_arus`
  ADD PRIMARY KEY (`id_pembatas`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `realisasi`
--
ALTER TABLE `realisasi`
  ADD PRIMARY KEY (`id_realisasi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_to` (`id_to`);

--
-- Indexes for table `sim_card`
--
ALTER TABLE `sim_card`
  ADD PRIMARY KEY (`nomor`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_pelanggan_2` (`id_pelanggan`);

--
-- Indexes for table `target_operasional`
--
ALTER TABLE `target_operasional`
  ADD PRIMARY KEY (`id_to`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `pegawai` (`pegawai`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ct`
--
ALTER TABLE `ct`
  MODIFY `id_ct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `geotag`
--
ALTER TABLE `geotag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pembatas_arus`
--
ALTER TABLE `pembatas_arus`
  MODIFY `id_pembatas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `realisasi`
--
ALTER TABLE `realisasi`
  MODIFY `id_realisasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `target_operasional`
--
ALTER TABLE `target_operasional`
  MODIFY `id_to` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
