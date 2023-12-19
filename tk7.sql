-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 03:06 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tk7`
--

-- --------------------------------------------------------

--
-- Table structure for table `dashboard`
--

CREATE TABLE `dashboard` (
  `id` int(11) NOT NULL,
  `sampah` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `harga` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dashboard`
--

INSERT INTO `dashboard` (`id`, `sampah`, `keterangan`, `gambar`, `harga`) VALUES
(2, 'PLASTIK', 'Sampah plastik adalah semua barang bekas atau tidak terpakai yang materialnya diproduksi dari bahan kimia tak terbarukan. Sebagian besar sampah plastik yang digunakan sehari-hari biasanya dipakai untuk pengemasan.', 'https://res.cloudinary.com/dk0z4ums3/image/upload/v1635814357/attached_image/dampak-sampah-plastik-bagi-lingkungan-dan-kesehatan-manusia.jpg', 1700),
(3, 'LOGAM', 'Limbah logam merupakan limbah yang mudah dipisahkan dari timbunan sampah dan dapat didaur ulang menjadi barang – barang yang bernilai seni.', 'https://gdb.voanews.com/B55C3C50-1122-4BEC-8843-24F10A4A09CE_w1200_r1.jpg', 1500),
(4, 'BESI', 'Besi scrap merupakan besi bekas hasil pemakaian seperti besi bekas pembongkaran rumah, gedung, pabrik atau sisa-sisa produksi, peralatan produksi yang sudah diafkir, dan lain-lain.', 'https://3.bp.blogspot.com/-nIOqjknx6Ug/UY2aDI4CNhI/AAAAAAAACnE/WgFUvvkekck/s1600/besitua+manado_budisusilo+%283%29.JPG', 2000),
(5, 'KACA', 'Limbah kaca adalah bahan yang sulit diuraikan dan bersifat tajam, banyak ditemukan di sekitar lingkungan. Limbah kaca dianggap sebagai benda yang tidak memiliki nilai.', 'https://img.lovepik.com/photo/20211203/medium/lovepik-recycled-glass-bottles-picture_501481178.jpg', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `formproduk`
--

CREATE TABLE `formproduk` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `produk` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nomor_hp` varchar(30) NOT NULL,
  `jumlah` bigint(30) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `formproduk`
--

INSERT INTO `formproduk` (`id`, `nama`, `produk`, `alamat`, `nomor_hp`, `jumlah`, `date`) VALUES
(3, 'Ehsan', 'Bunga Rangkai dari Logam Bekas', 'Malaysia', '0899999978', 2, '2023-12-19');

-- --------------------------------------------------------

--
-- Table structure for table `form_penjualan`
--

CREATE TABLE `form_penjualan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `berat` int(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_hp` bigint(30) NOT NULL,
  `harga` bigint(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form_penjualan`
--

INSERT INTO `form_penjualan` (`id`, `nama`, `jenis`, `berat`, `alamat`, `no_hp`, `harga`) VALUES
(5, 'Susanti', 'plastik', 4, 'Asgard', 89997556, 20000),
(6, 'Jein', 'kaca', 3, 'Asgard', 82246377149, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `gambar`, `nama`, `harga`) VALUES
(1, 'https://www.mongabay.co.id/wp-content/uploads/2019/07/tas-bungkus-kopi.jpg', 'Keranjang Plastik Daur Ulang Handmade by UMKM IRT', 20000),
(2, 'https://hyundai.motorstudio.co.id/storage/dx0Aj3mzfNaPNRONsQTmFpsPi8XbUb1Dwx5m0Bg2.png', 'POT Botol Plastik handmade', 30000),
(3, 'https://asset-2.tstatic.net/muria/foto/bank/images/lampu-rajut-logam-pati.jpg', 'Bunga Rangkai dari Logam Bekas', 70000),
(4, 'https://asset.kompas.com/crops/4tV8X05VXZVjedTd2artEbrmkIc=/0x0:0x0/750x500/data/photo/2021/09/02/613018de7851a.jpg', 'Lampu Berbentuk Kupu-Kupu dari Logam Bekas', 100000),
(5, 'https://haidiva.com/wp-content/uploads/2020/03/paving.jpg', 'Keramik dari Beling', 100000),
(6, 'https://3.bp.blogspot.com/-ld9-RwmeiBo/Uacjrf11OoI/AAAAAAAAAQY/C05mQ3Y-ntQ/s1600/IMG-20130528-05233.jpg', 'Keranjang dari Gelas Plastik Minuman', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE `registrasi` (
  `id` int(11) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registrasi`
--

INSERT INTO `registrasi` (`id`, `f_name`, `l_name`, `username`, `password`) VALUES
(1, 'Rakaaa', 'Targaryan', 'raka', '123'),
(2, 'Aegon', 'Targaryan', 'loki', '12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formproduk`
--
ALTER TABLE `formproduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_penjualan`
--
ALTER TABLE `form_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `formproduk`
--
ALTER TABLE `formproduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `form_penjualan`
--
ALTER TABLE `form_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
