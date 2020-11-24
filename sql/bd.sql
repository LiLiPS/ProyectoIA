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

INSERT INTO Rol (nombre_rol) VALUES ('Docente'), ('Alumno');


/*----------------------------------------------------------------------------------*/
CREATE DATABASE Examen;
USE Examen;

CREATE TABLE Maestro (
	id_maestro INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_usuario INT NOT NULL,
	nombre VARCHAR(50) NOT NULL,
	apellido_paterno VARCHAR(30) NOT NULL,
	apellido_materno VARCHAR(30)
);

CREATE TABLE Alumno (
	id_alumno INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_usuario INT NOT NULL,
	id_maestro INT NOT NULL,
	nombre VARCHAR(50) NOT NULL,
	apellido_paterno VARCHAR(30) NOT NULL,
	apellido_materno VARCHAR(30),
	no_control INT
);

CREATE TABLE Usuario (
	id_usuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	usuario VARCHAR(20) NOT NULL,
	contrasenia VARCHAR(50) NOT NULL,
	id_rol INT DEFAULT 2
);

CREATE TABLE Rol (
	id_rol INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nombre_rol VARCHAR(10) NOT NULL
);

CREATE TABLE Examen (
	id_examen INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nombre VARCHAR(30) NOT NULL 
);

CREATE TABLE Examen_alumno(
	id_examen_alumno INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_alumno INT NOT NULL,
	id_examen INT NOT NULL,
	fecha datetime,
	resultado TINYINT
);

CREATE TABLE Pregunta(
	id_pregunta INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_examen INT NOT NULL,
	pregunta VARCHAR(255)
);

CREATE TABLE Palabras_clave(
	id_palabras_clave INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_pregunta INT NOT NULL,
	palabras_clave VARCHAR(255)
);

CREATE TABLE Respuesta(
	id_respuesta_alumno INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_examen INT NOT NULL,
	id_pregunta INT NOT NULL,
	id_alumno INT NOT NULL,
	respuesta VARCHAR(255)
);

ALTER TABLE Maestro ADD CONSTRAINT fk_maestro_usuario FOREIGN KEY (id_usuario) REFERENCES Usuario(id_maestro);
ALTER TABLE Alumno ADD CONSTRAINT fk_alumno_usuario FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario);
ALTER TABLE Usuario ADD CONSTRAINT fk_usuario_rol FOREIGN KEY (id_rol) REFERENCES Rol(id_rol);

ALTER TABLE Examen_alumno ADD CONSTRAINT fk_examenAlumno_alumno FOREIGN KEY (id_alumno) REFERENCES Alumno(id_alumno);
ALTER TABLE Examen_alumno ADD CONSTRAINT fk_examenAlumno_examen FOREIGN KEY (id_examen) REFERENCES Examen(id_examen);

ALTER TABLE Pregunta ADD CONSTRAINT fk_pregunta_examen FOREIGN KEY (id_examen) REFERENCES Examen(id_examen);

ALTER TABLE Palabras_clave ADD CONSTRAINT fk_palabrasClave_pregunta FOREIGN KEY (id_pregunta) REFERENCES Pregunta(id_pregunta);

ALTER TABLE Respuesta ADD CONSTRAINT fk_respuesta_alumno FOREIGN KEY (id_alumno) REFERENCES Alumno(id_alumno);
ALTER TABLE Respuesta ADD CONSTRAINT fk_respuesta_examen FOREIGN KEY (id_examen) REFERENCES Examen(id_examen);
/*----------------------------------------------------------------------------------*/
