<?php require_once "../database/db.php";
      require_once "plogin.php";

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])){
    if(empty($_POST['uname']) || empty($_POST['password'])) {
        echo '<script> alert("All fields are required !") </script>';
    } else{
        $uname = $conn->real_escape_string(trim($_POST['uname']));
        $password = $conn->real_escape_string(trim($_POST['password']));

            // unhashing passwod
            $query = $conn->prepare("SELECT * FROM patients WHERE username = ?");
            $query->bind_param("s",$uname);
            $query->execute();

            $rs = $query->get_result();
            if($rs->num_rows > 0){
                $row = $rs->fetch_array();
                // verifying password
                if(password_verify($password,$row['password'])){
                    // chechking if user exists in database
                    $sql = $conn->prepare("SELECT * FROM patients WHERE username = ? && password = ?");
                    $sql->bind_param("ss",$uname,$row['password']);
                    $sql->execute(); 

                    $rsl = $sql->get_result();
                    if($rsl->num_rows > 0) {
                        $fetch = $rsl->fetch_array();
                        session_start();
                        $_SESSION['patient_unique'] = $fetch["unique_id"];
                        $_SESSION['patient_username'] = $fetch['username'];

                        header("location: patient_dashboard.php");

                    } else{
                        echo '<script> alert("You are not Eligible !") </script>';
                    }

                } else{
                    echo '<script> alert("Incorrect Password") </script>';
                }
            
            
            } else{
                echo '<script> alert("You are not Eligible !") </script>';
            }


        }



    }
