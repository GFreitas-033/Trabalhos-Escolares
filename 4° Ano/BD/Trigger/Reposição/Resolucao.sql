-- 1- Crie uma trigger chamada after_delete_customer que registre em uma tabela chamada customer_audit as exclusões realizadas na tabela customers.
-- A tabela customer_audit deve conter as colunas:
-- customerNumber, customerName, deleteDate
-- A trigger deve ser executada após a exclusão (AFTER DELETE) e gravar automaticamente a data atual.
DELIMITER $$
CREATE TRIGGER `classicmodels`.`after_delete_customer`
AFTER DELETE ON `customers`
FOR EACH ROW
BEGIN
	INSERT INTO customer_audit(customerNumber, customerName, deleteDate)
    VALUES (OLD.customerNumber, OLD.customerName, NOW());
END $$
DELIMITER ;

-- 2- Crie uma trigger chamada update_credit_limit que aumente o limite de crédito do cliente em 10% sempre que for inserido um pagamento na tabela payments.
-- A trigger deve atualizar o campo creditLimit da tabela customers.
DELIMITER $$
CREATE TRIGGER `classicmodels`.`update_credit_limit`
AFTER INSERT ON `payments`
FOR EACH ROW
BEGIN
	UPDATE customers SET creditLimit = creditLimit * 1.10
    WHERE customerNumber = NEW.customerNumber;
END $$
DELIMITER ;