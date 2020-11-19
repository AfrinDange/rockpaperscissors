<?php 
	$salt = 'XyZzy12*_';
    $stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1'; //password php123
	$error = "";
	if(isset($_POST['who']) && isset($_POST['pass'])) {
		if(strlen($_POST['who']) < 1 || strlen($_POST['pass']) < 1) {
			$error = "User name and password are required";
		} else {
			$hashpswd = hash('md5', $salt.$_POST['pass']);
			if( $hashpswd == $stored_hash ) {
				header("Location: game.php?name=".urlencode($_POST['who']));
				return;
			} else {
				$error = "Incorrect password";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Afrin Dange</title>
</head>
<body style="padding: 30px;">
	<h1>Please Log In</h1>
	<p style="color: red;"><?php echo $error; ?></p>
	<form method="POST">
		<label for="username">User Name</label>
		<input type="text" id="username" name="who">
		<br>
		<label for="password">Password</label>
		<input type="password" id="password" name="pass">
		<br>
		<input type="submit" value="Log In">
	</form>
</body>
</html>