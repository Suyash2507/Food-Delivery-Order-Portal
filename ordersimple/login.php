<?php include('server.php')?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	</head>
<body>	
<div class="header">
	<h2>Login</h2>
	</div>
	<form method="post" action="login.php">
	<?php include('errors.php');?>
		<div class="input-group">
		<label>Username</label>
			<input type="text" name="username" placeholder="Enter your username">
			</div>
			<div class="input-group">
			<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" placeholder="Enter your password">
			</div>
			<div class="input-group">
			<button type="submit" name="login" class="login-button">Login</button>
			</div>
			<p>Not Yet a Member?<a href="register.php">Sign up</a></p>
		</form>
</body>
</html>		