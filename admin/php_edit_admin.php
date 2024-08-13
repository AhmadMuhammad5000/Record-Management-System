
<?php require_once "../database/db.php";

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
      // validating admin inputs
    if(empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["password"])) {
       echo '<script> alert("one or more field can\'t be empty")</script>';
   } else{ 
    //    assigning vthem to variables
    $unique = $conn->real_escape_string(trim($_POST["unique"]));
    $name = $conn->real_escape_string(trim($_POST["name"]));
    $email = $conn->real_escape_string(trim($_POST["email"]));
    $pass = $conn->real_escape_string(trim($_POST["password"]));

    $sql = $conn->prepare("UPDATE admindb set username=?,email=?,password=? WHERE id=?");
    $sql->bind_param("sssi",$name,$email,$pass,$unique);
    $sql->execute();

        header("location: admin_dashboard.php");

        }

     }

?>
