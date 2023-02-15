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
    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);


    echo "<br>----------Fetch_Assoc------------<br><br>";

    $sql_all = "SELECT * FROM users";
    $statement = $connection->query($sql_all);

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo $row["first_name"] . " " . $row["last_name"] . "<br>";
    }

    echo "<br>----------Fetch_Object------------<br><br>";
    $statement = $connection->query($sql_all);
    while ($row = $statement->fetch(PDO::FETCH_OBJ)) {
        echo $row->first_name . " " . $row->last_name . "<br>";
    }

    echo "<br>----------Fetch_Default------------<br><br>";
    $statement = $connection->query($sql_all);
    while ($row = $statement->fetch()) {
        echo $row->first_name . " " . $row->last_name . "<br>";
    }

    echo "<br>----------Positional Parameters-----------<br><br>";
    $active = true;
    $sql_by_active = "SELECT * FROM users WHERE active = ?";

    $statement = $connection->prepare($sql_by_active);
    $statement->bindParam(1, $active);
    $statement->execute();
    while ($row = $statement->fetch()) {
        echo $row->first_name . " " . $row->last_name . "<br>";
    }

    echo "<br>--------------Named Parameter------------<br><br>";
    $sql_by_active = "SELECT * FROM users WHERE active = :active";
    $statement = $connection->prepare($sql_by_active);
    $statement->bindParam(":active", $active);
    $statement->execute();

    while ($row = $statement->fetch()) {
        echo $row->first_name . " " . $row->last_name . "<br>";
    }

    echo "<br>--------------RowCount------------<br><br>";
    echo $statement->rowCount();

    echo "<br>--------------BindValue------------<br><br>";
    $sql_by_active_login_name = "SELECT * FROM users WHERE active = :active and login_name = :login_name";
    $statement = $connection->prepare($sql_by_active_login_name);
    $statement->bindValue(":active", false);
    $statement->bindValue(":login_name", "jdoe");
    $statement->execute();

    while ($row = $statement->fetch()) {
        echo $row->first_name . " " . $row->last_name . "<br>";
    }

    echo "<br>--------------RowCount------------<br><br>";
    echo $statement->rowCount();


    echo "<br>------------fetchAll---------<br><br>";
    $sql_by_active = "SELECT * FROM users WHERE active = :active";
    $statement = $connection->prepare($sql_by_active);
    $statement->bindParam(":active", $active);
    $statement->execute();
    $rows = $statement->fetchAll();

    foreach ($rows as $row) {
        echo $row->first_name . " " . $row->last_name . "<br>";
    }

    echo "<br>------------fetch---------<br><br>";
    $sql_by_active = "SELECT * FROM users WHERE active = :active";
    $statement = $connection->prepare($sql_by_active);
    $statement->bindValue(":active", "true");
    $statement->execute();
    $r = $statement->fetch();
    echo $r->first_name . " " . $r->last_name . "<br>";

    echo "<br>-------------INSERT--------------";

    $first_name = "user";
    $last_name = "three";
    $email = "user.three@email.com";
    $login_name = "user3";
    $password = "password3";
    /*
    $sql_insert = "INSERT INTO users (first_name, last_name, email, login_name, password) " .
        "VALUES(:first_name, :last_name, :email, :login_name, :password)";
    $statement = $connection->prepare($sql_insert);
    $statement->bindParam(":first_name", $first_name);
    $statement->bindParam(":last_name", $last_name);
    $statement->bindParam(":email", $email);
    $statement->bindParam(":login_name", $login_name);
    $statement->bindParam(":password", $password);

    $statement->execute();

    if ($statement->rowCount() > 0) {
        echo "<br>Insert successfull";
    } else {
        echo "<br>Insert failed";
    }
*/
    echo "<br>-------------UPDATE--------------";

    $sql_update = "UPDATE users SET password = :password, email = :email WHERE login_name = :login_name";
    $statement = $connection->prepare($sql_update);
    $statement->bindValue(":login_name", "user3");
    $statement->bindValue(":password", "password4");
    $statement->bindValue(":email", "user.three@emailX.com");

    $statement->execute();

    if ($statement->rowCount() > 0) {
        echo "<br>Update successfull";
    } else {
        echo "<br>Update failed";
    }

    echo "<br>-------------DELETE--------------";

    $sql_delete = "DELETE FROM users WHERE login_name = :login_name";
    $statement = $connection->prepare($sql_delete);
    $statement->bindValue(":login_name", "user3");

    $statement->execute();

    if ($statement->rowCount() > 0) {
        echo "<br>Delete successfull";
    } else {
        echo "<br>Delete failed";
    }
} catch (PDOException $e) {
    echo "Connection Failed: " . $e->getMessage();
}
