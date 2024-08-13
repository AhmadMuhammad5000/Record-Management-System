<?php require_once "recordUnit_session.php";
      require_once "../database/db.php";

    if(isset($_GET["session"])) {
          session_destroy();
          header("location: recordlogin.php");
      }

?>