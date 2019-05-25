CREATE DATABASE sales;

USE sales;

CREATE TABLE products(
	id_product INT(11) AUTO_INCREMENT,
	name VARCHAR(50) NOT NULL,
	description VARCHAR(500) NOT NULL,
	quantity INT NOT NULL,
	price FLOAT NOT NULL,
	created_date DATETIME NOT NULL,
	PRIMARY KEY(id_product)
);

CREATE TABLE clients(
	id_client INT(11) AUTO_INCREMENT,
	name VARCHAR(200) NOT NULL,
	address VARCHAR(200) NOT NULL,
	email VARCHAR(200) NOT NULL,
	telephone VARCHAR(200) NOT NULL,
	created_date DATETIME NOT NULL,
	PRIMARY KEY (id_client)
);

CREATE TABLE sales(
	id_sale INT(11) AUTO_INCREMENT,
	id_client INT NOT NULL,
	id_product INT NOT NULL,
	quantity INT NOT NULL,
	total FLOAT NOT NULL,
	created_date DATETIME NOT NULL,
	PRIMARY KEY(id_sale)
);

