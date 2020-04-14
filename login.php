<?php


require 'connect.php';


session_start();
if(isset($_POST["login"])) {
    if (empty($_POST["email"]) || empty($_POST["password"])) {
        $message = '<label>All fields are required</label>';
    } else {
        $_SESSION['Id'] = "student";
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['email'] = $_POST['email'];

        if ($_SESSION['Id'] == "student"){

            $stmt = $conn->prepare("SELECT password FROM Users WHERE email=?");
            $stmt->execute([$_SESSION['email']]);
            $check = $stmt->fetch();

            if ($_SESSION['password'] == $check['password'] && !empty($_SESSION['email']) && !empty($_SESSION['password']))
                header('Location: index.php');

            else {
                header('Location: index.php');
            }
            exit;
        }
    }
}

?>
<html>
<head>
    <title>Login</title>
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
    <h3 align="">Login</h3><br />
    <form method="post" action="login.php">
        <label>email</label>
        <input type="text" name="email" class="form-control" />
        <br />
        <label>Password</label>
        <input type="password" name="password" class="form-control" />
        <br />
        <input type="submit" name="login" class="btn btn-info" value="Login" />
        <p>
            <a href="signup.php">sign up</a>
        </p>
    </form>

    </form>
</div>
<br />
</body>
</html>
