<?php
$host = "localhost";
$user_name = "root";
$password = 'password123!';
$database = "user_administration";
$dsn = "mysql:host=$host;dbname=$database";


try {
    //connection
    $con = new PDO($dsn, $user_name, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);


    echo nl2br("\n------------------Fetch Assoc---------------\n");

    $sql = "SELECT * FROM user LIMIT 10";
    $stmt = $con->query($sql);


    while ($row = $stmt->fetch()) {
        echo $row->first_name . " " . $row->last_name . "<br>";
    }

    echo nl2br("\n------------------Positional Parameter---------------\n");
    $active = true;

    $sql = "SELECT * FROM user WHERE active = ? LIMIT 10";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(1, $active);

    $stmt->execute();
    while ($row = $stmt->fetch()) {
        echo $row->first_name . " " . $row->last_name . "<br>";
    }

    echo nl2br("\n------------------Named Parameter---------------\n");
    $sql = "SELECT * FROM user WHERE active = :active LIMIT 10";
    $stmt = $con->prepare($sql);
    $stmt->bindValue(":active", $active);

    $stmt->execute();
    while ($row = $stmt->fetch()) {
        echo $row->first_name . " " . $row->last_name . "<br>";
    }

    echo nl2br("\n------------------Get Row Count---------------\n");
    echo $stmt->rowCount();


    echo nl2br("\n------------------INSERT---------------\n");

    $first_name = "Juan";
    $last_name = "Dela Cruz";
    $user_name = "jdelacruz";
    $email = "jdelacruz@email.com";
    $password = password_hash("password123", PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (first_name, last_name, email, user_name, password) 
            VALUES(:first_name, :last_name, :email, :user_name, :password)";

    $stmt = $con->prepare($sql);
    $stmt->bindParam(":first_name", $first_name);
    $stmt->bindParam(":last_name", $last_name);
    $stmt->bindParam(":user_name", $user_name);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password);

    if ($stmt->execute()) {
        echo "Insert Successful";
    } else {
        echo "Insert Fail";
    }
} catch (PDOException $e) {
    echo "Connection Failed: " . $e->getMessage();
}
