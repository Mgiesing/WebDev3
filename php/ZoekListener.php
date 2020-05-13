<?php

require 'Zoekfunction.php';



if(!isset($_POST['zoek']) && !isset($_POST["checkbox"]) && !isset($_POST["Noten"]) && !isset($_POST["Youtuber"]) && !isset($_POST["Games"]) && !isset($_POST["Memes"])){
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

            TextBoxfilter($_POST["Noten"]);
        }

        if (isset($_POST["Youtuber"])) {

            TextBoxfilter($_POST["Youtuber"]);
        }

        if (isset($_POST["Games"])) {

            TextBoxfilter($_POST["Games"]);

        }

        if (isset($_POST["Memes"])) {

            TextBoxFilter($_POST["Memes"]);

        } else if (!isset($_POST['Noten']) && !isset($_POST['Youtuber']) && !isset($_POST['Games']) && !isset($_POST['Memes'])) {

            TextBox();

        }
    }
