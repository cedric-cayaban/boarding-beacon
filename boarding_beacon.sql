-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 12:21 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boarding_beacon`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `addressID` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`addressID`, `barangay`) VALUES
('A1', 'Anonas'),
('A10', 'Catablan'),
('A11', 'Cayambanan'),
('A12', 'Consolacion'),
('A13', 'Dilan-Paurido'),
('A14', 'Labit Proper'),
('A15', 'Labit West'),
('A16', 'Mabanogbog'),
('A17', 'Macalong'),
('A18', 'Nancalobasaan'),
('A19', 'Nancamaliran East'),
('A2', 'Bactad East'),
('A20', 'Nancamaliran West'),
('A21', 'Nancayasan'),
('A22', 'Oltama'),
('A23', 'Palina East'),
('A24', 'Palina West'),
('A25', 'Pedro T. Orata (Bactad Proper)'),
('A26', 'Pinmaludpod '),
('A27', 'Poblacion'),
('A28', 'San Jose'),
('A29', 'San Vicente'),
('A3', 'Bayaoas'),
('A30', 'Santa Lucia'),
('A31', 'Santo Domingo'),
('A32', 'Sugcong'),
('A33', 'Tiposu'),
('A34', 'Tulong'),
('A4', 'Bolaoen'),
('A5', 'Cabaruan'),
('A6', 'Cabuloan'),
('A7', 'Camanang'),
('A8', 'Camantiles'),
('A9', 'Casantaan');

-- --------------------------------------------------------

--
-- Table structure for table `boarding`
--

CREATE TABLE `boarding` (
  `boardID` int(11) NOT NULL,
  `bName` varchar(255) NOT NULL,
  `addressID` varchar(255) NOT NULL,
  `bDescription` longtext NOT NULL,
  `bPrice` double NOT NULL,
  `bUnitNo` int(11) NOT NULL,
  `bImage` varchar(255) NOT NULL,
  `bImg1` varchar(255) NOT NULL,
  `bImg2` varchar(255) NOT NULL,
  `bImg3` varchar(255) NOT NULL,
  `bImg4` varchar(255) NOT NULL,
  `bImg5` varchar(255) NOT NULL,
  `bImg6` varchar(255) NOT NULL,
  `bStatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `boarding`
--

INSERT INTO `boarding` (`boardID`, `bName`, `addressID`, `bDescription`, `bPrice`, `bUnitNo`, `bImage`, `bImg1`, `bImg2`, `bImg3`, `bImg4`, `bImg5`, `bImg6`, `bStatus`) VALUES
(9, 'Pagadan Ramos Apartelle', 'A29', 'A bustling boarding house with tenants that doesnt sleep, it has great hospitality and has spacious rooms', 6500, 6, 'Pagaduan.png', 'i1.png', 'i2.png', 'i3.png', 'i4.png', 'i5.png', 'i6.jpg', 'vacant'),
(11, 'Michelle Apartelle', 'A15', '\"Welcome to Michelle Apartelle, where modern comfort meets convenience. Nestled in a vibrant community, our boarding house offers spacious rooms and a warm atmosphere, providing residents with a delightful and welcoming living experience', 4000, 1, 'Michelle.png', 'i7.jpg', 'i18.jpg', 'i9.jpg', 'i10.jpg', 'i11.jpg', 'i12.jpg', 'vacant'),
(12, 'LTZ Boarding', 'A21', 'Step into the welcoming embrace of LTZ Boarding, where every corner exudes comfort and tranquility. Our thoughtfully designed rooms provide the perfect sanctuary for relaxation, and the vibrant community ', 7000, 7, 'ltz.png', 'i13.jpg', 'i14.jpeg', 'i15.jpg', 'i16.jpg', 'i17.jpg', 'i18.jpg', 'vacant'),
(13, 'Taaca Village', 'A4', 'Embrace a new day at Taaca Village, where the morning sun illuminates our well-connected boarding house community. With spacious accommodations and a variety of amenities, ', 4444, 6, 'Taaca Village.png', 'i19.jpg', 'i20.jpg', 'i21.jpg', 'i17.jpg', 'i23.jpg', 'i24.jpg', 'vacant'),
(14, 'DMI Urdaneta', 'A33', 'Find solace in the charm of DMI Urdaneta, a boarding house that offers more than just a place to stay. Our spacious accommodations provide a retreat from the bustling world', 5638, 3, 'DMI.png', 'i4.png', 'i13.jpg', 'i12.jpg', 'i21.jpg', 'i7.jpg', 'i11.jpg', 'vacant'),
(15, 'Fidar VIlla', 'A34', 'Immerse yourself in the modern elegance of Urban Oasis Boarding House, where each room is a stylish sanctuary. With contemporary amenities and a central location', 8300, 1, 'fidar.png', 'i8.jpg', 'i1.png', 'i10.jpg', 'i19.jpg', 'i6.jpg', 'i24.jpg', 'vacant'),
(16, 'Fidar VIlla', 'A34', 'Immerse yourself in the modern elegance of Urban Oasis Boarding House, where each room is a stylish sanctuary. With contemporary amenities and a central location', 8300, 1, 'fidar.png', 'i8.jpg', 'i1.png', 'i10.jpg', 'i19.jpg', 'i6.jpg', 'i24.jpg', 'vacant'),
(17, 'Fidar VIlla', 'A34', 'Immerse yourself in the modern elegance of Urban Oasis Boarding House, where each room is a stylish sanctuary. With contemporary amenities and a central location', 8300, 1, 'fidar.png', 'i8.jpg', 'i1.png', 'i10.jpg', 'i19.jpg', 'i6.jpg', 'i24.jpg', 'vacant');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `ownerID` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `midname` varchar(255) NOT NULL,
  `contactNo` int(13) NOT NULL,
  `permit` varchar(255) NOT NULL,
  `accstatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`ownerID`, `fname`, `lname`, `password`, `username`, `midname`, `contactNo`, `permit`, `accstatus`) VALUES
(16, 'tope', 'carpio', '12345Qwer', 'topetope', 'callo', 12345, 'fsasdfasdf', 'approved'),
(17, 'Carpio', 'Christopherson', '12345Qwer', 'topetope', 'C', 2147483647, 'bh.png', ''),
(20, 'cayaban', 'cedric', 'Cedced69', 'cedced', 'f', 2147483647, 'b2.png', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE `tenant` (
  `tenantID` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `midname` varchar(255) NOT NULL,
  `contactNo` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`tenantID`, `fname`, `lname`, `username`, `password`, `midname`, `contactNo`) VALUES
(44, 'fsf', 'fsf', 'fdsaffds', 'fsafsd434S', 'c', 32323),
(45, '', '', '', 'fsafsd434S', '', 0),
(46, '', '', '', 'FSDAFDS', '', 0),
(47, 'Cayaban', 'Cedric', 'ceddybear', 'Cedced123', 'C', 123456),
(48, 'carpio', 'tope', 'topetope', '12345Qwer', 'c', 1234),
(49, 'biag', 'mak', 'makmak', 'Makmak69', 'b', 82194673),
(50, 'Carpio', 'Christopherson', 'topetope', '12345Qwer', 'C', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`addressID`);

--
-- Indexes for table `boarding`
--
ALTER TABLE `boarding`
  ADD PRIMARY KEY (`boardID`),
  ADD KEY `fk1` (`addressID`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`ownerID`);

--
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`tenantID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boarding`
--
ALTER TABLE `boarding`
  MODIFY `boardID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `ownerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `tenantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `boarding`
--
ALTER TABLE `boarding`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`addressID`) REFERENCES `address` (`addressID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
