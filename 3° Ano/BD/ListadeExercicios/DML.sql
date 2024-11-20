INSERT INTO Departamento(id_departamento, nome) 
VALUES
(10, 'RH'), 
(20,'TI'),
(30, 'Logistica'),
(60, 'Pesquisa');
SELECT * FROM Departamento;

INSERT INTO Funcionario(id_funcionario, nome, salario, id_departamento) 
VALUES
(123, 'Igor', 100.00, 10), 
(159, 'Denise', 440.00, 20),
(369, 'Marcelo', 900.00, 30),
(963, 'Deyse', 330.00, null);
SELECT * FROM Funcionario;

INSERT INTO Projeto(id_projeto, nome, custo, id_departamento)
VALUES
(10,'Gestão',1000.00,10),
(11,'Comercio',750.00,60),
(12,'Blog',500.00,30),
(13,'Prefeitura',3000.00,20);
SELECT * FROM Projeto;