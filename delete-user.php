<?php

require 'connection.php';
$ids=$_GET["id"];
try
{
    $sql = "delete FROM employee where emp_id=$ids";
    $result=mysqli_query($db,$sql);
    $db -> close(); 
    if($result >0)
    {
        echo '<script type="text/javascript">';
        echo ' alert("delete successfull")';  //not showing an alert box.
        header('location:view-employee.php');     
        echo '</script>';
    }
    else
    {
        echo "Please try again";

    }
}
catch (PDOException $e) 
{
echo $e->getMessage();
}
	 	 ?>
	 	
         