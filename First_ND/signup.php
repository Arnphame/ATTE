<?php

echo "<pre>";
$con = mysqli_connect("localhost", "arn", "123", "users");

$login = $_GET['login'];
$pass = $_GET['pass'];
$pass2 = $_GET['pass2'];
$gender = $_GET['gender'];
$age = $_GET['age'];
$transport = $_GET['transport'];

$check = mysqli_query($con, "SELECT login FROM user WHERE login='$login'");
$rows = mysqli_num_rows($check);

if ($rows == 0)
{
    if ($pass != $pass2)
        header("Location:register.php");
    else
    {
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
        $insert = mysqli_query($con, "INSERT INTO user (login, password, gender, age, transport) VALUES ('$login','$hashed_password','$gender','$age','$transport')");
        echo "Your registration is complete.";
    }
}
else
{
    header("Location:register.php");
}
?>
<html>
<a href="Index.php">Back to login page</a>
</html>
