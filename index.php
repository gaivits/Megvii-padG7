<?php 
	require 'logged.php';
	$a = login('192.168.1.10','80','admin@1234');
?>

<!DOCTYPE html>
<html>
<style type="text/css">
	body{
		background-image: url("Megback.png");
		position: absolute;
		background-repeat: no-repeat;
		background-size: cover;
	}
</style>
<head>
	<title>HOME</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<body>
	<img src="https://i2.wp.com/cyn.co.th/wp-content/uploads/2020/07/cropped-CYNLogo-01-1-e1543208818881-1-1.png">
	<nav class="nav-header-main">
			
			<div class="header-login">
				<form action="auth.php" method="post">
					<center>
					<input type="text" name="session_id" placeholder="session_id">
					<br>
					<input type="text" name="password" placeholder="password">
					<br>
					<button type="submit" name="logout">Login</button>
				</form>
					
				<form action="" method="post">
					<button type="submit" name="logout">Logout</button>
					
				</form>
				</center>
			</div>
		</nav>
</header>
</body>
</html>


