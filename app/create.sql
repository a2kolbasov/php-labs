-- Copyright © 2020 Aleksandr Kolbasov

CREATE DATABASE app CHARACTER SET utf8 COLLATE utf8_unicode_ci;
-- USE app;
CREATE TABLE app.users (
    `id` INT NOT NULL AUTO_INCREMENT ,
    `login` VARCHAR(20) NOT NULL ,
    `password` VARCHAR(64) NOT NULL ,
    `pw_hash` VARCHAR(5) NOT NULL ,
    `name` VARCHAR(64) ,
    `email` VARCHAR(64),
    `priveleges` VARCHAR(10),
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;
CREATE TABLE `app`.`auctions` (
    `id` INT NOT NULL AUTO_INCREMENT ,
    `title` INT NOT NULL ,
    `isVisible` INT NOT NULL ,
    `startTime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
    `endTime` TIMESTAMP NULL DEFAULT NULL ,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;
CREATE TABLE `app`.`bets` (
    `id` INT NOT NULL AUTO_INCREMENT ,
    `auction` INT NOT NULL ,
    `time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
    `price` INT NOT NULL , `user` INT NOT NULL ,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;
