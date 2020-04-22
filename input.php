<?php

session_start();
require 'databaseConnection.php';
// When someone doesn't have a Id, there are send to the login.php page. //Marco
if (isset($_SESSION['Id'])) {
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
<html lang="nl">
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
