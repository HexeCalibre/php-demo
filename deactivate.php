<?php
session_start();

require_once("includes/db.inc.php");

$login_name = $_POST["login_name"];

$sql = "DELETE FROM users WHERE login_name = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("s", $login_name);
$stmt->execute();

$stmt->close();
$connection->close();
