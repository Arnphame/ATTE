<?php
/**
 * Created by PhpStorm.
 * User: arnas
 * Date: 18.3.18
 * Time: 14.46
 */

//include ('Login.php');

if(isset($_SESSION['logged in']))
{
    header("location: Profile.php");
}

?>

<html>
<form method="get" action="Login.php">
    <input id="login" name="login" type="text">
    <label>User name: </label>
    <input id="pass" name="pass" type="password">
    <label>Password: </label>
    <input name="submit" type="submit" value="Login">
</form>
<a href="register.php">New user? Click here to register</a>
</html>
