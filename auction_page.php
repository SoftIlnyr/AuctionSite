<?php
/**
 * Created by PhpStorm.
 * User: softi
 * Date: 11.02.2017
 * Time: 14:40
 */

include_once "includes/session_check.php";

if (isset($user)) {

    if (isset($_GET["auction_id"])) {
        $stmt = $mysqli->prepare("select * from auctions where id=?");
        $stmt->bind_param('i', $_GET["auction_id"]);
        $stmt->execute();
        $result = $stmt->get_result();
        $auction = $result->fetch_array();
        $stmt->close();
    }

    if (isset($_POST["respond"])) {
        $query = $mysqli->prepare("insert into user_auction(user_id, auction_id) VALUES (?, ?);");
        $query->bind_param('ii', $user['id'], $auction['id']);
        $query->execute();
        $query->close();
        header("Location: /home");
        exit();
    }
} else {
    header("Location: /login");
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Auction</title>
</head>
<body>
<h2><?= $auction['scope_name'] ?></h2>

<p>Date: from <?= $auction['date_beg'] ?> to <?= $auction['date_end']; ?></p>
<p>Price: from <?= $auction['price_beg'] ?> to <?= $auction['price_end']; ?></p>
<p>Description: <?= $auction['description'];?></p>
<?php if ($auction['user_id'] != $user['id']) : ?>
    <form action="/auctions/<?= $auction['id'] ?>" method="post">
        <input type="submit" name="respond" value="Send">
    </form>
<?php endif; ?>
</body>
</html>
