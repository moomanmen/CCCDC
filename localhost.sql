-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 12, 2018 at 09:34 PM
-- Server version: 10.1.26-MariaDB-0+deb9u1
-- PHP Version: 7.2.11-2+0~20181015120801.9+stretch~1.gbp8105e0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CCCDC`
--
CREATE DATABASE IF NOT EXISTS `CCCDC` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `CCCDC`;

-- --------------------------------------------------------

--
-- Table structure for table `Applications`
--

CREATE TABLE `Applications` (
  `id` varchar(40) NOT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `amount_requested` double DEFAULT NULL,
  `amount_given` double DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `date_requested` date DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `legislator` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `mail_address` varchar(255) DEFAULT NULL,
  `street_two` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `tax_id` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `contact_phone` varchar(255) DEFAULT NULL,
  `relative_info` varchar(255) DEFAULT NULL,
  `relative_status` tinyint(1) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Legislators`
--

CREATE TABLE `Legislators` (
  `name` varchar(30) NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  `budget` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Legislators`
--

INSERT INTO `Legislators` (`name`, `email`, `budget`) VALUES
('Andrew Sorrell House 3', 'jasorrell@comcast.net', 0),
('Jaime Kiel House 18', 'jamiekiel@me.com', 0),
('Larry Stutts Senate 6', 'larrycstutts@aol.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(3, 'admin', '$2y$10$rRfAfkFhrw/zGwiHGeBSwu0fr9wzVjeDzXqINDGPeFVjxhdCg7wue'),
(9, 'jasorrell@comcast.net', '$2y$10$C/HGIcCgM8v0qer7wUJY5um8Amkv9zWJ92O.UJ/6GMmMbdIHFS1ey'),
(10, 'larrycstutts@aol.com', '$2y$10$nwGarbMurGaDZyq4zijimuUs/BwandKhGCRhA7ZrYU7C6fCu/HYhi'),
(11, 'jamiekiel@me.com', '$2y$10$EnIUEsrhRqWhNqtjwptUvewv2i8qQYyDvink13vUMMZpQvxN7Cwdq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Applications`
--
ALTER TABLE `Applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Legislators`
--
ALTER TABLE `Legislators`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('admin', '[{\"db\":\"CCCDC\",\"table\":\"Applications\"},{\"db\":\"CCCDC\",\"table\":\"Legislators\"},{\"db\":\"CCCDC\",\"table\":\"users\"},{\"db\":\"mysql\",\"table\":\"columns_priv\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('admin', 'CCCDC', 'Applications', '{\"CREATE_TIME\":\"2018-11-13 21:48:49\"}', '2018-12-07 19:56:44');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

--
-- Dumping data for table `pma__tracking`
--

INSERT INTO `pma__tracking` (`db_name`, `table_name`, `version`, `date_created`, `date_updated`, `schema_snapshot`, `schema_sql`, `data_sql`, `tracking`, `tracking_active`) VALUES
('CCCDC', 'Applications', 1, '2018-11-13 21:32:28', '2018-11-13 21:34:28', 'a:2:{s:7:\"COLUMNS\";a:24:{i:0;a:8:{s:5:\"Field\";s:2:\"id\";s:4:\"Type\";s:7:\"int(11)\";s:9:\"Collation\";N;s:4:\"Null\";s:2:\"NO\";s:3:\"Key\";s:3:\"PRI\";s:7:\"Default\";N;s:5:\"Extra\";s:0:\"\";s:7:\"Comment\";s:0:\"\";}i:1;a:8:{s:5:\"Field\";s:12:\"organization\";s:4:\"Type\";s:12:\"varchar(255)\";s:9:\"Collation\";s:18:\"utf8mb4_general_ci\";s:4:\"Null\";s:3:\"YES\";s:3:\"Key\";s:0:\"\";s:7:\"Default\";N;s:5:\"Extra\";s:0:\"\";s:7:\"Comment\";s:0:\"\";}i:2;a:8:{s:5:\"Field\";s:10:\"first_name\";s:4:\"Type\";s:12:\"varchar(255)\";s:9:\"Collation\";s:18:\"utf8mb4_general_ci\";s:4:\"Null\";s:3:\"YES\";s:3:\"Key\";s:0:\"\";s:7:\"Default\";N;s:5:\"Extra\";s:0:\"\";s:7:\"Comment\";s:0:\"\";}i:3;a:8:{s:5:\"Field\";s:9:\"last_name\";s:4:\"Type\";s:12:\"varchar(255)\";s:9:\"Collation\";s:18:\"utf8mb4_general_ci\";s:4:\"Null\";s:3:\"YES\";s:3:\"Key\";s:0:\"\";s:7:\"Default\";N;s:5:\"Extra\";s:0:\"\";s:7:\"Comment\";s:0:\"\";}i:4;a:8:{s:5:\"Field\";s:16:\"amount_requested\";s:4:\"Type\";s:6:\"double\";s:9:\"Collation\";N;s:4:\"Null\";s:3:\"YES\";s:3:\"Key\";s:0:\"\";s:7:\"Default\";N;s:5:\"Extra\";s:0:\"\";s:7:\"Comment\";s:0:\"\";}i:5;a:8:{s:5:\"Field\";s:12:\"amount_given\";s:4:\"Type\";s:6:\"double\";s:9:\"Collation\";N;s:4:\"Null\";s:3:\"YES\";s:3:\"Key\";s:0:\"\";s:7:\"Default\";N;s:5:\"Extra\";s:0:\"\";s:7:\"Comment\";s:0:\"\";}i:6;a:8:{s:5:\"Field\";s:6:\"status\";s:4:\"Type\";s:12:\"varchar(255)\";s:9:\"Collation\";s:18:\"utf8mb4_general_ci\";s:4:\"Null\";s:2:\"NO\";s:3:\"Key\";s:0:\"\";s:7:\"Default\";N;s:5:\"Extra\";s:0:\"\";s:7:\"Comment\";s:0:\"\";}i:7;a:8:{s:5:\"Field\";s:14:\"date_requested\";s:4:\"Type\";s:4:\"date\";s:9:\"Collation\";N;s:4:\"Null\";s:3:\"YES\";s:3:\"Key\";s:0:\"\";s:7:\"Default\";N;s:5:\"Extra\";s:0:\"\";s:7:\"Comment\";s:0:\"\";}i:8;a:8:{s:5:\"Field\";s:4:\"year\";s:4:\"Type\";s:12:\"varchar(255)\";s:9:\"Collation\";s:18:\"utf8mb4_general_ci\";s:4:\"Null\";s:3:\"YES\";s:3:\"Key\";s:0:\"\";s:7:\"Default\";N;s:5:\"Extra\";s:0:\"\";s:7:\"Comment\";s:0:\"\";}i:9;a:8:{s:5:\"Field\";s:10:\"legislator\";s:4:\"Type\";s:11:\"varchar(30)\";s:9:\"Collation\";s:18:\"utf8mb4_general_ci\";s:4:\"Null\";s:3:\"YES\";s:3:\"Key\";s:0:\"\";s:7:\"Default\";N;s:5:\"Extra\";s:0:\"\";s:7:\"Comment\";s:0:\"\";}i:10;a:8:{s:5:\"Field\";s:9:\"file_path\";s:4:\"Type\";s:12:\"varchar(255)\";s:9:\"Collation\";s:18:\"utf8mb4_general_ci\";s:4:\"Null\";s:3:\"YES\";s:3:\"Key\";s:0:\"\";s:7:\"Default\";N;s:5:\"Extra\";s:0:\"\";s:7:\"Comment\";s:0:\"\";}i:11;a:8:{s:5:\"Field\";s:5:\"email\";s:4:\"Type\";s:12:\"varchar(255)\";s:9:\"Collation\";s:18:\"utf8mb4_general_ci\";s:4:\"Null\";s:3:\"YES\";s:3:\"Key\";s:0:\"\";s:7:\"Default\";N;s:5:\"Extra\";s:0:\"\";s:7:\"Comment\";s:0:\"\";}i:12;a:8:{s:5:\"Field\";s:12:\"phone_number\";s:4:\"Type\";s:12:\"varchar(255)\";s:9:\"Collation\";s:18:\"utf8mb4_general_ci\";s:4:\"Null\";s:3:\"YES\";s:3:\"Key\";s:0:\"\";s:7:\"Default\";N;s:5:\"Extra\";s:0:\"\";s:7:\"Comment\";s:0:\"\";}i:13;a:8:{s:5:\"Field\";s:12:\"mail_address\";s:4:\"Type\";s:12:\"varchar(255)\";s:9:\"Collation\";s:18:\"utf8mb4_general_ci\";s:4:\"Null\";s:3:\"YES\";s:3:\"Key\";s:0:\"\";s:7:\"Default\";N;s:5:\"Extra\";s:0:\"\";s:7:\"Comment\";s:0:\"\";}i:14;a:8:{s:5:\"Field\";s:10:\"street_two\";s:4:\"Type\";s:12:\"varchar(255)\";s:9:\"Collation\";s:18:\"utf8mb4_general_ci\";s:4:\"Null\";s:3:\"YES\";s:3:\"Key\";s:0:\"\";s:7:\"Default\";N;s:5:\"Extra\";s:0:\"\";s:7:\"Comment\";s:0:\"\";}i:15;a:8:{s:5:\"Field\";s:4:\"city\";s:4:\"Type\";s:12:\"varchar(255)\";s:9:\"Collation\";s:18:\"utf8mb4_general_ci\";s:4:\"Null\";s:3:\"YES\";s:3:\"Key\";s:0:\"\";s:7:\"Default\";N;s:5:\"Extra\";s:0:\"\";s:7:\"Comment\";s:0:\"\";}i:16;a:8:{s:5:\"Field\";s:5:\"state\";s:4:\"Type\";s:12:\"varchar(255)\";s:9:\"Collation\";s:18:\"utf8mb4_general_ci\";s:4:\"Null\";s:3:\"YES\";s:3:\"Key\";s:0:\"\";s:7:\"Default\";N;s:5:\"Extra\";s:0:\"\";s:7:\"Comment\";s:0:\"\";}i:17;a:8:{s:5:\"Field\";s:8:\"zip_code\";s:4:\"Type\";s:12:\"varchar(255)\";s:9:\"Collation\";s:18:\"utf8mb4_general_ci\";s:4:\"Null\";s:3:\"YES\";s:3:\"Key\";s:0:\"\";s:7:\"Default\";N;s:5:\"Extra\";s:0:\"\";s:7:\"Comment\";s:0:\"\";}i:18;a:8:{s:5:\"Field\";s:6:\"tax_id\";s:4:\"Type\";s:12:\"varchar(255)\";s:9:\"Collation\";s:18:\"utf8mb4_general_ci\";s:4:\"Null\";s:3:\"YES\";s:3:\"Key\";s:0:\"\";s:7:\"Default\";N;s:5:\"Extra\";s:0:\"\";s:7:\"Comment\";s:0:\"\";}i:19;a:8:{s:5:\"Field\";s:14:\"contact_person\";s:4:\"Type\";s:12:\"varchar(255)\";s:9:\"Collation\";s:18:\"utf8mb4_general_ci\";s:4:\"Null\";s:3:\"YES\";s:3:\"Key\";s:0:\"\";s:7:\"Default\";N;s:5:\"Extra\";s:0:\"\";s:7:\"Comment\";s:0:\"\";}i:20;a:8:{s:5:\"Field\";s:13:\"contact_phone\";s:4:\"Type\";s:12:\"varchar(255)\";s:9:\"Collation\";s:18:\"utf8mb4_general_ci\";s:4:\"Null\";s:3:\"YES\";s:3:\"Key\";s:0:\"\";s:7:\"Default\";N;s:5:\"Extra\";s:0:\"\";s:7:\"Comment\";s:0:\"\";}i:21;a:8:{s:5:\"Field\";s:13:\"relative_info\";s:4:\"Type\";s:12:\"varchar(255)\";s:9:\"Collation\";s:18:\"utf8mb4_general_ci\";s:4:\"Null\";s:3:\"YES\";s:3:\"Key\";s:0:\"\";s:7:\"Default\";N;s:5:\"Extra\";s:0:\"\";s:7:\"Comment\";s:0:\"\";}i:22;a:8:{s:5:\"Field\";s:15:\"relative_status\";s:4:\"Type\";s:10:\"tinyint(1)\";s:9:\"Collation\";N;s:4:\"Null\";s:3:\"YES\";s:3:\"Key\";s:0:\"\";s:7:\"Default\";N;s:5:\"Extra\";s:0:\"\";s:7:\"Comment\";s:0:\"\";}i:23;a:8:{s:5:\"Field\";s:11:\"description\";s:4:\"Type\";s:12:\"varchar(255)\";s:9:\"Collation\";s:18:\"utf8mb4_general_ci\";s:4:\"Null\";s:3:\"YES\";s:3:\"Key\";s:0:\"\";s:7:\"Default\";N;s:5:\"Extra\";s:0:\"\";s:7:\"Comment\";s:0:\"\";}}s:7:\"INDEXES\";a:1:{i:0;a:13:{s:5:\"Table\";s:12:\"Applications\";s:10:\"Non_unique\";s:1:\"0\";s:8:\"Key_name\";s:7:\"PRIMARY\";s:12:\"Seq_in_index\";s:1:\"1\";s:11:\"Column_name\";s:2:\"id\";s:9:\"Collation\";s:1:\"A\";s:11:\"Cardinality\";s:1:\"1\";s:8:\"Sub_part\";N;s:6:\"Packed\";N;s:4:\"Null\";s:0:\"\";s:10:\"Index_type\";s:5:\"BTREE\";s:7:\"Comment\";s:0:\"\";s:13:\"Index_comment\";s:0:\"\";}}}', '# log 2018-11-13 21:32:28 admin\nDROP TABLE IF EXISTS `Applications`;\n# log 2018-11-13 21:32:28 admin\n\nCREATE TABLE `Applications` (\n  `id` int(11) NOT NULL,\n  `organization` varchar(255) DEFAULT NULL,\n  `first_name` varchar(255) DEFAULT NULL,\n  `last_name` varchar(255) DEFAULT NULL,\n  `amount_requested` double DEFAULT NULL,\n  `amount_given` double DEFAULT NULL,\n  `status` varchar(255) NOT NULL,\n  `date_requested` date DEFAULT NULL,\n  `year` varchar(255) DEFAULT NULL,\n  `legislator` varchar(30) DEFAULT NULL,\n  `file_path` varchar(255) DEFAULT NULL,\n  `email` varchar(255) DEFAULT NULL,\n  `phone_number` varchar(255) DEFAULT NULL,\n  `mail_address` varchar(255) DEFAULT NULL,\n  `street_two` varchar(255) DEFAULT NULL,\n  `city` varchar(255) DEFAULT NULL,\n  `state` varchar(255) DEFAULT NULL,\n  `zip_code` varchar(255) DEFAULT NULL,\n  `tax_id` varchar(255) DEFAULT NULL,\n  `contact_person` varchar(255) DEFAULT NULL,\n  `contact_phone` varchar(255) DEFAULT NULL,\n  `relative_info` varchar(255) DEFAULT NULL,\n  `relative_status` tinyint(1) DEFAULT NULL,\n  `description` varchar(255) DEFAULT NULL\n) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;\n\n# log 2018-11-13 21:34:28 admin\nALTER TABLE `Applications` ;', '\n', 'UPDATE,INSERT,DELETE,TRUNCATE,CREATE TABLE,ALTER TABLE,RENAME TABLE,DROP TABLE,CREATE INDEX,DROP INDEX', 0),
('CCCDC', 'Applications', 2, '2018-11-13 21:36:10', '2018-11-13 21:36:10', 'a:2:{s:7:\"COLUMNS\";a:0:{}s:7:\"INDEXES\";a:0:{}}', '# log 2018-11-13 21:36:10 admin\nDROP TABLE IF EXISTS `Applications`;\n# log 2018-11-13 21:36:10 admin\n', '\n', 'UPDATE,INSERT,DELETE,TRUNCATE,CREATE TABLE,ALTER TABLE,RENAME TABLE,DROP TABLE,CREATE INDEX,DROP INDEX', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('Christian', '2018-10-16 01:22:19', '{\"collation_connection\":\"utf8mb4_unicode_ci\"}'),
('admin', '2018-12-12 21:34:41', '{\"collation_connection\":\"utf8mb4_unicode_ci\",\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `phpmyadmindb`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmindb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `phpmyadmindb`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
