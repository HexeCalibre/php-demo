<?php
session_start();

function redirect($url)
{
    header('Location: ' . $url);
    die();
}


if (isset($_POST['loginName']) and isset($_POST['password'])) {
    require_once("includes/db.inc.php");

    $login_name = $_POST['loginName'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE login_name = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $login_name);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($password == $user["password"]) {
        //successfully validated
        echo "<br>You are authenticated";
        $_SESSION["login_authenticated"] = true;
        $_SESSION["login_name"] = $user["login_name"];
        $_SESSION["login_full_name"] = $user["first_name"] . " " . $user["last_name"];
    } else {
        echo "<br>You are not authenticated";
        $_SESSION["login_authenticated"] = false;
        $_SESSION["login_full_name"] = "";
    }

    $stmt->close();
    $connection->close();

    redirect("welcome.php");
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>PHP POST/GET</title>
</head>

<body>
    <div class="container-fluid">
        <div class="back">
            <div class="div-center">
                <div class="content">
                    <h3>Login</h3>
                    <hr />
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="loginNameInput" class="form-label">Login Name</label>
                            <input type="text" class="form-control" id="loginNameInput" placeholder="Login Name" name="loginName">
                        </div>
                        <div class="form-group">
                            <label for="passwordInput" class="form-label">Password</label>
                            <input type="password" class="form-control" id="passwordInput" placeholder="Password" name="password">
                        </div>
                        <hr />
                        <button type="submit" class="btn btn-primary">Login</button>
                        <a href="sign_up.php" class="btn btn-primary">Sign Up</a>
                    </form>
                </div>
            </div>
        </div>
        <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->
</body>

</html>