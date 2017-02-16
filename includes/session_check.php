<?php
/**
 * Created by PhpStorm.
 * User: softi
 * Date: 05.02.2017
 * Time: 13:31
 */

session_start();
require_once "connection.php";

if (isset($_SESSION["id"])) {
    $stmt = $mysqli->prepare("select * from users where id=?");
    $stmt->bind_param('i', $_SESSION['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_array();
    $stmt->close();
    if (!($user["password"] == $_SESSION["password"])) {
        unset($user);
//        echo "Hello, ". $user["username"];
    }
}