<?php
/**
 * Created by PhpStorm.
 * User: softi
 * Date: 04.02.2017
 * Time: 17:49
 */

session_start();

require_once "connection.php";

$login_info = array();

if ($_POST["username"]) {
    $username = $_POST["username"];
    $username = htmlspecialchars($username);
    $username = trim($username);
    $stmt = $mysqli->prepare("select * from users where username=?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_array();
    $stmt->close();
    print_r($user);
    if ($user) {
        if ($_POST["password"]) {
            $password = $_POST["password"];
            $password = htmlspecialchars($password);
            $password = trim($password);
            if (password_verify($password, $user["password"])) {
                $_SESSION['login'] = $username;
                $_SESSION['id'] = $user['id'];
                header("Location: ../hello.php");
            } else {
                echo "Неправильный пароль";
            }
        } else {
            echo "Пустой пароль";
        }

    } else {
        echo "нет такого пользователя";
    }
}