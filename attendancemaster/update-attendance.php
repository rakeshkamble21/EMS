

<head>
    <link href="../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="../css/add-employee.css">
    <link rel="stylesheet" href="../css/all.css">
    <script src="../js/popper.min.js"></script>
    <script src="../js/jquery.min.js"></script> 
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script> 
    <script src="../js/all.js"></script>
    <script src="js/fullscreen.js"></script>
</head>

<div class="container">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-10">
<h3 style="text-align:center;margin-top:20px">Update Emloyee Attendance</h3>
<form action="" method="post">
<table class="table table-bordered" style="margin-top:20px">
        <thead>
          <tr>
            <th scope="col">Emp id</th>
            <th scope="col">Employee Name</th>
            <th scope="col">Attendance</th>
          
            <th scope="col">In time</th>
            <th scope="col">Out time</th>
            <th scope="col">Work Hour</th>
            <!-- <th scope="col">Total Hour</th> -->
          </tr>
        </thead>
            
        <tbody>

        <?php
                require '../connection.php';
                $ids=$_GET["id"];
                global $pasdate;
                $pasdate=$_GET["date"];
           // echo $pasdate;
                try
                    {
                        $sql = "SELECT * FROM attendance where emp_id=? and date=?";
                        $stmt = $db->prepare($sql); 
                        $stmt->bind_param("is", $ids,$pasdate);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $row = $result->fetch_assoc();
                        $sex=$row['attendance'];
                         ?>
                         <tr>
                        <td><input type="text"  name="empno" readonly class="form-control" value="<?php echo $row['emp_id'];?>"/></td>
                        <td> <input type="text"readonly name="emp_name" class="form-control" placeholder="Enter Employee address*" value="<?php echo $row['emp_name'] ?>"/></td>
                        <td> 
                                    <!-- <label for="present5">
                                        <input type="radio" name="attendance"  id="present5" <?php echo ($sex=='Present')?'checked':''?>  value="Present"> Present
                                    </label> -->
                                    <label for="absent5">
                                        <input type="radio" name="attendance"  id="absent5"  <?php echo ($sex=='Absent')?'checked':''?>  value="Absent"> Absent
                                    </label>
                                    <label for="absent5">
                                        <input type="radio" name="attendance"  id="absent5"  <?php echo ($sex=='Hourpay')?'checked':''?>  value="Halfday"> Halfday
                                    </label>
                        </td>
                        <!-- <td><input type="text" name="work_hours" class="form-control" value="<?php echo $row['work_hours'] ?>" ></td> -->
                       
                        <td style="width:15%"><select class="form-control" id="inputJammulai" name="intime">
                          <option value="<?php echo $row['in_time']?>"><?php echo $row['in_time']?></option>
                        
                        <?php
                            for($hours=0; $hours<24; $hours++) // the interval for hours is '1'
                            for($mins=0; $mins<60; $mins+=01) // the interval for mins is '30'
                           
                                echo '<option>'.str_pad($hours,2,'0',STR_PAD_LEFT).':'
                                               .str_pad($mins,2,'0',STR_PAD_LEFT).'</option>';
                        
                        ?></select></td>

                        <td style="width:15%"><select class="form-control" id="inputJammulai" name="outtime">
                          <option value="<?php echo $row['out_time']?>"><?php echo $row['out_time']?></option>
                        
                        <?php
                            for($hours=0; $hours<24; $hours++) // the interval for hours is '1'
                            for($mins=0; $mins<60; $mins+=01) // the interval for mins is '30'
                           
                                echo '<option>'.str_pad($hours,2,'0',STR_PAD_LEFT).':'
                                               .str_pad($mins,2,'0',STR_PAD_LEFT).'</option>';
                        
                        ?></select></td>
                        
                        </td>
                        <td><input type="text" name="work_hours" class="form-control" value="<?php echo $row['work_hours'] ?>" ></td>
                        <!-- <a href="update-.php?id=<?php echo $row['emp_id'];?> & date=<?php echo $row['date'];?> " data-placement="top" data-toggle="tooltip" title="Edit"><button type="button" class="btn btn-success" data-title="Edit"><i class="fas fa-edit"></i></button></a>               
                        <a href="delete-work-assign.php?id=<?php echo $row['emp_id'];?>" data-placement="top" data-toggle="tooltip" title="Delete"><button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button><a> -->
                        </td> 
                    </tr>     
                    

   
          
        </tbody>
      </table>
     
    <br/>
    <input type="submit" class="btn btn-success" name="submit" value="Update Attendance" />
    <a href="../home.php"><button class="btn btn-primary" type="button">Home</button></a>
    <a href="view-attendance.php"><button class="btn btn-danger" type="button">Back</button></a>
    <button class="btn btn-info" type="button" onclick="location.reload();">Refresh Page</button>
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
  
      $name = $_POST["emp_name"]; 
      $att= $_POST["attendance"];
      $empid = $_POST["empno"];    
      $intime = $_POST["intime"];
      $outtime = $_POST["outtime"];
      $workhour = $_POST["work_hours"];
      
      //$updated = date('Y-m-d');
      // $arr_atten=implode($att_array);
      
    // for ($i = 0; $i < count($name_array); $i++) {

       //foreach($att_array  as $key=>$i ) { 

        // echo "The name is ".$n." and work hour_array is ". $workhour_array[$key].", thank you\n";
        // echo "The name is ".$n." and name_array is ". $name_array[$key].", thank you\n";
   
        // echo  " ".$empid_array;
        // echo  " ".$name_array;
        // echo  " ".$workdone_array;
        // echo  " ".$workhour_array;
        // echo "".$att_array;
         $attendance = $db->prepare("update attendance set emp_name=?,attendance=?,in_time=?,out_time=?,work_hours=? where emp_id=? and date=?");
         $attendance->bind_param("sssssis",$name, $att,$intime,$outtime,$workhour,$empid,$pasdate);
         $attendance->execute();
         $result=$attendance->affected_rows;
         if ($result>0) 
         {
          echo '<script type="text/javascript">';
          echo ' alert("Attendance updated successfull")';  //not showing an alert box.
          echo '</script>';
         //header('Refresh: 1;view-attendance.php'); 
        }
        else
        {
          echo '<script type="text/javascript">';
          echo ' alert("Attendance not updated")';  //not showing an alert box.
          echo '</script>';
          //header('Refresh: 1;view-attendance.php'); 
        }
    

    
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

?>