CREATE DATABASE nehli;

USE nehli;

CREATE TABLE usuarios (
	id INT(8) PRIMARY KEY AUTO_INCREMENT,
	nombresito VARCHAR(32),
	lapass VARCHAR(128),
	email VARCHAR(64),
	parental INT(2),
	poderoso INT(2),
	confirmado INT(2)
);