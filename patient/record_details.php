<?php require_once "../database/db.php";
      require_once "patient_session.php";

     if(isset($_GET['ref'])) {
        $ref = $conn->real_escape_string($_GET['ref']);
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
    <link rel="stylesheet" href="../CSS/doctor_header.css">

    <title>Record Details</title>

</head>
<body>
<?php require_once "patient_header.php"; ?> <br><br><br> 

<div class="all">
    <div class="subheader">
    <div id="table">
       <h3>Your Records</h3> <br><br>

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
               $sql = $conn->prepare("SELECT * FROM records  WHERE reference_id = ?");
               $sql->bind_param('i',$ref);
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
                    $phone = $fetch['phone'];
                    $gender = $fetch['gender'];
                    $description = $fetch["description"];
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

</div>

<style>
    #table{
        width: 60%;
        position: absolute;
        left: 20%;
    }
</style>


</body>
<html>