<?php
function ShowNavbar(){
    if (!isset($_SESSION['username'])) {
        echo '<a class="nav-item active"><a class="nav-link" href="Index.php">Home</a>';

    }

    if(isset($_SESSION['username'])) {
        if ($_SESSION['Docent'] == !true) {
            echo '<a class="nav-item active"><a class="nav-link" href="Index.php">Home</a>';
            echo '<a class="nav-item active"><a class="nav-link" href="Zoek.php">Zoek Bronnen</a>';
            echo '<a class="nav-item active"><a class="nav-link" href="#">Portfolio</a>';
            echo '<a style="color: white;" class="nav-link" href="logoutListener.php">Logout</a>';
        }

        if ($_SESSION['Docent'] == true) {
            echo '<a class="nav-item active"><a class="nav-link" href="Index.php">Home</a>';
            echo '<a class="nav-item active"><a class="nav-link" href="input.php">Database</a>';
            echo '<a class="nav-item active"><a class="nav-link" href="Zoek.php">Zoek Bronnen</a>';
            echo '<a class="nav-item active"><a class="nav-link" href="#">Portfolio</a>';
            echo '<a class="nav-item active"><a class="nav-link" href="signup.php">Create Account</a>';
            echo '<a style="color: white;" class="nav-link" href="logoutListener.php">Logout</a>';

        }


    }
}

function logbutton(){

    if (!isset($_SESSION['username'])) {
        echo '<button class="nav-item active"><a class="nav-link" href="login.php">Inloggen</a></button>';

    }
    if (isset($_SESSION['username'])) {
        echo "<form>";
        echo '<a style="color: black;" class="nav-link" href="logoutListener.php">Logout</a>';
        echo "</form>";


    }
}
