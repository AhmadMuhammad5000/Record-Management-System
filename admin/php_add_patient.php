<?php require_once "add_patient.php";
      require_once "../database/db.php";

// Checking to see if add button is clicked
  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])){
    // chechking to see if the inputs are empty
      if(empty($_POST['name']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['address'])
      || empty($_POST['phone']) || empty($_POST['gender'])) {
            echo '<center><p id="p"> one or more field can\'t be empty </p></center>';
              // else if they are not empty, it will insert the datra into database    
      } else{
        // Generating ramdom numbers for each users
          $unique = rand(time(),100000);
          // criminal inputs.... 
          $name = $conn->real_escape_string(trim($_POST["name"]));
          $username = $conn->real_escape_string(trim($_POST["username"]));
          $pass = $conn->real_escape_string(trim($_POST["password"]));
          $pass = password_hash($pass,PASSWORD_DEFAULT);
          $address = $conn->real_escape_string(trim($_POST["address"]));
          $phone = $conn->real_escape_string(trim($_POST['phone']));
          $gender = $conn->real_escape_string($_POST['gender']);
          $date = date("Y-m-d");

            // Check if there is already same username
             $check = $conn->prepare("SELECT username FROM patients WHERE username = ?");
             $check->bind_param("s",$username);
             $check->execute();

             $checkres = $check->get_result();
             if($checkres->num_rows > 0){
                echo '<center><p id="p"> Username is already been taking! </p></center>';
             } else{

              // checking if there is same current user in db
              $query = $conn->prepare("SELECT * FROM patients WHERE username = ?"); 
              $query->bind_param('s',$username);
              $query->execute();
              $rs = $query->get_result();
              if($rs->num_rows > 1){
                echo '<center><p id="p"> Username has been taken ! </p></center>';  
              } else{
                 // inserting into database
                 $query = $conn->prepare("INSERT INTO patients(unique_id,name,username,password,address,phone,gender,date) 
                 VALUES(?,?,?,?,?,?,?,?)");
                 $query->bind_param('isssssss',$unique,$name,$username,$pass,$address,$phone,$gender,$date);
                 $query->execute();

                if($query){
                     echo '<center><p id="p"> Successfully Added! </p></center>';
               } else{
                    echo '<center><p id="p"> Something went wrong </p></center>';
               }

              }

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