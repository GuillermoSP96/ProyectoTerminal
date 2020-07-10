create database GeekyTheoryBD;

CREATE TABLE `geekytheorybd`.`random` (
  `ID` INT NOT NULL auto_increment,
  `valor` INT NULL,
  `tiempo` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`));
