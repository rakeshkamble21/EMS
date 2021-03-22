<?php
                        require "home.php";
                    ?>
<html>
<head>
<link rel="stylesheet" href="css/update-user.css">
<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="css/all.css" rel="stylesheet" id="bootstrap-css">
<script src="js/bootstrap.min.js"></script>
<script src="js/all.js"></script>
<script src="js/jquery.min.js"></script>

</head>
<div class="container">
  <div class="row">
  <div class="col-md-2"></div>
    <div class="col-md-10">
    <h3 style="text-align:center">View Employee employee attendance</h3>
         <form action=" " method="post">
            <div class="col-md-6">
                            <div class="form-group">
                            <label for="male">Select the date</label>  
                                <input type="date"  name="dt" class="form-control"/>
                            </div>               
                
            </div>
            <input type="submit" class="btn btn-danger" value="search"/>
       
      <table class="table table-bordered" style="margin-top:20px">
        <thead>
          <tr>
            <th scope="col">Employee id</th>
            <th scope="col">Employee Name</th>
            <th scope="col">Attendance</th>
            <th scope="col">Work Done</th>
            <th scope="col">Work Hours</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
            



        <tbody>

        <?php
                require 'connection.php';
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
                    $sql = "SELECT * FROM attendance where date=?";
                    $stmt = $db->prepare($sql); 
                    $stmt->bind_param("s", $new_date);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    while ($row = $result->fetch_assoc()) 
                    {

                         ?>
                         <tr>
                        <td><?php echo $row['emp_id'];?></td>
                        <td><?php echo $row['emp_name'];?></td>
                        <td><?php echo $row['attendance'];?></td>
                        <td><?php echo $row['work_done'];?></td>
                        <td><?php echo $row['work_hours'];?></td>
                        <td><?php echo $row['date'];?></td>
                        
                        <td>
                        <!-- <button type="button" class="btn btn-primary" ><i class="far fa-eye"></i></button> -->
                        <p><a href="update-attendance.php?id=<?php echo $row['emp_id'];?> & date=<?php echo $row['date'];?> " data-placement="top" data-toggle="tooltip" title="Edit"><button type="button" class="btn btn-success" data-title="Edit"><i class="fas fa-edit"></i></button></a></p>
                        <p><a href="delete-attendance.php?id=<?php echo $row['emp_id'];?>" data-placement="top" data-toggle="tooltip" title="Delete"><button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button><a></p>
                        </td>
                    </tr>     
                    
                    </form>
               <?php    
                }
            

            ?>

         
          
        </tbody>
      </table>
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
?>