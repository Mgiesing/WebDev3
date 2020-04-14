<?php
$servername = "localhost";
$username = "student";
$password = "student";
$dbname = "Binask";

try {
    $conn = new PDO("mysql:host=$servername;dbname=Binask", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   


}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}



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

<ul>

    <li style="float:right"><button type="submit">Submit<i class="fa fa-search"></i></button>
        <input type="text" placeholder="Search" class="searchTerm"></li>
    <li><a href="">Home</a></li>
    <li><a href="">Database</a></li>
    <li><a href="">Portfolio</a></li>
</ul>

<div id="table1" style="float:left" class="btn-group">

    <form method="post" action="zoek.php">
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
    <form method="post" action="zoek.php">
    <button type="submit" name="zoek">Submit</button>
    <input type="text" name="zoek" placeholder="Search">
    </form>
    <div id="table5">
        <?php







        if(isset($_POST["zoek"])) {
            if (empty($_POST['zoek'])) {

                $get = $conn->prepare("SELECT Titel, Omschrijving, URL FROM Bron ORDER BY prioriteit");
                $get->execute();

                foreach ($get->fetchAll() as $row) {

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
            else{

                    $submit = $_POST['zoek'];
                    $get = $conn->prepare("SELECT Titel, Omschrijving, URL FROM Bron WHERE Titel = '$submit' ORDER BY prioriteit");
                    $get->execute();

                    foreach ($get->fetchAll() as $row) {

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


        } else{

            if(isset($_POST["Noten"]) || isset($_POST["NotenHome"])){


                $noten = $_POST['Noten'];

                $get = $conn->prepare("SELECT Titel, Omschrijving, URL FROM Bron WHERE categorie = '$noten' ORDER BY prioriteit");
                $get->execute();

                foreach ($get->fetchAll() as $row) {

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

            if(isset($_POST["Youtuber"])) {

                $Youtuber = $_POST['Youtuber'];

                $get = $conn->prepare("SELECT Titel, Omschrijving, URL FROM Bron WHERE categorie='$Youtuber' ORDER BY prioriteit");
                $get->execute();

                foreach ($get->fetchAll() as $row) {

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

            if(isset($_POST["Games"])) {

                $Games = $_POST['Games'];

                $get = $conn->prepare("SELECT Titel, Omschrijving, URL FROM Bron WHERE categorie='$Games' ORDER BY prioriteit");
                $get->execute();

                foreach ($get->fetchAll() as $row) {

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

            if(isset($_POST["Memes"])) {

                $Memes = $_POST['Memes'];

                $get = $conn->prepare("SELECT Titel, Omschrijving, URL FROM Bron WHERE categorie='$Memes' ORDER BY prioriteit");
                $get->execute();

                foreach ($get->fetchAll() as $row) {

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

            } else if(!isset($_POST['Noten']) && !isset($_POST['Youtuber']) && !isset($_POST['Games']) && !isset($_POST['Memes'])){


                    $get = $conn->prepare("SELECT Titel, Omschrijving, URL FROM Bron ORDER BY prioriteit");
                    $get->execute();

                    foreach ($get->fetchAll() as $row) {

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




        ?>
    </div>

</div>



<div id="table3" style="float:left">

</div>



<div id="table4">

</div>



</body>

</html>
