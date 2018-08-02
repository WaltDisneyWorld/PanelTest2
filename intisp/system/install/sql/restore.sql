-- IntISP MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `webister` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `webister`;

CREATE TABLE `cloudflare` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `username` text,
  `email` text,
  `password` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `cron` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(1000) DEFAULT NULL,
  `time` varchar(1000) DEFAULT NULL,
  `value` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `failedlogin` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `ip` text,
  `time` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `mail` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `subject` text,
  `message` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `mail` (`id`, `subject`, `message`) VALUES
(1,	'Welcome To Webister',	'<b>We are glad that you decided to choose Webister.</b> <p>We hope you enjoy our awesome control panel. You will get messages/emails once you place your email address in the settings.</p><p>\r\nIf you feel that there are some issues or you need fix your Webister, please remember to try updating it first. You can update this in our main control panel.</p>');

CREATE TABLE `settings` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(1000) DEFAULT NULL,
  `value` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `settings` (`id`, `code`, `value`) VALUES
(1,	'title',	'My Web Host');

CREATE TABLE `users` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(1000) DEFAULT NULL,
  `password` text,
  `bandwidth` text,
  `diskspace` text,
  `port` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2018-08-02 00:51:11
