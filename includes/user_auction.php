<<<<<<< HEAD
<?php
/**
 * Created by PhpStorm.
 * User: softi
 * Date: 11.02.2017
 * Time: 12:03
 */
if (isset($user)) {
    require_once "connection.php";
//    $stmt = $mysqli->prepare("select id from user_auction where user_id=?");
    $stmt = $mysqli->prepare("select * from auctions where id in (select auction_id from user_auction where user_id=?)");
    $stmt->bind_param('i', $user['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    foreach ($result as $res) {
        $auctions[] = $res;
//        $scopes[] = $res->fetch_array();
    }
//    $scopes = $result->fetch_array();
    $stmt->close();
}
=======
<?php
/**
 * Created by PhpStorm.
 * User: softi
 * Date: 11.02.2017
 * Time: 12:03
 */
if (isset($user)) {
    require_once "connection.php";
//    $stmt = $mysqli->prepare("select id from user_auction where user_id=?");
    $stmt = $mysqli->prepare("select * from auctions where id in (select auction_id from user_auction where user_id=?)");
    $stmt->bind_param('i', $user['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    foreach ($result as $res) {
        $auctions[] = $res;
//        $scopes[] = $res->fetch_array();
    }
//    $scopes = $result->fetch_array();
    $stmt->close();
}
>>>>>>> 4126c56e1ace765b831a73277da04976317ffc7c
