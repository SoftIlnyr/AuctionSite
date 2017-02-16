<?php
/**
 * Created by PhpStorm.
 * User: softi
 * Date: 02.02.2017
 * Time: 21:27
 */


require_once "includes/session_check.php";

if (!isset($user)) {
    header("Location: /signin");
    exit();
}
?>

<h2>New Auction</h2>
<form action="includes/auction_save.php" method="post">
    <label for="scope_name">
        <p>Scope: <input type="text" name="scope_name"/></p>
    </label>
    <label for="date_beg">
        <p>Begin date: <input type="text" name="date_beg"/></p>
    </label>
    <label for="date_end">
        <p>End date: <input type="text" name="date_end"/></p>
    </label>
    <label for="price_beg">
        <p>Minimal price: <input type="text" name="price_beg"/></p>
    </label>
    <label for="price_end">
        <p>Maximum price: <input type="text" name="price_end"/></p>
    </label>

    <label for="description">
        <p>Description: <textarea name="description"></textarea></p>
    </label>

    <label for="button">
        <input type="submit" value="Save">
    </label>

</form>
