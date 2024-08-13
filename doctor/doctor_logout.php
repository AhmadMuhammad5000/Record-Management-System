<?php require_once "doctor_session.php";
      require_once "../database/db.php";

    if(isset($_GET["session"])) {
          session_destroy();
          header("location: dlogin.php");
      }

?>