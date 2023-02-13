<?php
session_start();

if (isset($_POST['submit'])) {
    require_once("includes/db.inc.php");

    if ($connection->connect_error) {
        die("Connection failed " . $connection->connect_error);
    }

    $login_name = $_SESSION["login_name"];
    $password = $_POST['password'];

    $sql = "UPDATE users SET password = ? WHERE login_name = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ss", $password, $login_name);

    if ($stmt->execute()) {
        echo "Change password successful";
    } else {
        echo "Change password fail";
    }


    $stmt->close();
    $connection->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>

<body>
    <h2>Change Password</h2>
    <form action="" method="POST">
        <p>
            <label>Password</label>
            <input type="password" name="password" required>
        </p>
        <input type="submit" name="submit" value="submit">

    </form>


</body>

</html>