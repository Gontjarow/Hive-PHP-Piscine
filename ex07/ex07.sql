SELECT `title`,`summary` FROM `film`
	WHERE `film`.`title` REGEXP '42'
	OR `film`.`summary` REGEXP '42'
	ORDER BY `film`.`duration` ASC
;
