<?php require_once "laboratory_session.php";
      require_once "../database/db.php";

    if(isset($_GET["session"])) {
          session_destroy();
          header("location: lablogin.php");
      }

?>