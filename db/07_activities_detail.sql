CREATE TABLE `activities_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `title` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

