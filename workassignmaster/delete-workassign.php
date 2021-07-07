|<?php
    require '../connection.php';
    $ids=$_GET["id"];
   
    
    try
    {
        $sql = "delete FROM work_assign_master where emp_id=$ids and date=";
        $result=mysqli_query($db,$sql);
        $db -> close(); 
        if($result >0)
        {
            echo '<script type="text/javascript">';
            echo ' alert("advance delete successfull")';  //not showing an alert box.
            header('location:view-advance.php');     
            echo '</script>';
        }
        else
        {
            echo '<script type="text/javascript">';
            echo ' alert("delete floor successfull")';  //not showing an alert box.
            header('location:view-advance.php');     
            echo '</script>';
    
        }
    }
    catch (PDOException $e) 
    {
    echo $e->getMessage();
    }

?>