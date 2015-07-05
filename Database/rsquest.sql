-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2015 at 06:19 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

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
-- Table structure for table `announcements`
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
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` bigint(20) NOT NULL,
  `message_datetime` datetime NOT NULL,
  `message_detail` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `message_datetime`, `message_detail`) VALUES
(1, '2015-07-05 00:46:08', '<p>test</p>');

-- --------------------------------------------------------

--
-- Table structure for table `message_meta`
--

CREATE TABLE IF NOT EXISTS `message_meta` (
  `msg_meta_id` bigint(20) NOT NULL,
  `message_id` bigint(20) NOT NULL,
  `status` varchar(100) NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `subject_id` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_meta`
--

INSERT INTO `message_meta` (`msg_meta_id`, `message_id`, `status`, `from_id`, `to_id`, `subject_id`) VALUES
(1, 1, 'read', 3, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `note_id` bigint(20) NOT NULL,
  `note_date` date NOT NULL,
  `note_title` varchar(200) NOT NULL,
  `note_detail` varchar(600) NOT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`note_id`, `note_date`, `note_title`, `note_detail`, `user_id`) VALUES
(1, '2015-07-05', 'Test Note', '<p>test</p>', 3);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `option_id` bigint(20) NOT NULL,
  `option_name` varchar(500) NOT NULL,
  `option_value` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`option_id`, `option_name`, `option_value`) VALUES
(5, 'installation', 'Yes'),
(9, 'version', '2.1'),
(15, 'site_url', 'http://localhost/repository/'),
(16, 'site_name', 'OSRS Quest Manager'),
(17, 'email_from', 'ghermans41@aol.com'),
(18, 'email_to', 'ghermans41@aol.com'),
(19, 'public_key', ''),
(20, 'private_key', ''),
(21, 'redirect_on_logout', 'index.php'),
(22, 'language', 'english'),
(23, 'skin', 'default'),
(24, 'maximum_login_attempts', '10'),
(25, 'wrong_attempts_time', '10'),
(26, 'session_timeout', '180'),
(27, 'register_user_level', 'subscriber'),
(28, 'facebook_api_key', ''),
(29, 'activate_captcha', '0'),
(30, 'notify_user_group', '0'),
(31, 'register_verification', '0'),
(32, 'facebook_login', '0'),
(33, 'disable_login', '0'),
(34, 'disable_registration', '0');

-- --------------------------------------------------------

--
-- Table structure for table `quests`
--

