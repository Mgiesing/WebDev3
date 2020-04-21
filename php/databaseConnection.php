<?php
//function to connect to database (easier use)
function connectdb()
{
    $servername = "localhost";
    $username = "student";
    $password = "student";
    $dbname = "Binask";


    //$conn = new PDO("mysql:host=$servername; $dbname =Binask", $username, $password);
    // set the PDO error mode to exception
    //return $conn;

    $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    return $conn;

    $conn->close();
}

?>
