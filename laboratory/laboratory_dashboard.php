<?php require_once "../database/db.php"; 
       require_once "laboratory_session.php"; 

       $id = $_SESSION["laboratory_unique"];
       $image = "laboratry.jpg";
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

    <title>laboratory</title>
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

       <!-- Boxes started here -->
        <div class="admin">
           <h3>Laboratory</h3> <br>
       </div>
    <div class="boxes" id="boxes">
           <!-- Add Record -->
     <div class="add_doctor">
            <h3>Add Record</h3><br>
          <span>  
             <a href="add_lab_record.php"><i class="fa fa-plus"></i></a>
             <a href="add_lab_record.php"><i id="add" class="fa fa-pencil"></i></a> 
          </span>
     </div>

 </div> <!-- this end of boxes -->
       
    </div> <br> <!-- this end of all div -->

    <!-- search -->
<div class="search_record" style="position: absolute; right: 0;">
   <div id="new">
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
               <th>Result</th>
               <th>Address</th>
               <th>Phone</th>
               <th>Gender</th>
               <th>Date</th>
            </tr>
      </thead>

            <tbody>
            <?php
               // fetching staffs recorrd
               $sql = $conn->prepare("SELECT * FROM lab_records ORDER BY id DESC LIMIT 5");
               $sql->execute();
               $rs = $sql->get_result();

                  if($rs->num_rows > 0) {
                       while($fetch = $rs->fetch_assoc()){
                    //  assigning the values fetched to a variable
                    $sn = $fetch["id"];
                    $reference = $fetch["reference_id"];
                    $name = $fetch["username"];
                    $result = $fetch["result"];
                    $address = $fetch["address"]; 
                    $phone = $fetch["phone"];    
                    $gender = $fetch["gender"];    
                    $date = $fetch["date"];    

?>

             <div class="content bg-danger">
                <tr class="bg-light text-dark">
                   <td><?php echo $sn; ?></td>
                   <td><?php echo $reference; ?></td>
                   <td><?php echo $name; ?></a></td>
                   <td><?php echo $result; ?></td>
                   <td><?php echo $address; ?></td>
                   <td><?php echo $phone; ?></td>
                   <td><?php echo $gender; ?></td>
                   <td><?php echo $date; ?></td>
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
    <script src="../JavaScript/laboratory_searh_lab.js"></script>

    <!-- changing the background image of laboratory dashboard -->
  <style>
     .all{
        background-image: url("../Images/laboratry.jpg");
        background-repeat: no-repeat;
        background-position: right;
        height: 40vh;
     }
  </style>

</body>
</html>