<?php

function AddText(){

    $conn = connectdb();
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

function UpdateText(){

    $conn = connectdb();
    $Titel = $_POST['Titel'];
    $Prioriteit = $_POST['prioriteit'];

    $sql = ("UPDATE Bron SET Prioriteit = $Prioriteit WHERE Titel = '$Titel' ");
    $conn->query($sql);

}

function DeleteText(){

    $conn = connectdb();
    $Titel = $_POST['Titel'];
    //$BronID = $_GET['BronID'];
    $sql = "SELECT BronID FROM Bron WHERE Titel = '$Titel'";
    $result = $conn->query($sql);
    $result1 = $result->fetch_assoc();
    $BronID = $result1['BronID'];
    echo $BronID;

    $sqldelete = "DELETE FROM Bron WHERE BronID='$BronID'";
    $conn->query($sqldelete);

}
