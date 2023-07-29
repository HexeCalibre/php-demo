<?php
// phpinfo();

echo "-----Comments----";

// single line comment
# single line comment
/* 
  multi line comment
*/


echo nl2br("\n\n-------Variables---");

$greetings = "Hello World!";
$first_name = "Juan";
$last_name = "Dela Cruz";
$age = 20;
$value = 1000.50;
$is_success = true;
$cars = array("Toyota", "Mitsubishi", "Nissan");
$obj = new stdClass();
$null = null;

echo "<br>";
echo gettype($greetings);
echo "<br>";
echo gettype($age);
echo "<br>";
echo gettype($value);
echo "<br>";
echo gettype($is_success);
echo "<br>";
echo gettype($cars);
echo "<br>";
echo gettype($obj);
echo "<br>";
echo gettype($null);
echo "<br>";

var_dump($greetings);
echo "<br>";
var_dump($cars);


echo nl2br("\n\n-------Constants---");
define("VERSION_NUMBER", 1.0);
define("APP_NAME", "Inventory System");

echo "<br>";
echo APP_NAME;

echo "<br>";
echo VERSION_NUMBER;


define("CARS", ["Ferrar", "BMW", "Toyota"]);
echo "<br>";
echo CARS[0];

echo nl2br("\n\n-------Strings---");
echo "<br>";
echo "<br>";

$full_name = "my name is " . $first_name . " " . $last_name;
echo $full_name;

echo "<br>";

$full_name2 = "my name is $first_name $last_name";
echo $full_name2;

echo "<br>";

$str = "sample text";
// value of $str is sample text
$text = "value of \$str is $str";
echo $text;
echo "<br>";

echo htmlspecialchars("<h1>") . "Sample Text" . htmlspecialchars("<h1>");


echo nl2br("\n\n-------Strings Methods---");
echo "<br>";

echo strlen($text);

echo "<br>";
$full_name3 = str_replace("Juan Dela Cruz", "John Doe", $full_name);
echo $full_name3;
echo "<br>";

echo strpos($text, "sample text");

echo "<br>";
echo join(" ", $cars);
