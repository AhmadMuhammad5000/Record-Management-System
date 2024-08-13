<?php require_once "add_record.php";
      require_once "../database/db.php";

// Checking to see if add button is clicked
  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])){
    // chechking to see if the inputs are empty
      if(empty($_POST['name']) || empty($_POST['sickness']) || empty($_POST['drug']) || empty($_POST['description']) 
       || empty($_POST['address']) || empty($_POST['phone']) || empty($_POST['gender'])) {
            echo '<center><p id="p"> one or more field can\'t be empty </p></center>';
              // else if they are not empty, it will insert the datra into database    
      } else{
        // Generating refeence numbers for each users
          $ref = rand(time(),100);
          // record inputs.... 
          $name = $conn->real_escape_string(trim($_POST["name"]));
          $sickness = $conn->real_escape_string(trim($_POST["sickness"]));
          $drug = $conn->real_escape_string(trim($_POST["drug"]));
          $description = $conn->real_escape_string(trim($_POST["description"]));
          $address = $conn->real_escape_string(trim($_POST["address"]));
          $phone = $conn->real_escape_string(trim($_POST["phone"]));
          $gender = $conn->real_escape_string(trim($_POST["gender"]));
          $date = date("Y-m-d");
          $doctor = $_SESSION['doctor_name'];

         // checking if the user already exist
         $sql = $conn->prepare("SELECT username FROM patients WHERE username = ?");
         $sql->bind_param('s',$name);
         $sql->execute();
         $result = $sql->get_result();
           if($result->num_rows > 0){     
            // inserting into database
              $query = $conn->prepare("INSERT INTO records(reference_id,username,sickness,drug,doctor,description
              ,date,address,phone,gender,staff_id) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
              $query->bind_param('isssssssssi',$ref,$name,$sickness,$drug,$doctor,$description,$date,$address,
              $phone,$gender,$_SESSION['doctor_unique']);
              $query->execute();

        if($query){
              echo '<center><p id="p"> Successfully Added! </p></center>';
             
         } else{
              echo '<center><p id="p"> Something went wrong </p></center>';

         }

        } else{
          echo '<center><p id="p"> User does not exist ! </p></center>';

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

 <!-- <styling error and success message -->
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