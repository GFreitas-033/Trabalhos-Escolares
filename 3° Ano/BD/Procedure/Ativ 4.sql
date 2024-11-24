DELIMITER $$

CREATE PROCEDURE ExcluirEmprestimo(
	IN e_emprestimoID INT
)
BEGIN
	DELETE FROM emprestimos
    WHERE emprestimo_id = e_emprestimoID;
END $$

DELIMITER ;

CALL ExcluirEmprestimo(6);

DROP PROCEDURE IF EXISTS ExcluirEmprestimo;