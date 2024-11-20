INSERT INTO departamento(id_departamento, nome, uf) 
VALUES
(10, 'RH', 'RJ'), 
(20,'TI','RJ'),
(30, 'Logistica', 'DF'),
(40, 'Financeiro', 'DF'),
(50, 'Venda', 'RS'),
(60, 'Pesquisa', 'RJ');
SELECT * FROM departamento;


INSERT INTO empregado(id_emprgado, primeiro_nome, familia_nome, salario, id_departamento) 
VALUES
(123, 'Igor', 'Pereira', 100.00, 10), 
(159, 'Denise', 'Moreno', 440.00, 40),
(369, 'Marcelo', 'Neiva', 900.00, 40),
(456, 'Ana', 'Oliveira', 200.00, 20),
(789, 'Clara', 'Silva', 300.00, 30),
(963, 'Deyse', 'Silva', 330.00, null);
SELECT * FROM empregado;


-- Create table Dep_Novo AS SELECT id_departamento, nome, uf FROM departamento;
/*Create table Dep(id_departamento int not null,
	nome varchar(15) not null,
    uf char(2) not null,
    Primary Key(id_departamento)
);*/
/*INSERT INTO Dep(id_departamento, nome, uf)
SELECT id_departamento, nome, uf
FROM departamento;*/