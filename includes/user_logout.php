<<<<<<< HEAD
<?php
/**
 * Created by PhpStorm.
 * User: softi
 * Date: 05.02.2017
 * Time: 13:42
 */

require_once "session_check.php";
if (isset($user)) {
    unset($_SESSION["id"]);
    unset($_SESSION["password"]);
    unset($_SESSION["login"]);
    unset($user);
    header("Location: /login");
    exit();
=======
<?php
/**
 * Created by PhpStorm.
 * User: softi
 * Date: 05.02.2017
 * Time: 13:42
 */

require_once "session_check.php";
if (isset($user)) {
    unset($_SESSION["id"]);
    unset($_SESSION["password"]);
    unset($_SESSION["login"]);
    unset($user);
    header("Location: /login");
    exit();
>>>>>>> 4126c56e1ace765b831a73277da04976317ffc7c
}