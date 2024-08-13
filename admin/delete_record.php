<?php  require_once "../database/db.php";
       require_once "admin_session.php";

if(isset($_GET["ref"])) {
    $ref = $conn->real_escape_string($_GET["ref"]);
    // checking the specific doctor in database
    $sql = $conn->prepare("DELETE FROM records WHERE reference_id=?");
    $sql->bind_param("i",$ref);
    $sql->execute();

     if($sql){
          echo '<script> alert("Deleted Successfully!") </script>';
          header("location: admin_dashboard.php");
    } else{
         echo '<script> alert("No such user found!") </script>';
         header("location: admin_dashboard.php");
    }
}

?>