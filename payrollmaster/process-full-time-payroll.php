

<head>
    <link href="../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="../css/add-employee.css">
    <link rel="stylesheet" href="../css/all.css">
    <script src="../js/popper.min.js"></script>
    <script src="../js/jquery.min.js"></script> 
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script> 
    <script src="../js/all.js"></script>
    <script src="../js/excel.js"></script> 
    <script src="js/fullscreen.js"></script>
</head>

<div class="container">


 <!-- Modal -->
 <!-- <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="" id="myform" method="post">
                      <div class="form-group">
                      <label for="exampleInputEmail1">Emp Id</label>
                          <input type="text" class="form-control" id="emp_id" name="emp_id" readonly aria-describedby="emailHelp">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Site Name</label>
                      <input type="text" class="form-control" id="emp_name" name="emp_name"  aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Salary (perday)</label>
                      <input type="text" class="form-control" id="salary_perday" name="salary" aria-describedby="emailHelp" >
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Date</label>
                      <input type="text" class="form-control" id="date" name="date" aria-describedby="emailHelp" >
                  </div>
                
               
                 
                  <input type="hidden" name="ref" value="phpdemo-2f659-default-rtdb/<?php echo $key; ?>">
                    <button type="submit" name="update" class="btn btn-primary">Submit</button>
                      </form>
                    </div>
                   
                  </div>
                </div>
              </div> -->


<!------------------------------------- MOdal ------------------------------------------------------------------->



















<div class="row">
<div class="col-md-2"></div>
<div class="col-md-10">
<h3 style="text-align:center;margin-top:20px">12 hours Employee Payroll calculation</h3>


<table class="table table-bordered" style="margin-top:20px">
<form action=" " id="form1" method="post">
            <div class="col-md-6">
                            <div class="form-group">
                            <label for="form date">Select the date</label>  
                                <input type="date"  name="from" class="form-control"/>
                            </div>  

                            <!-- <div class="form-group">
                            <label for="todate">Select the date</label>  
                                <input type="date"  name="to" class="form-control"/>
                            </div>        -->
                            <!-- <div class="form-group">
                                            <select class="form-control"  name="presenty_status" >
                                                <option value="select" >Select attendance status</option>
                                                <option value="Project Manager">Present</option>
                                                <option value="Quality Engineer">Absent</option>
                                            </select>
                              </div>          -->
                       
                
            </div>
            
            <input type="submit" onclick="submitForm('full-time-payroll.php')"  class="btn btn-danger" value="search"/>&nbsp;&nbsp;
            <a href="../home.php"><input type="button" class="btn btn-danger" name="home" value="Home" /></a>&nbsp;&nbsp;
            <a href="full-time-payroll.php"><input type="button" class="btn btn-danger" name="home" value="Back" /></a>&nbsp;&nbsp;
            <a href="full-time-monthly-salary.php"><input type="button" class="btn btn-success" name="home" value="Next" /></a>&nbsp;&nbsp;
            <button class="btn btn-info" type="button" onclick="location.reload();">Refresh Page</button>



