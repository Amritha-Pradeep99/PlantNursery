-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2024 at 11:10 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_plantnurusary`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(13, 'Sandra Saju', 'admin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date` varchar(60) NOT NULL,
  `booking_status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `booking_amount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `booking_date`, `booking_status`, `user_id`, `booking_amount`) VALUES
(19, '2024-11-07', 1, 13, '478.00'),
(20, '2024-11-07', 1, 13, '478.00'),
(21, '2024-11-07', 1, 12, '338.00'),
(22, '2024-11-07', 3, 12, '338.00'),
(23, '2024-11-07', 3, 13, '478.00'),
(24, '2024-11-07', 5, 15, '6000.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `cart_status` int(11) NOT NULL DEFAULT 0,
  `cart_quantity` varchar(400) NOT NULL DEFAULT '1',
  `plant_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `cart_status`, `cart_quantity`, `plant_id`, `booking_id`) VALUES
(40, 1, '1', 1, 19),
(41, 1, '1', 4, 20),
(42, 1, '4', 4, 21),
(43, 1, '2', 1, 22),
(44, 1, '1', 8, 23),
(45, 1, '1', 5, 23),
(46, 1, '1', 1, 24),
(47, 1, '1', 10, 24),
(48, 1, '1', 1, 23);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(6, 'Plant'),
(7, 'Trees'),
(8, 'Hybrid varities');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_title` varchar(70) NOT NULL,
  `complaint_description` varchar(300) NOT NULL,
  `complaint_status` int(70) NOT NULL DEFAULT 0,
  `complaint_date` varchar(70) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plant_id` int(11) NOT NULL,
  `complaint_reply` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_title`, `complaint_description`, `complaint_status`, `complaint_date`, `user_id`, `plant_id`, `complaint_reply`) VALUES
(17, 'Color', 'Received Different color', 1, '2024-09-12', 12, 9, 'thanyou '),
(18, 'Color', 'Received Different color', 1, '2024-09-12', 10, 8, 'scvsv'),
(19, 'Snake plant', 'product damaged', 0, '2024-09-23', 14, 4, ''),
(20, 'udtyety5rwetr', 'iutuirfutetr4qarw3qatreswt4r', 0, '2024-10-14', 13, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(12, 'kannur'),
(14, 'Kozhikode'),
(18, 'Ernakulam'),
(22, 'Idukki');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(50) NOT NULL,
  `place_pincode` varchar(50) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `place_pincode`, `district_id`) VALUES
(8, 'Piravom', '682308', 18),
(9, 'Payyoli', '23434', 12),
(10, 'Vadakara', '456789', 14),
(11, 'Thodupuzha', '623805', 18);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_plant`
--

CREATE TABLE `tbl_plant` (
  `plant_id` int(11) NOT NULL,
  `plant_name` varchar(50) NOT NULL,
  `plant_description` varchar(50) NOT NULL,
  `plant_price` varchar(60) NOT NULL,
  `plant_photo` varchar(60) NOT NULL,
  `category_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_plant`
--

INSERT INTO `tbl_plant` (`plant_id`, `plant_name`, `plant_description`, `plant_price`, `plant_photo`, `category_id`, `seller_id`) VALUES
(14, 'Hybrid tea roses', 'Most popular class of roses. With bountiful, ornat', '100', 'Rose.png', 6, 6),
(15, 'Orchid', 'Orchids are plants that belong to the family Orchi', '700', 'orchid.jpeg', 6, 6),
(16, 'Jackfruit', 'The jackfruit tree is well-suited to tropical lowl', '400', 'jackfruit.jpeg', 7, 6),
(17, 'Rambutan', 'This rambutan fruit hybrid Grafted plant produces ', '300', 'rambutan.jpg', 7, 6),
(20, 'Mangostin', 'Mangosteen (Garcinia mangostana), also known as th', '400', 'Mangosteentree.webp', 7, 6),
(21, 'Lotus', 'Lotus flowers are one of the most prominent tokens', '700', 'lotus.jpeg', 6, 6),
(22, 'Cactus', 'The cactus family (Cactaceae) is a fascinating wor', '750', 'cactus.jpeg', 6, 6),
(23, 'Hibiscus', 'Hibiscus is a genus of flowering plants in the mal', '700', 'hibiscus.jpeg', 6, 6),
(24, 'Jasmine', 'Jasmine (botanical name: Jasminum; /ˈjæsmɪnəm/ YAS', '400', 'jasmine.jpg', 6, 6),
(26, 'Snakeplant', 'In addition to being incredibly easy to grow, snak', '300', 'snake plant.jpg', 6, 6),
(27, 'Butterfly plant', 'Buddleia plants are known for their long, arching ', '400', 'butterfly plant.jpeg', 6, 6),
(28, 'Dragon fruit', 'Dragon fruit is a tropical fruit that’s low in cal', '700', 'dragon fruit.jpg', 6, 6),
(29, 'Flytrap', 'The Venus flytrap (Dionaea muscipula) is a carnivo', '300', 'fly trap.jpg', 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL,
  `review_datetime` varchar(60) NOT NULL,
  `user_review` varchar(70) NOT NULL,
  `user_rating` varchar(80) NOT NULL,
  `user_id` varchar(80) NOT NULL,
  `plant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `review_datetime`, `user_review`, `user_rating`, `user_id`, `plant_id`) VALUES
