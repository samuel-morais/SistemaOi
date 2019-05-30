CREATE DATABASE login;

use login;

CREATE TABLE usuario (
id int primary key auto_increment,
nome varchar(255),
email varchar(255),
senha varchar(255)
);

INSERT INTO usuario (nome,email, senha) VALUES ('Samuel','samuel.moraisbsb@gmail.com', '123456');
INSERT INTO usuario (nome,email, senha) VALUES ('Administrador','adm@gmail.com', 'adm');