<?php require_once "pharmacy_session.php";
      require_once "../database/db.php";

    if(isset($_GET["session"])) {
          session_destroy();
          header("location: pharmlogin.php");
      }

?>