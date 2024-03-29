-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2022 at 03:56 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
(1, 'cus1', 'cus1', 'กันตัง', 807376088, '20220124453793460.png'),
(2, 'cus2', 'cus2', 'กันตัง', 980147990, '20220124275078610.png'),
(3, 'cus3', 'cus3', 'ปัตตานี', 899777582, '202201241155652712.png');

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
(1, 1, '2019-01-10', '2019-05-10', 'ทองคำรูปพรรณ', 15, 25000, 2, 500, '3เดือน', 'อยู่ในระบบ', '20220124453793460.jpg', 'สร้อยคอทองคำห่วงคู่ น้ำหนัก 1 บาท', 25000),
(2, 2, '2019-01-10', '0000-00-00', 'ทองคำรูปพรรณ', 30, 50000, 2, 1000, '3เดือน', 'อยู่ในระบบ', '20220124275078610.jpg', 'สร้อยคอทองคำบิสมาร์คสามเหลี่ยม น้ำหนัก 2 บาท', 50000),
(3, 3, '2019-01-14', '0000-00-00', 'ทองคำแท่ง', 1000, 100000, 6, 6000, '1เดือน', 'อยู่ในระบบ', '202201241155652712.jpg', 'ทองคำแท่ง น้ำหนัก 1 กิโลกรัม', 100000);

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
(1, 'admin', 'admin', 'admin', 'admin', '1998-04-18', 'admin', 807376088, 'admin@gmail.com', '1929900654307', 'เจ้าของร้าน', '20220124714239455.jpg'),
(2, 'sujinan', '12345', 'sujinan', 'julavittayanukul', '1998-04-18', 'กันตัง', 807376088, 'sakulalnwza@gmail.com', '1929800108602', 'เจ้าของร้าน', '202201241679819959.png'),
(3, 'lechee', '12345', 'lechee', 'lechee', '2019-02-19', 'ปัตตานี', 807376088, 'lechee@gmail.com', '1929800108603', 'พนักงาน', '202201241452921450.png');

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
(1, 1, 1, '2019-02-10', 500, 1, 'ทองคำรูปพรรณ', 500),
(2, 1, 1, '2019-03-10', 500, 1, 'ทองคำรูปพรรณ', 500),
(3, 1, 1, '2019-05-10', 500, 2, 'ทองคำรูปพรรณ', 1000);

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
  MODIFY `CusID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `golds`
--
ALTER TABLE `golds`
  MODIFY `GoldID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `MbID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `paybalance`
--
ALTER TABLE `paybalance`
  MODIFY `BalanceID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `PaymentID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `redeem`
--
ALTER TABLE `redeem`
  MODIFY `RedeemID` int(5) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `golds`
--
ALTER TABLE `golds`
  ADD CONSTRAINT `golds_ibfk_2` FOREIGN KEY (`CusID`) REFERENCES `customer` (`CusID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
