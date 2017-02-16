<?php
/**
 * Created by PhpStorm.
 * User: softi
 * Date: 02.02.2017
 * Time: 21:27
 */


require_once "includes/session_check.php";
?>

<h2>New Scope</h2>
<form action="includes/scope_save.php" method="post">
    <label for="scope_name">
        <p>Scope: <input type="text" name="scope_name"/></p>
    </label>
    <label for="experience">
        <p>Experience: <input type="text" name="experience"/></p>
    </label>

    <label for="description">
        <p>Description: <textarea name="description"></textarea></p>
    </label>

    <label for="button">
        <input type="submit" value="Save">
    </label>

</form>
<p><a href="login.php">Login</a></p>
