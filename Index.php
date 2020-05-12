<?php
//Start session, needed for header checks //Marco
session_start();
require 'IndexListener.php'
?>




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
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #000000;">
        <a class="navbar-brand" href="https://start.nhlstenden.com/" target="blanc">Start NHL Stenden</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <?php
                ShowNavbar()
                ?>
            </ul>


            <form class="form-inline my-2 my-lg-0" method="post" action="Zoek.php">
                <input class="form-control mr-sm-2" type="text" placeholder="Zoeken" name="zoek"/>
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">
                    Zoeken
                </button>
            </form>
        </div>
    </nav>
</div>
<div class="homepage">
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-xl-2">
                <form method="post" action="Zoek.php">
                    <button class="btn btn-homepage" type="submit" name="Noten" id="btn1">Aard, nut en noodzaak van natuurwetenschappen</button><br>
                </form>
                <form method="post" action="Zoek.php">
                <button class="btn btn-homepage" type="submit" name="Youtuber" id="btn2" href="">Begripsontwikkeling</button><br>
                </form>
                <form method="post" action="Zoek.php">
                <button class="btn btn-homepage" id="btn3" type="submit" name="Games" href="">Practicum didactiek</button><br>
                </form>
            </div>
            <div class="col-xl-2">
                <form method="post" action="Zoek.php">
                <button class="btn btn-homepage" id="btn4" type="submit" name="Games">Leerpocessen, lesopbouw en toetsing</button><br>
                </form>
                <form>
                <button class="btn btn-homepage" id="btn5" href="">Natuurweten-schappelijke denk- en werkwijzen</button><br>
                </form>
                <form>
                <button class="btn btn-homepage" id="btn6" href="">Digitale didactiek</button><br>
                </form>

                <!-- Dynamic buttons -->
                <?php
                //Dynamic buttons if user is not logged in show login if user is logged in show logout  //Marco
                logbutton()
                ?>
            </div>

            <div class="col-xl-2">
                <form>
                <button class="btn btn-homepage" id="btn7" href="">Doorlopende leerlijn en samenhang met andere vakken</button><br>
                </form>
                <form>
                <button class="btn btn-homepage" id="btn8" href="">Social scientific issues<br>
                </form>
                <form>
                <button class="btn btn-homepage" id="btn9" href="">Vakdidactische persoonlijke professionele ontwikkeling<br>
                </form>
            </div>
            <form>
            <div class="col-sm-3">
                <button class="btn btncontact">Contact</button>
            </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
