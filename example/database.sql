CREATE DATABASE IF NOT EXISTS `pdftk-php`;

USE `pdftk-php`;

CREATE TABLE `users` (
  `id` tinyint(4) NOT NULL auto_increment,
  `firstname` varchar(65) NOT NULL,
  `lastname` varchar(65) NOT NULL,
  PRIMARY KEY  (`id`)
)