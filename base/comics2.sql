SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `comics` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `comics` ;

-- -----------------------------------------------------
-- Table `comics`.`editorial`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comics`.`editorial` ;

CREATE  TABLE IF NOT EXISTS `comics`.`editorial` (
  `ideditorial` INT NOT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`ideditorial`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `comics`.`edicion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comics`.`edicion` ;

CREATE  TABLE IF NOT EXISTS `comics`.`edicion` (
  `idedicion` INT NOT NULL ,
  `descripcion` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idedicion`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `comics`.`comics`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comics`.`comics` ;

CREATE  TABLE IF NOT EXISTS `comics`.`comics` (
  `idcomic` INT NOT NULL ,
  `nombre` TEXT NOT NULL ,
  `descripcion` TEXT NOT NULL ,
  `fecha` DATE NOT NULL ,
  `cantidad` INT NOT NULL ,
  `precio` INT NOT NULL ,
  `imagen` VARCHAR(45) NULL ,
  `editorial_ideditorial` INT NOT NULL ,
  `edicion_idedicion` INT NOT NULL ,
  `busqueda` TEXT NULL ,
  PRIMARY KEY (`idcomic`) ,
  INDEX `fk_Comics_Editorial_idx` (`editorial_ideditorial` ASC) ,
  INDEX `fk_Comics_Edicion1_idx` (`edicion_idedicion` ASC) ,
  CONSTRAINT `fk_Comics_Editorial`
    FOREIGN KEY (`editorial_ideditorial` )
    REFERENCES `comics`.`editorial` (`ideditorial` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comics_Edicion1`
    FOREIGN KEY (`edicion_idedicion` )
    REFERENCES `comics`.`edicion` (`idedicion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `comics`.`cargo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comics`.`cargo` ;

CREATE  TABLE IF NOT EXISTS `comics`.`cargo` (
  `idcargo` INT NOT NULL ,
  `cargo` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idcargo`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `comics`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comics`.`usuario` ;

CREATE  TABLE IF NOT EXISTS `comics`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT ,
  `a_paterno` VARCHAR(45) NOT NULL ,
  `a_materno` VARCHAR(45) NOT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  `nick` VARCHAR(45) NOT NULL ,
  `correo` VARCHAR(45) NOT NULL ,
  `cargo_idcargo` INT NOT NULL ,
  PRIMARY KEY (`idusuario`) ,
  INDEX `fk_Usuario_cargo1_idx` (`cargo_idcargo` ASC) ,
  CONSTRAINT `fk_Usuario_cargo1`
    FOREIGN KEY (`cargo_idcargo` )
    REFERENCES `comics`.`cargo` (`idcargo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1;


-- -----------------------------------------------------
-- Table `comics`.`usuario_has_Comics`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comics`.`usuario_has_Comics` ;

CREATE  TABLE IF NOT EXISTS `comics`.`usuario_has_Comics` (
  `usuario_idusuario` INT NOT NULL ,
  `comics_idcomic` INT NOT NULL ,
  PRIMARY KEY (`usuario_idusuario`, `comics_idcomic`) ,
  INDEX `fk_Usuario_has_Comics_Comics1_idx` (`comics_idcomic` ASC) ,
  INDEX `fk_Usuario_has_Comics_Usuario1_idx` (`usuario_idusuario` ASC) ,
  CONSTRAINT `fk_Usuario_has_Comics_Usuario1`
    FOREIGN KEY (`usuario_idusuario` )
    REFERENCES `comics`.`usuario` (`idusuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_has_Comics_Comics1`
    FOREIGN KEY (`comics_idcomic` )
    REFERENCES `comics`.`comics` (`idcomic` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `comics`.`blog`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comics`.`blog` ;

CREATE  TABLE IF NOT EXISTS `comics`.`blog` (
  `idblog` INT NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(45) NOT NULL ,
  `post` VARCHAR(450) NOT NULL ,
  `fecha` DATE NOT NULL ,
  `usuario_id_usuario` INT NOT NULL ,
  PRIMARY KEY (`idblog`) ,
  INDEX `fk_Blog_Usuario1_idx` (`usuario_id_usuario` ASC) ,
  CONSTRAINT `fk_Blog_Usuario1`
    FOREIGN KEY (`usuario_id_usuario` )
    REFERENCES `comics`.`usuario` (`idusuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `comics`.`editorial`
-- -----------------------------------------------------
START TRANSACTION;
USE `comics`;
INSERT INTO `comics`.`editorial` (`ideditorial`, `nombre`) VALUES (1, 'Marvel');
INSERT INTO `comics`.`editorial` (`ideditorial`, `nombre`) VALUES (2, 'DC');

COMMIT;

-- -----------------------------------------------------
-- Data for table `comics`.`edicion`
-- -----------------------------------------------------
START TRANSACTION;
USE `comics`;
INSERT INTO `comics`.`edicion` (`idedicion`, `descripcion`) VALUES (1, 'Semanal');
INSERT INTO `comics`.`edicion` (`idedicion`, `descripcion`) VALUES (2, 'Mensual');
INSERT INTO `comics`.`edicion` (`idedicion`, `descripcion`) VALUES (3, 'Anual');
INSERT INTO `comics`.`edicion` (`idedicion`, `descripcion`) VALUES (4, 'Monster');
INSERT INTO `comics`.`edicion` (`idedicion`, `descripcion`) VALUES (5, 'Omnibus');
INSERT INTO `comics`.`edicion` (`idedicion`, `descripcion`) VALUES (6, 'Definitive');
INSERT INTO `comics`.`edicion` (`idedicion`, `descripcion`) VALUES (7, 'Absolute');

COMMIT;

-- -----------------------------------------------------
-- Data for table `comics`.`comics`
-- -----------------------------------------------------
START TRANSACTION;
USE `comics`;
INSERT INTO `comics`.`comics` (`idcomic`, `nombre`, `descripcion`, `fecha`, `cantidad`, `precio`, `imagen`, `editorial_ideditorial`, `edicion_idedicion`, `busqueda`) VALUES (25857301210, 'Avengers vs x-men Round 7', 'Esta es la prueba del comic me da weba meter la descripcion verdadera', '2012-09-22', 3, 29.90, 'a_vs_x__r_7.jpg', 1, 1, NULL);
INSERT INTO `comics`.`comics` (`idcomic`, `nombre`, `descripcion`, `fecha`, `cantidad`, `precio`, `imagen`, `editorial_ideditorial`, `edicion_idedicion`, `busqueda`) VALUES (70719405, 'Batman no 5', 'Esta es la prueba de la descripcion de batman, incisto me da weba poner la descripcion jejejeje', '14/Nov/2012', 1, 30, 'batman_5.jpg', 2, 2, NULL);
INSERT INTO `comics`.`comics` (`idcomic`, `nombre`, `descripcion`, `fecha`, `cantidad`, `precio`, `imagen`, `editorial_ideditorial`, `edicion_idedicion`, `busqueda`) VALUES (0233, 'Avengers vs x-men Round 3', 'Esta es la prueba para ver la linea de separacion entre comics, me da weba meter la descripcion real jejejeje', '2012-08-25', 1, 21, 'a_vs_x_r_3.jpg', 1, 1, NULL);
INSERT INTO `comics`.`comics` (`idcomic`, `nombre`, `descripcion`, `fecha`, `cantidad`, `precio`, `imagen`, `editorial_ideditorial`, `edicion_idedicion`, `busqueda`) VALUES (01201, 'Superman no 1', 'Otra vez tengo weba', '12/Jul/2012', 1, 35, 'superman_1.jpg', 2, 2, NULL);
INSERT INTO `comics`.`comics` (`idcomic`, `nombre`, `descripcion`, `fecha`, `cantidad`, `precio`, `imagen`, `editorial_ideditorial`, `edicion_idedicion`, `busqueda`) VALUES (40769825, 'The invencible iron man', 'La larga caida parte 3', '26/11/2012', 1, 23, 'i_m_p3.jpg', 1, 2, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `comics`.`cargo`
-- -----------------------------------------------------
START TRANSACTION;
USE `comics`;
INSERT INTO `comics`.`cargo` (`idcargo`, `cargo`) VALUES (1, 'Administrador');
INSERT INTO `comics`.`cargo` (`idcargo`, `cargo`) VALUES (2, 'Visitante');

COMMIT;

-- -----------------------------------------------------
-- Data for table `comics`.`usuario`
-- -----------------------------------------------------
START TRANSACTION;
USE `comics`;
INSERT INTO `comics`.`usuario` (`idusuario`, `a_paterno`, `a_materno`, `nombre`, `password`, `nick`, `correo`, `cargo_idcargo`) VALUES (1, 'Gomez', 'Alvarez', 'Osvaldo', '1a2b3c4d5e', 'osvaldo172', 'osvaldo172@hotmail.com', 1);
INSERT INTO `comics`.`usuario` (`idusuario`, `a_paterno`, `a_materno`, `nombre`, `password`, `nick`, `correo`, `cargo_idcargo`) VALUES (2, 'prueba', 'prueba', 'prueba', '123', 'prueba1', 'osvaldo172@gmail.com', 2);

COMMIT;

-- -----------------------------------------------------
-- Data for table `comics`.`blog`
-- -----------------------------------------------------
START TRANSACTION;
USE `comics`;
INSERT INTO `comics`.`blog` (`idblog`, `titulo`, `post`, `fecha`, `usuario_id_usuario`) VALUES (1, 'Titulo prueba', 'Esta es la prueba para ver si publica las noticias', '09/12/2012', 1);

COMMIT;
