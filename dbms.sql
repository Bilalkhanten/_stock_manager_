-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2016 at 10:23 PM
-- Server version: 5.7.11-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbms`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `adminAdd`(IN `vid` VARCHAR(10), IN `vname` VARCHAR(20), IN `vph` VARCHAR(11), IN `vadd` VARCHAR(30), IN `bid` VARCHAR(10), IN `bdate` DATE)
BEGIN
 Insert into vendor (VENDOR_ID, VENDOR_NAME, VENDOR_PHONE, VENDOR_ADDRESS) values (vid,vname,vph,vadd) on duplicate key update VENDOR_NAME=vname, VENDOR_PHONE = vph, VENDOR_ADDRESS = vadd;
 insert into bill values (bid,vid,bdate);
 insert into billed values (bid,vid);
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `adminAddItem`(IN `bid` VARCHAR(10), IN `iid` VARCHAR(10), IN `cat` VARCHAR(15), IN `con` INT(1), IN `qty` INT(5), IN `rate` FLOAT(8,2), IN `tax` FLOAT(5,2), IN `amt` FLOAT(8,2), IN `iname` VARCHAR(25))
BEGIN
 insert into item values (iid,cat,con);
 insert into purchase_credentials values(bid,iid,qty,rate,tax,amt);
 insert into stock (ITEM_NAME,TOTAL_QUANTITY) values (iname, qty) on duplicate key update TOTAL_QUANTITY = TOTAL_QUANTITY + qty;
 insert into availability values (iname, iid);
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `adminAddSerial`(IN `sid` VARCHAR(10), IN `iid` VARCHAR(10), IN `sdate` DATE, IN `bid` VARCHAR(10))
BEGIN
 insert into item_serial values(sid,iid,DATE_ADD(sdate, INTERVAL 3 month));
 Insert into bill_serial values (bid,sid);
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `borrow`(IN bid varchar(10),bname varchar(20),bdept varchar(20),bph varchar(11),badd varchar(30))
BEGIN
 insert into borrower values(bid,bname,bdept,bph,badd);
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `borrowSerial`(IN bid varchar(10),sid varchar(10),idate date,rdate date)
BEGIN
 insert into borrowed values(bid,sid,idate,rdate);
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `stock`(IN iname varchar(20),iqty int(5),iid varchar(10))
BEGIN
 insert into stock values(iname,iqty);
 Insert into availability values(iname,iid);
 END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

CREATE TABLE IF NOT EXISTS `availability` (
  `ITEM_NAME` varchar(25) NOT NULL,
  `ITEM_ID` varchar(10) NOT NULL,
  UNIQUE KEY `ITEM_ID_2` (`ITEM_ID`),
  KEY `ITEM_NAME` (`ITEM_NAME`),
  KEY `ITEM_ID` (`ITEM_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`ITEM_NAME`, `ITEM_ID`) VALUES
