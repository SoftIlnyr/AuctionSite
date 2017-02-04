<?php

/**
 * Created by PhpStorm.
 * User: softi
 * Date: 30.01.2017
 * Time: 22:36
 */

session_start();
include_once "includes/connection.php";

if ($_SESSION['id']) {
    $stmt = $mysqli->prepare("select * from users where id=?");
    $stmt->bind_param('i', $_SESSION['id']);

    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_array();
    $stmt->close();
    if ($user) {
        echo "Hello, ". $user["username"];
    }
} else {
    echo "Hello, guest";
}
