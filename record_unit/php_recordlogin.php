<?php require_once "../database/db.php";
      require_once "recordlogin.php";

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])){
    if(empty($_POST['email']) || empty($_POST['password'])) {
        echo '<script> alert("All fields are required !") </script>';
    } else{
        $email = $conn->real_escape_string(trim($_POST['email']));
        $password = $conn->real_escape_string(trim($_POST['password']));
        $department = "recordUnit";

        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            echo '<script> alert("Email is not valid") </script>';
        } else{
            // unhashing passwod
            $query = $conn->prepare("SELECT * FROM staffs WHERE department = ? && email = ?");
            $query->bind_param("ss",$department,$email);
            $query->execute();

            $rs = $query->get_result();
            if($rs->num_rows > 0){
                $row = $rs->fetch_array();
    
                // verifying password
                if(password_verify($password,$row['password'])){
                    // chechking if user exists in database
                    $sql = $conn->prepare("SELECT * FROM staffs WHERE department = ? && email = ? && password = ?");
                    $sql->bind_param("sss",$department,$email,$row['password']);
                    $sql->execute(); 

                    $rsl = $sql->get_result();
                    if($rsl->num_rows > 0) {
                        $fetch = $rsl->fetch_array();
                        session_start();
                        $_SESSION['recordUnit_unique'] = $fetch["unique_id"];
                        $_SESSION['recordUnit_name'] = $fetch['name'];
                        $_SESSION['recordUnit_email'] = $fetch["email"];

                        header("location: recordUnit_dashboard.php");

                    } else{
                        echo '<script> alert("You are not Eligible !") </script>';
                    }

                } else{
                    echo '<script> alert("Incorrect Password") </script>';
                }
            
            
            } else{
                echo '<script> alert("No User Found !") </script>';
            }


        }



    }
}