<?php


function TextBox()
{

    $sql = "SELECT * FROM Bron ORDER BY prioriteit";
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

    $conn = connectdb();
    $submit = filter_var("%{$_POST['zoek']}%", FILTER_SANITIZE_STRING);
    $sql = "SELECT * FROM Bron WHERE Titel OR Omschrijving LIKE ? ORDER BY prioriteit";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $submit);
    $stmt->execute();
    $result = $stmt->get_result();

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

function TextBoxfilter($categorie){


    $conn = connectdb();
    $sql = "SELECT Titel, Omschrijving, URL FROM Bron WHERE categorie = '$categorie' ORDER BY prioriteit";
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
