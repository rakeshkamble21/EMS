<?php
        require "../connection.php";
       $empid_array = $_POST["emp_no"]; 
       $work_done_array =$_POST["work_done"]; 
       $empname_array = $_POST["emp_name"]; 
       $work_description_array = $_POST["work_description"]; 
       $dates_array = $_POST["dates"]; 


       for ($i = 0; $i < count($empname_array); $i++) 
       {

        $stmt = $db->prepare("INSERT INTO work_assign_master(emp_id,emp_name,work_description,work_done,date) VALUES(?,?,?,?,?)"); //Fetching all the records with input credentials
        $stmt->bind_param("issis",$empid_array [$i], $empname_array[$i], $work_description_array[$i], $work_done_array[$i],  $dates_array [$i]); //Where s indicates string type. You can use i-integer, d-double
        $stmt->execute();
        $result = $stmt->affected_rows;
        //  echo $dates_array[$i].'<br>  ';
        // $sql=mysqli_query($db,"update work_assign set work_done='$work_done_array[$i]' where date='$dates_array[$i]'");
        // $stmt = $db->prepare("update work_assign set work_done=? where emp_id=? and date=?"); //Fetching all the records with input credentials
        // $stmt->bind_param("sis",$work_done_array[$i],$empid_array[$i],$dates_array[$i]); //Where s indicates string type. You can use i-integer, d-double
        // $stmt->execute();
        // $result = $stmt->affected_rows;
        // $stmt -> close();
        // $db -> close(); 
       }
       if ($result>0) {
        echo '<script type="text/javascript">';
        echo ' alert("Work done added  successfull")';  //not showing an alert box.
        echo '</script>';
        header('Refresh: 1;add-work-details.php'); 
      }
      else
      {
          echo '<div class="alert alert-danger" role="alert">';
          echo ' <h4 class="alert-heading">Please try</h4>';  //not showing an alert box.
          echo '</script>';
        
      }

?>