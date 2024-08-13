<?php session_start();

// checking if admin did'nt login and is trying to access a page
if(!isset($_SESSION["patient_unique"]) || !isset($_SESSION["patient_username"])) {
    header("location: plogin.php");
}

?>