-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2023 at 05:28 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noravill2`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `b_id` int(5) NOT NULL,
  `b_name` varchar(250) NOT NULL,
  `b_img` text NOT NULL,
  `b_date` date NOT NULL,
  `b_des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catg_id` int(5) NOT NULL,
  `catg_name` varchar(250) NOT NULL,
  `catg_img` text NOT NULL,
  `catg_show` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catg_id`, `catg_name`, `catg_img`, `catg_show`) VALUES
(1, 'ห้องเตียงเดี่ยว', 'room_1.jpg', 'enable'),
(2, 'ห้องเตียงคู่', 'room_2.jpg', 'enable'),
(3, 'ห้องประชุม', 'room_5.jpg', 'disable');

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

CREATE TABLE `notify` (
  `n_id` int(5) NOT NULL,
  `n_quest` varchar(125) NOT NULL,
  `n_img` varchar(250) NOT NULL,
  `n_detail` varchar(250) NOT NULL,
  `n_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notify`
--

INSERT INTO `notify` (`n_id`, `n_quest`, `n_img`, `n_detail`, `n_date`) VALUES
(2, 'pee', '67518409_2095426084094515_6045818505285074944_n.jpg', 'pee', '2023-03-04 20:49:00'),
(4, 'see', 'mong2.png', 'see', '2023-03-04 22:44:00');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `re_id` int(5) NOT NULL,
  `re_name` varchar(125) NOT NULL,
  `re_des` varchar(250) NOT NULL,
  `u_id` int(5) NOT NULL,
  `de_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(5) NOT NULL,
  `role_salary` float NOT NULL,
  `role_level` varchar(50) NOT NULL,
  `role_check_in` date NOT NULL,
  `role_detail` text NOT NULL,
  `role_vacation` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bill`
--

CREATE TABLE `tb_bill` (
  `bill_id` int(5) NOT NULL,
  `u_id` int(5) NOT NULL,
  `de_id` int(5) NOT NULL,
  `r_id` int(5) NOT NULL,
  `bill_pic` text NOT NULL,
  `bill_status` varchar(70) NOT NULL,
  `bill_date` datetime NOT NULL,
  `bill_chanel` varchar(120) NOT NULL,
  `bill_price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_bill`
--

INSERT INTO `tb_bill` (`bill_id`, `u_id`, `de_id`, `r_id`, `bill_pic`, `bill_status`, `bill_date`, `bill_chanel`, `bill_price`) VALUES
(9, 1, 3, 25, 'computer_business.png', 'รอการยืนยัน', '2023-03-01 23:18:00', 'QR Code', '700'),
(15, 3, 3, 42, 'download.jpeg', 'ชำระเงินแล้ว', '2023-03-09 21:31:00', 'Internet Banking', '6300'),
(16, 1, 3, 43, 'download.jpeg', 'ชำระเงินแล้ว', '2023-03-09 22:00:00', 'Internet Banking', '4900'),
(17, 3, 3, 44, '332600993_190018373665831_1430562467094760669_n.jpg', 'ชำระเงินแล้ว', '2023-03-10 20:40:00', 'Internet Banking', '4900');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail`
--

CREATE TABLE `tb_detail` (
  `de_id` int(5) NOT NULL,
  `de_short_des` varchar(125) NOT NULL,
  `de_img` text NOT NULL,
  `de_view` int(5) NOT NULL,
  `catg_id` int(5) NOT NULL,
  `de_detail` varchar(250) NOT NULL,
  `de_price` float NOT NULL,
  `de_floor` varchar(5) NOT NULL,
  `de_show` varchar(20) NOT NULL,
  `de_name` varchar(60) NOT NULL,
  `de_count` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_detail`
--

INSERT INTO `tb_detail` (`de_id`, `de_short_des`, `de_img`, `de_view`, `catg_id`, `de_detail`, `de_price`, `de_floor`, `de_show`, `de_name`, `de_count`) VALUES
(1, 'เขียนว่าอะไรดีครับ', 'room_1.jpg', 0, 1, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque soluta exercitationem nesciunt nam saepe, labore rem aliquid ipsa minima earum ea quisquam. Eos eius aperiam atque ipsam doloribus reiciendis ab.', 700, '3', 'enable', 'ห้องพักเตียงเดี่ยว', 0),
(3, 'เขียนว่าอะไรดีครับ', 'room_3.jpg', 0, 2, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque soluta exercitationem nesciunt nam saepe, labore rem aliquid ipsa minima earum ea quisquam. Eos eius aperiam atque ipsam doloribus reiciendis ab.', 700, '1', 'enable', 'ห้องพักเตียงคู่', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_hotel`
--

CREATE TABLE `tb_hotel` (
  `h_id` int(5) NOT NULL,
  `h_name` varchar(70) NOT NULL,
  `h_tel` varchar(10) NOT NULL,
  `h_email` text NOT NULL,
  `h_logo` text NOT NULL,
  `h_des` text NOT NULL,
  `h_marquee` text NOT NULL,
  `h_count` int(6) NOT NULL,
  `h_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_hotel`
--

INSERT INTO `tb_hotel` (`h_id`, `h_name`, `h_tel`, `h_email`, `h_logo`, `h_des`, `h_marquee`, `h_count`, `h_address`) VALUES
(1, 'Noravill', '0648426684', 'Noravill@gmail.com', 'logo.svg', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, repudiandae, in porro odio labore cum quae vitae iste doloribus obcaecati exercitationem veritatis illum ex doloremque rerum enim nulla dolorem? Veniam.', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, repudiandae, in porro odio labore cum quae vitae iste doloribus obcaecati exercitationem veritatis illum ex doloremque rerum enim nulla dolorem? Veniam.', 0, ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, repudiandae, in porro odio labore cum quae vitae iste doloribus obcaecati exercitationem veritatis illum ex doloremque rerum enim nulla dolorem? Veniam.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reser`
--

CREATE TABLE `tb_reser` (
  `r_id` int(5) NOT NULL,
  `de_id` int(5) NOT NULL,
  `u_id` int(5) NOT NULL,
  `r_date` datetime NOT NULL,
  `r_status` varchar(80) NOT NULL,
  `r_day` int(11) NOT NULL,
  `r_checkin` date NOT NULL,
  `r_checkout` date NOT NULL,
  `r_room` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_reser`
--

INSERT INTO `tb_reser` (`r_id`, `de_id`, `u_id`, `r_date`, `r_status`, `r_day`, `r_checkin`, `r_checkout`, `r_room`) VALUES
(22, 2, 1, '2023-03-01 21:06:00', 'รอการชำระเงิน', 1, '2023-03-01', '2023-03-02', 'รอการยืนยัน'),
(23, 3, 1, '2023-03-01 21:36:00', 'รอการชำระเงิน', 3, '2023-03-01', '2023-03-04', 'รอการยืนยัน'),
(24, 2, 1, '2023-03-01 21:52:00', 'รอการชำระเงิน', 3, '2023-03-01', '2023-03-04', 'รอการยืนยัน'),
(25, 3, 1, '2023-03-01 21:53:00', 'รอการชำระเงิน', 1, '2023-03-04', '2023-03-03', 'รอการยืนยัน'),
(26, 1, 1, '2023-03-01 22:31:00', 'ชำระเงินแล้ว', 2, '2023-03-02', '2023-03-04', 'รอการยืนยัน'),
(27, 1, 1, '2023-03-01 23:23:00', 'รอการชำระเงิน', 30, '2023-03-01', '2023-03-31', 'รอการยืนยัน'),
(29, 1, 12, '2023-03-01 23:42:00', 'ชำระเงินแล้ว', 3, '2023-03-01', '2023-03-04', 'รอการยืนยัน'),
(30, 1, 12, '2023-03-01 23:45:00', 'รอการชำระเงิน', 1, '2023-03-01', '2023-03-02', 'รอการยืนยัน'),
(31, 2, 1, '2023-03-02 01:08:00', 'ชำระเงินแล้ว', 7, '2023-03-11', '2023-03-18', 'รอการยืนยัน'),
(32, 2, 13, '2023-03-02 01:33:00', 'ชำระเงินแล้ว', 2, '2023-03-02', '2023-03-04', 'รอการยืนยัน'),
(33, 2, 3, '2023-03-02 03:59:00', 'รอการชำระเงิน', 4, '2023-03-07', '2023-03-11', 'รอการยืนยัน'),
(34, 3, 3, '2023-03-07 10:07:00', 'รอการชำระเงิน', 3, '2023-03-07', '2023-03-10', 'รอการยืนยัน'),
(35, 2, 14, '2023-03-07 10:25:00', 'รอการชำระเงิน', 1, '2023-03-10', '2023-03-11', 'รอการยืนยัน'),
(36, 2, 15, '2023-03-07 10:48:00', 'ชำระเงินแล้ว', 3, '2023-03-22', '2023-03-25', 'รอการยืนยัน'),
(37, 0, 3, '2023-03-09 21:17:00', 'รอการชำระเงิน', 2, '2023-03-09', '2023-03-11', 'รอการยืนยัน'),
(41, 3, 3, '2023-03-09 21:27:00', 'รอการชำระเงิน', 5, '2023-03-13', '2023-03-18', 'รอการยืนยัน'),
(42, 3, 3, '2023-03-09 21:28:00', 'ชำระเงินแล้ว', 9, '2023-03-16', '2023-03-25', 'รอการยืนยัน'),
(43, 3, 1, '2023-03-09 21:58:00', 'ชำระเงินแล้ว', 7, '2023-03-18', '2023-03-25', '102'),
(44, 3, 3, '2023-03-10 20:40:00', 'ชำระเงินแล้ว', 7, '2023-03-11', '2023-03-18', '101');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `u_id` int(5) NOT NULL,
  `name` varchar(60) NOT NULL,
  `l_name` varchar(80) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `email` varchar(70) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` text NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `national` varchar(60) NOT NULL,
  `country` varchar(70) NOT NULL,
  `line_id` varchar(60) NOT NULL,
  `title` varchar(60) NOT NULL,
  `u_date` datetime NOT NULL,
  `u_pic` text NOT NULL,
  `level` varchar(50) NOT NULL,
  `token` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`u_id`, `name`, `l_name`, `tel`, `email`, `username`, `password`, `zip_code`, `national`, `country`, `line_id`, `title`, `u_date`, `u_pic`, `level`, `token`) VALUES
(1, 'ณรงค์ชัย', 'สุราษฎารมย์', '0968478774', 'test@gmail.com', 'test', '123', '', 'ไทย', 'ไทย', 'bem123123123', 'นาย', '2023-02-11 09:21:00', 'test.webp', 'user', ''),
(3, 'ณรงค์ชัย', 'สุราษฎารมย์', '0968478774', 'admin@gmail.com', 'admin', '123', '', 'ไทย', 'ไทย', 'bem123123123', 'นาย', '2023-02-11 09:21:00', 'test.webp', 'admin', ''),
(12, 'สมปอง', 'หล่อเท่', '0748746554', 'sompong@gmail.com', 'สมปอง', '123', '', 'ไทย', 'ไทย', 'sompong121', 'นาย', '2023-03-01 23:35:00', '309827703_630433758701327_5985527915450791681_n.png', 'user', ''),
(13, 'แมว', 'เหมียว', '0847789994', 'testd@gmail.com', 'TESTDEE', '123', '', 'ไทย', 'ไทย', '123123', 'นาย', '2023-03-02 01:27:00', '', 'user', ''),
(14, 'สมหญิง', 'สุดสวย', '0128949954', 'somying@gmail.com', 'somying', '123456', '', 'ไทย', 'ไทย', 'somying0123', 'นางสาว', '2023-03-07 10:22:00', 'download.jfif', 'user', ''),
(15, 'สมชาย', 'ทดสอบ', '0647899984', 'somchai@gmail.com', 'somchai', '123', '', 'ไทย', 'ไทย', 'somchai', 'นาย', '2023-03-07 10:44:00', 'download.jfif', 'user', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catg_id`);

--
-- Indexes for table `notify`
--
ALTER TABLE `notify`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`re_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tb_bill`
--
ALTER TABLE `tb_bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `tb_detail`
--
ALTER TABLE `tb_detail`
  ADD PRIMARY KEY (`de_id`);

--
-- Indexes for table `tb_hotel`
--
ALTER TABLE `tb_hotel`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `tb_reser`
--
ALTER TABLE `tb_reser`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `b_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catg_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notify`
--
ALTER TABLE `notify`
  MODIFY `n_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `re_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_bill`
--
ALTER TABLE `tb_bill`
  MODIFY `bill_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_detail`
--
ALTER TABLE `tb_detail`
  MODIFY `de_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_reser`
--
ALTER TABLE `tb_reser`
  MODIFY `r_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `u_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
