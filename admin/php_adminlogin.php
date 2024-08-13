<?php require_once "../database/db.php";
      require_once "login.php";

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])){
    if(empty($_POST['email']) || empty($_POST['password'])) {
        echo '<script> alert("All fields are required !") </script>';
    } else{
        $email = $conn->real_escape_string(trim($_POST['email']));
        $password = $conn->real_escape_string(trim($_POST['password']));

        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            echo '<script> alert("Email is not valid") </script>';
        } else{
            // unhashing passwod
            $query = $conn->prepare("SELECT * FROM admindb WHERE email = ? && password = ?");
            $query->bind_param("ss",$email,$password);
            $query->execute();

            $rs = $query->get_result();
            
            if($rs->num_rows > 0){
                $fetch = $rs->fetch_array();

                        session_start();
                        $_SESSION['admin_id'] = $fetch["id"];
                        $_SESSION['admin_email'] = $fetch["email"];

                        header("location: admin_dashboard.php");

                    } else{
                        echo '<script> alert("You are not Eligible !") </script>';
                    }
        }



    }
}