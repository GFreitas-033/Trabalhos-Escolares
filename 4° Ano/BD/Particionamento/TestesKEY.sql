-- Anotações 
-- Partição não aceita FOREIGN KEY | Versões do MySQL anteriores à 8.0.13 não oferecem suporte a chaves estrangeiras em tabelas particionadas. 
-- 								   | Tentar criar uma chave estrangeira em uma tabela particionada ou particionar uma tabela com chaves 
-- 								   | estrangeiras existentes nessas versões resultará no erro 1506 

-- O campo para KEY precisa ser uma PRIMARY KEY | No KEY particionamento, as colunas usadas como chave de particionamento devem fazer 
-- 												| parte da chave primária da tabela ou de uma chave exclusiva, se houver. 


-- Sem Partição KEY 
CREATE TABLE sem_particao_orders( 
	orderNumber INT NOT NULL, 
	orderDate DATE NOT NULL, 
	requiredDate DATE NOT NULL, 
	shippedDate DATE DEFAULT NULL, 
	status VARCHAR(15) NOT NULL, 
	comments TEXT, 
	customerNumber INT NOT NULL, 
	PRIMARY KEY (orderNumber) 
); 
-- Com Partição KEY 
CREATE TABLE com_particao_orders( 
	orderNumber INT NOT NULL, 
	orderDate DATE NOT NULL, 
	requiredDate DATE NOT NULL, 
	shippedDate DATE DEFAULT NULL, 
	status VARCHAR(15) NOT NULL, 
	comments TEXT, 
	customerNumber INT NOT NULL, 
	PRIMARY KEY (orderNumber) 
) PARTITION BY KEY(orderNumber) PARTITIONS 4; 
-- Com Partição RANGE só para comparar
CREATE TABLE particao_range_orders(
	orderNumber INT NOT NULL,
	orderDate DATE NOT NULL,
	requiredDate DATE NOT NULL,
	shippedDate DATE DEFAULT NULL,
	status VARCHAR(15) NOT NULL,
	comments TEXT,
	customerNumber INT NOT NULL,
	PRIMARY KEY (orderNumber, orderDate)
) PARTITION BY RANGE (YEAR(orderDate)) (
	PARTITION p_antigo VALUES LESS THAN (2004),
	PARTITION p_medio  VALUES LESS THAN (2005),
	PARTITION p_recente VALUES LESS THAN MAXVALUE
);

-- Clonar os Dados do Orders para as Novas Tabelas 
INSERT INTO com_particao_orders SELECT * FROM orders; 
INSERT INTO sem_particao_orders SELECT * FROM orders; 
INSERT INTO particao_range_orders SELECT * FROM orders; 

-- Testar se tem Partição 
SELECT 
	PARTITION_NAME AS Nome_Particao, 
	TABLE_ROWS AS QTD_Rows 
FROM INFORMATION_SCHEMA.PARTITIONS 
WHERE TABLE_NAME = 'com_particao_orders'/*particao_range_orders*/; 

-- Testar as Consultas 
-- Consulta sem partição, 0,0016 sec
SELECT * FROM sem_particao_orders WHERE customerNumber = 103;
-- Consulta com partição KEY, 0,0000 sec 
SELECT * FROM com_particao_orders WHERE customerNumber = 103;
-- Consulta com partição RANGE 
SELECT * FROM particao_range_orders WHERE customerNumber = 103;

-- RESET
DROP TABLE sem_particao_orders;
DROP TABLE com_particao_orders;
DROP TABLE particao_range_orders;