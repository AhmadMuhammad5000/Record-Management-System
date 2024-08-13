<?php session_start();

// checking if admin did'nt login and is trying to access a page
if(!isset($_SESSION["laboratory_unique"]) || !isset($_SESSION["laboratory_email"])) {
    header("location: lablogin.php");
}

?>