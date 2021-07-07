




<html>
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
<body>
<div class="container">

    <div class="row">
        <div class="col-md-12">
        <h3 style="text-align:center;margin-top:20px">Work Assign</h3>
        <form action="" method="post">
        <table class="table table-bordered" style="margin-top:20px">
            <thead>
          <tr>
            <th scope="col">Emp id</th>
            <th scope="col" >Employee Name</th>
            <th scope="col" >Packaging</th>
            <th scope="col" >Dates cutting</th>
            <th scope="col" >Dates filtering</th>
            <th scope="col" >Absent</th>
          </tr>
          </thead>
            
        <tbody>
        <?php
                require '../connection.php';
                global $id;

                try
                {
                    $sql = "SELECT * FROM employee";
                    $stmt = $db->prepare($sql); 
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $counter = 0;
                    while ($row = $result->fetch_assoc()) 
                    {
                            $id[]=$row['emp_id'];
                            $cnt= $counter++;
                           
                         ?>
                         <tr>
                        <td style="width:10%"><input type="text" readonly name="empno[]" class="form-control" value="<?php echo $row['emp_id'];?>"/></td>
                        <td  style="width:20%"> <input type="text" readonly name="emp_name[]" class="form-control" placeholder="Enter Employee address*" value="<?php echo $row['firstname']." ".$row['lastname'];?>"/></td>
                        <td><input type="checkbox" class="form-control" value="packaging" name="work[]"></td>
                        <td><input type="checkbox" class="form-control" value="datecutting" name="work[]"></td>
                        <td><input type="checkbox" class="form-control" value="datefiltering" name="work[]"></td>
                        <td><input type="checkbox" class="form-control" value="absent" name="work[]"></td>
                        </tr>
                        <?php    
                }
            

            ?>
             </tbody>
            
            </table>
            <input type="submit" class="btn btn-primary" value="Assign">
            <a href='../home.php'><button type="button" class="btn btn-success">Back</button></a>
            </form>
        </div>
    
    </div>

</div>
</body>
</html>
<?php
}
catch (PDOException $e) 
{
  echo $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $empid_array=$_POST['empno'];
    $empname_array=$_POST['emp_name'];
    $packaging_array=$_POST['work'];
    $currentDateTime = date('Y-m-d');

    $cnt=count($empname_array);
    $cnt1=count($packaging_array);
    if($cnt1<$cnt)
    {
        echo '<div class="alert alert-danger" role="alert">';
        echo ' <h4 class="alert-heading">Something is missing to check </h4>'; 
        echo ' <h4 class="alert-heading">if one labour is absent then check to absent </h4>';  //not showing an alert box.
        echo '</script>';
    }
    for ($i = 0; $i < count($empname_array); $i++) 
    {
        $work_done=0;
        $stmt = $db->prepare("INSERT INTO work_assign(emp_id,emp_name,work_description,work_done,date) VALUES(?,?,?,?,?)"); //Fetching all the records with input credentials
        $stmt->bind_param("issis",$empid_array[$i],$empname_array[$i],$packaging_array[$i],$work_done,$currentDateTime); //Where s indicates string type. You can use i-integer, d-double
        $stmt->execute();
        $result = $stmt->affected_rows;
    }
    if ($result>0) {
        echo '<script type="text/javascript">';
        echo ' alert("Work Assign successfull")';  //not showing an alert box.
        echo '</script>';
      }
      else
      {
          echo '<div class="alert alert-danger" role="alert">';
          echo ' <h4 class="alert-heading">Please try</h4>';  //not showing an alert box.
          echo '</script>';
      }

}


?>