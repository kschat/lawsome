-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 09, 2013 at 05:25 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.6-1ubuntu1.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testYii`
--

-- --------------------------------------------------------

--
-- Table structure for table `annotations`
--

CREATE TABLE IF NOT EXISTS `annotations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `annotation` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `annotations`
--

INSERT INTO `annotations` (`id`, `document_id`, `title`, `annotation`) VALUES
(90, 1, 'Testing new layout', 'This is a test of the new annotation layout and how to wraps text.This is a test of the new annotation layout and how to wraps text.This is a test of the new annotation layout and how to wraps text.This is a test of the new annotation layout and how to wraps text.This is a test of the new annotation layout and how to wraps text.This is a test of the new annotation layout and how to wraps text.This is a test of the new annotation layout and how to wraps text.'),
(91, 1, 'Another test', 'Another annotation test.'),
(92, 4, 'test', 'test'),
(93, 5, 'aaaaa', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `annotation_comments`
--

CREATE TABLE IF NOT EXISTS `annotation_comments` (
  `postId` int(11) NOT NULL,
  `commentId` int(11) NOT NULL,
  PRIMARY KEY (`postId`,`commentId`),
  KEY `fk_posts_comments_comments` (`commentId`),
  KEY `fk_posts_comments_posts` (`postId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `annotation_comments`
--

INSERT INTO `annotation_comments` (`postId`, `commentId`) VALUES
(90, 3),
(0, 4),
(0, 5),
(0, 6),
(90, 8),
(90, 9),
(90, 10),
(91, 38),
(91, 39),
(90, 40),
(90, 41),
(91, 42),
(91, 43),
(91, 44),
(91, 45),
(91, 46),
(91, 47),
(92, 48),
(92, 49),
(91, 50),
(91, 51),
(90, 52),
(90, 53);

-- --------------------------------------------------------

--
-- Table structure for table `AuthAssignment`
--

CREATE TABLE IF NOT EXISTS `AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AuthAssignment`
--

INSERT INTO `AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Admin', '1', NULL, 'N;'),
('Authenticated', '2', NULL, 'N;'),
('Authenticated', '3', NULL, 'N;'),
('Authenticated', '6', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `AuthItem`
--

CREATE TABLE IF NOT EXISTS `AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AuthItem`
--

INSERT INTO `AuthItem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Admin', 2, 'Super user', NULL, 'N;'),
('Authenticated', 2, 'Authenticated', NULL, 'N;'),
('Documents.Index', 0, NULL, NULL, 'N;'),
('Documents.View', 0, NULL, NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `AuthItemChild`
--

CREATE TABLE IF NOT EXISTS `AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AuthItemChild`
--

INSERT INTO `AuthItemChild` (`parent`, `child`) VALUES
('Authenticated', 'Documents.Index'),
('Authenticated', 'Documents.View');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text COLLATE utf8_unicode_ci,
  `userId` int(11) DEFAULT NULL,
  `createDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments` (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=54 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `message`, `userId`, `createDate`) VALUES
(3, 'test fgc', 1, '2013-02-08 17:43:02'),
(4, 'test', 1, '2013-02-09 14:07:41'),
(5, 'test', 1, '2013-02-09 15:50:21'),
(6, 'asdf', 1, '2013-02-09 15:50:58'),
(8, 'New comment', 1, '2013-02-09 16:10:37'),
(9, 'New comment', 1, '2013-02-09 16:10:37'),
(10, 'New comment', 1, '2013-02-09 16:10:37'),
(38, 'z', 1, '2013-02-09 16:46:01'),
(39, 'z', 1, '2013-02-09 16:46:01'),
(40, 's', 1, '2013-02-09 16:54:09'),
(41, 'g', 1, '2013-02-09 16:54:30'),
(42, 'h', 1, '2013-02-09 16:54:44'),
(43, 'h', 1, '2013-02-09 16:54:45'),
(44, 'f', 1, '2013-02-09 16:59:27'),
(45, 'f', 1, '2013-02-09 16:59:27'),
(46, 'g', 1, '2013-02-09 17:05:12'),
(47, 'g', 1, '2013-02-09 17:05:12'),
(48, 'test', 1, '2013-02-09 17:06:26'),
(49, 'test', 1, '2013-02-09 17:06:26'),
(50, 't', 1, '2013-02-09 17:07:15'),
(51, 't', 1, '2013-02-09 17:07:15'),
(52, '', 1, '2013-02-09 17:08:00'),
(53, '', 1, '2013-02-09 17:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `title`, `text`) VALUES
(1, 'Test document 1', '<h1 id="body-section" style="padding-top: 80px; margin-top: -80px;">Body</h1><br /><br/>\r\n					\r\n					\r\n					\r\n					The standard Lorem Ipsum passage, used since the 1500s\r\n\r\n					"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n					"tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n					"quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n					"consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n					"cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n					"proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n					Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC\r\n\r\n					"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium\r\n					"doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore\r\n					"veritatis et quasi architecto beatae vitae dicta sunt ex<span class="reference" id="annotation-90">plicabo. Nemo enim\r\n					"ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia\r\n					"consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque\r\n					"porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,\r\n					"adipisci velit, s</span>ed quia non numquam eius modi tempora incidunt ut labore et\r\n					"dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis\r\n					"nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex\r\n					"ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea\r\n					"voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem\r\n					"eum fugiat quo voluptas nulla pariatur?\r\n\r\n					1914 translation by H. Rackham\r\n\r\n					"But I must explain to you how all this mistaken idea of denouncing pleasure\r\n					"and praising pain was born and I will give you a complete account of the\r\n					"system, and expound the actual teachings of the great explorer of the truth,\r\n					"the master-builder of human happiness. No one rejects, dislikes, or avoids\r\n					"pleasure itself, because it is pleasure, but because those who do not know\r\n					"how to pursue pleasure rationally encounter consequences that are extremely\r\n					"painful. Nor again is there anyone who loves or pursues or desires to obtain\r\n					"pain of itself, because it is pain, but because occasionally circumstances\r\n					"occur in which toil and pain can procure him some great pleasure. To take a\r\n					"trivial example, which of us ever undertakes laborious physical exercise,\r\n					"except to obtain some advantage from it? But who has any right to find fault\r\n					"with a man who chooses to enjoy a pleasure that has no annoying consequences,\r\n					"or one who avoids a pain that produces no resultant pleasure?\r\n\r\n					Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC\r\n\r\n					"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis\r\n					"praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias\r\n					"excepturi sint occaecati cupiditate non provident, similique sunt in culpa\r\n					"qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum\r\n					"quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum\r\n					"soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime\r\n					"placeat facere possimus, omnis voluptas assumenda est, omnis dolor\r\n					"repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum\r\n					"necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae\r\n					"non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut\r\n					"reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus\r\n					"asperiores repellat.\r\n\r\n					1914 translation by H. Rackham\r\n\r\n					"On the other hand, we denounce with righteous indignation and dislike men who\r\n					are so beguiled and demoralized by the charms of pleasure of the moment, so\r\n					blinded by desire, that they cannot foresee the pain and trouble that are\r\n					bound to ensue; and equal blame belongs to those who fail in their duty\r\n					through weakness of will, which is the same as saying through shrinking from\r\n					toil and pain. These cases are perfectly simple and easy to distinguish. In a\r\n					free hour, when our power of choice is untrammelled and when nothing prevents\r\n					our being able to do what we like best, every pleasure is to be welcomed and\r\n					every pain avoided. But in certain circumstances and owing to the claims of\r\n					duty or the obligations of business it will frequently occur that pleasures\r\n					have to be repudiated and annoyances accepted. The wise man therefore always\r\n					holds in these matters to this principle of selection: he rejects pleasures to\r\n					secure other greater pleasures, or else he endures pains to avoid worse\r\n					pains."																			'),
(4, 'Test document 3', 'testing'),
(5, 'Test document 4', '\n					test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test<span class="reference" id="annotation-93"> test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test t</span>est test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test 				'),
(6, 'Test document 5', 'testtesttesttesttesttest'),
(7, 'Test document 6', 'asdflkjasdlkfjaslkdfjlaksdjfasdf'),
(8, 'Test document 7', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(9, 'Test document 8', 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb'),
(10, 'Test document 9', 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb'),
(11, 'Test document 10', 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb'),
(15, 'Test document', 'asdfasdfasdf');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`user_id`, `lastname`, `firstname`) VALUES
(1, 'Admin', 'Kyle'),
(3, 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `profiles_fields`
--

CREATE TABLE IF NOT EXISTS `profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` varchar(15) NOT NULL DEFAULT '0',
  `field_size_min` varchar(15) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `profiles_fields`
--

INSERT INTO `profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(1, 'lastname', 'Last Name', 'VARCHAR', '50', '3', 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
(2, 'firstname', 'First Name', 'VARCHAR', '50', '3', 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Rights`
--

CREATE TABLE IF NOT EXISTS `Rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activkey`, `create_at`, `lastvisit_at`, `superuser`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'webmaster@example.com', '9a24eff8c15a6a141ece27eb6947da0f', '2013-02-06 18:23:25', '2013-02-09 22:06:16', 1, 1),
(3, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test1@test.com', '62fadb9dc0119e63e1166687d65a932b', '2013-02-07 20:22:46', '2013-02-09 22:06:00', 0, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `annotations`
--
ALTER TABLE `annotations`
  ADD CONSTRAINT `annotations_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `annotation_comments`
--
ALTER TABLE `annotation_comments`
  ADD CONSTRAINT `annotation_comments` FOREIGN KEY (`commentId`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `AuthAssignment`
--
ALTER TABLE `AuthAssignment`
  ADD CONSTRAINT `AuthAssignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `AuthItemChild`
--
ALTER TABLE `AuthItemChild`
  ADD CONSTRAINT `AuthItemChild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `AuthItemChild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `user_profile_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `Rights`
--
ALTER TABLE `Rights`
  ADD CONSTRAINT `Rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
