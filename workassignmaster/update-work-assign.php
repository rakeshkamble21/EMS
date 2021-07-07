<?php
  

?>

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
<h3 style="text-align:center;margin-top:20px">Update Work Assign</h3>
<form action="" method="post">
<table class="table table-bordered" style="margin-top:20px">
        <thead>
          <tr>
            <th scope="col">Emp id</th>
            <th scope="col">Employee Name</th>
            <th scope="col">Work description</th>
          
            <th scope="col">Work done</th>
         
            <!-- <th scope="col">Total Hour</th> -->
          </tr>
        </thead>
            
        <tbody>

        <?php
                require '../connection.php';
            //     $ids=$_GET["id"];
             global $date;
            //     $pasdate=$_GET["date"];
            // echo $pasdate;
            $id=$_GET['id'];
            $date=$_GET['date'];
           // echo $date;
                try
                    {
                        $sql = "SELECT * FROM work_assign_master where emp_id=? and date=?";
                        $stmt = $db->prepare($sql); 
                        $stmt->bind_param("is", $id,$date);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $row = $result->fetch_assoc();
                        //echo $row['emp_id'];         
                         ?>
                         <tr>
                        <td><input type="text"   name="empno" readonly class="form-control" value="<?php echo $row['emp_id'];?>"/></td>
                        <td> <input type="text"readonly name="emp_name" class="form-control" placeholder="Enter Employee address*" value="<?php echo $row['emp_name'] ?>"/></td>
                      
                        <td><input type="text" name="work_description" class="form-control" value="<?php echo $row['work_description'] ?>" ></td> 
                        <td><input type="text" name="work_done" class="form-control" value="<?php echo $row['work_done'] ?>" ></td>
                        
                        </td> 
                        <td>
                        <input type="hidden" name="date" class="form-control" value="<?php echo $row['date'] ?>" >
                        
                        </td>
                    </tr>     
                    

   
          
        </tbody>
      </table>
     
    <br/>
    <input type="submit" class="btn btn-success" name="submit" value="Update Attendance" />
    <a href="../home.php"><button class="btn btn-primary" type="button">Home</button></a>
    <a href="view-work-assignment.php"><button class="btn btn-danger" type="button">Back</button></a>
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
      $workdes= $_POST["work_description"];
      $emp_id = $_POST["empno"];    
      $work_done = $_POST["work_done"];
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
        echo $date;
        
         $attendance = $db->prepare("update work_assign_master set work_description=?,work_done=? where emp_id=? and date=?");
         $attendance->bind_param("siis",$workdes,$work_done,$emp_id,$date);
         $attendance->execute();
         $result=$attendance->affected_rows;
         if ($result>0) 
         {
          echo '<script type="text/javascript">';
          echo ' alert("Work assign  updated successfull")';  //not showing an alert box.
          echo '</script>';
         header('Refresh: 1;view-work-assignment.php'); 
        }
        else
        {
          echo '<script type="text/javascript">';
          echo ' alert("Work assign not updated")';  //not showing an alert box.
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