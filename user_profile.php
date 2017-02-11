<?php
/**
 * Created by PhpStorm.
 * User: softi
 * Date: 06.02.2017
 * Time: 0:13
 */

include_once "includes/session_check.php";

if (!isset($user)) {
    header("Location: login.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
<?php foreach ($user as $key => $value) : ?>
    <p><?php echo "$key: $value" ?></p>
<?php endforeach; ?>

</body>
</html>
