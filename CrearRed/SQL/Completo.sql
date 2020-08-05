SET @lower_case_table_names = 1;


SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema webcucme
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `webcucme` ;

-- -----------------------------------------------------
-- Schema webcucme
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `webcucme` DEFAULT CHARACTER SET utf8 ;
USE `webcucme` ;

-- -----------------------------------------------------
-- Table `webcucme`.`Usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `webcucme`.`Usuario` ;

CREATE TABLE IF NOT EXISTS `webcucme`.`Usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `nombreU` VARCHAR(45) NOT NULL,
  `contrasenia` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idusuario`))
ENGINE = InnoDB
COMMENT = 'aqui estan los usuarios';


-- -----------------------------------------------------
-- Table `webcucme`.`Dispositivo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `webcucme`.`Dispositivo` ;

CREATE TABLE IF NOT EXISTS `webcucme`.`Dispositivo` (
  `idDispositivo` INT NOT NULL AUTO_INCREMENT,
  `nombreD` VARCHAR(45) NULL,
  `tipo` VARCHAR(45) NULL,
  `Usuario_idusuario` INT NOT NULL,
  PRIMARY KEY (`idDispositivo`),
  INDEX `fk_Dispositivo_Usuario_idx` (`Usuario_idusuario` ASC),
  CONSTRAINT `fk_Dispositivo_Usuario`
    FOREIGN KEY (`Usuario_idusuario`)
    REFERENCES `webcucme`.`Usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `webcucme`.`Interface`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `webcucme`.`Interface` ;

CREATE TABLE IF NOT EXISTS `webcucme`.`Interface` (
  `idinterface` INT NOT NULL AUTO_INCREMENT,
  `nombreI` VARCHAR(45) NULL,
  `ip` VARCHAR(15) NULL,
  `estado` VARCHAR(45) NULL,
  `Dispositivo_idDispositivo` INT NOT NULL,
  PRIMARY KEY (`idinterface`),
  INDEX `fk_Interface_Dispositivo1_idx` (`Dispositivo_idDispositivo` ASC),
  CONSTRAINT `fk_Interface_Dispositivo1`
    FOREIGN KEY (`Dispositivo_idDispositivo`)
    REFERENCES `webcucme`.`Dispositivo` (`idDispositivo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `webcucme`.`Enlace`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `webcucme`.`Enlace` ;

CREATE TABLE IF NOT EXISTS `webcucme`.`Enlace` (
  `idenlace` INT NOT NULL AUTO_INCREMENT,
  `Interface_idinterface` INT NOT NULL,
  `Interface_idinterface1` INT NOT NULL,
  PRIMARY KEY (`idenlace`),
  INDEX `fk_Enlace_Interface1_idx` (`Interface_idinterface` ASC),
  INDEX `fk_Enlace_Interface2_idx` (`Interface_idinterface1` ASC),
  CONSTRAINT `fk_Enlace_Interface1`
    FOREIGN KEY (`Interface_idinterface`)
    REFERENCES `webcucme`.`Interface` (`idinterface`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Enlace_Interface2`
    FOREIGN KEY (`Interface_idinterface1`)
    REFERENCES `webcucme`.`Interface` (`idinterface`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
-- Se crean vistas para manejar facil las conecciones entre los dispositivos
CREATE VIEW vista1 AS SELECT idDispositivo,Interface_idinterface,Interface_idinterface1 FROM WebCUCME.dispositivo inner join WebCUCME.interface inner join WebCUCME.enlace  where Dispositivo_idDispositivo=idDispositivo and Interface_idinterface=idinterface;
CREATE VIEW vista2 AS SELECT idDispositivo,Interface_idinterface1 FROM WebCUCME.dispositivo inner join WebCUCME.interface inner join WebCUCME.enlace  where Dispositivo_idDispositivo=idDispositivo and Interface_idinterface1=idinterface;
CREATE VIEW conDispo as SELECT vista1.idDispositivo as disp1, vista2.idDispositivo as disp2 from vista1 inner join vista2 where vista1.Interface_idinterface1=vista2.Interface_idinterface1;

-- vista para mostrar información en tabla de conecciones
CREATE VIEW vistaCompleta1 AS SELECT idenlace, idDispositivo, nombreD,idinterface,nombreI,ip,Interface_idinterface1 FROM WebCUCME.dispositivo inner join WebCUCME.interface inner join WebCUCME.enlace  where Dispositivo_idDispositivo=idDispositivo and Interface_idinterface=idinterface;
CREATE VIEW vistaCompleta2 AS SELECT idDispositivo, nombreD,idinterface,nombreI,ip FROM WebCUCME.dispositivo inner join WebCUCME.interface inner join WebCUCME.enlace  where Dispositivo_idDispositivo=idDispositivo and Interface_idinterface1=idinterface;
CREATE VIEW vistaCompletaCompleta AS SELECT idenlace,vistaCompleta1.idDispositivo as idDisp1, vistaCompleta1.nombreD as nomD1, vistaCompleta1.idinterface as idIntDisp1, vistaCompleta1.nombreI as nomInt1, vistaCompleta1.ip as ip1, vistacompleta2.idDispositivo as idDisp2, vistacompleta2.nombreD as nomD2, Interface_idinterface1 as idIntDisp2, vistaCompleta2.nombreI as nomInt2, vistaCompleta2.ip as ip2 from WebCUCME.vistaCompleta1 inner join WebCUCME.vistacompleta2 where Interface_idinterface1=vistacompleta2.idinterface;

create view dispositivointerfaz as select nombreD, idinterface, nombreI, ip from dispositivo inner join interface where idDispositivo=Dispositivo_idDispositivo;

-- Inserciones de prueba
insert into webcucme.usuario values (null,'admin','admin');
insert into webcucme.usuario values (null,'memo','memo');
insert into webcucme.dispositivo values (null,'CUCME','cucme',1);
insert into webcucme.dispositivo values (null,'R2','cucme',1);
insert into webcucme.interface values (null,'f 0/1', '192.168.23.1', 'up', 1);
insert into webcucme.interface values (null,'f 0/0.10', '192.168.1.1', 'up', 1);
insert into webcucme.interface values (null,'f 0/0.20', '192.168.2.1', 'up', 1);
insert into webcucme.interface values (null,'s 0/0', '192.168.100.1', 'up', 1);
insert into webcucme.interface values (null,'s 0/0', '192.168.100.2', 'up', 2);
insert into webcucme.enlace values (null,4,5);
