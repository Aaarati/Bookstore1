-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2022 at 08:50 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `file` varchar(1000) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `file`, `description`) VALUES
(0, '5.jpg', ' okey');

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(6) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `username`, `password`) VALUES
(1, 'aarati', '202cb962ac59075b964b'),
(2, '', ''),
(0, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookID` int(10) NOT NULL,
  `bookname` varchar(30) NOT NULL,
  `price` int(10) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `productionhouseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`) VALUES
(1, 'Aarati Rajbhandari', 'kabitaji@gmail.com', 'kjhgfd'),
(3, 'Kumari Rajbhandari', 'kabitaji@gmail.com', 'help');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerID` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `username`, `password`, `email`, `address`, `contact`, `reg_date`) VALUES
(1, 'aarati', '4902ac243c23867329d81d5c08f4560b', 'aaratiraj77@gmail.com', 'boudha', 9865073851, '2022-06-07 09:46:56');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(200) NOT NULL,
  `customerID` int(30) NOT NULL,
  `bookname` varchar(220) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `transactionID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `customerID`, `bookname`, `quantity`, `price`, `total`, `status`, `order_date`, `transactionID`) VALUES
(1, 3, 'Sea Food Biryani', '1', '1650.00', '330.00', 'Cancelled', '2021-08-30 14:06:50', ''),
(2, 3, 'Mo:Mo Platter', '1', '550.00', '550.00', 'Pending', '2021-08-30 14:13:13', ''),
(3, 2, 'Tibetan Style Chicken Momo', '5', '290.00', '1450.00', 'Pending', '2021-08-30 14:16:12', ''),
(4, 6, 'Family Combo 1', '1', '1050.00', '1050.00', 'Pending', '2021-08-30 14:24:28', ''),
(5, 6, 'Chicken Tikka Roll', '1', '700.00', '700.00', 'Pending', '2021-08-30 14:45:02', ''),
(6, 6, 'Chicken Tikka Roll', '1', '700.00', '700.00', 'Pending', '2021-08-30 14:46:44', ''),
(7, 6, 'Chicken Tikka Roll', '1', '700.00', '700.00', 'Pending', '2021-08-30 14:47:54', ''),
(8, 3, 'Captain Egg Jumbo Burger', '2', '390.00', '780.00', 'Delivered', '2021-08-30 14:49:33', ''),
(9, 2, 'Grilled Fish', '1', '1050.00', '1050.00', 'Pending', '2021-08-31 01:55:36', ''),
(10, 4, 'Sprout Salad', '1', '340.00', '340.00', 'Pending', '2021-08-31 02:13:13', ''),
(11, 4, 'Chicken Steak', '2', '550.00', '1100.00', 'Pending', '2021-08-31 02:31:11', 'tok_1JUMkiBEnR2Z7uBuDmIdGVyy');

-- --------------------------------------------------------

--
-- Table structure for table `productionhouse`
--

CREATE TABLE `productionhouse` (
  `productionhouseID` int(6) NOT NULL,
  `book_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productionhouse`
--

INSERT INTO `productionhouse` (`productionhouseID`, `book_name`, `email`, `address`, `phone`, `image`, `reg_date`) VALUES
(6, 'computer security', 'aaratiraj77@gmail.com', 'bhakatapur', 9876543210, '3.jpg', '2022-06-21 14:42:16'),
(9, 'hence', 'aaratiraj77@gmail.com', 'bhakatapur', 9876543210, '1.jpg', '2022-07-17 05:20:45'),
(10, 'computer security', 'kabitaji@gmail.com', 'l', 9865073851, 'img1.jpg', '2022-07-17 06:30:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `productionhouse`
--
ALTER TABLE `productionhouse`
  ADD PRIMARY KEY (`productionhouseID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `productionhouse`
--
ALTER TABLE `productionhouse`
  MODIFY `productionhouseID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
