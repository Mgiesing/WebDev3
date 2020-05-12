<?php
//Start user data storage session
session_start();
//Clear any old errors
if (isset($_SESSION['error'])) unset($_SESSION['error']);

//Require login listener
require_once('loginListener.php');
//Can't go to login page when logged in.
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>
<br />

<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">

        </div>
        <div class="jumbotron col-lg-4 col-md-4 col-sm-4 text-center">
            <form method="post" id="loginform">
                <input type="text" name="username" placeholder="Inlognaam">
                <input type="password" name="password" placeholder="Wachtwoord"> <br><br>
                <input type="submit" value="Login" name="loginFormSubmit">
            </form>
            <div id="formFooter">
                <a class="underlineHover" href="#">Forgot Password?</a>
            </div>
            <?php
            //If there is a error, display it to the user.
            if (isset($_SESSION['error'])) {
                echo '<br><div class="alert alert-primary" role="alert">' . $_SESSION['error'] . '</div>';
            };
            ?>
        </div>
    </div>
</body>

</html>
