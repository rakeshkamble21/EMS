|<?php
    require '../connection.php';
    $ids=$_GET["id"];
    $dates=$_GET["date"];
   echo $dates;
   echo $ids;
    
    try
    {
        $sql = "DELETE FROM `full_time_salary` WHERE emp_id='$ids' and date='$dates'";
        $result=mysqli_query($db,$sql);
        $db -> close(); 
        if($result >0)
        {
            echo '<script type="text/javascript">';
            echo ' alert("delete successfull")';  //not showing an alert box.
            echo '</script>';
            header('location:view-full-time-salary.php'); 
        }
        else
        {
            echo '<script type="text/javascript">';
            echo ' alert("please try again")';  //not showing an alert box.
           // header('location:view-attendance.php');     
            echo '</script>';
            header('location:view-full-time-salary.php'); 
    
        }
    }
    catch (PDOException $e) 
    {
    echo $e->getMessage();
    }

?>