<?php
require_once "database/db.include.php";
require_once "includes/util.php";

$user_id = $_GET['user_id'];
$sql = "SELECT * FROM user WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $user_id);
if ($stmt->execute()) {
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
}

if (isset($_POST['delete'])) {
    $sql = "DELETE FROM user WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        redirect("list_users.php");
    }
} else if (isset($_POST['cancel'])) {
    redirect("view_user.php?user_id=$user_id");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
</head>

<body>
    <h1>Delete User</h1>
    <form method="post">
        <p>
            <label>You are about to delete user <strong><?php echo htmlspecialchars($user['user_name']) ?> </strong>, do you want to proceed? </label>
        </p>
        <button type="submit" name="delete">Delete</button>
        <button type="submit" name="cancel">Cancel</button>
    </form>


</body>

</html>