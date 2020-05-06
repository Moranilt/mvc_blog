CREATE DATABASE `mvc_blog`;

USE `mvc_blog`;

DROP TABLE IF EXISTS `mvc_blog`;
CREATE TABLE `users`(
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `firstname` VARCHAR(30) NOT NULL,
  `lastname` VARCHAR(30) NOT NULL,
  `login` VARCHAR(30) UNIQUE,
  `email` VARCHAR(50),
  `password` CHAR(60),
  `hash` varchar(32) NOT NULL default '',
  `reg_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
