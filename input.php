<?php
session_start();

// When someone doesn't have a Id, there are send to the login.php page. //Marco
if (!isset($_SESSION['username'])) {
    //TODO: Implemnt multile types of users: a.k.a. Student, Manager enz. and change the page accordingly.
    header('Location: login.php');
}


$servername = "localhost";
$username = "student";
$password = "student";
$dbname = "Binask";

try {
    $conn = new PDO("mysql:host=$servername;dbname=Binask", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if (isset($_POST["submit"])) {

    $Titel = $_POST['Titel'];
    $omschrijving = $_POST['omschrijving'];
    $URL = $_POST['URL'];
    $categorie = $_POST['categorie'];
    $Prioriteit = $_POST ['prioriteit'];

    $query = "INSERT INTO Bron (Titel, Omschrijving, URL, categorie, prioriteit ) VALUES ('$Titel', '$omschrijving', '$URL', '$categorie', '$Prioriteit')";

    if ($conn->exec($query) === TRUE) {
    }
}
if ( isset($_POST['update'])) {

    $Titel = $_POST['Titel'];
    $Prioriteit = $_POST['prioriteit'];

    $conn->exec("UPDATE Bron SET Prioriteit = $Prioriteit WHERE Titel = '$Titel' ");

    }

    if (isset($_POST['delete'])){
    $Titel = $_POST['Titel'];
    //$BronID = $_GET['BronID'];
    $GET = $conn->prepare("SELECT BronID FROM Bron WHERE Titel='$Titel'");
    $GET->execute();
    $git = $GET->fetch();
    $BronID = $git["BronID"];

        $conn->exec("DELETE FROM Bron WHERE BronID='$BronID'");
}

?>
<html lang="nl">
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
                <?php

                //Dynamic buttons if user is not logged in show home if user is logged in show the rest aswell  //Marco

                if (!isset($_SESSION['username'])) {
                    echo '<a class="nav-item active"><a class="nav-link" href="Index.php">Home</a>';

                }

                if (isset($_SESSION['username'])) {
                    echo '<a class="nav-item active"><a class="nav-link" href="Index.php">Home</a>';
                    echo '<a class="nav-item active"><a class="nav-link" href="input.php">Database</a>';
                    echo '<a class="nav-item active"><a class="nav-link" href="Zoek.php">Zoek Bronnen</a>';
                    echo '<a class="nav-item active"><a class="nav-link" href="#">Portfolio</a>';
                    echo '<a style="color: white;" class="nav-link" href="php/logoutListener.php">Logout</a>';

                }
                ?>
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

</body>



<head>
    <title>Docentenpage</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="helop.css" rel="stylesheet">

</head>
<body>
<div style="text-align:center">
    <h2>Welkom op de docentenpage </h2>
    <p>voeg hier uw bronnen toe:</p>
</div>
<br>
<br>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <form method="post" action="input.php">
            <label for="Title">Titel</label>
            <input type="text" id="Title" name="Titel" placeholder="De titel">
            <label for="Oschrijving">Omschrijving</label>
            <input type="text" id="Oschrijving" name="omschrijving" placeholder="De Omschrijving">
            <label for="URL">URL-link</label>
            <input type="text" id="URL" name="URL" placeholder="URL-link">
            <label for="categorie">categorie</label>
            <input type="text" id="categorie" name="categorie" placeholder="categorie">
            <label for="prioriteit">prioriteit</label>
            <input type="number" id="prioriteit" name="prioriteit">
            <br>
            <input type="submit" value="submit" name="submit">

        </form>
    </div>
    <br>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <form method="post" action="input.php">
            <label for="Title">Titel</label>
            <input type="text" id="Title" name="Titel" placeholder="De titel">
            <label for="prioriteit">prioriteit</label>
            <input id="prioriteit" name="prioriteit" type="number">
            <br>
            <input type="submit" value="update" name="update">
        </form>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <form method="post" action="input.php">
                <label for="Title">Titel</label>
                <input type="text" id="Titel" name="Titel" placeholder="De titel">
                                <br>
                <input type="submit" value="delete" name="delete">
            </form>
        </div>
        </div>
</body>
</html>
