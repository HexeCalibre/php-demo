<?php

echo "--------------echo and print------------";
echo "<h1>Welcome to PHP!</h1>";
echo "<br>";
print "Welcome";

echo "<br><br>";

echo "--------------Variables------------";
echo "<br><br>";

$name = "Juan";
echo $name;

echo "<br><br>";

echo nl2br("--------------Data Types------------\n\n");
//echo "<br><br>";

$greetings = "hello"; //string
$number = 10; //integer
$salary = 100000.00; //float
$is_done = true; //boolean
$array = array("hello", "world");

echo $array[0];


echo nl2br("\n\n--------------Var_Dum------------\n\n");

var_dump($greetings);
echo "<br>";
var_dump($number);
echo "<br>";
var_dump($salary);
echo "<br>";
var_dump($is_done);
echo "<br>";
var_dump($array);
echo "<br>";

echo nl2br("\n\n--------------Constant------------\n\n");

define("VERSION_NUMBER", 1.0);
define("APPLICATION_NAME", "Payroll System");

echo VERSION_NUMBER;
echo "<br>";
echo APPLICATION_NAME;

echo "<br>";

define("CARS", ["Ferrari", "Ford", "Toyota"]);

echo CARS[0];

echo "<br>";

echo nl2br("\n\n--------------String Manipulation------------\n\n");

$first_name = "Juan";
$last_name = "Dela Cruz";

$full_name = $first_name . " " . $last_name;

echo $full_name;

echo nl2br("\n\n--------------Variable Interpolation------------\n\n");

$full_name2 = "My name is $first_name $last_name";
echo $full_name2;
echo "<br>";

$str = "foo";
echo "test {$str}bar";
echo "<br>";
echo "\$full_name2 = Juan Dela Cruz";

echo "<br>";

echo strlen($full_name);

echo "<br>";
echo str_replace("Juan", "Pedro", $full_name);

echo "<br>";
echo strpos($full_name, "Dela");
echo "<br>";
echo htmlspecialchars("<h1>$str</h1>");

echo nl2br("\n\n--------------Assignment------------\n\n");

$index = 1;

//$index = $index + 2;
$index += 2;
//$index = $index - 2;
$index -= 2;
$index++;
$index--;

$index = 10;
// echo "<br>";
// echo $index;

echo nl2br("\n\n--------------Operators------------\n\n");
echo "<br>";
$number = 6;
$number2 = 7;

// * multiplication, / division, - subtraction, ** Exponential, % Modulus
$result = $number + $number2;
echo $result;
echo "<br>";

$result = $number ** $number2;
echo $result;
echo "<br>";

$year = 2001;
$result = $year % 4;
echo $result;
echo "<br>";

echo nl2br("\n\n--------------If Statement------------\n\n");
echo "<br>";

$grade = 100;


if ($grade === 100) {
    echo "You got a perfect score";
} else if ($grade < 100 and $grade >= 90) { //&& and, || or
    echo "You got a high score";
} else {
    echo "You need to study harder";
}

echo "<br>";
$grade = 90;
if ($grade != 100) {
    echo "Your grade is not perfect";
}

echo nl2br("\n\n--------------Logical Operators------------\n\n");

$is_done = true;
$is_loaded = false;

$person = new stdClass();
$person->id = 1;

if ($is_done or $is_loaded) {
    echo "Start";
} else {
    echo "Stop";
}

echo nl2br("\n\n--------------Loop------------\n\n");

echo "<br> For <br>";
for ($x = 0; $x < 5; $x++) {
    echo "$x <br>";
}

echo "While <br>";
$is_stop = false;
$x = 0;
while (!$is_stop) {
    $x++;
    if ($x == 5) {
        $is_stop = true;
    }

    echo "$x <br>";
}

echo "Do While <br>";
$is_stop = false;
$x = 0;
do {
    $x++;
    if ($x == 5) {
        $is_stop = true;
    }

    echo "$x <br>";
} while (!$is_stop);

