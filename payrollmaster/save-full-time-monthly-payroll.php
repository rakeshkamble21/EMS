<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
  
        require "../connection.php";
      $empid_array = $_POST['emp_no']; 
      $name_array = $_POST["emp_name"];
    //   $per_salary_array = $_POST["salaries"];    
      $workhour_array = $_POST["total_time"];
      $advance_array= $_POST["ad"];
     $absent_array=$_POST['absent_day'];
      $salary_array=$_POST["salary"];
      $advancetaken_array=$_POST["advance_taken"];
     $givenadvance_array=$_POST["ad"];
      $currentDateTime = date('Y-m-d');

      $date=$_GET['from'];
      $to=$_GET['to'];

      $month= $date.'to'.$to;

     //echo count($advancetaken_array);
      // $arr_atten=implode($att_array);

      
    for ($i = 0; $i < count($name_array); $i++) {

      
        
        $nett_salary[]=$salary_array[$i]-$advance_array[$i];
        // echo $nett_salary[$i]."<br>";
      
            $remain_advance[]=$advancetaken_array[$i]-$advance_array[$i];
           
        

           //##############################Insert monthly  salary in salary table #################################
        $stmt = $db->prepare("INSERT INTO full_time_monthly_salary(emp_id,emp_name,month,absent_days,work_hour,advance_deduction,clean_salary,nett_salary,date) VALUES(?,?,?,?,?,?,?,?,?)"); //Fetching all the records with input credentials
        $stmt->bind_param("issisiiis",$empid_array [$i], $name_array[$i],$month,$absent_array[$i],$workhour_array[$i],$advance_array[$i],$salary_array[$i],$nett_salary[$i],$currentDateTime); //Where s indicates string type. You can use i-integer, d-double
        $stmt->execute();
        $result = $stmt->affected_rows;


        // $attendance= $db->prepare("INSERT INTO salary(emp_id,emp_name,salary_perday,absent_days,work_hour,advance_deduction,clean_salary,nett_salary,date) VALUES(?,?,?,?,?,?,?,?,?)");
        // $attendance->bind_param("isiisiiis",$empid_array [$i], $name_array[$i],$per_salary_array[$i],$absent_array[$i],$workhour_array[$i],$advance_array[$i],$salary_array[$i],$nett_salary[$i],$currentDateTime);
        // $attendance->execute();

           //############################## Update advance in advance_master table #################################
        $stmt2 = $db->prepare("INSERT INTO `full_time_advance_master`(`emp_id`, `emp_name`, `advance_taken`, `deposit_advance`, `remain_advance`, `date`) VALUES (?,?,?,?,?,?)"); //Fetching all the records with input credentials
        $stmt2->bind_param("isiiis",$empid_array[$i],$name_array[$i],$advancetaken_array[$i],$givenadvance_array[$i],$remain_advance[$i],$currentDateTime); //Where s indicates string type. You can use i-integer, d-double
        $stmt2->execute();
        $result2 = $stmt2->affected_rows;

        //##############################Update advance in advance table#################################
        $sql1=mysqli_query($db,"update advance set deposit_advance='$advance_array[$i]',remain_advance='$remain_advance[$i]',advance_date_given=' $currentDateTime' where emp_id='$empid_array[$i]'");
        // $stmt2 -> close();
        // $db -> close();
        // if($result)
        // {
        //     echo "Ok";
        // }
    }
    if ($result>0) {
        echo '<script type="text/javascript">';
        echo ' alert("Salary add successfull")';  //not showing an alert box.
        echo '</script>';
        header('refresh:2; url="full-time-monthly-salary.php');
      }
      else
      {
          echo '<div class="alert alert-danger" role="alert">';
          echo ' <h4 class="alert-heading">Please try</h4>';  //not showing an alert box.
          echo '</script>';
      }
        // $stmt2 -> close();
        // $db -> close();
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