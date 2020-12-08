use dbphp7;

DROP TABLE Usuario;

DROP TABLE Curso;

CREATE TABLE Usuario(
    id int primary key identity,
    nomecompleto varchar(255) not null,
    endereco varchar(255) not null,
    cidade varchar(255) not null,
    estado varchar(255) not null,
    nomedeusuario varchar(255) not null,
    senha varchar(255) not null,
    tipoUsuario varchar(20) not null,
)

CREATE TABLE Curso (
	id int primary key identity,
	nome varchar(255)
)