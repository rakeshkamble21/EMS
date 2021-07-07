|<?php
    require '../connection.php';
    $ids=$_GET["id"];
   
    
    try
    {
        $sql = "delete FROM advance where emp_id=$ids and date=$dates";
        $result=mysqli_query($db,$sql);
        $result=mysqli_query($db,$sql);
        $db -> close(); 
        if($result >0)
        {
            echo '<script type="text/javascript">';
            echo ' alert("advance delete successfull")';  //not showing an alert box.
               
            echo '</script>';
           // header('location:view-advance.php'); 
        }
        else
        {
            echo '<script type="text/javascript">';
            echo ' alert("delete floor successfull")';  //not showing an alert box.
          
            echo '</script>';
           // header('location:view-advance.php');     
    
        }
    }
    catch (PDOException $e) 
    {
    echo $e->getMessage();
    }

?>