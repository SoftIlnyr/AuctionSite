<<<<<<< HEAD
<?php
/**
 * Created by PhpStorm.
 * User: softi
 * Date: 04.02.2017
 * Time: 16:51
 */

require_once "connection.php";

$req_info = array();

if ($_POST["username"]) {
    $username = $_POST["username"];
    $username = htmlspecialchars($username);
    $username = trim($username);
    $stmt = $mysqli->prepare("select * from users where username=?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $users = $result->fetch_array();
    $stmt->close();
    if (!$users) {
        $req_info["username"] = $username;
    } else {
        echo "Такой пользователь уже есть";
    }
}

if ($_POST["password"] && $_POST["password_conf"]) {
    $password = $_POST["password"];
    $password = htmlspecialchars($password);
    $password = trim($password);
    $password_conf = $_POST["password_conf"];
    $password_conf = htmlspecialchars($password_conf);
    $password_conf = trim($password);

    if ($password == $password_conf) {
        $password_crypt = password_hash($password, PASSWORD_BCRYPT);
        $req_info["password"] = $password_crypt;
    } else {
        echo "Пароли не совпадают";
    }
}

if ($_POST["email"]) {
    $email = $_POST["email"];
    $email = htmlspecialchars($email);
    $email = trim($email);
    $stmt = $mysqli->prepare("select * from users where email=?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $users = $result->fetch_array();
    $stmt->close();

    if (!$users) {
        $req_info["email"] = $email;
    } else {
        echo "Такой email уже используется";
    }
}

if ($_POST["phone"]) {
    $phone = $_POST["phone"];
    $phone = htmlspecialchars($phone);
    $phone = trim($phone);
    $stmt = $mysqli->prepare("select * from users where phone=?");
    $stmt->bind_param('s', $phone);
    $stmt->execute();
    $result = $stmt->get_result();
    $users = $result->fetch_array();
    $stmt->close();

    if (!$users) {
        $req_info["phone"] = $phone;
    } else {
        echo "Такой телефон уже используется";
    }
}

if (sizeof($req_info) == 4) {
    $query = $mysqli->prepare("insert into users(username, password, email, phone) VALUES (?, ?, ?, ?);");
    print_r($query);
    $query->bind_param('ssss', $req_info["username"], $req_info["password"], $req_info["email"], $req_info["phone"]);
    print_r($query);
    $query->execute();
    $query->close();
    header("Location: /login");
    exit();
}

header("Location: /registration");
exit();
=======
<?php
/**
 * Created by PhpStorm.
 * User: softi
 * Date: 04.02.2017
 * Time: 16:51
 */

require_once "connection.php";

$req_info = array();

if ($_POST["username"]) {
    $username = $_POST["username"];
    $username = htmlspecialchars($username);
    $username = trim($username);
    $stmt = $mysqli->prepare("select * from users where username=?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $users = $result->fetch_array();
    $stmt->close();
    if (!$users) {
        $req_info["username"] = $username;
    } else {
        echo "Такой пользователь уже есть";
    }
}

if ($_POST["password"] && $_POST["password_conf"]) {
    $password = $_POST["password"];
    $password = htmlspecialchars($password);
    $password = trim($password);
    $password_conf = $_POST["password_conf"];
    $password_conf = htmlspecialchars($password_conf);
    $password_conf = trim($password);

    if ($password == $password_conf) {
        $password_crypt = password_hash($password, PASSWORD_BCRYPT);
        $req_info["password"] = $password_crypt;
    } else {
        echo "Пароли не совпадают";
    }
}

if ($_POST["email"]) {
    $email = $_POST["email"];
    $email = htmlspecialchars($email);
    $email = trim($email);
    $stmt = $mysqli->prepare("select * from users where email=?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $users = $result->fetch_array();
    $stmt->close();

    if (!$users) {
        $req_info["email"] = $email;
    } else {
        echo "Такой email уже используется";
    }
}

if ($_POST["phone"]) {
    $phone = $_POST["phone"];
    $phone = htmlspecialchars($phone);
    $phone = trim($phone);
    $stmt = $mysqli->prepare("select * from users where phone=?");
    $stmt->bind_param('s', $phone);
    $stmt->execute();
    $result = $stmt->get_result();
    $users = $result->fetch_array();
    $stmt->close();

    if (!$users) {
        $req_info["phone"] = $phone;
    } else {
        echo "Такой телефон уже используется";
    }
}

if (sizeof($req_info) == 4) {
    $query = $mysqli->prepare("insert into users(username, password, email, phone) VALUES (?, ?, ?, ?);");
    print_r($query);
    $query->bind_param('ssss', $req_info["username"], $req_info["password"], $req_info["email"], $req_info["phone"]);
    print_r($query);
    $query->execute();
    $query->close();
    header("Location: /login");
    exit();
}

header("Location: /registration");
exit();
>>>>>>> 4126c56e1ace765b831a73277da04976317ffc7c
