SELECT nome_produto FROM produto
WHERE categoria='Vestiário' OR categoria='Acessórios' AND valor_produto>30;

SELECT * FROM cliente
INNER JOIN venda ON venda.id_cliente = cliente.id_cliente
INNER JOIN produto ON produto.id_produto = venda.id_produto
WHERE YEAR(venda.dt_venda)='2022' OR YEAR(venda.dt_venda)='2023'
ORDER BY venda.dt_venda DESC;

SELECT valor_total FROM venda
INNER JOIN produto ON produto.id_produto = venda.id_produto 
WHERE produto.categoria='Calçados' OR produto.categoria='Acessórios'
GROUP BY MONTH(dt_venda);