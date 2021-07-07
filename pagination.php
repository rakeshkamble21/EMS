<?php
                        require "home.php";
                        global $att;
                    ?>
<html>
<head>
<link rel="stylesheet" href="css/update-user.css">
<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="css/all.css" rel="stylesheet" id="bootstrap-css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.js"></script>


</head>
<div class="container">
<!--################################### Modal start ################################################-->
 <!-- Modal -->
 

<?php
 require 'connection.php';




?>




<!--######################################### Modal End #############################################-->
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
            <!-- <th scope="col">Work Done</th>
            <th scope="col">Work Hours</th> -->
            <th scope="col">Date</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
            



        <tbody>

        <?php
               
               
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
                  if (isset($_GET['pageno'])) {
                    $pageno = $_GET['pageno'];
                  } else {
                    $pageno = 1;
                  }
                  $no_of_records_per_page = 2;
                  $offset = ($pageno-1) * $no_of_records_per_page;
                  
                  
                  // Check connection
                  if (mysqli_connect_errno()){
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    die();
                  } 
                    echo $new_date;
                                
                    $total_pages_sql = "SELECT COUNT(*) FROM attendance ";
                    $result = mysqli_query($db,$total_pages_sql);
                    $total_rows = mysqli_fetch_array($result)[0];
                    $total_pages = ceil($total_rows / $no_of_records_per_page);

                    $sql = "SELECT * FROM attendance where date='$new_date'  LIMIT $offset, $no_of_records_per_page";
                    $res_data = mysqli_query($db,$sql);
                     
                    while ($row = mysqli_fetch_array($res_data)) 
                    {
                      $att=$row['attendance'];

                         ?>
                         <tr>
                        <td><?php echo $row['emp_id'];?></td>
                        <td><?php echo $row['emp_name'];?></td>
                        <td><?php echo $row['attendance'];?></td>
                        <!-- <td><?php echo $row['work_done'];?></td>
                        <td><?php echo $row['work_hours'];?></td> -->
                        <td><?php echo $row['date'];?></td>
                        
                        <td>
                        <!-- <button type="button" class="btn btn-primary" ><i class="far fa-eye"></i></button> -->
                        <a href="update-attendance.php?id=<?php echo $row['emp_id'];?> & date=<?php echo $row['date'];?> " data-placement="top" data-toggle="tooltip" title="Edit"><button type="button" class="btn btn-success" data-title="Edit"><i class="fas fa-edit"></i></button></a>              
                         <a href="delete-attendance.php?id=<?php echo $row['emp_id'];?>" data-placement="top" data-toggle="tooltip" title="Delete"><button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button><a>
                        </td>
                    </tr>     
                    
                    </form>
               <?php    
                }
            

            ?>

         
          
        </tbody>
      </table>
   
      <ul class="pagination">
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>
    
</div>
<?php
      $db->close();

}

catch (PDOException $e) 
{
  echo $e->getMessage();
}
                }
?>