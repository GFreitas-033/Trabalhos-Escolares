-- 1. Crie uma função que receba o customerNumber e retorne o nome do cliente. Essa função deve ser determinística.  
DELIMITER $$
CREATE FUNCTION nome_cliente(p_customerNumber INT)
RETURNS VARCHAR(50)
DETERMINISTIC
BEGIN
	DECLARE v_nome varchar(50);
	
    SELECT customerName
    INTO v_nome
    FROM customers
    WHERE customerNumber = p_customerNumber;
    
    RETURN v_nome;
END $$
DELIMITER ;

-- 2. Crie uma função que receba o officeCode e retorne a city correspondente.  
DELIMITER $$
CREATE FUNCTION cidade_office(p_officeCode INT)
RETURNS VARCHAR(50)
DETERMINISTIC
BEGIN
	DECLARE v_cidade varchar(50);
    
    SELECT city
    INTO v_cidade
    FROM offices
    WHERE officeCode = p_officeCode;
    
    RETURN v_cidade;
END $$
DELIMITER ;

-- 3. Crie uma função que receba o productCode e retorne a quantidade em estoque (quantityInStock).  
DELIMITER $$
CREATE FUNCTION qtd_estoque(p_productCode VARCHAR(15))
RETURNS INT
DETERMINISTIC
BEGIN
	DECLARE v_estoque INT;
    
    SELECT quantityInStock
    INTO v_estoque
    FROM products
    WHERE productCode = p_productCode;
    
    RETURN v_estoque;
END $$
DELIMITER ;

-- 4. Crie uma função que receba um orderNumber e retorne o valor total do pedido (quantityOrdered * priceEach).  
DELIMITER $$
CREATE FUNCTION valor_total_pedido(p_orderNumber INT)
RETURNS DECIMAL(10,2)
DETERMINISTIC
BEGIN
	DECLARE v_valor_total DECIMAL(10,2);
    
    SELECT SUM(quantityOrdered * priceEach)
    INTO v_valor_total
    FROM orderdetails
    WHERE orderNumber = p_orderNumber;
    
    RETURN IFNULL(v_valor_total, 0);
END $$
DELIMITER ;

-- 5. Crie uma função determinística que receba um número mínimo de pedidos e retorne quantos clientes possuem mais do que esse total de pedidos.  
DELIMITER $$
CREATE FUNCTION qtd_pedidos(p_numero INT)
RETURNS INT
DETERMINISTIC
BEGIN
	DECLARE v_resultado INT;
    
	SELECT COUNT(*)
	INTO v_resultado
	FROM (
		SELECT o.customerNumber
		FROM orders o
		GROUP BY o.customerNumber
		HAVING COUNT(o.orderNumber) > p_numero
    ) AS total_clientes;
    
    RETURN v_resultado;
END $$
DELIMITER ;

-- Comando para permitir NOT DETERMINISTIC
-- SET GLOBAL log_bin_trust_function_creators = 1;

-- 6. Crie uma função que retorne a hora atual no formato HH:MM:SS. Essa função deve ser não determinística.  
DELIMITER $$
CREATE FUNCTION hora_atual()
RETURNS VARCHAR(8)
NOT DETERMINISTIC
BEGIN
    RETURN DATE_FORMAT(NOW(), '%H:%i:%s');
END $$
DELIMITER ;

-- 7. Crie uma função que retorne um número aleatório entre 1 e 100.  
DELIMITER $$
CREATE FUNCTION numero_aleatorio()
RETURNS INT
NOT DETERMINISTIC
BEGIN
    RETURN FLOOR(RAND()*(100-1+1)+1);
END $$
DELIMITER ;

-- 8. Crie uma função determinística que receba o orderNumber e retorne o status do pedido.  
DELIMITER $$
CREATE FUNCTION verificar_status(p_orderNumber INT)
RETURNS VARCHAR(15)
DETERMINISTIC
BEGIN
	DECLARE v_resultado VARCHAR(15);
    
    SELECT o.status
    INTO v_resultado
    FROM orders o
    WHERE o.orderNumber = p_orderNumber;
    
    RETURN v_resultado;
END $$
DELIMITER ;

-- 9. Crie uma função determinística que receba um limite (p_min_qtd) e retorne quantos produtos tiveram vendas maiores do que essa quantidade total (usando SUM(quantityOrdered)). 
DELIMITER $$
CREATE FUNCTION maiores_vendas(p_numero INT)
RETURNS INT
DETERMINISTIC
BEGIN
	DECLARE v_resultado INT;
    
	SELECT COUNT(*)
	INTO v_resultado
	FROM (
		SELECT od.orderNumber
		FROM orderdetails od
		GROUP BY od.orderNumber
		HAVING SUM(od.quantityOrdered) > p_numero
    ) AS total_pedido;
    
    RETURN v_resultado;
END $$
DELIMITER ;

-- 10. Crie uma função determinística que receba o employeeNumber e retorne a quantidade de clientes associados a esse vendedor (salesRepEmployeeNumber).  
DELIMITER $$
CREATE FUNCTION clientes_vendedor(p_employeeNumber INT)
RETURNS INT
DETERMINISTIC
BEGIN
	DECLARE v_resultado INT;
    
    SELECT COUNT(*)
    INTO v_resultado
    FROM customers c
    WHERE c.salesRepEmployeeNumber = p_employeeNumber;
    
    RETURN v_resultado;
END $$
DELIMITER ;

-- SELECT Todas as Functions
SELECT nome_cliente(103) AS nome;
SELECT cidade_office(7) AS cidade;
SELECT qtd_estoque('S10_1678') AS quantidade_estoque;
SELECT valor_total_pedido(10100) AS valor_total;
SELECT qtd_pedidos(5) AS qtd_clientes;
SELECT hora_atual();
SELECT numero_aleatorio();
SELECT verificar_status(10100) AS status_pedido;
SELECT maiores_vendas(5) AS produtos_maiores_venda;
SELECT clientes_vendedor(1370) AS clientes_associados;

-- DROPAR Todas as Functions
DROP FUNCTION nome_cliente;
DROP FUNCTION cidade_office;
DROP FUNCTION qtd_estoque;
DROP FUNCTION valor_total_pedido;
DROP FUNCTION qtd_pedidos;
DROP FUNCTION hora_atual;
DROP FUNCTION numero_aleatorio;
DROP FUNCTION verificar_status;
DROP FUNCTION maiores_vendas;
DROP FUNCTION clientes_vendedor;