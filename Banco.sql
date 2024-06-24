CREATE DATABASE IF NOT EXISTS formulario;
USE formulario;
-- DROP DATABASE formulario;

CREATE TABLE tb_usuarios(
id_cadastro         INT NOT NULL AUTO_INCREMENT,
nome                    VARCHAR(45)  NOT NULL,
email               VARCHAR(110) NOT NULL,
telefone          VARCHAR(15)  NOT NULL,
cpf                INT(11) NOT NULL,
genero            VARCHAR(15)  NOT NULL,
data_nasc         DATE NOT NULL,
cidade            VARCHAR(110) NOT NULL,
estado            VARCHAR(110) NOT NULL,
endereco          VARCHAR(110) NOT NULL,
senha          VARCHAR(110) NOT NULL,
PRIMARY KEY (id_cadastro)
);

INSERT INTO tb_usuarios (nome, email, telefone, cpf, genero, data_nasc, cidade, estado, endereco, senha) VALUES
('José Aparecido', 'jose@gmail.com', '19 9986-2768', '15137609823', 'masculino', '10/06/1990', 'Pinhal', 'SP', 'fazenda 123', 'senha123'),
('admin', 'admin@admin.com', '19 9986-2768', '15137609823', 'masculino', '10/06/1990', 'Pinhal', 'SP', 'fazenda 123', 'admin123');

SELECT * FROM tb_usuarios;

CREATE TABLE tb_analises (
    id_numero_analise INT NOT NULL AUTO_INCREMENT,
    nome      VARCHAR(110) NOT NULL,
    profundidade DECIMAL(10, 2) NOT NULL,
    materia_organica DECIMAL(10, 2) NOT NULL,
    ph DECIMAL(10, 2) NOT NULL,
    P DECIMAL(10, 2) NOT NULL,
    N DECIMAL(10, 2),
    S DECIMAL(10, 2) NOT NULL,
    K DECIMAL(10, 2) NOT NULL,
    Ca DECIMAL(10, 2) NOT NULL,
    Mg DECIMAL(10, 2) NOT NULL,
    Al DECIMAL(10, 2) NOT NULL,
    SB DECIMAL(10, 2) NOT NULL,
    H_AL DECIMAL(10, 2) NOT NULL,
    CTC DECIMAL(10, 2) NOT NULL,
    V_PORCENTAGEM DECIMAL(10, 2) NOT NULL,
    Boro DECIMAL(10, 2) NOT NULL,
    Cobre DECIMAL(10, 2) NOT NULL,
    Ferro DECIMAL(10, 2) NOT NULL,
    Manganes DECIMAL(10, 2) NOT NULL,
    Zinco DECIMAL(10, 2) NOT NULL,
    
    PRIMARY KEY (id_numero_analise)
);
INSERT INTO tb_analises( nome, profundidade, materia_organica, ph, P, N, S, K, Ca, Mg, Al, SB, H_AL, CTC, V_PORCENTAGEM, Boro, Cobre, Ferro, Manganes, Zinco) VALUES 
('café linha ',40,12,5.3, 52  ,30  , 5 , 3.5 , 32 , 9  , 0 , 44.5, 25, 69.5, 64, 0.1,  0.7, 24, 4,   0.8),
('café rua ',20,20,   5.3, 27 , 30 , 8 ,2.7  , 26 , 11 , 0 , 39.7, 25, 64.7, 61, 0.17, 0.1, 36, 7.8, 1.1),
('café rua',40, 14, 5.2, 12   ,29  , 6 , 2.1 , 15 , 8  , 0 , 25.1, 28, 53.1, 47, 0.12, 0.1, 24, 4.6, 0.4);

SELECT * FROM tb_analises;

CREATE TABLE tb_cultura(
	id_Culturas INT NOT NULL AUTO_INCREMENT,
	nome_culturas VARCHAR(110),
    N DECIMAL (10.2),
	Ph DECIMAL (10.2),
	P DECIMAL (10.2),
	S DECIMAL (10.2),
	K DECIMAL (10.2),
	Ca DECIMAL (10.2),
	Mg DECIMAL (10.2),
	PRIMARY KEY (`id_Culturas`)	
);

INSERT INTO tb_cultura (nome_culturas,N,Ph,P,S,K,Ca,Mg) VALUES
('café',32.5 , 6    ,1.7 ,1.7 ,25 ,17.5 ,4.0),
('uva' ,39   ,6     ,0.2 ,1.7 ,30 ,10   ,3.5),
('milho',40  ,6.6 ,6.1 ,1.7 ,12 ,12   ,4),
('soja',5    ,5.5  ,5.5 ,1.7 ,20 ,4.06 ,2.46);

SELECT * FROM tb_cultura;