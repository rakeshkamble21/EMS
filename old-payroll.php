<!-- 
<?php
                        require "home.php";
                        ?>   -->

<head>
    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/add-employee.css">
    <link rel="stylesheet" href="css/all.css">
    <script src="js/popper.min.js"></script>
    <script src="js/jquery.min.js"></script> 
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script> 
    <script src="js/all.js"></script>
    <script src="js/excel.js"></script> 
</head>

<div class="container">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-10">
<h3 style="text-align:center;margin-top:20px">Enter Emloyee Attendance</h3>
<form action="" method="post">

<table class="table table-bordered" style="margin-top:20px">
<form action=" " method="post">
            <div class="col-md-6">
                            <div class="form-group">
                            <label for="form date">Select the date</label>  
                                <input type="date"  name="from" class="form-control"/>
                            </div>  

                            <div class="form-group">
                            <label for="todate">Select the date</label>  
                                <input type="date"  name="to" class="form-control"/>
                            </div>       
                            <!-- <div class="form-group">
                                            <select class="form-control"  name="presenty_status" >
                                                <option value="select" >Select attendance status</option>
                                                <option value="Project Manager">Present</option>
                                                <option value="Quality Engineer">Absent</option>
                                            </select>
                              </div>          -->
                       
                
            </div>
            
            <input type="submit" class="btn btn-danger" value="search"/>&nbsp;&nbsp;
            <a href="home.php"><input type="button" class="btn btn-danger" name="home" value="back" /></a>&nbsp;&nbsp;
            <button class="btn btn-info" type="button" onclick="location.reload();">Refresh Page</button>
</form>

