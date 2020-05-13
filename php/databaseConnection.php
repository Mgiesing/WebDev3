<?php
//function to connect to database (easier use)
function connectdb()
{
    $servername = "localhost";
    $username = "student";
    $password = "student";
    $dbname = "Binask";


  

    $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

?>
