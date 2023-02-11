<?php

//$GLOBALS -> done
//$_POST -> done
//$_GET -> done
//$_COOKIE -> 
//$_SESSION



echo "----------Global-----<br>";

$x = 10;

function doSomething()
{
}

doSomething();


echo "----------Cookie-----<br>";

setcookie("visited-site", "google.com", time() + 8080000); //expires in 1 minute
//setcookie("visited-site", "google.com", time() - 1); //expires immediately

echo $_COOKIE["visited-site"];


echo "----------Session-----<br>";

$_SESSION["login_authenticated"] = true;


echo $_SESSION["login_authenticated"];
