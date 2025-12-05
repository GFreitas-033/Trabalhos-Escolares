-- 1- Crie uma view chamada vw_clientes_vendedores que exiba:
-- customerNumber, customerName, city, salesRepEmployeeNumber, firstName do vendedor, lastName do vendedor
-- Faça um SELECT mostrando apenas clientes atendidos pelo vendedor "Steve Patterson".
CREATE VIEW vw_clientes_vendedores AS 
SELECT 
	c.customerNumber, 
    c.customerName, 
    c.city, 
    c.salesRepEmployeeNumber, 
    CONCAT(e.firstName, " ", e.lastName) AS NomeFuncionario
FROM customers c
JOIN employees e ON c.salesRepEmployeeNumber = e.employeeNumber;

SELECT * FROM vw_clientes_vendedores
WHERE NomeFuncionario = 'Steve Patterson';
DROP VIEW vw_clientes_vendedores;

-- 2- Utilizando a view vw_clientes_vendedores, atualize a cidade do cliente 103 para 'São Paulo'.
UPDATE vw_clientes_vendedores
SET city = 'São Paulo'
WHERE customerNumber = 103;

-- 3- Insira um novo cliente usando a vw_clientes_vendedores, sabendo que o vendedor (salesRepEmployeeNumber) será o funcionário 1370.
-- Dica: só enviar campos pertencentes à tabela customers.
INSERT INTO vw_clientes_vendedores(	
	customerNumber, 
    customerName, 
    city, 
    salesRepEmployeeNumber 
)
VALUES(	
	16, 
    Guilherme,
    Lins, 
    1370
);

-- 4- Exclua o cliente criado no exercício anterior através da view vw_clientes_vendedores.
DELETE FROM vw_clientes_vendedores WHERE customerNumber = 16;

-- 5- Observe a view abaixo:
-- CREATE VIEW vw_pedidos_clientes AS
-- SELECT
    -- c.customerName,
    -- o.orderNumber,
    -- o.status,
    -- o.orderDate
-- FROM customers c
-- INNER JOIN orders o ON c.customerNumber = o.customerNumber;
-- Responda:
-- a) Ela permite SELECT? R: Sim, todas as view permite SELECT
-- b) Ela permite UPDATE no campo status? R: Sim, pois o campo alterado não interfere em outros
-- c) Ela permite INSERT de novos pedidos? R: Não, pois o MySQL não consegue determinar em qual tabela os novos dados devem ser inseridos
-- d) Justifique todas as respostas.

-- 6- Crie uma tabela orders_range particionada por RANGE, usando o campo orderDate, separando os pedidos por ano:
-- p2019 → até 31/12/2019
-- p2020 → até 31/12/2020
-- p2021 → até 31/12/2021
-- pfuture → anos posteriores
-- Depois insira 2 pedidos fictícios para testar cada partição e escreva a consulta que retorna a partição utilizada.
CREATE TABLE orders_range(
	orderNumber INT NOT NULL,
	orderDate DATE NOT NULL,
	requiredDate DATE NOT NULL,
	shippedDate DATE DEFAULT NULL,
	status VARCHAR(15) NOT NULL,
	comments TEXT,
	customerNumber INT NOT NULL,
	PRIMARY KEY (orderNumber, orderDate)
) PARTITION BY RANGE (YEAR(orderDate)) (
	PARTITION p2019 VALUES LESS THAN (2020),
	PARTITION p2020  VALUES LESS THAN (2021),
    PARTITION p2021  VALUES LESS THAN (2022),
	PARTITION pfuture VALUES LESS THAN MAXVALUE
);

INSERT INTO orders_range 
(orderNumber, orderDate, requiredDate, shippedDate, status, comments, customerNumber)
VALUES
(1, '2019-06-15', '2019-06-30', '2019-06-20', 'Shipped', 'Teste 2019', 103),
(2, '2020-07-10', '2020-07-25', '2020-07-15', 'Shipped', 'Teste 2020', 104);

SELECT 
	PARTITION_NAME AS Nome_Particao, 
	TABLE_ROWS AS QTD_Rows 
FROM INFORMATION_SCHEMA.PARTITIONS 
WHERE TABLE_NAME = 'orders_range';

DROP TABLE orders_range;

-- 7- Crie uma tabela customers_list particionada por LIST, separando clientes por país:
-- p_americas → USA, Canada, Brazil
-- p_europe → France, Germany, UK, Spain
-- p_asia → Japan, Singapore, Philippines
-- p_other → demais países
-- Insira 3 clientes de países diferentes e mostre em qual partição cada um se enquadra.
CREATE TABLE customers_list(
    customerNumber INT NOT NULL,
    customerName VARCHAR(50) NOT NULL,
    contactLastName VARCHAR(50) NOT NULL,
    contactFirstName VARCHAR(50) NOT NULL,
    phone VARCHAR(50) NOT NULL,
    addressLine1 VARCHAR(50) NOT NULL,
    addressLine2 VARCHAR(50) DEFAULT NULL,
    city VARCHAR(50) NOT NULL,
    state VARCHAR(50) DEFAULT NULL,
    postalCode VARCHAR(15) DEFAULT NULL,
    country VARCHAR(50) NOT NULL,
    salesRepEmployeeNumber INT DEFAULT NULL,
    creditLimit DECIMAL(10,2) DEFAULT NULL,
    PRIMARY KEY (customerNumber, country)
) PARTITION BY LIST COLUMNS(country) (
	PARTITION p_americas VALUES IN ('USA', 'Canada', 'Brazil'),
	PARTITION p_europe VALUES IN ('France', 'Germany', 'UK', 'Spain'),
    PARTITION p_asia VALUES IN ('Japan', 'Singapore', 'Philippines'),
	PARTITION p_other VALUES IN ('demaisPaises')
);

