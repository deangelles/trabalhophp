CREATE  DATABASE db_atacadao;
USE db_atacadao;
CREATE TABLE produtos (
  id INT NOT NULL  auto_increment,
  descricao VARCHAR (200) NOT NULL,
  quantidade DECIMAL  (10,2) NOT NULL,
  valor DECIMAL (10,2),
  marca VARCHAR (30),
  validade DATE ,
  PRIMARY KEY (id)
  );
  CREATE TABLE usuarios(
  id INT NOT NULL auto_increment,
  email VARCHAR (100)NOT NULL ,
  senha VARCHAR (100) NOT NULL ,
  PRIMARY KEY (id)
  );
  CREATE TABLE cliente (
  id INT NOT NULL auto_increment,
  nome VARCHAR (100) NOT NULL,
  endereco VARCHAR (200) NOT NULL,
  cpf VARCHAR (16),
  telefone VARCHAR (20),
  PRIMARY KEY (id)
  );
  insert into usuarios(email,senha) values('admin@gmail.com','21232f297a57a5a743894a0e4a801fc3');


