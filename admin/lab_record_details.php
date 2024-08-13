<?php require_once "../database/db.php";
     require_once "admin_session.php";

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
    <link rel="stylesheet" href="../CSS/header.css">

    <title>Lab Record Details</title>

</head>
<body>

<div class="all">
    <div class="subheader">
    <div id="table">
    <a href="admin_dashboard.php"><i style="font-size: 20px; pointer: cursor;" class="fa fa-close" title="back"></i></a>
       <h3>Lab Record</h3> <br><br>

       <table class="table">
         <thead>
             <tr>
               <th>S/N</th>
               <th>Ref</th>
               <th>User Name</th>
               <th>Test</th>
               <th>Address</th>
               <th>Phone</th>
               <th>Gender</th>
               <th>Date</th>
               <th colspan="2">Action</th>
               <th>Download</th>

            </tr>
      </thead>

            <tbody>
            <?php
               // fetching staffs recorrd
               $sql = $conn->prepare("SELECT * FROM lab_records  WHERE reference_id = ?");
               $sql->bind_param('i',$ref);
               $sql->execute();
               $rs = $sql->get_result();

                  if($rs->num_rows > 0) {
                       while($fetch = $rs->fetch_assoc()){
                    //  assigning the values fetched to a variable
                    $sn = $fetch["id"];
                    $reference = $fetch["reference_id"];
                    $name = $fetch["username"];
                    $test = $fetch["result"];
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
                   <td><?php echo $test; ?></td>
                   <td><?php echo $address; ?></td>
                   <td><?php echo $phone; ?></td>
                   <td><?php echo $gender; ?></td>
                   <td><?php echo $date; ?></td>
                   <td><a href="edit_lab_record.php?ref=<?php echo $ref; ?>"><i class="fa fa-edit text-dark"></i></a></td>
                   <td><a href="delete_lab_record.php?ref=<?php echo $ref; ?>"><i class="fa fa-trash text-dark"></i></a></td>
                   <td onclick="download()"><i class="px-4 fa fa-download"></i></td>
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

<script>
    let download = () =>{
        window.print();
    }
</script>

<style>
    #table{
        width: 70%;
        position: absolute;
        left: 20%;
        top: 15%;
        background: teal;
        color: #fff;
    }
    
    th{
        color: #fff;
    }
</style>


</body>
<html>