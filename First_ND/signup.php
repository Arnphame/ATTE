<?php
<<<<<<< HEAD

=======
>>>>>>> 20f2d7963c7504fafd39241e5284d065e0058737
$con = mysqli_connect("localhost", "arn", "123", "users");

$login = $_GET['login'];
$pass = $_GET['pass'];
$pass2 = $_GET['pass2'];

$check = mysqli_query($con, "SELECT login FROM user WHERE login='$login'");
$rows = mysqli_num_rows($check);

<<<<<<< HEAD

=======
>>>>>>> 20f2d7963c7504fafd39241e5284d065e0058737
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
<<<<<<< HEAD
<<<<<<< HEAD
            <link rel="stylesheet" type="text/css" href="/styles.css">
=======
            <link rel="stylesheet" type="text/css" href="Styles/styles.css">
>>>>>>> 20f2d7963c7504fafd39241e5284d065e0058737
=======
            <link rel="stylesheet" type="text/css" href="Styles/styles.css">
>>>>>>> 13ca003cbf40e4770e4b78bb3b9deb431d5b3a1d
            <link href='https://fonts.googleapis.com/css?family=Amaranth' rel='stylesheet'>
            <header>Your registration is complete.</header> 
        </html> <?php
    }
<<<<<<< HEAD
} 
=======
}
>>>>>>> 20f2d7963c7504fafd39241e5284d065e0058737
else
{
    header("Location:register.php");
}
?>
<html>
<<<<<<< HEAD
<<<<<<< 13613a135fce884aa39d0bfd3af71a057a8bd216
=======
>>>>>>> 20f2d7963c7504fafd39241e5284d065e0058737
    <head>
        <link rel="stylesheet" type="text/css" href="Styles/styles.css">
        <link href='https://fonts.googleapis.com/css?family=Amaranth' rel='stylesheet'>
    </head>
    <a class="signup" href="Index.php">Back to login page</a>
</html>
