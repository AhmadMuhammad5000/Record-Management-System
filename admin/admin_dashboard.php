<?php require_once "../database/db.php"; 
       require_once "admin_session.php"; 

// fetching admin from db
 $sql = $conn->prepare("SELECT * FROM admindb");
 $sql->execute();
 $rs = $sql->get_result();

 if($rs->num_rows > 0){
    $row = $rs->fetch_assoc();
    $id = $row["id"];
    $image = "surgery.jpg";
 }

//  staffs
$staffsCount = "";
$sql = $conn->prepare("SELECT * FROM staffs");
$sql->execute();
$rs = $sql->get_result();

if($rs->num_rows > 0){
   $staffsCount .= $rs->num_rows;
} else{
   $staffsCount .= 0;
}

// patients
$patientsCount = "";
$sql = $conn->prepare("SELECT * FROM patients");
$sql->execute();
$rs = $sql->get_result();

if($rs->num_rows > 0){
   $patientsCount .= $rs->num_rows;
} else{
   $patientsCount .= 0;
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
    <link rel="stylesheet" href="../CSS/admin_dashboard.css">
    <!-- including view staffs style for the record list -->
    <link rel="stylesheet" href="../CSS/view_staffs.css">

    <title>Admin</title>
</head>
<body>
    <div class="all">
        <div class="header">     
            <h2 id="admin"><span>Hospital System</span></h2>
                 <span class="toggler" id="toggler">&#9776</span>
             <div class="sub_header">
                <img draggable="false" class="image" src="../Images/<?php echo $image; ?>">             
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

       <!-- Boxes started here -->
        <div class="admin">
           <h3>Admin</h3> <br>
       </div>
    <div class="boxes" id="boxes">
       <!-- add staffs -->
       <div class="add_staff">
            <h3>Add Staff</h3><br>
             <span>  
               <i class="fa fa-plus"></i> 
               <a href="add_staff.php"><i id="add" class="fa fa-pencil"></i></a>
             </span>
        </div>

      <!-- View staffs -->
       <div class="view_staffs">
            <h3>View Staffs</h3><br>
            <span>  
               <a href="view_staffs.php"><i class="fa fa-eye"></i></a>
               <i><?php echo $staffsCount; ?></i> <br>
            </span>
           
       </div><br>
       
        <!-- add patient -->
        <div class="add_patient">
            <h3>Add Patient</h3><br>
             <span>  
               <i class="fa fa-plus"></i> 
               <a href="add_patient.php"><i id="add" class="fa fa-pencil"></i></a>
             </span>
        </div>

            <!-- View patient -->
       <div class="view_patients">
            <h3>View Patients</h3><br>
            <span>  
               <a href="view_patients.php"><i class="fa fa-eye"></i></a>
               <i><?php echo $patientsCount; ?></i> <br>
            </span>
           
       </div>

 </div> <!-- this end of boxes -->
       
    </div> <br> <!-- this end of all div -->

    <!-- search -->
<div class="search_record">
      <!-- Form to receive search result -->
<form method="POST" id="form">
       <input type="text" name="input" class="input">
       <button><i class="fa fa-search"></i></button>
</form>
      <div id="empty">
                <!-- Where the result to be shown -->
      </div>
</div>


    <div id="table">
       <h3>Recents Records</h3> <br><br>

       <table class="table">
         <thead>
             <tr>
               <th>S/N</th>
               <th>Ref</th>
               <th>User Name</th>
               <th>Sickness</th>
               <th>Drug</th>
               <th>Doctor</th>
               <th>Description</th>
               <th>Address</th>
               <th>Phone</th>
               <th>Gender</th>
               <th>Date</th>
               <th>Action</th>
            </tr>
      </thead>

            <tbody>
            <?php
               // fetching staffs recorrd
               $sql = $conn->prepare("SELECT * FROM records  ORDER BY id DESC LIMIT 10");
               $sql->execute();
               $rs = $sql->get_result();

                  if($rs->num_rows > 0) {
                       while($fetch = $rs->fetch_assoc()){
                    //  assigning the values fetched to a variable
                    $sn = $fetch["id"];
                    $reference = $fetch["reference_id"];
                    $name = $fetch["username"];
                    $sickness = $fetch["sickness"];
                    $drug = $fetch["drug"];
                    $doctor = $fetch["doctor"];
                    $address = $fetch['address'];
                    $description = $fetch["description"];
                    $phone = $fetch['phone'];
                    $gender = $fetch['gender'];
                    $date = $fetch["date"];    
?>

             <div class="content bg-danger">
                <tr class="bg-light text-dark">
                   <td><?php echo $sn; ?></td>
                   <td><?php echo $reference; ?></td>
                   <td><?php echo $name; ?></a></td>
                   <td><?php echo $sickness; ?></td>
                   <td><?php echo $drug; ?></td>
                   <td><?php echo $doctor; ?></td>
                   <td><?php echo $description; ?></td>
                   <td><?php echo $address; ?></td>
                   <td><?php echo $phone; ?></td>
                   <td><?php echo $gender; ?></td>
                   <td><?php echo $date; ?></td>
                   <td><a href="edit_record.php?ref=<?php echo $reference; ?>"><i class="fa fa-edit text-dark"></i></a></td>
                   <td><a href="delete_record.php?ref=<?php echo $reference; ?>"><i class="fa fa-trash text-dark"></i></a></td>
               </tr>

        </div>    
<?php 
// closing while loop
}} else{
     echo "<script>No Records are found</script>";
 }
 ?>
            </tbody>



       </table>

</div>

    <!-- JavaScript -->
    <script src="../JavaScript/header.js"></script>
    <script src="../JavaScript/admin_search_record.js"></script>
    <script src="../JavaScript/admin_search_labRecord.js"></script>

</body>
</html>