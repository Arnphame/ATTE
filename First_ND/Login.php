<?php

include 'User.php';

echo "<pre>";
session_start();
$login = $_POST['login'];
$pass = $_POST['pass'];

$con = mysqli_connect("localhost", "arn", "123", "users");

$query = mysqli_query($con, "SELECT * FROM user WHERE login='$login'");
$row = mysqli_fetch_assoc($query);
$check = password_verify($pass, $row['password']);

if ($row['login'] == $login && $check) {
    $_SESSION['logged in']=$login;
    header("Location:Profile.php");
}
else {
    if (empty($login))
        $_SESSION['error'] = "Please enter your Username";
    else if ($row['login'] != $login )
        $_SESSION['error'] = "Username is invalid";
    else
        $_SESSION['error'] = "Password is incorrect";


    header("Location:Index.php");
}
mysqli_close($con);
?>
