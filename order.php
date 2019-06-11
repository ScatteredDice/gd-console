<!DOCTYPE HTML>
<html>
<head>
	<style>
		.error {color: #FF0000;}
	</style>
</head>
<body>
<?php
$success = true;
$nameErr = $emailErr = $phoneErr = "";
$name = $email = $phone = "";
date_default_timezone_set('America/Toronto');
$time = 1600;
if ($time > 1500 && $time < 1700)
{
	?>
	<h2>Fresh Cut Kale Orders</h2> 
	<p><span class="error">* required field</span></p>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		Name: <input type="text" name="name"><br>
		<span class="error">*<?php echo $nameErr;?></span>
		<br><br>
		E-mail: <input type="text" name="email"><br>
		<span class="error">*<?php echo $emailErr;?></span>
		<br><br>
		Phone: <input type="text" name="phone"><br>
		<span class="error">*<?php echo $phoneErr;?></span>
		<br><br>
		<input type="submit">
	</form>
	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		if(empty($_POST["name"]))
		{
			$nameErr = $nameErr . "Name is required";
			$success = false;
		}
		else
		{
			$name = check_input($_POST["name"]);
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
			{
				$nameErr = "Only letters and white space allowed"; 
				$success = false;
			}
		}
		if(empty($_POST["email"]))
		{
			$emailErr = "Email is required";
			$success = false;
			// check if e-mail address is well-formed
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
			{
				$emailErr = "Invalid email format"; 
				$success = false;
			}
		}
		else
		{
			$email = check_input($_POST["email"]);
		}
		if(empty($_POST["phone"]))
		{
			$phoneErr = "A phone number is required";
			$success = false;
		}
		else
		{
			$phone = check_input($_POST["phone"]);
		}
		//redirect to success page if form correctlty formed
		if($success)
		{
			header("Location: my_order.php");
		}
	}
}
else
{
	echo 'We are not currently taking any orders! Sorry!';
	$success = false;
}

function check_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>
</body>
</html>