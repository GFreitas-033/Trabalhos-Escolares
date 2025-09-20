-- 1. Cálculo do Valor Total do Pedido
-- Crie uma função chamada calcular_valor_total que receba o orderNumber e retorne o valor total do pedido (soma de quantityOrdered * priceEach da tabela orderdetails).
-- Teste a função exibindo orderNumber, orderDate e calcular_valor_total(orderNumber) da tabela orders.
DELIMITER $$
CREATE FUNCTION calcular_valor_total(p_orderNumber INT)
RETURNS DECIMAL(10,2)
DETERMINISTIC
BEGIN
	DECLARE v_valor_total DECIMAL(10,2);
    
    SELECT SUM(od.quantityOrdered * od.priceEach)
    INTO v_valor_total
    FROM orderdetails od
    WHERE od.orderNumber = p_orderNumber;
    
    RETURN IFNULL(v_valor_total, 0);
END $$
DELIMITER ;

SELECT o.orderNumber, o.orderDate, calcular_valor_total(o.orderNumber) AS valor_total
FROM orders o;
DROP FUNCTION calcular_valor_total;

-- 2. Status do Pedido
-- Crie uma função chamada traduzir_status que receba o campo status da tabela orders e retorne:
-- "Enviado" se o status for "Shipped",
-- "Cancelado" se for "Cancelled",
-- "Pendente" para os demais.
-- Teste a função exibindo orderNumber, status, traduzir_status(status).
DELIMITER $$
CREATE FUNCTION traduzir_status(p_status VARCHAR(15))
RETURNS VARCHAR(10)
DETERMINISTIC
BEGIN
	DECLARE v_resultado VARCHAR(10);
    
	IF (p_status = "Shipped") THEN
		SET v_resultado = "Enviado";
    ELSEIF (p_status = "Cancelled") THEN
		SET v_resultado = "Cancelado";
	ELSE
		SET v_resultado = "Pendente";
	END IF;
    
    RETURN v_resultado;
END $$
DELIMITER ;

SELECT o.orderNumber, o.status, traduzir_status(o.status) AS status_traduzido
FROM orders o;
DROP FUNCTION traduzir_status;

-- 3. Lucro por Produto
-- Crie uma função chamada calcular_lucro que receba o productCode e retorne o lucro médio por unidade, calculado como MSRP - buyPrice da tabela products.
-- Teste a função exibindo productCode, productName e calcular_lucro(productCode).
DELIMITER $$
CREATE FUNCTION calcular_lucro(p_productCode VARCHAR(15))
RETURNS DECIMAL(10,2)
DETERMINISTIC
BEGIN
	DECLARE v_lucro DECIMAL(10,2);
    
    SELECT (p.MSRP - p.buyPrice)
    INTO v_lucro
    FROM products p
    WHERE p.productCode = p_productCode;
    
    RETURN v_lucro;
END $$
DELIMITER ;

SELECT p.productCode, p.productName, calcular_lucro(p.productCode) AS lucro
FROM products p;
DROP FUNCTION calcular_lucro;

-- 4. Tempo de Entrega
-- Crie uma função chamada tempo_entrega que receba orderNumber e retorne o número de dias entre orderDate e shippedDate.
-- Teste a função exibindo orderNumber, orderDate, shippedDate e tempo_entrega(orderNumber).
DELIMITER $$
CREATE FUNCTION tempo_entrega(p_orderNumber INT)
RETURNS INT
DETERMINISTIC
BEGIN
	DECLARE v_dias INT;
    
    SELECT DATEDIFF(o.shippedDate, o.orderDate)
    INTO v_dias
    FROM orders o
    WHERE o.orderNumber = p_orderNumber;
    
    RETURN v_dias;
END $$
DELIMITER ;

SELECT o.orderNumber, o.orderDate, o.shippedDate, tempo_entrega(o.orderNumber) AS tempo_em_dias
FROM orders o;
DROP FUNCTION tempo_entrega;

-- 5. Classificação de Cliente pelo Limite de Crédito
-- Crie uma função chamada classificar_cliente que receba o creditLimit da tabela customers e retorne:
-- "VIP" se o limite for maior que 100000,
-- "Preferencial" se o limite estiver entre 50000 e 100000,
-- "Comum" se for abaixo de 50000.
-- Teste a função exibindo customerName, creditLimit e classificar_cliente(creditLimit).
DELIMITER $$
CREATE FUNCTION classificar_cliente(p_creditLimit INT)
RETURNS VARCHAR(12)
DETERMINISTIC
BEGIN
	DECLARE v_resultado VARCHAR(12);
    
	IF (p_creditLimit > 100000) THEN
		SET v_resultado = "VIP";
    ELSEIF (p_creditLimit >= 50000 AND p_creditLimit <= 100000) THEN
		SET v_resultado = "Preferencial";
	ELSEIF (p_creditLimit < 50000) THEN
		SET v_resultado = "Comum";
	END IF;
    
    RETURN v_resultado;
END $$
DELIMITER ;

SELECT c.customerName, c.creditLimit, classificar_cliente(creditLimit) AS classificacao
FROM customers c;
DROP FUNCTION classificar_cliente;