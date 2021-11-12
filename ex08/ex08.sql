SELECT `last_name`, `first_name`, DATE(`birthdate`) FROM `user_card`
	WHERE YEAR(`user_card`.`birthdate`) = 1989
	ORDER BY `last_name` ASC
;
