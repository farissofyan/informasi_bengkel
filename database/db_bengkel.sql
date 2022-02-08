-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 30, 2022 at 07:07 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bengkel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_adm` int(11) NOT NULL,
  `nama_adm` varchar(50) NOT NULL,
  `telp_adm` varchar(15) NOT NULL,
  `user_adm` varchar(50) NOT NULL,
  `pass_adm` varchar(100) NOT NULL,
  `foto_adm` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_adm`, `nama_adm`, `telp_adm`, `user_adm`, `pass_adm`, `foto_adm`) VALUES
(1, 'Administrator', '08962878534', 'admin', 'admin', '10172021182044e.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `barangjasa`
--

CREATE TABLE `barangjasa` (
  `id_brg` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `stok` varchar(10) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `id_adm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barangjasa`
--

INSERT INTO `barangjasa` (`id_brg`, `nama`, `jenis`, `stok`, `harga`, `keterangan`, `id_adm`) VALUES
(1, 'Oli Yamalube 800cc', 'barang', '21', '35000', 'SAE 10/30W', 1),
(4, 'Service Berkala', 'jasa', '100', '30000', 'Service per kilometer', 1),
(5, 'Suspensi Depan Matic', 'barang', '5', '500000', 'Set Shock Absorber depan Matic', 1),
(6, 'Tune Up Motor', 'jasa', '100', '75000', 'Mengembalikan Performa Mesin', 1),
(7, 'Overhaul Motor', 'jasa', '100', '250000', 'Turun Mesin', 1),
(8, 'Kanvas REM Honda Matic Depan', 'barang', '13', '35000', 'Kode Part KVB', 1),
(9, 'Kanvas REM Belakang', 'barang', '14', '30000', 'Kode part KVB', 1),
(10, 'Oli AHM MPX 2', 'barang', '25', '45000', 'SAE 10/30W Matic', 1),
(11, 'Kanvas REM Yamaha Matic Belakang', 'barang', '15', '30000', 'Kode Part 5MX', 1),
(12, 'Kanvas REM Yamaha Matic Depan', 'barang', '18', '35000', 'Kode part 1S7', 1),
(13, 'Suspensi Belakang Matic', 'barang', '17', '250000', 'Tinggi 30-34mm Untuk all matic', 1),
(14, 'Service Besar', 'jasa', '100', '150000', 'Service Besar', 1),
(15, 'Kanvas REM Honda Matic Depan', 'barang', '16', '35000', 'Kode Part KVB', 1),
(16, 'Baut 8-12mm', 'barang', '2', '2000', 'Baut ukuran 8-12mm', 1),
(17, 'Ganti Oli', 'jasa', '100 ', '15000', 'Penggantian Oli Mesin/Oli Gardan matic', 1),
(18, 'Ganti Kanvas Rem', 'jasa', '100', '15000', 'Penggantian Part kanvas Rem', 1),
(19, 'Service Shock Absorber Matic', 'jasa', '100', '80000', 'Service Shock Absorber untuk matic', 1),
(20, 'Klep Set Honda Matic', 'barang', '9', '70000', 'Klep Set motor Honda Matic', 1),
(21, 'Piston 56mm Honda Matic', 'barang', '2', '160000', 'Piston NPP Honda Matic', 1),
(22, 'Packing Gasket Top Set', 'barang', '9', '50000', 'Packing Top Set Honda Vario', 1),
(23, 'Air Colant Radiator 1L', 'barang', '25', '40000', 'Genuine Part All Motor', 1),
(24, 'Oli AHM MPX 1', 'barang', '30', '45000', 'SAE 10/30W Manual', 1),
(25, 'Lampu Halogen', 'barang', '48', '35000', 'Lampu Motor bebek', 1),
(26, 'Lampu LED Putih', 'barang', '16', '80000', 'Warna Putih Susu', 1),
(27, 'Lampu Stop Rem', 'barang', '29', '10000', 'Lampu Stop Rem', 1),
(28, 'Kabel Speedometer Honda', 'barang', '6', '25000', 'Kabel Speedometer Honda Beat, Vario', 1),
(29, 'Oli Gardan Matic Yamalube 100ML', 'barang', '9', '14500', 'Oli Samping/Gardan Matic 100ML', 1),
(30, 'Oli Gardan Matic Yamalube 140ML', 'barang', '15', '17000', 'Oli Gardan matic 140ML', 1),
(31, 'Oli Gardan Matic Honda 120ML', 'barang', '19', '13000', 'Oli Gardan/Oli samping Matic120 ML', 1),
(32, 'Oli Enduro Racing 4T 1Lt', 'barang', '24', '48000', 'Oli 4T', 1),
(33, 'Carbu/Injector Cleaner ', 'barang', '13', '25000', 'Cleaning Carb/Injection Motor', 1),
(34, 'Klakson Keong Motor', 'barang', '4', '120000', 'Klakson Keong All Motor', 1),
(35, 'Busi NGK Honda', 'barang', '16', '14000', 'Busi motor honda', 1),
(36, 'Busi NGK Yamaha', 'barang', '20', '14000', 'Busi NGK Yamaha', 1),
(37, 'Battery/Aki Kering Yuasa', 'barang', '9', '200000', 'Aki untuk semua motor ', 1),
(38, 'Gear Set Honda Kharisma/Supra/Revo/Blade/Supra Fit', 'barang', '4', '165000', 'Gear Set + Rantai Sepeda Motor', 1),
(39, 'Bearing/Laher', 'barang', '3', '10000', 'Bearing Laher Motor', 1),
(40, 'V-Belt Set Yamaha Nmax/Aerox/Lexi', 'barang', '10', '150000', 'VanBelt Set + Roller', 1),
(41, 'V-Belt Set Honda Vario110/125/Beat Karbu/Beat Injection', 'barang', '9', '89000', 'Vanbelt set + Roller Honda', 1),
(42, 'Kanvas Ganda Honda Matic ', 'barang', '9', '80000', 'Kanvas Ganda Honda Matic', 1),
(43, 'Jasa Pergantian Spare Part', 'jasa', '1', '10000', 'Jasa Repair/ganti spare part ', 1),
(44, 'Lampu Rem', 'barang', '9', '5000', 'Lampu Stop Rem', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE `kasir` (
  `id_kasir` int(11) NOT NULL,
  `nama_kasir` varchar(50) NOT NULL,
  `telp_kasir` varchar(20) NOT NULL,
  `user_kasir` varchar(50) NOT NULL,
  `pass_kasir` varchar(100) NOT NULL,
  `foto_kasir` text NOT NULL,
  `id_adm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `nama_kasir`, `telp_kasir`, `user_kasir`, `pass_kasir`, `foto_kasir`, `id_adm`) VALUES
(1, 'Faris Sofyan', '0895358560637', 'kasir', 'kasir', '10112021232639o.PNG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `id_kon` int(11) NOT NULL,
  `nama_kon` varchar(50) NOT NULL,
  `telp_kon` varchar(20) NOT NULL,
  `alamat_kon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`id_kon`, `nama_kon`, `telp_kon`, `alamat_kon`) VALUES
(0, 'Umum', '0', '-'),
(5, 'Wiganda', '0895358560637', 'Jl. Rorotan'),
(6, 'Mahdi', '021404812', 'Jl. Sutim'),
(8, 'Alex', '0214912941', 'Jl. Marunda Baru'),
(9, 'Roy', '089521631289', 'Jl. Kayu Tinggi'),
(10, 'Joko', '021213282818', 'Jl. Tipar Cakung'),
(11, 'Husnan', '02131293912', 'Jl. Rorotan III'),
(12, 'Agus', '089241723761', 'Jl. Marunda Lama ');

-- --------------------------------------------------------

--
-- Table structure for table `mekanik`
--

CREATE TABLE `mekanik` (
  `id_mekanik` int(11) NOT NULL,
  `nama_mekanik` varchar(50) CHARACTER SET latin1 NOT NULL,
  `telp_mekanik` varchar(20) CHARACTER SET latin1 NOT NULL,
  `alamat_mekanik` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mekanik`
--

INSERT INTO `mekanik` (`id_mekanik`, `nama_mekanik`, `telp_mekanik`, `alamat_mekanik`) VALUES
(2, 'Dicky Putra', '08921738127', 'Jl. Rorotan II'),
(3, 'Rois Salim', '08912831238', 'Jl. Malaka III HB'),
(4, 'Muhammad Iqbal', '088276215674', 'Jl. Rorotan VI'),
(5, 'Ahmad Husnan', '081283719281', 'Jl. Rorotan VI'),
(6, 'Vicky Ary Rahardian', '089542445192', 'Jl. Malaka Bulak');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_spl` int(11) NOT NULL,
  `nama_spl` varchar(50) NOT NULL,
  `telp_spl` varchar(20) NOT NULL,
  `alamat_spl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_spl`, `nama_spl`, `telp_spl`, `alamat_spl`) VALUES
(2, 'JSM Part Center', '0818622226', 'Ruko Sentra Niaga 5. Kav 10 No 2. Harapan Indah Boulevard.'),
(3, 'Genesis Surya Motor', '081283970033', 'Jl. Taman Venda Utam, RT.007/RW.026, Pejuang, Kec. Bekasi Bar., Bekasi, Jawa Barat\r\n'),
(4, 'Toko Mur & Baut', '02144853522', 'Jl. Taman Harapan Indah No.16, RT.005/RW.027, Pejuang, Kecamatan Medan Satria, Kota Bks, Jawa Barat');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_trx`
--

CREATE TABLE `tmp_trx` (
  `id_tmp` int(11) NOT NULL,
  `id_trx` varchar(20) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `jml` int(11) NOT NULL,
  `tgl_booking` date DEFAULT NULL,
  `bukti` varchar(256) DEFAULT NULL,
  `id_kasir` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trx`
--

CREATE TABLE `trx` (
  `id_trx` varchar(20) NOT NULL,
  `id_kon` int(11) NOT NULL,
  `tgl_trx` date NOT NULL,
  `total` varchar(20) NOT NULL,
  `id_kasir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trxbarang`
--

CREATE TABLE `trxbarang` (
  `id_trxbrg` varchar(20) NOT NULL,
  `tgl_trxbrg` date NOT NULL,
  `id_brg` int(11) NOT NULL,
  `id_spl` int(11) NOT NULL,
  `jml_brg` int(11) NOT NULL,
  `ket_trxbrg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `telp` varchar(14) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `foto`, `telp`, `role`) VALUES
(1, 'Faris Sofyani', 'kasir', '123', '10112021232639o.PNG', '0895358560637', 'kasir'),
(2, 'Administrator', 'admin', '123', '10172021182044e.PNG', '08962878534', 'admin'),
(3, 'Sutejo', 'mantap', 'mantap', '01282022165746).png', '08231231', 'kasir'),
(5, 'Sutejo Baihaki', 'sutejo', '123', 'ic-user.PNG', '122312312', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_adm`);

--
-- Indexes for table `barangjasa`
--
ALTER TABLE `barangjasa`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_kasir`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id_kon`);

--
-- Indexes for table `mekanik`
--
ALTER TABLE `mekanik`
  ADD PRIMARY KEY (`id_mekanik`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_spl`);

--
-- Indexes for table `tmp_trx`
--
ALTER TABLE `tmp_trx`
  ADD PRIMARY KEY (`id_tmp`);

--
-- Indexes for table `trx`
--
ALTER TABLE `trx`
  ADD PRIMARY KEY (`id_trx`);

--
-- Indexes for table `trxbarang`
--
ALTER TABLE `trxbarang`
  ADD PRIMARY KEY (`id_trxbrg`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barangjasa`
--
ALTER TABLE `barangjasa`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `kasir`
--
ALTER TABLE `kasir`
  MODIFY `id_kasir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id_kon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mekanik`
--
ALTER TABLE `mekanik`
  MODIFY `id_mekanik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_spl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tmp_trx`
--
ALTER TABLE `tmp_trx`
  MODIFY `id_tmp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
