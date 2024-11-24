DELIMITER $$

CREATE PROCEDURE NumeroLivrosEmprestados()
BEGIN
	SELECT COUNT(emprestimo_id)
    FROM emprestimos;
END $$

DELIMITER ;

CALL NumeroLivrosEmprestados();

DROP PROCEDURE IF EXISTS NumeroLivrosEmprestados;