<table id="tblsalary" class="table stripped">
  <thead>
          <tr>
            <th scope="col">Emp id</th>
            <th scope="col" >Employee Name</th>
            <th scope="col">Enter Salary(perday)</th>
            <!-- <th scope="col">Work description</th> -->
            <!-- <th scope="col">Work done</th> -->
            <!-- <th scope="col">Absent Days</th> 
            <th scope="col">Work Hour</th>
            <th scope="col">Advance taken</th>
            <th scope="col">Enter Advance reduction</th> -->
            <th scope="col">Time</th>
            <th scope="col">Salary</th>
            <th scope="col">Action</th>
          </tr>
          </thead>
            
        <tbody>
   <!--     select SUM(if(attendance='Present',1,0)) as Present,SUM(IF(attendance='Absent',1,0)) as Absent FROM attendance WHERE emp_id=2
            select SUM(if(attendance='Present',1,0)) as Present,SUM(IF(attendance='Absent',1,0)) as Absent FROM attendance WHERE '2021-01-09' and '2021-04-09' and emp_id=2   
   -->
        <?php

                require '../connection.php';
                global $from_date;
                global $to_date;
                global $present;
                $present="Present";
                if($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    $fromdate = strtotime($_POST['from']);
                    if ( $fromdate) {
                      $from_date = date('Y-m-d',$fromdate);
                    
                    } else {
                       echo 'Invalid Date: ' . $_POST['from'];
                      // fix it.
                    }

                    // $todate = strtotime($_POST['to']);
                    // if ( $todate ) {
                    //   $to_date = date('Y-m-d', $todate );
                    
                    // } else {
                    //    echo 'Invalid Date: ' . $_POST['to'];
                    //   // fix it.
                    // }
                    // echo $from_date." "."To". " ". $to_date;
                    try
                    {
                        global $cnt;
                        //SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(work_hours))) AS TotalTime from attendance where emp_id=5
                        //$sql = "SELECT DISTINCT emp_id,emp_name,attendance FROM attendance where date between ? and ?";
                       // $sql="select emp_name,emp_id ,count(case when attendance ='Absent' then 1 end) as absent_count ,count(case when attendance ='Present' then 1 end) as present_count ,count(distinct date) as Tot_count from attendance where date between ? and ? group by emp_id";
                     // present and absent query  $sql="select employee.salary, attendance.emp_name,attendance.emp_id ,count(case when attendance.attendance ='Absent' then 1 end) as absent_count ,count(case when attendance.attendance ='Present' then 1 end) as present_count ,count(distinct date) as Tot_count from attendance JOIN employee ON employee.emp_id=attendance.emp_id where attendance.date between ? and ? group by attendance.emp_id"; 
                        $sql="select full_time_salary.salary_perday,full_time_attendance.date,full_time_attendance.work_hours,full_time_attendance.emp_name,full_time_attendance.emp_id ,count(case when full_time_attendance.attendance ='Absent' then 1 end) as absent_count,SEC_TO_TIME(SUM(TIME_TO_SEC(work_hours))) AS TotalTime from full_time_attendance JOIN full_time_salary ON full_time_salary.emp_id=full_time_attendance.emp_id where full_time_attendance.date=? group by full_time_attendance.emp_id";
                        $stmt = $db->prepare($sql);
                        $stmt->bind_param("s",$from_date);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        while ($row = $result->fetch_assoc())
                        {
                         
                            $id=$row['emp_id'];
                            $date=$row['date'];

                           

                           
                          // $stmt1 = $db->prepare($sql2);
                          // // $stmt1->bind_param("i",$id);
                          // $stmt1->execute();
                          // $result1 = $stmt1->get_result();
                          // while($row1 = $result->fetch_assoc())
                          // {

                          //     echo $advance;
                          // }
                         ?>
                         <tr>
                         <td><input type="text" readonly value="<?php echo $row['emp_id'] ?>" name="emp_no[]" class="form-control"></td>
                        <td style="width:20%"> <input type="text" readonly value="<?php echo $row['emp_name'] ?>" name="emp_name[]" class="form-control"></td>
                        <td>
                          
                        <input type="text" readonly  value="<?php echo $row['salary_perday']?>" name="salaries[]" class="form-control"></td>
                        <!-- <td>
                          <input type="text" class="form-control" readonly name="work_description[]" value="<?php echo $row['work_description']; ?>"></td>
                       </td> -->
                          <!-- <td><input type="text" class="form-control" readonly name="work_done[]" value="<?php echo $row['totalwork']; ?>"> </td> -->
                        <!-- <td><input type="text" readonly value="<?php echo $row['absent_count'] ?>" name="absent_day[]" class="form-control"> </td> -->
                        <td style="width:10%">
                        <input type="text" readonly value="<?php echo $row['work_hours'];?>" name="total_time[]" class="form-control">
                        </td>
                        <td><?php 
                          $hourstomin=  12*60;
                         $permin=($row['salary_perday']/$hourstomin);
                        // $perminrupee=round($permin,2);
                        $workpay= $row['work_hours'];
                       // echo $perminrupee;
                        $time = explode(':', $workpay);
                        $minute=($time[0]*60) + ($time[1]) + ($time[2]/60);
                        //echo $minute;
                        ?>
                            <input type="text" readonly value="<?php echo round($minute*$permin);?>" name="salary[]" class="form-control">
                        </td>
                        <td>
                       <p><a href="update-salary.php?id=<?php echo $row['emp_id'];?>&salary=<?php echo $row['salary_perday']?>&date=<?php echo $date?>&name=<?php echo $row['emp_name']?>" data-placement="top" data-toggle="tooltip" title="Edit"><button type="button" class="btn btn-success" data-title="Edit"><i class="fas fa-edit"></i></button></a></p>
                        </td>





                        <!-- <td><input type="text"  name="empno" readonly class="form-control" value="<?php echo $row['emp_id'];?>"/></td>
                        <td style="width:20%"> <input type="text" name="emp_name" class="form-control" placeholder="Enter Employee address*" value="<?php echo $row['emp_name'] ?>"/></td>
                        <td> <input type="text" readonly name="salary" class="form-control" placeholder="Enter Employee address*" readonly value="<?php echo $row['salary'] ?>"/></td>
                        <td><input type="text" readonly name="present_days" class="form-control" value="<?php echo $row['present_count']; ?>" ></td>
                        <td><input type="text" readonly  name="half_days" class="form-control" value="<?php echo $row['halfday_count']; ?>" ></td>
                        <td><input type="text" readonly name="absent_days" class="form-control" value="<?php echo $row['absent_count'] ?>" ></td>
                        <td><input type="text" readonly name="work_hours" class="form-control" value="<?php echo $row['work_hours'] ?>" ></td>
                        <td><input type="text" readonly name="tot_days" class="form-control" value="<?php echo $row['Tot_count'] ?>" ></td>
                        <td><input type="text" readonly name="monthly_salary" class="form-control" value="<?php $perhour=($row['salary']/9);$workpay= $row['work_hours']*$perhour; $haf=$row['halfday_count'] * ($row['salary']/2); echo round($row['present_count'] * $row['salary']+$haf+$workpay);?>" ></td> -->

                        <!-- <td><input type="date" name="update_dt"  value="<?php echo $date ?>" class="form-control"></td> -->
                        <!-- <td>
                        <!-- <button type="button" class="btn btn-primary" ><i class="far fa-eye"></i></button> -->
                        <!-- <p><a href="update-user.php?id=<?php echo $row['emp_id'];?>" data-placement="top" data-toggle="tooltip" title="Edit"><button type="button" class="btn btn-success" data-title="Edit"><i class="fas fa-edit"></i></button></a></p>
                        <p><a href="delete-user.php?id=<?php echo $row['emp_id'];?>" data-placement="top" data-toggle="tooltip" title="Delete"><button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button><a></p> -->
                        <!-- </td>  -->
                    </tr>     
                    

                    <?php    
                
              //}
            }
                        
            
            ?>

          
        </tbody>
      </table>
      <!-- <iframe id="txtArea1" style="display:none"></iframe>
      <button id="btnExport" type="button" class="btn btn-primary" onclick="fnExcelReport();"> EXPORT </button> -->
      <input type="button" onclick="submitForm('calculate-full-time-salary.php?date=<?php echo $date?>')" name="update" class="btn btn-success" value="Save">
    
     <a href="full-time-monthly-salary.php"> <input type="button" class="btn btn-inof" value="next"></a>
  </form>
   
    <!-- <input type="hidden" name="file_content" id="file_content" />
            <button type="button" name="convert" id="convert" class="btn btn-primary">Save to Excel</button>  -->
    <!-- <input type="submit" class="btn btn-success" name="submit" value="Update Attendance" />-->

</div>
</div>
</div>

<script>
$(document).ready(function(){
  $('.editbt').on('click',function(){
    $('#editmodal').modal('show');
    $tr=$(this).closest('tr');
    var data=$tr.children().map(function(){
      return $(this).text();
    }).get();
    console.log(data);
    $('#emp_id').val(data[0]);
    $('#emp_name').val(data[1]);
    $('#salary_perday').val(data[2]);
    $('#date').val(data[3]);
  
  })
});
</script>
<script type="text/javascript">
  function submitForm(action) {
    var form = document.getElementById('form1');
    form.action = action;
    form.submit();
  }
</script>









<!-- 
<script>
$(document).ready(function(){
 $('#convert').click(function(){
    var table_content= '<table>';
    table_content+= $('#tblsalary').html();
    table_content += '</table>';
    $('#file_content').val(table_content);
    $('#form').submit();
  });
});</script>  -->
<?php
}
catch (PDOException $e) 
{
  echo $e->getMessage();
}
                }
                    
