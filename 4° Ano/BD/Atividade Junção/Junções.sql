-- 1 - Listar todos os vendedores e as regiões em que atuam
SELECT v.nome_vendedor,r.nome_regiao FROM vendedor v
INNER JOIN regiao r ON v.id_regiao = r.id_regiao;

-- 2 - Listar os pontos estratégicos de cada região
SELECT pe.nome_pe,r.nome_regiao FROM pontos_estrategicos pe
INNER JOIN regiao r ON pe.id_regiao = r.id_regiao;

-- 3 - Listar os veículos usados por cada vendedor em determinada data
SELECT ven.nome_vendedor,vei.id_veiculo FROM vendedor_has_veiculo vv
INNER JOIN vendedor ven ON vv.id_vendedor = ven.id_vendedor
INNER JOIN veiculos vei ON vv.id_veiculo = vei.id_veiculo
WHERE dt_vend_vei = '2025-05-23';

-- 4 - Listar os itens vendidos com suas quantidades
SELECT p.nome_produto, pnf.qtdVenda FROM produtos_has_nf pnf
INNER JOIN produtos p ON pnf.id_produto = p.id_produto;

-- 5 - Listar nome do cliente, vendedor e data da nota fiscal
SELECT c.nome_cliente, v.nome_vendedor, nf.dt_Emisao FROM nota_fiscal nf
INNER JOIN clientes c ON nf.id_cliente = c.id_cliente
INNER JOIN vendedor v ON nf.id_vendedor = v.id_vendedor;

-- 6 - Listar produtos cujo preço seja maior que 10 reais
SELECT p.nome_produto,p.preco FROM produtos p
WHERE p.preco > 10.00;

-- 7 - Listar notas fiscais com o total de itens maior que 2 unidades
SELECT nf.id_nf FROM produtos_has_nf pnf
INNER JOIN nota_fiscal nf ON pnf.id_nf = nf.id_nf
WHERE qtdVenda > 2;

-- 8 - Listar vendedor e nome do produto vendido
SELECT v.nome_vendedor,p.nome_produto FROM produtos_has_nf pnf
INNER JOIN produtos p ON pnf.id_produto = p.id_produto
INNER JOIN nota_fiscal nf ON pnf.id_nf = nf.id_nf
INNER JOIN vendedor v ON nf.id_vendedor = v.id_vendedor;

-- 9 - Listar nome do cliente e o nome do produto comprado
SELECT c.nome_cliente,p.nome_produto FROM produtos_has_nf pnf
INNER JOIN produtos p ON pnf.id_produto = p.id_produto
INNER JOIN nota_fiscal nf ON pnf.id_nf = nf.id_nf
INNER JOIN clientes c ON nf.id_cliente = c.id_cliente;

-- 10 - Listar notas fiscais em que a soma dos preços dos produtos seja maior que 20 (sem usar funções, apenas multiplicação e filtro)
SELECT nf.id_nf FROM produtos_has_nf pnf
INNER JOIN nota_fiscal nf ON pnf.id_nf = nf.id_nf
INNER JOIN produtos p ON pnf.id_produto = p.id_produto
WHERE pnf.qtdVenda*p.preco > 20;