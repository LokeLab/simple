-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2016 alle 00:12
-- Versione del server: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `caravannext`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `budget`
--

CREATE TABLE IF NOT EXISTS `budget` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `macro1` int(11) DEFAULT NULL,
  `macro2` int(11) DEFAULT '0',
  `macro3` int(11) DEFAULT '0',
  `codedest` varchar(10) DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `activity` varchar(20) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `partner` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=705 ;

--
-- Dump dei dati per la tabella `budget`
--

INSERT INTO `budget` (`id`, `macro1`, `macro2`, `macro3`, `codedest`, `amount`, `activity`, `description`, `partner`) VALUES
(2, 1, 1, 1, '1.1.1', '1400.00', '2.2', '1.1.1 Copyright - Royalties Macro event', 2),
(3, 1, 2, 1, '1.2.1', '2000.00', '2.2', '1.2.1 Premises hire', 2),
(4, 1, 3, 1, '1.3.1', '5000.00', '2.2', '1.3.1 Electronic equipment ', 2),
(5, 1, 4, 1, '1.4.1', '1500.00', '2.2', '1.4.1 Material macro events', 2),
(6, 1, 4, 2, '1.4.2', '800.00', '2.2', '1.4.2 Set design and costumes', 2),
(7, 1, 6, 1, '1.6.1', '1000.00', '2.2', '1.6.1 Rent of one minibus macro event', 2),
(8, 1, 6, 2, '1.6.2', '400.00', '2.2', '1.6.2 Other services macro event', 2),
(9, 1, 7, 1, '1.7.1', '1500.00', '2.2', '1.7.1 Insurance equipment macro', 2),
(10, 1, 7, 2, '1.7.2', '1000.00', '3.2', '1.7.2 Insurance equipment micro', 2),
(11, 1, 7, 3, '1.7.3', '2000.00', '2.2', '1.7.3 Insurance team macro', 2),
(12, 1, 7, 4, '1.7.4', '600.00', '3.2', '1.7.4 Insurance team micro', 2),
(13, 1, 9, 1, '1.9.1', '1200.00', '3.2', '1.9.1 Food & beverage', 2),
(14, 3, 1, 1, '3.1.1', '1600.00', '2.2', '3.1.1 transport actors for the other macro events', 2),
(15, 3, 1, 2, '3.1.2', '7200.00', '7.2', '3.1.2 transport equipe of management', 2),
(16, 3, 1, 3, '3.1.3', '2400.00', '6.4', '3.1.3 travel conference extra-eu', 2),
(17, 3, 2, 1, '3.2.1', '4480.00', '2.2', '3.2.1 hotel actors for the others macro events ', 2),
(18, 3, 2, 2, '3.2.2', '9280.00', '7.2', '3.2.2 hotel equipe of management', 2),
(19, 3, 2, 3, '3.2.3', '2520.00', '6.4', '3.2.3 travel conference extra-eu', 2),
(20, 3, 3, 1, '3.3.1', '3360.00', '2.2', '3.3.1 Subsistence allowance for the other macro events ', 2),
(21, 3, 3, 2, '3.3.2', '6960.00', '7.2', '3.3.2 Substistence allowance management equipe (3 persons)', 2),
(22, 3, 3, 3, '3.3.3', '360.00', '6.4', '3.3.3 travel conference extra-eu', 2),
(23, 4, 1, 1, '4.1.1', '75600.00', '7.1', '4.1.1 Project manager/officer part time - Alessandro Pontremoli', 2),
(24, 4, 1, 1, '4.1.1', '29400.00', '7.1', '4.1.1 Administration manager part time - Monica Cini', 2),
(25, 4, 1, 2, '4.1.2', '58800.00', '7.1', '4.1.2 Project assistent part time - to be determined', 2),
(26, 4, 2, 5, '4.2.5', '7800.00', '6.3', '4.2.5 Interpreters and translators', 2),
(27, 4, 2, 6, '4.2.6', '9000.00', '4.2', '4.2.6 External speakers', 2),
(28, 4, 3, 1, '4.3.1', '15400.00', '2.1', '4.3.1 Artistic coordinator part time - Alberto Pagliarino - from 23rd to the end of the project', 2),
(29, 4, 3, 1, '4.3.1', '30800.00', '3.1', '4.3.1 Artistic coordinator part time - Alberto Pagliarino - from 23rd to the end of the project', 2),
(30, 4, 3, 2, '4.3.2', '18000.00', '2.2', '4.3.2 Middle artist - Community trainer - Part Time', 2),
(31, 4, 3, 2, '4.3.2', '18000.00', '2.2', '4.3.2 Middle artist - Community trainer - Part Time', 2),
(32, 4, 3, 2, '4.3.2', '18000.00', '2.2', '4.3.2 Middle artist - Community trainer - Part Time', 2),
(33, 4, 3, 2, '4.3.2', '18000.00', '2.2', '4.3.2 Middle artist - Community trainer - Part Time', 2),
(34, 4, 3, 2, '4.3.2', '4000.00', '2.2', '4.3.2 Senior artist - Community trainer ', 2),
(35, 4, 3, 2, '4.3.2', '4000.00', '2.2', '4.3.2 Senior artist - Community trainer ', 2),
(36, 4, 3, 2, '4.3.2', '3900.00', '2.2', '4.3.2 Medium artist - Community trainer ', 2),
(37, 4, 3, 2, '4.3.2', '3900.00', '2.3', '4.3.2 Medium artist - Community trainer ', 2),
(38, 4, 3, 2, '4.3.2', '4000.00', '2.2', '4.3.2 Junior artist - Community trainer ', 2),
(39, 4, 3, 2, '4.3.2', '11200.00', '2.2', '4.3.2 Travelling artist - Maurizio Bertolini', 2),
(40, 4, 3, 3, '4.3.3', '75600.00', '5.2', '4.3.3 Mtehodological supervisor - Alessandra Ghiglione', 2),
(41, 4, 3, 3, '4.3.3', '14400.00', '5.2', '4.3.3 Mtehodological supervisor assistant ', 2),
(42, 4, 3, 3, '4.3.3', '43200.00', '5.1', '4.3.3 Assesment and evaluation researcher', 2),
(43, 4, 3, 3, '4.3.3', '25200.00', '5.1', '4.3.3 Assesment and evaluation researcher', 2),
(44, 4, 3, 3, '4.3.3', '18000.00', '5.1', '4.3.3 Assesment and evaluation researcher', 2),
(45, 4, 3, 3, '4.3.3', '43200.00', '5.3', '4.3.3 Business Model researcher', 2),
(46, 4, 3, 3, '4.3.3', '43200.00', '5.3', '4.3.3 Business Model researcher', 2),
(47, 4, 3, 3, '4.3.3', '39600.00', '5.3', '4.3.3 Business Model researcher', 2),
(48, 4, 3, 4, '4.3.4', '3500.00', '2.2', '4.3.4 Technicians Macro', 2),
(49, 4, 3, 4, '4.3.4', '3500.00', '2.2', '4.3.4 Technicians Macro', 2),
(50, 4, 3, 4, '4.3.4', '6300.00', '2.2', '4.3.4 Videoperator Macro', 2),
(51, 5, 0, 0, '5', '35000.00', '', '5 INDIRECT COSTS (MAX. 7% OF THE DIRECT COSTS)', 2),
(142, 1, 1, 1, '1.1.1', '700.00', NULL, '1.1.1 Copyright - Royalties Macro event', 3),
(143, 1, 1, 2, '1.1.2', '300.00', NULL, '1.1.2 Copyright - Royalties Micro Events', 3),
(144, 1, 2, 1, '1.2.1', '700.00', NULL, '1.2.1 Premises hire', 3),
(145, 1, 3, 1, '1.3.1', '320.00', NULL, '1.3.1 Equipment hire', 3),
(146, 1, 4, 1, '1.4.1', '4000.00', NULL, '1.4.1 Material macro events', 3),
(147, 1, 4, 2, '1.4.2', '5000.00', NULL, '1.4.2 Set design and costumes', 3),
(148, 1, 4, 3, '1.4.3', '2500.00', NULL, '1.4.3 Materials micro events', 3),
(149, 1, 6, 1, '1.6.1', '300.00', NULL, '1.6.1 Other services macro event', 3),
(150, 1, 6, 2, '1.6.2', '270.00', NULL, '1.6.2 Other services macro event', 3),
(151, 1, 7, 1, '1.7.1', '400.00', NULL, '1.7.1 Insurance equipment macro', 3),
(152, 1, 7, 2, '1.7.2', '200.00', NULL, '1.7.2 Insurance equipment micro', 3),
(153, 1, 7, 3, '1.7.3', '800.00', NULL, '1.7.3 Insurance team macro', 3),
(154, 1, 7, 4, '1.7.4', '200.00', NULL, '1.7.4 Insurance team micro', 3),
(155, 1, 9, 1, '1.9.1', '1000.00', NULL, '1.9.1 Food & beverage', 3),
(156, 1, 10, 1, '1.10.1', '500.00', NULL, '1.10.1 Power and internet supply', 3),
(157, 2, 1, 1, '2.1.1', '2000.00', NULL, '2.1.1 Program Macro', 3),
(158, 2, 1, 2, '2.1.2', '1350.00', NULL, '2.1.2 Program Micro', 3),
(159, 2, 1, 3, '2.1.3', '1000.00', NULL, '2.1.3 Posters Macro', 3),
(160, 2, 1, 4, '2.1.4', '630.00', NULL, '2.1.4 Posters Micro', 3),
(161, 2, 2, 1, '2.2.1', '400.00', NULL, '2.2.1 Advertising space (publicity TV, radio, press conference, social networks, etc.)', 3),
(162, 2, 2, 1, '2.2.1.1', '400.00', NULL, '2.2.1.1 Advertising on newspapers', 3),
(163, 2, 2, 2, '2.2.2', '300.00', NULL, '2.2.2 Purchase of materials (T-shirt, flyers, papers, posters, etc. )', 3),
(164, 2, 2, 2, '2.2.2.1', '300.00', NULL, '2.2.2.1 staff partner T-shirt', 3),
(165, 2, 3, 2, '2.3.2', '4000.00', NULL, '2.3.2 Other (specify)', 3),
(166, 2, 3, 2, '2.3.2.1', '4000.00', NULL, '2.3.2.1 Social media content curator', 3),
(167, 3, 1, 1, '3.1.1', '2400.00', NULL, '3.1.1 transport actors for the other macro events', 3),
(168, 3, 1, 2, '3.1.2', '11200.00', NULL, '3.1.2 transport equipe of management', 3),
(169, 3, 1, 3, '3.1.3', '3200.00', NULL, '3.1.3 travel conference extra-eu', 3),
(170, 3, 1, 4, '3.1.4', '2500.00', NULL, '3.1.4 Transport journalists', 3),
(171, 3, 2, 1, '3.2.1', '7560.00', NULL, '3.2.1 hotel actors for the others macro events', 3),
(172, 3, 2, 2, '3.2.2', '5400.00', NULL, '3.2.2 hotel actors for the others micro events', 3),
(173, 3, 2, 3, '3.2.3', '7740.00', NULL, '3.2.3 hotel equipe of management', 3),
(174, 3, 2, 4, '3.2.4', '2800.00', NULL, '3.2.4 conference extra-eu', 3),
(175, 3, 2, 5, '3.2.5', '500.00', NULL, '3.2.5 Acomodation journalists', 3),
(176, 3, 3, 1, '3.3.1', '5040.00', NULL, '3.3.1 Subsistence allowance for the other macro events', 3),
(177, 3, 3, 2, '3.3.2', '5400.00', NULL, '3.3.2 Substistence allowance micro', 3),
(178, 3, 3, 3, '3.3.3', '5160.00', NULL, '3.3.3 Substistence allowance management equipe', 3),
(179, 3, 3, 4, '3.3.4', '360.00', NULL, '3.3.4 travel conference extra-eu', 3),
(180, 3, 3, 5, '3.3.5', '350.00', NULL, '3.3.5 Substistence journalists', 3),
(181, 4, 1, 1, '4.1.1', '53130.00', NULL, '4.1.1 Project manager/officer', 3),
(182, 4, 1, 1, '4.1.1.1', '28140.00', NULL, '4.1.1.1 Project manager/officer part time - RICARDO INIESTA GARCIA', 3),
(183, 4, 1, 1, '4.1.1.2', '24990.00', NULL, '4.1.1.2 Financial Manager/Officer part time - ROCIO DE LOS REYES MORA', 3),
(184, 4, 1, 2, '4.1.2', '10000.00', NULL, '4.1.2 Assistant', 3),
(185, 4, 1, 2, '4.1.2.1', '10000.00', NULL, '4.1.2.1 Project officer part time - MASÈ JOSE MORENO DIAZ', 3),
(186, 4, 1, 4, '4.1.4', '24000.00', NULL, '4.1.4 Other (specify)', 3),
(187, 4, 1, 4, '4.1.4.1', '12000.00', NULL, '4.1.4.1 Event organiser - to be determined', 3),
(188, 4, 1, 4, '4.1.4.2', '12000.00', NULL, '4.1.4.2 Communication manager - to be determined', 3),
(189, 4, 2, 5, '4.2.5', '510.00', NULL, '4.2.5 Interpreters and translators', 3),
(190, 4, 2, 5, '4.2.5.1', '510.00', NULL, '4.2.5.1 Interpreters and translators', 3),
(191, 4, 2, 6, '4.2.6', '1500.00', NULL, '4.2.6 External speakers', 3),
(192, 4, 2, 6, '4.2.6.1', '1500.00', NULL, '4.2.6.1 External speakers', 3),
(193, 4, 3, 1, '4.3.1', '18000.00', NULL, '4.3.1 Artistic director', 3),
(194, 4, 3, 1, '4.3.1.1', '18000.00', NULL, '4.3.1.1 Artistic director', 3),
(195, 4, 3, 2, '4.3.2', '135540.00', NULL, '4.3.2 Artists fees', 3),
(196, 4, 3, 2, '4.3.2.1', '14400.00', NULL, '4.3.2.1 Middle artist - Community trainer - Part Time', 3),
(197, 4, 3, 2, '4.3.2.2', '14400.00', NULL, '4.3.2.2 Middle artist - Community trainer - Part Time', 3),
(198, 4, 3, 2, '4.3.2.3', '14400.00', NULL, '4.3.2.3 Middle artist - Community trainer - Part Time', 3),
(199, 4, 3, 2, '4.3.2.4', '14400.00', NULL, '4.3.2.4 Middle artist - Community trainer - Part Time', 3),
(200, 4, 3, 2, '4.3.2.5', '3000.00', NULL, '4.3.2.5 Senior artist - Community trainer', 3),
(201, 4, 3, 2, '4.3.2.6', '3000.00', NULL, '4.3.2.6 Senior artist - Community trainer', 3),
(202, 4, 3, 2, '4.3.2.7', '3000.00', NULL, '4.3.2.7 Senior artist - Community trainer', 3),
(203, 4, 3, 2, '4.3.2.8', '3000.00', NULL, '4.3.2.8 Senior videoperator - Community trainer', 3),
(204, 4, 3, 2, '4.3.2.9', '9240.00', NULL, '4.3.2.9 travelling artist', 3),
(205, 4, 3, 2, '4.3.2.10', '9240.00', NULL, '4.3.2.10 travelling artist', 3),
(206, 4, 3, 2, '4.3.2.11', '4320.00', NULL, '4.3.2.11 Senior artist - Community trainer micro events', 3),
(207, 4, 3, 2, '4.3.2.12', '7920.00', NULL, '4.3.2.12 Middle artist - Community coordinator micro events', 3),
(208, 4, 3, 2, '4.3.2.13', '3960.00', NULL, '4.3.2.13 Middle artist - Community trainer micro events', 3),
(209, 4, 3, 2, '4.3.2.14', '3960.00', NULL, '4.3.2.14 Middle artist - Community trainer micro events', 3),
(210, 4, 3, 2, '4.3.2.15', '3600.00', NULL, '4.3.2.15 Junior artist - micro events', 3),
(211, 4, 3, 2, '4.3.2.16', '18900.00', NULL, '4.3.2.16 artists associated partner - micro events', 3),
(212, 4, 3, 2, '4.3.2.17', '4800.00', NULL, '4.3.2.17 Middle artist - micro organizer - Part Time', 3),
(213, 4, 3, 4, '4.3.4', '14000.00', NULL, '4.3.4 Technicians', 3),
(214, 4, 3, 4, '4.3.4.1', '4900.00', NULL, '4.3.4.1 Technicians Macro', 3),
(215, 4, 3, 4, '4.3.4.2', '4900.00', NULL, '4.3.4.2 Technicians Macro', 3),
(216, 4, 3, 4, '4.3.4.3', '4200.00', NULL, '4.3.4.3 Technicians Micro', 3),
(217, 1, 1, 1, '1.1.1', '350.00', NULL, '1.1.1 Copyright - Royalties Macro event', 4),
(218, 1, 1, 2, '1.1.2', '300.00', NULL, '1.1.2 Copyright - Royalties Micro Events', 4),
(219, 1, 2, 1, '1.2.1', '3550.00', NULL, '1.2.1 Premises hire', 4),
(220, 1, 3, 1, '1.3.1', '6400.00', NULL, '1.3.1 Equipment hire', 4),
(221, 1, 4, 1, '1.4.1', '1600.00', NULL, '1.4.1 Material macro events', 4),
(222, 1, 4, 2, '1.4.2', '1000.00', NULL, '1.4.2 Set design and costumes', 4),
(223, 1, 4, 3, '1.4.3', '750.00', NULL, '1.4.3 Materials micro events', 4),
(224, 1, 6, 1, '1.6.1', '600.00', NULL, '1.6.1 Rent of one minibus macro event', 4),
(225, 1, 6, 2, '1.6.2', '1080.00', NULL, '1.6.2 Rent of one minibus micro event', 4),
(226, 1, 6, 3, '1.6.3', '400.00', NULL, '1.6.3 Other services macro event', 4),
(227, 1, 6, 4, '1.6.4', '1080.00', NULL, '1.6.4 Other services micro event', 4),
(228, 1, 7, 1, '1.7.1', '400.00', NULL, '1.7.1 Insurance equipment macro', 4),
(229, 1, 7, 2, '1.7.2', '400.00', NULL, '1.7.2 Insurance equipment micro', 4),
(230, 1, 7, 3, '1.7.3', '400.00', NULL, '1.7.3 Insurance team macro', 4),
(231, 1, 7, 4, '1.7.4', '300.00', NULL, '1.7.4 Insurance team micro', 4),
(232, 1, 9, 1, '1.9.1', '1750.00', NULL, '1.9.1 Food & beverage', 4),
(233, 2, 1, 1, '2.1.1', '1500.00', NULL, '2.1.1 Program Macro', 4),
(234, 2, 1, 2, '2.1.2', '420.00', NULL, '2.1.2 Program Micro', 4),
(235, 2, 1, 3, '2.1.3', '270.00', NULL, '2.1.3 Posters Macro', 4),
(236, 2, 1, 4, '2.1.4', '270.00', NULL, '2.1.4 Posters Micro', 4),
(237, 2, 1, 5, '2.1.5', '2200.00', NULL, '2.1.5 Billboards', 4),
(238, 2, 2, 1, '2.2.1', '900.00', NULL, '2.2.1 Advertising space (publicity TV, radio, press conference, social networks, etc.)', 4),
(239, 2, 2, 1, '2.2.1.1', '900.00', NULL, '2.2.1.1 Advertising on newspapers', 4),
(240, 2, 2, 2, '2.2.2', '300.00', NULL, '2.2.2 Purchase of materials (T-shirt, flyers, papers, posters, etc. )', 4),
(241, 2, 2, 2, '2.2.2.1', '300.00', NULL, '2.2.2.1 staff partner T-shirt', 4),
(242, 2, 3, 2, '2.3.2', '4500.00', NULL, '2.3.2 Other (specify)', 4),
(243, 2, 3, 2, '2.3.2.1', '4500.00', NULL, '2.3.2.1 Social media content curator', 4),
(244, 3, 1, 1, '3.1.1', '2400.00', NULL, '3.1.1 transport actors for the other macro events', 4),
(245, 3, 1, 2, '3.1.2', '11200.00', NULL, '3.1.2 transport equipe of management', 4),
(246, 3, 1, 3, '3.1.3', '3200.00', NULL, '3.1.3 travel conference extra-eu', 4),
(247, 3, 1, 4, '3.1.4', '2000.00', NULL, '3.1.4 Transport journalists', 4),
(248, 3, 1, 5, '3.1.5', '2500.00', NULL, '3.1.5 Transport partner meetings', 4),
(249, 3, 2, 1, '3.2.1', '6720.00', NULL, '3.2.1 hotel actors for the others macro events', 4),
(250, 3, 2, 2, '3.2.2', '6300.00', NULL, '3.2.2 hotel actors for the others micro events', 4),
(251, 3, 2, 3, '3.2.3', '6880.00', NULL, '3.2.3 hotel equipe of management', 4),
(252, 3, 2, 4, '3.2.4', '2520.00', NULL, '3.2.4 conference extra-eu', 4),
(253, 3, 2, 5, '3.2.5', '450.00', NULL, '3.2.5 Acomodation journalists', 4),
(254, 3, 3, 1, '3.3.1', '5040.00', NULL, '3.3.1 Subsistence allowance for the other macro events', 4),
(255, 3, 3, 2, '3.3.2', '4500.00', NULL, '3.3.2 Substistence allowance micro', 4),
(256, 3, 3, 3, '3.3.3', '5160.00', NULL, '3.3.3 Substistence allowance management equipe', 4),
(257, 3, 3, 4, '3.3.4', '320.00', NULL, '3.3.4 subsistance conference extra-eu', 4),
(258, 3, 3, 5, '3.3.5', '300.00', NULL, '3.3.5 Substistence journalists', 4),
(259, 4, 1, 1, '4.1.1', '46200.00', NULL, '4.1.1 Project manager/officer', 4),
(260, 4, 1, 1, '4.1.1.1', '25200.00', NULL, '4.1.1.1 Project manager/officer part time - Jennifer Crissey', 4),
(261, 4, 1, 1, '4.1.1.2', '21000.00', NULL, '4.1.1.2 Financial Manager/Officer part time - Kinga Chudziak', 4),
(262, 4, 1, 2, '4.1.2', '10000.00', NULL, '4.1.2 Assistant', 4),
(263, 4, 1, 2, '4.1.2.1', '10000.00', NULL, '4.1.2.1 Project officer part time - Patryk Bednarski', 4),
(264, 4, 2, 5, '4.2.5', '3600.00', NULL, '4.2.5 Interpreters and translators', 4),
(265, 4, 2, 5, '4.2.5.1', '3600.00', NULL, '4.2.5.1 Interpreters and translators', 4),
(266, 4, 2, 6, '4.2.6', '2400.00', NULL, '4.2.6 External speakers', 4),
(267, 4, 2, 6, '4.2.6.1', '2400.00', NULL, '4.2.6.1 External speakers', 4),
(268, 4, 3, 1, '4.3.1', '10800.00', NULL, '4.3.1 Artistic director', 4),
(269, 4, 3, 1, '4.3.1.1', '10800.00', NULL, '4.3.1.1 Artistic director', 4),
(270, 4, 3, 2, '4.3.2', '79540.00', NULL, '4.3.2 Artists fees', 4),
(271, 4, 3, 2, '4.3.2.1', '7800.00', NULL, '4.3.2.1 Middle artist - Community trainer - Part Time', 4),
(272, 4, 3, 2, '4.3.2.2', '7800.00', NULL, '4.3.2.2 Middle artist - Community trainer - Part Time', 4),
(273, 4, 3, 2, '4.3.2.3', '7800.00', NULL, '4.3.2.3 Middle artist - Community trainer - Part Time', 4),
(274, 4, 3, 2, '4.3.2.4', '7800.00', NULL, '4.3.2.4 Middle artist - Community trainer - Part Time', 4),
(275, 4, 3, 2, '4.3.2.5', '2500.00', NULL, '4.3.2.5 Senior artist - Community trainer', 4),
(276, 4, 3, 2, '4.3.2.6', '2500.00', NULL, '4.3.2.6 Senior artist - Community trainer', 4),
(277, 4, 3, 2, '4.3.2.7', '2500.00', NULL, '4.3.2.7 Senior artist - Community trainer', 4),
(278, 4, 3, 2, '4.3.2.8', '2500.00', NULL, '4.3.2.8 Senior videoperator - Community trainer', 4),
(279, 4, 3, 2, '4.3.2.9', '5040.00', NULL, '4.3.2.9 travelling artist', 4),
(280, 4, 3, 2, '4.3.2.10', '5040.00', NULL, '4.3.2.10 travelling artist', 4),
(281, 4, 3, 2, '4.3.2.11', '4320.00', NULL, '4.3.2.11 Senior artist - Community trainer micro events', 4),
(282, 4, 3, 2, '4.3.2.12', '7920.00', NULL, '4.3.2.12 Middle artist - Community coordinator micro events', 4),
(283, 4, 3, 2, '4.3.2.13', '3960.00', NULL, '4.3.2.13 Middle artist - Community trainer micro events', 4),
(284, 4, 3, 2, '4.3.2.14', '3960.00', NULL, '4.3.2.14 Middle artist - Community trainer micro events', 4),
(285, 4, 3, 2, '4.3.2.15', '3600.00', NULL, '4.3.2.15 Junior artist - micro events', 4),
(286, 4, 3, 2, '4.3.2.16', '4500.00', NULL, '4.3.2.16 artists associated partner - micro events', 4),
(287, 4, 3, 4, '4.3.4', '4600.00', NULL, '4.3.4 Technicians', 4),
(288, 4, 3, 4, '4.3.4.1', '1400.00', NULL, '4.3.4.1 Technicians Macro', 4),
(289, 4, 3, 4, '4.3.4.2', '1400.00', NULL, '4.3.4.2 Technicians Macro', 4),
(290, 4, 3, 4, '4.3.4.3', '1800.00', NULL, '4.3.4.3 Technicians Micro', 4),
(291, 1, 1, 1, '1.1.1', '950.00', NULL, '1.1.1 Copyright - Royalties Macro event', 5),
(292, 1, 2, 1, '1.2.1', '3000.00', NULL, '1.2.1 Premises hire', 5),
(293, 1, 2, 2, '1.2.2', '2400.00', NULL, '1.2.2 Premise hire', 5),
(294, 1, 3, 1, '1.3.1', '2400.00', NULL, '1.3.1 Equipment hire', 5),
(295, 1, 4, 1, '1.4.1', '3200.00', NULL, '1.4.1 Material macro events', 5),
(296, 1, 4, 2, '1.4.2', '3000.00', NULL, '1.4.2 Set design and costumes', 5),
(297, 1, 4, 3, '1.4.3', '2400.00', NULL, '1.4.3 Materials micro events', 5),
(298, 1, 6, 1, '1.6.1', '1000.00', NULL, '1.6.1 Rent of one minibus macro event', 5),
(299, 1, 6, 2, '1.6.2', '1800.00', NULL, '1.6.2 Rent of one minibus micro event', 5),
(300, 1, 6, 3, '1.6.3', '400.00', NULL, '1.6.3 Other services macro event', 5),
(301, 1, 6, 4, '1.6.4', '540.00', NULL, '1.6.4 Other services micro event', 5),
(302, 1, 6, 5, '1.6.5', '1500.00', NULL, '1.6.5 Rent of transporter macro event', 5),
(303, 1, 6, 6, '1.6.6', '1500.00', NULL, '1.6.6 Rent of transporter micro event', 5),
(304, 1, 7, 1, '1.7.1', '4000.00', NULL, '1.7.1 Insurance equipment macro', 5),
(305, 1, 7, 2, '1.7.2', '500.00', NULL, '1.7.2 Insurance equipment micro', 5),
(306, 1, 7, 3, '1.7.3', '4000.00', NULL, '1.7.3 Insurance team macro', 5),
(307, 1, 7, 4, '1.7.4', '900.00', NULL, '1.7.4 Insurance team micro', 5),
(308, 1, 9, 1, '1.9.1', '4000.00', NULL, '1.9.1 Food & beverage', 5),
(309, 2, 1, 1, '2.1.1', '2000.00', NULL, '2.1.1 Program Macro', 5),
(310, 2, 1, 2, '2.1.2', '900.00', NULL, '2.1.2 Program Micro', 5),
(311, 2, 1, 3, '2.1.3', '1000.00', NULL, '2.1.3 Posters Macro', 5),
(312, 2, 1, 4, '2.1.4', '900.00', NULL, '2.1.4 Posters Micro', 5),
(313, 2, 2, 1, '2.2.1', '2000.00', NULL, '2.2.1 Advertising space (publicity TV, radio, press conference, social networks, etc.)', 5),
(314, 2, 2, 1, '2.2.1.1', '2000.00', NULL, '2.2.1.1 Advertising on newspapers', 5),
(315, 2, 2, 2, '2.2.2', '450.00', NULL, '2.2.2 Purchase of materials (T-shirt, flyers, papers, posters, etc. )', 5),
(316, 2, 2, 2, '2.2.2.1', '450.00', NULL, '2.2.2.1 Staff partner T-shirt', 5),
(317, 2, 3, 2, '2.3.2', '11100.00', NULL, '2.3.2 Other (specify)', 5),
(318, 2, 3, 2, '2.3.2.1', '7200.00', NULL, '2.3.2.1 Social media content curator', 5),
(319, 2, 3, 2, '2.3.2.2', '2700.00', NULL, '2.3.2.2 Translator media content', 5),
(320, 2, 3, 2, '2.3.2.3', '1200.00', NULL, '2.3.2.3 Photographer', 5),
(321, 2, 5, 1, '2.5.1.1', '1000.00', NULL, '2.5.1.1 mail', 5),
(322, 3, 1, 1, '3.1.1', '2400.00', NULL, '3.1.1 transport actors for the other macro events', 5),
(323, 3, 1, 2, '3.1.2', '11200.00', NULL, '3.1.2 transport equipe of management', 5),
(324, 3, 1, 3, '3.1.3', '3200.00', NULL, '3.1.3 travel conference extra-eu', 5),
(325, 3, 1, 4, '3.1.4', '2000.00', NULL, '3.1.4 Transport journalists', 5),
(326, 3, 2, 1, '3.2.1', '7560.00', NULL, '3.2.1 hotel actors for the others macro events', 5),
(327, 3, 2, 2, '3.2.2', '5400.00', NULL, '3.2.2 hotel actors for the others micro events', 5),
(328, 3, 2, 3, '3.2.3', '7740.00', NULL, '3.2.3 hotel equipe of management', 5),
(329, 3, 2, 4, '3.2.4', '2800.00', NULL, '3.2.4 conference extra-eu', 5),
(330, 3, 2, 5, '3.2.5', '500.00', NULL, '3.2.5 Acomodation journalists', 5),
(331, 3, 3, 1, '3.3.1', '5040.00', NULL, '3.3.1 Subsistence allowance for the other macro events', 5),
(332, 3, 3, 2, '3.3.2', '5400.00', NULL, '3.3.2 Substistence allowance micro', 5),
(333, 3, 3, 3, '3.3.3', '5160.00', NULL, '3.3.3 Substistence allowance management equipe', 5),
(334, 3, 3, 4, '3.3.4', '360.00', NULL, '3.3.4 travel conference extra-eu', 5),
(335, 3, 3, 5, '3.3.5', '350.00', NULL, '3.3.5 Substistence journalists', 5),
(336, 4, 1, 1, '4.1.1', '69300.00', NULL, '4.1.1 Project manager/officer', 5),
(337, 4, 1, 1, '4.1.1.1', '37800.00', NULL, '4.1.1.1 Project manager/officer part time - Karolina Spaic', 5),
(338, 4, 1, 1, '4.1.1.2', '31500.00', NULL, '4.1.1.2 Financial Manager/Officer part time - Malou Linmeijer', 5),
(339, 4, 1, 2, '4.1.2', '14000.00', NULL, '4.1.2 Assistant', 5),
(340, 4, 1, 2, '4.1.2.1', '14000.00', NULL, '4.1.2.1 Project officer part time - Bo van der Werff', 5),
(341, 4, 2, 5, '4.2.5', '4200.00', NULL, '4.2.5 Interpreters and translators', 5),
(342, 4, 2, 5, '4.2.5.1', '4200.00', NULL, '4.2.5.1 Interpreters and translators', 5),
(343, 4, 2, 6, '4.2.6', '2000.00', NULL, '4.2.6 External speakers', 5),
(344, 4, 2, 6, '4.2.6.1', '2000.00', NULL, '4.2.6.1 External speakers', 5),
(345, 4, 3, 1, '4.3.1', '17400.00', NULL, '4.3.1 Artistic director', 5),
(346, 4, 3, 1, '4.3.1.1', '17400.00', NULL, '4.3.1.1 Artistic director', 5),
(347, 4, 3, 2, '4.3.2', '157000.00', NULL, '4.3.2 Artists fees', 5),
(348, 4, 3, 2, '4.3.2.1', '14400.00', NULL, '4.3.2.1 Middle artist - Community trainer - Part Time', 5),
(349, 4, 3, 2, '4.3.2.2', '14400.00', NULL, '4.3.2.2 Middle artist - Community trainer - Part Time', 5),
(350, 4, 3, 2, '4.3.2.3', '14400.00', NULL, '4.3.2.3 Middle artist - Community trainer - Part Time', 5),
(351, 4, 3, 2, '4.3.2.4', '14400.00', NULL, '4.3.2.4 Middle artist - Community trainer - Part Time', 5),
(352, 4, 3, 2, '4.3.2.5', '4000.00', NULL, '4.3.2.5 Senior artist - Community trainer', 5),
(353, 4, 3, 2, '4.3.2.6', '4000.00', NULL, '4.3.2.6 Senior artist - Community trainer', 5),
(354, 4, 3, 2, '4.3.2.7', '4000.00', NULL, '4.3.2.7 Senior artist - Community trainer', 5),
(355, 4, 3, 2, '4.3.2.8', '4000.00', NULL, '4.3.2.8 Senior videoperator - Community trainer', 5),
(356, 4, 3, 2, '4.3.2.9', '12600.00', NULL, '4.3.2.9 travelling artist', 5),
(357, 4, 3, 2, '4.3.2.10', '12600.00', NULL, '4.3.2.10 travelling artist', 5),
(358, 4, 3, 2, '4.3.2.11', '7200.00', NULL, '4.3.2.11 Senior artist - Community trainer micro events', 5),
(359, 4, 3, 2, '4.3.2.12', '10800.00', NULL, '4.3.2.12 Middle artist - Community coordinator micro events', 5),
(360, 4, 3, 2, '4.3.2.13', '5400.00', NULL, '4.3.2.13 Middle artist - Community trainer micro events', 5),
(361, 4, 3, 2, '4.3.2.14', '5400.00', NULL, '4.3.2.14 Middle artist - Community trainer micro events', 5),
(362, 4, 3, 2, '4.3.2.15', '5400.00', NULL, '4.3.2.15 Junior artist - micro events', 5),
(363, 4, 3, 2, '4.3.2.16', '18000.00', NULL, '4.3.2.16 artists associated partner - micro events', 5),
(364, 4, 3, 2, '4.3.2.17', '6000.00', NULL, '4.3.2.17 Middle artist - micro organizer - Part Time', 5),
(365, 4, 3, 4, '4.3.4', '13300.00', NULL, '4.3.4 Technicians', 5),
(366, 4, 3, 4, '4.3.4.1', '3500.00', NULL, '4.3.4.1 Technicians Macro', 5),
(367, 4, 3, 4, '4.3.4.2', '3500.00', NULL, '4.3.4.2 Technicians Macro', 5),
(368, 4, 3, 4, '4.3.4.3', '6300.00', NULL, '4.3.4.3 Technicians Micro', 5),
(369, 4, 3, 7, '4.3.7', '2540.00', NULL, '4.3.7 Others (Reception staff, security, etc)', 5),
(370, 4, 3, 7, '4.3.7.1', '500.00', NULL, '4.3.7.1 Volunters micro event', 5),
(371, 4, 3, 7, '4.3.7.2', '540.00', NULL, '4.3.7.2 Security micro event', 5),
(372, 4, 3, 7, '4.3.7.3', '1500.00', NULL, '4.3.7.3 Volunters macro event', 5),
(373, 1, 1, 1, '1.1.1', '5850.00', NULL, '1.1.1 Copyright - Royalties of the movies', 6),
(374, 1, 2, 1, '1.2.1', '450.00', NULL, '1.2.1 Renting cinema halles and premisses related to the program of microevent KINOBUS', 6),
(375, 1, 3, 1, '1.3.1', '1200.00', NULL, '1.3.1 Equipment hire', 6),
(376, 1, 6, 1, '1.6.1', '600.00', NULL, '1.6.1 Transport of equipment', 6),
(377, 2, 1, 1, '2.1.1', '800.00', NULL, '2.1.1 Program brochures of micro events KINOBUS', 6),
(378, 2, 2, 1, '2.2.1', '2400.00', NULL, '2.2.1 Advertising space (publicity TV, radio, press conference, social networks, etc.)', 6),
(379, 2, 2, 1, '2.2.1.1', '2400.00', NULL, '2.2.1.1 Set of advertising space', 6),
(380, 2, 2, 2, '2.2.2', '900.00', NULL, '2.2.2 Purchase of materials (T-shirt, flyers, papers, posters, etc. )', 6),
(381, 2, 2, 2, '2.2.2.1', '900.00', NULL, '2.2.2.1 Badges, flyers, T-shirt, slicker, …', 6),
(382, 3, 1, 1, '3.1.1', '6000.00', NULL, '3.1.1 Transport of artists, managment', 6),
(383, 3, 1, 2, '3.1.2', '2880.00', NULL, '3.1.2 Transport of participants of micro event (2 buses)', 6),
(384, 3, 2, 1, '3.2.1', '1800.00', NULL, '3.2.1 Accommodation of artists and managment of micro event KINOBUS', 6),
(385, 3, 3, 1, '3.3.1', '2400.00', NULL, '3.3.1 Substistence allowance management and artists of micro events KINOBUS', 6),
(386, 4, 1, 1, '4.1.1', '30240.00', NULL, '4.1.1 Project manager/officer', 6),
(387, 4, 1, 1, '4.1.1.1', '18000.00', NULL, '4.1.1.1 Project manager part time - Barbora Uriková', 6),
(388, 4, 1, 1, '4.1.1.2', '12240.00', NULL, '4.1.1.2 Financial manager part time - Barbora Uriková', 6),
(389, 4, 2, 5, '4.2.5', '1200.00', NULL, '4.2.5 Interpreters and translators', 6),
(390, 4, 2, 5, '4.2.5.1', '1200.00', NULL, '4.2.5.1 Interpreters and translators', 6),
(391, 4, 2, 6, '4.2.6', '900.00', NULL, '4.2.6 External speakers', 6),
(392, 4, 2, 6, '4.2.6.1', '900.00', NULL, '4.2.6.1 External speakers', 6),
(393, 4, 2, 7, '4.2.7', '1200.00', NULL, '4.2.7 Other (specify)', 6),
(394, 4, 2, 7, '4.2.7.1', '600.00', NULL, '4.2.7.1 technical control of the movie projectors', 6),
(395, 4, 2, 7, '4.2.7.2', '600.00', NULL, '4.2.7.2 partner auditor', 6),
(396, 4, 3, 1, '4.3.1', '15600.00', NULL, '4.3.1 Artistic director', 6),
(397, 4, 3, 1, '4.3.1.1', '12000.00', NULL, '4.3.1.1 Artistic director (external)', 6),
(398, 4, 3, 1, '4.3.1.2', '3600.00', NULL, '4.3.1.2 Assistant to the director (external)', 6),
(399, 4, 3, 2, '4.3.2', '19200.00', NULL, '4.3.2 Artists fees', 6),
(400, 4, 3, 2, '4.3.2.1', '19200.00', NULL, '4.3.2.1 Artists (performers, musicians, sound designers, light designers, photographers, videomakers, stage designers and architects)', 6),
(401, 1, 1, 1, '1.1.1', '1600.00', NULL, '1.1.1 Copyright - Royalties Micro Events (2 Micro events of 4 days - total 8 days)', 7),
(402, 1, 3, 1, '1.3.1', '3600.00', NULL, '1.3.1 Equipment hire (2 Micro events of 4 days - total 8 days)', 7),
(403, 1, 4, 1, '1.4.1', '1800.00', NULL, '1.4.1 Materials micro events (2 Micro events of 4 days - total 8 days)', 7),
(404, 1, 6, 1, '1.6.1', '960.00', NULL, '1.6.1 Rent of one minibus micro event (2 Micro events of 4 days + 2 days - total 12 days)', 7),
(405, 1, 6, 2, '1.6.2', '720.00', NULL, '1.6.2 Fuel micro event (2 Micro events of 4 days + 2 days - total 12 days)', 7),
(406, 1, 7, 1, '1.7.1', '1000.00', NULL, '1.7.1 Insurance equipment micro (1/2 month to each micro)', 7),
(407, 1, 7, 2, '1.7.2', '900.00', NULL, '1.7.2 Insurance team micro (1/2 month to each micro)', 7),
(408, 2, 1, 1, '2.1.1', '900.00', NULL, '2.1.1 Program Micro', 7),
(409, 2, 1, 2, '2.1.2', '450.00', NULL, '2.1.2 Posters Micro', 7),
(410, 2, 2, 2, '2.2.2', '150.00', NULL, '2.2.2 Purchase of materials (T-shirt, flyers, papers, posters, etc. )', 7),
(411, 2, 2, 2, '2.2.2.1', '150.00', NULL, '2.2.2.1 staff partner T-shirt', 7),
(412, 3, 1, 1, '3.1.1', '6000.00', NULL, '3.1.1 Transport of management - 1 person (10 SM, 5 MI)', 7),
(413, 3, 2, 1, '3.2.1', '3600.00', NULL, '3.2.1 hotel actors for the micro events (4 actors + 1 tech in 6 dayspr. Micro)', 7),
(414, 3, 2, 2, '3.2.2', '3900.00', NULL, '3.2.2 hotel equipe of management (ST = 3*10 + MA 5*7)', 7),
(415, 3, 3, 1, '3.3.1', '3600.00', NULL, '3.3.1 Substistence allowance micro (4 actors + 1 tech in 6 dayspr. Micro)', 7),
(416, 3, 3, 2, '3.3.2', '3900.00', NULL, '3.3.2 Substistence allowance management (ST = 3*10 + MA 5*7)', 7),
(417, 4, 1, 1, '4.1.1', '16800.00', NULL, '4.1.1 Project manager/officer', 7),
(418, 4, 1, 1, '4.1.1.1', '12000.00', NULL, '4.1.1.1 Project Manager - Simon von Oppeln-Bronikowski', 7),
(419, 4, 1, 1, '4.1.1.2', '4800.00', NULL, '4.1.1.2 Financial Manager/Officer part time - to be determined', 7),
(420, 4, 2, 5, '4.2.5', '2100.00', NULL, '4.2.5 Interpreters and translators', 7),
(421, 4, 2, 5, '4.2.5.1', '2100.00', NULL, '4.2.5.1 Interpreters and translators', 7),
(422, 4, 3, 1, '4.3.1', '4800.00', NULL, '4.3.1 Artistic director', 7),
(423, 4, 3, 1, '4.3.1.1', '4800.00', NULL, '4.3.1.1 Artistic Director', 7),
(424, 4, 3, 2, '4.3.2', '34800.00', NULL, '4.3.2 Artists fees', 7),
(425, 4, 3, 2, '4.3.2.1', '7800.00', NULL, '4.3.2.1 Senior artist - Community coordinator/trainer micro events', 7),
(426, 4, 3, 2, '4.3.2.2', '7800.00', NULL, '4.3.2.2 Senior artist – Community coordinator/trainer micro events', 7),
(427, 4, 3, 2, '4.3.2.3', '3600.00', NULL, '4.3.2.3 Middle artist - Community trainer micro events', 7),
(428, 4, 3, 2, '4.3.2.4', '3600.00', NULL, '4.3.2.4 Video operator - micro events', 7),
(429, 4, 3, 2, '4.3.2.5', '12000.00', NULL, '4.3.2.5 artists associated partner - micro events', 7),
(430, 4, 3, 4, '4.3.4', '4200.00', NULL, '4.3.4 Technicians', 7),
(431, 4, 3, 4, '4.3.4.1', '4200.00', NULL, '4.3.4.1 Technicians Micro', 7),
(432, 1, 3, 1, '1.3.1', '5000.00', NULL, '1.3.1 Technological equipment hire', 8),
(433, 1, 3, 2, '1.3.2', '2500.00', NULL, '1.3.2 Technological equipment hire', 8),
(434, 1, 4, 1, '1.4.1', '4500.00', NULL, '1.4.1 Materials macro events', 8),
(435, 2, 2, 2, '2.2.2', '50.00', NULL, '2.2.2 Purchase of materials (T-shirt, flyers, papers, posters, etc. )', 8),
(436, 2, 2, 2, '2.2.2.1', '50.00', NULL, '2.2.2.1 staff partner T-shirt', 8),
(437, 3, 1, 1, '3.1.1', '2500.00', NULL, '3.1.1 staff transport - community workshops', 8),
(438, 3, 1, 2, '3.1.2', '5000.00', NULL, '3.1.2 staff transport - macro events', 8),
(439, 3, 1, 3, '3.1.3', '4500.00', NULL, '3.1.3 staff transport - equipe of management / workshop', 8),
(440, 3, 2, 1, '3.2.1', '1350.00', NULL, '3.2.1 staff accomodation - community workshops', 8),
(441, 3, 2, 2, '3.2.2', '10800.00', NULL, '3.2.2 staff accomodation - macro events', 8),
(442, 3, 2, 3, '3.2.3', '2700.00', NULL, '3.2.3 staff accomodation - equipe of management / workshop', 8),
(443, 3, 3, 1, '3.3.1', '720.00', NULL, '3.3.1 staff subsistence - community workshops', 8),
(444, 3, 3, 2, '3.3.2', '7200.00', NULL, '3.3.2 staff substistence - macro events', 8),
(445, 3, 3, 3, '3.3.3', '1800.00', NULL, '3.3.3 staff subsistence - equipe of management / workshop', 8),
(446, 4, 1, 1, '4.1.1', '33600.00', NULL, '4.1.1 Project manager/officer', 8),
(447, 4, 1, 1, '4.1.1.1', '19200.00', NULL, '4.1.1.1 Project manager/officer part time - Stavros Christodoulakis', 8),
(448, 4, 1, 1, '4.1.1.2', '14400.00', NULL, '4.1.1.2 Financial Manager/Officer part time - Yiannis Maragkoudakis', 8),
(449, 4, 1, 2, '4.1.2', '4800.00', NULL, '4.1.2 Assistant', 8),
(450, 4, 1, 2, '4.1.2.1', '4800.00', NULL, '4.1.2.1 Project manager/officer part time - to be determined', 8),
(451, 4, 3, 3, '4.3.3', '96000.00', NULL, '4.3.3 Scientific personnel', 8),
(452, 4, 3, 3, '4.3.3.1', '7200.00', NULL, '4.3.3.1 App Technical supervisor', 8),
(453, 4, 3, 3, '4.3.3.2', '14400.00', NULL, '4.3.3.2 App project manager', 8),
(454, 4, 3, 3, '4.3.3.3', '7200.00', NULL, '4.3.3.3 App project manager', 8),
(455, 4, 3, 3, '4.3.3.4', '7200.00', NULL, '4.3.3.4 Macro event project manager', 8),
(456, 4, 3, 3, '4.3.3.5', '7200.00', NULL, '4.3.3.5 Micro event project manager', 8),
(457, 4, 3, 3, '4.3.3.6', '19200.00', NULL, '4.3.3.6 Video streeaming Technical supervisor', 8),
(458, 4, 3, 3, '4.3.3.7', '16800.00', NULL, '4.3.3.7 Video streaming project manager', 8),
(459, 4, 3, 3, '4.3.3.8', '4800.00', NULL, '4.3.3.8 Video streaming project manager assistant', 8),
(460, 4, 3, 3, '4.3.3.9', '6000.00', NULL, '4.3.3.9 Macro event project manager', 8),
(461, 4, 3, 3, '4.3.3.10', '6000.00', NULL, '4.3.3.10 Macro event project manager', 8),
(462, 4, 3, 4, '4.3.4', '92400.00', NULL, '4.3.4 Technicians', 8),
(463, 4, 3, 4, '4.3.4.1', '28800.00', NULL, '4.3.4.1 App developer', 8),
(464, 4, 3, 4, '4.3.4.2', '7200.00', NULL, '4.3.4.2 Uxer experienxe developer', 8),
(465, 4, 3, 4, '4.3.4.3', '7200.00', NULL, '4.3.4.3 Data base developer', 8),
(466, 4, 3, 4, '4.3.4.4', '4800.00', NULL, '4.3.4.4 App developer', 8),
(467, 4, 3, 4, '4.3.4.5', '7200.00', NULL, '4.3.4.5 Video Editing supervisor', 8),
(468, 4, 3, 4, '4.3.4.6', '4800.00', NULL, '4.3.4.6 Video Editing supervisor', 8),
(469, 4, 3, 4, '4.3.4.7', '6000.00', NULL, '4.3.4.7 Video operator', 8),
(470, 4, 3, 4, '4.3.4.8', '6000.00', NULL, '4.3.4.8 Video operator', 8),
(471, 4, 3, 4, '4.3.4.9', '6000.00', NULL, '4.3.4.9 Video Editing technician', 8),
(472, 4, 3, 4, '4.3.4.10', '7200.00', NULL, '4.3.4.10 Digital puppet developer', 8),
(473, 4, 3, 4, '4.3.4.11', '7200.00', NULL, '4.3.4.11 Digital puppet technician', 8),
(474, 4, 3, 5, '4.3.5', '3600.00', NULL, '4.3.5 Web master', 8),
(475, 4, 3, 5, '4.3.5.1', '3600.00', NULL, '4.3.5.1 Webmaster', 8),
(476, 4, 3, 6, '4.3.6', '6000.00', NULL, '4.3.6 Production (Design & Layout)', 8),
(477, 4, 3, 6, '4.3.6.1', '6000.00', NULL, '4.3.6.1 App identity designer', 8),
(478, 1, 1, 1, '1.1.1', '500.00', NULL, '1.1.1 Copyright - Royalties Micro Events', 9),
(479, 1, 1, 2, '1.1.2', '1700.00', NULL, '1.1.2 Music composition', 9),
(480, 1, 2, 1, '1.2.1', '8000.00', NULL, '1.2.1 Renting premises related to micro', 9),
(481, 1, 3, 1, '1.3.1', '9000.00', NULL, '1.3.1 Videoprojectors hire', 9),
(482, 1, 3, 2, '1.3.2', '3000.00', NULL, '1.3.2 Sound system hire', 9),
(483, 1, 3, 3, '1.3.3', '6000.00', NULL, '1.3.3 Lights hire', 9),
(484, 1, 4, 1, '1.4.1', '1800.00', NULL, '1.4.1 Materials micro events', 9),
(485, 1, 4, 2, '1.4.2', '5000.00', NULL, '1.4.2 Set design', 9),
(486, 1, 4, 3, '1.4.3', '1400.00', NULL, '1.4.3 Costumes', 9),
(487, 1, 6, 1, '1.6.1', '1600.00', NULL, '1.6.1 Transport of set design and technical equipment', 9),
(488, 1, 6, 2, '1.6.2', '600.00', NULL, '1.6.2 Other services micro event', 9),
(489, 1, 9, 1, '1.9.1', '150.00', NULL, '1.9.1 Food and beverage for microevent participants', 9),
(490, 2, 1, 1, '2.1.1', '600.00', NULL, '2.1.1 Program Micro', 9),
(491, 2, 1, 2, '2.1.2', '300.00', NULL, '2.1.2 Posters Micro', 9),
(492, 2, 1, 3, '2.1.3', '3200.00', NULL, '2.1.3 Flyers printing Micro', 9),
(493, 2, 2, 1, '2.2.1', '1000.00', NULL, '2.2.1 Advertising space (publicity TV, radio, press conference, social networks, etc.)', 9),
(494, 2, 2, 1, '2.2.1.1', '1000.00', NULL, '2.2.1.1 Advertising on newspapers', 9),
(495, 2, 2, 2, '2.2.2', '500.00', NULL, '2.2.2 Purchase of materials (T-shirt, flyers, papers, posters, etc. )', 9),
(496, 2, 2, 2, '2.2.2.1', '500.00', NULL, '2.2.2.1 Material for microevents', 9),
(497, 2, 4, 1, '2.4.1', '1000.00', NULL, '2.4.1 Photo and video documentation', 9),
(498, 3, 1, 1, '3.1.1', '200.00', NULL, '3.1.1 transport equipe of management', 9),
(499, 3, 1, 2, '3.1.2', '200.00', NULL, '3.1.2 transport artists to microevent location', 9),
(500, 3, 2, 1, '3.2.1', '1200.00', NULL, '3.2.1 hotel artists for the micro events', 9),
(501, 3, 2, 2, '3.2.2', '600.00', NULL, '3.2.2 hotel equipe of management', 9),
(502, 3, 3, 1, '3.3.1', '300.00', NULL, '3.3.1 Substistence allowance micro', 9),
(503, 3, 3, 2, '3.3.2', '300.00', NULL, '3.3.2 Substistence allowance management equipe', 9),
(504, 4, 1, 1, '4.1.1', '12000.00', NULL, '4.1.1 Project manager/officer', 9),
(505, 4, 1, 1, '4.1.1.1', '12000.00', NULL, '4.1.1.1 Project manager/officer part time - Jan Valter', 9),
(506, 4, 1, 2, '4.1.2', '3600.00', NULL, '4.1.2 Assistant', 9),
(507, 4, 1, 2, '4.1.2.1', '3600.00', NULL, '4.1.2.1 Production assistant - Eliška Vavríková', 9),
(508, 4, 2, 2, '4.2.2', '1800.00', NULL, '4.2.2 Accountant', 9),
(509, 4, 2, 2, '4.2.2.1', '1800.00', NULL, '4.2.2.1 Accountant', 9),
(510, 4, 2, 5, '4.2.5', '1800.00', NULL, '4.2.5 Interpreters and translators', 9),
(511, 4, 2, 5, '4.2.5.1', '1800.00', NULL, '4.2.5.1 Interpreters and translators', 9),
(512, 4, 3, 1, '4.3.1', '9000.00', NULL, '4.3.1 Artistic director', 9),
(513, 4, 3, 1, '4.3.1.1', '7200.00', NULL, '4.3.1.1 Artistic director', 9),
(514, 4, 3, 1, '4.3.1.2', '1800.00', NULL, '4.3.1.2 Assistant director', 9),
(515, 4, 3, 2, '4.3.2', '17650.00', NULL, '4.3.2 Artists fees', 9),
(516, 4, 3, 2, '4.3.2.1', '1200.00', NULL, '4.3.2.1 Senior artist - Community trainer micro events', 9),
(517, 4, 3, 2, '4.3.2.2', '2000.00', NULL, '4.3.2.2 Light designer', 9),
(518, 4, 3, 2, '4.3.2.3', '1500.00', NULL, '4.3.2.3 Dramaturge', 9),
(519, 4, 3, 2, '4.3.2.4', '9750.00', NULL, '4.3.2.4 Actors microevents', 9),
(520, 4, 3, 2, '4.3.2.5', '3200.00', NULL, '4.3.2.5 Musicians', 9),
(521, 4, 3, 4, '4.3.4', '10000.00', NULL, '4.3.4 Technicians', 9),
(522, 4, 3, 4, '4.3.4.1', '2000.00', NULL, '4.3.4.1 Videotechnician', 9),
(523, 4, 3, 4, '4.3.4.2', '4000.00', NULL, '4.3.4.2 Sound engeener', 9),
(524, 4, 3, 4, '4.3.4.3', '4000.00', NULL, '4.3.4.3 Light technician', 9),
(525, 4, 3, 6, '4.3.6', '1500.00', NULL, '4.3.6 Production (Design & Layout)', 9),
(526, 4, 3, 6, '4.3.6.1', '1000.00', NULL, '4.3.6.1 Graphic designer', 9),
(527, 4, 3, 6, '4.3.6.2', '500.00', NULL, '4.3.6.2 Photographer', 9),
(528, 1, 1, 1, '1.1.1', '600.00', NULL, '1.1.1 Copyright - Royalties Micro Events', 10),
(529, 1, 3, 1, '1.3.1', '600.00', NULL, '1.3.1 Equipment hire', 10),
(530, 1, 4, 1, '1.4.1', '1200.00', NULL, '1.4.1 Materials micro events', 10),
(531, 1, 7, 1, '1.7.1', '500.00', NULL, '1.7.1 Insurance equipment micro', 10),
(532, 1, 7, 2, '1.7.2', '450.00', NULL, '1.7.2 Insurance team micro', 10),
(533, 2, 1, 1, '2.1.1', '600.00', NULL, '2.1.1 Program Micro', 10),
(534, 2, 1, 2, '2.1.2', '400.00', NULL, '2.1.2 Posters Micro', 10),
(535, 2, 2, 2, '2.2.2', '100.00', NULL, '2.2.2 Purchase of materials (T-shirt, flyers, papers, posters, etc. )', 10),
(536, 2, 2, 2, '2.2.2.1', '100.00', NULL, '2.2.2.1 staff partner T-shirt', 10),
(537, 3, 1, 1, '3.1.1', '6000.00', NULL, '3.1.1 transport equipe of management', 10),
(538, 3, 2, 1, '3.2.1', '3000.00', NULL, '3.2.1 hotel equipe of management', 10),
(539, 3, 3, 1, '3.3.1', '3000.00', NULL, '3.3.1 Substistence allowance management equipe', 10),
(540, 4, 1, 1, '4.1.1', '6300.00', NULL, '4.1.1 Project manager/officer', 10),
(541, 4, 1, 1, '4.1.1.1', '4800.00', NULL, '4.1.1.1 Project manager/officer part time - Irene Koutsaki', 10),
(542, 4, 1, 1, '4.1.1.2', '1500.00', NULL, '4.1.1.2 Financial Manager/Officer part time - Argyro Bafaki', 10),
(543, 4, 2, 5, '4.2.5', '750.00', NULL, '4.2.5 Interpreters and translators', 10),
(544, 4, 2, 5, '4.2.5.1', '750.00', NULL, '4.2.5.1 Interpreters and translators', 10),
(545, 4, 3, 1, '4.3.1', '1200.00', NULL, '4.3.1 Artistic director', 10),
(546, 4, 3, 1, '4.3.1.1', '1200.00', NULL, '4.3.1.1 Artistic director', 10),
(547, 4, 3, 2, '4.3.2', '9750.00', NULL, '4.3.2 Artists fees', 10),
(548, 4, 3, 2, '4.3.2.1', '1500.00', NULL, '4.3.2.1 Senior artist - Community trainer micro events', 10),
(549, 4, 3, 2, '4.3.2.2', '2500.00', NULL, '4.3.2.2 Middle artist - Community coordinator micro events', 10),
(550, 4, 3, 2, '4.3.2.3', '1250.00', NULL, '4.3.2.3 Middle artist - Community trainer micro events', 10),
(551, 4, 3, 2, '4.3.2.4', '1250.00', NULL, '4.3.2.4 Middle artist - Community trainer micro events', 10),
(552, 4, 3, 2, '4.3.2.5', '1250.00', NULL, '4.3.2.5 Junior artist - micro events', 10),
(553, 4, 3, 2, '4.3.2.6', '2000.00', NULL, '4.3.2.6 artists associated partner - micro events', 10),
(554, 4, 3, 4, '4.3.4', '1750.00', NULL, '4.3.4 Technicians', 10),
(555, 4, 3, 4, '4.3.4.1', '1750.00', NULL, '4.3.4.1 Technicians Micro', 10),
(563, 1, 1, 1, '1.1.1', '1600.00', NULL, '1.1.1 Copyright - Royalties Micro Events', 11),
(564, 1, 3, 1, '1.3.1', '1200.00', NULL, '1.3.1 Equipment hire', 11),
(565, 1, 4, 1, '1.4.1', '1800.00', NULL, '1.4.1 Materials micro events', 11),
(566, 1, 6, 1, '1.6.1', '960.00', NULL, '1.6.1 Rent of one minibus micro event', 11),
(567, 1, 6, 2, '1.6.2', '720.00', NULL, '1.6.2 Other services micro event', 11),
(568, 1, 7, 1, '1.7.1', '1000.00', NULL, '1.7.1 Insurance equipment micro', 11),
(569, 1, 7, 2, '1.7.2', '900.00', NULL, '1.7.2 Insurance team micro', 11),
(570, 1, 10, 1, '1.9.1', '2400.00', NULL, '1.9.1 Power and internet supply (power when we are in a square, for example)', 11),
(571, 2, 1, 1, '2.1.1', '900.00', NULL, '2.1.1 Program Micro', 11),
(572, 2, 1, 2, '2.1.2', '450.00', NULL, '2.1.2 Posters Micro', 11),
(573, 2, 2, 2, '2.2.2', '150.00', NULL, '2.2.2 Purchase of materials (T-shirt, flyers, papers, posters, etc. )', 11),
(574, 2, 2, 2, '2.2.2.1', '150.00', NULL, '2.2.2.1 staff partner T-shirt', 11),
(575, 3, 1, 1, '3.1.1', '11200.00', NULL, '3.1.1 transport equipe of management', 11),
(576, 3, 2, 1, '3.2.1', '3600.00', NULL, '3.2.1 hotel actors for the micro events', 11),
(577, 3, 2, 2, '3.2.2', '5160.00', NULL, '3.2.2 hotel equipe of management', 11),
(578, 3, 3, 1, '3.3.1', '3600.00', NULL, '3.3.1 Substistence allowance micro', 11),
(579, 3, 3, 2, '3.3.2', '5160.00', NULL, '3.3.2 Substistence allowance management equipe', 11),
(580, 4, 1, 1, '4.1.1', '16800.00', NULL, '4.1.1 Project manager/officer', 11),
(581, 4, 1, 1, '4.1.1.1', '12000.00', NULL, '4.1.1.1 Project manager/officer part time - STANKA PARAC DAMJANOVIC', 11),
(582, 4, 1, 1, '4.1.1.2', '4800.00', NULL, '4.1.1.2 Financial Manager/Officer part time - BARBARA ELIA', 11),
(583, 4, 1, 4, '4.1.4', '2400.00', NULL, '4.1.4 Other (specify)', 11),
(584, 4, 1, 4, '4.1.4.1', '2400.00', NULL, '4.1.4.1 PR communication manager/officer part time - IRENE ZANETTI', 11),
(585, 4, 2, 5, '4.2.5', '1800.00', NULL, '4.2.5 Interpreters and translators', 11),
(586, 4, 2, 5, '4.2.5.1', '1800.00', NULL, '4.2.5.1 Interpreters and translators', 11),
(587, 4, 3, 1, '4.3.1', '3800.00', NULL, '4.3.1 Artistic director', 11),
(588, 4, 3, 1, '4.3.1.1', '3800.00', NULL, '4.3.1.1 Artistic director', 11),
(589, 4, 3, 2, '4.3.2', '31200.00', NULL, '4.3.2 Artists fees', 11),
(590, 4, 3, 2, '4.3.2.1', '3600.00', NULL, '4.3.2.1 Senior artist - Community trainer micro events', 11),
(591, 4, 3, 2, '4.3.2.2', '7200.00', NULL, '4.3.2.2 Middle artist - Community coordinator micro events', 11),
(592, 4, 3, 2, '4.3.2.3', '3600.00', NULL, '4.3.2.3 Middle artist - Community trainer micro events', 11),
(593, 4, 3, 2, '4.3.2.4', '2400.00', NULL, '4.3.2.4 Middle artist - Community trainer micro events', 11),
(594, 4, 3, 2, '4.3.2.5', '2400.00', NULL, '4.3.2.5 Junior artist - micro events', 11),
(595, 4, 3, 2, '4.3.2.6', '12000.00', NULL, '4.3.2.6 artists associated partner - micro events', 11),
(596, 4, 3, 4, '4.3.4', '4200.00', NULL, '4.3.4 Technicians', 11),
(597, 4, 3, 4, '4.3.4.1', '4200.00', NULL, '4.3.4.1 Technicians Micro', 11),
(598, 1, 2, 1, '1.2.1', '1000.00', NULL, '1.2.1 Premises hire for macro event within Borstnikovo srecanje', 12),
(599, 1, 3, 1, '1.3.1', '4000.00', NULL, '1.3.1 Technological equipment hire', 12),
(600, 1, 9, 1, '1.9.1', '300.00', NULL, '1.9.1 Catering on macro event in KIBLA', 12),
(601, 2, 1, 1, '2.1.1', '6000.00', NULL, '2.1.1 Printing of posters, invitation cards, flyers, city lights...', 12),
(602, 2, 1, 2, '2.1.2', '8000.00', NULL, '2.1.2 Printing of photo book', 12),
(603, 2, 2, 1, '2.2.1', '1000.00', NULL, '2.2.1 Advertising space (publicity TV, radio, press conference, social networks, etc.)', 12),
(604, 2, 2, 1, '2.2.1.1', '1000.00', NULL, '2.2.1.1 Advertising space (publicity TV, radio, press conference, social networks, etc.)', 12),
(605, 2, 2, 3, '2.2.3', '15000.00', NULL, '2.2.3 Other (specify)', 12),
(606, 2, 2, 3, '2.2.3.1', '3000.00', NULL, '2.2.3.1 Public relations officer', 12),
(607, 2, 2, 3, '2.2.3.2', '12000.00', NULL, '2.2.3.2 Communication and online communities manager', 12),
(608, 3, 1, 1, '3.1.1', '800.00', NULL, '3.1.1 Steering committee travel (kick off meeting, 2 persons)', 12),
(609, 3, 1, 2, '3.1.2', '3600.00', NULL, '3.1.2 Steering committee travel (9 other steering committee meetings, 1 person)', 12),
(610, 3, 1, 3, '3.1.3', '6000.00', NULL, '3.1.3 Travel to macro events (4 persons)', 12),
(611, 3, 2, 1, '3.2.1', '420.00', NULL, '3.2.1 Steering committee accommodation (kick off meeting, 2 persons, 3 nights)', 12),
(612, 3, 2, 2, '3.2.2', '1890.00', NULL, '3.2.2 Steering committee accommodation (other meetings, 1 person, 3 nights)', 12),
(613, 3, 2, 3, '3.2.3', '4200.00', NULL, '3.2.3 Accommodation for visiting macro events (4 persons)', 12),
(614, 3, 3, 1, '3.3.1', '440.00', NULL, '3.3.1 Steering committee per diems (kick off meeting, 2 persons, 5 days)', 12),
(615, 3, 3, 2, '3.3.2', '1980.00', NULL, '3.3.2 Steering committee per diems (other meetings, 1 person, 5 days)', 12),
(616, 3, 3, 3, '3.3.3', '4400.00', NULL, '3.3.3 Per diems for KIBLA staff visiting macro events (4 persons)', 12),
(617, 4, 1, 1, '4.1.1', '23100.00', NULL, '4.1.1 Project manager/officer', 12),
(618, 4, 1, 1, '4.1.1.1', '23100.00', NULL, '4.1.1.1 Project manager/officer part time: Peter Lubej', 12),
(619, 4, 1, 2, '4.1.2', '9000.00', NULL, '4.1.2 Assistant', 12),
(620, 4, 1, 2, '4.1.2.1', '9000.00', NULL, '4.1.2.1 Project administrator/Officer part time: Mirjana Predojevic', 12),
(621, 4, 1, 3, '4.1.3', '2000.00', NULL, '4.1.3 Secretary', 12),
(622, 4, 1, 3, '4.1.3.1', '2000.00', NULL, '4.1.3.1 Project assistance: Biserka Šegula', 12),
(623, 4, 2, 4, '4.2.4', '1600.00', NULL, '4.2.4 IT maintenance/Helpdesk', 12),
(624, 4, 2, 4, '4.2.4.1', '1600.00', NULL, '4.2.4.1 IT maintenance/Helpdesk', 12),
(625, 4, 2, 5, '4.2.5', '2000.00', NULL, '4.2.5 Interpreters and translators', 12),
(626, 4, 2, 5, '4.2.5.1', '2000.00', NULL, '4.2.5.1 Interpreters and translators', 12),
(627, 4, 2, 6, '4.2.6', '2450.00', NULL, '4.2.6 External speakers', 12),
(628, 4, 2, 6, '4.2.6.1', '2450.00', NULL, '4.2.6.1 External speakers', 12),
(629, 4, 3, 2, '4.3.2', '4500.00', NULL, '4.3.2 Artists fees', 12),
(630, 4, 3, 2, '4.3.2.1', '4500.00', NULL, '4.3.2.1 Artist fees', 12),
(631, 4, 3, 3, '4.3.3', '8000.00', NULL, '4.3.3 Scientific personnel', 12),
(632, 4, 3, 3, '4.3.3.1', '8000.00', NULL, '4.3.3.1 Researcher community theater', 12),
(633, 4, 3, 4, '4.3.4', '10000.00', NULL, '4.3.4 Technicians', 12),
(634, 4, 3, 4, '4.3.4.1', '8000.00', NULL, '4.3.4.1 Video operator / cameraman', 12),
(635, 4, 3, 4, '4.3.4.2', '2000.00', NULL, '4.3.4.2 Technical personnel for the event', 12),
(636, 4, 3, 6, '4.3.6', '20000.00', NULL, '4.3.6 Production (Design & Layout)', 12),
(637, 4, 3, 6, '4.3.6.1', '3000.00', NULL, '4.3.6.1 Graphic designer for the book (layout, graphic design...)', 12),
(638, 4, 3, 6, '4.3.6.2', '6000.00', NULL, '4.3.6.2 Editor for the book (concept, collecting materials...)', 12),
(639, 4, 3, 6, '4.3.6.3', '2000.00', NULL, '4.3.6.3 Photographer', 12),
(640, 4, 3, 6, '4.3.6.4', '5000.00', NULL, '4.3.6.4 Event producers', 12),
(641, 4, 3, 6, '4.3.6.5', '1800.00', NULL, '4.3.6.5 Coordinator', 12),
(642, 4, 3, 6, '4.3.6.6', '1400.00', NULL, '4.3.6.6 Organising staff', 12),
(643, 4, 3, 6, '4.3.6.7', '800.00', NULL, '4.3.6.7 Stage producer', 12),
(644, 4, 3, 7, '4.3.7', '1000.00', NULL, '4.3.7 Others (Reception staff, security, etc)', 12),
(645, 4, 3, 7, '4.3.7.1', '1000.00', NULL, '4.3.7.1 Reception staff', 12),
(646, 1, 1, 1, '1.1.1', '600.00', NULL, '1.1.1 SIAE', 13),
(647, 1, 3, 1, '1.3.1', '2500.00', NULL, '1.3.1 Audio video equipment Macro Events', 13),
(648, 1, 3, 2, '1.3.2', '1500.00', NULL, '1.3.2 Equipment Micro Events', 13),
(649, 1, 3, 3, '1.3.3', '6000.00', NULL, '1.3.3 Tecnical Equipment Macro Event', 13),
(650, 1, 4, 1, '1.4.1', '1000.00', NULL, '1.4.1 Materials Micro Events', 13),
(651, 1, 5, 1, '1.5.1', '6000.00', NULL, '1.5.1 Set design and costumes', 13),
(652, 1, 7, 1, '1.7.1', '1000.00', NULL, '1.7.1 Insurance equipment Micro Events', 13),
(653, 1, 7, 2, '1.7.2', '600.00', NULL, '1.7.2 Insurance team Micro Events', 13),
(654, 2, 1, 1, '2.1.1', '3000.00', NULL, '2.1.1 Program Macro Events', 13),
(655, 2, 1, 2, '2.1.2', '200.00', NULL, '2.1.2 Program Micro Events', 13),
(656, 2, 1, 3, '2.1.3', '1000.00', NULL, '2.1.3 Posters Macro Events', 13),
(657, 2, 1, 4, '2.1.4', '300.00', NULL, '2.1.4 Posters Micro Events', 13),
(658, 2, 1, 5, '2.1.5', '6000.00', NULL, '2.1.5 ESCT Model Publication', 13),
(659, 2, 2, 1, '2.2.1', '2250.00', NULL, '2.2.1 Advertising space (publicity TV, radio, press conference, social networks, etc.)', 13),
(660, 2, 2, 1, '2.2.1.1', '2250.00', NULL, '2.2.1.1 Web Advertising costs', 13),
(661, 2, 2, 2, '2.2.2', '500.00', NULL, '2.2.2 Purchase of materials (T-shirt, flyers, papers, posters, etc. )', 13),
(662, 2, 2, 2, '2.2.2.1', '500.00', NULL, '2.2.2.1 Staff partner T-shirt', 13),
(663, 2, 3, 2, '2.3.2', '10000.00', NULL, '2.3.2 Other (specify)', 13),
(664, 2, 3, 2, '2.3.2.1', '10000.00', NULL, '2.3.2.1 Social media content curator', 13),
(665, 3, 1, 1, '3.1.1', '2000.00', NULL, '3.1.1 Transport audio video technicians Macro Events', 13),
(666, 3, 1, 2, '3.1.2', '3600.00', NULL, '3.1.2 transport equipe of management', 13),
(667, 3, 1, 3, '3.1.3', '900.00', NULL, '3.1.3 transport artists Micro event', 13),
(668, 3, 2, 1, '3.2.1', '12000.00', NULL, '3.2.1 Hotel audio video technicians Macro Events', 13),
(669, 3, 2, 2, '3.2.2', '4320.00', NULL, '3.2.2 hotel equipe of management', 13),
(670, 3, 2, 3, '3.2.3', '2160.00', NULL, '3.2.3 hotel actors for the others Micro Events', 13),
(671, 3, 3, 1, '3.3.1', '6000.00', NULL, '3.3.1 Subsistence allowanceaudio video technicians Macro Events', 13),
(672, 3, 3, 2, '3.3.2', '2160.00', NULL, '3.3.2 Substistence allowance management equipe', 13),
(673, 3, 3, 3, '3.3.3', '1440.00', NULL, '3.3.3 Subsitance actors for the others Micro Events', 13),
(674, 4, 1, 1, '4.1.1', '52500.00', NULL, '4.1.1 Project manager/officer', 13),
(675, 4, 1, 1, '4.1.1.1', '21000.00', NULL, '4.1.1.1 Project manager/officer part time - Matteo Pessione', 13),
(676, 4, 1, 1, '4.1.1.2', '31500.00', NULL, '4.1.1.2 Administration manager part time - Raffaella Pavesio', 13),
(677, 4, 1, 2, '4.1.2', '50400.00', NULL, '4.1.2 Assistant', 13),
(678, 4, 1, 2, '4.1.2.1', '25200.00', NULL, '4.1.2.1 Assistant Project manager/officer part time - Alessandro Battaglini', 13);
INSERT INTO `budget` (`id`, `macro1`, `macro2`, `macro3`, `codedest`, `amount`, `activity`, `description`, `partner`) VALUES
(679, 4, 1, 2, '4.1.2.2', '25200.00', NULL, '4.1.2.2 Assistant Administration manager part time - Alice Spalatro', 13),
(680, 4, 1, 4, '4.1.4', '33200.00', NULL, '4.1.4 Other (specify)', 13),
(681, 4, 1, 4, '4.1.4.1', '21000.00', NULL, '4.1.4.1 Communication manager - to be determined', 13),
(682, 4, 1, 4, '4.1.4.2', '5000.00', NULL, '4.1.4.2 Press officer - Journalist - to be determined', 13),
(683, 4, 1, 4, '4.1.4.3', '7200.00', NULL, '4.1.4.3 Tecnical Office part time - Francesca Gagnor', 13),
(684, 4, 2, 5, '4.2.5', '8400.00', NULL, '4.2.5 Interpreters and translators', 13),
(685, 4, 2, 5, '4.2.5.1', '8400.00', NULL, '4.2.5.1 Interpreters and translators', 13),
(686, 4, 2, 6, '4.2.6', '6000.00', NULL, '4.2.6 External speakers', 13),
(687, 4, 2, 6, '4.2.6.1', '6000.00', NULL, '4.2.6.1 External speakers', 13),
(688, 4, 2, 7, '4.2.7', '25000.00', NULL, '4.2.7 Other (specify)', 13),
(689, 4, 2, 7, '4.2.7.1', '25000.00', NULL, '4.2.7.1 Project coordination assistance - Raffaella Pavesio', 13),
(690, 4, 3, 2, '4.3.2', '14220.00', NULL, '4.3.2 Artists fees', 13),
(691, 4, 3, 2, '4.3.2.1', '1440.00', NULL, '4.3.2.1 Senior artist - Community trainer Micro Events', 13),
(692, 4, 3, 2, '4.3.2.2', '2640.00', NULL, '4.3.2.2 Middle artist - Community coordinator Micro Events', 13),
(693, 4, 3, 2, '4.3.2.3', '1320.00', NULL, '4.3.2.3 Middle artist - Community trainer Micro Events', 13),
(694, 4, 3, 2, '4.3.2.4', '1320.00', NULL, '4.3.2.4 Middle artist - Community trainer Micro Events', 13),
(695, 4, 3, 2, '4.3.2.5', '1200.00', NULL, '4.3.2.5 Junior artist - Micro Events', 13),
(696, 4, 3, 2, '4.3.2.6', '6300.00', NULL, '4.3.2.6 Artists associated partner - Micro Events', 13),
(697, 4, 3, 4, '4.3.4', '89250.00', NULL, '4.3.4 Technicians', 13),
(698, 4, 3, 4, '4.3.4.1', '1750.00', NULL, '4.3.4.1 Technicians Micro Events', 13),
(699, 4, 3, 4, '4.3.4.2', '12500.00', NULL, '4.3.4.2 Audio video technicians', 13),
(700, 4, 3, 4, '4.3.4.3', '12500.00', NULL, '4.3.4.3 Audio video technicians', 13),
(701, 4, 3, 4, '4.3.4.4', '12500.00', NULL, '4.3.4.4 Audio video technicians', 13),
(702, 4, 3, 4, '4.3.4.5', '50000.00', NULL, '4.3.4.5 Doc video Director / maker', 13),
(703, 4, 3, 6, '4.3.6', '10000.00', NULL, '4.3.6 Production (Design & Layout)', 13),
(704, 4, 3, 6, '4.3.6.1', '10000.00', NULL, '4.3.6.1 Doc video production', 13);

