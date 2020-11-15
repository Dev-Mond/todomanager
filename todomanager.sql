-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2020 at 02:32 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todomanager`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `admAddUser` (IN `p_username` TEXT, IN `p_password` TEXT, IN `p_email` TEXT)  BEGIN

	INSERT INTO adm_account (create_ts, update_ts, username, password, email, status) VALUES (CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP(), p_username, p_password, p_email, 1);
	
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `admCreateTableAccount` ()  BEGIN
	DROP TABLE IF EXISTS adm_account;
    CREATE TABLE adm_account 
    (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        create_ts TIMESTAMP NULL,
        update_ts TIMESTAMP NULL,
		username TEXT NULL,
		password TEXT NULL,
        email TEXT NULL,
        activated TINYINT DEFAULT 0,
        status TINYINT DEFAULT 1
    );
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `admGetAllUsers` ()  BEGIN

	SELECT * FROM adm_account;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `admGetUserByEmail` (IN `p_email` TEXT)  BEGIN

	SELECT * FROM adm_account WHERE email=p_email;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `admGetUserByUsername` (IN `p_username` TEXT)  BEGIN
	
    SELECT * FROM adm_account WHERE username=p_username;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `admUpdateUserById` (IN `p_id` INT, IN `p_username` TEXT, IN `p_password` TEXT, IN `p_email` TEXT)  BEGIN

	UPDATE adm_account SET username=p_username, password=p_password, email=p_email where id=p_id;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `adm_account`
--

CREATE TABLE `adm_account` (
  `id` int(11) NOT NULL,
  `create_ts` timestamp NULL DEFAULT NULL,
  `update_ts` timestamp NULL DEFAULT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `activated` tinyint(4) DEFAULT 0,
  `status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adm_account`
--

INSERT INTO `adm_account` (`id`, `create_ts`, `update_ts`, `username`, `password`, `email`, `activated`, `status`) VALUES
(1, '2020-11-14 16:08:36', '2020-11-14 16:08:36', 'rheymondangue3@gmail.com', 'ceb70726471f45e58e7723d1a047c8fb13fb5f94cee073a9820fa77bfb174c9b84969f35e97d4bbede927de2cef4671ab67ee32fcd0a057a9633d15c8ee9f30bOs1XKZwHtJgD9NlaHvIPhiSPJODmpAmGgJPOQv/G6PsIDjowIIUC7umeCT6hFpc3', 'rheymondangue3@gmail.com', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm_account`
--
ALTER TABLE `adm_account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adm_account`
--
ALTER TABLE `adm_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
