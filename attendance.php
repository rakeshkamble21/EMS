
 <?php
                        require "home.php";
                        ?>  

<head>
    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/add-employee.css">
    <link rel="stylesheet" href="css/all.css">
    <script src="js/popper.min.js"></script>
    <script src="js/jquery.min.js"></script> 
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script> 
    <script src="js/all.js"></script>
</head>

<div class="container">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-10">
<h3 style="text-align:center;margin-top:20px">Enter Emloyee Attendance</h3>
<form action="" method="post">
<table class="table table-bordered" style="margin-top:20px">
        <thead>
          <tr>
            <th scope="col">Emp id</th>
            <th scope="col">Employee Name</th>
            <th scope="col">Attendance</th>
            <th scope="col">Work done</th>
            <th scope="col">Work Hour</th>
          </tr>
        </thead>
            
        <tbody>

        <?php
                require 'connection.php';
                global $id;

                try
                {
                    $sql = "SELECT * FROM employee";
                    $stmt = $db->prepare($sql); 
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $counter = 0;
                    while ($row = $result->fetch_assoc()) 
                    {
                            $id[]=$row['emp_id'];
                            $cnt= $counter++;
                            echo $cnt;
                         ?>
                         <tr>
                        <td><input type="text" disabled="disabled" name="empno[]" class="form-control" value="<?php echo $row['emp_id'];?>"/></td>
                        <td> <input type="text" name="emp_address[]" class="form-control" placeholder="Enter Employee address*" value="<?php echo $row['firstname']." ".$row['lastname'];?>"/></td>
                        <td> 
                                    <label for="present5">
                                        <input type="radio" name="att[<?=$cnt;?>]"  id="present5" value="Present"> Present
                                    </label>
                                    <label for="absent5">
                                        <input type="radio" name="att[<?=$cnt;?>]"  id="absent5" value="Absent"> Absent
                                    </label>
                        </td>
                        <td><input type="text" name="work_done[]" class="form-control"></td>
                        <td><input type="text" name="work_hours[]" class="form-control"></td>
                        <!-- <td>
                        <!-- <button type="button" class="btn btn-primary" ><i class="far fa-eye"></i></button> -->
                        <!-- <p><a href="update-user.php?id=<?php echo $row['emp_id'];?>" data-placement="top" data-toggle="tooltip" title="Edit"><button type="button" class="btn btn-success" data-title="Edit"><i class="fas fa-edit"></i></button></a></p>
                        <p><a href="delete-user.php?id=<?php echo $row['emp_id'];?>" data-placement="top" data-toggle="tooltip" title="Delete"><button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button><a></p> -->
                        </td> 
                    </tr>     
                    

               <?php    
                }

            ?>

         
          
        </tbody>
      </table>
     
    <br/>
    <input type="submit" class="btn btn-success" name="submit" value="Mark Attendance" />
</form>
</div>
</div>
</div>
<?php
}

catch (PDOException $e) 
{
  echo $e->getMessage();
}

global $attens;

if($_SERVER['REQUEST_METHOD']=='POST')
{
  
      $name_array = $_POST['emp_address']; 
      $att_array = $_POST["att"];
      $empid_array = $_POST["empno"];    
      $workdone_array = $_POST["work_done"];
      $workhour_array = $_POST["work_hours"];
      $currentDateTime = date('Y-m-d');
      // $arr_atten=implode($att_array);
      
    for ($i = 0; $i < count($name_array); $i++) {

       //foreach($att_array  as $key=>$i ) { 

        // echo "The name is ".$n." and work hour_array is ". $workhour_array[$key].", thank you\n";
        // echo "The name is ".$n." and name_array is ". $name_array[$key].", thank you\n";
   
        echo  " ".$empid_array [$i];
        echo  " ".$name_array [$i];
        echo  " ".$workdone_array [$i];
        echo  " ".$workhour_array [$i];
        echo "".$att_array[$i];
       
         


         $attendance = $db->prepare("INSERT INTO attendance (emp_id, emp_name, attendance, work_done,work_hours,date) VALUES (?, ?, ?, ?,?,?)");
         $attendance->bind_param("issiis",$empid_array[$i], $name_array[$i], $att_array[$i],$workdone_array[$i],$workhour_array[$i],$currentDateTime);
         $attendance->execute();
    }
    

    if ($db->affected_rows==1) {
      echo '<script type="text/javascript">';
      echo ' alert("Attendance add successfull")';  //not showing an alert box.
      echo '</script>';
  }






    // for ($i=0;$i<count($id);$i++)
    //  {
        
    //     $emp_id = $_POST["empid"][$id];
    //     $emp_name = $_POST["emp_name"][$id];
    //     $work_hour = $_POST["work_hour"][$id];
    //     $work_done = $_POST["work_done"][$id];
        
    //     // $date_created = date('Y-m-d H:i:s');
    //     // $date_modified = date('Y-m-d H:i:s');
         
    //     $attendance = $conn->prepare("INSERT INTO attendance (emp_id, emp_name, attendance, work_done,work_hours,date) VALUES (?, ?, ?, ?, ?)");
    //     $attendance->bind_param("issss", $emp_id, $emp_name, $attendance_status, $work_done);
    //     $attendance->execute();
    // }
     
    // if ($db->affected_rows==1) {
    //     $msg = "Attendance has been added successfully";
    // }
}
?>