-- Copyright © 2020 Aleksandr Kolbasov

CREATE DATABASE app CHARACTER SET utf8 COLLATE utf8_unicode_ci;
-- USE app;
CREATE TABLE app.users (
    `id` INT NOT NULL AUTO_INCREMENT ,
    `login` VARCHAR(20) NOT NULL ,
    `name` VARCHAR(64) NOT NULL ,
    `password` VARCHAR(64) NOT NULL ,
    `pw_hash` VARCHAR(5) NOT NULL ,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;
CREATE TABLE app.books (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` TEXT NOT NULL ,
    `year` INT NOT NULL ,
    `publisher` INT NOT NULL ,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;
CREATE TABLE app.publishers (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` TEXT NOT NULL ,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;
