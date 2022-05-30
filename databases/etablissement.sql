-- MySQL Script generated by MySQL Workbench
-- Wed May 25 16:38:09 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema dbEtablissement
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `dbEtablissement` ;

-- -----------------------------------------------------
-- Schema dbEtablissement
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `dbEtablissement` DEFAULT CHARACTER SET utf8mb4 ;
USE `dbEtablissement` ;

-- -----------------------------------------------------
-- Table `dbEtablissement`.`ETABLISSEMENTS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbEtablissement`.`ETABLISSEMENTS` ;

CREATE TABLE IF NOT EXISTS `dbEtablissement`.`ETABLISSEMENTS` (
  `id_etablissement` INT NOT NULL AUTO_INCREMENT,
  `nom_etablissement` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_etablissement`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbEtablissement`.`PROMOTIONS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbEtablissement`.`PROMOTIONS` ;

CREATE TABLE IF NOT EXISTS `dbEtablissement`.`PROMOTIONS` (
  `id_promotion` INT NOT NULL AUTO_INCREMENT,
  `nom_promotion` VARCHAR(45) NOT NULL,
  `id_etablissement` INT NOT NULL,
  `année` INT(4) NOT NULL,
  PRIMARY KEY (`id_promotion`),
  INDEX `fk_PROMOTIONS_ETABLISSEMENTS1_idx` (`id_etablissement` ASC) ,
  CONSTRAINT `fk_PROMOTIONS_ETABLISSEMENTS1`
    FOREIGN KEY (`id_etablissement`)
    REFERENCES `dbEtablissement`.`ETABLISSEMENTS` (`id_etablissement`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbEtablissement`.`UTILISATEUR`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbEtablissement`.`UTILISATEUR` ;

CREATE TABLE IF NOT EXISTS `dbEtablissement`.`UTILISATEUR` (
  `id_utilisateur` INT NOT NULL AUTO_INCREMENT,
  `identifiant` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `droit_utilisateur` VARCHAR(1) NOT NULL,
  PRIMARY KEY (`id_utilisateur`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbEtablissement`.`ELEVES`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbEtablissement`.`ELEVES` ;

CREATE TABLE IF NOT EXISTS `dbEtablissement`.`ELEVES` (
  `id_eleve` INT NOT NULL,
  `nom` VARCHAR(255) NOT NULL,
  `premon` VARCHAR(255) NOT NULL,
  `id_promotion` INT NOT NULL,
  `date_naissance` VARCHAR(255) NULL,
  `email` VARCHAR(255) NULL,
  `telephone` VARCHAR(10) NULL,
  INDEX `fk_ELEVES_PROMOTIONS1_idx` (`id_promotion` ASC) ,
  INDEX `fk_ELEVES_UTILISATEUR1_idx` (`id_eleve` ASC) ,
  PRIMARY KEY (`id_eleve`),
  CONSTRAINT `fk_ELEVES_PROMOTIONS1`
    FOREIGN KEY (`id_promotion`)
    REFERENCES `dbEtablissement`.`PROMOTIONS` (`id_promotion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ELEVES_UTILISATEUR1`
    FOREIGN KEY (`id_eleve`)
    REFERENCES `dbEtablissement`.`UTILISATEUR` (`id_utilisateur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbEtablissement`.`MATIERES`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbEtablissement`.`MATIERES` ;

CREATE TABLE IF NOT EXISTS `dbEtablissement`.`MATIERES` (
  `id_matiere` INT NOT NULL AUTO_INCREMENT,
  `nom_matiere` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_matiere`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbEtablissement`.`ENSEIGNANTS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbEtablissement`.`ENSEIGNANTS` ;

CREATE TABLE IF NOT EXISTS `dbEtablissement`.`ENSEIGNANTS` (
  `id_enseignant` INT NOT NULL,
  `nom` VARCHAR(255) NOT NULL,
  `prenom` VARCHAR(255) NOT NULL,
  `date_naissance` VARCHAR(255) NULL,
  `email` VARCHAR(255) NULL,
  `telephone` VARCHAR(45) NULL,
  INDEX `fk_ENSEIGNANTS_UTILISATEUR1_idx` (`id_enseignant` ASC) ,
  PRIMARY KEY (`id_enseignant`),
  CONSTRAINT `fk_ENSEIGNANTS_UTILISATEUR1`
    FOREIGN KEY (`id_enseignant`)
    REFERENCES `dbEtablissement`.`UTILISATEUR` (`id_utilisateur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbEtablissement`.`SALLES`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbEtablissement`.`SALLES` ;

CREATE TABLE IF NOT EXISTS `dbEtablissement`.`SALLES` (
  `id_salle` INT NOT NULL AUTO_INCREMENT,
  `nom_salle` VARCHAR(255) NOT NULL,
  `caracteristique` VARCHAR(255) NULL,
  PRIMARY KEY (`id_salle`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbEtablissement`.`PLANNING`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbEtablissement`.`PLANNING` ;

CREATE TABLE IF NOT EXISTS `dbEtablissement`.`PLANNING` (
  `id_planning` INT NOT NULL AUTO_INCREMENT,
  `id_salle` INT NULL,
  `id_matiere` INT NULL,
  `id_promotion` INT NULL,
  `id_enseignant` INT NULL,
  `date` DATE NOT NULL,
  `heure_debut` TIME NOT NULL,
  `heure_fin` TIME NOT NULL,
  INDEX `fk_PROMOTIONS_has_SALLES_MATIERES1_idx` (`id_matiere` ASC) ,
  INDEX `fk_PLANNING_PROMOTIONS1_idx` (`id_promotion` ASC) ,
  PRIMARY KEY (`id_planning`),
  INDEX `fk_PLANNING_SALLES1_idx` (`id_salle` ASC) ,
  INDEX `fk_PLANNING_ENSEIGNANTS1_idx` (`id_enseignant` ASC) ,
  CONSTRAINT `fk_PROMOTIONS_has_SALLES_MATIERES1`
    FOREIGN KEY (`id_matiere`)
    REFERENCES `dbEtablissement`.`MATIERES` (`id_matiere`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PLANNING_PROMOTIONS1`
    FOREIGN KEY (`id_promotion`)
    REFERENCES `dbEtablissement`.`PROMOTIONS` (`id_promotion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PLANNING_SALLES1`
    FOREIGN KEY (`id_salle`)
    REFERENCES `dbEtablissement`.`SALLES` (`id_salle`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PLANNING_ENSEIGNANTS1`
    FOREIGN KEY (`id_enseignant`)
    REFERENCES `dbEtablissement`.`ENSEIGNANTS` (`id_enseignant`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbEtablissement`.`ETABLISSEMENTS_has_UTILISATEUR`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbEtablissement`.`ETABLISSEMENTS_has_UTILISATEUR` ;

CREATE TABLE IF NOT EXISTS `dbEtablissement`.`ETABLISSEMENTS_has_UTILISATEUR` (
  `ETABLISSEMENTS_id_etablissement` INT NOT NULL,
  `UTILISATEUR_id_utilisateur` INT NOT NULL,
  PRIMARY KEY (`ETABLISSEMENTS_id_etablissement`, `UTILISATEUR_id_utilisateur`),
  INDEX `fk_ETABLISSEMENTS_has_UTILISATEUR_UTILISATEUR1_idx` (`UTILISATEUR_id_utilisateur` ASC) ,
  INDEX `fk_ETABLISSEMENTS_has_UTILISATEUR_ETABLISSEMENTS1_idx` (`ETABLISSEMENTS_id_etablissement` ASC) ,
  CONSTRAINT `fk_ETABLISSEMENTS_has_UTILISATEUR_ETABLISSEMENTS1`
    FOREIGN KEY (`ETABLISSEMENTS_id_etablissement`)
    REFERENCES `dbEtablissement`.`ETABLISSEMENTS` (`id_etablissement`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ETABLISSEMENTS_has_UTILISATEUR_UTILISATEUR1`
    FOREIGN KEY (`UTILISATEUR_id_utilisateur`)
    REFERENCES `dbEtablissement`.`UTILISATEUR` (`id_utilisateur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
