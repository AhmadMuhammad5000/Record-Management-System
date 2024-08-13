<?php require_once "../database/db.php";
      require_once "admin_session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/Hospital System/CSS/bootstrap-5.1.3-dist/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/Hospital System/CSS/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../CSS/view_staffs.css">

    <title>Lab Records</title>

</head>
<body>
<?php require_once "header.php"; ?> <br><br><br>
   <!-- search div -->
     <div class="search">
          <form id="form" method="POST"  autocomplete="off">
               <input name="input" id="input" class=" form-control" type="search" placeholder="Search by name">
               <button id="btn"><i class="btn fa fa-search"></i></button> 
          </form>
          
             <div id="empty">
                <!-- Where the result to be shown -->
             </div>
    </div> 

<div class="all">
    <div class="subheader">
        <table class="table">
            <thead class="table_head">
                <tr class="text-dark tread">
                   <td>S/N</td>
                   <td>Ref id</td>
                   <td>User Name</td>
                   <td>Test</td>
                   <td>Date</td>
                   <td colspan="2">Action</td>
                </tr>
            </thead>

            <tbody>
            <?php
               // fetching doctors recorrd
               $sql = $conn->prepare("SELECT * FROM lab_records");
               $sql->execute();
               $rs = $sql->get_result();

                  if($rs->num_rows > 0) {
                       while($fetch = $rs->fetch_assoc()){
                    //  assigning the values fetched to a variable
                    $sn = $fetch["id"];
                    $ref = $fetch["reference_id"];
                    $name = $fetch["username"];
                    $result = $fetch["result"];
                    $date = $fetch["date"];

          
?>
           <div class="content bg-danger">
                <tr class="bg-success text-light">
                   <td><?php echo $sn; ?></td>
                   <td><?php echo $ref; ?></td>
                   <td><?php echo $name; ?></a></td>
                   <td><?php echo $result; ?></td>
                   <td><?php echo $date; ?></td>
                   <td><a href="edit_lab_record.php?ref=<?php echo $ref; ?>"><i class="fa fa-edit text-dark"></i></a></td>
                   <td><a href="delete_lab_record.php?ref=<?php echo $ref; ?>"><i class="fa fa-trash text-dark"></i></a></td>
               </tr>

        </div>    
<?php 
// closing while loop
}} else{
     echo "<script>No Patients are found</script>";
 }
 ?>

            </tbody>
        </table>
    </div>
</div>


<!-- linking search toggle -->
    <script src="../JavaScript/header.js"></script>
    <script src="../JavaScript/search_toggle.js"></script>
    <script src="../JavaScript/admin_search_labRecord.js"></script>


</body>
<html>