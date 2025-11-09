-- 1- Crie uma stored procedure chamada sp_listar_produtos_por_categoria que receba como parâmetro o productLine e 
-- retorne todos os produtos pertencentes a essa categoria, mostrando productName, productScale e buyPrice.
DELIMITER $$
CREATE PROCEDURE SP_listar_produtos_por_categoria(IN p_productLine VARCHAR(50))
BEGIN
	SELECT p.productCode, p.productName, p.productScale, p.buyPrice
    FROM products p
    WHERE p.productLine LIKE p_productLine;
END $$
DELIMITER ;

CALL SP_listar_produtos_por_categoria("Trains");

-- 2- Crie uma stored procedure chamada sp_contar_pedidos_cliente que receba o customerNumber e retorne o total de 
-- pedidos feitos por esse cliente.
DELIMITER $$
CREATE PROCEDURE SP_contar_pedidos_cliente(IN p_customerNumber INT)
BEGIN
	SELECT COUNT(*) AS total_pedido
    FROM orders o
    WHERE o.customerNumber = p_customerNumber;
END $$
DELIMITER ;

CALL SP_contar_pedidos_cliente(103);

-- 3- Crie uma stored procedure chamada sp_inserir_cliente que insira um novo cliente na tabela customers. Os
-- parâmetros devem incluir customerName, contactLastName, contactFirstName, phone, addressLine1, city, country,
-- salesRepEmployeeNumber e creditLimit.
DELIMITER $$
CREATE PROCEDURE SP_inserir_cliente(
	IN p_customerNumber INT,
	IN p_customerName VARCHAR(50),
    IN p_contactLastName VARCHAR(50),
    IN p_contactFirstName VARCHAR(50),
    IN p_phone VARCHAR(50),
    IN p_addressLine1 VARCHAR(50),
    IN p_city VARCHAR(50),
    IN p_country VARCHAR(50),
    IN p_salesRepEmployeeNumber INT,
    IN p_creditLimit DECIMAL(10,2)
)
BEGIN
	INSERT INTO customers(
		customerNumber,
		customerName,
		contactLastName,
		contactFirstName,
		phone,
		addressLine1,
		city,
		country,
		salesRepEmployeeNumber,
		creditLimit
    )
	VALUES(
		p_customerNumber,
		p_customerName,
		p_contactLastName,
		p_contactFirstName,
		p_phone,
		p_addressLine1,
		p_city,
		p_country,
		p_salesRepEmployeeNumber,
		p_creditLimit
    );
END $$
DELIMITER ;

CALL SP_inserir_cliente(1,"Teste da Silva","Silva","Teste","(14)99999-9999","Rua sla de 21 de mes","Lins","Brasil",1002,5000000.01);

-- 4- Crie uma stored procedure chamada sp_atualizar_credito_cliente que receba o customerNumber e um novo valor de 
-- creditLimit e atualize o limite de crédito do cliente correspondente.
DELIMITER $$
CREATE PROCEDURE SP_atualizar_credito_cliente(IN p_customerNumber INT, IN p_creditLimit DECIMAL(10,2))
BEGIN
	UPDATE customers c SET creditLimit = p_creditLimit
	WHERE c.customerNumber = p_customerNumber;
END $$
DELIMITER ;

CALL SP_atualizar_credito_cliente(103, 21000.00);

-- 5- Crie uma stored procedure chamada sp_total_vendas_cliente que receba o customerNumber e retorne o valor total
-- das vendas (somatório do quantityOrdered * priceEach) feitas por esse cliente na tabela orderdetails.
DELIMITER $$
CREATE PROCEDURE SP_total_vendas_cliente(IN p_customerNumber INT)
BEGIN
	SELECT SUM(quantityOrdered * priceEach) AS valor_total
    FROM orderdetails od
    WHERE od.orderNumber IN (
		SELECT o.orderNumber
        FROM orders o
        WHERE o.customerNumber = p_customerNumber
    );
END $$
DELIMITER ;

CALL SP_total_vendas_cliente(103);