(1, '2024-09-23 16:11:15', 'hi', '4', '14', 1),
(2, '2024-09-23 16:43:27', 'gfbgfb', '0', '13', 1),
(3, '2024-09-23 17:02:53', 'hu', '4', '13', 10),
(4, '2024-10-05 06:26:52', 'jkkk', '0', '13', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seller`
--

CREATE TABLE `tbl_seller` (
  `seller_id` int(11) NOT NULL,
  `seller_name` varchar(50) NOT NULL,
  `seller_email` varchar(50) NOT NULL,
  `seller_contact` varchar(60) NOT NULL,
  `seller_password` varchar(50) NOT NULL,
  `seller_address` varchar(80) NOT NULL,
  `seller_photo` varchar(60) NOT NULL,
  `seller_proof` varchar(60) NOT NULL,
  `seller_status` int(11) NOT NULL DEFAULT 0,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_seller`
--

INSERT INTO `tbl_seller` (`seller_id`, `seller_name`, `seller_email`, `seller_contact`, `seller_password`, `seller_address`, `seller_photo`, `seller_proof`, `seller_status`, `place_id`) VALUES
(5, 'renu', 'renu23@gmail.com', '3456123455', '456', 'zadcszadfvgsxghdju', 'Hydrangeas.jpg', 'Lighthouse.jpg', 1, 9),
(6, 'Nandana R ', 'nandana12@gmail.com', '8934561234', '12345', 'abc building', 'Chrysanthemum.jpg', 'Hydrangeas.jpg', 1, 10),
(7, 'Sarath ', 'sarath12@gmail.com', '988765443 ', '12345', 'hygg', 'Penguins.jpg', 'Desert.jpg', 2, 10),
(8, 'Ann Thomass ', 'ann12@gmail.com', '8921806935 ', '123', 'dfhjhdffg', 'Screenshot 2.png.png', 'Screenshot 2023-11-16 112016.png', 0, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `stock_id` int(11) NOT NULL,
  `stock_quantity` varchar(400) NOT NULL,
  `stock_date` varchar(60) NOT NULL,
  `plant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`stock_id`, `stock_quantity`, `stock_date`, `plant_id`) VALUES
(1, '20 ', '2024-08-26', 1),
(2, '30', '2024-08-26', 4),
(4, '12', '2024-08-26', 5),
(6, '30', '2024-08-29', 8),
(7, '40', '2024-08-29', 9),
(8, '80', '2024-09-05', 10),
(10, '50', '2024-09-12', 11),
(12, '10', '2024-11-07', 14),
(13, '50', '2024-11-07', 29),
(14, '10', '2024-11-07', 28),
(15, '80', '2024-11-07', 27),
(16, '50', '2024-11-07', 26),
(17, '10', '2024-11-07', 25),
(18, '80', '2024-11-07', 25),
(19, '80', '2024-11-07', 24),
(20, '80', '2024-11-07', 22),
(21, '80', '2024-11-07', 21),
(22, '50', '2024-11-07', 17),
(23, '50', '2024-11-07', 15),
(24, '80', '2024-11-07', 16),
(25, '80', '2024-11-07', 20),
(26, '80', '2024-11-07', 23);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_address` varchar(30) NOT NULL,
  `user_contact` varchar(30) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_photo` varchar(250) NOT NULL,
  `user_gender` varchar(30) NOT NULL,
  `user_dob` varchar(50) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_address`, `user_contact`, `user_email`, `user_photo`, `user_gender`, `user_dob`, `user_password`, `place_id`) VALUES
(7, 'dfrtg', 'frtyyu', '1234567', 'renu6@gmail.com', 'Chrysanthemum.jpg', 'male', '', '1234', 0),
(8, 'Ann Thomass  ', 'frty7u7i9pnmj, l', '12345675', 'ann12@gmail.com', 'Tulips.jpg', 'female', '', '321', 8),
(9, 'Geethu Krishnan', 'tgyikjtgyolkgyl', '546568608-', 'geethu12@gmail.com', 'Tulips.jpg', 'female', '2003-11-20', '1234', 10),
(10, 'Gopika v', 'zdfdsxhdjf', '56889899', 'gopika12@gmail.com', 'Hydrangeas.jpg', 'female', '2000-03-01', '12', 9),
(11, 'Devika M', 'frghdh', '44455657585', 'devika12@gmail.com', 'Hydrangeas.jpg', 'female', '2002-06-11', '123456', 9),
(12, 'Ann Thomass', 'tyuhgdd', '8921806935', 'ann23@gmail.com', 'Screenshot 2.png.png', 'female', '2002-11-04', '123', 9),
(13, 'Nandana M S', 'Moothedath house\r\n', '9778246538', 'nandana@gmail.com', 'Screenshot 2023-11-16 112000.png', 'female', '2004-09-20', 'nandana@8', 8),
(14, 'sandra lilly saju', 'vattapillil  house', '6543785093', 'sandra@gmail.com', 'Screenshot 2023-11-24 115228.png', 'female', '2002-04-03', 'Sandra23', 11),
(15, 'sara', 'vattapilli', '2345678961', 'sara@gmail.com', '38680618_8664875.jpg', 'female', '2003-10-09', 'sara1234', 8),
(16, 'sandrals', 'kuzhikkadan(h)\r\npukkattupad', '9534285368', 'devikanarayanan456@gmail.com', 'Screenshot 2024-01-01 125100.png', 'female', '2024-11-04', 'user@123', 8),
(17, 'Sandra Saju', 'Panattu,kokkapilly po', '9526189753', 'sandrasaju002@gmail.com', 'sandra.jpg', 'female', '2002-11-04', 'Sls12430', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_plant`
--
ALTER TABLE `tbl_plant`
  ADD PRIMARY KEY (`plant_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_seller`
--
ALTER TABLE `tbl_seller`
  ADD PRIMARY KEY (`seller_id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_plant`
--
ALTER TABLE `tbl_plant`
  MODIFY `plant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_seller`
--
ALTER TABLE `tbl_seller`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
