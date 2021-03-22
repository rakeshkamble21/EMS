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
            
            <input type="submit" class="btn btn-danger" value="search"/>
</form>
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
                    echo $from_date;
                    echo $to_date;
                    try
                    {
                        global $cnt;
                        $sql = "SELECT DISTINCT emp_id,emp_name,attendance FROM attendance where date between ? and ?";
                        $stmt = $db->prepare($sql);
                        $stmt->bind_param("ss",$from_date,$to_date);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        while ($row = $result->fetch_assoc())
                        {
                          $id=$row['emp_id'];
                          $sql1 = "SELECT DISTINCT attendance FROM attendance where emp_id=?";
                          $stmt1 = $db->prepare($sql);
                          $stmt1->bind_param("i",$id);
                          $stmt1->execute();
                          $result1 = $stmt1->get_result();
                          while($row1 = $result->fetch_assoc())
                          {
                              print_r($row1['attendance']) ;
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
                        <td><input type="text"  name="empno" readonly class="form-control" value="<?php echo $row['emp_id'];?>"/></td>
                        <td> <input type="text" name="emp_name" class="form-control" placeholder="Enter Employee address*" value="<?php echo $row['emp_name'] ?>"/></td>
                        <td><input type="text" name="work_hours" class="form-control" value="<?php echo $co ?>" ></td>
                        <td><input type="text" name="work_done" class="form-control" value="<?php echo $row['work_done'] ?>" ></td>
                        <td><input type="text" name="work_hours" class="form-control" value="<?php echo $row['work_hours'] ?>" ></td>

                        <!-- <td><input type="date" name="update_dt"  value="<?php echo $row['date']?>" class="form-control"></td> -->
                        <!-- <td>
                        <!-- <button type="button" class="btn btn-primary" ><i class="far fa-eye"></i></button> -->
                        <!-- <p><a href="update-user.php?id=<?php echo $row['emp_id'];?>" data-placement="top" data-toggle="tooltip" title="Edit"><button type="button" class="btn btn-success" data-title="Edit"><i class="fas fa-edit"></i></button></a></p>
                        <p><a href="delete-user.php?id=<?php echo $row['emp_id'];?>" data-placement="top" data-toggle="tooltip" title="Delete"><button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button><a></p> -->
                        </td> 
                    </tr>     
                    

                    <?php    
                
              }
            }
                        
            
            ?>

          
        </tbody>
      </table>
     
    <br/>
    <input type="submit" class="btn btn-success" name="submit" value="Update Attendance" />
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