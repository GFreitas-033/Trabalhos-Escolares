INSERT INTO cliente(nome_cliente,email_cliente,cidade_cliente)
VALUES
('Gui','g@g.c','lins'),
('Ma','m@g.c','bauru'),
('Wi','w@g.c','são paulo');
SELECT * FROM cliente;

INSERT INTO venda(dt_venda,valor_total,id_cliente,id_produto)
VALUES
('2020-03-19',130.50,3,1),
('2023-01-07',110.00,1,2),
('2024-02-10',1200.30,2,3),
('2023-06-15',200.00,1,3),
('2023-06-15',200.00,2,3);
SELECT * FROM venda;

INSERT INTO produto(nome_produto,descricao_produto,valor_produto,categoria)
VALUES
('Calça','amarela',50.99,'Vestiário'),
('Brinco','perola',20.50,'Acessórios'),
('Jordan','vermelho',999.99,'Calçados');
SELECT * FROM produto; 