<?php require_once "../database/db.php"; 
       require_once "pharmacy_session.php"; 

// fetching admin from db
 $sql = $conn->prepare("SELECT * FROM admindb");
 $sql->execute();
 $rs = $sql->get_result();

 if($rs->num_rows > 0){
    $row = $rs->fetch_assoc();
    $id = $row["id"];
 }


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

    <title>Pharmacy</title>
</head>
<body>
    <div class="all">
        <div class="header">     
            <h2 id="admin"><span>Hospital System</span></h2>
                 <span class="toggler" id="toggler">&#9776</span>
             <div class="sub_header">
                  <h4>Pharmacy Dept</h4>             
                   <ul>    
                      <li class="logout"><a href="pharmacy_logout.php?session=<?php echo $id; ?>">Log out</a></li>
                   </ul>
            </div>   

        </div>

         <!-- starting side menu -->
         <div id="sidemenu" class="sidemenu">
            <ul class="side_ul"> <br>
                <li><a href="pharmacy_dashboard.php"><button><i class="fa fa-home"></i></button>Dashboard</a></li>
                <li><a href="pharmacy_logout.php?session=<?php echo $id; ?>"><button><i class="fa fa-edit"></i></button>Log out</a></li>
           </ul>
       </div> <br>
       
    </div> <br> <!-- this end of all div -->


    <!-- JavaScript -->
    <script src="../JavaScript/header.js"></script>

</body>
</html>