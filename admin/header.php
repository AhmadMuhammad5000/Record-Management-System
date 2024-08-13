<?php require_once "../database/db.php"; 
       require_once "admin_session.php"; 

// fetching admin from db
 $sql = $conn->prepare("SELECT * FROM admindb");
 $sql->execute();
 $rs = $sql->get_result();

 if($rs->num_rows > 0){
    $row = $rs->fetch_assoc();
    $id = $row["id"];
    $image =  "surgery.jpg";
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

    <title>Admin</title>
</head>
<body>
    <div class="all">
        <div class="header">     
            <h2 id="admin"><span>Hospital System</span></h2>
                 <span class="toggler" id="toggler">&#9776</span>
             <div class="sub_header">
                <img draggable="false" class="image" src="../Images/<?php echo $image; ?>"> </a>              
                   <ul>    
                      <li class="logout"><a href="admin_logout.php?session=<?php echo $id; ?>">Log out</a></li>
                   </ul>
            </div>   

        </div>

         <!-- starting side menu -->
         <div id="sidemenu" class="sidemenu">
            <ul class="side_ul"> <br>
                <li><a href="admin_dashboard.php"><button><i class="fa fa-home"></i></button>Dashboard</a></li>
                <li><a href="add_staff.php"><button><i class="fa fa-plus"></i></button>Add Staff</a></li>
                <li><a href="view_staffs.php"><button><i class="fa fa-users"></i></button>View Staffs</a></li>
                <li><a href="add_patient.php"><button><i class="fa fa-plus"></i></button>Add Patient</a></li>
                <li><a href="view_patients.php"><button><i class="fa fa-users"></i></button>View Patients</a></li>
                <li><a href="lab_records.php"><button><i class="fa fa-users"></i></button>Lab Records</a></li>
                <li><a href="edit_profile.php?unique=<?php echo $id; ?>"><button><i class="fa fa-edit"></i></button>Edit Profile</a></li>
           </ul>
       </div> <br>


 </div> <!-- this end of boxes -->
       
    </div> <br> <!-- this end of all div -->

    <!-- JavaScript -->
    <script src="../JavaScript/header.js"></script>

</body>
</html>