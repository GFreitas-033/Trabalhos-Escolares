DELIMITER $$

CREATE PROCEDURE RegistrarNovoEmprestimo(
	IN l_livroID INT,
    IN e_dtEmprestimo DATE,
    IN e_dtDevolucao DATE,
    IN c_nome VARCHAR(100)
)
BEGIN
	INSERT INTO emprestimos(livro_id,data_emprestimo,data_devolucao,nome_cliente)
	VALUES(l_livroID, e_dtEmprestimo, e_dtDevolucao, c_nome);
END $$

DELIMITER ;

CALL RegistrarNovoEmprestimo(1, '2024-11-23', '2024-12-23', 'Guilherme');

DROP PROCEDURE IF EXISTS RegistrarNovoEmprestimo;