global $attens;

// if($_SERVER['REQUEST_METHOD']=='POST')
// {
  
//       $name = $_POST["emp_name"]; 
//       $att= $_POST["attendance"];
//       $empid = $_POST["empno"];    
//       $workdone = $_POST["work_done"];
//       $workhour = $_POST["work_hours"];
      
//       //$updated = date('Y-m-d');
//       // $arr_atten=implode($att_array);
      
//     // for ($i = 0; $i < count($name_array); $i++) {

//        //foreach($att_array  as $key=>$i ) { 

//         // echo "The name is ".$n." and work hour_array is ". $workhour_array[$key].", thank you\n";
//         // echo "The name is ".$n." and name_array is ". $name_array[$key].", thank you\n";
   
//         // echo  " ".$empid_array;
//         // echo  " ".$name_array;
//         // echo  " ".$workdone_array;
//         // echo  " ".$workhour_array;
//         // echo "".$att_array;
//          $attendance = $db->prepare("update attendance set emp_name=?,attendance=?,work_done=?,work_hours=? where emp_id=? and date=?");
//          $attendance->bind_param("ssiiis",$name, $att,$workdone,$workhour,$empid,$pasdate);
//          $attendance->execute();
//     }
    

//     if ($db->affected_rows==1) {
//       echo '<script type="text/javascript">';
//       echo ' alert("Attendance updated successfull")';  //not showing an alert box.
//       echo '</script>';
//   }
//                 }





//     // for ($i=0;$i<count($id);$i++)
//     //  {
        
//     //     $emp_id = $_POST["empid"][$id];
//     //     $emp_name = $_POST["emp_name"][$id];
//     //     $work_hour = $_POST["work_hour"][$id];
//     //     $work_done = $_POST["work_done"][$id];
        
//     //     // $date_created = date('Y-m-d H:i:s');
//     //     // $date_modified = date('Y-m-d H:i:s');
         
//     //     $attendance = $conn->prepare("INSERT INTO attendance (emp_id, emp_name, attendance, work_done,work_hours,date) VALUES (?, ?, ?, ?, ?)");
//     //     $attendance->bind_param("issss", $emp_id, $emp_name, $attendance_status, $work_done);
//     //     $attendance->execute();
//     // }
     
//     // if ($db->affected_rows==1) {
//     //     $msg = "Attendance has been added successfully";
//     // }

?>