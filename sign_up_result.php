<?php

$db_server_name = "localhost";
$db_name = "user_management2";
$db_user_name = "root";
$db_user_password = "password123";


$connection = mysqli_connect($db_server_name, $db_user_name, $db_user_password, $db_name);

if ($connection->connect_error) {
    die("Connection failed " . $connection->connect_error);
}

$first_name = $_POST["firstName"];
$last_name = $_POST["lastName"];
$password = $_POST["password"];
$login_name = $_POST["loginName"];
$email = $_POST["email"];


$sql = "INSERT INTO users (first_name, last_name, email, login_name, password) VALUES(?, ?, ?, ?, ?)";
$stmt = $connection->prepare($sql);
$stmt->bind_param("sssss", $first_name, $last_name, $email, $login_name, $password);
$stmt->execute();

echo "Registration successfull";

$stmt->close();
$connection->close();
