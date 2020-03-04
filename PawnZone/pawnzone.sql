-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04 มี.ค. 2020 เมื่อ 09:20 AM
-- เวอร์ชันของเซิร์ฟเวอร์: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pawnzone`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `customer`
--

CREATE TABLE `customer` (
  `CusID` int(10) NOT NULL,
  `CusFname` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `CusLname` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `CusAddress` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Cuspawnday` date NOT NULL,
  `Tel` int(11) NOT NULL,
  `CusImg` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `customer`
--

INSERT INTO `customer` (`CusID`, `CusFname`, `CusLname`, `CusAddress`, `Cuspawnday`, `Tel`, `CusImg`) VALUES
(42, 'สุจินันท์', 'จุฬา', 'พฤกษา', '2020-01-18', 807376088, '202002281486469584.png'),
(43, 'บง', 'จง', 'หาดใหญ่', '0000-00-00', 899777582, '20200228556605594.png'),
(44, 'd', 'd', 'หอ', '2020-02-20', 812345678, ''),
(45, 'dddd', 'ddddd', 'หอ', '2020-02-29', 899777577, ''),
(46, 'li', 'chee', 'หาดใหญ่', '2020-02-09', 612253749, ''),
(47, 'kul', 'lo', 'หาดใหญ่', '0000-00-00', 807376089, ''),
(49, 'pop', 'pop', 'หาดใหญ่', '0000-00-00', 812345678, ''),
(50, 'lechee', 'samp', 'หาดใหญ่', '0000-00-00', 899777577, ''),
(51, 'me', 'too', 'หาดใหญ่', '0000-00-00', 899777582, ''),
(52, 'mark', 'tuan', 'หาดใหญ่', '0000-00-00', 807376088, ''),
(53, 'true', 'false', 'หาดใหญ่', '0000-00-00', 899777577, ''),
(54, 'bam', 'bam', 'หาดใหญ่', '0000-00-00', 899777577, '20200228495979677.jpg');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `gold`
--

