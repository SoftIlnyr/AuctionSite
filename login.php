<?php

/**
 * Created by PhpStorm.
 * User: softi
 * Date: 04.02.2017
 * Time: 17:45
 */

require_once "includes/session_check.php";
if (isset($user)) {
    header("Location: hello.php");
    exit();
}
?>

<h2>Login</h2>
<form action="includes/user_login.php" method="post">
    <label for="username">
        <p>Email: <input type="text" name="email"/></p>
    </label>

    <label for="password">
        <p>Password: <input type="password" name="password"></p>
    </label>
    <label for="button">
        <input type="submit" value="Вход">
    </label>

</form>
<p><a href="registration.php">Registration</a></p>
