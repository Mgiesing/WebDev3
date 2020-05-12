<?php
if (isset($_SESSION['username']) && $_SESSION['Docent'] == !true){
    header("Location: Index.php");
}
