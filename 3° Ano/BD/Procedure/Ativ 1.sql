DELIMITER $$

CREATE PROCEDURE ListarLivrosAutor(
	IN a_AutorID INT
)
BEGIN
    SELECT 
        l.titulo
    FROM livros l
    WHERE l.autor_id = a_AutorID;
END $$

DELIMITER ;

CALL ListarLivrosAutor(3);

DROP PROCEDURE IF EXISTS ListarLivrosAutor;