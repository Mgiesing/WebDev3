<?php

function AddText(){

    $conn = connectdb();

    $Titel = filter_var($_POST['Titel'], FILTER_SANITIZE_STRING);
    $omschrijving = filter_var($_POST['omschrijving'], FILTER_SANITIZE_STRING);
    $URL = filter_var($_POST['URL'], FILTER_SANITIZE_STRING);
    $categorie = filter_var($_POST['categorie'], FILTER_SANITIZE_STRING);
    $Prioriteit = $_POST ['prioriteit'];

    $stmt = $conn->prepare("INSERT INTO Bron (Titel, Omschrijving, URL, categorie, prioriteit ) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $Titel, $omschrijving, $URL, $categorie, $Prioriteit);

    $stmt->execute();
    $stmt->close();

}

function UpdateText(){

    $conn = connectdb();
    $Titel = filter_var($_POST['Titel'], FILTER_SANITIZE_STRING);
    $Prioriteit = filter_var($_POST['prioriteit'], FILTER_SANITIZE_STRING);

    $stmt = $conn->prepare("UPDATE Bron SET Prioriteit = ? WHERE Titel = ? ");
    $stmt->bind_param('is', $Prioriteit, $Titel);
    $stmt->execute();

}

function DeleteText(){

    $conn = connectdb();
    $Titel = filter_var($_POST['Titel'], FILTER_SANITIZE_STRING);
    //$BronID = $_GET['BronID'];
    $stmt = $conn->prepare("SELECT BronID FROM Bron WHERE Titel = ?");
    $stmt->bind_param('s', $Titel);
    $stmt->execute();
    $result = $stmt->get_result();
    $result1 = $result->fetch_assoc();
    $BronID = $result1['BronID'];


    $sqldelete = $conn->prepare("DELETE FROM Bron WHERE BronID= ?");
    $sqldelete->bind_param('i', $BronID);
    $sqldelete->execute();


}