CREATE TABLE `gold` (
  `GoldID` int(10) NOT NULL,
  `TypeGold` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `WeightGold` int(10) NOT NULL,
  `Price` int(10) NOT NULL,
  `Rate` int(5) NOT NULL,
  `Pay` int(10) NOT NULL,
  `DuePayment` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `gold`
--

INSERT INTO `gold` (`GoldID`, `TypeGold`, `WeightGold`, `Price`, `Rate`, `Pay`, `DuePayment`) VALUES
(1, 'ทองคำแท่ง', 3, 10000, 3, 300, '1เดือน'),
(2, 'ทองคำรูปพรรณ', 3, 10000, 3, 300, '1เดือน');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `golds`
--

CREATE TABLE `golds` (
  `GoldID` int(5) NOT NULL,
  `CusID` int(2) NOT NULL,
  `Goldpawnday` date NOT NULL,
  `TypeGold` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `WeightGold` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Rate` int(11) NOT NULL,
  `Pay` int(11) NOT NULL,
  `DuePayment` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `GoldStatus` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `GoldImg` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Golddetail` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `golds`
--

INSERT INTO `golds` (`GoldID`, `CusID`, `Goldpawnday`, `TypeGold`, `WeightGold`, `Price`, `Rate`, `Pay`, `DuePayment`, `GoldStatus`, `GoldImg`, `Golddetail`) VALUES
(1, 42, '2020-02-03', 'ทองคำรูปพรรณ', 1, 10000, 1, 100, '1เดือน', 'อยู่ในระบบ', '202002281658440411.png', ' แหวน'),
(2, 43, '2020-02-03', 'ทองคำรูปพรรณ', 3, 10000, 3, 300, '1เดือน', 'อยู่ในระบบ', '202002281361198513.png', ' กำไล'),
(3, 42, '2020-02-04', 'ทองคำแท่ง', 3, 15000, 1, 150, '1เดือน', 'ไถ่ถอน', '202002281114688353.png', 'สร้อย'),
(9, 44, '2020-02-03', 'ทองคำแท่ง', 1, 10000, 1, 100, '1เดือน', '', '', ''),
(10, 45, '2020-02-10', 'ทองคำรูปพรรณ', 3, 10000, 1, 100, '3เดือน', 'อยู่ในระบบ', '', ''),
(11, 42, '2020-02-09', 'ทองคำแท่ง', 10, 15000, 6, 150, '1เดือน', 'อยู่ในระบบ', '', ''),
(12, 42, '2020-02-08', 'ทองคำแท่ง', 10, 15000, 6, 150, '1เดือน', 'ไถ่ถอน', '', ''),
(13, 42, '0000-00-00', 'ทองคำแท่ง', 10, 15000, 6, 150, '1เดือน', '', '', ''),
(15, 46, '0000-00-00', 'ทองคำรูปพรรณ', 3, 10000, 1, 100, '1เดือน', '', '', ''),
(16, 47, '2020-02-09', 'ทองคำรูปพรรณ', 4, 10000, 2, 200, '1เดือน', '', '', ''),
(18, 42, '0000-00-00', 'ทองคำแท่ง', 2020, 10000, 10, 1000, '1เดือน', 'อยู่ในระบบ', '', ''),
(19, 42, '0000-00-00', 'ทองคำแท่ง', 2020, 10000, 10, 1000, '1เดือน', 'อยู่ในระบบ', '', ''),
(20, 42, '0000-00-00', 'ทองคำแท่ง', 2020, 10000, 10, 1000, '1เดือน', 'อยู่ในระบบ', '', ''),
(21, 43, '0000-00-00', 'ทองคำรูปพรรณ', 2020, 10000, 3, 300, '1เดือน', 'อยู่ในระบบ', '', ''),
(25, 46, '0000-00-00', 'ทองคำรูปพรรณ', 2020, 10000, 2, 200, '1เดือน', 'อยู่ในระบบ', '', ''),
(26, 49, '2020-02-18', 'ทองคำแท่ง', 3, 15000, 1, 150, '1เดือน', 'อยู่ในระบบ', '', ''),
(27, 50, '2020-02-20', 'ทองคำแท่ง', 4, 20000, 2, 400, '3เดือน', 'อยู่ในระบบ', '', ''),
(28, 50, '0000-00-00', 'ทองคำแท่ง', 2020, 20000, 2, 400, '3เดือน', 'อยู่ในระบบ', '', ''),
(29, 50, '0000-00-00', 'ทองคำแท่ง', 2020, 20000, 2, 400, '3เดือน', 'อยู่ในระบบ', '', ''),
(30, 50, '0000-00-00', 'ทองคำแท่ง', 2020, 20000, 2, 400, '3เดือน', 'อยู่ในระบบ', '', ''),
(31, 50, '0000-00-00', 'ทองคำแท่ง', 2020, 20000, 2, 400, '3เดือน', 'อยู่ในระบบ', '', ''),
(32, 50, '0000-00-00', 'ทองคำแท่ง', 2020, 20000, 2, 400, '3เดือน', 'อยู่ในระบบ', '', ''),
(33, 50, '0000-00-00', 'ทองคำแท่ง', 2020, 20000, 2, 400, '3เดือน', 'อยู่ในระบบ', '', ''),
(34, 50, '0000-00-00', 'ทองคำแท่ง', 2020, 20000, 2, 400, '3เดือน', 'อยู่ในระบบ', '', ''),
(35, 50, '0000-00-00', 'ทองคำแท่ง', 2020, 20000, 2, 400, '3เดือน', 'อยู่ในระบบ', '', ''),
(36, 50, '0000-00-00', 'ทองคำแท่ง', 2020, 20000, 2, 400, '3เดือน', 'อยู่ในระบบ', '', ''),
(37, 50, '0000-00-00', 'ทองคำแท่ง', 2020, 20000, 2, 400, '3เดือน', 'อยู่ในระบบ', '', ''),
(38, 50, '0000-00-00', 'ทองคำแท่ง', 2020, 20000, 2, 400, '3เดือน', 'อยู่ในระบบ', '', ''),
(39, 50, '0000-00-00', 'ทองคำแท่ง', 2020, 20000, 2, 400, '3เดือน', 'อยู่ในระบบ', '', ''),
(40, 50, '0000-00-00', 'ทองคำแท่ง', 2020, 20000, 2, 400, '3เดือน', 'อยู่ในระบบ', '', ''),
(41, 50, '0000-00-00', 'ทองคำแท่ง', 2020, 20000, 2, 400, '3เดือน', 'อยู่ในระบบ', '', ''),
(42, 50, '0000-00-00', 'ทองคำแท่ง', 2020, 20000, 2, 400, '3เดือน', 'อยู่ในระบบ', '', ''),
(43, 50, '0000-00-00', 'ทองคำแท่ง', 2020, 20000, 2, 400, '3เดือน', 'อยู่ในระบบ', '', ''),
(44, 50, '0000-00-00', 'ทองคำแท่ง', 2020, 20000, 2, 400, '3เดือน', 'อยู่ในระบบ', '', ''),
(45, 50, '0000-00-00', 'ทองคำแท่ง', 2020, 20000, 2, 400, '3เดือน', 'อยู่ในระบบ', '', ''),
(46, 50, '0000-00-00', 'ทองคำแท่ง', 2020, 20000, 2, 400, '3เดือน', 'อยู่ในระบบ', '', ''),
(47, 50, '0000-00-00', 'ทองคำแท่ง', 2020, 20000, 2, 400, '3เดือน', 'อยู่ในระบบ', '', ''),
(48, 50, '0000-00-00', 'ทองคำแท่ง', 2020, 20000, 2, 400, '3เดือน', 'อยู่ในระบบ', '', ''),
(49, 50, '0000-00-00', 'ทองคำแท่ง', 2020, 20000, 2, 400, '3เดือน', 'อยู่ในระบบ', '', ''),
(50, 50, '0000-00-00', 'ทองคำแท่ง', 2020, 20000, 2, 400, '3เดือน', 'อยู่ในระบบ', '', ''),
(51, 50, '0000-00-00', 'ทองคำแท่ง', 2020, 20000, 2, 400, '3เดือน', 'อยู่ในระบบ', '', ''),
(52, 50, '0000-00-00', 'ทองคำแท่ง', 2020, 20000, 2, 400, '3เดือน', 'อยู่ในระบบ', '', ''),
(53, 50, '0000-00-00', 'ทองคำแท่ง', 2020, 20000, 2, 400, '3เดือน', 'อยู่ในระบบ', '', ''),
(54, 50, '0000-00-00', 'ทองคำแท่ง', 2020, 20000, 2, 400, '3เดือน', 'อยู่ในระบบ', '', ''),
(55, 50, '0000-00-00', 'ทองคำแท่ง', 2020, 20000, 2, 400, '3เดือน', 'อยู่ในระบบ', '', ''),
(56, 50, '0000-00-00', 'ทองคำแท่ง', 2020, 20000, 2, 400, '3เดือน', 'อยู่ในระบบ', '', ''),
(57, 50, '0000-00-00', 'ทองคำแท่ง', 2020, 20000, 2, 400, '3เดือน', 'อยู่ในระบบ', '', ''),
(58, 43, '0000-00-00', 'ทองคำแท่ง', 2020, 10000, 2, 200, '3เดือน', 'อยู่ในระบบ', '', ''),
(59, 46, '0000-00-00', 'ทองคำรูปพรรณ', 2020, 15000, 3, 450, '3เดือน', 'อยู่ในระบบ', '', ''),
(60, 46, '0000-00-00', 'ทองคำรูปพรรณ', 2020, 10000, 1, 100, '1เดือน', 'อยู่ในระบบ', '', ''),
(61, 51, '0000-00-00', 'ทองคำแท่ง', 2020, 15000, 3, 450, '3เดือน', 'อยู่ในระบบ', '202002281832235180.png', 'gold'),
(62, 51, '0000-00-00', 'ทองคำแท่ง', 2020, 15000, 3, 450, '3เดือน', 'อยู่ในระบบ', '202002281330255113.png', 'gold'),
(63, 52, '0000-00-00', 'ทองคำรูปพรรณ', 2020, 10000, 3, 300, '3เดือน', 'นำไปหลอม', '20200228393275214.png', 'gold'),
(64, 53, '0000-00-00', 'ทองคำรูปพรรณ', 2020, 20000, 1, 200, '1เดือน', 'อยู่ในระบบ', '202002281461861008.png', 'สร้อยข้อมือ'),
(65, 53, '0000-00-00', 'ทองคำรูปพรรณ', 2020, 20000, 1, 200, '1เดือน', 'อยู่ในระบบ', '202002281642538214.png', 'สร้อยข้อมือ'),
(66, 54, '2020-02-28', 'ทองคำรูปพรรณ', 3, 10000, 2, 200, '1เดือน', 'อยู่ในระบบ', '20200228495979677.jpg', 'แหวน');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `members`
--

CREATE TABLE `members` (
  `MbID` int(11) NOT NULL,
  `MBusername` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `MBpassword` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `MBfname` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `MBlname` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `MBbday` date NOT NULL,
  `MBaddress` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `MB_IDcard` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `MBstatus` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MBpicture` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `members`
--

INSERT INTO `members` (`MbID`, `MBusername`, `MBpassword`, `MBfname`, `MBlname`, `MBbday`, `MBaddress`, `phone`, `email`, `MB_IDcard`, `MBstatus`, `MBpicture`) VALUES
(8, 'sujinan', '12345        ', 'สุจินันท์        ', 'จุฬาวิทยานุกูล        ', '1998-04-18', 'หาดใหญ่        ', 807376088, 'sakulalnwza@gmail.com', '1929800108602', 'เจ้าของร้าน', '202002281134027357.jpg'),
(9, 'lechee', '123456   ', 'ณัฐธิดา                       ', 'สัมปทาภักดี                       ', '1998-02-08', 'ปัตตานี                       ', 836580653, '5910513056@gmail.com', '1929800108603', 'เจ้าของร้าน', '20200228309310801.jpg'),
(10, 'penguin', '1234567', 'penguin', 'penguin', '1997-10-08', 'หาดใหญ่', 812345678, '5910513003@gmail.com', '2147483647', 'พนักงาน', '202002201498933767.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CusID`);

--
-- Indexes for table `gold`
--
ALTER TABLE `gold`
  ADD PRIMARY KEY (`GoldID`);

--
-- Indexes for table `golds`
--
ALTER TABLE `golds`
  ADD PRIMARY KEY (`GoldID`,`CusID`),
  ADD KEY `golds_ibfk_1` (`CusID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`MbID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CusID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `gold`
--
ALTER TABLE `gold`
  MODIFY `GoldID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `golds`
--
ALTER TABLE `golds`
  MODIFY `GoldID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `MbID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `golds`
--
ALTER TABLE `golds`
  ADD CONSTRAINT `golds_ibfk_1` FOREIGN KEY (`CusID`) REFERENCES `customer` (`CusID`);
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
