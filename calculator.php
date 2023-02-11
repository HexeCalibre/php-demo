<?php
$result = "";

if (isset($_POST["first_number"]) and isset($_POST["second_number"]) and isset($_POST["operator"])) {
    $first_num = $_POST["first_number"];
    $second_num = $_POST["second_number"];
    $operator = $_POST["operator"];
    if ($operator == "Add") {
        $result = $first_num + $second_num;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>

<body>
    <form action="" method="POST">
        <p>
            <input type="number" name="first_number" required="required" value=<?php echo $first_num ?>>
        </p>
        <p>
            <input type="number" name="second_number" required="required" value=<?php echo $second_num ?>>
        </p>
        <p>
            <label><?php echo "Result is $result" ?></label>
        </p>
        <input type="submit" name="operator" value="Add">
    </form>
</body>

</html>