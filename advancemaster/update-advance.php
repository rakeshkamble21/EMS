

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
<h3 style="text-align:center;margin-top:20px">View Advance</h3>
<form action="" method="post">
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

              
                global $from_date;
                global $to_date;
                global $present;
                $id=$_GET['id'];
                $present="Present";
               require '../connection.php';
               
                    try
                    {
                        global $cnt;
                        //SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(work_hours))) AS TotalTime from attendance where emp_id=5
                        //$sql = "SELECT DISTINCT emp_id,emp_name,attendance FROM attendance where date between ? and ?";
                       // $sql="select emp_name,emp_id ,count(case when attendance ='Absent' then 1 end) as absent_count ,count(case when attendance ='Present' then 1 end) as present_count ,count(distinct date) as Tot_count from attendance where date between ? and ? group by emp_id";
                     // present and absent query  $sql="select employee.salary, attendance.emp_name,attendance.emp_id ,count(case when attendance.attendance ='Absent' then 1 end) as absent_count ,count(case when attendance.attendance ='Present' then 1 end) as present_count ,count(distinct date) as Tot_count from attendance JOIN employee ON employee.emp_id=attendance.emp_id where attendance.date between ? and ? group by attendance.emp_id"; 
                        $sql="select * from advance where emp_id=?";
                        $stmt = $db->prepare($sql);
                        $stmt->bind_param("i",$id);
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
                         <td><input type="text" readonly value="<?php echo $row['emp_id'] ?>" name="empid" class="form-control"></td>
                        <td style="width:20%"> <input type="text" readonly value="<?php echo $row['emp_name'] ?>" name="empname" class="form-control"></td>
                        <td>
                          <input type="text" class="form-control"  name="advance" value="<?php echo $row['advance']; ?>"></td>
                       </td> 
                          <td><input type="text" class="form-control"  name="deposit_advance" value="<?php echo $row['deposit_advance']; ?>"></td>
                       <td>
                     
                          <input type="text" class="form-control"  name="remain_advance" value="<?php echo $row['remain_advance']; ?>">
                        </td>
                      <td  style="width:20%">
                        <input type="text" class="form-control" readonly name="advance_date_taken" value="<?php echo $row['advance_date_taken']; ?>">
                       <td style="width:20%">
                       
                          <input type="text" class="form-control" readonly  name="advance_date_given" value="<?php echo $row['advance_date_given']; ?>">
                    
                    </tr>     
                    

                    <?php    
                
              //}
            }
                   
            
            ?>

          
        </tbody>
      </table> 
      <input type="submit" class="btn btn-success" value="update" >
      <a href="../home.php"><input type="button" class="btn btn-danger" value="Back" ></a>
      <!-- <iframe id="txtArea1" style="display:none"></iframe>
      <button id="btnExport" type="button" class="btn btn-primary" onclick="fnExcelReport();"> EXPORT </button> -->
      <!-- <!-- <input type="button" onclick="submitForm('save-payroll.php')" name="update" class="btn btn-success" value="Save"> -->
  
  </form>
   
    <!-- <input type="hidden" name="file_content" id="file_content" />
            <button type="button" name="convert" id="convert" class="btn btn-primary">Save to Excel</button>  -->
    <!-- <input type="submit" class="btn btn-success" name="submit" value="Update Attendance" />-->

</div>
</div>
</div>


<?php
}
catch (PDOException $e) 
{
  echo $e->getMessage();
}
                


?>


<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $id=$_GET['id'];
    $advance=$_POST['advance'];
    $empid=$_POST['empid'];
    $empname=$_POST['empname'];
    $deposit_advance=$_POST['deposit_advance'];
    $remain_advance=$_POST['remain_advance'];
    $advance_date_taken=$_POST['advance_date_taken'];
    $advance_date_given=$_POST['advance_date_given'];
    $currentDateTime=date('Y-m-d');
   
         if(empty($_POST["advance"]))
            {
                echo '<div class="alert alert-danger" role="alert">';
                echo ' <h4 class="alert-heading">please enter amount in advance</h4>';  //not showing an alert box.
                echo '</script>';
            }
            else  if(preg_match("/[^0-9]/", $advance))
            {
                echo '<div class="alert alert-danger" role="alert">';
                echo ' <h4 class="alert-heading">please enter only numbers in advance</h4>';  //not showing an alert box.
                echo '</script>';
            }
            else if(empty($_POST['deposit_advance']))
            {
                echo '<div class="alert alert-danger" role="alert">';
                echo ' <h4 class="alert-heading">please enter amount in deposit advance</h4>';  //not showing an alert box.
                echo '</script>';
            }
            else if(preg_match("/[^0-9]/", $deposit_advance))
            {
                echo '<div class="alert alert-danger" role="alert">';
                echo ' <h4 class="alert-heading">please enter only numbers in deposit advance</h4>';  //not showing an alert box.
                echo '</script>';
            }
            else if(empty($_POST['remain_advance']))
            {
                echo '<div class="alert alert-danger" role="alert">';
                echo ' <h4 class="alert-heading">please enter only remain advance</h4>';  //not showing an alert box.
                echo '</script>';
            }
            else if(preg_match("/[^0-9]/", $remain_advance))
            {
                echo '<div class="alert alert-danger" role="alert">';
                echo ' <h4 class="alert-heading">please enter only numbers in remain advance</h4>';  //not showing an alert box.
                echo '</script>';
            }
             else
             {
              // echo $first."".$last."".$mobile."".$address."".$salary."".$gender;
             
                $result=$remain_advance-$deposit_advance;
                $currentDateTime = date('Y-m-d');
                 $stmt = $db->prepare("update advance set advance=?,deposit_advance=?,remain_advance=?,advance_date_taken=?,advance_date_given=? where emp_id=?"); //Fetching all the records with input credentials
                 $stmt->bind_param("iisssi",$advance,$deposit_advance,$result,$advance_date_taken,$advance_date_given,$empid); //Where s indicates string type. You can use i-integer, d-double
                 $stmt->execute();
                 $result = $stmt->affected_rows;

                 $stmt2 = $db->prepare("INSERT INTO `advance_master`(`emp_id`, `emp_name`, `advance_taken`, `deposit_advance`, `remain_advance`, `date`) VALUES (?,?,?,?,?,?)"); //Fetching all the records with input credentials
                 $stmt2->bind_param("isiiis",$empid,$empname,$advance,$deposit_advance,$remain_advance,$currentDateTime); //Where s indicates string type. You can use i-integer, d-double
                 $stmt2->execute();
                 $result2 = $stmt2->affected_rows;
                 $stmt2 -> close();
                 $db -> close();
                
                 if( $result2>0 && $result>0)
                 {
                     
                     echo '<script type="text/javascript">';
                     echo ' alert("Update  successfull")';  //not showing an alert box.
                     echo '</script>';
                 }
                 else
                 {
                    echo "Oops. Something went wrong. Please try again"; 
                    ?>
                    <a href="../add-employee.php">Try Login</a>
                    <?php 
                 }
            //         <div class="alert alert-success" role="alert">
            //         <h4 class="alert-heading">Well done!</h4>
            //          <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
            //      <hr>
            //        <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
            //  </div>


                     //echo "Registration succssfull"; // user will be taken to the success page
                //  }
                //  else
                //  {
                //      echo "Oops. Something went wrong. Please try again"; 
                //      ?>
                //      <a href="add-employee.php">Try Login</a>
                //      <?php 
                //  }
             }


}

?>