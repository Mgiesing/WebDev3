<?php

require 'Zoekfunction.php';



if(!isset($_POST['zoek']) && !isset($_POST["checkbox"])){
    TextBox();
}


if(isset($_POST["zoek"])) {
    if (empty($_POST['zoek'])) {

        TextBox();

    } else {

        TextBoxZoek();

    }
}



    if(isset($_POST['checkbox']) || isset($_POST["Noten"]) || isset($_POST["Youtuber"]) || isset($_POST["Games"]) || isset($_POST["Memes"])) {


        if (isset($_POST["Noten"])) {

            TextBoxNoten();
        }

        if (isset($_POST["Youtuber"])) {

            TextBoxYoutuber();
        }

        if (isset($_POST["Games"])) {

            TextBoxGames();

        }

        if (isset($_POST["Memes"])) {

            TextBoxMemes();

        } else if (!isset($_POST['Noten']) && !isset($_POST['Youtuber']) && !isset($_POST['Games']) && !isset($_POST['Memes'])) {

            TextBox();

        }
    }
