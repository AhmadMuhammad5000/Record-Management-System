<?php  require_once "../database/db.php";
       require_once "admin_session.php";

if(isset($_GET["unique"])) {
    $id = $conn->real_escape_string($_GET["unique"]);
    // checking the specific doctor in database
    $sql = $conn->prepare("DELETE FROM staffs WHERE unique_id=?");
    $sql->bind_param("i",$id);
    $sql->execute();

     if($sql){
          echo '<script> alert("Deleted Successfully!") </script>';
          header("location: view_staffs.php");
    } else{
         echo '<script> alert("No such user found!") </script>';
         header("location: view_staffs.php");
    }
}

?>