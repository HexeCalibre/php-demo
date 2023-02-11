<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>

<body>
    <h1>Registration Form</h1>
    <form action="sign_up_result.php" method="post" id="reg-form">
        <p>
            <label>Login Name</label>
            <input type="text" name="loginName" required="required" />
        </p>
        <p>
            <label>Password</label>
            <input type="password" name="password" required="required" />
        </p>
        <p>
            <label>First Name</label>
            <input type="text" name="firstName" required="required" />
        </p>
        <p>
            <label>Last Name</label>
            <input type="text" name="lastName" required="required" />
        </p>
        <p>
            <label>Email Address</label>
            <input type="email" name="email" required="required" />
        </p>
        <input type="submit" value="Submit" />
    </form>


</body>

</html>