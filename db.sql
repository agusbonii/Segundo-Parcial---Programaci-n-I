CREATE TABLE usuario(
    id int primary key auto_increment,
    username varchar(50) unique,
    complete_name varchar(50),
    password varchar(255)
);

CREATE TABLE publicaciones (
	id int primary key auto_increment,
	autor VARCHAR(50),
	fechaYHora DATETIME,
	cuerpo VARCHAR(255)
);