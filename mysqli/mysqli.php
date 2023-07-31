<?php
$host = "localhost";
$username = "root";
$database = "user_administration";
$password = "password123!";

$con = new mysqli($host, $username, $password, $database);

if ($con->connect_error) {
    echo $con->connect_error;
}

echo nl2br("\n\n===================SELECT Statement=======\n");

$sql = "SELECT * FROM user";

$users = $con->query($sql) or die($con->error);

while ($row = $users->fetch_assoc()) {
    echo $row['first_name'] . " " . $row['last_name'] . "<br>";
}

$first_name = "Juan";
$last_name = "Dela Cruz";
$user_name = "jdelacruz";
$password = "password123";
$email = "jdelacruz@email.com";

echo nl2br("\n\n===================INSERT Statement=======\n");
$sql = "INSERT INTO user(first_name, last_name, user_name, password, email) VALUES(?, ?, ?, ?, ?)";

$stmt = $con->prepare($sql);
$stmt->bind_param("sssss", $first_name, $last_name, $user_name, $password, $email);

if ($stmt->execute()) {
    echo "Insert successfull";
}
