<?php 
       require_once "laboratory_session.php";
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

    <title>Add Test</title>
</head>
<body>
<?php require_once "laboratory_header.php"; ?> <br><br>
      <div class="container1">
        <div class="sub_container">
            <div class="bg bg-success">
               <h3 class="text-light"> Add Blood Test</h3>
            </div>
            
                 <form id="form" action="php_add_labTest.php" method="POST" class="form-control" autocomplete="off" enctype="multipart/form-data">   
                  <div class="flex1">
                       <div class="div">
                           <label for="name"> Username </label><br>
                           <input type="text" name="name" class="form-control" placeholder="Username">
                       </div>

                       <div class="div">
                           <label for="name"> Test </label><br>
                           <input type="text" class="form-control" name="test" placeholder="Test Type">
                       </div>
                   </div>

                   <div class="flex1">
                       <div class="div">
                           <label for="name"> Address </label><br>
                           <input type="text" class="form-control" name="address" placeholder="Address">
                       </div>

                       <div class="div">
                           <label for="name"> Phone </label><br>
                           <input type="text" class="form-control" name="phone" pattern="[1-0]" placeholder="Phone">
                       </div>
                     </div>

                       <div class="div">
                           <label for="name"> Gender </label><br>
                           <select name="gender" class="form-control">
                             <option value="male">Male</option>
                             <option value="female">Female</option>
                           </option>
                       </div> 

                     <div class="div">
                         <input type="submit" id="add" name="add" class="form-control btn btn-success" value="Save">
                     </div>

            </form>
        </div>

    </div>


</body>
</html>