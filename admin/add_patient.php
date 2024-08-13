<?php 
      require_once "admin_session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/Hospital System/CSS/bootstrap-5.1.3-dist/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/Hospital System/CSS/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../CSS/add_staff.css">

    <title>Add Patient</title>
</head>
<body>
<?php require_once "header.php"; ?> <br><br>
      <div class="container1">
        <div class="sub_container">
            <div class="bg bg-success">
               <h3 class="text-light"> Add Patient </h3>
            </div>
            
                 <form id="form" action="php_add_patient.php" method="POST" class="form-control" autocomplete="off" enctype="multipart/form-data">   
                  <div class="flex1">  
                      <div class="div">
                           <label for="name"> Full Name </label><br>
                           <input type="text" name="name" class="form-control" placeholder="patient name">
                       </div>

                       <div class="div">
                           <label for="name"> Username </label><br>
                           <input type="text" name="username" class="form-control" placeholder="User Name">
                       </div>
                   </div>

                   <div class="flex1">
                       <div class="div">
                           <label for="name"> Address </label><br>
                           <input type="text" name="address" class="form-control" placeholder="Address">
                       </div>

                       <div class="div">
                           <label for="name"> Phone </label><br>
                           <input type="text" name="phone" class="form-control"  placeholder="Phone Number">
                       </div>
                  </div>
                  
                       <div class="div">
                           <label for="gender"> Gender </label><br>
                           <select name="gender" class="form-control">
                             <option value="male"> Male </option>
                             <option value="female"> Female </option>
                           </select>
                       </div>

                       <div class="div">
                           <label for="name"> Password </label><br>
                           <input type="password" name="password" class="form-control" placeholder="password">
                       </div>
             
                     <div class="div">
                         <input type="submit" id="add" name="add" class="form-control btn btn-success" value="Add Patient">
                     </div>

            </form>
        </div>

    </div>


</body>
</html>