<?php

echo "<pre>";
session_start();
$con = mysqli_connect("localhost", "arn", "123", "users");

$login = $_POST['login'];
$pass = $_POST['pass'];
$pass2 = $_POST['pass2'];

$check = mysqli_query($con, "SELECT login FROM user WHERE login='$login'");
$rows = mysqli_num_rows($check);

var_dump($rows);

if ($rows == 0)
{
    if ($pass != $pass2) {
        $_SESSION['error'] = "Passwords do not match";
        header("Location:register.php");
    }
    else if($pass == "" || $pass2 == "")
    {
        $_SESSION['error'] = "Enter your password";
        header("Location:register.php");
    }
    else
    {
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
        $insert = mysqli_query($con, "INSERT INTO user (login, password) VALUES ('$login','$hashed_password')");
        var_dump($hashed_password);
        echo "Your registration is complete.";
    }
}
else
{
    $_SESSION['error'] = "Username is already taken";
    header("Location:register.php");
}
?>

<html>
<a href="Index.php">Back to login page </a>
</html>