<?php
//function to connect to database (easier use)
function connectdb()
{
    $dbUsername = "student";
    $dbPassword = "student";
    $dbHostname = "localhost";
    $dbName = "WebdevBinas";

    // Create connection
    $conn = new mysqli($dbHostname, $dbUsername, $dbPassword, $dbName);


//    // Check connection
//    if ($conn->connect_error) {
//        die("Connection failed: " . $conn->connect_error);
//    }
//    echo "Connected successfully";

    return $conn;

    $conn->close();
}


