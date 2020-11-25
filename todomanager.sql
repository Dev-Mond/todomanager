-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2020 at 03:01 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `admCreateTable` ()  BEGIN
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
    
    DROP TABLE IF EXISTS adm_notes;
    CREATE TABLE adm_notes 
    (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        user_id INT(11) NULL,
        create_ts TIMESTAMP NULL,
        update_ts TIMESTAMP NULL,
		title TEXT NULL,
        content TEXT NULL,
		note_status TEXT NULL
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
(1, '2020-11-25 13:35:09', '2020-11-25 13:35:09', 'Mond Angue', 'a6ae6ce777b5083ae25271ede31c6c4d128a06ed9b16675ffd9b4a678510a49fcd62c42849e64fef7ca697abcf597cde4a3b846568644373e23e8ad7ccc29f0eU9jGkBm6HaeJ1e8J5SMqTA0kH2cTR0mI3lNEl8VxhbQ=', 'rheymondangue3@gmail.com', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `adm_notes`
--

CREATE TABLE `adm_notes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_ts` timestamp NULL DEFAULT NULL,
  `update_ts` timestamp NULL DEFAULT NULL,
  `title` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `note_status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm_account`
--
ALTER TABLE `adm_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adm_notes`
--
ALTER TABLE `adm_notes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adm_account`
--
ALTER TABLE `adm_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adm_notes`
--
ALTER TABLE `adm_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
