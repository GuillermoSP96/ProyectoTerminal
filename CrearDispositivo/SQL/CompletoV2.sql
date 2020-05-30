SET @lower_case_table_names = 1;

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema ProyectoDB
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `ProyectoDB` ;

-- -----------------------------------------------------
-- Schema ProyectoDB
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ProyectoDB` DEFAULT CHARACTER SET utf8 ;
USE `ProyectoDB` ;

-- -----------------------------------------------------
-- Table `ProyectoDB`.`Dispositivo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ProyectoDB`.`Dispositivo` ;

CREATE TABLE IF NOT EXISTS `ProyectoDB`.`Dispositivo` (
  `idDispositivo` INT NOT NULL AUTO_INCREMENT,
  `nombreD` VARCHAR(45) NULL,
  PRIMARY KEY (`idDispositivo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProyectoDB`.`Usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ProyectoDB`.`Usuario` ;

CREATE TABLE IF NOT EXISTS `ProyectoDB`.`Usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `nombreU` VARCHAR(45) NOT NULL,
  `contraseniaSSH` VARCHAR(45) NOT NULL,
  `contraseniaEnable` VARCHAR(45) NOT NULL,
  `Dispositivo_idDispositivo` INT NOT NULL,
  PRIMARY KEY (`idusuario`),
  INDEX `fk_Usuario_Dispositivo1_idx` (`Dispositivo_idDispositivo` ASC),
  CONSTRAINT `fk_Usuario_Dispositivo1`
    FOREIGN KEY (`Dispositivo_idDispositivo`)
    REFERENCES `ProyectoDB`.`Dispositivo` (`idDispositivo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'aqui estan los usuarios';


-- -----------------------------------------------------
-- Table `ProyectoDB`.`Interface`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ProyectoDB`.`Interface` ;

CREATE TABLE IF NOT EXISTS `ProyectoDB`.`Interface` (
  `idinterface` INT NOT NULL AUTO_INCREMENT,
  `nombreI` VARCHAR(45) NULL,
  `ip` VARCHAR(15) NULL,
  `OK?` VARCHAR(5) NULL,
  `method` VARCHAR(45) NULL,
  `estado` VARCHAR(45) NULL,
  `protocolo` VARCHAR(45) NULL,
  `Dispositivo_idDispositivo` INT NOT NULL,
  PRIMARY KEY (`idinterface`),
  INDEX `fk_Interface_Dispositivo1_idx` (`Dispositivo_idDispositivo` ASC),
  CONSTRAINT `fk_Interface_Dispositivo1`
    FOREIGN KEY (`Dispositivo_idDispositivo`)
    REFERENCES `ProyectoDB`.`Dispositivo` (`idDispositivo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProyectoDB`.`Enlace`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ProyectoDB`.`Enlace` ;

CREATE TABLE IF NOT EXISTS `ProyectoDB`.`Enlace` (
  `idenlace` INT NOT NULL AUTO_INCREMENT,
  `Interface_idinterface` INT NOT NULL,
  `Interface_idinterface1` INT NOT NULL,
  PRIMARY KEY (`idenlace`),
  INDEX `fk_Enlace_Interface1_idx` (`Interface_idinterface` ASC),
  INDEX `fk_Enlace_Interface2_idx` (`Interface_idinterface1` ASC),
  CONSTRAINT `fk_Enlace_Interface1`
    FOREIGN KEY (`Interface_idinterface`)
    REFERENCES `ProyectoDB`.`Interface` (`idinterface`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Enlace_Interface2`
    FOREIGN KEY (`Interface_idinterface1`)
    REFERENCES `ProyectoDB`.`Interface` (`idinterface`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
