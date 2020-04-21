<?php
require_once("databaseConnection.php");


if(isset($_POST['loginFormSubmit'])) {
    //Get username/password from form
    $email = $_POST['username'];
    $password = $_POST['password'];


    //Check if user exists
    $check = userExists($email);

    //Username/password has to be > 1
    if (isset($check) && count($check) > 1) {
        userLogin($email, $password);
    } else {
        $_SESSION['error'] = 'Email of wachtwoord onjuist';
    }

}

//Check if user excists function

function userExists ($email) {

    //Connect to database
    $conn = connectdb();

    //Check if user exists in database
    $sql = "SELECT password FROM Users WHERE email=?"; // SQL with parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    $user = $result->fetch_assoc(); // fetch data

    return $user;

    $stmt->close();
    $conn->close();
}

//Login function
function userLogin ($email, $password) {
    $conn = connectdb();

    //Check if user exists in database

    $sql = "SELECT * FROM Users WHERE email=?"; // SQL with parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    $user = $result->fetch_assoc(); // fetch data

    //Check if username/password is correct and if match

    if (password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['username'] = $user['username'];
        $_SESSION['code'] = $user['code'];
        $_SESSION['error'] = 'Login successvol.';
    } else {
        $_SESSION['error'] = 'Email of wachtwoord onjuist';
    }


    $stmt->close();
    $conn->close();

}

?>