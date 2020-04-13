<?php
//Start user data storage session
session_start();
//Clear any old errors
if (isset($_SESSION['error'])) unset($_SESSION['error']);

//Require login listener
require_once('php/loginListener.php');
//Can't go to login page when logged in.
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>
///
<html>
<head>
    <title>Homepage</title>
    <meta charset="UTF-8" />
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
            crossorigin="anonymous"
    />
    <script
            src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"
    ></script>
    <script
            src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"
    ></script>
    <script
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" type="text/css" href="Style.css" />
</head>

<body>
<div>
    <nav
            class="navbar navbar-expand-sm navbar-dark"
            style="background-color: #000000;"
    >
        <a
                class="navbar-brand"
                href="https://start.nhlstenden.com/"
                target="blanc"
        >Start NHL Stenden</a
        >
        <button
                class="navbar-toggler d-lg-none"
                type="button"
                data-toggle="collapse"
                data-target="#collapsibleNavId"
                aria-controls="collapsibleNavId"
                aria-expanded="false"
                aria-label="Toggle navigation"
        ></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="Index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Database</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Portfolio</a>
                </li>


            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input
                        class="form-control mr-sm-2"
                        type="text"
                        placeholder="Zoeken"
                />
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">
                    Zoeken
                </button>
            </form>
        </div>
    </nav>
</div>
///

                <!-- Dynamic buttons -->
                <?php
                if (!isset($_SESSION['username'])) {
                    echo '<li class="nav-item active"><a class="nav-link" href="login.php">Inloggen</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="register.php">Registreer</a></li>';
                }

                if (isset($_SESSION['username'])) {
                    echo '<li class="nav-item"><a class="nav-link" href="mywenslijst.php">MyWenslijst</a></li>';
                }
                ?>
            </ul>
            <?php
            if (isset($_SESSION['username'])) {
                echo '<a style="color: white;" class="nav-link" href="php/logoutListener.php">Logout</a>';
            }
            ?>
    <!-- Inlog scherm -->

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