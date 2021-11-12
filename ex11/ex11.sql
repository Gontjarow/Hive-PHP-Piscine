SELECT `last_name` as `NAME`, `first_name`, `price` FROM `user_card`, `subscription`
	WHERE `subscription`.`price` > 42
	ORDER BY `last_name` ASC, `first_name` ASC
;
