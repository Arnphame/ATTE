<html>
<pre>
<form method="get" action="signup.php">
    <input id="login" name="login" type="text">
    <label>User name: </label>
    <input id="pass" name="pass" type="password">
    <label>Password: </label>
    <input id="pass2" name="pass2" type="password">
    <label>Retype password: </label>

    <input type="radio" name="gender" value="male" checked> Male<br>
    <input type="radio" name="gender" value="female"> Female<br>
    <label>Choose gender:</label>

    <input type="text" name="age">
    <label>Enter year of birth:<br></label>

    <select name="transport">
    <option value="car">car</option>
    <option value="motorcycle">motorcycle</option>
    <option value="bike">bike</option>
    <option value="legs">only my legs</option>
    </select>
    <label>Choose transport:<br></label>

    <input name="submit" type="submit" value="Sign Up">
</form>
</pre>
</html>
