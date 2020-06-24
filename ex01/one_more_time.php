<?php
	if ($argc != 2)
		exit(0);

	$days = array(1 =>
		"lundi",
		"mardi",
		"mercredi",
		"jeudi",
		"vendredi",
		"samedi",
		"dimanche"
	);

	$months = array(1 =>
		"janvier",
		"février",
		"mars",
		"avril",
		"mai",
		"juin",
		"juillet",
		"aout",
		"septembre",
		"octobre",
		"novembre",
		"décembre"
	);

	$string		= strtolower($argv[1]);
	$day_name	= preg_split("/".	" \d{1,2} [a-zé]+.* \d{4} \d{2}:\d{2}:\d{2}"		."/", $string);
	$day		= preg_split("/".	"^[a-z]+ | [a-zé]+.* \d{4} \d{2}:\d{2}:\d{2}"		."/", $string);
	$month_name	= preg_split("/".	"^[a-z]+ \d{1,2} | \d{4} \d{2}:\d{2}:\d{2}"			."/", $string);
	$year		= preg_split("/".	"^[a-z]+ \d{1,2} [a-zé]+ | (\d{2}):(\d{2}):(\d{2})"	."/", $string);
	$times		= preg_split("/".	"^(.*?)(?=(\d{2}):(\d{2}):(\d{2}))"					."/", $string);

	$day_name	= implode("", $day_name);
	$day		= implode("", $day);
	$month_name	= implode("", $month_name);
	$year		= implode("", $year);
	$times		= implode("", $times);
	$time		= array_values(explode(":", $times));

	// echo "$day_name, $day, $month_name, $year, $time[0],$time[1],$time[2]\n";

	$month = array_search($month_name, $months);
	$day = array_search($day_name, $days);

	if ($month != FALSE && $day != FALSE &&
		ctype_digit($day) &&
		ctype_digit($year) &&
		ctype_digit($time[0]) &&
		ctype_digit($time[1]) &&
		ctype_digit($time[2]))
	{
		$unix_time = mktime($time[0], $time[1], $time[2], $month, $day, $year) - 3600;
		echo "Seconds: $unix_time\n";
	}
	else
	{
		echo "Wrong Format\n";
	}

?>
