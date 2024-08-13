<?php  require_once "../database/db.php";
        require_once "admin_session.php"; 

    //   chechking if the admin click on update button
    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["update"])){
        // chechking to see if the inputs are empty
        if(empty($_POST['name']) || empty($_POST['sickness'])  || empty($_POST['drug']) || empty($_POST['description'])
        || empty($_POST['address'])){
                echo '<center><p id="p"> one or more field can\'t be empty </p></center>';    
        } else{
            // validating the inputs
                $ref = $conn->real_escape_string(trim($_POST["unique"]));
                $name = $conn->real_escape_string(trim($_POST["name"]));
                $sickness = $conn->real_escape_string(trim($_POST["sickness"]));
                $drug = $conn->real_escape_string(trim($_POST["drug"]));
                $desc = $conn->real_escape_string(trim($_POST["description"]));
                $address = $conn->real_escape_string(trim($_POST["address"]));
                $phone = $conn->real_escape_string(trim($_POST["phone"]));
                $gender = $conn->real_escape_string(trim($_POST["gender"]));
                
            // updating the database
            $sql = $conn->prepare("UPDATE records set username =?, sickness =? ,drug =? ,description =? 
            ,address =? , phone =?, gender =? WHERE reference_id=?");
            $sql->bind_param("sssssssi",$name,$sickness,$drug,$desc,$address,$phone,$gender,$ref);
            $sql->execute();

            if($sql){
                header("location: admin_dashboard.php");
            } else{
                echo "<script> alert('something went wrong') </script>";
                header("location: edit_record?ref=".$ref.".php");
            }

             
     }
    }
    

?>


<!-- making the error and success message interective(dissmiss after 2seconds) -->
<script>
       var p = document.getElementById("p");
       setTimeout(() => {
           p.style.display = "none";
       },2000);
    </script>

 <!-- styling error and success message -->
<style>
   p {
      background: lightgreen;
      border-radius: 2%;
      padding: 0.4%;
      text-align: center;
      width: 40%;
      position: absolute;
      top: 18%;
      left: 30%;
  }

 </style>
