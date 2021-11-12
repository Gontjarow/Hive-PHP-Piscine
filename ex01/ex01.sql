CREATE TABLE IF NOT EXISTS `ft_table` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`login` VARCHAR(8) DEFAULT 'toto',
	`group` ENUM('other', 'student', 'staff') NOT NULL,
	`creation_date` DATE DEFAULT (CURRENT_DATE),
	PRIMARY KEY (`id`)
);
