
<html>
<head>
<link rel="stylesheet" href="../css/update-user.css">
<link href="../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="../css/all.css" rel="stylesheet" id="bootstrap-css">
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.js"></script>
<script src="js/fullscreen.js"></script>


</head>
<div class="container">
  <div class="row">
  <div class="col-md-2"></div>
    <div class="col-md-10">
    <h3 style="text-align:center">Save Employee employee attendance</h3>
         <form action=" " id="form1" method="post">
            <div class="col-md-6">
                            <div class="form-group">
                            <label for="male">Select the date</label>  
                                <input type="date"  name="dt" class="form-control"/>
                            </div>               
                
            </div>
            <input type="submit" onclick="submitForm('save-attendance.php')" class="btn btn-success" value="search"/>
            <a href="../home.php"><button class="btn btn-primary" type="button">Home</button></a>
            <a href="view-attendance.php"><button class="btn btn-danger" type="button">Back</button></a>
      <table class="table table-bordered" style="margin-top:20px">
        <thead>
          <tr>
            <th scope="col">Employee id</th>
            <th scope="col">Employee Name</th>
            <th scope="col">Attendance</th>
            <!-- <th scope="col">Work Description</th>
            <th scope="col">Work Done</th> -->
            <th scope="col">In Time</th>
            <th scope="col">Out Time</th>
            <th scope="col">Work Hours</th>
            <th scope="col">Date</th>
            <!-- <th scope="col">Action</th> -->
          </tr>
        </thead>
            



        <tbody>

        <?php
               
               require "../connection.php";
            global $new_date;
                if ($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    $time = strtotime($_POST['dt']);
                    if ($time) {
                      $new_date = date('Y-m-d', $time);
                    
                    } else {
                       echo 'Invalid Date: ' . $_POST['dt'];
                      // fix it.
                    }
                
    
                try
                {
                    echo $new_date;
                    $sql = "SELECT TIMEDIFF(out_time,in_time) as hours,attendance,emp_id,emp_name,in_time as it,out_time as ot,date FROM attendance where date = ?";
                    $stmt = $db->prepare($sql); 
                    $stmt->bind_param("s", $new_date);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    while ($row = $result->fetch_assoc()) 
                    {
                    //   $att=$row['attendance'];

                         ?>
                         <tr>
                        
                        <td><input type="text" readonly name="emp_id[]" class="form-control" value="<?php echo $row['emp_id'];?>"></td>
                        <td><input type="text" readonly name="emp_name[]" class="form-control" value="<?php echo $row['emp_name'];?>"></td>
                        <td><input type="text" readonly name="attendance[]" class="form-control" value="<?php echo $row['attendance'];?>"></td>
                        <!-- <td><input type="text" readonly name="work_description[]" class="form-control" value="<?php echo $row['work_description'];?>"></td>
                        <td><input type="text" readonly name="work_done[]" class="form-control" value="<?php echo $row['work_done'];?>"></td> -->
                        <td><input type="text" readonly name="it[]" class="form-control" value="<?php echo $row['it'];?>"></td>
                        <td><input type="text"readonly  name="ot[]" class="form-control" value="<?php echo $row['ot'];?>"></td>
                        <td><input type="text" readonly name="hours[]" class="form-control" value="<?php echo $row['hours'];?>"></td> 
                        <td style="width:15%"><input type="text"readonly  name="date[]" class="form-control" value="<?php echo $row['date'];?>"></td>
                        
                        <!-- <td>
                        <!-- <button type="button" class="btn btn-primary" ><i class="far fa-eye"></i></button> -->
                        <!-- <a href="update-attendance.php?id=<?php echo $row['emp_id'];?> & date=<?php echo $row['date'];?> " data-placement="top" data-toggle="tooltip" title="Edit"><button type="button" class="btn btn-success" data-title="Edit"><i class="fas fa-edit"></i></button></a>               
                        <a href="delete-attendance.php?id=<?php echo $row['emp_id'];?>" data-placement="top" data-toggle="tooltip" title="Delete"><button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button><a> -->
                        </td> -->
                    </tr>     
                    
               <?php    
                }
            

            ?>


          
        </tbody>
      </table>
      <input type="button" onclick="submitForm('save-attendance-time.php')" name="update" class="btn btn-success" value="Save">
                    </form>
    </div>
   
</div>
<?php
}


catch (PDOException $e) 
{
  echo $e->getMessage();
}
                }
?>
<script type="text/javascript">
  function submitForm(action) {
    var form = document.getElementById('form1');
    form.action = action;
    form.submit();
  }
</script>