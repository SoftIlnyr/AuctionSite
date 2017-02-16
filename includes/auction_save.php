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
    $auction_info = array();

    if ($_POST["scope_name"]) {
        $scope_name = $_POST["scope_name"];
        $scope_name = htmlspecialchars($scope_name);
        $auction_info["scope_name"] = $scope_name;
    }

    if ($_POST["date_beg"]) {
        $date_beg = $_POST["date_beg"];
        $date_beg = htmlspecialchars($date_beg);
        if (strlen($date_beg) > 0) {
            $date_beg = date_create_from_format('d.m.Y', $date_beg)->format('Y-m-d H:i:s');
//            print_r($date_beg);
            $auction_info["date_beg"] = $date_beg;
        }
    }

    if ($_POST["date_end"]) {
        $date_end = $_POST["date_end"];
        $date_end = htmlspecialchars($date_end);
        if (strlen($date_end) > 0) {
            $date_end = date_create_from_format('d.m.Y', $date_end)->format('Y-m-d H:i:s');
            $auction_info["date_end"] = $date_end;
        }
    }

    if ($_POST["price_beg"]) {
        $price_beg = $_POST["price_beg"];
        $price_beg = htmlspecialchars($price_beg);
        if (strlen($price_beg) > 0) {
            $auction_info["price_beg"] = $price_beg;
        }
    }

    if ($_POST["price_end"]) {
        $price_end = $_POST["price_end"];
        $price_end = htmlspecialchars($price_end);
        if (strlen($price_end) > 0) {
            $auction_info["price_end"] = $price_end;
        }
    }

    if ($_POST["description"]) {
        $description = $_POST["description"];
        $description = htmlspecialchars($description);
        $auction_info["description"] = $description;
    }

    if (isset($auction_info['scope_name'])) {
        $query = $mysqli->prepare("insert into auction(user_id, scope_name, date_beg, date_end, price_beg, price_end, description) VALUES (?, ?, ?, ?, ?, ?, ?);");
        $query->bind_param('isssiis', $user['id'], $auction_info["scope_name"], $auction_info["date_beg"], $auction_info["date_end"],
            $auction_info["price_beg"], $auction_info["price_end"], $auction_info["description"]);
        $query->execute();
        $query->close();
        header("Location: /home");
        exit();
    }
}
