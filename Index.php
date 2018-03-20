<?php
/**
 * Created by PhpStorm.
 * User: arnas
 * Date: 18.3.18
 * Time: 14.46
 */
session_start();
//include ('Login.php');

if(isset($_SESSION['logged in']))
{
    header("location: Profile.php");
}
if(empty($_SESSION['error']))
    $errMsg = "";
else
    $errMsg = $_SESSION['error'];

session_destroy();
?>

<html>
<form method="post" action="Login.php">
    <label>User name: </label>
    <input id="login" name="login" type="text">
    <label>Password: </label>
    <input id="pass" name="pass" type="password">
    <input name="submit" type="submit" value="Login"><br>
    <span style="color: #FF0000"> <?php echo $errMsg?></span>
</form>
<a href="register.php">New user? Click here to register</a>
</html>