CREATE TABLE IF NOT EXISTS `quests` (
  `id` int(11) unsigned NOT NULL,
  `quest_name` varchar(255) NOT NULL DEFAULT '',
  `quest_difficulty` varchar(255) NOT NULL DEFAULT '',
  `quest_length` varchar(255) NOT NULL DEFAULT '',
  `quest_points` int(10) unsigned NOT NULL DEFAULT '0',
  `quest_type` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=128 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quests`
--

INSERT INTO `quests` (`id`, `quest_name`, `quest_difficulty`, `quest_length`, `quest_points`, `quest_type`) VALUES
(1, 'Animal Magnetism', 'Intermediate', 'Medium', 1, 'Members\r\n'),
(2, 'Another Slice of H.A.M.', 'Intermediate', 'Medium', 1, 'Members\r\n'),
(3, 'Between a Rock...', 'Hard', 'Medium', 2, 'Members\r\n'),
(4, 'Big Chompy Bird Hunting', 'Intermediate', 'Short', 2, 'Members\r\n'),
(5, 'Biohazard', 'Easy', 'Long', 3, 'Members\r\n'),
(6, 'Black Knights'' Fortress', 'Easy', 'Medium', 3, 'Free\r\n'),
(7, 'Cabin Fever', 'Hard', 'Medium', 2, 'Members\r\n'),
(8, 'Clock Tower', 'Easy', 'Medium', 1, 'Members\r\n'),
(9, 'Cold War', 'Intermediate', 'Medium', 1, 'Members\r\n'),
(10, 'Contact!', 'Very Hard', 'Medium', 1, 'Members\r\n'),
(11, 'Cook''s Assistant', 'Easy', 'Short', 1, 'Free\r\n'),
(12, 'Creature of Fenkenstrain', 'Intermediate', 'Medium', 2, 'Members\r\n'),
(13, 'Darkness of Hallowvale', 'Intermediate', 'Long', 2, 'Members\r\n'),
(14, 'Death Plateau', 'Easy', 'Medium', 1, 'Members\r\n'),
(15, 'Death to the Dorgeshuun', 'Intermediate', 'Medium', 1, 'Members\r\n'),
(16, 'Demon Slayer', 'Easy', 'Medium', 3, 'Free\r\n'),
(17, 'Desert Treasure', 'Very Hard', 'Long', 3, 'Members\r\n'),
(18, 'Devious Minds', 'Hard', 'Short', 1, 'Members\r\n'),
(19, 'Digsite, The', 'Intermediate', 'Long', 2, 'Members\r\n'),
(20, 'Doric''s Quest', 'Easy', 'Short', 1, 'Free\r\n'),
(21, 'Dragon Slayer', 'Hard', 'Long', 2, 'Free\r\n'),
(22, 'Dream Mentor', 'Hard', 'Short', 2, 'Members\r\n'),
(23, 'Druidic Ritual', 'Easy', 'Short', 4, 'Members\r\n'),
(24, 'Dwarf Cannon', 'Easy', 'Short', 1, 'Members\r\n'),
(25, 'Eadgar''s Ruse', 'Hard', 'Medium', 1, 'Members\r\n'),
(26, 'Eagles'' Peak', 'Easy', 'Short', 2, 'Members\r\n'),
(27, 'Elemental Workshop I, The', 'Easy', 'Short', 1, 'Members\r\n'),
(28, 'Elemental Workshop II, The', 'Intermediate', 'Short', 1, 'Members\r\n'),
(29, 'Enakhra''s Lament', 'Hard', 'Medium', 2, 'Members\r\n'),
(30, 'Enlightened Journey', 'Intermediate', 'Medium', 1, 'Members\r\n'),
(31, 'Ernest the Chicken', 'Easy', 'Short', 4, 'Free\r\n'),
(32, 'Eyes of Glouphrie, The', 'Intermediate', 'Medium', 2, 'Members\r\n'),
(33, 'Fairytale I - Growing Pains', 'Hard', 'Long', 2, 'Members\r\n'),
(34, 'Fairytale II - Cure a Queen', 'Intermediate', 'Medium', 2, 'Members\r\n'),
(35, 'Family Crest', 'Hard', 'Long', 1, 'Members\r\n'),
(36, 'Feud, The', 'Intermediate', 'Medium', 1, 'Members\r\n'),
(37, 'Fight Arena', 'Hard', 'Medium', 2, 'Members\r\n'),
(38, 'Fishing Contest', 'Easy', 'Short', 1, 'Members\r\n'),
(39, 'Forgettable Tale of a Drunken Dwarf', 'Intermediate', 'Medium', 2, 'Members\r\n'),
(40, 'Fremennik Isles, The', 'Hard', 'Long', 1, 'Members\r\n'),
(41, 'Fremennik Trials, The', 'Intermediate', 'Long', 3, 'Members\r\n'),
(42, 'Garden of Tranquillity', 'Intermediate', 'Medium', 2, 'Members\r\n'),
(43, 'Gertrude''s Cat', 'Easy', 'Short', 1, 'Members\r\n'),
(44, 'Ghosts Ahoy', 'Intermediate', 'Long', 2, 'Members\r\n'),
(45, 'Giant Dwarf, The', 'Intermediate', 'Medium', 2, 'Members\r\n'),
(46, 'Goblin Diplomacy', 'Easy', 'Medium', 5, 'Free\r\n'),
(47, 'Golem, The', 'Intermediate', 'Medium', 1, 'Members\r\n'),
(48, 'Grand Tree, The', 'Hard', 'Long', 5, 'Members\r\n'),
(49, 'Great Brain Robbery, The', 'Hard', 'Medium', 2, 'Members\r\n'),
(50, 'Grim Tales', 'Very Hard', 'Short-Medium', 1, 'Members\r\n'),
(51, 'Hand in the Sand, The', 'Hard', 'Medium', 1, 'Members\r\n'),
(52, 'Haunted Mine', 'Hard', 'Medium', 2, 'Members\r\n'),
(53, 'Hazeel Cult', 'Easy', 'Medium', 1, 'Members\r\n'),
(54, 'Heroes'' Quest', 'Hard', 'Long', 1, 'Members\r\n'),
(55, 'Holy Grail', 'Intermediate', 'Long', 2, 'Members\r\n'),
(56, 'Horror From The Deep', 'Hard', 'Short', 2, 'Members\r\n'),
(57, 'Icthlarin''s Little Helper', 'Intermediate', 'Medium', 2, 'Members\r\n'),
(58, 'Imp Catcher', 'Easy', 'Medium', 1, 'Free\r\n'),
(59, 'In Aid of the Myreque', 'Intermediate', 'Medium', 2, 'Members\r\n'),
(60, 'In Search of the Myreque', 'Intermediate', 'Short', 2, 'Members\r\n'),
(61, 'Jungle Potion', 'Easy', 'Short', 1, 'Members\r\n'),
(62, 'King''s Ransom', 'Hard', 'Medium', 1, 'Members\r\n'),
(63, 'Knight''s Sword, The', 'Intermediate', 'Medium', 1, 'Free\r\n'),
(64, 'Legends'' Quest', 'Very Hard', 'Long', 4, 'Members\r\n'),
(65, 'Lost City', 'Hard', 'Medium', 3, 'Members\r\n'),
(66, 'Lost Tribe, The', 'Intermediate', 'Medium', 1, 'Members\r\n'),
(67, 'Lunar Diplomacy', 'Intermediate', 'Long', 2, 'Members\r\n'),
(68, 'Making History', 'Intermediate', 'Medium', 3, 'Members\r\n'),
(69, 'Merlin''s Crystal', 'Intermediate', 'Long', 6, 'Members\r\n'),
(70, 'Monk''s Friend', 'Easy', 'Short', 1, 'Members\r\n'),
(71, 'Monkey Madness', 'Very Hard', 'Very Long', 3, 'Members\r\n'),
(72, 'Mountain Daughter', 'Intermediate', 'Medium', 2, 'Members\r\n'),
(73, 'Mourning''s Ends Part I', 'Very Hard', 'Long', 2, 'Members\r\n'),
(74, 'Mourning''s Ends Part II (The Temple Of Light)', 'Very Hard', 'Long', 2, 'Members\r\n'),
(75, 'Murder Mystery', 'Easy', 'Short', 3, 'Members\r\n'),
(76, 'My Arm''s Big Adventure', 'Intermediate', 'Medium', 1, 'Members\r\n'),
(77, 'Nature Spirit', 'Easy', 'Medium', 2, 'Members\r\n'),
(78, 'Observatory Quest', 'Easy', 'Short', 2, 'Members\r\n'),
(79, 'Olaf''s Quest', 'Intermediate', 'Short', 1, 'Members\r\n'),
(80, 'One Small Favour', 'Intermediate', 'Long', 2, 'Members\r\n'),
(81, 'Pirate''s Treasure', 'Easy', 'Short', 2, 'Free\r\n'),
(82, 'Plague City', 'Easy', 'Long', 1, 'Members\r\n'),
(83, 'Priest in Peril', 'Easy', 'Medium', 1, 'Members\r\n'),
(84, 'Prince Ali Rescue', 'Easy', 'Long', 3, 'Free\r\n'),
(85, 'Rag and Bone Man', 'Easy', 'Short', 1, 'Members\r\n'),
(86, 'Rat Catchers', 'Intermediate', 'Medium', 2, 'Members\r\n'),
(87, 'Recipe for Disaster', 'Very Hard', 'Long', 10, 'Members\r\n'),
(88, 'Recruitment Drive', 'Easy', 'Short', 1, 'Members\r\n'),
(89, 'Regicide', 'Very Hard', 'Long', 3, 'Members\r\n'),
(90, 'Romeo and Juliet', 'Easy', 'Short', 5, 'Free\r\n'),
(91, 'Roving Elves', 'Very Hard', 'Short', 1, 'Members\r\n'),
(92, 'Royal Trouble', 'Hard', 'Medium', 1, 'Members\r\n'),
(93, 'Rum Deal', 'Hard', 'Medium', 2, 'Members\r\n'),
(94, 'Rune Mysteries', 'Easy', 'Short', 1, 'Free\r\n'),
(95, 'Scorpion Catcher', 'Intermediate', 'Short', 1, 'Members\r\n'),
(96, 'Sea Slug', 'Intermediate', 'Short', 1, 'Members\r\n'),
(97, 'Shades Of Mort''ton', 'Intermediate', 'Short', 3, 'Members\r\n'),
(98, 'Shadow of the Storm', 'Intermediate', 'Medium', 1, 'Members\r\n'),
(99, 'Sheep Herder', 'Easy', 'Short', 4, 'Members\r\n'),
(100, 'Sheep Shearer', 'Easy', 'Short', 1, 'Free\r\n'),
(101, 'Shield of Arrav', 'Easy', 'Medium', 1, 'Free\r\n'),
(102, 'Shilo Village', 'Hard', 'Long', 2, 'Members\r\n'),
(103, 'Slug Menace', 'Intermediate', 'Medium', 1, 'Members\r\n'),
(104, 'Soul''s Bane, A', 'Easy', 'Short', 1, 'Members\r\n'),
(105, 'Spirits of the Elid', 'Intermediate', 'Medium', 2, 'Members\r\n'),
(106, 'Swan Song', 'Very Hard', 'Medium', 2, 'Members\r\n'),
(107, 'Tai Bwo Wannai Trio', 'Intermediate', 'Long', 2, 'Members\r\n'),
(108, 'Tail of Two Cats, A', 'Intermediate', 'Medium', 2, 'Members\r\n'),
(109, 'Tears of Guthix', 'Intermediate', 'Short', 1, 'Members\r\n'),
(110, 'Temple of Ikov', 'Hard', 'Long', 1, 'Members\r\n'),
(111, 'The Restless Ghost', 'Easy', 'Short', 1, 'Free\r\n'),
(112, 'Throne of Miscellania', 'Hard', 'Medium', 1, 'Members\r\n'),
(113, 'Tourist Trap, The', 'Intermediate', 'Long', 2, 'Members\r\n'),
(114, 'Tower of Life', 'Easy', 'Short', 2, 'Members\r\n'),
(115, 'Tree Gnome Village', 'Intermediate', 'Long', 2, 'Members\r\n'),
(116, 'Tribal Totem', 'Intermediate', 'Medium', 1, 'Members\r\n'),
(117, 'Troll Romance', 'Hard', 'Medium', 2, 'Members\r\n'),
(118, 'Troll Stronghold', 'Hard', 'Medium', 1, 'Members\r\n'),
(119, 'Underground Pass', 'Hard', 'Long', 5, 'Members\r\n'),
(120, 'Vampire Slayer', 'Easy', 'Short', 3, 'Free\r\n'),
(121, 'Wanted!', 'Intermediate', 'Short', 1, 'Members\r\n'),
(122, 'Watchtower', 'Intermediate', 'Long', 4, 'Members\r\n'),
(123, 'Waterfall Quest', 'Intermediate', 'Long', 1, 'Members\r\n'),
(124, 'What Lies Below', 'Intermediate', 'Medium', 1, 'Members\r\n'),
(125, 'Witch''s House', 'Intermediate', 'Medium', 4, 'Members\r\n'),
(126, 'Witch''s Potion', 'Easy', 'Short', 1, 'Free\r\n'),
(127, 'Zogre Flesh Eaters', 'Intermediate', 'Long', 1, 'Members');

-- --------------------------------------------------------

--
-- Table structure for table `quests_to_requirements`
--

CREATE TABLE IF NOT EXISTS `quests_to_requirements` (
  `quest_id` int(12) NOT NULL DEFAULT '0',
  `requirements_id` int(12) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quests_to_requirements`
--

INSERT INTO `quests_to_requirements` (`quest_id`, `requirements_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 5),
(2, 6),
(3, 7),
(3, 8),
(3, 9),
(4, 10),
(4, 11),
(4, 12),
(6, 13),
(7, 14),
(7, 15),
(7, 16),
(7, 17),
(9, 18),
(9, 19),
(9, 20),
(9, 21),
(12, 22),
(12, 23);

-- --------------------------------------------------------

--
-- Table structure for table `quest_to_quest_requirement`
--

CREATE TABLE IF NOT EXISTS `quest_to_quest_requirement` (
  `quest_id` int(12) NOT NULL DEFAULT '0',
  `quest_requirement_quest` int(12) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quest_to_quest_requirement`
--

INSERT INTO `quest_to_quest_requirement` (`quest_id`, `quest_requirement_quest`) VALUES
(1, 31),
(1, 83),
(1, 111),
(2, 15),
(2, 19),
(2, 45),
(3, 24),
(3, 38),
(5, 82);

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE IF NOT EXISTS `requirements` (
  `id` int(12) NOT NULL,
  `skill_id` int(12) NOT NULL DEFAULT '0',
  `skill_level` int(12) NOT NULL DEFAULT '0',
  `explanation` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(12) DEFAULT NULL,
  `name` varchar(52) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`) VALUES
(1, 'Attack'),
(2, 'Strength'),
(3, 'Defence'),
(4, 'Ranged'),
(5, 'Prayer'),
(6, 'Magic'),
(7, 'Runecrafting'),
(8, 'Construction'),
(9, 'Hitpoints'),
(10, 'Agility'),
(11, 'Herblore'),
(12, 'Thieving'),
(13, 'Crafting'),
(14, 'Fletching'),
(15, 'Slayer'),
(16, 'Hunter'),
(17, 'Mining'),
(18, 'Smithing'),
(19, 'Fishing'),
(20, 'Cooking'),
(21, 'Firemaking'),
(22, 'Woodcutting'),
(23, 'Farming'),
(24, 'QP'),
(25, 'Combat');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `subject_id` bigint(20) NOT NULL,
  `subject_title` varchar(600) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_title`) VALUES
(1, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `gender`, `date_of_birth`, `address1`, `address2`, `city`, `state`, `country`, `zip_code`, `mobile`, `phone`, `username`, `email`, `password`, `profile_image`, `description`, `status`, `activation_key`, `date_register`, `user_type`) VALUES
(1, 'Glenn', 'Hermans', '', '0000-00-00', '', '', '', '', '', '', '', '', 'Choobi', 'ghermans41@aol.com', 'e555fdfacffb3eca7c0f8988e1cc3934', '', '', 'activate', '', '2015-07-04', 'admin'),
(2, 'Test', 'test', 'Select Gender', '0000-00-00', '', '', '', '', '', '', '', '', 'test', 'test@test.com', 'ee53d4213c897ad632bb8d824762f918', '', '', 'activate', '', '2015-07-04', 'subscriber'),
(3, 'Jack', 'Hardcastle', 'Select Gender', '0000-00-00', '', '', '', '', '', '', '', '', 'jack', 'jack@jack.com', '202cb962ac59075b964b07152d234b70', '', '', 'activate', '', '2015-07-04', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE IF NOT EXISTS `user_level` (
  `level_id` bigint(20) NOT NULL,
  `level_name` varchar(200) NOT NULL,
  `level_description` varchar(600) NOT NULL,
  `level_page` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`level_id`, `level_name`, `level_description`, `level_page`) VALUES
(1, 'subscriber', 'Default user level given access to subscriber.php', 'subscriber.php');

-- --------------------------------------------------------

--
-- Table structure for table `user_meta`
--

CREATE TABLE IF NOT EXISTS `user_meta` (
  `user_meta_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `message_email` varchar(50) NOT NULL,
  `last_login_time` datetime NOT NULL,
  `last_login_ip` varchar(120) NOT NULL,
  `login_attempt` bigint(20) NOT NULL,
  `login_lock` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_meta`
--

INSERT INTO `user_meta` (`user_meta_id`, `user_id`, `message_email`, `last_login_time`, `last_login_ip`, `login_attempt`, `login_lock`) VALUES
(1, 1, '', '2015-07-04 23:38:53', '::1', 0, 'No'),
(2, 2, '', '2015-07-04 23:32:56', '::1', 0, 'No'),
(3, 3, '', '2015-07-05 01:24:02', '::1', 0, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `user_quest_completed`
--

CREATE TABLE IF NOT EXISTS `user_quest_completed` (
  `user_id` int(12) NOT NULL DEFAULT '0',
  `quest_id` int(12) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_quest_completed`
--

INSERT INTO `user_quest_completed` (`user_id`, `quest_id`) VALUES
(1, 2),
(1, 31);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `message_meta`
--
ALTER TABLE `message_meta`
  ADD PRIMARY KEY (`msg_meta_id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `quests`
--
ALTER TABLE `quests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quests_to_requirements`
--
ALTER TABLE `quests_to_requirements`
  ADD PRIMARY KEY (`quest_id`,`requirements_id`);

--
-- Indexes for table `quest_to_quest_requirement`
--
ALTER TABLE `quest_to_quest_requirement`
  ADD PRIMARY KEY (`quest_id`,`quest_requirement_quest`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `user_meta`
--
ALTER TABLE `user_meta`
  ADD PRIMARY KEY (`user_meta_id`);

--
-- Indexes for table `user_quest_completed`
--
ALTER TABLE `user_quest_completed`
  ADD PRIMARY KEY (`user_id`,`quest_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcement_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `message_meta`
--
ALTER TABLE `message_meta`
  MODIFY `msg_meta_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `note_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `option_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `quests`
--
ALTER TABLE `quests`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `level_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_meta`
--
ALTER TABLE `user_meta`
  MODIFY `user_meta_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
