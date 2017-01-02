-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2016 at 05:54 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `heydhobi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`ADMIN_ID` int(9) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `ADMIN_EMAIL` varchar(50) NOT NULL,
  `TYPE` varchar(15) NOT NULL,
  `ARCHIVE` varchar(9) NOT NULL,
  `ADMIN_NAME` varchar(30) NOT NULL,
  `STATUS` varchar(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ADMIN_ID`, `PASSWORD`, `ADMIN_EMAIL`, `TYPE`, `ARCHIVE`, `ADMIN_NAME`, `STATUS`) VALUES
(1, 'admin123', 'admin@gmail.com', 'Admin', 'N', 'Anitha', 'Y'),
(2, '123manish', 'manish@gmail.com', 'SUB-ADMIN', 'N', 'Manish', ''),
(3, '123anitha', 'helvin@gmail.com', 'SUB-ADMIN', 'N', 'Anitha Manharan', ''),
(4, 'kk', 'kjkj@sdkds.com', 'SUB-ADMIN', 'N', 'dkfjj', '');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE IF NOT EXISTS `enquiry` (
`ENQUIRY_ID` int(9) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `MOBILE_NO` varchar(10) NOT NULL,
  `EMAIL_ID` varchar(30) NOT NULL,
  `SUBJECT` varchar(50) NOT NULL,
  `MESSAGE` varchar(150) NOT NULL,
  `ARCHIVE` varchar(1) DEFAULT 'N'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`ENQUIRY_ID`, `NAME`, `MOBILE_NO`, `EMAIL_ID`, `SUBJECT`, `MESSAGE`, `ARCHIVE`) VALUES
