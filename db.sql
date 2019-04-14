SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema regol
-- -----------------------------------------------------
 
-- -----------------------------------------------------
-- Schema regol
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `regol`;
USE `regol` ;

-- -------------------------------------------------------
-- Users table, containing admin users who verify the student profiles
-- -------------------------------------------------------
CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
 

-- -----------------------------------------------------
-- Table `regol`.`person`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `regol`.`person` (
  `person_id` INT NOT NULL,
  PRIMARY KEY (`person_id`))
ENGINE = InnoDB;
 
 
-- -----------------------------------------------------
-- Table `regol`.`department`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `regol`.`department` (
  `dept_name` VARCHAR(20) NOT NULL,
  `dept_address` VARCHAR(200) NULL,
  `dept_phone_number` VARCHAR(10) NULL,
  PRIMARY KEY (`dept_name`))
ENGINE = InnoDB;
 
-- -----------------------------------------------------
-- Table `regol`.`course`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `regol`.`course` (
  `course_id` INT NOT NULL,
  `dept_name` VARCHAR(20) NULL,
  `degree_name` VARCHAR(45) NULL,
  `course_name` VARCHAR(45) NULL,
  `years` INT NULL,
  PRIMARY KEY (`course_id`),
  CONSTRAINT `dept_name`
    FOREIGN KEY (dept_name)
    REFERENCES `regol`.`department` (dept_name)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `regol`.`batch`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `regol`.`batch` (
  `course_id` INT NOT NULL,
  `batch_id` INT NOT NULL,
  `batch_year_of_graduation` INT NULL,
  PRIMARY KEY (`course_id`, `batch_id`),
  CONSTRAINT `course_id`
	FOREIGN KEY (course_id)
    REFERENCES `regol`.`course` (course_id)
	ON DELETE CASCADE
    ON UPDATE CASCADE
)
ENGINE = InnoDB;
 
-- -----------------------------------------------------
-- Table `regol`.`student`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `regol`.`student` (
  `person_id` INT NOT NULL,
  `enrollment_no` INT NOT NULL,
  `course_id` INT NULL,
  `batch_id` INT NULL,
  `bhawan_name` VARCHAR(15) NULL,
  `room_number` VARCHAR(10) NULL,
  `bank_name` VARCHAR(50) NULL, 
  `account_number` VARCHAR(50) NULL,
  `physical_disability` VARCHAR(50) NULL,
  PRIMARY KEY (`enrollment_no`),
  CONSTRAINT `person_id`
    FOREIGN KEY (`person_id`)
    REFERENCES `regol`.`person` (person_id)
    ON DELETE CASCADE	
    ON UPDATE CASCADE,
  CONSTRAINT `course_id_student`
    FOREIGN KEY (`course_id`)
    REFERENCES `regol`.`course` (course_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;
 
 
-- -----------------------------------------------------
-- Table `regol`.`parent_child`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `regol`.`parent_child` (
  `parent_person_id` INT NOT NULL,
  `child_person_id` INT NOT NULL,
  PRIMARY KEY (`parent_person_id`, `child_person_id`),
  CONSTRAINT `parent_person_id`
    FOREIGN KEY (`parent_person_id`)
    REFERENCES `regol`.`person` (`person_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `child_person_id`
    FOREIGN KEY (`child_person_id`)
    REFERENCES `regol`.`person` (person_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;
 
 
-- -----------------------------------------------------
-- Table `regol`.`personal_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `regol`.`personal_info` (
  `person_id` INT NOT NULL UNIQUE,
  `name` VARCHAR(45) NULL,
  `date_of_birth` DATE NULL,
  `gender` VARCHAR(10),
  `phone_number` VARCHAR(10) NULL,
  `email_address` VARCHAR(50) NULL,
  `permanent_address` VARCHAR(200) NULL,
  `category` VARCHAR(10) NULL,
  `blood_group` VARCHAR(3) NULL,
  PRIMARY KEY (`person_id`),
  CONSTRAINT `personal_info_person_id`
    FOREIGN KEY (person_id)
    REFERENCES `regol`.`person` (person_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;
 
 
-- -----------------------------------------------------
-- Table `regol`.`verified`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `regol`.`verified` (
  `enrollment_no` INT NOT NULL,
  `personal_info_verified` TINYINT NULL DEFAULT 0,
  `student_info_verified` TINYINT NULL DEFAULT 0,
  PRIMARY KEY (`enrollment_no`),
  UNIQUE INDEX `enrollment_no_UNIQUE` (`enrollment_no` ASC),
  CONSTRAINT `enrollment_no`
    FOREIGN KEY (enrollment_no)
    REFERENCES `regol`.`student` (enrollment_no)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
 
 
-- -----------------------------------------------------
-- Table `regol`.`secret_keys`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `regol`.`secret_keys` (
  `enrollment_no` INT NOT NULL,
  `secret_key` VARCHAR(8) NULL,
  PRIMARY KEY (`enrollment_no`),
  CONSTRAINT `secret_keys_enrollment_no`
    FOREIGN KEY (`enrollment_no`)
    REFERENCES `regol`.`student` (`person_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;
 
 
SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
