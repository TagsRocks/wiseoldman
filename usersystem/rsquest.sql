-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 04 jul 2015 om 23:43
-- Serverversie: 5.6.24
-- PHP-versie: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rsquest`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `announcements`
--

CREATE TABLE IF NOT EXISTS `announcements` (
  `announcement_id` bigint(20) NOT NULL,
  `announcement_date` date NOT NULL,
  `announcement_title` varchar(200) NOT NULL,
  `announcement_detail` varchar(1000) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `announcement_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` bigint(20) NOT NULL,
  `message_datetime` datetime NOT NULL,
  `message_detail` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `message_meta`
--

CREATE TABLE IF NOT EXISTS `message_meta` (
  `msg_meta_id` bigint(20) NOT NULL,
  `message_id` bigint(20) NOT NULL,
  `status` varchar(100) NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `subject_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `note_id` bigint(20) NOT NULL,
  `note_date` date NOT NULL,
  `note_title` varchar(200) NOT NULL,
  `note_detail` varchar(600) NOT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `option_id` bigint(20) NOT NULL,
  `option_name` varchar(500) NOT NULL,
  `option_value` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `options`
--

INSERT INTO `options` (`option_id`, `option_name`, `option_value`) VALUES
(1, 'site_url', 'http://localhost/'),
(2, 'site_name', 'OSRS Quest Manager'),
(3, 'email_from', 'ghermans41@aol.com'),
(4, 'email_to', 'ghermans41@aol.com'),
(5, 'installation', 'Yes'),
(6, 'skin', 'default'),
(8, 'language', 'english'),
(9, 'version', '2.1'),
(10, 'redirect_on_logout', 'index.php'),
(11, 'register_user_level', 'subscriber'),
(12, 'session_timeout', '180'),
(13, 'maximum_login_attempts', '10'),
(14, 'wrong_attempts_time', '10');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `subject_id` bigint(20) NOT NULL,
  `subject_title` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` bigint(20) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address1` varchar(200) NOT NULL,
  `address2` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `zip_code` varchar(100) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `profile_image` varchar(500) NOT NULL,
  `description` varchar(600) NOT NULL,
  `status` varchar(100) NOT NULL,
  `activation_key` varchar(100) NOT NULL,
  `date_register` date NOT NULL,
  `user_type` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `gender`, `date_of_birth`, `address1`, `address2`, `city`, `state`, `country`, `zip_code`, `mobile`, `phone`, `username`, `email`, `password`, `profile_image`, `description`, `status`, `activation_key`, `date_register`, `user_type`) VALUES
(1, 'Glenn', 'Hermans', '', '0000-00-00', '', '', '', '', '', '', '', '', 'Choobi', 'ghermans41@aol.com', 'e555fdfacffb3eca7c0f8988e1cc3934', '', '', 'activate', '', '2015-07-04', 'admin'),
(2, 'Test', 'test', 'Select Gender', '0000-00-00', '', '', '', '', '', '', '', '', 'test', 'test@test.com', 'ee53d4213c897ad632bb8d824762f918', '', '', 'activate', '', '2015-07-04', 'subscriber'),
(3, 'Jack', 'Hardcastle', 'Select Gender', '0000-00-00', '', '', '', '', '', '', '', '', 'jack', 'jack@jack.com', '202cb962ac59075b964b07152d234b70', '', '', 'activate', '', '2015-07-04', 'admin');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user_level`
--

CREATE TABLE IF NOT EXISTS `user_level` (
  `level_id` bigint(20) NOT NULL,
  `level_name` varchar(200) NOT NULL,
  `level_description` varchar(600) NOT NULL,
  `level_page` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `user_level`
--

INSERT INTO `user_level` (`level_id`, `level_name`, `level_description`, `level_page`) VALUES
(1, 'subscriber', 'Default user level given access to subscriber.php', 'subscriber.php');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user_meta`
--

CREATE TABLE IF NOT EXISTS `user_meta` (
  `user_meta_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `message_email` varchar(50) NOT NULL,
  `last_login_time` datetime NOT NULL,
  `last_login_ip` varchar(120) NOT NULL,
  `login_attempt` bigint(20) NOT NULL,
  `login_lock` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `user_meta`
--

INSERT INTO `user_meta` (`user_meta_id`, `user_id`, `message_email`, `last_login_time`, `last_login_ip`, `login_attempt`, `login_lock`) VALUES
(1, 1, '', '2015-07-04 23:38:53', '::1', 0, 'No'),
(2, 2, '', '2015-07-04 23:32:56', '::1', 0, 'No');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexen voor tabel `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexen voor tabel `message_meta`
--
ALTER TABLE `message_meta`
  ADD PRIMARY KEY (`msg_meta_id`);

--
-- Indexen voor tabel `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexen voor tabel `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexen voor tabel `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexen voor tabel `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexen voor tabel `user_meta`
--
ALTER TABLE `user_meta`
  ADD PRIMARY KEY (`user_meta_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcement_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `message_meta`
--
ALTER TABLE `message_meta`
  MODIFY `msg_meta_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `notes`
--
ALTER TABLE `notes`
  MODIFY `note_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `options`
--
ALTER TABLE `options`
  MODIFY `option_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT voor een tabel `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `user_level`
--
ALTER TABLE `user_level`
  MODIFY `level_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `user_meta`
--
ALTER TABLE `user_meta`
  MODIFY `user_meta_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
