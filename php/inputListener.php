<?php

require_once 'inputfunction.php';
// When someone doesn't have a Id, there are send to the login.php page. 
if (isset($_SESSION['Id'])) {
    header('Location: login.php');
}

$conn = connectdb();

if(!isset($_POST["GetText"]))
            {
                Get();
            }


if (isset($_POST["submit"])) {

    AddText();
}



if (isset($_POST['update'])) {

    UpdateText();

}

if(isset($_POST['GetText'])){

 GetTheText();

}

if (isset($_POST['delete'])){

 DeleteText();

}

if (isset($_POST['DeleteGebruiker']))
{
    DeleteUser();
}
