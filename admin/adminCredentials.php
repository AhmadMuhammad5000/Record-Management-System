<?php require_once "../database/db.php";
// admin login credentials
// run this file once. Once you runned it, the admin credentials would be inserted into the database
// delete this file once the admin credentials areinsered into your db
//  to avoid inserting the credentialsmultiple times

    $name = "Admin";
    $email = "admin@gmail.com";
    $password = "admin";

    $sql = $conn->prepare("INSERT INTO admindb(username,email,password) VALUES(?,?,?)");
    $sql->bind_param("sss",$name,$email,$password);
    $sql->execute();

    if($sql){
        echo "inserted";
    }


?>