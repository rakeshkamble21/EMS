
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

<div class="container register-form">
    <div class="row">
        <div class="col-md-2">
                   
        </div>
        <div class="col-md-8">
            <form action="" method="post">

            <?php

                    require '../connection.php';
                    $ids=$_GET["id"];

                    try
                    {
                        $sql = "SELECT * FROM employee where emp_id=?";
                        $stmt = $db->prepare($sql); 
                        $stmt->bind_param("i", $ids);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $row = $result->fetch_assoc();
                        $sex=$row['gender'];
                        

                    ?>
                <div class="note">
                    <p>Register a Employee.</p>
                </div>

                <div class="form-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text"  name="firstname" class="form-control" placeholder="Enter first Name *" value="<?php echo $row['firstname'];?>"/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="lastname" class="form-control" placeholder="Enter Last Name *" value="<?php echo $row['lastname'];?>"/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="emp_address" class="form-control" placeholder="Enter Employee address*" value="<?php echo $row['address'];?>"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text"  name="mobile" class="form-control" placeholder="phone number *" value="<?php echo $row['mobile'];?>"/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="salary" class="form-control" placeholder="Enter Salary per day *" value="<?php echo $row['salary'];?>"/>
                            </div>
                            <div class="form-group">
                                            <div class="maxl">
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="male" <?php echo ($sex=='male')?'checked':''?>>
                                                    <span> Male </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="female" <?php echo ($sex=='female')?'checked':''?>>
                                                    <span>Female </span> 
                                                </label>
                                            </div>
                                        </div>
                        </div>
                    </div>
                    <button type="submit" class="btnSubmit">Submit</button>
                    <a href="view-employee.php"><button type="button" class="btn btn-danger">Back</button></a>
                </div>
                <?php
                                        
                                        }
                                        catch (PDOException $e) 
                                        {
                                        echo $e->getMessage();
                                        }
                                    ?>
            </form>
        </div>
    </div>
