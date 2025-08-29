-- 1- Liste os nomes dos clientes que já fizeram pedidos. Utilize uma subconsulta para buscar os customerNumber da tabela orders. 
SELECT c.customerName FROM customers c
WHERE c.customerNumber IN (
	SELECT o.customerNumber FROM orders o
);

-- 2- Liste os nomes e cidades dos funcionários que atendem clientes localizados no país 'USA' e escritórios onde trabalham.
SELECT e.firstName, e.lastName, o.city FROM employees e
INNER JOIN offices o ON e.officeCode = o.officeCode
WHERE e.employeeNumber IN (
	SELECT c.salesRepEmployeeNumber FROM customers c
    WHERE c.country = 'USA'
);

-- 3- Liste os códigos dos produtos (productCode) que estão presentes em pedidos (tabela orderdetails). Use subconsulta com GROUP BY.
SELECT p.productCode FROM products p
WHERE p.productCode IN (
	SELECT od.productCode FROM orderdetails od GROUP BY od.productCode
);

-- 4- Exiba o nome dos clientes que fizeram pedidos com pelo menos um produto de cada código listado nos pedidos. Use subconsulta com GROUP BY.
SELECT c.customerName FROM customers c
WHERE c.customerNumber IN (
	SELECT o.customerNumber FROM orders o
    WHERE o.orderNumber IN (
		SELECT od.orderNumber FROM orderdetails od
        WHERE od.productCode IN (
			SELECT p.productCode FROM products p
        )
        GROUP BY od.orderNumber
    )
    GROUP BY o.customerNumber
);

-- 5- Liste os nomes dos produtos comprados por clientes cujo representante de vendas está alocado no escritório de código '1'.
SELECT p.productName FROM products p
WHERE p.productCode IN (
	SELECT od.productCode FROM orderdetails od
    WHERE od.orderNumber IN (
		SELECT o.orderNumber FROM orders o
        WHERE o.customerNumber IN (
			SELECT c.customerNumber FROM customers c
            WHERE c.salesRepEmployeeNumber IN (
				SELECT e.employeeNumber FROM employees e
                WHERE e.officeCode = 1
            )
        )
    )
);

-- 6- Liste os nomes dos clientes que têm mais de um pedido registrado (usando GROUP BY, mas sem funções).
SELECT c.customerName FROM customers c
WHERE c.customerNumber IN (
  SELECT o1.customerNumber FROM orders o1, orders o2
  WHERE o1.customerNumber = o2.customerNumber AND o1.orderNumber <> o2.orderNumber
  GROUP BY o1.customerNumber
); -- Confuso

-- 7- Liste os nomes dos clientes que compraram produtos da linha 'Classic Cars'. Use junção com products e subconsulta.
SELECT c.customerName AS NomeCliente FROM customers c
WHERE c.customerNumber IN (
    SELECT o.customerNumber FROM orders o
    WHERE o.orderNumber IN (
        SELECT od.orderNumber FROM orderdetails od
        INNER JOIN products p ON od.productCode = p.productCode
        WHERE p.productLine = 'Classic Cars'
    )
);

-- 8- Liste os códigos dos pedidos (orderNumber) que contêm mais de um produto (sem usar função agregada, apenas GROUP BY).
SELECT o.orderNumber FROM orders o
WHERE o.orderNumber IN (
  SELECT od1.orderNumber FROM orderdetails od1, orderdetails od2
  WHERE od1.orderNumber = od2.orderNumber AND od1.productCode <> od2.productCode
  GROUP BY od1.orderNumber
)
GROUP BY o.orderNumber; -- Confuso

-- 9- Liste os nomes dos produtos que foram incluídos em pedidos feitos por clientes da cidade 'Madrid'.
SELECT p.productName FROM products p
WHERE p.productCode IN (
	SELECT od.productCode FROM orderdetails od
    WHERE od.orderNumber IN (
		SELECT o.orderNumber FROM orders o
        WHERE o.customerNumber IN (
			SELECT c.customerNumber FROM customers c
            WHERE c.city = 'Madrid'
        )
    )
);

-- 10- Liste os nomes dos empregados que são representantes de vendas (tabela employees) de clientes que moram no país 'France'.
SELECT e.firstName, e.lastName FROM employees e
WHERE e.employeeNumber IN (
	SELECT c.salesRepEmployeeNumber FROM customers c WHERE country = 'France'
);