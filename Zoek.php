<?php

session_start();
require 'databaseConnection.php';
require 'checkLogin.php';

?>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="Stylezoek.css"
<style>

</style>

<head>

    <title>database</title>


</head>

<body>

<form method="post" action="Zoek.php">
<ul>

    <li style="float:right"><button type="submit" name="zoek">Submit<i class="fa fa-search"></i></button>
        <input type="text" placeholder="Search" name="zoek" class="searchTerm"></li>
    <li><a href="Index.php">Home</a></li>
    <li><a href="Zoek.php">Zoek bronnen</a></li>
    <li><a href="">Portfolio</a></li>
</ul>
</form>

<div id="table1" style="float:left" class="btn-group">

    <form method="post" action="Zoek.php">
        <label class="container">Noten
            <input type="checkbox" name="Noten" id="Noten" value="Noten">
        </label>

        <label class="container">Youtuber
            <input type="checkbox" name="Youtuber" id="Youtuber" value="Youtuber">
        </label>

        <label class="container">Games
            <input type="checkbox" name="Games" id="Games" value="Games">
        </label>

        <label class="container">Memes
            <input type="checkbox" name="Memes" id="Memes" value="Memes">
        </label>
        <button type="submit" name="checkbox">Submit</button>
    </form>

</div>

<div id="table2" style="float:left">
    <form method="post" action="Zoek.php">
        <button type="submit" name="zoek">Submit</button>
        <input type="text" name="zoek" placeholder="Search">
    </form>
    <div id="table5">
        <?php
        require_once('ZoekListener.php');
        ?>
    </div>

</div>



<div id="table3" style="float:left">

</div>



<div id="table4">

</div>



</body>

</html>
