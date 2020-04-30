-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2020 at 09:27 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

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
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CusID` int(10) NOT NULL,
  `CusFname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CusLname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CusAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Tel` int(12) NOT NULL,
  `CusImg` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CusID`, `CusFname`, `CusLname`, `CusAddress`, `Tel`, `CusImg`) VALUES
(1, 'บงการ', 'จงมี', 'พฤกษา', 899777582, '202004301358114046.png'),
(2, 'สุจินันท์', 'จุฬาวิทยานุกูล', 'หาดใหญ่', 807376088, '20200430723495644.jpg'),
(3, 'mark', 'tuan', 'หาดใหญ่', 899777582, '20200430314828960.jpg'),
(4, 'li', 'bam', 'หาดใหญ่', 899777582, '20200430707898144.png'),
(5, 'บง', 'จง', 'พฤกษา', 807376088, '202004301631995160.jpg'),
(6, 'mark', 'bam', 'หาดใหญ่', 899777582, '20200430824832894.png'),
(7, 'bam', 'bam', 'พฤกษา', 899777582, '202004301855508901.png');

-- --------------------------------------------------------

--
-- Table structure for table `golds`
--

CREATE TABLE `golds` (
  `GoldID` int(10) NOT NULL,
  `CusID` int(10) NOT NULL,
  `Goldpawnday` date NOT NULL,
  `Goldpayday` date NOT NULL,
  `TypeGold` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `WeightGold` int(10) NOT NULL,
  `Price` int(10) NOT NULL,
  `Rate` int(10) NOT NULL,
  `Pay` int(10) NOT NULL,
  `DuePayment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `GoldStatus` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `GoldImg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Golddetail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Goldbalance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `golds`
--

INSERT INTO `golds` (`GoldID`, `CusID`, `Goldpawnday`, `Goldpayday`, `TypeGold`, `WeightGold`, `Price`, `Rate`, `Pay`, `DuePayment`, `GoldStatus`, `GoldImg`, `Golddetail`, `Goldbalance`) VALUES
(1, 1, '2020-03-16', '2020-04-11', 'ทองคำแท่ง', 10, 30000, 1, 280, '1เดือน', 'อยู่ในระบบ', '202004301428825747.png', 'ยึด', 28000),
(2, 2, '2020-04-30', '0000-00-00', 'ทองคำรูปพรรณ', 2, 15000, 3, 450, '1เดือน', 'อยู่ในระบบ', '20200430723495644.png', 'แหวน', 15000),
(3, 3, '0000-00-00', '0000-00-00', 'ทองคำแท่ง', 3, 10000, 2, 200, '1เดือน', 'อยู่ในระบบ', '20200430927882603.png', '2', 10000),
(4, 1, '2020-04-30', '0000-00-00', 'ทองคำรูปพรรณ', 2, 20000, 10, 2000, '1เดือน', 'อยู่ในระบบ', '202004301954451308.png', '2', 20000),
(5, 1, '2020-04-30', '2020-04-23', 'ทองคำรูปพรรณ', 2, 20000, 10, 2000, '1เดือน', 'อยู่ในระบบ', '202004301281599329.png', '2', 20000),
(6, 1, '2020-04-30', '2020-04-30', 'ทองคำรูปพรรณ', 2, 20000, 10, 2000, '1เดือน', 'ไถ่ถอน', '202004301440839213.png', '2', 20000),
(7, 4, '2020-04-30', '0000-00-00', 'ทองคำแท่ง', 4, 10000, 2, 200, '1เดือน', 'อยู่ในระบบ', '20200430707898144.png', '2', 10000),
(8, 5, '2020-04-30', '0000-00-00', 'ทองคำแท่ง', 2, 15000, 10, 1500, '1เดือน', 'อยู่ในระบบ', '202004301631995160.png', '2', 15000),
(9, 5, '2020-04-30', '0000-00-00', 'ทองคำแท่ง', 2, 15000, 10, 1500, '1เดือน', 'อยู่ในระบบ', '20200430695038151.png', '2', 15000),
(10, 6, '2020-04-30', '0000-00-00', 'ทองคำแท่ง', 4, 30000, 3, 900, '1เดือน', 'อยู่ในระบบ', '20200430824832894.png', '3', 30000),
(11, 6, '2020-04-30', '2020-04-30', 'ทองคำแท่ง', 4, 30000, 3, 870, '1เดือน', 'อยู่ในระบบ', '202004301264658610.png', '3', 29000),
(12, 7, '2020-04-30', '0000-00-00', 'ทองคำรูปพรรณ', 10, 10000, 3, 300, '1เดือน', 'อยู่ในระบบ', '202004301855508901.png', 'แหวน', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `MbID` int(10) NOT NULL,
  `MBusername` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MBpassword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MBfname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MBlname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MBbday` date NOT NULL,
  `MBaddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MB_IDcard` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MBstatus` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MBpicture` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`MbID`, `MBusername`, `MBpassword`, `MBfname`, `MBlname`, `MBbday`, `MBaddress`, `phone`, `email`, `MB_IDcard`, `MBstatus`, `MBpicture`) VALUES
(1, 'sujinan', '12345', 'สุจินันท์', 'จุฬาวิทยานุกูล', '1998-04-18', 'หาดใหญ่', 807376088, 'sakulalnwza@hotmail.com', '1929800108602', 'พนักงาน', '20200316797756378.jpg'),
(2, 'lechee', '12345', 'ณัฐธิดา', 'สัมปทาภักดี', '2020-03-16', 'ปัตตานี', 836580653, '5910513056@gmail.com', '2256148948915', 'เจ้าของร้าน', '202003161440504267.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `paybalance`
--

CREATE TABLE `paybalance` (
  `BalanceID` int(10) NOT NULL,
  `CusID` int(5) NOT NULL,
  `GoldID` int(5) NOT NULL,
  `Balancedate` date NOT NULL,
  `Paybalance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paybalance`
--

INSERT INTO `paybalance` (`BalanceID`, `CusID`, `GoldID`, `Balancedate`, `Paybalance`) VALUES
(1, 1, 1, '2020-04-10', 1000),
(2, 6, 11, '2020-04-30', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `PaymentID` int(10) NOT NULL,
  `CusID` int(10) NOT NULL,
  `GoldID` int(10) NOT NULL,
  `PayDay` date NOT NULL,
  `Payrate` int(10) NOT NULL,
  `NumPeriod` int(10) NOT NULL,
  `TypeGold` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`PaymentID`, `CusID`, `GoldID`, `PayDay`, `Payrate`, `NumPeriod`, `TypeGold`, `Total`) VALUES
(1, 1, 1, '2020-03-17', 300, 1, '', 300),
(2, 1, 5, '2020-04-23', 2000, 1, 'ทองคำรูปพรรณ', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `redeem`
--

CREATE TABLE `redeem` (
  `RedeemID` int(5) NOT NULL,
  `CusID` int(5) NOT NULL,
  `GoldID` int(5) NOT NULL,
  `PaydayRD` date NOT NULL,
  `Price` int(10) NOT NULL,
  `Payrate` int(10) NOT NULL,
  `TypeGold` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SumRD` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `redeem`
--

INSERT INTO `redeem` (`RedeemID`, `CusID`, `GoldID`, `PaydayRD`, `Price`, `Payrate`, `TypeGold`, `SumRD`) VALUES
(1, 1, 6, '2020-04-30', 20000, 2000, 'ทองคำรูปพรรณ', 22000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CusID`);

--
-- Indexes for table `golds`
--
ALTER TABLE `golds`
  ADD PRIMARY KEY (`GoldID`,`CusID`) USING BTREE,
  ADD KEY `CusID` (`CusID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`MbID`);

--
-- Indexes for table `paybalance`
--
ALTER TABLE `paybalance`
  ADD PRIMARY KEY (`BalanceID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`PaymentID`);

--
-- Indexes for table `redeem`
--
ALTER TABLE `redeem`
  ADD PRIMARY KEY (`RedeemID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CusID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `golds`
--
ALTER TABLE `golds`
  MODIFY `GoldID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `MbID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paybalance`
--
ALTER TABLE `paybalance`
  MODIFY `BalanceID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `PaymentID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `redeem`
--
ALTER TABLE `redeem`
  MODIFY `RedeemID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `golds`
--
ALTER TABLE `golds`
  ADD CONSTRAINT `golds_ibfk_2` FOREIGN KEY (`CusID`) REFERENCES `customer` (`CusID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
