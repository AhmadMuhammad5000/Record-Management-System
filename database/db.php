<?php 
    $host = "localhost";
    $name = "root";
    $pass = "";
    $db = "hospital";

    $conn = new mysqli($host,$name,$pass,$db) or die("mysql failed to connect ".mysqli_error());

   
    
?>