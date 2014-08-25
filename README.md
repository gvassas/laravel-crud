laravel-crud
============
Very barebones CRUD functionalities

SQL:


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mydatabase`
--
CREATE DATABASE IF NOT EXISTS `mydatabase` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mydatabase`;

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `bio` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `name`, `bio`, `created_at`, `updated_at`) VALUES
(1, 'Bobby Sue', 'Bobby is from the prairies', '2014-02-26 02:21:14', '2014-02-26 02:21:14'),
(2, 'Elmer Jones', 'Elmer lives in Ohio', '2014-02-26 02:21:14', '2014-02-26 02:21:14'),
(3, 'Billy Mack', 'Billy lives down in Texas', '2014-02-26 02:21:14', '2014-02-26 02:21:14'),
(4, 'Frieda Hygaard', 'Frieda specializes in food', '2014-02-26 02:21:14', '2014-02-26 02:21:14');

-- --------------------------------------------------------

--
-- Table structure for table `authorpublisher`
--

CREATE TABLE IF NOT EXISTS `authorpublisher` (
  `authorID` int(11) NOT NULL DEFAULT '0',
  `publisherName` varchar(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`authorID`,`publisherName`),
  KEY `publisherName` (`publisherName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authorpublisher`
--

INSERT INTO `authorpublisher` (`authorID`, `publisherName`) VALUES
(1, 'McGraw-Hill'),
(2, 'Sams');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE IF NOT EXISTS `publisher` (
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`name`) VALUES
('McGraw-Hill'),
('No Starch Press'),
('Prentice-Hall'),
('Sams');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authorpublisher`
--
ALTER TABLE `authorpublisher`
  ADD CONSTRAINT `authorpublisher_ibfk_1` FOREIGN KEY (`authorID`) REFERENCES `author` (`id`),
  ADD CONSTRAINT `authorpublisher_ibfk_2` FOREIGN KEY (`publisherName`) REFERENCES `publisher` (`name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
