<?php require_once "../database/db.php";
      require_once "admin_session.php"; 

    //   getting staffs id, that is going to be edited
    if(isset($_GET["ref"])) {
        $ref = $conn->real_escape_string($_GET["ref"]);

        // checking the specific record in database
        $sql = $conn->prepare("SELECT * FROM records WHERE reference_id=?");
        $sql->bind_param("i",$ref);
        $sql->execute();

        $res = $sql->get_result();

        // checking to see whether there is that record in db
        if($res->num_rows > 0){
            // fetching from db
            $fetch = $res->fetch_assoc();

            $sn = $fetch["id"];
            $reference = $fetch["reference_id"];
            $name = $fetch["username"];
            $sickness = $fetch["sickness"];
            $drug = $fetch["drug"];
            $doctor = $fetch["doctor"];
            $desc = $fetch["description"];
            $address = $fetch["address"];
            $phone = $fetch["phone"];
            $gender = $fetch["gender"];
            $date = $fetch["date"];

        } else{
             echo '<script> alert("No such record is found!") </script>';
             header("location: admin_dashboard.php");
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
        <title>Edit Lab Record</title>
    </head>
    <body>
        <?php require_once "header.php"; ?> <br><br>

        <div class="container1">
        <div class="sub_container">
            <div class="bg bg-success">
               <h3 class="text-light"> Edit Record </h3>
            </div>
            
                <form id="form" action="php_edit_record.php" method="POST" class="form-control" autocomplete="off" enctype="multipart/form-data">   
                   <div class="flex1">
                       <div class="div">
                           <label for="name"> User Name </label><br>
                           <input type="hidden" name="unique" class="form-control" value="<?php echo $ref; ?>">
                           <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                       </div>

                       <div class="div">
                           <label for="name"> Sickness </label><br>
                           <input type="text" name="sickness" class="form-control" value="<?php echo $sickness; ?>">
                       </div>
                   </div>

                   <div class="flex1">
                       <div class="div">
                           <label for="name"> Drug </label><br>
                           <input type="text" name="drug" class="form-control" value="<?php echo $drug; ?>">
                       </div>

                      <div class="div"> 
                           <label for="name"> Description </label><br>
                           <input type="text" name="description" class="form-control" placeholder="Description">
                       </div>
                   </div>
                   
                       <div class="div">  
                          <label for="phone"> Address </label><br>
                          <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
                      </div>

                      <div class="div">  
                          <label for="phone"> Phone </label><br>
                          <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>">
                      </div>

                      <select name="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                      </select>


                       <div class="div">
                           <input type="submit" id="add" name="update" class="form-control btn btn-success" value="Update Record">
                       </div>

            </form>
        </div>

    </div>

    </body>
    </html>