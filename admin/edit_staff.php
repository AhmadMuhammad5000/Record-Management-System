<?php require_once "../database/db.php";
      require_once "admin_session.php"; 

    //   getting staffs id, that is going to be edited
    if(isset($_GET["unique"])) {
        $unique = $conn->real_escape_string($_GET["unique"]);

        // checking the specific patient in database
        $sql = $conn->prepare("SELECT * FROM staffs WHERE unique_id=?");
        $sql->bind_param("i",$unique);
        $sql->execute();

        $res = $sql->get_result();

        // checking to see whether there is that staff in db
        if($res->num_rows > 0){
            // fetching from db
            $fetch = $res->fetch_assoc();

            $sn = $fetch["id"];
            $unique = $fetch["unique_id"];
            $name = $fetch["name"];
            $email = $fetch["email"];
            $department = $fetch["department"];
            $address = $fetch["address"];
            $phone = $fetch["phone"];
            $gender = $fetch["gender"];
            $password = $fetch["password"];

        } else{
             echo '<script> alert("No such user found!") </script>';
             header("location: view_staffs.php");
        }
    }


?>

    <!-- html start here -->

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://localhost/Hospital System/CSS/bootstrap-5.1.3-dist/bootstrap-5.1.3-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://localhost/Hospital System/CSS/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../CSS/add_staff.css">
        <title>Edit Staffs</title>
    </head>
    <body>
        <?php require_once "header.php"; ?> <br><br>

        <div class="container1">
        <div class="sub_container">
            <div class="bg bg-success">
               <h3 class="text-light"> Edit Staff </h3>
            </div>
            
                <form id="form" action="php_edit_staff.php" method="POST" class="form-control" autocomplete="off" enctype="multipart/form-data">   
                   <div class="flex1">       
                       <div class="div">
                           <label for="name"> Full Name </label><br>
                           <input type="hidden" name="unique" class="form-control" value="<?php echo $unique; ?>">
                           <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                       </div>

                      <div class="div"> 
                           <label for="name"> Email </label><br>
                           <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                       </div>
                   </div>

                   <div class="flex1">
                       <div class="div">
                           <label for="name"> Department </label><br>
                           <select name="department" id="speciality" class="form-control">
                              <option value="doctor">Doctor</option>
                              <option value="pharmacy">Pharmacy</option>
                              <option value="nurse">Nurse</option>
                              <option value="laboratory">Laboratory</option>
                              <option value="recordUnit">Record Unit</option>
                           </select>
                       </div>

                       <div class="div"> 
                           <label for="name"> Address </label><br>
                           <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
                       </div>
                   </div>

                       <div class="div"> 
                           <label for="name"> Phone </label><br>
                           <input type="phone" name="phone" class="form-control" value="<?php echo $phone; ?>">
                       </div>

                       <select name="gender" class="form-control">
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                       </select>       
                   
                       <div class="div"> 
                           <label for="name"> Passwod </label><br>
                           <input type="passwod" name="password" class="form-control" placeholder="password">
                       </div>


                       <div class="div">
                           <input type="submit" id="add" name="update" class="form-control btn btn-success" value="Update Staff">
                       </div>

            </form>
        </div>

    </div>

    </body>
    </html>