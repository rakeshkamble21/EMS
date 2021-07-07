<html>
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/all.css">
    <script src="js/popper.min.js"></script>
    <script src="js/jquery.min.js"></script> 
    <script src="js/bootstrap.min.js"></script>
    <script src="js/create-site.js"></script> 
    <script src="js/all.js"></script>
    <script src="js/fullscreen.js"></script>
</head>
<body onload="script();" id="myvideo">
<section class="login-block">
    <div class="container"  >
	<div class="row">
		<div class="col-md-4 login-sec">
		    <h2 class="text-center">Login Now</h2>
		    <form class="login-form" action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1" class="text-uppercase">Username</label>
    <input type="text" name="username" class="form-control" placeholder="">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">Password</label>
    <input type="password" name="password" class="form-control" placeholder="">
  </div>
  
  
    <div class="form-check">  
    <button type="submit" onclick="addEventListener()" id="goFS" class="btn btn-login float-right">Submit</button>
  </div>
</form>
<div class="copy-text">Created with <i class="fa fa-heart"></i> by Patronaid Technolgies</div>
		</div>
		<div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
            <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block img-fluid" src="images/ems1.jpg"   alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <!-- <h2>This is Heaven</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p> -->
        </div>	
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="images/ems2.jpg"  alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <!-- <h2>This is Heaven</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p> -->
        </div>	
    </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="images/ems3.jpg"  alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <!-- <h2>This is Heaven</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p> -->
        </div>	
    </div>
  </div>
            </div>	   
		    
		</div>
	</div>
</div>
</section>
</body>
</html>
<?php
       require 'connection.php';
     if($_SERVER['REQUEST_METHOD'] == 'POST')
     {
       $username=$_POST['username'];
       $password=$_POST['password'];
       $username = stripcslashes($username);  
       $password = stripcslashes($password);  
       $username = mysqli_real_escape_string($db, $username);  
       $password = mysqli_real_escape_string($db, $password); 
      //  session_start();
      //  if(empty($_POST["username"]))
      //  {
      //    echo '<div class="alert alert-danger" role="alert">';
      //    echo ' <h4 class="alert-heading">Please enter username</h4>';  //not showing an alert box.
      //    echo '</script>';
      //  }
      //  else if(empty($_POST["password"]))
      //  {
      //      echo '<div class="alert alert-danger" role="alert">';
      //      echo ' <h4 class="alert-heading">Please enter password</h4>';  //not showing an alert box.
      //      echo '</script>';
      //  }
      //  else
      //  {
         try
         {
           $sql = "select * from users where username = '$username' and password = '$password'";  
           $result = mysqli_query($db, $sql);  
           $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
           $count = mysqli_num_rows($result);  
             
           if($count==1)
           {
               echo "<script>";
               echo '';
               header('Location:home.php');
               echo '</script>';
               $_SESSION['username']=$username;
           }
           else
           {
               echo '<div class="alert alert-danger" role="alert">';
               echo ' <h4 class="alert-heading">Please enter  password</h4>';  //not showing an alert box.
               echo '</script>';
           }
         }
         catch (PDOException $e) 
         {
               echo $e->getMessage();
         }
     }
     //}

?>

<script>
function script()
{
  var elem=document.getElementById("myvideo");
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.webkitRequestFullscreen) { /* Safari */
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) { /* IE11 */
    elem.msRequestFullscreen();
  }
}
</script>