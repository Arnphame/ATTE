<?php
session_start();
if(empty($_SESSION['error']))
    $errMsg = "";
else
    $errMsg = $_SESSION['error'];
?>
<html>
<pre>
<form method="post" action="signup.php">
    <input id="login" name="login" type="text">
    <label>User name: </label>
    <input id="pass" name="pass" type="password">
    <label>Password: </label>
    <input id="pass2" name="pass2" type="password">
    <label>Retype password: </label>
    <input name="submit" type="submit" value="Sign Up">
    <span style="color: #FF0000"> <?php echo $errMsg?></span>
</form>
</pre>
</html>
<html>
<a href="Index.php">Back to login page </a>
</html>