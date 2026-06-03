-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2026 at 12:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Anime'),
(3, 'Comedy'),
(4, 'Drama'),
(5, 'Marvel'),
(6, 'Series');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `movie_id` int(11) DEFAULT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `movie_id`, `comment`, `created_at`) VALUES
(1, 2, 34, 'საუკეთესო!', '2026-06-02 21:37:23');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `movie_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `movie_id`) VALUES
(1, 2, 34),
(2, 2, 38),
(3, 1, 50);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `watch_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `image`, `year`, `category_id`, `watch_link`) VALUES
(34, 'Iron Man', 'ბიზნესმენი ტონი სტარკი ქმნის ჯავშანს და იქცევა გმირად — Iron Man-ად.', 'public/images/ironman.jpg', 2008, 5, 'https://www.youtube.com/watch?v=8ugaeA-nMTc'),
(35, 'The Avengers', 'მსოფლიოს უძლიერესი გმირები გაერთიანდებიან საერთო მტრის წინააღმდეგ.', 'public/images/avengers.jpg', 2012, 5, 'https://www.youtube.com/watch?v=eOrNdBpGMv8'),
(36, 'Avengers: Endgame', 'გმირები ბოლო ბრძოლაში უპირისპირდებიან თანოსს სამყაროს გადასარჩენად.', 'public/images/endgame.jpg', 2019, 5, 'https://www.youtube.com/watch?v=TcMBFSGVi1c'),
(37, 'Captain America: Civil War', 'გმირები ორ ბანაკად იყოფიან — Iron Man-ი და Captain America-ი დაპირისპირდებიან.', 'public/images/civilwar.jpg', 2016, 5, 'https://www.youtube.com/watch?v=dKrVegVI0Us'),
(38, 'Spider-Man: No Way Home', 'პიტერ პარკერი მულტივერსს ხსნის და სამ სამყაროს სპაიდერმენი ერთად იბრძვის.', 'public/images/spiderman.jpg', 2021, 5, 'https://www.youtube.com/watch?v=JfVOs4VSpmA'),
(39, 'Thor: Ragnarok', 'თორი ებრძვის და ცდილობს ასგარდის გადარჩენას განადგურებისგან.', 'public/images/thor.jpg', 2017, 5, 'https://www.youtube.com/watch?v=ue80QwXMRHg'),
(40, 'Home Alone', 'რვა წლის ბიჭი მარტო რჩება სახლში და იბრძვის ქურდების წინააღმდეგ.', 'public/images/homealone.jpg', 1990, 3, 'https://www.youtube.com/watch?v=dzdpqRGA1qc'),
(41, 'The Hangover', 'სამი მეგობარი ლას-ვეგასში ღამის შემდეგ ვერ იხსენებს რა მოხდა.', 'public/images/hangover.jpg', 2009, 3, 'https://www.youtube.com/watch?v=tcdUhdOlz9M'),
(42, 'Rush Hour', 'ჰონგ-კონგის დეტექტივი და ლოს-ანჯელესის პოლიციელი ერთად იბრძვიან დამნაშავეების წინააღმდეგ.', 'public/images/rushhour.jpg', 1998, 3, 'https://www.youtube.com/watch?v=JMiFsFQcFLE'),
(43, 'Knives Out', 'დეტექტივი იძიებს ცნობილი მწერლის საიდუმლო გარდაცვალებას.', 'public/images/knivesout.jpg', 2019, 3, 'https://www.youtube.com/watch?v=qGqiHJTsRkQ'),
(44, 'Free Guy', 'ვიდეო თამაშის პერსონაჟი აღმოაჩენს რომ ის NPC-ია და თავისუფლებისთვის იბრძვის.', 'public/images/freeguy.jpg', 2021, 3, 'https://www.youtube.com/watch?v=X2m-08cOAbc'),
(45, 'Barbie', 'ბარბი რეალურ სამყაროში ხვდება და თავის თავს ხელახლა აღმოაჩენს.', 'public/images/barbie.jpg', 2023, 3, 'https://www.youtube.com/watch?v=pBk4NYhWNMM'),
(46, 'Game of Thrones', 'შვიდი სამეფო ოჯახი იბრძვის ძლევამოსილი ტახტისთვის — რკინის ტახტისთვის.', 'public/images/got.jpg', 2011, 6, 'https://www.youtube.com/watch?v=KPLWWIOCOOQ'),
(47, 'Outer Banks', 'მეგობართა ჯგუფი ჩრდილოეთ კაროლინაში ეძებს განძს და საიდუმლოს.', 'public/images/outerbanks.jpg', 2020, 6, 'https://www.youtube.com/watch?v=pfY3j-3uQhk'),
(48, 'Money Heist', 'გენიალური დამნაშავე გეგმავს ესპანეთის სამეფო მონეტარიო სახლის გაძარცვას.', 'public/images/moneyhiest.jpg', 2017, 6, 'https://www.youtube.com/watch?v=_InqQJRqGW4'),
(49, 'Friends', 'ექვსი მეგობრის სასაცილო და სენტიმენტალური ცხოვრება ნიუ-იორკში.', 'public/images/friends.jpg', 1994, 6, 'https://www.youtube.com/watch?v=Lhpu3GdlV3w'),
(50, 'Off Campus', 'სტუდენტების სასაცილო და საინტერესო თავგადასავლები კამპუსში.', 'public/images/offcampus.jpg', 2024, 6, 'https://www.youtube.com/watch?v=4ytv9TTco-w'),
(51, 'Naruto', 'ახალგაზრდა ნინძა ოცნებობს გახდეს თავისი სოფლის ყველაზე ძლიერი ლიდერი.', 'public/images/naruto.jpg', 2002, 2, 'https://www.youtube.com/watch?v=QczGoCmX-pI'),
(52, 'Attack on Titan', 'კაცობრიობა იბრძვის გიგანტური ადამიანისმჭამელი ტიტანების წინააღმდეგ.', 'public/images/aot.jpg', 2013, 2, 'https://www.youtube.com/watch?v=MGRm4IzK1SQ'),
(53, 'Death Note', 'სტუდენტი პოულობს ჯადოსნურ რვეულს რომლითაც ნებისმიერის მოკვლა შეუძლია.', 'public/images/deathnote.jpg', 2006, 2, 'https://www.youtube.com/watch?v=NlJZ-YgAt-c'),
(54, 'John Wick', 'პენსიაზე გასული კილერი შურისძიებას იწყებს მას შემდეგ რაც მის ძაღლს კლავენ.', 'public/images/johnwick.jpg', 2014, 1, 'https://www.youtube.com/watch?v=2AUmvWm5ZDQ'),
(55, 'Mad Max: Fury Road', 'პოსტ-აპოკალიფსურ უდაბნოში გმირი ებრძვის დიქტატორს.', 'public/images/madmax.jpg', 2015, 1, 'https://www.youtube.com/watch?v=hEJnMQG9ev8'),
(56, 'The Dark Knight', 'ბეტმენი უპირისპირდება ქაოსის მოყვარულ ჯოკერს გოთემ სიტიში.', 'public/images/darkknight.jpg', 2008, 1, 'https://www.youtube.com/watch?v=EXeTwQWrcwY'),
(57, 'The Shawshank Redemption', 'უდანაშაულოდ გასამართლებული კაცი იმედს ინარჩუნებს刑務所-ში.', 'public/images/shawshank.jpg', 1994, 4, 'https://www.youtube.com/watch?v=6hB3S9bIaco'),
(58, 'Forrest Gump', 'მარტივი კაცის განსაკუთრებული ცხოვრება ამერიკის ისტორიის ფონზე.', 'public/images/forrestgump.jpg', 1994, 4, 'https://www.youtube.com/watch?v=bLvqoHBptjg'),
(59, 'Interstellar', 'მეცნიერები კოსმოსში მიდიან კაცობრიობის გადასარჩენად.', 'public/images/interstellar.jpg', 2014, 4, 'https://www.youtube.com/watch?v=zSWdZVtXT7E');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `movie_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` between 1 and 5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `movie_id`, `rating`) VALUES
(1, 2, 34, 5),
(2, 2, 38, 5),
(3, 1, 50, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@site.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
(2, 'anano', 'anano@gau.edu', '$2y$10$pgHk1Ugx.nH2oDEsO4V1JeldF8B/sdxHY9RQ3I4JU3z3u3TgDHsQ2', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`);

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`);

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
