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
    <link rel="stylesheet" href="../CSS/header.css">

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

   
    <!-- JavaScript -->
    <script src="../JavaScript/header.js"></script>

    <!-- changing the background image of laboratory dashboard -->
  <style>
     
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