<?php session_start();

// checking if admin did'nt login and is trying to access a page
if(!isset($_SESSION["nurse_unique"]) || !isset($_SESSION["nurse_email"])) {
    header("location: nurselogin.php");
}

?>