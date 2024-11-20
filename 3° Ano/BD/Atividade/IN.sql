SELECT * FROM produto WHERE id_produto IN(12,34,56);

SELECT nome_cliente,cidade_cliente FROM cliente
INNER JOIN venda ON venda.id_cliente = cliente.id_cliente
WHERE venda.id_venda IN(78,92,101);

SELECT valor_total FROM venda WHERE dt_venda IN('2024-01-10', '2024-03-15','2024-05-02');