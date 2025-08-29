-- Região
INSERT INTO regiao(nome_regiao)
VALUES 
('TesteRegiao'), 
('RegiaoSul'),
('RegiaoNorte');

-- Clientes
INSERT INTO clientes(nome_cliente)
VALUES 
('GuiTeste'),
('Ana Souza'),
('Carlos Lima'),
('Beatriz Mendes');

-- Produtos
INSERT INTO produtos(nome_produto, preco)
VALUES 
('TesteProduto', 10.50),
('Shampoo Premium', 7.99),
('Condicionador Ultra', 22.75),
('Creme Hidratante', 30.00);

-- Pontos Estratégicos
INSERT INTO pontos_estrategicos(nome_pe, id_regiao)
VALUES 
('TestePontoEs', 1),
('Ponto Central', 2),
('Ponto Norte 1', 3),
('Ponto Norte 2', 3);

-- Vendedores
INSERT INTO vendedor(nome_vendedor, id_regiao)
VALUES 
('VendedorDouglas', 1),
('Maria Clara', 2),
('José Antônio', 3),
('Fernanda Silva', 3);

-- Veículos
INSERT INTO veiculos(modelo, placa)
VALUES 
('Golf', 'AAA-1234'),
('Uno', 'BBB-5678'),
('Onix', 'CCC-9012'),
('HB20', 'DDD-3456');

-- Veículo dia
INSERT INTO vendedor_has_veiculo(dt_vend_vei, id_veiculo, id_vendedor)
VALUES 
('2025-05-23', 1, 1),
('2025-05-23', 2, 2),
('2025-05-23', 3, 3),
('2025-05-23', 4, 4),
('2025-05-24', 1, 2),
('2025-05-24', 3, 1);

-- Notas Fiscais
INSERT INTO nota_fiscal(dt_Emisao, id_vendedor, id_cliente)
VALUES 
('2025-05-23', 1, 1),
('2025-05-23', 2, 2),
('2025-05-23', 3, 3),
('2025-05-23', 4, 4),
('2025-05-24', 2, 1);

-- Itens das Notas Fiscais
INSERT INTO produtos_has_nf(qtdVenda, id_produto, id_nf)
VALUES 
(2, 1, 1),
(1, 2, 1),
(3, 2, 2),
(1, 3, 2),
(2, 4, 3),
(1, 1, 4),
(2, 3, 4),
(5, 2, 5);
