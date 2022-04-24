SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE TABLE `newusers` (
	-- `User_ID` INT PRIMARY KEY AUTO_INCREMENT,
	`First_Name` VARCHAR(20),
	`Last_Name` VARCHAR(25),
	`Email` VARCHAR(40),
	`Gender` CHAR(6),
	`DOB` DATE,
	`Address` VARCHAR(40),
	`Phone` DECIMAL(10) PRIMARY KEY,
	`Password` VARCHAR(45),
	profile_picture CHAR
) ENGINE = InnoDB DEFAULT CHARSET = latin1;