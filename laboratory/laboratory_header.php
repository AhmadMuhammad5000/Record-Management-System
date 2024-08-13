<?php 
      require_once "laboratory_session.php"; 
      $image = "laboratry.jpg";
      $id = $_SESSION['laboratory_unique'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/Hospital System/CSS/bootstrap-5.1.3-dist/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/Hospital System/CSS/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../CSS/header.css">

    <title>Laboratory</title>
</head>
<body>
    <div class="all">
        <div class="header">     
            <h2 id="admin"><span>Hospital System</span></h2>
                 <span class="toggler" id="toggler">&#9776</span>
             <div class="sub_header">
             <img draggable="false" class="image" src="../Images/<?php echo $image; ?>">                         
                   <ul>    
                      <li class="logout"><a href="laboratory_logout.php?session=<?php echo $id; ?>">Log out</a></li>
                   </ul>
            </div>   

        </div>

         <!-- starting side menu -->
         <div id="sidemenu" class="sidemenu">
            <ul class="side_ul"> <br>
                <li><a href="laboratory_dashboard.php"><button><i class="fa fa-home"></i></button>Dashboard</a></li>
                <li><a href="add_lab_record.php"><button><i class="fa fa-plus"></i></button>Add Test</a></li>
                <li><a href="laboratory_logout.php?session=<?php echo $id; ?>"><button><i class="fa fa-close"></i></button>Log out</a></li>

           </ul>
       </div> <br>


 </div> <!-- this end of boxes -->
       
    </div> <br> <!-- this end of all div -->

    <!-- JavaScript -->
    <script src="../JavaScript/header.js"></script>

</body>
</html>