<?php
date_default_timezone_set('America/Toronto');
$time = date('hi');
if ($time > 1500 && $time < 1700)
{
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$name = test_input($_POST["name"]);
		$email = test_input($_POST["email"]);
		$phone = test_input($_POST["phone"]);
	}
}
else
{
	echo 'We are not currently taking any orders! Sorry!';
}

function check_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>