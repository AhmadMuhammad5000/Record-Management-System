<?php require_once "../database/db.php"; 
      require_once "doctor_session.php"; 

// fetching admin from db
 $sql = $conn->prepare("SELECT * FROM admindb");
 $sql->execute();
 $rs = $sql->get_result();

 if($rs->num_rows > 0){
    $row = $rs->fetch_assoc();
    $id = $row["id"];
    $image = "laboratry.jpg";
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

    <title>Doctor</title>
</head>
<body>
    <div class="all">
        <div class="header">     
            <h2 id="admin"><span>Hospital System </span></h2>
                 <span class="toggler" id="toggler">&#9776</span>
             <div class="sub_header">
                  <img draggable="false" class="image" src="../Images/<?php echo $image; ?>">            
                   <ul>    
                      <li class="doctor_logout"><a href="doctor_logout.php?session=<?php echo $id; ?>">Log out</a></li>
                   </ul>
            </div>   

        </div>

         <!-- starting side menu -->
         <div id="sidemenu" class="sidemenu">
            <ul class="side_ul"> <br>
                <li><a href="doctor_dashboard.php"><button><i class="fa fa-home"></i></button>Dashboard</a></li>
                <li><a href="add_record.php"><button><i class="fa fa-plus"></i></button>Add Record</a></li>
                <li><a href="doctor_logout.php?session=<?php echo $id; ?>"><button><i class="fa fa-users"></i></button>Log out</a></li>

           </ul>
       </div> <br>

       <!-- Boxes started here -->
        <div class="admin">
           <h3>Doctor</h3> <br>
       </div>
    <div class="boxes" id="boxes">
           <!-- Add Record -->
     <div class="add_doctor">
            <h3>Add Record</h3><br>
          <span>  
             <a href="add_record.php"><i class="fa fa-plus"></i></a>
             <a href="add_record.php"><i id="add" class="fa fa-pencil"></i></a> 
          </span>
     </div>


 </div> <!-- this end of boxes -->
       
    </div> <br> <!-- this end of all div -->

    <!-- search -->
<div class="search_record" style="position: absolute; right: 0;">
   <div id="new" style="margin: 0 80%;">
      <!-- Form to receive search result -->
<form method="POST" id="form" class="search_record">
       <input type="text" name="input" class="input">
       <button><i class="fa fa-search"></i></button>
</form>  <br>

<div id="empty">
     <!-- Where the result to be shown -->
</div> 

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
            </tr>
      </thead>

            <tbody>
            <?php
               // fetching staffs recorrd
               $sql = $conn->prepare("SELECT * FROM records WHERE staff_id = ? ORDER BY id DESC LIMIT 5");
               $sql->bind_param("i",$_SESSION['doctor_unique']);
               $sql->execute();
               $rs = $sql->get_result();

                  if($rs->num_rows > 0) {
                       while($fetch = $rs->fetch_assoc()){
                    //  assigning the values fetched to a variable
                    $sn = $fetch["id"];
                    $reference = $fetch["reference_id"];
                    $staff_id = $fetch['staff_id'];
                    $name = $fetch["username"];
                    $sickness = $fetch["sickness"];
                    $drug = $fetch["drug"];
                    $doctor = $fetch["doctor"];
                    $description = $fetch["description"];
                    $address = $fetch["address"];
                    $phone = $fetch["phone"];
                    $gender = $fetch["gender"];
                    $date = $fetch["date"];  
                    
                  //   if the doctor has a patient
                  if($_SESSION['doctor_unique'] == $staff_id){
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
              </tr>

        </div>    
<?php 
   } else{
      echo "";
   }
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
    <script src="../JavaScript/doctor_search_record.js"></script>

</body>
</html>