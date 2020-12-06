-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2020 at 03:38 PM
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
        user_id INT,
        create_ts TIMESTAMP NULL,
        update_ts TIMESTAMP NULL,
        title TEXT NULL,
        content TEXT NULL,
        status TEXT NULL
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `admRemoveNote` (IN `p_user_id` INT(11), IN `p_id` INT)  BEGIN
	DELETE FROM adm_notes WHERE user_id = p_user_id AND id = p_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `admSaveNote` (IN `p_user_id` INT(11), IN `p_title` TEXT, IN `p_content` TEXT)  BEGIN
	INSERT INTO adm_notes (user_id, create_ts, update_ts, title, content, status) VALUES (p_user_id, CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP(), p_title, p_content, 'PENDING');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `admSelectAllNotes` (IN `p_user_id` INT, IN `p_sort_by` TEXT, IN `p_sort_type` TEXT)  BEGIN
	IF p_sort_type = 'ASC' THEN CALL admSelectAllNotesAsc(p_user_id, p_sort_by);
    ELSE CALL admSelectAllNotesDesc(p_user_id, p_sort_by);
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `admSelectAllNotesAsc` (IN `p_user_id` INT, IN `p_sort_by` TEXT)  BEGIN
	SELECT * FROM adm_notes ORDER BY (CASE p_sort_by WHEN 'NAME' THEN title WHEN 'DATE' THEN create_ts ELSE status END) ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `admSelectAllNotesDesc` (IN `p_user_id` INT, IN `p_sort_by` TEXT)  BEGIN
	SELECT * FROM adm_notes ORDER BY (CASE p_sort_by WHEN 'NAME' THEN title WHEN 'DATE' THEN create_ts ELSE status END) DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `admTruncateNotes` (IN `p_user_id` INT(11))  BEGIN
	DELETE FROM adm_notes WHERE user_id = p_user_id;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
