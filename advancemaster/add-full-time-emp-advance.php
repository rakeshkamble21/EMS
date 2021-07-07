
<head>
    <link href="../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="../css/add-employee.css">
    <link rel="stylesheet" href="../css/all.css">
    <script src="../js/popper.min.js"></script>
    <script src="../js/jquery.min.js"></script> 
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/create-site.js"></script> 
    <script src="../js/all.js"></script>
    <script src="js/fullscreen.js"></script>
</head>
<body >
<div class="container register-form">
    <div class="row" style="margin-top:20px">
        <div class="col-md-2">
                   
        </div>
        <div class="col-md-8">
            <form action="" method="post">
                <div class="note">
                    <p>Fill 12 hours employee  Advance Details.</p>
                </div>

                <div class="form-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <select name="emp_name" class="form-control">
                                <option value="0">Please Select Option</option>
                                <?php
                                          global $row;
                                          require "../connection.php";
                                          try
                                          {
                                              $sql = "SELECT * FROM full_time_emp";
                                              $stmt = $db->prepare($sql); 
                                              $stmt->execute();
                                              $result = $stmt->get_result();
                                              while ($row = $result->fetch_assoc()) 
                                              {
                                                  $row1= $row['emp_id'];
                                                  $row2= $row['firstname'];
                                                  $row3= $row['lastname'];
                                                  //  echo $row2;
                                                  //  echo $row3;
                                                  $row4=$row2.' '.$row3;
                                                  $row5=$row2.''.$row3;
                                                 
                                                  //echo $row4;
                                                  echo "<option value='".$row1."'>".$row1.' '.'  '.$row4."</option>";

                                          }   
                                                  
                                              
                                          }
                                          catch (PDOException $e) 
                                          {
                                          echo $e->getMessage();
                                          }
                                
                                
                                
                                ?>
                              </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="advance_taken" class="form-control" required placeholder="Enter advance  *" value=""/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text"  name="mobile" class="form-control" placeholder="phone number *" value=""/>
                            </div>
                            <!-- <div class="form-group">
                                            <div class="maxl">
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="male" checked>
                                                    <span> Male </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="female">
                                                    <span>Female </span> 
                                                </label>
                                            </div>
                                        </div>
                        </div> -->
                    </div>
                    <button type="submit" class="btnSubmit">Submit</button>
                   &nbsp; <a href="../home.php"><button class="btn btn-success" type="button">Home</button></a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $currentDateTime=date('Y-m-d');
        $empid;
        $emp_name=$_POST["emp_name"];
        $deposit_taken=0;

        // if (preg_match("!\d+!",$emp_name,$matches)) // find only numbers and collect the first group of 4 numbers
        // {
        //     // echo implode(" ",$matches); 
        //     $empid=implode(" ",$matches);// if a match of 4 numbers is found, dump the matches array so you can see you can access it using $matches[0]
        //     echo $empid;
        // }

        $result1=mysqli_query($db,"select * from full_time_emp_advance where emp_id='$emp_name'");
        $row1=$result1->fetch_assoc();
        $remain=$row1['remain_advance'];
        $name=$row1['emp_name'];
        echo $name;
        
    
        if(empty($_POST["emp_name"]))
        {
            echo '<div class="alert alert-danger" role="alert">';
            echo ' <h4 class="alert-heading">Please enter first name    </h4>';  //not showing an alert box.
            echo '</script>';
        }
       
         if(empty($_POST["advance_taken"]))
        {
            echo '<div class="alert alert-danger" role="alert">';
            echo ' <h4 class="alert-heading">Please advance amount </h4>';  //not showing an alert box.
            echo '</script>';
        }
        $advance=$_POST["advance_taken"];

        // if(empty($_POST["mobile"]))
        // {
        //     echo '<div class="alert alert-danger" role="alert">';
        //     echo ' <h4 class="alert-heading">Please enter mobile number </h4>';  //not showing an alert box.
        //     echo '</script>';
        // }
        
        // if(!preg_match("/^(\+\d{1,3}[- ]?)?\d{10}$/", $salary))
        // {
        //     echo '<div class="alert alert-danger" role="alert">';
        //     echo ' <h4 class="alert-heading">please enter only numbers in salary</h4>';  //not showing an alert box.
        //     echo '</script>';
        // }
        //  if(empty($_POST["mobile"]))
        //  {
        //     echo '<div class="alert alert-danger" role="alert">';
        //     echo ' <h4 class="alert-heading">please enter mobile number</h4>';  //not showing an alert box.
        //     echo '</script>';
        //  }
        //  $mobile = $_POST["mobile"];
        //  if(!preg_match("/^(\+\d{1,3}[- ]?)?\d{10}$/", $mobile)) 
        //  {
        //     echo '<div class="alert alert-danger" role="alert">';
        //     echo ' <h4 class="alert-heading">Please enter valid mobile number </h4>';  //not showing an alert box.
        //     echo '</script>';
        //  }
      
      

              
                //$user = preg_replace('/[0-9]+/', '', $emp_name);
                // if (preg_match("!\d+!",$emp_name,$matches)) // find only numbers and collect the first group of 4 numbers
                //     {
                //         // echo implode(" ",$matches); 
                //         $empid=implode(" ",$matches);// if a match of 4 numbers is found, dump the matches array so you can see you can access it using $matches[0]
                //         echo $empid;
                //     }
             if(empty($_POST["advance_taken"]))
                {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo ' <h4 class="alert-heading">please enter Salary</h4>';  //not showing an alert box.
                    echo '</script>';
                }
                else  if(preg_match("/[^0-9]/", $advance))
                {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo ' <h4 class="alert-heading">please enter only numbers in salary</h4>';  //not showing an alert box.
                    echo '</script>';
                }
              
             
                 else
                 {
                    
                 
                    $newadvance= $remain+$advance;
                    $currentDateTime = date('Y-m-d');
                   /// echo $empid."<br>".$name."<br>".$advance."<br>".$deposit_taken."<br>".$newadvance."<br>".$currentDateTime;
                     $stmt = $db->prepare("update full_time_emp_advance set advance=?,remain_advance=?,advance_date_taken=? where emp_id=?"); //Fetching all the records with input credentials
                     $stmt->bind_param("iisi",$advance,$newadvance,$currentDateTime,$emp_name); //Where s indicates string type. You can use i-integer, d-double
                     $stmt->execute();
                     $result = $stmt->affected_rows;

                     $stmt2 = $db->prepare("INSERT INTO full_time_advance_master(emp_id,emp_name,advance_taken,deposit_advance,remain_advance,date) VALUES(?,?,?,?,?,?)"); //Fetching all the records with input credentials
                     $stmt2->bind_param("isiiis", $emp_name,$name,$newadvance,$deposit_taken,$newadvance,$currentDateTime); //Where s indicates string type. You can use i-integer, d-double
                     $stmt2->execute();
                     $result2 = $stmt2->affected_rows;
                     $stmt2 -> close();
                     $db -> close();
                    
                     if($result2>0)
                     {
                         
                         echo '<script type="text/javascript">';
                         echo ' alert("Registration successfull")';  //not showing an alert box.
                         echo '</script>';
                     }
                     else
                     {
                        echo "Oops. Something went wrong. Please try again"; 
                        ?>
                        <a href="add-employee.php">Try Login</a>
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