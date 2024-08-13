--  Creating database hospital
CREATE DATABASE IF NOT EXISTS hospital;

--  ceating admin table
CREATE TABLE `hospital`.`admindb` ( `id` INT NOT NULL AUTO_INCREMENT , 
`username` VARCHAR(250) NOT NULL , 
`email` VARCHAR(250)  NOT NULL , 
`password` VARCHAR(25) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;


-- Creating Staffs Table
CREATE TABLE `hospital`.`staffs` ( `id` INT NOT NULL AUTO_INCREMENT , 
`unique_id` INT NOT NULL , 
`name` VARCHAR(250) NOT NULL , 
`email` VARCHAR(250) NOT NULL , 
`address` VARCHAR(250) NOT NULL,
`phone` VARCHAR(250) NOT NULL,
`gender` VARCHAR(250) NOT NULL,
`password` VARCHAR(250) NOT NULL , 
`department` VARCHAR(250) NOT NULL ,
`date` DATE NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

--  creating patients table
CREATE TABLE `hospital`. `patients` ( `id` INT NOT NULL AUTO_INCREMENT , 
`unique_id` INT NOT NULL , 
`name` VARCHAR(100) NOT NULL , 
`username` VARCHAR(100) NOT NULL , 
`address` VARCHAR(250) NOT NULL ,
`phone` VARCHAR(250) NOT NULL,
`gender` VARCHAR(250) NOT NULL,
`password` VARCHAR(100) NOT NULL ,
`date` DATE NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;


--  creating records table
CREATE TABLE `hospital`.`records` ( `id` INT NOT NULL AUTO_INCREMENT , 
`reference_id` INT NOT NULL , 
`username` VARCHAR(100) NOT NULL , 
`sickness` VARCHAR(100) NOT NULL , 
`drug` VARCHAR(100) NOT NULL , 
`doctor` VARCHAR(100) NOT NULL , 
`description` VARCHAR(250) NOT NULL ,
`address` TEXT(500) NOT NULL , 
`phone` VARCHAR(250) NOT NULL,
`gender` VARCHAR(250) NOT NULL,
`staff_id` INT NOT NULL, 
`date` DATE NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;


--  creating laboratory records table
CREATE TABLE `hospital`.`lab_records` ( `id` INT NOT NULL AUTO_INCREMENT , 
`reference_id` INT NOT NULL , 
`username` VARCHAR(250) NOT NULL , 
`result` VARCHAR(250) NOT NULL , 
`address` TEXT(500) NOT NULL ,
`phone` VARCHAR(250) NOT NULL,
`gender` VARCHAR(250) NOT NULL,
`date` DATE NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

-- inserting data into admin table
INSERT INTO `admindb` (`id`, `username`, `email`, `password`) VALUES (NULL, 'admin', 'admin@gmail.com', 'admin123');
