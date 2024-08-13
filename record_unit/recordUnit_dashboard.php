<?php require_once "../database/db.php"; 
      require_once "recordUnit_session.php"; 

 $id = $_SESSION['recordUnit_unique'];

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

    <title>Record Unit</title>
</head>
<body>
    <div class="all">
        <div class="header">     
            <h2 id="admin"><span>Hospital System</span></h2>
                 <span class="toggler" id="toggler">&#9776</span>
             <div class="sub_header">
                 <h3>Record Unit Dept </h3>          
                   <ul>    
                      <li class="logout"><a href="recordUnit_logout.php?session=<?php echo $id; ?>">Log out</a></li>
                   </ul>
            </div>   

        </div>

         <!-- starting side menu -->
         <div id="sidemenu" class="sidemenu">
            <ul class="side_ul"> <br>
                <li><a href="recordUnit_dashboard.php"><button><i class="fa fa-home"></i></button>Dashboard</a></li>
                <li><a href="lab_records.php"><button><i class="fa fa-book"></i></button>Lab records</a></li>
                <li class="logout"><a href="recordUnit_logout.php?session=<?php echo $id; ?>"><button><i class="fa fa-close"></i></button>Log out</a></li>
           </ul>
       </div> <br>

    </div> <br> <!-- this end of all div -->

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
               $sql = $conn->prepare("SELECT * FROM records ORDER BY id DESC LIMIT 5");
               $sql->execute();
               $rs = $sql->get_result();

                  if($rs->num_rows > 0) {
                       while($fetch = $rs->fetch_assoc()){
                    //  assigning the values fetched to a variable
                    $sn = $fetch["id"];
                    $reference = $fetch["reference_id"];
                    $name = $fetch["username"];
                    $drug = $fetch["drug"];
                    $doctor = $fetch["doctor"];
                    $description = $fetch["description"];
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
    <script src="../JavaScript/recordUnit_search_record.js"></script>

    <!-- changing the background image of laboratory dashboard -->
  <style>
     .all{
        background-image: url("../Images/surgery.jpg");
        background-repeat: no-repeat;
        background-position: right;
        height: 40vh;
     }

     .search{
        display: flex;
        justify-content: right;
     }

     .search button{
        border: none;
        background-color: green;
        padding: .4rem;
        margin-right: 1%;
     }
  </style>

</body>
</html>