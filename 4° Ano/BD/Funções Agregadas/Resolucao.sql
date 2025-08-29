-- 1- Encontre o total de pedidos realizados por cada cliente. Exiba apenas clientes que fizeram mais de 3 pedidos.
SELECT c.customerName, COUNT(o.customerNumber) AS total_pedidos
FROM customers c
INNER JOIN orders o ON c.customerNumber = o.customerNumber
GROUP BY o.customerNumber, c.customerName
HAVING COUNT(*) > 3
ORDER BY c.customerName ASC;

-- 2- Liste os nomes dos funcionários e a quantidade total de clientes atribuídos a cada um.
SELECT CONCAT(e.firstName, ' ', e.lastName) AS nome_completo, COUNT(c.customerNumber) AS total_clientes
FROM employees e
INNER JOIN customers c ON e.employeeNumber = c.salesRepEmployeeNumber
GROUP BY c.salesRepEmployeeNumber, e.employeeNumber
ORDER BY nome_completo ASC;

-- 3- Exiba o total de vendas (soma de priceEach * quantityOrdered) por produto. Mostre apenas produtos que venderam mais de R$ 50.000.
SELECT p.productName, SUM(od.priceEach * od.quantityOrdered) AS total_venda
FROM products p
INNER JOIN orderdetails od ON p.productCode = od.productCode
GROUP BY p.productCode
HAVING SUM(od.priceEach * od.quantityOrdered) > 50000
ORDER BY p.productName ASC;

-- 4- Para cada linha de produto (productLine), exiba a quantidade total de produtos disponíveis em estoque.
SELECT pl.productLine, SUM(p.quantityInStock) AS total_estoque
FROM productlines pl
INNER JOIN products p ON pl.productLine = p.productLine
GROUP BY pl.productLine
ORDER BY pl.productLine;

-- 5- Utilizando JSON_ARRAYAGG(): Para cada cliente, gere uma lista JSON com os números dos cheques (payments).
SELECT c.customerName, JSON_ARRAYAGG(p.checkNumber)
FROM customers c
INNER JOIN payments p ON c.customerNumber = p.customerNumber
GROUP BY p.customerNumber
ORDER BY c.customerName;

-- 6- Utilizando JSON_OBJECTAGG(): Para cada pedido, gere um objeto JSON com productCode como chave e quantityOrdered como valor.
SELECT od.orderNumber, JSON_OBJECTAGG(od.productCode, od.quantityOrdered)
FROM orderdetails od
GROUP BY od.orderNumber
ORDER BY od.orderNumber;

-- 7- Encontre o valor total de pagamentos por país. Liste apenas países com pagamentos acima de R$ 100.000.
SELECT c.country, SUM(p.amount) AS valor_total
FROM customers c
INNER JOIN payments p ON c.customerNumber = p.customerNumber
GROUP BY c.country
HAVING SUM(p.amount) > 100000
ORDER BY c.country;

-- 8- Liste cada funcionário e o total de vendas realizadas pelos clientes que ele representa.
SELECT CONCAT(e.firstName, ' ', e.lastName) AS nome_completo, COUNT(o.customerNumber) AS total_venda
FROM employees e
INNER JOIN customers c ON e.employeeNumber = c.salesRepEmployeeNumber
INNER JOIN orders o ON c.customerNumber = o.customerNumber
GROUP BY e.employeeNumber, nome_completo
ORDER BY nome_completo ASC;

-- Versão Subconsulta
SELECT CONCAT(e.firstName, ' ', e.lastName) AS nome_completo, (
    SELECT COUNT(*)
    FROM orders o
    WHERE o.customerNumber IN (
      SELECT c.customerNumber
      FROM customers c
      WHERE c.salesRepEmployeeNumber = e.employeeNumber
    )
  ) AS total_vendas
FROM employees e
WHERE EXISTS (
  SELECT 1
  FROM customers c
  WHERE c.salesRepEmployeeNumber = e.employeeNumber
)
ORDER BY nome_completo ASC;

-- 9- Para cada pedido, gere um JSON array com os nomes dos produtos (productName) incluídos.
SELECT JSON_ARRAYAGG(p.productName)
FROM products p
INNER JOIN orderdetails od ON p.productCode = od.productCode
WHERE od.orderNumber IN (
	SELECT o.orderNumber
    FROM orders o
)
GROUP BY od.orderNumber;

-- 10- Para cada cidade que possui um escritório, gere um objeto JSON com officeCode como chave e phone como valor.
SELECT ofc.city, JSON_OBJECTAGG(ofc.officeCode, ofc.phone)
FROM offices ofc
GROUP BY ofc.city
ORDER BY ofc.city ASC;