<?php

$con = mysqli_connect("localhost", "arn", "123", "users");

$login = $_GET['login'];
$pass = $_GET['pass'];
$pass2 = $_GET['pass2'];

$check = mysqli_query($con, "SELECT login FROM user WHERE login='$login'");
$rows = mysqli_num_rows($check);


if ($rows == 0)
{
    if ($pass != $pass2)
        header("Location:register.php");
    else
    {
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
        $insert = mysqli_query($con, "INSERT INTO user (login, password) VALUES ('$login','$hashed_password')");
        ?> 
        <html> 
            <link rel="stylesheet" type="text/css" href="/styles.css">
            <link href='https://fonts.googleapis.com/css?family=Amaranth' rel='stylesheet'>
            <header>Your registration is complete.</header> 
        </html> <?php
    }
} 
else
{
    header("Location:register.php");
}
?>
<html>
<<<<<<< 13613a135fce884aa39d0bfd3af71a057a8bd216
    <head>
        <link rel="stylesheet" type="text/css" href="/styles.css">
        <link href='https://fonts.googleapis.com/css?family=Amaranth' rel='stylesheet'>
    </head>
    <a class="signup" href="Index.php">Back to login page</a>
</html>
