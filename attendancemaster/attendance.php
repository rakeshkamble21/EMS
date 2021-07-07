

<head>
    <link href="../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="../css/add-employee.css">
    <link rel="stylesheet" href="../css/all.css">
    <script src="../js/popper.min.js"></script>
    <script src="../js/jquery.min.js"></script> 
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script> 
    <script src="../js/all.js"></script>
    <script src="../js/time-calculate.js"></script>
    <script src="js/fullscreen.js"></script>
</head>

<div class="container">
<div class="row">
<div class="col-md-2">
                      

</div>
<form action="" method="post" id="myform">
<div class="col-md-10">
<h3 style="text-align:center;margin-top:20px">Enter Employee Attendance</h3>
<div class="form-group">
                            <label for="male">Select the date</label>  
                                <input type="date"  name="dt" class="form-control"/>
                        </div>      

<table class="table table-bordered" style="margin-top:20px" id="attendance">
        <thead>
          <tr>
            <th scope="col">Emp id</th>
            <th scope="col">Employee Name</th>
             <th scope="col">Attendance</th>
            <th scope="col">In time</th> 
            <th scope="col">Out time</th>
            <!-- <th scope="col">Work Description</th> -->
            <!-- <th scope="col">Work done</th> -->
          </tr>
        </thead>
            
        <tbody>

        <?php
              require "../connection.php";

                try
                {
                    $sql = "SELECT * FROM employee";
                    $stmt = $db->prepare($sql); 
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $counter = 0;
                    while ($row = $result->fetch_assoc()) 
                    {
                        $ids=$row['emp_id'];
                            $id[]=$row['emp_id'];
                            $cnt= $counter++;
                            echo $cnt;
                         ?>
                         <tr>
                        <td style="width:10%"><input type="text" readonly name="empno[]" class="form-control" value="<?php echo $row['emp_id'];?>"/></td>
                        <td  style="width:20%"> <input type="text" readonly name="emp_address[]" class="form-control" placeholder="Enter Employee address*" value="<?php echo $row['firstname']." ".$row['lastname'];?>"/></td>
                        <td  style="width:15%"> 
                                    <!-- <label for="present5">
                                        <input type="radio" name="att[<?=$cnt;?>]"  id="present" value="Present"> Present
                                    </label> -->
                                    <label for="absent5">
                                        <input type="radio" name="att[<?=$cnt;?>]"  onchange="radioDisable(this)" id="absent"  value="Absent"> Absent
                                    </label>
                                    <!-- <label for="absent5">
                                        <input type="radio" name="att[<?=$cnt;?>]"  id="halfday" value="Halfday"> Halfday
                                    </label> -->
                                    <label for="absent5">
                                        <input type="radio" name="att[<?=$cnt;?>]"  onchange="radioDisable(this)" checked id="hourpay" value="Hourpay"> Hourly pay
                                    </label>
                        </td>
                        <!-- <td style="width:15%"><input type="text" name="work_description[]" class="form-control"></td> -->
                        <td style="width:15%"><select class="form-control"  id="in_time" name="intime[]"><?php
                            for($hours=0; $hours<24; $hours++) // the interval for hours is '1'
                            for($mins=0; $mins<60; $mins+=01) // the interval for mins is '30'
                                echo '<option>'.str_pad($hours,2,'0',STR_PAD_LEFT).':'
                                               .str_pad($mins,2,'0',STR_PAD_LEFT).'</option>';
                        
                        ?></select></td>
                        <td style="width:15%"><select class="form-control" id="inputJammulai" name="outtime[]"><?php
                            for($hours=0; $hours<24; $hours++) // the interval for hours is '1'
                            for($mins=0; $mins<60; $mins+=01) // the interval for mins is '30'
                                echo '<option>'.str_pad($hours,2,'0',STR_PAD_LEFT).':'
                                               .str_pad($mins,2,'0',STR_PAD_LEFT).'</option>';
                        
                        ?></select></td>
                       <!-- <td  style="width:15%">
                       <?php 
                              $results=mysqli_query($db,"SELECT work_assign.work_description,work_assign.work_done,attendance.emp_id FROM attendance JOIN work_assign WHERE work_assign.emp_id=attendance.emp_id and work_assign.emp_id='$ids' GROUP BY attendance.emp_id");
                              while($row1 = $results->fetch_assoc())
                              {
                                $work_description=$row1['work_description'];
                              ?>
                              <input type="text" readonly name="work_description[]" class="form-control" value="<?php echo $work_description;?>">
                                <?php } ?>
                       </td> -->
                    
                        <!-- <td><input type="time"  id="inputJammulai" name="in_time[]" class="form-control" required></td>
                        <td><input type="time"  id="inputJamselesai" name="out_time[]" onchange="javascript: hitungjam();" class="form-control"   required></td> -->
                        <!-- <td style="width:10%"> <input type="text"  id="inputSelisih" name="work_hours[]" class="form-control"></td> -->
                       <!-- <td><input type="text" name="work_hours[]" class="form-control"></td> -->
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
    <a href="save-attendance.php"><input type="button" class="btn btn-primary" name="button" value="Save Attendance" /></a>
    <a href="../home.php"><input type="button" class="btn btn-danger" name="button" value="Back" /></a>
    <a href="view-attendance.php"><input type="button" class="btn btn-info" name="button" value="View Attendance" /></a>
</form>
</div>
</div>
</div>
<script>
    function  radioDisable(x)
     {
        row=x.rowIndex;
        var input = document.getElementsByName('intime[]');
        var checkboxes = document.getElementsByName('intime[]');
        var disabled = document.getElementById('absent').checked;
            for(var i=0;i<checkboxes.length;i++)
            {
                if(row)
                {
                    checkboxes[i].disabled = disabled;
                }
            }
    
     }


</script>
<script>


</script>
<?php
}

catch (PDOException $e) 
{
  echo $e->getMessage();
}

global $attens;

if($_SERVER['REQUEST_METHOD']=='POST')
{
 
                global $id;
                $time = strtotime($_POST['dt']);
                if ($time) {
                  $new_date = date('Y-m-d', $time);
                
                } else {
                   echo 'Invalid Date: ' . $_POST['dt'];
                  // fix it.
                }
                echo $new_date;
      $name_array = $_POST['emp_address']; 
      $att_array = $_POST["att"];
      $empid_array = $_POST["empno"];    
    //   $workdes_array = $_POST["work_description"];
    //   $workdone_array = $_POST["work_done"];
      $intime_array= $_POST['intime'];
    //   $intime_array = $_POST["intime"];
      $outtime_array = $_POST["outtime"];
    //   $workdone_array=$_POST["work_done"];
      $currentDateTime = date('Y-m-d');
if(empty($time))
{
    echo '<div class="alert alert-danger" role="alert">';
                  echo ' <h4 class="alert-heading">Please select date</h4>';  //not showing an alert box.
                  echo '</script>';
}
     
      // $arr_atten=implode($att_array);

     
      
    for ($i = 0; $i < count($name_array); $i++) {

        // $interval = strtotime($intime_array[$i])->diff(strtotime($outtime_array[$i]));

        // echo $interval[$i];
      
       

       //foreach($att_array  as $key=>$i ) { 

        // echo "The name is ".$n." and work hour_array is ". $workhour_array[$key].", thank you\n";
        // echo "The name is ".$n." and name_array is ". $name_array[$key].", thank you\n";
   
        // echo  " ".$intime_array [$i];
        // echo  " ".$outtime_array [$i];
        // // echo  " ".$workdone_array [$i];
        // // echo  " ".$workhour_array [$i];
        // echo "".$att_array[$i];
        // $workdes_array[$i] = $intime_array[$i]->diff($outtime_array[$i]);
        // echo $workhour_array;

        

       
         


        $attendance= $db->prepare("INSERT INTO attendance(emp_id,emp_name,attendance,in_time,out_time,date) VALUES(?,?,?,?,?,?)");
        $attendance->bind_param("isssss", $empid_array [$i], $name_array[$i], $att_array[$i],$intime_array[$i],$outtime_array[$i],$new_date);
        $attendance->execute();
        $result = $attendance->affected_rows;

        // $stmt1 = $db->prepare("update work_assign set work_description=?,work_done=?,update_date=? where emp_id=? and date=?"); //Fetching all the records with input credentials
        // $stmt1->bind_param("sssis",$workdes_array[$i],$workdone_array[$i],$currentDateTime,$emp_id[$i],$currentDateTime); //Where s indicates string type. You can use i-integer, d-double
        // $stmt1->execute();
        // $result1 = $stmt1->affected_rows;
       
    

   
    }
    if ($result>0) {
        echo '<script type="text/javascript">';
        echo ' alert("Attendance add successfull")';  //not showing an alert box.
        echo '</script>';
        // $stmt1 -> close();
        // $db -> close(); 
      }
      else
      {
          echo '<div class="alert alert-danger" role="alert">';
          echo ' <h4 class="alert-heading">Please try</h4>';  //not showing an alert box.
          echo '</script>';
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
         
        // $attendance = $conn->prepare("INSERT INTO attendance (emp_id, emp_name, attendance,work_description,in_time,out_time,date) VALUES (?, ?, ?, ?, ?,?,?)");
        // $attendance->bind_param("issssss", $emp_id, $emp_name, $attendance_status,$work_description,$intime_array,$outtime_array,$currentDateTime);
        // $attendance->execute();
   // }
     
//     if ($db->affected_rows==1) {
//         $msg = "Attendance has been added successfully";
//     }
// }
?>