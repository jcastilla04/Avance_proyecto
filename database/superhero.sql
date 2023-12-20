DELIMITER $$
CREATE PROCEDURE spu_heroes_grupos()
BEGIN
	SELECT
    ALG.alignment AS Bando,
    COUNT(SH.id) AS heroes
	FROM 
    superhero SH
    LEFT JOIN 
		alignment ALG ON ALG.id = SH.alignment_id
	GROUP BY
    ALG.id, ALG.alignment;
END $$


CALL spu_heroes_grupos()


DELIMITER $$
CREATE PROCEDURE spu_alineacion_publisher(IN _publisher VARCHAR(4))
BEGIN
	SELECT
    ALG.alignment AS Bando,
    COUNT(SH.id) AS heroes
	FROM 
    superhero SH
    LEFT JOIN 
		alignment ALG ON ALG.id = SH.alignment_id
	WHERE 
	publisher_id = _publisher
	GROUP BY
    ALG.id, ALG.alignment;
END $$

CALL spu_alineacion_publisher (3)


-- PROCEDIMIENTO ALMACENADO DE LISTAR
DELIMITER $$
CREATE PROCEDURE spu_superheropublisher_listar()
BEGIN 
	SELECT 
		id,
        publisher_name
        FROM superhero.publisher
        ORDER BY publisher_name;
END $$

-- PROCEDIMIENTO ALMACENADO DE BUSQUEDA
DELIMITER $$
CREATE PROCEDURE spu_superpublisher_busqueda(
IN _publisher_id VARCHAR(50)
)
BEGIN
	SELECT 
	pu.id,
	pu.superhero_name,
	pu.full_name,
	g.gender,
	r.race
	
	FROM superhero pu
	INNER JOIN gender g ON g.id = pu.gender_id
	INNER JOIN race r ON r.id = pu.race_id
	WHERE publisher_id = _publisher_id;
END$$

