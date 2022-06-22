-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2021 at 12:56 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `email`) VALUES
('admin', '123', 'admin@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `grandtotal` float NOT NULL,
  `datetime` datetime NOT NULL,
  `paymentmethod` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zipcode` int(6) NOT NULL,
  `address` text NOT NULL,
  `remarks` text DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `trackingid` int(6) DEFAULT NULL,
  `companyname` varchar(100) DEFAULT NULL,
  `trackingurl` varchar(300) DEFAULT NULL,
  `trackremarks` varchar(500) DEFAULT NULL,
  `personreceived` varchar(500) DEFAULT NULL,
  `returnremarks` varchar(1000) DEFAULT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `grandtotal`, `datetime`, `paymentmethod`, `city`, `zipcode`, `address`, `remarks`, `status`, `trackingid`, `companyname`, `trackingurl`, `trackremarks`, `personreceived`, `returnremarks`, `email`) VALUES
(8, 3306.48, '2021-08-25 13:16:13', 'Online', 'Amritsar', 1234, 'aa', 'aa', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'user@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(11) NOT NULL,
  `price` float NOT NULL,
  `discount` int(10) NOT NULL,
  `netprice` float(10,2) NOT NULL,
  `quantity` int(10) NOT NULL,
  `productid` int(10) NOT NULL,
  `billid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `price`, `discount`, `netprice`, `quantity`, `productid`, `billid`) VALUES
(15, 599, 8, 551.08, 6, 14, 8);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryName` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryName`, `description`) VALUES
('Electronics', 'abc'),
('Kids', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productid` int(11) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `stock` int(10) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `subcategoryid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productid`, `productname`, `price`, `discount`, `stock`, `photo`, `description`, `subcategoryid`) VALUES
(12, 'Dell Laptop', 45999, 12, 0, 'uploads/laptop-1.jpg', 'abc', 19),
(13, 'OnePlus', 25999, 0, 250, 'uploads/mobile.jpg', 'abc', 21),
(14, 'Shirt 1', 599, 8, 100, 'uploads/shirt.jpg', 'abc', 20),
(15, 'Shirt 2', 899, 9, 200, 'uploads/shirt-2.jpeg', 'abc', 20);

-- --------------------------------------------------------

--
-- Table structure for table `product_photo`
--

CREATE TABLE `product_photo` (
  `id` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `caption` text NOT NULL,
  `productid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_photo`
--

INSERT INTO `product_photo` (`id`, `photo`, `caption`, `productid`) VALUES
(62, 'uploads/laptop.jpeg', 'abc', 12);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcategoryid` int(11) NOT NULL,
  `subcategoryName` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `categoryName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcategoryid`, `subcategoryName`, `description`, `categoryName`) VALUES
(19, 'Laptop', 'abc', 'Electronics'),
(20, 'Shirt', 'abc', 'Kids'),
(21, 'Mobile', 'abc', 'Electronics');

-- --------------------------------------------------------

--
-- Table structure for table `user_signup`
--

CREATE TABLE `user_signup` (
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_signup`
--

INSERT INTO `user_signup` (`email`, `password`, `fullname`, `mobile`) VALUES
('user@yahoo.com', '123', 'John Doe', '1234567898');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `billid` (`billid`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryName`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productid`),
  ADD KEY `subcategoryid` (`subcategoryid`);

--
-- Indexes for table `product_photo`
--
ALTER TABLE `product_photo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcategoryid`),
  ADD KEY `categoryName` (`categoryName`);

--
-- Indexes for table `user_signup`
--
ALTER TABLE `user_signup`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_photo`
--
ALTER TABLE `product_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcategoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user_signup` (`email`);

--
-- Constraints for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `bill_detail_ibfk_1` FOREIGN KEY (`billid`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `bill_detail_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `products` (`productid`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`subcategoryid`) REFERENCES `subcategory` (`subcategoryid`);

--
-- Constraints for table `product_photo`
--
ALTER TABLE `product_photo`
  ADD CONSTRAINT `product_photo_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `products` (`productid`);

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`categoryName`) REFERENCES `category` (`categoryName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
