SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `mydb` ;
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`divisiones`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`divisiones` (
  `idDivisiones` INT NOT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idDivisiones`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`licenciaturas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`licenciaturas` (
  `idlicenciaturas` INT NOT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  `creditos` INT NOT NULL ,
  `divisiones_iddivisiones` INT NOT NULL ,
  PRIMARY KEY (`idlicenciaturas`) ,
  INDEX `fk_licenciaturas_divisiones_idx` (`divisiones_iddivisiones` ASC) ,
  CONSTRAINT `fk_licenciaturas_divisiones`
    FOREIGN KEY (`divisiones_iddivisiones` )
    REFERENCES `mydb`.`divisiones` (`idDivisiones` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`alumnos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`alumnos` (
  `matricula` INT NOT NULL COMMENT '		' ,
  `contrasenia` VARCHAR(45) NOT NULL ,
  `correo` VARCHAR(45) NOT NULL ,
  `licenciaturas_idlicenciaturas` INT NOT NULL ,
  PRIMARY KEY (`matricula`) ,
  INDEX `fk_alumnos_licenciaturas1_idx` (`licenciaturas_idlicenciaturas` ASC) ,
  CONSTRAINT `fk_alumnos_licenciaturas1`
    FOREIGN KEY (`licenciaturas_idlicenciaturas` )
    REFERENCES `mydb`.`licenciaturas` (`idlicenciaturas` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ueas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`ueas` (
  `idueas` INT NOT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  `division` VARCHAR(45) NOT NULL ,
  `creditos` INT NOT NULL ,
  PRIMARY KEY (`idueas`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ueas_licenciaturas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`ueas_licenciaturas` (
  `ueas_idueas` INT NOT NULL ,
  `licenciaturas_idlicenciaturas` INT NOT NULL ,
  `trimestre` INT NOT NULL ,
  PRIMARY KEY (`ueas_idueas`, `licenciaturas_idlicenciaturas`) ,
  INDEX `fk_ueas_licenciaturas_ueas1_idx` (`ueas_idueas` ASC) ,
  CONSTRAINT `fk_ueas_licenciaturas_licenciaturas1`
    FOREIGN KEY (`licenciaturas_idlicenciaturas` )
    REFERENCES `mydb`.`licenciaturas` (`idlicenciaturas` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ueas_licenciaturas_ueas1`
    FOREIGN KEY (`ueas_idueas` )
    REFERENCES `mydb`.`ueas` (`idueas` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`seriacion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`seriacion` (
  `ueas_idueas` INT NOT NULL ,
  `uea_seriada` INT NOT NULL ,
  PRIMARY KEY (`ueas_idueas`, `uea_seriada`) ,
  CONSTRAINT `fk_seriacion_ueas1`
    FOREIGN KEY (`ueas_idueas` )
    REFERENCES `mydb`.`ueas` (`idueas` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `mydb`.`divisiones`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`divisiones` (`idDivisiones`, `nombre`) VALUES (1, 'CBI');
INSERT INTO `mydb`.`divisiones` (`idDivisiones`, `nombre`) VALUES (2, 'CBS');
INSERT INTO `mydb`.`divisiones` (`idDivisiones`, `nombre`) VALUES (3, 'CSH');

COMMIT;

-- -----------------------------------------------------
-- Data for table `mydb`.`licenciaturas`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`licenciaturas` (`idlicenciaturas`, `nombre`, `creditos`, `divisiones_iddivisiones`) VALUES (1, 'Computacion', 443, 1);
INSERT INTO `mydb`.`licenciaturas` (`idlicenciaturas`, `nombre`, `creditos`, `divisiones_iddivisiones`) VALUES (2, 'Electronica ', 443, 1);
INSERT INTO `mydb`.`licenciaturas` (`idlicenciaturas`, `nombre`, `creditos`, `divisiones_iddivisiones`) VALUES (3, 'Matematicas', 400, 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `mydb`.`alumnos`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`alumnos` (`matricula`, `contrasenia`, `correo`, `licenciaturas_idlicenciaturas`) VALUES (207341483, 'osvaldo172', 'osvaldo172@hotmail.com', 1);
INSERT INTO `mydb`.`alumnos` (`matricula`, `contrasenia`, `correo`, `licenciaturas_idlicenciaturas`) VALUES (207310034, '123', 'luisa.207310034@gmail.com', 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `mydb`.`ueas`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (213038, 'Calculo diferencial', 'CBI', 11);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (211013, 'Mecanica y fluidos', 'CBI', 9);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (215003, 'Int a las ciencias de la comput', 'CBI', 9);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (210001, 'Metodo experimental', 'CBI', 9);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (213039, 'Calculo integral', 'CBI', 11);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (211014, 'Ondas y rotaciones', 'CBI', 9);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (215109, 'Sociedad y las c de la comp', 'CBI', 9);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (214009, 'Estructura de la materia', 'CBI', 9);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (213035, 'Algebra lineal palicada 1', 'CBI', 9);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (213032, 'Fundamentos matematicos de la comp', 'CBI', 9);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (111111, 'Optativa', 'CBI', 9);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (213040, 'Calculo de varias variables 1', 'CBI', 11);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (213274, 'Algebra lineal aplicada 2', 'CBI', 9);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (212427, 'Introd a la programacion', 'CBI', 6);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (222222, 'Optativa', 'CBI', 9);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (213191, 'Ecuaciones diferenciales ordinarias 1', 'CBI', 9);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (213221, 'Matematicas finitas', 'CBI', 9);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (213256, 'Programacion lineal', 'CBI', 9);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (213196, 'Introd a la program en admon', 'CBI', 11);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (213104, 'Algebra 1', 'CBI', 9);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (213193, 'Metodos numericos', 'CBI', 9);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (212444, 'Programacion avanzada', 'CBI', 12);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (333333, 'Optativa', 'CBI', 9);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (213230, 'Logica', 'CBI', 9);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (213194, 'Probabilidad aplicada', 'CBI', 9);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (215111, 'Programacion de sistemas 1', 'CBI', 9);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (212208, 'Estructura de datos ', 'CBI', 9);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (215107, 'Lenguajes de programacion', 'CBI', 12);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (213228, 'Analisis combinatorio', 'CBI', 9);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (212410, 'Dieseño logico', 'CBI', 11);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (213141, 'Estadistica y diseño de experimentos', 'CBI', 9);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (212352, 'Compiladores', 'CBI', 11);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (215105, 'Graficas por computadoras', 'CBI', 9);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (212412, 'Arquitectura de computadoras', 'CBI', 9);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (212321, 'Teor matemat de la comput', 'CBI', 9);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (212355, 'Analisis y diseño de sistemas de computo', 'CBI', 11);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (212413, 'Introduccion al diseño de bases de datos', 'CBI', 11);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (213250, 'Inteligencia artificial', 'CBI', 9);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (215114, 'Redes de telecomunicaciones', 'CBI', 9);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (212353, 'Analisis de algoritmos', 'CBI', 9);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (212354, 'Sistemas operativos', 'CBI', 11);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (215108, 'T sel de bases de datos', 'CBI', 12);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (213251, 'T sel de inteligencia artific', 'CBI', 12);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (215102, 'Redes de computadoras', 'CBI', 12);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (215104, 'Computacion en paralelo', 'CBI', 12);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (213197, 'Proyecto de investigacion 1', 'CBI', 12);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (215103, 'Sistemas distribuidos', 'CBI', 12);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (215106, 'Ing de software', 'CBI', 12);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (444444, 'Optativa', 'CBI', 9);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (213252, 'T sel de ciencias de la comput', 'CBI', 9);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (213198, 'Proyecto de investigacion 2', 'CBI', 18);
INSERT INTO `mydb`.`ueas` (`idueas`, `nombre`, `division`, `creditos`) VALUES (555555, 'Optativa', 'CBI', 9);

COMMIT;

-- -----------------------------------------------------
-- Data for table `mydb`.`ueas_licenciaturas`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (213038, 1, 1);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (211013, 1, 1);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (215003, 1, 1);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (210001, 1, 2);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (213039, 1, 2);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (211014, 1, 2);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (215109, 1, 2);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (214009, 1, 3);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (213035, 1, 3);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (213032, 1, 3);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (111111, 1, 3);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (213040, 1, 4);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (213274, 1, 4);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (212427, 1, 4);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (222222, 1, 4);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (213191, 1, 5);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (213221, 1, 5);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (213256, 1, 5);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (213196, 1, 5);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (213104, 1, 6);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (213193, 1, 6);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (212444, 1, 6);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (333333, 1, 6);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (213230, 1, 7);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (213194, 1, 7);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (215111, 1, 7);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (212208, 1, 7);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (215107, 1, 7);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (213228, 1, 8);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (212410, 1, 8);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (213141, 1, 8);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (212352, 1, 8);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (215105, 1, 8);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (212412, 1, 9);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (212321, 1, 9);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (212355, 1, 9);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (212413, 1, 9);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (213250, 1, 9);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (215114, 1, 10);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (212353, 1, 10);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (212354, 1, 10);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (215108, 1, 10);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (213251, 1, 10);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (215102, 1, 11);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (215104, 1, 11);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (213197, 1, 11);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (215103, 1, 11);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (215106, 1, 11);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (444444, 1, 12);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (213252, 1, 12);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (213198, 1, 12);
INSERT INTO `mydb`.`ueas_licenciaturas` (`ueas_idueas`, `licenciaturas_idlicenciaturas`, `trimestre`) VALUES (555555, 1, 12);

COMMIT;

-- -----------------------------------------------------
-- Data for table `mydb`.`seriacion`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (213038, 213039);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (211013, 211014);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (215003, 215109);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (215003, 213032);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (213039, 213040);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (213039, 213274);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (215109, 212427);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (214009, 212444);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (213035, 213274);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (213035, 213040);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (213032, 212427);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (213040, 213191);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (213274, 213221);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (213274, 213256);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (212427, 213196);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (212427, 213193);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (212427, 212444);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (213191, 213193);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (213221, 213104);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (213104, 213230);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (212444, 215111);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (212444, 212208);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (212444, 215107);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (213104, 213228);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (213230, 212410);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (213230, 212321);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (213194, 213141);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (215111, 212352);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (212208, 212413);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (212410, 212412);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (212352, 212355);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (212352, 212354);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (212412, 215114);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (212321, 212353);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (212321, 215105);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (212355, 215106);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (212413, 215108);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (213250, 213251);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (215114, 215102);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (212353, 213252);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (212354, 215103);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (212354, 215104);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (215114, 215103);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (213197, 213198);
INSERT INTO `mydb`.`seriacion` (`ueas_idueas`, `uea_seriada`) VALUES (213191, 213194);

COMMIT;
