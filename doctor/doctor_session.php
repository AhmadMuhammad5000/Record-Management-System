<?php session_start();

// checking if admin did'nt login and is trying to access a page
if(!isset($_SESSION["doctor_unique"]) || !isset($_SESSION["doctor_email"])) {
    header("location: dlogin.php");
}

?>