<?php session_start();

// checking if admin did'nt login and is trying to access a page
if(!isset($_SESSION["admin_id"]) || !isset($_SESSION["admin_email"])) {
    header("location: login.php");
}

?>