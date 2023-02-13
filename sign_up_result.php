<?php
require_once("includes/db.inc.php");

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