<form action="save-excel.php" method="post" id="form">
<table id="tblsalary" class="table stripped">
  <thead>
          <tr>
            <th scope="col">Emp id</th>
            <th scope="col" >Employee Name</th>
            <th scope="col">Salary</th>
            <th scope="col">Present Days</th>
            <th scope="col">Half Days</th>
            <th scope="col">Absent Days</th>
            <th scope="col">Work Hour</th>
            <!-- <th scope="col">Total Days</th> -->
            <th scope="col">Salary</th>
          </tr>
          </thead>
            
        <tbody>
   <!--     select SUM(if(attendance='Present',1,0)) as Present,SUM(IF(attendance='Absent',1,0)) as Absent FROM attendance WHERE emp_id=2
            select SUM(if(attendance='Present',1,0)) as Present,SUM(IF(attendance='Absent',1,0)) as Absent FROM attendance WHERE '2021-01-09' and '2021-04-09' and emp_id=2   
   -->
        <?php

                require 'connection.php';
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

                    $todate = strtotime($_POST['to']);
                    if ( $todate ) {
                      $to_date = date('Y-m-d', $todate );
                    
                    } else {
                       echo 'Invalid Date: ' . $_POST['to'];
                      // fix it.
                    }
                    echo $from_date." "."To". " ". $to_date;
                    try
                    {
                        global $cnt;
                        //$sql = "SELECT DISTINCT emp_id,emp_name,attendance FROM attendance where date between ? and ?";
                       // $sql="select emp_name,emp_id ,count(case when attendance ='Absent' then 1 end) as absent_count ,count(case when attendance ='Present' then 1 end) as present_count ,count(distinct date) as Tot_count from attendance where date between ? and ? group by emp_id";
                     // present and absent query  $sql="select employee.salary, attendance.emp_name,attendance.emp_id ,count(case when attendance.attendance ='Absent' then 1 end) as absent_count ,count(case when attendance.attendance ='Present' then 1 end) as present_count ,count(distinct date) as Tot_count from attendance JOIN employee ON employee.emp_id=attendance.emp_id where attendance.date between ? and ? group by attendance.emp_id"; 
                        $sql="select employee.salary,attendance.work_hours, attendance.emp_name,attendance.emp_id ,count(case when attendance.attendance ='Absent' then 1 end) as absent_count ,count(case when attendance.attendance ='Present' then 1 end) as present_count,count(case when attendance.attendance ='Halfday' then 0.5 end) as halfday_count ,count(distinct date) as Tot_count from attendance JOIN employee ON employee.emp_id=attendance.emp_id where attendance.date between ? and ? group by attendance.emp_id";
                        $stmt = $db->prepare($sql);
                        $stmt->bind_param("ss",$from_date,$to_date);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        while ($row = $result->fetch_assoc())
                        {
                          
                          // $id=$row['emp_id'];
                          // $sql1 = "SELECT DISTINCT attendance FROM attendance where emp_id=?";
                          // $stmt1 = $db->prepare($sql);
                          // $stmt1->bind_param("i",$id);
                          // $stmt1->execute();
                          // $result1 = $stmt1->get_result();
                          // while($row1 = $result->fetch_assoc())
                          // {
                          //     print_r($row1['attendance']) ;
                            //  foreach($att as $item)
                            //  {
                            //    $string=$item;
                            //     echo $string;

                            //    if(=="Present")
                              // {
                              //   $co= $cnt++;
                              //   echo $co
                              //
                         ?>
                         <tr>
                         <td><?php echo $row['emp_id'];?></td>
                        <td style="width:20%"> <?php echo $row['emp_name'] ?></td>
                        <td><?php echo $row['salary'] ?></td>
                        <td><?php echo $row['present_count']; ?> </td>
                        <td><?php echo $row['halfday_count']; ?> </td>
                        <td><?php echo $row['absent_count'] ?> </td>
                        <td><?php echo $row['work_hours'] ?> </td>
                        <!-- <td><?php echo $row['Tot_count'] ?> </td> -->
                        <td><?php $perhour=($row['salary']/9);$workpay= $row['work_hours']*$perhour; $haf=$row['halfday_count'] * ($row['salary']/2); echo round($row['present_count'] * $row['salary']+$haf+$workpay);?></td>





                        <!-- <td><input type="text"  name="empno" readonly class="form-control" value="<?php echo $row['emp_id'];?>"/></td>
                        <td style="width:20%"> <input type="text" name="emp_name" class="form-control" placeholder="Enter Employee address*" value="<?php echo $row['emp_name'] ?>"/></td>
                        <td> <input type="text" readonly name="salary" class="form-control" placeholder="Enter Employee address*" readonly value="<?php echo $row['salary'] ?>"/></td>
                        <td><input type="text" readonly name="present_days" class="form-control" value="<?php echo $row['present_count']; ?>" ></td>
                        <td><input type="text" readonly  name="half_days" class="form-control" value="<?php echo $row['halfday_count']; ?>" ></td>
                        <td><input type="text" readonly name="absent_days" class="form-control" value="<?php echo $row['absent_count'] ?>" ></td>
                        <td><input type="text" readonly name="work_hours" class="form-control" value="<?php echo $row['work_hours'] ?>" ></td>
                        <td><input type="text" readonly name="tot_days" class="form-control" value="<?php echo $row['Tot_count'] ?>" ></td>
                        <td><input type="text" readonly name="monthly_salary" class="form-control" value="<?php $perhour=($row['salary']/9);$workpay= $row['work_hours']*$perhour; $haf=$row['halfday_count'] * ($row['salary']/2); echo round($row['present_count'] * $row['salary']+$haf+$workpay);?>" ></td> -->

                        <!-- <td><input type="date" name="update_dt"  value="<?php echo $row['date']?>" class="form-control"></td> -->
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
      <iframe id="txtArea1" style="display:none"></iframe>
      <button id="btnExport" type="button" class="btn btn-primary" onclick="fnExcelReport();"> EXPORT </button>
    <!-- <input type="hidden" name="file_content" id="file_content" />
            <button type="button" name="convert" id="convert" class="btn btn-primary">Save to Excel</button>  -->
    <!-- <input type="submit" class="btn btn-success" name="submit" value="Update Attendance" />-->

</div>
</div>
</div>
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