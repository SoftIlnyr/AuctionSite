<?php

/**
 * Created by PhpStorm.
 * User: softi
 * Date: 04.02.2017
 * Time: 17:45
 */

session_start();
?>

<h2>Login</h2>
<form action="includes/user_login.php" method="post">
    <label for="username">
        <p>Username: <input type="text" name="username"/></p>
    </label>

    <label for="password">
        <p>Password: <input type="password" name="password"></p>
    </label>
    <label for="button">
        <input type="submit" value="Вход">
    </label>

</form>
<p><a href="registration.php">Registration</a></p>
