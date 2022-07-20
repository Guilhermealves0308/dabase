-- ----------------------------------------------------------- 
-- Criamos um banco de dados chamado "livretto" como exemplo,
-- mas, pode usar qualquer nome válido.
-- -----------------------------------------------------------

-- Apagamos o banco de dados sempre que rodar este código:
DROP DATABASE IF EXISTS livretto;

-- Cria mos o banco de dados usando UTF-8 como tabela de caracteres padrão:
CREATE DATABASE livretto CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Selecionemos o banco de dados criado:
USE livretto;

-- Criamos uma tabela "produto", com os campos necessários:
CREATE TABLE produtos (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    isbn INT NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    preco FLOAT(10, 2) NOT NULL,
    local VARCHAR(10) NOT NULL
);