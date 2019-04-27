-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Creato il: Apr 27, 2019 alle 19:43
-- Versione del server: 5.7.23
-- Versione PHP: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

--
-- Database: `simple1`
--

DELIMITER $$
--
-- Funzioni
--
CREATE  FUNCTION `FIRST_DAY_OF_WEEK` (`day` DATE) RETURNS DATE BEGIN
  RETURN SUBDATE(day, WEEKDAY(day));
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struttura della tabella `activities`
--

CREATE TABLE `activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `d_document_start` datetime DEFAULT NULL,
  `d_document_stop` datetime DEFAULT NULL,
  `partner` int(11) NOT NULL,
  `activity` varchar(1000) DEFAULT NULL,
  `typeactivity` varchar(1000) NOT NULL,
  `place` varchar(2000) NOT NULL,
  `summary` text,
  `from_nation` varchar(5) DEFAULT NULL,
  `from_city` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `user_created` int(11) NOT NULL,
  `user_updated` int(11) DEFAULT NULL,
  `user_deleted` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `closed` tinyint(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `verified` int(11) NOT NULL DEFAULT '0',
  `d_document_start_event` date DEFAULT NULL,
  `d_document_stop_event` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `activities`
--

INSERT INTO `activities` (`id`, `d_document_start`, `d_document_stop`, `partner`, `activity`, `typeactivity`, `place`, `summary`, `from_nation`, `from_city`, `created_at`, `updated_at`, `deleted_at`, `user_created`, `user_updated`, `user_deleted`, `active`, `closed`, `deleted`, `verified`, `d_document_start_event`, `d_document_stop_event`) VALUES
(1, NULL, NULL, 1, 'Conference', 'Conference', '', NULL, '4', '', '0000-00-00 00:00:00', NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `activities_detail`
--

CREATE TABLE `activities_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `activity` int(11) NOT NULL,
  `comment` varchar(2000) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `user_created` int(11) NOT NULL,
  `user_updated` int(11) DEFAULT NULL,
  `user_deleted` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `closed` tinyint(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `forseen` int(11) NOT NULL DEFAULT '0',
  `realized` int(11) NOT NULL DEFAULT '0',
  `typeindicator` int(11) NOT NULL DEFAULT '0',
  `title` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `activities_detail_model`
--

CREATE TABLE `activities_detail_model` (
  `id` int(10) UNSIGNED NOT NULL,
  `partner` int(11) NOT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL,
  `typeindicator` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `activities_detail_model`
--

INSERT INTO `activities_detail_model` (`id`, `partner`, `title`, `deleted`, `typeindicator`) VALUES
(1, 0, 'Preparatory activities', 0, 1),
(2, 0, 'Working meetings', 0, 1),
(3, 0, 'Partners networking activities', 0, 1),
(4, 0, 'Other', 0, 1),
(5, 0, 'Artistic residencies', 0, 2),
(6, 0, 'Creative activities', 0, 2),
(7, 0, 'Coproduction', 0, 2),
(8, 0, 'Touring', 0, 2),
(9, 0, 'Concerts', 0, 2),
(10, 0, 'Performances', 0, 2),
(11, 0, 'Translation', 0, 2),
(12, 0, 'Publishing', 0, 2),
(13, 0, 'Festivals', 0, 2),
(14, 0, 'Rehearsals', 0, 2),
(15, 0, 'Exhibitions', 0, 2),
(16, 0, 'Fairs', 0, 2),
(17, 0, 'Literary translation', 0, 2),
(18, 0, 'Other', 0, 2),
(19, 0, 'Research/studies/Policy analysis/Evaluations', 0, 3),
(20, 0, 'Conferences/seminars', 0, 3),
(21, 0, 'Branding/labeling activities', 0, 3),
(22, 0, 'Networking activities', 0, 3),
(23, 0, 'Communication activities', 0, 3),
(24, 0, 'Other', 0, 3),
(25, 0, 'Study(ies)', 0, 4),
(26, 0, 'Evaluation (s)', 0, 4),
(27, 0, 'Policy analysis', 0, 4),
(28, 0, 'Artists', 0, 5),
(29, 0, 'Cultural workers (technicians, etc.)', 0, 5),
(30, 0, 'Artists representatives', 0, 5),
(31, 0, 'Art agents', 0, 5),
(32, 0, 'Administrative staff (from the partners\' organisations)', 0, 5),
(33, 0, 'Culture & specialist experts', 0, 5),
(34, 0, 'Staff from educational institutions', 0, 5),
(35, 0, 'Students in the field of cultural & creative industries', 0, 5),
(36, 0, 'Staff from local, regional and national institutions', 0, 5),
(37, 0, 'Other', 0, 5),
(38, 0, 'Profit making cultural organisations', 0, 6),
(39, 0, 'Non-Profit making cultural organisations', 0, 6),
(40, 0, 'Publicly funded cultural organisations', 0, 6),
(41, 0, 'Non-publicly funded cultural organisations', 0, 6),
(42, 0, 'Schools/universities in the field of cultural & creative industries', 0, 6),
(43, 0, 'Local, regional and national institutions', 0, 6),
(44, 0, 'Other', 0, 6),
(45, 0, 'General public', 0, 7),
(46, 0, 'Youth', 0, 7),
(47, 0, 'Students', 0, 7),
(48, 0, 'Senior citizens', 0, 7),
(49, 0, 'Students in the field of cultural and creative industries', 0, 7),
(50, 0, 'Artists', 0, 7),
(51, 0, 'Cultural & specialist experts', 0, 7),
(52, 0, 'Cultural workers (technicians, etc.)', 0, 7),
(53, 0, 'Staff from educational institutions', 0, 7),
(54, 0, 'Staff from local, regional and national institutions', 0, 7),
(55, 0, 'Other', 0, 7),
(56, 0, 'Roma', 0, 8),
(57, 0, 'Disadvantaged groups', 0, 8),
(58, 0, 'Gender M', 0, 8),
(59, 0, 'Gender W', 0, 8),
(60, 0, 'Migrant', 0, 8),
(61, 0, 'Racial & ethnic origin', 0, 8),
(62, 0, 'Religion /belief', 0, 8),
(63, 0, 'Disability and special needs', 0, 8),
(64, 0, 'Sexual orientation', 0, 8),
(65, 0, 'Ageing', 0, 8),
(66, 0, 'Other Minorities', 0, 8),
(67, 0, 'number of artists/creators that have been promoted ', 0, 9),
(68, 0, 'number of emerging artists/creators that have been promoted', 0, 9);

-- --------------------------------------------------------

--
-- Struttura della tabella `budget`
--

CREATE TABLE `budget` (
  `id` int(11) NOT NULL,
  `macro1` int(11) DEFAULT NULL,
  `macro2` int(11) DEFAULT '0',
  `macro3` int(11) DEFAULT '0',
  `codedest` varchar(10) DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `activity` varchar(20) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `partner` int(11) DEFAULT NULL,
  `kind` int(11) DEFAULT NULL,
  `inreporting` varchar(200) DEFAULT NULL,
  `prefixactivities` varchar(200) DEFAULT NULL,
  `workplan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `budget`
--

INSERT INTO `budget` (`id`, `macro1`, `macro2`, `macro3`, `codedest`, `amount`, `activity`, `description`, `partner`, `kind`, `inreporting`, `prefixactivities`, `workplan`) VALUES
(2, 1, 1, 1, '1.1.1', '1400.00', '2.2', '1.1.1 Copyright - Royalties Macro event', 2, 2, 'Copyright - Royalties Macro event', NULL, NULL),
(3, 1, 2, 1, '1.2.1', '2000.00', '2.2', '1.2.1 Premises hire', 2, 2, 'Premises hire', NULL, NULL),
(4, 1, 3, 1, '1.3.1', '5000.00', '2.2', '1.3.1 Electronic equipment ', 2, 2, 'Electronic equipment ', NULL, NULL),
(5, 1, 4, 1, '1.4.1', '1500.00', '2.2', '1.4.1 Material macro events', 2, 2, 'Material macro events', NULL, NULL),
(6, 1, 4, 2, '1.4.2', '800.00', '2.2', '1.4.2 Set design and costumes', 2, 2, 'Set design and costumes', NULL, NULL),
(7, 1, 6, 1, '1.6.1', '1000.00', '2.2', '1.6.1 Rent of one minibus macro event', 2, 2, 'Rent of one minibus macro event', NULL, NULL),
(8, 1, 6, 2, '1.6.2', '400.00', '2.2', '1.6.2 Other services macro event', 2, 2, 'Other services macro event', NULL, NULL),
(9, 1, 7, 1, '1.7.1', '1500.00', '2.2', '1.7.1 Insurance equipment macro', 2, 2, 'Insurance equipment macro', NULL, NULL),
(10, 1, 7, 2, '1.7.2', '1000.00', '3.2', '1.7.2 Insurance equipment micro', 2, 2, 'Insurance equipment micro', NULL, NULL),
(11, 1, 7, 3, '1.7.3', '2000.00', '2.2', '1.7.3 Insurance team macro', 2, 2, 'Insurance team macro', NULL, NULL),
(12, 1, 7, 4, '1.7.4', '600.00', '3.2', '1.7.4 Insurance team micro', 2, 2, 'Insurance team micro', NULL, NULL),
(13, 1, 9, 1, '1.9.1', '1200.00', '3.2', '1.9.1 Food & beverage', 2, 2, 'Food & beverage', NULL, NULL),
(14, 3, 1, 1, '3.1.1', '1600.00', '2.2', '3.1.1 transport actors for the other macro events', 2, 5, 'transport actors for the other macro events', NULL, NULL),
(15, 3, 1, 2, '3.1.2', '7200.00', '7.2', '3.1.2 transport equipe of management', 2, 5, 'transport equipe of management', NULL, NULL),
(16, 3, 1, 3, '3.1.3', '2400.00', '6.4', '3.1.3 travel conference extra-eu', 2, 5, 'travel conference extra-eu', NULL, NULL),
(17, 3, 2, 1, '3.2.1', '4480.00', '2.2', '3.2.1 hotel actors for the others macro events ', 2, 4, 'hotel actors for the others macro events ', NULL, NULL),
(18, 3, 2, 2, '3.2.2', '9280.00', '7.2', '3.2.2 hotel equipe of management', 2, 4, 'hotel equipe of management', NULL, NULL),
(19, 3, 2, 3, '3.2.3', '2520.00', '6.4', '3.2.3 travel conference extra-eu', 2, 5, 'travel conference extra-eu', NULL, NULL),
(20, 3, 3, 1, '3.3.1', '3360.00', '2.2', '3.3.1 Subsistence allowance for the other macro events ', 2, 6, 'Subsistence allowance for the other macro events ', NULL, NULL),
(21, 3, 3, 2, '3.3.2', '6960.00', '7.2', '3.3.2 Substistence allowance management equipe (3 persons)', 2, 6, 'Substistence allowance management equipe (3 persons)', NULL, NULL),
(22, 3, 3, 3, '3.3.3', '360.00', '6.4', '3.3.3 travel conference extra-eu', 2, 5, 'travel conference extra-eu', NULL, NULL),
(25, 4, 1, 2, '4.1.2', '58800.00', '7.1', '4.1.2 Project assistent part time - to be determined', 2, 1, 'Project assistent part time - to be determined', NULL, NULL),
(26, 4, 2, 5, '4.2.5', '7800.00', '6.3', '4.2.5 Interpreters and translators', 2, 1, 'Interpreters and translators', NULL, NULL),
(27, 4, 2, 6, '4.2.6', '9000.00', '4.2', '4.2.6 External speakers', 2, 1, 'External speakers', NULL, NULL),
(30, 4, 3, 2, '4.3.2', '18000.00', '2.2', '4.3.2 Middle artist - Community trainer - Part Time', 2, 1, 'Middle artist - Community trainer - Part Time', NULL, NULL),
(38, 4, 3, 2, '4.3.2', '4000.00', '2.2', '4.3.2 Junior artist - Community trainer ', 2, 1, 'Junior artist - Community trainer ', NULL, NULL),
(42, 4, 3, 3, '4.3.3', '43200.00', '5.1', '4.3.3 Assesment and evaluation researcher', 2, 1, 'Assesment and evaluation researcher', NULL, NULL),
(45, 4, 3, 3, '4.3.3', '43200.00', '5.3', '4.3.3 Business Model researcher', 2, 1, 'Business Model researcher', NULL, NULL),
(48, 4, 3, 4, '4.3.4', '3500.00', '2.2', '4.3.4 Technicians Macro', 2, 1, 'Technicians Macro', NULL, NULL),
(50, 4, 3, 4, '4.3.4', '6300.00', '2.2', '4.3.4 Videoperator Macro', 2, 1, 'Videoperator Macro', NULL, NULL),
(51, 5, 0, 0, '5', '25000.00', '', '5 INDIRECT COSTS (MAX. 7% OF THE DIRECT COSTS)', 2, NULL, 'INDIRECT COSTS (MAX. 7% OF THE DIRECT COSTS)', NULL, NULL),
(948, 1, 1, 1, '1.1.1', '2100.00', NULL, '1.1.1 Copyright - Royalties Macro event', 1, 2, 'Copyright - Royalties Macro event', NULL, NULL),
(949, 1, 1, 2, '1.1.2', '1200.00', NULL, '1.1.2 Copyright - Royalties Micro Events', 1, 2, 'Copyright - Royalties Micro Events', NULL, NULL),
(950, 1, 2, 1, '1.2.1', '5000.00', NULL, '1.2.1 Premises hire', 1, 2, 'Premises hire', NULL, NULL),
(951, 1, 3, 1, '1.3.1', '12000.00', NULL, '1.3.1 Electronic equipment', 1, 2, 'Electronic equipment', NULL, NULL),
(952, 1, 3, 2, '1.3.2', '6000.00', NULL, '1.3.2 Equipment hire macro', 1, 2, 'Equipment hire macro', NULL, NULL),
(953, 1, 3, 3, '1.3.3', '2800.00', NULL, '1.3.3 Equipment hire micro ( 2 micro of 7 days)', 1, 2, 'Equipment hire micro ( 2 micro of 7 days)', NULL, NULL),
(954, 1, 4, 1, '1.4.1', '14800.00', NULL, '1.4.1 Material macro events for different sets', 1, 2, 'Material macro events for different sets', NULL, NULL),
(955, 1, 4, 2, '1.4.2', '10000.00', NULL, '1.4.2 Set design and costumes', 1, 2, 'Set design and costumes', NULL, NULL),
(956, 1, 4, 3, '1.4.3', '6000.00', NULL, '1.4.3 Materials micro events', 1, 2, 'Materials micro events', NULL, NULL),
(957, 1, 5, 1, '1.5.1', '2600.00', NULL, '1.5.1 Smartphones', 1, 2, 'Smartphones', NULL, NULL),
(958, 1, 5, 2, '1.5.2', '1800.00', NULL, '1.5.2 Tablets', 1, 2, 'Tablets', NULL, NULL),
(959, 1, 5, 3, '1.5.3', '850.00', NULL, '1.5.3 Action cams', 1, 2, 'Action cams', NULL, NULL),
(960, 1, 6, 1, '1.6.1', '2100.00', NULL, '1.6.1 Rent of one minibus macro event', 1, 2, 'Rent of one minibus macro event', NULL, NULL),
(961, 1, 6, 2, '1.6.2', '1000.00', NULL, '1.6.2 Rent of one minibus micro event', 1, 2, 'Rent of one minibus micro event', NULL, NULL),
(962, 1, 6, 3, '1.6.3', '4040.00', NULL, '1.6.3 Other services macro event', 1, 2, 'Other services macro event', NULL, NULL),
(963, 1, 6, 4, '1.6.4', '1600.00', NULL, '1.6.4 Other services micro event', 1, 2, 'Other services micro event', NULL, NULL),
(964, 1, 6, 5, '1.6.5', '3000.00', NULL, '1.6.5 Rent of transporter macro event', 1, 2, 'Rent of transporter macro event', NULL, NULL),
(965, 1, 6, 6, '1.6.6', '750.00', NULL, '1.6.6 Rent of transporter micro event', 1, 2, 'Rent of transporter micro event', NULL, NULL),
(966, 1, 6, 7, '1.6.7', '2000.00', NULL, '1.6.7 Rent of car macro', 1, 2, 'Rent of car macro', NULL, NULL),
(967, 1, 6, 8, '1.6.8', '500.00', NULL, '1.6.8 Rent of car micro', 1, 2, 'Rent of car micro', NULL, NULL),
(968, 1, 7, 1, '1.7.1', '3000.00', NULL, '1.7.1 Insurance equipment macro', 1, 2, 'Insurance equipment macro', NULL, NULL),
(969, 1, 7, 2, '1.7.2', '1000.00', NULL, '1.7.2 Insurance equipment micro', 1, 2, 'Insurance equipment micro', NULL, NULL),
(970, 1, 7, 3, '1.7.3', '4000.00', NULL, '1.7.3 Insurance team macro', 1, 2, 'Insurance team macro', NULL, NULL),
(971, 1, 7, 4, '1.7.4', '600.00', NULL, '1.7.4 Insurance team micro', 1, 2, 'Insurance team micro', NULL, NULL),
(972, 1, 9, 1, '1.9.1', '6000.00', NULL, '1.9.1 Food & beverage', 1, 2, 'Food & beverage', NULL, NULL),
(973, 2, 1, 1, '2.1.1', '6000.00', NULL, '2.1.1 Program Macro', 1, 2, 'Program Macro', NULL, NULL),
(975, 2, 1, 3, '2.1.3', '1000.00', NULL, '2.1.3 Posters Macro', 1, 2, 'Posters Macro', NULL, NULL),
(977, 2, 1, 5, '2.1.5', '500.00', NULL, '2.1.5 Info packages', 1, 2, 'Info packages', NULL, NULL),
(979, 2, 2, 1, '2.2.1.1', '3500.00', NULL, '2.2.1.1 Advertising on newspapers', 1, 2, 'Advertising on newspapers', NULL, NULL),
(980, 2, 2, 1, '2.2.1.2', '1800.00', NULL, '2.2.1.2 Social media advertising', 1, 2, 'Social media advertising', NULL, NULL),
(982, 2, 2, 2, '2.2.2.1', '500.00', NULL, '2.2.2.1 staff partner T-shirt', 1, 2, 'staff partner T-shirt', NULL, NULL),
(987, 2, 3, 2, '2.3.2.1', '600.00', NULL, '2.3.2.1 web hosting', 1, 2, 'web hosting', NULL, NULL),
(990, 3, 1, 1, '3.1.1', '6400.00', NULL, '3.1.1 transport actors for the other macro events', 1, 5, 'transport actors for the other macro events', NULL, NULL),
(991, 3, 1, 2, '3.1.2', '14400.00', NULL, '3.1.2 transport of management (conference, steering committee, macro event)', 1, 5, 'transport of management (conference, steering committee, macro event)', NULL, NULL),
(993, 3, 1, 4, '3.1.4', '3600.00', NULL, '3.1.4 travel conference extra-eu', 1, 5, 'travel conference extra-eu', NULL, NULL),
(994, 3, 1, 5, '3.1.5', '5000.00', NULL, '3.1.5 transport journalists', 1, 5, 'transport journalists', NULL, NULL),
(995, 3, 2, 1, '3.2.1', '10080.00', NULL, '3.2.1 Hotel actors for the others big events', 1, 4, 'Hotel actors for the others big events', NULL, NULL),
(996, 3, 2, 2, '3.2.2', '9720.00', NULL, '3.2.2 Hotel of management', 1, 4, 'Hotel of management', NULL, NULL),
(998, 3, 2, 4, '3.2.4', '1200.00', NULL, '3.2.4 Hotel conference extra-eu (4 persons 3 days)', 1, 4, 'Hotel conference extra-eu (4 persons 3 days)', NULL, NULL),
(999, 3, 2, 5, '3.2.5', '1000.00', NULL, '3.2.5 Acomodation journalists', 1, 4, 'Acomodation journalists', NULL, NULL),
(1000, 3, 3, 1, '3.3.1', '6720.00', NULL, '3.3.1 Subsistence allowance for the other big events big', 1, 6, 'Subsistence allowance for the other big events big', NULL, NULL),
(1003, 3, 3, 4, '3.3.4', '6480.00', NULL, '3.3.4 Substistence allowance management (3 persons)', 1, 6, 'Substistence allowance management (3 persons)', NULL, NULL),
(1004, 3, 3, 5, '3.3.5', '1080.00', NULL, '3.3.5 Substistencel conference extra-eu (4 persons 3 days)', 1, 6, 'Substistencel conference extra-eu (4 persons 3 days)', NULL, NULL),
(1005, 3, 3, 6, '3.3.6', '700.00', NULL, '3.3.6 Substistence journalists', 1, 6, 'Substistence journalists', NULL, NULL),
(1007, 4, 1, 1, '4.1.1.1', '92400.00', NULL, '4.1.1.1 Project manager/officer part time', 1, 1, 'Project manager/officer part time - Per Bech Jensen', NULL, NULL),
(1008, 4, 1, 1, '4.1.1.2', '35100.00', NULL, '4.1.1.2 Finacial manager/officer part time', 1, 1, 'Finacial manager/officer part time - Lene Hoejmark', NULL, NULL),
(1012, 4, 1, 4, '4.1.4.1', '30800.00', NULL, '4.1.4.1 Communication manager Part time - to be determined', 1, 1, 'Communication manager Part time - to be determined', NULL, NULL),
(1017, 4, 2, 3, '4.2.3.1', '7000.00', NULL, '4.2.3.1 Auditor (linked to the final report)', 1, 1, 'Auditor (linked to the final report)', NULL, NULL),
(1019, 4, 2, 4, '4.2.4.1', '4000.00', NULL, '4.2.4.1 IT maintenance/Helpdesk', 1, 1, 'IT maintenance/Helpdesk', NULL, NULL),
(1021, 4, 2, 5, '4.2.5.1', '6000.00', NULL, '4.2.5.1 Interpreters and translators', 1, 1, 'Interpreters and translators', NULL, NULL),
(1023, 4, 2, 6, '4.2.6.1', '3000.00', NULL, '4.2.6.1 External speakers', 1, 1, 'External speakers', NULL, NULL),
(1029, 4, 3, 1, '4.3.1.3', '27600.00', NULL, '4.3.1.3 Event consultant ', 1, 1, 'Event consultant - Kai Bredholt', NULL, NULL),
(1034, 4, 3, 2, '4.3.2.1', '10800.00', NULL, '4.3.2.1 Senior artist - Community trainer', 1, 1, 'Senior artist - Community trainer', NULL, NULL),
(1035, 4, 3, 2, '4.3.2.2', '9000.00', NULL, '4.3.2.2 Middle artist - Community trainer', 1, 1, 'Middle artist - Community trainer', NULL, NULL),
(1036, 4, 3, 2, '4.3.2.3', '4800.00', NULL, '4.3.2.3 Junior artist', 1, 1, 'Junior artist', NULL, NULL),
(1043, 4, 3, 2, '4.3.2.10', '7000.00', NULL, '4.3.2.10 travelling artist', 1, 5, 'travelling artist', NULL, NULL),
(1063, 4, 3, 6, '4.3.6.1', '3067.00', NULL, '4.3.6.1 Project identity design ', 1, 1, 'Project identity design - AUT', NULL, NULL),
(1066, 6, 0, 0, '6', '0.00', '', 'OTHER COST RELATED TO THE PROJECT NOT INCLUDED IN REPORTING ', 1, 3, 'OTHER COST RELATED TO THE PROJECT NOT INCLUDED IN REPORTING ', NULL, NULL),
(1067, 6, 0, 0, '6', '0.00', '', 'OTHER COST RELATED TO THE PROJECT NOT INCLUDED IN REPORTING ', 2, 3, 'OTHER COST RELATED TO THE PROJECT NOT INCLUDED IN REPORTING ', NULL, NULL),
(1078, 5, 0, 0, '5', '10000.00', '', '5 INDIRECT COSTS (MAX. 7% OF THE DIRECT COSTS)', 1, NULL, 'INDIRECT COSTS (MAX. 7% OF THE DIRECT COSTS)', NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `budgetmacro`
--

CREATE TABLE `budgetmacro` (
  `id` int(11) NOT NULL DEFAULT '0',
  `description` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `budgetmacro`
--

INSERT INTO `budgetmacro` (`id`, `description`) VALUES
(1, 'COSTS DIRECTLY LINKED TO ACTIVITY'),
(2, 'COMMUNICATION, PROMO'),
(3, 'TRAVEL & SUBSISTENCE'),
(4, 'STAFF COSTS'),
(5, 'INDIRECT COST');

-- --------------------------------------------------------

--
-- Struttura della tabella `cost`
--

CREATE TABLE `cost` (
  `id` int(10) UNSIGNED NOT NULL,
  `d_document` datetime NOT NULL,
  `d_document_start` datetime DEFAULT NULL,
  `d_document_stop` datetime DEFAULT NULL,
  `partner` int(11) NOT NULL,
  `description_cost` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activity` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `budgetrow` int(11) NOT NULL,
  `payedby` int(11) NOT NULL DEFAULT '0',
  `d_document_paid` datetime DEFAULT NULL,
  `comment` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `tpc` int(11) NOT NULL DEFAULT '0',
  `sub` int(11) NOT NULL DEFAULT '0',
  `d_document_start_travel` datetime DEFAULT NULL,
  `d_document_finish_travel` datetime DEFAULT NULL,
  `n_people` int(11) NOT NULL DEFAULT '0',
  `name_people` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_people` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `from_nation` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `from_city` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `to_nation` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `to_city` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doc1` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doc2` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doc3` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doc4` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doc5` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doc6` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `netamount` decimal(15,2) DEFAULT NULL,
  `vatamount` decimal(15,2) DEFAULT NULL,
  `euronetamount` decimal(15,2) DEFAULT NULL,
  `eurovatamount` decimal(15,2) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `user_created` int(11) NOT NULL,
  `user_updated` int(11) DEFAULT NULL,
  `user_deleted` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `verified` int(11) NOT NULL DEFAULT '0',
  `rejection` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rejected` int(11) DEFAULT NULL,
  `verified_at` datetime DEFAULT NULL,
  `rejected_at` datetime DEFAULT NULL,
  `supplier` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dayworked` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `country`
--

INSERT INTO `country` (`id`, `description`) VALUES
(1, '  '),
(2, 'AL'),
(3, 'AD'),
(4, 'AT'),
(5, 'BY'),
(6, 'BE'),
(7, 'BA'),
(8, 'BG'),
(9, 'HR'),
(10, 'CY'),
(11, 'CZ'),
(12, 'DK'),
(13, 'EE'),
(14, 'FO'),
(15, 'FI'),
(16, 'FR'),
(17, 'DE'),
(18, 'GI'),
(19, 'GR'),
(20, 'HU'),
(21, 'IS'),
(22, 'IE'),
(23, 'IT'),
(24, 'LV'),
(25, 'LI'),
(26, 'LT'),
(27, 'LU'),
(28, 'MK'),
(29, 'MT'),
(30, 'MD'),
(31, 'MC'),
(32, 'NL'),
(33, 'NO'),
(34, 'PL'),
(35, 'PT'),
(36, 'RO'),
(37, 'RU'),
(38, 'SM'),
(39, 'RS'),
(40, 'SK'),
(41, 'SI'),
(42, 'ES'),
(43, 'SE'),
(44, 'CH'),
(45, 'UA'),
(46, 'GB'),
(47, 'VA'),
(48, 'RS'),
(49, 'IM'),
(50, 'RS'),
(51, 'ME'),
(52, 'OTHER');

-- --------------------------------------------------------

--
-- Struttura della tabella `currency`
--

CREATE TABLE `currency` (
  `description` varchar(3) CHARACTER SET utf8 NOT NULL,
  `rate` decimal(10,4) DEFAULT NULL,
  `longdescription` varchar(80) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `currency`
--

INSERT INTO `currency` (`description`, `rate`, `longdescription`, `id`) VALUES
('AED', '4.0366', 'AED - United Arab Emirates dirham', 1),
('AFN', '75.4613', 'AFN - Afghan afghani', 2),
('ALL', '135.8700', 'ALL - Albanian lek', 3),
('AMD', '523.1600', 'AMD - Armenian dram', 4),
('ANG', '1.9851', 'ANG - Netherlands Antillean guilder', 5),
('AOA', '185.3625', 'AOA - Angolan kwanza', 6),
('ARS', '16.5796', 'ARS - Argentine peso', 7),
('AUD', '1.4735', 'AUD - Australian dollar', 8),
('AWG', '1.9851', 'AWG - Aruban florin', 9),
('AZN', '1.7472', 'AZN - Azerbaijanian Manat', 10),
('BAM', '1.9558', 'BAM - Bosnia and Herzegovina convertible mark', 11),
('BBD', '2.2299', 'BBD - Barbados dollar', 12),
('BDT', '86.9456', 'BDT - Bangladeshi taka', 13),
('BGN', '1.9558', 'BGN - Bulgarian lev', 14),
('BHD', '0.4170', 'BHD - Bahraini dinar', 15),
('BIF', '1820.4988', 'BIF - Burundi franc', 16),
('BMD', '1.1090', 'BMD - Bermudian dollar', 17),
('BND', '1.4915', 'BND - Brunei dollar', 18),
('BOB', '7.6632', 'BOB - Bolivian boliviano', 19),
('BRL', '3.6306', 'BRL - Brazilian real', 20),
('BSD', '1.1090', 'BSD - Bahamian dollar', 21),
('BTN', '74.3543', 'BTN - Bhutanese ngultrum', 22),
('BWP', '11.8483', 'BWP - Botswana pula', 23),
('BYR', '21954.0000', 'BYR - Belarussian rouble', 24),
('BZD', '2.2291', 'BZD - Belize dollar', 25),
('CAD', '1.4595', 'CAD - Canadian dollar', 26),
('CDF', '1090.2729', 'CDF - Congolese franc', 27),
('CHF', '1.0892', 'CHF - Swiss franc', 28),
('CLP', '727.8700', 'CLP - Chilean peso', 29),
('CNY', '7.3838', 'CNY - Chinese Yuan Renminbi', 30),
('COP', '3323.9503', 'COP - Colombian peso', 31),
('CRC', '607.5435', 'CRC - Costa Rican colón', 32),
('CUC', '1.1090', 'CUC - Cuban convertible peso', 33),
('CUP', '27.1705', 'CUP - Cuban peso', 34),
('CVE', '110.2650', 'CVE - Cape Verde escudo', 35),
('CZK', '27.0450', 'CZK - Czech koruna', 36),
('DJF', '197.0926', 'DJF - Djibouti franc', 37),
('DKK', '7.4398', 'DKK - Danish krone', 38),
('DOP', '50.4092', 'DOP - Dominican peso', 39),
('DZD', '121.6695', 'DZD - Algerian dinar', 40),
('EGP', '9.7423', 'EGP - Egyptian pound', 41),
('ERN', '16.9023', 'ERN - Eritrean nakfa', 42),
('ETB', '24.3237', 'ETB - Ethiopian birr', 43),
('EUR', '1.0000', 'EUR - Euro', 44),
('FJD', '2.2952', 'FJD - Fiji dollar', 45),
('FKP', '0.8422', 'FKP - Falkland Islands pound', 46),
('GBP', '0.8422', 'GBP - Pound sterling', 47),
('GEL', '2.5792', 'GEL - Georgian lari', 48),
('GHS', '4.3302', 'GHS - Ghana cedi', 49),
('GIP', '0.8422', 'GIP - Gibraltar pound', 50),
('GMD', '48.7900', 'GMD - Gambian dalasi', 51),
('GNF', '9900.0496', 'GNF - Guinea franc', 52),
('GTQ', '8.4027', 'GTQ - Guatemalan quetzal', 53),
('GYD', '227.5400', 'GYD - Guyana dollar', 54),
('HKD', '8.6022', 'HKD - Hong Kong dollar', 55),
('HNL', '25.3558', 'HNL - Honduran lempira', 56),
('HRK', '7.4855', 'HRK - Croatian kuna', 57),
('HTG', '70.7855', 'HTG - Haitian gourde', 58),
('HUF', '312.1500', 'HUF - Hungarian forint', 59),
('IDR', '14530.6700', 'IDR - Indonesian rupiah', 60),
('ILS', '4.2383', 'ILS - New Israeli shekel', 61),
('INR', '74.3543', 'INR - Indian rupee', 62),
('IQD', '1309.7290', 'IQD - Iraqi dinar', 63),
('IRR', '34329.0950', 'IRR - Iranian rial', 64),
('ISK', '133.6700', 'ISK - Iceland króna', 65),
('JMD', '138.4605', 'JMD - Jamaican dollar', 66),
('JOD', '0.7863', 'JOD - Jordanian dinar', 67),
('JPY', '116.1400', 'JPY - Japanese yen', 68),
('KES', '111.2711', 'KES - Kenyan shilling', 69),
('KGS', '74.4719', 'KGS - Kyrgyzstani som', 70),
('KHR', '4518.5000', 'KHR - Cambodian riel', 71),
('KMF', '491.9675', 'KMF - Comoro franc', 72),
('KRW', '1251.1700', 'KRW - South Korean won', 73),
('KWD', '0.3352', 'KWD - Kuwaiti dinar', 74),
('KYD', '0.9094', 'KYD - Cayman Islands dollar', 75),
('KZT', '377.8900', 'KZT - Kazakhstani tenge', 76),
('LAK', '8893.0000', 'LAK - Lao kip', 77),
('LBP', '1671.8175', 'LBP - Lebanese pound', 78),
('LKR', '160.4350', 'LKR - Sri Lankan rupee', 79),
('LRD', '103.6915', 'LRD - Liberian dollar', 80),
('LSL', '15.7968', 'LSL - Lesotho loti', 81),
('LYD', '1.5342', 'LYD - Libyan dinar', 82),
('MAD', '10.8145', 'MAD - Moroccan dirham', 83),
('MDL', '21.7578', 'MDL - Moldovan leu', 84),
('MGA', '3243.4400', 'MGA - Malagasy ariary', 85),
('MKD', '61.4945', 'MKD - Macedonian denar', 86),
('MMK', '1297.5300', 'MMK - Myanmar Kyat', 87),
('MNT', '2276.8325', 'MNT - Mongolian Tugrik', 88),
('MOP', '8.8606', 'MOP - Macanese pataca', 89),
('MRO', '389.9750', 'MRO - Mauritanian ouguiya', 90),
('MUR', '39.3720', 'MUR - Mauritian rupee', 91),
('MVR', '17.0564', 'MVR - Maldivian rufiyaa', 92),
('MWK', '790.9829', 'MWK - Malawi kwacha', 93),
('MXN', '20.8716', 'MXN - Mexican peso', 94),
('MYR', '4.5018', 'MYR - Malaysian ringgit', 95),
('MZN', '73.0000', 'MZN - Mozambique Metical', 96),
('NAD', '15.7968', 'NAD - Namibian dollar', 97),
('NGN', '339.9548', 'NGN - Nigerian naira', 98),
('NIO', '31.8645', 'NIO - Nicaraguan córdoba', 99),
('NOK', '9.4405', 'NOK - Norwegian krone', 100),
('NPR', '118.2700', 'NPR - Nepalese rupee', 101),
('NZD', '1.5646', 'NZD - New Zealand dollar', 102),
('OMR', '0.4264', 'OMR - Omani rial', 103),
('PAB', '1.1090', 'PAB - Panamanian balboa', 104),
('PEN', '3.7196', 'PEN - Peruvian sol', 105),
('PGK', '3.5151', 'PGK - Papua New Guinean kina', 106),
('PHP', '52.2420', 'PHP - Philippine peso', 107),
('PKR', '115.1905', 'PKR - Pakistan rupee', 108),
('PLN', '4.3636', 'PLN - Polish zloty', 109),
('PYG', '6155.4934', 'PYG - Paraguayan guaraní', 110),
('QAR', '4.0368', 'QAR - Qatari riyal', 111),
('RON', '4.4585', 'RON - Romanian Leu', 112),
('RSD', '123.4497', 'RSD - Serbian Dinar', 113),
('RUB', '73.6747', 'RUB - Russian ruble', 114),
('RWF', '870.1126', 'RWF - Rwandan franc', 115),
('SAR', '4.1588', 'SAR - Saudi riyal', 116),
('SBD', '8.6404', 'SBD - Solomon Islands dollar', 117),
('SCR', '14.6620', 'SCR - Seychellois rupee', 118),
('SDG', '7.1309', 'SDG - Sudanese Pound', 119),
('SEK', '9.5497', 'SEK - Swedish krona', 120),
('SGD', '1.4977', 'SGD - Singapore dollar', 121),
('SHP', '0.8422', 'SHP - Saint Helena pound', 122),
('SLL', '6752.9893', 'SLL - Sierra Leonean leone', 123),
('SOS', '637.3907', 'SOS - Somali shilling', 124),
('SRD', '7.9282', 'SRD - Surinam dollar', 125),
('SSP', '56.6474', 'SSP - South Sudanese pound', 126),
('STD', '24500.0000', 'STD - São Tomé and Príncipe dobra', 127),
('SVC', '9.7038', 'SVC - Salvadoran colón', 128),
('SYP', '519.2200', 'SYP - Syrian pound', 129),
('SZL', '15.7968', 'SZL - Swazi lilangeni', 130),
('THB', '38.6760', 'THB - Thai baht', 131),
('TJS', '8.7262', 'TJS - Tajikistani somoni', 132),
('TMT', '3.8815', 'TMT - Turkmenistan manat', 133),
('TND', '2.4630', 'TND - Tunisian dinar', 134),
('TOP', '2.4195', 'TOP - Tongan pa?anga', 135),
('TRY', '3.3491', 'TRY - Turkish lira', 136),
('TTD', '7.4830', 'TTD - Trinidad and Tobago dollar', 137),
('TWD', '35.2312', 'TWD - New Taiwan dollar', 138),
('TZS', '2394.9631', 'TZS - Tanzanian shilling', 139),
('UAH', '27.4896', 'UAH - Ukrainian hryvnia', 140),
('UGX', '3701.4200', 'UGX - Ugandan shilling', 141),
('USD', '1.1090', 'USD - United States dollar', 142),
('UYU', '32.9151', 'UYU - Uruguayan peso', 143),
('UZS', '3287.1093', 'UZS - Uzbekistan sum', 144),
('VEF', '709.5134', 'VEF - Venezuelan bolívar', 145),
('VND', '24725.1550', 'VND - Vietnamese dong', 146),
('VUV', '120.9724', 'VUV - Vanuatu vatu', 147),
('WST', '2.8391', 'WST - Samoan tala', 148),
('XAF', '655.9570', 'XAF - Central African CFA franc', 149),
('XCD', '2.9943', 'XCD - East Caribbean dollar', 150),
('XOF', '655.9570', 'XOF - West African CFA franc', 151),
('XPF', '119.3316', 'XPF - CFP franc', 152),
('YER', '277.5273', 'YER - Yemeni rial', 153),
('ZAR', '15.7968', 'ZAR - South African rand', 154),
('ZMW', '10.4943', 'ZMW - Zambian Kwacha', 155),
('BYN', '2.1954', 'BYN-Belarussian rouble', 156);

-- --------------------------------------------------------

--
-- Struttura della tabella `ltm_translations`
--

CREATE TABLE `ltm_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `ltm_translations`
--

INSERT INTO `ltm_translations` (`id`, `status`, `locale`, `group`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 0, 'en', 'admin', 'calendar', 'Calendar', '2016-04-15 18:34:13', '2016-04-15 20:57:48'),
(2, 0, 'en', 'admin', 'see_all', 'View all', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(3, 0, 'en', 'budget', 'description', 'Description', '2016-04-15 18:34:14', '2016-04-15 18:49:02'),
(4, 0, 'en', 'budget', 'update', 'Update', '2016-04-15 18:34:14', '2016-04-15 18:49:02'),
(5, 0, 'en', 'budget', 'code', 'Code', '2016-04-15 18:34:14', '2016-04-15 18:49:02'),
(6, 0, 'en', 'budget', 'spent', 'Spent', '2016-04-15 18:34:14', '2016-04-15 18:49:02'),
(7, 0, 'en', 'budget', 'budget', 'Budget', '2016-04-15 18:34:14', '2016-04-15 18:49:02'),
(8, 0, 'en', 'budget', 'detail', 'Budget detail', '2016-04-15 18:34:14', '2016-04-15 18:49:02'),
(9, 0, 'en', 'budget', 'total', 'Total', '2016-04-15 18:34:14', '2016-04-15 18:49:02'),
(10, 0, 'en', 'budget', 'inserted', 'Inserted', '2016-04-15 18:34:14', '2016-04-15 18:49:02'),
(11, 0, 'en', 'budget', 'verified', 'Checked', '2016-04-15 18:34:14', '2016-04-15 18:49:02'),
(12, 0, 'en', 'budget', 'rateapplied', 'Exchange rate applied', '2016-04-15 18:34:14', '2016-04-15 18:49:02'),
(13, 0, 'en', 'budget', 'insertdescription', 'Please insert a description', '2016-04-15 18:34:14', '2016-04-15 18:49:02'),
(14, 0, 'en', 'budget', 'currencyhelp', 'Information about exchange rate used by system', '2016-04-15 18:34:14', '2016-04-15 18:49:02'),
(15, 0, 'en', 'budget', 'currencyhelp_long', 'The exchange rate applied is EU exchange rate, updated at this month', '2016-04-15 18:34:14', '2016-04-15 18:49:02'),
(16, 0, 'en', 'budget', 'kindofcost', 'Please choose the type of costs to be inserted', '2016-04-15 18:34:14', '2016-04-15 18:49:02'),
(17, 0, 'en', 'budget', 'staff', 'Staff costs', '2016-04-15 18:34:14', '2016-04-15 18:49:02'),
(18, 0, 'en', 'budget', 'services', 'Goods and Services', '2016-04-15 18:34:14', '2016-04-15 18:49:02'),
(19, 0, 'en', 'budget', 'subsistence', 'Subsistences (dayly allowance or detailed costs)', '2016-04-15 18:34:14', '2016-04-15 18:49:02'),
(20, 0, 'en', 'budget', 'accomodation', 'Accomodation (Hotel)', '2016-04-15 18:34:14', '2016-04-15 18:49:02'),
(21, 0, 'en', 'budget', 'plan', 'Travels', '2016-04-15 18:34:14', '2016-04-15 18:49:02'),
(22, 0, 'en', 'budget', 'indirect', 'You cannot insert indirect costs. They are automatic calculated in reporting', '2016-04-15 18:34:14', '2016-04-15 18:49:02'),
(23, 0, 'en', 'budget', 'other', 'Other costs related to the project but extra reporting', '2016-04-15 18:34:14', '2016-04-15 18:49:02'),
(24, 0, 'en', 'budget', 'generalinfo', 'General information', '2016-04-15 18:34:14', '2016-04-15 18:49:02'),
(25, 0, 'en', 'decode', 'Yes', 'Si', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(26, 0, 'en', 'decode', 'No', 'No', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(27, 0, 'en', 'decode', 'ok', 'Ok', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(28, 0, 'en', 'decode', 'apply', 'Applica', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(29, 0, 'en', 'emails', 'confirm', 'Confirm registration', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(30, 0, 'en', 'emails', 'dear', 'Dear', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(31, 0, 'en', 'emails', 'welcometo', 'Welcome to', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(32, 0, 'en', 'emails', 'succreg', 'You have successfully registered to the internal web tool of the', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(33, 0, 'en', 'emails', 'access', 'Your access is', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(34, 0, 'en', 'emails', 'changepwd', 'Now you can sign in on system. Consider change your password at first sign in.', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(35, 0, 'en', 'emails', 'support', 'For any need you can contact us through our online support system.', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(36, 0, 'en', 'emails', 'goodday', 'Have a good day!', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(37, 0, 'en', 'general', 'view', 'View', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(38, 0, 'en', 'general', 'modify', 'Edit', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(39, 0, 'en', 'general', 'edit', 'Edit', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(40, 0, 'en', 'general', 'new', 'New', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(41, 0, 'en', 'general', 'cancell', 'Cancel', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(42, 0, 'en', 'general', 'delete', 'Delete', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(43, 0, 'en', 'general', 'save', 'Save', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(44, 0, 'en', 'general', 'savecontinue', 'Save & Edit', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(45, 0, 'en', 'general', 'update', 'Update', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(46, 0, 'en', 'general', 'back', 'Back', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(47, 0, 'en', 'general', 'reset', 'Reset', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(48, 0, 'en', 'general', 'activate', 'Activate', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(49, 0, 'en', 'general', 'disactivate', 'Deactivate', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(50, 0, 'en', 'general', 'download', 'Download', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(51, 0, 'en', 'general', 'file', 'Document', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(52, 0, 'en', 'general', 'nologo', 'Image not available', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(53, 0, 'en', 'general', 'editDetail', '', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(54, 0, 'en', 'general', 'pleaseselect', 'Please select', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(55, 0, 'en', 'general', 'active', 'active', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(56, 0, 'en', 'general', 'yes', 'Yes', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(57, 0, 'en', 'general', 'no', 'No', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(58, 0, 'en', 'general', 'all', 'All', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(59, 0, 'en', 'general', 'filter', 'Filter', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(60, 0, 'en', 'general', 'exportcsv', 'Save file CSV', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(61, 0, 'en', 'general', 'exportxls', 'Save file XLS', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(62, 0, 'en', 'general', 'stop', '', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(63, 0, 'en', 'generic', 'save', 'Save', '2016-04-15 18:34:14', '2016-04-17 17:43:00'),
(64, 0, 'en', 'generic', 'cancell', 'Cancel', '2016-04-15 18:34:14', '2016-04-17 17:43:00'),
(65, 0, 'en', 'generic', 'disactivate', 'Deactivate', '2016-04-15 18:34:14', '2016-04-17 17:43:00'),
(66, 0, 'en', 'generic', 'activate', 'Activate', '2016-04-15 18:34:14', '2016-04-17 17:43:00'),
(67, 0, 'en', 'generic', 'view', 'View', '2016-04-15 18:34:14', '2016-04-17 17:43:00'),
(68, 0, 'en', 'generic', 'edit', 'Edit', '2016-04-15 18:34:14', '2016-04-17 17:43:00'),
(69, 0, 'en', 'generic', 'delete', 'Delete', '2016-04-15 18:34:14', '2016-04-17 17:43:00'),
(70, 0, 'en', 'generic', 'update', 'Update', '2016-04-15 18:34:14', '2016-04-17 17:43:00'),
(71, 0, 'en', 'generic', 'modify', 'Edit', '2016-04-15 18:34:14', '2016-04-17 17:43:00'),
(72, 0, 'en', 'generic', 'back', 'Back', '2016-04-15 18:34:14', '2016-04-17 17:43:00'),
(73, 0, 'en', 'generic', 'reset', 'Reset', '2016-04-15 18:34:14', '2016-04-17 17:43:00'),
(74, 0, 'en', 'generic', 'exportcsv', 'Export CSV', '2016-04-15 18:34:14', '2016-04-17 17:43:00'),
(75, 0, 'en', 'generic', 'exportxls', 'Export XLS', '2016-04-15 18:34:14', '2016-04-17 17:43:00'),
(76, 0, 'en', 'generic', 'viewmore', 'View more', '2016-04-15 18:34:14', '2016-04-17 17:43:00'),
(77, 0, 'en', 'generic', 'yes', 'Yes', '2016-04-15 18:34:14', '2016-04-17 17:43:00'),
(78, 0, 'en', 'generic', 'active', 'Active', '2016-04-15 18:34:14', '2016-04-17 17:43:00'),
(79, 0, 'en', 'generic', 'all', 'All', '2016-04-15 18:34:14', '2016-04-17 17:43:00'),
(80, 0, 'en', 'generic', 'viewall', 'Show all', '2016-04-15 18:34:14', '2016-04-17 17:43:00'),
(81, 0, 'en', 'generic', 'download', 'Download', '2016-04-15 18:34:14', '2016-04-17 17:43:00'),
(82, 0, 'en', 'generic', 'editDetail', 'Edit', '2016-04-15 18:34:14', '2016-04-17 17:43:00'),
(83, 0, 'en', 'generic', 'file', 'File', '2016-04-15 18:34:14', '2016-04-17 17:43:00'),
(84, 0, 'en', 'generic', 'filter', 'Filter', '2016-04-15 18:34:14', '2016-04-17 17:43:00'),
(85, 0, 'en', 'generic', 'new', 'New', '2016-04-15 18:34:14', '2016-04-17 17:43:00'),
(86, 0, 'en', 'generic', 'no', 'No', '2016-04-15 18:34:14', '2016-04-17 17:43:00'),
(87, 0, 'en', 'generic', 'nologo', 'Without logo', '2016-04-15 18:34:14', '2016-04-17 17:43:00'),
(88, 0, 'en', 'generic', 'pleaseselect', 'Please select a value', '2016-04-15 18:34:14', '2016-04-17 17:43:00'),
(89, 0, 'en', 'generic', 'savecontinue', 'Save and continue', '2016-04-15 18:34:14', '2016-04-17 17:43:00'),
(90, 0, 'en', 'generic', 'Share_with_friend', 'Share with friends', '2016-04-15 18:34:14', '2016-04-17 17:43:00'),
(91, 0, 'en', 'helpdesk', 'id', 'Id', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(92, 0, 'en', 'helpdesk', 'description', 'Description', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(93, 0, 'en', 'helpdesk', 'update', 'Update', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(94, 0, 'en', 'helpdesk', 'sendticket', 'Send ticket', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(95, 0, 'en', 'helpdesk', 'ticket', 'Ticket', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(96, 0, 'en', 'helpdesk', 'subject', 'Subject', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(97, 0, 'en', 'helpdesk', 'message', 'Message', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(98, 0, 'en', 'helpdesk', 'dest', 'To', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(99, 0, 'en', 'helpdesk', 'send', 'Send', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(100, 0, 'en', 'helpdesk', 'sendSuccess', 'Message sent.', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(101, 0, 'en', 'helpdesk', 'sendError', 'Message not sent. Please retry.', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(102, 0, 'en', 'helpdesk', 'stop', '', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(103, 0, 'en', 'home', 'home', 'Home', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(104, 0, 'en', 'home', 'hometitlebudget', 'Partner\'s budget', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(105, 0, 'en', 'home', 'titlecalendar', 'Calendar', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(106, 0, 'en', 'home', 'elegibility', 'Elegibility period', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(107, 0, 'en', 'home', 'from', 'From', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(108, 0, 'en', 'home', 'to', 'To', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(109, 0, 'en', 'home', 'grant', 'Grant agreement number', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(110, 0, 'en', 'home', 'support', 'Support', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(111, 0, 'en', 'home', 'languages', 'Languages', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(112, 0, 'en', 'home', 'promoter', 'Users', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(113, 0, 'en', 'home', 'roles', 'Roles', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(114, 0, 'en', 'home', 'lastestcost', 'Lastest costs inserted', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(115, 0, 'en', 'languages', 'id', 'Id', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(116, 0, 'en', 'languages', 'description', 'Description', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(117, 0, 'en', 'languages', 'code', 'Code', '2016-04-15 18:34:14', '2016-04-15 20:57:48'),
(118, 0, 'en', 'languages', 'addlanguage', 'Add new', '2016-04-15 18:34:14', '2016-04-15 20:57:49'),
(119, 0, 'en', 'languages', 'language', 'Language', '2016-04-15 18:34:14', '2016-04-15 20:57:49'),
(120, 0, 'en', 'languages', 'languagelist', 'Language list', '2016-04-15 18:34:14', '2016-04-15 20:57:49'),
(121, 0, 'en', 'languages', 'modifylanguage', 'Edit', '2016-04-15 18:34:14', '2016-04-15 20:57:49'),
(122, 0, 'en', 'languages', 'languageview', 'Detail', '2016-04-15 18:34:14', '2016-04-15 20:57:49'),
(123, 0, 'en', 'languages', 'stop', '', '2016-04-15 18:34:14', '2016-04-15 20:57:49'),
(124, 0, 'en', 'notification', 'last_login', NULL, '2016-04-15 18:34:25', '2016-04-15 18:34:25'),
(125, 0, 'en', 'emails', 'subject_reg', NULL, '2016-04-15 18:34:25', '2016-04-15 18:34:25'),
(126, 0, 'en', 'notification', 'registration', NULL, '2016-04-15 18:34:25', '2016-04-15 18:34:25'),
(127, 0, 'en', 'email', 'subject', NULL, '2016-04-15 18:34:25', '2016-04-15 18:34:25'),
(128, 0, 'en', 'emails', 'usubject_reg', NULL, '2016-04-15 18:34:25', '2016-04-15 18:34:25'),
(129, 0, 'en', 'emails', 'subject_change_pwd', NULL, '2016-04-15 18:34:25', '2016-04-15 18:34:25'),
(130, 0, 'en', 'users', 'modifyuser_success', NULL, '2016-04-15 18:34:25', '2016-04-15 18:34:25'),
(131, 0, 'en', 'users', 'adduser_success', NULL, '2016-04-15 18:34:25', '2016-04-15 18:34:25'),
(132, 0, 'en', 'offerts', 'offertpublishY', NULL, '2016-04-15 18:34:25', '2016-04-15 18:34:25'),
(133, 0, 'en', 'offerts', 'offertpublishN', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(134, 0, 'en', 'users', 'email_reg', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(135, 0, 'en', 'reminders', 'email_subject', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(136, 0, 'en', 'campaigns', 'view', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(137, 0, 'en', 'navigation', 'home', 'Homepage', '2016-04-15 18:34:26', '2016-04-16 11:37:35'),
(138, 0, 'en', 'roles', 'addrole', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(139, 0, 'en', 'navigation', 'list', 'List', '2016-04-15 18:34:26', '2016-04-16 11:37:35'),
(140, 0, 'en', 'roles', 'roleview', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(141, 0, 'en', 'roles', 'id', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(142, 0, 'en', 'roles', 'description', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(143, 0, 'en', 'roles', 'update', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(144, 0, 'en', 'adv', 'campaign_active', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(145, 0, 'en', 'adv', 'see_all', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(146, 0, 'en', 'admin', 'scan_all', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(147, 0, 'en', 'notification', 'notification', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(148, 0, 'en', 'notification', 'now', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(149, 0, 'en', 'users', 'myprofile', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(150, 0, 'en', 'users', 'email', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(151, 0, 'en', 'users', 'password', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(152, 0, 'en', 'users', 'login', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(153, 0, 'en', 'users', 'recover_password', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(154, 0, 'en', 'users', 'modifyuser', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(155, 0, 'en', 'users', 'username', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(156, 0, 'en', 'users', 'passwordmodify', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(157, 0, 'en', 'users', 'role', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(158, 0, 'en', 'users', 'name', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(159, 0, 'en', 'users', 'surname', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(160, 0, 'en', 'users', 'phone', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(161, 0, 'en', 'users', 'note', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(162, 0, 'en', 'users', 'lastlogin_at', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(163, 0, 'en', 'users', 'active', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(164, 0, 'en', 'navigation', 'users', 'Users', '2016-04-15 18:34:26', '2016-04-16 11:37:35'),
(165, 0, 'en', 'users', 'password_confirmation', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(166, 0, 'en', 'users', 'gratzProfile', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(167, 0, 'en', 'users', 'gratzProfileExt', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(168, 0, 'en', 'users', 'backToHome', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(169, 0, 'en', 'users', 'password_recovery', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(170, 0, 'en', 'users', 'password_recovery_subtitle', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(171, 0, 'en', 'users', 'enter_username_password', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(172, 0, 'en', 'users', 'passwordRecovery', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(173, 0, 'en', 'users', 'login_back', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(174, 0, 'en', 'users', 'passwordReset', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(175, 0, 'en', 'users', 'step_1_reg_adv', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(176, 0, 'en', 'users', 'access_code', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(177, 0, 'en', 'users', 'reg_next', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(178, 0, 'en', 'users', 'backToLoginInReg', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(179, 0, 'en', 'users', 'regAdvStep2', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(180, 0, 'en', 'navigation', 'languages', 'Languages', '2016-04-15 18:34:26', '2016-04-16 11:37:35'),
(181, 0, 'en', 'users', 'license', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(182, 0, 'en', 'users', 'company', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(183, 0, 'en', 'users', 'fax', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(184, 0, 'en', 'users', 'web', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(185, 0, 'en', 'users', 'address', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(186, 0, 'en', 'users', 'city', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(187, 0, 'en', 'users', 'cap', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(188, 0, 'en', 'users', 'state', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(189, 0, 'en', 'users', 'country', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(190, 0, 'en', 'users', 'reference', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(191, 0, 'en', 'users', 'phone_reference', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(192, 0, 'en', 'users', 'email_reference', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(193, 0, 'en', 'users', 'company_description', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(194, 0, 'en', 'users', 'NextStep2', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(195, 0, 'en', 'users', 'step_1_reg_pr', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(196, 0, 'en', 'users', 'regPrStep2', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(197, 0, 'en', 'users', 'gratzReg', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(198, 0, 'en', 'users', 'gratzRegExt', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(199, 0, 'en', 'users', 'gratzRegPass', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(200, 0, 'en', 'users', 'backToLogin', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(202, 0, 'en', 'ttemplates', 'id', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(203, 0, 'en', 'roles', 'modifyrole', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(204, 0, 'en', 'navigation', 'roles', 'Role', '2016-04-15 18:34:26', '2016-04-16 11:37:35'),
(205, 0, 'en', 'roles', 'rolelist', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(206, 0, 'en', 'roles', 'usersinrole', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(207, 0, 'en', 'users', 'adduser', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(208, 0, 'en', 'users', 'userlist', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(209, 0, 'en', 'users', 'userview', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(210, 0, 'en', 'users', 'persinfo', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(211, 0, 'en', 'users', 'h_username', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(212, 0, 'en', 'users', 'h_role', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(213, 0, 'en', 'users', 'h_name', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(214, 0, 'en', 'users', 'h_surname', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(215, 0, 'en', 'users', 'contacts', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(216, 0, 'en', 'users', 'h_email', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(217, 0, 'en', 'users', 'h_note', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(218, 0, 'en', 'users', 't_accessData', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(219, 0, 'en', 'users', 'try_wrong_login', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(220, 0, 'en', 'enduser', 'viewall', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(221, 0, 'en', 'enduser', 'reg', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(222, 0, 'en', 'enduser', 'sub', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(223, 0, 'en', 'navigation', 'currency', 'Currency', '2016-04-15 18:34:26', '2016-04-16 11:37:35'),
(224, 0, 'en', 'currency', 'code', 'Code', '2016-04-15 18:34:26', '2019-01-19 18:32:44'),
(225, 0, 'en', 'currency', 'description', 'Description', '2016-04-15 18:34:26', '2019-01-19 18:32:44'),
(226, 0, 'en', 'roles', 'rate', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(227, 0, 'en', 'navigation', 'budget', 'Budget', '2016-04-15 18:34:26', '2016-04-16 11:37:35'),
(228, 0, 'en', 'partners', 'id', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(229, 0, 'en', 'partners', 'description', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(230, 0, 'en', 'partners', 'budget', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(231, 0, 'en', 'partners', 'spent', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(232, 0, 'en', 'partners', 'verified', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(233, 0, 'en', 'faq', 'title', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(234, 0, 'en', 'navigation', 'news', 'News', '2016-04-15 18:34:26', '2016-04-16 11:37:35'),
(235, 0, 'en', 'users', 'logout', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(236, 0, 'en', 'navigation', 'log', 'Log', '2016-04-15 18:34:26', '2016-04-16 11:37:35'),
(238, 0, 'en', 'partner', 'addrole', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(239, 0, 'en', 'partner', 'description', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(240, 0, 'en', 'partners', 'update', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(241, 0, 'en', 'partners', 'modifyrole', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(242, 0, 'en', 'navigation', 'partners', 'Partners', '2016-04-15 18:34:26', '2016-04-16 11:37:35'),
(243, 0, 'en', 'partners', 'rolelist', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(244, 0, 'en', 'partners', 'addrole', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(245, 0, 'en', 'partners', 'usersinrole', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(246, 0, 'en', 'partners', 'roleview', NULL, '2016-04-15 18:34:26', '2016-04-15 18:34:26'),
(247, 0, 'en', 'budget', 'budgetrow', 'Budget row', '2016-04-15 18:34:26', '2016-04-15 18:49:02'),
(248, 0, 'en', 'budget', 'datedocument', 'Document date', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(249, 0, 'en', 'budget', 'datefrom', 'Start date', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(250, 0, 'en', 'budget', 'to', 'To', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(251, 0, 'en', 'budget', 'descriptioncost', 'Description of cost (like plane ticket, Costume, actor in performance, administrative activity related to the project)', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(252, 0, 'en', 'budget', 'descriptionactivity', 'Activity details (like name of performance, city for meeting)', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(253, 0, 'en', 'budget', 'currency', 'Currency', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(254, 0, 'en', 'budget', 'netamount', 'NET amount', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(255, 0, 'en', 'budget', 'vatamount', 'VAT amount', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(256, 0, 'en', 'budget', 'internalnote', 'Internal note (not in reporting)', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(257, 0, 'en', 'budget', 'ispayed', 'Is this cost already payed?', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(258, 0, 'en', 'budget', 'payedby', 'Payment method', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(259, 0, 'en', 'budget', 'paymentdate', 'Payment date', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(260, 0, 'en', 'budget', 'isspecial', 'Is this cost special?', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(261, 0, 'en', 'budget', 'thirdcountry', '3rd country cost', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(262, 0, 'en', 'budget', 'needhelps', 'Do you need some help?', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(263, 0, 'en', 'budget', 'needhelps3rd', 'Only documents emitted by an not EU country are considered a third country costs. Example: a people payed by an EU company ARE NOT third country cost. A freelancer not EU directly payed is a third country cost.', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(264, 0, 'en', 'budget', 'subcontracting', 'Subcontracting', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(265, 0, 'en', 'budget', 'needhelpssub', 'Every cost emitted by a company or a professional is subcontracting.', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(266, 0, 'en', 'budget', 'addinformationtravel', 'Additional information for travel and accomodation', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(267, 0, 'en', 'budget', 'datestart', 'Start date', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(268, 0, 'en', 'budget', 'selectdate', 'Select', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(269, 0, 'en', 'budget', 'dateend', 'End date', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(270, 0, 'en', 'budget', 'numberp', 'VAT amount', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(271, 0, 'en', 'budget', 'namep', 'Name of people involved', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(272, 0, 'en', 'budget', 'rolep', 'Role of people involved', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(273, 0, 'en', 'budget', 'startcountry', 'Start from ( country / city) (for accomodation put here where you live/start ', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(274, 0, 'en', 'budget', 'city', 'City', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(275, 0, 'en', 'budget', 'endcountry', 'To (country / city) (for accomodation put here where you stay)', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(276, 0, 'en', 'budget', 'doc_rel', 'Document related to cost', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(277, 0, 'en', 'budget', 'reldoc', 'Document related to cost', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(278, 0, 'en', 'budget', 'temp_time', 'Timesheet', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(279, 0, 'en', 'budget', 'temp_cash', 'Cash rembuirsement \n', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(280, 0, 'en', 'budget', 'temp_car', 'Car rembuirsement ', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(281, 0, 'en', 'budget', 'temp_sub', 'Daily allowance or subsistence rembuirsement', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(282, 0, 'en', 'budget', 'temp_salary', 'Salary slip summary\n', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(283, 0, 'en', 'budget', 'cost_doc', 'Cost documentation', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(284, 0, 'en', 'budget', 'cost_proof_payment', 'Proof of payment documentation', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(285, 0, 'en', 'budget', 'other_cost_doc', 'Other document related to cost', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(286, 0, 'en', 'budget', 'cost_doc_h', 'How document costs?<br/>\nUpload documents inserted in your accountancy. ', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(287, 0, 'en', 'budget', 'cost_proof_payment_h', 'What you need insert for document the you payed a cost? \nJust need insert proof of payment like bank account with evidence of costs. For partner credit card insert detail of expenses and bank account. \nFor cash payment use model inserted on top or similar document.', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(288, 0, 'en', 'budget', 'other_cost_doc_h', 'Some activities need more documents, like salary. Please insert:\n												 </p><ul><li>For salary and freelancer: contract or letter of appointment(one time), timesheet</li>\n												 <li>For travel: borading pass or train / bus ticket </li>\n												 <li>For print or brochure or good buyed: PDF or pics of goods  </li>\n												 <li>For other costs: all that can prove that costs is related at activities  </li>\n												 <li>For car rembuirsement: use specific model with map and km calculation  </li>\n												 </ul>', '2016-04-15 18:34:27', '2016-04-15 18:49:02'),
(289, 0, 'en', 'generic', 'created_at', 'Created at', '2016-04-15 18:53:31', '2016-04-17 17:43:00'),
(290, 0, 'en', 'navigation', 'partner', 'Partner', '2016-04-15 18:53:31', '2016-04-16 11:37:35'),
(291, 0, 'en', 'generic', 'check', 'Check ', '2016-04-15 18:53:31', '2016-04-17 17:43:00'),
(292, 0, 'en', 'navigation', 'offerts', 'Offers', '2016-04-15 20:59:56', '2016-04-16 11:37:35'),
(293, 0, 'en', 'activities', 'addactivities', 'Add new', '2016-04-15 20:59:56', '2016-04-16 15:13:11'),
(294, 0, 'en', 'activities', 'activity', 'Activity', '2016-04-15 20:59:56', '2016-04-16 15:13:11'),
(295, 0, 'en', 'activities', 'typeactivity', 'Type of Activity', '2016-04-15 20:59:56', '2016-04-16 15:13:11'),
(296, 0, 'en', 'activities', 'place', 'Where (place/discrict/address)', '2016-04-15 20:59:56', '2016-04-16 15:13:11'),
(297, 0, 'en', 'activities', 'description', 'Description', '2016-04-15 20:59:56', '2016-04-16 15:13:11'),
(298, 0, 'en', 'activities', 'update', 'updatable', '2016-04-15 20:59:56', '2016-04-16 15:13:11'),
(299, 0, 'en', 'activities', 'modifyactivities', 'Edit activity', '2016-04-15 20:59:56', '2016-04-16 15:13:11'),
(300, 0, 'en', 'navigation', 'activities', 'Activities', '2016-04-15 20:59:56', '2016-04-16 11:37:35'),
(301, 0, 'en', 'activities', 'activitieslist', 'Activities List', '2016-04-15 20:59:56', '2016-04-16 15:13:11'),
(302, 0, 'en', 'activities', 'id', 'ID', '2016-04-15 20:59:56', '2016-04-16 15:13:11'),
(303, 0, 'en', 'activities', 'closed', 'Activity done', '2016-04-15 20:59:56', '2016-04-16 15:13:11'),
(304, 0, 'en', 'activities', 'activitiesview', 'Activity detail', '2016-04-15 20:59:56', '2016-04-16 15:13:11'),
(305, 0, 'en', 'navigation', 'insertcost', 'Insert cost', '2016-04-15 20:59:56', '2016-04-16 11:37:35'),
(306, 0, 'en', 'navigation', 'insertedcost', 'Inserted cost', '2016-04-15 20:59:56', '2016-04-16 11:37:35'),
(307, 0, 'en', 'navigation', 'tobeverified', 'Cost to be verified', '2016-04-15 20:59:56', '2016-04-16 11:37:35'),
(308, 0, 'en', 'navigation', 'templates', 'Templates', '2016-04-15 20:59:56', '2016-04-16 11:37:35'),
(309, 0, 'en', 'navigation', 'actclass', 'Activity Classification', '2016-04-15 20:59:56', '2016-04-16 11:37:35'),
(310, 0, 'en', 'navigation', 'agenda', 'Calendar', '2016-04-15 20:59:56', '2016-04-16 11:37:35'),
(311, 0, 'en', 'users', 'staffpermbefore', NULL, '2016-04-15 20:59:56', '2016-04-15 20:59:56'),
(312, 0, 'en', 'users', 'stafftempbefore', NULL, '2016-04-15 20:59:56', '2016-04-15 20:59:56'),
(313, 0, 'en', 'users', 'staffpermafter', NULL, '2016-04-15 20:59:56', '2016-04-15 20:59:56'),
(314, 0, 'en', 'users', 'stafftempafter', NULL, '2016-04-15 20:59:56', '2016-04-15 20:59:56'),
(315, 0, 'en', 'typeactivity', 'addtypeactivity', 'Add new', '2016-04-15 20:59:56', '2016-04-16 14:47:46'),
(316, 0, 'en', 'typeactivity', 'description', 'Description', '2016-04-15 20:59:56', '2016-04-16 14:47:46'),
(317, 0, 'en', 'typeactivity', 'modifytypeactivity', 'Edit Activity Classification', '2016-04-15 20:59:56', '2016-04-16 14:47:46'),
(318, 0, 'en', 'navigation', 'typeactivity', 'Activity Classification', '2016-04-15 20:59:56', '2016-04-16 11:37:35'),
(319, 0, 'en', 'typeactivity', 'typeactivitylist', 'Activity Classification List', '2016-04-15 20:59:56', '2016-04-16 14:47:46'),
(320, 0, 'en', 'typeactivity', 'id', 'ID', '2016-04-15 20:59:56', '2016-04-16 14:47:46'),
(321, 0, 'en', 'typeactivity', 'typeactivityview', 'Activity Classification Detail', '2016-04-15 20:59:56', '2016-04-16 14:47:46'),
(322, 0, 'en', 'typeactivity', 'update', 'Updatable', '2016-04-15 20:59:56', '2016-04-16 14:47:46'),
(323, 0, 'en', 'budget', 'closed', NULL, '2016-04-16 15:11:50', '2016-04-16 15:11:50'),
(324, 0, 'en', 'activities', 'country', 'Country', '2016-04-16 15:11:50', '2016-04-16 15:13:11'),
(325, 0, 'en', 'activities', 'city', 'City', '2016-04-16 15:11:50', '2016-04-16 15:13:11'),
(326, 0, 'en', 'activities', 'infobennext', 'Information about beneficiaries involved in next step', '2016-04-16 15:11:50', '2016-04-16 15:13:11'),
(327, 1, 'it', 'admin', 'trend_cost', 'Andamento Visualizzazioni/click Giornaliero', '2016-04-17 17:22:42', '2016-04-17 17:22:42'),
(328, 1, 'it', 'admin', 'trend_cost_h', 'Andamento Visualizzazioni/click Orario', '2016-04-17 17:22:42', '2016-04-17 17:22:42'),
(329, 1, 'it', 'admin', 'campaign_active', 'Campagne attive', '2016-04-17 17:22:42', '2016-04-17 17:22:42'),
(330, 1, 'it', 'admin', 'calendar', 'Agenda del mese', '2016-04-17 17:22:42', '2016-04-17 17:22:42'),
(331, 1, 'it', 'admin', 'see_all', 'Vedi tutto', '2016-04-17 17:22:42', '2016-04-17 17:22:42'),
(332, 1, 'it', 'admin', 'scan_all', 'Scan per giorno degli ultimi  30 giorni - Complessivo ', '2016-04-17 17:22:42', '2016-04-17 17:22:42'),
(333, 1, 'it', 'admin', 'scan_community', 'Scan per giorno degli ultimi  30 giorni (community :community )', '2016-04-17 17:22:42', '2016-04-17 17:22:42'),
(334, 1, 'it', 'admin', 'mostactive', 'Le community più attive degli ultimi 30 giorni', '2016-04-17 17:22:42', '2016-04-17 17:22:42'),
(335, 1, 'it', 'admin', 'stop', '', '2016-04-17 17:22:42', '2016-04-17 17:22:42'),
(336, 1, 'it', 'adv', 'trend_cost', 'Andamento Visualizzazioni/click Giornaliero', '2016-04-17 17:22:42', '2016-04-17 17:22:42'),
(337, 1, 'it', 'adv', 'trend_cost_h', 'Andamento Visualizzazioni/click Orario', '2016-04-17 17:22:42', '2016-04-17 17:22:42'),
(338, 1, 'it', 'adv', 'campaign_active', 'Campagne attive', '2016-04-17 17:22:42', '2016-04-17 17:22:42'),
(339, 1, 'it', 'adv', 'calendar', 'Agenda del mese', '2016-04-17 17:22:42', '2016-04-17 17:22:42'),
(340, 1, 'it', 'adv', 'see_all', 'Vedi tutto', '2016-04-17 17:22:42', '2016-04-17 17:22:42'),
(341, 1, 'it', 'adv', 'mostactive', 'Le offerte più attive degli ultimi 30 giorni', '2016-04-17 17:22:42', '2016-04-17 17:22:42'),
(342, 1, 'it', 'adv', 'stop', '', '2016-04-17 17:22:43', '2016-04-17 17:22:43'),
(343, 1, 'it', 'agenda', 'id', 'Id', '2016-04-17 17:22:43', '2016-04-17 17:22:43'),
(344, 1, 'it', 'agenda', 'description', 'Descrizione', '2016-04-17 17:22:43', '2016-04-17 17:22:43'),
(345, 1, 'it', 'agenda', 'occurrence', 'Ricorenza', '2016-04-17 17:22:43', '2016-04-17 17:22:43'),
(346, 1, 'it', 'agenda', 'active', 'Attivo', '2016-04-17 17:22:43', '2016-04-17 17:22:43'),
(347, 1, 'it', 'agenda', 'expired', 'Scaduto', '2016-04-17 17:22:43', '2016-04-17 17:22:43'),
(348, 1, 'it', 'agenda', 'addlicence', 'Aggiungi una nuova scadenza', '2016-04-17 17:22:43', '2016-04-17 17:22:43'),
(349, 1, 'it', 'agenda', 'agenda', 'Scadenza', '2016-04-17 17:22:43', '2016-04-17 17:22:43'),
(350, 1, 'it', 'agenda', 'agendalist', 'Elenco scadenze', '2016-04-17 17:22:43', '2016-04-17 17:22:43'),
(351, 1, 'it', 'agenda', 'modifyagenda', 'Modifica scadenza', '2016-04-17 17:22:43', '2016-04-17 17:22:43'),
(352, 1, 'it', 'agenda', 'agendaview', 'Dettaglio scadenza', '2016-04-17 17:22:43', '2016-04-17 17:22:43'),
(353, 1, 'it', 'agenda', 'stop', '', '2016-04-17 17:22:43', '2016-04-17 17:22:43'),
(354, 1, 'it', 'campaigns', 'id', 'Id', '2016-04-17 17:22:43', '2016-04-17 17:22:43'),
(355, 1, 'it', 'campaigns', 'description', 'Nome', '2016-04-17 17:22:43', '2016-04-17 17:22:43'),
(356, 1, 'it', 'campaigns', 'community', 'Community', '2016-04-17 17:22:43', '2016-04-17 17:22:43'),
(357, 1, 'it', 'campaigns', 'adv', 'Advertiser', '2016-04-17 17:22:43', '2016-04-17 17:22:43'),
(358, 1, 'it', 'campaigns', 'analitycs_code', 'Codice Analytics', '2016-04-17 17:22:43', '2016-04-17 17:22:43'),
(359, 1, 'it', 'campaigns', 'date_from', 'Inizio campagna', '2016-04-17 17:22:43', '2016-04-17 17:22:43'),
(360, 1, 'it', 'campaigns', 'date_to', 'Fine campagna', '2016-04-17 17:22:43', '2016-04-17 17:22:43'),
(361, 1, 'it', 'campaigns', 'addcampaign', 'Aggiungi una nuova campagna', '2016-04-17 17:22:43', '2016-04-17 17:22:43'),
(362, 1, 'it', 'campaigns', 'created_at', 'Data creazione', '2016-04-17 17:22:43', '2016-04-17 17:22:43'),
(363, 1, 'it', 'campaigns', 'updated_at', 'Data aggiornamento', '2016-04-17 17:22:43', '2016-04-17 17:22:43'),
(364, 1, 'it', 'campaigns', 'user_created', 'Utente creazione', '2016-04-17 17:22:43', '2016-04-17 17:22:43'),
(365, 1, 'it', 'campaigns', 'user_updated', 'Utente aggiornamento', '2016-04-17 17:22:44', '2016-04-17 17:22:44'),
(366, 1, 'it', 'campaigns', 'user_deleted', 'Utente canncellazione', '2016-04-17 17:22:44', '2016-04-17 17:22:44'),
(367, 1, 'it', 'campaigns', 'active', 'Attivo', '2016-04-17 17:22:44', '2016-04-17 17:22:44'),
(368, 1, 'it', 'campaigns', 'complete', 'Completa', '2016-04-17 17:22:44', '2016-04-17 17:22:44'),
(369, 1, 'it', 'campaigns', 'ready', 'Preparata', '2016-04-17 17:22:44', '2016-04-17 17:22:44'),
(370, 1, 'it', 'campaigns', 'deleted', 'Eliminato', '2016-04-17 17:22:44', '2016-04-17 17:22:44'),
(371, 1, 'it', 'campaigns', 'campaignlist', 'Lista campagne', '2016-04-17 17:22:44', '2016-04-17 17:22:44'),
(372, 1, 'it', 'campaigns', 'modifycampaign', 'Modifica campagna', '2016-04-17 17:22:44', '2016-04-17 17:22:44'),
(373, 1, 'it', 'campaigns', 'campaignview', 'Dettaglio campagna', '2016-04-17 17:22:44', '2016-04-17 17:22:44'),
(374, 1, 'it', 'campaigns', 'viewOffers', 'Offerte collegate', '2016-04-17 17:22:44', '2016-04-17 17:22:44'),
(375, 1, 'it', 'campaigns', 'view', 'Scan', '2016-04-17 17:22:44', '2016-04-17 17:22:44'),
(376, 1, 'it', 'campaigns', 'click', 'Share', '2016-04-17 17:22:44', '2016-04-17 17:22:44'),
(377, 1, 'it', 'campaigns', 'state', 'Stato', '2016-04-17 17:22:44', '2016-04-17 17:22:44'),
(378, 1, 'it', 'campaigns', 'community_id', 'Community', '2016-04-17 17:22:44', '2016-04-17 17:22:44'),
(379, 1, 'it', 'campaigns', 'logo', 'Logo', '2016-04-17 17:22:44', '2016-04-17 17:22:44'),
(380, 1, 'it', 'campaigns', 'noother', 'Numero massimo di campagne raggiunto per la licenza. Non è possibile creare altre campagne. ', '2016-04-17 17:22:44', '2016-04-17 17:22:44'),
(381, 1, 'it', 'campaigns', 'stop', '', '2016-04-17 17:22:44', '2016-04-17 17:22:44'),
(382, 1, 'it', 'communities', 'id', 'Id', '2016-04-17 17:22:44', '2016-04-17 17:22:44'),
(383, 1, 'it', 'communities', 'description', 'Descrizione', '2016-04-17 17:22:44', '2016-04-17 17:22:44'),
(384, 1, 'it', 'communities', 'update', 'Aggiornato', '2016-04-17 17:22:44', '2016-04-17 17:22:44'),
(385, 1, 'it', 'communities', 'addcommunity', 'Aggiungi una nuova community', '2016-04-17 17:22:44', '2016-04-17 17:22:44'),
(386, 1, 'it', 'communities', 'community', 'Community', '2016-04-17 17:22:44', '2016-04-17 17:22:44'),
(387, 1, 'it', 'communities', 'short_code', 'Short code', '2016-04-17 17:22:44', '2016-04-17 17:22:44'),
(388, 1, 'it', 'communities', 'template', 'Template', '2016-04-17 17:22:45', '2016-04-17 17:22:45'),
(389, 1, 'it', 'communities', 'communitylist', 'Elenco community', '2016-04-17 17:22:45', '2016-04-17 17:22:45'),
(390, 1, 'it', 'communities', 'modifycommunity', 'Modifica community', '2016-04-17 17:22:45', '2016-04-17 17:22:45'),
(391, 1, 'it', 'communities', 'communityview', 'Dettaglio community', '2016-04-17 17:22:45', '2016-04-17 17:22:45'),
(392, 1, 'it', 'communities', 'usersincommunity', 'Advertiser collegati', '2016-04-17 17:22:45', '2016-04-17 17:22:45'),
(393, 1, 'it', 'communities', 'active', 'Attivo', '2016-04-17 17:22:45', '2016-04-17 17:22:45'),
(394, 1, 'it', 'communities', 'code', 'Codice', '2016-04-17 17:22:45', '2016-04-17 17:22:45'),
(395, 1, 'it', 'communities', 'ready', 'Pronta', '2016-04-17 17:22:45', '2016-04-17 17:22:45'),
(396, 1, 'it', 'communities', 'communityofferts', 'Offerte collegate', '2016-04-17 17:22:45', '2016-04-17 17:22:45'),
(397, 1, 'it', 'communities', 'communitycutomers', 'Advertiser collegati', '2016-04-17 17:22:45', '2016-04-17 17:22:45'),
(398, 1, 'it', 'communities', 'nooffers', 'Non ci sono offerte attive. Resta in contatto!', '2016-04-17 17:22:45', '2016-04-17 17:22:45'),
(399, 1, 'it', 'communities', 'stop', '', '2016-04-17 17:22:45', '2016-04-17 17:22:45'),
(400, 1, 'it', 'customers', 'customername', 'Nome advertiser', '2016-04-17 17:22:45', '2016-04-17 17:22:45'),
(401, 1, 'it', 'customers', 'password', 'Password', '2016-04-17 17:22:45', '2016-04-17 17:22:45'),
(402, 1, 'it', 'customers', 'login', 'Login', '2016-04-17 17:22:45', '2016-04-17 17:22:45'),
(403, 1, 'it', 'customers', 'addcustomer', 'Aggiungi un nuovo advertiser', '2016-04-17 17:22:45', '2016-04-17 17:22:45'),
(404, 1, 'it', 'customers', 'role', 'Ruolo', '2016-04-17 17:22:45', '2016-04-17 17:22:45'),
(405, 1, 'it', 'customers', 'access_code', 'Codice d\'accesso', '2016-04-17 17:22:45', '2016-04-17 17:22:45'),
(406, 1, 'it', 'customers', 'name', 'Nome', '2016-04-17 17:22:45', '2016-04-17 17:22:45'),
(407, 1, 'it', 'customers', 'surname', 'Cognome', '2016-04-17 17:22:45', '2016-04-17 17:22:45'),
(408, 1, 'it', 'customers', 'company', 'Ragione sociale azienda', '2016-04-17 17:22:45', '2016-04-17 17:22:45'),
(409, 1, 'it', 'customers', 'phone', 'Telefono', '2016-04-17 17:22:45', '2016-04-17 17:22:45'),
(410, 1, 'it', 'customers', 'email', 'Email', '2016-04-17 17:22:45', '2016-04-17 17:22:45'),
(411, 1, 'it', 'customers', 'note', 'Note', '2016-04-17 17:22:45', '2016-04-17 17:22:45'),
(412, 1, 'it', 'customers', 'address', 'Indirizzo', '2016-04-17 17:22:45', '2016-04-17 17:22:45'),
(413, 1, 'it', 'customers', 'city', 'Città', '2016-04-17 17:22:45', '2016-04-17 17:22:45'),
(414, 1, 'it', 'customers', 'cap', 'CAP', '2016-04-17 17:22:45', '2016-04-17 17:22:45'),
(415, 1, 'it', 'customers', 'state', 'Provincia', '2016-04-17 17:22:45', '2016-04-17 17:22:45'),
(416, 1, 'it', 'customers', 'license', 'Licenza', '2016-04-17 17:22:45', '2016-04-17 17:22:45'),
(417, 1, 'it', 'customers', 'community', 'Community', '2016-04-17 17:22:45', '2016-04-17 17:22:45'),
(418, 1, 'it', 'customers', 'country', 'Nazione', '2016-04-17 17:22:45', '2016-04-17 17:22:45'),
(419, 1, 'it', 'customers', 'fax', 'Fax', '2016-04-17 17:22:45', '2016-04-17 17:22:45'),
(420, 1, 'it', 'customers', 'web', 'Sito web (http://) (Visibile sulle tue offerte)', '2016-04-17 17:22:46', '2016-04-17 17:22:46'),
(421, 1, 'it', 'customers', 'company_code', 'P.IVA/C.Fiscale', '2016-04-17 17:22:46', '2016-04-17 17:22:46'),
(422, 1, 'it', 'customers', 'contract_from', 'Contratto valido da', '2016-04-17 17:22:46', '2016-04-17 17:22:46'),
(423, 1, 'it', 'customers', 'contract_to', 'Scadenza contratto', '2016-04-17 17:22:46', '2016-04-17 17:22:46'),
(424, 1, 'it', 'customers', 'reference', 'Referente aziendale', '2016-04-17 17:22:46', '2016-04-17 17:22:46'),
(425, 1, 'it', 'customers', 'phone_reference', 'Telefono del referente', '2016-04-17 17:22:46', '2016-04-17 17:22:46'),
(426, 1, 'it', 'customers', 'email_reference', 'Mail del referente', '2016-04-17 17:22:46', '2016-04-17 17:22:46'),
(427, 1, 'it', 'customers', 'company_description', 'Presentazione dell\'azienda', '2016-04-17 17:22:46', '2016-04-17 17:22:46'),
(428, 1, 'it', 'customers', 'created_at', 'Data creazione', '2016-04-17 17:22:46', '2016-04-17 17:22:46'),
(429, 1, 'it', 'customers', 'updated_at', 'Data aggiornamento', '2016-04-17 17:22:46', '2016-04-17 17:22:46'),
(430, 1, 'it', 'customers', 'customer_created', 'Creato da', '2016-04-17 17:22:46', '2016-04-17 17:22:46'),
(431, 1, 'it', 'customers', 'customer_updated', 'Aggiornato da', '2016-04-17 17:22:46', '2016-04-17 17:22:46'),
(432, 1, 'it', 'customers', 'customer_deleted', 'Cancellato da', '2016-04-17 17:22:46', '2016-04-17 17:22:46'),
(433, 1, 'it', 'customers', 'external_login', 'Accesso tramite software esterno', '2016-04-17 17:22:46', '2016-04-17 17:22:46'),
(434, 1, 'it', 'customers', 'ext_login_code', 'Codice accesso esterno', '2016-04-17 17:22:46', '2016-04-17 17:22:46'),
(435, 1, 'it', 'customers', 'type_external_login', 'Tipo accesso esterno', '2016-04-17 17:22:46', '2016-04-17 17:22:46'),
(436, 1, 'it', 'customers', 'lastlogin_at', 'Ultimo accesso', '2016-04-17 17:22:46', '2016-04-17 17:22:46'),
(437, 1, 'it', 'customers', 'try_wrong_login', 'Tentativi di accesso falliti', '2016-04-17 17:22:47', '2016-04-17 17:22:47'),
(438, 1, 'it', 'customers', 'active', 'Attivo', '2016-04-17 17:22:47', '2016-04-17 17:22:47'),
(439, 1, 'it', 'customers', 'deleted', 'Eliminato', '2016-04-17 17:22:47', '2016-04-17 17:22:47'),
(440, 1, 'it', 'customers', 'customerlist', 'Elenco advertiser', '2016-04-17 17:22:47', '2016-04-17 17:22:47'),
(441, 1, 'it', 'customers', 'modifycustomer', 'Modifica advertiser', '2016-04-17 17:22:47', '2016-04-17 17:22:47'),
(442, 1, 'it', 'customers', 'customerview', 'Dettaglio advertiser', '2016-04-17 17:22:47', '2016-04-17 17:22:47'),
(443, 1, 'it', 'customers', 'passwordmodify', 'Password (lasciare vuota per non modificare)', '2016-04-17 17:22:47', '2016-04-17 17:22:47'),
(444, 1, 'it', 'customers', 'persinfo', 'Informazioni personali', '2016-04-17 17:22:47', '2016-04-17 17:22:47'),
(445, 1, 'it', 'customers', 'contacts', 'Recapiti', '2016-04-17 17:22:47', '2016-04-17 17:22:47'),
(446, 1, 'it', 'customers', 'h_customername', 'Nome advertiser con cui si accede a sistema', '2016-04-17 17:22:47', '2016-04-17 17:22:47'),
(447, 1, 'it', 'customers', 'h_password', 'Inserire una password di 8 caratteri con almeno una lettera maiuscola e un numero', '2016-04-17 17:22:47', '2016-04-17 17:22:47'),
(448, 1, 'it', 'customers', 'h_role', 'Ruolo a sistema dell\'advertiser', '2016-04-17 17:22:47', '2016-04-17 17:22:47'),
(449, 1, 'it', 'customers', 'h_access_code', 'Codice d\'accesso', '2016-04-17 17:22:47', '2016-04-17 17:22:47'),
(450, 1, 'it', 'customers', 'h_name', 'Indicare il nome', '2016-04-17 17:22:47', '2016-04-17 17:22:47'),
(451, 1, 'it', 'customers', 'h_surname', 'Indicare il cognome', '2016-04-17 17:22:47', '2016-04-17 17:22:47'),
(452, 1, 'it', 'customers', 'h_company', 'Indicare l\'eventuale azienda', '2016-04-17 17:22:47', '2016-04-17 17:22:47'),
(453, 1, 'it', 'customers', 'h_phone', 'Specificare un numero di telefono completo di prefisso (ad es +41 0000000000) ', '2016-04-17 17:22:47', '2016-04-17 17:22:47'),
(454, 1, 'it', 'customers', 'h_email', 'Specificare una mail attiva e in uso. Saranno inviate a questa mail tutte le comunicazioni rivolte al advertiser.', '2016-04-17 17:22:47', '2016-04-17 17:22:47'),
(455, 1, 'it', 'customers', 'h_note', 'E\' possibile specificare alcune note per l\'advertiser', '2016-04-17 17:22:47', '2016-04-17 17:22:47'),
(456, 1, 'it', 'customers', 'logo', 'Logo', '2016-04-17 17:22:47', '2016-04-17 17:22:47'),
(457, 1, 'it', 'customers', 'h_address', 'Indirizzo di residenza o dell\'azienda', '2016-04-17 17:22:47', '2016-04-17 17:22:47'),
(458, 1, 'it', 'customers', 'h_city', 'Città di residenza o dell\'azienda', '2016-04-17 17:22:47', '2016-04-17 17:22:47'),
(459, 1, 'it', 'customers', 'h_cap', 'CAP di residenza o dell\'azienda', '2016-04-17 17:22:48', '2016-04-17 17:22:48'),
(460, 1, 'it', 'customers', 'h_state', 'Provincia di residenza o dell\'azienda', '2016-04-17 17:22:48', '2016-04-17 17:22:48'),
(461, 1, 'it', 'customers', 'h_country', 'Nazione di residenza o dell\'azienda', '2016-04-17 17:22:48', '2016-04-17 17:22:48'),
(462, 1, 'it', 'customers', 'enter_customername_password', 'Enter any customername and password.', '2016-04-17 17:22:48', '2016-04-17 17:22:48'),
(463, 1, 'it', 'customers', 'enter_code', 'Inserire un codice valido', '2016-04-17 17:22:48', '2016-04-17 17:22:48'),
(464, 1, 'it', 'customers', 'reg_next', 'Procedi con la registrazione', '2016-04-17 17:22:48', '2016-04-17 17:22:48'),
(465, 1, 'it', 'customers', 'step_1_reg_pr', 'Step 1 - inserisci il codice di registrazione', '2016-04-17 17:22:48', '2016-04-17 17:22:48'),
(466, 1, 'it', 'customers', 'step_1_reg_adv', 'Step 1 - inserisci il codice di registrazione', '2016-04-17 17:22:48', '2016-04-17 17:22:48'),
(467, 1, 'it', 'customers', 'regAdvStep2', 'Step 2 - completa il profilo', '2016-04-17 17:22:48', '2016-04-17 17:22:48'),
(468, 1, 'it', 'customers', 'regPrStep2', 'Step 2 - completa il profilo', '2016-04-17 17:22:48', '2016-04-17 17:22:48'),
(469, 1, 'it', 'customers', 'NextStep2', 'Conferma e attiva il tuo profilo', '2016-04-17 17:22:48', '2016-04-17 17:22:48'),
(470, 1, 'it', 'customers', 'gratzReg', 'Congratulazioni!', '2016-04-17 17:22:48', '2016-04-17 17:22:48'),
(471, 1, 'it', 'customers', 'gratzRegExt', 'La registrazione è stata completata con successo. Ti abbiamo inviato una email per attivare l\'accesso al sistema. Controlla la tua casella di posta elettronica. ', '2016-04-17 17:22:48', '2016-04-17 17:22:48'),
(472, 1, 'it', 'customers', 'gratzProfile', 'Congratulazioni!', '2016-04-17 17:22:48', '2016-04-17 17:22:48'),
(473, 1, 'it', 'customers', 'gratzProfileExt', 'Le modifiche al profilo sono state eseguite.', '2016-04-17 17:22:48', '2016-04-17 17:22:48'),
(474, 1, 'it', 'customers', 'login_page', 'Accedi al tuo account', '2016-04-17 17:22:48', '2016-04-17 17:22:48'),
(475, 1, 'it', 'customers', 'reg_promoter', 'Sono un promoter e ho un codice - Registrazione', '2016-04-17 17:22:48', '2016-04-17 17:22:48'),
(476, 1, 'it', 'customers', 'reg_adv', 'Sono un advertiser e ho un codice - Registrazione', '2016-04-17 17:22:48', '2016-04-17 17:22:48'),
(477, 1, 'it', 'customers', 'discover_quikode', 'Scopri Quikode', '2016-04-17 17:22:48', '2016-04-17 17:22:48'),
(478, 1, 'it', 'customers', 'recover_password', 'Problemi di accesso?', '2016-04-17 17:22:48', '2016-04-17 17:22:48'),
(479, 1, 'it', 'customers', 'backToLogin', 'Accedi al sistema', '2016-04-17 17:22:48', '2016-04-17 17:22:48'),
(480, 1, 'it', 'customers', 'backToHome', 'Torna alla dashboard', '2016-04-17 17:22:49', '2016-04-17 17:22:49'),
(481, 1, 'it', 'customers', 'backToLoginInReg', 'Annulla e torna alla pagina di accesso', '2016-04-17 17:22:49', '2016-04-17 17:22:49'),
(482, 1, 'it', 'customers', 'myprofile', 'Il mio profilo', '2016-04-17 17:22:49', '2016-04-17 17:22:49');
INSERT INTO `ltm_translations` (`id`, `status`, `locale`, `group`, `key`, `value`, `created_at`, `updated_at`) VALUES
(483, 1, 'it', 'customers', 'filename', 'Documento', '2016-04-17 17:22:49', '2016-04-17 17:22:49'),
(484, 1, 'it', 'customers', 'date_add', 'caricato in data', '2016-04-17 17:22:49', '2016-04-17 17:22:49'),
(485, 1, 'it', 'customers', 'addDocument', 'Carica documenti', '2016-04-17 17:22:49', '2016-04-17 17:22:49'),
(486, 1, 'it', 'customers', 'documents_related', 'Documenti correlati', '2016-04-17 17:22:49', '2016-04-17 17:22:49'),
(487, 1, 'it', 'customers', 'company_info', 'Informazioni sull\'azienda', '2016-04-17 17:22:49', '2016-04-17 17:22:49'),
(488, 1, 'it', 'customers', 'modify', 'Modifica informazioni dell\'advertiser', '2016-04-17 17:22:49', '2016-04-17 17:22:49'),
(489, 1, 'it', 'customers', 'viewcommunitycustomers', 'Visualizza advertiser', '2016-04-17 17:22:49', '2016-04-17 17:22:49'),
(490, 1, 'it', 'customers', 'h_stop', '', '2016-04-17 17:22:49', '2016-04-17 17:22:49'),
(491, 1, 'it', 'decode', 'Yes', 'Si', '2016-04-17 17:22:49', '2016-04-17 17:22:49'),
(492, 1, 'it', 'decode', 'No', 'No', '2016-04-17 17:22:49', '2016-04-17 17:22:49'),
(493, 1, 'it', 'decode', 'ok', 'Ok', '2016-04-17 17:22:49', '2016-04-17 17:22:49'),
(494, 1, 'it', 'decode', 'apply', 'Applica', '2016-04-17 17:22:49', '2016-04-17 17:22:49'),
(495, 1, 'it', 'emails', 'subject_reg', 'Conferma di registrazione su Quikode.com', '2016-04-17 17:22:49', '2016-04-17 17:22:49'),
(496, 1, 'it', 'emails', 'reg_line1', 'Benvenuto su quikode.com', '2016-04-17 17:22:49', '2016-04-17 17:22:49'),
(497, 1, 'it', 'emails', 'reg_line2', 'Ti sei registrato con successo al sistema http://community.quikode.com', '2016-04-17 17:22:49', '2016-04-17 17:22:49'),
(498, 1, 'it', 'emails', 'reg_line3', 'Ora puoi accedere a sistema e impostare la tua prima offerta.', '2016-04-17 17:22:49', '2016-04-17 17:22:49'),
(499, 1, 'it', 'emails', 'reg_line6', 'Per ogni necessità puoi contattarci attraverso il sistema di richiesta assistenza online.', '2016-04-17 17:22:49', '2016-04-17 17:22:49'),
(500, 1, 'it', 'emails', 'reg_line7', 'Buon lavoro!', '2016-04-17 17:22:49', '2016-04-17 17:22:49'),
(501, 1, 'it', 'emails', 'reg_line8', 'Mr. Quikode ', '2016-04-17 17:22:49', '2016-04-17 17:22:49'),
(502, 1, 'it', 'emails', 'usubject_reg', 'Hai aderito a una offerta su Quikode.com', '2016-04-17 17:22:49', '2016-04-17 17:22:49'),
(503, 1, 'it', 'emails', 'ureg_line1', 'Caro ', '2016-04-17 17:22:49', '2016-04-17 17:22:49'),
(504, 1, 'it', 'emails', 'ureg_line2', 'Ti sei registrato con successo a un offerta di http://quikode.com', '2016-04-17 17:22:49', '2016-04-17 17:22:49'),
(505, 1, 'it', 'emails', 'ureg_line7', 'Buon divertimento!', '2016-04-17 17:22:50', '2016-04-17 17:22:50'),
(506, 1, 'it', 'emails', 'ureg_line8', 'Mr. Quikode ', '2016-04-17 17:22:50', '2016-04-17 17:22:50'),
(507, 1, 'it', 'emails', 'change_license', 'Notifica di aggiornamento licenza - Quikode.com', '2016-04-17 17:22:50', '2016-04-17 17:22:50'),
(508, 1, 'it', 'emails', 'cl_line1', ' ', '2016-04-17 17:22:50', '2016-04-17 17:22:50'),
(509, 1, 'it', 'emails', 'cl_line2', 'La tua licenza è stata aggiornata.', '2016-04-17 17:22:50', '2016-04-17 17:22:50'),
(510, 1, 'it', 'emails', 'cl_line3', 'Ora puoi accedere al sistema http://community.quikode.com e aggiornare le tue offerte!', '2016-04-17 17:22:50', '2016-04-17 17:22:50'),
(511, 1, 'it', 'emails', 'cl_line6', 'Per ogni necessità puoi contattarci attraverso il sistema di richiesta assistenza online.', '2016-04-17 17:22:50', '2016-04-17 17:22:50'),
(512, 1, 'it', 'emails', 'cl_line7', 'Buon lavoro!', '2016-04-17 17:22:50', '2016-04-17 17:22:50'),
(513, 1, 'it', 'emails', 'cl_line8', 'Mr. Quikode ', '2016-04-17 17:22:50', '2016-04-17 17:22:50'),
(514, 1, 'it', 'emails', 'subject_change_pwd', 'Conferma di cambio password su Quikode.com', '2016-04-17 17:22:50', '2016-04-17 17:22:50'),
(515, 1, 'it', 'emails', 'change_pwd_line1', 'Gentile ', '2016-04-17 17:22:50', '2016-04-17 17:22:50'),
(516, 1, 'it', 'emails', 'change_pwd_line2', 'Ti confermiamo che ai cambiato con successo la tua password d\'accesso al sistema http://community.quikode.com', '2016-04-17 17:22:50', '2016-04-17 17:22:50'),
(517, 1, 'it', 'emails', 'change_pwd_line3', 'Per ogni necessità puoi contattarci attraverso il sistema di richiesta assistenza online.', '2016-04-17 17:22:50', '2016-04-17 17:22:50'),
(518, 1, 'it', 'emails', 'change_pwd_line4', 'Buon lavoro!', '2016-04-17 17:22:50', '2016-04-17 17:22:50'),
(519, 1, 'it', 'emails', 'change_pwd_line5', 'Mr. Quikode ', '2016-04-17 17:22:50', '2016-04-17 17:22:50'),
(520, 1, 'it', 'emails', 'new_ticket_from', 'New ticket from', '2016-04-17 17:22:50', '2016-04-17 17:22:50'),
(521, 1, 'it', 'emails', 'stop', '', '2016-04-17 17:22:50', '2016-04-17 17:22:50'),
(522, 1, 'it', 'enduser', 'id', 'Id', '2016-04-17 17:22:50', '2016-04-17 17:22:50'),
(523, 1, 'it', 'enduser', 'date', 'Data', '2016-04-17 17:22:50', '2016-04-17 17:22:50'),
(524, 1, 'it', 'enduser', 'description', 'Descrizione', '2016-04-17 17:22:50', '2016-04-17 17:22:50'),
(525, 1, 'it', 'enduser', 'community_id', 'Community', '2016-04-17 17:22:50', '2016-04-17 17:22:50'),
(526, 1, 'it', 'enduser', 'campaign_id', 'Campagna', '2016-04-17 17:22:50', '2016-04-17 17:22:50'),
(527, 1, 'it', 'enduser', 'template_id', 'Template', '2016-04-17 17:22:50', '2016-04-17 17:22:50'),
(528, 1, 'it', 'enduser', 'analitycs_code', 'Codice Analytics', '2016-04-17 17:22:50', '2016-04-17 17:22:50'),
(529, 1, 'it', 'enduser', 'reg_required', 'Registrazione obbligatoria', '2016-04-17 17:22:50', '2016-04-17 17:22:50'),
(530, 1, 'it', 'enduser', 'reg_active', 'Registrazione attiva', '2016-04-17 17:22:50', '2016-04-17 17:22:50'),
(531, 1, 'it', 'enduser', 'occurrence', 'Nr. registrazioni consentite', '2016-04-17 17:22:50', '2016-04-17 17:22:50'),
(532, 1, 'it', 'enduser', 'complete', 'Offerta completa', '2016-04-17 17:22:50', '2016-04-17 17:22:50'),
(533, 1, 'it', 'enduser', 'ready', 'Offerta pronta', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(534, 1, 'it', 'enduser', 'active', 'Offerta attiva', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(535, 1, 'it', 'enduser', 'date_from', 'dalla data', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(536, 1, 'it', 'enduser', 'date_to', 'alla data', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(537, 1, 'it', 'enduser', 'update', 'Aggiornato', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(538, 1, 'it', 'enduser', 'addoffert', 'Aggiungi una nuova offerta', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(539, 1, 'it', 'enduser', 'offert', 'Offerta', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(540, 1, 'it', 'enduser', 'offertpublish', 'Pubblicazione', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(541, 1, 'it', 'enduser', 'offertpublishN', 'Pubblicami', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(542, 1, 'it', 'enduser', 'offertpublishY', 'Offerta pubblicata', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(543, 1, 'it', 'enduser', 'offertlist', 'Registrati – Sottoscrizioni', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(544, 1, 'it', 'enduser', 'reg', 'Registrati', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(545, 1, 'it', 'enduser', 'sub', 'Iscrizioni', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(546, 1, 'it', 'enduser', 'viewall', 'View all', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(547, 1, 'it', 'enduser', 'modifyoffert', 'Edit', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(548, 1, 'it', 'enduser', 'offertview', 'Detail', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(549, 1, 'it', 'enduser', 'usersinoffert', 'Nr. users', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(550, 1, 'it', 'enduser', 'viewofferts', 'Visualizza offerte', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(551, 1, 'it', 'enduser', 'CampaignToOffers', 'Offerte collegate alla campagna', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(552, 1, 'it', 'enduser', 'CommunityToOffers', 'Offerte collegate alla community ', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(553, 1, 'it', 'enduser', 'allOffers', ' Tutte le registrazioni / sottoscrizioni', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(554, 1, 'it', 'enduser', 'attribute', 'Altre informazioni', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(555, 1, 'it', 'enduser', 'value', 'Testo visualizzato', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(556, 1, 'it', 'enduser', 'offertdetail', 'Dettagli dell\'offerta', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(557, 1, 'it', 'enduser', 'details', 'informazioni aggiuntive', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(558, 1, 'it', 'enduser', 'plan_addoffert', 'Pianifica un\'offerta', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(559, 1, 'it', 'enduser', 'plan_offert', 'Offerta', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(560, 1, 'it', 'enduser', 'plan_from', 'Inizio pianificazione', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(561, 1, 'it', 'enduser', 'plan_to', 'Fine pianificazione', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(562, 1, 'it', 'enduser', 'img1', 'Carica prima immagine', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(563, 1, 'it', 'enduser', 'img2', 'Carica seconda immagine', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(564, 1, 'it', 'enduser', 'img3', 'Carica terza immagine', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(565, 1, 'it', 'enduser', 'format', 'formati consentiti: JPG/PNG (max 250 kb)', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(566, 1, 'it', 'enduser', 'imgtemplate', 'Immagini da inserire nel template', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(567, 1, 'it', 'enduser', 'campaignLabel', 'Titolo pagina', '2016-04-17 17:22:51', '2016-04-17 17:22:51'),
(568, 1, 'it', 'enduser', 'title', 'Titolo', '2016-04-17 17:22:52', '2016-04-17 17:22:52'),
(569, 1, 'it', 'enduser', 'title2', 'Frase di invito', '2016-04-17 17:22:52', '2016-04-17 17:22:52'),
(570, 1, 'it', 'enduser', 'long_description', 'Descrizione (consigliate 25 parole)', '2016-04-17 17:22:52', '2016-04-17 17:22:52'),
(571, 1, 'it', 'enduser', 'valid_until', 'Scadenza', '2016-04-17 17:22:52', '2016-04-17 17:22:52'),
(572, 1, 'it', 'enduser', 'address', 'Indirizzo', '2016-04-17 17:22:52', '2016-04-17 17:22:52'),
(573, 1, 'it', 'enduser', 'phone', 'Telefono', '2016-04-17 17:22:52', '2016-04-17 17:22:52'),
(574, 1, 'it', 'enduser', 'other', 'Altro', '2016-04-17 17:22:52', '2016-04-17 17:22:52'),
(575, 1, 'it', 'enduser', 'email', 'email', '2016-04-17 17:22:52', '2016-04-17 17:22:52'),
(576, 1, 'it', 'enduser', 'name', 'Nome', '2016-04-17 17:22:52', '2016-04-17 17:22:52'),
(577, 1, 'it', 'enduser', 'allOffersNamed', 'Tutte le registrazioni di :name ', '2016-04-17 17:22:52', '2016-04-17 17:22:52'),
(578, 1, 'it', 'enduser', 'alert_edit', 'Ricordare di aggiornare le informazioni con “Salva” e quindi procedere all\'attivazione dell\'offerta dall\'elenco', '2016-04-17 17:22:52', '2016-04-17 17:22:52'),
(579, 1, 'it', 'enduser', 'offertdefault', 'Offerta standard', '2016-04-17 17:22:52', '2016-04-17 17:22:52'),
(580, 1, 'it', 'enduser', 'offertdefaultN', 'Rendi l\'offerta standard ', '2016-04-17 17:22:52', '2016-04-17 17:22:52'),
(581, 1, 'it', 'enduser', 'offertdefaultY', 'Disattiva l\'offerta', '2016-04-17 17:22:52', '2016-04-17 17:22:52'),
(582, 1, 'it', 'enduser', 'plan', 'Pianifica la campagna', '2016-04-17 17:22:52', '2016-04-17 17:22:52'),
(583, 1, 'it', 'enduser', 'overwrite', 'Sovrascrivi le pianificazioni precedenti', '2016-04-17 17:22:52', '2016-04-17 17:22:52'),
(584, 1, 'it', 'enduser', 'barcode', 'Unique barcode', '2016-04-17 17:22:52', '2016-04-17 17:22:52'),
(585, 1, 'it', 'enduser', 'alfacode', 'Unique alfanumeric code', '2016-04-17 17:22:52', '2016-04-17 17:22:52'),
(586, 1, 'it', 'enduser', 'code', 'Codice offerta', '2016-04-17 17:22:52', '2016-04-17 17:22:52'),
(587, 1, 'it', 'enduser', 'time', 'L\'ora di Mr.Quikode (GMT+1) è ', '2016-04-17 17:22:52', '2016-04-17 17:22:52'),
(588, 1, 'it', 'enduser', 'regreq', 'Registrazione', '2016-04-17 17:22:52', '2016-04-17 17:22:52'),
(589, 1, 'it', 'enduser', 'regact', 'Sottoscrizione', '2016-04-17 17:22:52', '2016-04-17 17:22:52'),
(590, 1, 'it', 'enduser', 'noreg', '', '2016-04-17 17:22:52', '2016-04-17 17:22:52'),
(591, 1, 'it', 'enduser', 'stop', '', '2016-04-17 17:22:52', '2016-04-17 17:22:52'),
(592, 0, 'it', 'generic', 'view', 'Visualizza', '2016-04-17 17:22:52', '2016-04-17 17:43:00'),
(593, 0, 'it', 'generic', 'modify', 'Modifica', '2016-04-17 17:22:52', '2016-04-17 17:43:00'),
(594, 0, 'it', 'generic', 'edit', 'Modifica', '2016-04-17 17:22:53', '2016-04-17 17:43:00'),
(595, 0, 'it', 'generic', 'new', 'Nuovo', '2016-04-17 17:22:53', '2016-04-17 17:43:00'),
(596, 0, 'it', 'generic', 'cancell', 'Annulla', '2016-04-17 17:22:53', '2016-04-17 17:43:00'),
(597, 0, 'it', 'generic', 'delete', 'Elimina', '2016-04-17 17:22:53', '2016-04-17 17:43:00'),
(598, 0, 'it', 'generic', 'save', 'Salva', '2016-04-17 17:22:53', '2016-04-17 17:43:00'),
(599, 0, 'it', 'generic', 'savecontinue', 'Salva & Continua a modificare', '2016-04-17 17:22:53', '2016-04-17 17:43:00'),
(600, 0, 'it', 'generic', 'update', 'Aggiorna', '2016-04-17 17:22:53', '2016-04-17 17:43:00'),
(601, 0, 'it', 'generic', 'back', 'Indietro', '2016-04-17 17:22:53', '2016-04-17 17:43:00'),
(602, 0, 'it', 'generic', 'reset', 'Annulla le modifiche', '2016-04-17 17:22:53', '2016-04-17 17:43:00'),
(603, 0, 'it', 'generic', 'activate', 'Attiva', '2016-04-17 17:22:53', '2016-04-17 17:43:00'),
(604, 0, 'it', 'generic', 'disactivate', 'Disattiva', '2016-04-17 17:22:53', '2016-04-17 17:43:00'),
(605, 0, 'it', 'generic', 'download', 'Scarica', '2016-04-17 17:22:53', '2016-04-17 17:43:00'),
(606, 0, 'it', 'generic', 'file', 'Documento', '2016-04-17 17:22:53', '2016-04-17 17:43:00'),
(607, 0, 'it', 'generic', 'nologo', 'Immagine non disponibile', '2016-04-17 17:22:53', '2016-04-17 17:43:00'),
(608, 0, 'it', 'generic', 'editDetail', 'Informazioni aggiuntive', '2016-04-17 17:22:53', '2016-04-17 17:43:00'),
(609, 0, 'it', 'generic', 'Share_with_friend', 'Condividi con gli amici!', '2016-04-17 17:22:53', '2016-04-17 17:43:00'),
(610, 0, 'it', 'generic', 'pleaseselect', 'Seleziona un valore', '2016-04-17 17:22:53', '2016-04-17 17:43:00'),
(611, 0, 'it', 'generic', 'active', 'attive', '2016-04-17 17:22:53', '2016-04-17 17:43:00'),
(612, 0, 'it', 'generic', 'yes', 'Sì', '2016-04-17 17:22:53', '2016-04-17 17:43:00'),
(613, 0, 'it', 'generic', 'no', 'No', '2016-04-17 17:22:53', '2016-04-17 17:43:00'),
(614, 0, 'it', 'generic', 'all', 'Tutti', '2016-04-17 17:22:53', '2016-04-17 17:43:00'),
(615, 0, 'it', 'generic', 'filter', 'Filtra', '2016-04-17 17:22:53', '2016-04-17 17:43:00'),
(616, 0, 'it', 'generic', 'exportcsv', 'Salva file CSV', '2016-04-17 17:22:53', '2016-04-17 17:43:00'),
(617, 0, 'it', 'generic', 'exportxls', 'Salva file XLS', '2016-04-17 17:22:53', '2016-04-17 17:43:00'),
(618, 0, 'it', 'generic', 'viewmore', 'Vedi tutti', '2016-04-17 17:22:53', '2016-04-17 17:43:00'),
(619, 1, 'it', 'helpdesk', 'id', 'Id', '2016-04-17 17:22:53', '2016-04-17 17:22:53'),
(620, 1, 'it', 'helpdesk', 'description', 'Descrizione', '2016-04-17 17:22:53', '2016-04-17 17:22:53'),
(621, 1, 'it', 'helpdesk', 'update', 'Aggiornato', '2016-04-17 17:22:53', '2016-04-17 17:22:53'),
(622, 1, 'it', 'helpdesk', 'sendticket', 'Invia un nuovo ticket', '2016-04-17 17:22:53', '2016-04-17 17:22:53'),
(623, 1, 'it', 'helpdesk', 'ticket', 'Ticket', '2016-04-17 17:22:53', '2016-04-17 17:22:53'),
(624, 1, 'it', 'helpdesk', 'subject', 'Soggetto', '2016-04-17 17:22:54', '2016-04-17 17:22:54'),
(625, 1, 'it', 'helpdesk', 'message', 'Messagio', '2016-04-17 17:22:54', '2016-04-17 17:22:54'),
(626, 1, 'it', 'helpdesk', 'dest', 'Destinatario', '2016-04-17 17:22:54', '2016-04-17 17:22:54'),
(627, 1, 'it', 'helpdesk', 'send', 'Invia', '2016-04-17 17:22:54', '2016-04-17 17:22:54'),
(628, 1, 'it', 'helpdesk', 'sendSuccess', 'Il messaggio ', '2016-04-17 17:22:54', '2016-04-17 17:22:54'),
(629, 1, 'it', 'helpdesk', 'sendError', 'Il messaggio non ', '2016-04-17 17:22:54', '2016-04-17 17:22:54'),
(630, 1, 'it', 'helpdesk', 'stop', '', '2016-04-17 17:22:54', '2016-04-17 17:22:54'),
(631, 1, 'it', 'home', 'home', 'Pannello di controllo', '2016-04-17 17:22:54', '2016-04-17 17:22:54'),
(632, 1, 'it', 'home', 'promoter', 'Utenti', '2016-04-17 17:22:54', '2016-04-17 17:22:54'),
(633, 1, 'it', 'home', 'roles', 'Ruoli', '2016-04-17 17:22:54', '2016-04-17 17:22:54'),
(634, 1, 'it', 'home', 'languages', 'Lingue', '2016-04-17 17:22:54', '2016-04-17 17:22:54'),
(635, 1, 'it', 'initialcode', 'id', 'Id', '2016-04-17 17:22:54', '2016-04-17 17:22:54'),
(636, 1, 'it', 'initialcode', 'code', 'Codice', '2016-04-17 17:22:54', '2016-04-17 17:22:54'),
(637, 1, 'it', 'initialcode', 'community_id', 'Community', '2016-04-17 17:22:54', '2016-04-17 17:22:54'),
(638, 1, 'it', 'initialcode', 'number_code', 'Nr. codici disponibili', '2016-04-17 17:22:54', '2016-04-17 17:22:54'),
(639, 1, 'it', 'initialcode', 'license_id', 'Licenza', '2016-04-17 17:22:54', '2016-04-17 17:22:54'),
(640, 1, 'it', 'initialcode', 'promoter_id', 'Promoter', '2016-04-17 17:22:54', '2016-04-17 17:22:54'),
(641, 1, 'it', 'initialcode', 'expired_at', 'Scadenza codice', '2016-04-17 17:22:54', '2016-04-17 17:22:54'),
(642, 1, 'it', 'initialcode', 'expire_at', 'Scadenza codice', '2016-04-17 17:22:54', '2016-04-17 17:22:54'),
(643, 1, 'it', 'initialcode', 'used', 'Usato', '2016-04-17 17:22:55', '2016-04-17 17:22:55'),
(644, 1, 'it', 'initialcode', 'user_generator', 'Generato', '2016-04-17 17:22:55', '2016-04-17 17:22:55'),
(645, 1, 'it', 'initialcode', 'used_by_user_id', 'Utilizato da', '2016-04-17 17:22:55', '2016-04-17 17:22:55'),
(646, 1, 'it', 'initialcode', 'active', 'Attivo', '2016-04-17 17:22:55', '2016-04-17 17:22:55'),
(647, 1, 'it', 'initialcode', 'deleted', 'Cancellato', '2016-04-17 17:22:55', '2016-04-17 17:22:55'),
(648, 1, 'it', 'initialcode', 'expired', 'Scaduto', '2016-04-17 17:22:55', '2016-04-17 17:22:55'),
(649, 1, 'it', 'initialcode', 'update', 'Aggiornato', '2016-04-17 17:22:55', '2016-04-17 17:22:55'),
(650, 1, 'it', 'initialcode', 'addinitialcode', 'Aggiungi un nuovo codice', '2016-04-17 17:22:55', '2016-04-17 17:22:55'),
(651, 1, 'it', 'initialcode', 'offert', 'Offerta', '2016-04-17 17:22:55', '2016-04-17 17:22:55'),
(652, 1, 'it', 'initialcode', 'codeList', 'Elenco codici d\'accesso', '2016-04-17 17:22:55', '2016-04-17 17:22:55'),
(653, 1, 'it', 'initialcode', 'modifycode', 'Modifica codice', '2016-04-17 17:22:55', '2016-04-17 17:22:55'),
(654, 1, 'it', 'initialcode', 'codeview', 'Dettaglio codice', '2016-04-17 17:22:55', '2016-04-17 17:22:55'),
(655, 1, 'it', 'initialcode', 'used_by', 'Utilizato da', '2016-04-17 17:22:55', '2016-04-17 17:22:55'),
(656, 1, 'it', 'initialcode', 'created_by', 'Creato da', '2016-04-17 17:22:55', '2016-04-17 17:22:55'),
(657, 1, 'it', 'initialcode', 'addCode', 'Crea codice', '2016-04-17 17:22:55', '2016-04-17 17:22:55'),
(658, 1, 'it', 'initialcode', 'exportnotused', 'Download CSV - codici non usati', '2016-04-17 17:22:55', '2016-04-17 17:22:55'),
(659, 1, 'it', 'initialcode', 'unused', 'Visualizza solo non usati', '2016-04-17 17:22:55', '2016-04-17 17:22:55'),
(660, 1, 'it', 'initialcode', 'all', 'Visualizza tutti', '2016-04-17 17:22:55', '2016-04-17 17:22:55'),
(661, 1, 'it', 'initialcode', 'stop', '', '2016-04-17 17:22:55', '2016-04-17 17:22:55'),
(662, 1, 'it', 'languages', 'id', 'Id', '2016-04-17 17:22:55', '2016-04-17 17:22:55'),
(663, 1, 'it', 'languages', 'description', 'Descrizione', '2016-04-17 17:22:55', '2016-04-17 17:22:55'),
(664, 1, 'it', 'languages', 'code', 'Codice', '2016-04-17 17:22:55', '2016-04-17 17:22:55'),
(665, 1, 'it', 'languages', 'addlanguage', 'Aggiungi una nuova lingua', '2016-04-17 17:22:55', '2016-04-17 17:22:55'),
(666, 1, 'it', 'languages', 'language', 'Lingua', '2016-04-17 17:22:55', '2016-04-17 17:22:55'),
(667, 1, 'it', 'languages', 'languagelist', 'Lista lingue', '2016-04-17 17:22:55', '2016-04-17 17:22:55'),
(668, 1, 'it', 'languages', 'modifylanguage', 'Modifica lingua', '2016-04-17 17:22:55', '2016-04-17 17:22:55'),
(669, 1, 'it', 'languages', 'languageview', 'Dettaglio lingua', '2016-04-17 17:22:55', '2016-04-17 17:22:55'),
(670, 1, 'it', 'languages', 'stop', '', '2016-04-17 17:22:55', '2016-04-17 17:22:55'),
(671, 1, 'it', 'licences', 'id', 'Id', '2016-04-17 17:22:55', '2016-04-17 17:22:55'),
(672, 1, 'it', 'licences', 'description', 'Descrizione', '2016-04-17 17:22:55', '2016-04-17 17:22:55'),
(673, 1, 'it', 'licences', 'occurrence', 'Numero di campagne attivabili', '2016-04-17 17:22:56', '2016-04-17 17:22:56'),
(674, 1, 'it', 'licences', 'active', 'Attivo', '2016-04-17 17:22:56', '2016-04-17 17:22:56'),
(675, 1, 'it', 'licences', 'expired', 'Scaduto', '2016-04-17 17:22:56', '2016-04-17 17:22:56'),
(676, 1, 'it', 'licences', 'addlicence', 'Aggiungi una nuova licenza', '2016-04-17 17:22:56', '2016-04-17 17:22:56'),
(677, 1, 'it', 'licences', 'licence', 'Licenza', '2016-04-17 17:22:56', '2016-04-17 17:22:56'),
(678, 1, 'it', 'licences', 'licencelist', 'Lista licenze', '2016-04-17 17:22:56', '2016-04-17 17:22:56'),
(679, 1, 'it', 'licences', 'modifylicence', 'Modifica licenza', '2016-04-17 17:22:56', '2016-04-17 17:22:56'),
(680, 1, 'it', 'licences', 'licenceview', 'Dettaglio licenza', '2016-04-17 17:22:56', '2016-04-17 17:22:56'),
(681, 1, 'it', 'licences', 'stop', '', '2016-04-17 17:22:56', '2016-04-17 17:22:56'),
(682, 0, 'en', 'activities_detail', 'title', 'Information', '2016-04-17 17:23:40', '2016-04-17 17:33:47'),
(683, 0, 'en', 'activities_detail', 'forseen', 'Foreseen  number', '2016-04-17 17:23:40', '2016-04-17 17:33:47'),
(684, 0, 'en', 'activities_detail', 'realized', 'Effective number', '2016-04-17 17:23:40', '2016-04-17 17:33:47'),
(685, 0, 'en', 'activities_detail', 'comment', 'Internal comment about data inserted', '2016-04-17 17:23:40', '2016-04-17 17:33:47'),
(691, 0, 'en', 'generic', 'cancel', 'Cancel', '2016-04-17 17:23:40', '2016-04-17 17:43:00'),
(692, 0, 'en', 'activities_detail', 'line1', 'What types of activities have been implemented in relation to activity about Project management (activities necessary to the management and to the implementation of the project)', '2016-04-17 17:26:24', '2016-04-17 17:33:47'),
(693, 0, 'en', 'activities_detail', 'line2', 'What types of activities have been implemented in relation to activity about Project implementation: Cultural activities', '2016-04-17 17:26:24', '2016-04-17 17:33:47'),
(694, 0, 'en', 'activities_detail', 'line3', 'What types of activities have been implemented in relation to activity about Project implementation: Support activities', '2016-04-17 17:26:24', '2016-04-17 17:33:47'),
(695, 0, 'en', 'activities_detail', 'line4', 'What types of activities have been implemented in relation to activity about Project implementation: Results', '2016-04-17 17:26:24', '2016-04-17 17:33:47'),
(696, 0, 'en', 'activities_detail', 'line5', 'What types of activities have been implemented in relation to activity about Project implementation: studies, evaluations or policy analysis', '2016-04-17 17:26:24', '2016-04-17 17:33:47'),
(697, 0, 'en', 'activities_detail', 'line6', 'What types of individuals did directly benefit from the activities?', '2016-04-17 17:26:24', '2016-04-17 17:33:47'),
(698, 0, 'en', 'activities_detail', 'line7', 'What types of organisations benefitted directly from the activities?', '2016-04-17 17:26:25', '2016-04-17 17:33:47'),
(699, 0, 'en', 'activities_detail', 'line8', 'What was the audience of the project?', '2016-04-17 17:26:25', '2016-04-17 17:33:47'),
(700, 0, 'en', 'activities_detail', 'line9', 'Does the project tackle an equal opportunity theme?', '2016-04-17 17:26:25', '2016-04-17 17:33:47'),
(701, 0, 'en', 'currency', 'rate', 'Rate', '2019-01-19 18:32:34', '2019-01-19 18:32:44');

-- --------------------------------------------------------

--
-- Struttura della tabella `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `migrations`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `created_at`, `deleted_at`) VALUES
(1, 'Access to SIMPLE', 'You received your personal access. If not or if is not correct, please write at lead partner \r\nRemember to specify name surname mail and partner related.\r\n', '2016-02-23 08:08:08', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `partner`
--

CREATE TABLE `partner` (
  `id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `budget` decimal(15,2) NOT NULL,
  `short` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `staffpermbefore` int(11) DEFAULT NULL,
  `stafftempbefore` int(11) DEFAULT NULL,
  `staffpermafter` int(11) DEFAULT NULL,
  `stafftempafter` int(11) DEFAULT NULL,
  `country` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `partner`
--

INSERT INTO `partner` (`id`, `description`, `budget`, `short`, `staffpermbefore`, `stafftempbefore`, `staffpermafter`, `stafftempafter`, `country`) VALUES
(1, 'Lead Partner', '425587.00', 'LP', NULL, NULL, NULL, NULL, NULL),
(2, 'Partner', '275360.00', 'P2', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura stand-in per le viste `partner_view`
-- (Vedi sotto per la vista effettiva)
--
CREATE TABLE `partner_view` (
`id` int(11)
,`description` varchar(255)
,`budget` decimal(15,2)
,`inserted` decimal(65,6)
,`spent` decimal(65,6)
,`verified` decimal(65,6)
);

-- --------------------------------------------------------

--
-- Struttura della tabella `password_reminders`
--

CREATE TABLE `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `payedby`
--

CREATE TABLE `payedby` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `payedby`
--

INSERT INTO `payedby` (`id`, `description`) VALUES
(1, 'Bank transfer'),
(2, 'Credit card'),
(3, 'Cash reimbursement'),
(4, 'No payed yet');

-- --------------------------------------------------------

--
-- Struttura della tabella `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `update` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `roles`
--

INSERT INTO `roles` (`id`, `description`, `update`) VALUES
(1, 'admin', 1),
(3, 'partner', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `typeactivity`
--

CREATE TABLE `typeactivity` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `typeactivity`
--

INSERT INTO `typeactivity` (`id`, `description`) VALUES
(1, 'Other activity'),
(15, 'Micro event'),
(16, 'Macro event'),
(17, 'Conference');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `lastlogin_at` datetime DEFAULT NULL,
  `last_pwd_changed_at` datetime DEFAULT NULL,
  `last_pwd_change_request_at` datetime DEFAULT NULL,
  `user_created` int(11) NOT NULL,
  `user_updated` int(11) DEFAULT NULL,
  `user_deleted` int(11) DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `try_wrong_login` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `partner` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `name`, `surname`, `phone`, `email`, `created_at`, `updated_at`, `deleted_at`, `lastlogin_at`, `last_pwd_changed_at`, `last_pwd_change_request_at`, `user_created`, `user_updated`, `user_deleted`, `remember_token`, `try_wrong_login`, `active`, `deleted`, `partner`) VALUES
(1, 'admin@admin.it', '$2y$10$3H/YbZa/DEBMRl2zmu6Ch.2/HASW8ywMAkRYXKElYk2rQG2hpcckK', 1, 'Support', 'Caravan', '', 'support@caravanext.eu', '2015-06-14 00:00:00', '2018-08-08 11:52:10', '0000-00-00 00:00:00', '2018-08-08 11:31:15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'RmGuvxqtVB9IQp4XDV0gdZKkdarWhnMLaQi0jRFB0FiwnxICSDhprtXoEpIy', 0, 1, 0, 1),
(2, 'partner@partner.it', '$2y$10$3H/YbZa/DEBMRl2zmu6Ch.2/HASW8ywMAkRYXKElYk2rQG2hpcckK', 3, 'Partner', 'Partner', '', 'per@caravanext.eu', '2016-02-24 01:57:22', '2016-10-24 16:05:57', NULL, '2016-10-24 16:05:57', NULL, NULL, 1, 0, 0, NULL, 0, 1, 0, 2),
(10, 'support@caravanext.eu', '$2y$10$3H/YbZa/DEBMRl2zmu6Ch.2/HASW8ywMAkRYXKElYk2rQG2hpcckK', 1, 'Support', 'Caravan', '', 'support@caravanext.eu', '2015-06-13 22:00:00', '2019-04-27 18:47:55', NULL, '2019-04-27 18:47:55', NULL, NULL, 0, 0, 0, 'RmGuvxqtVB9IQp4XDV0gdZKkdarWhnMLaQi0jRFB0FiwnxICSDhprtXoEpIy', 0, 1, 0, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `users_event`
--

CREATE TABLE `users_event` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `message` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `users_event`
--

INSERT INTO `users_event` (`id`, `created_at`, `message`, `type`, `user_id`) VALUES
(1, '2019-04-27 18:47:55', 'ALast access to system at 27/04/2019 18:47:55 ', 'info', 10);

-- --------------------------------------------------------

--
-- Struttura stand-in per le viste `view_cost`
-- (Vedi sotto per la vista effettiva)
--
CREATE TABLE `view_cost` (
`id` int(10) unsigned
,`created_at` datetime
,`short` varchar(10)
,`budgetrow` int(11)
,`currency` varchar(3)
,`netamount` decimal(15,2)
,`vatamount` decimal(15,2)
,`euronetamount` decimal(15,2)
,`eurovatamount` decimal(15,2)
,`eurototal` decimal(16,2)
,`partner` int(11)
,`kind` int(11)
);

-- --------------------------------------------------------

--
-- Struttura stand-in per le viste `v_activities_detail_sum`
-- (Vedi sotto per la vista effettiva)
--
CREATE TABLE `v_activities_detail_sum` (
`typeindicator` int(11)
,`title` varchar(1000)
,`forseen` decimal(32,0)
,`realized` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Struttura stand-in per le viste `v_budget_macro`
-- (Vedi sotto per la vista effettiva)
--
CREATE TABLE `v_budget_macro` (
`partner` int(11)
,`macro1` int(11)
,`description` varchar(80)
,`amount` decimal(37,2)
,`amountspent` decimal(65,6)
,`amountverified` decimal(65,6)
);

-- --------------------------------------------------------

--
-- Struttura stand-in per le viste `v_budget_partner`
-- (Vedi sotto per la vista effettiva)
--
CREATE TABLE `v_budget_partner` (
`partner` int(11)
,`sum(amountbudget)` decimal(37,2)
,`amountinserted` decimal(65,6)
,`amountspent` decimal(65,6)
,`amountactivable` decimal(65,6)
,`amountundercheck` decimal(65,6)
,`amountverified` decimal(65,6)
);

-- --------------------------------------------------------

--
-- Struttura stand-in per le viste `v_budget_spent`
-- (Vedi sotto per la vista effettiva)
--
CREATE TABLE `v_budget_spent` (
`id` int(11)
,`partner` int(11)
,`row` varchar(10)
,`macro1` int(11)
,`codedest` varchar(10)
,`description` varchar(1000)
,`kind` int(11)
,`amountbudget` decimal(15,2)
,`amountinserted` decimal(46,6)
,`amountspent` decimal(46,6)
,`amountactivable` decimal(46,6)
,`amountundercheck` decimal(46,6)
,`amountverified` decimal(46,6)
);

-- --------------------------------------------------------

--
-- Struttura stand-in per le viste `v_budget_spent_macro`
-- (Vedi sotto per la vista effettiva)
--
CREATE TABLE `v_budget_spent_macro` (
`partner` int(11)
,`macro1` int(11)
,`amountspent` decimal(65,6)
,`amountverified` decimal(65,6)
);

-- --------------------------------------------------------

--
-- Struttura stand-in per le viste `v_chapter1_view`
-- (Vedi sotto per la vista effettiva)
--
CREATE TABLE `v_chapter1_view` (
`row` varchar(10)
,`Item selected in extimate budget` varchar(200)
,`reference` int(10) unsigned
,`supplier` varchar(200)
,`Date of invoice` datetime
,`Date of payment` datetime
,`currency` varchar(3)
,`Net amount` decimal(15,2)
,`VAT aount` decimal(15,2)
,`Start date of action` datetime
,`End date of action` datetime
,`Number of the activity` varchar(20)
,`Purpose of the expense` varchar(2000)
,`Activity` varchar(1000)
,`Name of beneficiaries` varchar(255)
,`country` varchar(2)
,`Exchange rate` decimal(10,4)
,`Amount` decimal(21,2)
,`Third country costs` varchar(3)
,`Subcontracting` varchar(3)
,`payed` varchar(3)
,`verified` varchar(3)
,`partner` int(11)
);

-- --------------------------------------------------------

--
-- Struttura stand-in per le viste `v_chapter2_view`
-- (Vedi sotto per la vista effettiva)
--
CREATE TABLE `v_chapter2_view` (
`row` varchar(10)
,`Item selected in extimate budget` varchar(200)
,`reference` int(10) unsigned
,`supplier` varchar(200)
,`Date of invoice` datetime
,`Date of payment` datetime
,`currency` varchar(3)
,`Net amount` decimal(15,2)
,`VAT aount` decimal(15,2)
,`Start date of action` datetime
,`End date of action` datetime
,`Number of the activity` varchar(20)
,`Purpose of the expense` varchar(2000)
,`Activity` varchar(1000)
,`Name of beneficiaries` varchar(255)
,`country` varchar(2)
,`Exchange rate` decimal(10,4)
,`Amount` decimal(21,2)
,`Third country costs` varchar(3)
,`Subcontracting` varchar(3)
,`payed` varchar(3)
,`verified` varchar(3)
,`partner` int(11)
);

-- --------------------------------------------------------

--
-- Struttura stand-in per le viste `v_chapter3_view`
-- (Vedi sotto per la vista effettiva)
--
CREATE TABLE `v_chapter3_view` (
);

-- --------------------------------------------------------

--
-- Struttura stand-in per le viste `v_chapter4_view`
-- (Vedi sotto per la vista effettiva)
--
CREATE TABLE `v_chapter4_view` (
`row` varchar(10)
,`Item selected in extimate budget` varchar(200)
,`reference` int(10) unsigned
,`Name of person` varchar(2000)
,`supplier` varchar(200)
,`Description task` varchar(2000)
,`dayworked` int(11)
,`Date of invoice` datetime
,`Date of payment` datetime
,`currency` varchar(3)
,`Net amount` decimal(15,2)
,`VAT aount` decimal(15,2)
,`Start date of action` datetime
,`End date of action` datetime
,`Number of the activity` varchar(20)
,`Activity` varchar(1000)
,`Name of beneficiaries` varchar(255)
,`country` varchar(2)
,`Exchange rate` decimal(10,4)
,`Amount` decimal(21,2)
,`Third country costs` varchar(3)
,`Subcontracting` varchar(3)
,`payed` varchar(3)
,`verified` varchar(3)
,`partner` int(11)
);

-- --------------------------------------------------------

--
-- Struttura per vista `partner_view`
--
DROP TABLE IF EXISTS `partner_view`;

CREATE  VIEW `partner_view`  AS  select `partner`.`id` AS `id`,`partner`.`description` AS `description`,`partner`.`budget` AS `budget`,`v_budget_partner`.`amountinserted` AS `inserted`,`v_budget_partner`.`amountspent` AS `spent`,`v_budget_partner`.`amountverified` AS `verified` from (`partner` join `v_budget_partner` on((`partner`.`id` = `v_budget_partner`.`partner`))) ;

-- --------------------------------------------------------

--
-- Struttura per vista `view_cost`
--
DROP TABLE IF EXISTS `view_cost`;

CREATE  VIEW `view_cost`  AS  select `cost`.`id` AS `id`,`cost`.`created_at` AS `created_at`,`partner`.`short` AS `short`,`cost`.`budgetrow` AS `budgetrow`,`cost`.`currency` AS `currency`,`cost`.`netamount` AS `netamount`,`cost`.`vatamount` AS `vatamount`,`cost`.`euronetamount` AS `euronetamount`,`cost`.`eurovatamount` AS `eurovatamount`,(`cost`.`euronetamount` + `cost`.`eurovatamount`) AS `eurototal`,`cost`.`partner` AS `partner`,`budget`.`kind` AS `kind` from ((`cost` join `partner` on((`cost`.`partner` = `partner`.`id`))) join `budget` on((`cost`.`budgetrow` = `budget`.`id`))) ;

-- --------------------------------------------------------

--
-- Struttura per vista `v_activities_detail_sum`
--
DROP TABLE IF EXISTS `v_activities_detail_sum`;

CREATE  VIEW `v_activities_detail_sum`  AS  select `activities_detail`.`typeindicator` AS `typeindicator`,`activities_detail`.`title` AS `title`,sum(`activities_detail`.`forseen`) AS `forseen`,sum(`activities_detail`.`realized`) AS `realized` from `activities_detail` where isnull(`activities_detail`.`deleted_at`) group by `activities_detail`.`typeindicator`,`activities_detail`.`title` ;

-- --------------------------------------------------------

--
-- Struttura per vista `v_budget_macro`
--
DROP TABLE IF EXISTS `v_budget_macro`;

CREATE  VIEW `v_budget_macro`  AS  select `budget`.`partner` AS `partner`,`budget`.`macro1` AS `macro1`,`budgetmacro`.`description` AS `description`,sum(`budget`.`amount`) AS `amount`,coalesce(`v_budget_spent_macro`.`amountspent`,0) AS `amountspent`,coalesce(`v_budget_spent_macro`.`amountverified`,0) AS `amountverified` from ((`budget` join `budgetmacro` on((`budget`.`macro1` = `budgetmacro`.`id`))) left join `v_budget_spent_macro` on(((`v_budget_spent_macro`.`macro1` = `budget`.`macro1`) and (`v_budget_spent_macro`.`partner` = `budget`.`partner`)))) group by `budget`.`partner`,`budget`.`macro1`,`budgetmacro`.`description` ;

-- --------------------------------------------------------

--
-- Struttura per vista `v_budget_partner`
--
DROP TABLE IF EXISTS `v_budget_partner`;

CREATE  VIEW `v_budget_partner`  AS  select `v_budget_spent`.`partner` AS `partner`,sum(`v_budget_spent`.`amountbudget`) AS `sum(amountbudget)`,sum(`v_budget_spent`.`amountinserted`) AS `amountinserted`,sum(`v_budget_spent`.`amountspent`) AS `amountspent`,sum(`v_budget_spent`.`amountactivable`) AS `amountactivable`,sum(`v_budget_spent`.`amountundercheck`) AS `amountundercheck`,sum(`v_budget_spent`.`amountverified`) AS `amountverified` from `v_budget_spent` group by `v_budget_spent`.`partner` ;

-- --------------------------------------------------------

--
-- Struttura per vista `v_budget_spent`
--
DROP TABLE IF EXISTS `v_budget_spent`;

CREATE  VIEW `v_budget_spent`  AS  select `budget`.`id` AS `id`,`budget`.`partner` AS `partner`,`budget`.`codedest` AS `row`,`budget`.`macro1` AS `macro1`,`budget`.`codedest` AS `codedest`,`budget`.`description` AS `description`,`budget`.`kind` AS `kind`,max(`budget`.`amount`) AS `amountbudget`,(sum(coalesce((`cost`.`netamount` / `currency`.`rate`),0)) + sum(coalesce((`cost`.`vatamount` / `currency`.`rate`),0))) AS `amountinserted`,(sum((case when (`cost`.`payedby` <> 4) then coalesce((`cost`.`netamount` / `currency`.`rate`),0) else 0 end)) + sum((case when (`cost`.`payedby` <> 4) then coalesce((`cost`.`vatamount` / `currency`.`rate`),0) else 0 end))) AS `amountspent`,(sum((case when ((`cost`.`payedby` <> 4) and (`cost`.`active` = 0)) then coalesce((`cost`.`netamount` / `currency`.`rate`),0) else 0 end)) + sum((case when ((`cost`.`payedby` <> 4) and (`cost`.`active` = 0)) then coalesce((`cost`.`vatamount` / `currency`.`rate`),0) else 0 end))) AS `amountactivable`,(sum((case when ((`cost`.`verified` = 0) and (`cost`.`active` = 1)) then coalesce((`cost`.`netamount` / `currency`.`rate`),0) else 0 end)) + sum((case when ((`cost`.`verified` = 0) and (`cost`.`active` = 1)) then coalesce((`cost`.`vatamount` / `currency`.`rate`),0) else 0 end))) AS `amountundercheck`,(sum((case when (`cost`.`verified` = 1) then coalesce((`cost`.`netamount` / `currency`.`rate`),0) else 0 end)) + sum((case when (`cost`.`verified` = 1) then coalesce((`cost`.`vatamount` / `currency`.`rate`),0) else 0 end))) AS `amountverified` from ((`budget` left join `cost` on((`cost`.`budgetrow` = `budget`.`id`))) left join `currency` on((`cost`.`currency` = `currency`.`description`))) group by `budget`.`id`,`budget`.`partner`,`budget`.`macro1`,`budget`.`codedest`,`budget`.`description` ;

-- --------------------------------------------------------

--
-- Struttura per vista `v_budget_spent_macro`
--
DROP TABLE IF EXISTS `v_budget_spent_macro`;

CREATE  VIEW `v_budget_spent_macro`  AS  select `v_budget_spent`.`partner` AS `partner`,`v_budget_spent`.`macro1` AS `macro1`,sum(`v_budget_spent`.`amountspent`) AS `amountspent`,sum(`v_budget_spent`.`amountverified`) AS `amountverified` from `v_budget_spent` group by `v_budget_spent`.`partner`,`v_budget_spent`.`macro1` ;

-- --------------------------------------------------------

--
-- Struttura per vista `v_chapter1_view`
--
DROP TABLE IF EXISTS `v_chapter1_view`;

CREATE  VIEW `v_chapter1_view`  AS  select `budget`.`codedest` AS `row`,`budget`.`inreporting` AS `Item selected in extimate budget`,`cost`.`id` AS `reference`,`cost`.`supplier` AS `supplier`,`cost`.`d_document` AS `Date of invoice`,`cost`.`d_document_paid` AS `Date of payment`,`cost`.`currency` AS `currency`,`cost`.`netamount` AS `Net amount`,`cost`.`vatamount` AS `VAT aount`,`cost`.`d_document_start` AS `Start date of action`,`cost`.`d_document_stop` AS `End date of action`,`budget`.`workplan` AS `Number of the activity`,`cost`.`description_cost` AS `Purpose of the expense`,`cost`.`activity` AS `Activity`,`partner`.`description` AS `Name of beneficiaries`,`partner`.`country` AS `country`,`currency`.`rate` AS `Exchange rate`,round(((`cost`.`netamount` + `cost`.`vatamount`) / `currency`.`rate`),2) AS `Amount`,(case when (`cost`.`tpc` = 1) then 'YES' else 'NO' end) AS `Third country costs`,(case when (`cost`.`sub` = 1) then 'YES' else 'NO' end) AS `Subcontracting`,(case when (`cost`.`payedby` = 4) then 'NO' else 'YES' end) AS `payed`,(case when (`cost`.`verified` = 1) then 'YES' else 'NO' end) AS `verified`,`cost`.`partner` AS `partner` from (((`cost` join `partner` on((`cost`.`partner` = `partner`.`id`))) join `budget` on((`cost`.`budgetrow` = `budget`.`id`))) join `currency` on((`cost`.`currency` = `currency`.`description`))) where ((`cost`.`deleted` = 0) and (`budget`.`macro1` = 1)) ;

-- --------------------------------------------------------

--
-- Struttura per vista `v_chapter2_view`
--
DROP TABLE IF EXISTS `v_chapter2_view`;

CREATE  VIEW `v_chapter2_view`  AS  select `budget`.`codedest` AS `row`,`budget`.`inreporting` AS `Item selected in extimate budget`,`cost`.`id` AS `reference`,`cost`.`supplier` AS `supplier`,`cost`.`d_document` AS `Date of invoice`,`cost`.`d_document_paid` AS `Date of payment`,`cost`.`currency` AS `currency`,`cost`.`netamount` AS `Net amount`,`cost`.`vatamount` AS `VAT aount`,`cost`.`d_document_start` AS `Start date of action`,`cost`.`d_document_stop` AS `End date of action`,`budget`.`workplan` AS `Number of the activity`,`cost`.`description_cost` AS `Purpose of the expense`,`cost`.`activity` AS `Activity`,`partner`.`description` AS `Name of beneficiaries`,`partner`.`country` AS `country`,`currency`.`rate` AS `Exchange rate`,round(((`cost`.`netamount` + `cost`.`vatamount`) / `currency`.`rate`),2) AS `Amount`,(case when (`cost`.`tpc` = 1) then 'YES' else 'NO' end) AS `Third country costs`,(case when (`cost`.`sub` = 1) then 'YES' else 'NO' end) AS `Subcontracting`,(case when (`cost`.`payedby` = 4) then 'NO' else 'YES' end) AS `payed`,(case when (`cost`.`verified` = 1) then 'YES' else 'NO' end) AS `verified`,`cost`.`partner` AS `partner` from (((`cost` join `partner` on((`cost`.`partner` = `partner`.`id`))) join `budget` on((`cost`.`budgetrow` = `budget`.`id`))) join `currency` on((`cost`.`currency` = `currency`.`description`))) where ((`cost`.`deleted` = 0) and (`budget`.`macro1` = 2)) ;

-- --------------------------------------------------------

--
-- Struttura per vista `v_chapter3_view`
--
DROP TABLE IF EXISTS `v_chapter3_view`;

CREATE  VIEW `v_chapter3_view`  AS  select `budget`.`codedest` AS `row`,`budget`.`inreporting` AS `Item selected in extimate budget`,`cost`.`id` AS `reference`,`cost`.`d_document_start` AS `Start date of action`,`cost`.`d_document_stop` AS `End date of action`,`budget`.`workplan` AS `Number of the activity`,`cost`.`activity` AS `Activity`,`cost`.`description_cost` AS `Purpose of the expense`,`partner`.`description` AS `Name of beneficiaries`,`partner`.`country` AS `country`,`cost`.`name_people` AS `Name of people who travel`,`cost`.`from_city` AS `from_city`,`country`.`description` AS `from_nation`,`cost`.`to_city` AS `to_city`,`province2`.`description` AS `to_nation`,(to_days(`cost`.`d_document_stop`) - to_days(`cost`.`d_document_start`)) AS `number_of_day`,`cost`.`currency` AS `currency`,`cost`.`netamount` AS `Net amount`,`cost`.`vatamount` AS `VAT amount`,`currency`.`rate` AS `Exchange rate`,round(((`cost`.`netamount` + `cost`.`vatamount`) / `currency`.`rate`),2) AS `Amount`,`cost`.`d_document_paid` AS `Date of payment`,(case when (`cost`.`tpc` = 1) then 'YES' else 'NO' end) AS `Third country costs`,(case when (`cost`.`payedby` = 4) then 'NO' else 'YES' end) AS `payed`,(case when (`cost`.`verified` = 1) then 'YES' else 'NO' end) AS `verified`,`cost`.`partner` AS `partner` from (((((`cost` join `partner` on((`cost`.`partner` = `partner`.`id`))) join `budget` on((`cost`.`budgetrow` = `budget`.`id`))) join `currency` on((`cost`.`currency` = `currency`.`description`))) left join `country` on((`cost`.`from_nation` = `country`.`id`))) left join `country` `province2` on((`cost`.`to_nation` = `country`.`id`))) where ((`cost`.`deleted` = 0) and (`budget`.`macro1` = 3)) ;

-- --------------------------------------------------------

--
-- Struttura per vista `v_chapter4_view`
--
DROP TABLE IF EXISTS `v_chapter4_view`;

CREATE  VIEW `v_chapter4_view`  AS  select `budget`.`codedest` AS `row`,`budget`.`inreporting` AS `Item selected in extimate budget`,`cost`.`id` AS `reference`,`cost`.`name_people` AS `Name of person`,`cost`.`supplier` AS `supplier`,`cost`.`description_cost` AS `Description task`,`cost`.`dayworked` AS `dayworked`,`cost`.`d_document` AS `Date of invoice`,`cost`.`d_document_paid` AS `Date of payment`,`cost`.`currency` AS `currency`,`cost`.`netamount` AS `Net amount`,`cost`.`vatamount` AS `VAT aount`,`cost`.`d_document_start` AS `Start date of action`,`cost`.`d_document_stop` AS `End date of action`,`budget`.`workplan` AS `Number of the activity`,`cost`.`activity` AS `Activity`,`partner`.`description` AS `Name of beneficiaries`,`partner`.`country` AS `country`,`currency`.`rate` AS `Exchange rate`,round(((`cost`.`netamount` + `cost`.`vatamount`) / `currency`.`rate`),2) AS `Amount`,(case when (`cost`.`tpc` = 1) then 'YES' else 'NO' end) AS `Third country costs`,(case when (`cost`.`sub` = 1) then 'YES' else 'NO' end) AS `Subcontracting`,(case when (`cost`.`payedby` = 4) then 'NO' else 'YES' end) AS `payed`,(case when (`cost`.`verified` = 1) then 'YES' else 'NO' end) AS `verified`,`cost`.`partner` AS `partner` from (((`cost` join `partner` on((`cost`.`partner` = `partner`.`id`))) join `budget` on((`cost`.`budgetrow` = `budget`.`id`))) join `currency` on((`cost`.`currency` = `currency`.`description`))) where ((`cost`.`deleted` = 0) and (`budget`.`macro1` = 4)) ;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `activities_detail`
--
ALTER TABLE `activities_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `activities_detail_model`
--
ALTER TABLE `activities_detail_model`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `budgetmacro`
--
ALTER TABLE `budgetmacro`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `cost`
--
ALTER TABLE `cost`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `ltm_translations`
--
ALTER TABLE `ltm_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `password_reminders`
--
ALTER TABLE `password_reminders`
  ADD KEY `password_reminders_email_index` (`email`),
  ADD KEY `password_reminders_token_index` (`token`);

--
-- Indici per le tabelle `payedby`
--
ALTER TABLE `payedby`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `typeactivity`
--
ALTER TABLE `typeactivity`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users_event`
--
ALTER TABLE `users_event`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT per la tabella `activities_detail`
--
ALTER TABLE `activities_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `activities_detail_model`
--
ALTER TABLE `activities_detail_model`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT per la tabella `budget`
--
ALTER TABLE `budget`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1079;

--
-- AUTO_INCREMENT per la tabella `cost`
--
ALTER TABLE `cost`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT per la tabella `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT per la tabella `ltm_translations`
--
ALTER TABLE `ltm_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=702;

--
-- AUTO_INCREMENT per la tabella `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT per la tabella `typeactivity`
--
ALTER TABLE `typeactivity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT per la tabella `users_event`
--
ALTER TABLE `users_event`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
