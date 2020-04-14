<?php

session_start();
require 'connect.php';

if (isset($_SESSION['email'])) {
    header("Location: Index.php");
}

if(isset($_POST["signup"])) {

    if (empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["password2"])) {
        $message = '<label>All fields are required</label>';

    } else if ($_POST["password"] !== $_POST["password2"]) {
        $message = '<label>passwords are incorrect</label>';

    } else {

        $email = $_POST['email'];
        $password = $_POST['password'];
        $Docent = 0;

        $query = "INSERT INTO Users(email, password, Docent) VALUES('$email', '$password', $Docent)";
        if ($conn->exec($query) === TRUE) {

        }

    }
}
?>
<html>
<head>
    <title>Signup</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>
<br />
<div class="container" style="width:500px;">
    <?php
    if(isset($message))
    {
        echo '<label class="text-danger">'.$message.'</label>';
    }
    ?>
    <h3 align="">Signup</h3><br />
    <form method="post" action="signup.php">
        <label>email</label>
        <input type="text" name="email" class="form-control" />
        <br />
        <label>Password</label>
        <input type="password" name="password" class="form-control" />
        <br />
        <label>Password again</label>
        <input type="password" name="password2" class="form-control" />
        <br />
        <input type="submit" name="signup" class="btn btn-info" value="signup" />
    </form>

    </form>
</div>
<br />
</body>
</html>
