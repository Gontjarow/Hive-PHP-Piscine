SELECT `Title`,`Summary`,`prod_year` FROM `film`
	WHERE `film`.`id_genre` = 25
	ORDER BY `prod_year` DESC
;
