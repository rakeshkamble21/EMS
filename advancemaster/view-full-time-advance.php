

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
<!----##################################  Work assign update modal--------------------------------->

<!---------------------------------------------------- End -------------------------------------------------->
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-10">
<h3 style="text-align:center;margin-top:20px">View 12 hours employee Advance</h3>
<table id="tblsalary" class="table stripped table-bordered">
  <thead>
          <tr>
            <th scope="col">Emp id</th>
            <th scope="col" >Employee Name</th>
            <!-- <th scope="col">Salary</th> -->
            <th scope="col">advance</th>
            <th scope="col">Deposit advance</th>
            <th scope="col">Remain advance</th>
            <th scope="col">Advance date taken</th>
            <th scope="col">Advance date given</th>
            <th scope="col">Action</th>

            <!-- <th scope="col">Absent Days</th>  -->
            <!-- <th scope="col">Work Hour</th>
            <th scope="col">Advance taken</th>
            <th scope="col">Enter Advance reduction</th>
            <th scope="col">Salary</th> -->
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
               
         
                  
                   
                        //SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(work_hours))) AS TotalTime from attendance where emp_id=5
                        //$sql = "SELECT DISTINCT emp_id,emp_name,attendance FROM attendance where date between ? and ?";
                       // $sql="select emp_name,emp_id ,count(case when attendance ='Absent' then 1 end) as absent_count ,count(case when attendance ='Present' then 1 end) as present_count ,count(distinct date) as Tot_count from attendance where date between ? and ? group by emp_id";
                     // present and absent query  $sql="select employee.salary, attendance.emp_name,attendance.emp_id ,count(case when attendance.attendance ='Absent' then 1 end) as absent_count ,count(case when attendance.attendance ='Present' then 1 end) as present_count ,count(distinct date) as Tot_count from attendance JOIN employee ON employee.emp_id=attendance.emp_id where attendance.date between ? and ? group by attendance.emp_id"; 
                     $sql = "SELECT * FROM full_time_emp_advance";
                     $stmt = $db->prepare($sql); 
                     $stmt->execute();
                     $result = $stmt->get_result();
                        while ($row = $result->fetch_assoc())
                        {
                          
                            $id=$row['emp_id'];
                       
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
                         <td style="width:20%"><?php echo $row['emp_id'] ?></td>
                        <td style="width:20%"> <?php echo $row['emp_name'] ?></td>
                        <td>
                         <?php echo $row['remain_advance']; ?>
                       </td> 
                       <td><?php echo $row['deposit_advance']; ?></td>
                      
                       <td>
                     
                         <?php echo $row['remain_advance']; ?>
                        </td>
                      <td  style="width:20%">
                       <?php echo $row['advance_date_taken']; ?>
                       <td style="width:20%">
                       
                        <?php echo $row['advance_date_given']; ?>
                       <td>
                       
                       <p><a href="update-full-time-advance.php?id=<?php echo $row['emp_id'];?>" data-placement="top" data-toggle="tooltip" title="Edit"><button type="button" class="btn btn-success" data-title="Edit"><i class="fas fa-edit"></i></button></a>  </p>            
                        <!-- <a href="deposite-advance.php?id=<?php echo $row['emp_id'];?>" data-placement="top" data-toggle="tooltip" title="Delete"><button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button><a>    -->
                       </td>
                    </tr>     
                    

                    <?php    
                
              //}
            }
                   
            
            ?>

          
        </tbody>
      </table>
      <iframe id="txtArea1" style="display:none"></iframe>
      <button id="btnExport" type="button" class="btn btn-primary" onclick="fnExcelReport();"> EXPORT </button>
      <a href="../home.php"><button type="button" class="btn btn-danger">Home</button></a>
    
      <!-- <input type="button" onclick="submitForm('save-payroll.php')" name="update" class="btn btn-success" value="Save">
     <a href="salary-print.php"> <input type="button" class="btn btn-inof" value="next"></a> -->
  </form>
   
    <!-- <input type="hidden" name="file_content" id="file_content" />
            <button type="button" name="convert" id="convert" class="btn btn-primary">Save to Excel</button>  -->
    <!-- <input type="submit" class="btn btn-success" name="submit" value="Update Attendance" />-->

</div>
</div>
</div>
?>
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