<?php
require_once("databaseConnection.php");


if (isset($_POST['registerFormSubmit'])) {
    //Get username/password from form
    $email = $_POST['username'];
    $password = $_POST['password'];
    $passwordVerify = $_POST['passwordVerify'];

    //Check if user exists
    $check = userExists($email);

    //Check amount of items and check if the user excists or not.
    if (isset($check) && count($check) > 1) {
        $_SESSION['error'] = "Deze gebruiker bestaat al.";
    } else {
        createUser($email, $password, $passwordVerify);
    }

}

// Create user Function
function createUser($email, $password, $passwordVerify)
{
    // Username/Password has to be < 1 and password check if the same password got filled it.
    if (strlen($email) < 1) $error = "Ongeldige gebruikersnaam";
    else if (strlen($password) < 1) $error = "Ongeldig wachtwoord";
    else if (strlen($password) < 1) $error = "Ongeldig wachtwoord";
    else if ($password != $passwordVerify) $error = "Wachtwoorden zijn niet het zelfde.";

    //If there was a error, set it in the session so it can be displayed to the user.
    if (isset($error)) $_SESSION['error'] = $error;
    else {
        //Hash user password
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $code = uniqid();
        //Connect to database
        $conn = connectdb();

        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO Users (email, password, Docent) VALUES (?, ?, 0)");
        $stmt->bind_param("sss", $email, $hash, $groupid);
        $stmt->execute();

        $_SESSION['error'] = "Account aangemaakt!";


        $stmt->close();
        $conn->close();
    }

}

function userExists ($email) {
    //Connect to database
    $conn = connectdb();

    //Check if user exists in database
    $sql = "SELECT * FROM Users WHERE email=?"; // SQL with parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    $user = $result->fetch_assoc(); // fetch data

    return $user;

    $stmt->close();
    $conn->close();
}

?>