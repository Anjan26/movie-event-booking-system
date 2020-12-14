-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2020 at 02:52 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interim`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking_event`
--

CREATE TABLE `booking_event` (
  `id` int(11) NOT NULL,
  `ticket_id` varchar(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_type` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(20) NOT NULL,
  `no_of_seats` int(11) NOT NULL,
  `amount` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_event`
--

INSERT INTO `booking_event` (`id`, `ticket_id`, `customer_name`, `email`, `event_name`, `event_type`, `location`, `date`, `time`, `no_of_seats`, `amount`) VALUES
(2, 'BKID6841', 'Aarti Patel', 'paartip30@gmail.com', ' Carnival Party', ' Others', 'The Oberoi Grand,Kolkata', '2021-01-01', '6:00 PM - 10:00 PM', 3, '1500');

-- --------------------------------------------------------

--
-- Table structure for table `booking_movie`
--

CREATE TABLE `booking_movie` (
  `id` int(11) NOT NULL,
  `ticket_id` varchar(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `movie_name` varchar(100) NOT NULL,
  `city_name` varchar(50) NOT NULL,
  `theatre_name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `show_time` varchar(20) DEFAULT NULL,
  `no_of_seats` int(11) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `seat_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_movie`
--

INSERT INTO `booking_movie` (`id`, `ticket_id`, `customer_name`, `email`, `movie_name`, `city_name`, `theatre_name`, `date`, `show_time`, `no_of_seats`, `amount`, `seat_no`) VALUES
(40, 'BKID8614', 'Aarti Patel', 'paartip30@gmail.com', 'Bloodshot', 'Kolkata', 'PVR Cinema', '2021-01-10', '9:00 AM', 4, '1000', ''),
(41, 'BKID6175', 'Aarti Patel', 'paartip30@gmail.com', 'The Outpost', 'Bhubaneswar', 'Maharaj Cinema', '2021-01-10', '9:00 AM', 1, '250', ''),
(42, 'BKID8679', 'Anjan Guha', 'guha.anjan1@gmail.com', 'Gunjan Saxena', 'Kolkata', 'Laxmii Cinemas', '2021-01-10', '11:30 AM', 5, '1750', ''),
(43, 'BKID4559', 'Anjan Guha', 'guha.anjan1@gmail.com', 'Bloodshot', 'Kolkata', 'IMAX 3D', '2021-01-08', '11:30 AM', 5, '1750', ''),
(44, 'BKID6251', 'jaym das', 'jaym@gmail.com', 'Gunjan Saxena', 'Kolkata', 'PVR Cinema', '2021-01-10', '11:30 AM', 2, '500', '');

-- --------------------------------------------------------

--
-- Table structure for table `contactusquery`
--

CREATE TABLE `contactusquery` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `EmailId` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `ContactNumber` char(11) CHARACTER SET latin1 DEFAULT NULL,
  `Message` longtext CHARACTER SET latin1 DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactusquery`
--

INSERT INTO `contactusquery` (`id`, `name`, `EmailId`, `ContactNumber`, `Message`, `PostingDate`, `status`) VALUES
(2, 'Anjan Guha', 'guha.anjan0@gmail.com', '9834763893', 'hello', '2020-11-12 16:55:28', 1),
(3, 'Aarti Patel', 'a@gmail.com', '9450604943', 'want to change number', '2020-11-13 14:41:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_type` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `event_date` date NOT NULL,
  `time` varchar(20) NOT NULL,
  `location` varchar(50) NOT NULL,
  `cost` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_type`, `description`, `event_date`, `time`, `location`, `cost`, `image`) VALUES
(3, 'Stocks and Shares Speech', 'Talk Show', 'A Speech on Stock Markets and Liquidity Funds.', '2020-12-06', '10:00 AM - 12:00 PM', 'Mayfair,Bhubaneswar', 200, '../images/harshad.jpg'),
(4, 'Bhavin Shah', 'Motivational', 'Motivational Speech', '2020-12-16', '4:00 PM - 5:00 PM', 'University of Calcutta,Kolkata', 250, '../images/motivational.jpg'),
(5, 'Business Seminar', 'Seminar', 'Adam Plander: Marketing Leader', '2020-12-08', '9:00 AM - 12:00 PM', 'Online', 300, '../images/corporateseminar.jpg'),
(6, 'Carnival Party', 'Others', 'Live Music', '2021-01-01', '6:00 PM - 10:00 PM', 'The Oberoi Grand,Kolkata', 500, '../images/carnival.png');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `city_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `city_name`) VALUES
(1, 'Pune'),
(2, 'Chennai'),
(3, 'Cuttack'),
(4, 'Kolkata'),
(5, 'Bhubaneswar'),
(6, 'Mumbai'),
(7, 'Bangalore');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(11) NOT NULL,
  `movie_name` varchar(100) NOT NULL,
  `movie_type` varchar(20) DEFAULT NULL,
  `language` varchar(30) NOT NULL,
  `duration` varchar(30) DEFAULT NULL,
  `movie_cast` varchar(100) NOT NULL,
  `director` varchar(50) NOT NULL,
  `release_date` date NOT NULL,
  `rating` decimal(4,1) DEFAULT NULL,
  `image` varchar(200) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `movie_name`, `movie_type`, `language`, `duration`, `movie_cast`, `director`, `release_date`, `rating`, `image`, `link`) VALUES
(8, 'Bloodshot', 'Action', 'English', '120 minutes', 'Vin Diesel, Eiza González', 'David S F Wilson', '2020-11-15', '5.9', '../images/bloodshot.jpg', 'https://youtu.be/vOUVVDWdXbo'),
(9, 'Gunjan Saxena', 'Action', 'Hindi', '150 minutes', 'Jhanvi Kapoor, Pankaj Tripathi', 'Sharan Sharma', '2020-11-14', '8.9', '../images/gunjansaxena.jpg', 'https://youtu.be/rtGIq9Xjnrw'),
(11, 'Tanhaji: The Unsung Warrior', 'Drama', 'Hindi', '150 minutes', 'Ajay Devgan, Kajol, Saif Ali Khan', 'Om Rout', '2020-10-14', '7.6', '../images/tanhaji.jpg', 'https://youtu.be/cffAGIYTEHU'),
(12, 'The Outpost', 'Action', 'English', '120 minutes', 'Scott Eastwood, Orlando Bloom', 'Rod Lurie', '2020-11-21', '8.9', '../images/theoutpost.jpg', 'https://youtu.be/Kp9JghhGPao');

-- --------------------------------------------------------

--
-- Table structure for table `review_rating`
--

CREATE TABLE `review_rating` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `show_watched` varchar(100) NOT NULL,
  `rating` varchar(10) NOT NULL,
  `review` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review_rating`
--

INSERT INTO `review_rating` (`id`, `name`, `show_watched`, `rating`, `review`) VALUES
(1, 'Anjan Guha', 'The Outpost', '5.7', 'Good'),
(2, 'Anjan Kumar Guha', 'Gunjan Saxena', '8.9', 'Excellent Movie'),
(3, 'Anjan Kumar Guha', 'The Outpost', '6.2', 'good'),
(4, 'subhrajeet', 'Gunjan Saxena', '6.2', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `theatre`
--

CREATE TABLE `theatre` (
  `id` int(11) NOT NULL,
  `theatre_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_no` char(15) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theatre`
--

INSERT INTO `theatre` (`id`, `theatre_name`, `email`, `contact_no`, `location`) VALUES
(1, 'Maharaj Cinema', 'maharaj@gmail.com', '067455555555', 'Bhubaneswar'),
(2, ' Laxmii Cinemas', 'lax@gmail.com', ' 03417895644', 'Kolkata'),
(3, ' PVR Cinema', 'pvr@gmail.com', ' 03478999633', 'Kolkata'),
(4, ' INOX Cinema', 'inoxbbsr@gmail.com', ' 89996663331', 'Bhubaneswar'),
(5, ' IMAX 3D', '3d@gmail.com', ' 7888966633', 'Kolkata'),
(6, ' Ramoji FilmCity', 'city@gmail.com', ' 78945612378', 'Pune');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `contact_no` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `contact_no`) VALUES
(7, 'Anjan Guha', 'guha.anjan1@gmail.com', '000', '8880361432'),
(8, 'Aarti Patel', 'paartip30@gmail.com', '000', '9001408764'),
(9, 'jaym das', 'jaym@gmail.com', '000', '9999999999');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_event`
--
ALTER TABLE `booking_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_movie`
--
ALTER TABLE `booking_movie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactusquery`
--
ALTER TABLE `contactusquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `review_rating`
--
ALTER TABLE `review_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theatre`
--
ALTER TABLE `theatre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_event`
--
ALTER TABLE `booking_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booking_movie`
--
ALTER TABLE `booking_movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `contactusquery`
--
ALTER TABLE `contactusquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `review_rating`
--
ALTER TABLE `review_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `theatre`
--
ALTER TABLE `theatre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
