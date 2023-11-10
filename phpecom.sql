-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2023 at 05:01 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `prod_id`, `prod_qty`, `created_at`) VALUES
(2, 2, 1, 1, '2023-03-28 17:54:00'),
(3, 2, 4, 2, '2023-04-14 14:50:17'),
(4, 2, 5, 3, '2023-04-14 14:50:26'),
(6, 4, 1, 1, '2023-05-01 22:29:48'),
(9, 4, 4, 1, '2023-05-01 22:39:46'),
(10, 4, 5, 1, '2023-05-06 21:14:46');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(191) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`) VALUES
(5, 'Fruits', 'fruits', 'Fruits is good for human body', 0, 0, '1677593040.jpg', 'Fruits', 'Fruits is good for human body', 'Fruits is good for human body', '2023-02-28 14:04:00'),
(7, 'Electronics', 'electronics', 'electronic is a essentials things in our daily life. ', 0, 1, '1677851502.jpg', 'electronic is a essentials things in our daily life. ', 'electronic is a essentials things in our daily life. ', 'electronic is a essentials things in our daily life. ', '2023-03-03 13:51:42'),
(8, 'Phone', 'phone', 'Phone is a necessity part in our life.', 1, 0, '1677851553.jpg', 'Phone is a necessity part in our life.', 'Phone is a necessity part in our life.', 'Phone is a necessity part in our life.', '2023-03-03 13:52:33'),
(9, 'laptop', 'laptop', 'Laptop is a personal computer.', 1, 0, '1677851595.jpg', 'Laptop is a personal computer.', 'Laptop is a personal computer.', 'Laptop is a personal computer.', '2023-03-03 13:53:15'),
(10, 'Vegetable', 'Vegetable', 'Vegetable is import for our human body', 0, 1, '1677851661.jpg', 'Vegetable is import for our human body', 'Vegetable is import for our human body', 'Vegetable is import for our human body', '2023-03-03 13:54:21'),
(11, 'iPhone', 'iPhone', 'iPhone is a Luxury phone', 1, 0, '1677851711.jpg', 'iPhone is a Luxury phone', 'iPhone is a Luxury phone', 'iPhone is a Luxury phone', '2023-03-03 13:55:11'),
(12, 'Meat', 'meat', 'Meat is a very calories based food.', 1, 0, '1677851766.jpg', 'Meat is a very calories based food.', 'Meat is a very calories based food.', 'Meat is a very calories based food.', '2023-03-03 13:56:06'),
(13, 'Dress', 'dress', 'Dress is needed daily life', 0, 1, '1677851817.jpg', 'Dress is needed daily life', 'Dress is needed daily life', 'Dress is needed daily life', '2023-03-03 13:56:57'),
(14, 'Gold', 'gold', 'Gold is a fashion based item not compulsory daily life.', 0, 1, '1677851897.jpg', 'Gold is a fashion based item not compulsory daily life.', 'Gold is a fashion based item not compulsory daily life.', 'Gold is a fashion based item not compulsory daily life.', '2023-03-03 13:58:17'),
(15, 'Diamond', 'Diamond', 'Diamond is a expensive things', 1, 0, '1677851970.jpg', 'Diamond is a expensive things', 'Diamond is a expensive things', 'Diamond is a expensive things', '2023-03-03 13:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(191) NOT NULL,
  `user_id` int(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `address` mediumtext NOT NULL,
  `pincode` int(191) NOT NULL,
  `total_price` int(191) NOT NULL,
  `payment_mode` varchar(191) NOT NULL,
  `payment_id` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `comments` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(191) NOT NULL,
  `prod_id` int(191) NOT NULL,
  `qty` int(191) NOT NULL,
  `price` int(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `small_description` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `original_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `image` varchar(191) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `status`, `trending`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`) VALUES
(1, 5, 'Orange3', 'orange3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', 40, 30, '1677591451.jpg', 10, 0, 1, 'lorem ipsum dolor amet 2', '                                                                                                                                                                                                                                                                                                                        lorem ipsum dolor amet         2                                                                                                                                                                                                                                                                                     ', '                                                                                                                                                                                                                                                                                                 lorem ipsum dolor amet        2                                                                                                                                                                                                                                                                                      ', '2023-01-21 16:33:18'),
(4, 7, 'Dell Latitude 14 3420 Core i7 11th', 'Dell Latitude 14 3420 Core i7 11th', 'Key Features\r\nModel: Latitude 14 3420\r\nProcessor: Intel Core i7-1165G7 (12M Cache, 2.80 GHz up to 4.70 GHz, with IPU)\r\nRAM: 8 GB 3200MHz, Storage: 512GB SSD\r\nDisplay: 14\" FHD (1920 x 1080)\r\nFeatures: Standard Keyboard', 'Key Features\r\nModel: Latitude 14 3420\r\nProcessor: Intel Core i7-1165G7 (12M Cache, 2.80 GHz up to 4.70 GHz, with IPU)\r\nRAM: 8 GB 3200MHz, Storage: 512GB SSD\r\nDisplay: 14\" FHD (1920 x 1080)\r\nFeatures: Standard Keyboard', 116100, 108000, '1677953616.jpg', 1, 0, 0, 'Dell Latitude 14 3420 Core i7 11th Gen', 'Dell Latitude 14 3420 Core i7 11th Gen', 'Dell Latitude 14 3420 Core i7 11th Gen', '2023-03-04 18:13:36'),
(5, 10, 'Brokolly', 'Brokolly', 'Brokolly is good tasty vegetable', 'Brokolly is good tasty vegetable', 200, 180, '1677953862.jpg', 5, 0, 1, 'Brokolly is good tasty vegetable', 'Brokolly is good tasty vegetable', 'Brokolly ', '2023-03-04 18:17:42'),
(6, 13, 'IELGY French Gentle Dress Puff Sleeve Fairy Long Dress', 'IELGY French Gentle Dress Puff Sleeve Fairy Long Dress', 'IELGY French Gentle Dress Puff Sleeve Fairy Long Dress', 'IELGY French Gentle Dress Puff Sleeve Fairy Long Dress', 3000, 2700, '1677953982.jpg', 2, 1, 0, 'IELGY French Gentle Dress Puff Sleeve Fairy Long Dress', 'IELGY French Gentle Dress Puff Sleeve Fairy Long Dress', 'IELGY French Gentle Dress Puff Sleeve Fairy Long Dress', '2023-03-04 18:19:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` int(15) NOT NULL,
  `password` varchar(191) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `role_as`, `created_at`) VALUES
(2, 'Parvez', 'parvez@gmail.com', 1671828603, '1234', 0, '2022-12-02 03:04:37'),
(3, 'Sazzad', 'sazzad@gmail.com', 1749445380, '123', 0, '2022-12-02 03:15:06'),
(4, 'Zakir', 'zakir@textiletoday.com.bd', 1775814898, '1234', 1, '2022-12-02 03:22:54'),
(5, 'BTT', 'btt@gmail.com', 1775814898, '1234', 0, '2023-01-22 09:54:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`,`tracking_no`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
