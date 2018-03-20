<?php
/**
 * Created by PhpStorm.
 * User: MSi
 * Date: 2018-03-20
 * Time: 11:23 AM
 */

$con = mysqli_connect("localhost", "arn", "123", "users");

session_start();
$get_user = $_SESSION['logged in'];

$query = mysqli_query($con, "SELECT login from user where login='$get_user'");
$row = mysqli_fetch_assoc($query);
$login_session = $row['login'];
if(!isset($login_session))
{
    mysqli_close($con);
    header("Location:Index.php");
}

mysqli_close($con);
?>

<html>
That's gonna be a fully functional edit page soon...
</html>