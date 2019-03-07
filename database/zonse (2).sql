-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2019 at 05:54 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zonse`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(10) NOT NULL,
  `news_id` int(10) NOT NULL,
  `author` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `uploaded` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `music_id` int(100) NOT NULL,
  `artist` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `art` text NOT NULL,
  `song` text NOT NULL,
  `downloads` int(100) NOT NULL DEFAULT '0',
  `streams` int(100) NOT NULL DEFAULT '0',
  `count` int(100) NOT NULL DEFAULT '0',
  `uploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`music_id`, `artist`, `title`, `art`, `song`, `downloads`, `streams`, `count`, `uploaded`) VALUES
(1, 'George Kalukusha ft Classick', 'Buzzing', 'Buzzing.jpg', 'Buzzing.mp3', 0, 1, 1, '2019-03-04 07:37:41'),
(2, 'Tuno & Bucci', 'Chikondi Chako', 'Chikondi Chako.jpg', 'Chikondi Chako.mp3', 0, 0, 0, '2019-03-03 10:50:42'),
(3, 'KIM of Diamonds', 'Heart Go', 'Heart Go.jpg', 'Heart Go.mp3', 0, 0, 0, '2019-03-03 10:51:25'),
(4, 'Mastol', 'Hustle Yanga', 'Hustle Yanga.jpg', 'Hustle Yanga.mp3', 0, 0, 0, '2019-03-03 10:52:12'),
(5, 'KGB, Kim, Suffix, Cozizwa', 'Inu Ndi Ife', 'Inu Ndi Ife.jpg', 'Inu Ndi Ife.mp3', 0, 0, 0, '2019-03-03 10:52:40'),
(6, 'Phyzix ft. Marcus, Vube and Famous', 'Iweyo', 'Iweyo.jpg', 'Iweyo.mp3', 0, 0, 0, '2019-03-03 10:54:45'),
(7, 'David Kalilani ft Miracle & DPT', 'Kwathu', 'Kwathu.jpg', 'Kwathu.mp3', 0, 0, 0, '2019-03-03 10:55:10'),
(8, 'E-Ril ft Meria & Grisver', 'Lost Again', 'Lost Again.jpg', 'Lost Again.mp3', 0, 0, 0, '2019-03-03 10:56:39'),
(9, 'Phyzix', 'Mutipatsa', 'Mutipatsa.jpg', 'Mutipatsa.mp3', 0, 0, 0, '2019-03-03 10:57:30'),
(10, 'Mbumba', 'Ngati Ine', 'Ngati Ine.jpg', 'Ngati Ine.mp3', 0, 0, 0, '2019-03-03 10:57:59'),
(11, 'Fredokiss ft Malinga Mafia & AK', 'Ntchana', 'Ntchana.jpg', 'Ntchana.mp3', 0, 0, 0, '2019-03-03 10:58:19'),
(12, 'Mista Gray', 'Paminga', 'Paminga.jpg', 'Paminga.mp3', 0, 0, 0, '2019-03-03 10:58:49'),
(13, 'Khetwayo', 'Relate', 'Relate.jpeg', 'Relate.mp3', 0, 0, 0, '2019-03-03 10:59:14'),
(14, 'KIM of Diamonds', 'Something New', 'Something New.JPG', 'Something New.mp3', 0, 0, 0, '2019-03-03 10:59:43'),
(15, 'Sufix ft Kelvin Sings, Liwu, KBG & ProGain', 'Tayaka', 'Tayaka.jpg', 'Tayaka.mp3', 0, 0, 0, '2019-03-03 11:00:08'),
(16, 'Its Friday ft KIM of Diamonds', 'That way', 'That way.jpg', 'That way.mp3', 0, 0, 0, '2019-03-03 11:00:28'),
(17, 'Paris Oaks, Hayze Engola', 'Too Much To Lose', 'Too Much To Lose.jpg', 'Too Much To Lose.mp3', 0, 0, 0, '2019-03-03 11:00:54'),
(18, 'Beracah', 'Uziiwale', 'Uziiwale.jpg', 'Uziiwale.mp3', 0, 0, 0, '2019-03-03 11:01:18'),
(19, 'Teddy & Purple C', 'WOW', 'WOW.jpg', 'WOW.mp3', 0, 0, 0, '2019-03-03 11:01:36'),
(20, 'Zathu Band', 'Chete Chete', 'Chete Chete.jpg', 'Chete Chete.mp3', 0, 2, 2, '2019-03-04 10:43:20');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(10) NOT NULL,
  `author` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `news` longtext NOT NULL,
  `uploaded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ico` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `author`, `title`, `news`, `uploaded`, `ico`, `img`) VALUES
