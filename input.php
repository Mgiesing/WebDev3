<?php

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

if(isset($_POST["submit"])){

    $Titel = $_POST['Titel'];
    $omschrijving = $_POST['omschrijving'];
    $URL = $_POST['URL'];
    $categorie = $_POST['categorie'];
    $Prioriteit = $_POST ['prioriteit'];

    $query = "INSERT INTO Bron (Titel, Omschrijving, URL, categorie, prioriteit ) VALUES ('$Titel', '$omschrijving', '$URL', '$categorie', '$Prioriteit')";
    if ($conn->exec($query) === TRUE) {

    }
}



?>
<html lang="nl"><head>
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

                    if (!isset($_SESSION['email'])) {
                        echo '<a class="nav-item"><a class="nav-link" href="Index.php">Home</a>';

                    }

                    if (isset($_SESSION['email'])) {
                        echo '<a class="nav-item active"><a class="nav-link" href="input.php">Database</a>';
                        echo '<a class="nav-item"><a class="nav-link" href="#">Portfolio</a>';
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
    <title>docentenpage</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
            <input type="submit" value="Zoek">

        </form>
    </div>
</div>



</body>
</html>
