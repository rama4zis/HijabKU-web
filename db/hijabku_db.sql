-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2025 at 01:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hijabku_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm`
--

CREATE TABLE `adm` (
  `id_admin` int(5) NOT NULL,
  `username` varchar(15) NOT NULL,
  `pass` varchar(6) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adm`
--

INSERT INTO `adm` (`id_admin`, `username`, `pass`, `nama_lengkap`) VALUES
(1, 'admin@gmail.com', 'admin1', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `kategori` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Hijab'),
(4, 'Top'),
(5, 'Bottom');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(3) NOT NULL,
  `nama_kota` varchar(10) NOT NULL,
  `tarif` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Jakarta', 10000),
(2, 'Tangerang', 15000),
(3, 'Bogor', 9000),
(4, 'Depok', 10000),
(5, 'Bekasi', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(30) NOT NULL,
  `password_pelanggan` varchar(6) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `telpon_pelanggan` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telpon_pelanggan`) VALUES
(16, 'early@gmail.com', '123456', 'early', '081233455677'),
(17, 'tarisya@gmail.com', 'tarisy', 'tarisya', '021222222222'),
(18, 'asus@gmail.com', 'asus@g', 'asus', '0930909000'),
(19, 'lavender@gmail.com', 'lavend', 'lavender', '121121212121'),
(20, 'bityty@gmail.com', 'bityty', 'bity ', '098856123489');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(5) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `bank` varchar(15) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(8, 28, 'early', 'danamon', 164000, '2022-04-23', '20220423185312Screenshot (44).png'),
(9, 29, 'early', 'bank dki', 95000, '2022-05-28', '20220528164159Screenshot (128).png'),
(13, 35, 'early123', 'jenius', 115000, '2022-06-10', '20220610182254HD3.jpg'),
(14, 40, 'searly', 'BCA', 109000, '2022-07-11', '20220711200539wall-6706169_960_720.jpg'),
(15, 39, 'tarisya', 'danamon', 60000, '2022-07-11', '20220711201125cf1a2a6e2a61ede815a388d92101218e.jpg'),
(16, 44, 'bityty', 'BRI', 60000, '2022-07-27', '20220727124107HID.jpg'),
(17, 45, 'kerenina bunga cahyantika', '', 0, '2025-05-27', '20250527054235Screenshot 2024-10-09 193004.png'),
(18, 43, 'kerenina bunga cahyantika', 'BRI', 115000, '2025-05-28', '20250528111524Screenshot 2024-06-10 131631.png');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(5) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(15) NOT NULL,
  `tarif` int(5) NOT NULL,
  `alamat_pengiriman` varchar(50) NOT NULL,
  `status_pembelian` varchar(20) NOT NULL DEFAULT 'PENDING',
  `resi_pengiriman` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`) VALUES
(35, 16, 1, '2022-06-10', 115000, 'Jakarta', 10000, 'jkt no 48', 'BARANG DIKIRIM', '00000000077777777'),
(38, 16, 5, '2022-06-24', 60000, 'Bekasi', 15000, 'jl. galaksi no.xviii', 'PENDING', ''),
(40, 16, 4, '2022-07-05', 109000, 'Depok', 10000, 'mardogna no.90', 'LUNAS', '000009090909'),
(43, 19, 1, '2022-07-17', 115000, 'Jakarta', 10000, 'jl. kota tua no.65', 'SUCCESS', ''),
(44, 20, 2, '2022-07-27', 60000, 'Tangerang', 15000, 'tangsel', 'LUNAS', ''),
(45, 17, 5, '2025-05-26', 105000, 'Bekasi', 15000, 'desa mawar gang 24 ', 'SUCCESS', ''),
(46, 17, 2, '2025-05-27', 194000, 'Tangerang', 15000, 'jalan anggrek ', 'PENDING', ''),
(47, 19, 3, '2025-05-28', 28000, 'Bogor', 9000, 'fsdaTEW', 'PENDING', ''),
(48, 19, 1, '2025-05-28', 403000, 'Jakarta', 10000, 'sFS', 'PENDING', ''),
(49, 19, 3, '2025-05-28', 402000, 'Bogor', 9000, 'ZDF', 'PENDING', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `harga` int(9) NOT NULL,
  `berat` int(3) NOT NULL,
  `subharga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah_produk`, `nama`, `harga`, `berat`, `subharga`) VALUES
(43, 35, 45, 1, ' Kala Top - Beige', 105000, 350, 105000),
(44, 36, 39, 1, 'Bergo Shanum - Creamy', 60000, 118, 60000),
(45, 37, 30, 1, 'Turkish Shawl - Maroon', 45000, 155, 45000),
(46, 38, 32, 1, 'Turkish Shawl - Army', 45000, 155, 45000),
(47, 39, 32, 1, 'Turkish Shawl - Army', 45000, 155, 45000),
(48, 40, 46, 1, 'Flowy Cullote ', 99000, 400, 99000),
(49, 41, 48, 1, 'Aruna Dress - Polca Terracota', 160000, 500, 160000),
(50, 42, 37, 1, 'Turkish Shawl - Sky Blue', 45000, 155, 45000),
(51, 43, 43, 1, 'Kala Top - Black', 105000, 350, 105000),
(52, 44, 33, 1, 'Turkish Shawl - Black', 45000, 155, 45000),
(53, 45, 35, 2, 'Turkish Shawl - Dusty Pink', 45000, 155, 90000),
(54, 46, 48, 1, 'Aruna Dress - Polca Terracota', 160000, 500, 160000),
(55, 46, 28, 1, 'Hijab Paris Premium - Cream', 19000, 80, 19000),
(56, 47, 29, 1, 'Pasmina Premiun-Nude', 19000, 80, 19000),
(57, 49, 39, 1, 'Hijab Motif Premium-Putih', 60000, 118, 60000),
(58, 49, 47, 1, 'Hijab Shimmer Trend', 160000, 500, 160000),
(59, 49, 32, 1, 'Hijab Motif Premium-Putih', 45000, 155, 45000),
(60, 49, 33, 1, 'Hijab Motif Premium-Pink', 45000, 155, 45000),
(61, 49, 34, 1, 'Hijab Motif Premium-UnguHitam', 45000, 155, 45000),
(62, 49, 28, 1, 'Pasmina Babydoll-DustyPink', 19000, 80, 19000),
(63, 49, 27, 1, 'Pasmina Babydoll-Biru Muda', 19000, 80, 19000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `kat_produk` varchar(15) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(4) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kat_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(27, 'Hijab', 'Pasmina Babydoll-Biru Muda', 19000, 80, 'HPPAM.jpg', '                        Daily hijab segi empat yang bisa digunakan sehari-hari dan cocok dengan segala bentuk wajah.<p>\r\n<br>\r\nHarga : 19.000 <p>\r\nUkuran 110 x 110 cm <p>\r\n\r\n<br>\r\nPasmina BabyDoll: <p>\r\n• Sangat mudah dibentuk, <p>\r\n• Sangat nyaman dan tegak saat digunakan, <p>\r\n• Lembut dan tidak licin. <p>\r\n<br>\r\nNOTE : kemiripan warna barang dengan gambar 80-90% karena bergantung pada resolusi layar monitor atau handphone, pencahayaan dan editing pada saat dokumentasi. Dan bisa digunakan untuk berbagai acara lhooo!                                        ', 6),
(28, 'Hijab', 'Pasmina Babydoll-DustyPink', 19000, 80, 'HPPCOK.jpg', '                Daily hijab segi empat yang bisa digunakan sehari-hari dan cocok dengan segala bentuk wajah.<p>\r\n<br>\r\nHarga : 19.000 <p>\r\nUkuran 110 x 110 cm <p>\r\n\r\n<br>\r\nPasmina BabyDoll\r\n: <p>\r\n• Sangat mudah dibentuk, <p>\r\n• Sangat nyaman dan tegak saat digunakan, <p>\r\n• Lembut dan tidak licin. <p>\r\n<br>\r\nNOTE : kemiripan warna barang dengan gambar 80-90% karena bergantung pada resolusi layar monitor atau handphone, pencahayaan dan editing pada saat dokumentasi. Dan bisa digunakan untuk berbagai acara lhooo!                  ', 2),
(29, 'Hijab', 'Pasmina Premiun-Nude', 19000, 80, 'ZXC.jpg', '                Daily hijab Pasmina\r\nyang bisa digunakan sehari-hari dan cocok dengan segala bentuk wajah.<p>\r\n<br>\r\nHarga : 19.000 <p>\r\nUkuran 110 x 110 cm <p>\r\nBahan Pasmina (Premium) <p>\r\n<br>\r\nHijab Pasmina Premium: <p>\r\n• Sangat mudah dibentuk, <p>\r\n• Sangat nyaman dan tegak saat digunakan, <p>\r\n• Lembut dan tidak licin. <p>\r\n<br>\r\nNOTE : kemiripan warna barang dengan gambar 80-90% karena bergantung pada resolusi layar monitor atau handphone, pencahayaan dan editing pada saat dokumentasi. Dan bisa digunakan untuk berbagai acara lhooo!                    ', 4),
(30, 'Hijab', 'Turkish Shawl - Maroon', 45000, 155, 'HJB4.jpeg', '        Material Ceruty Babydoll yang lagi trend banget sekarang, karena dia punya karakteristik sendiri yaitu bahan super jatuh dan bertekstur pasir sehingga sangat mudah di atur.<p>\r\n<br>\r\n• Size (180x75) <p>\r\n• Kualitas Premium. <p>\r\n• Finishing JAHIT TEPI KECIL RAPIH. <p>\r\n• Ringan dan jatuh. <p>\r\n• Price 45.000/pcs.        ', 9),
(31, 'Hijab', 'Hijab Motif Premium-Hijau', 45000, 155, 'HIJAU.jpg', '        Material Voal Premium  yang lagi trend banget sekarang, karena dia punya karakteristik sendiri yaitu bahan super jatuh dan sangat mudah di atur.<p>\r\n<br>\r\n• Size (180x75) <p>\r\n• Kualitas Premium. <p>\r\n• Finishing JAHIT TEPI KECIL RAPIH. <p>\r\n• Ringan dan jatuh. <p>\r\n• Price 45.000/pcs.        ', 11),
(32, 'Hijab', 'Hijab Motif Premium-Putih', 45000, 155, 'PUTIH.jpg', '                                        Material Voal Premium yang lagi trend banget sekarang, karena dia punya karakteristik sendiri yaitu bahan super jatuh dan sangat mudah di atur.<p>\r\n<br>\r\n• Size (180x75) <p>\r\n• Kualitas Premium. <p>\r\n• Finishing JAHIT TEPI KECIL RAPIH. <p>\r\n• Ringan dan jatuh. <p>\r\n• Price 45.000/pcs.                                        ', 1),
(33, 'Hijab', 'Hijab Motif Premium-Pink', 45000, 155, 'PINK.jpg', '                Material Voal Premium yang lagi trend banget sekarang, karena dia punya karakteristik sendiri yaitu bahan super jatuh dan sangat mudah di atur.<p>\r\n<br>\r\n• Size (180x75) <p>\r\n• Kualitas Premium. <p>\r\n• Finishing JAHIT TEPI KECIL RAPIH. <p>\r\n• Ringan dan jatuh. <p>\r\n• Price 45.000/pcs.                ', 3),
(34, 'Hijab', 'Hijab Motif Premium-UnguHitam', 45000, 155, 'UNGU.jpg', '                Material Voal Premium yang lagi trend banget sekarang, karena dia punya karakteristik sendiri yaitu bahan super jatuh dan sangat mudah di atur.<p>\r\n<br>\r\n• Size (180x75) <p>\r\n• Kualitas Premium. <p>\r\n• Finishing JAHIT TEPI KECIL RAPIH. <p>\r\n• Ringan dan jatuh. <p>\r\n• Price 45.000/pcs.                ', 4),
(35, 'Hijab', 'Hijab Motif  Premium-Merah', 45000, 155, 'MERAH.jpg', '                Material Voal Premium yang lagi trend banget sekarang, karena dia punya karakteristik sendiri yaitu bahan super jatuh dan  sangat mudah di atur.<p>\r\n<br>\r\n• Size (180x75) <p>\r\n• Kualitas Premium. <p>\r\n• Finishing JAHIT TEPI KECIL RAPIH. <p>\r\n• Ringan dan jatuh. <p>\r\n• Price 45.000/pcs.                ', 0),
(37, 'Hijab', 'Pasmina-Kaos Premium-AbuMuda', 45000, 155, 'LKJ.jpg', '                        Material Kaos  yang lagi trend banget sekarang, karena dia punya karakteristik sendiri yaitu bahan super jatuh dan sangat mudah di atur.<p>\r\n<br>\r\n• Size (180x75) <p>\r\n• Kualitas Premium. <p>\r\n• Finishing JAHIT TEPI KECIL RAPIH. <p>\r\n• Ringan dan jatuh. <p>\r\n• Price 45.000/pcs.                        ', 2),
(38, 'Hijab', 'Hijab Motif Premium-Ungu', 45000, 155, 'HJB8.jpg', '        Material Motif Premium  trend banget sekarang, karena dia punya karakteristik sendiri yaitu bahan super jatuh dan bertekstur pasir sehingga sangat mudah di atur.<p>\r\n<br>\r\n• Size (180x75) <p>\r\n• Kualitas Premium. <p>\r\n• Finishing JAHIT TEPI KECIL RAPIH. <p>\r\n• Ringan dan jatuh. <p>\r\n• Price 45.000/pcs.        ', 3),
(39, 'Hijab', 'Hijab Motif Premium-Putih', 60000, 118, 'HJB9.jpg', '        Material Bahan : High Quality \r\nVoal Premium. <p>\r\nBestSeller<p>\r\nMudah Dibentuk <p>\r\nTidak Nerawang <p>\r\n<br>\r\nHarga 60.000\r\n                      ', 4),
(41, 'hijab', 'Segi Empat Premiun', 23000, 150, 'ABCDE.jpg', '                Material : Rib Rayon. <p>\r\nHarga : 23.000 <p>\r\n<br>\r\n-Bahan Rib Rayon yang lembut, strecth serta tebal namun tidak bikin gerah. <p>\r\n- Nyaman digunakan sehari-hari. <p>\r\n              ', 11),
(42, 'Hijab', 'BellaSquare', 25000, 150, 'HJB11.webp', '        Material : PollyCotton. <p>\r\nHarga : 25.000 <p>\r\n<br>\r\n-Bahan pollycotton yang lembut, tidak tipis,tidak mudah gerah <p>\r\n- Nyaman digunakan sehari-hari. <p>\r\n     ', 17),
(43, 'Hijab', 'Hijab Motif Premium-BiruPink', 45000, 350, 'ZAQ.jpg', '    Hijab MOTIF SegiEmpat nyaman dan praktis serta menjadi favorit wanita. Bahan tidak licin  <p>\r\n<br>\r\nHarga: 45.000 <p>\r\n<br>\r\nDetail Size: <p>\r\nbahan voal premium <p>\r\nukuran 130x130 <p>\r\nMudah dibentuk <p>\r\nTidak kaku <p>\r\n\r\n        ', 13),
(44, 'Hijab', 'Hijab NONpet', 105000, 350, 'MNB.jpg', '        Bahan jatuh, ringan, dan adem. Pengiriman warna random,<p>\r\n<br>\r\nHarga: 105.000 <p>\r\n<br>\r\nModel Terbaru <p>\r\nBahan Kaos <p>\r\nDaily Olahraga<p>\r\n\r\n        ', 1),
(47, 'Hijab', 'Hijab Shimmer Trend', 160000, 500, 'POI.jpg', '       Hijan SHIMMER. <p>\r\nMaterial bahan : High Quality Satin yang memiliki keunggulan dari segi bahan. \r\n<br>\r\nHarga: 160.000 <p>\r\n<br>\r\nBagian Luar Shimmer <p>\r\nBagian dalam Tidak Licin <p>\r\nmemiliki tampilan yang mengkilap <p>\r\n\r\n   ', 17),
(48, 'Hijab', 'Pasmina Gradasi Pink', 160000, 500, 'ABCD.jpg', '        Pasmina BestSeller. <p>\r\nMaterial bahan : High Quality Pollycottoon yang sangat ringan dan mudah menyerap keringat \r\n<br>\r\nHarga: 160.000 <p>\r\n<br>\r\n- BestSeller<p>\r\n- Produk Terbatas  <p>\r\n    ', 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adm`
--
ALTER TABLE `adm`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
