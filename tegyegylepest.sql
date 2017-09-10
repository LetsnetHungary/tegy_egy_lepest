-- phpMyAdmin SQL Dump
-- version 4.4.15.8
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 10, 2017 at 06:36 PM
-- Server version: 5.6.31
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tegyegylepest`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `project_id` varchar(20) NOT NULL,
  `id` int(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `content` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `id`, `type`, `content`) VALUES
('bedbf342e920f73e5e7a', 1, 'title', 'First Project'),
('bedbf342e920f73e5e7a', 2, 'date', '2017 - 06 - 31'),
('bedbf342e920f73e5e7a', 3, 'editor', '<p><strong>Az elso projekt&uuml;nk</strong></p>\n\n<p><em>2017 - 06 - 30</em></p>\n\n<ul>\n	<li>500Ftos bel&eacute;p?</li>\n	<li>650 ember</li>\n</ul>\n\n<p>&nbsp;</p>\n'),
('dcbe563dfe94e103647d', 4, 'title', 'Secound Project'),
('dcbe563dfe94e103647d', 5, 'date', '2016 - 10 - 30'),
('dcbe563dfe94e103647d', 6, 'editor', '<p><strong>A m&aacute;sodik projekt&uuml;nk</strong></p>\r\n\r\n<p><em>2017 - 06 - 30</em></p>\r\n\r\n<ul>\r\n	<li>Ingyenes bel&eacute;p?</li>\r\n	<li>1310 ember</li>\r\n</ul>\r\n\r\n<p>Nagyon j&oacute; volt.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
('605c759afd4f2c362792', 7, 'title', 'Third Project'),
('605c759afd4f2c362792', 8, 'date', '2018 - 01 - 25'),
('605c759afd4f2c362792', 9, 'editor', '<p><strong>A harmadik projekt&uuml;nk</strong></p>\r\n\r\n<p><em>2018 - 01 - 25</em></p>\r\n\r\n<ul>\r\n	<li>2017-ben ingyenes 2018-ban 200Ft/f?</li>\r\n</ul>\r\n\r\n<p>Mindenkit sz&iacute;vesen v&aacute;runk</p>\r\n\r\n<p>&nbsp;</p>\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
