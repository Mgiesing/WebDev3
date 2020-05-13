<?php

session_start();
require 'databaseConnection.php';
require 'checkLoginDocent.php';
require 'inputfunction.php';


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

<?php include('NavBar.HTML') ?>

<div style="text-align:center">
    <h2>Welkom op de docentenpage </h2>
    <p>voeg hier uw bronnen toe:</p>
</div>
<br>
<br>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h3 align="">Create Bron</h3>
        <?php if(isset($_POST['submit'])) {
        Submitfieldempty(); }?>
        <br>

        <form method="post" action="input.php">
            <label for="Title">Titel</label>
            <input type="text" id="Title" name="Titel" placeholder="De titel">
            <label for="Oschrijving">Omschrijving</label>
            <textarea id="Oschrijving" name="omschrijving" placeholder="De Omschrijving"></textarea>
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
        <h3 align="">Edit Bron</h3>
        <form method="post" action="input.php"
            <?
            require 'inputListener.php';
            ?>
            <br>
    </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h3 align="">Delete Bron</h3>
            <?php if(isset($_POST['delete'])){
                Deleteitfieldempty();
            }?>
            <br>
            <form method="post" action="input.php">
                <label for="Title">Titel</label>
                <input type="text" id="Titel" name="Titel" placeholder="De titel">
                <br>
                <input type="submit" value="delete" name="delete">
            </form>
            <h3 align="">Delete Gebruiker</h3>
            <?php if(isset($_POST['DeleteGebruiker'])){
                Deleteitfieldempty();
            }?>
            <form method="post" action="input.php">
                <label for="Title">Gebruiker</label>
                <input type="text" id="gebruiker" name="gebruiker" placeholder="gebruiker">
                <br>
                <input type="submit" value="delete" name="DeleteGebruiker">
            </form>
        </div>
</body>
</html>
