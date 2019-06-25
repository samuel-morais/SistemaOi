/*------DROP DATABASE login;---*/
/*------DROP DATABASE login_teste;---*/

CREATE DATABASE login_sistema;

use login_sistema;

CREATE TABLE usuario (
	id_usuario int primary key auto_increment,
	nome varchar(255),
	email varchar(255),
	senha varchar(255),
    usuario_tipo character(1)
);


INSERT INTO usuario (nome, email, senha, usuario_tipo) VALUES ('Samuel','samuel.moraisbsb@gmail.com', md5('123456'), 'A');
INSERT INTO usuario (nome, email, senha, usuario_tipo) VALUES ('Administrador','admin@admin.com', md5('123456'), 'A');
INSERT INTO usuario (nome, email, senha, usuario_tipo) VALUES ('Samuel Morais','samuel.moraisbsb@gmail.com', md5('samuel123'), 'A');