('Compaq CPU', 'ITEM006'),
('Dell Wireless Mouse', 'ITEM005'),
('HP LCD Monitor', 'ITEM001'),
('iBall Speakers', 'ITEM002'),
('MN Cords', 'ITEM004'),
('RJ-45 Connector', 'ITEM007'),
('Super Batteries AA', 'ITEM003');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE IF NOT EXISTS `bill` (
  `BILL_ID` varchar(10) NOT NULL,
  `VENDOR_ID` varchar(10) DEFAULT NULL,
  `BILL_DATE` date NOT NULL,
  PRIMARY KEY (`BILL_ID`),
  KEY `VENDOR_ID` (`VENDOR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`BILL_ID`, `VENDOR_ID`, `BILL_DATE`) VALUES
('BILL001', 'VENDOR001', '2013-01-01'),
('BILL002', 'VENDOR002', '2015-03-07'),
('BILL003', 'VENDOR003', '2013-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `billed`
--

CREATE TABLE IF NOT EXISTS `billed` (
  `BILL_ID` varchar(10) DEFAULT NULL,
  `VENDOR_ID` varchar(10) DEFAULT NULL,
  KEY `BILL_ID` (`BILL_ID`),
  KEY `VENDOR_ID` (`VENDOR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billed`
--

INSERT INTO `billed` (`BILL_ID`, `VENDOR_ID`) VALUES
('BILL001', 'VENDOR001'),
('BILL002', 'VENDOR002'),
('BILL003', 'VENDOR003');

-- --------------------------------------------------------

--
-- Table structure for table `bill_serial`
--

CREATE TABLE IF NOT EXISTS `bill_serial` (
  `BILL_ID` varchar(10) NOT NULL,
  `SERIAL_ID` varchar(10) NOT NULL,
  KEY `BILL_ID` (`BILL_ID`),
  KEY `SERIAL_ID` (`SERIAL_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_serial`
--

INSERT INTO `bill_serial` (`BILL_ID`, `SERIAL_ID`) VALUES
('BILL001', 'MNT001'),
('BILL001', 'MNT002'),
('BILL001', 'MNT003'),
('BILL001', 'MNT004'),
('BILL001', 'MNT005'),
('BILL001', 'SP001'),
('BILL001', 'SP002'),
('BILL001', 'SP003'),
('BILL001', 'SP004'),
('BILL001', 'SP005'),
('BILL001', 'BT001'),
('BILL001', 'BT002'),
('BILL001', 'BT003'),
('BILL001', 'BT004'),
('BILL001', 'BT005'),
('BILL001', 'BT006'),
('BILL001', 'BT007'),
('BILL001', 'BT008'),
('BILL001', 'BT009'),
('BILL001', 'BT010'),
('BILL002', 'CR001'),
('BILL002', 'CR002'),
('BILL002', 'CR003'),
('BILL002', 'CR004'),
('BILL002', 'CR005'),
('BILL002', 'MO001'),
('BILL002', 'MO002'),
('BILL002', 'MO003'),
('BILL002', 'MO004'),
('BILL002', 'MO005'),
('BILL003', 'CP001'),
('BILL003', 'CP002'),
('BILL003', 'CP003'),
('BILL003', 'CP004'),
('BILL003', 'CN001'),
('BILL003', 'CN002'),
('BILL003', 'CN003'),
('BILL003', 'CN004'),
('BILL003', 'CN005');

-- --------------------------------------------------------

--
-- Table structure for table `borrowed`
--

CREATE TABLE IF NOT EXISTS `borrowed` (
  `BORROWER_ID` varchar(10) NOT NULL,
  `SERIAL_ID` varchar(10) NOT NULL,
  `ISSUE_DATE` date NOT NULL,
  `RETURN_DATE` date DEFAULT NULL,
  KEY `BORROWER_ID` (`BORROWER_ID`),
  KEY `SERIAL_ID` (`SERIAL_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrowed`
--

INSERT INTO `borrowed` (`BORROWER_ID`, `SERIAL_ID`, `ISSUE_DATE`, `RETURN_DATE`) VALUES
('BR001', 'BT001', '2016-04-23', NULL),
('BR001', 'BT002', '2016-04-23', '2016-04-24'),
('BR001', 'BT004', '2016-04-23', '2016-04-24'),
('BR002', 'CR001', '2016-04-23', NULL),
('BR002', 'CR002', '2016-04-23', NULL),
('BR002', 'CR003', '2016-04-23', NULL),
('BR002', 'CR005', '2016-04-23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `borrower`
--

CREATE TABLE IF NOT EXISTS `borrower` (
  `BORROWER_ID` varchar(10) NOT NULL,
  `BORROWER_NAME` varchar(20) NOT NULL,
  `BORROWER_DEPT` varchar(20) DEFAULT NULL,
  `BORROWER_PHONE` varchar(11) DEFAULT NULL,
  `BORROWER_ADDRESS` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`BORROWER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrower`
--

INSERT INTO `borrower` (`BORROWER_ID`, `BORROWER_NAME`, `BORROWER_DEPT`, `BORROWER_PHONE`, `BORROWER_ADDRESS`) VALUES
('BR001', 'Mukesh Seth', 'CSE', '933311001', 'CP Colony, Ompuri, Surat'),
('BR002', 'Anita Jain', 'ECE', '933311002', 'CX Colony, Ompuri, Surat'),
('BR003', 'Reshma Singh Thakur', 'CSE', '933311004', 'CY Colony, Ompuri, Surat'),
('BR004', 'Jacob Mathews', 'ME', '933311005', 'CZ Colony, Ompuri, Surat'),
('BR005', 'Ritika Shrivasatava', 'ECE', '933311006', 'NR2, Jabalpur');

-- --------------------------------------------------------

--
-- Table structure for table `borrows`
--

CREATE TABLE IF NOT EXISTS `borrows` (
  `ITEM_NAME` varchar(25) NOT NULL,
  `BORROWER_ID` varchar(10) NOT NULL,
  `CURRENT_QUANTITY` int(10) DEFAULT NULL,
  UNIQUE KEY `unique_index` (`ITEM_NAME`,`BORROWER_ID`),
  KEY `ITEM_NAME` (`ITEM_NAME`),
  KEY `BORROWER_ID` (`BORROWER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrows`
--

INSERT INTO `borrows` (`ITEM_NAME`, `BORROWER_ID`, `CURRENT_QUANTITY`) VALUES
('MN Cords', 'BR002', 4),
('Super Batteries AA', 'BR001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `ITEM_ID` varchar(10) NOT NULL,
  `CATEGORY` varchar(15) NOT NULL,
  `CONSUMABILITY` int(1) NOT NULL,
  PRIMARY KEY (`ITEM_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`ITEM_ID`, `CATEGORY`, `CONSUMABILITY`) VALUES
('ITEM001', 'Monitors', 0),
('ITEM002', 'Speakers', 0),
('ITEM003', 'Batteries', 1),
('ITEM004', 'Cords', 1),
('ITEM005', 'Peripherals', 0),
('ITEM006', 'CPUs', 0),
('ITEM007', 'Connectors', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_serial`
--

CREATE TABLE IF NOT EXISTS `item_serial` (
  `SERIAL_ID` varchar(10) NOT NULL,
  `ITEM_ID` varchar(10) NOT NULL,
  `SERVICE_DATE` date NOT NULL,
  PRIMARY KEY (`SERIAL_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_serial`
--

INSERT INTO `item_serial` (`SERIAL_ID`, `ITEM_ID`, `SERVICE_DATE`) VALUES
('BT001', 'ITEM003', '2013-04-01'),
('BT002', 'ITEM003', '2013-04-01'),
('BT003', 'ITEM003', '2013-04-01'),
('BT004', 'ITEM003', '2013-04-01'),
('BT005', 'ITEM003', '2013-04-01'),
('BT006', 'ITEM003', '2013-04-01'),
('BT007', 'ITEM003', '2013-04-01'),
('BT008', 'ITEM003', '2013-04-01'),
('BT009', 'ITEM003', '2013-04-01'),
('BT010', 'ITEM003', '2013-04-01'),
('CN001', 'ITEM007', '2013-05-02'),
('CN002', 'ITEM007', '2013-05-02'),
('CN003', 'ITEM007', '2013-05-02'),
('CN004', 'ITEM007', '2013-05-02'),
('CN005', 'ITEM007', '2013-05-02'),
('CP001', 'ITEM006', '2013-05-02'),
('CP002', 'ITEM006', '2013-05-02'),
('CP003', 'ITEM006', '2013-05-02'),
('CP004', 'ITEM006', '2013-05-02'),
('CR001', 'ITEM004', '2015-06-07'),
('CR002', 'ITEM004', '2015-06-07'),
('CR003', 'ITEM004', '2015-06-07'),
('CR004', 'ITEM004', '2015-06-07'),
('CR005', 'ITEM004', '2015-06-07'),
('MNT001', 'ITEM001', '2013-04-01'),
('MNT002', 'ITEM001', '2013-04-01'),
('MNT003', 'ITEM001', '2013-04-01'),
('MNT004', 'ITEM001', '2013-04-01'),
('MNT005', 'ITEM001', '2013-04-01'),
('MO001', 'ITEM005', '2015-06-07'),
('MO002', 'ITEM005', '2015-06-07'),
('MO003', 'ITEM005', '2015-06-07'),
('MO004', 'ITEM005', '2015-06-07'),
('MO005', 'ITEM005', '2015-06-07'),
('SP001', 'ITEM002', '2013-04-01'),
('SP002', 'ITEM002', '2013-04-01'),
('SP003', 'ITEM002', '2013-04-01'),
('SP004', 'ITEM002', '2013-04-01'),
('SP005', 'ITEM002', '2013-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE IF NOT EXISTS `logins` (
  `BORROWER_ID` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(20) DEFAULT NULL,
  KEY `BORROWER_ID` (`BORROWER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`BORROWER_ID`, `PASSWORD`) VALUES
('BR001', 'abcde'),
('BR002', 'xxx'),
('BR003', '9876'),
('BR004', 'abcde'),
('BR005', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_credentials`
--

CREATE TABLE IF NOT EXISTS `purchase_credentials` (
  `BILL_ID` varchar(10) NOT NULL,
  `ITEM_ID` varchar(10) NOT NULL,
  `QUANTITY` int(5) NOT NULL,
  `RATE` float(8,2) NOT NULL,
  `TAX` float(5,2) NOT NULL,
  `AMOUNT` double(8,2) NOT NULL,
  KEY `BILL_ID` (`BILL_ID`),
  KEY `ITEM_ID` (`ITEM_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_credentials`
--

INSERT INTO `purchase_credentials` (`BILL_ID`, `ITEM_ID`, `QUANTITY`, `RATE`, `TAX`, `AMOUNT`) VALUES
('BILL001', 'ITEM001', 5, 5000.00, 12.00, 5600.00),
('BILL001', 'ITEM002', 5, 2000.00, 10.00, 2200.00),
('BILL001', 'ITEM003', 10, 10.00, 0.00, 10.00),
('BILL002', 'ITEM004', 5, 100.00, 10.00, 110.00),
('BILL002', 'ITEM005', 5, 500.00, 10.00, 550.00),
('BILL003', 'ITEM006', 4, 16000.00, 12.00, 17920.00),
('BILL003', 'ITEM007', 5, 50.00, 0.00, 50.00);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `REQUEST_ID` int(10) NOT NULL AUTO_INCREMENT,
  `BORROWER_ID` varchar(10) DEFAULT NULL,
  `ITEM_NAME` varchar(20) DEFAULT NULL,
  `QUANTITY` int(5) DEFAULT NULL,
  `REQUEST_TYPE` int(1) DEFAULT NULL,
  `REQUEST_STATUS` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`REQUEST_ID`),
  KEY `BORROWER_ID` (`BORROWER_ID`),
  KEY `ITEM_NAME` (`ITEM_NAME`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10019 ;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`REQUEST_ID`, `BORROWER_ID`, `ITEM_NAME`, `QUANTITY`, `REQUEST_TYPE`, `REQUEST_STATUS`) VALUES
(10015, 'BR001', 'Super Batteries AA', 3, 0, 1),
(10016, 'BR001', 'iBall Speakers', 2, 0, 2),
(10017, 'BR002', 'MN Cords', 4, 0, 1),
(10018, 'BR001', 'Super Batteries AA', 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `ITEM_NAME` varchar(20) NOT NULL,
  `TOTAL_QUANTITY` int(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`ITEM_NAME`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`ITEM_NAME`, `TOTAL_QUANTITY`) VALUES
('Compaq CPU', 4),
('Dell Wireless Mouse', 5),
('HP LCD Monitor', 5),
('iBall Speakers', 5),
('MN Cords', 1),
('RJ-45 Connector', 5),
('Super Batteries AA', 9);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE IF NOT EXISTS `vendor` (
  `VENDOR_ID` varchar(10) NOT NULL,
  `VENDOR_NAME` varchar(20) NOT NULL,
  `VENDOR_PHONE` varchar(11) DEFAULT NULL,
  `VENDOR_ADDRESS` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`VENDOR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`VENDOR_ID`, `VENDOR_NAME`, `VENDOR_PHONE`, `VENDOR_ADDRESS`) VALUES
('VENDOR001', 'Ganesh Electronics', '', '67, Tilwara, Jabalpur'),
('VENDOR002', 'Hegde Electricals', '9009119900', 'Sadar Bazaar Jabalpur'),
('VENDOR003', 'Khetan Computers', '9000111222', 'Lashkar GWL');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `availability`
--
ALTER TABLE `availability`
  ADD CONSTRAINT `availability_ibfk_1` FOREIGN KEY (`ITEM_NAME`) REFERENCES `stock` (`ITEM_NAME`),
  ADD CONSTRAINT `availability_ibfk_2` FOREIGN KEY (`ITEM_ID`) REFERENCES `item` (`ITEM_ID`);

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`VENDOR_ID`) REFERENCES `vendor` (`VENDOR_ID`);

