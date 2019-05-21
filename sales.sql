create database ventas;

use ventas2;

create table productos(
				id_producto int auto_increment,
				nombre varchar(50),
				descripcion varchar(500),
				cantidad int,
				precio float,
				primary key(id_producto)

						);

create table clientes(
				id_cliente int auto_increment,
				nombre varchar(200),
				direccion varchar(200),
				email varchar(200),
				telefono varchar(200),
				primary key(id_cliente)
					);

create table ventas(
				id_venta int not null auto_increment,
				id_cliente int,
				id_producto int,
				cantidad int,
				total float,
				primary key(id_venta)
					);
