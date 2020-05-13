<?php

function Get()
{
    echo "<label for=Title>Titel</label>";
    echo "<input type=text id=Titel name=Titel1 placeholder= \"De titel\" >";
    echo "<input type=submit name=GetText value=GetText>";
}

function AddText(){


        $conn = connectdb();

        $Titel = filter_var($_POST['Titel'], FILTER_SANITIZE_STRING);
        $omschrijving = filter_var($_POST['omschrijving'], FILTER_SANITIZE_STRING);
        $categorie = filter_var($_POST['categorie'], FILTER_SANITIZE_STRING);
        $Prioriteit = $_POST ['prioriteit'];
        $URL = filter_var($_POST['URL'], FILTER_VALIDATE_URL);
        if (empty($URL))
        {
            print 'URL is niet geldig';
        }
        else {

            $stmt = $conn->prepare("INSERT INTO Bron (Titel, Omschrijving, URL, categorie, prioriteit ) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssi", $Titel, $omschrijving, $URL, $categorie, $Prioriteit);

            $stmt->execute();
            $stmt->close();
        }


}



function UpdateText(){

    $conn = connectdb();
    $omschrijving = filter_var($_POST['omschrijving'], FILTER_SANITIZE_STRING);
    $categorie = filter_var($_POST['categorie'], FILTER_SANITIZE_STRING);
    $Prioriteit = $_POST['prioriteit'];
    $Titel = filter_var($_POST['Titel'], FILTER_SANITIZE_STRING);
    $URL = filter_var($_POST['URL'], FILTER_VALIDATE_URL);
    if (empty($omschrijving) || empty($categorie) || empty($Prioriteit) || empty($Titel) && empty($URL))
    {
        print "een of meerdere velden waren leeg, bron is niet gewijzigd";
        return;
    }
    if (empty($URL))
    {
        print "URL is niet geldig, bron is niet gewijzigd";
        return;
    } else {

        $stmt = $conn->prepare("UPDATE Bron SET Omschrijving = ?, URL = ?,  categorie = ?,  Prioriteit = ? WHERE Titel = ? ");
        $stmt->bind_param('sssis', $omschrijving, $URL, $categorie, $Prioriteit, $Titel);
        $stmt->execute();
    }

}

function GetTheText(){

    $conn = connectdb();
    $Titel = filter_var($_POST['Titel1'], FILTER_SANITIZE_STRING);
    $sql = "SELECT * FROM Bron WHERE Titel = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $Titel);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()){

            echo "<form method=post action=input.php>";
            echo "<label for=Title>Titel(niet veranderen)</label>";
            echo "<input type=text id=Title name=Titel placeholder=\"Titel(niet veranderen)\" value=$Titel>";
            echo "<label for=Oschrijving>Omschrijving</label>";
            echo "<textarea id=Oschrijving name=omschrijving placeholder=De Omschrijving>$row[Omschrijving]</textarea>";
            echo "<label for=URL>URL-link</label>";
            echo "<input value= $row[URL]  type=text id=URL name=URL placeholder=URL-link>";
            echo "<label for=categorie>categorie</label>";
            echo "<input value= $row[categorie]  type=text id=categorie name=categorie placeholder=categorie>";
            echo "<label for=prioriteit>prioriteit</label>";
            echo "<input value= $row[Prioriteit]  type=number id=prioriteit name=prioriteit>";
            echo "<input type=submit value=update name=update>";
            echo "</form>";



        }
    }

}

function DeleteText(){

    $conn = connectdb();
    $Titel = filter_var($_POST['Titel'], FILTER_SANITIZE_STRING);
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

function DeleteUser(){

    $conn = connectdb();
    $username = filter_var($_POST['gebruiker'], FILTER_SANITIZE_STRING);
    $stmt = $conn->prepare("SELECT code FROM Users WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $result1 = $result->fetch_assoc();
    $code = $result1['code'];


    $sqldelete = $conn->prepare("DELETE FROM Users WHERE code= ?");
    $sqldelete->bind_param('i', $code);
    $sqldelete->execute();


}

function fieldempty(){
    print "alle velden moeten worden ingevuld";
}


function Submitfieldempty()
{
        if (empty($_POST['Titel']) || empty($_POST['omschrijving']) || empty($_POST['URL']) || empty($_POST['categorie']) || empty($_POST['prioriteit'])) {
            fieldempty();
        }
}
