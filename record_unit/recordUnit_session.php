<?php session_start();

// checking if admin did'nt login and is trying to access a page
if(!isset($_SESSION["recordUnit_unique"]) || !isset($_SESSION["recordUnit_email"])) {
    header("location: recordlogin.php");
}

?>