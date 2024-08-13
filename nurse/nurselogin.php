<?php require_once "../database/db.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/Hospital System/CSS/bootstrap-5.1.3-dist/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/Hospital System/CSS/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../CSS/login.css">

    <title>Nurses</title>
</head>
<body>
<div class="container-fluid">
    <div class="options">
    <button onclick="loginAs()" id="login">Login as: </button>
       <ul class="select" id="select">
          <li><a href="../admin/login.php">Admin</a></li>
          <li><a href="../doctor/dlogin.php">Doctor</a></li>
          <li><a href="nurselogin.php">Nurse</a></li>
          <li><a href="../pharmacy/pharmlogin.php">Pharmacy Staff</a></li>
          <li><a href="../laboratory/lablogin.php">Laboratory Staff</a></li>
          <li><a href="../patient/plogin.php">Patient</a></li>
          <li><a href="../record_unit/recordlogin.php">Record Unit Staff</a></li>
      </ul>
    </div>

    <!-- Login form for an laboratory department -->
    <div id="form" class="form">
        <form method="post" action="php_nurselogin.php" autocomplete="off" class="form-control">     
        <h3> Nurses </h3>
            <div class="div">
                <label for="email">Email</label><br>
                <input type="email" name="email" placeholder="email id" class="form-control">
            </div>

            <div class="div">
                <label for="password">Password</label><br>
                <input type="password" name="password" placeholder="password" class="form-control">
            </div>

            <div class="div">
                <button class="btn btn-success" name="login">Login</button>
            </div>
            <br>

            <span style="display: flex; align-items: center;"> Forgot pasword ? <a href="pass_recovery.php"> reset </a></span>
            <p>back <a href="../index.php">home</a></p>
            <br>
        </form>
    </div>
</div>
<br>

<!-- Footer -->
<footer>
    <marquee>Hospital System &copy 2024</marquee>
</footer>

<!-- including login.js file -->
<script src="../JavaScript/login.js"></script>

</body>
</html>