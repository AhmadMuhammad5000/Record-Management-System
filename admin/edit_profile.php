<?php require_once "../database/db.php";
       require_once "admin_session.php"; 

    //   getting admin id, that is going to be edited
    if(isset($_GET["unique"])) {
        $unique = $conn->real_escape_string($_GET["unique"]);
       
        // checking the specific patient in database
        $sql = $conn->prepare("SELECT * FROM admindb WHERE id=?");
        $sql->bind_param("i",$unique);
        $sql->execute();

        $res = $sql->get_result();

        // checcking to see whether there is that patience in db
        if($res->num_rows > 0){
            // fetching from db
            $fetch = $res->fetch_assoc();
            $name = $fetch["username"];
            $email = $fetch["email"];

        } else{
             echo '<script> alert("No such user found!") </script>';
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
        <link rel="stylesheet" href="http://localhost/Hospital System/CSS/font-awesome-4.7.0/css/font-awesome.min.css">        <link rel="stylesheet" href="CSS/add_doctor.css">
        <link rel="stylesheet" href="../CSS/add_staff.css">
        <title>Edit Profile</title>
    </head>
    <body>
        <?php require_once "header.php"; ?> <br><br>

        <div class="container1">
        <div class="sub_container">
            <div class="bg bg-success text-light"><h4 align="center"> Admin Update</h4></div>
            <form method="post" action="php_edit_admin.php" class="form-control" autocomplete="off" enctype="multipart/form-data">
               <div class="div"> <br>
                  <label for="name"> Admin Name </label><br>
                  <input type="hidden" value="<?php echo $unique; ?>" name="unique">
                  <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
              </div>

              <div class="div">  
                  <label for="email">Admin Email </label><br>
                  <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
              </div>

              <div class="div">  
                  <label for="password"> Admin Password </label><br>
                  <input type="password" name="password" class="form-control" placeholder="Admin password">
              </div>

              <div class="div">
                  <input type="submit" name="update" class="form-control btn btn-success" value="Update Profile">
              </div>

            </form>
        </div>

    </div>

    </body>
    </html>