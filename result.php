<?php
//echo $_GET["first_number"] . "<br>";
//echo $_GET["operator"] . "<br>";

echo "From Result.php <br>";

if (isset($_POST["first_number"])) {
    echo $_POST["first_number"] . "<br>";
}

if (isset($_POST["second_number"])) {
    echo $_POST["second_number"] . "<br>";
}

if (isset($_POST["operator"])) {
    echo $_POST["operator"] . "<br>";
}
