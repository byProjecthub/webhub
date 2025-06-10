-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2024 at 03:17 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `relo_ventura_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `act_id` int(10) NOT NULL,
  `act_name` varchar(50) NOT NULL,
  `act_description` varchar(350) NOT NULL,
  `act_price` int(10) NOT NULL,
  `act1` varchar(100) NOT NULL,
  `act2` varchar(100) NOT NULL,
  `act3` varchar(100) NOT NULL,
  `act4` varchar(100) NOT NULL,
  `act_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`act_id`, `act_name`, `act_description`, `act_price`, `act1`, `act2`, `act3`, `act4`, `act_img`) VALUES
(6, 'Adventure Camp', 'A family bonds camp is a specialized program or retreat designed to strengthen and nurture the relationships within a family. These camps are typically organized to provide a unique and supportive environment for family members to spend quality time .A family bonds camp is a specialized program or retreat designed to strengthen and nurture the rela', 12345, 'Rock Climbing', 'Zip-lining', 'Survival skills', 'Orienteeing', 'Img/act-3.webp'),
(7, 'Family Bonds Camp', 'A family bonds camp is a specialized program or retreat designed to strengthen and nurture the relationships within a family. These camps are typically organized to provide a unique and supportive environment for family members to spend quality time ', 786, 'Campfire storytelling', 'Scavenger hunts', 'Craft workshop', 'Family talent show', 'Img/act-2.jpg'),
(8, 'Youth Camp', 'A youth camp is a recreational and educational program or facility specifically designed for young people, typically children and teenagers. These camps offer a range of activities and experiences to engage, educate, and entertain youth, often in a fun and structured environment. The following activities are available under this camp:', 380, 'Fun team building day', 'Team strength finder', 'Sports and atletics', 'Workshop and skill building', 'Img/act-1.jpg'),
(9, 'Kids Leadership Camp', 'A kids leadership camp is a specialized program or camp designed to foster leadership skills and qualities in children. These camps aim to empower young participants with the knowledge and confidence needed to become effective leaders.', 475, 'Personality test', 'Public speaking', 'Goal setting', 'Outdoor Adventure', 'Img/act-6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `activities2`
--

CREATE TABLE `activities2` (
  `act_id` int(10) NOT NULL,
  `act_name` varchar(50) NOT NULL,
  `act_description` varchar(500) NOT NULL,
  `act_price` float NOT NULL,
  `info` varchar(20) NOT NULL,
  `act1` varchar(100) NOT NULL,
  `act2` varchar(100) NOT NULL,
  `act3` varchar(100) NOT NULL,
  `act4` varchar(100) NOT NULL,
  `act_img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activities2`
--

INSERT INTO `activities2` (`act_id`, `act_name`, `act_description`, `act_price`, `info`, `act1`, `act2`, `act3`, `act4`, `act_img`) VALUES
(1, 'Holiday Club', '1234', 124, 'Per Person', 'Outdoor Exploration', 'Puzzle and Board Games', 'Community Service Projects', 'Group Challenges', 'Img/footer-background-1.jpg'),
(2, 'Team Building', 'Team building is a process or activity aimed at improving the cohesiveness, collaboration, and effectiveness of a group or team. It involves a range of exercises, challenges, and experiences designed to promote better communication, trust, problem-solving, and interpersonal relationships among team members.\r\n', 150, 'Per Team of 5', 'Human Knot', 'Team Sports', 'Obstacle Course', 'Puzzle Races', 'Img/campsite2.jpg'),
(3, 'Our Grounds', 'Camping grounds, also known as campgrounds or campsites, are designated areas where individuals or groups can set up temporary shelters, such as tents or  for outdoor recreational activities', 450, 'For A Day', '', '', '', '', 'Img/Booking/back6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `Admin` varchar(50) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `Admin`, `admin_email`, `password`) VALUES
(1460, 'admin', 'collenmanti@outlook.com', '1234'),
(9444, 'Collen', 'Collen@gmail.com', 'Colls'),
(37080, 'admin', 'solocresmanti@gmail.com', '1111'),
(1460, 'admin', 'collenmanti@outlook.com', '1234'),
(9444, 'Collen', 'Collen@gmail.com', 'Colls'),
(37080, 'admin', 'solocresmanti@gmail.com', '1111'),
(1460, 'admin', 'collenmanti@outlook.com', '1234'),
(9444, 'Collen', 'Collen@gmail.com', 'Colls'),
(37080, 'admin', 'solocresmanti@gmail.com', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `blocked_dates`
--

CREATE TABLE `blocked_dates` (
  `id` int(11) NOT NULL,
  `blocked_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(10) NOT NULL,
  `Activity_Name` varchar(255) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Check_in_Date` date NOT NULL,
  `Check_out_Date` date NOT NULL,
  `Number_Of_People` int(11) NOT NULL,
  `catering_included` varchar(100) NOT NULL,
  `status` varchar(125) NOT NULL COMMENT 'Pending Payment|Approved|Complete|\r\nDenied|Cancelled',
  `user_id` int(10) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `Activity_Name`, `Price`, `Check_in_Date`, `Check_out_Date`, `Number_Of_People`, `catering_included`, `status`, `user_id`, `booking_date`) VALUES
(1, 'Adventure Camp', 1540.00, '2023-11-10', '2023-11-12', 2, 'Yes', 'Pending Payment', 37126, '2023-11-02 18:14:41'),
(2, 'Adventure Camp', 1540.00, '2023-11-10', '2023-11-12', 2, 'Yes', 'Pending Payment', 37126, '2023-11-06 18:14:41'),
(3, 'Family Bonds Camp', 13752.00, '2023-11-15', '2023-11-19', 3, 'No', 'Pending Payment', 37126, '2023-11-06 18:14:41'),
(4, 'Adventure Camp', 580.00, '2023-11-09', '2023-11-11', 2, 'No', 'Pending Payment', 55039, '2023-11-06 18:14:41'),
(5, 'Family Bonds Camp', 11790.00, '2023-11-08', '2023-11-11', 5, 'No', 'Pending Payment', 8408, '2023-11-06 18:14:41'),
(6, 'Adventure Camp', 770.00, '2023-11-16', '2023-11-17', 2, 'Yes', 'Pending Payment', 55039, '2023-11-06 18:14:41'),
(7, 'Adventure Camp', 2900.00, '2023-11-14', '2023-11-24', 2, 'No', 'Pending Payment', 55039, '2023-11-06 18:14:41'),
(8, 'Adventure Camp', 2900.00, '2023-11-14', '2023-11-24', 2, 'No', 'Pending Payment', 55039, '2023-11-06 18:14:41'),
(9, 'Adventure Camp', 2900.00, '2023-11-14', '2023-11-24', 2, 'No', 'Pending Payment', 55039, '2023-11-06 18:14:41'),
(10, 'Adventure Camp', 2900.00, '2023-11-14', '2023-11-24', 2, 'No', 'Pending Payment', 55039, '2023-11-06 18:14:41'),
(11, 'Adventure Camp', 1540.00, '2023-11-08', '2023-11-10', 2, 'Yes', 'Pending Payment', 55039, '2023-11-06 18:14:41'),
(12, 'Adventure Camp', 725.00, '2024-08-21', '2024-08-26', 1, 'No', 'Pending Payment', 6942, '2024-08-13 00:41:40'),
(13, 'Adventure Camp', 725.00, '2024-08-21', '2024-08-26', 1, 'No', 'Pending Payment', 6942, '2024-08-13 00:45:04'),
(14, 'Adventure Camp', 725.00, '2024-08-14', '2024-08-19', 1, 'No', 'Pending Payment', 3950, '2024-08-13 16:13:20'),
(15, 'Adventure Camp', 725.00, '2024-08-14', '2024-08-19', 1, 'No', 'Pending Payment', 3950, '2024-08-13 16:13:45'),
(16, 'Adventure Camp', 725.00, '2024-08-28', '2024-09-02', 1, 'No', 'Pending Payment', 3950, '2024-08-13 16:14:01');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(150) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `Number` int(250) NOT NULL,
  `Alt_Number` int(250) NOT NULL,
  `Email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `Address`, `Number`, `Alt_Number`, `Email`) VALUES
(1, '117, 10th avenue, Edenvale', 75489662, 145789689, 'solocresmanti@gmail.com'),
(1, '117, 10th avenue, Edenvale', 75489662, 145789689, 'solocresmanti@gmail.com'),
(1, '117, 10th avenue, Edenvale', 75489662, 145789689, 'solocresmanti@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_date` date NOT NULL,
  `event_type` enum('admin_event','user_event') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_date`, `event_type`) VALUES
(21, '2023-11-09', 'admin_event'),
(22, '2023-11-11', 'admin_event'),
(23, '2023-11-16', 'admin_event'),
(24, '2023-11-18', 'admin_event'),
(21, '2023-11-09', 'admin_event'),
(22, '2023-11-11', 'admin_event'),
(23, '2023-11-16', 'admin_event'),
(24, '2023-11-18', 'admin_event'),
(21, '2023-11-09', 'admin_event'),
(22, '2023-11-11', 'admin_event'),
(23, '2023-11-16', 'admin_event'),
(24, '2023-11-18', 'admin_event');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `act_id` int(11) NOT NULL,
  `act_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `act_price` float(10,2) NOT NULL,
  `act_price_currency` varchar(10) NOT NULL,
  `paid_amount` float(10,2) NOT NULL,
  `paid_amount_currency` varchar(10) NOT NULL,
  `txn_id` varchar(100) NOT NULL,
  `checkout_session_id` varchar(255) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `booking_id` int(10) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_status` enum('Pending','Completed','Failed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `currency` varchar(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `currency`, `status`) VALUES
(1, 'Activity Type 1', '', 145.00, 'USD', 1),
(1, 'Activity Type 1', '', 145.00, 'USD', 1),
(1, 'Activity Type 1', '', 145.00, 'USD', 1);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `ReviewText` text NOT NULL,
  `Rating` int(11) NOT NULL CHECK (`Rating` between 1 and 5),
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `user_id`, `FirstName`, `LastName`, `ReviewText`, `Rating`, `CreatedAt`) VALUES
(1, 33878, 'Heaven', 'Moore', 'Great experience, but there is room for improvement.', 4, '2024-08-12 22:50:59'),
(2, 33878, 'Njabulo', 'Dlamini', '123', 4, '2024-08-12 23:53:16'),
(3, 33878, 'Njabulo', 'Dlamini', '123', 4, '2024-08-12 23:55:52'),
(4, 33878, 'Njabulo', '2', '5', 5, '2024-08-12 23:56:41'),
(5, 33878, 'Njabulo', 'Dlamini', '12', 4, '2024-08-12 23:58:08'),
(6, 33878, 'Njabulo', 'Njablod', '0', 3, '2024-08-13 01:53:41'),
(7, 33878, 'Njabulo', '1', '0', 4, '2024-08-13 01:55:07'),
(8, 33878, 'njabulo', 'Dlamini', '0', 5, '2024-08-13 01:55:50'),
(9, 33878, 'Njabulo', '12', '12', 5, '2024-08-13 01:56:13'),
(10, 33878, 'Njabulo', 'Dlamini', '0', 3, '2024-08-13 01:56:47'),
(11, 33878, 'Njabulo', 'Dlamini', '// JavaScript to handle star rating selection\r\ndocument.querySelectorAll(\'.star-rating .star\').forEach(star => {\r\n    star.addEventListener(\'click\', function() {\r\n        const rating = this.getAttribute(\'data-value\');\r\n        document.getElementById(\'rating_input\').value = rating;\r\n\r\n        // Update star display\r\n        document.querySelectorAll(\'.star-rating .star\').forEach(star => {\r\n            star.textContent = star.getAttribute(\'data-value\') <= rating ? \'★\' : \'☆\';\r\n        });\r\n    });\r\n});\r\n', 5, '2024-08-13 02:06:09'),
(12, 33878, '1313', '1313', '131313132456787 `213456 21345 123451 2345 1234 1234 123 1234 `123 1234 1234 `1234 `123 `123 1234 12 3 213 123 4` 123 1234 `123 4 `1234 123 2134 ', 5, '2024-08-13 02:20:05'),
(13, 33878, 'Njabulo', 'Dlamini', 'Nja', 4, '2024-08-13 16:42:45'),
(14, 33878, '1', '1', '1', 3, '2024-08-13 16:45:37'),
(16, 3950, 'Njabulo', 'nja', 'qw', 3, '2024-08-13 17:12:41'),
(17, 3950, 'Njabulo', '2', '12', 4, '2024-08-13 17:17:11'),
(18, 3950, 'Olwethu~', 'sdsd', 'qwertyu q wertyu sdfghjk zxcvbn zxcvbn asdfgh wertyui sdfj zxcvn asdfghj oiuy bnm,. .,mnb poiuyt wetyui .,mnbvc qwertyu .,mnbvc qwertyu ,mnbvcq wertyu ,mnbvs dfj kjhgf tyuio ,mnbvc ertyuiol kjhfd yuio .,mnbvc tyuiop. ,mnbvc tyuiop. ,mnvcs yuio', 5, '2024-08-14 01:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_number` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `verify_token` varchar(200) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=no, 1=yes',
  `Signup_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_number`, `Email`, `password`, `verify_token`, `status`, `Signup_date`) VALUES
(3950, 'njablodd', '0718663849', 'nja@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'b5bff772fb1966d69dd3dce3fae756da', 1, '2024-08-14 00:38:09'),
(8408, 'frank', '0000000000', 'kalasamwenda4@gmail.com', '4b107f83b7daadb802d90b2922946716', '0b517957d6a59f90f4c043f835aff8fb', 1, '2023-11-06 13:57:44'),
(9090, 'david', '0679319492', 'kalasamwenda3@gmail.com', 'cf53a6a84f0ef69bc07abb4e4eee64b8', '055ca81720cbca18a25f96e13b32c049', 0, '2023-11-03 09:55:54'),
(9865, 'derick', '0812346744', 'semela@gmail.com', '2ac9cb7dc02b3c0083eb70898e549b63', '7471cb1837331c141ca0b2d44d27227c', 0, '2023-11-02 12:06:49'),
(11574, 'Dionice Diogo', '0631234683', 'dionicediogo96@gmail.com', '659cd2877321e27ebddcb13190e89a2b', '6698e163baac783be80e50fd0bb25998', 0, '2023-11-06 12:00:55'),
(33878, 'Njabulo', '0123456789', 'colourerrclrr@gmail.com', '1234', 'd1f337a3b9b350e1a92b420d688bcd1b', 1, '2024-08-13 15:29:29'),
(37126, 'collen', '0178524455', 'collenmanti@outlook.com', '2ee83b219171de95fa1c03418e51fe7d', '0e73e62dbe12066d2e53919ab4bc785e', 1, '2023-11-04 20:52:43'),
(55039, 'derick', '0178524455', 'solocresmanti@gmail.com', '2ee83b219171de95fa1c03418e51fe7d', 'ec2205cad957c2a3508c89ab2dddbecb', 1, '2023-11-07 10:34:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`act_id`);

--
-- Indexes for table `activities2`
--
ALTER TABLE `activities2`
  ADD PRIMARY KEY (`act_id`);

--
-- Indexes for table `blocked_dates`
--
ALTER TABLE `blocked_dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`act_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `act_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `activities2`
--
ALTER TABLE `activities2`
  MODIFY `act_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blocked_dates`
--
ALTER TABLE `blocked_dates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`act_id`) REFERENCES `activities` (`act_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`act_id`) REFERENCES `activities2` (`act_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
