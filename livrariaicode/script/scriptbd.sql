CREATE DATABASE LIVRARIA charset= latin1 collate = latin1_swedish_ci;

USE LIVRARIA;

CREATE TABLE IF NOT EXISTS NIVEL_ACESSO(
	LIV_NA_COD INT(2) PRIMARY KEY AUTO_INCREMENT,
	LIV_NA_NOME VARCHAR(15) NOT NULL
);

INSERT INTO NIVEL_ACESSO(LIV_NA_COD, LIV_NA_NOME)
VALUES(1, 'Administrador'),(2, 'Usuario');

CREATE TABLE USUARIOS(
	LIV_USU_COD INT(11) PRIMARY KEY AUTO_INCREMENT,
	LIV_USU_NOME VARCHAR(50) NOT NULL,
	LIV_USU_EMAIL VARCHAR(150) NOT NULL,
	LIV_USU_SENHA VARCHAR(64) NOT NULL,
	LIV_NA_COD INT,
	FOREIGN KEY (LIV_NA_COD) REFERENCES NIVEL_ACESSO (LIV_NA_COD)
);

INSERT INTO USUARIOS(
	LIV_USU_COD,
	LIV_USU_NOME,
	LIV_USU_EMAIL,
	LIV_USU_SENHA,
	LIV_NA_COD
)	VALUES(1,
	'Admin',
	'admin@admin.com',
	MD5('admin'),
	1
);

CREATE TABLE CAPA(
	LIV_CAP_COD INT(2) PRIMARY KEY,
	LIV_CAP_NOME VARCHAR(13) NOT NULL
);

INSERT INTO CAPA(LIV_CAP_COD, LIV_CAP_NOME)
VALUES(1, 'Capa Comum'),(2, 'Capa Dura');

CREATE TABLE ARQUIVO(
	LIV_ARQ_COD INT(150) PRIMARY KEY AUTO_INCREMENT,
	LIV_ARQ_NOME VARCHAR(64) NOT NULL
);

INSERT INTO ARQUIVO(LIV_ARQ_COD,LIV_ARQ_NOME) VALUES(NULL, 'd41d8cd98f00b204e9800998ecf8427e.jpg');

CREATE TABLE LIVROS(
	LIV_LIV_COD INT(11) PRIMARY KEY AUTO_INCREMENT,
	LIV_LIV_ISBN VARCHAR(18) NOT NULL,
	LIV_LIV_NOME VARCHAR(50) NOT NULL,
	LIV_LIV_TIPO INT NOT NULL,
	LIV_LIV_FOTO INT,
	LIV_LIV_AUTOR VARCHAR(50) NOT NULL,
	LIV_LIV_VALOR DECIMAL(65,2) NOT NULL,
	LIV_LIV_GENERO VARCHAR(15),
	LIV_LIV_SINOPSE TEXT,
	FOREIGN KEY (LIV_LIV_TIPO) REFERENCES CAPA (LIV_CAP_COD),
	FOREIGN KEY (LIV_LIV_FOTO) REFERENCES ARQUIVO (LIV_ARQ_COD)
);

INSERT INTO LIVROS(
	LIV_LIV_COD,
	LIV_LIV_ISBN,
	LIV_LIV_NOME,
	LIV_LIV_TIPO,
	LIV_LIV_FOTO,
	LIV_LIV_AUTOR,
	LIV_LIV_VALOR,
	LIV_LIV_GENERO,
	LIV_LIV_SINOPSE
)	VALUES(1,
	'978-85-9508-437-7',
	'O SILMARILLION',
	2,
	1,
	'J.R.R TOLKIEN',
	45.90,
	'Romance',
	'O Silmarillion é o relato dos Dias Antigos da Primeira Era do mundo criado por J.R.R. Tolkien. É a história longínqua para a qual os personagens de O Senhor dos Anéis e O Hobbit olham para trás, e em cujos eventos alguns deles, como Elrond e Galadriel, tomaram parte'

);