<?php
//can connect oracle, mssql, mysql, postgreSQL)
echo "==============PDO (PHP Data Objects)================<br><br>";

echo "---Get PDO Drivers---<br>";
print_r(PDO::getAvailableDrivers());


echo "<br><br>---Get PDO Drivers---<br>";
$host = "localhost";
$user_name = "root";
$password = "password123";
$db_name = "user_management";
///$dsn="sqlsrv:Server=$host;Database=$db_name"; //ms sql
$dsn = "mysql:host=$host;dbname=$db_name"; //mysql

try {
    $connection = new PDO($dsn, $user_name, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    echo "<br>----------Fetch_Assoc------------<br><br>";

    $sql_all = "SELECT * FROM users";
    $statement = $connection->query($sql_all);

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo $row["first_name"] . " " . $row["last_name"] . "<br>";
    }
} catch (PDOException $e) {
    echo "Connection Failed " . $e->getMessage();
}
