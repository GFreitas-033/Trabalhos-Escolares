CREATE DATABASE Empresa;

CREATE TABLE Departamento (
	id_departamento INT,
    nome VARCHAR(50),
    PRIMARY KEY(id_departamento)
);

CREATE TABLE Projeto (
	id_projeto INT,
    nome VARCHAR(50),
    custo DECIMAL(10, 2),
    id_departamento INT,
    PRIMARY KEY(id_projeto),
    FOREIGN KEY(id_departamento) REFERENCES Departamento(id_departamento)
);

CREATE TABLE Funcionario (
	id_funcionario INT,
    nome VARCHAR(50),
    salario DECIMAL(10, 2),
    id_departamento INT,
    PRIMARY KEY(id_funcionario),
    FOREIGN KEY (id_departamento) REFERENCES Departamento(id_departamento)
);