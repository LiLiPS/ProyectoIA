CREATE DATABASE Examen;
USE Examen;

CREATE TABLE Usuario (
	id_usuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nombre VARCHAR(50) NOT NULL,
	apellido_paterno VARCHAR(30) NOT NULL,
	apellido_materno VARCHAR(30),
	usuario VARCHAR(20) NOT NULL,
	contrasenia VARCHAR(50) NOT NULL,
	id_rol INT DEFAULT 2,
	no_control INT
);

CREATE TABLE Rol (
	id_rol int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nombre_rol varchar(10) NOT NULL
);

ALTER TABLE Usuario ADD CONSTRAINT fk_usuario_rol FOREIGN KEY (id_rol) REFERENCES rol(id_rol) ON DELETE RESTRICT ON UPDATE RESTRICT;

INSERT INTO Rol (nombre_rol) VALUES
('Docente'),
('Alumno');