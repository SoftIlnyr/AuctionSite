<?php

/**
 * Created by PhpStorm.
 * User: softi
 * Date: 30.01.2017
 * Time: 22:36
 */

include_once "includes/session_check.php";
include_once "includes/user_scope.php"
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
    <?php if ($scopes): ?>
        <?php foreach ($scopes as $scope):?>
            <h3><?=$scope['scope_name']?></h3>
            <p>Experience: <?=$scope['experience']?></p>
        <?php endforeach;?>

    <?php endif; ?>
<?php else: ?>
    <p>Hello, guest</p>
    <p><a href="login.php">Login</a></p>
<?php endif; ?>

</body>
</html>