INSERT INTO customers_list
(customerNumber, customerName, contactLastName, contactFirstName, phone, addressLine1, city, country, creditLimit)
VALUES
(1, 'Carlos Silva', 'Silva', 'Carlos', '1111-1111', 'Rua A', 'São Paulo', 'Brazil', 50000.00),
(2, 'Adolf Smith', 'Smith', 'John', '2222-2222', 'Rua B', 'BerliM', 'Germany', 80000.00),
(3, 'Pierre Dupont', 'Dupont', 'Pierre', '3333-3333', 'Rua C', 'Paris', 'France', 60000.00);

DROP TABLE customers_list;

-- 8- Crie a tabela products_hash particionada por HASH, usando productCode, em 4 partições.
-- Insira 3 produtos fictícios e explique como o MySQL decide a partição.
CREATE TABLE products_hash(
    productCode INT NOT NULL AUTO_INCREMENT,
    productName VARCHAR(70) NOT NULL,
    productLine VARCHAR(50) NOT NULL,
    productScale VARCHAR(10),
    productVendor VARCHAR(50),
    productDescription TEXT,
    quantityInStock INT,
    buyPrice DECIMAL(10,2),
    PRIMARY KEY (productCode)
) PARTITION BY HASH(productCode) PARTITIONS 4;

INSERT INTO products_hash
(productName, productLine, productScale, productVendor, quantityInStock, buyPrice)
VALUES
('Carro Miniatura', 'Classic Cars', '1:10', 'AutoModel', 500, 55.00),
('Moto Miniatura', 'Motorcycles', '1:12', 'MiniMoto', 300, 42.00),
('Caminhão Miniatura', 'Trucks', '1:18', 'ModelTruck', 200, 65.00);
-- O MySQL usa uma função hash interna baseada no valor de productCode e divide o resultado pelo número de partições (4).
DROP TABLE products_hash;

-- 9- Crie a tabela orders_key particionada por KEY, usando orderNumber (PK), com 3 partições.
-- Insira 3 pedidos fictícios e descreva a diferença entre HASH e KEY.
CREATE TABLE orders_key( 
	orderNumber INT NOT NULL, 
	orderDate DATE NOT NULL, 
	requiredDate DATE NOT NULL, 
	shippedDate DATE DEFAULT NULL, 
	status VARCHAR(15) NOT NULL, 
	comments TEXT, 
	customerNumber INT NOT NULL, 
	PRIMARY KEY (orderNumber) 
) PARTITION BY KEY(orderNumber) PARTITIONS 3; 

INSERT INTO orders_key 
(orderNumber, orderDate, requiredDate, shippedDate, status, comments, customerNumber)
VALUES
(1, '2019-06-15', '2019-06-30', '2019-06-20', 'Shipped', 'Teste 2019', 103),
(2, '2020-07-10', '2020-07-25', '2020-07-15', 'Shipped', 'Teste 2020', 104),
(3, '2021-08-12', '2021-08-25', '2021-08-18', 'Shipped', 'Teste 2021', 105);
-- R: KEY tem uma HASH Predefinida que não pode ser mudada e o KEY necessita de uma PRIMARY KEY ou UNIQUE para poder criar a partição.
DROP TABLE orders_key;

-- 10- Você foi contratado para criar uma Stored Procedure chamada sp_registerPayment que deve realizar o registro de um pagamento no banco classicmodels, obedecendo às regras abaixo:
-- Receber como parâmetros:
-- pCustomerNumber (INT)
-- pCheckNumber (VARCHAR)
-- pAmount (DECIMAL)
-- Antes de registrar o pagamento, o procedimento deve:
-- Verificar se o cliente existe na tabela customers
-- Somar o valor de todos os pagamentos já feitos por esse cliente (payments.amount)
-- Verificar se o novo pagamento não fará o total ultrapassar 200.000
-- Caso ultrapasse, a procedure deve cancelar a operação e retornar a mensagem:
-- "Erro: limite de crédito aplicado (200.000) excedido"
-- Se estiver dentro do limite:
-- Inserir o pagamento na tabela payments
-- Atualizar o creditLimit do cliente para (creditLimit - novo pagamento)
-- O processo deve usar TRANSACTION
-- Retornar mensagem de sucesso:
-- "Pagamento registrado com sucesso!"
DELIMITER $$
CREATE PROCEDURE sp_registerPayment(IN pCustomerNumber INT, IN pCheckNumber VARCHAR(50), IN pAmount DECIMAL(10,2))
BEGIN
	DECLARE totalPagamento DECIMAL(10,2);
    DECLARE clienteExiste INT DEFAULT 0;
    
	SELECT COUNT(*)
    INTO clienteExiste
    FROM customers
    WHERE customerNumber = pCustomerNumber;
    
     IF clienteExiste = 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Erro: cliente não encontrado';
    ELSE
		SELECT SUM(p.amount) + pAmount
		INTO totalPagamento 
		FROM payments p
		WHERE p.customerNumber = pCustomerNumber;
    
		IF totalPagamento > 200000 THEN
			SIGNAL SQLSTATE '45000'
			SET MESSAGE_TEXT = 'Erro: limite de crédito aplicado (200.000) excedido';
		ELSE
			START TRANSACTION;
				INSERT INTO payments (customerNumber, checkNumber, paymentDate, amount)
				VALUES (pCustomerNumber, pCheckNumber, NOW(), pAmount);

				UPDATE customers
				SET creditLimit = creditLimit - pAmount
				WHERE customerNumber = pCustomerNumber;
            COMMIT;
			
            SELECT 'Pagamento registrado com sucesso!';
		END IF;
	END IF;
END $$
DELIMITER ;

CALL sp_registerPayment(103, 'CHK123', 1500.00);