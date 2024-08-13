<?php require_once "patient_session.php";
      require_once "../database/db.php";

    if(isset($_GET["session"])) {
          session_destroy();
          header("location: plogin.php");
      }

?>