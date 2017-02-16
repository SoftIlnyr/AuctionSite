<?php
/**
 * Created by PhpStorm.
 * User: softi
 * Date: 11.02.2017
 * Time: 12:03
 */
if (isset($user)) {
    require_once "connection.php";
    $stmt = $mysqli->prepare("select * from user_scope where user_id=?");
    $stmt->bind_param('i', $user['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    foreach ($result as $res) {
        $scopes[] = $res;
//        $scopes[] = $res->fetch_array();
    }
//    $scopes = $result->fetch_array();
    $stmt->close();
}