</div>
<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(empty($_POST["firstname"]))
        {
            echo '<div class="alert alert-danger" role="alert">';
            echo ' <h4 class="alert-heading">Please enter first name    </h4>';  //not showing an alert box.
            echo '</script>';
        }
        $first = $_POST["firstname"];

        if(!preg_match("/^[a-zA-Z'-]+$/", $first))
        {
            echo '<div class="alert alert-danger" role="alert">';
            echo ' <h4 class="alert-heading">Enter only alphabates Firstname    </h4>';  //not showing an alert box.
            echo '</script>';
        }

        if(empty($_POST["lastname"]))
        {
                echo '<div class="alert alert-danger" role="alert">';
                echo ' <h4 class="alert-heading">Please enter Last name    </h4>';  //not showing an alert box.
                echo '</script>';
        }
         $last = $_POST["lastname"];
         if(!preg_match("/^[a-zA-Z'-]+$/", $last))
         {
             echo '<div class="alert alert-danger" role="alert">';
             echo ' <h4 class="alert-heading">Enter only alphabates in Lastname   </h4>';  //not showing an alert box.
             echo '</script>';
         }

         if(empty($_POST["emp_address"]))
        {
            echo '<div class="alert alert-danger" role="alert">';
            echo ' <h4 class="alert-heading">Please enter Address </h4>';  //not showing an alert box.
            echo '</script>';
        }
        $address=$_POST["emp_address"];

        if(empty($_POST["salary"]))
        {
            echo '<div class="alert alert-danger" role="alert">';
            echo ' <h4 class="alert-heading">Please enter Salary </h4>';  //not showing an alert box.
            echo '</script>';
        }
        $salary=$_POST["salary"];
        // if(!preg_match("/^(\+\d{1,3}[- ]?)?\d{10}$/", $salary))
        // {
        //     echo '<div class="alert alert-danger" role="alert">';
        //     echo ' <h4 class="alert-heading">please enter only numbers in salary</h4>';  //not showing an alert box.
        //     echo '</script>';
        // }
         if(empty($_POST["mobile"]))
         {
            echo '<div class="alert alert-danger" role="alert">';
            echo ' <h4 class="alert-heading">please enter mobile number</h4>';  //not showing an alert box.
            echo '</script>';
         }
         $mobile = $_POST["mobile"];
         if(!preg_match("/^(\+\d{1,3}[- ]?)?\d{10}$/", $mobile)) 
         {
            echo '<div class="alert alert-danger" role="alert">';
            echo ' <h4 class="alert-heading">Please enter valid mobile number </h4>';  //not showing an alert box.
            echo '</script>';
         }
         $gender = $_POST["gender"];
         if(empty($gender))
         {
            echo '<div class="alert alert-danger" role="alert">';
            echo ' <h4 class="alert-heading">please select gender</h4>';  //not showing an alert box.
            echo '</script>';
         }


                if(empty($_POST["emp_address"]))
                {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo ' <h4 class="alert-heading">Please enter address</h4>';  //not showing an alert box.
                    echo '</script>';
                }
                else if(empty($_POST["firstname"]))
                {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo ' <h4 class="alert-heading">Please enter firstname</h4>';  //not showing an alert box.
                    echo '</script>';
                }
                else if(!preg_match("/^[a-zA-Z'-]+$/", $first))
                {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo ' <h4 class="alert-heading">Enter only alphabates</h4>';  //not showing an alert box.
                    echo '</script>';
                }
                else if(empty($_POST["lastname"])) 
                {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo ' <h4 class="alert-heading">Please enter lastname</h4>';  //not showing an alert box.
                    echo '</script>';
                }
                else if(!preg_match("/^[a-zA-Z'-]+$/", $last))  
                {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo ' <h4 class="alert-heading">please enter only alphabates</h4>';  //not showing an alert box.
                    echo '</script>';
                }
                else if(empty($_POST["salary"]))
                {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo ' <h4 class="alert-heading">please enter Salary</h4>';  //not showing an alert box.
                    echo '</script>';
                }
                else  if(preg_match("/[^0-9]/", $salary))
                {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo ' <h4 class="alert-heading">please enter only numbers in salary</h4>';  //not showing an alert box.
                    echo '</script>';
                }
                else if(empty($_POST["mobile"]))
                {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo ' <h4 class="alert-heading">please enter mobile number</h4>';  //not showing an alert box.
                    echo '</script>';
                }
                else  if(!preg_match("/^(\+\d{1,3}[- ]?)?\d{10}$/", $mobile))
                {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo ' <h4 class="alert-heading">please enter only numbers</h4>';  //not showing an alert box.
                    echo '</script>';
                }
                 else
                 {
                    echo $first."".$last."".$mobile."".$address."".$salary."".$gender."".$ids;
                    $stmt = $db->prepare("update employee set firstname=?,lastname=?,mobile=?,address=?,salary=?,gender=? where emp_id=?"); //Fetching all the records with input credentials
                     $stmt->bind_param("ssisisi",$first,$last,$mobile,$address,$salary,$gender,$ids); //Where s indicates string type. You can use i-integer, d-double
                     $stmt->execute();
                     $result = $stmt->affected_rows;
                     $stmt -> close();
                     $db -> close(); 
                    
                     if($result > 0)
                     {
                         
                         echo '<script type="text/javascript">';
                         echo ' alert("Update successfull")';  //not showing an alert box.
                         echo '</script>';
                      //   <div class="alert alert-success" role="alert">
                //         <h4 class="alert-heading">Well done!</h4>
                //          <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                //      <hr>
                //        <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                //  </div>


                         //echo "Registration succssfull"; // user will be taken to the success page
                     }
                     else
                     {
                         echo "Oops. Something went wrong. Please try again"; 
                         ?>
                         <a href="view-employee.php">Try Login</a>
                         <?php 
                     }
                 }
}
    
?>