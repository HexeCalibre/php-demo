<?php
session_start();

if ($_SESSION["login_authenticated"]) {
    echo "<br><h3>You are authenticated</h3><br>";
    echo "<h1>Welcome " . $_SESSION["login_full_name"] . "</h1>";
} else {
    echo "<br><h1>You are not authenticated</h1>";
}
