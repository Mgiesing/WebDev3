<?php
//Start user data storage session
session_start();
//Clear any old errors
if (isset($_SESSION['error'])) unset($_SESSION['error']);

//Require login listener
require_once('registerListener.php');
require 'checkLoginDocent.php';
?>
<html>
<head>
    <title>Signup</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="helop.css" rel="stylesheet">
</head>
<body>
<div>
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #000000;">
        <a class="navbar-brand" href="https://start.nhlstenden.com/" target="blanc">Start NHL Stenden</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <a class="nav-item active"><a class="nav-link" href="Index.php">Home</a>
                <a class="nav-item active"><a class="nav-link" href="input.php">Database</a>
                <a class="nav-item active"><a class="nav-link" href="Zoek.php">Zoek Bronnen</a>
                <a class="nav-item active"><a class="nav-link" href="#">Portfolio</a>
                <a class="nav-item active"><a class="nav-link" href="signup.php">Create Account</a>

            </ul>
        </div>
    </nav>
</div>
<br />
<div class="container" style="width:500px;">
    <?php
    //If there is a error, display it to the user.
    if (isset($_SESSION['error'])) {
        echo '<br><div class="alert alert-primary" role="alert">' . $_SESSION['error'] . '</div>';
    }
    ?>
    <h3 align="">Signup Student</h3><br />
    <form method="post" id="registerform">
        <label>email</label>
        <input type="text" name="username" class="form-control" />
        <br />
        <label>Password</label>
        <input type="password" name="password" class="form-control" />
        <br />
        <label>Password again</label>
        <input type="password" name="passwordVerify" class="form-control" />
        <br />
        <input type="submit" name="registerFormSubmitStudent" class="btn btn-info" value="Register Student" />
    </form>

    <h3 align="">Signup Teacher</h3><br />
    <form method="post" id="registerform">
        <label>email</label>
        <input type="text" name="username" class="form-control" />
        <br />
        <label>Password</label>
        <input type="password" name="password" class="form-control" />
        <br />
        <label>Password again</label>
        <input type="password" name="passwordVerify" class="form-control" />
        <br />
        <input type="submit" name="registerFormSubmitDocent" class="btn btn-info" value="Register Teacher" />
    </form>

</div>
<br />
</body>
</html>
