<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
    require '../connection.php';
    $empid_array = $_POST["emp_id"]; 
    $hours_array = $_POST["hours"]; 

    for ($i = 0; $i < count($empid_array); $i++) 
    {
        //echo $hours_array[$i]."</br>";
        //$sql="update attendance set work_hours=? where emp_id=?";
        $sql1=mysqli_query($db,"update full_time_attendance set work_hours='$hours_array[$i]' where emp_id='$empid_array[$i]'");

        // $stmt = $db->prepare("update attendance set work_hours=? where emp_id=?"); //Fetching all the records with input credentials
        // $stmt->bind_param("si",$hours_array[$i],$empid_array[$i]); //Where s indicates string type. You can use i-integer, d-double
        // $stmt->execute();
        // $result = $stmt->affected_rows;
        // $stmt -> close();
        // $db -> close();          
                    
    
    }
    if ($sql1) {
        echo '<script type="text/javascript">';
        echo ' alert("Hours added successfull")';  //not showing an alert box
        echo '</script>';
        header('Refresh: 1;save-full-time-attendance.php'); 
      }
      else
      {
          echo '<div class="alert alert-danger" role="alert">';
          echo ' <h4 class="alert-heading">Please try</h4>';  //not showing an alert box.
          echo '</script>';
      }
}
?>

