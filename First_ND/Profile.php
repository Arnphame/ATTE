<?php
/**
 * Created by PhpStorm.
 * User: arnas
 * Date: 18.3.18
 * Time: 16.21
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
<div>
    Welcome <?php echo $login_session; ?>
    <a href="logout.php">Log Out</a>
</div>

</html>
