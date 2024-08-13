<?php require_once "nurse_session.php";
      require_once "../database/db.php";

    if(isset($_GET["session"])) {
          session_destroy();
          header("location: nurselogin.php");
      }

?>