(1, 'Dali Mizaya', 'JOY NATHU BAGS AIRTEL DEAL FOR MADE ON MONDAY', '<p>Radio personality and Dj, Joy Nathu announced on his official twitter account that his program, â€˜Made on Mondayâ€™ is now sponsored by Airtel.</p><p>According to the Dj, it has been a goal for the program to find a sponsor. â€œAfter 2 and a half years of Made On Monday, I can now rejoice as one of the biggest targets has been reachedâ€, read one of Joyâ€™s tweets</p><p>Mobile Networks in Malawi have a history of helping the arts. Access Communications once had singer Maskal as its brand ambassador, and TNM sponsored the just ended Lake of Stars Festival. In this particular case, it was announced that Airtel will sponsor the segments on the show for 6 months.</p><p>You can catch Made on Monday, every Monday at 9PM, on MBC Radio 2fm.</p>', '2019-03-03 11:31:39', 'JOY NATHU BAGS AIRTEL DEAL FOR MADE ON MONDAY.jpg', 'JOY NATHU BAGS AIRTEL DEAL FOR MADE ON MONDAY.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE `shows` (
  `s_id` int(100) NOT NULL,
  `s_title` varchar(50) NOT NULL,
  `s_img` text NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `sub_id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `artist` varchar(100) NOT NULL,
  `art` tinytext NOT NULL,
  `song` tinytext NOT NULL,
  `reviewed` int(1) NOT NULL DEFAULT '0',
  `posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `top20`
--

CREATE TABLE `top20` (
  `tid` int(2) NOT NULL,
  `music_id` int(100) DEFAULT NULL,
  `position` int(2) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `top20`
--

INSERT INTO `top20` (`tid`, `music_id`, `position`, `updated`) VALUES
(1, 20, 1, '2019-03-07 04:19:45'),
(2, 1, 2, '2019-03-07 04:19:45'),
(3, 2, 3, '2019-03-07 04:19:45'),
(4, 3, 4, '2019-03-07 04:19:46'),
(5, 4, 5, '2019-03-07 04:19:46'),
(6, 5, 6, '2019-03-07 04:19:46'),
(7, 6, 7, '2019-03-07 04:19:46'),
(8, 7, 8, '2019-03-07 04:19:46'),
(9, 8, 9, '2019-03-07 04:19:46'),
(10, 9, 10, '2019-03-07 04:19:46'),
(11, 10, 11, '2019-03-07 04:19:46'),
(12, 11, 12, '2019-03-07 04:19:46'),
(13, 12, 13, '2019-03-07 04:19:46'),
(14, 13, 14, '2019-03-07 04:19:46'),
(15, 14, 15, '2019-03-07 04:19:47'),
(16, 15, 16, '2019-03-07 04:19:47'),
(17, 16, 17, '2019-03-07 04:19:47'),
(18, 17, 18, '2019-03-07 04:19:47'),
(19, 18, 19, '2019-03-07 04:19:47'),
(20, 19, 20, '2019-03-07 04:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(2) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `img` text NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `userName`, `email`, `password`, `img`, `added`) VALUES
(1, 'Admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin!(f.jpg', '2019-03-03 09:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `v_id` int(100) NOT NULL,
  `s_id` int(10) NOT NULL,
  `v_file` text NOT NULL,
  `v_title` varchar(100) NOT NULL,
  `snapshot` text NOT NULL,
  `uploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `youtube`
--

CREATE TABLE `youtube` (
  `y_id` int(100) NOT NULL,
  `link` text NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `youtube`
--

INSERT INTO `youtube` (`y_id`, `link`, `added`) VALUES
(1, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Uvc37wy_sNg\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2019-03-01 06:32:07'),
(2, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/W552ev9qEOM\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2019-03-01 06:32:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`music_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `top20`
--
ALTER TABLE `top20`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `music_id` (`music_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`v_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `youtube`
--
ALTER TABLE `youtube`
  ADD PRIMARY KEY (`y_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `music_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shows`
--
ALTER TABLE `shows`
  MODIFY `s_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `sub_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `top20`
--
ALTER TABLE `top20`
  MODIFY `tid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `v_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `youtube`
--
ALTER TABLE `youtube`
  MODIFY `y_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `top20`
--
ALTER TABLE `top20`
  ADD CONSTRAINT `top20_ibfk_1` FOREIGN KEY (`music_id`) REFERENCES `music` (`music_id`);

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `shows` (`s_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
