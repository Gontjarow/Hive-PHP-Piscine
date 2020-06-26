<?php
	echo "==== POST BEGIN ====\n";
	print_r($_POST);
	echo "====  POST END  ====\n";
	print_r($_SERVER);
	echo "===  SERVER END  ===\n";

	$private_file = "/private/passwd";
	$user_array;

	function sanitize_input($data): string
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	function insert_value($key): string
	{
		$value = $_SESSION[$key] ?? "";

		if ($value)
			return " value=\"{$value}\"";
	}


	if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["submit"] == "OK")
	{
		$user = sanitize_input($_POST["login"]);
		$pass = sanitize_input($_POST["passwd"]);

		if (!$pass || !$user) exit;

		$pass = hash("whirlpool", $pass);

		if (file_exists($private_file))
		{
			$private_content = file_get_contents($private_file);
			if ($private_content)
			{
				$private_plain = unserialize($private_content);
				echo "=== PRIVATE BEGIN ===\n";
				print_r($private_plain);
				echo "===  PRIVATE END  ===\n";
			}
		}
		else // Nothing serialized yet... Guaranteed new user.
		{
			echo "PRIVATE DIDN'T EXIST", "\n";
			$entry = ["login" => $user, "passwd" => $pass];
			echo "=== ENTRY BEGIN ===\n";
			print_r($entry);
			echo "===  ENTRY END  ===\n";
			$user_array[] = $entry;
			$user_array_serial = serialize($user_array);
			echo "WRITING... ", var_dump(file_put_contents($private_file, $user_array_serial, FILE_APPEND)), "\n";
		}

		echo "=== USER_ARRAY BEGIN ===\n";
		print_r($user_array);
		echo "===  USER_ARRAY END  ===\n";
	}

// hash(), file_get_contents(), file_put_contents(),
// serialize(), unserialize(), file_exists(), mkdir()
?>