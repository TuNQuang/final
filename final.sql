-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2021 at 12:36 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--
CREATE DATABASE IF NOT EXISTS `final` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `final`;

-- --------------------------------------------------------

--
-- Table structure for table `bacsi`
--

CREATE TABLE `bacsi` (
  `bsid` int(10) NOT NULL,
  `bsname` text NOT NULL,
  `chuyenkhoa` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `adminstatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bacsi`
--

INSERT INTO `bacsi` (`bsid`, `bsname`, `chuyenkhoa`, `email`, `pass`, `status`, `adminstatus`) VALUES
(1, 'Lê Sỹ Trung', 10, 'trungls01@bvhn.vn', 'trungls01', 1, 1),
(2, 'Lê Trung Hải', 1, 'hailt01@bvhn.vn', 'hailt01', 1, 1),
(3, 'Ngô Bá Toàn', 5, 'toannb01@bvhn.vn', 'toannb01', 1, 0),
(4, 'Nguyễn Ngọc Lan ', 2, 'lannn01@bvhn.vn', 'lannn01', 1, 0),
(5, 'Lý Ngọc Bích', 3, 'bichln01@bvhn.vn', 'bichln01', 1, 0),
(6, 'Nguyễn Kim Yến', 4, 'yennk01@bvhn.vn', 'yennk01', 1, 0),
(7, 'Lê Thị Hiếu', 6, 'hieult01@bvhn.vn', 'hieult01', 1, 0),
(8, 'Nguyễn Kim Tuyến', 7, 'tuyennk01@bvhn.vn', 'tuyennk01', 1, 0),
(9, 'Bùi Thanh Hà', 8, 'habt01@bvhn.vn', 'habt01', 1, 0),
(10, 'Mai Tiến Dũng', 9, 'dungmt01@bvhn.vn', 'dungmt01', 1, 0),
(12, 'Nguyễn Quang Tú', 2, 'tunq01@bvhn.vn', 'tunq01', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `benhnhan`
--

CREATE TABLE `benhnhan` (
  `bnid` varchar(12) NOT NULL,
  `bnname` varchar(50) NOT NULL,
  `age` int(10) DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `contact` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `insurance` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `benhnhan`
--

INSERT INTO `benhnhan` (`bnid`, `bnname`, `age`, `gender`, `contact`, `address`, `insurance`) VALUES
('001096004961', 'Nguyễn Quang Tú', 22, 'Nam', '012346579', 'Hà Nội', '');

-- --------------------------------------------------------

--
-- Table structure for table `chuyenkhoa`
--

CREATE TABLE `chuyenkhoa` (
  `ckid` int(10) NOT NULL,
  `ckname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chuyenkhoa`
--

INSERT INTO `chuyenkhoa` (`ckid`, `ckname`) VALUES
(1, 'Ung bướu'),
(2, 'Tiêu hóa'),
(3, 'Hỗ trợ sinh sản'),
(4, 'Thẩm mỹ'),
(5, 'Cơ xương khớp'),
(6, 'Nội tiết'),
(7, 'Tai mũi họng'),
(8, 'Thần kinh'),
(9, 'Tim mạch'),
(10, 'Tiết niệu & nam học');

-- --------------------------------------------------------

--
-- Table structure for table `lichkham`
--

CREATE TABLE `lichkham` (
  `appid` int(10) NOT NULL,
  `bnid` varchar(12) NOT NULL,
  `bsid` int(10) DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `position` text DEFAULT NULL,
  `history` text DEFAULT NULL,
  `services` int(10) DEFAULT NULL,
  `appdate` date DEFAULT NULL,
  `pending` tinyint(1) DEFAULT 1,
  `ngaykham` text DEFAULT NULL,
  `chandoan` text DEFAULT NULL,
  `phuongan` text DEFAULT NULL,
  `donthuoc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lichkham`
--

INSERT INTO `lichkham` (`appid`, `bnid`, `bsid`, `summary`, `position`, `history`, `services`, `appdate`, `pending`, `ngaykham`, `chandoan`, `phuongan`, `donthuoc`) VALUES
(1, '001096004961', 9, 'đau đầu', 'đầu', 'không', 1, '2021-08-31', 1, NULL, NULL, NULL, NULL),
(2, '001096004961', 3, 'Đau vai', 'vai', 'không', 1, '2021-08-30', 1, NULL, NULL, NULL, NULL),
(3, '001096004961', 2, 'đau cơ', 'cơ vai', 'không', 1, '2021-09-03', 0, '2021-08-29', 'mỏi cơ', 'tự theo dõi', 'không'),
(4, '001096004961', 2, 'mỏi cơ', NULL, 'mỏi cơ', 1, '2021-08-30', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `sid` int(10) NOT NULL,
  `sname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`sid`, `sname`) VALUES
(1, 'Gói khám sức khỏe tổng quát'),
(2, 'Gói khám tầm soát ung thư toàn diện'),
(3, 'Gói khám vô sinh hiếm muộn'),
(4, 'Gói khám tầm soát & nội soi tiêu hóa'),
(5, 'Gói khám tầm soát tuyến giáp & tuyến vú'),
(6, 'Gói khám phụ khoa'),
(7, 'Gói khám khác'),
(8, 'Đốt sóng cao tần u tuyến giáp'),
(9, 'Hút u vú chân không'),
(10, 'Tạo hình thẩm mỹ'),
(11, 'Điều trị hiếm muộn & hỗ trợ sinh sản'),
(12, 'Cắt amidan/ Nạo VA / Nội soi mũi xoang'),
(13, 'Điều trị bệnh lý phụ khoa bằng sóng cao tần RFA'),
(14, 'Gói điều trị khác');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bacsi`
--
ALTER TABLE `bacsi`
  ADD PRIMARY KEY (`bsid`),
  ADD KEY `chuyenkhoa` (`chuyenkhoa`);

--
-- Indexes for table `benhnhan`
--
ALTER TABLE `benhnhan`
  ADD PRIMARY KEY (`bnid`);

--
-- Indexes for table `chuyenkhoa`
--
ALTER TABLE `chuyenkhoa`
  ADD PRIMARY KEY (`ckid`);

--
-- Indexes for table `lichkham`
--
ALTER TABLE `lichkham`
  ADD PRIMARY KEY (`appid`),
  ADD KEY `bsid` (`bsid`),
  ADD KEY `services` (`services`),
  ADD KEY `bnid` (`bnid`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bacsi`
--
ALTER TABLE `bacsi`
  MODIFY `bsid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `chuyenkhoa`
--
ALTER TABLE `chuyenkhoa`
  MODIFY `ckid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lichkham`
--
ALTER TABLE `lichkham`
  MODIFY `appid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bacsi`
--
ALTER TABLE `bacsi`
  ADD CONSTRAINT `bacsi_ibfk_1` FOREIGN KEY (`chuyenkhoa`) REFERENCES `chuyenkhoa` (`ckid`);

--
-- Constraints for table `lichkham`
--
ALTER TABLE `lichkham`
  ADD CONSTRAINT `lichkham_ibfk_2` FOREIGN KEY (`bsid`) REFERENCES `bacsi` (`bsid`),
  ADD CONSTRAINT `lichkham_ibfk_3` FOREIGN KEY (`services`) REFERENCES `services` (`sid`),
  ADD CONSTRAINT `lichkham_ibfk_4` FOREIGN KEY (`bnid`) REFERENCES `benhnhan` (`bnid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
