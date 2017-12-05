-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Jun 2017 pada 09.18
-- Versi Server: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `malika`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id_admin` int(11) NOT NULL,
  `nama` char(31) NOT NULL,
  `password` char(31) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `password`) VALUES
(3, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bayar`
--

CREATE TABLE IF NOT EXISTS `bayar` (
  `id_bayar` varchar(30) NOT NULL,
  `id_pesan` varchar(30) NOT NULL,
  `total_bayar` int(30) NOT NULL,
  `tanggal_konfirmasi` date DEFAULT NULL,
  `atasNama` varchar(30) DEFAULT NULL,
  `status` enum('Belum Konfirmasi','Sudah Konfirmasi','Di Konfirmasi','Pesanan Dibatalkan') DEFAULT NULL,
  `catatan` text,
  `kurir` varchar(30) DEFAULT NULL,
  `resi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bayar`
--

INSERT INTO `bayar` (`id_bayar`, `id_pesan`, `total_bayar`, `tanggal_konfirmasi`, `atasNama`, `status`, `catatan`, `kurir`, `resi`) VALUES
('BY000002', 'PS000002', 55000, '2017-04-18', 'burhan', 'Di Konfirmasi', 'saya sudah transfer', 'JNE', '987654321'),
('BY000003', 'PS000003', 300000, '2017-06-23', 'jangkrik', 'Sudah Konfirmasi', 'tolong packing yang rapigan', 'Sedang Di Proses', 'Sedang Di Proses'),
('BY000004', 'PS000004', 1155000, '2017-06-23', 'gfhfg', 'Sudah Konfirmasi', 'gfgh', 'Sedang Di Proses', 'Sedang Di Proses'),
('BY000005', 'PS000005', 250000, NULL, NULL, 'Belum Konfirmasi', NULL, 'Sedang Di Proses', 'Sedang Di Proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesan`
--

CREATE TABLE IF NOT EXISTS `detail_pesan` (
  `id_produk` varchar(20) NOT NULL,
  `id_pesan` varchar(20) NOT NULL,
  `jml_pesan` int(30) DEFAULT NULL,
  `id_size` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pesan`
--

INSERT INTO `detail_pesan` (`id_produk`, `id_pesan`, `jml_pesan`, `id_size`) VALUES
('PK000013', 'PS000002', 1, 'L'),
('PK000016', 'PS000003', 1, 'S'),
('PK000013', 'PS000004', 1, 'XL'),
('PK000017', 'PS000004', 2, 'L'),
('PK000012', 'PS000005', 1, 'L');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskon`
--

CREATE TABLE IF NOT EXISTS `diskon` (
`id_diskon` int(30) NOT NULL,
  `kode_diskon` varchar(5) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `diskon`
--

INSERT INTO `diskon` (`id_diskon`, `kode_diskon`, `jumlah`) VALUES
(4, 'RM01', 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_produk`
--

CREATE TABLE IF NOT EXISTS `kategori_produk` (
  `id_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kategori`, `nama_kategori`) VALUES
('KA000001', 'Kebaya'),
('KA000002', 'Keluarga '),
('KA000003', 'Gamis'),
('KA000004', 'Batik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumen`
--

CREATE TABLE IF NOT EXISTS `konsumen` (
  `id_konsumen` varchar(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kodepos` char(6) NOT NULL,
  `nohp` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konsumen`
--

INSERT INTO `konsumen` (`id_konsumen`, `nama`, `email`, `username`, `password`, `alamat`, `kota`, `provinsi`, `kodepos`, `nohp`) VALUES
('KS000001', 'Eko Rismaryanto', 'eko.rismaryanto15@gmail.com', 'eko', '123456', 'Jalan Candi Gebang', 'Sleman', 'DI Yogyakarta', '5591', '082177673248'),
('KS000002', 'Burhan', 'burhan@gmail.com', 'burhan01', '123456', 'Jalan wonosari', 'Gunung Kidul', 'DI Yogyakarta', '55981', '0987654321'),
('KS000003', 'Dina', 'dina.m@amikom.ac.id', 'dina', '123456', 'Jalan Candi Gebang ciiin', 'Sleman', 'DI Yogyakarta', '12345', '082377673248'),
('KS000004', 'sare', 'asas@gmail.com', 'sas', 'asas', 'jangkrik', '0', '0', '2321', '213213');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE IF NOT EXISTS `pesanan` (
  `id_pesan` varchar(30) NOT NULL,
  `id_konsumen` varchar(11) NOT NULL,
  `tgl_pesan` date DEFAULT NULL,
  `nama_penerima` varchar(30) DEFAULT NULL,
  `alamat` text,
  `kota` varchar(20) DEFAULT NULL,
  `provinsi` varchar(20) DEFAULT NULL,
  `kodepos` char(6) DEFAULT NULL,
  `no_hp` char(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesan`, `id_konsumen`, `tgl_pesan`, `nama_penerima`, `alamat`, `kota`, `provinsi`, `kodepos`, `no_hp`) VALUES
('PS000002', 'KS000002', '2017-04-18', 'Burhan', 'Jalan wonosari', 'Gunung Kidul', 'DI Yogyakarta', '55981', '0987654321'),
('PS000003', 'KS000003', '2017-04-18', 'Dina', 'Jalan Candi Gebang', 'Sleman', 'DI Yogyakarta', '12345', '082377673248'),
('PS000004', 'KS000003', '2017-06-23', 'ssss', 'ss', 'ss', 's', '12121', '121212'),
('PS000005', 'KS000003', '2017-06-23', 'Dina', 'Jalan Candi Gebang ciiin', 'Sleman', 'DI Yogyakarta', '12345', '082377673248');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` varchar(11) NOT NULL,
  `id_kategori` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `harga` int(30) DEFAULT NULL,
  `pembeli` int(11) DEFAULT NULL,
  `deskripsi` text,
  `produk_info` text,
  `gambar` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama`, `harga`, `pembeli`, `deskripsi`, `produk_info`, `gambar`) VALUES
('PK000001', 'KA000002', 'Batik Keluarga 1', 550000, 0, 'Batik Keluarga 1 set untuk ayah dan ibuk', 'Stok Terbatas', 'file_1492342811.JPG'),
('PK000002', 'KA000002', 'Batik Keluarga Modern', 540000, 0, 'Baju batik keluarga dengan untuk ayah dan ibu atau untuk pasangan muda ', 'setiap ukuran sama. untuk wanita dan pria. kami tidak melayani penjualan persatuan', 'file_1492343026.JPG'),
('PK000003', 'KA000003', 'Gamis sifon modern', 250000, 0, 'Baju gamis cocok untuk menyambut bulan puasa ini', 'bahan dijamin berkualitas', 'file_1492343143.jpg'),
('PK000004', 'KA000003', 'Gamis Biru dongker', 250000, 0, 'Baju gamis warna biru dongker', 'Untuk Ukuran Xl sementara kosong', 'file_1492343208.jpg'),
('PK000005', 'KA000003', 'Gamis Casual untuk remaja', 300000, 0, 'Gamis Modern yang cocok banget untuk remaja masa kini', 'Bahan ceruti dan siffon', 'file_1492343644.jpg'),
('PK000006', 'KA000003', 'Gamis FG01', 450000, 0, 'Gamis Untuk Wanita muslimah cantik', 'Produk Terbatas', 'file_1492343867.jpg'),
('PK000007', 'KA000003', 'Gamis Anak Motif Bunga', 120000, 0, 'Gamus Motif bunga untuk anak anda tercinta', 'Ukuran produk berdasarkan ukuran anak kecil dibawah 12 tahun', 'file_1492343956.png'),
('PK000008', 'KA000003', 'Gamis Anak 2', 125000, 0, 'Gamus Motif bunga untuk anak anda tercinta', 'Ukuran produk berdasarkan ukuran anak kecil dibawah 12 tahun', 'file_1492344006.jpg'),
('PK000009', 'KA000001', 'Kebaya O1', 320000, 0, 'Kebaya Bagus', 'Ukuran L : L. Badan 104, L.Pinggang 94, L. Pinggul 110, L. Bahu 40, P. Lengan 58, P. Gamis 142\r\nUkuran M : L. Badan 96, L.Pinggang 86, L. Pinggul 110, L. Bahu 38, P. Lengan 58, P. Gamis 140', 'file_1492344304.JPG'),
('PK000012', 'KA000001', 'Kebaya W01', 250000, 1, 'Keabaya Wanita, bahan berkualitas', 'Barang Sudah Termasuk Ongkos kirim', 'file_1492344839.jpeg'),
('PK000013', 'KA000004', 'Blus atas', 75000, 2, 'Blus atas wanita', 'Barang Sudah Termasuk Ongkos kirim', 'file_1492344971.jpg'),
('PK000014', 'KA000003', 'Gamis Wanita W05', 250000, 0, 'Gamis Wanita Muslim', 'Barang Sudah Termasuk Ongkos kirim', 'file_1492345029.jpeg'),
('PK000016', 'KA000003', 'Gamis G05', 320000, 2, 'Gamis Untuk Wanita masa kini', 'Barang Sudah Termasuk Ongkos kirim', 'file_1492345276.jpg'),
('PK000017', 'KA000002', 'Batik Keluarga 4', 540000, 2, 'Batik Untuk Keluarga', 'Barang Sudah Termasuk Ongkos kirim', 'file_1492345453.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `id_review` varchar(30) NOT NULL,
  `id_produk` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(15) NOT NULL,
  `komentar` text NOT NULL,
  `status` enum('tampilkan','tidak tampilkan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `review`
--

INSERT INTO `review` (`id_review`, `id_produk`, `nama`, `email`, `komentar`, `status`) VALUES
('RE000001', 'PK000017', 'eko rismaryanto', 'eko.rme@gmail.c', 'Bajunya Bagus', 'tampilkan'),
('RE000002', 'PK000017', 'dssd', 'sdsd@gmail.com', 'dssd', 'tampilkan'),
('RE000003', 'PK000012', 'as', 'sda@sas', 'sdasdasd', 'tidak tampilkan'),
('RE000004', 'PK000012', 'as', 'sd@as', 'sadsd', 'tidak tampilkan'),
('RE000005', 'PK000012', 'a', 'asas@gmail.com', 'dsasd', 'tidak tampilkan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
`id_slider` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id_slider`, `nama`, `gambar`) VALUES
(1, 'Slide 2', 'file_1492315236.png'),
(2, 'Promo', 'file_1492315273.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok`
--

CREATE TABLE IF NOT EXISTS `stok` (
`id_stok` int(11) NOT NULL,
  `id_produk` varchar(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `id_size` char(3) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=125 ;

--
-- Dumping data untuk tabel `stok`
--

INSERT INTO `stok` (`id_stok`, `id_produk`, `stok`, `id_size`) VALUES
(57, 'PK000001', 2, 'L'),
(58, 'PK000001', 1, 'M'),
(59, 'PK000001', 0, 'S'),
(60, 'PK000001', 0, 'XL'),
(61, 'PK000002', 3, 'L'),
(62, 'PK000002', 0, 'M'),
(63, 'PK000002', 1, 'S'),
(64, 'PK000002', 5, 'XL'),
(65, 'PK000003', 3, 'L'),
(66, 'PK000003', 2, 'M'),
(67, 'PK000003', 1, 'S'),
(68, 'PK000003', 2, 'XL'),
(69, 'PK000004', 3, 'L'),
(70, 'PK000004', 3, 'M'),
(71, 'PK000004', 2, 'S'),
(72, 'PK000004', 0, 'XL'),
(73, 'PK000005', 5, 'L'),
(74, 'PK000005', 2, 'M'),
(75, 'PK000005', 1, 'S'),
(76, 'PK000005', 1, 'XL'),
(77, 'PK000006', 3, 'L'),
(78, 'PK000006', 2, 'M'),
(79, 'PK000006', 1, 'S'),
(80, 'PK000006', 2, 'XL'),
(81, 'PK000007', 3, 'L'),
(82, 'PK000007', 2, 'M'),
(83, 'PK000007', 1, 'S'),
(84, 'PK000007', 1, 'XL'),
(85, 'PK000008', 3, 'L'),
(86, 'PK000008', 2, 'M'),
(87, 'PK000008', 2, 'S'),
(88, 'PK000008', 1, 'XL'),
(89, 'PK000009', 2, 'L'),
(90, 'PK000009', 1, 'M'),
(91, 'PK000009', 0, 'S'),
(92, 'PK000009', 0, 'XL'),
(93, 'PK000010', 3, 'L'),
(94, 'PK000010', 3, 'M'),
(95, 'PK000010', 2, 'S'),
(96, 'PK000010', 2, 'XL'),
(97, 'PK000011', 2, 'L'),
(98, 'PK000011', 1, 'M'),
(99, 'PK000011', 0, 'S'),
(100, 'PK000011', 0, 'XL'),
(101, 'PK000012', 2, 'L'),
(102, 'PK000012', 1, 'M'),
(103, 'PK000012', 2, 'S'),
(104, 'PK000012', 0, 'XL'),
(105, 'PK000013', 2, 'L'),
(106, 'PK000013', 2, 'M'),
(107, 'PK000013', 0, 'S'),
(108, 'PK000013', 0, 'XL'),
(109, 'PK000014', 0, 'L'),
(110, 'PK000014', 2, 'M'),
(111, 'PK000014', 0, 'S'),
(112, 'PK000014', 3, 'XL'),
(113, 'PK000015', 3, 'L'),
(114, 'PK000015', 3, 'M'),
(115, 'PK000015', 0, 'S'),
(116, 'PK000015', 0, 'XL'),
(117, 'PK000016', 4, 'L'),
(118, 'PK000016', 5, 'M'),
(119, 'PK000016', 0, 'S'),
(120, 'PK000016', 2, 'XL'),
(121, 'PK000017', 0, 'L'),
(122, 'PK000017', 3, 'M'),
(123, 'PK000017', 0, 'S'),
(124, 'PK000017', 1, 'XL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukuran`
--

CREATE TABLE IF NOT EXISTS `ukuran` (
  `id_size` char(3) NOT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ukuran`
--

INSERT INTO `ukuran` (`id_size`, `deskripsi`) VALUES
('L', 'Ukuran L'),
('M', 'Ukuran M'),
('S', 'Ukuran S'),
('XL', 'Ukuran XL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
 ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
 ADD PRIMARY KEY (`id_diskon`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
 ADD PRIMARY KEY (`id_konsumen`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
 ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
 ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
 ADD PRIMARY KEY (`id_review`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
 ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
 ADD PRIMARY KEY (`id_stok`);

--
-- Indexes for table `ukuran`
--
ALTER TABLE `ukuran`
 ADD PRIMARY KEY (`id_size`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `diskon`
--
ALTER TABLE `diskon`
MODIFY `id_diskon` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
MODIFY `id_slider` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=125;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
