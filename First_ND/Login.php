<?php

include 'User.php';

echo "<pre>";
session_start();
$login = $_GET['login'];
$pass = $_GET['pass'];

$con = mysqli_connect("localhost", "arn", "123", "users");

//$check_passwords = mysqli_query($con, "SELECT password FROM user WHERE login='$login'");
//$pw = mysqli_fetch_assoc($check_passwords);


//$check = password_verify($pass, $pw['password']);

$query = mysqli_query($con, "SELECT * FROM user WHERE login='$login'");
$row = mysqli_fetch_assoc($query);
$check = password_verify($pass, $row['password']);


if ($row['login'] == $login && $check) {
    $_SESSION['logged in']=$login;
    header("Location:Profile.php");
}
else
{
    header("Location:Index.php");
}
mysqli_close($con);
?>
