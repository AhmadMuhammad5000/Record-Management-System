<?php  require_once "../database/db.php"; 
       require_once "patient_session.php"; 

      $unique = $_SESSION["patient_unique"];

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

    <title>Patient</title>
</head>
<body>
    <div class="all">
        <div class="header">     
            <h2 id="admin"><span>Hospital System</span></h2>
                 <span class="toggler" id="toggler">&#9776</span>
             <div class="sub_header">
                 <h3><?php echo $_SESSION['patient_username']; ?></h3>            
                   <ul>    
                      <li class="logout"><a href="patient_logout.php?session=<?php echo $unique; ?>">Log out</a></li>
                   </ul>
            </div>   

        </div>

         <!-- starting side menu -->
         <div id="sidemenu" class="sidemenu">
            <ul class="side_ul"> <br>
                <li><a href="patient_dashboard.php"><button><i class="fa fa-home"></i></button>Dashboard</a></li>
                <li class="logout"><a href="patient_logout.php?session=<?php echo $unique; ?>"><button><i class="fa fa-close"></i></button>Log out</a></li>
           </ul>
       </div> <br>

    </div> <br> <!-- this end of all div -->

    <!-- JavaScript -->
    <script src="../JavaScript/header.js"></script>

</body>
</html>