<?php

/**
 * Created by PhpStorm.
 * User: softi
 * Date: 30.01.2017
 * Time: 22:36
 */

include_once "includes/session_check.php";
include_once "includes/user_scope.php";
include_once "includes/user_auction.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hello</title>
</head>
<body>
<?php if (isset($user)): ?>
    <p>Hello, <?= $user["username"] ?></p>
    <p><a href="includes/user_logout.php">Logout</a></p>
    <p><a href="scope_add.php">Add a scope</a></p>
    <?php if (isset($scopes)): ?>
        <p><a href="auction_add.php">Add an auction</a></p>
        <p><a href="/auctions">Search auctions</a></p>
        <?php foreach ($scopes as $scope): ?>
            <h3><?= $scope['scope_name'] ?></h3>
            <p>Experience: <?= $scope['experience'] ?></p>
        <?php endforeach; ?>

        <?php if (isset($auctions)): ?>
            <?php foreach ($auctions as $auction): ?>
                <h2><?= $auction['scope_name'] ?></h2>

                <p>Date: from <?= $auction['date_beg'] ?> to <?= $auction['date_end']; ?></p>
                <p>Price: from <?= $auction['price_beg'] ?> to <?= $auction['price_end']; ?></p>
                <p>Description: <?= $auction['description']; ?></p>
            <?php endforeach; ?>
        <?php endif; ?>

    <?php endif; ?>
<?php else: ?>
    <p>Hello, guest</p>
    <p><a href="/signin">Sign In</a></p>
<?php endif; ?>

</body>
</html>

