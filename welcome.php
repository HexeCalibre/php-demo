<?php
session_start();

if ($_SESSION["login_authenticated"]) {
    echo "<br><h3>You are authenticated</h3><br>";
    echo "<h1>Welcome " . $_SESSION["login_full_name"] . "</h1>";
} else {
    echo "<br><h1>You are not authenticated</h1>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>

<body>

    <a href="change_password.php">Change Password</a>

</body>

</html>