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
<?php include('NavBar.HTML') ?>
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
        <?php include "signuphtml.HTML" ?>
        <input type="submit" name="registerFormSubmitStudent" class="btn btn-info" value="Register Student" />
    </form>

    <h3 align="">Signup Teacher</h3><br />
    <form method="post" id="registerform">
        <?php include "signuphtml.HTML" ?>
        <input type="submit" name="registerFormSubmitDocent" class="btn btn-info" value="Register Teacher" />
    </form>

</div>
<br />
</body>
</html>
