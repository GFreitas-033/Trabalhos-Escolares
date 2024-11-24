DELIMITER $$

CREATE PROCEDURE AtualizarDataEmprestimo(
	IN e_emprestimoID INT,
    IN e_dtDevolucao DATE
)
BEGIN
	UPDATE emprestimos
    SET data_devolucao = e_dtDevolucao
    WHERE emprestimo_id = e_emprestimoID;
END $$

DELIMITER ;

CALL AtualizarDataEmprestimo(6, '2024-12-26');

DROP PROCEDURE IF EXISTS AtualizarDataEmprestimo;