-- MySQL Script generated by MySQL Workbench
-- Fri Jul  1 15:43:20 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema dbEtablissement
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema dbEtablissement
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `dbEtablissement` DEFAULT CHARACTER SET utf8mb4 ;
USE `dbEtablissement` ;

-- -----------------------------------------------------
-- Table `dbEtablissement`.`ETABLISSEMENTS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbEtablissement`.`ETABLISSEMENTS` (
  `id_etablissement` INT NOT NULL AUTO_INCREMENT,
  `nom_etablissement` VARCHAR(255) NOT NULL,
  `ville` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_etablissement`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbEtablissement`.`PROMOTIONS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbEtablissement`.`PROMOTIONS` (
  `id_promotion` INT NOT NULL AUTO_INCREMENT,
  `nom_promotion` VARCHAR(45) NOT NULL,
  `id_etablissement` INT NOT NULL,
  `annee` INT(4) NOT NULL,
  PRIMARY KEY (`id_promotion`),
  INDEX `fk_PROMOTIONS_ETABLISSEMENTS1_idx` (`id_etablissement` ASC) ,
  CONSTRAINT `fk_PROMOTIONS_ETABLISSEMENTS1`
    FOREIGN KEY (`id_etablissement`)
    REFERENCES `dbEtablissement`.`ETABLISSEMENTS` (`id_etablissement`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbEtablissement`.`COMPTES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbEtablissement`.`COMPTES` (
  `id_compte` INT NOT NULL AUTO_INCREMENT,
  `creation_compte` DATE NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `envoi_email` DATETIME NULL,
  `token` VARCHAR(255) NULL,
  `email_verification` INT NULL,
  PRIMARY KEY (`id_compte`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbEtablissement`.`ELEVES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbEtablissement`.`ELEVES` (
  `id_eleve` INT NOT NULL AUTO_INCREMENT,
  `id_promotion` INT NULL,
  `identifiant` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `nom` VARCHAR(255) NOT NULL,
  `prenom` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `date_naissance` DATE NULL,
  `telephone` VARCHAR(10) NULL,
  `id_compte` INT NOT NULL,
  INDEX `fk_ELEVES_PROMOTIONS1_idx` (`id_promotion` ASC) ,
  PRIMARY KEY (`id_eleve`),
  INDEX `fk_ELEVES_COMPTES1_idx` (`id_compte` ASC) ,
  CONSTRAINT `fk_ELEVES_PROMOTIONS1`
    FOREIGN KEY (`id_promotion`)
    REFERENCES `dbEtablissement`.`PROMOTIONS` (`id_promotion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ELEVES_COMPTES1`
    FOREIGN KEY (`id_compte`)
    REFERENCES `dbEtablissement`.`COMPTES` (`id_compte`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbEtablissement`.`MATIERES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbEtablissement`.`MATIERES` (
  `id_matiere` INT NOT NULL AUTO_INCREMENT,
  `nom_matiere` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_matiere`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbEtablissement`.`ENSEIGNANTS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbEtablissement`.`ENSEIGNANTS` (
  `id_enseignant` INT NOT NULL AUTO_INCREMENT,
  `identifiant` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `nom` VARCHAR(255) NOT NULL,
  `prenom` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `date_naissance` DATE NULL,
  `telephone` VARCHAR(45) NULL,
  `id_compte` INT NOT NULL,
  PRIMARY KEY (`id_enseignant`),
  INDEX `fk_ENSEIGNANTS_COMPTES1_idx` (`id_compte` ASC) ,
  CONSTRAINT `fk_ENSEIGNANTS_COMPTES1`
    FOREIGN KEY (`id_compte`)
    REFERENCES `dbEtablissement`.`COMPTES` (`id_compte`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbEtablissement`.`SALLES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbEtablissement`.`SALLES` (
  `id_salle` INT NOT NULL AUTO_INCREMENT,
  `id_etablissement` INT NOT NULL,
  `nom_salle` VARCHAR(255) NOT NULL,
  `caracteristique` VARCHAR(255) NULL,
  PRIMARY KEY (`id_salle`),
  INDEX `fk_SALLES_ETABLISSEMENTS1_idx` (`id_etablissement` ASC) ,
  CONSTRAINT `fk_SALLES_ETABLISSEMENTS1`
    FOREIGN KEY (`id_etablissement`)
    REFERENCES `dbEtablissement`.`ETABLISSEMENTS` (`id_etablissement`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbEtablissement`.`ENSEIGNANTS_has_MATIERES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbEtablissement`.`ENSEIGNANTS_has_MATIERES` (
  `id_enseignant` INT NOT NULL,
  `id_matiere` INT NOT NULL,
  PRIMARY KEY (`id_enseignant`, `id_matiere`),
  INDEX `fk_ENSEIGNANTS_has_MATIERES_MATIERES1_idx` (`id_matiere` ASC) ,
  INDEX `fk_ENSEIGNANTS_has_MATIERES_ENSEIGNANTS1_idx` (`id_enseignant` ASC) ,
  CONSTRAINT `fk_ENSEIGNANTS_has_MATIERES_ENSEIGNANTS1`
    FOREIGN KEY (`id_enseignant`)
    REFERENCES `dbEtablissement`.`ENSEIGNANTS` (`id_enseignant`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ENSEIGNANTS_has_MATIERES_MATIERES1`
    FOREIGN KEY (`id_matiere`)
    REFERENCES `dbEtablissement`.`MATIERES` (`id_matiere`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbEtablissement`.`PLANNING`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbEtablissement`.`PLANNING` (
  `id_planning` INT NOT NULL AUTO_INCREMENT,
  `id_salle` INT NULL,
  `id_promotion` INT NULL,
  `date` DATE NOT NULL,
  `heure_debut` TIME NOT NULL,
  `heure_fin` TIME NOT NULL,
  `id_enseignant` INT NULL,
  `id_matiere` INT NULL,
  INDEX `fk_PLANNING_PROMOTIONS1_idx` (`id_promotion` ASC) ,
  PRIMARY KEY (`id_planning`),
  INDEX `fk_PLANNING_SALLES1_idx` (`id_salle` ASC) ,
  INDEX `fk_PLANNING_ENSEIGNANTS_has_MATIERES1_idx` (`id_enseignant` ASC, `id_matiere` ASC) ,
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
  CONSTRAINT `fk_PLANNING_ENSEIGNANTS_has_MATIERES1`
    FOREIGN KEY (`id_enseignant` , `id_matiere`)
    REFERENCES `dbEtablissement`.`ENSEIGNANTS_has_MATIERES` (`id_enseignant` , `id_matiere`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbEtablissement`.`ADMINISTRATEURS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbEtablissement`.`ADMINISTRATEURS` (
  `id_administrateur` INT NOT NULL AUTO_INCREMENT,
  `identifiant` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `id_compte` INT NOT NULL,
  PRIMARY KEY (`id_administrateur`),
  INDEX `fk_ADMINISTRATEURS_COMPTES1_idx` (`id_compte` ASC) ,
  CONSTRAINT `fk_ADMINISTRATEURS_COMPTES1`
    FOREIGN KEY (`id_compte`)
    REFERENCES `dbEtablissement`.`COMPTES` (`id_compte`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbEtablissement`.`ETABLISSEMENTS_has_UTILISATEUR`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbEtablissement`.`ETABLISSEMENTS_has_UTILISATEUR` (
  `id_etablissement` INT NOT NULL,
  `id_enseignant` INT NULL,
  `id_promotion` INT NULL,
  INDEX `fk_ETABLISSEMENTS_has_UTILISATEUR_ETABLISSEMENTS1_idx` (`id_etablissement` ASC) ,
  INDEX `fk_ETABLISSEMENTS_has_UTILISATEUR_ENSEIGNANTS1_idx` (`id_enseignant` ASC) ,
  INDEX `fk_ETABLISSEMENTS_has_UTILISATEUR_ELEVES1_idx` (`id_promotion` ASC) ,
  CONSTRAINT `fk_ETABLISSEMENTS_has_UTILISATEUR_ETABLISSEMENTS1`
    FOREIGN KEY (`id_etablissement`)
    REFERENCES `dbEtablissement`.`ETABLISSEMENTS` (`id_etablissement`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ETABLISSEMENTS_has_UTILISATEUR_ENSEIGNANTS1`
    FOREIGN KEY (`id_enseignant`)
    REFERENCES `dbEtablissement`.`ENSEIGNANTS` (`id_enseignant`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ETABLISSEMENTS_has_UTILISATEUR_ELEVES1`
    FOREIGN KEY (`id_promotion`)
    REFERENCES `dbEtablissement`.`ELEVES` (`id_promotion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
