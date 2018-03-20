<?php
/**
 * Created by PhpStorm.
 * User: arnas
 * Date: 18.3.18
 * Time: 14.46
 */

if(isset($_SESSION['logged in']))
{
    header("location: Profile.php");
}

?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="Styles/styles.css">
		<link href='https://fonts.googleapis.com/css?family=Amaranth' rel='stylesheet'>
	</head>
	<body>
		<header>A.T.T.E.</br> Semester Project</header>
		<div id="container">
			<form method="get" action="Login.php">
				<label for="login">Username:</label>
			    <input id="login" name="login" type="text"></br>
			    <label for="pass">Password:</label>
			    <input id="pass" name="pass" type="password">
			    <div id="lower">
			    	<input name="submit" type="submit" value="Login">
			    </div>
			</form>
			<a class="reg" href="register.php">Register</a>
		</div>
	</body>
</html>
