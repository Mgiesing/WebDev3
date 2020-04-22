<?php

session_start();
require 'php/databaseConnection.php';
// When someone doesn't have a Id, there are send to the login.php page. //Marco
if (!isset($_SESSION['username'])) {
    //TODO: Implemnt multile types of users: a.k.a. Student, Manager enz. and change the page accordingly.
    header('Location: login.php');
}

$conn = connectdb();


if (isset($_POST["submit"])) {

    $Titel = $_POST['Titel'];
    $omschrijving = $_POST['omschrijving'];
    $URL = $_POST['URL'];
    $categorie = $_POST['categorie'];
    $Prioriteit = $_POST ['prioriteit'];

    $sql = "INSERT INTO Bron (Titel, Omschrijving, URL, categorie, prioriteit ) VALUES ('$Titel', '$omschrijving', '$URL', '$categorie', $Prioriteit)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}



if ( isset($_POST['update'])) {

    $Titel = $_POST['Titel'];
    $Prioriteit = $_POST['prioriteit'];

    $sql = ("UPDATE Bron SET Prioriteit = $Prioriteit WHERE Titel = '$Titel' ");
    $conn->query($sql);

}

if (isset($_POST['delete'])){
    $Titel = $_POST['Titel'];
    //$BronID = $_GET['BronID'];
    $sql = "SELECT BronID FROM Bron WHERE Titel = '$Titel'";
    $result = $conn->query($sql);
    $result1 = $result->fetch_assoc();
    $BronID = $result1['BronID'];

    $sqldelete = "DELETE FROM Bron WHERE BronID='$BronID'";
    $conn->query($sqldelete);


}

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
