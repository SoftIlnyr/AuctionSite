<?php
/**
 * Created by PhpStorm.
 * User: softi
 * Date: 06.02.2017
 * Time: 0:13
 */

include_once "includes/session_check.php";

if (!isset($user)) {
    header("Location: /signin");
    exit();
} else {
    if (isset($_GET["user_id"])) {

        $stmt = $mysqli->prepare("select * from users where id=?");
        $stmt->bind_param('i', $_GET["user_id"]);
        $stmt->execute();
        $result = $stmt->get_result();
        $user_profile = $result->fetch_array();
        $stmt->close();
    }
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
<?php foreach ($user_profile as $key => $value) : ?>
    <p><?php echo "$key: $value" ?></p>
<?php endforeach; ?>

</body>
</html>
