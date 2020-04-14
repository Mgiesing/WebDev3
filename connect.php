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
