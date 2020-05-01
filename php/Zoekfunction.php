<?php


function TextBox()
{

    $sql = "SELECT Titel, Omschrijving, URL FROM Bron ORDER BY prioriteit";
    $conn = connectdb();
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            echo "<div id='Bron'>";

            Echo $row["Titel"];
            Echo "<br>";
            Echo "<br>";
            Echo $row["Omschrijving"];
            Echo "<br>";
            Echo "<br>";
            Echo $row["URL"];
            Echo "<br>";
            echo "</div>";
        }
    }

}

function TextBoxZoek(){


    $submit = $_POST['zoek'];
    $conn = connectdb();
    $sql = "SELECT * FROM Bron WHERE ( Titel LIKE '%$submit%' OR Omschrijving LIKE '%$submit%') ORDER BY prioriteit";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            echo "<div id='Bron'>";

            Echo $row["Titel"];
            Echo "<br>";
            Echo "<br>";
            Echo $row["Omschrijving"];
            Echo "<br>";
            Echo "<br>";
            Echo $row["URL"];
            Echo "<br>";
            echo "</div>";
        }
    }

}

function TextBoxNoten(){

    $noten = 'Noten';

    $conn = connectdb();
    $sql = "SELECT Titel, Omschrijving, URL FROM Bron WHERE categorie = '$noten' ORDER BY prioriteit";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            echo "<div id='Bron'>";

            Echo $row["Titel"];
            Echo "<br>";
            Echo "<br>";
            Echo $row["Omschrijving"];
            Echo "<br>";
            Echo "<br>";
            Echo $row["URL"];
            Echo "<br>";
            echo "</div>";

        }
    }
}

function TextBoxYoutuber(){

    $Youtuber = 'Youtuber';
    $conn = connectdb();
    $sql = "SELECT Titel, Omschrijving, URL FROM Bron WHERE categorie='$Youtuber' ORDER BY prioriteit";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            echo "<div id='Bron'>";

            Echo $row["Titel"];
            Echo "<br>";
            Echo "<br>";
            Echo $row["Omschrijving"];
            Echo "<br>";
            Echo "<br>";
            Echo $row["URL"];
            Echo "<br>";
            echo "</div>";
        }
    }

}

function TextBoxGames(){

    $Games = 'Games';
    $conn = connectdb();
    $sql = "SELECT Titel, Omschrijving, URL FROM Bron WHERE categorie='$Games' ORDER BY prioriteit";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            echo "<div id='Bron'>";

            Echo $row["Titel"];
            Echo "<br>";
            Echo "<br>";
            Echo $row["Omschrijving"];
            Echo "<br>";
            Echo "<br>";
            Echo $row["URL"];
            Echo "<br>";
            echo "</div>";
        }
    }
}

function TextBoxMemes(){

    $Memes = 'Memes';
    $conn = connectdb();
    $sql = "SELECT Titel, Omschrijving, URL FROM Bron WHERE categorie='$Memes' ORDER BY prioriteit";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            echo "<div id='Bron'>";

            Echo $row["Titel"];
            Echo "<br>";
            Echo "<br>";
            Echo $row["Omschrijving"];
            Echo "<br>";
            Echo "<br>";
            Echo $row["URL"];
            Echo "<br>";
            echo "</div>";
        }
    }
}