(1, 'Anitha Manharan', '2147483647', 'reddyanitha407@gmail.com', 'test', 'test', 'Y'),
(2, 'test', '909878778', 'pavitramanoharan70@gmail.com', 'hello', 'testing', 'N'),
(3, 'heydhobi', '2147483647', 'heydhobi@gmail.com', 'heydhobi', 'heydhobi', 'N'),
(4, 'hjhj', '0', 'hjhjhj@jshdjhds.com', 'hjhjh', 'jhjhjh', 'N'),
(5, 'jhjhjhjh', '0', 'qwe@gmail.com', '', 'jhkjkjkjkjk', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE IF NOT EXISTS `reply` (
`REPLY_ID` int(9) NOT NULL,
  `ENQUIRY_ID` int(9) NOT NULL,
  `ADMIN_ID` varchar(30) NOT NULL,
  `MESSAGE` varchar(200) NOT NULL,
  `EMAIL_ID` varchar(60) NOT NULL,
  `CREATED_TIME` varchar(30) NOT NULL,
  `ARCHIVE` varchar(9) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`REPLY_ID`, `ENQUIRY_ID`, `ADMIN_ID`, `MESSAGE`, `EMAIL_ID`, `CREATED_TIME`, `ARCHIVE`) VALUES
(21, 1, '18061993', 'my name is Admin', 'reddyanitha407@gmail.com', '1460546077', 'N'),
(22, 1, '18061993', ' 18061993jjkjhk', 'reddyanitha407@gmail.com', '1460547096', 'N'),
(23, 1, '18061993', ' 18061993jjkjhk', 'reddyanitha407@gmail.com', '1460547133', 'N'),
(24, 1, '18061993', ' 18061993jhjhl', 'reddyanitha407@gmail.com', '1460547144', 'N'),
(25, 1, '18061993', ' 18061993jhjhl', 'reddyanitha407@gmail.com', '1460547294', 'N'),
(26, 2, '18061993', 'hello', 'pavitramanoharan70@gmail.com', '1460547303', 'N'),
(27, 2, '18061993', 'hello', 'pavitramanoharan70@gmail.com', '1460547322', 'N'),
(28, 2, '1', ' uyfuiuieuieruiui', '', '1462897895', 'N'),
(29, 2, '1', 'jhjhjk', 'pavitramanoharan70@gmail.com', '1462898336', 'N'),
(30, 2, '1', ' sjhdjhsdj', 'pavitramanoharan70@gmail.com', '1462898368', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_picker`
--

CREATE TABLE IF NOT EXISTS `schedule_picker` (
`ORDER_ID` int(9) NOT NULL,
  `USER_ID` varchar(40) NOT NULL,
  `CLOTHES` varchar(150) NOT NULL,
  `DATE` varchar(40) NOT NULL,
  `TIME` varchar(40) NOT NULL,
  `TYPES` varchar(20) NOT NULL,
  `OTHERS` varchar(150) NOT NULL,
  `STATUS` varchar(40) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule_picker`
--

INSERT INTO `schedule_picker` (`ORDER_ID`, `USER_ID`, `CLOTHES`, `DATE`, `TIME`, `TYPES`, `OTHERS`, `STATUS`) VALUES
(1, '734uekjher8yeuihejkk', 'jjkhjhjhj', '', '2015-11-30T23:59', '3', 'oejier', 'ORDER CONFIRMED'),
(2, '734uekjher8yeuihejkk', 'hhjhjh', '', '2016-12-31T12:59', '1', 'jj', 'ORDER CONFIRMED'),
(3, '734uekjher8yeuihejkk', 'jjnj', '', '2015-10-31T23:56', '1', 'sdknjk', 'PROCESSING'),
(4, '18061993', 'testingOn', '', '', '1,2,3', 'nothing as of such', 'COMPLETED'),
(5, '18061993', 'testinsecond', '', '04/07/2016', '1,2,3', 'nothing ', 'COMPLETED'),
(6, '18061993', 'kjkjkjk ', '04/13/2016', '23:59', '1,2,3', 'nothing', 'PROCESSING'),
(7, '734uekjher8yeuihejkk', 'testing', '04/07/2016', '11:58', '1,2,3,4', 'testing', 'COMPLETED'),
(8, '734uekjher8yeuihejkk', 'heyDhobi', '05/12/2016', '09:58', '1,2,3,4', 'dskjkdjfkjkfdjk', 'COMPLETED'),
(9, '734uekjher8yeuihejkk', 'kutty', '05/13/2016', '11:58', '1,2,3,4', 'kutty', 'PENDING'),
(10, '734uekjher8yeuihejkk', '3', '05/27/2016', '12:59', '2,3,4', 'kjksjxkjdkjdkkjkkjk', 'PENDING'),
(11, 'D5865027-DF85-484F-A787-832373E54FC1', 'jkk', '05/12/2016', '12:59', '3', 'kjhj', 'PENDING'),
(12, 'E3C8B653-9860-4827-B4F6-54F1D306D822', '16may2016', '05/25/2016', '22:59', '1,2,3', 'wejkekfj', 'COMPLETED'),
(13, 'E3C8B653-9860-4827-B4F6-54F1D306D822', 'jhjh', '04/07/2016', '12:59', '1,3,4', 'kjkjkj', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE IF NOT EXISTS `subscriber` (
`SUBSCRIBER_ID` int(9) NOT NULL,
  `SUBSCRIBER_EMAIL` varchar(150) NOT NULL,
  `CREATED_ON` date NOT NULL,
  `ARCHIVE` varchar(2) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
`TYPE_ID` int(2) NOT NULL,
  `TYPE` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`TYPE_ID`, `TYPE`) VALUES
(1, 'Wash & Fold'),
(2, 'Iron & FOld'),
(3, 'Wash & Fold'),
(4, 'Dry Clean');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `USER_ID` varchar(40) NOT NULL,
  `FULL_NAME` varchar(50) NOT NULL,
  `MOBILE_NUMBER` varchar(10) NOT NULL,
  `STATE` varchar(50) NOT NULL,
  `CITY` varchar(50) NOT NULL,
  `ZIP` varchar(7) NOT NULL,
  `SUBURB` varchar(50) NOT NULL,
  `ADDRESS` varchar(150) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `VERIFICATION_CODE` varchar(20) NOT NULL,
  `ACTIVE` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `FULL_NAME`, `MOBILE_NUMBER`, `STATE`, `CITY`, `ZIP`, `SUBURB`, `ADDRESS`, `EMAIL`, `PASSWORD`, `VERIFICATION_CODE`, `ACTIVE`) VALUES
('1284F634-AF32-4BA6-8694-AC93B5B23095', 'pavi', '2147483647', 'Maharashtra', 'mumbai', '0', 'mumbai', 'mumbai', 'pavitramanoharan70@gmail.com', 'manoharan', '47257279d0b4f033e373', 'Y'),
('1B27DFB1-8A44-4BBA-912E-0F0E5D05E435', 'gthm', '43555', 'Maharashtra', 'fhgf', '0', 'hgfhfhg', 'hngjk', 'hhj@gh.com', '213', 'ce5140df15d046a66883', 'Y'),
('2B33065E-D192-4E39-8843-8D09D04353D4', 'jjhjjh', '2147483647', '', 'jhj', '0', 'hjhj', 'hjhjh', 'jhjhj@dd.com', '', 'cf34645d98a7630e2bcc', 'Y'),
('30FBD380-8E8D-49A5-A392-C78591BFD07F', 'jhj', '2147483647', 'Maharashtra', 'jkhkj', '400037', 'kjkjkjkj', 'kkjkjkjk', 'jhjhjh2ldk@cd.com', 'jhjhj', 'cb77649f5d53798edfa0', 'Y'),
('4AEF738A-AB24-493A-989F-DACD950FE6A6', 'jhjh', '2147483647', 'Maharashtra', 'jhjh', '', 'jhjhjh', 'jhjhjkhj jkh', 'jhjhjh@sjh.com', 'anitha', 'fc3dee15d074d783730c', 'Y'),
('734uekjher8yeuihejkk', 'Anitha', '2147483647', 'state', 'mumbai', '0', 'mumbai', 'jsjsw wjhfdh dghf ', 'anitha407@gmail.com', '1234anitha', 'jhfhfjhfsjf', 'Y'),
('85579CF2-682B-4C9D-A1E8-AE3A9BD40ACA', 'jj', '8937483748', 'Maharashtra', 'ggghghghg', '400037', 'hgh', 'ghghghg', 'kjkj@dfdfs.com', 'anitha', '2983e3047c0c730d3b7c', 'Y'),
('C7AE4948-2388-4FBF-9CEC-CD772E8F3C6A', 'hjh', '2147483647', '', 'kjjhj', '', 'hjhjhj', 'hhj', 'jhjhjh@sjh.com', '', 'dfbbdd2f1838330476c6', 'Y'),
('C8A74428-DD58-4ADE-A71B-CB049D033DDD', 'heyDhobi', '2147483647', 'Maharashtra', 'MUMBAI', '0', 'heyDhobi', 'R-101, D-4 JAI BHARAT TOWER,', 'pavitramanoharan70@gmail.com', 'heyDhobi', 'c5b270a763686e776039', 'Y'),
('E3C8B653-9860-4827-B4F6-54F1D306D822', 'Anitha Manharan', '9004716777', '', 'MUMBAI', '0', 'Bangalore', 'R-101, D-4 JAI BHARAT TOWER,\r\nM.M.R.D.A. Coloney ,sion koliwada,\r\nkokriagar antophill , mumbai 37,Mankurd abc', 'reddyanitha407@gmail.com', 'anitha', 'b1300291698eadedb559', 'Y'),
('EFD4C54C-7500-4787-88E7-5EDCE4A29A7C', 'pavi', '2147483647', 'Maharashtra', 'mumbai', '0', 'mumbai', 'mumbai', 'pavitramanoharan70@gmail.com', '123pavitra', 'bb702465f3c3141263dd', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`ADMIN_ID`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
 ADD PRIMARY KEY (`ENQUIRY_ID`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
 ADD PRIMARY KEY (`REPLY_ID`);

--
-- Indexes for table `schedule_picker`
--
ALTER TABLE `schedule_picker`
 ADD PRIMARY KEY (`ORDER_ID`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
 ADD PRIMARY KEY (`SUBSCRIBER_ID`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
 ADD PRIMARY KEY (`TYPE_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `ADMIN_ID` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
MODIFY `ENQUIRY_ID` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
MODIFY `REPLY_ID` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `schedule_picker`
--
ALTER TABLE `schedule_picker`
MODIFY `ORDER_ID` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
MODIFY `SUBSCRIBER_ID` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
MODIFY `TYPE_ID` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
