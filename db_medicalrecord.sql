-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220621.da7c7a84e1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2022 pada 09.55
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aturan_pakai`
--

CREATE TABLE `aturan_pakai` (
  `id` int(11) NOT NULL,
  `nama_aturan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aturan_pakai`
--

INSERT INTO `aturan_pakai` (`id`, `nama_aturan`) VALUES
(1, 'a.c'),
(2, 'C'),
(3, 'c.th'),
(4, 'Caps'),
(5, '1.d.d'),
(6, '2.d.d'),
(7, '3.d.d'),
(8, 'p.c'),
(9, 'Pulv'),
(10, 'S 0-1-0'),
(11, 'S 1-1-0'),
(12, 'S 0-0-1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_bayar`
--

CREATE TABLE `detail_bayar` (
  `id_detail` int(11) NOT NULL,
  `kd_bayar` varchar(20) NOT NULL,
  `total` double NOT NULL,
  `id_tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_bayar`
--

INSERT INTO `detail_bayar` (`id_detail`, `kd_bayar`, `total`, `id_tarif`) VALUES
(58, 'TRS220001', 30000, 1),
(59, 'TRS220001', 105000, 4),
(60, 'TRS220001', 13000, 7),
(61, 'TRS220002', 30000, 1),
(62, 'TRS220002', 13000, 7),
(63, 'TRS220003', 30000, 1),
(64, 'TRS220003', 25000, 2),
(65, 'TRS220003', 115000, 3),
(66, 'TRS220003', 13000, 7),
(67, 'TRS220004', 30000, 1),
(68, 'TRS220004', 115000, 3),
(69, 'TRS220004', 13000, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_resep`
--

CREATE TABLE `detail_resep` (
  `id_detail` int(11) NOT NULL,
  `kd_resep` varchar(20) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `aturan_pakai` varchar(128) NOT NULL,
  `stok_out` int(11) NOT NULL,
  `stok_tot` int(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_resep`
--

INSERT INTO `detail_resep` (`id_detail`, `kd_resep`, `id_obat`, `aturan_pakai`, `stok_out`, `stok_tot`, `total`) VALUES
(37, 'RSP220001', 40, '1.d.d', 1, 46, 20300),
(38, 'RSP220001', 6, '3.d.d', 1, 22, 400),
(39, 'RSP220001', 25, 'S 0-0-1', 1, 49, 0),
(40, 'RSP220002', 20, '1.d.d', 2, 98, 1200),
(41, 'RSP220002', 41, 'a.c', 1, 49, 35000),
(42, 'RSP220003', 30, 'c.th', 1, 49, 0),
(43, 'RSP220003', 32, '2.d.d', 1, 49, 0),
(44, 'RSP220004', 35, 'a.c', 1, 49, 0),
(45, 'RSP220004', 15, 'S 0-1-0', 1, 51, 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(128) NOT NULL,
  `stok` int(5) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `stok`, `harga`) VALUES
(6, 'Asam mefenamat 250mg (kaps)', 22, 400),
(7, 'Ibuprofen 200 mg (tab)', 32, 294),
(8, 'Ketoprofen sup 100 mg', 49, 1868),
(9, 'Natrium Dikofenak 25mg (tab)', 50, 367),
(10, 'Alopurinol 100mg (tab)', 18, 400),
(11, 'Deksametason 5mg/ml (inj)', 42, 1400),
(12, 'Loratadine', 49, 5000),
(13, 'Cetirizine', 47, 7000),
(15, 'Feno Vibrate', 51, 15000),
(17, 'Amlodipine 5mg', 60, 1478),
(18, 'Amlodipine 10mg', 33, 2170),
(20, 'Cefadroxil', 98, 600),
(21, 'Chlorampenikol', 50, 0),
(22, 'Ceviksime', 96, 500),
(23, 'Ciprofloxaxin', 50, 0),
(24, 'Gentamisin', 50, 0),
(25, 'Clindamisin', 49, 0),
(26, 'Betahistin', 0, 500),
(27, 'Zink', 50, 0),
(28, 'Rifampisine', 50, 0),
(29, 'Etambutol', 50, 0),
(30, 'Ketakonazole', 49, 0),
(31, 'Griseofulfin', 50, 0),
(32, 'Griseofulfin', 49, 0),
(34, 'Nistatine', 23, 100),
(35, 'Metronidazole', 49, 0),
(36, 'Glimefiride', 50, 0),
(37, 'Parasetamol 500gr (tab)', 50, 407),
(38, 'Asam mefenamat 500mg (kaps)', 99, 457),
(39, 'Ibuprofen 400 mg (tab)', 50, 668),
(40, 'Ibuprofen 100 mg/5 ml (sir)', 46, 20300),
(41, 'Ibuprofen 200 mg/5 ml (sir)', 49, 35000),
(42, 'ketotolak 30 mg/ml (inj)', 0, 7900),
(43, 'Natrium Dikofenak 50mg (tab)', 0, 472),
(44, 'Paracetamol 120 mg/ 5ml (sir)', 50, 7193),
(45, 'Paracetamol 60 mg/ 0.6ml (tts)', 50, 4100),
(46, 'kolkisin 500mcg (tab)', 0, 3850),
(47, 'mixagrip', 100, 4500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `kd_rm` varchar(11) NOT NULL,
  `nama_pasien` varchar(128) NOT NULL,
  `jenkel` varchar(15) NOT NULL,
  `tempat_lahir` varchar(128) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `pengobatan` varchar(128) NOT NULL,
  `no_bpjs` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`kd_rm`, `nama_pasien`, `jenkel`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `telp`, `pengobatan`, `no_bpjs`) VALUES
('RM2200001', 'Arifin', 'Laki-Laki', 'Bandung', '2001-06-29', '					Bekasi	\r\n					', '62543217789', 'BPJS', '1234567'),
('RM2200002', 'Anggihta', 'Perempuan', 'Onolimbu', '2009-05-15', '										Onolimbu, Lahomi, Nias Barat	\r\n					', '62813775432', 'BPJS', '99876456'),
('RM2200003', 'Upin', 'Laki-Laki', 'Rumah Sakit', '2022-07-03', 'Kampung Durian Runtuh	\r\n					', '62543217789', 'Umum', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `kd_bayar` varchar(20) NOT NULL,
  `id_pemeriksaan` varchar(20) NOT NULL,
  `kd_resep` varchar(20) NOT NULL,
  `totalbayar` double NOT NULL,
  `admin` varchar(128) NOT NULL,
  `tanggal_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`kd_bayar`, `id_pemeriksaan`, `kd_resep`, `totalbayar`, `admin`, `tanggal_bayar`) VALUES
('TRS220001', 'PRS220001', 'RSP220001', 168700, 'admin', '2022-07-01'),
('TRS220002', 'PRS220002', 'RSP220002', 79200, 'admin', '2022-07-02'),
('TRS220003', 'PRS220003', 'RSP220003', 183000, 'admin', '2022-07-02'),
('TRS220004', 'PRS220004', 'RSP220004', 173000, 'admin', '2022-07-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeriksaan`
--

CREATE TABLE `pemeriksaan` (
  `id_periksa` varchar(11) NOT NULL,
  `kd_rm` varchar(11) NOT NULL,
  `dokter` varchar(128) NOT NULL,
  `keluhan` varchar(256) NOT NULL,
  `diagnosa` varchar(256) NOT NULL,
  `tindakan` varchar(256) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemeriksaan`
--

INSERT INTO `pemeriksaan` (`id_periksa`, `kd_rm`, `dokter`, `keluhan`, `diagnosa`, `tindakan`, `tanggal`) VALUES
('PRS220001', 'RM2200001', 'anisah', 'Deman, Suka mual-mual, pusing, susah tidur               ', 'Gejala Insomnia                  ', 'Pemeriksaan dan Konsultasi , Pemeriksaan Darah Rutin , Lain-Lain', '2022-07-01'),
('PRS220002', 'RM2200002', 'anisah', 'Sakit Gigi               ', 'Gigi Berlubang                  ', 'Pemeriksaan dan Konsultasi , Lain-Lain', '2022-07-02'),
('PRS220003', 'RM2200001', 'anisah', 'sering pusing saat melakukan pekerjaan ringan               ', 'kurang gizi                  ', 'Pemeriksaan dan Konsultasi , Inject (suntik) , Pemeriksaan Darah Lengkap , Lain-Lain', '2022-07-02'),
('PRS220004', 'RM2200003', 'anisah', 'Adikny si Upin hilang               ', 'Upin sedang Mimpi                  ', 'Pemeriksaan dan Konsultasi , Pemeriksaan Darah Lengkap , Lain-Lain', '2022-07-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep`
--

CREATE TABLE `resep` (
  `kd_resep` varchar(20) NOT NULL,
  `subtotal` double NOT NULL,
  `id_pemeriksaan` varchar(11) NOT NULL,
  `dokter` varchar(128) NOT NULL,
  `tanggal_resep` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `resep`
--

INSERT INTO `resep` (`kd_resep`, `subtotal`, `id_pemeriksaan`, `dokter`, `tanggal_resep`) VALUES
('RSP220001', 20700, 'PRS220001', 'anisah', '2022-07-01'),
('RSP220002', 36200, 'PRS220002', 'anisah', '2022-07-02'),
('RSP220003', 0, 'PRS220003', 'anisah', '2022-07-02'),
('RSP220004', 15000, 'PRS220004', 'anisah', '2022-07-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tarif`
--

CREATE TABLE `tarif` (
  `id_tarif` int(11) NOT NULL,
  `nama_tarif` varchar(128) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tarif`
--

INSERT INTO `tarif` (`id_tarif`, `nama_tarif`, `harga`) VALUES
(1, 'Pemeriksaan dan Konsultasi', 30000),
(2, 'Inject (suntik)', 25000),
(3, 'Pemeriksaan Darah Lengkap', 115000),
(4, 'Pemeriksaan Darah Rutin', 105000),
(5, 'Uap', 30000),
(6, 'cek diabet', 25000),
(7, 'Lain-Lain', 13000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user`, `nama`, `pass`, `level`) VALUES
('admin', 'administrator', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
('angel', 'Angel Patrecia', 'f4f068e71e0d87bf0ad51e6214ab84e9', 'dokter'),
('angga', 'Angga Dwi Wahyu', '8479c86c7afcb56631104f5ce5d6de62', 'admin'),
('anisah', 'Anisah Daeli', '34ba56c0a90609e60ed6b5f63d3931d0', 'dokter'),
('elni', 'Elni Zebua', 'fd351366eff84fa46e948e0923e45d66', 'dokter'),
('vincencia', 'Vincencia Dao', 'eae350c199f100cc2bb2abaa7e79b914', 'dokter');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aturan_pakai`
--
ALTER TABLE `aturan_pakai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_bayar`
--
ALTER TABLE `detail_bayar`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `detail_resep`
--
ALTER TABLE `detail_resep`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`kd_rm`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`kd_bayar`);

--
-- Indeks untuk tabel `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD PRIMARY KEY (`id_periksa`),
  ADD KEY `kd_pasien` (`kd_rm`);

--
-- Indeks untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`kd_resep`),
  ADD KEY `kd_periksa` (`id_pemeriksaan`),
  ADD KEY `kd_periksa_2` (`id_pemeriksaan`);

--
-- Indeks untuk tabel `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id_tarif`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aturan_pakai`
--
ALTER TABLE `aturan_pakai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `detail_bayar`
--
ALTER TABLE `detail_bayar`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `detail_resep`
--
ALTER TABLE `detail_resep`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id_tarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD CONSTRAINT `pemeriksaan_ibfk_1` FOREIGN KEY (`kd_rm`) REFERENCES `pasien` (`kd_rm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