echo "Foreach <br>";

$colors = array("red", "green", "blue");

foreach ($colors as $color) {
    echo "$color <br>";
}

echo "<br><br>-------------Break/Continue----------<br>";

for ($x = 0; $x < 10; $x++) {
    if ($x == 5) {
        continue;
    }
    echo "$x <br>";
}

echo "<br><br>-------------Switch----------<br>";

$favcolor = "red";
switch ($favcolor) {
    case "red":
        echo "Your favorite color is red!";
        break;
    case "blue":
        echo "Your favorite color is blue!";
        break;
    case "green":
        echo "Your favorite color is green!";
        break;
    default:
        echo "Your favorite color is neither red, blue, nor green!";
}

echo "<br><br>-------------Array----------<br>";

$cars = array("ferrari", "toyota", "mitsubishi");

print_r($cars);
//array_push($cars, "mustang");

echo "<br>";
echo "$cars[0] <br>";
echo "$cars[1] <br>";
echo "$cars[2] <br>";

$cars2 = array("car1" => "ferrari", "car2" => "toyota", "car3" => "mitsubishi");
echo "{$cars2["car1"]} <br>";
echo "{$cars2["car2"]} <br>";
echo "{$cars2["car3"]} <br>";

echo count($cars2);
echo "<br>";

$number_list = array(1, 3, 4, 5, 2);
print_r($number_list);
echo "<br>";
sort($number_list);
print_r($number_list);
echo "<br>";
rsort($number_list);
print_r($number_list);
echo "<br>";

if (in_array("toyota", $cars)) {
    echo "You own a toyota";
}

echo "<br><br>-------------Object Literal----------<br>";
$cars_obj = (object)[
    "brand" => "toyota",
    "age" => 10,
    "model" => "tacoma",
    "specs" => (object)["transmission" => "manual", "horsepower" => "150hp"]
];


echo $cars_obj->brand;
echo "<br>";
echo $cars_obj->age;
echo "<br>";
echo $cars_obj->specs->transmission;


echo "<br>-------------Dates----------------<br><br>";

echo date("Y-m-d h:i:s a");
echo "<br>";
echo date_default_timezone_get();
date_default_timezone_set("Asia/Manila");
echo "<br>";
echo date_default_timezone_get();
echo "<br>";
echo date("Y-m-d h:i:s a");

echo "<br>-------------function----------------<br><br>";
echo "<br>";

function add_number($x, $y)
{
    return $x + $y;
}

echo add_number(10, 11);

echo "<br>-------------OOP----------------<br><br>";

class Car
{
    //Properties
    private $brand;
    private $model;
    protected $age;
    const GOODBYE_MESSAGE = "Bye and thank you<br>";

    function __construct($brand, $model, $age)
    {
        echo "hello from $model <br>";
        $this->brand = $brand;
        $this->model = $model;
        $this->age = $age;
    }

    function __destruct()
    {
        echo $this::GOODBYE_MESSAGE;
    }

    function print_car_details()
    {
        echo "$this->brand $this->model";
    }

    function get_age()
    {
        return $this->age;
    }

    function set_age($value)
    {
        $this->age = $value;
    }

    function set_brand($value)
    {
        if ($value != "") {
            $this->brand = $value;
        }
    }


    function get_brand()
    {
        if ($this->brand == "ferrari") {
            return "";
        } else {
            return $this->brand;
        }
    }
}


class Ferarri extends Car
{
    private $speed;

    function __construct($brand, $model, $age, $speed)
    {
        parent::__construct($brand, $model, $age);
        $this->speed = $speed;
    }

    function get_age()
    {
        return $this->age;
    }
}

$car = new Car("toyota", "corolla", 10);
$ferrari = new Ferarri("ferrai", "model 1", 60, 70);
$car->set_brand("");

echo $car->get_brand();

echo "{$ferrari->print_car_details()} age is {$ferrari->get_age()} <br>";
