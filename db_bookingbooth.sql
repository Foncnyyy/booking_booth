-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2021 at 02:34 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bookingbooth`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(100) NOT NULL,
  `a_surname` varchar(200) NOT NULL,
  `a_username` varchar(50) NOT NULL,
  `a_password` varchar(50) NOT NULL,
  `a_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`a_id`, `a_name`, `a_surname`, `a_username`, `a_password`, `a_img`) VALUES
(1, 'Kanthicha1', 'Phunkasem', 'kk', 'b59c67bf196a4758191e42f76670ceba', 'a53dea8ec3435155f6608e6f41f632be.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bank`
--

CREATE TABLE `tb_bank` (
  `b_id` int(11) NOT NULL,
  `bank_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bank_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bank_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_bank`
--

INSERT INTO `tb_bank` (`b_id`, `bank_type`, `bank_name`, `bank_number`) VALUES
(1, 'ไทยพาณิชย์ (SCB)', 'บริษัท BoothSquare จำกัด', '123 4567 891');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bookdetail`
--

CREATE TABLE `tb_bookdetail` (
  `d_id` int(11) NOT NULL,
  `d_list` int(11) NOT NULL,
  `d_qty` int(11) NOT NULL,
  `d_price` float NOT NULL,
  `d_amount` float NOT NULL,
  `j_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_bookdetail`
--

INSERT INTO `tb_bookdetail` (`d_id`, `d_list`, `d_qty`, `d_price`, `d_amount`, `j_id`, `book_id`) VALUES
(21, 1, 2, 3000, 6000, 1, 1),
(22, 2, 3, 1500, 4500, 2, 1),
(23, 3, 4, 5500, 22000, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

CREATE TABLE `tb_booking` (
  `book_id` int(11) NOT NULL,
  `book_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `book_date` datetime NOT NULL,
  `book_status` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `book_grandtotal` float NOT NULL,
  `m_id` int(11) NOT NULL,
  `book_img` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_booking`
--

INSERT INTO `tb_booking` (`book_id`, `book_no`, `book_date`, `book_status`, `book_grandtotal`, `m_id`, `book_img`) VALUES
(1, 'PO00001', '2021-05-15 19:27:28', 'T', 32500, 4, 'ImageSlip/1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_brandner`
--

CREATE TABLE `tb_brandner` (
  `b_id` int(11) NOT NULL,
  `b_list` int(11) NOT NULL,
  `b_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_brandner`
--

INSERT INTO `tb_brandner` (`b_id`, `b_list`, `b_image`) VALUES
(1, 1, 'd4114c9e2ff3d39d5e66daba703907ae.jpg'),
(2, 2, 'fc12233341ee4d0ef9784a30d4958801.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`c_id`, `c_name`) VALUES
(1, 'อาหาร เครื่องดื่ม'),
(2, 'บ้าน ที่อยู่อาศัย เฟอร์นิเจอร์'),
(4, 'อุปกรณ์สัตว์เลี้ยง');

-- --------------------------------------------------------

--
-- Table structure for table `tb_image`
--

CREATE TABLE `tb_image` (
  `img_id` int(11) NOT NULL,
  `img_list` int(11) NOT NULL,
  `img_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `j_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_image`
--

INSERT INTO `tb_image` (`img_id`, `img_list`, `img_path`, `j_id`) VALUES
(1, 1, '2222222.jpg', 1),
(2, 1, '2222222.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jobtitle`
--

CREATE TABLE `tb_jobtitle` (
  `j_id` int(11) NOT NULL,
  `j_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `j_detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `j_price` float NOT NULL,
  `j_totalbooth` int(11) NOT NULL,
  `j_totalbook` int(11) NOT NULL,
  `j_datestart` date NOT NULL,
  `j_datestop` date NOT NULL,
  `c_id` int(11) NOT NULL,
  `j_place` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `j_img` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_jobtitle`
--

INSERT INTO `tb_jobtitle` (`j_id`, `j_name`, `j_detail`, `j_price`, `j_totalbooth`, `j_totalbook`, `j_datestart`, `j_datestop`, `c_id`, `j_place`, `j_img`) VALUES
(1, 'งาน Thailand Bakery & Ice-Cream 2021', 'งานแสดงเบเกอรี่และไอศกรีม แพลตฟอร์มสำหรับการขยายธุรกิจเบเกอรี่และไอศกรีม ภายในงานรวบรวมผู้ประกอบการทั้งผู้ผลิต ผู้นำเข้า ผู้ส่งออก ผู้จำหน่ายตั้งแต่วัตถุดิบ อุปกรณ์ ไปจนถึงเครื่องมือเครื่องใช้สำหรับธุรกิจร้าน เบเกอรี่ และไอศกรีม จากทุกมุมโลก', 3000, 60, 2, '2021-05-24', '2021-05-30', 1, '', 'f461dc48fa60f282652c6594b68642c7.JPG'),
(2, 'งานแสดงอาหารทะเลแห่งเอเชีย (SEAFOOD SHOW OF ASIA)', 'Krista Exhibitions proudly present SEAFOOD SHOW ASIA EXPO 2021. The 3rd Int’l exhibition on Fishery and Seafood, Seafood materials, Products and Processing equipment & Cold Chain technology', 1500, 50, 3, '2021-05-17', '2021-05-23', 1, '', 'c2133bca1c2e70457bdd5a60954a961f.JPG'),
(3, 'งาน Smart SME Expo 2021', 'รวมสุดยอดธุรกิจแห่งปี New Normal Together ธุรกิจที่กลับมาหลัง Covid-19 รวมแฟรนไชส์ในตลาด ธุรกิจร้านอาหาร ธุรกิจภาคขนส่งให้กับผู้ประกอบการ', 5500, 150, 4, '2021-06-07', '2021-06-13', 2, '', '7d3bf3f391e53a9f5341873d9ddbfd40.png'),
(4, 'Pet EXPO', 'Pet EXPO', 2500, 150, 0, '2021-05-18', '2021-05-24', 4, 'Impack1', '12.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `m_id` int(11) NOT NULL,
  `m_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `m_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_tel` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`m_id`, `m_name`, `m_surname`, `m_username`, `m_password`, `m_email`, `m_address`, `m_tel`) VALUES
(1, 'Kanthicha1', 'Phunkasem1', 'kk1', 'b59c67bf196a4758191e42f76670ceba', 'kk1@gmail.com', '108/241', '0125478542'),
(3, 'Audi', 'Audi', 'audi', 'b59c67bf196a4758191e42f76670ceba', 'Audi@gmail.com', '', ''),
(4, 'jj', 'jj', 'jj', 'b59c67bf196a4758191e42f76670ceba', 'jj@gmail.com', '', ''),
(5, 'dd', 'dd', 'dd', 'b59c67bf196a4758191e42f76670ceba', 'dd@gmail.com', '', '0123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `tb_bank`
--
ALTER TABLE `tb_bank`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tb_bookdetail`
--
ALTER TABLE `tb_bookdetail`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `tb_brandner`
--
ALTER TABLE `tb_brandner`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tb_image`
--
ALTER TABLE `tb_image`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `tb_jobtitle`
--
ALTER TABLE `tb_jobtitle`
  ADD PRIMARY KEY (`j_id`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`m_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_bank`
--
ALTER TABLE `tb_bank`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_bookdetail`
--
ALTER TABLE `tb_bookdetail`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_brandner`
--
ALTER TABLE `tb_brandner`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_image`
--
ALTER TABLE `tb_image`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_jobtitle`
--
ALTER TABLE `tb_jobtitle`
  MODIFY `j_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
