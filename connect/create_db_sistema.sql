/*------DROP DATABASE login;---*/
/*------DROP DATABASE login_teste;---*/

DROP DATABASE login_teste;

CREATE DATABASE login_teste;

use login_teste;

CREATE TABLE usuario (
	id_usuario int primary key auto_increment,
	nome varchar(255),
	email varchar(255),
	senha varchar(255),
    usuario_tipo character(1)
);


/*
CREATE TABLE usuario_tipo (
	id_usuario_tipo int primary key not null auto_increment,
    id_usuario int,
    no_usuario_tipo varchar(255) not null,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
    );*/

INSERT INTO usuario (nome, email, senha, usuario_tipo) VALUES ('Samuel','samuel.moraisbsb@gmail.com', md5('123456'), 'A');
INSERT INTO usuario (nome, email, senha, usuario_tipo) VALUES ('Administrador','admin@admin.com', md5('123456'), 'A');
INSERT INTO usuario (nome, email, senha, usuario_tipo) VALUES ('Samuel Morais','samuel.moraisbsb@gmail.com', md5('samuel123'), 'U');


ALTER TABLE perguntas RENAME COLUMN pergunta TO no_pergunta;

alter table perguntas modify no_pergunta;
alter table respostas modify no_resposta;

alter table usuario ADD id_usuario_tipo int;

DROP table IF EXISTS  `respostas`;
DROP table usuario_tipo;
SELECT * FROM usuario;
SELECT * FROM perguntas;
SELECT * FROM respostas;
SELECT * FROM usuario_tipo;

DELETE FROM respostas WHERE id_resposta = 53;

