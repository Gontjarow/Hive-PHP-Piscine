INSERT INTO `ft_table` (`login`,`group`,`creation_date`)
SELECT `last_name`,'other',`birthdate` FROM `user_card`
	WHERE `last_name` REGEXP 'a'
	AND LENGTH(`last_name`) <= 8
	ORDER BY `last_name`
	LIMIT 0,10
;
