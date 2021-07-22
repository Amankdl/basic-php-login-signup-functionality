CREATE DATABASE users;

CREATE TABLE `users`.`credentials` ( `sno` INT NOT NULL AUTO_INCREMENT , 
`email` VARCHAR(40) NOT NULL , `password` VARCHAR(40) NOT NULL ,
`date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`sno`));

INSERT INTO `credentials` (`sno`, `email`, `password`, `date`) 
VALUES (NULL, 'aman', 'defrrrw', current_timestamp());