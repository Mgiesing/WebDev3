<?php
//Start user data storage session
session_start();
//Clear any old errors
if (isset($_SESSION['error'])) unset($_SESSION['error']);

//Require login listener
require_once('php/registerListener.php');

//Can't go to login page when logged in.
if (isset($_SESSION['username'])) {
    header("Location: Index.php");
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
    //If there is a error, display it to the user.
    if (isset($_SESSION['error'])) {
    echo '<br><div class="alert alert-primary" role="alert">' . $_SESSION['error'] . '</div>';
    };
    ?>
    <h3 align="">Signup</h3><br />
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
        <input type="submit" name="registerFormSubmit" class="btn btn-info" value="Register" />
    </form>

    </form>
</div>
<br />
</body>
</html>
