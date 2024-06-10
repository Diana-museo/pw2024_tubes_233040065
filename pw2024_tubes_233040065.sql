-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2024 at 01:38 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pw2024_tubes_233040065`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `genre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `genre`) VALUES
(1, 'Horror/Science-Fiction'),
(2, 'Thriller/Mystery '),
(3, 'Action/Science-fiction'),
(4, 'Horror/Crime'),
(5, 'Action/Adventure'),
(6, 'Thriller/Crime'),
(7, 'Horror/Mystery'),
(8, 'War/Drama'),
(9, 'Romance/Drama');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int NOT NULL,
  `poster` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `actor` varchar(255) NOT NULL,
  `synopsis` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `poster`, `title`, `genre`, `actor`, `synopsis`, `link`, `category_id`) VALUES
(1, 'A Quiet Place.jpg', 'A Quiet Place', 'Horror/Science-fiction', 'Cillian Murphy, John Krasinski, Emily Blunt, Millicent Simmonds, Noah Jupe', 'A family lives in a world inhabited by blind  but sound sensitive creatures who are out to kill people. In order to survive, they are forced to use the sign language to communicate with each other.', 'https://youtu.be/WR7cc5t7tv8?si=iZJMxmm-tdVu2fsF', 1),
(2, 'Badla.jpg', 'Badla', 'Thriller/Mystery', 'Taapsee Pannu, Tony Luke, Amitabh Bachchan, Tanveer Ghani, Amrita Singh', 'Naina, a successful entrepreneur and married woman, gets caught in a web of accusations when her love is found dead. She then hires a reputable lawyer to work with her on the case and find answers.', 'https://youtu.be/mSlgu8AQAd4?si=AIHhgO_QkrVZ-28N', 2),
(5, 'Divergent.jpg', 'Divergent', 'Action/Science-fiction', 'Shailene Woodley, Theo James, Ansel Elgort, Kate Winslet, Jai Courtney', 'In a futuristic world, people are divided into factions. When Beatrice Prior realises that she does not fit into any of the factions, she must hide her identity to escape the wrath of powerful forces.', 'https://youtu.be/Aw7Eln_xuWc?si=9whgTq-UXKvlxl1Z', 3),
(22, 'Dont Breathe.jpg', 'Don&#039;t Breathe', 'Horror/Crime', 'Stephen Lang, Jane Levy, Dylan Minnette, Daniel Zovatto, Christian Zagia', 'Three delinquents break into the house of Norman, a Gulf War veteran who is blind, to steal his money. However, much to their horror, they discover that Norman is not a defenceless as he seems.', 'https://youtu.be/76yBTNDB6vU?si=incD0vqgSfZJJFMP', 4),
(23, 'Hunger Games.jpg', 'Hunger Games', 'Action/Adventure', 'Jennifer Lawrence, Josh Hutcherson, Liam Hemsworth, Woody Harrelson, Zoë Kravitz', 'Katniss volunteers to replace her sister in a tournament that ends only when one participant remains. Pitted against contestants who have trained for this all their life, she has little to rely on.', 'https://youtu.be/mfmrPu43DF8?si=mniZwLG38YQPYEgi', 5),
(24, 'Knives Out.jpg', 'Knives Out', 'Thriller/Mystery', 'Ana de Armas, Daniel Craig, Chris Evans, Christopher Plummer, Katherine Langford', 'Harlan Thrombey, a reputable crime novelist, is found dead after his 85th birthday celebrations. However, as detective Benoit Blanc investigates the case, it unravels a ploy of sinister intentions.', 'https://youtu.be/qGqiHJTsRkQ?si=vd2fTVA--P2pebBH', 2),
(26, 'Now You See Me.jpg', 'Now You See Me', 'Thriller/Crime', 'Jesse Eisenberg, Mark Ruffalo, Woody Harrelson, Morgan Freeman, Isla Fisher', 'The Horsemen, a group of four street magicians, are chased by FBI agent Dylan Rhodes and Interpol agent Alma Dray after they rob a huge sum of money that belongs to insurance magnate Arthur Tressler.', 'https://youtu.be/u_diRgwPCS8?si=3WW0_VrXAHIJNB0d', 6),
(27, 'Shutter Island.jpg', 'Shutter Island', 'Thriller/Mystery', 'Leonardo DiCaprio, Mark Ruffalo, Ben Kingsley, Michelle Williams, Emily Mortimer', 'Teddy Daniels and Chuck Aule, two US marshals, are sent to an asylum on a remote island in order to investigate the disappearance of a patient, where Teddy uncovers a shocking truth about the place.', 'https://youtu.be/v8yrZSkKxTA?si=1p5VWmjb61ee-ngL', 2),
(28, 'The Call.jpg', 'The Call', 'Horror/Mystery', 'Park Shin-hye, Jeon Jong-seo, Lee El, Kim Min-ha, Kim Sung-ryung', 'Connected by phone in the same home but 20 years apart, a serial killer puts another woman\'s past -- and life -- on the line to change her own fate.', 'https://youtu.be/hxkKeniT-0Q?si=pLuvXo-lC-7BYYjU', 7),
(30, 'The Boy.jpg', 'The Boy', 'Horror/Mystery', 'Lauren Cohan, James Russell, Jett Klyne, Rupert Evans, Ben Robson', 'Greta accepts the job of a nanny for a wealthy couple&#039;s child and is disturbed when she finds out the child is a doll. However, when she mishandles the doll, she is shocked to find that it is alive.', 'https://youtu.be/XGbB9UQ6r1g?si=Zs6kr4e-uTzvPf-Y', 7),
(31, 'Hacksaw Ridge.jpg', 'Hacksaw Ridge', 'War/Drama', 'Andrew Garfield, Luke Bracey, Vince Vaughn, Teresa Palmer, Sam Worthington', 'After Desmond Doss nearly kills his younger brother, he refuses to handle weapons or engage in war. However, post the Japanese attack on Pearl Harbour, he joins the American army as a combat medic.', 'https://youtu.be/s2-1hz1juBI?si=Tk6faFfqp_ZcHXYW', 8),
(32, 'The Maze Runner.png', 'The Maze Runner', 'Action/Science-Fiction', 'Thomas Brodie-Sangster, Dylan O&#039;Brien, Kaya Scodelario, Will Poulter, Ki Hong Lee', 'Thomas loses his memory and finds himself trapped in a massive maze called the Glade. He and his friends try to escape from the maze and eventually learn that they are subjects of an experiment.', 'https://youtu.be/AwwbhhjQ9Xk?si=OCJh-wUxzvn6jJfZ', 3),
(33, 'Tenggelamnya Kapal Van Der Wijck.jpg', 'Tenggelamnya Kapal Van Der Wijck', 'Romance/Drama', 'Herjunot Ali, Reza Rahadian, Pevita Pearce, Gesya Shandy, Randy Danistha', 'Berlatar tahun 1930-an, di kampung halaman ayahnya di Batipuh, Zainuddin bertemu Hayati, seorang gadis cantik jelita. Keduanya jatuh cinta, namun adat dan istiadat meruntuhkan cinta mereka.', 'https://youtu.be/k_nK2PQ1Q8Q?si=4wVRbEu63sA5B3UE', 9);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$wrcxzy59efdDu8YbkqUYf.VNty5RMJjb6SO3.UEB7rVL8jiucSWDW'),
(2, 'admin2', '$2y$10$joilfaiqcY1AkEy..npYnO2TWaDijnvD7w7Xh5.AKckulbHPeyS2a'),
(3, 'amel', '$2y$10$ioCLc/jvzUo469nOq9bkAeLFqKMjOk75j4Sa2cWUcLSmtxuJnUVau');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cathegory_id` (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
