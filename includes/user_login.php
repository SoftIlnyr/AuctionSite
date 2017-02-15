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

if ($_POST["email"]) {
    $email = $_POST["email"];
    $email = htmlspecialchars($email);
    $email = trim($email);
    $stmt = $mysqli->prepare("select * from users where email=?");
    $stmt->bind_param('s', $email);
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
                $_SESSION['id'] = $user['id'];
                $_SESSION['password'] = $user["password"];
                header("Location: /home");
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