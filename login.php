<?php
require 'connect.php';

session_start();

if(isset($_POST["login"])) {
    $password = $_POST['password'];
    $email = $_POST['email'];

    if (empty($_POST["email"]) || empty($_POST["password"])) {
        $message = '<label>All fields are required</label>';
        var_dump($_POST);

    } else {
        $stmt = $conn->prepare("SELECT password FROM Users WHERE email=?");
        $stmt->execute($email);
        $check = $stmt->fetch();

        var_dump($check);

        if (isset($check['password']) && $password == $check['password']) {//TODO: Add hashing.
            $_SESSION['username'] = $email;
            $_SESSION['userId'] = "default";

            header('Location: Index.php');
        }
        else {

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
    <form method="post">
        <label>Username</label>
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
