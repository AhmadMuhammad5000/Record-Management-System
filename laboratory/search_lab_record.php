<?php require_once "../database/db.php";
       require_once "laboratory_session.php";  
      
      $output = "";

       $input = $conn->real_escape_string(trim($_POST["input"]));
       $search = '%'.$input.'%';

      $query = $conn->prepare("SELECT * FROM lab_records WHERE reference_id Like ? ");
      $query->bind_param("s",$search);
      $query->execute();

      $rs = $query->get_result();

      if($rs->num_rows > 0) {
         while($row = $rs->fetch_assoc()) {
            $ref = $row["reference_id"];
            $name = $row["username"];

            $output.='<p><a href="lab_record_details.php?ref='. $ref. ' ">'. $name.' </a></p>';
        }

     }  else{
          $output.='<p> Result not found! </p>';
      }
 

    echo $output;
