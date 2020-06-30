SELECT
	REVERSE(SUBSTR(phone_number, 2)) as `rebmunenohp`
FROM distrib
	WHERE phone_number REGEXP '[^05]'
;
