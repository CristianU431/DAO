-- Base de datos Colegio
CREATE DATABASE IF NOT EXISTS bdcolegio; 
USE bdcolegio;


-- talumno
CREATE TABLE IF NOT EXISTS talumno (
  id INT(11) NOT NULL AUTO_INCREMENT,
  Nombre VARCHAR(50) NOT NULL DEFAULT '0',
  Apellido VARCHAR(50) NOT NULL DEFAULT '0',
  Sexo TINYINT(4) NOT NULL DEFAULT '0',
  FechaNacimiento VARCHAR(20) DEFAULT NULL,
  FechaRegistro VARCHAR(20) DEFAULT NULL,
  Correo VARCHAR(50) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

-- tcurso
CREATE TABLE IF NOT EXISTS tcurso (
  id INT(11) NOT NULL AUTO_INCREMENT,
  Nombre VARCHAR(500) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- talumnocurso
CREATE TABLE IF NOT EXISTS talumnocurso (
  Curso INT(11) NOT NULL,
  Alumno INT(11) NOT NULL,
  PRIMARY KEY (Curso,Alumno)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

