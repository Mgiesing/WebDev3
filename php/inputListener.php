<?php

require_once 'inputfunction.php';
// When someone doesn't have a Id, there are send to the login.php page. //Marco
if (isset($_SESSION['Id'])) {
    //TODO: Implemnt multile types of users: a.k.a. Student, Manager enz. and change the page accordingly.
    header('Location: login.php');
}

$conn = connectdb();

if(!isset($_POST["GetText"]))
{
    Get();
}


if (isset($_POST["submit"])) {
    if(empty($_POST['Titel'])|| empty($_POST['omschrijving']) || empty($_POST['URL']) || empty($_POST['categorie']) || empty($_POST['prioriteit'])) {

        return;
    }
    else {
        AddText();
    }
}



if (isset($_POST['update'])) {

    UpdateText();

}

if(isset($_POST["GetText"])){

 GetTheText();

}

if (isset($_POST['delete'])){

 DeleteText();

}

if (isset($_POST['DeleteGebruiker']))
{
    DeleteUser();
}
