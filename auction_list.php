<?php
/**
 * Created by PhpStorm.
 * User: softi
 * Date: 11.02.2017
 * Time: 13:38
 */

include_once "includes/session_check.php";
//include_once "includes/user_scope.php"

if (isset($user)) {
    $stmt = $mysqli->prepare("select * from auction");
    $stmt->execute();
    $result = $stmt->get_result();
    foreach ($result as $res) {
        $auctions[] = $res;
//        $scopes[] = $res->fetch_array();
    }
//    $scopes = $result->fetch_array();
    $stmt->close();
} else {
    header("Location: login.php");
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
    <title>Auctions</title>
</head>
<body>
<h2>Auctions</h2>

<?php if (isset($auctions)): ?>
    <?php foreach ($auctions as $auction): ?>
        <h3><a href="/auctions/<?=$auction['id']?>"><?= $auction['scope_name'] ?></a></h3>
        <p>Date: from <?= $auction['date_beg'] ?> to <?= $auction['date_end']; ?></p>
        <p>Price: from <?= $auction['price_beg'] ?> to <?= $auction['price_end']; ?></p>
    <?php endforeach; ?>
<?php endif; ?>

</body>
</html>
