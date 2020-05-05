-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema WebCUCME
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `WebCUCME` ;

-- -----------------------------------------------------
-- Schema WebCUCME
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `WebCUCME` DEFAULT CHARACTER SET utf8 ;
USE `WebCUCME` ;

-- -----------------------------------------------------
-- Table `WebCUCME`.`Usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `WebCUCME`.`Usuario` ;

CREATE TABLE IF NOT EXISTS `WebCUCME`.`Usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `nombreU` VARCHAR(45) NOT NULL,
  `contrasenia` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idusuario`))
ENGINE = InnoDB
COMMENT = 'aqui estan los usuarios';


-- -----------------------------------------------------
-- Table `WebCUCME`.`Dispositivo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `WebCUCME`.`Dispositivo` ;

CREATE TABLE IF NOT EXISTS `WebCUCME`.`Dispositivo` (
  `idDispositivo` INT NOT NULL AUTO_INCREMENT,
  `nombreD` VARCHAR(45) NULL,
  `tipo` VARCHAR(45) NULL,
  `Usuario_idusuario` INT NOT NULL,
  PRIMARY KEY (`idDispositivo`),
  INDEX `fk_Dispositivo_Usuario_idx` (`Usuario_idusuario` ASC),
  CONSTRAINT `fk_Dispositivo_Usuario`
    FOREIGN KEY (`Usuario_idusuario`)
    REFERENCES `WebCUCME`.`Usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebCUCME`.`Interface`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `WebCUCME`.`Interface` ;

CREATE TABLE IF NOT EXISTS `WebCUCME`.`Interface` (
  `idinterface` INT NOT NULL AUTO_INCREMENT,
  `nombreI` VARCHAR(45) NULL,
  `ip` VARCHAR(45) NULL,
  `estado` VARCHAR(45) NULL,
  `Dispositivo_idDispositivo` INT NOT NULL,
  PRIMARY KEY (`idinterface`),
  INDEX `fk_Interface_Dispositivo1_idx` (`Dispositivo_idDispositivo` ASC),
  CONSTRAINT `fk_Interface_Dispositivo1`
    FOREIGN KEY (`Dispositivo_idDispositivo`)
    REFERENCES `WebCUCME`.`Dispositivo` (`idDispositivo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebCUCME`.`Enlace`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `WebCUCME`.`Enlace` ;

CREATE TABLE IF NOT EXISTS `WebCUCME`.`Enlace` (
  `idenlace` INT NOT NULL AUTO_INCREMENT,
  `Interface_idinterface` INT NOT NULL,
  `Interface_idinterface1` INT NOT NULL,
  PRIMARY KEY (`idenlace`),
  INDEX `fk_Enlace_Interface1_idx` (`Interface_idinterface` ASC),
  INDEX `fk_Enlace_Interface2_idx` (`Interface_idinterface1` ASC),
  CONSTRAINT `fk_Enlace_Interface1`
    FOREIGN KEY (`Interface_idinterface`)
    REFERENCES `WebCUCME`.`Interface` (`idinterface`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Enlace_Interface2`
    FOREIGN KEY (`Interface_idinterface1`)
    REFERENCES `WebCUCME`.`Interface` (`idinterface`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------
-- Se hacen inserciones para prueba --
-- -----------------------------------

-- Se crea un usuario administrador --
insert into usuario values (null,'admin','admin');

INSERT INTO dispositivo VALUES(null, 'CUCME','cucme',1);

-- idinterface, nombreI, ip, estado, Dispositivo_idDispositivo
-- INSERT INTO interface VALUES(null, 'fa 0/1','192.168.23.1',1);
