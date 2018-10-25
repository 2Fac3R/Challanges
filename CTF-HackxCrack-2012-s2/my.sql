CREATE DATABASE `ctf_hxc`;
 USE `ctf_hxc`;
 CREATE TABLE `comentarios`(
 `id` INT NOT NULL AUTO_INCREMENT,
 `Autor` VARCHAR(9),
 `Mensaje` VARCHAR(20),
 PRIMARY KEY (id)
 );