<?php
/**
 * Created by PhpStorm.
 * User: softi
 * Date: 04.02.2017
 * Time: 16:51
 */

require_once "connection.php";
require_once "session_check.php";

if (isset($user)) {
    $scope_info = array();

    if ($_POST["scope_name"]) {
        $scope_name = $_POST["scope_name"];
        $scope_name = htmlspecialchars($scope_name);
        $scope_info["scope_name"] = $scope_name;
    }

    if ($_POST["experience"]) {
        $experience = $_POST["experience"];
        $experience = htmlspecialchars($experience);
        $scope_info["experience"] = $experience;
    }

    if ($_POST["description"]) {
        $description = $_POST["description"];
        $description = htmlspecialchars($description);
        $scope_info["description"] = $description;
    }

    if (sizeof($scope_info) == 3) {
        $query = $mysqli->prepare("insert into user_scope(user_id, scope_name, experience, description) VALUES (?, ?, ?, ?);");
        $query->bind_param('isis', $user['id'], $scope_info["scope_name"], $scope_info["experience"], $scope_info["description"]);
        $query->execute();
        $query->close();
        header("Location: ../hello.php");
        exit();
    }


}
