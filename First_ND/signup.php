<?php

echo "<pre>";
$con = mysqli_connect("127.0.0.1", "arn", "123", "users");

$login = $_GET['login'];
$pass = $_GET['pass'];
$pass2 = $_GET['pass2'];

$check = mysqli_query($con, "SELECT login FROM user WHERE login='$login'");
$rows = mysqli_num_rows($check);



var_dump($rows);

if ($rows == 0)
{
    if ($pass != $pass2)
        header("Location:register.php");
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
    header("Location:register.php");
}
?>
<html>
<a href="Index.php">Back to login page</a>
</html>
