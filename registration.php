<?php
/**
 * Created by PhpStorm.
 * User: softi
 * Date: 02.02.2017
 * Time: 21:27
 */


require_once "includes/session_check.php";
if (isset($user)) {
    header("Location: hello.php");
    exit();
}
?>

<h2>Registration</h2>
<form action="includes/user_save.php" method="post">
    <label for="email">
        <p>Email: <input type="email" name="email"/></p>
    </label>
    <label for="username">
        <p>Username: <input type="text" name="username"/></p>
    </label>

    <label for="password">
        <p>Password: <input type="password" name="password"></p>
    </label>

    <label for="password_conf">
        <p>Password confirmation: <input type="password" name="password_conf"></p>
    </label>

    <label for="phone">
        <p>Phone number: <input type="text" name="phone"/></p>
    </label>

    <label for="button">

        <input type="submit" value="Регистрация">
    </label>

</form>
<p><a href="login.php">Login</a></p>
