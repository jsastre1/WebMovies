-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2024 at 04:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peliculas`
--

-- --------------------------------------------------------

--
-- Table structure for table `peliculas`
--

CREATE TABLE `peliculas` (
  `Title` varchar(255) NOT NULL,
  `Year` varchar(10) DEFAULT NULL,
  `Rated` varchar(10) DEFAULT NULL,
  `Released` date DEFAULT NULL,
  `Runtime` varchar(50) DEFAULT NULL,
  `Genre` varchar(255) DEFAULT NULL,
  `Director` varchar(255) DEFAULT NULL,
  `Writer` varchar(255) DEFAULT NULL,
  `Actors` text DEFAULT NULL,
  `Plot` text DEFAULT NULL,
  `Language` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `Awards` varchar(255) DEFAULT NULL,
  `imdbRating` float DEFAULT NULL,
  `imdbVotes` varchar(50) DEFAULT NULL,
  `imdbID` varchar(50) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `DVD` date DEFAULT NULL,
  `BoxOffice` varchar(50) DEFAULT NULL,
  `Production` varchar(255) DEFAULT NULL,
  `Website` varchar(255) DEFAULT NULL,
  `Poster` varchar(255) DEFAULT NULL,
  `Ratings` varchar(50) DEFAULT NULL,
  `Metascore` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `peliculas`
--

INSERT INTO `peliculas` (`Title`, `Year`, `Rated`, `Released`, `Runtime`, `Genre`, `Director`, `Writer`, `Actors`, `Plot`, `Language`, `Country`, `Awards`, `imdbRating`, `imdbVotes`, `imdbID`, `Type`, `DVD`, `BoxOffice`, `Production`, `Website`, `Poster`, `Ratings`, `Metascore`) VALUES
('Despicable Me 4', '2024', 'GP', '0000-00-00', '94min', 'animation commedy', 'Chris Renaud', 'Ken Daurio y Mike White', 'Will Ferrell,Sofia Vergara', 'Gru, Lucy, Margo, Edith, and Agnes welcome a new member to the family, Gru Jr., who is intent on tormenting his dad. Gru faces a new nemesis in Maxime Le Mal and his girlfriend Valentina, and the family is forced to go on the run.', 'English', 'USA', 'Globe award', 2, '2,4', '24', 'movie', '0000-00-00', '900,000,000', 'Christopher Meledandri', 'N/A', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQqqX8YyyJOVK40or3ZwgE1CG8hztfTZvhBD__vevWNMiHyzfH1', '3,4', '3,3'),
('Harry Potter and the Deathly Hallows: Part 2', '2011', 'PG-13', '0000-00-00', '130 min', 'Adventure, Family, Fantasy', 'David Yates', 'Steve Kloves, J.K. Rowling', 'Daniel Radcliffe, Emma Watson, Rupert Grint', 'As the battle between the forces of good and evil in the wizarding world escalates, Harry Potter draws ever closer to his final confrontation with Voldemort.', 'English, Latin', 'United Kingdom, United States', 'Nominated for 3 Oscars. 49 wins & 95 nominations total', 8.1, '973,491', 'tt1201607', 'movie', '0000-00-00', '$381,447,587', 'N/A', 'N/A', 'https://m.media-amazon.com/images/M/MV5BOTA1Mzc2N2ItZWRiNS00MjQzLTlmZDQtMjU0NmY1YWRkMGQ4XkEyXkFqcGc@._V1_SX300.jpg', NULL, NULL),
('Harry Potter and the Sorcerer\'s Stone', '2001', 'PG', '0000-00-00', '152 min', 'Adventure, Family, Fantasy', 'Chris Columbus', 'J.K. Rowling, Steve Kloves', 'Daniel Radcliffe, Rupert Grint, Emma Watson', 'An orphaned boy enrolls in a school of wizardry, where he learns the truth about himself, his family and the terrible evil that haunts the magical world.', 'English, Latin', 'United Kingdom, United States', 'Nominated for 3 Oscars. 20 wins & 74 nominations total', 7.6, '879,929', 'tt0241527', 'movie', '0000-00-00', '$318,886,962', 'N/A', 'N/A', 'https://m.media-amazon.com/images/M/MV5BNTU1MzgyMDMtMzBlZS00YzczLThmYWEtMjU3YmFlOWEyMjE1XkEyXkFqcGc@._V1_SX300.jpg', NULL, NULL),
('Harry Potter and the Prisoner of Azkaban', '2004', 'PG', '0000-00-00', '142 min', 'Adventure, Family, Fantasy', 'Alfonso Cuarón', 'J.K. Rowling, Steve Kloves', 'Daniel Radcliffe, Emma Watson, Rupert Grint', 'Harry Potter, Ron and Hermione return to Hogwarts School of Witchcraft and Wizardry for their third year of study, where they delve into the mystery surrounding an escaped prisoner who poses a dangerous threat to the young wizard.', 'English, Latin, Old English', 'United Kingdom, United States', 'Nominated for 2 Oscars. 17 wins & 56 nominations total', 7.9, '711,495', 'tt0304141', 'movie', '0000-00-00', '$250,105,651', 'N/A', 'N/A', 'https://m.media-amazon.com/images/M/MV5BMTY4NTIwODg0N15BMl5BanBnXkFtZTcwOTc0MjEzMw@@._V1_SX300.jpg', NULL, NULL),
('Harry Potter and the Chamber of Secrets', '2002', 'PG', '0000-00-00', '161 min', 'Adventure, Family, Fantasy', 'Chris Columbus', 'J.K. Rowling, Steve Kloves', 'Daniel Radcliffe, Rupert Grint, Emma Watson', 'Harry Potter lives his second year at Hogwarts with Ron and Hermione when a message on the wall announces that the legendary Chamber of Secrets has been opened. The trio soon realize that, to save the school, it will take a lot of...', 'English, Latin', 'United Kingdom, United States', 'Won 1 BAFTA Award14 wins & 50 nominations total', 7.4, '710,435', 'tt0295297', 'movie', '0000-00-00', '$262,641,637', 'N/A', 'N/A', 'https://m.media-amazon.com/images/M/MV5BNGJhM2M2MWYtZjIzMC00MDZmLThkY2EtOWViMDhhYjRhMzk4XkEyXkFqcGc@._V1_SX300.jpg', NULL, NULL),
('Harry Potter and the Goblet of Fire', '2005', 'PG-13', '0000-00-00', '157 min', 'Adventure, Family, Fantasy', 'Mike Newell', 'Steve Kloves, J.K. Rowling', 'Daniel Radcliffe, Emma Watson, Rupert Grint', 'Harry Potter finds himself competing in a hazardous tournament between rival schools of magic, but he is distracted by recurring nightmares.', 'English, French, Latin', 'United Kingdom, United States', 'Nominated for 1 Oscar. 13 wins & 48 nominations total', 7.7, '699,982', 'tt0330373', 'movie', '0000-00-00', '$290,469,928', 'N/A', 'N/A', 'https://m.media-amazon.com/images/M/MV5BMTI1NDMyMjExOF5BMl5BanBnXkFtZTcwOTc4MjQzMQ@@._V1_SX300.jpg', NULL, NULL),
('Harry Potter and the Order of the Phoenix', '2007', 'PG-13', '0000-00-00', '138 min', 'Action, Adventure, Family', 'David Yates', 'Michael Goldenberg, J.K. Rowling', 'Daniel Radcliffe, Emma Watson, Rupert Grint', 'With their warning about Lord Voldemort\'s return scoffed at, Harry and Dumbledore are targeted by the Wizard authorities as an authoritarian bureaucrat slowly seizes power at Hogwarts.', 'English, Latin', 'United Kingdom, United States', 'Nominated for 2 BAFTA 17 wins & 50 nominations total', 7.5, '650,427', 'tt0373889', 'movie', '0000-00-00', '$292,382,727', 'N/A', 'N/A', 'https://m.media-amazon.com/images/M/MV5BYWJmM2M1YzItMjY1Ni00YzRmLTg5YWYtNDFmNTJjNzQ0ODkyXkEyXkFqcGc@._V1_SX300.jpg', NULL, NULL),
('Harry Potter and the Deathly Hallows: Part 1', '2010', 'PG-13', '0000-00-00', '146 min', 'Adventure, Family, Fantasy', 'David Yates', 'Steve Kloves, J.K. Rowling', 'Daniel Radcliffe, Emma Watson, Rupert Grint', 'As Harry, Ron and Hermione race against time and evil to destroy the Horcruxes, they uncover the existence of the three most powerful objects in the wizarding world: the Deathly Hallows.', 'English, Latin', 'United Kingdom, United States', 'Nominated for 2 Oscars. 15 wins & 55 nominations total', 7.7, '614,111', 'tt0926084', 'movie', '0000-00-00', '$296,374,621', 'N/A', 'N/A', 'https://m.media-amazon.com/images/M/MV5BMTQ2OTE1Mjk0N15BMl5BanBnXkFtZTcwODE3MDAwNA@@._V1_SX300.jpg', NULL, NULL),
('Harry Potter and the Half-Blood Prince', '2009', 'PG', '0000-00-00', '153 min', 'Action, Adventure, Family', 'David Yates', 'Steve Kloves, J.K. Rowling', 'Daniel Radcliffe, Emma Watson, Rupert Grint', 'As Harry Potter begins his sixth year at Hogwarts, he discovers an old book marked as \"the property of the Half-Blood Prince\" and begins to learn more about Lord Voldemort\'s dark past.', 'English, Latin', 'United Kingdom, United States', 'Nominated for 1 Oscar. 9 wins & 39 nominations total', 7.6, '612,330', 'tt0417741', 'movie', '0000-00-00', '$302,334,374', 'N/A', 'N/A', 'https://m.media-amazon.com/images/M/MV5BNzU3NDg4NTAyNV5BMl5BanBnXkFtZTcwOTg2ODg1Mg@@._V1_SX300.jpg', NULL, NULL),
('When Harry Met Sally...', '1989', 'R', '0000-00-00', '95 min', 'Comedy, Drama, Romance', 'Rob Reiner', 'Nora Ephron', 'Billy Crystal, Meg Ryan, Carrie Fisher', 'Harry and Sally have known each other for years, and are very good friends, but they fear sex would ruin the friendship.', 'English', 'United States', 'Nominated for 1 Oscar. 6 wins & 19 nominations total', 7.7, '249,275', 'tt0098635', 'movie', '0000-00-00', '$93,117,425', 'N/A', 'N/A', 'https://m.media-amazon.com/images/M/MV5BMjE0ODEwNjM2NF5BMl5BanBnXkFtZTcwMjU2Mzg3NA@@._V1_SX300.jpg', NULL, NULL),
('Dirty Harry', '1971', 'R', '0000-00-00', '102 min', 'Action, Crime, Thriller', 'Don Siegel, Clint Eastwood', 'Harry Julian Fink, Rita M. Fink, Dean Riesner', 'Clint Eastwood, Andrew Robinson, Harry Guardino', 'When a man calling himself \"the Scorpio Killer\" menaces San Francisco, tough-as-nails Police Inspector \"Dirty\" Harry Callahan is assigned to track down the crazed psychopath.', 'English', 'United States', '2 wins & 4 nominations', 7.7, '172,099', 'tt0066999', 'movie', '0000-00-00', '$35,988,495', 'N/A', 'N/A', 'https://m.media-amazon.com/images/M/MV5BYzNmOWVjN2ItMTQzOS00MTI4LTgxZDItMmZjNTVlMjY5Mjc1XkEyXkFqcGc@._V1_SX300.jpg', NULL, NULL),
('The Three Musketeers', '2023', 'GP', '0000-00-00', '120min', 'Adventure/Action', 'Martin Bourboulon', 'Alexandre Dumas', 'Eva Green,Vincent Cassel', 'A historical romance, it relates the adventures of four fictional swashbuckling heroes who lived under the French kings Louis XIII and Louis XIV, who reigned during the 17th and early 18th centuries. At the beginning of the story, D’Artagnan arrives in Paris from Gascony and becomes embroiled in three duels with the three musketeers Athos, Porthos, and Aramis. The four become such close friends that when D’Artagnan serves an apprenticeship as a cadet, which he must do before he can become a musketeer, each of his friends takes turns sharing guard duty with him. The daring escapades of the four comrades are played out against a background of court intrigue involving the powerful cardinal Richelieu.', 'English', 'USA', 'Globe award', 4, '6', '5', 'movie', '0000-00-00', ' 10 100 000', 'Dimitri Rassam', 'N/A', 'https://upload.wikimedia.org/wikipedia/en/e/e7/The_Three_Musketeers_-_Milady_%282023%29_film_poster.jpg', '4,5', '6,3'),
('Prueba 1', 'Prueba 1', 'Prueba 1', '2024-12-04', 'Prueba 1', 'Prueba 1', 'Prueba 1', 'Prueba 1', 'Prueba 1', 'Prueba 1', 'Prueba 1', 'Prueba 1', 'Prueba 1', 1, 'Prueba 1', '1', 'Prueba 1', '2024-12-04', 'Prueba 1', 'Prueba 1', 'Prueba 1', 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcRukWXgEmlPYwIS69tuTkCO4TJ2qQGnIkT-5y09MJy2eX1aVc7P', 'Prueba 1', 'Prueba 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `peliculas`
--
ALTER TABLE `peliculas`
  ADD UNIQUE KEY `imdbID` (`imdbID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