-- --------------------------------------------------------

--
-- Struttura della tabella `budgetmacro`
--

CREATE TABLE IF NOT EXISTS `budgetmacro` (
  `id` int(11) NOT NULL DEFAULT '0',
  `description` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
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
-- Struttura della tabella `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
  `description` varchar(3) CHARACTER SET utf8 NOT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`description`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `currency`
--

INSERT INTO `currency` (`description`, `rate`) VALUES
('EUR', '1.00');

-- --------------------------------------------------------

--
-- Struttura della tabella `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_03_14_182918_create_user', 1),
('2014_03_16_133405_create_roles', 1),
('2014_03_16_203300_create_city', 1),
('2014_03_16_203300_create_state_province', 1),
('2014_03_27_124507_create_users_event_table', 1),
('2014_03_31_090248_create_password_reminders_table', 1),
('2014_07_03_202318_create_visit_table', 1),
('2014_07_03_202335_create_typevisit_table', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `created_at` timestamp not null default current_timestamp,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dump dei dati per la tabella `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `created_at`, `deleted_at`) VALUES
(1, 'news 1', 'Only for example', '2015-06-14 08:08:08', NULL),
(2, 'news 2', 'Only for example', '2015-06-14 08:08:08', NULL),
(3, 'news 3', 'only for example', '2015-06-14 08:08:28', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `partner`
--

CREATE TABLE IF NOT EXISTS `partner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `budget` decimal(15,2) NOT NULL,
  `short` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dump dei dati per la tabella `partner`
--

INSERT INTO `partner` (`id`, `description`, `budget`, `short`) VALUES
(1, 'NORDISK TEATERLABORATORIUM*ODIN TEATRET', '949782.00', 'ODIN'),
(2, 'UNIVERSITA'' DEGLI STUDI DI TORINO', '737060.00', 'UNITO'),
(3, 'Centro de Arte y Producciones Teatrales SL', '357160.00', 'TNT'),
(4, 'Stowarzyszenie Edukacyino - Spoleczno - Kulturarne Teatr Brama', '256350.00', 'BRAMA'),
(5, 'ZID Theatre', '409690.00', 'ZID'),
(6, 'Truc spherique', '100000.00', 'TRUC'),
(7, 'Bürgerstiftung Rohrmeisterei Schwerte', '99780.00', 'BRS'),
(8, 'TECHNICAL UNIVERSITY OF CRETE', '300020.00', 'UNICRETE'),
(9, 'Farm in Cave', '107500.00', 'FARM'),
(10, 'OMMA STUDIO PRIVATE NON PROFIT COMPANY', '38100.00', 'OMMA'),
(11, 'ASSOCIATION DES AGENCES DE LA DEMOCRATIE LOCALE', '107500.00', 'ALDA'),
(12, 'KULTURNO IZOBRAZEVALNO DRUSTVO KIBLA', '150000.00', 'KIBLA'),
(13, 'Società Consortile per Azioni OGR-CRT', '380000.00', 'OGR');

-- --------------------------------------------------------

--
-- Struttura stand-in per le viste `partner_view`
--
CREATE TABLE IF NOT EXISTS `partner_view` (
`id` int(11)
,`description` varchar(255)
,`budget` decimal(15,2)
,`spent` int(1)
,`verified` int(1)
);
-- --------------------------------------------------------

--
-- Struttura della tabella `password_reminders`
--

CREATE TABLE IF NOT EXISTS `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_reminders_email_index` (`email`),
  KEY `password_reminders_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `payedby`
--

CREATE TABLE IF NOT EXISTS `payedby` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
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
-- Struttura della tabella `province`
--

CREATE TABLE IF NOT EXISTS `province` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=53 ;

--
-- Dump dei dati per la tabella `province`
--

INSERT INTO `province` (`id`, `description`) VALUES
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
-- Struttura della tabella `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `update` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `roles`
--

INSERT INTO `roles` (`id`, `description`, `update`) VALUES
(1, 'admin', 1),
(2, 'developer', 1),
(3, 'partner', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `typevisit`
--

CREATE TABLE IF NOT EXISTS `typevisit` (
  `id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `typevisit`
--

INSERT INTO `typevisit` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Advocacy', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Consumer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Autogestito', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp not null default current_timestamp,
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
  `partner` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `name`, `surname`, `phone`, `email`, `created_at`, `updated_at`, `deleted_at`, `lastlogin_at`, `last_pwd_changed_at`, `last_pwd_change_request_at`, `user_created`, `user_updated`, `user_deleted`, `remember_token`, `try_wrong_login`, `active`, `deleted`, `partner`) VALUES
(6, 'support@caravanext.eu', '$2y$10$3H/YbZa/DEBMRl2zmu6Ch.2/HASW8ywMAkRYXKElYk2rQG2hpcckK', 1, 'Support', 'Caravan', '', 'tech@reportavpn.com', '2015-06-14 00:00:00', '2015-06-15 06:51:42', '0000-00-00 00:00:00', '2015-06-15 06:51:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'Ty8ubQDoxSi8YEjsZXmISkhgOPvuErsE1seavxlzEMehVZaalRnxp1L5LwS2', 0, 1, 0, 1),
(7, 'alberto.pagliarino@gmail.com', '$2y$10$3H/YbZa/DEBMRl2zmu6Ch.2/HASW8ywMAkRYXKElYk2rQG2hpcckK', 3, 'Alberto', 'Pagliarino', '', 'alberto.pagliarino@gmail.com', '2015-06-14 00:00:00', '2016-02-17 20:46:46', '0000-00-00 00:00:00', '2016-02-17 20:46:46', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0, '', 0, 1, 0, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `users_event`
--

CREATE TABLE IF NOT EXISTS `users_event` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `message` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dump dei dati per la tabella `users_event`
--

INSERT INTO `users_event` (`id`, `created_at`, `message`, `type`, `user_id`) VALUES
(1, '2014-07-06 15:05:04', 'Accesso effettuato il 07/06/2014 15:05:04 ', 'info', 2),
(2, '2014-07-06 15:15:38', 'Accesso effettuato il 07/06/2014 15:15:38 ', 'info', 1),
(3, '2014-07-07 10:24:02', 'Accesso effettuato il 07/07/2014 10:24:02 ', 'info', 1),
(4, '2014-07-07 10:24:13', 'Accesso effettuato il 07/07/2014 10:24:13 ', 'info', 1),
(5, '2014-07-07 10:26:38', 'Accesso effettuato il 07/07/2014 10:26:38 ', 'info', 2),
(6, '2014-07-07 10:28:12', 'Accesso effettuato il 07/07/2014 10:28:12 ', 'info', 5),
(7, '2014-07-07 10:29:01', 'Accesso effettuato il 07/07/2014 10:29:01 ', 'info', 4),
(8, '2014-07-07 10:30:32', 'Accesso effettuato il 07/07/2014 10:30:32 ', 'info', 1),
(9, '2014-07-07 10:32:35', 'Accesso effettuato il 07/07/2014 10:32:35 ', 'info', 2),
(10, '2014-07-07 16:09:32', 'Accesso effettuato il 07/07/2014 16:09:32 ', 'info', 2),
(11, '2014-07-07 18:59:37', 'Accesso effettuato il 07/07/2014 18:59:37 ', 'info', 1),
(12, '2014-07-08 08:49:22', 'Accesso effettuato il 07/08/2014 08:49:22 ', 'info', 1),
(13, '2014-07-08 12:43:51', 'Accesso effettuato il 08/07/2014 12:43:51 ', 'info', 2),
(14, '2014-07-08 12:45:44', 'Inserita una nuova visita Advocacy 08/07/2014 12:45:44', 'info', 2),
(15, '2014-07-15 21:57:27', 'Accesso effettuato il 15/07/2014 21:57:27 ', 'info', 2),
(16, '2014-07-15 22:18:55', 'Inserita una nuova visita Advocacy 15/07/2014 22:18:55', 'info', 2),
(17, '2014-07-16 00:11:42', 'Accesso effettuato il 16/07/2014 00:11:42 ', 'info', 1),
(18, '2015-06-14 04:04:56', 'Accesso effettuato il 14/06/2015 04:04:56 ', 'info', 1),
(19, '2015-06-14 13:45:15', 'Accesso effettuato il 14/06/2015 13:45:15 ', 'info', 1),
(20, '2015-06-14 16:46:55', 'Accesso effettuato il 14/06/2015 16:46:55 ', 'info', 1),
(21, '2015-06-14 17:40:44', 'Accesso effettuato il 14/06/2015 17:40:44 ', 'info', 6),
(22, '2015-06-15 06:50:11', 'Accesso effettuato il 15/06/2015 06:50:11 ', 'info', 6),
(23, '2015-06-15 06:51:27', 'Accesso effettuato il 15/06/2015 06:51:27 ', 'info', 6),
(24, '2015-06-15 06:51:59', 'Accesso effettuato il 15/06/2015 06:51:59 ', 'info', 7),
(25, '2016-01-26 16:11:51', 'Accesso effettuato il 26/01/2016 16:11:51 ', 'info', 7),
(26, '2016-02-16 02:38:30', 'Accesso effettuato il 16/02/2016 02:38:30 ', 'info', 7),
(27, '2016-02-16 13:20:29', 'Accesso effettuato il 16/02/2016 13:20:29 ', 'info', 7),
(28, '2016-02-17 20:46:46', 'Accesso effettuato il 17/02/2016 20:46:46 ', 'info', 7);

-- --------------------------------------------------------

--
-- Struttura stand-in per le viste `view_visit`
--
CREATE TABLE IF NOT EXISTS `view_visit` (
`id` int(10) unsigned
,`created_at` datetime
,`short` varchar(10)
,`row` int(11)
,`currency` varchar(3)
,`netamount` decimal(15,2)
,`vatamount` decimal(15,2)
,`euronetamount` decimal(15,2)
,`eurovatamount` decimal(15,2)
,`eurototal` decimal(16,2)
,`partner` int(11)
);
-- --------------------------------------------------------

--
-- Struttura della tabella `visit`
--

CREATE TABLE IF NOT EXISTS `visit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `doc2` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doc3` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doc4` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doc5` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doc6` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dump dei dati per la tabella `visit`
--

INSERT INTO `visit` (`id`, `d_document`, `d_document_start`, `d_document_stop`, `partner`, `description_cost`, `activity`, `budgetrow`, `payedby`, `d_document_paid`, `comment`, `tpc`, `sub`, `d_document_start_travel`, `d_document_finish_travel`, `n_people`, `name_people`, `role_people`, `from_nation`, `from_city`, `to_nation`, `to_city`, `doc1`, `doc2`, `doc3`, `doc4`, `doc5`, `doc6`, `currency`, `netamount`, `vatamount`, `euronetamount`, `eurovatamount`, `created_at`, `updated_at`, `deleted_at`, `user_created`, `user_updated`, `user_deleted`, `active`, `deleted`, `verified`) VALUES
(4, '0000-00-00 00:00:00', NULL, NULL, 2, '', '', 5, 1, NULL, '', 0, 0, NULL, NULL, 0, '', '', '1', '', '1', '', NULL, NULL, NULL, NULL, NULL, NULL, 'EUR', '100.00', '0.00', NULL, NULL, '2016-02-16 03:58:24', '2016-02-16 04:36:08', NULL, 7, 7, NULL, 0, 0, 0),
(5, '2016-02-17 00:00:00', NULL, NULL, 2, '', '', 2, 4, NULL, '', 0, 0, NULL, NULL, 0, '', '', '1', '', '1', '', 'OCnwEu_Istanza_968_allegato2.pdf', NULL, NULL, NULL, NULL, NULL, 'EUR', '0.00', '0.00', NULL, NULL, '2016-02-17 22:05:01', '2016-02-17 22:05:01', NULL, 7, NULL, NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struttura stand-in per le viste `v_budget_macro`
--
CREATE TABLE IF NOT EXISTS `v_budget_macro` (
`partner` int(11)
,`macro1` int(11)
,`description` varchar(80)
,`amount` decimal(37,2)
,`amountspent` decimal(65,4)
);
-- --------------------------------------------------------

--
-- Struttura stand-in per le viste `v_budget_spent`
--
CREATE TABLE IF NOT EXISTS `v_budget_spent` (
`id` int(11)
,`partner` int(11)
,`row` varchar(10)
,`macro1` int(11)
,`codedest` varchar(10)
,`description` varchar(1000)
,`amountbudget` decimal(15,2)
,`amountinserted` decimal(48,4)
,`amountspent` decimal(48,4)
,`amountverified` decimal(48,4)
);
-- --------------------------------------------------------

--
-- Struttura stand-in per le viste `v_budget_spent_macro`
--
CREATE TABLE IF NOT EXISTS `v_budget_spent_macro` (
`partner` int(11)
,`macro1` int(11)
,`amountspent` decimal(65,4)
);
-- --------------------------------------------------------

--
-- Struttura per la vista `partner_view`
--
DROP TABLE IF EXISTS `partner_view`;

CREATE  VIEW `partner_view` AS select `partner`.`id` AS `id`,`partner`.`description` AS `description`,`partner`.`budget` AS `budget`,0 AS `spent`,0 AS `verified` from `partner`;

-- --------------------------------------------------------

--
-- Struttura per la vista `view_visit`
--
DROP TABLE IF EXISTS `view_visit`;

CREATE  VIEW `view_visit` AS select `visit`.`id` AS `id`,`visit`.`created_at` AS `created_at`,`partner`.`short` AS `short`,`visit`.`budgetrow` AS `row`,`visit`.`currency` AS `currency`,`visit`.`netamount` AS `netamount`,`visit`.`vatamount` AS `vatamount`,`visit`.`euronetamount` AS `euronetamount`,`visit`.`eurovatamount` AS `eurovatamount`,(`visit`.`euronetamount` + `visit`.`eurovatamount`) AS `eurototal`,`visit`.`partner` AS `partner` from (`visit` join `partner` on((`visit`.`partner` = `partner`.`id`)));

-- --------------------------------------------------------

--
-- Struttura per la vista `v_budget_macro`
--
DROP TABLE IF EXISTS `v_budget_macro`;

CREATE  VIEW `v_budget_macro` AS select `budget`.`partner` AS `partner`,`budget`.`macro1` AS `macro1`,`budgetmacro`.`description` AS `description`,sum(`budget`.`amount`) AS `amount`,coalesce(`v_budget_spent_macro`.`amountspent`,0) AS `amountspent` from ((`budget` join `budgetmacro` on((`budget`.`macro1` = `budgetmacro`.`id`))) left join `v_budget_spent_macro` on(((`v_budget_spent_macro`.`macro1` = `budget`.`macro1`) and (`v_budget_spent_macro`.`partner` = `budget`.`partner`)))) group by `budget`.`partner`,`budget`.`macro1`,`budgetmacro`.`description`;

-- --------------------------------------------------------

--
-- Struttura per la vista `v_budget_spent`
--
DROP TABLE IF EXISTS `v_budget_spent`;

CREATE  VIEW `v_budget_spent` AS select `budget`.`id` AS `id`,`budget`.`partner` AS `partner`,`budget`.`codedest` AS `row`,`budget`.`macro1` AS `macro1`,`budget`.`codedest` AS `codedest`,`budget`.`description` AS `description`,max(`budget`.`amount`) AS `amountbudget`,(sum(coalesce((`visit`.`netamount` * `currency`.`rate`),0)) + sum(coalesce((`visit`.`vatamount` * `currency`.`rate`),0))) AS `amountinserted`,(sum((case when (`visit`.`payedby` <> 4) then coalesce((`visit`.`netamount` * `currency`.`rate`),0) else 0 end)) + sum((case when (`visit`.`payedby` <> 4) then coalesce((`visit`.`vatamount` * `currency`.`rate`),0) else 0 end))) AS `amountspent`,(sum((case when (`visit`.`verified` = 1) then coalesce((`visit`.`netamount` * `currency`.`rate`),0) else 0 end)) + sum((case when (`visit`.`verified` = 1) then coalesce((`visit`.`vatamount` * `currency`.`rate`),0) else 0 end))) AS `amountverified` from ((`budget` left join `visit` on((`visit`.`budgetrow` = `budget`.`id`))) left join `currency` on((`visit`.`currency` = `currency`.`description`))) group by `budget`.`id`,`budget`.`partner`,`budget`.`macro1`,`budget`.`codedest`,`budget`.`description`;

-- --------------------------------------------------------

--
-- Struttura per la vista `v_budget_spent_macro`
--
DROP TABLE IF EXISTS `v_budget_spent_macro`;

CREATE  VIEW `v_budget_spent_macro` AS select `v_budget_spent`.`partner` AS `partner`,`v_budget_spent`.`macro1` AS `macro1`,sum(`v_budget_spent`.`amountspent`) AS `amountspent` from `v_budget_spent` group by `v_budget_spent`.`partner`,`v_budget_spent`.`macro1`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
