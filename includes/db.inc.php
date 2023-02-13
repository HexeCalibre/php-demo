<?php
$db_server_name = "localhost";
$db_name = "user_management2";
$db_user_name = "root";
$db_user_password = "password123";

$connection = mysqli_connect($db_server_name, $db_user_name, $db_user_password, $db_name);

if ($connection->connect_error) {
    die("Connection failed " . $connection->connect_error);
}
