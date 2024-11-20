SELECT * FROM produto WHERE categoria='Vestiário' AND valor_produto>50.00;

SELECT nome_cliente,email_cliente FROM cliente 
INNER JOIN venda ON venda.id_cliente = cliente.id_cliente
INNER JOIN produto ON produto.id_produto = venda.id_produto
WHERE produto.categoria='Calçados' AND YEAR(venda.dt_venda)='2023';

SELECT valor_total FROM venda
INNER JOIN cliente ON cliente.id_cliente = venda.id_cliente 
WHERE cliente.cidade_cliente='são paulo';