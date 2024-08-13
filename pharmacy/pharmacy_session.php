<?php session_start();

// checking if admin did'nt login and is trying to access a page
if(!isset($_SESSION["pharmacy_unique"]) || !isset($_SESSION["pharmacy_email"])) {
    header("location: pharmlogin.php");
}

?>