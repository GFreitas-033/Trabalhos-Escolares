-- 1. Crie uma trigger que, sempre que um pagamento (payments) for registrado, insira automaticamente uma linha em
-- uma tabela de auditoria (log_payments) com o número do cliente, o valor e a data/hora atual. 
DELIMITER $$
CREATE TRIGGER `classicmodels`.`payments_AFTER_INSERT`
AFTER INSERT ON `payments`
FOR EACH ROW
BEGIN
	INSERT INTO log_payments(customerNumber, amount, paymentDate)
    VALUES(NEW.customerNumber, NEW.amount, NOW());
END $$
DELIMITER ;

-- 2. Crie uma trigger que valide se um produto tem estoque suficiente antes de ser adicionado a um pedido 
-- (orderdetails). Se a quantidade solicitada (quantityOrdered) for maior do que o estoque disponível em
-- products.quantityInStock, a operação deve ser cancelada com uma mensagem de erro.
DELIMITER $$
CREATE TRIGGER `classicmodels`.`ordersdetails_BEFORE_INSERT`
BEFORE INSERT ON `orderdetails`
FOR EACH ROW
BEGIN
	DECLARE qtd_Estoque INT;
    
    SELECT p.quantityInStock
    INTO qtd_Estoque
    FROM products p
    WHERE productCode = NEW.productCode;
    
    IF NEW.quantityOrdered > qtd_Estoque THEN
		SIGNAL SQLSTATE '45000';
        SET MESSAGE_TEXT = 'Estoque insuficiente para este produto';
	END IF;
END $$
DELIMITER ;

-- 4. Crie uma trigger que, quando um cliente (customers) for excluído, salve as informações básicas do cliente (ID e
-- nome) em uma tabela de log (log_customers).
DELIMITER $$
CREATE TRIGGER `classicmodels`.`customers_AFTER_DELETE`
AFTER DELETE ON `customers`
FOR EACH ROW
BEGIN
	INSERT INTO log_customers(customerNumber, customerName)
    VALUES (OLD.customerNumber, OLD.customerName);
END $$
DELIMITER ;

-- 5. Crie uma trigger que impeça a exclusão de um produto (products) caso ainda existam pedidos vinculados a ele em orderdetails.
DELIMITER $$
CREATE TRIGGER `classicmodels`.`products_BEFORE_DELETE`
BEFORE DELETE ON `products`
FOR EACH ROW
BEGIN
	DECLARE total_produtos INT;
    
    SELECT COUNT(*)
    INTO produtos
    FROM orderdetails od
    WHERE od.productCode = OLD.productCode;
    
    IF total_produtos > 0 THEN
		SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Ação Não pode ser Finalizada';
	END IF;
END $$
DELIMITER ;

-- 6. Crie uma trigger que impeça a atualização do limite de crédito (customers.creditLimit) de um cliente para um 
-- valor negativo. Caso o novo valor seja menor que 0, a operação deve ser cancelada.
DELIMITER $$
CREATE TRIGGER `classicmodels`.`customers_BEFORE_UPDATE`
BEFORE UPDATE ON `customers`
FOR EACH ROW
BEGIN
    IF NEW.creditLimit < 0 THEN
		SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'O novo valor de Credito tem que ser Maior que 0';
	END IF;
END $$
DELIMITER ;