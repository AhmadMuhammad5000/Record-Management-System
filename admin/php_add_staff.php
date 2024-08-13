<?php require_once "add_staff.php";
      require_once "../database/db.php";
    //  require_once "admin_session.php"; 


// Checking to see if add button is clicked
  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])){
    // chechking to see if the inputs are empty
      if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['department']) || empty($_POST['password'])
       || empty($_POST['address']) || empty($_POST['phone']) || empty($_POST['gender'])) {
            echo '<center><p id="p"> one or more field can\'t be empty </p></center>';
              // else if they are not empty, it will insert the datra into database    
      } else{
        // Generating ramdom numbers for each users
          $unique = rand(time(),100000);
          // criminal inputs.... 
          $name = $conn->real_escape_string(trim($_POST["name"]));
          $email = $conn->real_escape_string(trim($_POST["email"]));
          $department = $conn->real_escape_string(trim($_POST["department"]));
          $address = $conn->real_escape_string($_POST['address']);
          $phone = $conn->real_escape_string($_POST['phone']);
          $gender = $conn->real_escape_string($_POST['gender']);
          $password = $conn->real_escape_string(trim($_POST["password"]));
          $password = password_hash($password,PASSWORD_DEFAULT);
          $date = date("Y-m-d");

         // inserting into database
         $query = $conn->prepare("INSERT INTO staffs(unique_id,name,email,address,phone,gender,password,department,date) 
         VALUES(?,?,?,?,?,?,?,?,?)");
         $query->bind_param('issssssss',$unique,$name,$email,$address,$phone,$gender,$password,$department,$date);
         $query->execute();

        if($query){
              echo '<center><p id="p"> Successfully Added! </p></center>';
        } else{
            echo '<center><p id="p"> Something went wrong </p></center>';
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