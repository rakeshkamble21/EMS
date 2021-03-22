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
    <h3 style="text-align:center">View Employee Data</h3>
      <table class="table table-bordered" style="margin-top:20px">
        <thead>
          <tr>
            <th scope="col">user id</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Address</th>
            <th scope="col">Mobile</th>
            <th scope="col">Gender</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
            



        <tbody>

        <?php
                require 'connection.php';

                try
                {
                    $sql = "SELECT * FROM employee";
                    $stmt = $db->prepare($sql); 
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()) 
                    {

                         ?>
                         <tr>
                        <td><?php echo $row['emp_id'];?></td>
                        <td><?php echo $row['firstname'];?></td>
                        <td><?php echo $row['lastname'];?></td>
                        <td><?php echo $row['address'];?></td>
                        <td><?php echo $row['mobile'];?></td>
                        <td><?php echo $row['gender'];?></td>
                        
                        <td>
                        <!-- <button type="button" class="btn btn-primary" ><i class="far fa-eye"></i></button> -->
                        <p><a href="update-user.php?id=<?php echo $row['emp_id'];?>" data-placement="top" data-toggle="tooltip" title="Edit"><button type="button" class="btn btn-success" data-title="Edit"><i class="fas fa-edit"></i></button></a></p>
                        <p><a href="delete-user.php?id=<?php echo $row['emp_id'];?>" data-placement="top" data-toggle="tooltip" title="Delete"><button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button><a></p>
                        </td>
                    </tr>     
                    

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

?>