--
-- Constraints for table `billed`
--
ALTER TABLE `billed`
  ADD CONSTRAINT `billed_ibfk_1` FOREIGN KEY (`BILL_ID`) REFERENCES `bill` (`BILL_ID`),
  ADD CONSTRAINT `billed_ibfk_2` FOREIGN KEY (`VENDOR_ID`) REFERENCES `vendor` (`VENDOR_ID`);

--
-- Constraints for table `bill_serial`
--
ALTER TABLE `bill_serial`
  ADD CONSTRAINT `bill_serial_ibfk_1` FOREIGN KEY (`BILL_ID`) REFERENCES `bill` (`BILL_ID`),
  ADD CONSTRAINT `bill_serial_ibfk_2` FOREIGN KEY (`SERIAL_ID`) REFERENCES `item_serial` (`SERIAL_ID`);

--
-- Constraints for table `borrowed`
--
ALTER TABLE `borrowed`
  ADD CONSTRAINT `borrowed_ibfk_1` FOREIGN KEY (`BORROWER_ID`) REFERENCES `borrower` (`BORROWER_ID`),
  ADD CONSTRAINT `borrowed_ibfk_2` FOREIGN KEY (`SERIAL_ID`) REFERENCES `item_serial` (`SERIAL_ID`);

--
-- Constraints for table `borrows`
--
ALTER TABLE `borrows`
  ADD CONSTRAINT `borrows_ibfk_1` FOREIGN KEY (`ITEM_NAME`) REFERENCES `stock` (`ITEM_NAME`),
  ADD CONSTRAINT `borrows_ibfk_2` FOREIGN KEY (`BORROWER_ID`) REFERENCES `borrower` (`BORROWER_ID`);

--
-- Constraints for table `logins`
--
ALTER TABLE `logins`
  ADD CONSTRAINT `logins_ibfk_1` FOREIGN KEY (`BORROWER_ID`) REFERENCES `borrower` (`BORROWER_ID`);

--
-- Constraints for table `purchase_credentials`
--
ALTER TABLE `purchase_credentials`
  ADD CONSTRAINT `purchase_credentials_ibfk_1` FOREIGN KEY (`BILL_ID`) REFERENCES `bill` (`BILL_ID`),
  ADD CONSTRAINT `purchase_credentials_ibfk_2` FOREIGN KEY (`ITEM_ID`) REFERENCES `item` (`ITEM_ID`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`BORROWER_ID`) REFERENCES `borrower` (`BORROWER_ID`),
  ADD CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`ITEM_NAME`) REFERENCES `stock` (`ITEM_NAME`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
