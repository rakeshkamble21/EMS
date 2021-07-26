

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
<h3 style="text-align:center;margin-top:20px">Update Emloyee Payroll perday</h3>
<form action="" method="post">
<table class="table table-bordered" style="margin-top:20px">
        <thead>
          <tr>
            <th scope="col">Emp id</th>
            <th scope="col">Employee Name</th>
            <th scope="col">Salary (perday)</th>
            <!-- <th scope="col">Work Hour</th> -->
            <th scope="col">Date</th>

            <!-- <th scope="col">Total Hour</th> -->
          </tr>
        </thead>
            
        <tbody>

        <?php
                require '../connection.php';
                $ids=$_GET["id"];
             $name=$_GET['name'];
             $salary=$_GET['salary'];
                $pasdate=$_GET["date"];
           // echo $pasdate;
             
                         ?>
                         <tr>
                        <td><input type="text"  name="empno" readonly class="form-control" value="<?php echo $ids;?>"/></td>
                        <td> <input type="text"readonly name="emp_name" class="form-control" placeholder="Enter Employee address*" value="<?php echo $name ?>"/></td>
                       
                        
                       
                      <td>
                        <input type="text" name="salary" class="form-control" placeholder="Enter Employee address*" value="<?php echo $salary ?>"/>

                        </td>
                          
                        
                       

                        <td style="width:15%">
                        <input type="text" readonly name="date" class="form-control" placeholder="Enter Employee address*" value="<?php echo $pasdate ?>"/>
                        
                        </td>
                        
                    
                    </tr>     
                    

   
          
        </tbody>
      </table>
     
    <br/>
    <input type="submit" class="btn btn-success" name="submit" value="Update Salary" />
    <a href="../home.php"><button class="btn btn-primary" type="button">Home</button></a>
    <a href="process-full-time-payroll.php"><button class="btn btn-danger" type="button">Back</button></a>
    <button class="btn btn-info" type="button" onclick="location.reload();">Refresh Page</button>
</form>
</div>
</div>
</div>
<?php


global $attens;

if($_SERVER['REQUEST_METHOD']=='POST')
{
  
      $name = $_POST["emp_name"]; 
      $salary= $_POST["salary"];
      $empno = $_POST["empno"];    
      $date = $_POST["date"];
      
      
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
         $attendance = $db->prepare("update full_time_salary set salary_perday=? where emp_id=? and date=?");
         $attendance->bind_param("iis",$salary,$empno,$date);
         $attendance->execute();
         $result=$attendance->affected_rows;
         if ($result>0) 
         {
          echo '<script type="text/javascript">';
          echo ' alert("Salary updated successfull")';  //not showing an alert box.
          echo '</script>';
         //header('Refresh: 1;view-attendance.php'); 
        }
        else
        {
          echo '<script type="text/javascript">';
          echo ' alert("Salary not updated")';  //not showing an alert box.
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