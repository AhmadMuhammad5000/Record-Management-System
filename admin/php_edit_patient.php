<?php  require_once "../database/db.php";

    //   chechking if the admin click on update button
    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["update"])){
        // chechking to see if the inputs are empty
        if(empty($_POST['name']) || empty($_POST['username']) || empty($_POST['address']) || empty($_POST['password'])){
                echo '<center><p id="p"> one or more field can\'t be empty </p></center>';
                  // else if they are not empty, it will update the data into database    
        } else{
            // validating the inputs
                $unique = $conn->real_escape_string(trim($_POST["unique"]));
                $name = $conn->real_escape_string(trim($_POST["name"]));
                $username = $conn->real_escape_string(trim($_POST["username"]));
                $address = $conn->real_escape_string(trim($_POST["address"]));
                $phone = $conn->real_escape_string(trim($_POST["phone"]));
                $gender = $conn->real_escape_string(trim($_POST["gender"]));
                $password = $conn->real_escape_string(trim($_POST["password"]));
                $password = password_hash($password,PASSWORD_DEFAULT);
                
            // updating the database
            $sql = $conn->prepare("UPDATE patients set name =?,username =?,address =?, phone =?, gender =?, password =? WHERE unique_id=?");
            $sql->bind_param("ssssssi",$name,$username,$address,$phone,$gender,$password,$unique);
            $sql->execute();

            if($sql){
                header("location: view_patients.php");
            } else{
                header("location: php_edit_patient?unique=".$unique.".php");
               
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
