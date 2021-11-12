SELECT
	floor_number as `floor`,
	nb_seats / floor_number as `seats`
FROM cinema
	ORDER BY `floor` ASC, `seats` DESC
;
